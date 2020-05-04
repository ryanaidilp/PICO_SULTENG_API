<?php

class StatsTest extends TestCase
{

    const stats_endpoint = '/statistik';
    public const stats_json_structure = [
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
    ];
    const unauthorized_structure = [
        'success' => false,
        'errors' =>
        [
            'code' => 401,
            'message' => 'Unauthorized Access!'
        ],
        'data' => []
    ];
    const not_found_structure = [
        'success' => false,
        'errors' =>
        [
            'code' => 404,
            'message' => "Stats not found!"
        ],
        'data' => []
    ];


    /**
     * test
     * /statistik [GET]
     *
     * @return void
     */
    public function testGetAllStats()
    {
        $response = $this->call('GET', self::stats_endpoint);
        $this->assertEquals(200, $response->status());
        $this->seeJsonStructure([
            'success',
            'errors',
            'data' => [
                '*' => self::stats_json_structure
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
        $this->get(self::stats_endpoint . '/13', []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure([
            'success',
            'errors',
            'data' => self::stats_json_structure
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
        $this->get(self::stats_endpoint . '/0', []);
        $this->seeJsonEquals(self::not_found_structure);
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

        $this->put(self::stats_endpoint . "/21", $params, []);
        $this->seeJsonEquals(self::unauthorized_structure);
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

        $this->post(self::stats_endpoint, $params, []);
        $this->seeJsonEquals(self::unauthorized_structure);
        $this->assertResponseStatus(401);
    }
}
