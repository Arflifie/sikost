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
        Schema::create('tagihan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('penyewa_id');
            $table->unsignedBigInteger('booking_id');
            $table->integer('jumlah_tagihan');
            $table->date('tanggal_tagihan');
            $table->enum('status', ['belum bayar','menunggu_konfirmasi','lunas']);
            $table->string('bukti_pembayaran')->nullable();
            $table->timestamps();
            
            $table->foreign('penyewa_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('booking_id')->references('id')->on('booking')->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tagihan');
    }
};
