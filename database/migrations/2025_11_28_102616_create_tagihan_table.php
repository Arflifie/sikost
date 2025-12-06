yg ini 
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
            $table->id('id_tagihan');
            
            $table->foreignId('booking_id')->constrained('booking', 'id_booking')->onDelete('cascade');
            
            $table->foreignId('pembayaran_id')->nullable()->constrained('pembayaran', 'id_pembayaran')->onDelete('set null');
            
            $table->date('tanggal_tagihan')->useCurrent();
            $table->date('tanggal_check_out_new')->nullable();
            
            $table->unsignedBigInteger('biaya');
            $table->timestamps();
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