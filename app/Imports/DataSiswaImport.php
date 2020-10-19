<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\DataSiswaModel;

class DataSiswaImport implements ToCollection
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        // dd($collection->all());

        foreach ($collection as $key =>  $row) {
            if ($key >= 2) {
                $tgl_lahir = ($row[8] - 25569) * 86400;
                DataSiswaModel::Create([
                    'nama_siswa' => $row[1],
                    'nisn' => $row[2],
                    'id_jurusan' => $row[3],
                    'id_kelas' => $row[4],
                    'id_agama' => $row[5],
                    'jenis_kelamin' => $row[6],
                    'tempat_lahir' => $row[7],
                    'tanggal_lahir' => gmdate('Y-m-d', $tgl_lahir),
                    'alamat' => $row[9],
                    'no_hp' => $row[10],
                    'nama_ayah' => $row[11],
                    'nama_ibu' => $row[12],
                ]);
            }
        }
    }
}
