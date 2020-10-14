<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataSetModel extends Model
{
    protected $table = 'tbl_dataset';

    public $timestamps = false;

    protected $fillable =
    [
        'tgl_daftar',
        'nisn',
        'nama_siswa',
        'jurusan',
        'kelas',
        'status_kelengkapan_ortu',
        'status_yatimpiatu',
        'status_rumah_ortu',
        'status_pekerjaan_wali',
        'status_sk_tidakmampu',
        'foto',
        'status',
        'keterangan',
        'alasan_tolak',
        'pemeriksa',
    ];
}
