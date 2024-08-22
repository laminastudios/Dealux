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
        Schema::create('purchase', function (Blueprint $table) {
            $table->id('purchase_id'); // Primary Key

            $table->char('user_id', 12)->notNullable(); // Foreign key matching user_account table
            $table->foreign('user_id')->references('user_id')->on('user_account')->onDelete('cascade');

            $table->unsignedBigInteger('payment_info_id'); // Foreign key matching payment_information table
            $table->foreign('payment_info_id')->references('payment_info_id')->on('payment_information')->onDelete('cascade');

            $table->decimal('total_amount', 10, 2); // Assuming currency format
            $table->string('mode_of_payment', 50); // Example: Credit Card, PayPal, etc.
            $table->string('purchase_status', 50); // Example: Pending, Completed, etc.

            $table->timestamp('created_at')->useCurrent()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase');
    }
};
