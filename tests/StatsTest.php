<?php

class StatsTest extends TestCase
{
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
}
