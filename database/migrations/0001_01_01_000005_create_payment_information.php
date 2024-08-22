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
        Schema::create('payment_information', function (Blueprint $table) {
            $table->id('payment_info_id'); // Primary Key

            $table->char('user_id', 12)->notNullable(); // Foreign Key reference
            $table->foreign('user_id')->references('user_id')->on('user_account')->onDelete('cascade');

            $table->string('delivery_address', 100)->notNullable();

            $table->timestamp('created_at')->nullable();
            $table->timestamp('modified_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_information');
    }
};
