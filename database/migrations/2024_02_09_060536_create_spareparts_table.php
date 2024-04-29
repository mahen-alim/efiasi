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
        Schema::create('spareparts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');
            $table->integer('jumlah');
            $table->integer('price');
            $table->string('merk');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('spareparts');
    }
};
