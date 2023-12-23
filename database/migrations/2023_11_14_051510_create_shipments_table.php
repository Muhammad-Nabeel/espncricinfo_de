<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShipmentsTable extends Migration
{
    public function up()
    {
        Schema::create('shipments', function (Blueprint $table) {
            $table->id();
            // Add other fields provided
            $table->string('consignment_number')->nullable();
            $table->string('purchase_order_number')->nullable();
            $table->string('ref2')->nullable();
            $table->text('invoice_note')->nullable();
            $table->string('third_party_email')->nullable();
            $table->string('notification_email')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('shipments');
    }
}
