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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_invoice');
            $table->date('tanggal_invoice');
            $table->string('jenis_pengiriman');
            $table->integer('total_invoice');
            $table->string('file_nomor_tanda_terima');
            // $table->binary('foto_bukti_tanda_terima');
            $table->date('tanggal_pengiriman');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
