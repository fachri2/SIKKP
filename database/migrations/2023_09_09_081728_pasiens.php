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
        Schema::create('pasien', function (Blueprint $table) {
            $table->id();
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('nama_lengkap', 50);
            $table->enum('jenis_konsultasi', ['Mandiri', 'Rawat Inap']);
            $table->integer('nik');
            $table->integer('umur');
            $table->integer('berat_badan');
            $table->integer('tinggi_badan');
            $table->integer('aktivitas');
            $table->integer('tingkat_kesehatan');
            $table->string('riwayat_penyakit', 255)->default('text');
            $table->string('keteranggan', 255)->default('text');
            $table->float('kalori');
            $table->float('bmi');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
