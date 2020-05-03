<?php

class ProvinceTest extends TestCase
{
    /**
     * @test
     * /provinsi [GET]
     *
     * @return void
     */
    public function testGetAllProvinces()
    {
        $response = $this->call('GET', '/provinsi');
        $this->assertEquals(200, $response->status());
        $this->seeJsonStructure([
            'success',
            'errors',
            'data' => [
                '*' =>
                [
                    'kode_provinsi',
                    'provinsi',
                    'positif',
                    'meninggal',
                    'sembuh',
                    'map_id',
                    'updated_at'
                ]

            ]
        ]);
    }

    /**
     * @test
     * /provinsi/{no} [GET]
     *
     * @return void
     */
    public function testGetProvinceByNoFound()
    {
        $this->get('provinsi/72', []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure([
            'success',
            'errors',
            'data' =>
            [
                'kode_provinsi',
                'provinsi',
                'positif',
                'meninggal',
                'sembuh',
                'map_id',
                'updated_at'
            ]
        ]);
    }

    /**
     *  @test
     *  /provinsi/{no} [GET]
     *
     * @return void
     */
    public function testGetProvinceByNoNotFound()
    {
        $this->get('/provinsi/1', []);
        $this->seeJson(
            [
                'success' => false,
                'errors' =>
                [
                    'code' => 404,
                    'message' => 'Province Not Found!'
                ],
                'data' => []
            ]
        );
        $this->seeStatusCode(404);
    }

    public function testUpdateProvinceByNoFailed()
    {
        $params =
            [
                'positif' => 22,
                'sembuh' => 2,
                'meninggal' => 3,
            ];

        $this->put('/provinsi/72', $params, []);
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
