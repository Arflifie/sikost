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
    Schema::create('pelaporan', function (Blueprint $table) {
        $table->id('id_pelaporan');
        
        $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
        
        $table->string('no_kamar')->nullable();
        $table->text('keluhan');
        $table->text('deskripsi_keluhan')->nullable();
        
        $table->text('foto_bukti')->nullable();
        $table->text('foto_after_perbaikan')->nullable();
        
        $table->dateTime('waktu_keluhan')->useCurrent();
        $table->date('tanggal_keluhan')->useCurrent();
        
        $table->string('status_admin')->nullable();
        $table->string('status_ob')->nullable();
        
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelaporan');
    }
};
