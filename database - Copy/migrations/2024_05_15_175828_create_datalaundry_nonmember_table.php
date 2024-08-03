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
        Schema::create('datalaundry_nonmember', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_transaksi');
            $table->string('nama_customer', 150);
            $table->text('alamat');
            $table->string('no_telp', 16);
            $table->unsignedBigInteger('id_pegawai');
            $table->foreign('id_pegawai')->references('id')->on('pegawai');
            $table->text('keterangan');
            $table->enum('status_laundry', ['menunggu', 'diproses', 'selesai']);
            $table->enum('status_pembayaran', ['bayar', 'belum']);
            $table->text('lokasi_kirim');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datalaundry_nonmember');
    }
};
