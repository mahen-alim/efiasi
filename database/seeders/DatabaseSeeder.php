<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Report;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         // Ambil contoh laporan
         $report = Report::find(1);

         // ID layanan yang ingin Anda hubungkan dengan laporan
         $serviceIds = [1, 2];
 
         // Menambahkan hubungan antara laporan dan layanan
         $report->services()->attach($serviceIds);

    }
}
