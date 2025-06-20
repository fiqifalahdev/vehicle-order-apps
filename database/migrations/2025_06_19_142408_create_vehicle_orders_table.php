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
        Schema::create('vehicle_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_id')
                ->constrained('vehicles')
                ->onDelete('cascade');
            $table->string('order_number')->unique('ix_order_number');
            $table->date('order_date'); // kendaraan dipesan
            $table->date('order_return_date')->nullable(); // kapan kendaraan dikembalikan
            $table->enum('order_status', ['waiting', 'approved_level_1', 'approved_level_2', 'rejected_level_1', 'rejected_level_2', 'completed', 'cancelled'])
                ->default('waiting');
            // Approval Logs
            $table->string('approved_by_1')->nullable(); // nama yang menyetujui order pertama
            $table->dateTime('approved_at_1')->nullable(); // waktu order pertama disetujui
            $table->string('approved_by_2')->nullable(); // nama yang menyetujui order kedua
            $table->dateTime('approved_at_2')->nullable(); // waktu order kedua disetujui
            // Customer Details
            $table->string('driver_name');
            $table->string('driver_phone');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_orders');
    }
};
