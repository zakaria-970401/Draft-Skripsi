<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\DataSetModel;
use RealRashid\SweetAlert\Facades\Alert;
use App\DataTrainingModel;
use App\HasilHitunganModel;
use App\DataSiswaModel;
use App\Teacher;
use App\User;

class WalasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:teacher')->except('adminlogout', 'walaslogout');
    }

    public function index()
    {
        $data_training = DataTrainingModel::all()->count();

        $data_siswa = DataSiswaModel::all()->count();

        $permintaan_bansos = DataSetModel::where('kelas', Auth::user()->walikelas)->count();

        $akun_siswa = User::all()->count();

        $akun_admin = Admin::all()->count();

        $akun_walas = Teacher::all()->count();

        return view('walas.index', compact('data_training', 'data_siswa', 'permintaan_bansos', 'akun_siswa', 'akun_admin', 'akun_walas'));
    }

    public function verifikasi_databansos()
    {
        $kelas = Auth::user()->walikelas;

        $join_tbl = DB::table('tbl_akunwalas')
            ->join(
                'tbl_dataset',
                'tbl_akunwalas.walikelas',
                '=',
                'tbl_dataset.kelas'
            )->where('tbl_dataset.kelas', '=', $kelas)->get();

        // dd($join_tbl);
        return view('walas.verifikasi.index', compact('join_tbl'));
    }

    public function detail_dataset_siswa($id)
    {
        $status = DataSetModel::find($id);


        $joinfoto = DB::table('tbl_datasiswa')->join(
            'tbl_dataset',
            'tbl_datasiswa.nisn',
            '=',
            'tbl_dataset.nisn'
        )->select('tbl_datasiswa.foto')->first();


        return view('walas.verifikasi.edit', compact('status', 'joinfoto'));
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
        $pemeriksa = Auth::user()->nama;

        // dd($pemeriksa);

        if ($data->status == 1 && $data->status == 2) {
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
        return redirect('/walas/bansos_anakdidik');
    }

    public function hitung_bansos_anakdidik(Request $request, $id)
    {
        $data = DataSetModel::find($id)->update(['status' => 2]);

        $status_kelengkapan_ortu = $request->status_kelengkapan_ortu;
        $tgl_daftar = $request->tgl_daftar;
        $nisn = $request->nisn;
        $nama_siswa = $request->nama_siswa;
        $kelas = $request->kelas;
        $status_rumah_ortu = $request->status_rumah_ortu;
        $status_pekerjaan_wali = $request->status_pekerjaan_wali;
        $status_sk_tidakmampu = $request->status_sk_tidakmampu;
        $keterangan = $request->keterangan;

        $datatraining = DataTrainingModel::all();

        //MENGHITUNG JUMLAH DATA TRAINING //
        $hitung_total_datatraining =  DataTrainingModel::count();

        // MENGHITUNG LABEL YANG DAPAT //
        $hitung_label_dapat =  DataTrainingModel::where('keterangan', 'Dapat')->count();
        // MENGHITUNG LABEL YANG TIDAK DAPAT //
        $hitung_label_tdkdapat =  DataTrainingModel::where('keterangan', 'Tidak Dapat')->count();

        //HASIL PEMBAGIAN LABEL DAPAT //
        $pembagian_label_dapat = number_format($hitung_label_dapat / $hitung_total_datatraining, 2);
        //HASIL PEMBAGIAN LABEL TIDAK DAPAT //
        $pembagian_label_tdkdapat = number_format($hitung_label_tdkdapat / $hitung_total_datatraining, 2);

        //PERHITUNGAN DATA ATRIBUT ORTU LENGKAP CLASS DAPAT DAN TIDAK DAPAT//
        $status_kelengkapan_ortu_lengkap_dapat_request = DataTrainingModel::where('status_kelengkapan_ortu', $status_kelengkapan_ortu)->where('keterangan', 'Dapat')->count();

        $status_kelengkapan_ortu_lengkap_tdkdapat_request = DataTrainingModel::where('status_kelengkapan_ortu', $status_kelengkapan_ortu)->where('keterangan', 'Tidak Dapat')->count();

        //PERHITUNGAN DATA ATRIBUT ORTU LENGKAP CLASS DAPAT DAN TIDAK DAPAT//
        $status_kelengkapan_ortu_tdklengkap_dapat_request = DataTrainingModel::where('status_kelengkapan_ortu', $status_kelengkapan_ortu)->where('keterangan', 'Dapat')->count();

        $status_kelengkapan_ortu_tdklengkap_tdkdapat_request = DataTrainingModel::where('status_kelengkapan_ortu', $status_kelengkapan_ortu)->where('keterangan', 'Tidak Dapat')->count();

        // PERHITUNGAN PROBABILITAS ORTU LENGKAP DAPAT DAN TIDAK DAPAT //
        $probabilitas_kelengkapan_ortu_lengkap_dapat_request = number_format($status_kelengkapan_ortu_lengkap_dapat_request / $hitung_total_datatraining, 2);

        $probabilitas_kelengkapan_ortu_lengkap_tdkdapat_request = number_format($status_kelengkapan_ortu_lengkap_tdkdapat_request / $hitung_total_datatraining, 2);

        $probabilitas_kelengkapan_ortu_tdklengkap_dapat_request = number_format($status_kelengkapan_ortu_tdklengkap_dapat_request / $hitung_total_datatraining, 2);

        $probabilitas_kelengkapan_ortu_tdklengkap_tdkdapat_request = number_format($status_kelengkapan_ortu_tdklengkap_tdkdapat_request / $hitung_total_datatraining, 2);

        //PERHITUNGAN DATA ATRIBUT RUMAH SENDIRI CLASS DAPAT//
        $status_rumah_sendiri_request_dapat = DataTrainingModel::where('status_rumah_ortu', $status_rumah_ortu)->where('keterangan', 'Dapat')->count();

        $status_rumah_sendiri_request_tdkdapat = DataTrainingModel::where('status_rumah_ortu', $status_rumah_ortu)->where('keterangan', 'Tidak Dapat')->count();

        // PERHITUNGAN PROBABILITAS RUMAH SENDIRI DAPAT DAN TIDAK DAPAT //
        $probabilitas_status_rumah_sendiri_request_dapat = number_format($status_rumah_sendiri_request_dapat / $hitung_total_datatraining, 2);

        $probabilitas_status_rumah_sendiri_request_tdkdapat = number_format($status_rumah_sendiri_request_tdkdapat / $hitung_total_datatraining, 2);

        //PERHITUNGAN DATA ATRIBUT RUMAH SEWA CLASS DAPAT//
        $status_rumah_sewa_request_dapat = DataTrainingModel::where('status_rumah_ortu', $status_rumah_ortu)->where('keterangan', 'Dapat')->count();

        $status_rumah_sewa_request_tdkdapat = DataTrainingModel::where('status_rumah_ortu', $status_rumah_ortu)->where('keterangan', 'Tidak Dapat')->count();

        // PERHITUNGAN PROBABILITAS RUMAH sewa DAPAT DAN TIDAK DAPAT //
        $probabilitas_status_rumah_sewa_request_dapat = number_format($status_rumah_sewa_request_dapat / $hitung_total_datatraining, 2);

        $probabilitas_status_rumah_sewa_request_tdkdapat = number_format($status_rumah_sewa_request_tdkdapat / $hitung_total_datatraining, 2);

        //PERHITUNGAN DATA ATRIBUT KONTRAKAN CLASS DAPAT//
        $status_rumah_kontrakan_request_dapat = DataTrainingModel::where('status_rumah_ortu', $status_rumah_ortu)->where('keterangan', 'Dapat')->count();

        $status_rumah_kontrakan_request_tdkdapat = DataTrainingModel::where('status_rumah_ortu', $status_rumah_ortu)->where('keterangan', 'Tidak Dapat')->count();

        // PERHITUNGAN PROBABILITAS KONTRAKAN DAPAT DAN TIDAK DAPAT //
        $probabilitas_status_rumah_kontrakan_request_dapat = number_format($status_rumah_kontrakan_request_dapat / $hitung_total_datatraining, 2);

        $probabilitas_status_rumah_kontrakan_request_tdkdapat = number_format($status_rumah_kontrakan_request_tdkdapat / $hitung_total_datatraining, 2);

        //PERHITUNGAN DATA ATRIBUT TINGGAL DENGAN SAUDARA CLASS DAPAT//
        $status_rumah_saudara_request_dapat = DataTrainingModel::where('status_rumah_ortu', $status_rumah_ortu)->where('keterangan', 'Dapat')->count();

        $status_rumah_saudara_request_tdkdapat = DataTrainingModel::where('status_rumah_ortu', $status_rumah_ortu)->where('keterangan', 'Tidak Dapat')->count();

        // PERHITUNGAN PROBABILITAS saudara DAPAT DAN TIDAK DAPAT //
        $probabilitas_status_rumah_saudara_request_dapat = number_format($status_rumah_saudara_request_dapat / $hitung_total_datatraining, 2);

        $probabilitas_status_rumah_saudara_request_tdkdapat = number_format($status_rumah_saudara_request_tdkdapat / $hitung_total_datatraining, 2);

        //PERHITUNGAN DATA ATRIBUT PEKERJA SWASTA CLASS DAPAT//
        $status_pekerja_swasta_request_dapat = DataTrainingModel::where('status_pekerjaan_Wali', $status_pekerjaan_wali)->where('keterangan', 'Dapat')->count();

        $status_pekerja_swasta_request_tdkdapat = DataTrainingModel::where('status_pekerjaan_wali', $status_pekerjaan_wali)->where('keterangan', 'Tidak Dapat')->count();

        // PERHITUNGAN PROBABILITAS SAUDARA DAPAT DAN TIDAK DAPAT //
        $probabilitas_status_pekerja_swasta_request_dapat = number_format($status_pekerja_swasta_request_dapat / $hitung_total_datatraining, 2);

        $probabilitas_status_pekerja_swasta_request_tdkdapat = number_format($status_pekerja_swasta_request_tdkdapat / $hitung_total_datatraining, 2);

        //PERHITUNGAN DATA ATRIBUT PEKERJA SWASTA CLASS DAPAT//
        $status_pekerja_negri_request_dapat = DataTrainingModel::where('status_pekerjaan_Wali', $status_pekerjaan_wali)->where('keterangan', 'Dapat')->count();

        $status_pekerja_negri_request_tdkdapat = DataTrainingModel::where('status_pekerjaan_wali', $status_pekerjaan_wali)->where('keterangan', 'Tidak Dapat')->count();

        // PERHITUNGAN PROBABILITAS saudara DAPAT DAN TIDAK DAPAT //
        $probabilitas_status_pekerja_negri_request_dapat = number_format($status_pekerja_negri_request_dapat / $hitung_total_datatraining, 2);

        $probabilitas_status_pekerja_negri_request_tdkdapat = number_format($status_pekerja_negri_request_tdkdapat / $hitung_total_datatraining, 2);

        //PERHITUNGAN DATA ATRIBUT PEKERJA TIDAK TETAP CLASS DAPAT//
        $status_pekerja_tdktetap_request_dapat = DataTrainingModel::where('status_pekerjaan_Wali', $status_pekerjaan_wali)->where('keterangan', 'Dapat')->count();

        $status_pekerja_tdktetap_request_tdkdapat = DataTrainingModel::where('status_pekerjaan_wali', $status_pekerjaan_wali)->where('keterangan', 'Tidak Dapat')->count();

        // PERHITUNGAN PROBABILITAS PEKERJA TIDAK TETAP DAPAT DAN TIDAK DAPAT //
        $probabilitas_status_pekerja_tdktetap_request_dapat = number_format($status_pekerja_tdktetap_request_dapat / $hitung_total_datatraining, 2);

        $probabilitas_status_pekerja_tdktetap_request_tdkdapat = number_format($status_pekerja_tdktetap_request_tdkdapat / $hitung_total_datatraining, 2);

        //PERHITUNGAN DATA ATRIBUT USAHA TIDAK TETAP CLASS DAPAT//
        $status_pekerja_usaha_request_dapat = DataTrainingModel::where('status_pekerjaan_Wali', $status_pekerjaan_wali)->where('keterangan', 'Dapat')->count();

        $status_pekerja_usaha_request_tdkdapat = DataTrainingModel::where('status_pekerjaan_wali', $status_pekerjaan_wali)->where('keterangan', 'Tidak Dapat')->count();

        // PERHITUNGAN PROBABILITAS USAHA DAPAT DAN TIDAK DAPAT //
        $probabilitas_status_pekerja_usaha_request_dapat = number_format($status_pekerja_usaha_request_dapat / $hitung_total_datatraining, 2);

        $probabilitas_status_pekerja_usaha_request_tdkdapat = number_format($status_pekerja_usaha_request_tdkdapat / $hitung_total_datatraining, 2);

        //PERHITUNGAN DATA ATRIBUT SK ADA CLASS DAPAT//
        $status_skada_request_dapat = DataTrainingModel::where('status_sk_tidakmampu', $status_sk_tidakmampu)->where('keterangan', 'Dapat')->count();

        $status_skada_request_tdkdapat = DataTrainingModel::where('status_sk_tidakmampu', $status_sk_tidakmampu)->where('keterangan', 'Tidak Dapat')->count();

        //PERHITUNGAN DATA ATRIBUT SK TIDAK ADA CLASS DAPAT//
        $status_sktdkada_request_dapat = DataTrainingModel::where('status_sk_tidakmampu', $status_sk_tidakmampu)->where('keterangan', 'Dapat')->count();

        $status_sktdkada_request_tdkdapat = DataTrainingModel::where('status_sk_tidakmampu', $status_sk_tidakmampu)->where('keterangan', 'Tidak Dapat')->count();

        // PERHITUNGAN PROBABILITAS SK ADA  //
        $probabilitas_status_skada_request_dapat = number_format($status_skada_request_dapat / $hitung_total_datatraining, 2);

        $probabilitas_status_skada_request_tdkdapat = number_format($status_skada_request_tdkdapat / $hitung_total_datatraining, 2);

        $probabilitas_status_sktdkada_request_dapat = number_format($status_sktdkada_request_dapat / $hitung_total_datatraining, 2);

        $probabilitas_status_sktdkada_request_tdkdapat = number_format($status_sktdkada_request_tdkdapat / $hitung_total_datatraining, 2);

        return view('walas.hasil_hitungan.dataset_siswa.index', compact(
            'dataset',
            'keterangan',
            'tgl_daftar',
            'nisn',
            'kelas',
            'nama_siswa',
            'datatraining',
            'hitung_total_datatraining',
            'status_kelengkapan_ortu',
            'hitung_label_dapat',
            'hitung_label_tdkdapat',
            'pembagian_label_dapat',
            'pembagian_label_tdkdapat',
            'status_kelengkapan_ortu_lengkap_dapat_request',
            'status_kelengkapan_ortu_lengkap_tdkdapat_request',
            'probabilitas_kelengkapan_ortu_lengkap_dapat_request',
            'probabilitas_kelengkapan_ortu_lengkap_tdkdapat_request',
            'status_kelengkapan_ortu_tdklengkap_dapat_request',
            'status_kelengkapan_ortu_tdklengkap_tdkdapat_request',
            'probabilitas_kelengkapan_ortu_tdklengkap_dapat_request',
            'probabilitas_kelengkapan_ortu_tdklengkap_tdkdapat_request',
            'status_rumah_sendiri_request_dapat',
            'status_rumah_sendiri_request_tdkdapat',
            'probabilitas_status_rumah_sendiri_request_dapat',
            'probabilitas_status_rumah_sendiri_request_tdkdapat',
            'status_rumah_ortu',
            'status_rumah_sewa_request_dapat',
            'status_rumah_sewa_request_tdkdapat',
            'probabilitas_status_rumah_sewa_request_dapat',
            'probabilitas_status_rumah_sewa_request_tdkdapat',
            'status_rumah_kontrakan_request_dapat',
            'status_rumah_kontrakan_request_tdkdapat',
            'probabilitas_status_rumah_kontrakan_request_dapat',
            'probabilitas_status_rumah_kontrakan_request_tdkdapat',
            'status_rumah_saudara_request_dapat',
            'status_rumah_saudara_request_tdkdapat',
            'probabilitas_status_rumah_saudara_request_dapat',
            'probabilitas_status_rumah_saudara_request_tdkdapat',
            'status_pekerjaan_wali',
            'status_pekerja_swasta_request_dapat',
            'status_pekerja_swasta_request_tdkdapat',
            'probabilitas_status_pekerja_swasta_request_dapat',
            'probabilitas_status_pekerja_swasta_request_tdkdapat',
            'status_pekerja_negri_request_dapat',
            'status_pekerja_negri_request_tdkdapat',
            'probabilitas_status_pekerja_negri_request_dapat',
            'probabilitas_status_pekerja_negri_request_tdkdapat',
            'status_pekerja_tdktetap_request_dapat',
            'status_pekerja_tdktetap_request_tdkdapat',
            'probabilitas_status_pekerja_tdktetap_request_dapat',
            'probabilitas_status_pekerja_tdktetap_request_tdkdapat',
            'status_pekerja_usaha_request_dapat',
            'status_pekerja_usaha_request_tdkdapat',
            'probabilitas_status_pekerja_usaha_request_dapat',
            'probabilitas_status_pekerja_usaha_request_tdkdapat',
            'status_sk_tidakmampu',
            'status_skada_request_dapat',
            'status_skada_request_tdkdapat',
            'probabilitas_status_skada_request_dapat',
            'probabilitas_status_skada_request_tdkdapat',
            'status_sktdkada_request_dapat',
            'status_sktdkada_request_tdkdapat',
            'probabilitas_status_sktdkada_request_dapat',
            'probabilitas_status_sktdkada_request_tdkdapat',
            'dataset'
        ));
    }

    public function post_hitung_bansos_anakdidik(Request $request)
    {
        $nisn = $request->nisn;
        $tgl_daftar = $request->tgl_daftar;
        $status = $request->status;
        $keterangan = $request->keterangan;
        $pemeriksa = Auth::user()->nama;

        // dd($pemeriksa);

        $data = DataSetModel::where(['nisn' => $nisn, 'tgl_daftar' => $tgl_daftar])
            ->update([
                'status' => $status,
                'keterangan' => $keterangan,
                'pemeriksa' => $pemeriksa
            ]);

        $result = HasilHitunganModel::create([
            'tgl_daftar' => $request->tgl_daftar,
            'nama_siswa' => $request->nama_siswa,
            'nisn' => $request->nisn,
            'kelas' => $request->kelas,
            'label_dapat' => $request->label_dapat,
            'label_tdkdapat' => $request->label_tdkdapat,
            'status_kelengkapan_ortu' => $request->status_kelengkapan_ortu,
            'status_rumah_ortu' => $request->status_rumah_ortu,
            'status_pekerjaan_wali' => $request->status_pekerjaan_wali,
            'status_sk_tidakmampu' => $request->status_sk_tidakmampu,
            'ortu_lengkap_dapat' => $request->ortu_lengkap_dapat,
            'ortu_lengkap_tdkdapat' => $request->ortu_lengkap_tdkdapat,
            'ortu_tdklengkap_dapat' => $request->ortu_tdklengkap_dapat,
            'ortu_tdklengkap_tdkdapat' => $request->ortu_tdklengkap_tdkdapat,
            'rumah_sendiri_dapat' => $request->rumah_sendiri_dapat,
            'rumah_sendiri_tdkdapat' => $request->rumah_sendiri_tdkdapat,
            'rumah_sewa_dapat' => $request->rumah_sewa_dapat,
            'rumah_sewa_tdkdapat' => $request->rumah_sewa_tdkdapat,
            'rumah_kontrakan_dapat' => $request->rumah_kontrakan_dapat,
            'rumah_kontrakan_tdkdapat' => $request->rumah_kontrakan_tdkdapat,
            'rumah_saudara_dapat' => $request->rumah_saudara_dapat,
            'rumah_saudara_tdkdapat' => $request->rumah_saudara_tdkdapat,
            'pekerja_swasta_dapat' => $request->pekerja_swasta_dapat,
            'pekerja_swasta_tdkdapat' => $request->pekerja_swasta_tdkdapat,
            'pekerja_negri_dapat' => $request->pekerja_negri_dapat,
            'pekerja_negri_tdkdapat' => $request->pekerja_negri_tdkdapat,
            'pekerja_tdktetap_dapat' => $request->pekerja_tdktetap_dapat,
            'pekerja_tdktetap_tdkdapat' => $request->pekerja_tdktetap_tdkdapat,
            'pekerja_usaha_dapat' => $request->pekerja_usaha_dapat,
            'pekerja_usaha_tdkdapat' => $request->pekerja_usaha_tdkdapat,
            'sk_ada_dapat' => $request->sk_ada_dapat,
            'sk_ada_tdkdapat' => $request->sk_ada_tdkdapat,
            'sk_tdkada_dapat' => $request->sk_tsdkada_dapat,
            'sk_tdkada_tdkdapat' => $request->sk_tdkada_tdkdapat,
            'probabilitas_dapat' => $request->probabilitas_dapat,
            'probabilitas_tdkdapat' => $request->probabilitas_tdkdapat
        ]);

        Alert::success('Berhasil', 'Data Berhasil Di Simpan!');

        return redirect('/walas/bansos_anakdidik');
    }

    public function get_hasil_dataverifikasi()
    {
        $kelas = Auth::user()->walikelas;

        $join_tbl = DB::table('tbl_akunwalas')
            ->join(
                'tbl_hasil_hitungan',
                'tbl_akunwalas.walikelas',
                '=',
                'tbl_hasil_hitungan.kelas'
            )->where('tbl_hasil_hitungan.kelas', '=', $kelas)->get();

        return view('walas.hasil_hitungan.hasil', compact('join_tbl'));
    }

    public function show_hitung_hasil_datatraining($id)
    {
        $show =   HasilHitunganModel::find($id);

        $hitung_total_datatraining =  DataTrainingModel::count();

        return view('walas.hasil_hitungan.show', compact('show', 'hitung_total_datatraining'));
    }


    public function get_profilewalas($id)
    {
        $walas = Teacher::find($id);
        return view('walas.profile.index', compact('walas'));
    }

    public function post_edit_akunwalas(Request $request, $id)
    {
        $walas = Teacher::find($id);
        $walas->nama = $request->nama;
        $walas->nuptk = $request->nuptk;
        $walas->email = $request->email;
        $walas->password = bcrypt($request->password);
        $walas->save();

        if ($request->has('foto')) {
            $request->file('foto')->move('foto_walas/', $request->file('foto')->getClientOriginalName());
            $walas->foto = $request->file('foto')->getClientOriginalName();
            $walas->save();
        }
        Alert::success('Sukses', 'Profile Berhasil Di Update!');
        return redirect()->back();
    }

    public function hapus_dataset_siswa($id)
    {
        DataSetModel::find($id)->delete();

        Alert::success('Sukses', 'Data Berhasil Di Hapus');
        return redirect('/walas/bansos_anakdidik');
    }
}
