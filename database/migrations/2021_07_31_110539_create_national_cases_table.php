<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNationalCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('national_cases', function (Blueprint $table) {
            $table->id();
            $table->integer('day');
            $table->dateTime('date');
            $table->integer('positive');
            $table->integer('recovered');
            $table->integer('deceased');
            $table->integer('cumulative_positive');
            $table->integer('cumulative_recovered');
            $table->integer('cumulative_deceased');
            $table->double('rt')->nullable();
            $table->double('rt_upper')->nullable();
            $table->double('rt_lower')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('national_cases');
    }
}
