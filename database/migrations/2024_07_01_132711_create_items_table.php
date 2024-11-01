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
        Schema::create('items', function (Blueprint $table) {
            $table->string('ItemCode')->primary()->unique();
            $table->string('ItemPicture')->nullable();
            $table->date('WarrantyDate');
            $table->string('ItemName');
            $table->string('ItemSerial')->nullable()->unique();
            $table->string('ProductCode');
            $table->string('Description')->nullable();
            $table->string('ReceiivedSupplier');
            $table->string('UnitPrice');
            $table->boolean('TaxStatus');
            $table->string('Tax');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
