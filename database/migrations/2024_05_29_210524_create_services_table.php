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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('wash');
            $table->string('vacuum_cleaning');
            $table->string('flush');
            $table->string('engine_wash');
            $table->string('Guest_wash');
            $table->string('tire_guage');
            $table->string('engine_blow');
            $table->string('dashboard_polish');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');

    }
};
