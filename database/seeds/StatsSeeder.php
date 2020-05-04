<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class StatsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stats = array();
        do {
            $response = Http::get('https://banuacoders.com/api/pico/statistik');
            $stats = $response->json();
        } while (!$response->successful());
        foreach ($stats['data'] as $stat) {
            DB::table('stats')
                ->insert(
                    [
                        'day' => $stat['day'],
                        'date' => Carbon::parse($stat['date']),
                        'positive' => $stat['positive'],
                        'cumulative_positive' => $stat['cumulative_positive'],
                        'recovered' => $stat['recovered'],
                        'cumulative_recovered' => $stat['cumulative_recovered'],
                        'death' => $stat['death'],
                        'cumulative_death' => $stat['cumulative_death'],
                        'created_at' => Carbon::parse($stat['date']),
                        'updated_at' => Carbon::now()
                    ]
                );
        }
    }
}
