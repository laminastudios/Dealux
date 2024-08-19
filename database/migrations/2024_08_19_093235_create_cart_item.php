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
        Schema::create('cart_item', function (Blueprint $table) {
            $table->id('cart_item_id'); // Primary Key
            $table->foreignId('user_id'); // Foreign Key
            $table->string('product_name');
            $table->decimal('product_price', 8, 2); // Assuming price format
            $table->string('product_url');
            $table->integer('quantity');
            $table->boolean('selected')->default(false);
            $table->timestamps(); // created_at and modified_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_item');
    }
};
