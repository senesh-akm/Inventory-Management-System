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
            $table->string('SupplierCode');
            $table->string('ItemCode');
            $table->date('OrderDate');
            $table->integer('Qty');
            $table->decimal('UnitPrice', 8, 2);
            $table->decimal('TotalAmount', 10, 2);
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
