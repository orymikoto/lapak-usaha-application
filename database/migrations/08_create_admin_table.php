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
    Schema::create('admin', function (Blueprint $table) {
      $table->increments('id_admin');
      $table->string('username', 20);
      $table->string('email', 50)->unique();
      $table->string('password')->unique();
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
    Schema::dropIfExists('admin');
  }
};
