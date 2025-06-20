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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('vehicle_name');
            $table->string('vehicle_type');
            $table->string('vehicle_number_plate')->unique('ix_vehicle_number_plate');
            $table->string('vehicle_color');
            $table->integer('vehicle_gas_capacity')->default(0);
            $table->integer('vehicle_gas_level')->default(0);
            $table->enum('vehicle_status', ['available', 'in_use', 'maintenance', 'unavailable'])->default('available');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
