<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('shipments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pickup_address_id');
            $table->unsignedBigInteger('delivery_address_id');
            
            // Define foreign key constraints
            $table->foreign('pickup_address_id')->references('id')->on('pickup_addresses');
            $table->foreign('delivery_address_id')->references('id')->on('delivery_addresses');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipments');
    }
};
