<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataTrainingModel extends Model
{
    protected $table = 'tbl_training';

    public $timestamps = false;

    protected $fillable =
    [
        'tanggal_daftar',
        'nama_siswa',
        'nisn',
        'kelas',
        'status_kelengkapan_ortu',
        'status_yatimpiatu',
        'status_rumah_ortu',
        'status_pekerjaan_wali',
        'status_sk_tidakmampu',
        'foto_sk_tidakmampu',
        'keterangan',
    ];
}
