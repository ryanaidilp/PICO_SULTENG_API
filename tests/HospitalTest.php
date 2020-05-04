<?php

class HospitalTest extends TestCase
{
    /**
     * test
     * /rumahsakit [GET]
     *
     * @return void
     */
    public function testGetAllHospitals()
    {
        $this->get('/rumahsakit', []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure(
            [
                'success',
                'errors',
                'data'
            ]
        );
    }
}
