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
        Schema::create('sellings', function (Blueprint $table) {
            $table->string('SellCode')->primary()->unique();
            $table->string('ItemCode');
            $table->string('ProductCode');
            $table->string('SupplierCode');
            $table->string('CustomerCode');
            $table->string('UnitPrice');
            $table->string('Tax');
            $table->string('TotalAmount');
            $table->string('Status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sellings');
    }
};
