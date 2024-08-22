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
        Schema::create('user_information', function (Blueprint $table) {
            $table->id('user_info_id'); // Primary Key
            $table->char('user_id', 12)->unique()->notNullable(); // Foreign Key reference from the User Table

            $table->foreign('user_id')->references('user_id')->on('user_account')->onDelete('cascade');
            $table->string('first_name', 20)->notNullable();
            $table->string('mid_name', 20)->nullable();
            $table->string('last_name', 20)->notNullable();
            $table->char('gender', 1)->notNullable()->comment('M = Male, F = Female, P = Prefer not to say, O = Others');
            $table->date('birth_date')->notNullable();
            $table->char('phone_number', 11)->notNullable();
            $table->char('subs_status', 1)->notNullable()->comment('B = Basic, P = Premium');

            $table->timestamp('created_at')->nullable();
            $table->timestamp('modified_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_information');
    }
};
