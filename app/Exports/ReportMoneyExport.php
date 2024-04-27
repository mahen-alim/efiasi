<?php

namespace App\Exports;

use App\Models\Report;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ReportMoneyExport implements FromCollection, WithHeadings
{
    /**
     * Mendapatkan data yang akan diekspor ke Excel.
     *
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Report::select('id', 'tipe_service', 'duration', 'price_total', 'trans_time')->get();
    }

    /**
     * Menentukan judul kolom untuk file Excel.
     */
    public function headings(): array
    {
        return [
            'No',
            'Jenis Layanan',
            'Durasi Pengerjaan',
            'Total Harga',
            'Tanggal',
        ];
    }
}
