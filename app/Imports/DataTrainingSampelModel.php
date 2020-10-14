<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\DataTrainingModel;

class DataTrainingSampelModel implements ToCollection
{
    /**z
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        foreach ($collection as $key => $row) {
            if ($key >= 3) {
                $tgl_daftar = ($row[1] - 25569) * 86400;
                DataTrainingModel::Create([
                    'tanggal_daftar' => gmdate('Y-m-d', $tgl_daftar),
                    'nama_siswa' => $row[2],
                    'nisn' => $row[3],
                    'jurusan' => $row[4],
                    'kelas' => $row[5],
                    'status_kelengkapan_ortu' => $row[6],
                    'status_yatimpiatu' => $row[7],
                    'status_rumah_ortu' => $row[8],
                    'status_pekerjaan_wali' => $row[9],
                    'status_sk_tidakmampu' => $row[10],
                    'foto_sk_tidakmampu' => $row[11],
                    'keterangan' => $row[12],
                ]);
            }
        }
    }
}
