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
        Schema::create('sales_orders', function (Blueprint $table) {
            $table->string('SalesOrderID')->primary();
            $table->string('CustomerCode');
            $table->string('ProductCode');
            $table->string('ItemCode');
            $table->date('OrderDate');
            $table->integer('Qty');
            $table->string('UnitPrice');
            $table->string('TotalAmount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales_orders');
    }
};
