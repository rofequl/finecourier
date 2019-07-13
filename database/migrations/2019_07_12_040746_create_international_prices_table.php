<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInternationalPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('international_prices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('from_country');
            $table->string('to_country');
            $table->string('shipping_type');
            $table->string('weight_type');
            $table->string('delivery_type');
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
        Schema::dropIfExists('international_prices');
    }
}
