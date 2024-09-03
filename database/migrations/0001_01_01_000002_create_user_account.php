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
        Schema::create('user_account', function (Blueprint $table) {
            $table->char('user_id', 12)->primary(); // Primary Key

            $table->string('user_name', 30)->unique()->notNullable();
            $table->string('email', 30)->unique()->notNullable();
            $table->char('password', 60)->notNullable();
            // $table->string('api_token', 64)->unique();

            $table->timestamp('created_at')->useCurrent()->nullable();
            $table->timestamp('modified_at')->useCurrent()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_account');
    }
};
