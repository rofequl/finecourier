<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('shipper_address');
            $table->string('receiver_address');
            $table->string('shipping_type');
            $table->string('peace');
            $table->string('weight');
            $table->string('weight_type');
            $table->string('origin_country');
            $table->string('good_value');
            $table->string('origin_currency');
            $table->string('shipment_reference')->nullable();
            $table->text('remarks')->nullable();
            $table->string('payment_type');
            $table->string('delivery_type');
            $table->string('parcel_content')->nullable();
            $table->string('price');
            $table->string('tracking_code')->nullable();
            $table->string('user_id');
            $table->string('status')->default(0);
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
        Schema::dropIfExists('shipments');
    }
}
