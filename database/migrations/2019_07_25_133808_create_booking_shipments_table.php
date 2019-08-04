<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingShipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_shipments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('booking_type');
            $table->string('pickup_date')->nullable();
            $table->string('pickup_delivery')->nullable();
            $table->string('from_country');
            $table->string('to_country')->nullable();
            $table->string('shipping_type');
            $table->string('weight');
            $table->string('weight_type');
            $table->string('delivery_type');
            $table->string('dimenshion')->nullable();
            $table->string('shipper_name');
            $table->string('shipper_phone');
            $table->string('shipper_email');
            $table->text('shipper_address');
            $table->string('receiver_name');
            $table->string('receiver_phone');
            $table->string('receiver_email');
            $table->text('receiver_address');
            $table->string('price')->nullable();
            $table->string('currency')->nullable();
            $table->string('tracking_code')->nullable();
            $table->string('payment_status')->default(0);
            $table->boolean('status')->default('0');
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
        Schema::dropIfExists('booking_shipments');
    }
}
