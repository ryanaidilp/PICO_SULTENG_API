<?php

namespace App\Console;

use App\Provinsi;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\Http;
use Laravel\Lumen\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $response = Http::get("https://api.kawalcorona.com/indonesia/provinsi");
            do {
                $arrayProvince = $response->json();
                if ($response->successful()) {
                    foreach ($arrayProvince as $prov) {
                        $positif = $prov['attributes']['Kasus_Posi'];
                        $sembuh = $prov['attributes']['Kasus_Semb'];
                        $meninggal = $prov['attributes']['Kasus_Meni'];
                        Provinsi::where('kode_provinsi', $prov['attributes']['Kode_Provi'])
                            ->update([
                                'positif' => $positif,
                                'sembuh' => $sembuh,
                                'meninggal' => $meninggal

                            ]);
                    }
                }
            } while (!$response->successful());
        })->dailyAt("18:00")->timezone("Asia/Makassar");
    }
}
