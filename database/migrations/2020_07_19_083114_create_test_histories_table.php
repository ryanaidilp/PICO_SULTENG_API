<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('day')->references('id')->on('stats');
            $table->date('pcr_from');
            $table->integer('pcr_process');
            $table->integer('pcr_invalid');
            $table->integer('pcr_positive');
            $table->integer('pcr_negative');
            $table->date('rdt_from');
            $table->integer('rdt_process');
            $table->integer('rdt_invalid');
            $table->integer('rdt_positive');
            $table->integer('rdt_negative');
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
        Schema::dropIfExists('test_histories');
    }
}
