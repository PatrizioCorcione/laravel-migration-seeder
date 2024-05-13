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
        Schema::create('trains', function (Blueprint $table) {
            $table->id();
            $table->string('company', 100);
            $table->string('slug', 100)->unique();
            $table->string('arrival_station', 100);
            $table->string('departure_station', 100);
            $table->time('time_departure');
            $table->time('time_arrival');
            $table->string('train_code', 10);
            $table->tinyInteger('carriage_number');
            $table->boolean('in_time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trains');
    }
};
