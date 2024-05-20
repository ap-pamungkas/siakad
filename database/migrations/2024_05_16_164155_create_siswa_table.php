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
        Schema::create('siswa', function (Blueprint $table) {
              $table->uuid('id')->primary();
              $table->integer('nisn')->unique();
              $table->string('nama');
              $table->string('jk');
              $table->string('tempat_lahir');
              $table->date('tgl_lahir');
              $table->text('alamat');
              $table->string('orang_tua_Wali');
              $table->integer('tlp');
              $table->string('kelas_id');

               $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa');
    }
};
