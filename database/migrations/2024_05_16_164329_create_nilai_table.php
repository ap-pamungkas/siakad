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
        Schema::create('nilai', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('siswa_id');
            $table->string('mapel_id');


            $table->string('kelas_id');
            $table->integer('tugas');
            $table->integer('nilai_uts');
            $table->integer('nilai_uas');
            $table->string('nilai_ulangan');
            $table->string('nilai_akhir');
            $table->string('guru_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai');

    }
};
