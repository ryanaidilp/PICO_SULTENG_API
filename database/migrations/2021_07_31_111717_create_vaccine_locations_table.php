<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVaccineLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vaccine_locations', function (Blueprint $table) {
            $table->id();
            $table->integer('regency_id');
            $table->string('name');
            $table->string('address');
            $table->string('operational_time');
            $table->boolean('is_first_vaccination');
            $table->boolean('is_second_vaccination');
            $table->integer('daily_vaccination_quota')->nullable();
            $table->integer('vaccination_stock_remaining')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->foreign('regency_id')->references('id')->on('regencies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vaccine_locations');
    }
}
