<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataSiswaModel extends Model
{
    protected $table = 'tbl_datasiswa';

    public $timestamps = false;

    protected $fillable =
    [
        'nama_siswa',
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
        'nama_ibu',
        'foto',
    ];
}
