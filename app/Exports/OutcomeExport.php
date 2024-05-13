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
        $outcome = Outcome::all();

        // Menambahkan nomor urut pada setiap baris data
        $data = $outcome->map(function ($outcome, $key) {
            return [
                $key + 1,
                $outcome->cost_type,
                $outcome->created_at,
            ];
        });

        return $data;
    }

    public function headings(): array
    {
        return [
            'No',
            'Jenis Biaya',
            'Tanggal',
        ];
    }
}
