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
        return Report::select('id', 'sparepart', 'qty', 'tipe_service', 'trans_time')->get();
    }

    /**
     * Menentukan judul kolom untuk file Excel.
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'No',
            'Sparepart',
            'Jumlah Barang',
            'Jenis Layanan',
            'Tanggal'
        ];
    }
}
