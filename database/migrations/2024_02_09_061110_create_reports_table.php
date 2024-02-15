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
            $table->string('tipe_service')->unique();
            $table->string('sparepart')->unique();
            $table->integer('qty');
            $table->integer('price_total');
            $table->integer('income');
            $table->date('trans_time');
            $table->enum('money_type', ['Transaksi Penjualan', 'Investasi']);
            $table->timestamps();
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
