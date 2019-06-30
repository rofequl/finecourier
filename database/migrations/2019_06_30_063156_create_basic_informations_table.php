<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBasicInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('basic_informations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('website_title')->nullable();
            $table->string('company_name')->nullable();
            $table->string('phone_number_one')->nullable();
            $table->string('phone_number_two')->nullable();
            $table->string('email')->nullable();
            $table->string('website_link')->nullable();
            $table->string('facebook_link')->nullable();
            $table->string('twiter_link')->nullable();
            $table->string('google_plus_link')->nullable();
            $table->string('linkedin_link')->nullable();
            $table->string('pinterest_link')->nullable();
            $table->string('footer_text')->nullable();
            $table->string('address')->nullable();
            $table->string('company_logo')->nullable();
            $table->boolean('status')->nullable();
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
        Schema::dropIfExists('basic_informations');
    }
}
