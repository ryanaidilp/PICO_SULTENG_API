<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class DistrictTest extends TestCase
{
    /**
     * @test
     * /kabupaten [GET]
     *
     * @return void
     */
    public function testGetAllDistricts()
    {
        $response = $this->call('GET', '/kabupaten');
        $this->assertEquals(200, $response->status());
        $this->seeJsonStructure([
            'success',
            'errors',
            'data' => [
                '*' =>
                [
                    'no',
                    'kabupaten',
                    'ODP',
                    'PDP',
                    'positif',
                    'meninggal',
                    'negatif',
                    'selesai_pengawasan',
                    'dalam_pengawasan',
                    'selesai_pemantauan',
                    'dalam_pemantauan',
                    'updated_at'
                ]

            ]
        ]);
    }

    /**
     * @test
     * /kabupaten/{no} [GET]
     *
     * @return void
     */
    public function testGetDistrictByNoFound()
    {
        $this->get('kabupaten/5', []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure([
            'success',
            'errors',
            'data' =>
            [
                'no',
                'kabupaten',
                'ODP',
                'PDP',
                'positif',
                'meninggal',
                'negatif',
                'selesai_pengawasan',
                'dalam_pengawasan',
                'selesai_pemantauan',
                'dalam_pemantauan',
                'updated_at'
            ]
        ]);
    }

    /**
     *  @test
     *  /kabupaten/{no} [GET]
     *
     * @return void
     */
    public function testGetDistrictByNoNotFound()
    {
        $this->get('/kabupaten/16', []);
        $this->seeJson(
            [
                'success' => false,
                'errors' =>
                [
                    'code' => 404,
                    'message' => 'District not found!'
                ],
                'data' => []
            ]
        );
        $this->seeStatusCode(404);
    }

    /**
     * @test
     * /kabupaten/{no} [PUT]
     *
     * @return void
     */
    public function testUpdateDistrictFailed()
    {
        $params =
            [
                'ODP' => 14,
                'PDP' => 1,
                'positif' => 0,
                'negatif' => 0,
                'meninggal' => 0,

            ];
        $this->put('kabupaten/5', $params, []);
        $this->seeJson([
            'success' => false,
            'errors' =>
            [
                'code' => 401,
                'message' => 'Unauthorized Access!'
            ],
            'data' => []
        ]);
        $this->seeStatusCode(401);
    }
}
