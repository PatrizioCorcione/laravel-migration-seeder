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
            $table->string('slug', 100)->unique();
            $table->string('company', 100);
            $table->string('arrival_station', 100);
            $table->string('departure_station', 100);
            $table->time('time_departure');
            $table->time('time_arrival');
            $table->char('train_code', 12);
            $table->tinyInteger('carriage_number')->nullable();
            $table->boolean('in_time')->default(true);
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
