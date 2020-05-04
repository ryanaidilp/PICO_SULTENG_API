<?php


class DistrictTest extends TestCase
{
    const district_endpoint = '/kabupaten';
    const district_json_structure =  [
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
            'message' => "District not found!"
        ],
        'data' => []
    ];

    /**
     * @test
     * /kabupaten [GET]
     *
     * @return void
     */
    public function testGetAllDistricts()
    {
        $response = $this->call('GET', self::district_endpoint);
        $this->assertEquals(200, $response->status());
        $this->seeJsonStructure([
            'success',
            'errors',
            'data' => [
                '*' => self::district_json_structure
            ]
        ]);
    }

    /**
     * @test
     * /kabupaten/{no} [GET]
     *
     * @return void
     */
    public function testGetDistrictByNo()
    {
        $this->get(self::district_endpoint . '/13', []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure([
            'success',
            'errors',
            'data' => self::district_json_structure
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
        $this->get(self::district_endpoint . '/16', []);
        $this->seeJsonEquals(self::not_found_structure);
        $this->seeStatusCode(404);
    }

    /**
     * @test
     * /kabupaten/{no} [PUT]
     *
     * @return void
     */
    public function testUpdateDistrictUnauthorized()
    {
        $params =
            [
                'ODP' => 14,
                'PDP' => 1,
                'positif' => 0,
                'negatif' => 0,
                'meninggal' => 0,

            ];
        $this->put(self::district_endpoint . '/5', $params, []);
        $this->seeJsonEquals(self::unauthorized_structure);
        $this->seeStatusCode(401);
    }
}
