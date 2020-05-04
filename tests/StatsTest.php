<?php

class StatsTest extends TestCase
{

    /**
     * test
     * /statistik [GET]
     *
     * @return void
     */
    public function testGetAllStats()
    {
        $response = $this->call('GET', '/statistik');
        $this->assertEquals(200, $response->status());
        $this->seeJsonStructure([
            'success',
            'errors',
            'data' => [
                '*' =>
                [
                    'day',
                    'date',
                    'positive',
                    'cumulative_positive',
                    'recovered',
                    'cumulative_recovered',
                    'death',
                    'death_percentage',
                    'recovered_percentage',
                    'under_treatment_percentage',
                    'daily_positive_case',
                    'daily_recovered_case',
                    "daily_death_case"
                ]

            ]
        ]);
    }

    /**
     * test
     * /statistik/{day} [GET]
     * @return void
     */
    public function testGetStatsByDay()
    {
        $this->get('statistik/13', []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure([
            'success',
            'errors',
            'data' =>
            [
                'day',
                'date',
                'positive',
                'cumulative_positive',
                'recovered',
                'cumulative_recovered',
                'death',
                'death_percentage',
                'recovered_percentage',
                'under_treatment_percentage',
                'daily_positive_case',
                'daily_recovered_case',
                "daily_death_case"
            ]
        ]);
    }

    /**
     * test
     * /statistik/{day} [GET]
     *
     * @return void
     */
    public function testGetStatsByDayNotFound()
    {
        $this->get('/statistik/0', []);
        $this->seeJson(
            [
                'success' => false,
                'errors' =>
                [
                    'code' => 404,
                    'message' => 'Stats not found!'
                ],
                'data' => []
            ]
        );
        $this->seeStatusCode(404);
    }

    /**
     * test
     * /statistik/{day} [PUT]
     *
     * @return void
     */
    public function testUpdateStatsByDayUnauthorized()
    {
        $params = [
            'positive' => 0,
            'cumulative_positive' => 59,
            'recovered' => 0,
            'cumulative_recovered' => 11,
            'death' => 0,
            'cumulative_death' => 3
        ];

        $this->put("/statistik/21", $params, []);
        $this->seeJson([
            'success' => false,
            'errors' =>
            [
                'code' => 401,
                'message' => 'Unauthorized Access!'
            ],
            'data' => []
        ]);
        $this->seeJsonEquals([
            'success' => false,
            'errors' =>
            [
                'code' => 401,
                'message' => 'Unauthorized Access!'
            ],
            'data' => []
        ]);
        $this->assertResponseStatus(401);
    }

    /**
     * test
     * /statistik [POST]
     *
     * @return void
     */
    public function testCreateStatsUnauthorized()
    {
        $params = [
            'day' => 45,
            'date' => "5-05-2020",
            'positive' => 0,
            'cumulative_positive' => 59,
            'recovered' => 0,
            'cumulative_recovered' => 11,
            'death' => 0,
            'cumulative_death' => 3
        ];

        $this->post("/statistik", $params, []);
        $this->seeJson([
            'success' => false,
            'errors' =>
            [
                'code' => 401,
                'message' => 'Unauthorized Access!'
            ],
            'data' => []
        ]);
        $this->seeJsonEquals([
            'success' => false,
            'errors' =>
            [
                'code' => 401,
                'message' => 'Unauthorized Access!'
            ],
            'data' => []
        ]);
        $this->assertResponseStatus(401);
    }
}
