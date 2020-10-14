<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\User;
use Illuminate\Support\Facades\Hash;

class AkunSiswaImport implements ToCollection
{
    public function collection(Collection $collection)
    {
        foreach ($collection as $key => $row) {
            if ($key >= 3) {
                User::Create([
                    'nama_siswa' => $row[1],
                    'nisn' => $row[2],
                    'email' => $row[3],
                    'password' => Hash::make($row[4])
                ]);
            }
        }
    }
}
