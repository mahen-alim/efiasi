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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('service_id'); // Tambahkan kolom service_id
            $table->string('tipe_service');
            $table->string('sparepart');
            $table->integer('qty')->default(0);
            $table->integer('price_total')->default(0);
            $table->integer('income')->default(0);
            $table->date('trans_time')->default(now());
            $table->enum('money_type', ['Pendapatan', 'Pengeluaran', 'Laba Rugi']);
            $table->timestamps();

            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
