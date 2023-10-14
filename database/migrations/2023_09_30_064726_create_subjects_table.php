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
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dosen_id')->constrained('users');
            $table->string('title');
            $table->string('semester');
            $table->string('tahun_akademik');
            $table->integer('sks');
            $table->string('kode_matkul');
            $table->string('deskripsi');
            $table->timestamps();

            // $table->foreign('dosen_id', 'dosenid_foreign')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subjects');
    }
};
