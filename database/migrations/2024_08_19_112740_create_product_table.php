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
        Schema::create('product', function (Blueprint $table) {
            $table->id('product_id'); // Primary Key

            $table->string('product_name', 100); // Product name
            $table->decimal('product_price', 10, 2); // Product price
            $table->string('product_url', 255); // URL of the product

            $table->timestamp('created_at')->nullable(); // Created timestamp
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
