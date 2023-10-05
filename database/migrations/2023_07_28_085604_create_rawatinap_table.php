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
        Schema::create('inap', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('jenis_konsultasi');
            $table->string('jenis_kelamin');
            $table->integer('umur');
            $table->integer('nik');
            $table->integer('kalori');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rawatinap');
    }
};
