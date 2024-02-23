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
        Schema::create('operationals', function (Blueprint $table) {
            $table->id();
            $table->string('type_cost');
            $table->integer('nominal');
            $table->enum('category', ['Administrasi', 'Bahan Baku & Persediaan', 'Penjualan', 'Asuransi', 'Pembiayaan', 'Penyusutan', 'Pemeliharaan & Perbaikan', 'Transportasi', 'Penggajian']);
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('operationals');
    }
};
