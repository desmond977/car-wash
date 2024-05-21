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
        Schema::create('wash_histories', function (Blueprint $table) {
            $table->id(); // Primary key, unsigned bigint by default
            $table->unsignedBigInteger('subscription_id'); // Foreign key column
            $table->dateTime('wash_date'); // Date and time of the wash
            $table->timestamps(); // Laravel's created_at and updated_at columns

            // Define the foreign key constraint
            $table->foreign('subscription_id')
                ->references('id')
                ->on('subscriptions')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guests');
    }
};
