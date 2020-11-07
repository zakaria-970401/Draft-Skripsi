<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use \App\DataTrainingModel;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\DataSetModel;
use App\AktivasiBansosModel;
use App\DataSiswaModel;
use App\HasilHitunganModel;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth')->except('logout', 'logoutadmin');
    }
    public function index()
    {
        $nisn = Auth::user()->nisn;

        $join_foto = DB::table('tbl_akunsiswa')->select(
            'tbl_datasiswa.foto'
        )->join(
            'tbl_datasiswa',
            'tbl_akunsiswa.nisn',
            '=',
            'tbl_datasiswa.nisn'
        )->where('tbl_datasiswa.nisn', '=', Auth::user()->nisn)->first();

        $status =  DataSetModel::where('nisn', $nisn)->get();

        return view('siswa.index', compact('status', 'join_foto'));
    }

    public function profile()
    {
        $join_siswa = DB::table('tbl_akunsiswa')->select(
            'tbl_datasiswa.jenis_kelamin',
            'tbl_datasiswa.id_agama',
            'tbl_datasiswa.id_jurusan',
            'tbl_datasiswa.id_kelas',
            'tbl_datasiswa.tempat_lahir',
            'tbl_datasiswa.tanggal_lahir',
            'tbl_datasiswa.alamat',
            'tbl_datasiswa.no_hp',
            'tbl_datasiswa.nama_ayah',
            'tbl_datasiswa.nama_ibu',
            'tbl_datasiswa.foto'
        )->join(
            'tbl_datasiswa',
            'tbl_akunsiswa.nisn',
            '=',
            'tbl_datasiswa.nisn'
        )->where('tbl_datasiswa.nisn', '=', Auth::user()->nisn)->first();
        // dd($join_siswa);

        $join_kelas = DB::table('tbl_datasiswa')
            ->select(
                'tbl_kelas.kelas'
            )
            ->join(
                'tbl_kelas',
                'tbl_datasiswa.id_kelas',
                '=',
                'tbl_kelas.id_kelas'
            )->where('tbl_datasiswa.nisn', '=', Auth::user()->nisn)->first();

        // dd($join_kelas);

        // dd($join_kelas);

        return view('siswa.profile.index', compact('join_siswa', 'join_kelas'));
    }

    public function update_profilesiswa(Request $request, $id)
    {

        $siswa = User::find($id);

        if ($request->has('foto')) {
            $request->file('foto')->move('foto_akunsiswa/', $request->file('foto')->getClientOriginalName());
            $siswa->foto = $request->file('foto')->getClientOriginalName();
            $siswa->save();
        }

        // dd($siswa);

        Alert::success('Sukses', 'Foto Berhasil Di Ubah!');
        return redirect('/siswa/profile');
    }

    public function update_passwordsiswa(Request $request, $id)
    {
        // $this->validate($request, [
        //     'password' => 'size:6'
        // ]);

        $siswa = User::find($id);

        $siswa->password = bcrypt($request->password);
        $siswa->save();
        // dd($siswa);
        // if ($siswa == true) {
        Alert::success('Sukses', 'Password Berhasil Di Ubah!');
        //     return redirect('/siswa/profile');
        // } elseif ($siswa == false) {
        //     Alert::error('Gagal', 'Password Terlalu Panjang');
        return redirect('/siswa/profile');
        // }
    }

    public function getdaftarbansos()
    {
        date_default_timezone_set('asia/jakarta');
        $tanggal = date('Y-m-d');

        $data_bansos = DataSetModel::all();

        $nisn = Auth::user()->nisn;

        $status_bansos = AktivasiBansosModel::first();


        $join_kelas = DB::table('tbl_datasiswa')
            ->select(
                'tbl_kelas.kelas'
            )
            ->join(
                'tbl_kelas',
                'tbl_datasiswa.id_kelas',
                '=',
                'tbl_kelas.id_kelas'
            )->where('tbl_datasiswa.nisn', '=', Auth::user()->nisn)->first();

        $join_jurusan = DB::table('tbl_datasiswa')
            ->select(
                'tbl_datasiswa.id_jurusan'
            )
            ->join(
                'tbl_akunsiswa',
                'tbl_datasiswa.nisn',
                '=',
                'tbl_akunsiswa.nisn'
            )->where('tbl_datasiswa.nisn', '=', Auth::user()->nisn)->first();

        $cek_data  = DataSetModel::where(['nisn' => $nisn, 'tgl_daftar' => $tanggal])->first();

        // dd($cek_data);

        return view('siswa.program_bansos.index', compact('tanggal', 'join_kelas', 'join_jurusan', 'data_bansos', 'status_btn', 'cek_data', 'status_bansos'));
    }

    public function postdaftarbansos(Request $request)
    {
        $this->validate($request, [
            'foto' => 'image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $data_bansos = DataSetModel::create([
            'tgl_daftar' => $request->tgl_daftar,
            'nama_siswa' => $request->nama_siswa,
            'nisn' => $request->nisn,
            'jurusan' => $request->jurusan,
            'kelas' => $request->kelas,
            'status_kelengkapan_ortu' => $request->status_kelengkapan_ortu,
            'status_yatimpiatu' => $request->status_yatimpiatu,
            'status_rumah_ortu' => $request->status_rumah_ortu,
            'status_pekerjaan_wali' => $request->status_pekerjaan_wali,
            'status_sk_tidakmampu' => $request->status_sk_tidakmampu,
            'foto' => $request->foto,
            'status' => $request->status,
        ]);
        if ($request->has('foto')) {
            $request->file('foto')->move('foto_sktidakmampu/', $request->file('foto')->getClientOriginalName());
            $data_bansos->foto = $request->file('foto')->getClientOriginalName();
            $data_bansos->save();
        }


        // Alert::success('Berhasil Mendaftar', 'Data Akan Di Validasi, Silahkan Menunggu Keputusannya');
        return redirect('/siswa');

        // RETURN API //
        // return "Berhasil Mendaftar";
    }

    public function data_siswa()
    {
        $data_siswa =  DataSiswaModel::all();

        return view('siswa.data_siswa.index', compact('data_siswa'));

        //RETURN API //
        // return $data_siswa;
    }

    public function data_kelas()
    {
        $data_kelas =  DB::table('tbl_kelas')->get();

        return view('siswa.data_kelas.index', compact('data_kelas'));
    }

    public function detail_kelas($id)
    {
        $data_kelas =  DB::table('tbl_kelas')->find($id);

        $join_kelas = DB::table('tbl_kelas')
            ->select(
                'tbl_kelas.kelas',
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

        return view('siswa.data_kelas.detail', compact('data_kelas', 'join_loop', 'join_kelas'));
    }

    public function hasil_bansos()
    {
        $nisn = Auth::user()->nisn;

        $hasil = DB::table('tbl_datasiswa')->join('tbl_hasil_hitungan', 'tbl_datasiswa.nisn', '=', 'tbl_hasil_hitungan.nisn')
            ->select(
                'tbl_datasiswa.foto',
                'tbl_hasil_hitungan.nama_siswa',
                'tbl_hasil_hitungan.nisn',
                'tbl_datasiswa.id_jurusan',
                'tbl_datasiswa.foto',
                'tbl_hasil_hitungan.kelas'
            )->get();
        // dd($hasil);

        return view('siswa.hasil_bansos', compact('hasil', 'join_foto'));
    }

    public function detail_databansos($id)
    {
        $status = DataSetModel::find($id);

        return view('siswa.program_bansos.detail', compact('status'));
    }

    public function print_databansos($id)
    {
        date_default_timezone_set('asia/jakarta');
        $tanggal = date('d-m-Y');

        $romawi = array("", "I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX", "X", "XI", "XII");

        $status = DataSetModel::find($id);
        // dd($status);
        $join_tbl = DB::table('tbl_dataset')
            ->select(
                'tbl_akunwalas.nuptk',
                'tbl_akunwalas.nama',
                'tbl_akunwalas.walikelas',
                'tbl_datasiswa.alamat',
                'tbl_datasiswa.id_jurusan'
            )
            ->join(
                'tbl_akunwalas',
                'tbl_akunwalas.walikelas',
                '=',
                'tbl_dataset.kelas'
            )->join(
                'tbl_datasiswa',
                'tbl_datasiswa.nisn',
                '=',
                'tbl_dataset.nisn'
            )
            ->where('tbl_akunwalas.walikelas', '=', $status->kelas)->first();
        // dd($join_tbl);

        return view('siswa.program_bansos.print', compact('status', 'join_tbl', 'tanggal', 'romawi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
