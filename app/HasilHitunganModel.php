<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HasilHitunganModel extends Model
{
    protected $table = 'tbl_hasil_hitungan';

    public $timestamps = false;

    protected $fillable =
    [
        'tgl_daftar',
        'nama_siswa',
        'nisn',
        'kelas',
        'label_dapat',
        'label_tdkdapat',
        'status_kelengkapan_ortu',
        'status_rumah_ortu',
        'status_pekerjaan_wali',
        'status_sk_tidakmampu',
        'ortu_lengkap_dapat',
        'ortu_lengkap_tdkdapat',
        'ortu_tdklengkap_dapat',
        'ortu_tdklengkap_tdkdapat',
        'rumah_sendiri_dapat',
        'rumah_sendiri_tdkdapat',
        'rumah_sewa_dapat',
        'rumah_sewa_tdkdapat',
        'rumah_kontrakan_dapat',
        'rumah_kontrakan_tdkdapat',
        'rumah_saudara_dapat',
        'rumah_saudara_tdkdapat',
        'pekerja_swasta_dapat',
        'pekerja_swasta_tdkdapat',
        'pekerja_negri_dapat',
        'pekerja_negri_tdkdapat',
        'pekerja_tdktetap_dapat',
        'pekerja_tdktetap_tdkdapat',
        'pekerja_usaha_dapat',
        'pekerja_usaha_tdkdapat',
        'sk_ada_dapat',
        'sk_ada_tdkdapat',
        'sk_tdkada_dapat',
        'sk_tdkada_tdkdapat',
        'probabilitas_dapat',
        'probabilitas_tdkdapat'
    ];
}
