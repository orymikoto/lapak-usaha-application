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
    Schema::create('pemilik_usaha', function (Blueprint $table) {
      $table->increments('id_pemilik_usaha');
      $table->string('username', 20);
      $table->string('email', 50)->unique();
      $table->string('password')->unique();
      $table->string('nama', 50);
      $table->string('no_hp', 20)->nullable();
      $table->string('no_ktp', 16)->nullable();
      $table->string('pekerjaan_sampingan', 30)->nullable();
      $table->string('alamat_rumah', 50)->nullable();
      $table->string('kecamatan', 50)->nullable();
      $table->string('kota', 50)->nullable();
      $table->string('provinsi', 50)->nullable();
      $table->string('no_rekening', 20)->nullable();

      // Foreign Key Column
      $table->integer('id_bank')->nullable()->unsigned();

      // Foreign Key Relation
      $table->foreign('id_bank')->references('id_bank')->on('bank')->nullOnDelete();

      // Timestamps
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('pemilik_usaha');
  }
};
