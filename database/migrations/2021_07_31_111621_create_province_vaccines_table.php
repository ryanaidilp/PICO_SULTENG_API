<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvinceVaccinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('province_vaccines', function (Blueprint $table) {
            $table->id();
            $table->foreignId('day')->constrained('national_vaccines', 'id');
            $table->integer('province_id');
            $table->dateTime('date');
            $table->integer('total_vaccination_target')->default(0);
            $table->integer('first_vaccination_received')->default(0);
            $table->integer('second_vaccination_received')->default(0);
            $table->integer('cumulative_first_vaccination_received')->default(0);
            $table->integer('cumulative_second_vaccination_received')->default(0);
            $table->integer('health_worker_vaccination_target')->default(0);
            $table->integer('health_worker_first_vaccination_received')->default(0);
            $table->integer('health_worker_second_vaccination_received')->default(0);
            $table->integer('cumulative_health_worker_first_vaccination_received')->default(0);
            $table->integer('cumulative_health_worker_second_vaccination_received')->default(0);
            $table->integer('elderly_vaccination_target')->default(0);
            $table->integer('elderly_first_vaccination_received')->default(0);
            $table->integer('elderly_second_vaccination_received')->default(0);
            $table->integer('cumulative_elderly_first_vaccination_received')->default(0);
            $table->integer('cumulative_elderly_second_vaccination_received')->default(0);
            $table->integer('public_officer_vaccination_target')->default(0);
            $table->integer('public_officer_first_vaccination_received')->default(0);
            $table->integer('public_officer_second_vaccination_received')->default(0);
            $table->integer('cumulative_public_officer_first_vaccination_received')->default(0);
            $table->integer('cumulative_public_officer_second_vaccination_received')->default(0);
            $table->timestamps();
            $table->foreign('province_id')->references('id')->on('provinces');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('province_vaccines');
    }
}
