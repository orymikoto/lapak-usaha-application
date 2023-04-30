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
            $table->increments('id_pemilik_usaha')->primary();
            $table->string('username', 20);
            $table->string('email', 50)->unique();
            $table->string('password', 24)->unique();
            $table->string('nama', 50);
            $table->string('no_hp', 20);
            $table->string('no_ktp', 16);
            $table->string('pekerjaan_sampingan', 30)->nullable();
            $table->string('alamat_rumah', 50);
            $table->string('kecamatan', 50);
            $table->string('kota', 50);
            $table->string('provinsi', 50);
            $table->string('no_rekening', 20);

            // Foreign Key Column
            $table->char('id_bank', '4')->nullable();

            // Foreign Key Relation
            $table->foreign('id_bank')->references('id_bank')->on('bank')->onDelete('set null');

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
