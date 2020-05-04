<?php

use App\District;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $districts = array();
        do {
            $response = Http::get('https://banuacoders.com/api/pico/kabupaten');
            $districts = $response->json();
        } while (!$response->successful());
        foreach ($districts['data'] as $district) {
            DB::table('kabupaten')
                ->insert(
                    [
                        'no' => $district['no'],
                        'kabupaten' => $district['kabupaten'],
                        'ODP' => $district['ODP'],
                        'PDP' => $district['PDP'],
                        'positif' => $district['positif'],
                        'negatif' => $district['negatif'],
                        'sembuh' => $district['sembuh'],
                        'meninggal' => $district['meninggal'],
                        'selesai_pengawasan' => $district['selesai_pengawasan'],
                        'selesai_pemantauan' => $district['selesai_pemantauan'],
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now()
                    ]
                );
        }
    }
}
