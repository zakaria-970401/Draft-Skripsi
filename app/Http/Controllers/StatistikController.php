<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HasilHitunganModel;
use App\DataSetModel;
use Illuminate\Support\Facades\DB;
use App\DataTrainingModel;

class StatistikController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin')->except('logout', 'logoutadmin', 'logoutwalas');
    }

    public function statistik_data_bansos()
    {
        $total_datatraining = DataSetModel::all()->count();
        //HITUNG DATA TRAINING  XTKJA//
        $ortu_lengkap = DataSetModel::where('status_kelengkapan_ortu', 'Lengkap')->count();
        $ortu_tdklengkap = DataSetModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->count();
        $tanpa_ayah = DataSetModel::where('status_yatimpiatu', 'Tanpa Ayah')->count();
        $tanpa_ibu = DataSetModel::where('status_yatimpiatu', 'Tanpa Ibu')->count();
        $tanpa_ayah_ibu = DataSetModel::where('status_yatimpiatu', 'Tanpa Ayah Dan Ibu')->count();
        $rumahsendiri = DataSetModel::where('status_rumah_ortu', 'Rumah Sendiri')->count();
        $rumahsewa = DataSetModel::where('status_rumah_ortu', 'Rumah Sewa')->count();
        $kontrakan = DataSetModel::where('status_rumah_ortu', 'Kontrakan')->count();
        $rumahsaudara = DataSetModel::where('status_rumah_ortu', 'Tinggal Dengan Saudara')->count();
        $karyawanswasta = DataSetModel::where('status_pekerjaan_wali', 'Karyawan Swasta')->count();
        $pegawainegeri = DataSetModel::where('status_pekerjaan_wali', 'Pegawai Negri')->count();
        $pekerja_tdk_tetap = DataSetModel::where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->count();
        $usaha = DataSetModel::where('status_pekerjaan_wali', 'Usaha')->count();
        $ada_sk = DataSetModel::where('status_sk_tidakmampu', 'Ada')->count();
        $tdk_ada_sk = DataSetModel::where('status_sk_tidakmampu', 'Tidak Ada')->count();

        $ortu_lengkap_persen = number_format($ortu_lengkap / $total_datatraining * 100, 1);
        $ortu_tdklengkap_persen = number_format($ortu_tdklengkap / $total_datatraining * 100, 1);
        $tanpa_ayah_persen = number_format($tanpa_ayah / $total_datatraining * 100, 1);
        $tanpa_ibu_persen = number_format($tanpa_ibu / $total_datatraining * 100, 1);
        $tanpa_ayah_ibu_persen = number_format($tanpa_ayah_ibu / $total_datatraining * 100, 1);
        $rumahsendiri_persen = number_format($rumahsendiri / $total_datatraining * 100, 1);
        $rumahsewa_persen = number_format($rumahsewa / $total_datatraining * 100, 1);
        $kontrakan_persen = number_format($kontrakan / $total_datatraining * 100, 1);
        $rumahsaudara_persen = number_format($rumahsaudara / $total_datatraining * 100, 1);
        $karyawanswasta_persen = number_format($karyawanswasta / $total_datatraining * 100, 1);
        $pegawainegeri_persen = number_format($pegawainegeri / $total_datatraining * 100, 1);
        $pekerja_tdk_tetap_persen = number_format($pekerja_tdk_tetap / $total_datatraining * 100, 1);
        $usaha_persen = number_format($usaha / $total_datatraining * 100, 1);
        $ada_sk_persen = number_format($ada_sk / $total_datatraining * 100, 1);
        $tdk_ada_sk_persen = number_format($tdk_ada_sk / $total_datatraining * 100, 1);

        // dd($ortu_tdklengkap_persen);
        return view(
            'admin.analisa_data.statistik.data_bansos.index',
            compact(
                'ortu_lengkap_persen',
                'ortu_tdklengkap_persen',
                'tanpa_ayah_persen',
                'tanpa_ibu_persen',
                'tanpa_ayah_ibu_persen',
                'rumahsendiri_persen',
                'rumahsewa_persen',
                'kontrakan_persen',
                'rumahsaudara_persen',
                'karyawanswasta_persen',
                'pegawainegeri_persen',
                'pekerja_tdk_tetap_persen',
                'usaha_persen',
                'ada_sk_persen',
                'tdk_ada_sk_persen'
            )
        );
    }
    public function statistik_data_training()
    {
        $total_datatraining = DataTrainingModel::all()->count();
        //HITUNG DATA TRAINING  XTKJA//
        $ortu_lengkap = DataTrainingModel::where('status_kelengkapan_ortu', 'Lengkap')->count();
        $ortu_tdklengkap = DataTrainingModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->count();
        $tanpa_ayah = DataTrainingModel::where('status_yatimpiatu', 'Tanpa Ayah')->count();
        $tanpa_ibu = DataTrainingModel::where('status_yatimpiatu', 'Tanpa Ibu')->count();
        $tanpa_ayah_ibu = DataTrainingModel::where('status_yatimpiatu', 'Tanpa Ayah Dan Ibu')->count();
        $rumahsendiri = DataTrainingModel::where('status_rumah_ortu', 'Rumah Sendiri')->count();
        $rumahsewa = DataTrainingModel::where('status_rumah_ortu', 'Rumah Sewa')->count();
        $kontrakan = DataTrainingModel::where('status_rumah_ortu', 'Kontrakan')->count();
        $rumahsaudara = DataTrainingModel::where('status_rumah_ortu', 'Tinggal Dengan Saudara')->count();
        $karyawanswasta = DataTrainingModel::where('status_pekerjaan_wali', 'Karyawan Swasta')->count();
        $pegawainegeri = DataTrainingModel::where('status_pekerjaan_wali', 'Pegawai Negri')->count();
        $pekerja_tdk_tetap = DataTrainingModel::where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->count();
        $usaha = DataTrainingModel::where('status_pekerjaan_wali', 'Usaha')->count();
        $ada_sk = DataTrainingModel::where('status_sk_tidakmampu', 'Ada')->count();
        $tdk_ada_sk = DataTrainingModel::where('status_sk_tidakmampu', 'Tidak Ada')->count();

        $ortu_lengkap_persen = number_format($ortu_lengkap / $total_datatraining * 100, 1);
        $ortu_tdklengkap_persen = number_format($ortu_tdklengkap / $total_datatraining * 100, 1);
        $tanpa_ayah_persen = number_format($tanpa_ayah / $total_datatraining * 100, 1);
        $tanpa_ibu_persen = number_format($tanpa_ibu / $total_datatraining * 100, 1);
        $tanpa_ayah_ibu_persen = number_format($tanpa_ayah_ibu / $total_datatraining * 100, 1);
        $rumahsendiri_persen = number_format($rumahsendiri / $total_datatraining * 100, 1);
        $rumahsewa_persen = number_format($rumahsewa / $total_datatraining * 100, 1);
        $kontrakan_persen = number_format($kontrakan / $total_datatraining * 100, 1);
        $rumahsaudara_persen = number_format($rumahsaudara / $total_datatraining * 100, 1);
        $karyawanswasta_persen = number_format($karyawanswasta / $total_datatraining * 100, 1);
        $pegawainegeri_persen = number_format($pegawainegeri / $total_datatraining * 100, 1);
        $pekerja_tdk_tetap_persen = number_format($pekerja_tdk_tetap / $total_datatraining * 100, 1);
        $usaha_persen = number_format($usaha / $total_datatraining * 100, 1);
        $ada_sk_persen = number_format($ada_sk / $total_datatraining * 100, 1);
        $tdk_ada_sk_persen = number_format($tdk_ada_sk / $total_datatraining * 100, 1);

        // dd($ortu_tdklengkap_persen);
        return view(
            'admin.analisa_data.statistik.data_training.index',
            compact(
                'ortu_lengkap_persen',
                'ortu_tdklengkap_persen',
                'tanpa_ayah_persen',
                'tanpa_ibu_persen',
                'tanpa_ayah_ibu_persen',
                'rumahsendiri_persen',
                'rumahsewa_persen',
                'kontrakan_persen',
                'rumahsaudara_persen',
                'karyawanswasta_persen',
                'pegawainegeri_persen',
                'pekerja_tdk_tetap_persen',
                'usaha_persen',
                'ada_sk_persen',
                'tdk_ada_sk_persen'
            )
        );
    }
}
