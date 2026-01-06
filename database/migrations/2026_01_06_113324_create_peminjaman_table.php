<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id();
            $table->string('nama_peminjam');
            $table->string('rt_peminjam');
            $table->foreignId('alat_id')->constrained('alat')->onDelete('cascade');
            $table->date('tanggal_pinjam');
            $table->integer('durasi');
            $table->integer('total');
            $table->enum('status', ['Pending', 'Dipinjam', 'Selesai'])->default('Pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('peminjaman');
    }
};