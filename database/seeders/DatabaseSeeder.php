<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Report;
use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        // Ambil contoh laporan
        $service = Service::find(1);

        // Cari model Service dengan ID tertentu
        $report = [1,2];

        // Menambahkan hubungan antara laporan dan layanan
        $service->reports()->sync($report);
    }
}
