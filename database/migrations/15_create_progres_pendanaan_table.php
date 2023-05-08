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
    Schema::create('progres_pendanaan', function (Blueprint $table) {
      $table->increments('id_progres_pendanaan');
      $table->date('tanggal_laporan_progres_pendanaan');
      $table->string('keterangan');
      $table->string('laporan_keuangan');

      // Foreign Key Column
      $table->integer('id_proyek_pendanaan')->unsigned();

      // Foreign Key Relation
      $table->foreign('id_proyek_pendanaan')->references('id_proyek_pendanaan')->on('proyek_pendanaan')->onDelete('cascade');

      // Timestamps
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('progres_pendanaan');
  }
};
