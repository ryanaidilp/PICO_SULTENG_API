<?php

class ProvinceTest extends TestCase
{
    const province_endpoint = '/provinsi';
    const province_json_structure = [
        'kode_provinsi',
        'provinsi',
        'positif',
        'meninggal',
        'sembuh',
        'map_id',
        'updated_at'
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
            'message' => "Province Not Found!"
        ],
        'data' => []
    ];


    /**
     * @test
     * /provinsi [GET]
     *
     * @return void
     */
    public function testGetAllProvinces()
    {
        $response = $this->call('GET', self::province_endpoint);
        $this->assertEquals(200, $response->status());
        $this->seeJsonStructure([
            'success',
            'errors',
            'data' => [
                '*' => self::province_json_structure
            ]
        ]);
    }

    /**
     * @test
     * /provinsi/{no} [GET]
     *
     * @return void
     */
    public function testGetProvinceByCode()
    {
        $this->get('provinsi/72', []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure([
            'success',
            'errors',
            'data' => self::province_json_structure
        ]);
    }

    /**
     *  @test
     *  /provinsi/{no} [GET]
     *
     * @return void
     */
    public function testGetProvinceByCodeNotFound()
    {
        $this->get(self::province_endpoint . '/1', []);
        $this->seeJsonEquals(self::not_found_structure);
        $this->seeStatusCode(404);
    }

    /**
     * test
     * /provinsi/{no} [PUT]
     *
     * @return void
     */
    public function testUpdateProvinceByCodeUnauthorized()
    {
        $params =
            [
                'positif' => 22,
                'sembuh' => 2,
                'meninggal' => 3,
            ];

        $this->put(self::province_endpoint . '/72', $params, []);
        $this->seeJsonEquals(self::unauthorized_structure);
        $this->seeStatusCode(401);
    }
}
