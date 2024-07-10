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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('SupplierCode', 5);
            $table->string('Supplier');
            $table->string('ContactTitle', 255);
            $table->string('ContactName', 255);
            $table->string('Address', 255);
            $table->string('City', 255);
            $table->string('PostalCode', 20);
            $table->string('Country', 255);
            $table->string('Phone', 20);
            $table->string('Email', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};
