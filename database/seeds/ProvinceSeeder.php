<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $provinces = array();
        do {
            $response = Http::get('https://banuacoders.com/api/pico/provinsi');
            $provinces = $response->json();
        } while (!$response->successful());
        foreach ($provinces['data'] as $province) {
            DB::table('provinsi')
                ->insert(
                    [
                        'kode_provinsi' => $province['kode_provinsi'],
                        'provinsi' => $province['provinsi'],
                        'positif' => $province['positif'],
                        'meninggal' => $province['meninggal'],
                        'sembuh' => $province['sembuh'],
                        'map_id' => $province['map_id'],
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now()
                    ]
                );
        }
    }
}
