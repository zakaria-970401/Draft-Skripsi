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
        // dd($collection->all());
        foreach ($collection as $key => $row) {
            if ($key >= 2) {
                User::Create([
                    'id' => $row[0],
                    'nama_siswa' => $row[1],
                    'nisn' => $row[2],
                    'email' => $row[3],
                    'password' => Hash::make($row[4])
                ]);
            }
        }
    }
}
