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
            $table->string('shipment');
            $table->string('shipping_type');
            $table->string('peace');
            $table->string('weight');
            $table->string('weight_type');
            $table->string('origin_country');
            $table->string('good_value');
            $table->string('origin_currency');
            $table->string('shipment_reference')->nullable();
            $table->text('remarks')->nullable();
            $table->string('payment_type')->nullable();
            $table->string('delivery_type');
            $table->string('parcel_content')->nullable();
            $table->string('price');
            $table->string('currency');
            $table->string('address_one');
            $table->string('address_two');
            $table->string('tracking_code')->nullable();
            $table->string('biller_address')->nullable();
            $table->string('user_id');
            $table->string('payment_status')->default(0);
            $table->string('status')->default(0);
            $table->string('block')->default(0);
            $table->string('driver')->nullable();
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
