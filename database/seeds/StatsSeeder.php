<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class StatsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $stats = array();
        do {
            $response = Http::get('https://banuacoders.com/api/pico/v2/statistik');
            $stats = $response->json();
        } while (!$response->successful());
        foreach ($stats['data'] as $stat) {
            DB::table('stats')
                ->insert(
                    [
                        'day' => $stat['hari_ke'],
                        'date' => Carbon::parse($stat['tanggal']),
                        'positive' => $stat['kasus_baru']['positif'],
                        'recovered' => $stat['kasus_baru']['sembuh'],
                        'death' => $stat['kasus_baru']['death'],
                        'negative' => $stat['kasus_baru']['negative'],
                        'new_ODP' => $stat['kasus_baru']['ODP'],
                        'finished_ODP' => $stat['selesai']['ODP'],
                        'new_PDP' => $stat['kasus_baru']['PDP'],
                        'finished_PDP' => $stat['selesai']['PDP'],
                        'created_at' => Carbon::parse($stat['date']),
                        'updated_at' => Carbon::now(),
                    ]
                );
        }
    }
}
