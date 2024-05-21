<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id(); // Primary key, unsigned bigint by default
            $table->string('name')->nullable();
            $table->string('color')->nullable();
            $table->string('plate_number')->nullable();
            $table->unsignedBigInteger('customers_id')->nullable(); // Add the customers_id column
            $table->unsignedBigInteger('users_id')->nullable(); // Add the users_id column
            $table->timestamps();

            // Define foreign key constraints
            $table->foreign('customers_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
