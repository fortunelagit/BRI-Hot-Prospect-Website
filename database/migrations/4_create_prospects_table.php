<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prospects', function (Blueprint $table) {
            $table->id();
            $table->string('PN');
            $table->foreign('PN')->references('PN')->on('users');
            $table->string('nama_CPP');
            $table->string('jenis_usaha');
            $table->string('sektor_industri');
            $table->string('alamat_usaha');
            $table->enum('sumber_pipeline', ['Business as Usual / Canvasing', 'Lunas Putus', 'Debitur Naik Kelas', 'Nasabah Simpanan', 'Brispot Simpanan', 'Link 5', 'Value Chain']);
            $table->enum('fasilitas', ['Baru', 'Suplesi / Tambah Fasilitas', 'Take Over']);
            $table->enum('segmen_kredit', ['Kecil Non PEN', 'Kecil PEN GEN-2', 'KUR Kecil', 'UpperSmall Kecil', 'UpperSmall PEN GEN-2', 'Cashcol', 'Non Cashcol', 'KUR', 'Upper Small']);
            $table->enum('jenis_kredit', ['KMK', 'KI']);
            $table->integer('potensial_kredit');
            $table->integer('omzet_bulanan');
            $table->integer('laba_bulanan');
            $table->integer('mutasi_rekening_bri');
            $table->integer('mutasi_rekening_bank_lainnya');
            $table->integer('saldo_simpanan_bri');
            $table->integer('saldo_simpanan_bank_lainnya');
            $table->enum('segmen', ['Kecil', 'Program']);
            $table->integer('kode_unit');
            $table->string('unit');
            $table->string('branch');
            $table->enum('status_prospek', ['Proses Pengerjaan', 'Sudah Putusan', 'Sudah Realisasi', 'Batal', 'Carry Over'])->default('Proses Pengerjaan');
            $table->date('estimasi_realisasi');
            $table->enum('status_approval', ['Disetujui', 'Belum Disetujui', 'Ditolak'])->default('Belum Disetujui');
            $table->string('PN_approval')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prospects');
    }
};
