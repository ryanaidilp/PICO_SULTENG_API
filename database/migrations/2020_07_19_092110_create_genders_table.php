<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGendersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('genders', function (Blueprint $table) {
            $table->foreignId('day')->references('id')->on('stats');
            $table->integer('positive_male');
            $table->integer('positive_female');
            $table->integer('pdp_male');
            $table->integer('pdp_female');
            $table->integer('positive_male_0_14');
            $table->integer('positive_male_15_19');
            $table->integer('positive_male_20_24');
            $table->integer('positive_male_25_49');
            $table->integer('positive_male_50_54');
            $table->integer('positive_male_55');
            $table->integer('positive_female_0_14');
            $table->integer('positive_female_15_19');
            $table->integer('positive_female_20_24');
            $table->integer('positive_female_25_49');
            $table->integer('positive_female_50_54');
            $table->integer('positive_female_55');
            $table->integer('pdp_male_0_14');
            $table->integer('pdp_male_15_19');
            $table->integer('pdp_male_20_24');
            $table->integer('pdp_male_25_49');
            $table->integer('pdp_male_50_54');
            $table->integer('pdp_male_55');
            $table->integer('pdp_female_0_14');
            $table->integer('pdp_female_15_19');
            $table->integer('pdp_female_20_24');
            $table->integer('pdp_female_25_49');
            $table->integer('pdp_female_50_54');
            $table->integer('pdp_female_55');
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
        Schema::dropIfExists('genders');
    }
}
