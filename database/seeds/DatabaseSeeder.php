<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('DistrictSeeder');
        $this->call('ProvinceSeeder');
        $this->call('HospitalSeeder');
        $this->call('PostsPhoneSeeder');
        $this->call('StatsSeeder');
    }
}
