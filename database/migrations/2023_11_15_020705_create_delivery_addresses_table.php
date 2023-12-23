<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryAddressesTable extends Migration
{
    public function up()
    {
        Schema::create('delivery_addresses', function (Blueprint $table) {
            $table->id(); // Primary key and auto-increment
            $table->unsignedBigInteger('shipment_id');
            $table->string('consignor');
            $table->string('address_line_1');
            $table->string('address_line_2')->nullable();
            $table->string('address_line_3')->nullable();
            $table->string('town');
            $table->string('country');
            $table->string('postal_code');
            $table->string('contact');
            $table->string('telephone');
            $table->string('consignee_email');
            $table->timestamps(); // Created at and updated at timestamps
            $table->foreign('shipment_id')->references('id')->on('shipments')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('delivery_addresses');
    }
}
