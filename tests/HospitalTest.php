<?php

class HospitalTest extends TestCase
{
    const hospital_endpoint = '/rumahsakit';
    public const hospital_json_structure = [
        'no',
        'nama',
        'alamat',
        'telepon',
        'email',
        'longitude',
        'latitude'
    ];

    /**
     * test
     * /rumahsakit [GET]
     *
     * @return void
     */
    public function testGetAllHospitals()
    {
        $this->get(self::hospital_endpoint, []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure(
            [
                'success',
                'errors',
                'data' => ['*' => self::hospital_json_structure]
            ]
        );
    }
}
