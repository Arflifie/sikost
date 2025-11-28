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
        Schema::create('profile', function (Blueprint $table) {
            $table->id('id_profile');
            
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->unique();
            
            $table->string('nama_lengkap')->nullable();
            $table->text('alamat')->nullable();
            $table->string('no_hp', 20)->nullable();
            $table->string('jenis_kelamin', 10)->nullable();
            $table->string('tempat_tanggal_lahir')->nullable();
            $table->text('foto_profile')->nullable();
            $table->text('foto_ktp')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile');
    }
};
