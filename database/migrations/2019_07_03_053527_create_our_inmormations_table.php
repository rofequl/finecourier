<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOurInmormationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('our_inmormations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('mission_title')->nullable();
            $table->text('mission')->nullable();
            $table->string('vision_title')->nullable();
            $table->text('vision')->nullable();
            $table->text('who_we_are')->nullable();
            $table->text('image')->nullable();
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
        Schema::dropIfExists('our_inmormations');
    }
}
