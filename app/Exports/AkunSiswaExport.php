<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class AkunSiswaExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return User::select('id', 'nama_siswa', 'nisn', 'email', 'password')->get();
    }
    public function headings(): array
    {
        return [
            'No',
            'nama_siswa',
            'nisn',
            'email',
            'password'
        ];
    }
}
