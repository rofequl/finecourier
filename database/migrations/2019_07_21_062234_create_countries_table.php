<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code')->nullable();
            $table->string('code3')->nullable();
            $table->string('isoCode')->nullable();
            $table->string('numericCode')->nullable();
            $table->integer('geonamesCode')->nullable();
            $table->string('fipsCode')->nullable();
            $table->integer('area')->nullable();
            $table->string('currency')->nullable();
            $table->string('phonePrefix')->nullable();
            $table->string('mobileFormat')->nullable();
            $table->string('landlineFormat')->nullable();
            $table->string('trunkPrefix')->nullable();
            $table->integer('population')->nullable();
            $table->string('continent')->nullable();
            $table->string('language')->nullable();
            $table->string('name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('countries');
    }
}
