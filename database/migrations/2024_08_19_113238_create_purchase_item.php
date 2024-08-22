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
        Schema::create('purchase_item', function (Blueprint $table) {
            $table->id('purchase_item_id'); // Primary Key
            $table->unsignedBigInteger('purchase_id'); // Foreign key to the purchase table
            $table->unsignedBigInteger('product_id'); // Foreign key to the product table

            $table->integer('quantity'); // Quantity of the product

            $table->timestamp('created_at')->nullable();

            // Foreign key constraints
            $table->foreign('purchase_id')->references('purchase_id')->on('purchase')->onDelete('cascade');
            $table->foreign('product_id')->references('product_id')->on('product')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_item');
    }
};
