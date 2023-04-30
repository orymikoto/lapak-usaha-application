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
        Schema::create('deskripsi_usaha', function (Blueprint $table) {
            $table->increments('id_deskripsi_usaha');
            $table->integer('tahun_berdiri');
            $table->integer('periode_produksi');
            $table->string('deskripsi');
            $table->integer('target_dana');
            $table->string('foto_usaha');
            $table->string('proposal');

            // Foreign Key Column
            $table->integer('id_pemilik_usaha');
            $table->integer('id_jenis_usaha')->nullable();
            $table->integer('id_status_pengajuan')->nullable();

            // Foreign Key Relation
            $table->foreign('id_pemilik_usaha')->references('id_pemilik_usaha')->on('pemilik_usaha')->onDelete('cascade');
            $table->foreign('id_jenis_usaha')->references('id_jenis_usaha')->on('jenis_usaha')->onDelete('set null');
            $table->foreign('id_status_pengajuan')->references('id_status_pengajuan')->on('status_pengajuan')->onDelete('cascade');

            // Timestamps
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usaha');
    }
};
