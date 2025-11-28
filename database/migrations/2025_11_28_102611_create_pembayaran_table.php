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
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id('id_pembayaran');
            
            $table->foreignId('booking_id')->constrained('booking', 'id_booking')->onDelete('cascade');
            
            $table->unsignedBigInteger('total_pembayaran');
            
            $table->string('status')->default('pending');
            $table->string('jenis_pembayaran')->nullable();
            $table->string('metode_pembayaran')->nullable();
            $table->string('midtrans_code')->nullable();
            
            $table->date('tenggat_penyewaan')->nullable();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};
