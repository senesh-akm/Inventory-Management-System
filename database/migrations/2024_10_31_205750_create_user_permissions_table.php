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
        Schema::create('user_permissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->boolean('dashboard')->default(true);
            $table->boolean('adjestment')->default(false);
            $table->boolean('customer')->default(false);
            $table->boolean('supplier')->default(false);
            $table->boolean('item')->default(false);
            $table->boolean('products')->default(false);
            $table->boolean('product_category')->default(false);
            $table->boolean('product')->default(false);
            $table->boolean('purchase_order')->default(false);
            $table->boolean('sales_order')->default(false);
            $table->boolean('store')->default(false);
            $table->boolean('warehouse')->default(false);
            $table->boolean('stock_location')->default(false);
            $table->boolean('transaction')->default(false);
            $table->boolean('settings')->default(false);
            $table->boolean('users')->default(false);
            $table->boolean('user_permission')->default(false);
            $table->boolean('theme')->default(false);
            $table->boolean('reports')->default(false);
            $table->boolean('sales_report')->default(false);
            $table->boolean('purchase_report')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_permissions');
    }
};
