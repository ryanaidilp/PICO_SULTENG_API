<?php

class HospitalTest extends TestCase
{

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
