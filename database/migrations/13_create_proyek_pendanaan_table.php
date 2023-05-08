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
    Schema::create('proyek_pendanaan', function (Blueprint $table) {
      $table->increments('id_proyek_pendanaan');
      $table->integer('jumlah_dana');
      $table->string('file_kontrak_admin')->nullable();
      $table->string('file_kontrak_pengusaha')->nullable();
      $table->string('file_kontrak_pendana')->nullable();
      $table->integer('nominal_bagi_hasil')->default(0);
      $table->string('bukti_bagi_hasil')->nullable();

      // Foreign Key Column
      $table->integer('id_deskripsi_usaha')->unsigned();
      $table->integer('id_pemilik_usaha')->unsigned();
      $table->integer('id_pendana')->unsigned();
      $table->integer('status_pendanaan')->unsigned();

      // Foreign Key Relation
      $table->foreign('id_deskripsi_usaha')->references('id_deskripsi_usaha')->on('deskripsi_usaha')->onDelete('cascade');
      $table->foreign('id_pemilik_usaha')->references('id_pemilik_usaha')->on('pemilik_usaha')->onDelete('cascade');
      $table->foreign('id_pendana')->references('id_pendana')->on('pendana')->onDelete('cascade');
      $table->foreign('id_status_pendanaan')->references('id_status_pendanaan')->on('status_pendanaan')->onDelete('cascade');

      // Timestamps
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('proyek_pendanaan');
  }
};
