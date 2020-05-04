<?php

class PostsTest extends TestCase
{
    /**
     * test
     * /posko [GET]
     *
     * @return void
     */
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
