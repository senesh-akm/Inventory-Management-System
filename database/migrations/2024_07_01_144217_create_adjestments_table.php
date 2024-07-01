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
        Schema::create('adjestments', function (Blueprint $table) {
            $table->string('ReturnCode')->primary();
            $table->string('Customer');
            $table->string('ProductCode');
            $table->string('ItemCode');
            $table->string('ItemSerial')->nullable();
            $table->string('ReturnDate');
            $table->integer('Quantity');
            $table->string('Reason');
            $table->string('ReceivePerson');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adjestments');
    }
};
