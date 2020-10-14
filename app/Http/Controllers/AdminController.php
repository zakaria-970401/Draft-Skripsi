<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use App\DataSiswaModel;
use App\User;
use App\Imports\DataTrainingSampelModel;
use App\DataTrainingModel;
use Illuminate\Support\Facades\DB;
use App\Imports\AkunSiswaImport;
use App\Imports\DataSiswaImport;
use RealRashid\SweetAlert\Facades\Alert;
use Maatwebsite\Excel\Facades\Excel;
use App\DataSetModel;
use App\Teacher;


class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin')->except('logout', 'logoutadmin', 'logoutwalas');
    }

    public function index()
    {
        return view('admin.index');
    }

    public function data_kriteria()
    {
        $datakriteria = DB::table('tbl_datakriteria')->get();

        return view('admin.data_kriteria.index', compact('datakriteria'));
    }

    public function data_training(Request $request)
    {
        $datatraining = DataTrainingModel::all();

        //HITUNG DATA TRAINING  XTKJA//
        $ortu_lengkap_xtkja = DataTrainingModel::where('kelas', 'X-TKJ-A')->where('status_kelengkapan_ortu', 'Lengkap')->count();
        $tanpa_ayah_xtkja = DataTrainingModel::where('kelas', 'X-tkj-A')->where('status_yatimpiatu', 'Tanpa Ayah')->count();
        $tanpa_ibu_xtkja = DataTrainingModel::where('kelas', 'X-tkj-A')->where('status_yatimpiatu', 'Tanpa Ibu')->count();
        $tanpa_ayah_ibu_xtkja = DataTrainingModel::where('kelas', 'X-tkj-A')->where('status_yatimpiatu', 'Tanpa Ayah Dan Ibu')->count();
        $rumahsendiri_xtkja = DataTrainingModel::where('kelas', 'X-tkj-A')->where('status_rumah_ortu', 'Rumah Sendiri')->count();
        $rumahsewa_xtkja = DataTrainingModel::where('kelas', 'X-tkj-A')->where('status_rumah_ortu', 'Rumah Sewa')->count();
        $kontrakan_xtkja = DataTrainingModel::where('kelas', 'X-tkj-A')->where('status_rumah_ortu', 'Kontrakan')->count();
        $rumahsaudara_xtkja = DataTrainingModel::where('kelas', 'X-tkj-A')->where('status_rumah_ortu', 'Tinggal Dengan Saudara')->count();
        $karyawanswasta_xtkja = DataTrainingModel::where('kelas', 'X-tkj-A')->where('status_pekerjaan_wali', 'Karyawan Swasta')->count();
        $pegawainegeri_xtkja = DataTrainingModel::where('kelas', 'X-tkj-A')->where('status_pekerjaan_wali', 'Pegawai Negri')->count();
        $pekerja_tdk_tetap_xtkja = DataTrainingModel::where('kelas', 'X-tkj-A')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->count();
        $usaha_xtkja = DataTrainingModel::where('kelas', 'X-tkj-A')->where('status_pekerjaan_wali', 'Usaha')->count();
        $ada_sk_xtkja = DataTrainingModel::where('kelas', 'X-tkj-A')->where('status_sk_tidakmampu', 'Ada')->count();
        $tdk_ada_sk_xtkja = DataTrainingModel::where('kelas', 'X-tkj-A')->where('status_sk_tidakmampu', 'Tidak Ada')->count();

        //HITUNG DATA TRAINING TKJB//
        $ortu_lengkap_xtkjb = DataTrainingModel::where('kelas', 'X-TKJ-B')->where('status_kelengkapan_ortu', 'Lengkap')->count();
        $tanpa_ayah_xtkjb = DataTrainingModel::where('kelas', 'X-TKJ-B')->where('status_yatimpiatu', 'Tanpa Ayah')->count();
        $tanpa_ibu_xtkjb = DataTrainingModel::where('kelas', 'X-TKJ-B')->where('status_yatimpiatu', 'Tanpa Ibu')->count();
        $tanpa_ayah_ibu_xtkjb = DataTrainingModel::where('kelas', 'X-TKJ-B')->where('status_yatimpiatu', 'Tanpa Ayah Dan Ibu')->count();
        $rumahsendiri_xtkjb = DataTrainingModel::where('kelas', 'X-TKJ-B')->where('status_rumah_ortu', 'Rumah Sendiri')->count();
        $rumahsewa_xtkjb = DataTrainingModel::where('kelas', 'X-TKJ-B')->where('status_rumah_ortu', 'Rumah Sewa')->count();
        $kontrakan_xtkjb = DataTrainingModel::where('kelas', 'X-TKJ-B')->where('status_rumah_ortu', 'Kontrakan')->count();
        $rumahsaudara_xtkjb = DataTrainingModel::where('kelas', 'X-TKJ-B')->where('status_rumah_ortu', 'Tinggal Dengan Saudara')->count();
        $karyawanswasta_xtkjb = DataTrainingModel::where('kelas', 'X-TKJ-B')->where('status_pekerjaan_wali', 'Karyawan Swasta')->count();
        $pegawainegeri_xtkjb = DataTrainingModel::where('kelas', 'X-TKJ-B')->where('status_pekerjaan_wali', 'Pegawai Negri')->count();
        $pekerja_tdk_tetap_xtkjb = DataTrainingModel::where('kelas', 'X-TKJ-B')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->count();
        $usaha_xtkjb = DataTrainingModel::where('kelas', 'X-TKJ-B')->where('status_pekerjaan_wali', 'Usaha')->count();
        $ada_sk_xtkjb = DataTrainingModel::where('kelas', 'X-TKJ-B')->where('status_sk_tidakmampu', 'Ada')->count();
        $tdk_ada_sk_xtkjb = DataTrainingModel::where('kelas', 'X-TKJ-B')->where('status_sk_tidakmampu', 'Tidak Ada')->count();

        //HITUNG DATA TRAINING TKJC//
        $ortu_lengkap_xtkjc = DataTrainingModel::where('kelas', 'X-TKJ-C')->where('status_kelengkapan_ortu', 'Lengkap')->count();
        $tanpa_ayah_xtkjc = DataTrainingModel::where('kelas', 'X-TKJ-C')->where('status_yatimpiatu', 'Tanpa Ayah')->count();
        $tanpa_ibu_xtkjc = DataTrainingModel::where('kelas', 'X-TKJ-C')->where('status_yatimpiatu', 'Tanpa Ibu')->count();
        $tanpa_ayah_ibu_xtkjc = DataTrainingModel::where('kelas', 'X-TKJ-C')->where('status_yatimpiatu', 'Tanpa Ayah Dan Ibu')->count();
        $rumahsendiri_xtkjc = DataTrainingModel::where('kelas', 'X-TKJ-C')->where('status_rumah_ortu', 'Rumah Sendiri')->count();
        $rumahsewa_xtkjc = DataTrainingModel::where('kelas', 'X-TKJ-C')->where('status_rumah_ortu', 'Rumah Sewa')->count();
        $kontrakan_xtkjc = DataTrainingModel::where('kelas', 'X-TKJ-C')->where('status_rumah_ortu', 'Kontrakan')->count();
        $rumahsaudara_xtkjc = DataTrainingModel::where('kelas', 'X-TKJ-C')->where('status_rumah_ortu', 'Tinggal Dengan Saudara')->count();
        $karyawanswasta_xtkjc = DataTrainingModel::where('kelas', 'X-tkj-C')->where('status_pekerjaan_wali', 'Karyawan Swasta')->count();
        $pegawainegeri_xtkjc = DataTrainingModel::where('kelas', 'X-tkj-C')->where('status_pekerjaan_wali', 'Pegawai Negri')->count();
        $pekerja_tdk_tetap_xtkjc = DataTrainingModel::where('kelas', 'X-tkj-C')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->count();
        $usaha_xtkjc = DataTrainingModel::where('kelas', 'X-tkj-C')->where('status_pekerjaan_wali', 'Usaha')->count();
        $ada_sk_xtkjc = DataTrainingModel::where('kelas', 'X-tkj-C')->where('status_sk_tidakmampu', 'Ada')->count();
        $tdk_ada_sk_xtkjc = DataTrainingModel::where('kelas', 'X-tkj-C')->where('status_sk_tidakmampu', 'Tidak Ada')->count();


        //HITUNG DATA TRAINING TKJD//
        $ortu_lengkap_xtkjd = DataTrainingModel::where('kelas', 'X-TKJ-D')->where('status_kelengkapan_ortu', 'Lengkap')->count();
        $tanpa_ayah_xtkjd = DataTrainingModel::where('kelas', 'X-TKJ-D')->where('status_yatimpiatu', 'Tanpa Ayah')->count();
        $tanpa_ibu_xtkjd = DataTrainingModel::where('kelas', 'X-TKJ-D')->where('status_yatimpiatu', 'Tanpa Ibu')->count();
        $tanpa_ayah_ibu_xtkjd = DataTrainingModel::where('kelas', 'X-TKJ-D')->where('status_yatimpiatu', 'Tanpa Ayah Dan Ibu')->count();
        $rumahsendiri_xtkjd = DataTrainingModel::where('kelas', 'X-TKJ-D')->where('status_rumah_ortu', 'Rumah Sendiri')->count();
        $rumahsewa_xtkjd = DataTrainingModel::where('kelas', 'X-TKJ-D')->where('status_rumah_ortu', 'Rumah Sewa')->count();
        $kontrakan_xtkjd = DataTrainingModel::where('kelas', 'X-TKJ-D')->where('status_rumah_ortu', 'Kontrakan')->count();
        $rumahsaudara_xtkjd = DataTrainingModel::where('kelas', 'X-TKJ-D')->where('status_rumah_ortu', 'Tinggal Dengan Saudara')->count();
        $karyawanswasta_xtkjd = DataTrainingModel::where('kelas', 'X-tkj-D')->where('status_pekerjaan_wali', 'Karyawan Swasta')->count();
        $pegawainegeri_xtkjd = DataTrainingModel::where('kelas', 'X-tkj-D')->where('status_pekerjaan_wali', 'Pegawai Negri')->count();
        $pekerja_tdk_tetap_xtkjd = DataTrainingModel::where('kelas', 'X-tkj-D')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->count();
        $usaha_xtkjd = DataTrainingModel::where('kelas', 'X-tkj-D')->where('status_pekerjaan_wali', 'Usaha')->count();
        $ada_sk_xtkjd = DataTrainingModel::where('kelas', 'X-tkj-D')->where('status_sk_tidakmampu', 'Ada')->count();
        $tdk_ada_sk_xtkjd = DataTrainingModel::where('kelas', 'X-tkj-D')->where('status_sk_tidakmampu', 'Tidak Ada')->count();


        //HITUNG DATA TRAINING XI-TKJA//
        $ortu_lengkap_xitkja = DataTrainingModel::where('kelas', 'XI-TKJ-A')->where('status_kelengkapan_ortu', 'Lengkap')->count();
        $tanpa_ayah_xitkja = DataTrainingModel::where('kelas', 'XI-TKJ-A')->where('status_yatimpiatu', 'Tanpa Ayah')->count();
        $tanpa_ibu_xitkja = DataTrainingModel::where('kelas', 'XI-TKJ-A')->where('status_yatimpiatu', 'Tanpa Ibu')->count();
        $tanpa_ayah_ibu_xitkja = DataTrainingModel::where('kelas', 'XI-TKJ-A')->where('status_yatimpiatu', 'Tanpa Ayah Dan Ibu')->count();
        $rumahsendiri_xitkja = DataTrainingModel::where('kelas', 'XI-TKJ-A')->where('status_rumah_ortu', 'Rumah Sendiri')->count();
        $rumahsewa_xitkja = DataTrainingModel::where('kelas', 'XI-TKJ-A')->where('status_rumah_ortu', 'Rumah Sewa')->count();
        $kontrakan_xitkja = DataTrainingModel::where('kelas', 'XI-TKJ-A')->where('status_rumah_ortu', 'Kontrakan')->count();
        $rumahsaudara_xitkja = DataTrainingModel::where('kelas', 'XI-TKJ-A')->where('status_rumah_ortu', 'Tinggal Dengan Saudara')->count();
        $karyawanswasta_xitkja = DataTrainingModel::where('kelas', 'XI-TKJ-A')->where('status_pekerjaan_wali', 'Karyawan Swasta')->count();
        $pegawainegeri_xitkja = DataTrainingModel::where('kelas', 'XI-TKJ-A')->where('status_pekerjaan_wali', 'Pegawai Negri')->count();
        $pekerja_tdk_tetap_xitkja = DataTrainingModel::where('kelas', 'XI-TKJ-A')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->count();
        $usaha_xitkja = DataTrainingModel::where('kelas', 'XI-TKJ-A')->where('status_pekerjaan_wali', 'Usaha')->count();
        $ada_sk_xitkja = DataTrainingModel::where('kelas', 'XI-TKJ-A')->where('status_sk_tidakmampu', 'Ada')->count();
        $tdk_ada_sk_xitkja = DataTrainingModel::where('kelas', 'XI-TKJ-A')->where('status_sk_tidakmampu', 'Tidak Ada')->count();


        //HITUNG DATA TRAINING XITKJB//
        $ortu_lengkap_xitkjb = DataTrainingModel::where('kelas', 'XI-TKJ-B')->where('status_kelengkapan_ortu', 'Lengkap')->count();
        $tanpa_ayah_xitkjb = DataTrainingModel::where('kelas', 'XI-TKJ-B')->where('status_yatimpiatu', 'Tanpa Ayah')->count();
        $tanpa_ibu_xitkjb = DataTrainingModel::where('kelas', 'XI-TKJ-B')->where('status_yatimpiatu', 'Tanpa Ibu')->count();
        $tanpa_ayah_ibu_xitkjb = DataTrainingModel::where('kelas', 'XI-TKJ-B')->where('status_yatimpiatu', 'Tanpa Ayah Dan Ibu')->count();
        $rumahsendiri_xitkjb = DataTrainingModel::where('kelas', 'XI-TKJ-B')->where('status_rumah_ortu', 'Rumah Sendiri')->count();
        $rumahsewa_xitkjb = DataTrainingModel::where('kelas', 'XI-TKJ-B')->where('status_rumah_ortu', 'Rumah Sewa')->count();
        $kontrakan_xitkjb = DataTrainingModel::where('kelas', 'XI-TKJ-B')->where('status_rumah_ortu', 'Kontrakan')->count();
        $rumahsaudara_xitkjb = DataTrainingModel::where('kelas', 'XI-TKJ-B')->where('status_rumah_ortu', 'Tinggal Dengan Saudara')->count();
        $karyawanswasta_xitkjb = DataTrainingModel::where('kelas', 'XI-TKJ-B')->where('status_pekerjaan_wali', 'Karyawan Swasta')->count();
        $pegawainegeri_xitkjb = DataTrainingModel::where('kelas', 'XI-TKJ-B')->where('status_pekerjaan_wali', 'Pegawai Negri')->count();
        $pekerja_tdk_tetap_xitkjb = DataTrainingModel::where('kelas', 'XI-TKJ-B')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->count();
        $usaha_xitkjb = DataTrainingModel::where('kelas', 'XI-TKJ-B')->where('status_pekerjaan_wali', 'Usaha')->count();
        $ada_sk_xitkjb = DataTrainingModel::where('kelas', 'XI-TKJ-B')->where('status_sk_tidakmampu', 'Ada')->count();
        $tdk_ada_sk_xitkjb = DataTrainingModel::where('kelas', 'XI-TKJ-B')->where('status_sk_tidakmampu', 'Tidak Ada')->count();




        //HITUNG DATA TRAINING XITKJC//
        $ortu_lengkap_xitkjc = DataTrainingModel::where('kelas', 'XI-TKJ-C')->where('status_kelengkapan_ortu', 'Lengkap')->count();
        $tanpa_ayah_xitkjc = DataTrainingModel::where('kelas', 'XI-TKJ-C')->where('status_yatimpiatu', 'Tanpa Ayah')->count();
        $tanpa_ibu_xitkjc = DataTrainingModel::where('kelas', 'XI-TKJ-C')->where('status_yatimpiatu', 'Tanpa Ibu')->count();
        $tanpa_ayah_ibu_xitkjc = DataTrainingModel::where('kelas', 'XI-TKJ-C')->where('status_yatimpiatu', 'Tanpa Ayah Dan Ibu')->count();
        $rumahsendiri_xitkjc = DataTrainingModel::where('kelas', 'XI-TKJ-C')->where('status_rumah_ortu', 'Rumah Sendiri')->count();
        $rumahsewa_xitkjc = DataTrainingModel::where('kelas', 'XI-TKJ-C')->where('status_rumah_ortu', 'Rumah Sewa')->count();
        $kontrakan_xitkjc = DataTrainingModel::where('kelas', 'XI-TKJ-C')->where('status_rumah_ortu', 'Kontrakan')->count();
        $rumahsaudara_xitkjc = DataTrainingModel::where('kelas', 'XI-TKJ-C')->where('status_rumah_ortu', 'Tinggal Dengan Saudara')->count();
        $karyawanswasta_xitkjc = DataTrainingModel::where('kelas', 'XI-TKJ-C')->where('status_pekerjaan_wali', 'Karyawan Swasta')->count();
        $pegawainegeri_xitkjc = DataTrainingModel::where('kelas', 'XI-TKJ-C')->where('status_pekerjaan_wali', 'Pegawai Negri')->count();
        $pekerja_tdk_tetap_xitkjc = DataTrainingModel::where('kelas', 'XI-TKJ-C')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->count();
        $usaha_xitkjc = DataTrainingModel::where('kelas', 'XI-TKJ-C')->where('status_pekerjaan_wali', 'Usaha')->count();
        $ada_sk_xitkjc = DataTrainingModel::where('kelas', 'XI-TKJ-C')->where('status_sk_tidakmampu', 'Ada')->count();
        $tdk_ada_sk_xitkjc = DataTrainingModel::where('kelas', 'XI-TKJ-C')->where('status_sk_tidakmampu', 'Tidak Ada')->count();

        //HITUNG DATA TRAINING XII-TKJ-A//
        $ortu_lengkap_xiitkja = DataTrainingModel::where('kelas', 'XII-TKJ-A')->where('status_kelengkapan_ortu', 'Lengkap')->count();
        $tanpa_ayah_xiitkja = DataTrainingModel::where('kelas', 'XII-TKJ-A')->where('status_yatimpiatu', 'Tanpa Ayah')->count();
        $tanpa_ibu_xiitkja = DataTrainingModel::where('kelas', 'XII-TKJ-A')->where('status_yatimpiatu', 'Tanpa Ibu')->count();
        $tanpa_ayah_ibu_xiitkja = DataTrainingModel::where('kelas', 'XII-TKJ-A')->where('status_yatimpiatu', 'Tanpa Ayah Dan Ibu')->count();
        $rumahsendiri_xiitkja = DataTrainingModel::where('kelas', 'XII-TKJ-A')->where('status_rumah_ortu', 'Rumah Sendiri')->count();
        $rumahsewa_xiitkja = DataTrainingModel::where('kelas', 'XII-TKJ-A')->where('status_rumah_ortu', 'Rumah Sewa')->count();
        $kontrakan_xiitkja = DataTrainingModel::where('kelas', 'XII-TKJ-A')->where('status_rumah_ortu', 'Kontrakan')->count();
        $rumahsaudara_xiitkja = DataTrainingModel::where('kelas', 'XII-TKJ-A')->where('status_rumah_ortu', 'Tinggal Dengan Saudara')->count();
        $karyawanswasta_xiitkja = DataTrainingModel::where('kelas', 'XII-TKJ-A')->where('status_pekerjaan_wali', 'Karyawan Swasta')->count();
        $pegawainegeri_xiitkja = DataTrainingModel::where('kelas', 'XII-TKJ-A')->where('status_pekerjaan_wali', 'Pegawai Negri')->count();
        $pekerja_tdk_tetap_xiitkja = DataTrainingModel::where('kelas', 'XII-TKJ-A')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->count();
        $usaha_xiitkja = DataTrainingModel::where('kelas', 'XII-TKJ-A')->where('status_pekerjaan_wali', 'Usaha')->count();
        $ada_sk_xiitkja = DataTrainingModel::where('kelas', 'XII-TKJ-A')->where('status_sk_tidakmampu', 'Ada')->count();
        $tdk_ada_sk_xiitkja = DataTrainingModel::where('kelas', 'XII-TKJ-A')->where('status_sk_tidakmampu', 'Tidak Ada')->count();

        //HITUNG DATA TRAINING XII-TKJ-B//
        $ortu_lengkap_xiitkjb = DataTrainingModel::where('kelas', 'XII-TKJ-B')->where('status_kelengkapan_ortu', 'Lengkap')->count();
        $tanpa_ayah_xiitkjb = DataTrainingModel::where('kelas', 'XII-TKJ-B')->where('status_yatimpiatu', 'Tanpa Ayah')->count();
        $tanpa_ibu_xiitkjb = DataTrainingModel::where('kelas', 'XII-TKJ-B')->where('status_yatimpiatu', 'Tanpa Ibu')->count();
        $tanpa_ayah_ibu_xiitkjb = DataTrainingModel::where('kelas', 'XII-TKJ-B')->where('status_yatimpiatu', 'Tanpa Ayah Dan Ibu')->count();
        $rumahsendiri_xiitkjb = DataTrainingModel::where('kelas', 'XII-TKJ-B')->where('status_rumah_ortu', 'Rumah Sendiri')->count();
        $rumahsewa_xiitkjb = DataTrainingModel::where('kelas', 'XII-TKJ-B')->where('status_rumah_ortu', 'Rumah Sewa')->count();
        $kontrakan_xiitkjb = DataTrainingModel::where('kelas', 'XII-TKJ-B')->where('status_rumah_ortu', 'Kontrakan')->count();
        $rumahsaudara_xiitkjb = DataTrainingModel::where('kelas', 'XII-TKJ-B')->where('status_rumah_ortu', 'Tinggal Dengan Saudara')->count();
        $karyawanswasta_xiitkjb = DataTrainingModel::where('kelas', 'XII-TKJ-B')->where('status_pekerjaan_wali', 'Karyawan Swasta')->count();
        $pegawainegeri_xiitkjb = DataTrainingModel::where('kelas', 'XII-TKJ-B')->where('status_pekerjaan_wali', 'Pegawai Negri')->count();
        $pekerja_tdk_tetap_xiitkjb = DataTrainingModel::where('kelas', 'XII-TKJ-B')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->count();
        $usaha_xiitkjb = DataTrainingModel::where('kelas', 'XII-TKJ-B')->where('status_pekerjaan_wali', 'Usaha')->count();
        $ada_sk_xiitkjb = DataTrainingModel::where('kelas', 'XII-TKJ-B')->where('status_sk_tidakmampu', 'Ada')->count();
        $tdk_ada_sk_xiitkjb = DataTrainingModel::where('kelas', 'XII-TKJ-B')->where('status_sk_tidakmampu', 'Tidak Ada')->count();

        //HITUNG DATA TRAINING XII-TKJ-C//
        $ortu_lengkap_xiitkjc = DataTrainingModel::where('kelas', 'XII-TKJ-C')->where('status_kelengkapan_ortu', 'Lengkap')->count();
        $tanpa_ayah_xiitkjc = DataTrainingModel::where('kelas', 'XII-TKJ-C')->where('status_yatimpiatu', 'Tanpa Ayah')->count();
        $tanpa_ibu_xiitkjc = DataTrainingModel::where('kelas', 'XII-TKJ-C')->where('status_yatimpiatu', 'Tanpa Ibu')->count();
        $tanpa_ayah_ibu_xiitkjc = DataTrainingModel::where('kelas', 'XII-TKJ-C')->where('status_yatimpiatu', 'Tanpa Ayah Dan Ibu')->count();
        $rumahsendiri_xiitkjc = DataTrainingModel::where('kelas', 'XII-TKJ-C')->where('status_rumah_ortu', 'Rumah Sendiri')->count();
        $rumahsewa_xiitkjc = DataTrainingModel::where('kelas', 'XII-TKJ-C')->where('status_rumah_ortu', 'Rumah Sewa')->count();
        $kontrakan_xiitkjc = DataTrainingModel::where('kelas', 'XII-TKJ-C')->where('status_rumah_ortu', 'Kontrakan')->count();
        $rumahsaudara_xiitkjc = DataTrainingModel::where('kelas', 'XII-TKJ-C')->where('status_rumah_ortu', 'Tinggal Dengan Saudara')->count();
        $karyawanswasta_xiitkjc = DataTrainingModel::where('kelas', 'XII-TKJ-C')->where('status_pekerjaan_wali', 'Karyawan Swasta')->count();
        $pegawainegeri_xiitkjc = DataTrainingModel::where('kelas', 'XII-TKJ-C')->where('status_pekerjaan_wali', 'Pegawai Negri')->count();
        $pekerja_tdk_tetap_xiitkjc = DataTrainingModel::where('kelas', 'XII-TKJ-C')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->count();
        $usaha_xiitkjc = DataTrainingModel::where('kelas', 'XII-TKJ-C')->where('status_pekerjaan_wali', 'Usaha')->count();
        $ada_sk_xiitkjc = DataTrainingModel::where('kelas', 'XII-TKJ-C')->where('status_sk_tidakmampu', 'Ada')->count();
        $tdk_ada_sk_xiitkjc = DataTrainingModel::where('kelas', 'XII-TKJ-C')->where('status_sk_tidakmampu', 'Tidak Ada')->count();

        //TOTAL DATA TRAINING X-TKJ-A//
        $xtkja = $ortu_lengkap_xtkja + $tanpa_ayah_xtkja + $tanpa_ibu_xtkja + $tanpa_ayah_ibu_xtkja + $rumahsendiri_xtkja + $rumahsewa_xtkja + $kontrakan_xtkja + $rumahsaudara_xtkja +  $karyawanswasta_xtkja +  $pegawainegeri_xtkja + $pekerja_tdk_tetap_xtkja  +  $usaha_xtkja +   $ada_sk_xtkja +   $tdk_ada_sk_xtkja;
        //TOTAL DATA TRAINING X-TKJ-B//
        $xtkjb = $ortu_lengkap_xtkjb + $tanpa_ayah_xtkjb + $tanpa_ibu_xtkjb + $tanpa_ayah_ibu_xtkjb + $rumahsendiri_xtkjb + $rumahsewa_xtkjb + $kontrakan_xtkjb + $rumahsaudara_xtkjb +  $karyawanswasta_xtkjb +  $pegawainegeri_xtkjb + $pekerja_tdk_tetap_xtkjb  +  $usaha_xtkjb +   $ada_sk_xtkjb +   $tdk_ada_sk_xtkjb;
        //TOTAL DATA TRAINING X-TKJ-C//
        $xtkjc = $ortu_lengkap_xtkjc + $tanpa_ayah_xtkjc + $tanpa_ibu_xtkjc + $tanpa_ayah_ibu_xtkjc + $rumahsendiri_xtkjc + $rumahsewa_xtkjc + $kontrakan_xtkjc + $rumahsaudara_xtkjc +  $karyawanswasta_xtkjc +  $pegawainegeri_xtkjc + $pekerja_tdk_tetap_xtkjc  +  $usaha_xtkjc +   $ada_sk_xtkjc +   $tdk_ada_sk_xtkjc;
        //TOTAL DATA TRAINING X-TKJ-D//
        $xtkjd = $ortu_lengkap_xtkjd + $tanpa_ayah_xtkjd + $tanpa_ibu_xtkjd + $tanpa_ayah_ibu_xtkjd + $rumahsendiri_xtkjd + $rumahsewa_xtkjd + $kontrakan_xtkjd + $rumahsaudara_xtkjd +  $karyawanswasta_xtkjd +  $pegawainegeri_xtkjd + $pekerja_tdk_tetap_xtkjd  +  $usaha_xtkjd +   $ada_sk_xtkjd +   $tdk_ada_sk_xtkjd;
        //TOTAL DATA TRAINING XI-TKJ-A//
        $xitkja = $ortu_lengkap_xitkja + $tanpa_ayah_xitkja + $tanpa_ibu_xitkja + $tanpa_ayah_ibu_xitkja + $rumahsendiri_xitkja + $rumahsewa_xitkja + $kontrakan_xitkja + $rumahsaudara_xitkja +  $karyawanswasta_xitkja +  $pegawainegeri_xitkja + $pekerja_tdk_tetap_xitkja  +  $usaha_xitkja +   $ada_sk_xitkja +   $tdk_ada_sk_xitkja;
        //TOTAL DATA TRAINING XI-TKJ-B//
        $xitkjb = $ortu_lengkap_xitkjb + $tanpa_ayah_xitkjb + $tanpa_ibu_xitkjb + $tanpa_ayah_ibu_xitkjb + $rumahsendiri_xitkjb + $rumahsewa_xitkjb + $kontrakan_xitkjb + $rumahsaudara_xitkjb +  $karyawanswasta_xitkjb +  $pegawainegeri_xitkjb + $pekerja_tdk_tetap_xitkjb  +  $usaha_xitkjb +   $ada_sk_xitkjb +   $tdk_ada_sk_xitkjb;
        //TOTAL DATA TRAINING XI-TKJ-C//
        $xitkjc = $ortu_lengkap_xitkjc + $tanpa_ayah_xitkjc + $tanpa_ibu_xitkjc + $tanpa_ayah_ibu_xitkjc + $rumahsendiri_xitkjc + $rumahsewa_xitkjc + $kontrakan_xitkjc + $rumahsaudara_xitkjc +  $karyawanswasta_xitkjc +  $pegawainegeri_xitkjc + $pekerja_tdk_tetap_xitkjc  +  $usaha_xitkjc +   $ada_sk_xitkjc +   $tdk_ada_sk_xitkjc;
        //TOTAL DATA TRAINING XII-TKJ-A//
        $xiitkja = $ortu_lengkap_xiitkja + $tanpa_ayah_xiitkja + $tanpa_ibu_xiitkja + $tanpa_ayah_ibu_xiitkja + $rumahsendiri_xiitkja + $rumahsewa_xiitkja + $kontrakan_xiitkja + $rumahsaudara_xiitkja +  $karyawanswasta_xiitkja +  $pegawainegeri_xiitkja + $pekerja_tdk_tetap_xiitkja  +  $usaha_xiitkja +   $ada_sk_xiitkja +   $tdk_ada_sk_xiitkja;
        //TOTAL DATA TRAINING XII-TKJ-B//
        $xiitkjb = $ortu_lengkap_xiitkjb + $tanpa_ayah_xiitkjb + $tanpa_ibu_xiitkjb + $tanpa_ayah_ibu_xiitkjb + $rumahsendiri_xiitkjb + $rumahsewa_xiitkjb + $kontrakan_xiitkjb + $rumahsaudara_xiitkjb +  $karyawanswasta_xiitkjb +  $pegawainegeri_xiitkjb + $pekerja_tdk_tetap_xiitkjb  +  $usaha_xiitkjb +   $ada_sk_xiitkjb +   $tdk_ada_sk_xiitkjb;
        //TOTAL DATA TRAINING XII-TKJ-C//
        $xiitkjc = $ortu_lengkap_xiitkjc + $tanpa_ayah_xiitkjc + $tanpa_ibu_xiitkjc + $tanpa_ayah_ibu_xiitkjc + $rumahsendiri_xiitkjc + $rumahsewa_xiitkjc + $kontrakan_xiitkjc + $rumahsaudara_xiitkjc +  $karyawanswasta_xiitkjc +  $pegawainegeri_xiitkjc + $pekerja_tdk_tetap_xiitkjc  +  $usaha_xiitkjc +   $ada_sk_xiitkjc +   $tdk_ada_sk_xiitkjc;

        //HITUNG DATA TRAINING X-TKR-A//
        $ortu_lengkap_xtkra = DataTrainingModel::where('kelas', 'X-TKR-A')->where('status_kelengkapan_ortu', 'Lengkap')->count();
        $tanpa_ayah_xtkra = DataTrainingModel::where('kelas', 'X-TKR-A')->where('status_yatimpiatu', 'Tanpa Ayah')->count();
        $tanpa_ibu_xtkra = DataTrainingModel::where('kelas', 'X-TKR-A')->where('status_yatimpiatu', 'Tanpa Ibu')->count();
        $tanpa_ayah_ibu_xtkra = DataTrainingModel::where('kelas', 'X-TKR-A')->where('status_yatimpiatu', 'Tanpa Ayah Dan Ibu')->count();
        $rumahsendiri_xtkra = DataTrainingModel::where('kelas', 'X-TKR-A')->where('status_rumah_ortu', 'Rumah Sendiri')->count();
        $rumahsewa_xtkra = DataTrainingModel::where('kelas', 'X-TKR-A')->where('status_rumah_ortu', 'Rumah Sewa')->count();
        $kontrakan_xtkra = DataTrainingModel::where('kelas', 'X-TKR-A')->where('status_rumah_ortu', 'Kontrakan')->count();
        $rumahsaudara_xtkra = DataTrainingModel::where('kelas', 'X-TKR-A')->where('status_rumah_ortu', 'Tinggal Dengan Saudara')->count();
        $karyawanswasta_xtkra = DataTrainingModel::where('kelas', 'X-TKR-A')->where('status_pekerjaan_wali', 'Karyawan Swasta')->count();
        $pegawainegeri_xtkra = DataTrainingModel::where('kelas', 'X-TKR-A')->where('status_pekerjaan_wali', 'Pegawai Negri')->count();
        $pekerja_tdk_tetap_xtkra = DataTrainingModel::where('kelas', 'X-TKR-A')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->count();
        $usaha_xtkra = DataTrainingModel::where('kelas', 'X-TKR-A')->where('status_pekerjaan_wali', 'Usaha')->count();
        $ada_sk_xtkra = DataTrainingModel::where('kelas', 'X-TKR-A')->where('status_sk_tidakmampu', 'Ada')->count();
        $tdk_ada_sk_xtkra = DataTrainingModel::where('kelas', 'X-TKR-A')->where('status_sk_tidakmampu', 'Tidak Ada')->count();

        //HITUNG DATA TRAINING X-TKR-B//
        $ortu_lengkap_xtkrb = DataTrainingModel::where('kelas', 'X-TKR-B')->where('status_kelengkapan_ortu', 'Lengkap')->count();
        $tanpa_ayah_xtkrb = DataTrainingModel::where('kelas', 'X-TKR-B')->where('status_yatimpiatu', 'Tanpa Ayah')->count();
        $tanpa_ibu_xtkrb = DataTrainingModel::where('kelas', 'X-TKR-B')->where('status_yatimpiatu', 'Tanpa Ibu')->count();
        $tanpa_ayah_ibu_xtkrb = DataTrainingModel::where('kelas', 'X-TKR-B')->where('status_yatimpiatu', 'Tanpa Ayah Dan Ibu')->count();
        $rumahsendiri_xtkrb = DataTrainingModel::where('kelas', 'X-TKR-B')->where('status_rumah_ortu', 'Rumah Sendiri')->count();
        $rumahsewa_xtkrb = DataTrainingModel::where('kelas', 'X-TKR-B')->where('status_rumah_ortu', 'Rumah Sewa')->count();
        $kontrakan_xtkrb = DataTrainingModel::where('kelas', 'X-TKR-B')->where('status_rumah_ortu', 'Kontrakan')->count();
        $rumahsaudara_xtkrb = DataTrainingModel::where('kelas', 'X-TKR-B')->where('status_rumah_ortu', 'Tinggal Dengan Saudara')->count();
        $karyawanswasta_xtkrb = DataTrainingModel::where('kelas', 'X-TKR-B')->where('status_pekerjaan_wali', 'Karyawan Swasta')->count();
        $pegawainegeri_xtkrb = DataTrainingModel::where('kelas', 'X-TKR-B')->where('status_pekerjaan_wali', 'Pegawai Negri')->count();
        $pekerja_tdk_tetap_xtkrb = DataTrainingModel::where('kelas', 'X-TKR-B')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->count();
        $usaha_xtkrb = DataTrainingModel::where('kelas', 'X-TKR-B')->where('status_pekerjaan_wali', 'Usaha')->count();
        $ada_sk_xtkrb = DataTrainingModel::where('kelas', 'X-TKR-B')->where('status_sk_tidakmampu', 'Ada')->count();
        $tdk_ada_sk_xtkrb = DataTrainingModel::where('kelas', 'X-TKR-B')->where('status_sk_tidakmampu', 'Tidak Ada')->count();

        //HITUNG DATA TRAINING X-TKR-C//
        $ortu_lengkap_xtkrc = DataTrainingModel::where('kelas', 'X-TKR-C')->where('status_kelengkapan_ortu', 'Lengkap')->count();
        $tanpa_ayah_xtkrc = DataTrainingModel::where('kelas', 'X-TKR-C')->where('status_yatimpiatu', 'Tanpa Ayah')->count();
        $tanpa_ibu_xtkrc = DataTrainingModel::where('kelas', 'X-TKR-C')->where('status_yatimpiatu', 'Tanpa Ibu')->count();
        $tanpa_ayah_ibu_xtkrc = DataTrainingModel::where('kelas', 'X-TKR-C')->where('status_yatimpiatu', 'Tanpa Ayah Dan Ibu')->count();
        $rumahsendiri_xtkrc = DataTrainingModel::where('kelas', 'X-TKR-C')->where('status_rumah_ortu', 'Rumah Sendiri')->count();
        $rumahsewa_xtkrc = DataTrainingModel::where('kelas', 'X-TKR-C')->where('status_rumah_ortu', 'Rumah Sewa')->count();
        $kontrakan_xtkrc = DataTrainingModel::where('kelas', 'X-TKR-C')->where('status_rumah_ortu', 'Kontrakan')->count();
        $rumahsaudara_xtkrc = DataTrainingModel::where('kelas', 'X-TKR-C')->where('status_rumah_ortu', 'Tinggal Dengan Saudara')->count();
        $karyawanswasta_xtkrc = DataTrainingModel::where('kelas', 'X-TKR-c')->where('status_pekerjaan_wali', 'Karyawan Swasta')->count();
        $pegawainegeri_xtkrc = DataTrainingModel::where('kelas', 'X-TKR-c')->where('status_pekerjaan_wali', 'Pegawai Negri')->count();
        $pekerja_tdk_tetap_xtkrc = DataTrainingModel::where('kelas', 'X-TKR-c')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->count();
        $usaha_xtkrc = DataTrainingModel::where('kelas', 'X-TKR-c')->where('status_pekerjaan_wali', 'Usaha')->count();
        $ada_sk_xtkrc = DataTrainingModel::where('kelas', 'X-TKR-c')->where('status_sk_tidakmampu', 'Ada')->count();
        $tdk_ada_sk_xtkrc = DataTrainingModel::where('kelas', 'X-TKR-c')->where('status_sk_tidakmampu', 'Tidak Ada')->count();

        //HITUNG DATA TRAINING XI-TKR-A//
        $ortu_lengkap_xitkra = DataTrainingModel::where('kelas', 'XI-TKR-A')->where('status_kelengkapan_ortu', 'Lengkap')->count();
        $tanpa_ayah_xitkra = DataTrainingModel::where('kelas', 'XI-TKR-A')->where('status_yatimpiatu', 'Tanpa Ayah')->count();
        $tanpa_ibu_xitkra = DataTrainingModel::where('kelas', 'XI-TKR-A')->where('status_yatimpiatu', 'Tanpa Ibu')->count();
        $tanpa_ayah_ibu_xitkra = DataTrainingModel::where('kelas', 'XI-TKR-A')->where('status_yatimpiatu', 'Tanpa Ayah Dan Ibu')->count();
        $rumahsendiri_xitkra = DataTrainingModel::where('kelas', 'XI-TKR-A')->where('status_rumah_ortu', 'Rumah Sendiri')->count();
        $rumahsewa_xitkra = DataTrainingModel::where('kelas', 'XI-TKR-A')->where('status_rumah_ortu', 'Rumah Sewa')->count();
        $kontrakan_xitkra = DataTrainingModel::where('kelas', 'XI-TKR-A')->where('status_rumah_ortu', 'Kontrakan')->count();
        $rumahsaudara_xitkra = DataTrainingModel::where('kelas', 'XI-TKR-A')->where('status_rumah_ortu', 'Tinggal Dengan Saudara')->count();
        $karyawanswasta_xitkra = DataTrainingModel::where('kelas', 'XI-TKR-A')->where('status_pekerjaan_wali', 'Karyawan Swasta')->count();
        $pegawainegeri_xitkra = DataTrainingModel::where('kelas', 'XI-TKR-A')->where('status_pekerjaan_wali', 'Pegawai Negri')->count();
        $pekerja_tdk_tetap_xitkra = DataTrainingModel::where('kelas', 'XI-TKR-A')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->count();
        $usaha_xitkra = DataTrainingModel::where('kelas', 'XI-TKR-A')->where('status_pekerjaan_wali', 'Usaha')->count();
        $ada_sk_xitkra = DataTrainingModel::where('kelas', 'XI-TKR-A')->where('status_sk_tidakmampu', 'Ada')->count();
        $tdk_ada_sk_xitkra = DataTrainingModel::where('kelas', 'XI-TKR-A')->where('status_sk_tidakmampu', 'Tidak Ada')->count();

        //HITUNG DATA TRAINING XI-TKR-B//
        $ortu_lengkap_xitkrb = DataTrainingModel::where('kelas', 'XI-TKR-B')->where('status_kelengkapan_ortu', 'Lengkap')->count();
        $tanpa_ayah_xitkrb = DataTrainingModel::where('kelas', 'XI-TKR-B')->where('status_yatimpiatu', 'Tanpa Ayah')->count();
        $tanpa_ibu_xitkrb = DataTrainingModel::where('kelas', 'XI-TKR-B')->where('status_yatimpiatu', 'Tanpa Ibu')->count();
        $tanpa_ayah_ibu_xitkrb = DataTrainingModel::where('kelas', 'XI-TKR-B')->where('status_yatimpiatu', 'Tanpa Ayah Dan Ibu')->count();
        $rumahsendiri_xitkrb = DataTrainingModel::where('kelas', 'XI-TKR-B')->where('status_rumah_ortu', 'Rumah Sendiri')->count();
        $rumahsewa_xitkrb = DataTrainingModel::where('kelas', 'XI-TKR-B')->where('status_rumah_ortu', 'Rumah Sewa')->count();
        $kontrakan_xitkrb = DataTrainingModel::where('kelas', 'XI-TKR-B')->where('status_rumah_ortu', 'Kontrakan')->count();
        $rumahsaudara_xitkrb = DataTrainingModel::where('kelas', 'XI-TKR-B')->where('status_rumah_ortu', 'Tinggal Dengan Saudara')->count();
        $karyawanswasta_xitkrb = DataTrainingModel::where('kelas', 'xi-tkr-b')->where('status_pekerjaan_wali', 'Karyawan Swasta')->count();
        $pegawainegeri_xitkrb = DataTrainingModel::where('kelas', 'xi-tkr-b')->where('status_pekerjaan_wali', 'Pegawai Negri')->count();
        $pekerja_tdk_tetap_xitkrb = DataTrainingModel::where('kelas', 'xi-tkr-b')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->count();
        $usaha_xitkrb = DataTrainingModel::where('kelas', 'xi-tkr-b')->where('status_pekerjaan_wali', 'Usaha')->count();
        $ada_sk_xitkrb = DataTrainingModel::where('kelas', 'xi-tkr-b')->where('status_sk_tidakmampu', 'Ada')->count();
        $tdk_ada_sk_xitkrb = DataTrainingModel::where('kelas', 'xi-tkr-b')->where('status_sk_tidakmampu', 'Tidak Ada')->count();

        //HITUNG DATA TRAINING XI-TKR-C//
        $ortu_lengkap_xitkrc = DataTrainingModel::where('kelas', 'XI-TKR-C')->where('status_kelengkapan_ortu', 'Lengkap')->count();
        $tanpa_ayah_xitkrc = DataTrainingModel::where('kelas', 'XI-TKR-C')->where('status_yatimpiatu', 'Tanpa Ayah')->count();
        $tanpa_ibu_xitkrc = DataTrainingModel::where('kelas', 'XI-TKR-C')->where('status_yatimpiatu', 'Tanpa Ibu')->count();
        $tanpa_ayah_ibu_xitkrc = DataTrainingModel::where('kelas', 'XI-TKR-C')->where('status_yatimpiatu', 'Tanpa Ayah Dan Ibu')->count();
        $rumahsendiri_xitkrc = DataTrainingModel::where('kelas', 'XI-TKR-C')->where('status_rumah_ortu', 'Rumah Sendiri')->count();
        $rumahsewa_xitkrc = DataTrainingModel::where('kelas', 'XI-TKR-C')->where('status_rumah_ortu', 'Rumah Sewa')->count();
        $kontrakan_xitkrc = DataTrainingModel::where('kelas', 'XI-TKR-C')->where('status_rumah_ortu', 'Kontrakan')->count();
        $rumahsaudara_xitkrc = DataTrainingModel::where('kelas', 'XI-TKR-C')->where('status_rumah_ortu', 'Tinggal Dengan Saudara')->count();
        $karyawanswasta_xitkrc = DataTrainingModel::where('kelas', 'XI-TKR-C')->where('status_pekerjaan_wali', 'Karyawan Swasta')->count();
        $pegawainegeri_xitkrc = DataTrainingModel::where('kelas', 'XI-TKR-C')->where('status_pekerjaan_wali', 'Pegawai Negri')->count();
        $pekerja_tdk_tetap_xitkrc = DataTrainingModel::where('kelas', 'XI-TKR-C')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->count();
        $usaha_xitkrc = DataTrainingModel::where('kelas', 'XI-TKR-C')->where('status_pekerjaan_wali', 'Usaha')->count();
        $ada_sk_xitkrc = DataTrainingModel::where('kelas', 'XI-TKR-C')->where('status_sk_tidakmampu', 'Ada')->count();
        $tdk_ada_sk_xitkrc = DataTrainingModel::where('kelas', 'XI-TKR-C')->where('status_sk_tidakmampu', 'Tidak Ada')->count();

        //HITUNG DATA TRAINING XII-TKR-A//
        $ortu_lengkap_xiitkra = DataTrainingModel::where('kelas', 'XII-TKR-A')->where('status_kelengkapan_ortu', 'Lengkap')->count();
        $tanpa_ayah_xiitkra = DataTrainingModel::where('kelas', 'XII-TKR-A')->where('status_yatimpiatu', 'Tanpa Ayah')->count();
        $tanpa_ibu_xiitkra = DataTrainingModel::where('kelas', 'XII-TKR-A')->where('status_yatimpiatu', 'Tanpa Ibu')->count();
        $tanpa_ayah_ibu_xiitkra = DataTrainingModel::where('kelas', 'XII-TKR-A')->where('status_yatimpiatu', 'Tanpa Ayah Dan Ibu')->count();
        $rumahsendiri_xiitkra = DataTrainingModel::where('kelas', 'XII-TKR-A')->where('status_rumah_ortu', 'Rumah Sendiri')->count();
        $rumahsewa_xiitkra = DataTrainingModel::where('kelas', 'XII-TKR-A')->where('status_rumah_ortu', 'Rumah Sewa')->count();
        $kontrakan_xiitkra = DataTrainingModel::where('kelas', 'XII-TKR-A')->where('status_rumah_ortu', 'Kontrakan')->count();
        $rumahsaudara_xiitkra = DataTrainingModel::where('kelas', 'XII-TKR-A')->where('status_rumah_ortu', 'Tinggal Dengan Saudara')->count();
        $karyawanswasta_xiitkra = DataTrainingModel::where('kelas', 'xii-tkr-as')->where('status_pekerjaan_wali', 'Karyawan Swasta')->count();
        $pegawainegeri_xiitkra = DataTrainingModel::where('kelas', 'xii-tkr-a')->where('status_pekerjaan_wali', 'Pegawai Negri')->count();
        $pekerja_tdk_tetap_xiitkra = DataTrainingModel::where('kelas', 'xii-tkr-a')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->count();
        $usaha_xiitkra = DataTrainingModel::where('kelas', 'xii-tkr-a')->where('status_pekerjaan_wali', 'Usaha')->count();
        $ada_sk_xiitkra = DataTrainingModel::where('kelas', 'xii-tkr-a')->where('status_sk_tidakmampu', 'Ada')->count();
        $tdk_ada_sk_xiitkra = DataTrainingModel::where('kelas', 'xii-tkr-a')->where('status_sk_tidakmampu', 'Tidak Ada')->count();

        //HITUNG DATA TRAINING XII-TKR-B//
        $ortu_lengkap_xiitkrb = DataTrainingModel::where('kelas', 'XII-TKR-B')->where('status_kelengkapan_ortu', 'Lengkap')->count();
        $tanpa_ayah_xiitkrb = DataTrainingModel::where('kelas', 'XII-TKR-B')->where('status_yatimpiatu', 'Tanpa Ayah')->count();
        $tanpa_ibu_xiitkrb = DataTrainingModel::where('kelas', 'XII-TKR-B')->where('status_yatimpiatu', 'Tanpa Ibu')->count();
        $tanpa_ayah_ibu_xiitkrb = DataTrainingModel::where('kelas', 'XII-TKR-B')->where('status_yatimpiatu', 'Tanpa Ayah Dan Ibu')->count();
        $rumahsendiri_xiitkrb = DataTrainingModel::where('kelas', 'XII-TKR-B')->where('status_rumah_ortu', 'Rumah Sendiri')->count();
        $rumahsewa_xiitkrb = DataTrainingModel::where('kelas', 'XII-TKR-B')->where('status_rumah_ortu', 'Rumah Sewa')->count();
        $kontrakan_xiitkrb = DataTrainingModel::where('kelas', 'XII-TKR-B')->where('status_rumah_ortu', 'Kontrakan')->count();
        $rumahsaudara_xiitkrb = DataTrainingModel::where('kelas', 'XII-TKR-B')->where('status_rumah_ortu', 'Tinggal Dengan Saudara')->count();
        $karyawanswasta_xiitkrb = DataTrainingModel::where('kelas', 'XII-TKR-B')->where('status_pekerjaan_wali', 'Karyawan Swasta')->count();
        $pegawainegeri_xiitkrb = DataTrainingModel::where('kelas', 'XII-TKR-B')->where('status_pekerjaan_wali', 'Pegawai Negri')->count();
        $pekerja_tdk_tetap_xiitkrb = DataTrainingModel::where('kelas', 'XII-TKR-B')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->count();
        $usaha_xiitkrb = DataTrainingModel::where('kelas', 'XII-TKR-B')->where('status_pekerjaan_wali', 'Usaha')->count();
        $ada_sk_xiitkrb = DataTrainingModel::where('kelas', 'XII-TKR-B')->where('status_sk_tidakmampu', 'Ada')->count();
        $tdk_ada_sk_xiitkrb = DataTrainingModel::where('kelas', 'XII-TKR-B')->where('status_sk_tidakmampu', 'Tidak Ada')->count();

        //HITUNG DATA TRAINING XII-TKR-C//
        $ortu_lengkap_xiitkrc = DataTrainingModel::where('kelas', 'XII-TKR-C')->where('status_kelengkapan_ortu', 'Lengkap')->count();
        $tanpa_ayah_xiitkrc = DataTrainingModel::where('kelas', 'XII-TKR-C')->where('status_yatimpiatu', 'Tanpa Ayah')->count();
        $tanpa_ibu_xiitkrc = DataTrainingModel::where('kelas', 'XII-TKR-C')->where('status_yatimpiatu', 'Tanpa Ibu')->count();
        $tanpa_ayah_ibu_xiitkrc = DataTrainingModel::where('kelas', 'XII-TKR-C')->where('status_yatimpiatu', 'Tanpa Ayah Dan Ibu')->count();
        $rumahsendiri_xiitkrc = DataTrainingModel::where('kelas', 'XII-TKR-C')->where('status_rumah_ortu', 'Rumah Sendiri')->count();
        $rumahsewa_xiitkrc = DataTrainingModel::where('kelas', 'XII-TKR-C')->where('status_rumah_ortu', 'Rumah Sewa')->count();
        $kontrakan_xiitkrc = DataTrainingModel::where('kelas', 'XII-TKR-C')->where('status_rumah_ortu', 'Kontrakan')->count();
        $rumahsaudara_xiitkrc = DataTrainingModel::where('kelas', 'XII-TKR-C')->where('status_rumah_ortu', 'Tinggal Dengan Saudara')->count();
        $karyawanswasta_xiitkrc = DataTrainingModel::where('kelas', 'XII-TKR-C')->where('status_pekerjaan_wali', 'Karyawan Swasta')->count();
        $pegawainegeri_xiitkrc = DataTrainingModel::where('kelas', 'XII-TKR-C')->where('status_pekerjaan_wali', 'Pegawai Negri')->count();
        $pekerja_tdk_tetap_xiitkrc = DataTrainingModel::where('kelas', 'XII-TKR-C')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->count();
        $usaha_xiitkrc = DataTrainingModel::where('kelas', 'XII-TKR-C')->where('status_pekerjaan_wali', 'Usaha')->count();
        $ada_sk_xiitkrc = DataTrainingModel::where('kelas', 'XII-TKR-C')->where('status_sk_tidakmampu', 'Ada')->count();
        $tdk_ada_sk_xiitkrc = DataTrainingModel::where('kelas', 'XII-TKR-C')->where('status_sk_tidakmampu', 'Tidak Ada')->count();

        //TOTAL DATA TRAINING X-TKR-A//
        $xtkra = $ortu_lengkap_xtkra + $tanpa_ayah_xtkra + $tanpa_ibu_xtkra + $tanpa_ayah_ibu_xtkra + $rumahsendiri_xtkra + $rumahsewa_xtkra + $kontrakan_xtkra + $rumahsaudara_xtkra +  $karyawanswasta_xtkra +  $pegawainegeri_xtkra + $pekerja_tdk_tetap_xtkra  +  $usaha_xtkra +   $ada_sk_xtkra +   $tdk_ada_sk_xtkra;
        //TOTAL DATA TRAINING X-TKR-B//
        $xtkrb = $ortu_lengkap_xtkrb + $tanpa_ayah_xtkrb + $tanpa_ibu_xtkrb + $tanpa_ayah_ibu_xtkrb + $rumahsendiri_xtkrb + $rumahsewa_xtkrb + $kontrakan_xtkrb + $rumahsaudara_xtkrb +  $karyawanswasta_xtkrb +  $pegawainegeri_xtkrb + $pekerja_tdk_tetap_xtkrb  +  $usaha_xtkrb +   $ada_sk_xtkrb +   $tdk_ada_sk_xtkrb;
        //TOTAL DATA TRAINING X-TKR-C//
        $xtkrc = $ortu_lengkap_xtkrc + $tanpa_ayah_xtkrc + $tanpa_ibu_xtkrc + $tanpa_ayah_ibu_xtkrc + $rumahsendiri_xtkrc + $rumahsewa_xtkrc + $kontrakan_xtkrc + $rumahsaudara_xtkrc +  $karyawanswasta_xtkrc +  $pegawainegeri_xtkrc + $pekerja_tdk_tetap_xtkrc  +  $usaha_xtkrc +   $ada_sk_xtkrc +   $tdk_ada_sk_xtkrc;
        //TOTAL DATA TRAINING XI-TKR-A//
        $xitkra = $ortu_lengkap_xitkra + $tanpa_ayah_xitkra + $tanpa_ibu_xitkra + $tanpa_ayah_ibu_xitkra + $rumahsendiri_xitkra + $rumahsewa_xitkra + $kontrakan_xitkra + $rumahsaudara_xitkra +  $karyawanswasta_xitkra +  $pegawainegeri_xitkra + $pekerja_tdk_tetap_xitkra  +  $usaha_xitkra +   $ada_sk_xitkra +   $tdk_ada_sk_xitkra;
        //TOTAL DATA TRAINING XI-TKR-B//
        $xitkrb = $ortu_lengkap_xitkrb + $tanpa_ayah_xitkrb + $tanpa_ibu_xitkrb + $tanpa_ayah_ibu_xitkrb + $rumahsendiri_xitkrb + $rumahsewa_xitkrb + $kontrakan_xitkrb + $rumahsaudara_xitkrb +  $karyawanswasta_xitkrb +  $pegawainegeri_xitkrb + $pekerja_tdk_tetap_xitkrb  +  $usaha_xitkrb +   $ada_sk_xitkrb +   $tdk_ada_sk_xitkrb;
        //TOTAL DATA TRAINING XI-TKR-C//
        $xitkrc = $ortu_lengkap_xitkrc + $tanpa_ayah_xitkrc + $tanpa_ibu_xitkrc + $tanpa_ayah_ibu_xitkrc + $rumahsendiri_xitkrc + $rumahsewa_xitkrc + $kontrakan_xitkrc + $rumahsaudara_xitkrc +  $karyawanswasta_xitkrc +  $pegawainegeri_xitkrc + $pekerja_tdk_tetap_xitkrc  +  $usaha_xitkrc +   $ada_sk_xitkrc +   $tdk_ada_sk_xitkrc;
        //TOTAL DATA TRAINING XII-TKR-A//
        $xiitkra = $ortu_lengkap_xiitkra + $tanpa_ayah_xiitkra + $tanpa_ibu_xiitkra + $tanpa_ayah_ibu_xiitkra + $rumahsendiri_xiitkra + $rumahsewa_xiitkra + $kontrakan_xiitkra + $rumahsaudara_xiitkra +  $karyawanswasta_xiitkra +  $pegawainegeri_xiitkra + $pekerja_tdk_tetap_xiitkra  +  $usaha_xiitkra +   $ada_sk_xiitkra +   $tdk_ada_sk_xiitkra;
        //TOTAL DATA TRAINING XII-TKR-B//
        $xiitkrb = $ortu_lengkap_xiitkrb + $tanpa_ayah_xiitkrb + $tanpa_ibu_xiitkrb + $tanpa_ayah_ibu_xiitkrb + $rumahsendiri_xiitkrb + $rumahsewa_xiitkrb + $kontrakan_xiitkrb + $rumahsaudara_xiitkrb +  $karyawanswasta_xiitkrb +  $pegawainegeri_xiitkrb + $pekerja_tdk_tetap_xiitkrb  +  $usaha_xiitkrb +   $ada_sk_xiitkrb +   $tdk_ada_sk_xiitkrb;;
        //TOTAL DATA TRAINING XII-TKR-C//
        $xiitkrc = $ortu_lengkap_xiitkrc + $tanpa_ayah_xiitkrc + $tanpa_ibu_xiitkrc + $tanpa_ayah_ibu_xiitkrc + $rumahsendiri_xiitkrc + $rumahsewa_xiitkrc + $kontrakan_xiitkrc + $rumahsaudara_xiitkrc +  $karyawanswasta_xiitkrc +  $pegawainegeri_xiitkrc + $pekerja_tdk_tetap_xiitkrc  +  $usaha_xiitkrc +   $ada_sk_xiitkrc +   $tdk_ada_sk_xiitkrc;

        $dataset_siswa = DataSetModel::all();

        return view('admin.data_training.index', compact(
            'dataset_siswa',
            'datatraining',
            //JURUSAN TKJ
            'xtkja',
            'xtkjb',
            'xtkjc',
            'xtkjd',
            'xitkja',
            'xitkjb',
            'xitkjc',
            'xiitkja',
            'xiitkjb',
            'xiitkjc',
            // JURUSAN TKR
            'xtkra',
            'xtkrb',
            'xtkrc',
            'xitkra',
            'xitkrb',
            'xitkrc',
            'xiitkra',
            'xiitkrb',
            'xiitkrc',
            //ORTU LENGKAP TKJ
            'ortu_lengkap_xtkja',
            'ortu_lengkap_xtkjb',
            'ortu_lengkap_xtkjc',
            'ortu_lengkap_xtkjd',
            'ortu_lengkap_xitkja',
            'ortu_lengkap_xitkjb',
            'ortu_lengkap_xitkjc',
            'ortu_lengkap_xiitkja',
            'ortu_lengkap_xiitkjb',
            'ortu_lengkap_xiitkjc',
            //ORTU LENGKAP TKR
            'ortu_lengkap_xtkra',
            'ortu_lengkap_xtkrb',
            'ortu_lengkap_xtkrc',
            'ortu_lengkap_xtkrd',
            'ortu_lengkap_xitkra',
            'ortu_lengkap_xitkrb',
            'ortu_lengkap_xitkrc',
            'ortu_lengkap_xiitkra',
            'ortu_lengkap_xiitkrb',
            'ortu_lengkap_xiitkrc',
            //DATA TRINING X-TKJ-A//
            'tanpa_ayah_xtkja',
            'tanpa_ibu_xtkja',
            'tanpa_ayah_ibu_xtkja',
            'rumahsendiri_xtkja',
            'rumahsewa_xtkja',
            'kontrakan_xtkja',
            'rumahsaudara_xtkja',
            'karyawanswasta_xtkja',
            'pegawainegeri_xtkja',
            'pekerja_tdk_tetap_xtkja',
            'usaha_xtkja',
            'ada_sk_xtkja',
            'tdk_ada_sk_xtkja',
            //DATA TRINING X-TKJ-B//
            'tanpa_ayah_xtkjb',
            'tanpa_ibu_xtkjb',
            'tanpa_ayah_ibu_xtkjb',
            'rumahsendiri_xtkjb',
            'rumahsewa_xtkjb',
            'kontrakan_xtkjb',
            'rumahsaudara_xtkjb',
            'karyawanswasta_xtkjb',
            'pegawainegeri_xtkjb',
            'pekerja_tdk_tetap_xtkjb',
            'usaha_xtkjb',
            'ada_sk_xtkjb',
            'tdk_ada_sk_xtkjb',
            //DATA TRINING X-TKJ-C//
            'tanpa_ayah_xtkjc',
            'tanpa_ibu_xtkjc',
            'tanpa_ayah_ibu_xtkjc',
            'rumahsendiri_xtkjc',
            'rumahsewa_xtkjc',
            'kontrakan_xtkjc',
            'rumahsaudara_xtkjc',
            'karyawanswasta_xtkjc',
            'pegawainegeri_xtkjc',
            'pekerja_tdk_tetap_xtkjc',
            'usaha_xtkjc',
            'ada_sk_xtkjc',
            'tdk_ada_sk_xtkjc',
            //DATA TRINING X-TKJ-D//
            'tanpa_ayah_xtkjd',
            'tanpa_ibu_xtkjd',
            'tanpa_ayah_ibu_xtkjd',
            'rumahsendiri_xtkjd',
            'rumahsewa_xtkjd',
            'kontrakan_xtkjd',
            'rumahsaudara_xtkjd',
            'karyawanswasta_xtkjd',
            'pegawainegeri_xtkjd',
            'pekerja_tdk_tetap_xtkjd',
            'usaha_xtkjd',
            'ada_sk_xtkjd',
            'tdk_ada_sk_xtkjd',
            //DATA TRINING XI-TKJ-A//
            'tanpa_ayah_xitkja',
            'tanpa_ibu_xitkja',
            'tanpa_ayah_ibu_xitkja',
            'rumahsendiri_xitkja',
            'rumahsewa_xitkja',
            'kontrakan_xitkja',
            'rumahsaudara_xitkja',
            'karyawanswasta_xitkja',
            'pegawainegeri_xitkja',
            'pekerja_tdk_tetap_xitkja',
            'usaha_xitkja',
            'ada_sk_xitkja',
            'tdk_ada_sk_xitkja',
            //DATA TRINING XI-TKJ-B//
            'tanpa_ayah_xitkjb',
            'tanpa_ibu_xitkjb',
            'tanpa_ayah_ibu_xitkjb',
            'rumahsendiri_xitkjb',
            'rumahsewa_xitkjb',
            'kontrakan_xitkjb',
            'rumahsaudara_xitkjb',
            'karyawanswasta_xitkjb',
            'pegawainegeri_xitkjb',
            'pekerja_tdk_tetap_xitkjb',
            'usaha_xitkjb',
            'ada_sk_xitkjb',
            'tdk_ada_sk_xitkjb',
            //DATA TRINING XI-TKJ-C//
            'tanpa_ayah_xitkjc',
            'tanpa_ibu_xitkjc',
            'tanpa_ayah_ibu_xitkjc',
            'rumahsendiri_xitkjc',
            'rumahsewa_xitkjc',
            'kontrakan_xitkjc',
            'rumahsaudara_xitkjc',
            'karyawanswasta_xitkjc',
            'pegawainegeri_xitkjc',
            'pekerja_tdk_tetap_xitkjc',
            'usaha_xitkjc',
            'ada_sk_xitkjc',
            'tdk_ada_sk_xitkjc',
            //DATA TRINING XII-TKJ-A//
            'tanpa_ayah_xiitkja',
            'tanpa_ibu_xiitkja',
            'tanpa_ayah_ibu_xiitkja',
            'rumahsendiri_xiitkja',
            'rumahsewa_xiitkja',
            'kontrakan_xiitkja',
            'rumahsaudara_xiitkja',
            'karyawanswasta_xiitkja',
            'pegawainegeri_xiitkja',
            'pekerja_tdk_tetap_xiitkja',
            'usaha_xiitkja',
            'ada_sk_xiitkja',
            'tdk_ada_sk_xiitkja',
            //DATA TRINING XII-TKJ-B//
            'tanpa_ayah_xiitkjb',
            'tanpa_ibu_xiitkjb',
            'tanpa_ayah_ibu_xiitkjb',
            'rumahsendiri_xiitkjb',
            'rumahsewa_xiitkjb',
            'kontrakan_xiitkjb',
            'rumahsaudara_xiitkjb',
            'karyawanswasta_xiitkjb',
            'pegawainegeri_xiitkjb',
            'pekerja_tdk_tetap_xiitkjb',
            'usaha_xiitkjb',
            'ada_sk_xiitkjb',
            'tdk_ada_sk_xiitkjb',
            //DATA TRINING XII-TKJ-c//
            'tanpa_ayah_xiitkjc',
            'tanpa_ibu_xiitkjc',
            'tanpa_ayah_ibu_xiitkjc',
            'rumahsendiri_xiitkjc',
            'rumahsewa_xiitkjc',
            'kontrakan_xiitkjc',
            'rumahsaudara_xiitkjc',
            'karyawanswasta_xiitkjc',
            'pegawainegeri_xiitkjc',
            'pekerja_tdk_tetap_xiitkjc',
            'usaha_xiitkjc',
            'ada_sk_xiitkjc',
            'tdk_ada_sk_xiitkjc',
            //DATA TRINING X-TKR-A//
            'tanpa_ayah_xtkra',
            'tanpa_ibu_xtkra',
            'tanpa_ayah_ibu_xtkra',
            'rumahsendiri_xtkra',
            'rumahsewa_xtkra',
            'kontrakan_xtkra',
            'rumahsaudara_xtkra',
            'karyawanswasta_xtkra',
            'pegawainegeri_xtkra',
            'pekerja_tdk_tetap_xtkra',
            'usaha_xtkra',
            'ada_sk_xtkra',
            'tdk_ada_sk_xtkra',
            //DATA TRINING X-TKR-B//
            'tanpa_ayah_xtkrb',
            'tanpa_ibu_xtkrb',
            'tanpa_ayah_ibu_xtkrb',
            'rumahsendiri_xtkrb',
            'rumahsewa_xtkrb',
            'kontrakan_xtkrb',
            'rumahsaudara_xtkrb',
            'karyawanswasta_xtkrb',
            'pegawainegeri_xtkrb',
            'pekerja_tdk_tetap_xtkrb',
            'usaha_xtkrb',
            'ada_sk_xtkrb',
            'tdk_ada_sk_xtkrb',
            //DATA TRINING X-TKR-C//
            'tanpa_ayah_xtkrc',
            'tanpa_ibu_xtkrc',
            'tanpa_ayah_ibu_xtkrc',
            'rumahsendiri_xtkrc',
            'rumahsewa_xtkrc',
            'kontrakan_xtkrc',
            'rumahsaudara_xtkrc',
            'karyawanswasta_xtkrc',
            'pegawainegeri_xtkrc',
            'pekerja_tdk_tetap_xtkrc',
            'usaha_xtkrc',
            'ada_sk_xtkrc',
            'tdk_ada_sk_xtkrc',
            //DATA TRINING XI-TKR-A//
            'tanpa_ayah_xitkra',
            'tanpa_ibu_xitkra',
            'tanpa_ayah_ibu_xitkra',
            'rumahsendiri_xitkra',
            'rumahsewa_xitkra',
            'kontrakan_xitkra',
            'rumahsaudara_xitkra',
            'karyawanswasta_xitkra',
            'pegawainegeri_xitkra',
            'pekerja_tdk_tetap_xitkra',
            'usaha_xitkra',
            'ada_sk_xitkra',
            'tdk_ada_sk_xitkra',
            //DATA TRINING XI-TKR-B//
            'tanpa_ayah_xitkrb',
            'tanpa_ibu_xitkrb',
            'tanpa_ayah_ibu_xitkrb',
            'rumahsendiri_xitkrb',
            'rumahsewa_xitkrb',
            'kontrakan_xitkrb',
            'rumahsaudara_xitkrb',
            'karyawanswasta_xitkrb',
            'pegawainegeri_xitkrb',
            'pekerja_tdk_tetap_xitkrb',
            'usaha_xitkrb',
            'ada_sk_xitkrb',
            'tdk_ada_sk_xitkrb',
            //DATA TRINING XI-TKR-C//
            'tanpa_ayah_xitkrc',
            'tanpa_ibu_xitkrc',
            'tanpa_ayah_ibu_xitkrc',
            'rumahsendiri_xitkrc',
            'rumahsewa_xitkrc',
            'kontrakan_xitkrc',
            'rumahsaudara_xitkrc',
            'karyawanswasta_xitkrc',
            'pegawainegeri_xitkrc',
            'pekerja_tdk_tetap_xitkrc',
            'usaha_xitkrc',
            'ada_sk_xitkrc',
            'tdk_ada_sk_xitkrc',
            //DATA TRINING XII-TKR-A//
            'tanpa_ayah_xiitkra',
            'tanpa_ibu_xiitkra',
            'tanpa_ayah_ibu_xiitkra',
            'rumahsendiri_xiitkra',
            'rumahsewa_xiitkra',
            'kontrakan_xiitkra',
            'rumahsaudara_xiitkra',
            'karyawanswasta_xiitkra',
            'pegawainegeri_xiitkra',
            'pekerja_tdk_tetap_xiitkra',
            'usaha_xiitkra',
            'ada_sk_xiitkra',
            'tdk_ada_sk_xiitkra',
            //DATA TRINING XII-TKR-B//
            'tanpa_ayah_xiitkrb',
            'tanpa_ibu_xiitkrb',
            'tanpa_ayah_ibu_xiitkrb',
            'rumahsendiri_xiitkrb',
            'rumahsewa_xiitkrb',
            'kontrakan_xiitkrb',
            'rumahsaudara_xiitkrb',
            'karyawanswasta_xiitkrb',
            'pegawainegeri_xiitkrb',
            'pekerja_tdk_tetap_xiitkrb',
            'usaha_xiitkrb',
            'ada_sk_xiitkrb',
            'tdk_ada_sk_xiitkrb',
            //DATA TRINING XII-TKR-C//
            'tanpa_ayah_xiitkrc',
            'tanpa_ibu_xiitkrc',
            'tanpa_ayah_ibu_xiitkrc',
            'rumahsendiri_xiitkrc',
            'rumahsewa_xiitkrc',
            'kontrakan_xiitkrc',
            'rumahsaudara_xiitkrc',
            'karyawanswasta_xiitkrc',
            'pegawainegeri_xiitkrc',
            'pekerja_tdk_tetap_xiitkrc',
            'usaha_xiitkrc',
            'ada_sk_xiitkrc',
            'tdk_ada_sk_xiitkrc'
        ));
    }

    public function insert_data_training(Request $request)
    {
        // validasi
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        Excel::import(new DataTrainingSampelModel, $request->file('file'));

        Alert::success('Sukses', 'Data Sampel Training Berhasil Di Upload');
        return redirect('/admin/data_training');
    }

    public function get_edit_data_training($id)
    {
        $data = DataTrainingModel::find($id);
        $kelas = DB::table('tbl_kelas')->get();
        return view('admin.data_training.edit', compact('data', 'kelas'));
    }

    public function get_dataset_siswa()
    {
        $status = DataSetModel::all();

        $datatraining = DataTrainingModel::all();


        //HITUNG DATA TRAINING  XTKJA//
        $ortu_lengkap_xtkja = DataTrainingModel::where('kelas', 'X-TKJ-A')->where('status_kelengkapan_ortu', 'Lengkap')->count();
        $tanpa_ayah_xtkja = DataTrainingModel::where('kelas', 'X-tkj-A')->where('status_yatimpiatu', 'Tanpa Ayah')->count();
        $tanpa_ibu_xtkja = DataTrainingModel::where('kelas', 'X-tkj-A')->where('status_yatimpiatu', 'Tanpa Ibu')->count();
        $tanpa_ayah_ibu_xtkja = DataTrainingModel::where('kelas', 'X-tkj-A')->where('status_yatimpiatu', 'Tanpa Ayah Dan Ibu')->count();
        $rumahsendiri_xtkja = DataTrainingModel::where('kelas', 'X-tkj-A')->where('status_rumah_ortu', 'Rumah Sendiri')->count();
        $rumahsewa_xtkja = DataTrainingModel::where('kelas', 'X-tkj-A')->where('status_rumah_ortu', 'Rumah Sewa')->count();
        $kontrakan_xtkja = DataTrainingModel::where('kelas', 'X-tkj-A')->where('status_rumah_ortu', 'Kontrakan')->count();
        $rumahsaudara_xtkja = DataTrainingModel::where('kelas', 'X-tkj-A')->where('status_rumah_ortu', 'Tinggal Dengan Saudara')->count();
        $karyawanswasta_xtkja = DataTrainingModel::where('kelas', 'X-tkj-A')->where('status_pekerjaan_wali', 'Karyawan Swasta')->count();
        $pegawainegeri_xtkja = DataTrainingModel::where('kelas', 'X-tkj-A')->where('status_pekerjaan_wali', 'Pegawai Negri')->count();
        $pekerja_tdk_tetap_xtkja = DataTrainingModel::where('kelas', 'X-tkj-A')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->count();
        $usaha_xtkja = DataTrainingModel::where('kelas', 'X-tkj-A')->where('status_pekerjaan_wali', 'Usaha')->count();
        $ada_sk_xtkja = DataTrainingModel::where('kelas', 'X-tkj-A')->where('status_sk_tidakmampu', 'Ada')->count();
        $tdk_ada_sk_xtkja = DataTrainingModel::where('kelas', 'X-tkj-A')->where('status_sk_tidakmampu', 'Tidak Ada')->count();

        //HITUNG DATA TRAINING TKJB//
        $ortu_lengkap_xtkjb = DataTrainingModel::where('kelas', 'X-TKJ-B')->where('status_kelengkapan_ortu', 'Lengkap')->count();
        $tanpa_ayah_xtkjb = DataTrainingModel::where('kelas', 'X-TKJ-B')->where('status_yatimpiatu', 'Tanpa Ayah')->count();
        $tanpa_ibu_xtkjb = DataTrainingModel::where('kelas', 'X-TKJ-B')->where('status_yatimpiatu', 'Tanpa Ibu')->count();
        $tanpa_ayah_ibu_xtkjb = DataTrainingModel::where('kelas', 'X-TKJ-B')->where('status_yatimpiatu', 'Tanpa Ayah Dan Ibu')->count();
        $rumahsendiri_xtkjb = DataTrainingModel::where('kelas', 'X-TKJ-B')->where('status_rumah_ortu', 'Rumah Sendiri')->count();
        $rumahsewa_xtkjb = DataTrainingModel::where('kelas', 'X-TKJ-B')->where('status_rumah_ortu', 'Rumah Sewa')->count();
        $kontrakan_xtkjb = DataTrainingModel::where('kelas', 'X-TKJ-B')->where('status_rumah_ortu', 'Kontrakan')->count();
        $rumahsaudara_xtkjb = DataTrainingModel::where('kelas', 'X-TKJ-B')->where('status_rumah_ortu', 'Tinggal Dengan Saudara')->count();
        $karyawanswasta_xtkjb = DataTrainingModel::where('kelas', 'X-TKJ-B')->where('status_pekerjaan_wali', 'Karyawan Swasta')->count();
        $pegawainegeri_xtkjb = DataTrainingModel::where('kelas', 'X-TKJ-B')->where('status_pekerjaan_wali', 'Pegawai Negri')->count();
        $pekerja_tdk_tetap_xtkjb = DataTrainingModel::where('kelas', 'X-TKJ-B')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->count();
        $usaha_xtkjb = DataTrainingModel::where('kelas', 'X-TKJ-B')->where('status_pekerjaan_wali', 'Usaha')->count();
        $ada_sk_xtkjb = DataTrainingModel::where('kelas', 'X-TKJ-B')->where('status_sk_tidakmampu', 'Ada')->count();
        $tdk_ada_sk_xtkjb = DataTrainingModel::where('kelas', 'X-TKJ-B')->where('status_sk_tidakmampu', 'Tidak Ada')->count();

        //HITUNG DATA TRAINING TKJC//
        $ortu_lengkap_xtkjc = DataTrainingModel::where('kelas', 'X-TKJ-C')->where('status_kelengkapan_ortu', 'Lengkap')->count();
        $tanpa_ayah_xtkjc = DataTrainingModel::where('kelas', 'X-TKJ-C')->where('status_yatimpiatu', 'Tanpa Ayah')->count();
        $tanpa_ibu_xtkjc = DataTrainingModel::where('kelas', 'X-TKJ-C')->where('status_yatimpiatu', 'Tanpa Ibu')->count();
        $tanpa_ayah_ibu_xtkjc = DataTrainingModel::where('kelas', 'X-TKJ-C')->where('status_yatimpiatu', 'Tanpa Ayah Dan Ibu')->count();
        $rumahsendiri_xtkjc = DataTrainingModel::where('kelas', 'X-TKJ-C')->where('status_rumah_ortu', 'Rumah Sendiri')->count();
        $rumahsewa_xtkjc = DataTrainingModel::where('kelas', 'X-TKJ-C')->where('status_rumah_ortu', 'Rumah Sewa')->count();
        $kontrakan_xtkjc = DataTrainingModel::where('kelas', 'X-TKJ-C')->where('status_rumah_ortu', 'Kontrakan')->count();
        $rumahsaudara_xtkjc = DataTrainingModel::where('kelas', 'X-TKJ-C')->where('status_rumah_ortu', 'Tinggal Dengan Saudara')->count();
        $karyawanswasta_xtkjc = DataTrainingModel::where('kelas', 'X-tkj-C')->where('status_pekerjaan_wali', 'Karyawan Swasta')->count();
        $pegawainegeri_xtkjc = DataTrainingModel::where('kelas', 'X-tkj-C')->where('status_pekerjaan_wali', 'Pegawai Negri')->count();
        $pekerja_tdk_tetap_xtkjc = DataTrainingModel::where('kelas', 'X-tkj-C')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->count();
        $usaha_xtkjc = DataTrainingModel::where('kelas', 'X-tkj-C')->where('status_pekerjaan_wali', 'Usaha')->count();
        $ada_sk_xtkjc = DataTrainingModel::where('kelas', 'X-tkj-C')->where('status_sk_tidakmampu', 'Ada')->count();
        $tdk_ada_sk_xtkjc = DataTrainingModel::where('kelas', 'X-tkj-C')->where('status_sk_tidakmampu', 'Tidak Ada')->count();


        //HITUNG DATA TRAINING TKJD//
        $ortu_lengkap_xtkjd = DataTrainingModel::where('kelas', 'X-TKJ-D')->where('status_kelengkapan_ortu', 'Lengkap')->count();
        $tanpa_ayah_xtkjd = DataTrainingModel::where('kelas', 'X-TKJ-D')->where('status_yatimpiatu', 'Tanpa Ayah')->count();
        $tanpa_ibu_xtkjd = DataTrainingModel::where('kelas', 'X-TKJ-D')->where('status_yatimpiatu', 'Tanpa Ibu')->count();
        $tanpa_ayah_ibu_xtkjd = DataTrainingModel::where('kelas', 'X-TKJ-D')->where('status_yatimpiatu', 'Tanpa Ayah Dan Ibu')->count();
        $rumahsendiri_xtkjd = DataTrainingModel::where('kelas', 'X-TKJ-D')->where('status_rumah_ortu', 'Rumah Sendiri')->count();
        $rumahsewa_xtkjd = DataTrainingModel::where('kelas', 'X-TKJ-D')->where('status_rumah_ortu', 'Rumah Sewa')->count();
        $kontrakan_xtkjd = DataTrainingModel::where('kelas', 'X-TKJ-D')->where('status_rumah_ortu', 'Kontrakan')->count();
        $rumahsaudara_xtkjd = DataTrainingModel::where('kelas', 'X-TKJ-D')->where('status_rumah_ortu', 'Tinggal Dengan Saudara')->count();
        $karyawanswasta_xtkjd = DataTrainingModel::where('kelas', 'X-tkj-D')->where('status_pekerjaan_wali', 'Karyawan Swasta')->count();
        $pegawainegeri_xtkjd = DataTrainingModel::where('kelas', 'X-tkj-D')->where('status_pekerjaan_wali', 'Pegawai Negri')->count();
        $pekerja_tdk_tetap_xtkjd = DataTrainingModel::where('kelas', 'X-tkj-D')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->count();
        $usaha_xtkjd = DataTrainingModel::where('kelas', 'X-tkj-D')->where('status_pekerjaan_wali', 'Usaha')->count();
        $ada_sk_xtkjd = DataTrainingModel::where('kelas', 'X-tkj-D')->where('status_sk_tidakmampu', 'Ada')->count();
        $tdk_ada_sk_xtkjd = DataTrainingModel::where('kelas', 'X-tkj-D')->where('status_sk_tidakmampu', 'Tidak Ada')->count();


        //HITUNG DATA TRAINING XI-TKJA//
        $ortu_lengkap_xitkja = DataTrainingModel::where('kelas', 'XI-TKJ-A')->where('status_kelengkapan_ortu', 'Lengkap')->count();
        $tanpa_ayah_xitkja = DataTrainingModel::where('kelas', 'XI-TKJ-A')->where('status_yatimpiatu', 'Tanpa Ayah')->count();
        $tanpa_ibu_xitkja = DataTrainingModel::where('kelas', 'XI-TKJ-A')->where('status_yatimpiatu', 'Tanpa Ibu')->count();
        $tanpa_ayah_ibu_xitkja = DataTrainingModel::where('kelas', 'XI-TKJ-A')->where('status_yatimpiatu', 'Tanpa Ayah Dan Ibu')->count();
        $rumahsendiri_xitkja = DataTrainingModel::where('kelas', 'XI-TKJ-A')->where('status_rumah_ortu', 'Rumah Sendiri')->count();
        $rumahsewa_xitkja = DataTrainingModel::where('kelas', 'XI-TKJ-A')->where('status_rumah_ortu', 'Rumah Sewa')->count();
        $kontrakan_xitkja = DataTrainingModel::where('kelas', 'XI-TKJ-A')->where('status_rumah_ortu', 'Kontrakan')->count();
        $rumahsaudara_xitkja = DataTrainingModel::where('kelas', 'XI-TKJ-A')->where('status_rumah_ortu', 'Tinggal Dengan Saudara')->count();
        $karyawanswasta_xitkja = DataTrainingModel::where('kelas', 'XI-TKJ-A')->where('status_pekerjaan_wali', 'Karyawan Swasta')->count();
        $pegawainegeri_xitkja = DataTrainingModel::where('kelas', 'XI-TKJ-A')->where('status_pekerjaan_wali', 'Pegawai Negri')->count();
        $pekerja_tdk_tetap_xitkja = DataTrainingModel::where('kelas', 'XI-TKJ-A')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->count();
        $usaha_xitkja = DataTrainingModel::where('kelas', 'XI-TKJ-A')->where('status_pekerjaan_wali', 'Usaha')->count();
        $ada_sk_xitkja = DataTrainingModel::where('kelas', 'XI-TKJ-A')->where('status_sk_tidakmampu', 'Ada')->count();
        $tdk_ada_sk_xitkja = DataTrainingModel::where('kelas', 'XI-TKJ-A')->where('status_sk_tidakmampu', 'Tidak Ada')->count();


        //HITUNG DATA TRAINING XITKJB//
        $ortu_lengkap_xitkjb = DataTrainingModel::where('kelas', 'XI-TKJ-B')->where('status_kelengkapan_ortu', 'Lengkap')->count();
        $tanpa_ayah_xitkjb = DataTrainingModel::where('kelas', 'XI-TKJ-B')->where('status_yatimpiatu', 'Tanpa Ayah')->count();
        $tanpa_ibu_xitkjb = DataTrainingModel::where('kelas', 'XI-TKJ-B')->where('status_yatimpiatu', 'Tanpa Ibu')->count();
        $tanpa_ayah_ibu_xitkjb = DataTrainingModel::where('kelas', 'XI-TKJ-B')->where('status_yatimpiatu', 'Tanpa Ayah Dan Ibu')->count();
        $rumahsendiri_xitkjb = DataTrainingModel::where('kelas', 'XI-TKJ-B')->where('status_rumah_ortu', 'Rumah Sendiri')->count();
        $rumahsewa_xitkjb = DataTrainingModel::where('kelas', 'XI-TKJ-B')->where('status_rumah_ortu', 'Rumah Sewa')->count();
        $kontrakan_xitkjb = DataTrainingModel::where('kelas', 'XI-TKJ-B')->where('status_rumah_ortu', 'Kontrakan')->count();
        $rumahsaudara_xitkjb = DataTrainingModel::where('kelas', 'XI-TKJ-B')->where('status_rumah_ortu', 'Tinggal Dengan Saudara')->count();
        $karyawanswasta_xitkjb = DataTrainingModel::where('kelas', 'XI-TKJ-B')->where('status_pekerjaan_wali', 'Karyawan Swasta')->count();
        $pegawainegeri_xitkjb = DataTrainingModel::where('kelas', 'XI-TKJ-B')->where('status_pekerjaan_wali', 'Pegawai Negri')->count();
        $pekerja_tdk_tetap_xitkjb = DataTrainingModel::where('kelas', 'XI-TKJ-B')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->count();
        $usaha_xitkjb = DataTrainingModel::where('kelas', 'XI-TKJ-B')->where('status_pekerjaan_wali', 'Usaha')->count();
        $ada_sk_xitkjb = DataTrainingModel::where('kelas', 'XI-TKJ-B')->where('status_sk_tidakmampu', 'Ada')->count();
        $tdk_ada_sk_xitkjb = DataTrainingModel::where('kelas', 'XI-TKJ-B')->where('status_sk_tidakmampu', 'Tidak Ada')->count();

        //HITUNG DATA TRAINING XITKJC//
        $ortu_lengkap_xitkjc = DataTrainingModel::where('kelas', 'XI-TKJ-C')->where('status_kelengkapan_ortu', 'Lengkap')->count();
        $tanpa_ayah_xitkjc = DataTrainingModel::where('kelas', 'XI-TKJ-C')->where('status_yatimpiatu', 'Tanpa Ayah')->count();
        $tanpa_ibu_xitkjc = DataTrainingModel::where('kelas', 'XI-TKJ-C')->where('status_yatimpiatu', 'Tanpa Ibu')->count();
        $tanpa_ayah_ibu_xitkjc = DataTrainingModel::where('kelas', 'XI-TKJ-C')->where('status_yatimpiatu', 'Tanpa Ayah Dan Ibu')->count();
        $rumahsendiri_xitkjc = DataTrainingModel::where('kelas', 'XI-TKJ-C')->where('status_rumah_ortu', 'Rumah Sendiri')->count();
        $rumahsewa_xitkjc = DataTrainingModel::where('kelas', 'XI-TKJ-C')->where('status_rumah_ortu', 'Rumah Sewa')->count();
        $kontrakan_xitkjc = DataTrainingModel::where('kelas', 'XI-TKJ-C')->where('status_rumah_ortu', 'Kontrakan')->count();
        $rumahsaudara_xitkjc = DataTrainingModel::where('kelas', 'XI-TKJ-C')->where('status_rumah_ortu', 'Tinggal Dengan Saudara')->count();
        $karyawanswasta_xitkjc = DataTrainingModel::where('kelas', 'XI-TKJ-C')->where('status_pekerjaan_wali', 'Karyawan Swasta')->count();
        $pegawainegeri_xitkjc = DataTrainingModel::where('kelas', 'XI-TKJ-C')->where('status_pekerjaan_wali', 'Pegawai Negri')->count();
        $pekerja_tdk_tetap_xitkjc = DataTrainingModel::where('kelas', 'XI-TKJ-C')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->count();
        $usaha_xitkjc = DataTrainingModel::where('kelas', 'XI-TKJ-C')->where('status_pekerjaan_wali', 'Usaha')->count();
        $ada_sk_xitkjc = DataTrainingModel::where('kelas', 'XI-TKJ-C')->where('status_sk_tidakmampu', 'Ada')->count();
        $tdk_ada_sk_xitkjc = DataTrainingModel::where('kelas', 'XI-TKJ-C')->where('status_sk_tidakmampu', 'Tidak Ada')->count();

        //HITUNG DATA TRAINING XII-TKJ-A//
        $ortu_lengkap_xiitkja = DataTrainingModel::where('kelas', 'XII-TKJ-A')->where('status_kelengkapan_ortu', 'Lengkap')->count();
        $tanpa_ayah_xiitkja = DataTrainingModel::where('kelas', 'XII-TKJ-A')->where('status_yatimpiatu', 'Tanpa Ayah')->count();
        $tanpa_ibu_xiitkja = DataTrainingModel::where('kelas', 'XII-TKJ-A')->where('status_yatimpiatu', 'Tanpa Ibu')->count();
        $tanpa_ayah_ibu_xiitkja = DataTrainingModel::where('kelas', 'XII-TKJ-A')->where('status_yatimpiatu', 'Tanpa Ayah Dan Ibu')->count();
        $rumahsendiri_xiitkja = DataTrainingModel::where('kelas', 'XII-TKJ-A')->where('status_rumah_ortu', 'Rumah Sendiri')->count();
        $rumahsewa_xiitkja = DataTrainingModel::where('kelas', 'XII-TKJ-A')->where('status_rumah_ortu', 'Rumah Sewa')->count();
        $kontrakan_xiitkja = DataTrainingModel::where('kelas', 'XII-TKJ-A')->where('status_rumah_ortu', 'Kontrakan')->count();
        $rumahsaudara_xiitkja = DataTrainingModel::where('kelas', 'XII-TKJ-A')->where('status_rumah_ortu', 'Tinggal Dengan Saudara')->count();
        $karyawanswasta_xiitkja = DataTrainingModel::where('kelas', 'XII-TKJ-A')->where('status_pekerjaan_wali', 'Karyawan Swasta')->count();
        $pegawainegeri_xiitkja = DataTrainingModel::where('kelas', 'XII-TKJ-A')->where('status_pekerjaan_wali', 'Pegawai Negri')->count();
        $pekerja_tdk_tetap_xiitkja = DataTrainingModel::where('kelas', 'XII-TKJ-A')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->count();
        $usaha_xiitkja = DataTrainingModel::where('kelas', 'XII-TKJ-A')->where('status_pekerjaan_wali', 'Usaha')->count();
        $ada_sk_xiitkja = DataTrainingModel::where('kelas', 'XII-TKJ-A')->where('status_sk_tidakmampu', 'Ada')->count();
        $tdk_ada_sk_xiitkja = DataTrainingModel::where('kelas', 'XII-TKJ-A')->where('status_sk_tidakmampu', 'Tidak Ada')->count();

        //HITUNG DATA TRAINING XII-TKJ-B//
        $ortu_lengkap_xiitkjb = DataTrainingModel::where('kelas', 'XII-TKJ-B')->where('status_kelengkapan_ortu', 'Lengkap')->count();
        $tanpa_ayah_xiitkjb = DataTrainingModel::where('kelas', 'XII-TKJ-B')->where('status_yatimpiatu', 'Tanpa Ayah')->count();
        $tanpa_ibu_xiitkjb = DataTrainingModel::where('kelas', 'XII-TKJ-B')->where('status_yatimpiatu', 'Tanpa Ibu')->count();
        $tanpa_ayah_ibu_xiitkjb = DataTrainingModel::where('kelas', 'XII-TKJ-B')->where('status_yatimpiatu', 'Tanpa Ayah Dan Ibu')->count();
        $rumahsendiri_xiitkjb = DataTrainingModel::where('kelas', 'XII-TKJ-B')->where('status_rumah_ortu', 'Rumah Sendiri')->count();
        $rumahsewa_xiitkjb = DataTrainingModel::where('kelas', 'XII-TKJ-B')->where('status_rumah_ortu', 'Rumah Sewa')->count();
        $kontrakan_xiitkjb = DataTrainingModel::where('kelas', 'XII-TKJ-B')->where('status_rumah_ortu', 'Kontrakan')->count();
        $rumahsaudara_xiitkjb = DataTrainingModel::where('kelas', 'XII-TKJ-B')->where('status_rumah_ortu', 'Tinggal Dengan Saudara')->count();
        $karyawanswasta_xiitkjb = DataTrainingModel::where('kelas', 'XII-TKJ-B')->where('status_pekerjaan_wali', 'Karyawan Swasta')->count();
        $pegawainegeri_xiitkjb = DataTrainingModel::where('kelas', 'XII-TKJ-B')->where('status_pekerjaan_wali', 'Pegawai Negri')->count();
        $pekerja_tdk_tetap_xiitkjb = DataTrainingModel::where('kelas', 'XII-TKJ-B')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->count();
        $usaha_xiitkjb = DataTrainingModel::where('kelas', 'XII-TKJ-B')->where('status_pekerjaan_wali', 'Usaha')->count();
        $ada_sk_xiitkjb = DataTrainingModel::where('kelas', 'XII-TKJ-B')->where('status_sk_tidakmampu', 'Ada')->count();
        $tdk_ada_sk_xiitkjb = DataTrainingModel::where('kelas', 'XII-TKJ-B')->where('status_sk_tidakmampu', 'Tidak Ada')->count();

        //HITUNG DATA TRAINING XII-TKJ-C//
        $ortu_lengkap_xiitkjc = DataTrainingModel::where('kelas', 'XII-TKJ-C')->where('status_kelengkapan_ortu', 'Lengkap')->count();
        $tanpa_ayah_xiitkjc = DataTrainingModel::where('kelas', 'XII-TKJ-C')->where('status_yatimpiatu', 'Tanpa Ayah')->count();
        $tanpa_ibu_xiitkjc = DataTrainingModel::where('kelas', 'XII-TKJ-C')->where('status_yatimpiatu', 'Tanpa Ibu')->count();
        $tanpa_ayah_ibu_xiitkjc = DataTrainingModel::where('kelas', 'XII-TKJ-C')->where('status_yatimpiatu', 'Tanpa Ayah Dan Ibu')->count();
        $rumahsendiri_xiitkjc = DataTrainingModel::where('kelas', 'XII-TKJ-C')->where('status_rumah_ortu', 'Rumah Sendiri')->count();
        $rumahsewa_xiitkjc = DataTrainingModel::where('kelas', 'XII-TKJ-C')->where('status_rumah_ortu', 'Rumah Sewa')->count();
        $kontrakan_xiitkjc = DataTrainingModel::where('kelas', 'XII-TKJ-C')->where('status_rumah_ortu', 'Kontrakan')->count();
        $rumahsaudara_xiitkjc = DataTrainingModel::where('kelas', 'XII-TKJ-C')->where('status_rumah_ortu', 'Tinggal Dengan Saudara')->count();
        $karyawanswasta_xiitkjc = DataTrainingModel::where('kelas', 'XII-TKJ-C')->where('status_pekerjaan_wali', 'Karyawan Swasta')->count();
        $pegawainegeri_xiitkjc = DataTrainingModel::where('kelas', 'XII-TKJ-C')->where('status_pekerjaan_wali', 'Pegawai Negri')->count();
        $pekerja_tdk_tetap_xiitkjc = DataTrainingModel::where('kelas', 'XII-TKJ-C')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->count();
        $usaha_xiitkjc = DataTrainingModel::where('kelas', 'XII-TKJ-C')->where('status_pekerjaan_wali', 'Usaha')->count();
        $ada_sk_xiitkjc = DataTrainingModel::where('kelas', 'XII-TKJ-C')->where('status_sk_tidakmampu', 'Ada')->count();
        $tdk_ada_sk_xiitkjc = DataTrainingModel::where('kelas', 'XII-TKJ-C')->where('status_sk_tidakmampu', 'Tidak Ada')->count();

        //TOTAL DATA TRAINING X-TKJ-A//
        $xtkja = $ortu_lengkap_xtkja + $tanpa_ayah_xtkja + $tanpa_ibu_xtkja + $tanpa_ayah_ibu_xtkja + $rumahsendiri_xtkja + $rumahsewa_xtkja + $kontrakan_xtkja + $rumahsaudara_xtkja +  $karyawanswasta_xtkja +  $pegawainegeri_xtkja + $pekerja_tdk_tetap_xtkja  +  $usaha_xtkja +   $ada_sk_xtkja +   $tdk_ada_sk_xtkja;
        //TOTAL DATA TRAINING X-TKJ-B//
        $xtkjb = $ortu_lengkap_xtkjb + $tanpa_ayah_xtkjb + $tanpa_ibu_xtkjb + $tanpa_ayah_ibu_xtkjb + $rumahsendiri_xtkjb + $rumahsewa_xtkjb + $kontrakan_xtkjb + $rumahsaudara_xtkjb +  $karyawanswasta_xtkjb +  $pegawainegeri_xtkjb + $pekerja_tdk_tetap_xtkjb  +  $usaha_xtkjb +   $ada_sk_xtkjb +   $tdk_ada_sk_xtkjb;
        //TOTAL DATA TRAINING X-TKJ-C//
        $xtkjc = $ortu_lengkap_xtkjc + $tanpa_ayah_xtkjc + $tanpa_ibu_xtkjc + $tanpa_ayah_ibu_xtkjc + $rumahsendiri_xtkjc + $rumahsewa_xtkjc + $kontrakan_xtkjc + $rumahsaudara_xtkjc +  $karyawanswasta_xtkjc +  $pegawainegeri_xtkjc + $pekerja_tdk_tetap_xtkjc  +  $usaha_xtkjc +   $ada_sk_xtkjc +   $tdk_ada_sk_xtkjc;
        //TOTAL DATA TRAINING X-TKJ-D//
        $xtkjd = $ortu_lengkap_xtkjd + $tanpa_ayah_xtkjd + $tanpa_ibu_xtkjd + $tanpa_ayah_ibu_xtkjd + $rumahsendiri_xtkjd + $rumahsewa_xtkjd + $kontrakan_xtkjd + $rumahsaudara_xtkjd +  $karyawanswasta_xtkjd +  $pegawainegeri_xtkjd + $pekerja_tdk_tetap_xtkjd  +  $usaha_xtkjd +   $ada_sk_xtkjd +   $tdk_ada_sk_xtkjd;
        //TOTAL DATA TRAINING XI-TKJ-A//
        $xitkja = $ortu_lengkap_xitkja + $tanpa_ayah_xitkja + $tanpa_ibu_xitkja + $tanpa_ayah_ibu_xitkja + $rumahsendiri_xitkja + $rumahsewa_xitkja + $kontrakan_xitkja + $rumahsaudara_xitkja +  $karyawanswasta_xitkja +  $pegawainegeri_xitkja + $pekerja_tdk_tetap_xitkja  +  $usaha_xitkja +   $ada_sk_xitkja +   $tdk_ada_sk_xitkja;
        //TOTAL DATA TRAINING XI-TKJ-B//
        $xitkjb = $ortu_lengkap_xitkjb + $tanpa_ayah_xitkjb + $tanpa_ibu_xitkjb + $tanpa_ayah_ibu_xitkjb + $rumahsendiri_xitkjb + $rumahsewa_xitkjb + $kontrakan_xitkjb + $rumahsaudara_xitkjb +  $karyawanswasta_xitkjb +  $pegawainegeri_xitkjb + $pekerja_tdk_tetap_xitkjb  +  $usaha_xitkjb +   $ada_sk_xitkjb +   $tdk_ada_sk_xitkjb;
        //TOTAL DATA TRAINING XI-TKJ-C//
        $xitkjc = $ortu_lengkap_xitkjc + $tanpa_ayah_xitkjc + $tanpa_ibu_xitkjc + $tanpa_ayah_ibu_xitkjc + $rumahsendiri_xitkjc + $rumahsewa_xitkjc + $kontrakan_xitkjc + $rumahsaudara_xitkjc +  $karyawanswasta_xitkjc +  $pegawainegeri_xitkjc + $pekerja_tdk_tetap_xitkjc  +  $usaha_xitkjc +   $ada_sk_xitkjc +   $tdk_ada_sk_xitkjc;
        //TOTAL DATA TRAINING XII-TKJ-A//
        $xiitkja = $ortu_lengkap_xiitkja + $tanpa_ayah_xiitkja + $tanpa_ibu_xiitkja + $tanpa_ayah_ibu_xiitkja + $rumahsendiri_xiitkja + $rumahsewa_xiitkja + $kontrakan_xiitkja + $rumahsaudara_xiitkja +  $karyawanswasta_xiitkja +  $pegawainegeri_xiitkja + $pekerja_tdk_tetap_xiitkja  +  $usaha_xiitkja +   $ada_sk_xiitkja +   $tdk_ada_sk_xiitkja;
        //TOTAL DATA TRAINING XII-TKJ-B//
        $xiitkjb = $ortu_lengkap_xiitkjb + $tanpa_ayah_xiitkjb + $tanpa_ibu_xiitkjb + $tanpa_ayah_ibu_xiitkjb + $rumahsendiri_xiitkjb + $rumahsewa_xiitkjb + $kontrakan_xiitkjb + $rumahsaudara_xiitkjb +  $karyawanswasta_xiitkjb +  $pegawainegeri_xiitkjb + $pekerja_tdk_tetap_xiitkjb  +  $usaha_xiitkjb +   $ada_sk_xiitkjb +   $tdk_ada_sk_xiitkjb;
        //TOTAL DATA TRAINING XII-TKJ-C//
        $xiitkjc = $ortu_lengkap_xiitkjc + $tanpa_ayah_xiitkjc + $tanpa_ibu_xiitkjc + $tanpa_ayah_ibu_xiitkjc + $rumahsendiri_xiitkjc + $rumahsewa_xiitkjc + $kontrakan_xiitkjc + $rumahsaudara_xiitkjc +  $karyawanswasta_xiitkjc +  $pegawainegeri_xiitkjc + $pekerja_tdk_tetap_xiitkjc  +  $usaha_xiitkjc +   $ada_sk_xiitkjc +   $tdk_ada_sk_xiitkjc;

        //HITUNG DATA TRAINING X-TKR-A//
        $ortu_lengkap_xtkra = DataTrainingModel::where('kelas', 'X-TKR-A')->where('status_kelengkapan_ortu', 'Lengkap')->count();
        $tanpa_ayah_xtkra = DataTrainingModel::where('kelas', 'X-TKR-A')->where('status_yatimpiatu', 'Tanpa Ayah')->count();
        $tanpa_ibu_xtkra = DataTrainingModel::where('kelas', 'X-TKR-A')->where('status_yatimpiatu', 'Tanpa Ibu')->count();
        $tanpa_ayah_ibu_xtkra = DataTrainingModel::where('kelas', 'X-TKR-A')->where('status_yatimpiatu', 'Tanpa Ayah Dan Ibu')->count();
        $rumahsendiri_xtkra = DataTrainingModel::where('kelas', 'X-TKR-A')->where('status_rumah_ortu', 'Rumah Sendiri')->count();
        $rumahsewa_xtkra = DataTrainingModel::where('kelas', 'X-TKR-A')->where('status_rumah_ortu', 'Rumah Sewa')->count();
        $kontrakan_xtkra = DataTrainingModel::where('kelas', 'X-TKR-A')->where('status_rumah_ortu', 'Kontrakan')->count();
        $rumahsaudara_xtkra = DataTrainingModel::where('kelas', 'X-TKR-A')->where('status_rumah_ortu', 'Tinggal Dengan Saudara')->count();
        $karyawanswasta_xtkra = DataTrainingModel::where('kelas', 'X-TKR-A')->where('status_pekerjaan_wali', 'Karyawan Swasta')->count();
        $pegawainegeri_xtkra = DataTrainingModel::where('kelas', 'X-TKR-A')->where('status_pekerjaan_wali', 'Pegawai Negri')->count();
        $pekerja_tdk_tetap_xtkra = DataTrainingModel::where('kelas', 'X-TKR-A')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->count();
        $usaha_xtkra = DataTrainingModel::where('kelas', 'X-TKR-A')->where('status_pekerjaan_wali', 'Usaha')->count();
        $ada_sk_xtkra = DataTrainingModel::where('kelas', 'X-TKR-A')->where('status_sk_tidakmampu', 'Ada')->count();
        $tdk_ada_sk_xtkra = DataTrainingModel::where('kelas', 'X-TKR-A')->where('status_sk_tidakmampu', 'Tidak Ada')->count();

        //HITUNG DATA TRAINING X-TKR-B//
        $ortu_lengkap_xtkrb = DataTrainingModel::where('kelas', 'X-TKR-B')->where('status_kelengkapan_ortu', 'Lengkap')->count();
        $tanpa_ayah_xtkrb = DataTrainingModel::where('kelas', 'X-TKR-B')->where('status_yatimpiatu', 'Tanpa Ayah')->count();
        $tanpa_ibu_xtkrb = DataTrainingModel::where('kelas', 'X-TKR-B')->where('status_yatimpiatu', 'Tanpa Ibu')->count();
        $tanpa_ayah_ibu_xtkrb = DataTrainingModel::where('kelas', 'X-TKR-B')->where('status_yatimpiatu', 'Tanpa Ayah Dan Ibu')->count();
        $rumahsendiri_xtkrb = DataTrainingModel::where('kelas', 'X-TKR-B')->where('status_rumah_ortu', 'Rumah Sendiri')->count();
        $rumahsewa_xtkrb = DataTrainingModel::where('kelas', 'X-TKR-B')->where('status_rumah_ortu', 'Rumah Sewa')->count();
        $kontrakan_xtkrb = DataTrainingModel::where('kelas', 'X-TKR-B')->where('status_rumah_ortu', 'Kontrakan')->count();
        $rumahsaudara_xtkrb = DataTrainingModel::where('kelas', 'X-TKR-B')->where('status_rumah_ortu', 'Tinggal Dengan Saudara')->count();
        $karyawanswasta_xtkrb = DataTrainingModel::where('kelas', 'X-TKR-B')->where('status_pekerjaan_wali', 'Karyawan Swasta')->count();
        $pegawainegeri_xtkrb = DataTrainingModel::where('kelas', 'X-TKR-B')->where('status_pekerjaan_wali', 'Pegawai Negri')->count();
        $pekerja_tdk_tetap_xtkrb = DataTrainingModel::where('kelas', 'X-TKR-B')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->count();
        $usaha_xtkrb = DataTrainingModel::where('kelas', 'X-TKR-B')->where('status_pekerjaan_wali', 'Usaha')->count();
        $ada_sk_xtkrb = DataTrainingModel::where('kelas', 'X-TKR-B')->where('status_sk_tidakmampu', 'Ada')->count();
        $tdk_ada_sk_xtkrb = DataTrainingModel::where('kelas', 'X-TKR-B')->where('status_sk_tidakmampu', 'Tidak Ada')->count();

        //HITUNG DATA TRAINING X-TKR-C//
        $ortu_lengkap_xtkrc = DataTrainingModel::where('kelas', 'X-TKR-C')->where('status_kelengkapan_ortu', 'Lengkap')->count();
        $tanpa_ayah_xtkrc = DataTrainingModel::where('kelas', 'X-TKR-C')->where('status_yatimpiatu', 'Tanpa Ayah')->count();
        $tanpa_ibu_xtkrc = DataTrainingModel::where('kelas', 'X-TKR-C')->where('status_yatimpiatu', 'Tanpa Ibu')->count();
        $tanpa_ayah_ibu_xtkrc = DataTrainingModel::where('kelas', 'X-TKR-C')->where('status_yatimpiatu', 'Tanpa Ayah Dan Ibu')->count();
        $rumahsendiri_xtkrc = DataTrainingModel::where('kelas', 'X-TKR-C')->where('status_rumah_ortu', 'Rumah Sendiri')->count();
        $rumahsewa_xtkrc = DataTrainingModel::where('kelas', 'X-TKR-C')->where('status_rumah_ortu', 'Rumah Sewa')->count();
        $kontrakan_xtkrc = DataTrainingModel::where('kelas', 'X-TKR-C')->where('status_rumah_ortu', 'Kontrakan')->count();
        $rumahsaudara_xtkrc = DataTrainingModel::where('kelas', 'X-TKR-C')->where('status_rumah_ortu', 'Tinggal Dengan Saudara')->count();
        $karyawanswasta_xtkrc = DataTrainingModel::where('kelas', 'X-TKR-c')->where('status_pekerjaan_wali', 'Karyawan Swasta')->count();
        $pegawainegeri_xtkrc = DataTrainingModel::where('kelas', 'X-TKR-c')->where('status_pekerjaan_wali', 'Pegawai Negri')->count();
        $pekerja_tdk_tetap_xtkrc = DataTrainingModel::where('kelas', 'X-TKR-c')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->count();
        $usaha_xtkrc = DataTrainingModel::where('kelas', 'X-TKR-c')->where('status_pekerjaan_wali', 'Usaha')->count();
        $ada_sk_xtkrc = DataTrainingModel::where('kelas', 'X-TKR-c')->where('status_sk_tidakmampu', 'Ada')->count();
        $tdk_ada_sk_xtkrc = DataTrainingModel::where('kelas', 'X-TKR-c')->where('status_sk_tidakmampu', 'Tidak Ada')->count();

        //HITUNG DATA TRAINING XI-TKR-A//
        $ortu_lengkap_xitkra = DataTrainingModel::where('kelas', 'XI-TKR-A')->where('status_kelengkapan_ortu', 'Lengkap')->count();
        $tanpa_ayah_xitkra = DataTrainingModel::where('kelas', 'XI-TKR-A')->where('status_yatimpiatu', 'Tanpa Ayah')->count();
        $tanpa_ibu_xitkra = DataTrainingModel::where('kelas', 'XI-TKR-A')->where('status_yatimpiatu', 'Tanpa Ibu')->count();
        $tanpa_ayah_ibu_xitkra = DataTrainingModel::where('kelas', 'XI-TKR-A')->where('status_yatimpiatu', 'Tanpa Ayah Dan Ibu')->count();
        $rumahsendiri_xitkra = DataTrainingModel::where('kelas', 'XI-TKR-A')->where('status_rumah_ortu', 'Rumah Sendiri')->count();
        $rumahsewa_xitkra = DataTrainingModel::where('kelas', 'XI-TKR-A')->where('status_rumah_ortu', 'Rumah Sewa')->count();
        $kontrakan_xitkra = DataTrainingModel::where('kelas', 'XI-TKR-A')->where('status_rumah_ortu', 'Kontrakan')->count();
        $rumahsaudara_xitkra = DataTrainingModel::where('kelas', 'XI-TKR-A')->where('status_rumah_ortu', 'Tinggal Dengan Saudara')->count();
        $karyawanswasta_xitkra = DataTrainingModel::where('kelas', 'XI-TKR-A')->where('status_pekerjaan_wali', 'Karyawan Swasta')->count();
        $pegawainegeri_xitkra = DataTrainingModel::where('kelas', 'XI-TKR-A')->where('status_pekerjaan_wali', 'Pegawai Negri')->count();
        $pekerja_tdk_tetap_xitkra = DataTrainingModel::where('kelas', 'XI-TKR-A')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->count();
        $usaha_xitkra = DataTrainingModel::where('kelas', 'XI-TKR-A')->where('status_pekerjaan_wali', 'Usaha')->count();
        $ada_sk_xitkra = DataTrainingModel::where('kelas', 'XI-TKR-A')->where('status_sk_tidakmampu', 'Ada')->count();
        $tdk_ada_sk_xitkra = DataTrainingModel::where('kelas', 'XI-TKR-A')->where('status_sk_tidakmampu', 'Tidak Ada')->count();

        //HITUNG DATA TRAINING XI-TKR-B//
        $ortu_lengkap_xitkrb = DataTrainingModel::where('kelas', 'XI-TKR-B')->where('status_kelengkapan_ortu', 'Lengkap')->count();
        $tanpa_ayah_xitkrb = DataTrainingModel::where('kelas', 'XI-TKR-B')->where('status_yatimpiatu', 'Tanpa Ayah')->count();
        $tanpa_ibu_xitkrb = DataTrainingModel::where('kelas', 'XI-TKR-B')->where('status_yatimpiatu', 'Tanpa Ibu')->count();
        $tanpa_ayah_ibu_xitkrb = DataTrainingModel::where('kelas', 'XI-TKR-B')->where('status_yatimpiatu', 'Tanpa Ayah Dan Ibu')->count();
        $rumahsendiri_xitkrb = DataTrainingModel::where('kelas', 'XI-TKR-B')->where('status_rumah_ortu', 'Rumah Sendiri')->count();
        $rumahsewa_xitkrb = DataTrainingModel::where('kelas', 'XI-TKR-B')->where('status_rumah_ortu', 'Rumah Sewa')->count();
        $kontrakan_xitkrb = DataTrainingModel::where('kelas', 'XI-TKR-B')->where('status_rumah_ortu', 'Kontrakan')->count();
        $rumahsaudara_xitkrb = DataTrainingModel::where('kelas', 'XI-TKR-B')->where('status_rumah_ortu', 'Tinggal Dengan Saudara')->count();
        $karyawanswasta_xitkrb = DataTrainingModel::where('kelas', 'xi-tkr-b')->where('status_pekerjaan_wali', 'Karyawan Swasta')->count();
        $pegawainegeri_xitkrb = DataTrainingModel::where('kelas', 'xi-tkr-b')->where('status_pekerjaan_wali', 'Pegawai Negri')->count();
        $pekerja_tdk_tetap_xitkrb = DataTrainingModel::where('kelas', 'xi-tkr-b')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->count();
        $usaha_xitkrb = DataTrainingModel::where('kelas', 'xi-tkr-b')->where('status_pekerjaan_wali', 'Usaha')->count();
        $ada_sk_xitkrb = DataTrainingModel::where('kelas', 'xi-tkr-b')->where('status_sk_tidakmampu', 'Ada')->count();
        $tdk_ada_sk_xitkrb = DataTrainingModel::where('kelas', 'xi-tkr-b')->where('status_sk_tidakmampu', 'Tidak Ada')->count();

        //HITUNG DATA TRAINING XI-TKR-C//
        $ortu_lengkap_xitkrc = DataTrainingModel::where('kelas', 'XI-TKR-C')->where('status_kelengkapan_ortu', 'Lengkap')->count();
        $tanpa_ayah_xitkrc = DataTrainingModel::where('kelas', 'XI-TKR-C')->where('status_yatimpiatu', 'Tanpa Ayah')->count();
        $tanpa_ibu_xitkrc = DataTrainingModel::where('kelas', 'XI-TKR-C')->where('status_yatimpiatu', 'Tanpa Ibu')->count();
        $tanpa_ayah_ibu_xitkrc = DataTrainingModel::where('kelas', 'XI-TKR-C')->where('status_yatimpiatu', 'Tanpa Ayah Dan Ibu')->count();
        $rumahsendiri_xitkrc = DataTrainingModel::where('kelas', 'XI-TKR-C')->where('status_rumah_ortu', 'Rumah Sendiri')->count();
        $rumahsewa_xitkrc = DataTrainingModel::where('kelas', 'XI-TKR-C')->where('status_rumah_ortu', 'Rumah Sewa')->count();
        $kontrakan_xitkrc = DataTrainingModel::where('kelas', 'XI-TKR-C')->where('status_rumah_ortu', 'Kontrakan')->count();
        $rumahsaudara_xitkrc = DataTrainingModel::where('kelas', 'XI-TKR-C')->where('status_rumah_ortu', 'Tinggal Dengan Saudara')->count();
        $karyawanswasta_xitkrc = DataTrainingModel::where('kelas', 'XI-TKR-C')->where('status_pekerjaan_wali', 'Karyawan Swasta')->count();
        $pegawainegeri_xitkrc = DataTrainingModel::where('kelas', 'XI-TKR-C')->where('status_pekerjaan_wali', 'Pegawai Negri')->count();
        $pekerja_tdk_tetap_xitkrc = DataTrainingModel::where('kelas', 'XI-TKR-C')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->count();
        $usaha_xitkrc = DataTrainingModel::where('kelas', 'XI-TKR-C')->where('status_pekerjaan_wali', 'Usaha')->count();
        $ada_sk_xitkrc = DataTrainingModel::where('kelas', 'XI-TKR-C')->where('status_sk_tidakmampu', 'Ada')->count();
        $tdk_ada_sk_xitkrc = DataTrainingModel::where('kelas', 'XI-TKR-C')->where('status_sk_tidakmampu', 'Tidak Ada')->count();

        //HITUNG DATA TRAINING XII-TKR-A//
        $ortu_lengkap_xiitkra = DataTrainingModel::where('kelas', 'XII-TKR-A')->where('status_kelengkapan_ortu', 'Lengkap')->count();
        $tanpa_ayah_xiitkra = DataTrainingModel::where('kelas', 'XII-TKR-A')->where('status_yatimpiatu', 'Tanpa Ayah')->count();
        $tanpa_ibu_xiitkra = DataTrainingModel::where('kelas', 'XII-TKR-A')->where('status_yatimpiatu', 'Tanpa Ibu')->count();
        $tanpa_ayah_ibu_xiitkra = DataTrainingModel::where('kelas', 'XII-TKR-A')->where('status_yatimpiatu', 'Tanpa Ayah Dan Ibu')->count();
        $rumahsendiri_xiitkra = DataTrainingModel::where('kelas', 'XII-TKR-A')->where('status_rumah_ortu', 'Rumah Sendiri')->count();
        $rumahsewa_xiitkra = DataTrainingModel::where('kelas', 'XII-TKR-A')->where('status_rumah_ortu', 'Rumah Sewa')->count();
        $kontrakan_xiitkra = DataTrainingModel::where('kelas', 'XII-TKR-A')->where('status_rumah_ortu', 'Kontrakan')->count();
        $rumahsaudara_xiitkra = DataTrainingModel::where('kelas', 'XII-TKR-A')->where('status_rumah_ortu', 'Tinggal Dengan Saudara')->count();
        $karyawanswasta_xiitkra = DataTrainingModel::where('kelas', 'xii-tkr-as')->where('status_pekerjaan_wali', 'Karyawan Swasta')->count();
        $pegawainegeri_xiitkra = DataTrainingModel::where('kelas', 'xii-tkr-a')->where('status_pekerjaan_wali', 'Pegawai Negri')->count();
        $pekerja_tdk_tetap_xiitkra = DataTrainingModel::where('kelas', 'xii-tkr-a')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->count();
        $usaha_xiitkra = DataTrainingModel::where('kelas', 'xii-tkr-a')->where('status_pekerjaan_wali', 'Usaha')->count();
        $ada_sk_xiitkra = DataTrainingModel::where('kelas', 'xii-tkr-a')->where('status_sk_tidakmampu', 'Ada')->count();
        $tdk_ada_sk_xiitkra = DataTrainingModel::where('kelas', 'xii-tkr-a')->where('status_sk_tidakmampu', 'Tidak Ada')->count();

        //HITUNG DATA TRAINING XII-TKR-B//
        $ortu_lengkap_xiitkrb = DataTrainingModel::where('kelas', 'XII-TKR-B')->where('status_kelengkapan_ortu', 'Lengkap')->count();
        $tanpa_ayah_xiitkrb = DataTrainingModel::where('kelas', 'XII-TKR-B')->where('status_yatimpiatu', 'Tanpa Ayah')->count();
        $tanpa_ibu_xiitkrb = DataTrainingModel::where('kelas', 'XII-TKR-B')->where('status_yatimpiatu', 'Tanpa Ibu')->count();
        $tanpa_ayah_ibu_xiitkrb = DataTrainingModel::where('kelas', 'XII-TKR-B')->where('status_yatimpiatu', 'Tanpa Ayah Dan Ibu')->count();
        $rumahsendiri_xiitkrb = DataTrainingModel::where('kelas', 'XII-TKR-B')->where('status_rumah_ortu', 'Rumah Sendiri')->count();
        $rumahsewa_xiitkrb = DataTrainingModel::where('kelas', 'XII-TKR-B')->where('status_rumah_ortu', 'Rumah Sewa')->count();
        $kontrakan_xiitkrb = DataTrainingModel::where('kelas', 'XII-TKR-B')->where('status_rumah_ortu', 'Kontrakan')->count();
        $rumahsaudara_xiitkrb = DataTrainingModel::where('kelas', 'XII-TKR-B')->where('status_rumah_ortu', 'Tinggal Dengan Saudara')->count();
        $karyawanswasta_xiitkrb = DataTrainingModel::where('kelas', 'XII-TKR-B')->where('status_pekerjaan_wali', 'Karyawan Swasta')->count();
        $pegawainegeri_xiitkrb = DataTrainingModel::where('kelas', 'XII-TKR-B')->where('status_pekerjaan_wali', 'Pegawai Negri')->count();
        $pekerja_tdk_tetap_xiitkrb = DataTrainingModel::where('kelas', 'XII-TKR-B')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->count();
        $usaha_xiitkrb = DataTrainingModel::where('kelas', 'XII-TKR-B')->where('status_pekerjaan_wali', 'Usaha')->count();
        $ada_sk_xiitkrb = DataTrainingModel::where('kelas', 'XII-TKR-B')->where('status_sk_tidakmampu', 'Ada')->count();
        $tdk_ada_sk_xiitkrb = DataTrainingModel::where('kelas', 'XII-TKR-B')->where('status_sk_tidakmampu', 'Tidak Ada')->count();

        //HITUNG DATA TRAINING XII-TKR-C//
        $ortu_lengkap_xiitkrc = DataTrainingModel::where('kelas', 'XII-TKR-C')->where('status_kelengkapan_ortu', 'Lengkap')->count();
        $tanpa_ayah_xiitkrc = DataTrainingModel::where('kelas', 'XII-TKR-C')->where('status_yatimpiatu', 'Tanpa Ayah')->count();
        $tanpa_ibu_xiitkrc = DataTrainingModel::where('kelas', 'XII-TKR-C')->where('status_yatimpiatu', 'Tanpa Ibu')->count();
        $tanpa_ayah_ibu_xiitkrc = DataTrainingModel::where('kelas', 'XII-TKR-C')->where('status_yatimpiatu', 'Tanpa Ayah Dan Ibu')->count();
        $rumahsendiri_xiitkrc = DataTrainingModel::where('kelas', 'XII-TKR-C')->where('status_rumah_ortu', 'Rumah Sendiri')->count();
        $rumahsewa_xiitkrc = DataTrainingModel::where('kelas', 'XII-TKR-C')->where('status_rumah_ortu', 'Rumah Sewa')->count();
        $kontrakan_xiitkrc = DataTrainingModel::where('kelas', 'XII-TKR-C')->where('status_rumah_ortu', 'Kontrakan')->count();
        $rumahsaudara_xiitkrc = DataTrainingModel::where('kelas', 'XII-TKR-C')->where('status_rumah_ortu', 'Tinggal Dengan Saudara')->count();
        $karyawanswasta_xiitkrc = DataTrainingModel::where('kelas', 'XII-TKR-C')->where('status_pekerjaan_wali', 'Karyawan Swasta')->count();
        $pegawainegeri_xiitkrc = DataTrainingModel::where('kelas', 'XII-TKR-C')->where('status_pekerjaan_wali', 'Pegawai Negri')->count();
        $pekerja_tdk_tetap_xiitkrc = DataTrainingModel::where('kelas', 'XII-TKR-C')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->count();
        $usaha_xiitkrc = DataTrainingModel::where('kelas', 'XII-TKR-C')->where('status_pekerjaan_wali', 'Usaha')->count();
        $ada_sk_xiitkrc = DataTrainingModel::where('kelas', 'XII-TKR-C')->where('status_sk_tidakmampu', 'Ada')->count();
        $tdk_ada_sk_xiitkrc = DataTrainingModel::where('kelas', 'XII-TKR-C')->where('status_sk_tidakmampu', 'Tidak Ada')->count();

        //TOTAL DATA TRAINING X-TKR-A//
        $xtkra = $ortu_lengkap_xtkra + $tanpa_ayah_xtkra + $tanpa_ibu_xtkra + $tanpa_ayah_ibu_xtkra + $rumahsendiri_xtkra + $rumahsewa_xtkra + $kontrakan_xtkra + $rumahsaudara_xtkra +  $karyawanswasta_xtkra +  $pegawainegeri_xtkra + $pekerja_tdk_tetap_xtkra  +  $usaha_xtkra +   $ada_sk_xtkra +   $tdk_ada_sk_xtkra;
        //TOTAL DATA TRAINING X-TKR-B//
        $xtkrb = $ortu_lengkap_xtkrb + $tanpa_ayah_xtkrb + $tanpa_ibu_xtkrb + $tanpa_ayah_ibu_xtkrb + $rumahsendiri_xtkrb + $rumahsewa_xtkrb + $kontrakan_xtkrb + $rumahsaudara_xtkrb +  $karyawanswasta_xtkrb +  $pegawainegeri_xtkrb + $pekerja_tdk_tetap_xtkrb  +  $usaha_xtkrb +   $ada_sk_xtkrb +   $tdk_ada_sk_xtkrb;
        //TOTAL DATA TRAINING X-TKR-C//
        $xtkrc = $ortu_lengkap_xtkrc + $tanpa_ayah_xtkrc + $tanpa_ibu_xtkrc + $tanpa_ayah_ibu_xtkrc + $rumahsendiri_xtkrc + $rumahsewa_xtkrc + $kontrakan_xtkrc + $rumahsaudara_xtkrc +  $karyawanswasta_xtkrc +  $pegawainegeri_xtkrc + $pekerja_tdk_tetap_xtkrc  +  $usaha_xtkrc +   $ada_sk_xtkrc +   $tdk_ada_sk_xtkrc;
        //TOTAL DATA TRAINING XI-TKR-A//
        $xitkra = $ortu_lengkap_xitkra + $tanpa_ayah_xitkra + $tanpa_ibu_xitkra + $tanpa_ayah_ibu_xitkra + $rumahsendiri_xitkra + $rumahsewa_xitkra + $kontrakan_xitkra + $rumahsaudara_xitkra +  $karyawanswasta_xitkra +  $pegawainegeri_xitkra + $pekerja_tdk_tetap_xitkra  +  $usaha_xitkra +   $ada_sk_xitkra +   $tdk_ada_sk_xitkra;
        //TOTAL DATA TRAINING XI-TKR-B//
        $xitkrb = $ortu_lengkap_xitkrb + $tanpa_ayah_xitkrb + $tanpa_ibu_xitkrb + $tanpa_ayah_ibu_xitkrb + $rumahsendiri_xitkrb + $rumahsewa_xitkrb + $kontrakan_xitkrb + $rumahsaudara_xitkrb +  $karyawanswasta_xitkrb +  $pegawainegeri_xitkrb + $pekerja_tdk_tetap_xitkrb  +  $usaha_xitkrb +   $ada_sk_xitkrb +   $tdk_ada_sk_xitkrb;
        //TOTAL DATA TRAINING XI-TKR-C//
        $xitkrc = $ortu_lengkap_xitkrc + $tanpa_ayah_xitkrc + $tanpa_ibu_xitkrc + $tanpa_ayah_ibu_xitkrc + $rumahsendiri_xitkrc + $rumahsewa_xitkrc + $kontrakan_xitkrc + $rumahsaudara_xitkrc +  $karyawanswasta_xitkrc +  $pegawainegeri_xitkrc + $pekerja_tdk_tetap_xitkrc  +  $usaha_xitkrc +   $ada_sk_xitkrc +   $tdk_ada_sk_xitkrc;
        //TOTAL DATA TRAINING XII-TKR-A//
        $xiitkra = $ortu_lengkap_xiitkra + $tanpa_ayah_xiitkra + $tanpa_ibu_xiitkra + $tanpa_ayah_ibu_xiitkra + $rumahsendiri_xiitkra + $rumahsewa_xiitkra + $kontrakan_xiitkra + $rumahsaudara_xiitkra +  $karyawanswasta_xiitkra +  $pegawainegeri_xiitkra + $pekerja_tdk_tetap_xiitkra  +  $usaha_xiitkra +   $ada_sk_xiitkra +   $tdk_ada_sk_xiitkra;
        //TOTAL DATA TRAINING XII-TKR-B//
        $xiitkrb = $ortu_lengkap_xiitkrb + $tanpa_ayah_xiitkrb + $tanpa_ibu_xiitkrb + $tanpa_ayah_ibu_xiitkrb + $rumahsendiri_xiitkrb + $rumahsewa_xiitkrb + $kontrakan_xiitkrb + $rumahsaudara_xiitkrb +  $karyawanswasta_xiitkrb +  $pegawainegeri_xiitkrb + $pekerja_tdk_tetap_xiitkrb  +  $usaha_xiitkrb +   $ada_sk_xiitkrb +   $tdk_ada_sk_xiitkrb;;
        //TOTAL DATA TRAINING XII-TKR-C//
        $xiitkrc = $ortu_lengkap_xiitkrc + $tanpa_ayah_xiitkrc + $tanpa_ibu_xiitkrc + $tanpa_ayah_ibu_xiitkrc + $rumahsendiri_xiitkrc + $rumahsewa_xiitkrc + $kontrakan_xiitkrc + $rumahsaudara_xiitkrc +  $karyawanswasta_xiitkrc +  $pegawainegeri_xiitkrc + $pekerja_tdk_tetap_xiitkrc  +  $usaha_xiitkrc +   $ada_sk_xiitkrc +   $tdk_ada_sk_xiitkrc;

        $dataset_siswa = DataSetModel::all();
        return view('admin.dataset_siswa.index', compact(
            'status',
            'dataset_siswa',
            'datatraining',
            //JURUSAN TKJ
            'xtkja',
            'xtkjb',
            'xtkjc',
            'xtkjd',
            'xitkja',
            'xitkjb',
            'xitkjc',
            'xiitkja',
            'xiitkjb',
            'xiitkjc',
            // JURUSAN TKR
            'xtkra',
            'xtkrb',
            'xtkrc',
            'xitkra',
            'xitkrb',
            'xitkrc',
            'xiitkra',
            'xiitkrb',
            'xiitkrc',
            //ORTU LENGKAP TKJ
            'ortu_lengkap_xtkja',
            'ortu_lengkap_xtkjb',
            'ortu_lengkap_xtkjc',
            'ortu_lengkap_xtkjd',
            'ortu_lengkap_xitkja',
            'ortu_lengkap_xitkjb',
            'ortu_lengkap_xitkjc',
            'ortu_lengkap_xiitkja',
            'ortu_lengkap_xiitkjb',
            'ortu_lengkap_xiitkjc',
            //ORTU LENGKAP TKR
            'ortu_lengkap_xtkra',
            'ortu_lengkap_xtkrb',
            'ortu_lengkap_xtkrc',
            'ortu_lengkap_xtkrd',
            'ortu_lengkap_xitkra',
            'ortu_lengkap_xitkrb',
            'ortu_lengkap_xitkrc',
            'ortu_lengkap_xiitkra',
            'ortu_lengkap_xiitkrb',
            'ortu_lengkap_xiitkrc',
            //DATA TRINING X-TKJ-A//
            'tanpa_ayah_xtkja',
            'tanpa_ibu_xtkja',
            'tanpa_ayah_ibu_xtkja',
            'rumahsendiri_xtkja',
            'rumahsewa_xtkja',
            'kontrakan_xtkja',
            'rumahsaudara_xtkja',
            'karyawanswasta_xtkja',
            'pegawainegeri_xtkja',
            'pekerja_tdk_tetap_xtkja',
            'usaha_xtkja',
            'ada_sk_xtkja',
            'tdk_ada_sk_xtkja',
            //DATA TRINING X-TKJ-B//
            'tanpa_ayah_xtkjb',
            'tanpa_ibu_xtkjb',
            'tanpa_ayah_ibu_xtkjb',
            'rumahsendiri_xtkjb',
            'rumahsewa_xtkjb',
            'kontrakan_xtkjb',
            'rumahsaudara_xtkjb',
            'karyawanswasta_xtkjb',
            'pegawainegeri_xtkjb',
            'pekerja_tdk_tetap_xtkjb',
            'usaha_xtkjb',
            'ada_sk_xtkjb',
            'tdk_ada_sk_xtkjb',
            //DATA TRINING X-TKJ-C//
            'tanpa_ayah_xtkjc',
            'tanpa_ibu_xtkjc',
            'tanpa_ayah_ibu_xtkjc',
            'rumahsendiri_xtkjc',
            'rumahsewa_xtkjc',
            'kontrakan_xtkjc',
            'rumahsaudara_xtkjc',
            'karyawanswasta_xtkjc',
            'pegawainegeri_xtkjc',
            'pekerja_tdk_tetap_xtkjc',
            'usaha_xtkjc',
            'ada_sk_xtkjc',
            'tdk_ada_sk_xtkjc',
            //DATA TRINING X-TKJ-D//
            'tanpa_ayah_xtkjd',
            'tanpa_ibu_xtkjd',
            'tanpa_ayah_ibu_xtkjd',
            'rumahsendiri_xtkjd',
            'rumahsewa_xtkjd',
            'kontrakan_xtkjd',
            'rumahsaudara_xtkjd',
            'karyawanswasta_xtkjd',
            'pegawainegeri_xtkjd',
            'pekerja_tdk_tetap_xtkjd',
            'usaha_xtkjd',
            'ada_sk_xtkjd',
            'tdk_ada_sk_xtkjd',
            //DATA TRINING XI-TKJ-A//
            'tanpa_ayah_xitkja',
            'tanpa_ibu_xitkja',
            'tanpa_ayah_ibu_xitkja',
            'rumahsendiri_xitkja',
            'rumahsewa_xitkja',
            'kontrakan_xitkja',
            'rumahsaudara_xitkja',
            'karyawanswasta_xitkja',
            'pegawainegeri_xitkja',
            'pekerja_tdk_tetap_xitkja',
            'usaha_xitkja',
            'ada_sk_xitkja',
            'tdk_ada_sk_xitkja',
            //DATA TRINING XI-TKJ-B//
            'tanpa_ayah_xitkjb',
            'tanpa_ibu_xitkjb',
            'tanpa_ayah_ibu_xitkjb',
            'rumahsendiri_xitkjb',
            'rumahsewa_xitkjb',
            'kontrakan_xitkjb',
            'rumahsaudara_xitkjb',
            'karyawanswasta_xitkjb',
            'pegawainegeri_xitkjb',
            'pekerja_tdk_tetap_xitkjb',
            'usaha_xitkjb',
            'ada_sk_xitkjb',
            'tdk_ada_sk_xitkjb',
            //DATA TRINING XI-TKJ-C//
            'tanpa_ayah_xitkjc',
            'tanpa_ibu_xitkjc',
            'tanpa_ayah_ibu_xitkjc',
            'rumahsendiri_xitkjc',
            'rumahsewa_xitkjc',
            'kontrakan_xitkjc',
            'rumahsaudara_xitkjc',
            'karyawanswasta_xitkjc',
            'pegawainegeri_xitkjc',
            'pekerja_tdk_tetap_xitkjc',
            'usaha_xitkjc',
            'ada_sk_xitkjc',
            'tdk_ada_sk_xitkjc',
            //DATA TRINING XII-TKJ-A//
            'tanpa_ayah_xiitkja',
            'tanpa_ibu_xiitkja',
            'tanpa_ayah_ibu_xiitkja',
            'rumahsendiri_xiitkja',
            'rumahsewa_xiitkja',
            'kontrakan_xiitkja',
            'rumahsaudara_xiitkja',
            'karyawanswasta_xiitkja',
            'pegawainegeri_xiitkja',
            'pekerja_tdk_tetap_xiitkja',
            'usaha_xiitkja',
            'ada_sk_xiitkja',
            'tdk_ada_sk_xiitkja',
            //DATA TRINING XII-TKJ-B//
            'tanpa_ayah_xiitkjb',
            'tanpa_ibu_xiitkjb',
            'tanpa_ayah_ibu_xiitkjb',
            'rumahsendiri_xiitkjb',
            'rumahsewa_xiitkjb',
            'kontrakan_xiitkjb',
            'rumahsaudara_xiitkjb',
            'karyawanswasta_xiitkjb',
            'pegawainegeri_xiitkjb',
            'pekerja_tdk_tetap_xiitkjb',
            'usaha_xiitkjb',
            'ada_sk_xiitkjb',
            'tdk_ada_sk_xiitkjb',
            //DATA TRINING XII-TKJ-c//
            'tanpa_ayah_xiitkjc',
            'tanpa_ibu_xiitkjc',
            'tanpa_ayah_ibu_xiitkjc',
            'rumahsendiri_xiitkjc',
            'rumahsewa_xiitkjc',
            'kontrakan_xiitkjc',
            'rumahsaudara_xiitkjc',
            'karyawanswasta_xiitkjc',
            'pegawainegeri_xiitkjc',
            'pekerja_tdk_tetap_xiitkjc',
            'usaha_xiitkjc',
            'ada_sk_xiitkjc',
            'tdk_ada_sk_xiitkjc',
            //DATA TRINING X-TKR-A//
            'tanpa_ayah_xtkra',
            'tanpa_ibu_xtkra',
            'tanpa_ayah_ibu_xtkra',
            'rumahsendiri_xtkra',
            'rumahsewa_xtkra',
            'kontrakan_xtkra',
            'rumahsaudara_xtkra',
            'karyawanswasta_xtkra',
            'pegawainegeri_xtkra',
            'pekerja_tdk_tetap_xtkra',
            'usaha_xtkra',
            'ada_sk_xtkra',
            'tdk_ada_sk_xtkra',
            //DATA TRINING X-TKR-B//
            'tanpa_ayah_xtkrb',
            'tanpa_ibu_xtkrb',
            'tanpa_ayah_ibu_xtkrb',
            'rumahsendiri_xtkrb',
            'rumahsewa_xtkrb',
            'kontrakan_xtkrb',
            'rumahsaudara_xtkrb',
            'karyawanswasta_xtkrb',
            'pegawainegeri_xtkrb',
            'pekerja_tdk_tetap_xtkrb',
            'usaha_xtkrb',
            'ada_sk_xtkrb',
            'tdk_ada_sk_xtkrb',
            //DATA TRINING X-TKR-C//
            'tanpa_ayah_xtkrc',
            'tanpa_ibu_xtkrc',
            'tanpa_ayah_ibu_xtkrc',
            'rumahsendiri_xtkrc',
            'rumahsewa_xtkrc',
            'kontrakan_xtkrc',
            'rumahsaudara_xtkrc',
            'karyawanswasta_xtkrc',
            'pegawainegeri_xtkrc',
            'pekerja_tdk_tetap_xtkrc',
            'usaha_xtkrc',
            'ada_sk_xtkrc',
            'tdk_ada_sk_xtkrc',
            //DATA TRINING XI-TKR-A//
            'tanpa_ayah_xitkra',
            'tanpa_ibu_xitkra',
            'tanpa_ayah_ibu_xitkra',
            'rumahsendiri_xitkra',
            'rumahsewa_xitkra',
            'kontrakan_xitkra',
            'rumahsaudara_xitkra',
            'karyawanswasta_xitkra',
            'pegawainegeri_xitkra',
            'pekerja_tdk_tetap_xitkra',
            'usaha_xitkra',
            'ada_sk_xitkra',
            'tdk_ada_sk_xitkra',
            //DATA TRINING XI-TKR-B//
            'tanpa_ayah_xitkrb',
            'tanpa_ibu_xitkrb',
            'tanpa_ayah_ibu_xitkrb',
            'rumahsendiri_xitkrb',
            'rumahsewa_xitkrb',
            'kontrakan_xitkrb',
            'rumahsaudara_xitkrb',
            'karyawanswasta_xitkrb',
            'pegawainegeri_xitkrb',
            'pekerja_tdk_tetap_xitkrb',
            'usaha_xitkrb',
            'ada_sk_xitkrb',
            'tdk_ada_sk_xitkrb',
            //DATA TRINING XI-TKR-C//
            'tanpa_ayah_xitkrc',
            'tanpa_ibu_xitkrc',
            'tanpa_ayah_ibu_xitkrc',
            'rumahsendiri_xitkrc',
            'rumahsewa_xitkrc',
            'kontrakan_xitkrc',
            'rumahsaudara_xitkrc',
            'karyawanswasta_xitkrc',
            'pegawainegeri_xitkrc',
            'pekerja_tdk_tetap_xitkrc',
            'usaha_xitkrc',
            'ada_sk_xitkrc',
            'tdk_ada_sk_xitkrc',
            //DATA TRINING XII-TKR-A//
            'tanpa_ayah_xiitkra',
            'tanpa_ibu_xiitkra',
            'tanpa_ayah_ibu_xiitkra',
            'rumahsendiri_xiitkra',
            'rumahsewa_xiitkra',
            'kontrakan_xiitkra',
            'rumahsaudara_xiitkra',
            'karyawanswasta_xiitkra',
            'pegawainegeri_xiitkra',
            'pekerja_tdk_tetap_xiitkra',
            'usaha_xiitkra',
            'ada_sk_xiitkra',
            'tdk_ada_sk_xiitkra',
            //DATA TRINING XII-TKR-B//
            'tanpa_ayah_xiitkrb',
            'tanpa_ibu_xiitkrb',
            'tanpa_ayah_ibu_xiitkrb',
            'rumahsendiri_xiitkrb',
            'rumahsewa_xiitkrb',
            'kontrakan_xiitkrb',
            'rumahsaudara_xiitkrb',
            'karyawanswasta_xiitkrb',
            'pegawainegeri_xiitkrb',
            'pekerja_tdk_tetap_xiitkrb',
            'usaha_xiitkrb',
            'ada_sk_xiitkrb',
            'tdk_ada_sk_xiitkrb',
            //DATA TRINING XII-TKR-C//
            'tanpa_ayah_xiitkrc',
            'tanpa_ibu_xiitkrc',
            'tanpa_ayah_ibu_xiitkrc',
            'rumahsendiri_xiitkrc',
            'rumahsewa_xiitkrc',
            'kontrakan_xiitkrc',
            'rumahsaudara_xiitkrc',
            'karyawanswasta_xiitkrc',
            'pegawainegeri_xiitkrc',
            'pekerja_tdk_tetap_xiitkrc',
            'usaha_xiitkrc',
            'ada_sk_xiitkrc',
            'tdk_ada_sk_xiitkrc'
        ));
    }

    public function detail_dataset_siswa($id)
    {
        $joinfoto = DB::table('tbl_datasiswa')->join(
            'tbl_dataset',
            'tbl_datasiswa.nisn',
            '=',
            'tbl_dataset.nisn'
        )->select('tbl_datasiswa.foto')->first();

        $status = DataSetModel::find($id);
        return view('admin.dataset_siswa.edit', compact('status', 'joinfoto'));
    }

    public function update_dataset_siswa(Request $request, $id)
    {
        $data = DataSetModel::find($id);
        $data->update($request->all());

        if ($request->has('foto')) {
            $request->file('foto')->move('foto_sktidakmampu/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        Alert::success('Sukses', 'Data Berhasil Di Update');
        return redirect()->back();
    }

    public function tolak_dataset_siswa(Request $request, $id)
    {
        $data = DataSetModel::find($id);
        $alasan_tolak = $request->alasan_tolak;
        $nisn = $request->nisn;
        $pemeriksa = $request->pemeriksa;
        if ($data->status == 1) {
            $data->status = 4;
            $data->where(['nisn' => $nisn, 'id' => $id])
                ->update([
                    'alasan_tolak' => $alasan_tolak,
                    'pemeriksa' => $pemeriksa
                ]);

            $data->save();
        } else {
            $data->status = 1;
        }
        Alert::success('Sukses', 'Data Berhasil Di Update');
        return redirect()->back();
    }

    public function update_data_training(Request $request, $id)
    {
        $data = DataTrainingModel::find($id);
        $data->update($request->all());

        if ($request->has('foto_sk_tidakmampu')) {
            $request->file('foto_sk_tidakmampu')->move('foto_sktidakmampu/', $request->file('foto_sk_tidakmampu')->getClientOriginalName());
            $data->foto_sk_tidakmampu = $request->file('foto_sk_tidakmampu')->getClientOriginalName();
            $data->save();
        }

        // dd($data);

        Alert::success('Sukses', 'Data Berhasil Di Update');
        return redirect('/admin/data_training');
    }

    public function tambah_datakriteria(Request $request)
    {
        DB::table('tbl_datakriteria')->insert(['kriteria' => $request->kriteria]);

        Alert::success('Sukses', 'Data Kriteria Berhasil Di Tambah');
        return redirect('/admin/data_kriteria');
    }

    public function get_edit_datakriteria($id)
    {
        $data = DB::table('tbl_datakriteria')->find($id);

        return view('admin.data_kriteria.edit', compact('data'));
    }

    public function post_edit_datakriteria(Request $request, $id)
    {
        $data = DB::table('tbl_datakriteria')->where('id', $id)
            ->update(['kriteria' => $request->kriteria]);


        Alert::success('Sukses', 'Data Kriteria Berhasil Di Hapus');
        return redirect('/admin/data_kriteria');
    }

    public function getdata_siswa()
    {

        $siswa = DataSiswaModel::all();



        return view('admin.data_siswa.index', compact('siswa', 'join_kelas'));
    }

    public function insert_datasiswa(Request $request)
    {
        $this->validate($request, [
            'nisn' =>   'required | size:6 | unique:tbl_datasiswa',
            'foto' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ]);


        $siswa = DataSiswaModel::create([
            'nama_siswa' => $request->nama_siswa,
            'nisn' => $request->nisn,
            'jurusan' => $request->jurusan,
            'id_kelas' => $request->id_kelas,
            'id_agama' => $request->id_agama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'nama_ayah' => $request->nama_ayah,
            'nama_ibu' => $request->nama_ibu,
            'pekerjaan_wali' => $request->pekerjaan_wali,
            'foto' => $request->foto,
        ]);

        if ($request->has('foto')) {
            $request->file('foto')->move('fotosiswa/', $request->file('foto')->getClientOriginalName());
            $siswa->foto = $request->file('foto')->getClientOriginalName();
            $siswa->save();
        }

        Alert::success('Sukses', 'Data Berhasil Di Tambah');
        return redirect('/admin/data_siswa');
    }

    public function get_profileadmin($id)
    {
        $admin = Admin::find($id);
        return view('admin.profile.index', compact('admin'));
        // dd($admin);
    }

    public function get_insert_akunsiswa()
    {
        $siswa = User::all();
        return view('admin.akun_siswa.index', compact('siswa'));
    }

    public function post_insert_akunsiswa(Request $request)
    {
        $this->validate($request, [
            'nisn' =>   'required | size:6 | unique:tbl_akunsiswa',
            'password' =>   'required | size:6',
            'konfirmasi_password' =>   'same:password',
            'foto' => 'image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $siswa = User::create([
            'nama_siswa' => $request->nama_siswa,
            'nisn' => $request->nisn,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'foto' => $request->foto,
        ]);

        if ($request->has('foto')) {
            $request->file('foto')->move('foto_akunsiswa/', $request->file('foto')->getClientOriginalName());
            $siswa->foto = $request->file('foto')->getClientOriginalName();
            $siswa->save();
        }

        Alert::success('Sukses', 'Akun Siswa Berhasil Di Tambah');
        return redirect('/admin/akunsiswa');
    }

    public function import_akunsiswa(Request $request)
    {
        // validasi
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        Excel::import(new AkunSiswaImport, $request->file('file'));

        Alert::success('Sukses', 'Akun Siswa Berhasil Di Tambah');
        return redirect('/admin/akunsiswa');
    }

    public function get_akunadmin()
    {
        $admin = Admin::all();
        return view('admin.akun_admin.index', compact('admin'));
    }

    public function post_akunadmin(Request $request)
    {
        $this->validate($request, [
            'email' =>   'required | unique:tbl_akunadmin',
            'password' =>   'required | size:6',
            'konfirmasi_password' =>   'same:password',
            'foto' => 'image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $admin = User::create([
            'nama' => $request->nama,
            'nisn' => $request->nisn,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'foto' => $request->foto,
        ]);

        if ($request->has('foto')) {
            $request->file('foto')->move('foto_akunadmin/', $request->file('foto')->getClientOriginalName());
            $admin->foto = $request->file('foto')->getClientOriginalName();
            $admin->save();
        }

        Alert::success('Sukses', 'Akun Admin Berhasil Di Tambah');
        return redirect('/admin/akunadmin');
    }

    public function import_datasiswa(Request $request)
    {
        // validasi
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        Excel::import(new DataSiswaImport, $request->file('file'));

        Alert::success('Sukses', 'Data Siswa Berhasil Di Tambah');
        return redirect('/admin/data_siswa');
    }

    public function get_edit_akunsiswa($id)
    {
        $siswa = User::find($id);
        return view('admin.akun_siswa.edit', compact('siswa'));
    }

    public function post_edit_akunsiswa(Request $request, $id)
    {
        $siswa = User::find($id);
        $siswa->nama_siswa = $request->nama_siswa;
        $siswa->nisn = $request->nisn;
        $siswa->email = $request->email;
        $siswa->password = bcrypt($request->password);
        $siswa->save();

        Alert::success('Sukses', 'Akun Siswa Berhasil Di Update!');
        return redirect('/admin/akunsiswa');
    }

    public function get_edit_akunadmin(Request $request, $id)
    {
        $admin = Admin::find($id);

        return view('admin.akun_admin.edit', compact('admin'));
    }
    public function post_edit_akunadmin(Request $request, $id)
    {
        $admin = Admin::find($id);

        $admin->nama = $request->nama;
        $admin->email = $request->email;
        $admin->password = bcrypt($request->password);
        $admin->save();

        if ($request->has('foto')) {
            $request->file('foto')->move('foto_akunadmin/', $request->file('foto')->getClientOriginalName());
            $admin->foto = $request->file('foto')->getClientOriginalName();
            $admin->save();
        }


        Alert::success('Sukses', 'Akun Admin Berhasil Di Update!');
        return redirect()->back();
    }

    public function get_edit_datasiswa(Request $request, $id)
    {

        $siswa = DataSiswaModel::find($id);

        $loopjurusan = DB::table('tbl_jurusan')->get();
        $loopkelas = DB::table('tbl_kelas')->get();
        $loopagama = DB::table('tbl_agama')->get();

        $join_akun = DB::table('tbl_datasiswa')
            ->join(
                'tbl_akunsiswa',
                'tbl_akunsiswa.nisn',
                '=',
                'tbl_datasiswa.nisn'
            )->select(
                'tbl_akunsiswa.email',
                'tbl_akunsiswa.foto'
            )->where('tbl_akunsiswa.nisn', $siswa->nisn)->first();

        // dd($join_akun);

        $join_kelas = DB::table('tbl_datasiswa')
            ->select(
                'tbl_kelas.kelas',
                'tbl_kelas.id_kelas'
            )
            ->join(
                'tbl_kelas',
                'tbl_datasiswa.id_kelas',
                '=',
                'tbl_kelas.id_kelas'
            )->where('tbl_kelas.id_kelas', $siswa->id_kelas)->first();

        // dd($join_kelas);
        $join_agama = DB::table('tbl_datasiswa')
            ->select(
                'tbl_agama.agama',
                'tbl_agama.id_agama'
            )
            ->join(
                'tbl_agama',
                'tbl_datasiswa.id_agama',
                '=',
                'tbl_agama.id_agama'
            )->where('tbl_agama.id_agama', $siswa->id_agama)->first();

        // dd($join_agama);

        return view('admin.data_siswa.edit', compact('siswa', 'join_agama', 'join_kelas', 'join_akun', 'loopjurusan', 'loopkelas', 'loopagama'));
    }

    public function post_edit_datasiswa(Request $request, $id)
    {
        $siswa = DataSiswaModel::find($id);
        $siswa->update($request->all());
        if ($request->has('foto')) {
            $request->file('foto')->move('fotosiswa/', $request->file('foto')->getClientOriginalName());
            $siswa->foto = $request->file('foto')->getClientOriginalName();
            $siswa->save();
        }

        Alert::success('Sukses', 'Data Berhasil Di Ubah');

        return redirect('/admin/data_siswa')->with('success', 'Data Siswa Berhasil Diubah!');
    }

    public function data_walas()
    {
        $walas = DB::table('tbl_akunwalas')->get();
        $loopkelas = DB::table('tbl_kelas')->get();

        return view('admin.data_walas.index', compact('walas', 'loopkelas'));
    }

    public function post_data_walas(Request $request)
    {
        $data = Teacher::create([
            'nama' => $request->nama,
            'nuptk' => $request->nuptk,
            'walikelas' => $request->walikelas,
            'email' => $request->email,
            'password' =>  bcrypt($request->password),
            'foto' => $request->foto
        ]);

        if ($request->has('foto')) {
            $request->file('foto')->move('foto_walas/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        Alert::success('Sukses', 'Data Berhasil Di Update');
        return redirect()->back();
    }

    public function get_edit_data_walas($id)
    {
        $walas = Teacher::find($id);

        $join_kelas = DB::table('tbl_datasiswa')
            ->select(
                'tbl_kelas.kelas'
            )
            ->join(
                'tbl_akunwalas',
                'tbl_datasiswa.id_kelas',
                '=',
                'tbl_akunwalas.id_kelas'
            )->join(
                'tbl_kelas',
                'tbl_akunwalas.id_kelas',
                '=',
                'tbl_kelas.id_kelas'
            )->where('tbl_kelas.kelas', '=', $walas->kelas)->first();
        dd($join_kelas);

        $join_loop = DB::table('tbl_walas')
            ->select(
                'tbl_datasiswa.nama_siswa',
                'tbl_datasiswa.nisn',
                'tbl_datasiswa.id_jurusan',
                'tbl_kelas.kelas',
                'tbl_datasiswa.foto'
            )
            ->join(
                'tbl_datasiswa',
                'tbl_datasiswa.id_kelas',
                '=',
                'tbl_walas.id_kelas'
            )->join(
                'tbl_kelas',
                'tbl_walas.id_kelas',
                '=',
                'tbl_kelas.id_kelas'
            )->where('tbl_datasiswa.id_kelas', '=', $walas->id_kelas)->get();
        // dd($join_loop);

        $loopkelas = DB::table('tbl_kelas')->get();


        return view('admin.data_walas.edit', compact('walas', 'join_kelas', 'join_loop', 'loopkelas'));
    }
    public function edit_walas(Request $request, $id)
    {
        $walas = Teacher::find($id);

        $walas->update($request->all());

        if ($request->has('foto')) {
            $request->file('foto')->move('foto_walas/', $request->file('foto')->getClientOriginalName());
            $walas->foto = $request->file('foto')->getClientOriginalName();
            $walas->save();
        }

        Alert::success('Sukses', 'Data Berhasil Di Ubah');

        return redirect()->back();
    }

    public function naik_kelas()
    {
        $kelas = DB::table('tbl_kelas')->get();

        return view('admin.data_kelas.naik_kelas.index', compact('kelas'));
    }

    public function post_naik_kelas(Request $request)
    {

        $join_kelas = DB::table('tbl_kelas')->select('tbl_datasiswa.id_kelas')->join('tbl_datasiswa', 'tbl_datasiswa.id_kelas', '=', 'tbl_kelas.id_kelas')->get();

        $darikelas = $request->darikelas;
        $kekelas = $request->kekelas;

        $tes = DB::table('tbl_datasiswa')
            ->where('id_kelas', $darikelas)->update([
                'id_kelas' => $kekelas
            ]);

        $datasiswa = json_encode($tes);

        // dd($datasiswa);

        Alert::success('Sukses', 'Data Siswa Berhasil Diedit!');
        return redirect('/admin/naik_kelas');
    }

    public function data_kelas()
    {
        $data_kelas =  DB::table('tbl_kelas')->get();

        $kelas_terakhir =  DB::table('tbl_kelas')->select('id_kelas')->orderBy('id_kelas', 'desc')->first();


        return view('admin.data_kelas.index', compact('data_kelas', 'kelas_terakhir'));
    }

    public function detail_kelas($id)
    {
        $data_kelas =  DB::table('tbl_kelas')->find($id);

        $loop_kelas =  DB::table('tbl_kelas')->get();

        $join_kelas = DB::table('tbl_kelas')
            ->select(
                'tbl_kelas.kelas',
                'tbl_kelas.id_jurusan',
                'tbl_kelas.id_kelas',
                'tbl_akunwalas.foto',
                'tbl_akunwalas.nuptk',
                'tbl_akunwalas.nama'
            )
            ->join(
                'tbl_datasiswa',
                'tbl_datasiswa.id_kelas',
                '=',
                'tbl_kelas.id_kelas'
            )->join(
                'tbl_akunwalas',
                'tbl_akunwalas.walikelas',
                '=',
                'tbl_kelas.kelas'
            )->where('tbl_akunwalas.walikelas', '=', $data_kelas->kelas)->first();

        // dd($join_kelas);

        $join_loop = DB::table('tbl_akunwalas')
            ->select(
                'tbl_datasiswa.nama_siswa',
                'tbl_datasiswa.nisn',
                'tbl_datasiswa.id_jurusan',
                'tbl_kelas.kelas',
                'tbl_datasiswa.foto'
            )
            ->join(
                'tbl_kelas',
                'tbl_kelas.kelas',
                '=',
                'tbl_akunwalas.walikelas'
            )->join(
                'tbl_datasiswa',
                'tbl_datasiswa.id_kelas',
                '=',
                'tbl_kelas.id_kelas'
            )->where('tbl_akunwalas.walikelas', '=', $data_kelas->kelas)->get();
        // dd($join_loop);

        return view('admin.data_kelas.detail', compact('data_kelas', 'join_loop', 'join_kelas', 'loop_kelas'));
    }
    public function update_datakelas(Request $request, $id)
    {
        $data_kelas =  DB::table('tbl_kelas')->find($id);

        $aa =  DB::table('tbl_kelas')->where('id_kelas', $data_kelas->id_kelas)
            ->update([
                'id_jurusan' => $request->id_jurusan,
                'kelas' => $request->kelas,
                'id_kelas' => $request->id_kelas,
            ]);


        Alert::success('Sukses', 'Data Kelas Berhasil Diedit!');
        return redirect('/admin/daftar_kelas');
    }

    public function tambah_datakelas(Request $request)
    {
        DB::table('tbl_kelas')->insert([
            'id_kelas' => $request->id_kelas,
            'id_jurusan' => $request->id_jurusan,
            'kelas' => $request->kelas,
        ]);
        Alert::success('Sukses', 'Data Kelas Berhasil Di Tambah');
        return redirect()->back();
    }

    public function simpan_to_datatraining(Request $request)
    {
        // dd($request->all());
        $result = DataTrainingModel::create([
            'tanggal_daftar' => $request->tanggal_daftar,
            'nama_siswa' => $request->nama_siswa,
            'nisn' => $request->nisn,
            'kelas' => $request->kelas,
            'status_kelengkapan_ortu' => $request->status_kelengkapan_ortu,
            'status_rumah_ortu' => $request->status_rumah_ortu,
            'status_pekerjaan_wali' => $request->status_pekerjaan_wali,
            'status_sk_tidakmampu' => $request->status_sk_tidakmampu,
            'keterangan' => $request->keterangan,
        ]);
        Alert::success('Sukses', 'Data Hasil Verifikasi Berhasil Di Simpan Ke Data Training');
        return redirect()->back();
    }

    public function hapus_datasiswa($id)
    {
        DataSiswaModel::where('id', $id)->delete();

        Alert::success('Sukses', 'Data Berhasil Di Hapus');
        return redirect('/admin/data_siswa');
    }

    public function hapus_datakelas($id)
    {
        DB::table('tbl_kelas')->where('id', $id)->delete();

        Alert::success('Sukses', 'Kelas Berhasil Di Hapus');
        return redirect()->back();
    }

    public function hapus_datawalas($id)
    {
        Teacher::where('id', $id)->delete();

        Alert::success('Sukses', 'Data Berhasil Di Hapus');
        return redirect()->back();
    }

    public function hapus_akunsiswa($id)
    {
        User::where('id', $id)->delete();

        Alert::success('Sukses', 'Akun Siswa Berhasil Di Hapus');
        return redirect('/admin/akunsiswa');
    }

    public function hapus_akunadmin($id)
    {
        Admin::where('id', $id)->delete();

        Alert::success('Sukses', 'Akun Admin Berhasil Di Hapus');
        return redirect('/admin/akunadmin');
    }

    public function hapus_datakriteria($id)
    {
        DB::table('tbl_datakriteria')->where('id', $id)->delete();

        Alert::success('Sukses', 'Data Kriteria Berhasil Di Hapus');
        return redirect('/admin/data_kriteria');
    }

    public function hapus_data_training($id)
    {
        DataTrainingModel::find($id)->delete();

        Alert::success('Sukses', 'Data Berhasil Di Hapus');
        return redirect('/admin/data_training');
    }

    public function hapus_data_training_all()
    {
        DataTrainingModel::getQuery()->delete();

        Alert::success('Sukses', 'Data Berhasil Di Hapus Semua');
        return redirect()->back();
    }

    public function hapus_dataset_siswa($id)
    {
        DataSetModel::find($id)->delete();

        Alert::success('Sukses', 'Data Berhasil Di Hapus');
        return redirect('/admin/dataset_siswa');
    }
}
