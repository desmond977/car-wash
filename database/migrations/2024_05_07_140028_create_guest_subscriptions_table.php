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
        Schema::create('guest_subscriptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('subscriptions_id');
            $table->unsignedBigInteger('guests_id');
            $table->foreignId('users_id')
            ->nullable()
            ->constrained('users')
            ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guest_subscriptions');
    }
};
