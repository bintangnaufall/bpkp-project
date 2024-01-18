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
        Schema::create('surats', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_surat');
            $table->string('nomor_surat');
            $table->string('keterangan_lampiran');
            $table->string('perihal_surat');
            $table->string('instansi/pejabat_tujuan_surat');
            $table->string('alamat_instansi/pejabat');
            $table->string('dasar_acuan_penugasan');
            $table->string('beban_anggaran');
            $table->unsignedBigInteger('nama_pejabat');
            $table->string('tembusan');
            $table->boolean('e2');
            $table->boolean('e3');
            $table->boolean('e4');
            $table->unsignedBigInteger('pembuat_surat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surats');
    }
};
