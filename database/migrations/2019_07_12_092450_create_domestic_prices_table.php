<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDomesticPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domestic_prices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('country');
            $table->string('from_city');
            $table->string('from_state');
            $table->string('to_city');
            $table->string('to_state');
            $table->string('shipping_type');
            $table->string('weight_type');
            $table->string('max_weight');
            $table->string('max_price');
            $table->string('per_weight');
            $table->string('price');
            $table->string('currency');
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
        Schema::dropIfExists('domestic_prices');
    }
}
