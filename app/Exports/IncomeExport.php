<?php

namespace App\Exports;

use App\Models\Income;
use App\Models\Report;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class IncomeExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        // Mengambil semua data dari model Income dengan relasi Reservation
        $incomes = Income::with('reservation')->get();

        // Menambahkan nomor urut pada setiap baris data
        $data = $incomes->map(function ($income, $key) {
            return [
                $key + 1, // Nomor urut dimulai dari 1
                $income->tipe_service,
                $income->duration,
                $income->total_price,
                $income->reservation->tanggal_pemesanan, // Mengambil nilai trans_time dari relasi Reservation
            ];
        });

        return $data;
    }

    public function headings(): array
    {
        return [
            'No',
            'Jenis Layanan',
            'Durasi Pengerjaan',
            'Total Bayar',
            'Tanggal Pemesanan',
        ];
    }
}
