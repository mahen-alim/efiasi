<?php

namespace App\Exports;

use App\Models\Service;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ServiceExport implements FromCollection, WithHeadings
{
    /**
     * Mendapatkan data yang akan diekspor ke Excel.
     *
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Service::select('id', 'tipe_service', 'sparepart', 'price')->get();
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
            'Jenis Servis',
            'Sparepart',
            'Harga',
        ];
    }
}
