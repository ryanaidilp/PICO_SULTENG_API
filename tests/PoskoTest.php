<?php

class PoskoTest extends TestCase
{
    public function testGetAllPosts()
    {
        $this->get('/posko', []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure(
            [
                'success',
                'errors',
                'data' =>
                [
                    '*' =>
                    [
                        'no',
                        'nama',
                    ]
                ]
            ]
        );
    }
}
