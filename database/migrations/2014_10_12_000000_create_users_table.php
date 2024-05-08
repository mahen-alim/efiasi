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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->nullable();
            $table->text('alamat')->nullable();
            $table->string('email')->unique();
            $table->string('no_hp')->nullable(); // Menetapkan nilai default untuk integer
            $table->string('location')->nullable(); // Menetapkan nilai default untuk text
            $table->text('quote')->nullable(); // Menetapkan nilai default untuk text
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('profile_picture')->nullable();
            $table->enum('level', ['ADMIN', 'END USER'])->default('ADMIN'); // Kolom level menggunakan tipe enum
            $table->string('google_id')->nullable(); // Kolom google_id diberi nullable
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
