<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHospitalBedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospital_beds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hospital_id')->constrained('hospitals', 'id');
            $table->foreignId('hospital_bed_type_id')->constrained('hospital_bed_types', 'id');
            $table->integer('total');
            $table->integer('occupied');
            $table->integer('available');
            $table->integer('queue');
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
        Schema::dropIfExists('hospital_beds');
    }
}
