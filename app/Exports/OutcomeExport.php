<?php

namespace App\Exports;

use App\Models\Income;
use App\Models\Outcome;
use App\Models\Report;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OutcomeExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        // Mengambil semua data dari model Income dengan relasi Reservation
        $outcome = Outcome::with('sparepart')->get();

        // Menambahkan nomor urut pada setiap baris data
        $data = $outcome->map(function ($outcome, $key) {
            return [
                $key + 1, // Nomor urut dimulai dari 1
                $outcome->cost_type,
                $outcome->sparepart->name,
                $outcome->sparepart->jumlah,
                $outcome->sparepart->merk,
                $outcome->sparepart->price,
                $outcome->created_at, // Mengambil nilai trans_time dari relasi Reservation
            ];
        });

        return $data;
    }

    public function headings(): array
    {
        return [
            'No',
            'Jenis Biaya',
            'Nama Variasi',
            'Jumlah Variasi',
            'Merek Variasi',
            'Harga Pemasangan',
            'Tanggal',
        ];
    }
}
