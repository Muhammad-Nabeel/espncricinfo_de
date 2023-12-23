<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToShipmentsTable extends Migration
{
    public function up()
    {
        Schema::table('shipments', function (Blueprint $table) {
            $table->string('consignment_number')->nullable();
            $table->string('purchase_order_number')->nullable();
            $table->string('ref2')->nullable();
            $table->text('invoice_note')->nullable();
            $table->string('third_party_email')->nullable();
            $table->string('notification_email')->nullable();
        });
    }

    public function down()
    {
        Schema::table('shipments', function (Blueprint $table) {
            $table->dropColumn('consignment_number');
            $table->dropColumn('purchase_order_number');
            $table->dropColumn('ref2');
            $table->dropColumn('invoice_note');
            $table->dropColumn('third_party_email');
            $table->dropColumn('notification_email');
        });
    }
}
