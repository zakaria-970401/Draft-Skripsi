<?php

namespace App\Exports;

use App\User;
use App\DataSiswaModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DataSiswaExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return DataSiswaModel::select('nama_siswa', 'nisn', 'id_jurusan', 'id_kelas', 'id_agama', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'alamat', 'no_hp', 'nama_ayah', 'nama_ibu')->get();
    }
    public function headings(): array
    {
        return [
            'namasiswa',
            'nisn',
            'id_jurusan',
            'id_kelas',
            'id_agama',
            'jenis_kelamin',
            'tempat_lahir',
            'tanggal_lahir',
            'alamat',
            'no_hp',
            'nama_ayah',
            'nama_ibu'
        ];
    }
}
