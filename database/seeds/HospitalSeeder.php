<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class HospitalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hospitals = array();
        do {
            $response = Http::get('https://banuacoders.com/api/pico/rumahsakit');
            $hospitals = $response->json();
        } while (!$response->successful());
        foreach ($hospitals['data'] as $hospital) {
            DB::table('rumah_sakit')
                ->insert(
                    [
                        'no' => $hospital['no'],
                        'nama' => $hospital['nama'],
                        'alamat' => $hospital['alamat'],
                        'telepon' => $hospital['telepon'],
                        'email' => $hospital['email'],
                        'longitude' => $hospital['longitude'],
                        'latitude' => $hospital['latitude'],
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now()
                    ]
                );
        }
    }
}
