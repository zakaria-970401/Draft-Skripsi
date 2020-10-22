<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HasilHitunganModel;
use App\DataSetModel;
use Illuminate\Support\Facades\DB;

class GrafikController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin')->except('logout', 'logoutadmin', 'logoutwalas');
    }
    public function analisa_databansos()
    {

        $data = DataSetModel::all();

        // ** SISWA YANG DAPAT ** //
        $siswa_dpt_2020 = HasilHitunganModel::whereRaw('probabilitas_dapat > probabilitas_tdkdapat')->whereYear('tgl_daftar', '2020')->count();
        // dd($siswa_dpt_2020);
        $siswa_dpt_2021 = HasilHitunganModel::whereRaw('probabilitas_dapat > probabilitas_tdkdapat')->whereYear('tgl_daftar', '2021')->count();
        $siswa_dpt_2022 = HasilHitunganModel::whereRaw('probabilitas_dapat > probabilitas_tdkdapat')->whereYear('tgl_daftar', '2022')->count();
        $siswa_dpt_2023 = HasilHitunganModel::whereRaw('probabilitas_dapat > probabilitas_tdkdapat')->whereYear('tgl_daftar', '2023')->count();
        $siswa_dpt_2024 = HasilHitunganModel::whereRaw('probabilitas_dapat > probabilitas_tdkdapat')->whereYear('tgl_daftar', '2024')->count();
        $siswa_dpt_2025 = HasilHitunganModel::whereRaw('probabilitas_dapat > probabilitas_tdkdapat')->whereYear('tgl_daftar', '2025')->count();


        // ! SISWA YANG TIDAK DAPAT //
        $siswa_tdkdpt_2020 = DB::table('tbl_hasil_hitungan')->whereRaw('probabilitas_tdkdapat > probabilitas_dapat')->whereYear('tgl_daftar', '2020')->count();
        $siswa_tdkdpt_2021 = DB::table('tbl_hasil_hitungan')->whereRaw('probabilitas_tdkdapat > probabilitas_dapat')->whereYear('tgl_daftar', '2021')->count();
        $siswa_tdkdpt_2022 = DB::table('tbl_hasil_hitungan')->whereRaw('probabilitas_tdkdapat > probabilitas_dapat')->whereYear('tgl_daftar', '2022')->count();
        $siswa_tdkdpt_2023 = DB::table('tbl_hasil_hitungan')->whereRaw('probabilitas_tdkdapat > probabilitas_dapat')->whereYear('tgl_daftar', '2023')->count();
        $siswa_tdkdpt_2024 = DB::table('tbl_hasil_hitungan')->whereRaw('probabilitas_tdkdapat > probabilitas_dapat')->whereYear('tgl_daftar', '2024')->count();
        $siswa_tdkdpt_2025 = DB::table('tbl_hasil_hitungan')->whereRaw('probabilitas_tdkdapat > probabilitas_dapat')->whereYear('tgl_daftar', '2025')->count();
        // dd($siswa_tdkdpt_2020);

        return view(
            'admin.analisa_data.data_bansos.status_penerimaan_bansos.index',
            compact(
                'data',
                'siswa_dpt_2020',
                'siswa_dpt_2021',
                'siswa_dpt_2022',
                'siswa_dpt_2023',
                'siswa_dpt_2024',
                'siswa_dpt_2025',
                'siswa_tdkdpt_2020',
                'siswa_tdkdpt_2021',
                'siswa_tdkdpt_2022',
                'siswa_tdkdpt_2023',
                'siswa_tdkdpt_2024',
                'siswa_tdkdpt_2025'

            )
        );
    }

    public function post_analisa_databansos(Request $request)
    {
        $data = DataSetModel::all();

        $request_tahun = $request->tahun;

        // ** SISWA YANG DAPAT ** //
        $siswa_dpt_2020 = HasilHitunganModel::whereRaw('probabilitas_dapat > probabilitas_tdkdapat')->whereYear('tgl_daftar', '2020')->count();
        // dd($siswa_dpt_2020);
        $siswa_dpt_2021 = HasilHitunganModel::whereRaw('probabilitas_dapat > probabilitas_tdkdapat')->whereYear('tgl_daftar', '2021')->count();
        $siswa_dpt_2022 = HasilHitunganModel::whereRaw('probabilitas_dapat > probabilitas_tdkdapat')->whereYear('tgl_daftar', '2022')->count();
        $siswa_dpt_2023 = HasilHitunganModel::whereRaw('probabilitas_dapat > probabilitas_tdkdapat')->whereYear('tgl_daftar', '2023')->count();
        $siswa_dpt_2024 = HasilHitunganModel::whereRaw('probabilitas_dapat > probabilitas_tdkdapat')->whereYear('tgl_daftar', '2024')->count();
        $siswa_dpt_2025 = HasilHitunganModel::whereRaw('probabilitas_dapat > probabilitas_tdkdapat')->whereYear('tgl_daftar', '2025')->count();


        // ! TIDAK DAPAT //
        $siswa_tdkdpt_2020 = DB::table('tbl_hasil_hitungan')->whereRaw('probabilitas_tdkdapat > probabilitas_dapat')->whereYear('tgl_daftar', '2020')->count();
        $siswa_tdkdpt_2021 = DB::table('tbl_hasil_hitungan')->whereRaw('probabilitas_tdkdapat > probabilitas_dapat')->whereYear('tgl_daftar', '2021')->count();
        $siswa_tdkdpt_2022 = DB::table('tbl_hasil_hitungan')->whereRaw('probabilitas_tdkdapat > probabilitas_dapat')->whereYear('tgl_daftar', '2022')->count();
        $siswa_tdkdpt_2023 = DB::table('tbl_hasil_hitungan')->whereRaw('probabilitas_tdkdapat > probabilitas_dapat')->whereYear('tgl_daftar', '2023')->count();
        $siswa_tdkdpt_2024 = DB::table('tbl_hasil_hitungan')->whereRaw('probabilitas_tdkdapat > probabilitas_dapat')->whereYear('tgl_daftar', '2024')->count();
        $siswa_tdkdpt_2025 = DB::table('tbl_hasil_hitungan')->whereRaw('probabilitas_tdkdapat > probabilitas_dapat')->whereYear('tgl_daftar', '2025')->count();

        //*  KELAS X TKJ-A * //
        $x_tkja_dpt = HasilHitunganModel::where('kelas', 'X-TKJ-A')->whereRaw('probabilitas_dapat > probabilitas_tdkdapat')->whereYear('tgl_daftar', $request_tahun)->count();
        $x_tkja_tdkdpt = HasilHitunganModel::where('kelas', 'X-TKJ-A')->whereRaw('probabilitas_tdkdapat > probabilitas_dapat')->whereYear('tgl_daftar', $request_tahun)->count();

        // dd($x_tkja_tdkdpt);


        //*  KELAS X TKJ-B * //
        $x_tkjb_tdkdpt = HasilHitunganModel::where('kelas', 'X-TKJ-B')->whereRaw('probabilitas_dapat > probabilitas_tdkdapat')->whereYear('tgl_daftar', $request_tahun)->count();
        $x_tkjb_dpt = HasilHitunganModel::where('kelas', 'X-TKJ-B')->whereRaw('probabilitas_tdkdapat > probabilitas_dapat')->whereYear('tgl_daftar', $request_tahun)->count();


        //*  KELAS X TKJ-C * //
        $x_tkjc_dpt = HasilHitunganModel::where('kelas', 'X-TKJ-C')->whereRaw('probabilitas_dapat > probabilitas_tdkdapat')->whereYear('tgl_daftar', $request_tahun)->count();
        $x_tkjc_tdkdpt = HasilHitunganModel::where('kelas', 'X-TKJ-C')->whereRaw('probabilitas_tdkdapat > probabilitas_dapat')->whereYear('tgl_daftar', $request_tahun)->count();

        // ** KELAS X-TKJ-D ** //
        $x_tkjd_dpt = HasilHitunganModel::where('kelas', 'X-TKJ-D')->whereRaw('probabilitas_dapat > probabilitas_tdkdapat')->whereYear('tgl_daftar', $request_tahun)->count();
        $x_tkjd_tdkdpt = HasilHitunganModel::where('kelas', 'X-TKJ-D')->whereRaw('probabilitas_tdkdapat > probabilitas_dapat')->whereYear('tgl_daftar', $request_tahun)->count();

        // ** KELAS XI-TKJ-A ** //
        $xi_tkja_dpt = HasilHitunganModel::where('kelas', 'XI-TKJ-A')->whereRaw('probabilitas_dapat > probabilitas_tdkdapat')->whereYear('tgl_daftar', $request_tahun)->count();
        $xi_tkja_tdkdpt = HasilHitunganModel::where('kelas', 'XI-TKJ-A')->whereRaw('probabilitas_tdkdapat > probabilitas_dapat')->whereYear('tgl_daftar', $request_tahun)->count();

        // ** KELAS XI-TKJ-B ** //
        $xi_tkjb_dpt = HasilHitunganModel::where('kelas', 'XI-TKJ-B')->whereRaw('probabilitas_dapat > probabilitas_tdkdapat')->whereYear('tgl_daftar', $request_tahun)->count();
        $xi_tkjb_tdkdpt = HasilHitunganModel::where('kelas', 'XI-TKJ-B')->whereRaw('probabilitas_tdkdapat > probabilitas_dapat')->whereYear('tgl_daftar', $request_tahun)->count();

        // ** KELAS XI-TKJ-C ** //
        $xi_tkjc_dpt = HasilHitunganModel::where('kelas', 'XI-TKJ-C')->whereRaw('probabilitas_dapat > probabilitas_tdkdapat')->whereYear('tgl_daftar', $request_tahun)->count();
        $xi_tkjc_tdkdpt = HasilHitunganModel::where('kelas', 'XI-TKJ-C')->whereRaw('probabilitas_tdkdapat > probabilitas_dapat')->whereYear('tgl_daftar', $request_tahun)->count();

        // ** KELAS XII-TKJ-A ** //
        $xii_tkja_dpt = HasilHitunganModel::where('kelas', 'XII-TKJ-A')->whereRaw('probabilitas_dapat > probabilitas_tdkdapat')->whereYear('tgl_daftar', $request_tahun)->count();
        $xii_tkja_tdkdpt = HasilHitunganModel::where('kelas', 'XII-TKJ-A')->whereRaw('probabilitas_tdkdapat > probabilitas_dapat')->whereYear('tgl_daftar', $request_tahun)->count();

        // ** KELAS XII-TKJ-B ** //
        $xii_tkjb_dpt = HasilHitunganModel::where('kelas', 'XII-TKJ-A')->whereRaw('probabilitas_dapat > probabilitas_tdkdapat')->whereYear('tgl_daftar', $request_tahun)->count();
        $xii_tkjb_tdkdpt = HasilHitunganModel::where('kelas', 'XII-TKJ-A')->whereRaw('probabilitas_tdkdapat > probabilitas_dapat')->whereYear('tgl_daftar', $request_tahun)->count();

        // ** KELAS XII-TKJ-C ** //
        $xii_tkjc_dpt = HasilHitunganModel::where('kelas', 'XII-TKJ-C')->whereRaw('probabilitas_dapat > probabilitas_tdkdapat')->whereYear('tgl_daftar', $request_tahun)->count();
        $xii_tkjc_tdkdpt = HasilHitunganModel::where('kelas', 'XII-TKJ-C')->whereRaw('probabilitas_tdkdapat > probabilitas_dapat')->whereYear('tgl_daftar', $request_tahun)->count();

        // ** KELAS X-TKR-A ** //
        $x_tkra_dpt = HasilHitunganModel::where('kelas', 'X-TKR-A')->whereRaw('probabilitas_dapat > probabilitas_tdkdapat')->whereYear('tgl_daftar', $request_tahun)->count();
        $x_tkra_tdkdpt = HasilHitunganModel::where('kelas', 'X-TKR-A')->whereRaw('probabilitas_tdkdapat > probabilitas_dapat')->whereYear('tgl_daftar', $request_tahun)->count();

        // ** KELAS X-TKR-B ** //
        $x_tkrb_dpt = HasilHitunganModel::where('kelas', 'X-TKR-B')->whereRaw('probabilitas_dapat > probabilitas_tdkdapat')->whereYear('tgl_daftar', $request_tahun)->count();
        $x_tkrb_tdkdpt = HasilHitunganModel::where('kelas', 'X-TKR-B')->whereRaw('probabilitas_tdkdapat > probabilitas_dapat')->whereYear('tgl_daftar', $request_tahun)->count();

        // ** KELAS X-TKR-C ** //
        $x_tkrc_dpt = HasilHitunganModel::where('kelas', 'X-TKR-C')->whereRaw('probabilitas_dapat > probabilitas_tdkdapat')->whereYear('tgl_daftar', $request_tahun)->count();
        $x_tkrc_tdkdpt = HasilHitunganModel::where('kelas', 'X-TKR-C')->whereRaw('probabilitas_tdkdapat > probabilitas_dapat')->whereYear('tgl_daftar', $request_tahun)->count();

        // ** KELAS XI-TKR-A ** //
        $xi_tkra_dpt = HasilHitunganModel::where('kelas', 'XI-TKR-A')->whereRaw('probabilitas_dapat > probabilitas_tdkdapat')->whereYear('tgl_daftar', $request_tahun)->count();
        $xi_tkra_tdkdpt = HasilHitunganModel::where('kelas', 'XI-TKR-A')->whereRaw('probabilitas_tdkdapat > probabilitas_dapat')->whereYear('tgl_daftar', $request_tahun)->count();

        // ** KELAS XI-TKR-B ** //
        $xi_tkrb_dpt = HasilHitunganModel::where('kelas', 'XI-TKR-B')->whereRaw('probabilitas_dapat > probabilitas_tdkdapat')->whereYear('tgl_daftar', $request_tahun)->count();
        $xi_tkrb_tdkdpt = HasilHitunganModel::where('kelas', 'XI-TKR-B')->whereRaw('probabilitas_tdkdapat > probabilitas_dapat')->whereYear('tgl_daftar', $request_tahun)->count();

        // ** KELAS XI-TKR-C ** //
        $xi_tkrc_dpt = HasilHitunganModel::where('kelas', 'XI-TKR-C')->whereRaw('probabilitas_dapat > probabilitas_tdkdapat')->whereYear('tgl_daftar', $request_tahun)->count();
        $xi_tkrc_tdkdpt = HasilHitunganModel::where('kelas', 'XI-TKR-C')->whereRaw('probabilitas_tdkdapat > probabilitas_dapat')->whereYear('tgl_daftar', $request_tahun)->count();

        // ** KELAS XII-TKR-A ** //
        $xii_tkra_dpt = HasilHitunganModel::where('kelas', 'XII-TKR-A')->whereRaw('probabilitas_dapat > probabilitas_tdkdapat')->whereYear('tgl_daftar', $request_tahun)->count();
        $xii_tkra_tdkdpt = HasilHitunganModel::where('kelas', 'XII-TKR-A')->whereRaw('probabilitas_tdkdapat > probabilitas_dapat')->whereYear('tgl_daftar', $request_tahun)->count();

        // ** KELAS XII-TKR-B ** //
        $xii_tkrb_dpt = HasilHitunganModel::where('kelas', 'XII-TKR-B')->whereRaw('probabilitas_dapat > probabilitas_tdkdapat')->whereYear('tgl_daftar', $request_tahun)->count();
        $xii_tkrb_tdkdpt = HasilHitunganModel::where('kelas', 'XII-TKR-B')->whereRaw('probabilitas_tdkdapat > probabilitas_dapat')->whereYear('tgl_daftar', $request_tahun)->count();

        // ** KELAS XII-TKR-C ** //
        $xii_tkrc_dpt = HasilHitunganModel::where('kelas', 'XII-TKR-C')->whereRaw('probabilitas_dapat > probabilitas_tdkdapat')->whereYear('tgl_daftar', $request_tahun)->count();
        $xii_tkrc_tdkdpt = HasilHitunganModel::where('kelas', 'XII-TKR-C')->whereRaw('probabilitas_tdkdapat > probabilitas_dapat')->whereYear('tgl_daftar', $request_tahun)->count();


        return view(
            'admin.analisa_data.data_bansos.status_penerimaan_bansos.result',
            compact(
                'data',
                'request_tahun',
                'x_tkja_dpt',
                'x_tkja_tdkdpt',
                'siswa_dpt_2020',
                'siswa_dpt_2021',
                'siswa_dpt_2022',
                'siswa_dpt_2023',
                'siswa_dpt_2024',
                'siswa_dpt_2025',
                'siswa_tdkdpt_2020',
                'siswa_tdkdpt_2021',
                'siswa_tdkdpt_2022',
                'siswa_tdkdpt_2023',
                'siswa_tdkdpt_2024',
                'siswa_tdkdpt_2025',
                'x_tkjb_dpt',
                'x_tkjb_tdkdpt',
                'x_tkjc_dpt',
                'x_tkjc_tdkdpt',
                'x_tkjd_dpt',
                'x_tkjd_tdkdpt',
                'xi_tkja_dpt',
                'xi_tkja_tdkdpt',
                'xi_tkjb_dpt',
                'xi_tkjb_tdkdpt',
                'xi_tkjc_dpt',
                'xi_tkjc_tdkdpt',
                'xii_tkja_dpt',
                'xii_tkja_tdkdpt',
                'xii_tkjb_dpt',
                'xii_tkjb_tdkdpt',
                'xii_tkjc_dpt',
                'xii_tkjc_tdkdpt',
                'x_tkra_dpt',
                'x_tkra_tdkdpt',
                'x_tkrb_dpt',
                'x_tkrb_tdkdpt',
                'x_tkrc_dpt',
                'x_tkrc_tdkdpt',
                'xi_tkra_dpt',
                'xi_tkra_tdkdpt',
                'xi_tkrb_dpt',
                'xi_tkrb_tdkdpt',
                'xi_tkrc_dpt',
                'xi_tkrc_tdkdpt',
                'xii_tkra_dpt',
                'xii_tkra_tdkdpt',
                'xii_tkrb_dpt',
                'xii_tkrb_tdkdpt',
                'xii_tkrc_dpt',
                'xii_tkrc_tdkdpt'
            )
        );
    }
    public function status_kelengkapan_ortu()
    {
        // ** SISWA YANG LENGKAP ** //
        $siswa_lengkap_2020 = HasilHitunganModel::where('status_kelengkapan_ortu', '=', 'lengkap')->whereYear('tgl_daftar', '2020')->count();
        // dd($siswa_lengkap_2020);
        $siswa_lengkap_2021 = HasilHitunganModel::where('status_kelengkapan_ortu', '=', 'lengkap')->whereYear('tgl_daftar', '2021')->count();
        $siswa_lengkap_2022 = HasilHitunganModel::where('status_kelengkapan_ortu', '=', 'lengkap')->whereYear('tgl_daftar', '2022')->count();
        $siswa_lengkap_2023 = HasilHitunganModel::where('status_kelengkapan_ortu', '=', 'lengkap')->whereYear('tgl_daftar', '2023')->count();
        $siswa_lengkap_2024 = HasilHitunganModel::where('status_kelengkapan_ortu', '=', 'lengkap')->whereYear('tgl_daftar', '2024')->count();
        $siswa_lengkap_2025 = HasilHitunganModel::where('status_kelengkapan_ortu', '=', 'lengkap')->whereYear('tgl_daftar', '2025')->count();


        // ! TIDAK DAPAT //
        $siswa_tdklengkap_2020 = DB::table('tbl_hasil_hitungan')->where('status_kelengkapan_ortu', '=', 'Tidak Lengkap')->whereYear('tgl_daftar', '2020')->count();
        // dd($siswa_tdklengkap_2020);
        $siswa_tdklengkap_2021 = DB::table('tbl_hasil_hitungan')->where('status_kelengkapan_ortu', '=', 'Tidak Lengkap')->whereYear('tgl_daftar', '2021')->count();
        $siswa_tdklengkap_2022 = DB::table('tbl_hasil_hitungan')->where('status_kelengkapan_ortu', '=', 'Tidak Lengkap')->whereYear('tgl_daftar', '2022')->count();
        $siswa_tdklengkap_2023 = DB::table('tbl_hasil_hitungan')->where('status_kelengkapan_ortu', '=', 'Tidak Lengkap')->whereYear('tgl_daftar', '2023')->count();
        $siswa_tdklengkap_2024 = DB::table('tbl_hasil_hitungan')->where('status_kelengkapan_ortu', '=', 'Tidak Lengkap')->whereYear('tgl_daftar', '2024')->count();
        $siswa_tdklengkap_2025 = DB::table('tbl_hasil_hitungan')->where('status_kelengkapan_ortu', '=', 'Tidak Lengkap')->whereYear('tgl_daftar', '2025')->count();

        return view(
            'admin.analisa_data.data_bansos.status_kelengkapan_ortu.index',
            compact(
                'siswa_lengkap_2020',
                'siswa_lengkap_2021',
                'siswa_lengkap_2022',
                'siswa_lengkap_2023',
                'siswa_lengkap_2024',
                'siswa_lengkap_2025',
                'siswa_tdklengkap_2020',
                'siswa_tdklengkap_2021',
                'siswa_tdklengkap_2022',
                'siswa_tdklengkap_2023',
                'siswa_tdklengkap_2024',
                'siswa_tdklengkap_2025'
            )
        );
    }

    public function post_status_kelengkapan_ortu(Request $request)
    {
        $request_tahun = $request->tahun;

        // ** SISWA YANG LENGKAP ** //
        $siswa_lengkap_2020 = HasilHitunganModel::where('status_kelengkapan_ortu', '=', 'lengkap')->whereYear('tgl_daftar', '2020')->count();
        // dd($siswa_lengkap_2020);
        $siswa_lengkap_2021 = HasilHitunganModel::where('status_kelengkapan_ortu', '=', 'lengkap')->whereYear('tgl_daftar', '2021')->count();
        $siswa_lengkap_2022 = HasilHitunganModel::where('status_kelengkapan_ortu', '=', 'lengkap')->whereYear('tgl_daftar', '2022')->count();
        $siswa_lengkap_2023 = HasilHitunganModel::where('status_kelengkapan_ortu', '=', 'lengkap')->whereYear('tgl_daftar', '2023')->count();
        $siswa_lengkap_2024 = HasilHitunganModel::where('status_kelengkapan_ortu', '=', 'lengkap')->whereYear('tgl_daftar', '2024')->count();
        $siswa_lengkap_2025 = HasilHitunganModel::where('status_kelengkapan_ortu', '=', 'lengkap')->whereYear('tgl_daftar', '2025')->count();


        // ! TIDAK DAPAT //
        $siswa_tdklengkap_2020 = DB::table('tbl_hasil_hitungan')->where('status_kelengkapan_ortu', '=', 'Tidak Lengkap')->whereYear('tgl_daftar', '2020')->count();
        // dd($siswa_tdklengkap_2020);
        $siswa_tdklengkap_2021 = DB::table('tbl_hasil_hitungan')->where('status_kelengkapan_ortu', '=', 'Tidak Lengkap')->whereYear('tgl_daftar', '2021')->count();
        $siswa_tdklengkap_2022 = DB::table('tbl_hasil_hitungan')->where('status_kelengkapan_ortu', '=', 'Tidak Lengkap')->whereYear('tgl_daftar', '2022')->count();
        $siswa_tdklengkap_2023 = DB::table('tbl_hasil_hitungan')->where('status_kelengkapan_ortu', '=', 'Tidak Lengkap')->whereYear('tgl_daftar', '2023')->count();
        $siswa_tdklengkap_2024 = DB::table('tbl_hasil_hitungan')->where('status_kelengkapan_ortu', '=', 'Tidak Lengkap')->whereYear('tgl_daftar', '2024')->count();
        $siswa_tdklengkap_2025 = DB::table('tbl_hasil_hitungan')->where('status_kelengkapan_ortu', '=', 'Tidak Lengkap')->whereYear('tgl_daftar', '2025')->count();

        // ? X-TKJ-A LENGKAP TIDAK LENGKAP ? //
        $x_tkja_lengkap = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'X-TKJ-A')->whereYear('tgl_daftar', $request_tahun)->count();
        $x_tkja_tdklengkap = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'X-TKJ-A')->whereYear('tgl_daftar', $request_tahun)->count();

        // ? X-TKJ-B LENGKAP TIDAK LENGKAP ? //
        $x_tkjb_lengkap = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'X-TKJ-B')->whereYear('tgl_daftar', $request_tahun)->count();
        $x_tkjb_tdklengkap = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'X-TKJ-B')->whereYear('tgl_daftar', $request_tahun)->count();

        // ? X-TKJ-C LENGKAP TIDAK LENGKAP ? //
        $x_tkjc_lengkap = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'X-TKJ-C')->whereYear('tgl_daftar', $request_tahun)->count();
        $x_tkjc_tdklengkap = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'X-TKJ-C')->whereYear('tgl_daftar', $request_tahun)->count();

        // ? X-TKJ-D LENGKAP TIDAK LENGKAP ? //
        $x_tkjd_lengkap = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'X-TKJ-D')->whereYear('tgl_daftar', $request_tahun)->count();
        $x_tkjd_tdklengkap = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'X-TKJ-D')->whereYear('tgl_daftar', $request_tahun)->count();

        // ? XI-TKJ-A LENGKAP TIDAK LENGKAP ? //
        $xi_tkja_lengkap = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XI-TKJ-A')->whereYear('tgl_daftar', $request_tahun)->count();
        $xi_tkja_tdklengkap = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XI-TKJ-A')->whereYear('tgl_daftar', $request_tahun)->count();

        // ? XI-TKJ-B LENGKAP TIDAK LENGKAP ? //
        $xi_tkjb_lengkap = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XI-TKJ-B')->whereYear('tgl_daftar', $request_tahun)->count();
        $xi_tkjb_tdklengkap = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XI-TKJ-B')->whereYear('tgl_daftar', $request_tahun)->count();

        // ? XI-TKJ-C LENGKAP TIDAK LENGKAP ? //
        $xi_tkjc_lengkap = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XI-TKJ-C')->whereYear('tgl_daftar', $request_tahun)->count();
        $xi_tkjc_tdklengkap = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XI-TKJ-C')->whereYear('tgl_daftar', $request_tahun)->count();

        // ? XII-TKJ-A LENGKAP TIDAK LENGKAP ? //
        $xii_tkja_lengkap = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XII-TKJ-A')->whereYear('tgl_daftar', $request_tahun)->count();
        $xii_tkja_tdklengkap = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XII-TKJ-A')->whereYear('tgl_daftar', $request_tahun)->count();

        // ? xii-tkj-b LENGKAP TIDAK LENGKAP ? //
        $xii_tkjb_lengkap = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XII-TKJ-B')->whereYear('tgl_daftar', $request_tahun)->count();
        $xii_tkjb_tdklengkap = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XII-TKJ-B')->whereYear('tgl_daftar', $request_tahun)->count();

        // ? xii-tkj-C LENGKAP TIDAK LENGKAP ? //
        $xii_tkjc_lengkap = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XII-TKJ-C')->whereYear('tgl_daftar', $request_tahun)->count();
        $xii_tkjc_tdklengkap = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XII-TKJ-C')->whereYear('tgl_daftar', $request_tahun)->count();

        // ? X-TKR-A LENGKAP TIDAK LENGKAP ? //
        $x_tkra_lengkap = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'X-TKR-A')->whereYear('tgl_daftar', $request_tahun)->count();
        $x_tkra_tdklengkap = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'X-TKR-A')->whereYear('tgl_daftar', $request_tahun)->count();

        // ? X-TKR-B LENGKAP TIDAK LENGKAP ? //
        $x_tkrb_lengkap = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'X-TKR-B')->whereYear('tgl_daftar', $request_tahun)->count();
        $x_tkrb_tdklengkap = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'X-TKR-B')->whereYear('tgl_daftar', $request_tahun)->count();

        // ? X-TKR-C LENGKAP TIDAK LENGKAP ? //
        $x_tkrc_lengkap = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'X-TKR-C')->whereYear('tgl_daftar', $request_tahun)->count();
        $x_tkrc_tdklengkap = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'X-TKR-C')->whereYear('tgl_daftar', $request_tahun)->count();

        // ? XI-TKR-A LENGKAP TIDAK LENGKAP ? //
        $xi_tkra_lengkap = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XI-TKR-A')->whereYear('tgl_daftar', $request_tahun)->count();
        $xi_tkra_tdklengkap = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XI-TKR-A')->whereYear('tgl_daftar', $request_tahun)->count();

        // ? XI-TKR-B LENGKAP TIDAK LENGKAP ? //
        $xi_tkrb_lengkap = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XI-TKR-B')->whereYear('tgl_daftar', $request_tahun)->count();
        $xi_tkrb_tdklengkap = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XI-TKR-B')->whereYear('tgl_daftar', $request_tahun)->count();

        // ? XI-TKR-C LENGKAP TIDAK LENGKAP ? //
        $xi_tkrc_lengkap = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XI-TKR-C')->whereYear('tgl_daftar', $request_tahun)->count();
        $xi_tkrc_tdklengkap = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XI-TKR-C')->whereYear('tgl_daftar', $request_tahun)->count();

        // ? XII-TKR-A LENGKAP TIDAK LENGKAP ? //
        $xii_tkra_lengkap = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XII-TKR-A')->whereYear('tgl_daftar', $request_tahun)->count();
        $xii_tkra_tdklengkap = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XII-TKR-A')->whereYear('tgl_daftar', $request_tahun)->count();

        // ? XII-TKR-B LENGKAP TIDAK LENGKAP ? //
        $xii_tkrb_lengkap = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XII-TKR-B')->whereYear('tgl_daftar', $request_tahun)->count();
        $xii_tkrb_tdklengkap = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XII-TKR-B')->whereYear('tgl_daftar', $request_tahun)->count();

        // ? XII-TKR-C LENGKAP TIDAK LENGKAP ? //
        $xii_tkrc_lengkap = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XII-TKR-C')->whereYear('tgl_daftar', $request_tahun)->count();
        $xii_tkrc_tdklengkap = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XII-TKR-C')->whereYear('tgl_daftar', $request_tahun)->count();

        return view(
            'admin.analisa_data.data_bansos.status_kelengkapan_ortu.result',
            compact(
                'request_tahun',
                'siswa_lengkap_2020',
                'siswa_lengkap_2021',
                'siswa_lengkap_2022',
                'siswa_lengkap_2023',
                'siswa_lengkap_2024',
                'siswa_lengkap_2025',
                'siswa_tdklengkap_2020',
                'siswa_tdklengkap_2021',
                'siswa_tdklengkap_2022',
                'siswa_tdklengkap_2023',
                'siswa_tdklengkap_2024',
                'siswa_tdklengkap_2025',
                'x_tkja_lengkap',
                'x_tkja_tdklengkap',
                'x_tkjb_lengkap',
                'x_tkjb_tdklengkap',
                'x_tkjc_lengkap',
                'x_tkjc_tdklengkap',
                'x_tkjd_lengkap',
                'x_tkjd_tdklengkap',
                'xi_tkja_lengkap',
                'xi_tkja_tdklengkap',
                'xi_tkjb_lengkap',
                'xi_tkjb_tdklengkap',
                'xi_tkjc_lengkap',
                'xi_tkjc_tdklengkap',
                'xii_tkja_lengkap',
                'xii_tkja_tdklengkap',
                'xii_tkjb_lengkap',
                'xii_tkjb_tdklengkap',
                'xii_tkjc_lengkap',
                'xii_tkjc_tdklengkap',
                'x_tkra_lengkap',
                'x_tkra_tdklengkap',
                'x_tkrb_lengkap',
                'x_tkrb_tdklengkap',
                'x_tkrc_lengkap',
                'x_tkrc_tdklengkap',
                'xi_tkra_lengkap',
                'xi_tkra_tdklengkap',
                'xi_tkrb_lengkap',
                'xi_tkrb_tdklengkap',
                'xi_tkrc_lengkap',
                'xi_tkrc_tdklengkap',
                'xii_tkra_lengkap',
                'xii_tkra_tdklengkap',
                'xii_tkrb_lengkap',
                'xii_tkrb_tdklengkap',
                'xii_tkrc_lengkap',
                'xii_tkrc_tdklengkap'
            )
        );
    }

    public function status_pekerjaan_ortu()
    {
        // ! DATA 2020 //
        $karyawanswasta_siswa_2020 = HasilHitunganModel::where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2020')->count();
        $pegawainegeri_siswa_2020 = HasilHitunganModel::where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2020')->count();
        // dd($pegawainegeri_siswa_2020);
        $pekerja_tdk_tetap_siswa_2020 = HasilHitunganModel::where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2020')->count();
        $usaha_siswa_2020 = HasilHitunganModel::where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2020')->count();

        // ! DATA 2021 //
        $karyawanswasta_siswa_2021 = HasilHitunganModel::where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2021')->count();
        $pegawainegeri_siswa_2021 = HasilHitunganModel::where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2021')->count();
        $pekerja_tdk_tetap_siswa_2021 = HasilHitunganModel::where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2021')->count();
        $usaha_siswa_2021 = HasilHitunganModel::where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2021')->count();

        // ! DATA 2022 //
        $karyawanswasta_siswa_2022 = HasilHitunganModel::where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2022')->count();
        $pegawainegeri_siswa_2022 = HasilHitunganModel::where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2022')->count();
        $pekerja_tdk_tetap_siswa_2022 = HasilHitunganModel::where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2022')->count();
        $usaha_siswa_2022 = HasilHitunganModel::where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2022')->count();

        // ! DATA 2023 //
        $karyawanswasta_siswa_2023 = HasilHitunganModel::where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2023')->count();
        $pegawainegeri_siswa_2023 = HasilHitunganModel::where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2023')->count();
        $pekerja_tdk_tetap_siswa_2023 = HasilHitunganModel::where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2023')->count();
        $usaha_siswa_2023 = HasilHitunganModel::where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2023')->count();

        // ! DATA 2024 //
        $karyawanswasta_siswa_2024 = HasilHitunganModel::where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2024')->count();
        $pegawainegeri_siswa_2024 = HasilHitunganModel::where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2024')->count();
        $pekerja_tdk_tetap_siswa_2024 = HasilHitunganModel::where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2024')->count();
        $usaha_siswa_2024 = HasilHitunganModel::where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2024')->count();

        // ! DATA 2024 //
        $karyawanswasta_siswa_2025 = HasilHitunganModel::where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2025')->count();
        $pegawainegeri_siswa_2025 = HasilHitunganModel::where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2025')->count();
        $pekerja_tdk_tetap_siswa_2025 = HasilHitunganModel::where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2025')->count();
        $usaha_siswa_2025 = HasilHitunganModel::where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2025')->count();


        return view(
            'admin.analisa_data.data_bansos.status_pekerjaan_ortu.index',
            compact(
                'karyawanswasta_siswa_2020',
                'karyawanswasta_siswa_2021',
                'karyawanswasta_siswa_2022',
                'karyawanswasta_siswa_2023',
                'karyawanswasta_siswa_2024',
                'karyawanswasta_siswa_2025',
                'pegawainegeri_siswa_2020',
                'pegawainegeri_siswa_2021',
                'pegawainegeri_siswa_2022',
                'pegawainegeri_siswa_2023',
                'pegawainegeri_siswa_2024',
                'pegawainegeri_siswa_2025',
                'pekerja_tdk_tetap_siswa_2020',
                'pekerja_tdk_tetap_siswa_2021',
                'pekerja_tdk_tetap_siswa_2022',
                'pekerja_tdk_tetap_siswa_2023',
                'pekerja_tdk_tetap_siswa_2024',
                'pekerja_tdk_tetap_siswa_2025',
                'usaha_siswa_2020',
                'usaha_siswa_2021',
                'usaha_siswa_2022',
                'usaha_siswa_2023',
                'usaha_siswa_2024',
                'usaha_siswa_2025'
            )
        );
    }

    public function post_status_pekerjaan_ortu(Request $request)
    {
        $request_tahun = $request->tahun;

        // ! X-TKJ-A //
        $karyawanswasta_xtkja = HasilHitunganModel::where('status_pekerjaan_wali', 'Karyawan Swasta')->where('kelas', 'X-TKJ-A')->whereYear('tgl_daftar', $request_tahun)->count();
        $pegawainegeri_xtkja = HasilHitunganModel::where('status_pekerjaan_wali', 'Pegawai Negri')->where('kelas', 'X-TKJ-A')->whereYear('tgl_daftar', $request_tahun)->count();
        $pekerja_tdk_tetap_xtkja = HasilHitunganModel::where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->where('kelas', 'X-TKJ-A')->whereYear('tgl_daftar', $request_tahun)->count();
        $usaha_xtkja = HasilHitunganModel::where('status_pekerjaan_wali', 'Usaha')->where('kelas', 'X-TKJ-A')->whereYear('tgl_daftar', $request_tahun)->count();

        // ! X-TKJ-B //
        $karyawanswasta_xtkjb = HasilHitunganModel::where('status_pekerjaan_wali', 'Karyawan Swasta')->where('kelas', 'X-TKJ-B')->whereYear('tgl_daftar', $request_tahun)->count();
        $pegawainegeri_xtkjb = HasilHitunganModel::where('status_pekerjaan_wali', 'Pegawai Negri')->where('kelas', 'X-TKJ-B')->whereYear('tgl_daftar', $request_tahun)->count();
        $pekerja_tdk_tetap_xtkjb = HasilHitunganModel::where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->where('kelas', 'X-TKJ-B')->whereYear('tgl_daftar', $request_tahun)->count();
        $usaha_xtkjb = HasilHitunganModel::where('status_pekerjaan_wali', 'Usaha')->where('kelas', 'X-TKJ-B')->whereYear('tgl_daftar', $request_tahun)->count();

        // ! X-TKJ-C //
        $karyawanswasta_xtkjc = HasilHitunganModel::where('status_pekerjaan_wali', 'Karyawan Swasta')->where('kelas', 'X-TKJ-C')->whereYear('tgl_daftar', $request_tahun)->count();
        $pegawainegeri_xtkjc = HasilHitunganModel::where('status_pekerjaan_wali', 'Pegawai Negri')->where('kelas', 'X-TKJ-C')->whereYear('tgl_daftar', $request_tahun)->count();
        $pekerja_tdk_tetap_xtkjc = HasilHitunganModel::where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->where('kelas', 'X-TKJ-C')->whereYear('tgl_daftar', $request_tahun)->count();
        $usaha_xtkjc = HasilHitunganModel::where('status_pekerjaan_wali', 'Usaha')->where('kelas', 'X-TKJ-C')->whereYear('tgl_daftar', $request_tahun)->count();

        // ! X-TKJ-D //
        $karyawanswasta_xtkjd = HasilHitunganModel::where('status_pekerjaan_wali', 'Karyawan Swasta')->where('kelas', 'X-TKJ-D')->whereYear('tgl_daftar', $request_tahun)->count();
        $pegawainegeri_xtkjd = HasilHitunganModel::where('status_pekerjaan_wali', 'Pegawai Negri')->where('kelas', 'X-TKJ-D')->whereYear('tgl_daftar', $request_tahun)->count();
        $pekerja_tdk_tetap_xtkjd = HasilHitunganModel::where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->where('kelas', 'X-TKJ-D')->whereYear('tgl_daftar', $request_tahun)->count();
        $usaha_xtkjd = HasilHitunganModel::where('status_pekerjaan_wali', 'Usaha')->where('kelas', 'X-TKJ-D')->whereYear('tgl_daftar', $request_tahun)->count();

        // ! XI-TKJ-A //
        $karyawanswasta_xitkja = HasilHitunganModel::where('status_pekerjaan_wali', 'Karyawan Swasta')->where('kelas', 'XI-TKJ-A')->whereYear('tgl_daftar', $request_tahun)->count();
        $pegawainegeri_xitkja = HasilHitunganModel::where('status_pekerjaan_wali', 'Pegawai Negri')->where('kelas', 'XI-TKJ-A')->whereYear('tgl_daftar', $request_tahun)->count();
        $pekerja_tdk_tetap_xitkja = HasilHitunganModel::where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->where('kelas', 'XI-TKJ-A')->whereYear('tgl_daftar', $request_tahun)->count();
        $usaha_xitkja = HasilHitunganModel::where('status_pekerjaan_wali', 'Usaha')->where('kelas', 'XI-TKJ-A')->whereYear('tgl_daftar', $request_tahun)->count();

        // ! XI-TKJ-B //
        $karyawanswasta_xitkjb = HasilHitunganModel::where('status_pekerjaan_wali', 'Karyawan Swasta')->where('kelas', 'XI-TKJ-B')->whereYear('tgl_daftar', $request_tahun)->count();
        $pegawainegeri_xitkjb = HasilHitunganModel::where('status_pekerjaan_wali', 'Pegawai Negri')->where('kelas', 'XI-TKJ-B')->whereYear('tgl_daftar', $request_tahun)->count();
        $pekerja_tdk_tetap_xitkjb = HasilHitunganModel::where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->where('kelas', 'XI-TKJ-B')->whereYear('tgl_daftar', $request_tahun)->count();
        $usaha_xitkjb = HasilHitunganModel::where('status_pekerjaan_wali', 'Usaha')->where('kelas', 'XI-TKJ-B')->whereYear('tgl_daftar', $request_tahun)->count();

        // ! XI-TKJ-C //
        $karyawanswasta_xitkjc = HasilHitunganModel::where('status_pekerjaan_wali', 'Karyawan Swasta')->where('kelas', 'XI-TKJ-C')->whereYear('tgl_daftar', $request_tahun)->count();
        $pegawainegeri_xitkjc = HasilHitunganModel::where('status_pekerjaan_wali', 'Pegawai Negri')->where('kelas', 'XI-TKJ-C')->whereYear('tgl_daftar', $request_tahun)->count();
        $pekerja_tdk_tetap_xitkjc = HasilHitunganModel::where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->where('kelas', 'XI-TKJ-C')->whereYear('tgl_daftar', $request_tahun)->count();
        $usaha_xitkjc = HasilHitunganModel::where('status_pekerjaan_wali', 'Usaha')->where('kelas', 'XI-TKJ-C')->whereYear('tgl_daftar', $request_tahun)->count();

        // ! XII-TKJ-A //
        $karyawanswasta_xiitkja = HasilHitunganModel::where('status_pekerjaan_wali', 'Karyawan Swasta')->where('kelas', 'XII-TKJ-A')->whereYear('tgl_daftar', $request_tahun)->count();
        $pegawainegeri_xiitkja = HasilHitunganModel::where('status_pekerjaan_wali', 'Pegawai Negri')->where('kelas', 'XII-TKJ-A')->whereYear('tgl_daftar', $request_tahun)->count();
        $pekerja_tdk_tetap_xiitkja = HasilHitunganModel::where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->where('kelas', 'XII-TKJ-A')->whereYear('tgl_daftar', $request_tahun)->count();
        $usaha_xiitkja = HasilHitunganModel::where('status_pekerjaan_wali', 'Usaha')->where('kelas', 'XII-TKJ-A')->whereYear('tgl_daftar', $request_tahun)->count();

        // ! XII-TKJ-B //
        $karyawanswasta_xiitkjb = HasilHitunganModel::where('status_pekerjaan_wali', 'Karyawan Swasta')->where('kelas', 'XII-TKJ-B')->whereYear('tgl_daftar', $request_tahun)->count();
        $pegawainegeri_xiitkjb = HasilHitunganModel::where('status_pekerjaan_wali', 'Pegawai Negri')->where('kelas', 'XII-TKJ-B')->whereYear('tgl_daftar', $request_tahun)->count();
        $pekerja_tdk_tetap_xiitkjb = HasilHitunganModel::where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->where('kelas', 'XII-TKJ-B')->whereYear('tgl_daftar', $request_tahun)->count();
        $usaha_xiitkjb = HasilHitunganModel::where('status_pekerjaan_wali', 'Usaha')->where('kelas', 'XII-TKJ-B')->whereYear('tgl_daftar', $request_tahun)->count();

        // ! XII-TKJ-c //
        $karyawanswasta_xiitkjc = HasilHitunganModel::where('status_pekerjaan_wali', 'Karyawan Swasta')->where('kelas', 'XII-TKJ-C')->whereYear('tgl_daftar', $request_tahun)->count();
        $pegawainegeri_xiitkjc = HasilHitunganModel::where('status_pekerjaan_wali', 'Pegawai Negri')->where('kelas', 'XII-TKJ-C')->whereYear('tgl_daftar', $request_tahun)->count();
        $pekerja_tdk_tetap_xiitkjc = HasilHitunganModel::where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->where('kelas', 'XII-TKJ-C')->whereYear('tgl_daftar', $request_tahun)->count();
        $usaha_xiitkjc = HasilHitunganModel::where('status_pekerjaan_wali', 'Usaha')->where('kelas', 'XII-TKJ-C')->whereYear('tgl_daftar', $request_tahun)->count();

        // ! X-TKJ-A //
        $karyawanswasta_xtkra = HasilHitunganModel::where('status_pekerjaan_wali', 'Karyawan Swasta')->where('kelas', 'X-tkr-A')->whereYear('tgl_daftar', $request_tahun)->count();
        $pegawainegeri_xtkra = HasilHitunganModel::where('status_pekerjaan_wali', 'Pegawai Negri')->where('kelas', 'X-tkr-A')->whereYear('tgl_daftar', $request_tahun)->count();
        $pekerja_tdk_tetap_xtkra = HasilHitunganModel::where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->where('kelas', 'X-tkr-A')->whereYear('tgl_daftar', $request_tahun)->count();
        $usaha_xtkra = HasilHitunganModel::where('status_pekerjaan_wali', 'Usaha')->where('kelas', 'X-tkr-A')->whereYear('tgl_daftar', $request_tahun)->count();

        // ! X-tkr-B //
        $karyawanswasta_xtkrb = HasilHitunganModel::where('status_pekerjaan_wali', 'Karyawan Swasta')->where('kelas', 'X-tkr-B')->whereYear('tgl_daftar', $request_tahun)->count();
        $pegawainegeri_xtkrb = HasilHitunganModel::where('status_pekerjaan_wali', 'Pegawai Negri')->where('kelas', 'X-tkr-B')->whereYear('tgl_daftar', $request_tahun)->count();
        $pekerja_tdk_tetap_xtkrb = HasilHitunganModel::where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->where('kelas', 'X-tkr-B')->whereYear('tgl_daftar', $request_tahun)->count();
        $usaha_xtkrb = HasilHitunganModel::where('status_pekerjaan_wali', 'Usaha')->where('kelas', 'X-tkr-B')->whereYear('tgl_daftar', $request_tahun)->count();

        // ! X-tkr-C //
        $karyawanswasta_xtkrc = HasilHitunganModel::where('status_pekerjaan_wali', 'Karyawan Swasta')->where('kelas', 'X-tkr-C')->whereYear('tgl_daftar', $request_tahun)->count();
        $pegawainegeri_xtkrc = HasilHitunganModel::where('status_pekerjaan_wali', 'Pegawai Negri')->where('kelas', 'X-tkr-C')->whereYear('tgl_daftar', $request_tahun)->count();
        $pekerja_tdk_tetap_xtkrc = HasilHitunganModel::where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->where('kelas', 'X-tkr-C')->whereYear('tgl_daftar', $request_tahun)->count();
        $usaha_xtkrc = HasilHitunganModel::where('status_pekerjaan_wali', 'Usaha')->where('kelas', 'X-tkr-C')->whereYear('tgl_daftar', $request_tahun)->count();

        // ! XI-tkr-A //
        $karyawanswasta_xitkra = HasilHitunganModel::where('status_pekerjaan_wali', 'Karyawan Swasta')->where('kelas', 'XI-tkr-A')->whereYear('tgl_daftar', $request_tahun)->count();
        $pegawainegeri_xitkra = HasilHitunganModel::where('status_pekerjaan_wali', 'Pegawai Negri')->where('kelas', 'XI-tkr-A')->whereYear('tgl_daftar', $request_tahun)->count();
        $pekerja_tdk_tetap_xitkra = HasilHitunganModel::where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->where('kelas', 'XI-tkr-A')->whereYear('tgl_daftar', $request_tahun)->count();
        $usaha_xitkra = HasilHitunganModel::where('status_pekerjaan_wali', 'Usaha')->where('kelas', 'XI-tkr-A')->whereYear('tgl_daftar', $request_tahun)->count();

        // ! XI-tkr-B //
        $karyawanswasta_xitkrb = HasilHitunganModel::where('status_pekerjaan_wali', 'Karyawan Swasta')->where('kelas', 'XI-tkr-B')->whereYear('tgl_daftar', $request_tahun)->count();
        $pegawainegeri_xitkrb = HasilHitunganModel::where('status_pekerjaan_wali', 'Pegawai Negri')->where('kelas', 'XI-tkr-B')->whereYear('tgl_daftar', $request_tahun)->count();
        $pekerja_tdk_tetap_xitkrb = HasilHitunganModel::where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->where('kelas', 'XI-tkr-B')->whereYear('tgl_daftar', $request_tahun)->count();
        $usaha_xitkrb = HasilHitunganModel::where('status_pekerjaan_wali', 'Usaha')->where('kelas', 'XI-tkr-B')->whereYear('tgl_daftar', $request_tahun)->count();

        // ! XI-tkr-C //
        $karyawanswasta_xitkrc = HasilHitunganModel::where('status_pekerjaan_wali', 'Karyawan Swasta')->where('kelas', 'XI-tkr-C')->whereYear('tgl_daftar', $request_tahun)->count();
        $pegawainegeri_xitkrc = HasilHitunganModel::where('status_pekerjaan_wali', 'Pegawai Negri')->where('kelas', 'XI-tkr-C')->whereYear('tgl_daftar', $request_tahun)->count();
        $pekerja_tdk_tetap_xitkrc = HasilHitunganModel::where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->where('kelas', 'XI-tkr-C')->whereYear('tgl_daftar', $request_tahun)->count();
        $usaha_xitkrc = HasilHitunganModel::where('status_pekerjaan_wali', 'Usaha')->where('kelas', 'XI-tkr-C')->whereYear('tgl_daftar', $request_tahun)->count();

        // ! XII-tkr-A //
        $karyawanswasta_xiitkra = HasilHitunganModel::where('status_pekerjaan_wali', 'Karyawan Swasta')->where('kelas', 'XII-tkr-A')->whereYear('tgl_daftar', $request_tahun)->count();
        $pegawainegeri_xiitkra = HasilHitunganModel::where('status_pekerjaan_wali', 'Pegawai Negri')->where('kelas', 'XII-tkr-A')->whereYear('tgl_daftar', $request_tahun)->count();
        $pekerja_tdk_tetap_xiitkra = HasilHitunganModel::where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->where('kelas', 'XII-tkr-A')->whereYear('tgl_daftar', $request_tahun)->count();
        $usaha_xiitkra = HasilHitunganModel::where('status_pekerjaan_wali', 'Usaha')->where('kelas', 'XII-tkr-A')->whereYear('tgl_daftar', $request_tahun)->count();

        // ! XII-tkr-B //
        $karyawanswasta_xiitkrb = HasilHitunganModel::where('status_pekerjaan_wali', 'Karyawan Swasta')->where('kelas', 'XII-tkr-B')->whereYear('tgl_daftar', $request_tahun)->count();
        $pegawainegeri_xiitkrb = HasilHitunganModel::where('status_pekerjaan_wali', 'Pegawai Negri')->where('kelas', 'XII-tkr-B')->whereYear('tgl_daftar', $request_tahun)->count();
        $pekerja_tdk_tetap_xiitkrb = HasilHitunganModel::where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->where('kelas', 'XII-tkr-B')->whereYear('tgl_daftar', $request_tahun)->count();
        $usaha_xiitkrb = HasilHitunganModel::where('status_pekerjaan_wali', 'Usaha')->where('kelas', 'XII-tkr-B')->whereYear('tgl_daftar', $request_tahun)->count();

        // ! XII-tkr-c //
        $karyawanswasta_xiitkrc = HasilHitunganModel::where('status_pekerjaan_wali', 'Karyawan Swasta')->where('kelas', 'XII-tkr-C')->whereYear('tgl_daftar', $request_tahun)->count();
        $pegawainegeri_xiitkrc = HasilHitunganModel::where('status_pekerjaan_wali', 'Pegawai Negri')->where('kelas', 'XII-tkr-C')->whereYear('tgl_daftar', $request_tahun)->count();
        $pekerja_tdk_tetap_xiitkrc = HasilHitunganModel::where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->where('kelas', 'XII-tkr-C')->whereYear('tgl_daftar', $request_tahun)->count();
        $usaha_xiitkrc = HasilHitunganModel::where('status_pekerjaan_wali', 'Usaha')->where('kelas', 'XII-tkr-C')->whereYear('tgl_daftar', $request_tahun)->count();

        // ! DATA 2020 //
        $karyawanswasta_siswa_2020 = HasilHitunganModel::where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2020')->count();
        $pegawainegeri_siswa_2020 = HasilHitunganModel::where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2020')->count();
        // dd($pegawainegeri_siswa_2020);
        $pekerja_tdk_tetap_siswa_2020 = HasilHitunganModel::where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2020')->count();
        $usaha_siswa_2020 = HasilHitunganModel::where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2020')->count();

        // ! DATA 2021 //
        $karyawanswasta_siswa_2021 = HasilHitunganModel::where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2021')->count();
        $pegawainegeri_siswa_2021 = HasilHitunganModel::where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2021')->count();
        $pekerja_tdk_tetap_siswa_2021 = HasilHitunganModel::where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2021')->count();
        $usaha_siswa_2021 = HasilHitunganModel::where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2021')->count();

        // ! DATA 2022 //
        $karyawanswasta_siswa_2022 = HasilHitunganModel::where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2022')->count();
        $pegawainegeri_siswa_2022 = HasilHitunganModel::where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2022')->count();
        $pekerja_tdk_tetap_siswa_2022 = HasilHitunganModel::where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2022')->count();
        $usaha_siswa_2022 = HasilHitunganModel::where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2022')->count();

        // ! DATA 2023 //
        $karyawanswasta_siswa_2023 = HasilHitunganModel::where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2023')->count();
        $pegawainegeri_siswa_2023 = HasilHitunganModel::where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2023')->count();
        $pekerja_tdk_tetap_siswa_2023 = HasilHitunganModel::where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2023')->count();
        $usaha_siswa_2023 = HasilHitunganModel::where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2023')->count();

        // ! DATA 2024 //
        $karyawanswasta_siswa_2024 = HasilHitunganModel::where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2024')->count();
        $pegawainegeri_siswa_2024 = HasilHitunganModel::where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2024')->count();
        $pekerja_tdk_tetap_siswa_2024 = HasilHitunganModel::where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2024')->count();
        $usaha_siswa_2024 = HasilHitunganModel::where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2024')->count();

        // ! DATA 2024 //
        $karyawanswasta_siswa_2025 = HasilHitunganModel::where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2025')->count();
        $pegawainegeri_siswa_2025 = HasilHitunganModel::where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2025')->count();
        $pekerja_tdk_tetap_siswa_2025 = HasilHitunganModel::where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2025')->count();
        $usaha_siswa_2025 = HasilHitunganModel::where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2025')->count();


        return view(
            'admin.analisa_data.data_bansos.status_pekerjaan_ortu.result',
            compact(
                'request_tahun',
                'karyawanswasta_xtkja',
                'pegawainegeri_xtkja',
                'pekerja_tdk_tetap_xtkja',
                'usaha_xtkja',
                'karyawanswasta_xtkjb',
                'pegawainegeri_xtkjb',
                'pekerja_tdk_tetap_xtkjb',
                'usaha_xtkjb',
                'karyawanswasta_xtkjc',
                'pegawainegeri_xtkjc',
                'pekerja_tdk_tetap_xtkjc',
                'usaha_xtkjc',
                'karyawanswasta_xtkjd',
                'pegawainegeri_xtkjd',
                'pekerja_tdk_tetap_xtkjd',
                'usaha_xtkjd',
                'karyawanswasta_xitkja',
                'pegawainegeri_xitkja',
                'pekerja_tdk_tetap_xitkja',
                'usaha_xitkja',
                'karyawanswasta_xitkjb',
                'pegawainegeri_xitkjb',
                'pekerja_tdk_tetap_xitkjb',
                'usaha_xitkjb',
                'karyawanswasta_xitkjc',
                'pegawainegeri_xitkjc',
                'pekerja_tdk_tetap_xitkjc',
                'usaha_xitkjc',
                'karyawanswasta_xiitkja',
                'pegawainegeri_xiitkja',
                'pekerja_tdk_tetap_xiitkja',
                'usaha_xiitkja',
                'karyawanswasta_xiitkjb',
                'pegawainegeri_xiitkjb',
                'pekerja_tdk_tetap_xiitkjb',
                'usaha_xiitkjb',
                'karyawanswasta_xiitkjc',
                'pegawainegeri_xiitkjc',
                'pekerja_tdk_tetap_xiitkjc',
                'usaha_xiitkjc',
                'karyawanswasta_xtkra',
                'pegawainegeri_xtkra',
                'pekerja_tdk_tetap_xtkra',
                'usaha_xtkra',
                'karyawanswasta_xtkrb',
                'pegawainegeri_xtkrb',
                'pekerja_tdk_tetap_xtkrb',
                'usaha_xtkrb',
                'karyawanswasta_xtkrc',
                'pegawainegeri_xtkrc',
                'pekerja_tdk_tetap_xtkrc',
                'usaha_xtkrc',
                'karyawanswasta_xtkrd',
                'pegawainegeri_xtkrd',
                'pekerja_tdk_tetap_xtkrd',
                'usaha_xtkrd',
                'karyawanswasta_xitkra',
                'pegawainegeri_xitkra',
                'pekerja_tdk_tetap_xitkra',
                'usaha_xitkra',
                'karyawanswasta_xitkrb',
                'pegawainegeri_xitkrb',
                'pekerja_tdk_tetap_xitkrb',
                'usaha_xitkrb',
                'karyawanswasta_xitkrc',
                'pegawainegeri_xitkrc',
                'pekerja_tdk_tetap_xitkrc',
                'usaha_xitkrc',
                'karyawanswasta_xiitkra',
                'pegawainegeri_xiitkra',
                'pekerja_tdk_tetap_xiitkra',
                'usaha_xiitkra',
                'karyawanswasta_xiitkrb',
                'pegawainegeri_xiitkrb',
                'pekerja_tdk_tetap_xiitkrb',
                'usaha_xiitkrb',
                'karyawanswasta_xiitkrc',
                'pegawainegeri_xiitkrc',
                'pekerja_tdk_tetap_xiitkrc',
                'usaha_xiitkrc',
                'karyawanswasta_siswa_2020',
                'karyawanswasta_siswa_2021',
                'karyawanswasta_siswa_2022',
                'karyawanswasta_siswa_2023',
                'karyawanswasta_siswa_2024',
                'karyawanswasta_siswa_2025',
                'pegawainegeri_siswa_2020',
                'pegawainegeri_siswa_2021',
                'pegawainegeri_siswa_2022',
                'pegawainegeri_siswa_2023',
                'pegawainegeri_siswa_2024',
                'pegawainegeri_siswa_2025',
                'pekerja_tdk_tetap_siswa_2020',
                'pekerja_tdk_tetap_siswa_2021',
                'pekerja_tdk_tetap_siswa_2022',
                'pekerja_tdk_tetap_siswa_2023',
                'pekerja_tdk_tetap_siswa_2024',
                'pekerja_tdk_tetap_siswa_2025',
                'usaha_siswa_2020',
                'usaha_siswa_2021',
                'usaha_siswa_2022',
                'usaha_siswa_2023',
                'usaha_siswa_2024',
                'usaha_siswa_2025'
            )
        );
    }

    public function status_rumah_ortu()
    {
        // ! DATA 2020 //
        $rumahsendiri_siswa_2020 = HasilHitunganModel::where('status_rumah_ortu', 'Rumah Sendiri')->whereYear('tgl_daftar', '2020')->count();
        $rumahsewa_siswa_2020 = HasilHitunganModel::where('status_rumah_ortu', 'Rumah Sewa')->whereYear('tgl_daftar', '2020')->count();
        $kontrakan_siswa_2020 = HasilHitunganModel::where('status_rumah_ortu', 'Kontrakan')->whereYear('tgl_daftar', '2020')->count();
        $saudara_siswa_2020 = HasilHitunganModel::where('status_rumah_ortu', 'Tinggal Dengan Saudara')->whereYear('tgl_daftar', '2020')->count();

        // ! DATA 2021 //
        $rumahsendiri_siswa_2021 = HasilHitunganModel::where('status_rumah_ortu', 'Rumah Sendiri')->whereYear('tgl_daftar', '2021')->count();
        $rumahsewa_siswa_2021 = HasilHitunganModel::where('status_rumah_ortu', 'Rumah Sewa')->whereYear('tgl_daftar', '2021')->count();
        $kontrakan_siswa_2021 = HasilHitunganModel::where('status_rumah_ortu', 'Kontrakan')->whereYear('tgl_daftar', '2021')->count();
        $saudara_siswa_2021 = HasilHitunganModel::where('status_rumah_ortu', 'Tinggal Dengan Saudara')->whereYear('tgl_daftar', '2021')->count();

        // ! DATA 2022 //
        $rumahsendiri_siswa_2022 = HasilHitunganModel::where('status_rumah_ortu', 'Rumah Sendiri')->whereYear('tgl_daftar', '2022')->count();
        $rumahsewa_siswa_2022 = HasilHitunganModel::where('status_rumah_ortu', 'Rumah Sewa')->whereYear('tgl_daftar', '2022')->count();
        $kontrakan_siswa_2022 = HasilHitunganModel::where('status_rumah_ortu', 'Kontrakan')->whereYear('tgl_daftar', '2022')->count();
        $saudara_siswa_2022 = HasilHitunganModel::where('status_rumah_ortu', 'Tinggal Dengan Saudara')->whereYear('tgl_daftar', '2022')->count();

        // ! DATA 2023 //
        $rumahsendiri_siswa_2023 = HasilHitunganModel::where('status_rumah_ortu', 'Rumah Sendiri')->whereYear('tgl_daftar', '2023')->count();
        $rumahsewa_siswa_2023 = HasilHitunganModel::where('status_rumah_ortu', 'Rumah Sewa')->whereYear('tgl_daftar', '2023')->count();
        $kontrakan_siswa_2023 = HasilHitunganModel::where('status_rumah_ortu', 'Kontrakan')->whereYear('tgl_daftar', '2023')->count();
        $saudara_siswa_2023 = HasilHitunganModel::where('status_rumah_ortu', 'Tinggal Dengan Saudara')->whereYear('tgl_daftar', '2023')->count();

        // ! DATA 2024 //
        $rumahsendiri_siswa_2024 = HasilHitunganModel::where('status_rumah_ortu', 'Rumah Sendiri')->whereYear('tgl_daftar', '2024')->count();
        $rumahsewa_siswa_2024 = HasilHitunganModel::where('status_rumah_ortu', 'Rumah Sewa')->whereYear('tgl_daftar', '2024')->count();
        $kontrakan_siswa_2024 = HasilHitunganModel::where('status_rumah_ortu', 'Kontrakan')->whereYear('tgl_daftar', '2024')->count();
        $saudara_siswa_2024 = HasilHitunganModel::where('status_rumah_ortu', 'Tinggal Dengan Saudara')->whereYear('tgl_daftar', '2024')->count();

        // ! DATA 2025 //
        $rumahsendiri_siswa_2025 = HasilHitunganModel::where('status_rumah_ortu', 'Rumah Sendiri')->whereYear('tgl_daftar', '2025')->count();
        $rumahsewa_siswa_2025 = HasilHitunganModel::where('status_rumah_ortu', 'Rumah Sewa')->whereYear('tgl_daftar', '2025')->count();
        $kontrakan_siswa_2025 = HasilHitunganModel::where('status_rumah_ortu', 'Kontrakan')->whereYear('tgl_daftar', '2025')->count();
        $saudara_siswa_2025 = HasilHitunganModel::where('status_rumah_ortu', 'Tinggal Dengan Saudara')->whereYear('tgl_daftar', '2025')->count();

        return view(
            'admin.analisa_data.data_bansos.status_rumah_ortu.index',
            compact(
                'rumahsendiri_siswa_2020',
                'rumahsendiri_siswa_2021',
                'rumahsendiri_siswa_2022',
                'rumahsendiri_siswa_2023',
                'rumahsendiri_siswa_2024',
                'rumahsendiri_siswa_2025',
                'rumahsewa_siswa_2020',
                'rumahsewa_siswa_2021',
                'rumahsewa_siswa_2022',
                'rumahsewa_siswa_2023',
                'rumahsewa_siswa_2024',
                'rumahsewa_siswa_2025',
                'kontrakan_siswa_2020',
                'kontrakan_siswa_2021',
                'kontrakan_siswa_2022',
                'kontrakan_siswa_2023',
                'kontrakan_siswa_2024',
                'kontrakan_siswa_2025',
                'saudara_siswa_2020',
                'saudara_siswa_2021',
                'saudara_siswa_2022',
                'saudara_siswa_2023',
                'saudara_siswa_2024',
                'saudara_siswa_2025'
            )
        );
    }

    public function post_status_rumah_ortu(Request $request)
    {
        $request_tahun = $request->tahun;

        // ! DATA 2020 //
        $rumahsendiri_siswa_2020 = HasilHitunganModel::where('status_rumah_ortu', 'Rumah Sendiri')->whereYear('tgl_daftar', '2020')->count();
        $rumahsewa_siswa_2020 = HasilHitunganModel::where('status_rumah_ortu', 'Rumah Sewa')->whereYear('tgl_daftar', '2020')->count();
        $kontrakan_siswa_2020 = HasilHitunganModel::where('status_rumah_ortu', 'Kontrakan')->whereYear('tgl_daftar', '2020')->count();
        $saudara_siswa_2020 = HasilHitunganModel::where('status_rumah_ortu', 'Tinggal Dengan Saudara')->whereYear('tgl_daftar', '2020')->count();

        // ! DATA 2021 //
        $rumahsendiri_siswa_2021 = HasilHitunganModel::where('status_rumah_ortu', 'Rumah Sendiri')->whereYear('tgl_daftar', '2021')->count();
        $rumahsewa_siswa_2021 = HasilHitunganModel::where('status_rumah_ortu', 'Rumah Sewa')->whereYear('tgl_daftar', '2021')->count();
        $kontrakan_siswa_2021 = HasilHitunganModel::where('status_rumah_ortu', 'Kontrakan')->whereYear('tgl_daftar', '2021')->count();
        $saudara_siswa_2021 = HasilHitunganModel::where('status_rumah_ortu', 'Tinggal Dengan Saudara')->whereYear('tgl_daftar', '2021')->count();

        // ! DATA 2022 //
        $rumahsendiri_siswa_2022 = HasilHitunganModel::where('status_rumah_ortu', 'Rumah Sendiri')->whereYear('tgl_daftar', '2022')->count();
        $rumahsewa_siswa_2022 = HasilHitunganModel::where('status_rumah_ortu', 'Rumah Sewa')->whereYear('tgl_daftar', '2022')->count();
        $kontrakan_siswa_2022 = HasilHitunganModel::where('status_rumah_ortu', 'Kontrakan')->whereYear('tgl_daftar', '2022')->count();
        $saudara_siswa_2022 = HasilHitunganModel::where('status_rumah_ortu', 'Tinggal Dengan Saudara')->whereYear('tgl_daftar', '2022')->count();

        // ! DATA 2023 //
        $rumahsendiri_siswa_2023 = HasilHitunganModel::where('status_rumah_ortu', 'Rumah Sendiri')->whereYear('tgl_daftar', '2023')->count();
        $rumahsewa_siswa_2023 = HasilHitunganModel::where('status_rumah_ortu', 'Rumah Sewa')->whereYear('tgl_daftar', '2023')->count();
        $kontrakan_siswa_2023 = HasilHitunganModel::where('status_rumah_ortu', 'Kontrakan')->whereYear('tgl_daftar', '2023')->count();
        $saudara_siswa_2023 = HasilHitunganModel::where('status_rumah_ortu', 'Tinggal Dengan Saudara')->whereYear('tgl_daftar', '2023')->count();

        // ! DATA 2024 //
        $rumahsendiri_siswa_2024 = HasilHitunganModel::where('status_rumah_ortu', 'Rumah Sendiri')->whereYear('tgl_daftar', '2024')->count();
        $rumahsewa_siswa_2024 = HasilHitunganModel::where('status_rumah_ortu', 'Rumah Sewa')->whereYear('tgl_daftar', '2024')->count();
        $kontrakan_siswa_2024 = HasilHitunganModel::where('status_rumah_ortu', 'Kontrakan')->whereYear('tgl_daftar', '2024')->count();
        $saudara_siswa_2024 = HasilHitunganModel::where('status_rumah_ortu', 'Tinggal Dengan Saudara')->whereYear('tgl_daftar', '2024')->count();

        // ! DATA 2025 //
        $rumahsendiri_siswa_2025 = HasilHitunganModel::where('status_rumah_ortu', 'Rumah Sendiri')->whereYear('tgl_daftar', '2025')->count();
        $rumahsewa_siswa_2025 = HasilHitunganModel::where('status_rumah_ortu', 'Rumah Sewa')->whereYear('tgl_daftar', '2025')->count();
        $kontrakan_siswa_2025 = HasilHitunganModel::where('status_rumah_ortu', 'Kontrakan')->whereYear('tgl_daftar', '2025')->count();
        $saudara_siswa_2025 = HasilHitunganModel::where('status_rumah_ortu', 'Tinggal Dengan Saudara')->whereYear('tgl_daftar', '2025')->count();

        // ! KELAS X-TKJA //
        $rumahsendiri_xtkja = HasilHitunganModel::where('kelas', 'X-TKJ-A')->where('status_rumah_ortu', 'Rumah Sendiri')->whereYear('tgl_daftar', $request_tahun)->count();
        $rumahsewa_xtkja = HasilHitunganModel::where('kelas', 'X-TKJ-A')->where('status_rumah_ortu', 'Rumah Sewa')->whereYear('tgl_daftar', $request_tahun)->count();
        $kontrakan_xtkja = HasilHitunganModel::where('kelas', 'X-TKJ-A')->where('status_rumah_ortu', 'Kontrakan')->whereYear('tgl_daftar', $request_tahun)->count();
        $saudara_xtkja = HasilHitunganModel::where('kelas', 'X-TKJ-A')->where('status_rumah_ortu', 'Tinggal Dengan Saudara')->whereYear('tgl_daftar', $request_tahun)->count();

        // ! KELAS X-tkjb //
        $rumahsendiri_xtkjb = HasilHitunganModel::where('kelas', 'X-TKJ-B')->where('status_rumah_ortu', 'Rumah Sendiri')->whereYear('tgl_daftar', $request_tahun)->count();
        $rumahsewa_xtkjb = HasilHitunganModel::where('kelas', 'X-TKJ-B')->where('status_rumah_ortu', 'Rumah Sewa')->whereYear('tgl_daftar', $request_tahun)->count();
        $kontrakan_xtkjb = HasilHitunganModel::where('kelas', 'X-TKJ-B')->where('status_rumah_ortu', 'Kontrakan')->whereYear('tgl_daftar', $request_tahun)->count();
        $saudara_xtkjb = HasilHitunganModel::where('kelas', 'X-TKJ-B')->where('status_rumah_ortu', 'Tinggal Dengan Saudara')->whereYear('tgl_daftar', $request_tahun)->count();

        // ! KELAS X-tkjc //
        $rumahsendiri_xtkjc = HasilHitunganModel::where('kelas', 'X-TKJ-C')->where('status_rumah_ortu', 'Rumah Sendiri')->whereYear('tgl_daftar', $request_tahun)->count();
        $rumahsewa_xtkjc = HasilHitunganModel::where('kelas', 'X-TKJ-C')->where('status_rumah_ortu', 'Rumah Sewa')->whereYear('tgl_daftar', $request_tahun)->count();
        $kontrakan_xtkjc = HasilHitunganModel::where('kelas', 'X-TKJ-C')->where('status_rumah_ortu', 'Kontrakan')->whereYear('tgl_daftar', $request_tahun)->count();
        $saudara_xtkjc = HasilHitunganModel::where('kelas', 'X-TKJ-C')->where('status_rumah_ortu', 'Tinggal Dengan Saudara')->whereYear('tgl_daftar', $request_tahun)->count();

        // ! KELAS X-tkjd //
        $rumahsendiri_xtkjd = HasilHitunganModel::where('kelas', 'X-TKJ-D')->where('status_rumah_ortu', 'Rumah Sendiri')->whereYear('tgl_daftar', $request_tahun)->count();
        $rumahsewa_xtkjd = HasilHitunganModel::where('kelas', 'X-TKJ-D')->where('status_rumah_ortu', 'Rumah Sewa')->whereYear('tgl_daftar', $request_tahun)->count();
        $kontrakan_xtkjd = HasilHitunganModel::where('kelas', 'X-TKJ-D')->where('status_rumah_ortu', 'Kontrakan')->whereYear('tgl_daftar', $request_tahun)->count();
        $saudara_xtkjd = HasilHitunganModel::where('kelas', 'X-TKJ-D')->where('status_rumah_ortu', 'Tinggal Dengan Saudara')->whereYear('tgl_daftar', $request_tahun)->count();

        // ! KELAS XI-tkja //
        $rumahsendiri_xitkja = HasilHitunganModel::where('kelas', 'XI-TKJ-A')->where('status_rumah_ortu', 'Rumah Sendiri')->whereYear('tgl_daftar', $request_tahun)->count();
        $rumahsewa_xitkja = HasilHitunganModel::where('kelas', 'XI-TKJ-A')->where('status_rumah_ortu', 'Rumah Sewa')->whereYear('tgl_daftar', $request_tahun)->count();
        $kontrakan_xitkja = HasilHitunganModel::where('kelas', 'XI-TKJ-A')->where('status_rumah_ortu', 'Kontrakan')->whereYear('tgl_daftar', $request_tahun)->count();
        $saudara_xitkja = HasilHitunganModel::where('kelas', 'XI-TKJ-A')->where('status_rumah_ortu', 'Tinggal Dengan Saudara')->whereYear('tgl_daftar', $request_tahun)->count();

        // ! KELAS XI-tkjb //
        $rumahsendiri_xitkjb = HasilHitunganModel::where('kelas', 'XI-TKJ-B')->where('status_rumah_ortu', 'Rumah Sendiri')->whereYear('tgl_daftar', $request_tahun)->count();
        $rumahsewa_xitkjb = HasilHitunganModel::where('kelas', 'XI-TKJ-B')->where('status_rumah_ortu', 'Rumah Sewa')->whereYear('tgl_daftar', $request_tahun)->count();
        $kontrakan_xitkjb = HasilHitunganModel::where('kelas', 'XI-TKJ-B')->where('status_rumah_ortu', 'Kontrakan')->whereYear('tgl_daftar', $request_tahun)->count();
        $saudara_xitkjb = HasilHitunganModel::where('kelas', 'XI-TKJ-B')->where('status_rumah_ortu', 'Tinggal Dengan Saudara')->whereYear('tgl_daftar', $request_tahun)->count();

        // ! KELAS XI-tkjc //
        $rumahsendiri_xitkjc = HasilHitunganModel::where('kelas', 'XI-TKJ-C')->where('status_rumah_ortu', 'Rumah Sendiri')->whereYear('tgl_daftar', $request_tahun)->count();
        $rumahsewa_xitkjc = HasilHitunganModel::where('kelas', 'XI-TKJ-C')->where('status_rumah_ortu', 'Rumah Sewa')->whereYear('tgl_daftar', $request_tahun)->count();
        $kontrakan_xitkjc = HasilHitunganModel::where('kelas', 'XI-TKJ-C')->where('status_rumah_ortu', 'Kontrakan')->whereYear('tgl_daftar', $request_tahun)->count();
        $saudara_xitkjc = HasilHitunganModel::where('kelas', 'XI-TKJ-C')->where('status_rumah_ortu', 'Tinggal Dengan Saudara')->whereYear('tgl_daftar', $request_tahun)->count();

        // ! KELAS XIi-tkja //
        $rumahsendiri_xiitkja = HasilHitunganModel::where('kelas', 'XII-TKJ-A')->where('status_rumah_ortu', 'Rumah Sendiri')->whereYear('tgl_daftar', $request_tahun)->count();
        $rumahsewa_xiitkja = HasilHitunganModel::where('kelas', 'XII-TKJ-A')->where('status_rumah_ortu', 'Rumah Sewa')->whereYear('tgl_daftar', $request_tahun)->count();
        $kontrakan_xiitkja = HasilHitunganModel::where('kelas', 'XII-TKJ-A')->where('status_rumah_ortu', 'Kontrakan')->whereYear('tgl_daftar', $request_tahun)->count();
        $saudara_xiitkja = HasilHitunganModel::where('kelas', 'XII-TKJ-A')->where('status_rumah_ortu', 'Tinggal Dengan Saudara')->whereYear('tgl_daftar', $request_tahun)->count();

        // ! KELAS XIi-tkjb //
        $rumahsendiri_xiitkjb = HasilHitunganModel::where('kelas', 'XII-TKJ-B')->where('status_rumah_ortu', 'Rumah Sendiri')->whereYear('tgl_daftar', $request_tahun)->count();
        $rumahsewa_xiitkjb = HasilHitunganModel::where('kelas', 'XII-TKJ-B')->where('status_rumah_ortu', 'Rumah Sewa')->whereYear('tgl_daftar', $request_tahun)->count();
        $kontrakan_xiitkjb = HasilHitunganModel::where('kelas', 'XII-TKJ-B')->where('status_rumah_ortu', 'Kontrakan')->whereYear('tgl_daftar', $request_tahun)->count();
        $saudara_xiitkjb = HasilHitunganModel::where('kelas', 'XII-TKJ-B')->where('status_rumah_ortu', 'Tinggal Dengan Saudara')->whereYear('tgl_daftar', $request_tahun)->count();

        // ! KELAS XIi-tkjc //
        $rumahsendiri_xiitkjc = HasilHitunganModel::where('kelas', 'XII-TKJ-C')->where('status_rumah_ortu', 'Rumah Sendiri')->whereYear('tgl_daftar', $request_tahun)->count();
        $rumahsewa_xiitkjc = HasilHitunganModel::where('kelas', 'XII-TKJ-C')->where('status_rumah_ortu', 'Rumah Sewa')->whereYear('tgl_daftar', $request_tahun)->count();
        $kontrakan_xiitkjc = HasilHitunganModel::where('kelas', 'XII-TKJ-C')->where('status_rumah_ortu', 'Kontrakan')->whereYear('tgl_daftar', $request_tahun)->count();
        $saudara_xiitkjc = HasilHitunganModel::where('kelas', 'XII-TKJ-C')->where('status_rumah_ortu', 'Tinggal Dengan Saudara')->whereYear('tgl_daftar', $request_tahun)->count();

        // ! KELAS X-tkrA //
        $rumahsendiri_xtkra = HasilHitunganModel::where('kelas', 'X-tkr-A')->where('status_rumah_ortu', 'Rumah Sendiri')->whereYear('tgl_daftar', $request_tahun)->count();
        $rumahsewa_xtkra = HasilHitunganModel::where('kelas', 'X-tkr-A')->where('status_rumah_ortu', 'Rumah Sewa')->whereYear('tgl_daftar', $request_tahun)->count();
        $kontrakan_xtkra = HasilHitunganModel::where('kelas', 'X-tkr-A')->where('status_rumah_ortu', 'Kontrakan')->whereYear('tgl_daftar', $request_tahun)->count();
        $saudara_xtkra = HasilHitunganModel::where('kelas', 'X-tkr-A')->where('status_rumah_ortu', 'Tinggal Dengan Saudara')->whereYear('tgl_daftar', $request_tahun)->count();

        // ! KELAS X-tkrb //
        $rumahsendiri_xtkrb = HasilHitunganModel::where('kelas', 'X-tkr-B')->where('status_rumah_ortu', 'Rumah Sendiri')->whereYear('tgl_daftar', $request_tahun)->count();
        $rumahsewa_xtkrb = HasilHitunganModel::where('kelas', 'X-tkr-B')->where('status_rumah_ortu', 'Rumah Sewa')->whereYear('tgl_daftar', $request_tahun)->count();
        $kontrakan_xtkrb = HasilHitunganModel::where('kelas', 'X-tkr-B')->where('status_rumah_ortu', 'Kontrakan')->whereYear('tgl_daftar', $request_tahun)->count();
        $saudara_xtkrb = HasilHitunganModel::where('kelas', 'X-tkr-B')->where('status_rumah_ortu', 'Tinggal Dengan Saudara')->whereYear('tgl_daftar', $request_tahun)->count();

        // ! KELAS X-tkrc //
        $rumahsendiri_xtkrc = HasilHitunganModel::where('kelas', 'X-tkr-C')->where('status_rumah_ortu', 'Rumah Sendiri')->whereYear('tgl_daftar', $request_tahun)->count();
        $rumahsewa_xtkrc = HasilHitunganModel::where('kelas', 'X-tkr-C')->where('status_rumah_ortu', 'Rumah Sewa')->whereYear('tgl_daftar', $request_tahun)->count();
        $kontrakan_xtkrc = HasilHitunganModel::where('kelas', 'X-tkr-C')->where('status_rumah_ortu', 'Kontrakan')->whereYear('tgl_daftar', $request_tahun)->count();
        $saudara_xtkrc = HasilHitunganModel::where('kelas', 'X-tkr-C')->where('status_rumah_ortu', 'Tinggal Dengan Saudara')->whereYear('tgl_daftar', $request_tahun)->count();

        // ! KELAS X-tkrd //
        $rumahsendiri_xtkrd = HasilHitunganModel::where('kelas', 'X-tkr-D')->where('status_rumah_ortu', 'Rumah Sendiri')->whereYear('tgl_daftar', $request_tahun)->count();
        $rumahsewa_xtkrd = HasilHitunganModel::where('kelas', 'X-tkr-D')->where('status_rumah_ortu', 'Rumah Sewa')->whereYear('tgl_daftar', $request_tahun)->count();
        $kontrakan_xtkrd = HasilHitunganModel::where('kelas', 'X-tkr-D')->where('status_rumah_ortu', 'Kontrakan')->whereYear('tgl_daftar', $request_tahun)->count();
        $saudara_xtkrd = HasilHitunganModel::where('kelas', 'X-tkr-D')->where('status_rumah_ortu', 'Tinggal Dengan Saudara')->whereYear('tgl_daftar', $request_tahun)->count();

        // ! KELAS XI-tkra //
        $rumahsendiri_xitkra = HasilHitunganModel::where('kelas', 'XI-tkr-A')->where('status_rumah_ortu', 'Rumah Sendiri')->whereYear('tgl_daftar', $request_tahun)->count();
        $rumahsewa_xitkra = HasilHitunganModel::where('kelas', 'XI-tkr-A')->where('status_rumah_ortu', 'Rumah Sewa')->whereYear('tgl_daftar', $request_tahun)->count();
        $kontrakan_xitkra = HasilHitunganModel::where('kelas', 'XI-tkr-A')->where('status_rumah_ortu', 'Kontrakan')->whereYear('tgl_daftar', $request_tahun)->count();
        $saudara_xitkra = HasilHitunganModel::where('kelas', 'XI-tkr-A')->where('status_rumah_ortu', 'Tinggal Dengan Saudara')->whereYear('tgl_daftar', $request_tahun)->count();

        // ! KELAS XI-tkrb //
        $rumahsendiri_xitkrb = HasilHitunganModel::where('kelas', 'XI-tkr-B')->where('status_rumah_ortu', 'Rumah Sendiri')->whereYear('tgl_daftar', $request_tahun)->count();
        $rumahsewa_xitkrb = HasilHitunganModel::where('kelas', 'XI-tkr-B')->where('status_rumah_ortu', 'Rumah Sewa')->whereYear('tgl_daftar', $request_tahun)->count();
        $kontrakan_xitkrb = HasilHitunganModel::where('kelas', 'XI-tkr-B')->where('status_rumah_ortu', 'Kontrakan')->whereYear('tgl_daftar', $request_tahun)->count();
        $saudara_xitkrb = HasilHitunganModel::where('kelas', 'XI-tkr-B')->where('status_rumah_ortu', 'Tinggal Dengan Saudara')->whereYear('tgl_daftar', $request_tahun)->count();

        // ! KELAS XI-tkrc //
        $rumahsendiri_xitkrc = HasilHitunganModel::where('kelas', 'XI-tkr-C')->where('status_rumah_ortu', 'Rumah Sendiri')->whereYear('tgl_daftar', $request_tahun)->count();
        $rumahsewa_xitkrc = HasilHitunganModel::where('kelas', 'XI-tkr-C')->where('status_rumah_ortu', 'Rumah Sewa')->whereYear('tgl_daftar', $request_tahun)->count();
        $kontrakan_xitkrc = HasilHitunganModel::where('kelas', 'XI-tkr-C')->where('status_rumah_ortu', 'Kontrakan')->whereYear('tgl_daftar', $request_tahun)->count();
        $saudara_xitkrc = HasilHitunganModel::where('kelas', 'XI-tkr-C')->where('status_rumah_ortu', 'Tinggal Dengan Saudara')->whereYear('tgl_daftar', $request_tahun)->count();

        // ! KELAS XIi-tkra //
        $rumahsendiri_xiitkra = HasilHitunganModel::where('kelas', 'XII-tkr-A')->where('status_rumah_ortu', 'Rumah Sendiri')->whereYear('tgl_daftar', $request_tahun)->count();
        $rumahsewa_xiitkra = HasilHitunganModel::where('kelas', 'XII-tkr-A')->where('status_rumah_ortu', 'Rumah Sewa')->whereYear('tgl_daftar', $request_tahun)->count();
        $kontrakan_xiitkra = HasilHitunganModel::where('kelas', 'XII-tkr-A')->where('status_rumah_ortu', 'Kontrakan')->whereYear('tgl_daftar', $request_tahun)->count();
        $saudara_xiitkra = HasilHitunganModel::where('kelas', 'XII-tkr-A')->where('status_rumah_ortu', 'Tinggal Dengan Saudara')->whereYear('tgl_daftar', $request_tahun)->count();

        // ! KELAS XIi-tkrb //
        $rumahsendiri_xiitkrb = HasilHitunganModel::where('kelas', 'XII-tkr-B')->where('status_rumah_ortu', 'Rumah Sendiri')->whereYear('tgl_daftar', $request_tahun)->count();
        $rumahsewa_xiitkrb = HasilHitunganModel::where('kelas', 'XII-tkr-B')->where('status_rumah_ortu', 'Rumah Sewa')->whereYear('tgl_daftar', $request_tahun)->count();
        $kontrakan_xiitkrb = HasilHitunganModel::where('kelas', 'XII-tkr-B')->where('status_rumah_ortu', 'Kontrakan')->whereYear('tgl_daftar', $request_tahun)->count();
        $saudara_xiitkrb = HasilHitunganModel::where('kelas', 'XII-tkr-B')->where('status_rumah_ortu', 'Tinggal Dengan Saudara')->whereYear('tgl_daftar', $request_tahun)->count();

        // ! KELAS XIi-tkrc //
        $rumahsendiri_xiitkrc = HasilHitunganModel::where('kelas', 'XII-tkr-C')->where('status_rumah_ortu', 'Rumah Sendiri')->whereYear('tgl_daftar', $request_tahun)->count();
        $rumahsewa_xiitkrc = HasilHitunganModel::where('kelas', 'XII-tkr-C')->where('status_rumah_ortu', 'Rumah Sewa')->whereYear('tgl_daftar', $request_tahun)->count();
        $kontrakan_xiitkrc = HasilHitunganModel::where('kelas', 'XII-tkr-C')->where('status_rumah_ortu', 'Kontrakan')->whereYear('tgl_daftar', $request_tahun)->count();
        $saudara_xiitkrc = HasilHitunganModel::where('kelas', 'XII-tkr-C')->where('status_rumah_ortu', 'Tinggal Dengan Saudara')->whereYear('tgl_daftar', $request_tahun)->count();

        return view(
            'admin.analisa_data.data_bansos.status_rumah_ortu.result',
            compact(
                'request_tahun',
                'rumahsendiri_siswa_2020',
                'rumahsendiri_siswa_2021',
                'rumahsendiri_siswa_2022',
                'rumahsendiri_siswa_2023',
                'rumahsendiri_siswa_2024',
                'rumahsendiri_siswa_2025',
                'rumahsewa_siswa_2020',
                'rumahsewa_siswa_2021',
                'rumahsewa_siswa_2022',
                'rumahsewa_siswa_2023',
                'rumahsewa_siswa_2024',
                'rumahsewa_siswa_2025',
                'kontrakan_siswa_2020',
                'kontrakan_siswa_2021',
                'kontrakan_siswa_2022',
                'kontrakan_siswa_2023',
                'kontrakan_siswa_2024',
                'kontrakan_siswa_2025',
                'saudara_siswa_2020',
                'saudara_siswa_2021',
                'saudara_siswa_2022',
                'saudara_siswa_2023',
                'saudara_siswa_2024',
                'saudara_siswa_2025',
                'rumahsendiri_xtkja',
                'rumahsewa_xtkja',
                'kontrakan_xtkja',
                'saudara_xtkja',
                'rumahsendiri_xtkjb',
                'rumahsewa_xtkjb',
                'kontrakan_xtkjb',
                'saudara_xtkjb',
                'rumahsendiri_xtkjc',
                'rumahsewa_xtkjc',
                'kontrakan_xtkjc',
                'saudara_xtkjc',
                'rumahsendiri_xtkjd',
                'rumahsewa_xtkjd',
                'kontrakan_xtkjd',
                'saudara_xtkjd',
                'rumahsendiri_xitkja',
                'rumahsewa_xitkja',
                'kontrakan_xitkja',
                'saudara_xitkja',
                'rumahsendiri_xitkjb',
                'rumahsewa_xitkjb',
                'kontrakan_xitkjb',
                'saudara_xitkjb',
                'rumahsendiri_xitkjc',
                'rumahsewa_xitkjc',
                'kontrakan_xitkjc',
                'saudara_xitkjc',
                'rumahsendiri_xiitkja',
                'rumahsewa_xiitkja',
                'kontrakan_xiitkja',
                'saudara_xiitkja',
                'rumahsendiri_xiitkjb',
                'rumahsewa_xiitkjb',
                'kontrakan_xiitkjb',
                'saudara_xiitkjb',
                'rumahsendiri_xiitkjc',
                'rumahsewa_xiitkjc',
                'kontrakan_xiitkjc',
                'saudara_xiitkjc',
                'rumahsendiri_xtkra',
                'rumahsewa_xtkra',
                'kontrakan_xtkra',
                'saudara_xtkra',
                'rumahsendiri_xtkrb',
                'rumahsewa_xtkrb',
                'kontrakan_xtkrb',
                'saudara_xtkrb',
                'rumahsendiri_xtkrc',
                'rumahsewa_xtkrc',
                'kontrakan_xtkrc',
                'saudara_xtkrc',
                'rumahsendiri_xtkrd',
                'rumahsewa_xtkrd',
                'kontrakan_xtkrd',
                'saudara_xtkrd',
                'rumahsendiri_xitkra',
                'rumahsewa_xitkra',
                'kontrakan_xitkra',
                'saudara_xitkra',
                'rumahsendiri_xitkrb',
                'rumahsewa_xitkrb',
                'kontrakan_xitkrb',
                'saudara_xitkrb',
                'rumahsendiri_xitkrc',
                'rumahsewa_xitkrc',
                'kontrakan_xitkrc',
                'saudara_xitkrc',
                'rumahsendiri_xiitkra',
                'rumahsewa_xiitkra',
                'kontrakan_xiitkra',
                'saudara_xiitkra',
                'rumahsendiri_xiitkrb',
                'rumahsewa_xiitkrb',
                'kontrakan_xiitkrb',
                'saudara_xiitkrb',
                'rumahsendiri_xiitkrc',
                'rumahsewa_xiitkrc',
                'kontrakan_xiitkrc',
                'saudara_xiitkrc'
            )
        );
    }
}
