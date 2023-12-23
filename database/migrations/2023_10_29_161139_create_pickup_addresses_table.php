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
        Schema::create('pickup_addresses', function (Blueprint $table) {
            $table->id(); // Primary key and auto-increment
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
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pickup_addresses');
    }
};
