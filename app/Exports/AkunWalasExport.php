<?php

namespace App\Exports;

use App\Teacher;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class AkunWalasExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Teacher::select('nama', 'nuptk', 'walikelas', 'email', 'password')->get();
    }
    public function headings(): array
    {
        return [
            'nama Walas',
            'NUPTK',
            'Walikelas',
            'email',
            'password'
        ];
    }
}
