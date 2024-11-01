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
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->string('PurchaseOrderID')->primary();
            $table->string('Status');
            $table->string('SupplierCode');
            $table->string('ItemCode');
            $table->date('OrderDate');
            $table->integer('Qty');
            $table->string('UnitPrice');
            $table->boolean('Is_Tax');
            $table->string('Tax');
            $table->string('TotalAmount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_orders');
    }
};
