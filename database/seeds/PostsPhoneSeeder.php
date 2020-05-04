<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class PostsPhoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = array();
        do {
            $response = Http::get('https://banuacoders.com/api/pico/posko');
            $posts = $response->json();
        } while (!$response->successful());
        foreach ($posts['data'] as $post) {
            $district_code = $post['no'];
            foreach ($post['posko'] as $posko) {
                DB::table('posko')
                    ->insert(
                        [
                            'nama' => $posko['nama'],
                            'kode_kabupaten' => $district_code,
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now()
                        ]
                    );
                foreach ($posko['no_hp'] as $phone) {
                    $id_posts = DB::table('posko')->where('nama', $posko['nama'])->value('id');
                    DB::table('phone')
                        ->insert(
                            [
                                'phone' => $phone,
                                'id_posko' => $id_posts,
                                'created_at' => Carbon::now(),
                                'updated_at' => Carbon::now(),
                            ]
                        );
                }
            }
        }
    }
}
