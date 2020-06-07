<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('stats', function (Blueprint $table) {
            $table->id();
            $table->string('day');
            $table->string('date');
            $table->integer('positive');
            $table->integer('recovered');
            $table->integer('death');
            $table->integer('negative')->default(0);
            $table->integer('new_ODP')->default(0);
            $table->integer('new_PDP')->default(0);
            $table->integer('finished_ODP')->default(0);
            $table->integer('finished_PDP')->default(0);
            $table->double('Rt')->default(0);
            $table->double('Rt_upper')->default(0);
            $table->double('Rt_lower')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('stats');
    }
}
