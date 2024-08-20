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
        Schema::create('api_tokens_list', function (Blueprint $table) {
            $table->id('api_token_id'); // Primary Key
            $table->foreignId('user_id')->constrained('user_account')->onDelete('cascade'); // Foreign Key to User Account
            $table->string('api_token', 64)->unique(); // API Token
            $table->timestamps('created_at', 'modified_at');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('api_tokens_list');
    }
};
