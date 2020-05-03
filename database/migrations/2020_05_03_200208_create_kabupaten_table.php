<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKabupatenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kabupaten', function (Blueprint $table) {
            $table->integer('no')->primary();
            $table->string('kabupaten', 50);
            $table->integer('ODP');
            $table->integer('PDP');
            $table->integer('positif');
            $table->integer('negatif');
            $table->integer('sembuh');
            $table->integer('meninggal');
            $table->integer('selesai_pengawasan');
            $table->integer('dalam_pengawasan');
            $table->integer('selesai_pemantauan');
            $table->integer('dalam_pemantauan');
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
        Schema::dropIfExists('kabupaten');
    }
}
