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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customers_id');
            $table->unsignedBigInteger('subscription_types_id');
            $table->integer('number_of_wash');
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();

            $table->foreign('customers_id')
            ->references('id')
            ->on('customers')
            ->onDelete('cascade');

            $table->foreign('subscription_types_id')
            ->references('id')
            ->on('subscription_types')
            ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
