<?php

class PostsTest extends TestCase
{
    const posts_endpoint = '/posko';
    public const posts_json_structure =  [
        'no',
        'nama',
        'posko' => [
            '*' => [
                'no',
                'nama'
            ]
        ]
    ];

    /**
     * test
     * /posko [GET]
     *
     * @return void
     */
    public function testGetAllPosts()
    {
        $this->get(self::posts_endpoint, []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure(
            [
                'success',
                'errors',
                'data' =>
                [
                    '*' => self::posts_json_structure
                ]
            ]
        );
    }
}
