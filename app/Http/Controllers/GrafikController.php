<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HasilHitunganModel;
use App\DataSetModel;

class GrafikController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin')->except('logout', 'logoutadmin', 'logoutwalas');
    }
    public function analisa_databansos()
    {

        $data = DataSetModel::all();
        $x_tkja_dpt_2020 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'X-TKJ-A')->whereYear('tgl_daftar', '2020')->count();
        $x_tkja_dpt_2021 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'X-TKJ-A')->whereYear('tgl_daftar', '2021')->count();
        $x_tkja_dpt_2022 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'X-TKJ-A')->whereYear('tgl_daftar', '2022')->count();
        $x_tkja_dpt_2023 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'X-TKJ-A')->whereYear('tgl_daftar', '2023')->count();
        $x_tkja_dpt_2024 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'X-TKJ-A')->whereYear('tgl_daftar', '2024')->count();
        $x_tkja_dpt_2025 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'X-TKJ-A')->whereYear('tgl_daftar', '2025')->count();

        // ! TIDAK DAPAT //
        $x_tkja_tdkdpt_2020 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'X-TKJ-A')->whereYear('tgl_daftar', '2020')->count();
        $x_tkja_tdkdpt_2021 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'X-TKJ-A')->whereYear('tgl_daftar', '2021')->count();
        $x_tkja_tdkdpt_2022 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'X-TKJ-A')->whereYear('tgl_daftar', '2022')->count();
        $x_tkja_tdkdpt_2023 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'X-TKJ-A')->whereYear('tgl_daftar', '2023')->count();
        $x_tkja_tdkdpt_2024 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'X-TKJ-A')->whereYear('tgl_daftar', '2024')->count();
        $x_tkja_tdkdpt_2025 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'X-TKJ-A')->whereYear('tgl_daftar', '2025')->count();

        // ** KELAS X-TKJ-B ** //
        // ? DAPAT //
        $x_tkjb_dpt_2020 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'X-TKJ-B')->whereYear('tgl_daftar', '2020')->count();
        $x_tkjb_dpt_2021 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'X-TKJ-B')->whereYear('tgl_daftar', '2021')->count();
        $x_tkjb_dpt_2022 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'X-TKJ-B')->whereYear('tgl_daftar', '2022')->count();
        $x_tkjb_dpt_2023 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'X-TKJ-B')->whereYear('tgl_daftar', '2023')->count();
        $x_tkjb_dpt_2024 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'X-TKJ-B')->whereYear('tgl_daftar', '2024')->count();
        $x_tkjb_dpt_2025 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'X-TKJ-B')->whereYear('tgl_daftar', '2025')->count();

        // ! TIDAK DAPAT //
        $x_tkjb_tdkdpt_2020 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'X-TKJ-B')->whereYear('tgl_daftar', '2020')->count();
        $x_tkjb_tdkdpt_2021 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'X-TKJ-B')->whereYear('tgl_daftar', '2021')->count();
        $x_tkjb_tdkdpt_2022 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'X-TKJ-B')->whereYear('tgl_daftar', '2022')->count();
        $x_tkjb_tdkdpt_2023 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'X-TKJ-B')->whereYear('tgl_daftar', '2023')->count();
        $x_tkjb_tdkdpt_2024 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'X-TKJ-B')->whereYear('tgl_daftar', '2024')->count();
        $x_tkjb_tdkdpt_2025 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'X-TKJ-B')->whereYear('tgl_daftar', '2025')->count();

        $x_tkjc_dpt_2020 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'X-TKJ-C')->whereYear('tgl_daftar', '2020')->count();
        $x_tkjc_dpt_2021 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'X-TKJ-C')->whereYear('tgl_daftar', '2021')->count();
        $x_tkjc_dpt_2022 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'X-TKJ-C')->whereYear('tgl_daftar', '2022')->count();
        $x_tkjc_dpt_2023 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'X-TKJ-C')->whereYear('tgl_daftar', '2023')->count();
        $x_tkjc_dpt_2024 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'X-TKJ-C')->whereYear('tgl_daftar', '2024')->count();
        $x_tkjc_dpt_2025 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'X-TKJ-C')->whereYear('tgl_daftar', '2025')->count();

        // ! TIDAK DAPAT //
        $x_tkjc_tdkdpt_2020 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'X-TKJ-C')->whereYear('tgl_daftar', '2020')->count();
        $x_tkjc_tdkdpt_2021 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'X-TKJ-C')->whereYear('tgl_daftar', '2021')->count();
        $x_tkjc_tdkdpt_2022 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'X-TKJ-C')->whereYear('tgl_daftar', '2022')->count();
        $x_tkjc_tdkdpt_2023 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'X-TKJ-C')->whereYear('tgl_daftar', '2023')->count();
        $x_tkjc_tdkdpt_2024 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'X-TKJ-C')->whereYear('tgl_daftar', '2024')->count();
        $x_tkjc_tdkdpt_2025 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'X-TKJ-C')->whereYear('tgl_daftar', '2025')->count();

        // ** KELAS X-TKJ-D ** //
        // ? DAPAT //
        $x_tkjd_dpt_2020 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'X-TKJ-D')->whereYear('tgl_daftar', '2020')->count();
        $x_tkjd_dpt_2021 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'X-TKJ-D')->whereYear('tgl_daftar', '2021')->count();
        $x_tkjd_dpt_2022 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'X-TKJ-D')->whereYear('tgl_daftar', '2022')->count();
        $x_tkjd_dpt_2023 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'X-TKJ-D')->whereYear('tgl_daftar', '2023')->count();
        $x_tkjd_dpt_2024 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'X-TKJ-D')->whereYear('tgl_daftar', '2024')->count();
        $x_tkjd_dpt_2025 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'X-TKJ-D')->whereYear('tgl_daftar', '2025')->count();

        // ! TIDAK DAPAT //
        $x_tkjd_tdkdpt_2020 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'X-TKJ-D')->whereYear('tgl_daftar', '2020')->count();
        $x_tkjd_tdkdpt_2021 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'X-TKJ-D')->whereYear('tgl_daftar', '2021')->count();
        $x_tkjd_tdkdpt_2022 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'X-TKJ-D')->whereYear('tgl_daftar', '2022')->count();
        $x_tkjd_tdkdpt_2023 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'X-TKJ-D')->whereYear('tgl_daftar', '2023')->count();
        $x_tkjd_tdkdpt_2024 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'X-TKJ-D')->whereYear('tgl_daftar', '2024')->count();
        $x_tkjd_tdkdpt_2025 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'X-TKJ-D')->whereYear('tgl_daftar', '2025')->count();

        // ** KELAS XI-TKJ-A ** //
        // ? DAPAT //
        $xi_tkja_dpt_2020 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XI-TKJ-A')->whereYear('tgl_daftar', '2020')->count();
        $xi_tkja_dpt_2021 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XI-TKJ-A')->whereYear('tgl_daftar', '2021')->count();
        $xi_tkja_dpt_2022 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XI-TKJ-A')->whereYear('tgl_daftar', '2022')->count();
        $xi_tkja_dpt_2023 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XI-TKJ-A')->whereYear('tgl_daftar', '2023')->count();
        $xi_tkja_dpt_2024 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XI-TKJ-A')->whereYear('tgl_daftar', '2024')->count();
        $xi_tkja_dpt_2025 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XI-TKJ-A')->whereYear('tgl_daftar', '2025')->count();

        // ! TIDAK DAPAT //
        $xi_tkja_tdkdpt_2020 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XI-TKJ-A')->whereYear('tgl_daftar', '2020')->count();
        $xi_tkja_tdkdpt_2021 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XI-TKJ-A')->whereYear('tgl_daftar', '2021')->count();
        $xi_tkja_tdkdpt_2022 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XI-TKJ-A')->whereYear('tgl_daftar', '2022')->count();
        $xi_tkja_tdkdpt_2023 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XI-TKJ-A')->whereYear('tgl_daftar', '2023')->count();
        $xi_tkja_tdkdpt_2024 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XI-TKJ-A')->whereYear('tgl_daftar', '2024')->count();
        $xi_tkja_tdkdpt_2025 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XI-TKJ-A')->whereYear('tgl_daftar', '2025')->count();

        // ** KELAS XI-TKJ-B ** //
        // ? DAPAT //
        $xi_tkjb_dpt_2020 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XI-TKJ-B')->whereYear('tgl_daftar', '2020')->count();
        $xi_tkjb_dpt_2021 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XI-TKJ-B')->whereYear('tgl_daftar', '2021')->count();
        $xi_tkjb_dpt_2022 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XI-TKJ-B')->whereYear('tgl_daftar', '2022')->count();
        $xi_tkjb_dpt_2023 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XI-TKJ-B')->whereYear('tgl_daftar', '2023')->count();
        $xi_tkjb_dpt_2024 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XI-TKJ-B')->whereYear('tgl_daftar', '2024')->count();
        $xi_tkjb_dpt_2025 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XI-TKJ-B')->whereYear('tgl_daftar', '2025')->count();

        // ! TIDAK DAPAT //
        $xi_tkjb_tdkdpt_2020 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XI-TKJ-B')->whereYear('tgl_daftar', '2020')->count();
        $xi_tkjb_tdkdpt_2021 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XI-TKJ-B')->whereYear('tgl_daftar', '2021')->count();
        $xi_tkjb_tdkdpt_2022 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XI-TKJ-B')->whereYear('tgl_daftar', '2022')->count();
        $xi_tkjb_tdkdpt_2023 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XI-TKJ-B')->whereYear('tgl_daftar', '2023')->count();
        $xi_tkjb_tdkdpt_2024 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XI-TKJ-B')->whereYear('tgl_daftar', '2024')->count();
        $xi_tkjb_tdkdpt_2025 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XI-TKJ-B')->whereYear('tgl_daftar', '2025')->count();


        // ** KELAS XI-TKJ-C ** //
        // ? DAPAT //
        $xi_tkjc_dpt_2020 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XI-TKJ-C')->whereYear('tgl_daftar', '2020')->count();
        $xi_tkjc_dpt_2021 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XI-TKJ-C')->whereYear('tgl_daftar', '2021')->count();
        $xi_tkjc_dpt_2022 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XI-TKJ-C')->whereYear('tgl_daftar', '2022')->count();
        $xi_tkjc_dpt_2023 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XI-TKJ-C')->whereYear('tgl_daftar', '2023')->count();
        $xi_tkjc_dpt_2024 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XI-TKJ-C')->whereYear('tgl_daftar', '2024')->count();
        $xi_tkjc_dpt_2025 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XI-TKJ-C')->whereYear('tgl_daftar', '2025')->count();

        // ! TIDAK DAPAT //
        $xi_tkjc_tdkdpt_2020 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XI-TKJ-C')->whereYear('tgl_daftar', '2020')->count();
        $xi_tkjc_tdkdpt_2021 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XI-TKJ-C')->whereYear('tgl_daftar', '2021')->count();
        $xi_tkjc_tdkdpt_2022 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XI-TKJ-C')->whereYear('tgl_daftar', '2022')->count();
        $xi_tkjc_tdkdpt_2023 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XI-TKJ-C')->whereYear('tgl_daftar', '2023')->count();
        $xi_tkjc_tdkdpt_2024 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XI-TKJ-C')->whereYear('tgl_daftar', '2024')->count();
        $xi_tkjc_tdkdpt_2025 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XI-TKJ-C')->whereYear('tgl_daftar', '2025')->count();

        // ** KELAS XII-TKJ-A ** //
        // ? DAPAT //
        $xii_tkja_dpt_2020 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XII-TKJ-A')->whereYear('tgl_daftar', '2020')->count();
        $xii_tkja_dpt_2021 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XII-TKJ-A')->whereYear('tgl_daftar', '2021')->count();
        $xii_tkja_dpt_2022 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XII-TKJ-A')->whereYear('tgl_daftar', '2022')->count();
        $xii_tkja_dpt_2023 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XII-TKJ-A')->whereYear('tgl_daftar', '2023')->count();
        $xii_tkja_dpt_2024 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XII-TKJ-A')->whereYear('tgl_daftar', '2024')->count();
        $xii_tkja_dpt_2025 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XII-TKJ-A')->whereYear('tgl_daftar', '2025')->count();

        // ! TIDAK DAPAT //
        $xii_tkja_tdkdpt_2020 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XII-TKJ-A')->whereYear('tgl_daftar', '2020')->count();
        $xii_tkja_tdkdpt_2021 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XII-TKJ-A')->whereYear('tgl_daftar', '2021')->count();
        $xii_tkja_tdkdpt_2022 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XII-TKJ-A')->whereYear('tgl_daftar', '2022')->count();
        $xii_tkja_tdkdpt_2023 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XII-TKJ-A')->whereYear('tgl_daftar', '2023')->count();
        $xii_tkja_tdkdpt_2024 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XII-TKJ-A')->whereYear('tgl_daftar', '2024')->count();
        $xii_tkja_tdkdpt_2025 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XII-TKJ-A')->whereYear('tgl_daftar', '2025')->count();

        // ** KELAS XII-TKJ-B ** //
        // ? DAPAT //
        $xii_tkjb_dpt_2020 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XII-TKJ-B')->whereYear('tgl_daftar', '2020')->count();
        $xii_tkjb_dpt_2021 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XII-TKJ-B')->whereYear('tgl_daftar', '2021')->count();
        $xii_tkjb_dpt_2022 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XII-TKJ-B')->whereYear('tgl_daftar', '2022')->count();
        $xii_tkjb_dpt_2023 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XII-TKJ-B')->whereYear('tgl_daftar', '2023')->count();
        $xii_tkjb_dpt_2024 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XII-TKJ-B')->whereYear('tgl_daftar', '2024')->count();
        $xii_tkjb_dpt_2025 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XII-TKJ-B')->whereYear('tgl_daftar', '2025')->count();

        // ! TIDAK DAPAT //
        $xii_tkjb_tdkdpt_2020 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XII-TKJ-B')->whereYear('tgl_daftar', '2020')->count();
        $xii_tkjb_tdkdpt_2021 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XII-TKJ-B')->whereYear('tgl_daftar', '2021')->count();
        $xii_tkjb_tdkdpt_2022 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XII-TKJ-B')->whereYear('tgl_daftar', '2022')->count();
        $xii_tkjb_tdkdpt_2023 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XII-TKJ-B')->whereYear('tgl_daftar', '2023')->count();
        $xii_tkjb_tdkdpt_2024 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XII-TKJ-B')->whereYear('tgl_daftar', '2024')->count();
        $xii_tkjb_tdkdpt_2025 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XII-TKJ-B')->whereYear('tgl_daftar', '2025')->count();

        // ** KELAS XII-TKJ-C ** //
        // ? DAPAT //
        $xii_tkjc_dpt_2020 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XII-TKJ-C')->whereYear('tgl_daftar', '2020')->count();
        $xii_tkjc_dpt_2021 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XII-TKJ-C')->whereYear('tgl_daftar', '2021')->count();
        $xii_tkjc_dpt_2022 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XII-TKJ-C')->whereYear('tgl_daftar', '2022')->count();
        $xii_tkjc_dpt_2023 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XII-TKJ-C')->whereYear('tgl_daftar', '2023')->count();
        $xii_tkjc_dpt_2024 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XII-TKJ-C')->whereYear('tgl_daftar', '2024')->count();
        $xii_tkjc_dpt_2025 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XII-TKJ-C')->whereYear('tgl_daftar', '2025')->count();

        // ! TIDAK DAPAT //
        $xii_tkjc_tdkdpt_2020 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XII-TKJ-C')->whereYear('tgl_daftar', '2020')->count();
        $xii_tkjc_tdkdpt_2021 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XII-TKJ-C')->whereYear('tgl_daftar', '2021')->count();
        $xii_tkjc_tdkdpt_2022 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XII-TKJ-C')->whereYear('tgl_daftar', '2022')->count();
        $xii_tkjc_tdkdpt_2023 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XII-TKJ-C')->whereYear('tgl_daftar', '2023')->count();
        $xii_tkjc_tdkdpt_2024 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XII-TKJ-C')->whereYear('tgl_daftar', '2024')->count();
        $xii_tkjc_tdkdpt_2025 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XII-TKJ-C')->whereYear('tgl_daftar', '2025')->count();

        // ** KELAS X-TKR-A ** //
        // ? DAPAT //
        $x_tkra_dpt_2020 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'x-tkr-a')->whereYear('tgl_daftar', '2020')->count();
        $x_tkra_dpt_2021 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'x-tkr-a')->whereYear('tgl_daftar', '2021')->count();
        $x_tkra_dpt_2022 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'x-tkr-a')->whereYear('tgl_daftar', '2022')->count();
        $x_tkra_dpt_2023 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'x-tkr-a')->whereYear('tgl_daftar', '2023')->count();
        $x_tkra_dpt_2024 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'x-tkr-a')->whereYear('tgl_daftar', '2024')->count();
        $x_tkra_dpt_2025 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'x-tkr-a')->whereYear('tgl_daftar', '2025')->count();

        // ! TIDAK DAPAT //
        $x_tkra_tdkdpt_2020 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'x-tkr-a')->whereYear('tgl_daftar', '2020')->count();
        $x_tkra_tdkdpt_2021 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'x-tkr-a')->whereYear('tgl_daftar', '2021')->count();
        $x_tkra_tdkdpt_2022 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'x-tkr-a')->whereYear('tgl_daftar', '2022')->count();
        $x_tkra_tdkdpt_2023 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'x-tkr-a')->whereYear('tgl_daftar', '2023')->count();
        $x_tkra_tdkdpt_2024 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'x-tkr-a')->whereYear('tgl_daftar', '2024')->count();
        $x_tkra_tdkdpt_2025 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'x-tkr-a')->whereYear('tgl_daftar', '2025')->count();

        // ** KELAS X-TKR-B ** //
        // ? DAPAT //
        $x_tkrb_dpt_2020 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'X-TKR-B')->whereYear('tgl_daftar', '2020')->count();
        $x_tkrb_dpt_2021 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'X-TKR-B')->whereYear('tgl_daftar', '2021')->count();
        $x_tkrb_dpt_2022 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'X-TKR-B')->whereYear('tgl_daftar', '2022')->count();
        $x_tkrb_dpt_2023 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'X-TKR-B')->whereYear('tgl_daftar', '2023')->count();
        $x_tkrb_dpt_2024 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'X-TKR-B')->whereYear('tgl_daftar', '2024')->count();
        $x_tkrb_dpt_2025 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'X-TKR-B')->whereYear('tgl_daftar', '2025')->count();

        // ! TIDAK DAPAT //
        $x_tkrb_tdkdpt_2020 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'X-TKR-B')->whereYear('tgl_daftar', '2020')->count();
        $x_tkrb_tdkdpt_2021 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'X-TKR-B')->whereYear('tgl_daftar', '2021')->count();
        $x_tkrb_tdkdpt_2022 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'X-TKR-B')->whereYear('tgl_daftar', '2022')->count();
        $x_tkrb_tdkdpt_2023 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'X-TKR-B')->whereYear('tgl_daftar', '2023')->count();
        $x_tkrb_tdkdpt_2024 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'X-TKR-B')->whereYear('tgl_daftar', '2024')->count();
        $x_tkrb_tdkdpt_2025 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'X-TKR-B')->whereYear('tgl_daftar', '2025')->count();

        // ** KELAS X-TKR-C ** //
        // ? DAPAT //
        $x_tkrc_dpt_2020 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'X-TKR-C')->whereYear('tgl_daftar', '2020')->count();
        $x_tkrc_dpt_2021 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'X-TKR-C')->whereYear('tgl_daftar', '2021')->count();
        $x_tkrc_dpt_2022 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'X-TKR-C')->whereYear('tgl_daftar', '2022')->count();
        $x_tkrc_dpt_2023 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'X-TKR-C')->whereYear('tgl_daftar', '2023')->count();
        $x_tkrc_dpt_2024 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'X-TKR-C')->whereYear('tgl_daftar', '2024')->count();
        $x_tkrc_dpt_2025 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'X-TKR-C')->whereYear('tgl_daftar', '2025')->count();

        // ! TIDAK DAPAT //
        $x_tkrc_tdkdpt_2020 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'X-TKR-C')->whereYear('tgl_daftar', '2020')->count();
        $x_tkrc_tdkdpt_2021 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'X-TKR-C')->whereYear('tgl_daftar', '2021')->count();
        $x_tkrc_tdkdpt_2022 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'X-TKR-C')->whereYear('tgl_daftar', '2022')->count();
        $x_tkrc_tdkdpt_2023 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'X-TKR-C')->whereYear('tgl_daftar', '2023')->count();
        $x_tkrc_tdkdpt_2024 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'X-TKR-C')->whereYear('tgl_daftar', '2024')->count();
        $x_tkrc_tdkdpt_2025 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'X-TKR-C')->whereYear('tgl_daftar', '2025')->count();

        // ** KELAS XI-TKR-A ** //
        // ? DAPAT //
        $xi_tkra_dpt_2020 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XI-TKR-A')->whereYear('tgl_daftar', '2020')->count();
        $xi_tkra_dpt_2021 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XI-TKR-A')->whereYear('tgl_daftar', '2021')->count();
        $xi_tkra_dpt_2022 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XI-TKR-A')->whereYear('tgl_daftar', '2022')->count();
        $xi_tkra_dpt_2023 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XI-TKR-A')->whereYear('tgl_daftar', '2023')->count();
        $xi_tkra_dpt_2024 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XI-TKR-A')->whereYear('tgl_daftar', '2024')->count();
        $xi_tkra_dpt_2025 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XI-TKR-A')->whereYear('tgl_daftar', '2025')->count();

        // ! TIDAK DAPAT //
        $xi_tkra_tdkdpt_2020 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XI-TKR-A')->whereYear('tgl_daftar', '2020')->count();
        $xi_tkra_tdkdpt_2021 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XI-TKR-A')->whereYear('tgl_daftar', '2021')->count();
        $xi_tkra_tdkdpt_2022 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XI-TKR-A')->whereYear('tgl_daftar', '2022')->count();
        $xi_tkra_tdkdpt_2023 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XI-TKR-A')->whereYear('tgl_daftar', '2023')->count();
        $xi_tkra_tdkdpt_2024 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XI-TKR-A')->whereYear('tgl_daftar', '2024')->count();
        $xi_tkra_tdkdpt_2025 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XI-TKR-A')->whereYear('tgl_daftar', '2025')->count();

        // ** KELAS XI-TKR-B ** //
        // ? DAPAT //
        $xi_tkrb_dpt_2020 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XI-TKR-B')->whereYear('tgl_daftar', '2020')->count();
        $xi_tkrb_dpt_2021 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XI-TKR-B')->whereYear('tgl_daftar', '2021')->count();
        $xi_tkrb_dpt_2022 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XI-TKR-B')->whereYear('tgl_daftar', '2022')->count();
        $xi_tkrb_dpt_2023 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XI-TKR-B')->whereYear('tgl_daftar', '2023')->count();
        $xi_tkrb_dpt_2024 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XI-TKR-B')->whereYear('tgl_daftar', '2024')->count();
        $xi_tkrb_dpt_2025 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XI-TKR-B')->whereYear('tgl_daftar', '2025')->count();

        // ! TIDAK DAPAT //
        $xi_tkrb_tdkdpt_2020 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XI-TKR-B')->whereYear('tgl_daftar', '2020')->count();
        $xi_tkrb_tdkdpt_2021 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XI-TKR-B')->whereYear('tgl_daftar', '2021')->count();
        $xi_tkrb_tdkdpt_2022 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XI-TKR-B')->whereYear('tgl_daftar', '2022')->count();
        $xi_tkrb_tdkdpt_2023 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XI-TKR-B')->whereYear('tgl_daftar', '2023')->count();
        $xi_tkrb_tdkdpt_2024 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XI-TKR-B')->whereYear('tgl_daftar', '2024')->count();
        $xi_tkrb_tdkdpt_2025 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XI-TKR-B')->whereYear('tgl_daftar', '2025')->count();

        // ** KELAS XI-TKR-C ** //
        // ? DAPAT //
        $xi_tkrc_dpt_2020 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XI-TKR-C')->whereYear('tgl_daftar', '2020')->count();
        $xi_tkrc_dpt_2021 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XI-TKR-C')->whereYear('tgl_daftar', '2021')->count();
        $xi_tkrc_dpt_2022 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XI-TKR-C')->whereYear('tgl_daftar', '2022')->count();
        $xi_tkrc_dpt_2023 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XI-TKR-C')->whereYear('tgl_daftar', '2023')->count();
        $xi_tkrc_dpt_2024 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XI-TKR-C')->whereYear('tgl_daftar', '2024')->count();
        $xi_tkrc_dpt_2025 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XI-TKR-C')->whereYear('tgl_daftar', '2025')->count();

        // ! TIDAK DAPAT //
        $xi_tkrc_tdkdpt_2020 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XI-TKR-C')->whereYear('tgl_daftar', '2020')->count();
        $xi_tkrc_tdkdpt_2021 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XI-TKR-C')->whereYear('tgl_daftar', '2021')->count();
        $xi_tkrc_tdkdpt_2022 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XI-TKR-C')->whereYear('tgl_daftar', '2022')->count();
        $xi_tkrc_tdkdpt_2023 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XI-TKR-C')->whereYear('tgl_daftar', '2023')->count();
        $xi_tkrc_tdkdpt_2024 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XI-TKR-C')->whereYear('tgl_daftar', '2024')->count();
        $xi_tkrc_tdkdpt_2025 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XI-TKR-C')->whereYear('tgl_daftar', '2025')->count();


        // ** KELAS XII-TKR-A ** //
        // ? DAPAT //
        $xii_tkra_dpt_2020 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XII-TKR-A')->whereYear('tgl_daftar', '2020')->count();
        $xii_tkra_dpt_2021 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XII-TKR-A')->whereYear('tgl_daftar', '2021')->count();
        $xii_tkra_dpt_2022 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XII-TKR-A')->whereYear('tgl_daftar', '2022')->count();
        $xii_tkra_dpt_2023 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XII-TKR-A')->whereYear('tgl_daftar', '2023')->count();
        $xii_tkra_dpt_2024 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XII-TKR-A')->whereYear('tgl_daftar', '2024')->count();
        $xii_tkra_dpt_2025 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XII-TKR-A')->whereYear('tgl_daftar', '2025')->count();

        // ! TIDAK DAPAT //
        $xii_tkra_tdkdpt_2020 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XII-TKR-A')->whereYear('tgl_daftar', '2020')->count();
        $xii_tkra_tdkdpt_2021 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XII-TKR-A')->whereYear('tgl_daftar', '2021')->count();
        $xii_tkra_tdkdpt_2022 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XII-TKR-A')->whereYear('tgl_daftar', '2022')->count();
        $xii_tkra_tdkdpt_2023 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XII-TKR-A')->whereYear('tgl_daftar', '2023')->count();
        $xii_tkra_tdkdpt_2024 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XII-TKR-A')->whereYear('tgl_daftar', '2024')->count();
        $xii_tkra_tdkdpt_2025 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XII-TKR-A')->whereYear('tgl_daftar', '2025')->count();

        // ** KELAS XII-TKR-B ** //
        // ? DAPAT //
        $xii_tkrb_dpt_2020 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XII-TKR-B')->whereYear('tgl_daftar', '2020')->count();
        $xii_tkrb_dpt_2021 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XII-TKR-B')->whereYear('tgl_daftar', '2021')->count();
        $xii_tkrb_dpt_2022 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XII-TKR-B')->whereYear('tgl_daftar', '2022')->count();
        $xii_tkrb_dpt_2023 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XII-TKR-B')->whereYear('tgl_daftar', '2023')->count();
        $xii_tkrb_dpt_2024 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XII-TKR-B')->whereYear('tgl_daftar', '2024')->count();
        $xii_tkrb_dpt_2025 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XII-TKR-B')->whereYear('tgl_daftar', '2025')->count();

        // ! TIDAK DAPAT //
        $xii_tkrb_tdkdpt_2020 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XII-TKR-B')->whereYear('tgl_daftar', '2020')->count();
        $xii_tkrb_tdkdpt_2021 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XII-TKR-B')->whereYear('tgl_daftar', '2021')->count();
        $xii_tkrb_tdkdpt_2022 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XII-TKR-B')->whereYear('tgl_daftar', '2022')->count();
        $xii_tkrb_tdkdpt_2023 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XII-TKR-B')->whereYear('tgl_daftar', '2023')->count();
        $xii_tkrb_tdkdpt_2024 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XII-TKR-B')->whereYear('tgl_daftar', '2024')->count();
        $xii_tkrb_tdkdpt_2025 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XII-TKR-B')->whereYear('tgl_daftar', '2025')->count();

        // ** KELAS XII-TKR-C ** //
        // ? DAPAT //
        $xii_tkrc_dpt_2020 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XII-TKR-C')->whereYear('tgl_daftar', '2020')->count();
        $xii_tkrc_dpt_2021 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XII-TKR-C')->whereYear('tgl_daftar', '2021')->count();
        $xii_tkrc_dpt_2022 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XII-TKR-C')->whereYear('tgl_daftar', '2022')->count();
        $xii_tkrc_dpt_2023 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XII-TKR-C')->whereYear('tgl_daftar', '2023')->count();
        $xii_tkrc_dpt_2024 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XII-TKR-C')->whereYear('tgl_daftar', '2024')->count();
        $xii_tkrc_dpt_2025 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XII-TKR-C')->whereYear('tgl_daftar', '2025')->count();

        // ! TIDAK DAPAT //
        $xii_tkrc_tdkdpt_2020 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XII-TKR-C')->whereYear('tgl_daftar', '2020')->count();
        $xii_tkrc_tdkdpt_2021 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XII-TKR-C')->whereYear('tgl_daftar', '2021')->count();
        $xii_tkrc_tdkdpt_2022 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XII-TKR-C')->whereYear('tgl_daftar', '2022')->count();
        $xii_tkrc_tdkdpt_2023 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XII-TKR-C')->whereYear('tgl_daftar', '2023')->count();
        $xii_tkrc_tdkdpt_2024 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XII-TKR-C')->whereYear('tgl_daftar', '2024')->count();
        $xii_tkrc_tdkdpt_2025 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XII-TKR-C')->whereYear('tgl_daftar', '2025')->count();

        return view(
            'admin.analisa_data.data_bansos.status_penerimaan_bansos.index',
            compact(
                'data',
                'x_tkja_dpt_2020',
                'x_tkja_dpt_2021',
                'x_tkja_dpt_2022',
                'x_tkja_dpt_2023',
                'x_tkja_dpt_2024',
                'x_tkja_dpt_2025',
                'x_tkja_tdkdpt_2020',
                'x_tkja_tdkdpt_2021',
                'x_tkja_tdkdpt_2022',
                'x_tkja_tdkdpt_2023',
                'x_tkja_tdkdpt_2024',
                'x_tkja_tdkdpt_2025',
                'x_tkjb_dpt_2020',
                'x_tkjb_dpt_2021',
                'x_tkjb_dpt_2022',
                'x_tkjb_dpt_2023',
                'x_tkjb_dpt_2024',
                'x_tkjb_dpt_2025',
                'x_tkjb_tdkdpt_2020',
                'x_tkjb_tdkdpt_2021',
                'x_tkjb_tdkdpt_2022',
                'x_tkjb_tdkdpt_2023',
                'x_tkjb_tdkdpt_2024',
                'x_tkjb_tdkdpt_2025',
                'x_tkjc_dpt_2020',
                'x_tkjc_dpt_2021',
                'x_tkjc_dpt_2022',
                'x_tkjc_dpt_2023',
                'x_tkjc_dpt_2024',
                'x_tkjc_dpt_2025',
                'x_tkjc_tdkdpt_2020',
                'x_tkjc_tdkdpt_2021',
                'x_tkjc_tdkdpt_2022',
                'x_tkjc_tdkdpt_2023',
                'x_tkjc_tdkdpt_2024',
                'x_tkjc_tdkdpt_2025',
                'x_tkjd_dpt_2020',
                'x_tkjd_dpt_2021',
                'x_tkjd_dpt_2022',
                'x_tkjd_dpt_2023',
                'x_tkjd_dpt_2024',
                'x_tkjd_dpt_2025',
                'x_tkjd_tdkdpt_2020',
                'x_tkjd_tdkdpt_2021',
                'x_tkjd_tdkdpt_2022',
                'x_tkjd_tdkdpt_2023',
                'x_tkjd_tdkdpt_2024',
                'x_tkjd_tdkdpt_2025',
                'xi_tkja_dpt_2020',
                'xi_tkja_dpt_2021',
                'xi_tkja_dpt_2022',
                'xi_tkja_dpt_2023',
                'xi_tkja_dpt_2024',
                'xi_tkja_dpt_2025',
                'xi_tkja_tdkdpt_2020',
                'xi_tkja_tdkdpt_2021',
                'xi_tkja_tdkdpt_2022',
                'xi_tkja_tdkdpt_2023',
                'xi_tkja_tdkdpt_2024',
                'xi_tkja_tdkdpt_2025',
                'xi_tkjb_dpt_2020',
                'xi_tkjb_dpt_2021',
                'xi_tkjb_dpt_2022',
                'xi_tkjb_dpt_2023',
                'xi_tkjb_dpt_2024',
                'xi_tkjb_dpt_2025',
                'xi_tkjb_tdkdpt_2020',
                'xi_tkjb_tdkdpt_2021',
                'xi_tkjb_tdkdpt_2022',
                'xi_tkjb_tdkdpt_2023',
                'xi_tkjb_tdkdpt_2024',
                'xi_tkjb_tdkdpt_2025',
                'xi_tkjc_dpt_2020',
                'xi_tkjc_dpt_2021',
                'xi_tkjc_dpt_2022',
                'xi_tkjc_dpt_2023',
                'xi_tkjc_dpt_2024',
                'xi_tkjc_dpt_2025',
                'xi_tkjc_tdkdpt_2020',
                'xi_tkjc_tdkdpt_2021',
                'xi_tkjc_tdkdpt_2022',
                'xi_tkjc_tdkdpt_2023',
                'xi_tkjc_tdkdpt_2024',
                'xi_tkjc_tdkdpt_2025',
                'xii_tkja_dpt_2020',
                'xii_tkja_dpt_2021',
                'xii_tkja_dpt_2022',
                'xii_tkja_dpt_2023',
                'xii_tkja_dpt_2024',
                'xii_tkja_dpt_2025',
                'xii_tkja_tdkdpt_2020',
                'xii_tkja_tdkdpt_2021',
                'xii_tkja_tdkdpt_2022',
                'xii_tkja_tdkdpt_2023',
                'xii_tkja_tdkdpt_2024',
                'xii_tkja_tdkdpt_2025',
                'x_tkra_dpt_2020',
                'x_tkra_dpt_2021',
                'x_tkra_dpt_2022',
                'x_tkra_dpt_2023',
                'x_tkra_dpt_2024',
                'x_tkra_dpt_2025',
                'x_tkra_tdkdpt_2020',
                'x_tkra_tdkdpt_2021',
                'x_tkra_tdkdpt_2022',
                'x_tkra_tdkdpt_2023',
                'x_tkra_tdkdpt_2024',
                'x_tkra_tdkdpt_2025',
                'x_tkrb_dpt_2020',
                'x_tkrb_dpt_2021',
                'x_tkrb_dpt_2022',
                'x_tkrb_dpt_2023',
                'x_tkrb_dpt_2024',
                'x_tkrb_dpt_2025',
                'x_tkrb_tdkdpt_2020',
                'x_tkrb_tdkdpt_2021',
                'x_tkrb_tdkdpt_2022',
                'x_tkrb_tdkdpt_2023',
                'x_tkrb_tdkdpt_2024',
                'x_tkrb_tdkdpt_2025',
                'x_tkrc_dpt_2020',
                'x_tkrc_dpt_2021',
                'x_tkrc_dpt_2022',
                'x_tkrc_dpt_2023',
                'x_tkrc_dpt_2024',
                'x_tkrc_dpt_2025',
                'x_tkrc_tdkdpt_2020',
                'x_tkrc_tdkdpt_2021',
                'x_tkrc_tdkdpt_2022',
                'x_tkrc_tdkdpt_2023',
                'x_tkrc_tdkdpt_2024',
                'x_tkrc_tdkdpt_2025',
                'xi_tkra_dpt',
                'xi_tkra_tdkdpt',
                'xi_tkra_dpt_2020',
                'xi_tkra_dpt_2021',
                'xi_tkra_dpt_2022',
                'xi_tkra_dpt_2023',
                'xi_tkra_dpt_2024',
                'xi_tkra_dpt_2025',
                'xi_tkra_tdkdpt_2020',
                'xi_tkra_tdkdpt_2021',
                'xi_tkra_tdkdpt_2022',
                'xi_tkra_tdkdpt_2023',
                'xi_tkra_tdkdpt_2024',
                'xi_tkra_tdkdpt_2025',
                'xi_tkrb_dpt_2020',
                'xi_tkrb_dpt_2021',
                'xi_tkrb_dpt_2022',
                'xi_tkrb_dpt_2023',
                'xi_tkrb_dpt_2024',
                'xi_tkrb_dpt_2025',
                'xi_tkrb_tdkdpt_2020',
                'xi_tkrb_tdkdpt_2021',
                'xi_tkrb_tdkdpt_2022',
                'xi_tkrb_tdkdpt_2023',
                'xi_tkrb_tdkdpt_2024',
                'xi_tkrb_tdkdpt_2025',
                'xi_tkrc_dpt_2020',
                'xi_tkrc_dpt_2021',
                'xi_tkrc_dpt_2022',
                'xi_tkrc_dpt_2023',
                'xi_tkrc_dpt_2024',
                'xi_tkrc_dpt_2025',
                'xi_tkrc_tdkdpt_2020',
                'xi_tkrc_tdkdpt_2021',
                'xi_tkrc_tdkdpt_2022',
                'xi_tkrc_tdkdpt_2023',
                'xi_tkrc_tdkdpt_2024',
                'xi_tkrc_tdkdpt_2025',
                'xii_tkra_dpt_2020',
                'xii_tkra_dpt_2021',
                'xii_tkra_dpt_2022',
                'xii_tkra_dpt_2023',
                'xii_tkra_dpt_2024',
                'xii_tkra_dpt_2025',
                'xii_tkra_tdkdpt_2020',
                'xii_tkra_tdkdpt_2021',
                'xii_tkra_tdkdpt_2022',
                'xii_tkra_tdkdpt_2023',
                'xii_tkra_tdkdpt_2024',
                'xii_tkra_tdkdpt_2025',
                'xii_tkrb_dpt_2020',
                'xii_tkrb_dpt_2021',
                'xii_tkrb_dpt_2022',
                'xii_tkrb_dpt_2023',
                'xii_tkrb_dpt_2024',
                'xii_tkrb_dpt_2025',
                'xii_tkrb_tdkdpt_2020',
                'xii_tkrb_tdkdpt_2021',
                'xii_tkrb_tdkdpt_2022',
                'xii_tkrb_tdkdpt_2023',
                'xii_tkrb_tdkdpt_2024',
                'xii_tkrb_tdkdpt_2025',
                'xii_tkrc_dpt_2020',
                'xii_tkrc_dpt_2021',
                'xii_tkrc_dpt_2022',
                'xii_tkrc_dpt_2023',
                'xii_tkrc_dpt_2024',
                'xii_tkrc_dpt_2025',
                'xii_tkrc_tdkdpt_2020',
                'xii_tkrc_tdkdpt_2021',
                'xii_tkrc_tdkdpt_2022',
                'xii_tkrc_tdkdpt_2023',
                'xii_tkrc_tdkdpt_2024',
                'xii_tkrc_tdkdpt_2025'
            )
        );
    }

    public function post_analisa_databansos(Request $request)
    {
        $data = DataSetModel::all();

        $request_tahun = $request->tahun;

        // * KELAS X-TKJ-A ** //
        // ? DAPAT //
        $x_tkja_dpt_2020 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'X-TKJ-A')->whereYear('tgl_daftar', '2020')->count();
        $x_tkja_dpt_2021 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'X-TKJ-A')->whereYear('tgl_daftar', '2021')->count();
        $x_tkja_dpt_2022 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'X-TKJ-A')->whereYear('tgl_daftar', '2022')->count();
        $x_tkja_dpt_2023 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'X-TKJ-A')->whereYear('tgl_daftar', '2023')->count();
        $x_tkja_dpt_2024 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'X-TKJ-A')->whereYear('tgl_daftar', '2024')->count();
        $x_tkja_dpt_2025 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'X-TKJ-A')->whereYear('tgl_daftar', '2025')->count();

        // ! TIDAK DAPAT //
        $x_tkja_tdkdpt_2020 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'X-TKJ-A')->whereYear('tgl_daftar', '2020')->count();
        $x_tkja_tdkdpt_2021 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'X-TKJ-A')->whereYear('tgl_daftar', '2021')->count();
        $x_tkja_tdkdpt_2022 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'X-TKJ-A')->whereYear('tgl_daftar', '2022')->count();
        $x_tkja_tdkdpt_2023 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'X-TKJ-A')->whereYear('tgl_daftar', '2023')->count();
        $x_tkja_tdkdpt_2024 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'X-TKJ-A')->whereYear('tgl_daftar', '2024')->count();
        $x_tkja_tdkdpt_2025 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'X-TKJ-A')->whereYear('tgl_daftar', '2025')->count();

        $x_tkja_dpt = HasilHitunganModel::where('kelas', 'X-TKJ-A')->where('probabilitas_dapat', '>', 0)->whereYear('tgl_daftar', $request_tahun)->count();
        $x_tkja_tdkdpt = HasilHitunganModel::where('kelas', 'X-TKJ-A')->where('probabilitas_tdkdapat', '>', 0)->whereYear('tgl_daftar', $request_tahun)->count();

        // ** KELAS X-TKJ-B ** //
        // ? DAPAT //
        $x_tkjb_dpt_2020 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'X-TKJ-B')->whereYear('tgl_daftar', '2020')->count();
        $x_tkjb_dpt_2021 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'X-TKJ-B')->whereYear('tgl_daftar', '2021')->count();
        $x_tkjb_dpt_2022 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'X-TKJ-B')->whereYear('tgl_daftar', '2022')->count();
        $x_tkjb_dpt_2023 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'X-TKJ-B')->whereYear('tgl_daftar', '2023')->count();
        $x_tkjb_dpt_2024 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'X-TKJ-B')->whereYear('tgl_daftar', '2024')->count();
        $x_tkjb_dpt_2025 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'X-TKJ-B')->whereYear('tgl_daftar', '2025')->count();

        // ! TIDAK DAPAT //
        $x_tkjb_tdkdpt_2020 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'X-TKJ-B')->whereYear('tgl_daftar', '2020')->count();
        $x_tkjb_tdkdpt_2021 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'X-TKJ-B')->whereYear('tgl_daftar', '2021')->count();
        $x_tkjb_tdkdpt_2022 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'X-TKJ-B')->whereYear('tgl_daftar', '2022')->count();
        $x_tkjb_tdkdpt_2023 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'X-TKJ-B')->whereYear('tgl_daftar', '2023')->count();
        $x_tkjb_tdkdpt_2024 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'X-TKJ-B')->whereYear('tgl_daftar', '2024')->count();
        $x_tkjb_tdkdpt_2025 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'X-TKJ-B')->whereYear('tgl_daftar', '2025')->count();

        $x_tkjb_dpt = HasilHitunganModel::where('kelas', 'X-TKJ-B')->where('probabilitas_dapat', '>', 0)->whereYear('tgl_daftar', $request_tahun)->count();
        $x_tkjb_tdkdpt = HasilHitunganModel::where('kelas', 'X-TKJ-B')->where('probabilitas_tdkdapat', '>', 0)->whereYear('tgl_daftar', $request_tahun)->count();

        // ** KELAS X-TKJ-C ** //
        // ? DAPAT //
        $x_tkjc_dpt_2020 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'X-TKJ-C')->whereYear('tgl_daftar', '2020')->count();
        $x_tkjc_dpt_2021 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'X-TKJ-C')->whereYear('tgl_daftar', '2021')->count();
        $x_tkjc_dpt_2022 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'X-TKJ-C')->whereYear('tgl_daftar', '2022')->count();
        $x_tkjc_dpt_2023 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'X-TKJ-C')->whereYear('tgl_daftar', '2023')->count();
        $x_tkjc_dpt_2024 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'X-TKJ-C')->whereYear('tgl_daftar', '2024')->count();
        $x_tkjc_dpt_2025 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'X-TKJ-C')->whereYear('tgl_daftar', '2025')->count();

        // ! TIDAK DAPAT //
        $x_tkjc_tdkdpt_2020 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'X-TKJ-C')->whereYear('tgl_daftar', '2020')->count();
        $x_tkjc_tdkdpt_2021 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'X-TKJ-C')->whereYear('tgl_daftar', '2021')->count();
        $x_tkjc_tdkdpt_2022 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'X-TKJ-C')->whereYear('tgl_daftar', '2022')->count();
        $x_tkjc_tdkdpt_2023 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'X-TKJ-C')->whereYear('tgl_daftar', '2023')->count();
        $x_tkjc_tdkdpt_2024 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'X-TKJ-C')->whereYear('tgl_daftar', '2024')->count();
        $x_tkjc_tdkdpt_2025 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'X-TKJ-C')->whereYear('tgl_daftar', '2025')->count();

        $x_tkjc_dpt = HasilHitunganModel::where('kelas', 'X-TKJ-C')->where('probabilitas_dapat', '>', 0)->whereYear('tgl_daftar', $request_tahun)->count();
        $x_tkjc_tdkdpt = HasilHitunganModel::where('kelas', 'X-TKJ-C')->where('probabilitas_tdkdapat', '>', 0)->whereYear('tgl_daftar', $request_tahun)->count();

        // ** KELAS X-TKJ-D ** //
        // ? DAPAT //
        $x_tkjd_dpt_2020 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'X-TKJ-D')->whereYear('tgl_daftar', '2020')->count();
        $x_tkjd_dpt_2021 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'X-TKJ-D')->whereYear('tgl_daftar', '2021')->count();
        $x_tkjd_dpt_2022 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'X-TKJ-D')->whereYear('tgl_daftar', '2022')->count();
        $x_tkjd_dpt_2023 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'X-TKJ-D')->whereYear('tgl_daftar', '2023')->count();
        $x_tkjd_dpt_2024 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'X-TKJ-D')->whereYear('tgl_daftar', '2024')->count();
        $x_tkjd_dpt_2025 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'X-TKJ-D')->whereYear('tgl_daftar', '2025')->count();

        // ! TIDAK DAPAT //
        $x_tkjd_tdkdpt_2020 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'X-TKJ-D')->whereYear('tgl_daftar', '2020')->count();
        $x_tkjd_tdkdpt_2021 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'X-TKJ-D')->whereYear('tgl_daftar', '2021')->count();
        $x_tkjd_tdkdpt_2022 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'X-TKJ-D')->whereYear('tgl_daftar', '2022')->count();
        $x_tkjd_tdkdpt_2023 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'X-TKJ-D')->whereYear('tgl_daftar', '2023')->count();
        $x_tkjd_tdkdpt_2024 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'X-TKJ-D')->whereYear('tgl_daftar', '2024')->count();
        $x_tkjd_tdkdpt_2025 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'X-TKJ-D')->whereYear('tgl_daftar', '2025')->count();

        $x_tkjd_dpt = HasilHitunganModel::where('kelas', 'X-TKJ-D')->where('probabilitas_dapat', '>', 0)->whereYear('tgl_daftar', $request_tahun)->count();
        $x_tkjd_tdkdpt = HasilHitunganModel::where('kelas', 'X-TKJ-D')->where('probabilitas_tdkdapat', '>', 0)->whereYear('tgl_daftar', $request_tahun)->count();

        // ** KELAS XI-TKJ-A ** //
        // ? DAPAT //
        $xi_tkja_dpt_2020 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XI-TKJ-A')->whereYear('tgl_daftar', '2020')->count();
        $xi_tkja_dpt_2021 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XI-TKJ-A')->whereYear('tgl_daftar', '2021')->count();
        $xi_tkja_dpt_2022 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XI-TKJ-A')->whereYear('tgl_daftar', '2022')->count();
        $xi_tkja_dpt_2023 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XI-TKJ-A')->whereYear('tgl_daftar', '2023')->count();
        $xi_tkja_dpt_2024 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XI-TKJ-A')->whereYear('tgl_daftar', '2024')->count();
        $xi_tkja_dpt_2025 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XI-TKJ-A')->whereYear('tgl_daftar', '2025')->count();

        // ! TIDAK DAPAT //
        $xi_tkja_tdkdpt_2020 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XI-TKJ-A')->whereYear('tgl_daftar', '2020')->count();
        $xi_tkja_tdkdpt_2021 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XI-TKJ-A')->whereYear('tgl_daftar', '2021')->count();
        $xi_tkja_tdkdpt_2022 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XI-TKJ-A')->whereYear('tgl_daftar', '2022')->count();
        $xi_tkja_tdkdpt_2023 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XI-TKJ-A')->whereYear('tgl_daftar', '2023')->count();
        $xi_tkja_tdkdpt_2024 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XI-TKJ-A')->whereYear('tgl_daftar', '2024')->count();
        $xi_tkja_tdkdpt_2025 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XI-TKJ-A')->whereYear('tgl_daftar', '2025')->count();

        $xi_tkja_dpt = HasilHitunganModel::where('kelas', 'XI-TKJ-A')->where('probabilitas_dapat', '>', 0)->whereYear('tgl_daftar', $request_tahun)->count();
        $xi_tkja_tdkdpt = HasilHitunganModel::where('kelas', 'XI-TKJ-A')->where('probabilitas_tdkdapat', '>', 0)->whereYear('tgl_daftar', $request_tahun)->count();

        // ** KELAS XI-TKJ-B ** //
        // ? DAPAT //
        $xi_tkjb_dpt_2020 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XI-TKJ-B')->whereYear('tgl_daftar', '2020')->count();
        $xi_tkjb_dpt_2021 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XI-TKJ-B')->whereYear('tgl_daftar', '2021')->count();
        $xi_tkjb_dpt_2022 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XI-TKJ-B')->whereYear('tgl_daftar', '2022')->count();
        $xi_tkjb_dpt_2023 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XI-TKJ-B')->whereYear('tgl_daftar', '2023')->count();
        $xi_tkjb_dpt_2024 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XI-TKJ-B')->whereYear('tgl_daftar', '2024')->count();
        $xi_tkjb_dpt_2025 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XI-TKJ-B')->whereYear('tgl_daftar', '2025')->count();

        // ! TIDAK DAPAT //
        $xi_tkjb_tdkdpt_2020 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XI-TKJ-B')->whereYear('tgl_daftar', '2020')->count();
        $xi_tkjb_tdkdpt_2021 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XI-TKJ-B')->whereYear('tgl_daftar', '2021')->count();
        $xi_tkjb_tdkdpt_2022 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XI-TKJ-B')->whereYear('tgl_daftar', '2022')->count();
        $xi_tkjb_tdkdpt_2023 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XI-TKJ-B')->whereYear('tgl_daftar', '2023')->count();
        $xi_tkjb_tdkdpt_2024 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XI-TKJ-B')->whereYear('tgl_daftar', '2024')->count();
        $xi_tkjb_tdkdpt_2025 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XI-TKJ-B')->whereYear('tgl_daftar', '2025')->count();

        $xi_tkjb_dpt = HasilHitunganModel::where('kelas', 'XI-TKJ-B')->where('probabilitas_dapat', '>', 0)->whereYear('tgl_daftar', $request_tahun)->count();
        $xi_tkjb_tdkdpt = HasilHitunganModel::where('kelas', 'XI-TKJ-B')->where('probabilitas_tdkdapat', '>', 0)->whereYear('tgl_daftar', $request_tahun)->count();

        // ** KELAS XI-TKJ-C ** //
        // ? DAPAT //
        $xi_tkjc_dpt_2020 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'xi-tkj-c')->whereYear('tgl_daftar', '2020')->count();
        $xi_tkjc_dpt_2021 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'xi-tkj-c')->whereYear('tgl_daftar', '2021')->count();
        $xi_tkjc_dpt_2022 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'xi-tkj-c')->whereYear('tgl_daftar', '2022')->count();
        $xi_tkjc_dpt_2023 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'xi-tkj-c')->whereYear('tgl_daftar', '2023')->count();
        $xi_tkjc_dpt_2024 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'xi-tkj-c')->whereYear('tgl_daftar', '2024')->count();
        $xi_tkjc_dpt_2025 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'xi-tkj-c')->whereYear('tgl_daftar', '2025')->count();

        // ! TIDAK DAPAT //
        $xi_tkjc_tdkdpt_2020 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'xi-tkj-c')->whereYear('tgl_daftar', '2020')->count();
        $xi_tkjc_tdkdpt_2021 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'xi-tkj-c')->whereYear('tgl_daftar', '2021')->count();
        $xi_tkjc_tdkdpt_2022 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'xi-tkj-c')->whereYear('tgl_daftar', '2022')->count();
        $xi_tkjc_tdkdpt_2023 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'xi-tkj-c')->whereYear('tgl_daftar', '2023')->count();
        $xi_tkjc_tdkdpt_2024 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'xi-tkj-c')->whereYear('tgl_daftar', '2024')->count();
        $xi_tkjc_tdkdpt_2025 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'xi-tkj-c')->whereYear('tgl_daftar', '2025')->count();

        $xi_tkjc_dpt = HasilHitunganModel::where('kelas', 'XI-TKJ-C')->where('probabilitas_dapat', '>', 0)->whereYear('tgl_daftar', $request_tahun)->count();
        $xi_tkjc_tdkdpt = HasilHitunganModel::where('kelas', 'XI-TKJ-C')->where('probabilitas_tdkdapat', '>', 0)->whereYear('tgl_daftar', $request_tahun)->count();

        // ** KELAS XII-TKJ-A ** //
        // ? DAPAT //
        $xii_tkja_dpt_2020 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XII-TKJ-A')->whereYear('tgl_daftar', '2020')->count();
        $xii_tkja_dpt_2021 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XII-TKJ-A')->whereYear('tgl_daftar', '2021')->count();
        $xii_tkja_dpt_2022 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XII-TKJ-A')->whereYear('tgl_daftar', '2022')->count();
        $xii_tkja_dpt_2023 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XII-TKJ-A')->whereYear('tgl_daftar', '2023')->count();
        $xii_tkja_dpt_2024 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XII-TKJ-A')->whereYear('tgl_daftar', '2024')->count();
        $xii_tkja_dpt_2025 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XII-TKJ-A')->whereYear('tgl_daftar', '2025')->count();

        // ! TIDAK DAPAT //
        $xii_tkja_tdkdpt_2020 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XII-TKJ-A')->whereYear('tgl_daftar', '2020')->count();
        $xii_tkja_tdkdpt_2021 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XII-TKJ-A')->whereYear('tgl_daftar', '2021')->count();
        $xii_tkja_tdkdpt_2022 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XII-TKJ-A')->whereYear('tgl_daftar', '2022')->count();
        $xii_tkja_tdkdpt_2023 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XII-TKJ-A')->whereYear('tgl_daftar', '2023')->count();
        $xii_tkja_tdkdpt_2024 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XII-TKJ-A')->whereYear('tgl_daftar', '2024')->count();
        $xii_tkja_tdkdpt_2025 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XII-TKJ-A')->whereYear('tgl_daftar', '2025')->count();

        $xii_tkja_dpt = HasilHitunganModel::where('kelas', 'XII-TKJ-A')->where('probabilitas_dapat', '>', 0)->whereYear('tgl_daftar', $request_tahun)->count();
        $xii_tkja_tdkdpt = HasilHitunganModel::where('kelas', 'XII-TKJ-A')->where('probabilitas_tdkdapat', '>', 0)->whereYear('tgl_daftar', $request_tahun)->count();

        // ** KELAS XII-TKJ-B ** //
        // ? DAPAT //
        $xii_tkjb_dpt_2020 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XII-TKJ-B')->whereYear('tgl_daftar', '2020')->count();
        $xii_tkjb_dpt_2021 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XII-TKJ-B')->whereYear('tgl_daftar', '2021')->count();
        $xii_tkjb_dpt_2022 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XII-TKJ-B')->whereYear('tgl_daftar', '2022')->count();
        $xii_tkjb_dpt_2023 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XII-TKJ-B')->whereYear('tgl_daftar', '2023')->count();
        $xii_tkjb_dpt_2024 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XII-TKJ-B')->whereYear('tgl_daftar', '2024')->count();
        $xii_tkjb_dpt_2025 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XII-TKJ-B')->whereYear('tgl_daftar', '2025')->count();

        // ! TIDAK DAPAT //
        $xii_tkjb_tdkdpt_2020 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XII-TKJ-B')->whereYear('tgl_daftar', '2020')->count();
        $xii_tkjb_tdkdpt_2021 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XII-TKJ-B')->whereYear('tgl_daftar', '2021')->count();
        $xii_tkjb_tdkdpt_2022 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XII-TKJ-B')->whereYear('tgl_daftar', '2022')->count();
        $xii_tkjb_tdkdpt_2023 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XII-TKJ-B')->whereYear('tgl_daftar', '2023')->count();
        $xii_tkjb_tdkdpt_2024 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XII-TKJ-B')->whereYear('tgl_daftar', '2024')->count();
        $xii_tkjb_tdkdpt_2025 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XII-TKJ-B')->whereYear('tgl_daftar', '2025')->count();

        $xii_tkjb_dpt = HasilHitunganModel::where('kelas', 'XII-TKJ-A')->where('probabilitas_dapat', '>', 0)->whereYear('tgl_daftar', $request_tahun)->count();
        $xii_tkjb_tdkdpt = HasilHitunganModel::where('kelas', 'XII-TKJ-A')->where('probabilitas_tdkdapat', '>', 0)->whereYear('tgl_daftar', $request_tahun)->count();

        // ** KELAS XII-TKJ-C ** //
        // ? DAPAT //
        $xii_tkjc_dpt_2020 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XII-TKJ-C')->whereYear('tgl_daftar', '2020')->count();
        $xii_tkjc_dpt_2021 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XII-TKJ-C')->whereYear('tgl_daftar', '2021')->count();
        $xii_tkjc_dpt_2022 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XII-TKJ-C')->whereYear('tgl_daftar', '2022')->count();
        $xii_tkjc_dpt_2023 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XII-TKJ-C')->whereYear('tgl_daftar', '2023')->count();
        $xii_tkjc_dpt_2024 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XII-TKJ-C')->whereYear('tgl_daftar', '2024')->count();
        $xii_tkjc_dpt_2025 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XII-TKJ-C')->whereYear('tgl_daftar', '2025')->count();

        // ! TIDAK DAPAT //
        $xii_tkjc_tdkdpt_2020 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XII-TKJ-C')->whereYear('tgl_daftar', '2020')->count();
        $xii_tkjc_tdkdpt_2021 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XII-TKJ-C')->whereYear('tgl_daftar', '2021')->count();
        $xii_tkjc_tdkdpt_2022 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XII-TKJ-C')->whereYear('tgl_daftar', '2022')->count();
        $xii_tkjc_tdkdpt_2023 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XII-TKJ-C')->whereYear('tgl_daftar', '2023')->count();
        $xii_tkjc_tdkdpt_2024 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XII-TKJ-C')->whereYear('tgl_daftar', '2024')->count();
        $xii_tkjc_tdkdpt_2025 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XII-TKJ-C')->whereYear('tgl_daftar', '2025')->count();

        $xii_tkjc_dpt = HasilHitunganModel::where('kelas', 'XII-TKJ-C')->where('probabilitas_dapat', '>', 0)->whereYear('tgl_daftar', $request_tahun)->count();
        $xii_tkjc_tdkdpt = HasilHitunganModel::where('kelas', 'XII-TKJ-C')->where('probabilitas_tdkdapat', '>', 0)->whereYear('tgl_daftar', $request_tahun)->count();

        // ** KELAS X-TKR-A ** //
        // ? DAPAT //
        $x_tkra_dpt_2020 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'X-TKR-A')->whereYear('tgl_daftar', '2020')->count();
        $x_tkra_dpt_2021 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'X-TKR-A')->whereYear('tgl_daftar', '2021')->count();
        $x_tkra_dpt_2022 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'X-TKR-A')->whereYear('tgl_daftar', '2022')->count();
        $x_tkra_dpt_2023 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'X-TKR-A')->whereYear('tgl_daftar', '2023')->count();
        $x_tkra_dpt_2024 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'X-TKR-A')->whereYear('tgl_daftar', '2024')->count();
        $x_tkra_dpt_2025 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'X-TKR-A')->whereYear('tgl_daftar', '2025')->count();

        // ! TIDAK DAPAT //
        $x_tkra_tdkdpt_2020 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'X-TKR-A')->whereYear('tgl_daftar', '2020')->count();
        $x_tkra_tdkdpt_2021 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'X-TKR-A')->whereYear('tgl_daftar', '2021')->count();
        $x_tkra_tdkdpt_2022 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'X-TKR-A')->whereYear('tgl_daftar', '2022')->count();
        $x_tkra_tdkdpt_2023 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'X-TKR-A')->whereYear('tgl_daftar', '2023')->count();
        $x_tkra_tdkdpt_2024 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'X-TKR-A')->whereYear('tgl_daftar', '2024')->count();
        $x_tkra_tdkdpt_2025 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'X-TKR-A')->whereYear('tgl_daftar', '2025')->count();

        $x_tkra_dpt = HasilHitunganModel::where('kelas', 'X-TKR-A')->where('probabilitas_dapat', '>', 0)->whereYear('tgl_daftar', $request_tahun)->count();
        $x_tkra_tdkdpt = HasilHitunganModel::where('kelas', 'X-TKR-A')->where('probabilitas_tdkdapat', '>', 0)->whereYear('tgl_daftar', $request_tahun)->count();

        // ** KELAS X-TKR-B ** //
        // ? DAPAT //
        $x_tkrb_dpt_2020 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'X-TKR-B')->whereYear('tgl_daftar', '2020')->count();
        $x_tkrb_dpt_2021 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'X-TKR-B')->whereYear('tgl_daftar', '2021')->count();
        $x_tkrb_dpt_2022 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'X-TKR-B')->whereYear('tgl_daftar', '2022')->count();
        $x_tkrb_dpt_2023 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'X-TKR-B')->whereYear('tgl_daftar', '2023')->count();
        $x_tkrb_dpt_2024 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'X-TKR-B')->whereYear('tgl_daftar', '2024')->count();
        $x_tkrb_dpt_2025 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'X-TKR-B')->whereYear('tgl_daftar', '2025')->count();

        // ! TIDAK DAPAT //
        $x_tkrb_tdkdpt_2020 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'X-TKR-B')->whereYear('tgl_daftar', '2020')->count();
        $x_tkrb_tdkdpt_2021 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'X-TKR-B')->whereYear('tgl_daftar', '2021')->count();
        $x_tkrb_tdkdpt_2022 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'X-TKR-B')->whereYear('tgl_daftar', '2022')->count();
        $x_tkrb_tdkdpt_2023 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'X-TKR-B')->whereYear('tgl_daftar', '2023')->count();
        $x_tkrb_tdkdpt_2024 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'X-TKR-B')->whereYear('tgl_daftar', '2024')->count();
        $x_tkrb_tdkdpt_2025 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'X-TKR-B')->whereYear('tgl_daftar', '2025')->count();

        $x_tkrb_dpt = HasilHitunganModel::where('kelas', 'X-TKR-B')->where('probabilitas_dapat', '>', 0)->whereYear('tgl_daftar', $request_tahun)->count();
        $x_tkrb_tdkdpt = HasilHitunganModel::where('kelas', 'X-TKR-B')->where('probabilitas_tdkdapat', '>', 0)->whereYear('tgl_daftar', $request_tahun)->count();

        // ** KELAS X-TKR-C ** //
        // ? DAPAT //
        $x_tkrc_dpt_2020 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'X-TKR-C')->whereYear('tgl_daftar', '2020')->count();
        $x_tkrc_dpt_2021 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'X-TKR-C')->whereYear('tgl_daftar', '2021')->count();
        $x_tkrc_dpt_2022 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'X-TKR-C')->whereYear('tgl_daftar', '2022')->count();
        $x_tkrc_dpt_2023 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'X-TKR-C')->whereYear('tgl_daftar', '2023')->count();
        $x_tkrc_dpt_2024 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'X-TKR-C')->whereYear('tgl_daftar', '2024')->count();
        $x_tkrc_dpt_2025 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'X-TKR-C')->whereYear('tgl_daftar', '2025')->count();

        // ! TIDAK DAPAT //
        $x_tkrc_tdkdpt_2020 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'X-TKR-C')->whereYear('tgl_daftar', '2020')->count();
        $x_tkrc_tdkdpt_2021 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'X-TKR-C')->whereYear('tgl_daftar', '2021')->count();
        $x_tkrc_tdkdpt_2022 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'X-TKR-C')->whereYear('tgl_daftar', '2022')->count();
        $x_tkrc_tdkdpt_2023 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'X-TKR-C')->whereYear('tgl_daftar', '2023')->count();
        $x_tkrc_tdkdpt_2024 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'X-TKR-C')->whereYear('tgl_daftar', '2024')->count();
        $x_tkrc_tdkdpt_2025 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'X-TKR-C')->whereYear('tgl_daftar', '2025')->count();

        $x_tkrc_dpt = HasilHitunganModel::where('kelas', 'X-TKR-C')->where('probabilitas_dapat', '>', 0)->whereYear('tgl_daftar', $request_tahun)->count();
        $x_tkrc_tdkdpt = HasilHitunganModel::where('kelas', 'X-TKR-C')->where('probabilitas_tdkdapat', '>', 0)->whereYear('tgl_daftar', $request_tahun)->count();

        // ** KELAS XI-TKR-A ** //
        // ? DAPAT //
        $xi_tkra_dpt_2020 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XI-TKR-A')->whereYear('tgl_daftar', '2020')->count();
        $xi_tkra_dpt_2021 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XI-TKR-A')->whereYear('tgl_daftar', '2021')->count();
        $xi_tkra_dpt_2022 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XI-TKR-A')->whereYear('tgl_daftar', '2022')->count();
        $xi_tkra_dpt_2023 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XI-TKR-A')->whereYear('tgl_daftar', '2023')->count();
        $xi_tkra_dpt_2024 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XI-TKR-A')->whereYear('tgl_daftar', '2024')->count();
        $xi_tkra_dpt_2025 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XI-TKR-A')->whereYear('tgl_daftar', '2025')->count();

        // ! TIDAK DAPAT //
        $xi_tkra_tdkdpt_2020 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XI-TKR-A')->whereYear('tgl_daftar', '2020')->count();
        $xi_tkra_tdkdpt_2021 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XI-TKR-A')->whereYear('tgl_daftar', '2021')->count();
        $xi_tkra_tdkdpt_2022 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XI-TKR-A')->whereYear('tgl_daftar', '2022')->count();
        $xi_tkra_tdkdpt_2023 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XI-TKR-A')->whereYear('tgl_daftar', '2023')->count();
        $xi_tkra_tdkdpt_2024 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XI-TKR-A')->whereYear('tgl_daftar', '2024')->count();
        $xi_tkra_tdkdpt_2025 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XI-TKR-A')->whereYear('tgl_daftar', '2025')->count();

        $xi_tkra_dpt = HasilHitunganModel::where('kelas', 'XI-TKR-A')->where('probabilitas_dapat', '>', 0)->whereYear('tgl_daftar', $request_tahun)->count();
        $xi_tkra_tdkdpt = HasilHitunganModel::where('kelas', 'XI-TKR-A')->where('probabilitas_tdkdapat', '>', 0)->whereYear('tgl_daftar', $request_tahun)->count();

        // ** KELAS XI-TKR-B ** //
        // ? DAPAT //
        $xi_tkrb_dpt_2020 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XI-TKR-B')->whereYear('tgl_daftar', '2020')->count();
        $xi_tkrb_dpt_2021 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XI-TKR-B')->whereYear('tgl_daftar', '2021')->count();
        $xi_tkrb_dpt_2022 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XI-TKR-B')->whereYear('tgl_daftar', '2022')->count();
        $xi_tkrb_dpt_2023 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XI-TKR-B')->whereYear('tgl_daftar', '2023')->count();
        $xi_tkrb_dpt_2024 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XI-TKR-B')->whereYear('tgl_daftar', '2024')->count();
        $xi_tkrb_dpt_2025 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XI-TKR-B')->whereYear('tgl_daftar', '2025')->count();

        // ! TIDAK DAPAT //
        $xi_tkrb_tdkdpt_2020 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XI-TKR-B')->whereYear('tgl_daftar', '2020')->count();
        $xi_tkrb_tdkdpt_2021 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XI-TKR-B')->whereYear('tgl_daftar', '2021')->count();
        $xi_tkrb_tdkdpt_2022 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XI-TKR-B')->whereYear('tgl_daftar', '2022')->count();
        $xi_tkrb_tdkdpt_2023 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XI-TKR-B')->whereYear('tgl_daftar', '2023')->count();
        $xi_tkrb_tdkdpt_2024 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XI-TKR-B')->whereYear('tgl_daftar', '2024')->count();
        $xi_tkrb_tdkdpt_2025 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XI-TKR-B')->whereYear('tgl_daftar', '2025')->count();

        $xi_tkrb_dpt = HasilHitunganModel::where('kelas', 'XI-TKR-B')->where('probabilitas_dapat', '>', 0)->whereYear('tgl_daftar', $request_tahun)->count();
        $xi_tkrb_tdkdpt = HasilHitunganModel::where('kelas', 'XI-TKR-B')->where('probabilitas_tdkdapat', '>', 0)->whereYear('tgl_daftar', $request_tahun)->count();

        // ** KELAS XI-TKR-C ** //
        // ? DAPAT //
        $xi_tkrc_dpt_2020 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XI-TKR-C')->whereYear('tgl_daftar', '2020')->count();
        $xi_tkrc_dpt_2021 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XI-TKR-C')->whereYear('tgl_daftar', '2021')->count();
        $xi_tkrc_dpt_2022 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XI-TKR-C')->whereYear('tgl_daftar', '2022')->count();
        $xi_tkrc_dpt_2023 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XI-TKR-C')->whereYear('tgl_daftar', '2023')->count();
        $xi_tkrc_dpt_2024 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XI-TKR-C')->whereYear('tgl_daftar', '2024')->count();
        $xi_tkrc_dpt_2025 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XI-TKR-C')->whereYear('tgl_daftar', '2025')->count();

        // ! TIDAK DAPAT //
        $xi_tkrc_tdkdpt_2020 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XI-TKR-C')->whereYear('tgl_daftar', '2020')->count();
        $xi_tkrc_tdkdpt_2021 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XI-TKR-C')->whereYear('tgl_daftar', '2021')->count();
        $xi_tkrc_tdkdpt_2022 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XI-TKR-C')->whereYear('tgl_daftar', '2022')->count();
        $xi_tkrc_tdkdpt_2023 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XI-TKR-C')->whereYear('tgl_daftar', '2023')->count();
        $xi_tkrc_tdkdpt_2024 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XI-TKR-C')->whereYear('tgl_daftar', '2024')->count();
        $xi_tkrc_tdkdpt_2025 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XI-TKR-C')->whereYear('tgl_daftar', '2025')->count();

        $xi_tkrc_dpt = HasilHitunganModel::where('kelas', 'XI-TKR-C')->where('probabilitas_dapat', '>', 0)->whereYear('tgl_daftar', $request_tahun)->count();
        $xi_tkrc_tdkdpt = HasilHitunganModel::where('kelas', 'XI-TKR-C')->where('probabilitas_tdkdapat', '>', 0)->whereYear('tgl_daftar', $request_tahun)->count();

        // ** KELAS XII-TKR-A ** //
        // ? DAPAT //
        $xii_tkra_dpt_2020 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XII-TKR-A')->whereYear('tgl_daftar', '2020')->count();
        $xii_tkra_dpt_2021 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XII-TKR-A')->whereYear('tgl_daftar', '2021')->count();
        $xii_tkra_dpt_2022 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XII-TKR-A')->whereYear('tgl_daftar', '2022')->count();
        $xii_tkra_dpt_2023 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XII-TKR-A')->whereYear('tgl_daftar', '2023')->count();
        $xii_tkra_dpt_2024 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XII-TKR-A')->whereYear('tgl_daftar', '2024')->count();
        $xii_tkra_dpt_2025 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XII-TKR-A')->whereYear('tgl_daftar', '2025')->count();

        // ! TIDAK DAPAT //
        $xii_tkra_tdkdpt_2020 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XII-TKR-A')->whereYear('tgl_daftar', '2020')->count();
        $xii_tkra_tdkdpt_2021 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XII-TKR-A')->whereYear('tgl_daftar', '2021')->count();
        $xii_tkra_tdkdpt_2022 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XII-TKR-A')->whereYear('tgl_daftar', '2022')->count();
        $xii_tkra_tdkdpt_2023 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XII-TKR-A')->whereYear('tgl_daftar', '2023')->count();
        $xii_tkra_tdkdpt_2024 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XII-TKR-A')->whereYear('tgl_daftar', '2024')->count();
        $xii_tkra_tdkdpt_2025 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XII-TKR-A')->whereYear('tgl_daftar', '2025')->count();

        $xii_tkra_dpt = HasilHitunganModel::where('kelas', 'XII-TKR-A')->where('probabilitas_dapat', '>', 0)->whereYear('tgl_daftar', $request_tahun)->count();
        $xii_tkra_tdkdpt = HasilHitunganModel::where('kelas', 'XII-TKR-A')->where('probabilitas_tdkdapat', '>', 0)->whereYear('tgl_daftar', $request_tahun)->count();

        // ** KELAS XII-TKR-B ** //
        // ? DAPAT //
        $xii_tkrb_dpt_2020 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XII-TKR-B')->whereYear('tgl_daftar', '2020')->count();
        $xii_tkrb_dpt_2021 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XII-TKR-B')->whereYear('tgl_daftar', '2021')->count();
        $xii_tkrb_dpt_2022 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XII-TKR-B')->whereYear('tgl_daftar', '2022')->count();
        $xii_tkrb_dpt_2023 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XII-TKR-B')->whereYear('tgl_daftar', '2023')->count();
        $xii_tkrb_dpt_2024 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XII-TKR-B')->whereYear('tgl_daftar', '2024')->count();
        $xii_tkrb_dpt_2025 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XII-TKR-B')->whereYear('tgl_daftar', '2025')->count();

        // ! TIDAK DAPAT //
        $xii_tkrb_tdkdpt_2020 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XII-TKR-B')->whereYear('tgl_daftar', '2020')->count();
        $xii_tkrb_tdkdpt_2021 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XII-TKR-B')->whereYear('tgl_daftar', '2021')->count();
        $xii_tkrb_tdkdpt_2022 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XII-TKR-B')->whereYear('tgl_daftar', '2022')->count();
        $xii_tkrb_tdkdpt_2023 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XII-TKR-B')->whereYear('tgl_daftar', '2023')->count();
        $xii_tkrb_tdkdpt_2024 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XII-TKR-B')->whereYear('tgl_daftar', '2024')->count();
        $xii_tkrb_tdkdpt_2025 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XII-TKR-B')->whereYear('tgl_daftar', '2025')->count();

        $xii_tkrb_dpt = HasilHitunganModel::where('kelas', 'XII-TKR-B')->where('probabilitas_dapat', '>', 0)->whereYear('tgl_daftar', $request_tahun)->count();
        $xii_tkrb_tdkdpt = HasilHitunganModel::where('kelas', 'XII-TKR-B')->where('probabilitas_tdkdapat', '>', 0)->whereYear('tgl_daftar', $request_tahun)->count();

        // ** KELAS XII-TKR-C ** //
        // ? DAPAT //
        $xii_tkrc_dpt_2020 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XII-TKR-C')->whereYear('tgl_daftar', '2020')->count();
        $xii_tkrc_dpt_2021 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XII-TKR-C')->whereYear('tgl_daftar', '2021')->count();
        $xii_tkrc_dpt_2022 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XII-TKR-C')->whereYear('tgl_daftar', '2022')->count();
        $xii_tkrc_dpt_2023 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XII-TKR-C')->whereYear('tgl_daftar', '2023')->count();
        $xii_tkrc_dpt_2024 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XII-TKR-C')->whereYear('tgl_daftar', '2024')->count();
        $xii_tkrc_dpt_2025 = HasilHitunganModel::where('probabilitas_dapat', '>', 0)->where('kelas', 'XII-TKR-C')->whereYear('tgl_daftar', '2025')->count();

        // ! TIDAK DAPAT //
        $xii_tkrc_tdkdpt_2020 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XII-TKR-C')->whereYear('tgl_daftar', '2020')->count();
        $xii_tkrc_tdkdpt_2021 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XII-TKR-C')->whereYear('tgl_daftar', '2021')->count();
        $xii_tkrc_tdkdpt_2022 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XII-TKR-C')->whereYear('tgl_daftar', '2022')->count();
        $xii_tkrc_tdkdpt_2023 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XII-TKR-C')->whereYear('tgl_daftar', '2023')->count();
        $xii_tkrc_tdkdpt_2024 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XII-TKR-C')->whereYear('tgl_daftar', '2024')->count();
        $xii_tkrc_tdkdpt_2025 = HasilHitunganModel::where('probabilitas_tdkdapat', '>', 0)->where('kelas', 'XII-TKR-C')->whereYear('tgl_daftar', '2025')->count();

        $xii_tkrc_dpt = HasilHitunganModel::where('kelas', 'XII-TKR-C')->where('probabilitas_dapat', '>', 0)->whereYear('tgl_daftar', $request_tahun)->count();
        $xii_tkrc_tdkdpt = HasilHitunganModel::where('kelas', 'XII-TKR-C')->where('probabilitas_tdkdapat', '>', 0)->whereYear('tgl_daftar', $request_tahun)->count();


        return view(
            'admin.analisa_data.data_bansos.status_penerimaan_bansos.result',
            compact(
                'data',
                'request_tahun',
                'x_tkja_dpt',
                'x_tkja_tdkdpt',
                'x_tkja_dpt_2020',
                'x_tkja_dpt_2021',
                'x_tkja_dpt_2022',
                'x_tkja_dpt_2023',
                'x_tkja_dpt_2024',
                'x_tkja_dpt_2025',
                'x_tkja_tdkdpt_2020',
                'x_tkja_tdkdpt_2021',
                'x_tkja_tdkdpt_2022',
                'x_tkja_tdkdpt_2023',
                'x_tkja_tdkdpt_2024',
                'x_tkja_tdkdpt_2025',
                'x_tkjb_dpt',
                'x_tkjb_tdkdpt',
                'x_tkjb_dpt_2020',
                'x_tkjb_dpt_2021',
                'x_tkjb_dpt_2022',
                'x_tkjb_dpt_2023',
                'x_tkjb_dpt_2024',
                'x_tkjb_dpt_2025',
                'x_tkjb_tdkdpt_2020',
                'x_tkjb_tdkdpt_2021',
                'x_tkjb_tdkdpt_2022',
                'x_tkjb_tdkdpt_2023',
                'x_tkjb_tdkdpt_2024',
                'x_tkjb_tdkdpt_2025',
                'x_tkjc_dpt',
                'x_tkjc_tdkdpt',
                'x_tkjc_dpt_2020',
                'x_tkjc_dpt_2021',
                'x_tkjc_dpt_2022',
                'x_tkjc_dpt_2023',
                'x_tkjc_dpt_2024',
                'x_tkjc_dpt_2025',
                'x_tkjc_tdkdpt_2020',
                'x_tkjc_tdkdpt_2021',
                'x_tkjc_tdkdpt_2022',
                'x_tkjc_tdkdpt_2023',
                'x_tkjc_tdkdpt_2024',
                'x_tkjc_tdkdpt_2025',
                'x_tkjd_dpt',
                'x_tkjd_tdkdpt',
                'x_tkjd_dpt_2020',
                'x_tkjd_dpt_2021',
                'x_tkjd_dpt_2022',
                'x_tkjd_dpt_2023',
                'x_tkjd_dpt_2024',
                'x_tkjd_dpt_2025',
                'x_tkjd_tdkdpt_2020',
                'x_tkjd_tdkdpt_2021',
                'x_tkjd_tdkdpt_2022',
                'x_tkjd_tdkdpt_2023',
                'x_tkjd_tdkdpt_2024',
                'x_tkjd_tdkdpt_2025',
                'xi_tkja_dpt',
                'xi_tkja_tdkdpt',
                'xi_tkja_dpt_2020',
                'xi_tkja_dpt_2021',
                'xi_tkja_dpt_2022',
                'xi_tkja_dpt_2023',
                'xi_tkja_dpt_2024',
                'xi_tkja_dpt_2025',
                'xi_tkja_tdkdpt_2020',
                'xi_tkja_tdkdpt_2021',
                'xi_tkja_tdkdpt_2022',
                'xi_tkja_tdkdpt_2023',
                'xi_tkja_tdkdpt_2024',
                'xi_tkja_tdkdpt_2025',
                'xi_tkjb_dpt',
                'xi_tkjb_tdkdpt',
                'xi_tkjb_dpt_2020',
                'xi_tkjb_dpt_2021',
                'xi_tkjb_dpt_2022',
                'xi_tkjb_dpt_2023',
                'xi_tkjb_dpt_2024',
                'xi_tkjb_dpt_2025',
                'xi_tkjb_tdkdpt_2020',
                'xi_tkjb_tdkdpt_2021',
                'xi_tkjb_tdkdpt_2022',
                'xi_tkjb_tdkdpt_2023',
                'xi_tkjb_tdkdpt_2024',
                'xi_tkjb_tdkdpt_2025',
                'xi_tkjc_dpt',
                'xi_tkjc_tdkdpt',
                'xi_tkjc_dpt_2020',
                'xi_tkjc_dpt_2021',
                'xi_tkjc_dpt_2022',
                'xi_tkjc_dpt_2023',
                'xi_tkjc_dpt_2024',
                'xi_tkjc_dpt_2025',
                'xi_tkjc_tdkdpt_2020',
                'xi_tkjc_tdkdpt_2021',
                'xi_tkjc_tdkdpt_2022',
                'xi_tkjc_tdkdpt_2023',
                'xi_tkjc_tdkdpt_2024',
                'xi_tkjc_tdkdpt_2025',
                'xii_tkja_dpt',
                'xii_tkja_tdkdpt',
                'xii_tkja_dpt_2020',
                'xii_tkja_dpt_2021',
                'xii_tkja_dpt_2022',
                'xii_tkja_dpt_2023',
                'xii_tkja_dpt_2024',
                'xii_tkja_dpt_2025',
                'xii_tkja_tdkdpt_2020',
                'xii_tkja_tdkdpt_2021',
                'xii_tkja_tdkdpt_2022',
                'xii_tkja_tdkdpt_2023',
                'xii_tkja_tdkdpt_2024',
                'xii_tkja_tdkdpt_2025',
                'x_tkra_dpt',
                'x_tkra_tdkdpt',
                'x_tkra_dpt_2020',
                'x_tkra_dpt_2021',
                'x_tkra_dpt_2022',
                'x_tkra_dpt_2023',
                'x_tkra_dpt_2024',
                'x_tkra_dpt_2025',
                'x_tkra_tdkdpt_2020',
                'x_tkra_tdkdpt_2021',
                'x_tkra_tdkdpt_2022',
                'x_tkra_tdkdpt_2023',
                'x_tkra_tdkdpt_2024',
                'x_tkra_tdkdpt_2025',
                'x_tkrb_dpt',
                'x_tkrb_tdkdpt',
                'x_tkrb_dpt_2020',
                'x_tkrb_dpt_2021',
                'x_tkrb_dpt_2022',
                'x_tkrb_dpt_2023',
                'x_tkrb_dpt_2024',
                'x_tkrb_dpt_2025',
                'x_tkrb_tdkdpt_2020',
                'x_tkrb_tdkdpt_2021',
                'x_tkrb_tdkdpt_2022',
                'x_tkrb_tdkdpt_2023',
                'x_tkrb_tdkdpt_2024',
                'x_tkrb_tdkdpt_2025',
                'x_tkrc_dpt',
                'x_tkrc_tdkdpt',
                'x_tkrc_dpt_2020',
                'x_tkrc_dpt_2021',
                'x_tkrc_dpt_2022',
                'x_tkrc_dpt_2023',
                'x_tkrc_dpt_2024',
                'x_tkrc_dpt_2025',
                'x_tkrc_tdkdpt_2020',
                'x_tkrc_tdkdpt_2021',
                'x_tkrc_tdkdpt_2022',
                'x_tkrc_tdkdpt_2023',
                'x_tkrc_tdkdpt_2024',
                'x_tkrc_tdkdpt_2025',
                'xi_tkra_dpt',
                'xi_tkra_tdkdpt',
                'xi_tkra_dpt_2020',
                'xi_tkra_dpt_2021',
                'xi_tkra_dpt_2022',
                'xi_tkra_dpt_2023',
                'xi_tkra_dpt_2024',
                'xi_tkra_dpt_2025',
                'xi_tkra_tdkdpt_2020',
                'xi_tkra_tdkdpt_2021',
                'xi_tkra_tdkdpt_2022',
                'xi_tkra_tdkdpt_2023',
                'xi_tkra_tdkdpt_2024',
                'xi_tkra_tdkdpt_2025',
                'xi_tkrb_dpt',
                'xi_tkrb_tdkdpt',
                'xi_tkrb_dpt_2020',
                'xi_tkrb_dpt_2021',
                'xi_tkrb_dpt_2022',
                'xi_tkrb_dpt_2023',
                'xi_tkrb_dpt_2024',
                'xi_tkrb_dpt_2025',
                'xi_tkrb_tdkdpt_2020',
                'xi_tkrb_tdkdpt_2021',
                'xi_tkrb_tdkdpt_2022',
                'xi_tkrb_tdkdpt_2023',
                'xi_tkrb_tdkdpt_2024',
                'xi_tkrb_tdkdpt_2025',
                'xi_tkrc_dpt',
                'xi_tkrc_tdkdpt',
                'xi_tkrc_dpt_2020',
                'xi_tkrc_dpt_2021',
                'xi_tkrc_dpt_2022',
                'xi_tkrc_dpt_2023',
                'xi_tkrc_dpt_2024',
                'xi_tkrc_dpt_2025',
                'xi_tkrc_tdkdpt_2020',
                'xi_tkrc_tdkdpt_2021',
                'xi_tkrc_tdkdpt_2022',
                'xi_tkrc_tdkdpt_2023',
                'xi_tkrc_tdkdpt_2024',
                'xi_tkrc_tdkdpt_2025',
                'xii_tkra_dpt',
                'xii_tkra_tdkdpt',
                'xii_tkra_dpt_2020',
                'xii_tkra_dpt_2021',
                'xii_tkra_dpt_2022',
                'xii_tkra_dpt_2023',
                'xii_tkra_dpt_2024',
                'xii_tkra_dpt_2025',
                'xii_tkra_tdkdpt_2020',
                'xii_tkra_tdkdpt_2021',
                'xii_tkra_tdkdpt_2022',
                'xii_tkra_tdkdpt_2023',
                'xii_tkra_tdkdpt_2024',
                'xii_tkra_tdkdpt_2025',
                'xii_tkrb_dpt',
                'xii_tkrb_tdkdpt',
                'xii_tkrb_dpt_2020',
                'xii_tkrb_dpt_2021',
                'xii_tkrb_dpt_2022',
                'xii_tkrb_dpt_2023',
                'xii_tkrb_dpt_2024',
                'xii_tkrb_dpt_2025',
                'xii_tkrb_tdkdpt_2020',
                'xii_tkrb_tdkdpt_2021',
                'xii_tkrb_tdkdpt_2022',
                'xii_tkrb_tdkdpt_2023',
                'xii_tkrb_tdkdpt_2024',
                'xii_tkrb_tdkdpt_2025',
                'xii_tkrc_dpt',
                'xii_tkrc_tdkdpt',
                'xii_tkrc_dpt_2020',
                'xii_tkrc_dpt_2021',
                'xii_tkrc_dpt_2022',
                'xii_tkrc_dpt_2023',
                'xii_tkrc_dpt_2024',
                'xii_tkrc_dpt_2025',
                'xii_tkrc_tdkdpt_2020',
                'xii_tkrc_tdkdpt_2021',
                'xii_tkrc_tdkdpt_2022',
                'xii_tkrc_tdkdpt_2023',
                'xii_tkrc_tdkdpt_2024',
                'xii_tkrc_tdkdpt_2025'
            )
        );
    }
    public function status_kelengkapan_ortu()
    {
        return view('admin.analisa_data.data_bansos.status_kelengkapan_ortu.index');
    }

    public function post_status_kelengkapan_ortu(Request $request)
    {
        $request_tahun = $request->tahun;

        // ? X-TKJ-A LENGKAP TIDAK LENGKAP ? //
        $x_tkja_lengkap = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'X-TKJ-A')->whereYear('tgl_daftar', $request_tahun)->count();
        $x_tkja_tdklengkap = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'X-TKJ-A')->whereYear('tgl_daftar', $request_tahun)->count();

        // ** ORTU LENGKAP PER TAHUN ** // 
        $x_tkja_lengkap_2020 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'X-TKJ-A')->whereYear('tgl_daftar', '2020')->count();
        $x_tkja_lengkap_2021 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'X-TKJ-A')->whereYear('tgl_daftar', '2021')->count();
        $x_tkja_lengkap_2022 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'X-TKJ-A')->whereYear('tgl_daftar', '2022')->count();
        $x_tkja_lengkap_2023 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'X-TKJ-A')->whereYear('tgl_daftar', '2023')->count();
        $x_tkja_lengkap_2024 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'X-TKJ-A')->whereYear('tgl_daftar', '2024')->count();
        $x_tkja_lengkap_2025 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'X-TKJ-A')->whereYear('tgl_daftar', '2025')->count();

        // ! ORTU TIDAK LENGKAP PER TAHUN ** // 
        $x_tkja_tdklengkap_2020 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'X-TKJ-A')->whereYear('tgl_daftar', '2020')->count();
        $x_tkja_tdklengkap_2021 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'X-TKJ-A')->whereYear('tgl_daftar', '2021')->count();
        $x_tkja_tdklengkap_2022 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'X-TKJ-A')->whereYear('tgl_daftar', '2022')->count();
        $x_tkja_tdklengkap_2023 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'X-TKJ-A')->whereYear('tgl_daftar', '2023')->count();
        $x_tkja_tdklengkap_2024 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'X-TKJ-A')->whereYear('tgl_daftar', '2024')->count();
        $x_tkja_tdklengkap_2025 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'X-TKJ-A')->whereYear('tgl_daftar', '2025')->count();

        // ? X-TKJ-B LENGKAP TIDAK LENGKAP ? //
        $x_tkjb_lengkap = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'X-TKJ-B')->whereYear('tgl_daftar', $request_tahun)->count();
        $x_tkjb_tdklengkap = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'X-TKJ-B')->whereYear('tgl_daftar', $request_tahun)->count();

        // ** ORTU LENGKAP PER TAHUN ** // 
        $x_tkjb_lengkap_2020 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'X-TKJ-B')->whereYear('tgl_daftar', '2020')->count();
        $x_tkjb_lengkap_2021 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'X-TKJ-B')->whereYear('tgl_daftar', '2021')->count();
        $x_tkjb_lengkap_2022 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'X-TKJ-B')->whereYear('tgl_daftar', '2022')->count();
        $x_tkjb_lengkap_2023 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'X-TKJ-B')->whereYear('tgl_daftar', '2023')->count();
        $x_tkjb_lengkap_2024 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'X-TKJ-B')->whereYear('tgl_daftar', '2024')->count();
        $x_tkjb_lengkap_2025 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'X-TKJ-B')->whereYear('tgl_daftar', '2025')->count();

        // ! ORTU TIDAK LENGKAP PER TAHUN ** // 
        $x_tkjb_tdklengkap_2020 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'X-TKJ-B')->whereYear('tgl_daftar', '2020')->count();
        $x_tkjb_tdklengkap_2021 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'X-TKJ-B')->whereYear('tgl_daftar', '2021')->count();
        $x_tkjb_tdklengkap_2022 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'X-TKJ-B')->whereYear('tgl_daftar', '2022')->count();
        $x_tkjb_tdklengkap_2023 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'X-TKJ-B')->whereYear('tgl_daftar', '2023')->count();
        $x_tkjb_tdklengkap_2024 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'X-TKJ-B')->whereYear('tgl_daftar', '2024')->count();
        $x_tkjb_tdklengkap_2025 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'X-TKJ-B')->whereYear('tgl_daftar', '2025')->count();

        // ? X-TKJ-C LENGKAP TIDAK LENGKAP ? //
        $x_tkjc_lengkap = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'X-TKJ-C')->whereYear('tgl_daftar', $request_tahun)->count();
        $x_tkjc_tdklengkap = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'X-TKJ-C')->whereYear('tgl_daftar', $request_tahun)->count();

        // ** ORTU LENGKAP PER TAHUN ** // 
        $x_tkjc_lengkap_2020 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'X-TKJ-C')->whereYear('tgl_daftar', '2020')->count();
        $x_tkjc_lengkap_2021 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'X-TKJ-C')->whereYear('tgl_daftar', '2021')->count();
        $x_tkjc_lengkap_2022 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'X-TKJ-C')->whereYear('tgl_daftar', '2022')->count();
        $x_tkjc_lengkap_2023 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'X-TKJ-C')->whereYear('tgl_daftar', '2023')->count();
        $x_tkjc_lengkap_2024 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'X-TKJ-C')->whereYear('tgl_daftar', '2024')->count();
        $x_tkjc_lengkap_2025 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'X-TKJ-C')->whereYear('tgl_daftar', '2025')->count();

        // ! ORTU TIDAK LENGKAP PER TAHUN ** // 
        $x_tkjc_tdklengkap_2020 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'X-TKJ-C')->whereYear('tgl_daftar', '2020')->count();
        $x_tkjc_tdklengkap_2021 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'X-TKJ-C')->whereYear('tgl_daftar', '2021')->count();
        $x_tkjc_tdklengkap_2022 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'X-TKJ-C')->whereYear('tgl_daftar', '2022')->count();
        $x_tkjc_tdklengkap_2023 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'X-TKJ-C')->whereYear('tgl_daftar', '2023')->count();
        $x_tkjc_tdklengkap_2024 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'X-TKJ-C')->whereYear('tgl_daftar', '2024')->count();
        $x_tkjc_tdklengkap_2025 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'X-TKJ-C')->whereYear('tgl_daftar', '2025')->count();

        // ? XI-TKJ-A LENGKAP TIDAK LENGKAP ? //
        $xi_tkja_lengkap = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XI-TKJ-A')->whereYear('tgl_daftar', $request_tahun)->count();
        $xi_tkja_tdklengkap = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XI-TKJ-A')->whereYear('tgl_daftar', $request_tahun)->count();

        // ** ORTU LENGKAP PER TAHUN ** // 
        $xi_tkja_lengkap_2020 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XI-TKJ-A')->whereYear('tgl_daftar', '2020')->count();
        $xi_tkja_lengkap_2021 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XI-TKJ-A')->whereYear('tgl_daftar', '2021')->count();
        $xi_tkja_lengkap_2022 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XI-TKJ-A')->whereYear('tgl_daftar', '2022')->count();
        $xi_tkja_lengkap_2023 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XI-TKJ-A')->whereYear('tgl_daftar', '2023')->count();
        $xi_tkja_lengkap_2024 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XI-TKJ-A')->whereYear('tgl_daftar', '2024')->count();
        $xi_tkja_lengkap_2025 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XI-TKJ-A')->whereYear('tgl_daftar', '2025')->count();

        // ! ORTU TIDAK LENGKAP PER TAHUN ** // 
        $xi_tkja_tdklengkap_2020 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XI-TKJ-A')->whereYear('tgl_daftar', '2020')->count();
        $xi_tkja_tdklengkap_2021 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XI-TKJ-A')->whereYear('tgl_daftar', '2021')->count();
        $xi_tkja_tdklengkap_2022 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XI-TKJ-A')->whereYear('tgl_daftar', '2022')->count();
        $xi_tkja_tdklengkap_2023 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XI-TKJ-A')->whereYear('tgl_daftar', '2023')->count();
        $xi_tkja_tdklengkap_2024 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XI-TKJ-A')->whereYear('tgl_daftar', '2024')->count();
        $xi_tkja_tdklengkap_2025 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XI-TKJ-A')->whereYear('tgl_daftar', '2025')->count();

        // ? XI-TKJ-B LENGKAP TIDAK LENGKAP ? //
        $xi_tkjb_lengkap = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XI-TKJ-B')->whereYear('tgl_daftar', $request_tahun)->count();
        $xi_tkjb_tdklengkap = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XI-TKJ-B')->whereYear('tgl_daftar', $request_tahun)->count();

        // ** ORTU LENGKAP PER TAHUN ** // 
        $xi_tkjb_lengkap_2020 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XI-TKJ-B')->whereYear('tgl_daftar', '2020')->count();
        $xi_tkjb_lengkap_2021 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XI-TKJ-B')->whereYear('tgl_daftar', '2021')->count();
        $xi_tkjb_lengkap_2022 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XI-TKJ-B')->whereYear('tgl_daftar', '2022')->count();
        $xi_tkjb_lengkap_2023 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XI-TKJ-B')->whereYear('tgl_daftar', '2023')->count();
        $xi_tkjb_lengkap_2024 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XI-TKJ-B')->whereYear('tgl_daftar', '2024')->count();
        $xi_tkjb_lengkap_2025 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XI-TKJ-B')->whereYear('tgl_daftar', '2025')->count();

        // ! ORTU TIDAK LENGKAP PER TAHUN ** // 
        $xi_tkjb_tdklengkap_2020 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XI-TKJ-B')->whereYear('tgl_daftar', '2020')->count();
        $xi_tkjb_tdklengkap_2021 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XI-TKJ-B')->whereYear('tgl_daftar', '2021')->count();
        $xi_tkjb_tdklengkap_2022 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XI-TKJ-B')->whereYear('tgl_daftar', '2022')->count();
        $xi_tkjb_tdklengkap_2023 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XI-TKJ-B')->whereYear('tgl_daftar', '2023')->count();
        $xi_tkjb_tdklengkap_2024 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XI-TKJ-B')->whereYear('tgl_daftar', '2024')->count();
        $xi_tkjb_tdklengkap_2025 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XI-TKJ-B')->whereYear('tgl_daftar', '2025')->count();

        // ? XI-TKJ-C LENGKAP TIDAK LENGKAP ? //
        $xi_tkjc_lengkap = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XI-TKJ-C')->whereYear('tgl_daftar', $request_tahun)->count();
        $xi_tkjc_tdklengkap = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XI-TKJ-C')->whereYear('tgl_daftar', $request_tahun)->count();

        // ** ORTU LENGKAP PER TAHUN ** // 
        $xi_tkjc_lengkap_2020 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XI-TKJ-C')->whereYear('tgl_daftar', '2020')->count();
        $xi_tkjc_lengkap_2021 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XI-TKJ-C')->whereYear('tgl_daftar', '2021')->count();
        $xi_tkjc_lengkap_2022 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XI-TKJ-C')->whereYear('tgl_daftar', '2022')->count();
        $xi_tkjc_lengkap_2023 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XI-TKJ-C')->whereYear('tgl_daftar', '2023')->count();
        $xi_tkjc_lengkap_2024 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XI-TKJ-C')->whereYear('tgl_daftar', '2024')->count();
        $xi_tkjc_lengkap_2025 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XI-TKJ-C')->whereYear('tgl_daftar', '2025')->count();

        // ! ORTU TIDAK LENGKAP PER TAHUN ** // 
        $xi_tkjc_tdklengkap_2020 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XI-TKJ-C')->whereYear('tgl_daftar', '2020')->count();
        $xi_tkjc_tdklengkap_2021 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XI-TKJ-C')->whereYear('tgl_daftar', '2021')->count();
        $xi_tkjc_tdklengkap_2022 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XI-TKJ-C')->whereYear('tgl_daftar', '2022')->count();
        $xi_tkjc_tdklengkap_2023 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XI-TKJ-C')->whereYear('tgl_daftar', '2023')->count();
        $xi_tkjc_tdklengkap_2024 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XI-TKJ-C')->whereYear('tgl_daftar', '2024')->count();
        $xi_tkjc_tdklengkap_2025 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XI-TKJ-C')->whereYear('tgl_daftar', '2025')->count();

        // ? XII-TKJ-A LENGKAP TIDAK LENGKAP ? //
        $xii_tkja_lengkap = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XII-TKJ-A')->whereYear('tgl_daftar', $request_tahun)->count();
        $xii_tkja_tdklengkap = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XII-TKJ-A')->whereYear('tgl_daftar', $request_tahun)->count();

        // ** ORTU LENGKAP PER TAHUN ** // 
        $xii_tkja_lengkap_2020 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XII-TKJ-A')->whereYear('tgl_daftar', '2020')->count();
        $xii_tkja_lengkap_2021 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XII-TKJ-A')->whereYear('tgl_daftar', '2021')->count();
        $xii_tkja_lengkap_2022 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XII-TKJ-A')->whereYear('tgl_daftar', '2022')->count();
        $xii_tkja_lengkap_2023 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XII-TKJ-A')->whereYear('tgl_daftar', '2023')->count();
        $xii_tkja_lengkap_2024 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XII-TKJ-A')->whereYear('tgl_daftar', '2024')->count();
        $xii_tkja_lengkap_2025 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XII-TKJ-A')->whereYear('tgl_daftar', '2025')->count();

        // ! ORTU TIDAK LENGKAP PER TAHUN ** // 
        $xii_tkja_tdklengkap_2020 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XII-TKJ-A')->whereYear('tgl_daftar', '2020')->count();
        $xii_tkja_tdklengkap_2021 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XII-TKJ-A')->whereYear('tgl_daftar', '2021')->count();
        $xii_tkja_tdklengkap_2022 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XII-TKJ-A')->whereYear('tgl_daftar', '2022')->count();
        $xii_tkja_tdklengkap_2023 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XII-TKJ-A')->whereYear('tgl_daftar', '2023')->count();
        $xii_tkja_tdklengkap_2024 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XII-TKJ-A')->whereYear('tgl_daftar', '2024')->count();
        $xii_tkja_tdklengkap_2025 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XII-TKJ-A')->whereYear('tgl_daftar', '2025')->count();

        // ? xii-tkj-b LENGKAP TIDAK LENGKAP ? //
        $xii_tkjb_lengkap = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XII-TKJ-B')->whereYear('tgl_daftar', $request_tahun)->count();
        $xii_tkjb_tdklengkap = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XII-TKJ-B')->whereYear('tgl_daftar', $request_tahun)->count();

        // ** ORTU LENGKAP PER TAHUN ** // 
        $xii_tkjb_lengkap_2020 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XII-TKJ-B')->whereYear('tgl_daftar', '2020')->count();
        $xii_tkjb_lengkap_2021 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XII-TKJ-B')->whereYear('tgl_daftar', '2021')->count();
        $xii_tkjb_lengkap_2022 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XII-TKJ-B')->whereYear('tgl_daftar', '2022')->count();
        $xii_tkjb_lengkap_2023 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XII-TKJ-B')->whereYear('tgl_daftar', '2023')->count();
        $xii_tkjb_lengkap_2024 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XII-TKJ-B')->whereYear('tgl_daftar', '2024')->count();
        $xii_tkjb_lengkap_2025 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XII-TKJ-B')->whereYear('tgl_daftar', '2025')->count();

        // ! ORTU TIDAK LENGKAP PER TAHUN ** // 
        $xii_tkjb_tdklengkap_2020 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XII-TKJ-B')->whereYear('tgl_daftar', '2020')->count();
        $xii_tkjb_tdklengkap_2021 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XII-TKJ-B')->whereYear('tgl_daftar', '2021')->count();
        $xii_tkjb_tdklengkap_2022 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XII-TKJ-B')->whereYear('tgl_daftar', '2022')->count();
        $xii_tkjb_tdklengkap_2023 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XII-TKJ-B')->whereYear('tgl_daftar', '2023')->count();
        $xii_tkjb_tdklengkap_2024 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XII-TKJ-B')->whereYear('tgl_daftar', '2024')->count();
        $xii_tkjb_tdklengkap_2025 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XII-TKJ-B')->whereYear('tgl_daftar', '2025')->count();

        // ? xii-tkj-C LENGKAP TIDAK LENGKAP ? //
        $xii_tkjc_lengkap = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XII-TKJ-C')->whereYear('tgl_daftar', $request_tahun)->count();
        $xii_tkjc_tdklengkap = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XII-TKJ-C')->whereYear('tgl_daftar', $request_tahun)->count();

        // ** ORTU LENGKAP PER TAHUN ** // 
        $xii_tkjc_lengkap_2020 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XII-TKJ-C')->whereYear('tgl_daftar', '2020')->count();
        $xii_tkjc_lengkap_2021 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XII-TKJ-C')->whereYear('tgl_daftar', '2021')->count();
        $xii_tkjc_lengkap_2022 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XII-TKJ-C')->whereYear('tgl_daftar', '2022')->count();
        $xii_tkjc_lengkap_2023 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XII-TKJ-C')->whereYear('tgl_daftar', '2023')->count();
        $xii_tkjc_lengkap_2024 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XII-TKJ-C')->whereYear('tgl_daftar', '2024')->count();
        $xii_tkjc_lengkap_2025 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XII-TKJ-C')->whereYear('tgl_daftar', '2025')->count();

        // ! ORTU TIDAK LENGKAP PER TAHUN ** // 
        $xii_tkjc_tdklengkap_2020 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XII-TKJ-C')->whereYear('tgl_daftar', '2020')->count();
        $xii_tkjc_tdklengkap_2021 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XII-TKJ-C')->whereYear('tgl_daftar', '2021')->count();
        $xii_tkjc_tdklengkap_2022 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XII-TKJ-C')->whereYear('tgl_daftar', '2022')->count();
        $xii_tkjc_tdklengkap_2023 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XII-TKJ-C')->whereYear('tgl_daftar', '2023')->count();
        $xii_tkjc_tdklengkap_2024 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XII-TKJ-C')->whereYear('tgl_daftar', '2024')->count();
        $xii_tkjc_tdklengkap_2025 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XII-TKJ-C')->whereYear('tgl_daftar', '2025')->count();

        // ? X-TKR-A LENGKAP TIDAK LENGKAP ? //
        $x_tkra_lengkap = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'X-TKR-A')->whereYear('tgl_daftar', $request_tahun)->count();
        $x_tkra_tdklengkap = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'X-TKR-A')->whereYear('tgl_daftar', $request_tahun)->count();

        // ** ORTU LENGKAP PER TAHUN ** // 
        $x_tkra_lengkap_2020 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'X-TKR-A')->whereYear('tgl_daftar', '2020')->count();
        $x_tkra_lengkap_2021 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'X-TKR-A')->whereYear('tgl_daftar', '2021')->count();
        $x_tkra_lengkap_2022 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'X-TKR-A')->whereYear('tgl_daftar', '2022')->count();
        $x_tkra_lengkap_2023 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'X-TKR-A')->whereYear('tgl_daftar', '2023')->count();
        $x_tkra_lengkap_2024 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'X-TKR-A')->whereYear('tgl_daftar', '2024')->count();
        $x_tkra_lengkap_2025 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'X-TKR-A')->whereYear('tgl_daftar', '2025')->count();

        // ! ORTU TIDAK LENGKAP PER TAHUN ** // 
        $x_tkra_tdklengkap_2020 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'X-TKR-A')->whereYear('tgl_daftar', '2020')->count();
        $x_tkra_tdklengkap_2021 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'X-TKR-A')->whereYear('tgl_daftar', '2021')->count();
        $x_tkra_tdklengkap_2022 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'X-TKR-A')->whereYear('tgl_daftar', '2022')->count();
        $x_tkra_tdklengkap_2023 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'X-TKR-A')->whereYear('tgl_daftar', '2023')->count();
        $x_tkra_tdklengkap_2024 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'X-TKR-A')->whereYear('tgl_daftar', '2024')->count();
        $x_tkra_tdklengkap_2025 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'X-TKR-A')->whereYear('tgl_daftar', '2025')->count();

        // ? X-TKR-B LENGKAP TIDAK LENGKAP ? //
        $x_tkrb_lengkap = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'X-TKR-B')->whereYear('tgl_daftar', $request_tahun)->count();
        $x_tkrb_tdklengkap = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'X-TKR-B')->whereYear('tgl_daftar', $request_tahun)->count();

        // ** ORTU LENGKAP PER TAHUN ** // 
        $x_tkrb_lengkap_2020 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'X-TKR-B')->whereYear('tgl_daftar', '2020')->count();
        $x_tkrb_lengkap_2021 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'X-TKR-B')->whereYear('tgl_daftar', '2021')->count();
        $x_tkrb_lengkap_2022 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'X-TKR-B')->whereYear('tgl_daftar', '2022')->count();
        $x_tkrb_lengkap_2023 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'X-TKR-B')->whereYear('tgl_daftar', '2023')->count();
        $x_tkrb_lengkap_2024 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'X-TKR-B')->whereYear('tgl_daftar', '2024')->count();
        $x_tkrb_lengkap_2025 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'X-TKR-B')->whereYear('tgl_daftar', '2025')->count();

        // ! ORTU TIDAK LENGKAP PER TAHUN ** // 
        $x_tkrb_tdklengkap_2020 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'X-TKR-B')->whereYear('tgl_daftar', '2020')->count();
        $x_tkrb_tdklengkap_2021 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'X-TKR-B')->whereYear('tgl_daftar', '2021')->count();
        $x_tkrb_tdklengkap_2022 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'X-TKR-B')->whereYear('tgl_daftar', '2022')->count();
        $x_tkrb_tdklengkap_2023 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'X-TKR-B')->whereYear('tgl_daftar', '2023')->count();
        $x_tkrb_tdklengkap_2024 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'X-TKR-B')->whereYear('tgl_daftar', '2024')->count();
        $x_tkrb_tdklengkap_2025 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'X-TKR-B')->whereYear('tgl_daftar', '2025')->count();

        // ? X-TKR-C LENGKAP TIDAK LENGKAP ? //
        $x_tkrc_lengkap = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'X-TKR-C')->whereYear('tgl_daftar', $request_tahun)->count();
        $x_tkrc_tdklengkap = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'X-TKR-C')->whereYear('tgl_daftar', $request_tahun)->count();

        // ** ORTU LENGKAP PER TAHUN ** // 
        $x_tkrc_lengkap_2020 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'X-TKR-C')->whereYear('tgl_daftar', '2020')->count();
        $x_tkrc_lengkap_2021 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'X-TKR-C')->whereYear('tgl_daftar', '2021')->count();
        $x_tkrc_lengkap_2022 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'X-TKR-C')->whereYear('tgl_daftar', '2022')->count();
        $x_tkrc_lengkap_2023 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'X-TKR-C')->whereYear('tgl_daftar', '2023')->count();
        $x_tkrc_lengkap_2024 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'X-TKR-C')->whereYear('tgl_daftar', '2024')->count();
        $x_tkrc_lengkap_2025 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'X-TKR-C')->whereYear('tgl_daftar', '2025')->count();

        // ! ORTU TIDAK LENGKAP PER TAHUN ** // 
        $x_tkrc_tdklengkap_2020 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'X-TKR-C')->whereYear('tgl_daftar', '2020')->count();
        $x_tkrc_tdklengkap_2021 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'X-TKR-C')->whereYear('tgl_daftar', '2021')->count();
        $x_tkrc_tdklengkap_2022 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'X-TKR-C')->whereYear('tgl_daftar', '2022')->count();
        $x_tkrc_tdklengkap_2023 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'X-TKR-C')->whereYear('tgl_daftar', '2023')->count();
        $x_tkrc_tdklengkap_2024 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'X-TKR-C')->whereYear('tgl_daftar', '2024')->count();
        $x_tkrc_tdklengkap_2025 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'X-TKR-C')->whereYear('tgl_daftar', '2025')->count();

        // ? XI-TKR-A LENGKAP TIDAK LENGKAP ? //
        $xi_tkra_lengkap = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XI-TKR-A')->whereYear('tgl_daftar', $request_tahun)->count();
        $xi_tkra_tdklengkap = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XI-TKR-A')->whereYear('tgl_daftar', $request_tahun)->count();

        // ** ORTU LENGKAP PER TAHUN ** // 
        $xi_tkra_lengkap_2020 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XI-TKR-A')->whereYear('tgl_daftar', '2020')->count();
        $xi_tkra_lengkap_2021 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XI-TKR-A')->whereYear('tgl_daftar', '2021')->count();
        $xi_tkra_lengkap_2022 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XI-TKR-A')->whereYear('tgl_daftar', '2022')->count();
        $xi_tkra_lengkap_2023 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XI-TKR-A')->whereYear('tgl_daftar', '2023')->count();
        $xi_tkra_lengkap_2024 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XI-TKR-A')->whereYear('tgl_daftar', '2024')->count();
        $xi_tkra_lengkap_2025 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XI-TKR-A')->whereYear('tgl_daftar', '2025')->count();

        // ! ORTU TIDAK LENGKAP PER TAHUN ** // 
        $xi_tkra_tdklengkap_2020 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XI-TKR-A')->whereYear('tgl_daftar', '2020')->count();
        $xi_tkra_tdklengkap_2021 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XI-TKR-A')->whereYear('tgl_daftar', '2021')->count();
        $xi_tkra_tdklengkap_2022 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XI-TKR-A')->whereYear('tgl_daftar', '2022')->count();
        $xi_tkra_tdklengkap_2023 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XI-TKR-A')->whereYear('tgl_daftar', '2023')->count();
        $xi_tkra_tdklengkap_2024 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XI-TKR-A')->whereYear('tgl_daftar', '2024')->count();
        $xi_tkra_tdklengkap_2025 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XI-TKR-A')->whereYear('tgl_daftar', '2025')->count();

        // ? XI-TKR-B LENGKAP TIDAK LENGKAP ? //
        $xi_tkrb_lengkap = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XI-TKR-B')->whereYear('tgl_daftar', $request_tahun)->count();
        $xi_tkrb_tdklengkap = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XI-TKR-B')->whereYear('tgl_daftar', $request_tahun)->count();

        // ** ORTU LENGKAP PER TAHUN ** // 
        $xi_tkrb_lengkap_2020 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XI-TKR-B')->whereYear('tgl_daftar', '2020')->count();
        $xi_tkrb_lengkap_2021 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XI-TKR-B')->whereYear('tgl_daftar', '2021')->count();
        $xi_tkrb_lengkap_2022 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XI-TKR-B')->whereYear('tgl_daftar', '2022')->count();
        $xi_tkrb_lengkap_2023 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XI-TKR-B')->whereYear('tgl_daftar', '2023')->count();
        $xi_tkrb_lengkap_2024 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XI-TKR-B')->whereYear('tgl_daftar', '2024')->count();
        $xi_tkrb_lengkap_2025 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XI-TKR-B')->whereYear('tgl_daftar', '2025')->count();

        // ! ORTU TIDAK LENGKAP PER TAHUN ** // 
        $xi_tkrb_tdklengkap_2020 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XI-TKR-B')->whereYear('tgl_daftar', '2020')->count();
        $xi_tkrb_tdklengkap_2021 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XI-TKR-B')->whereYear('tgl_daftar', '2021')->count();
        $xi_tkrb_tdklengkap_2022 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XI-TKR-B')->whereYear('tgl_daftar', '2022')->count();
        $xi_tkrb_tdklengkap_2023 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XI-TKR-B')->whereYear('tgl_daftar', '2023')->count();
        $xi_tkrb_tdklengkap_2024 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XI-TKR-B')->whereYear('tgl_daftar', '2024')->count();
        $xi_tkrb_tdklengkap_2025 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XI-TKR-B')->whereYear('tgl_daftar', '2025')->count();

        // ? XI-TKR-C LENGKAP TIDAK LENGKAP ? //
        $xi_tkrc_lengkap = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XI-TKR-C')->whereYear('tgl_daftar', $request_tahun)->count();
        $xi_tkrc_tdklengkap = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XI-TKR-C')->whereYear('tgl_daftar', $request_tahun)->count();

        // ** ORTU LENGKAP PER TAHUN ** // 
        $xi_tkrc_lengkap_2020 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XI-TKR-C')->whereYear('tgl_daftar', '2020')->count();
        $xi_tkrc_lengkap_2021 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XI-TKR-C')->whereYear('tgl_daftar', '2021')->count();
        $xi_tkrc_lengkap_2022 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XI-TKR-C')->whereYear('tgl_daftar', '2022')->count();
        $xi_tkrc_lengkap_2023 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XI-TKR-C')->whereYear('tgl_daftar', '2023')->count();
        $xi_tkrc_lengkap_2024 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XI-TKR-C')->whereYear('tgl_daftar', '2024')->count();
        $xi_tkrc_lengkap_2025 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XI-TKR-C')->whereYear('tgl_daftar', '2025')->count();

        // ! ORTU TIDAK LENGKAP PER TAHUN ** // 
        $xi_tkrc_tdklengkap_2020 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XI-TKR-C')->whereYear('tgl_daftar', '2020')->count();
        $xi_tkrc_tdklengkap_2021 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XI-TKR-C')->whereYear('tgl_daftar', '2021')->count();
        $xi_tkrc_tdklengkap_2022 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XI-TKR-C')->whereYear('tgl_daftar', '2022')->count();
        $xi_tkrc_tdklengkap_2023 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XI-TKR-C')->whereYear('tgl_daftar', '2023')->count();
        $xi_tkrc_tdklengkap_2024 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XI-TKR-C')->whereYear('tgl_daftar', '2024')->count();
        $xi_tkrc_tdklengkap_2025 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XI-TKR-C')->whereYear('tgl_daftar', '2025')->count();

        // ? XII-TKR-A LENGKAP TIDAK LENGKAP ? //
        $xii_tkra_lengkap = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XII-TKR-A')->whereYear('tgl_daftar', $request_tahun)->count();
        $xii_tkra_tdklengkap = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XII-TKR-A')->whereYear('tgl_daftar', $request_tahun)->count();

        // ** ORTU LENGKAP PER TAHUN ** // 
        $xii_tkra_lengkap_2020 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XII-TKR-A')->whereYear('tgl_daftar', '2020')->count();
        $xii_tkra_lengkap_2021 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XII-TKR-A')->whereYear('tgl_daftar', '2021')->count();
        $xii_tkra_lengkap_2022 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XII-TKR-A')->whereYear('tgl_daftar', '2022')->count();
        $xii_tkra_lengkap_2023 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XII-TKR-A')->whereYear('tgl_daftar', '2023')->count();
        $xii_tkra_lengkap_2024 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XII-TKR-A')->whereYear('tgl_daftar', '2024')->count();
        $xii_tkra_lengkap_2025 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XII-TKR-A')->whereYear('tgl_daftar', '2025')->count();

        // ! ORTU TIDAK LENGKAP PER TAHUN ** // 
        $xii_tkra_tdklengkap_2020 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XII-TKR-A')->whereYear('tgl_daftar', '2020')->count();
        $xii_tkra_tdklengkap_2021 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XII-TKR-A')->whereYear('tgl_daftar', '2021')->count();
        $xii_tkra_tdklengkap_2022 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XII-TKR-A')->whereYear('tgl_daftar', '2022')->count();
        $xii_tkra_tdklengkap_2023 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XII-TKR-A')->whereYear('tgl_daftar', '2023')->count();
        $xii_tkra_tdklengkap_2024 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XII-TKR-A')->whereYear('tgl_daftar', '2024')->count();
        $xii_tkra_tdklengkap_2025 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XII-TKR-A')->whereYear('tgl_daftar', '2025')->count();

        // ? XII-TKR-B LENGKAP TIDAK LENGKAP ? //
        $xii_tkrb_lengkap = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XII-TKR-B')->whereYear('tgl_daftar', $request_tahun)->count();
        $xii_tkrb_tdklengkap = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XII-TKR-B')->whereYear('tgl_daftar', $request_tahun)->count();

        // ** ORTU LENGKAP PER TAHUN ** // 
        $xii_tkrb_lengkap_2020 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XII-TKR-B')->whereYear('tgl_daftar', '2020')->count();
        $xii_tkrb_lengkap_2021 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XII-TKR-B')->whereYear('tgl_daftar', '2021')->count();
        $xii_tkrb_lengkap_2022 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XII-TKR-B')->whereYear('tgl_daftar', '2022')->count();
        $xii_tkrb_lengkap_2023 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XII-TKR-B')->whereYear('tgl_daftar', '2023')->count();
        $xii_tkrb_lengkap_2024 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XII-TKR-B')->whereYear('tgl_daftar', '2024')->count();
        $xii_tkrb_lengkap_2025 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XII-TKR-B')->whereYear('tgl_daftar', '2025')->count();

        // ! ORTU TIDAK LENGKAP PER TAHUN ** // 
        $xii_tkrb_tdklengkap_2020 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XII-TKR-B')->whereYear('tgl_daftar', '2020')->count();
        $xii_tkrb_tdklengkap_2021 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XII-TKR-B')->whereYear('tgl_daftar', '2021')->count();
        $xii_tkrb_tdklengkap_2022 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XII-TKR-B')->whereYear('tgl_daftar', '2022')->count();
        $xii_tkrb_tdklengkap_2023 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XII-TKR-B')->whereYear('tgl_daftar', '2023')->count();
        $xii_tkrb_tdklengkap_2024 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XII-TKR-B')->whereYear('tgl_daftar', '2024')->count();
        $xii_tkrb_tdklengkap_2025 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XII-TKR-B')->whereYear('tgl_daftar', '2025')->count();

        // ? XII-TKR-C LENGKAP TIDAK LENGKAP ? //
        $xii_tkrc_lengkap = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XII-TKR-C')->whereYear('tgl_daftar', $request_tahun)->count();
        $xii_tkrc_tdklengkap = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XII-TKR-C')->whereYear('tgl_daftar', $request_tahun)->count();

        // ** ORTU LENGKAP PER TAHUN ** // 
        $xii_tkrc_lengkap_2020 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XII-TKR-C')->whereYear('tgl_daftar', '2020')->count();
        $xii_tkrc_lengkap_2021 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XII-TKR-C')->whereYear('tgl_daftar', '2021')->count();
        $xii_tkrc_lengkap_2022 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XII-TKR-C')->whereYear('tgl_daftar', '2022')->count();
        $xii_tkrc_lengkap_2023 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XII-TKR-C')->whereYear('tgl_daftar', '2023')->count();
        $xii_tkrc_lengkap_2024 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XII-TKR-C')->whereYear('tgl_daftar', '2024')->count();
        $xii_tkrc_lengkap_2025 = HasilHitunganModel::where('status_kelengkapan_ortu', 'lengkap')->where('kelas', 'XII-TKR-C')->whereYear('tgl_daftar', '2025')->count();

        // ! ORTU TIDAK LENGKAP PER TAHUN ** // 
        $xii_tkrc_tdklengkap_2020 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XII-TKR-C')->whereYear('tgl_daftar', '2020')->count();
        $xii_tkrc_tdklengkap_2021 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XII-TKR-C')->whereYear('tgl_daftar', '2021')->count();
        $xii_tkrc_tdklengkap_2022 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XII-TKR-C')->whereYear('tgl_daftar', '2022')->count();
        $xii_tkrc_tdklengkap_2023 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XII-TKR-C')->whereYear('tgl_daftar', '2023')->count();
        $xii_tkrc_tdklengkap_2024 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XII-TKR-C')->whereYear('tgl_daftar', '2024')->count();
        $xii_tkrc_tdklengkap_2025 = HasilHitunganModel::where('status_kelengkapan_ortu', 'Tidak Lengkap')->where('kelas', 'XII-TKR-C')->whereYear('tgl_daftar', '2025')->count();

        return view(
            'admin.analisa_data.data_bansos.status_kelengkapan_ortu.result',
            compact(
                'request_tahun',
                'x_tkja_lengkap',
                'x_tkja_tdklengkap',
                'x_tkja_lengkap_2020',
                'x_tkja_lengkap_2021',
                'x_tkja_lengkap_2022',
                'x_tkja_lengkap_2023',
                'x_tkja_lengkap_2024',
                'x_tkja_lengkap_2025',
                'x_tkja_tdklengkap_2020',
                'x_tkja_tdklengkap_2021',
                'x_tkja_tdklengkap_2022',
                'x_tkja_tdklengkap_2023',
                'x_tkja_tdklengkap_2024',
                'x_tkja_tdklengkap_2025',
                'x_tkjb_lengkap',
                'x_tkjb_tdklengkap',
                'x_tkjb_lengkap_2020',
                'x_tkjb_lengkap_2021',
                'x_tkjb_lengkap_2022',
                'x_tkjb_lengkap_2023',
                'x_tkjb_lengkap_2024',
                'x_tkjb_lengkap_2025',
                'x_tkjb_tdklengkap_2020',
                'x_tkjb_tdklengkap_2021',
                'x_tkjb_tdklengkap_2022',
                'x_tkjb_tdklengkap_2023',
                'x_tkjb_tdklengkap_2024',
                'x_tkjb_tdklengkap_2025',
                'x_tkjc_lengkap',
                'x_tkjc_tdklengkap',
                'x_tkjc_lengkap_2020',
                'x_tkjc_lengkap_2021',
                'x_tkjc_lengkap_2022',
                'x_tkjc_lengkap_2023',
                'x_tkjc_lengkap_2024',
                'x_tkjc_lengkap_2025',
                'x_tkjc_tdklengkap_2020',
                'x_tkjc_tdklengkap_2021',
                'x_tkjc_tdklengkap_2022',
                'x_tkjc_tdklengkap_2023',
                'x_tkjc_tdklengkap_2024',
                'x_tkjc_tdklengkap_2025',
                'x_tkjd_lengkap',
                'x_tkjd_tdklengkap',
                'x_tkjd_lengkap_2020',
                'x_tkjd_lengkap_2021',
                'x_tkjd_lengkap_2022',
                'x_tkjd_lengkap_2023',
                'x_tkjd_lengkap_2024',
                'x_tkjd_lengkap_2025',
                'x_tkjd_tdklengkap_2020',
                'x_tkjd_tdklengkap_2021',
                'x_tkjd_tdklengkap_2022',
                'x_tkjd_tdklengkap_2023',
                'x_tkjd_tdklengkap_2024',
                'x_tkjd_tdklengkap_2025',
                'xi_tkja_lengkap',
                'xi_tkja_tdklengkap',
                'xi_tkja_lengkap_2020',
                'xi_tkja_lengkap_2021',
                'xi_tkja_lengkap_2022',
                'xi_tkja_lengkap_2023',
                'xi_tkja_lengkap_2024',
                'xi_tkja_lengkap_2025',
                'xi_tkja_tdklengkap_2020',
                'xi_tkja_tdklengkap_2021',
                'xi_tkja_tdklengkap_2022',
                'xi_tkja_tdklengkap_2023',
                'xi_tkja_tdklengkap_2024',
                'xi_tkja_tdklengkap_2025',
                'xi_tkjb_lengkap',
                'xi_tkjb_tdklengkap',
                'xi_tkjb_lengkap_2020',
                'xi_tkjb_lengkap_2021',
                'xi_tkjb_lengkap_2022',
                'xi_tkjb_lengkap_2023',
                'xi_tkjb_lengkap_2024',
                'xi_tkjb_lengkap_2025',
                'xi_tkjb_tdklengkap_2020',
                'xi_tkjb_tdklengkap_2021',
                'xi_tkjb_tdklengkap_2022',
                'xi_tkjb_tdklengkap_2023',
                'xi_tkjb_tdklengkap_2024',
                'xi_tkjb_tdklengkap_2025',
                'xi_tkjc_lengkap',
                'xi_tkjc_tdklengkap',
                'xi_tkjc_lengkap_2020',
                'xi_tkjc_lengkap_2021',
                'xi_tkjc_lengkap_2022',
                'xi_tkjc_lengkap_2023',
                'xi_tkjc_lengkap_2024',
                'xi_tkjc_lengkap_2025',
                'xi_tkjc_tdklengkap_2020',
                'xi_tkjc_tdklengkap_2021',
                'xi_tkjc_tdklengkap_2022',
                'xi_tkjc_tdklengkap_2023',
                'xi_tkjc_tdklengkap_2024',
                'xi_tkjc_tdklengkap_2025',
                'xii_tkja_lengkap',
                'xii_tkja_tdklengkap',
                'xii_tkja_lengkap_2020',
                'xii_tkja_lengkap_2021',
                'xii_tkja_lengkap_2022',
                'xii_tkja_lengkap_2023',
                'xii_tkja_lengkap_2024',
                'xii_tkja_lengkap_2025',
                'xii_tkja_tdklengkap_2020',
                'xii_tkja_tdklengkap_2021',
                'xii_tkja_tdklengkap_2022',
                'xii_tkja_tdklengkap_2023',
                'xii_tkja_tdklengkap_2024',
                'xii_tkja_tdklengkap_2025',
                'xii_tkjb_lengkap',
                'xii_tkjb_tdklengkap',
                'xii_tkjb_lengkap_2020',
                'xii_tkjb_lengkap_2021',
                'xii_tkjb_lengkap_2022',
                'xii_tkjb_lengkap_2023',
                'xii_tkjb_lengkap_2024',
                'xii_tkjb_lengkap_2025',
                'xii_tkjb_tdklengkap_2020',
                'xii_tkjb_tdklengkap_2021',
                'xii_tkjb_tdklengkap_2022',
                'xii_tkjb_tdklengkap_2023',
                'xii_tkjb_tdklengkap_2024',
                'xii_tkjb_tdklengkap_2025',
                'xii_tkjc_lengkap',
                'xii_tkjc_tdklengkap',
                'xii_tkjc_lengkap_2020',
                'xii_tkjc_lengkap_2021',
                'xii_tkjc_lengkap_2022',
                'xii_tkjc_lengkap_2023',
                'xii_tkjc_lengkap_2024',
                'xii_tkjc_lengkap_2025',
                'xii_tkjc_tdklengkap_2020',
                'xii_tkjc_tdklengkap_2021',
                'xii_tkjc_tdklengkap_2022',
                'xii_tkjc_tdklengkap_2023',
                'xii_tkjc_tdklengkap_2024',
                'xii_tkjc_tdklengkap_2025',
                'x_tkra_lengkap',
                'x_tkra_tdklengkap',
                'x_tkra_lengkap_2020',
                'x_tkra_lengkap_2021',
                'x_tkra_lengkap_2022',
                'x_tkra_lengkap_2023',
                'x_tkra_lengkap_2024',
                'x_tkra_lengkap_2025',
                'x_tkra_tdklengkap_2020',
                'x_tkra_tdklengkap_2021',
                'x_tkra_tdklengkap_2022',
                'x_tkra_tdklengkap_2023',
                'x_tkra_tdklengkap_2024',
                'x_tkra_tdklengkap_2025',
                'x_tkrb_lengkap',
                'x_tkrb_tdklengkap',
                'x_tkrb_lengkap_2020',
                'x_tkrb_lengkap_2021',
                'x_tkrb_lengkap_2022',
                'x_tkrb_lengkap_2023',
                'x_tkrb_lengkap_2024',
                'x_tkrb_lengkap_2025',
                'x_tkrb_tdklengkap_2020',
                'x_tkrb_tdklengkap_2021',
                'x_tkrb_tdklengkap_2022',
                'x_tkrb_tdklengkap_2023',
                'x_tkrb_tdklengkap_2024',
                'x_tkrb_tdklengkap_2025',
                'x_tkrc_lengkap',
                'x_tkrc_tdklengkap',
                'x_tkrc_lengkap_2020',
                'x_tkrc_lengkap_2021',
                'x_tkrc_lengkap_2022',
                'x_tkrc_lengkap_2023',
                'x_tkrc_lengkap_2024',
                'x_tkrc_lengkap_2025',
                'x_tkrc_tdklengkap_2020',
                'x_tkrc_tdklengkap_2021',
                'x_tkrc_tdklengkap_2022',
                'x_tkrc_tdklengkap_2023',
                'x_tkrc_tdklengkap_2024',
                'x_tkrc_tdklengkap_2025',
                'xi_tkra_lengkap',
                'xi_tkra_tdklengkap',
                'xi_tkra_lengkap_2020',
                'xi_tkra_lengkap_2021',
                'xi_tkra_lengkap_2022',
                'xi_tkra_lengkap_2023',
                'xi_tkra_lengkap_2024',
                'xi_tkra_lengkap_2025',
                'xi_tkra_tdklengkap_2020',
                'xi_tkra_tdklengkap_2021',
                'xi_tkra_tdklengkap_2022',
                'xi_tkra_tdklengkap_2023',
                'xi_tkra_tdklengkap_2024',
                'xi_tkra_tdklengkap_2025',
                'xi_tkrb_lengkap',
                'xi_tkrb_tdklengkap',
                'xi_tkrb_lengkap_2020',
                'xi_tkrb_lengkap_2021',
                'xi_tkrb_lengkap_2022',
                'xi_tkrb_lengkap_2023',
                'xi_tkrb_lengkap_2024',
                'xi_tkrb_lengkap_2025',
                'xi_tkrb_tdklengkap_2020',
                'xi_tkrb_tdklengkap_2021',
                'xi_tkrb_tdklengkap_2022',
                'xi_tkrb_tdklengkap_2023',
                'xi_tkrb_tdklengkap_2024',
                'xi_tkrb_tdklengkap_2025',
                'xi_tkrc_lengkap',
                'xi_tkrc_tdklengkap',
                'xi_tkrc_lengkap_2020',
                'xi_tkrc_lengkap_2021',
                'xi_tkrc_lengkap_2022',
                'xi_tkrc_lengkap_2023',
                'xi_tkrc_lengkap_2024',
                'xi_tkrc_lengkap_2025',
                'xi_tkrc_tdklengkap_2020',
                'xi_tkrc_tdklengkap_2021',
                'xi_tkrc_tdklengkap_2022',
                'xi_tkrc_tdklengkap_2023',
                'xi_tkrc_tdklengkap_2024',
                'xi_tkrc_tdklengkap_2025',
                'xii_tkra_lengkap',
                'xii_tkra_tdklengkap',
                'xii_tkra_lengkap_2020',
                'xii_tkra_lengkap_2021',
                'xii_tkra_lengkap_2022',
                'xii_tkra_lengkap_2023',
                'xii_tkra_lengkap_2024',
                'xii_tkra_lengkap_2025',
                'xii_tkra_tdklengkap_2020',
                'xii_tkra_tdklengkap_2021',
                'xii_tkra_tdklengkap_2022',
                'xii_tkra_tdklengkap_2023',
                'xii_tkra_tdklengkap_2024',
                'xii_tkra_tdklengkap_2025',
                'xii_tkrb_lengkap',
                'xii_tkrb_tdklengkap',
                'xii_tkrb_lengkap_2020',
                'xii_tkrb_lengkap_2021',
                'xii_tkrb_lengkap_2022',
                'xii_tkrb_lengkap_2023',
                'xii_tkrb_lengkap_2024',
                'xii_tkrb_lengkap_2025',
                'xii_tkrb_tdklengkap_2020',
                'xii_tkrb_tdklengkap_2021',
                'xii_tkrb_tdklengkap_2022',
                'xii_tkrb_tdklengkap_2023',
                'xii_tkrb_tdklengkap_2024',
                'xii_tkrb_tdklengkap_2025',
                'xii_tkrc_lengkap',
                'xii_tkrc_tdklengkap',
                'xii_tkrc_lengkap_2020',
                'xii_tkrc_lengkap_2021',
                'xii_tkrc_lengkap_2022',
                'xii_tkrc_lengkap_2023',
                'xii_tkrc_lengkap_2024',
                'xii_tkrc_lengkap_2025',
                'xii_tkrc_tdklengkap_2020',
                'xii_tkrc_tdklengkap_2021',
                'xii_tkrc_tdklengkap_2022',
                'xii_tkrc_tdklengkap_2023',
                'xii_tkrc_tdklengkap_2024',
                'xii_tkrc_tdklengkap_2025'
            )
        );
    }

    public function status_pekerjaan_ortu()
    {
        // ! DATA KEALAS X-TKJ-A //
        $karyawanswasta_xtkja_2020 = HasilHitunganModel::where('kelas', 'X-tkj-A')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2020')->count();
        $pegawainegeri_xtkja_2020 = HasilHitunganModel::where('kelas', 'X-tkj-A')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2020')->count();
        $pekerja_tdk_tetap_xtkja_2020 = HasilHitunganModel::where('kelas', 'X-tkj-A')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2020')->count();
        $usaha_xtkja_2020 = HasilHitunganModel::where('kelas', 'X-tkj-A')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2020')->count();

        $karyawanswasta_xtkja_2021 = HasilHitunganModel::where('kelas', 'X-tkj-A')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2021')->count();
        $pegawainegeri_xtkja_2021 = HasilHitunganModel::where('kelas', 'X-tkj-A')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2021')->count();
        $pekerja_tdk_tetap_xtkja_2021 = HasilHitunganModel::where('kelas', 'X-tkj-A')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2021')->count();
        $usaha_xtkja_2021 = HasilHitunganModel::where('kelas', 'X-tkj-A')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2021')->count();

        $karyawanswasta_xtkja_2022 = HasilHitunganModel::where('kelas', 'X-tkj-A')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2022')->count();
        $pegawainegeri_xtkja_2022 = HasilHitunganModel::where('kelas', 'X-tkj-A')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2022')->count();
        $pekerja_tdk_tetap_xtkja_2022 = HasilHitunganModel::where('kelas', 'X-tkj-A')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2022')->count();
        $usaha_xtkja_2022 = HasilHitunganModel::where('kelas', 'X-tkj-A')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2022')->count();

        $karyawanswasta_xtkja_2023 = HasilHitunganModel::where('kelas', 'X-tkj-A')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2023')->count();
        $pegawainegeri_xtkja_2023 = HasilHitunganModel::where('kelas', 'X-tkj-A')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2023')->count();
        $pekerja_tdk_tetap_xtkja_2023 = HasilHitunganModel::where('kelas', 'X-tkj-A')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2023')->count();
        $usaha_xtkja_2023 = HasilHitunganModel::where('kelas', 'X-tkj-A')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2023')->count();

        $karyawanswasta_xtkja_2024 = HasilHitunganModel::where('kelas', 'X-tkj-A')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2024')->count();
        $pegawainegeri_xtkja_2024 = HasilHitunganModel::where('kelas', 'X-tkj-A')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2024')->count();
        $pekerja_tdk_tetap_xtkja_2024 = HasilHitunganModel::where('kelas', 'X-tkj-A')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2024')->count();
        $usaha_xtkja_2024 = HasilHitunganModel::where('kelas', 'X-tkj-A')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2024')->count();

        $karyawanswasta_xtkja_2025 = HasilHitunganModel::where('kelas', 'X-tkj-A')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2025')->count();
        $pegawainegeri_xtkja_2025 = HasilHitunganModel::where('kelas', 'X-tkj-A')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2025')->count();
        $pekerja_tdk_tetap_xtkja_2025 = HasilHitunganModel::where('kelas', 'X-tkj-A')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2025')->count();
        $usaha_xtkja_2025 = HasilHitunganModel::where('kelas', 'X-tkj-A')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2025')->count();

        // ! DATA KEALAS X-TKJ-B //
        $karyawanswasta_xtkjb_2020 = HasilHitunganModel::where('kelas', 'X-tkj-b')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2020')->count();
        $pegawainegeri_xtkjb_2020 = HasilHitunganModel::where('kelas', 'X-tkj-b')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2020')->count();
        $pekerja_tdk_tetap_xtkjb_2020 = HasilHitunganModel::where('kelas', 'X-tkj-b')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2020')->count();
        $usaha_xtkjb_2020 = HasilHitunganModel::where('kelas', 'X-tkj-b')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2020')->count();

        $karyawanswasta_xtkjb_2021 = HasilHitunganModel::where('kelas', 'X-tkj-b')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2021')->count();
        $pegawainegeri_xtkjb_2021 = HasilHitunganModel::where('kelas', 'X-tkj-b')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2021')->count();
        $pekerja_tdk_tetap_xtkjb_2021 = HasilHitunganModel::where('kelas', 'X-tkj-b')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2021')->count();
        $usaha_xtkjb_2021 = HasilHitunganModel::where('kelas', 'X-tkj-b')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2021')->count();

        $karyawanswasta_xtkjb_2022 = HasilHitunganModel::where('kelas', 'X-tkj-b')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2022')->count();
        $pegawainegeri_xtkjb_2022 = HasilHitunganModel::where('kelas', 'X-tkj-b')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2022')->count();
        $pekerja_tdk_tetap_xtkjb_2022 = HasilHitunganModel::where('kelas', 'X-tkj-b')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2022')->count();
        $usaha_xtkjb_2022 = HasilHitunganModel::where('kelas', 'X-tkj-b')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2022')->count();

        $karyawanswasta_xtkjb_2023 = HasilHitunganModel::where('kelas', 'X-tkj-b')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2023')->count();
        $pegawainegeri_xtkjb_2023 = HasilHitunganModel::where('kelas', 'X-tkj-b')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2023')->count();
        $pekerja_tdk_tetap_xtkjb_2023 = HasilHitunganModel::where('kelas', 'X-tkj-b')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2023')->count();
        $usaha_xtkjb_2023 = HasilHitunganModel::where('kelas', 'X-tkj-b')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2023')->count();

        $karyawanswasta_xtkjb_2024 = HasilHitunganModel::where('kelas', 'X-tkj-b')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2024')->count();
        $pegawainegeri_xtkjb_2024 = HasilHitunganModel::where('kelas', 'X-tkj-b')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2024')->count();
        $pekerja_tdk_tetap_xtkjb_2024 = HasilHitunganModel::where('kelas', 'X-tkj-b')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2024')->count();
        $usaha_xtkjb_2024 = HasilHitunganModel::where('kelas', 'X-tkj-b')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2024')->count();

        $karyawanswasta_xtkjb_2025 = HasilHitunganModel::where('kelas', 'X-tkj-b')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2025')->count();
        $pegawainegeri_xtkjb_2025 = HasilHitunganModel::where('kelas', 'X-tkj-b')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2025')->count();
        $pekerja_tdk_tetap_xtkjb_2025 = HasilHitunganModel::where('kelas', 'X-tkj-b')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2025')->count();
        $usaha_xtkjb_2025 = HasilHitunganModel::where('kelas', 'X-tkj-b')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2025')->count();

        // ! DATA KEALAS X-TKJ-C //
        $karyawanswasta_xtkjc_2020 = HasilHitunganModel::where('kelas', 'X-tkj-c')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2020')->count();
        $pegawainegeri_xtkjc_2020 = HasilHitunganModel::where('kelas', 'X-tkj-c')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2020')->count();
        $pekerja_tdk_tetap_xtkjc_2020 = HasilHitunganModel::where('kelas', 'X-tkj-c')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2020')->count();
        $usaha_xtkjc_2020 = HasilHitunganModel::where('kelas', 'X-tkj-c')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2020')->count();

        $karyawanswasta_xtkjc_2021 = HasilHitunganModel::where('kelas', 'X-tkj-c')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2021')->count();
        $pegawainegeri_xtkjc_2021 = HasilHitunganModel::where('kelas', 'X-tkj-c')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2021')->count();
        $pekerja_tdk_tetap_xtkjc_2021 = HasilHitunganModel::where('kelas', 'X-tkj-c')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2021')->count();
        $usaha_xtkjc_2021 = HasilHitunganModel::where('kelas', 'X-tkj-c')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2021')->count();

        $karyawanswasta_xtkjc_2022 = HasilHitunganModel::where('kelas', 'X-tkj-c')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2022')->count();
        $pegawainegeri_xtkjc_2022 = HasilHitunganModel::where('kelas', 'X-tkj-c')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2022')->count();
        $pekerja_tdk_tetap_xtkjc_2022 = HasilHitunganModel::where('kelas', 'X-tkj-c')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2022')->count();
        $usaha_xtkjc_2022 = HasilHitunganModel::where('kelas', 'X-tkj-c')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2022')->count();

        $karyawanswasta_xtkjc_2023 = HasilHitunganModel::where('kelas', 'X-tkj-c')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2023')->count();
        $pegawainegeri_xtkjc_2023 = HasilHitunganModel::where('kelas', 'X-tkj-c')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2023')->count();
        $pekerja_tdk_tetap_xtkjc_2023 = HasilHitunganModel::where('kelas', 'X-tkj-c')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2023')->count();
        $usaha_xtkjc_2023 = HasilHitunganModel::where('kelas', 'X-tkj-c')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2023')->count();

        $karyawanswasta_xtkjc_2024 = HasilHitunganModel::where('kelas', 'X-tkj-c')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2024')->count();
        $pegawainegeri_xtkjc_2024 = HasilHitunganModel::where('kelas', 'X-tkj-c')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2024')->count();
        $pekerja_tdk_tetap_xtkjc_2024 = HasilHitunganModel::where('kelas', 'X-tkj-c')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2024')->count();
        $usaha_xtkjc_2024 = HasilHitunganModel::where('kelas', 'X-tkj-c')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2024')->count();

        $karyawanswasta_xtkjc_2025 = HasilHitunganModel::where('kelas', 'X-tkj-c')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2025')->count();
        $pegawainegeri_xtkjc_2025 = HasilHitunganModel::where('kelas', 'X-tkj-c')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2025')->count();
        $pekerja_tdk_tetap_xtkjc_2025 = HasilHitunganModel::where('kelas', 'X-tkj-c')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2025')->count();
        $usaha_xtkjc_2025 = HasilHitunganModel::where('kelas', 'X-tkj-c')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2025')->count();

        // ! DATA KEALAS X-TKJ-D //
        $karyawanswasta_xtkjd_2020 = HasilHitunganModel::where('kelas', 'X-tkj-d')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2020')->count();
        $pegawainegeri_xtkjd_2020 = HasilHitunganModel::where('kelas', 'X-tkj-d')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2020')->count();
        $pekerja_tdk_tetap_xtkjd_2020 = HasilHitunganModel::where('kelas', 'X-tkj-d')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2020')->count();
        $usaha_xtkjd_2020 = HasilHitunganModel::where('kelas', 'X-tkj-d')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2020')->count();

        $karyawanswasta_xtkjd_2021 = HasilHitunganModel::where('kelas', 'X-tkj-d')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2021')->count();
        $pegawainegeri_xtkjd_2021 = HasilHitunganModel::where('kelas', 'X-tkj-d')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2021')->count();
        $pekerja_tdk_tetap_xtkjd_2021 = HasilHitunganModel::where('kelas', 'X-tkj-d')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2021')->count();
        $usaha_xtkjd_2021 = HasilHitunganModel::where('kelas', 'X-tkj-d')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2021')->count();

        $karyawanswasta_xtkjd_2022 = HasilHitunganModel::where('kelas', 'X-tkj-d')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2022')->count();
        $pegawainegeri_xtkjd_2022 = HasilHitunganModel::where('kelas', 'X-tkj-d')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2022')->count();
        $pekerja_tdk_tetap_xtkjd_2022 = HasilHitunganModel::where('kelas', 'X-tkj-d')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2022')->count();
        $usaha_xtkjd_2022 = HasilHitunganModel::where('kelas', 'X-tkj-d')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2022')->count();

        $karyawanswasta_xtkjd_2023 = HasilHitunganModel::where('kelas', 'X-tkj-d')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2023')->count();
        $pegawainegeri_xtkjd_2023 = HasilHitunganModel::where('kelas', 'X-tkj-d')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2023')->count();
        $pekerja_tdk_tetap_xtkjd_2023 = HasilHitunganModel::where('kelas', 'X-tkj-d')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2023')->count();
        $usaha_xtkjd_2023 = HasilHitunganModel::where('kelas', 'X-tkj-d')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2023')->count();

        $karyawanswasta_xtkjd_2024 = HasilHitunganModel::where('kelas', 'X-tkj-d')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2024')->count();
        $pegawainegeri_xtkjd_2024 = HasilHitunganModel::where('kelas', 'X-tkj-d')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2024')->count();
        $pekerja_tdk_tetap_xtkjd_2024 = HasilHitunganModel::where('kelas', 'X-tkj-d')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2024')->count();
        $usaha_xtkjd_2024 = HasilHitunganModel::where('kelas', 'X-tkj-d')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2024')->count();

        $karyawanswasta_xtkjd_2025 = HasilHitunganModel::where('kelas', 'X-tkj-d')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2025')->count();
        $pegawainegeri_xtkjd_2025 = HasilHitunganModel::where('kelas', 'X-tkj-d')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2025')->count();
        $pekerja_tdk_tetap_xtkjd_2025 = HasilHitunganModel::where('kelas', 'X-tkj-d')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2025')->count();
        $usaha_xtkjd_2025 = HasilHitunganModel::where('kelas', 'X-tkj-d')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2025')->count();

        // ! DATA KEALAS XI-TKJ-A //
        $karyawanswasta_xitkja_2020 = HasilHitunganModel::where('kelas', 'xi-tkj-a')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2020')->count();
        $pegawainegeri_xitkja_2020 = HasilHitunganModel::where('kelas', 'xi-tkj-a')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2020')->count();
        $pekerja_tdk_tetap_xitkja_2020 = HasilHitunganModel::where('kelas', 'xi-tkj-a')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2020')->count();
        $usaha_xitkja_2020 = HasilHitunganModel::where('kelas', 'xi-tkj-a')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2020')->count();

        $karyawanswasta_xitkja_2021 = HasilHitunganModel::where('kelas', 'xi-tkj-a')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2021')->count();
        $pegawainegeri_xitkja_2021 = HasilHitunganModel::where('kelas', 'xi-tkj-a')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2021')->count();
        $pekerja_tdk_tetap_xitkja_2021 = HasilHitunganModel::where('kelas', 'xi-tkj-a')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2021')->count();
        $usaha_xitkja_2021 = HasilHitunganModel::where('kelas', 'xi-tkj-a')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2021')->count();

        $karyawanswasta_xitkja_2022 = HasilHitunganModel::where('kelas', 'xi-tkj-a')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2022')->count();
        $pegawainegeri_xitkja_2022 = HasilHitunganModel::where('kelas', 'xi-tkj-a')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2022')->count();
        $pekerja_tdk_tetap_xitkja_2022 = HasilHitunganModel::where('kelas', 'xi-tkj-a')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2022')->count();
        $usaha_xitkja_2022 = HasilHitunganModel::where('kelas', 'xi-tkj-a')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2022')->count();

        $karyawanswasta_xitkja_2023 = HasilHitunganModel::where('kelas', 'xi-tkj-a')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2023')->count();
        $pegawainegeri_xitkja_2023 = HasilHitunganModel::where('kelas', 'xi-tkj-a')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2023')->count();
        $pekerja_tdk_tetap_xitkja_2023 = HasilHitunganModel::where('kelas', 'xi-tkj-a')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2023')->count();
        $usaha_xitkja_2023 = HasilHitunganModel::where('kelas', 'xi-tkj-a')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2023')->count();

        $karyawanswasta_xitkja_2024 = HasilHitunganModel::where('kelas', 'xi-tkj-a')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2024')->count();
        $pegawainegeri_xitkja_2024 = HasilHitunganModel::where('kelas', 'xi-tkj-a')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2024')->count();
        $pekerja_tdk_tetap_xitkja_2024 = HasilHitunganModel::where('kelas', 'xi-tkj-a')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2024')->count();
        $usaha_xitkja_2024 = HasilHitunganModel::where('kelas', 'xi-tkj-a')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2024')->count();

        $karyawanswasta_xitkja_2025 = HasilHitunganModel::where('kelas', 'xi-tkj-a')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2025')->count();
        $pegawainegeri_xitkja_2025 = HasilHitunganModel::where('kelas', 'xi-tkj-a')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2025')->count();
        $pekerja_tdk_tetap_xitkja_2025 = HasilHitunganModel::where('kelas', 'xi-tkj-a')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2025')->count();
        $usaha_xitkja_2025 = HasilHitunganModel::where('kelas', 'xi-tkj-a')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2025')->count();

        // ! DATA KEALAS XI-TKJ-B //
        $karyawanswasta_xitkjb_2020 = HasilHitunganModel::where('kelas', 'xi-tkj-b')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2020')->count();
        $pegawainegeri_xitkjb_2020 = HasilHitunganModel::where('kelas', 'xi-tkj-b')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2020')->count();
        $pekerja_tdk_tetap_xitkjb_2020 = HasilHitunganModel::where('kelas', 'xi-tkj-b')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2020')->count();
        $usaha_xitkjb_2020 = HasilHitunganModel::where('kelas', 'xi-tkj-b')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2020')->count();

        $karyawanswasta_xitkjb_2021 = HasilHitunganModel::where('kelas', 'xi-tkj-b')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2021')->count();
        $pegawainegeri_xitkjb_2021 = HasilHitunganModel::where('kelas', 'xi-tkj-b')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2021')->count();
        $pekerja_tdk_tetap_xitkjb_2021 = HasilHitunganModel::where('kelas', 'xi-tkj-b')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2021')->count();
        $usaha_xitkjb_2021 = HasilHitunganModel::where('kelas', 'xi-tkj-b')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2021')->count();

        $karyawanswasta_xitkjb_2022 = HasilHitunganModel::where('kelas', 'xi-tkj-b')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2022')->count();
        $pegawainegeri_xitkjb_2022 = HasilHitunganModel::where('kelas', 'xi-tkj-b')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2022')->count();
        $pekerja_tdk_tetap_xitkjb_2022 = HasilHitunganModel::where('kelas', 'xi-tkj-b')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2022')->count();
        $usaha_xitkjb_2022 = HasilHitunganModel::where('kelas', 'xi-tkj-b')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2022')->count();

        $karyawanswasta_xitkjb_2023 = HasilHitunganModel::where('kelas', 'xi-tkj-b')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2023')->count();
        $pegawainegeri_xitkjb_2023 = HasilHitunganModel::where('kelas', 'xi-tkj-b')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2023')->count();
        $pekerja_tdk_tetap_xitkjb_2023 = HasilHitunganModel::where('kelas', 'xi-tkj-b')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2023')->count();
        $usaha_xitkjb_2023 = HasilHitunganModel::where('kelas', 'xi-tkj-b')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2023')->count();

        $karyawanswasta_xitkjb_2024 = HasilHitunganModel::where('kelas', 'xi-tkj-b')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2024')->count();
        $pegawainegeri_xitkjb_2024 = HasilHitunganModel::where('kelas', 'xi-tkj-b')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2024')->count();
        $pekerja_tdk_tetap_xitkjb_2024 = HasilHitunganModel::where('kelas', 'xi-tkj-b')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2024')->count();
        $usaha_xitkjb_2024 = HasilHitunganModel::where('kelas', 'xi-tkj-b')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2024')->count();

        $karyawanswasta_xitkjb_2025 = HasilHitunganModel::where('kelas', 'xi-tkj-b')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2025')->count();
        $pegawainegeri_xitkjb_2025 = HasilHitunganModel::where('kelas', 'xi-tkj-b')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2025')->count();
        $pekerja_tdk_tetap_xitkjb_2025 = HasilHitunganModel::where('kelas', 'xi-tkj-b')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2025')->count();
        $usaha_xitkjb_2025 = HasilHitunganModel::where('kelas', 'xi-tkj-b')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2025')->count();

        // ! DATA KEALAS XI-TKJ-C //
        $karyawanswasta_xitkjc_2020 = HasilHitunganModel::where('kelas', 'xi-tkj-c')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2020')->count();
        $pegawainegeri_xitkjc_2020 = HasilHitunganModel::where('kelas', 'xi-tkj-c')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2020')->count();
        $pekerja_tdk_tetap_xitkjc_2020 = HasilHitunganModel::where('kelas', 'xi-tkj-c')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2020')->count();
        $usaha_xitkjc_2020 = HasilHitunganModel::where('kelas', 'xi-tkj-c')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2020')->count();

        $karyawanswasta_xitkjc_2021 = HasilHitunganModel::where('kelas', 'xi-tkj-c')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2021')->count();
        $pegawainegeri_xitkjc_2021 = HasilHitunganModel::where('kelas', 'xi-tkj-c')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2021')->count();
        $pekerja_tdk_tetap_xitkjc_2021 = HasilHitunganModel::where('kelas', 'xi-tkj-c')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2021')->count();
        $usaha_xitkjc_2021 = HasilHitunganModel::where('kelas', 'xi-tkj-c')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2021')->count();

        $karyawanswasta_xitkjc_2022 = HasilHitunganModel::where('kelas', 'xi-tkj-c')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2022')->count();
        $pegawainegeri_xitkjc_2022 = HasilHitunganModel::where('kelas', 'xi-tkj-c')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2022')->count();
        $pekerja_tdk_tetap_xitkjc_2022 = HasilHitunganModel::where('kelas', 'xi-tkj-c')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2022')->count();
        $usaha_xitkjc_2022 = HasilHitunganModel::where('kelas', 'xi-tkj-c')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2022')->count();

        $karyawanswasta_xitkjc_2023 = HasilHitunganModel::where('kelas', 'xi-tkj-c')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2023')->count();
        $pegawainegeri_xitkjc_2023 = HasilHitunganModel::where('kelas', 'xi-tkj-c')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2023')->count();
        $pekerja_tdk_tetap_xitkjc_2023 = HasilHitunganModel::where('kelas', 'xi-tkj-c')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2023')->count();
        $usaha_xitkjc_2023 = HasilHitunganModel::where('kelas', 'xi-tkj-c')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2023')->count();

        $karyawanswasta_xitkjc_2024 = HasilHitunganModel::where('kelas', 'xi-tkj-c')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2024')->count();
        $pegawainegeri_xitkjc_2024 = HasilHitunganModel::where('kelas', 'xi-tkj-c')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2024')->count();
        $pekerja_tdk_tetap_xitkjc_2024 = HasilHitunganModel::where('kelas', 'xi-tkj-c')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2024')->count();
        $usaha_xitkjc_2024 = HasilHitunganModel::where('kelas', 'xi-tkj-c')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2024')->count();

        $karyawanswasta_xitkjc_2025 = HasilHitunganModel::where('kelas', 'xi-tkj-c')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2025')->count();
        $pegawainegeri_xitkjc_2025 = HasilHitunganModel::where('kelas', 'xi-tkj-c')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2025')->count();
        $pekerja_tdk_tetap_xitkjc_2025 = HasilHitunganModel::where('kelas', 'xi-tkj-c')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2025')->count();
        $usaha_xitkjc_2025 = HasilHitunganModel::where('kelas', 'xi-tkj-c')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2025')->count();

        // ! DATA KEALAS XII-TKJ-A //
        $karyawanswasta_xiitkja_2020 = HasilHitunganModel::where('kelas', 'XII-TKJ-A')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2020')->count();
        $pegawainegeri_xiitkja_2020 = HasilHitunganModel::where('kelas', 'XII-TKJ-A')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2020')->count();
        $pekerja_tdk_tetap_xiitkja_2020 = HasilHitunganModel::where('kelas', 'XII-TKJ-A')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2020')->count();
        $usaha_xiitkja_2020 = HasilHitunganModel::where('kelas', 'XII-TKJ-A')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2020')->count();

        $karyawanswasta_xiitkja_2021 = HasilHitunganModel::where('kelas', 'XII-TKJ-A')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2021')->count();
        $pegawainegeri_xiitkja_2021 = HasilHitunganModel::where('kelas', 'XII-TKJ-A')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2021')->count();
        $pekerja_tdk_tetap_xiitkja_2021 = HasilHitunganModel::where('kelas', 'XII-TKJ-A')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2021')->count();
        $usaha_xiitkja_2021 = HasilHitunganModel::where('kelas', 'XII-TKJ-A')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2021')->count();

        $karyawanswasta_xiitkja_2022 = HasilHitunganModel::where('kelas', 'XII-TKJ-A')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2022')->count();
        $pegawainegeri_xiitkja_2022 = HasilHitunganModel::where('kelas', 'XII-TKJ-A')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2022')->count();
        $pekerja_tdk_tetap_xiitkja_2022 = HasilHitunganModel::where('kelas', 'XII-TKJ-A')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2022')->count();
        $usaha_xiitkja_2022 = HasilHitunganModel::where('kelas', 'XII-TKJ-A')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2022')->count();

        $karyawanswasta_xiitkja_2023 = HasilHitunganModel::where('kelas', 'XII-TKJ-A')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2023')->count();
        $pegawainegeri_xiitkja_2023 = HasilHitunganModel::where('kelas', 'XII-TKJ-A')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2023')->count();
        $pekerja_tdk_tetap_xiitkja_2023 = HasilHitunganModel::where('kelas', 'XII-TKJ-A')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2023')->count();
        $usaha_xiitkja_2023 = HasilHitunganModel::where('kelas', 'XII-TKJ-A')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2023')->count();

        $karyawanswasta_xiitkja_2024 = HasilHitunganModel::where('kelas', 'XII-TKJ-A')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2024')->count();
        $pegawainegeri_xiitkja_2024 = HasilHitunganModel::where('kelas', 'XII-TKJ-A')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2024')->count();
        $pekerja_tdk_tetap_xiitkja_2024 = HasilHitunganModel::where('kelas', 'XII-TKJ-A')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2024')->count();
        $usaha_xiitkja_2024 = HasilHitunganModel::where('kelas', 'XII-TKJ-A')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2024')->count();

        $karyawanswasta_xiitkja_2025 = HasilHitunganModel::where('kelas', 'XII-TKJ-A')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2025')->count();
        $pegawainegeri_xiitkja_2025 = HasilHitunganModel::where('kelas', 'XII-TKJ-A')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2025')->count();
        $pekerja_tdk_tetap_xiitkja_2025 = HasilHitunganModel::where('kelas', 'XII-TKJ-A')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2025')->count();
        $usaha_xiitkja_2025 = HasilHitunganModel::where('kelas', 'XII-TKJ-A')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2025')->count();

        // ! DATA KEALAS XII-TKJ-B //
        $karyawanswasta_xiitkjb_2020 = HasilHitunganModel::where('kelas', 'XII-TKJ-B')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2020')->count();
        $pegawainegeri_xiitkjb_2020 = HasilHitunganModel::where('kelas', 'XII-TKJ-B')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2020')->count();
        $pekerja_tdk_tetap_xiitkjb_2020 = HasilHitunganModel::where('kelas', 'XII-TKJ-B')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2020')->count();
        $usaha_xiitkjb_2020 = HasilHitunganModel::where('kelas', 'XII-TKJ-B')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2020')->count();

        $karyawanswasta_xiitkjb_2021 = HasilHitunganModel::where('kelas', 'XII-TKJ-B')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2021')->count();
        $pegawainegeri_xiitkjb_2021 = HasilHitunganModel::where('kelas', 'XII-TKJ-B')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2021')->count();
        $pekerja_tdk_tetap_xiitkjb_2021 = HasilHitunganModel::where('kelas', 'XII-TKJ-B')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2021')->count();
        $usaha_xiitkjb_2021 = HasilHitunganModel::where('kelas', 'XII-TKJ-B')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2021')->count();

        $karyawanswasta_xiitkjb_2022 = HasilHitunganModel::where('kelas', 'XII-TKJ-B')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2022')->count();
        $pegawainegeri_xiitkjb_2022 = HasilHitunganModel::where('kelas', 'XII-TKJ-B')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2022')->count();
        $pekerja_tdk_tetap_xiitkjb_2022 = HasilHitunganModel::where('kelas', 'XII-TKJ-B')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2022')->count();
        $usaha_xiitkjb_2022 = HasilHitunganModel::where('kelas', 'XII-TKJ-B')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2022')->count();

        $karyawanswasta_xiitkjb_2023 = HasilHitunganModel::where('kelas', 'XII-TKJ-B')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2023')->count();
        $pegawainegeri_xiitkjb_2023 = HasilHitunganModel::where('kelas', 'XII-TKJ-B')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2023')->count();
        $pekerja_tdk_tetap_xiitkjb_2023 = HasilHitunganModel::where('kelas', 'XII-TKJ-B')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2023')->count();
        $usaha_xiitkjb_2023 = HasilHitunganModel::where('kelas', 'XII-TKJ-B')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2023')->count();

        $karyawanswasta_xiitkjb_2024 = HasilHitunganModel::where('kelas', 'XII-TKJ-B')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2024')->count();
        $pegawainegeri_xiitkjb_2024 = HasilHitunganModel::where('kelas', 'XII-TKJ-B')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2024')->count();
        $pekerja_tdk_tetap_xiitkjb_2024 = HasilHitunganModel::where('kelas', 'XII-TKJ-B')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2024')->count();
        $usaha_xiitkjb_2024 = HasilHitunganModel::where('kelas', 'XII-TKJ-B')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2024')->count();

        $karyawanswasta_xiitkjb_2025 = HasilHitunganModel::where('kelas', 'XII-TKJ-B')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2025')->count();
        $pegawainegeri_xiitkjb_2025 = HasilHitunganModel::where('kelas', 'XII-TKJ-B')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2025')->count();
        $pekerja_tdk_tetap_xiitkjb_2025 = HasilHitunganModel::where('kelas', 'XII-TKJ-B')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2025')->count();
        $usaha_xiitkjb_2025 = HasilHitunganModel::where('kelas', 'XII-TKJ-B')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2025')->count();

        // ! DATA KEALAS XII-TKJ-C //
        $karyawanswasta_xiitkjc_2020 = HasilHitunganModel::where('kelas', 'XII-TKJ-C')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2020')->count();
        $pegawainegeri_xiitkjc_2020 = HasilHitunganModel::where('kelas', 'XII-TKJ-C')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2020')->count();
        $pekerja_tdk_tetap_xiitkjc_2020 = HasilHitunganModel::where('kelas', 'XII-TKJ-C')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2020')->count();
        $usaha_xiitkjc_2020 = HasilHitunganModel::where('kelas', 'XII-TKJ-C')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2020')->count();

        $karyawanswasta_xiitkjc_2021 = HasilHitunganModel::where('kelas', 'XII-TKJ-C')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2021')->count();
        $pegawainegeri_xiitkjc_2021 = HasilHitunganModel::where('kelas', 'XII-TKJ-C')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2021')->count();
        $pekerja_tdk_tetap_xiitkjc_2021 = HasilHitunganModel::where('kelas', 'XII-TKJ-C')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2021')->count();
        $usaha_xiitkjc_2021 = HasilHitunganModel::where('kelas', 'XII-TKJ-C')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2021')->count();

        $karyawanswasta_xiitkjc_2022 = HasilHitunganModel::where('kelas', 'XII-TKJ-C')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2022')->count();
        $pegawainegeri_xiitkjc_2022 = HasilHitunganModel::where('kelas', 'XII-TKJ-C')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2022')->count();
        $pekerja_tdk_tetap_xiitkjc_2022 = HasilHitunganModel::where('kelas', 'XII-TKJ-C')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2022')->count();
        $usaha_xiitkjc_2022 = HasilHitunganModel::where('kelas', 'XII-TKJ-C')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2022')->count();

        $karyawanswasta_xiitkjc_2023 = HasilHitunganModel::where('kelas', 'XII-TKJ-C')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2023')->count();
        $pegawainegeri_xiitkjc_2023 = HasilHitunganModel::where('kelas', 'XII-TKJ-C')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2023')->count();
        $pekerja_tdk_tetap_xiitkjc_2023 = HasilHitunganModel::where('kelas', 'XII-TKJ-C')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2023')->count();
        $usaha_xiitkjc_2023 = HasilHitunganModel::where('kelas', 'XII-TKJ-C')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2023')->count();

        $karyawanswasta_xiitkjc_2024 = HasilHitunganModel::where('kelas', 'XII-TKJ-C')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2024')->count();
        $pegawainegeri_xiitkjc_2024 = HasilHitunganModel::where('kelas', 'XII-TKJ-C')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2024')->count();
        $pekerja_tdk_tetap_xiitkjc_2024 = HasilHitunganModel::where('kelas', 'XII-TKJ-C')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2024')->count();
        $usaha_xiitkjc_2024 = HasilHitunganModel::where('kelas', 'XII-TKJ-C')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2024')->count();

        $karyawanswasta_xiitkjc_2025 = HasilHitunganModel::where('kelas', 'XII-TKJ-C')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2025')->count();
        $pegawainegeri_xiitkjc_2025 = HasilHitunganModel::where('kelas', 'XII-TKJ-C')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2025')->count();
        $pekerja_tdk_tetap_xiitkjc_2025 = HasilHitunganModel::where('kelas', 'XII-TKJ-C')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2025')->count();
        $usaha_xiitkjc_2025 = HasilHitunganModel::where('kelas', 'XII-TKJ-C')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2025')->count();

        // ! DATA KEALAS X-TKR-A //
        $karyawanswasta_xtkra_2020 = HasilHitunganModel::where('kelas', 'X-tkr-a')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2020')->count();
        $pegawainegeri_xtkra_2020 = HasilHitunganModel::where('kelas', 'X-tkr-a')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2020')->count();
        $pekerja_tdk_tetap_xtkra_2020 = HasilHitunganModel::where('kelas', 'X-tkr-a')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2020')->count();
        $usaha_xtkra_2020 = HasilHitunganModel::where('kelas', 'X-tkr-a')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2020')->count();

        $karyawanswasta_xtkra_2021 = HasilHitunganModel::where('kelas', 'X-tkr-a')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2021')->count();
        $pegawainegeri_xtkra_2021 = HasilHitunganModel::where('kelas', 'X-tkr-a')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2021')->count();
        $pekerja_tdk_tetap_xtkra_2021 = HasilHitunganModel::where('kelas', 'X-tkr-a')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2021')->count();
        $usaha_xtkra_2021 = HasilHitunganModel::where('kelas', 'X-tkr-a')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2021')->count();

        $karyawanswasta_xtkra_2022 = HasilHitunganModel::where('kelas', 'X-tkr-a')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2022')->count();
        $pegawainegeri_xtkra_2022 = HasilHitunganModel::where('kelas', 'X-tkr-a')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2022')->count();
        $pekerja_tdk_tetap_xtkra_2022 = HasilHitunganModel::where('kelas', 'X-tkr-a')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2022')->count();
        $usaha_xtkra_2022 = HasilHitunganModel::where('kelas', 'X-tkr-a')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2022')->count();

        $karyawanswasta_xtkra_2023 = HasilHitunganModel::where('kelas', 'X-tkr-a')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2023')->count();
        $pegawainegeri_xtkra_2023 = HasilHitunganModel::where('kelas', 'X-tkr-a')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2023')->count();
        $pekerja_tdk_tetap_xtkra_2023 = HasilHitunganModel::where('kelas', 'X-tkr-a')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2023')->count();
        $usaha_xtkra_2023 = HasilHitunganModel::where('kelas', 'X-tkr-a')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2023')->count();

        $karyawanswasta_xtkra_2024 = HasilHitunganModel::where('kelas', 'X-tkr-a')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2024')->count();
        $pegawainegeri_xtkra_2024 = HasilHitunganModel::where('kelas', 'X-tkr-a')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2024')->count();
        $pekerja_tdk_tetap_xtkra_2024 = HasilHitunganModel::where('kelas', 'X-tkr-a')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2024')->count();
        $usaha_xtkra_2024 = HasilHitunganModel::where('kelas', 'X-tkr-a')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2024')->count();

        $karyawanswasta_xtkra_2025 = HasilHitunganModel::where('kelas', 'X-tkr-a')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2025')->count();
        $pegawainegeri_xtkra_2025 = HasilHitunganModel::where('kelas', 'X-tkr-a')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2025')->count();
        $pekerja_tdk_tetap_xtkra_2025 = HasilHitunganModel::where('kelas', 'X-tkr-a')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2025')->count();
        $usaha_xtkra_2025 = HasilHitunganModel::where('kelas', 'X-tkr-a')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2025')->count();

        // ! DATA KEALAS X-TKR-B //
        $karyawanswasta_xtkrb_2020 = HasilHitunganModel::where('kelas', 'X-tkr-b')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2020')->count();
        $pegawainegeri_xtkrb_2020 = HasilHitunganModel::where('kelas', 'X-tkr-b')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2020')->count();
        $pekerja_tdk_tetap_xtkrb_2020 = HasilHitunganModel::where('kelas', 'X-tkr-b')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2020')->count();
        $usaha_xtkrb_2020 = HasilHitunganModel::where('kelas', 'X-tkr-b')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2020')->count();

        $karyawanswasta_xtkrb_2021 = HasilHitunganModel::where('kelas', 'X-tkr-b')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2021')->count();
        $pegawainegeri_xtkrb_2021 = HasilHitunganModel::where('kelas', 'X-tkr-b')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2021')->count();
        $pekerja_tdk_tetap_xtkrb_2021 = HasilHitunganModel::where('kelas', 'X-tkr-b')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2021')->count();
        $usaha_xtkrb_2021 = HasilHitunganModel::where('kelas', 'X-tkr-b')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2021')->count();

        $karyawanswasta_xtkrb_2022 = HasilHitunganModel::where('kelas', 'X-tkr-b')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2022')->count();
        $pegawainegeri_xtkrb_2022 = HasilHitunganModel::where('kelas', 'X-tkr-b')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2022')->count();
        $pekerja_tdk_tetap_xtkrb_2022 = HasilHitunganModel::where('kelas', 'X-tkr-b')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2022')->count();
        $usaha_xtkrb_2022 = HasilHitunganModel::where('kelas', 'X-tkr-b')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2022')->count();

        $karyawanswasta_xtkrb_2023 = HasilHitunganModel::where('kelas', 'X-tkr-b')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2023')->count();
        $pegawainegeri_xtkrb_2023 = HasilHitunganModel::where('kelas', 'X-tkr-b')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2023')->count();
        $pekerja_tdk_tetap_xtkrb_2023 = HasilHitunganModel::where('kelas', 'X-tkr-b')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2023')->count();
        $usaha_xtkrb_2023 = HasilHitunganModel::where('kelas', 'X-tkr-b')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2023')->count();

        $karyawanswasta_xtkrb_2024 = HasilHitunganModel::where('kelas', 'X-tkr-b')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2024')->count();
        $pegawainegeri_xtkrb_2024 = HasilHitunganModel::where('kelas', 'X-tkr-b')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2024')->count();
        $pekerja_tdk_tetap_xtkrb_2024 = HasilHitunganModel::where('kelas', 'X-tkr-b')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2024')->count();
        $usaha_xtkrb_2024 = HasilHitunganModel::where('kelas', 'X-tkr-b')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2024')->count();

        $karyawanswasta_xtkrb_2025 = HasilHitunganModel::where('kelas', 'X-tkr-b')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2025')->count();
        $pegawainegeri_xtkrb_2025 = HasilHitunganModel::where('kelas', 'X-tkr-b')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2025')->count();
        $pekerja_tdk_tetap_xtkrb_2025 = HasilHitunganModel::where('kelas', 'X-tkr-b')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2025')->count();
        $usaha_xtkrb_2025 = HasilHitunganModel::where('kelas', 'X-tkr-b')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2025')->count();

        // ! DATA KEALAS X-TKR-C //
        $karyawanswasta_xtkrc_2020 = HasilHitunganModel::where('kelas', 'X-tkr-c')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2020')->count();
        $pegawainegeri_xtkrc_2020 = HasilHitunganModel::where('kelas', 'X-tkr-c')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2020')->count();
        $pekerja_tdk_tetap_xtkrc_2020 = HasilHitunganModel::where('kelas', 'X-tkr-c')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2020')->count();
        $usaha_xtkrc_2020 = HasilHitunganModel::where('kelas', 'X-tkr-c')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2020')->count();

        $karyawanswasta_xtkrc_2021 = HasilHitunganModel::where('kelas', 'X-tkr-c')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2021')->count();
        $pegawainegeri_xtkrc_2021 = HasilHitunganModel::where('kelas', 'X-tkr-c')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2021')->count();
        $pekerja_tdk_tetap_xtkrc_2021 = HasilHitunganModel::where('kelas', 'X-tkr-c')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2021')->count();
        $usaha_xtkrc_2021 = HasilHitunganModel::where('kelas', 'X-tkr-c')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2021')->count();

        $karyawanswasta_xtkrc_2022 = HasilHitunganModel::where('kelas', 'X-tkr-c')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2022')->count();
        $pegawainegeri_xtkrc_2022 = HasilHitunganModel::where('kelas', 'X-tkr-c')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2022')->count();
        $pekerja_tdk_tetap_xtkrc_2022 = HasilHitunganModel::where('kelas', 'X-tkr-c')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2022')->count();
        $usaha_xtkrc_2022 = HasilHitunganModel::where('kelas', 'X-tkr-c')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2022')->count();

        $karyawanswasta_xtkrc_2023 = HasilHitunganModel::where('kelas', 'X-tkr-c')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2023')->count();
        $pegawainegeri_xtkrc_2023 = HasilHitunganModel::where('kelas', 'X-tkr-c')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2023')->count();
        $pekerja_tdk_tetap_xtkrc_2023 = HasilHitunganModel::where('kelas', 'X-tkr-c')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2023')->count();
        $usaha_xtkrc_2023 = HasilHitunganModel::where('kelas', 'X-tkr-c')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2023')->count();

        $karyawanswasta_xtkrc_2024 = HasilHitunganModel::where('kelas', 'X-tkr-c')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2024')->count();
        $pegawainegeri_xtkrc_2024 = HasilHitunganModel::where('kelas', 'X-tkr-c')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2024')->count();
        $pekerja_tdk_tetap_xtkrc_2024 = HasilHitunganModel::where('kelas', 'X-tkr-c')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2024')->count();
        $usaha_xtkrc_2024 = HasilHitunganModel::where('kelas', 'X-tkr-c')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2024')->count();

        $karyawanswasta_xtkrc_2025 = HasilHitunganModel::where('kelas', 'X-tkr-c')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2025')->count();
        $pegawainegeri_xtkrc_2025 = HasilHitunganModel::where('kelas', 'X-tkr-c')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2025')->count();
        $pekerja_tdk_tetap_xtkrc_2025 = HasilHitunganModel::where('kelas', 'X-tkr-c')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2025')->count();
        $usaha_xtkrc_2025 = HasilHitunganModel::where('kelas', 'X-tkr-c')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2025')->count();

        // ! DATA KEALAS XI-TKJ-A //
        $karyawanswasta_xitkra_2020 = HasilHitunganModel::where('kelas', 'xi-tkr-a')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2020')->count();
        $pegawainegeri_xitkra_2020 = HasilHitunganModel::where('kelas', 'xi-tkr-a')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2020')->count();
        $pekerja_tdk_tetap_xitkra_2020 = HasilHitunganModel::where('kelas', 'xi-tkr-a')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2020')->count();
        $usaha_xitkra_2020 = HasilHitunganModel::where('kelas', 'xi-tkr-a')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2020')->count();

        $karyawanswasta_xitkra_2021 = HasilHitunganModel::where('kelas', 'xi-tkr-a')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2021')->count();
        $pegawainegeri_xitkra_2021 = HasilHitunganModel::where('kelas', 'xi-tkr-a')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2021')->count();
        $pekerja_tdk_tetap_xitkra_2021 = HasilHitunganModel::where('kelas', 'xi-tkr-a')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2021')->count();
        $usaha_xitkra_2021 = HasilHitunganModel::where('kelas', 'xi-tkr-a')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2021')->count();

        $karyawanswasta_xitkra_2022 = HasilHitunganModel::where('kelas', 'xi-tkr-a')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2022')->count();
        $pegawainegeri_xitkra_2022 = HasilHitunganModel::where('kelas', 'xi-tkr-a')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2022')->count();
        $pekerja_tdk_tetap_xitkra_2022 = HasilHitunganModel::where('kelas', 'xi-tkr-a')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2022')->count();
        $usaha_xitkra_2022 = HasilHitunganModel::where('kelas', 'xi-tkr-a')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2022')->count();

        $karyawanswasta_xitkra_2023 = HasilHitunganModel::where('kelas', 'xi-tkr-a')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2023')->count();
        $pegawainegeri_xitkra_2023 = HasilHitunganModel::where('kelas', 'xi-tkr-a')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2023')->count();
        $pekerja_tdk_tetap_xitkra_2023 = HasilHitunganModel::where('kelas', 'xi-tkr-a')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2023')->count();
        $usaha_xitkra_2023 = HasilHitunganModel::where('kelas', 'xi-tkr-a')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2023')->count();

        $karyawanswasta_xitkra_2024 = HasilHitunganModel::where('kelas', 'xi-tkr-a')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2024')->count();
        $pegawainegeri_xitkra_2024 = HasilHitunganModel::where('kelas', 'xi-tkr-a')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2024')->count();
        $pekerja_tdk_tetap_xitkra_2024 = HasilHitunganModel::where('kelas', 'xi-tkr-a')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2024')->count();
        $usaha_xitkra_2024 = HasilHitunganModel::where('kelas', 'xi-tkr-a')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2024')->count();

        $karyawanswasta_xitkra_2025 = HasilHitunganModel::where('kelas', 'xi-tkr-a')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2025')->count();
        $pegawainegeri_xitkra_2025 = HasilHitunganModel::where('kelas', 'xi-tkr-a')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2025')->count();
        $pekerja_tdk_tetap_xitkra_2025 = HasilHitunganModel::where('kelas', 'xi-tkr-a')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2025')->count();
        $usaha_xitkra_2025 = HasilHitunganModel::where('kelas', 'xi-tkr-a')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2025')->count();

        // ! DATA KEALAS XI-TKR-B //
        $karyawanswasta_xitkrb_2020 = HasilHitunganModel::where('kelas', 'xi-tkr-b')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2020')->count();
        $pegawainegeri_xitkrb_2020 = HasilHitunganModel::where('kelas', 'xi-tkr-b')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2020')->count();
        $pekerja_tdk_tetap_xitkrb_2020 = HasilHitunganModel::where('kelas', 'xi-tkr-b')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2020')->count();
        $usaha_xitkrb_2020 = HasilHitunganModel::where('kelas', 'xi-tkr-b')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2020')->count();

        $karyawanswasta_xitkrb_2021 = HasilHitunganModel::where('kelas', 'xi-tkr-b')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2021')->count();
        $pegawainegeri_xitkrb_2021 = HasilHitunganModel::where('kelas', 'xi-tkr-b')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2021')->count();
        $pekerja_tdk_tetap_xitkrb_2021 = HasilHitunganModel::where('kelas', 'xi-tkr-b')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2021')->count();
        $usaha_xitkrb_2021 = HasilHitunganModel::where('kelas', 'xi-tkr-b')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2021')->count();

        $karyawanswasta_xitkrb_2022 = HasilHitunganModel::where('kelas', 'xi-tkr-b')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2022')->count();
        $pegawainegeri_xitkrb_2022 = HasilHitunganModel::where('kelas', 'xi-tkr-b')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2022')->count();
        $pekerja_tdk_tetap_xitkrb_2022 = HasilHitunganModel::where('kelas', 'xi-tkr-b')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2022')->count();
        $usaha_xitkrb_2022 = HasilHitunganModel::where('kelas', 'xi-tkr-b')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2022')->count();

        $karyawanswasta_xitkrb_2023 = HasilHitunganModel::where('kelas', 'xi-tkr-b')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2023')->count();
        $pegawainegeri_xitkrb_2023 = HasilHitunganModel::where('kelas', 'xi-tkr-b')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2023')->count();
        $pekerja_tdk_tetap_xitkrb_2023 = HasilHitunganModel::where('kelas', 'xi-tkr-b')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2023')->count();
        $usaha_xitkrb_2023 = HasilHitunganModel::where('kelas', 'xi-tkr-b')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2023')->count();

        $karyawanswasta_xitkrb_2024 = HasilHitunganModel::where('kelas', 'xi-tkr-b')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2024')->count();
        $pegawainegeri_xitkrb_2024 = HasilHitunganModel::where('kelas', 'xi-tkr-b')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2024')->count();
        $pekerja_tdk_tetap_xitkrb_2024 = HasilHitunganModel::where('kelas', 'xi-tkr-b')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2024')->count();
        $usaha_xitkrb_2024 = HasilHitunganModel::where('kelas', 'xi-tkr-b')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2024')->count();

        $karyawanswasta_xitkrb_2025 = HasilHitunganModel::where('kelas', 'xi-tkr-b')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2025')->count();
        $pegawainegeri_xitkrb_2025 = HasilHitunganModel::where('kelas', 'xi-tkr-b')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2025')->count();
        $pekerja_tdk_tetap_xitkrb_2025 = HasilHitunganModel::where('kelas', 'xi-tkr-b')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2025')->count();
        $usaha_xitkrb_2025 = HasilHitunganModel::where('kelas', 'xi-tkr-b')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2025')->count();

        // ! DATA KEALAS XI-tkr-C //
        $karyawanswasta_xitkrc_2020 = HasilHitunganModel::where('kelas', 'xi-tkr-c')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2020')->count();
        $pegawainegeri_xitkrc_2020 = HasilHitunganModel::where('kelas', 'xi-tkr-c')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2020')->count();
        $pekerja_tdk_tetap_xitkrc_2020 = HasilHitunganModel::where('kelas', 'xi-tkr-c')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2020')->count();
        $usaha_xitkrc_2020 = HasilHitunganModel::where('kelas', 'xi-tkr-c')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2020')->count();

        $karyawanswasta_xitkrc_2021 = HasilHitunganModel::where('kelas', 'xi-tkr-c')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2021')->count();
        $pegawainegeri_xitkrc_2021 = HasilHitunganModel::where('kelas', 'xi-tkr-c')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2021')->count();
        $pekerja_tdk_tetap_xitkrc_2021 = HasilHitunganModel::where('kelas', 'xi-tkr-c')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2021')->count();
        $usaha_xitkrc_2021 = HasilHitunganModel::where('kelas', 'xi-tkr-c')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2021')->count();

        $karyawanswasta_xitkrc_2022 = HasilHitunganModel::where('kelas', 'xi-tkr-c')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2022')->count();
        $pegawainegeri_xitkrc_2022 = HasilHitunganModel::where('kelas', 'xi-tkr-c')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2022')->count();
        $pekerja_tdk_tetap_xitkrc_2022 = HasilHitunganModel::where('kelas', 'xi-tkr-c')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2022')->count();
        $usaha_xitkrc_2022 = HasilHitunganModel::where('kelas', 'xi-tkr-c')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2022')->count();

        $karyawanswasta_xitkrc_2023 = HasilHitunganModel::where('kelas', 'xi-tkr-c')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2023')->count();
        $pegawainegeri_xitkrc_2023 = HasilHitunganModel::where('kelas', 'xi-tkr-c')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2023')->count();
        $pekerja_tdk_tetap_xitkrc_2023 = HasilHitunganModel::where('kelas', 'xi-tkr-c')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2023')->count();
        $usaha_xitkrc_2023 = HasilHitunganModel::where('kelas', 'xi-tkr-c')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2023')->count();

        $karyawanswasta_xitkrc_2024 = HasilHitunganModel::where('kelas', 'xi-tkr-c')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2024')->count();
        $pegawainegeri_xitkrc_2024 = HasilHitunganModel::where('kelas', 'xi-tkr-c')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2024')->count();
        $pekerja_tdk_tetap_xitkrc_2024 = HasilHitunganModel::where('kelas', 'xi-tkr-c')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2024')->count();
        $usaha_xitkrc_2024 = HasilHitunganModel::where('kelas', 'xi-tkr-c')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2024')->count();

        $karyawanswasta_xitkrc_2025 = HasilHitunganModel::where('kelas', 'xi-tkr-c')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2025')->count();
        $pegawainegeri_xitkrc_2025 = HasilHitunganModel::where('kelas', 'xi-tkr-c')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2025')->count();
        $pekerja_tdk_tetap_xitkrc_2025 = HasilHitunganModel::where('kelas', 'xi-tkr-c')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2025')->count();
        $usaha_xitkrc_2025 = HasilHitunganModel::where('kelas', 'xi-tkr-c')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2025')->count();

        // ! DATA KEALAS XII-tkr-A //
        $karyawanswasta_xiitkra_2020 = HasilHitunganModel::where('kelas', 'XII-tkr-A')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2020')->count();
        $pegawainegeri_xiitkra_2020 = HasilHitunganModel::where('kelas', 'XII-tkr-A')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2020')->count();
        $pekerja_tdk_tetap_xiitkra_2020 = HasilHitunganModel::where('kelas', 'XII-tkr-A')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2020')->count();
        $usaha_xiitkra_2020 = HasilHitunganModel::where('kelas', 'XII-tkr-A')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2020')->count();

        $karyawanswasta_xiitkra_2021 = HasilHitunganModel::where('kelas', 'XII-tkr-A')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2021')->count();
        $pegawainegeri_xiitkra_2021 = HasilHitunganModel::where('kelas', 'XII-tkr-A')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2021')->count();
        $pekerja_tdk_tetap_xiitkra_2021 = HasilHitunganModel::where('kelas', 'XII-tkr-A')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2021')->count();
        $usaha_xiitkra_2021 = HasilHitunganModel::where('kelas', 'XII-tkr-A')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2021')->count();

        $karyawanswasta_xiitkra_2022 = HasilHitunganModel::where('kelas', 'XII-tkr-A')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2022')->count();
        $pegawainegeri_xiitkra_2022 = HasilHitunganModel::where('kelas', 'XII-tkr-A')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2022')->count();
        $pekerja_tdk_tetap_xiitkra_2022 = HasilHitunganModel::where('kelas', 'XII-tkr-A')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2022')->count();
        $usaha_xiitkra_2022 = HasilHitunganModel::where('kelas', 'XII-tkr-A')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2022')->count();

        $karyawanswasta_xiitkra_2023 = HasilHitunganModel::where('kelas', 'XII-tkr-A')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2023')->count();
        $pegawainegeri_xiitkra_2023 = HasilHitunganModel::where('kelas', 'XII-tkr-A')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2023')->count();
        $pekerja_tdk_tetap_xiitkra_2023 = HasilHitunganModel::where('kelas', 'XII-tkr-A')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2023')->count();
        $usaha_xiitkra_2023 = HasilHitunganModel::where('kelas', 'XII-tkr-A')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2023')->count();

        $karyawanswasta_xiitkra_2024 = HasilHitunganModel::where('kelas', 'XII-tkr-A')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2024')->count();
        $pegawainegeri_xiitkra_2024 = HasilHitunganModel::where('kelas', 'XII-tkr-A')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2024')->count();
        $pekerja_tdk_tetap_xiitkra_2024 = HasilHitunganModel::where('kelas', 'XII-tkr-A')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2024')->count();
        $usaha_xiitkra_2024 = HasilHitunganModel::where('kelas', 'XII-tkr-A')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2024')->count();

        $karyawanswasta_xiitkra_2025 = HasilHitunganModel::where('kelas', 'XII-tkr-A')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2025')->count();
        $pegawainegeri_xiitkra_2025 = HasilHitunganModel::where('kelas', 'XII-tkr-A')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2025')->count();
        $pekerja_tdk_tetap_xiitkra_2025 = HasilHitunganModel::where('kelas', 'XII-tkr-A')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2025')->count();
        $usaha_xiitkra_2025 = HasilHitunganModel::where('kelas', 'XII-tkr-A')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2025')->count();

        // ! DATA KEALAS XII-tkr-B //
        $karyawanswasta_xiitkrb_2020 = HasilHitunganModel::where('kelas', 'XII-tkr-B')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2020')->count();
        $pegawainegeri_xiitkrb_2020 = HasilHitunganModel::where('kelas', 'XII-tkr-B')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2020')->count();
        $pekerja_tdk_tetap_xiitkrb_2020 = HasilHitunganModel::where('kelas', 'XII-tkr-B')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2020')->count();
        $usaha_xiitkrb_2020 = HasilHitunganModel::where('kelas', 'XII-tkr-B')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2020')->count();

        $karyawanswasta_xiitkrb_2021 = HasilHitunganModel::where('kelas', 'XII-tkr-B')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2021')->count();
        $pegawainegeri_xiitkrb_2021 = HasilHitunganModel::where('kelas', 'XII-tkr-B')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2021')->count();
        $pekerja_tdk_tetap_xiitkrb_2021 = HasilHitunganModel::where('kelas', 'XII-tkr-B')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2021')->count();
        $usaha_xiitkrb_2021 = HasilHitunganModel::where('kelas', 'XII-tkr-B')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2021')->count();

        $karyawanswasta_xiitkrb_2022 = HasilHitunganModel::where('kelas', 'XII-tkr-B')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2022')->count();
        $pegawainegeri_xiitkrb_2022 = HasilHitunganModel::where('kelas', 'XII-tkr-B')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2022')->count();
        $pekerja_tdk_tetap_xiitkrb_2022 = HasilHitunganModel::where('kelas', 'XII-tkr-B')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2022')->count();
        $usaha_xiitkrb_2022 = HasilHitunganModel::where('kelas', 'XII-tkr-B')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2022')->count();

        $karyawanswasta_xiitkrb_2023 = HasilHitunganModel::where('kelas', 'XII-tkr-B')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2023')->count();
        $pegawainegeri_xiitkrb_2023 = HasilHitunganModel::where('kelas', 'XII-tkr-B')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2023')->count();
        $pekerja_tdk_tetap_xiitkrb_2023 = HasilHitunganModel::where('kelas', 'XII-tkr-B')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2023')->count();
        $usaha_xiitkrb_2023 = HasilHitunganModel::where('kelas', 'XII-tkr-B')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2023')->count();

        $karyawanswasta_xiitkrb_2024 = HasilHitunganModel::where('kelas', 'XII-tkr-B')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2024')->count();
        $pegawainegeri_xiitkrb_2024 = HasilHitunganModel::where('kelas', 'XII-tkr-B')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2024')->count();
        $pekerja_tdk_tetap_xiitkrb_2024 = HasilHitunganModel::where('kelas', 'XII-tkr-B')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2024')->count();
        $usaha_xiitkrb_2024 = HasilHitunganModel::where('kelas', 'XII-tkr-B')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2024')->count();

        $karyawanswasta_xiitkrb_2025 = HasilHitunganModel::where('kelas', 'XII-tkr-B')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2025')->count();
        $pegawainegeri_xiitkrb_2025 = HasilHitunganModel::where('kelas', 'XII-tkr-B')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2025')->count();
        $pekerja_tdk_tetap_xiitkrb_2025 = HasilHitunganModel::where('kelas', 'XII-tkr-B')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2025')->count();
        $usaha_xiitkrb_2025 = HasilHitunganModel::where('kelas', 'XII-tkr-B')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2025')->count();

        // ! DATA KEALAS XII-tkr-C //
        $karyawanswasta_xiitkrc_2020 = HasilHitunganModel::where('kelas', 'XII-tkr-C')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2020')->count();
        $pegawainegeri_xiitkrc_2020 = HasilHitunganModel::where('kelas', 'XII-tkr-C')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2020')->count();
        $pekerja_tdk_tetap_xiitkrc_2020 = HasilHitunganModel::where('kelas', 'XII-tkr-C')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2020')->count();
        $usaha_xiitkrc_2020 = HasilHitunganModel::where('kelas', 'XII-tkr-C')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2020')->count();

        $karyawanswasta_xiitkrc_2021 = HasilHitunganModel::where('kelas', 'XII-tkr-C')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2021')->count();
        $pegawainegeri_xiitkrc_2021 = HasilHitunganModel::where('kelas', 'XII-tkr-C')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2021')->count();
        $pekerja_tdk_tetap_xiitkrc_2021 = HasilHitunganModel::where('kelas', 'XII-tkr-C')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2021')->count();
        $usaha_xiitkrc_2021 = HasilHitunganModel::where('kelas', 'XII-tkr-C')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2021')->count();

        $karyawanswasta_xiitkrc_2022 = HasilHitunganModel::where('kelas', 'XII-tkr-C')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2022')->count();
        $pegawainegeri_xiitkrc_2022 = HasilHitunganModel::where('kelas', 'XII-tkr-C')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2022')->count();
        $pekerja_tdk_tetap_xiitkrc_2022 = HasilHitunganModel::where('kelas', 'XII-tkr-C')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2022')->count();
        $usaha_xiitkrc_2022 = HasilHitunganModel::where('kelas', 'XII-tkr-C')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2022')->count();

        $karyawanswasta_xiitkrc_2023 = HasilHitunganModel::where('kelas', 'XII-tkr-C')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2023')->count();
        $pegawainegeri_xiitkrc_2023 = HasilHitunganModel::where('kelas', 'XII-tkr-C')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2023')->count();
        $pekerja_tdk_tetap_xiitkrc_2023 = HasilHitunganModel::where('kelas', 'XII-tkr-C')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2023')->count();
        $usaha_xiitkrc_2023 = HasilHitunganModel::where('kelas', 'XII-tkr-C')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2023')->count();

        $karyawanswasta_xiitkrc_2024 = HasilHitunganModel::where('kelas', 'XII-tkr-C')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2024')->count();
        $pegawainegeri_xiitkrc_2024 = HasilHitunganModel::where('kelas', 'XII-tkr-C')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2024')->count();
        $pekerja_tdk_tetap_xiitkrc_2024 = HasilHitunganModel::where('kelas', 'XII-tkr-C')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2024')->count();
        $usaha_xiitkrc_2024 = HasilHitunganModel::where('kelas', 'XII-tkr-C')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2024')->count();

        $karyawanswasta_xiitkrc_2025 = HasilHitunganModel::where('kelas', 'XII-tkr-C')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2025')->count();
        $pegawainegeri_xiitkrc_2025 = HasilHitunganModel::where('kelas', 'XII-tkr-C')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2025')->count();
        $pekerja_tdk_tetap_xiitkrc_2025 = HasilHitunganModel::where('kelas', 'XII-tkr-C')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2025')->count();
        $usaha_xiitkrc_2025 = HasilHitunganModel::where('kelas', 'XII-tkr-C')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2025')->count();

        return view(
            'admin.analisa_data.data_bansos.status_pekerjaan_ortu.index',
            compact(
                'karyawanswasta_xtkja_2020',
                'karyawanswasta_xtkja_2021',
                'karyawanswasta_xtkja_2022',
                'karyawanswasta_xtkja_2023',
                'karyawanswasta_xtkja_2024',
                'karyawanswasta_xtkja_2025',
                'pegawainegeri_xtkja_2020',
                'pegawainegeri_xtkja_2021',
                'pegawainegeri_xtkja_2022',
                'pegawainegeri_xtkja_2023',
                'pegawainegeri_xtkja_2024',
                'pegawainegeri_xtkja_2025',
                'pekerja_tdk_tetap_xtkja_2020',
                'pekerja_tdk_tetap_xtkja_2021',
                'pekerja_tdk_tetap_xtkja_2022',
                'pekerja_tdk_tetap_xtkja_2023',
                'pekerja_tdk_tetap_xtkja_2024',
                'pekerja_tdk_tetap_xtkja_2025',
                'usaha_xtkja_2020',
                'usaha_xtkja_2021',
                'usaha_xtkja_2022',
                'usaha_xtkja_2023',
                'usaha_xtkja_2024',
                'usaha_xtkja_2025',
                'karyawanswasta_xtkjb_2020',
                'karyawanswasta_xtkjb_2021',
                'karyawanswasta_xtkjb_2022',
                'karyawanswasta_xtkjb_2023',
                'karyawanswasta_xtkjb_2024',
                'karyawanswasta_xtkjb_2025',
                'pegawainegeri_xtkjb_2020',
                'pegawainegeri_xtkjb_2021',
                'pegawainegeri_xtkjb_2022',
                'pegawainegeri_xtkjb_2023',
                'pegawainegeri_xtkjb_2024',
                'pegawainegeri_xtkjb_2025',
                'pekerja_tdk_tetap_xtkjb_2020',
                'pekerja_tdk_tetap_xtkjb_2021',
                'pekerja_tdk_tetap_xtkjb_2022',
                'pekerja_tdk_tetap_xtkjb_2023',
                'pekerja_tdk_tetap_xtkjb_2024',
                'pekerja_tdk_tetap_xtkjb_2025',
                'usaha_xtkjb_2020',
                'usaha_xtkjb_2021',
                'usaha_xtkjb_2022',
                'usaha_xtkjb_2023',
                'usaha_xtkjb_2024',
                'usaha_xtkjb_2025',
                'karyawanswasta_xtkjc_2020',
                'karyawanswasta_xtkjc_2021',
                'karyawanswasta_xtkjc_2022',
                'karyawanswasta_xtkjc_2023',
                'karyawanswasta_xtkjc_2024',
                'karyawanswasta_xtkjc_2025',
                'pegawainegeri_xtkjc_2020',
                'pegawainegeri_xtkjc_2021',
                'pegawainegeri_xtkjc_2022',
                'pegawainegeri_xtkjc_2023',
                'pegawainegeri_xtkjc_2024',
                'pegawainegeri_xtkjc_2025',
                'pekerja_tdk_tetap_xtkjc_2020',
                'pekerja_tdk_tetap_xtkjc_2021',
                'pekerja_tdk_tetap_xtkjc_2022',
                'pekerja_tdk_tetap_xtkjc_2023',
                'pekerja_tdk_tetap_xtkjc_2024',
                'pekerja_tdk_tetap_xtkjc_2025',
                'usaha_xtkjc_2020',
                'usaha_xtkjc_2021',
                'usaha_xtkjc_2022',
                'usaha_xtkjc_2023',
                'usaha_xtkjc_2024',
                'usaha_xtkjc_2025',
                'karyawanswasta_xtkjd_2020',
                'karyawanswasta_xtkjd_2021',
                'karyawanswasta_xtkjd_2022',
                'karyawanswasta_xtkjd_2023',
                'karyawanswasta_xtkjd_2024',
                'karyawanswasta_xtkjd_2025',
                'pegawainegeri_xtkjd_2020',
                'pegawainegeri_xtkjd_2021',
                'pegawainegeri_xtkjd_2022',
                'pegawainegeri_xtkjd_2023',
                'pegawainegeri_xtkjd_2024',
                'pegawainegeri_xtkjd_2025',
                'pekerja_tdk_tetap_xtkjd_2020',
                'pekerja_tdk_tetap_xtkjd_2021',
                'pekerja_tdk_tetap_xtkjd_2022',
                'pekerja_tdk_tetap_xtkjd_2023',
                'pekerja_tdk_tetap_xtkjd_2024',
                'pekerja_tdk_tetap_xtkjd_2025',
                'usaha_xtkjd_2020',
                'usaha_xtkjd_2021',
                'usaha_xtkjd_2022',
                'usaha_xtkjd_2023',
                'usaha_xtkjd_2024',
                'usaha_xtkjd_2025',
                'karyawanswasta_xitkja_2020',
                'karyawanswasta_xitkja_2021',
                'karyawanswasta_xitkja_2022',
                'karyawanswasta_xitkja_2023',
                'karyawanswasta_xitkja_2024',
                'karyawanswasta_xitkja_2025',
                'pegawainegeri_xitkja_2020',
                'pegawainegeri_xitkja_2021',
                'pegawainegeri_xitkja_2022',
                'pegawainegeri_xitkja_2023',
                'pegawainegeri_xitkja_2024',
                'pegawainegeri_xitkja_2025',
                'pekerja_tdk_tetap_xitkja_2020',
                'pekerja_tdk_tetap_xitkja_2021',
                'pekerja_tdk_tetap_xitkja_2022',
                'pekerja_tdk_tetap_xitkja_2023',
                'pekerja_tdk_tetap_xitkja_2024',
                'pekerja_tdk_tetap_xitkja_2025',
                'usaha_xitkja_2020',
                'usaha_xitkja_2021',
                'usaha_xitkja_2022',
                'usaha_xitkja_2023',
                'usaha_xitkja_2024',
                'usaha_xitkja_2025',
                'karyawanswasta_xitkjb_2020',
                'karyawanswasta_xitkjb_2021',
                'karyawanswasta_xitkjb_2022',
                'karyawanswasta_xitkjb_2023',
                'karyawanswasta_xitkjb_2024',
                'karyawanswasta_xitkjb_2025',
                'pegawainegeri_xitkjb_2020',
                'pegawainegeri_xitkjb_2021',
                'pegawainegeri_xitkjb_2022',
                'pegawainegeri_xitkjb_2023',
                'pegawainegeri_xitkjb_2024',
                'pegawainegeri_xitkjb_2025',
                'pekerja_tdk_tetap_xitkjb_2020',
                'pekerja_tdk_tetap_xitkjb_2021',
                'pekerja_tdk_tetap_xitkjb_2022',
                'pekerja_tdk_tetap_xitkjb_2023',
                'pekerja_tdk_tetap_xitkjb_2024',
                'pekerja_tdk_tetap_xitkjb_2025',
                'usaha_xitkjb_2020',
                'usaha_xitkjb_2021',
                'usaha_xitkjb_2022',
                'usaha_xitkjb_2023',
                'usaha_xitkjb_2024',
                'usaha_xitkjb_2025',
                'karyawanswasta_xitkjc_2020',
                'karyawanswasta_xitkjc_2021',
                'karyawanswasta_xitkjc_2022',
                'karyawanswasta_xitkjc_2023',
                'karyawanswasta_xitkjc_2024',
                'karyawanswasta_xitkjc_2025',
                'pegawainegeri_xitkjc_2020',
                'pegawainegeri_xitkjc_2021',
                'pegawainegeri_xitkjc_2022',
                'pegawainegeri_xitkjc_2023',
                'pegawainegeri_xitkjc_2024',
                'pegawainegeri_xitkjc_2025',
                'pekerja_tdk_tetap_xitkjc_2020',
                'pekerja_tdk_tetap_xitkjc_2021',
                'pekerja_tdk_tetap_xitkjc_2022',
                'pekerja_tdk_tetap_xitkjc_2023',
                'pekerja_tdk_tetap_xitkjc_2024',
                'pekerja_tdk_tetap_xitkjc_2025',
                'usaha_xitkjc_2020',
                'usaha_xitkjc_2021',
                'usaha_xitkjc_2022',
                'usaha_xitkjc_2023',
                'usaha_xitkjc_2024',
                'usaha_xitkjc_2025',
                'karyawanswasta_xiitkja_2020',
                'karyawanswasta_xiitkja_2021',
                'karyawanswasta_xiitkja_2022',
                'karyawanswasta_xiitkja_2023',
                'karyawanswasta_xiitkja_2024',
                'karyawanswasta_xiitkja_2025',
                'pegawainegeri_xiitkja_2020',
                'pegawainegeri_xiitkja_2021',
                'pegawainegeri_xiitkja_2022',
                'pegawainegeri_xiitkja_2023',
                'pegawainegeri_xiitkja_2024',
                'pegawainegeri_xiitkja_2025',
                'pekerja_tdk_tetap_xiitkja_2020',
                'pekerja_tdk_tetap_xiitkja_2021',
                'pekerja_tdk_tetap_xiitkja_2022',
                'pekerja_tdk_tetap_xiitkja_2023',
                'pekerja_tdk_tetap_xiitkja_2024',
                'pekerja_tdk_tetap_xiitkja_2025',
                'usaha_xiitkja_2020',
                'usaha_xiitkja_2021',
                'usaha_xiitkja_2022',
                'usaha_xiitkja_2023',
                'usaha_xiitkja_2024',
                'usaha_xiitkja_2025',
                'karyawanswasta_xiitkjb_2020',
                'karyawanswasta_xiitkjb_2021',
                'karyawanswasta_xiitkjb_2022',
                'karyawanswasta_xiitkjb_2023',
                'karyawanswasta_xiitkjb_2024',
                'karyawanswasta_xiitkjb_2025',
                'pegawainegeri_xiitkjb_2020',
                'pegawainegeri_xiitkjb_2021',
                'pegawainegeri_xiitkjb_2022',
                'pegawainegeri_xiitkjb_2023',
                'pegawainegeri_xiitkjb_2024',
                'pegawainegeri_xiitkjb_2025',
                'pekerja_tdk_tetap_xiitkjb_2020',
                'pekerja_tdk_tetap_xiitkjb_2021',
                'pekerja_tdk_tetap_xiitkjb_2022',
                'pekerja_tdk_tetap_xiitkjb_2023',
                'pekerja_tdk_tetap_xiitkjb_2024',
                'pekerja_tdk_tetap_xiitkjb_2025',
                'usaha_xiitkjb_2020',
                'usaha_xiitkjb_2021',
                'usaha_xiitkjb_2022',
                'usaha_xiitkjb_2023',
                'usaha_xiitkjb_2024',
                'usaha_xiitkjb_2025',
                'karyawanswasta_xiitkjc_2020',
                'karyawanswasta_xiitkjc_2021',
                'karyawanswasta_xiitkjc_2022',
                'karyawanswasta_xiitkjc_2023',
                'karyawanswasta_xiitkjc_2024',
                'karyawanswasta_xiitkjc_2025',
                'pegawainegeri_xiitkjc_2020',
                'pegawainegeri_xiitkjc_2021',
                'pegawainegeri_xiitkjc_2022',
                'pegawainegeri_xiitkjc_2023',
                'pegawainegeri_xiitkjc_2024',
                'pegawainegeri_xiitkjc_2025',
                'pekerja_tdk_tetap_xiitkjc_2020',
                'pekerja_tdk_tetap_xiitkjc_2021',
                'pekerja_tdk_tetap_xiitkjc_2022',
                'pekerja_tdk_tetap_xiitkjc_2023',
                'pekerja_tdk_tetap_xiitkjc_2024',
                'pekerja_tdk_tetap_xiitkjc_2025',
                'usaha_xiitkjc_2020',
                'usaha_xiitkjc_2021',
                'usaha_xiitkjc_2022',
                'usaha_xiitkjc_2023',
                'usaha_xiitkjc_2024',
                'usaha_xiitkjc_2025',
                'karyawanswasta_xtkra_2020',
                'karyawanswasta_xtkra_2021',
                'karyawanswasta_xtkra_2022',
                'karyawanswasta_xtkra_2023',
                'karyawanswasta_xtkra_2024',
                'karyawanswasta_xtkra_2025',
                'pegawainegeri_xtkra_2020',
                'pegawainegeri_xtkra_2021',
                'pegawainegeri_xtkra_2022',
                'pegawainegeri_xtkra_2023',
                'pegawainegeri_xtkra_2024',
                'pegawainegeri_xtkra_2025',
                'pekerja_tdk_tetap_xtkra_2020',
                'pekerja_tdk_tetap_xtkra_2021',
                'pekerja_tdk_tetap_xtkra_2022',
                'pekerja_tdk_tetap_xtkra_2023',
                'pekerja_tdk_tetap_xtkra_2024',
                'pekerja_tdk_tetap_xtkra_2025',
                'usaha_xtkra_2020',
                'usaha_xtkra_2021',
                'usaha_xtkra_2022',
                'usaha_xtkra_2023',
                'usaha_xtkra_2024',
                'usaha_xtkra_2025',
                'karyawanswasta_xtkrb_2020',
                'karyawanswasta_xtkrb_2021',
                'karyawanswasta_xtkrb_2022',
                'karyawanswasta_xtkrb_2023',
                'karyawanswasta_xtkrb_2024',
                'karyawanswasta_xtkrb_2025',
                'pegawainegeri_xtkrb_2020',
                'pegawainegeri_xtkrb_2021',
                'pegawainegeri_xtkrb_2022',
                'pegawainegeri_xtkrb_2023',
                'pegawainegeri_xtkrb_2024',
                'pegawainegeri_xtkrb_2025',
                'pekerja_tdk_tetap_xtkrb_2020',
                'pekerja_tdk_tetap_xtkrb_2021',
                'pekerja_tdk_tetap_xtkrb_2022',
                'pekerja_tdk_tetap_xtkrb_2023',
                'pekerja_tdk_tetap_xtkrb_2024',
                'pekerja_tdk_tetap_xtkrb_2025',
                'usaha_xtkrb_2020',
                'usaha_xtkrb_2021',
                'usaha_xtkrb_2022',
                'usaha_xtkrb_2023',
                'usaha_xtkrb_2024',
                'usaha_xtkrb_2025',
                'karyawanswasta_xtkrc_2020',
                'karyawanswasta_xtkrc_2021',
                'karyawanswasta_xtkrc_2022',
                'karyawanswasta_xtkrc_2023',
                'karyawanswasta_xtkrc_2024',
                'karyawanswasta_xtkrc_2025',
                'pegawainegeri_xtkrc_2020',
                'pegawainegeri_xtkrc_2021',
                'pegawainegeri_xtkrc_2022',
                'pegawainegeri_xtkrc_2023',
                'pegawainegeri_xtkrc_2024',
                'pegawainegeri_xtkrc_2025',
                'pekerja_tdk_tetap_xtkrc_2020',
                'pekerja_tdk_tetap_xtkrc_2021',
                'pekerja_tdk_tetap_xtkrc_2022',
                'pekerja_tdk_tetap_xtkrc_2023',
                'pekerja_tdk_tetap_xtkrc_2024',
                'pekerja_tdk_tetap_xtkrc_2025',
                'usaha_xtkrc_2020',
                'usaha_xtkrc_2021',
                'usaha_xtkrc_2022',
                'usaha_xtkrc_2023',
                'usaha_xtkrc_2024',
                'usaha_xtkrc_2025',
                'karyawanswasta_xitkra_2020',
                'karyawanswasta_xitkra_2021',
                'karyawanswasta_xitkra_2022',
                'karyawanswasta_xitkra_2023',
                'karyawanswasta_xitkra_2024',
                'karyawanswasta_xitkra_2025',
                'pegawainegeri_xitkra_2020',
                'pegawainegeri_xitkra_2021',
                'pegawainegeri_xitkra_2022',
                'pegawainegeri_xitkra_2023',
                'pegawainegeri_xitkra_2024',
                'pegawainegeri_xitkra_2025',
                'pekerja_tdk_tetap_xitkra_2020',
                'pekerja_tdk_tetap_xitkra_2021',
                'pekerja_tdk_tetap_xitkra_2022',
                'pekerja_tdk_tetap_xitkra_2023',
                'pekerja_tdk_tetap_xitkra_2024',
                'pekerja_tdk_tetap_xitkra_2025',
                'usaha_xitkra_2020',
                'usaha_xitkra_2021',
                'usaha_xitkra_2022',
                'usaha_xitkra_2023',
                'usaha_xitkra_2024',
                'usaha_xitkra_2025',
                'karyawanswasta_xitkrb_2020',
                'karyawanswasta_xitkrb_2021',
                'karyawanswasta_xitkrb_2022',
                'karyawanswasta_xitkrb_2023',
                'karyawanswasta_xitkrb_2024',
                'karyawanswasta_xitkrb_2025',
                'pegawainegeri_xitkrb_2020',
                'pegawainegeri_xitkrb_2021',
                'pegawainegeri_xitkrb_2022',
                'pegawainegeri_xitkrb_2023',
                'pegawainegeri_xitkrb_2024',
                'pegawainegeri_xitkrb_2025',
                'pekerja_tdk_tetap_xitkrb_2020',
                'pekerja_tdk_tetap_xitkrb_2021',
                'pekerja_tdk_tetap_xitkrb_2022',
                'pekerja_tdk_tetap_xitkrb_2023',
                'pekerja_tdk_tetap_xitkrb_2024',
                'pekerja_tdk_tetap_xitkrb_2025',
                'usaha_xitkrb_2020',
                'usaha_xitkrb_2021',
                'usaha_xitkrb_2022',
                'usaha_xitkrb_2023',
                'usaha_xitkrb_2024',
                'usaha_xitkrb_2025',
                'karyawanswasta_xitkrc_2020',
                'karyawanswasta_xitkrc_2021',
                'karyawanswasta_xitkrc_2022',
                'karyawanswasta_xitkrc_2023',
                'karyawanswasta_xitkrc_2024',
                'karyawanswasta_xitkrc_2025',
                'pegawainegeri_xitkrc_2020',
                'pegawainegeri_xitkrc_2021',
                'pegawainegeri_xitkrc_2022',
                'pegawainegeri_xitkrc_2023',
                'pegawainegeri_xitkrc_2024',
                'pegawainegeri_xitkrc_2025',
                'pekerja_tdk_tetap_xitkrc_2020',
                'pekerja_tdk_tetap_xitkrc_2021',
                'pekerja_tdk_tetap_xitkrc_2022',
                'pekerja_tdk_tetap_xitkrc_2023',
                'pekerja_tdk_tetap_xitkrc_2024',
                'pekerja_tdk_tetap_xitkrc_2025',
                'usaha_xitkrc_2020',
                'usaha_xitkrc_2021',
                'usaha_xitkrc_2022',
                'usaha_xitkrc_2023',
                'usaha_xitkrc_2024',
                'usaha_xitkrc_2025',
                'karyawanswasta_xiitkra_2020',
                'karyawanswasta_xiitkra_2021',
                'karyawanswasta_xiitkra_2022',
                'karyawanswasta_xiitkra_2023',
                'karyawanswasta_xiitkra_2024',
                'karyawanswasta_xiitkra_2025',
                'pegawainegeri_xiitkra_2020',
                'pegawainegeri_xiitkra_2021',
                'pegawainegeri_xiitkra_2022',
                'pegawainegeri_xiitkra_2023',
                'pegawainegeri_xiitkra_2024',
                'pegawainegeri_xiitkra_2025',
                'pekerja_tdk_tetap_xiitkra_2020',
                'pekerja_tdk_tetap_xiitkra_2021',
                'pekerja_tdk_tetap_xiitkra_2022',
                'pekerja_tdk_tetap_xiitkra_2023',
                'pekerja_tdk_tetap_xiitkra_2024',
                'pekerja_tdk_tetap_xiitkra_2025',
                'usaha_xiitkra_2020',
                'usaha_xiitkra_2021',
                'usaha_xiitkra_2022',
                'usaha_xiitkra_2023',
                'usaha_xiitkra_2024',
                'usaha_xiitkra_2025',
                'karyawanswasta_xiitkrb_2020',
                'karyawanswasta_xiitkrb_2021',
                'karyawanswasta_xiitkrb_2022',
                'karyawanswasta_xiitkrb_2023',
                'karyawanswasta_xiitkrb_2024',
                'karyawanswasta_xiitkrb_2025',
                'pegawainegeri_xiitkrb_2020',
                'pegawainegeri_xiitkrb_2021',
                'pegawainegeri_xiitkrb_2022',
                'pegawainegeri_xiitkrb_2023',
                'pegawainegeri_xiitkrb_2024',
                'pegawainegeri_xiitkrb_2025',
                'pekerja_tdk_tetap_xiitkrb_2020',
                'pekerja_tdk_tetap_xiitkrb_2021',
                'pekerja_tdk_tetap_xiitkrb_2022',
                'pekerja_tdk_tetap_xiitkrb_2023',
                'pekerja_tdk_tetap_xiitkrb_2024',
                'pekerja_tdk_tetap_xiitkrb_2025',
                'usaha_xiitkrb_2020',
                'usaha_xiitkrb_2021',
                'usaha_xiitkrb_2022',
                'usaha_xiitkrb_2023',
                'usaha_xiitkrb_2024',
                'usaha_xiitkrb_2025',
                'karyawanswasta_xiitkrc_2020',
                'karyawanswasta_xiitkrc_2021',
                'karyawanswasta_xiitkrc_2022',
                'karyawanswasta_xiitkrc_2023',
                'karyawanswasta_xiitkrc_2024',
                'karyawanswasta_xiitkrc_2025',
                'pegawainegeri_xiitkrc_2020',
                'pegawainegeri_xiitkrc_2021',
                'pegawainegeri_xiitkrc_2022',
                'pegawainegeri_xiitkrc_2023',
                'pegawainegeri_xiitkrc_2024',
                'pegawainegeri_xiitkrc_2025',
                'pekerja_tdk_tetap_xiitkrc_2020',
                'pekerja_tdk_tetap_xiitkrc_2021',
                'pekerja_tdk_tetap_xiitkrc_2022',
                'pekerja_tdk_tetap_xiitkrc_2023',
                'pekerja_tdk_tetap_xiitkrc_2024',
                'pekerja_tdk_tetap_xiitkrc_2025',
                'usaha_xiitkrc_2020',
                'usaha_xiitkrc_2021',
                'usaha_xiitkrc_2022',
                'usaha_xiitkrc_2023',
                'usaha_xiitkrc_2024',
                'usaha_xiitkrc_2025'
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
        $karyawanswasta_xtkjb = HasilHitunganModel::where('status_pekerjaan_wali', 'Karyawan Swasta')->where('kelas', 'X-TKJ-C')->whereYear('tgl_daftar', $request_tahun)->count();
        $pegawainegeri_xtkjb = HasilHitunganModel::where('status_pekerjaan_wali', 'Pegawai Negri')->where('kelas', 'X-TKJ-C')->whereYear('tgl_daftar', $request_tahun)->count();
        $pekerja_tdk_tetap_xtkjb = HasilHitunganModel::where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->where('kelas', 'X-TKJ-C')->whereYear('tgl_daftar', $request_tahun)->count();
        $usaha_xtkjb = HasilHitunganModel::where('status_pekerjaan_wali', 'Usaha')->where('kelas', 'X-TKJ-C')->whereYear('tgl_daftar', $request_tahun)->count();

        // ! X-TKJ-D //
        $karyawanswasta_xkjd = HasilHitunganModel::where('status_pekerjaan_wali', 'Karyawan Swasta')->where('kelas', 'X-TKJ-D')->whereYear('tgl_daftar', $request_tahun)->count();
        $pegawainegeri_xkjd = HasilHitunganModel::where('status_pekerjaan_wali', 'Pegawai Negri')->where('kelas', 'X-TKJ-D')->whereYear('tgl_daftar', $request_tahun)->count();
        $pekerja_tdk_tetap_xkjd = HasilHitunganModel::where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->where('kelas', 'X-TKJ-D')->whereYear('tgl_daftar', $request_tahun)->count();
        $usaha_xkjd = HasilHitunganModel::where('status_pekerjaan_wali', 'Usaha')->where('kelas', 'X-TKJ-D')->whereYear('tgl_daftar', $request_tahun)->count();

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
        $karyawanswasta_xiikjb = HasilHitunganModel::where('status_pekerjaan_wali', 'Karyawan Swasta')->where('kelas', 'XII-TKJ-B')->whereYear('tgl_daftar', $request_tahun)->count();
        $pegawainegeri_xiikjb = HasilHitunganModel::where('status_pekerjaan_wali', 'Pegawai Negri')->where('kelas', 'XII-TKJ-B')->whereYear('tgl_daftar', $request_tahun)->count();
        $pekerja_tdk_tetap_xiikjb = HasilHitunganModel::where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->where('kelas', 'XII-TKJ-B')->whereYear('tgl_daftar', $request_tahun)->count();
        $usaha_xiikjb = HasilHitunganModel::where('status_pekerjaan_wali', 'Usaha')->where('kelas', 'XII-TKJ-B')->whereYear('tgl_daftar', $request_tahun)->count();

        // ! XII-TKJ-c //
        $karyawanswasta_xiikjc = HasilHitunganModel::where('status_pekerjaan_wali', 'Karyawan Swasta')->where('kelas', 'XII-TKJ-C')->whereYear('tgl_daftar', $request_tahun)->count();
        $pegawainegeri_xiikjc = HasilHitunganModel::where('status_pekerjaan_wali', 'Pegawai Negri')->where('kelas', 'XII-TKJ-C')->whereYear('tgl_daftar', $request_tahun)->count();
        $pekerja_tdk_tetap_xiikjc = HasilHitunganModel::where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->where('kelas', 'XII-TKJ-C')->whereYear('tgl_daftar', $request_tahun)->count();
        $usaha_xiikjc = HasilHitunganModel::where('status_pekerjaan_wali', 'Usaha')->where('kelas', 'XII-TKJ-C')->whereYear('tgl_daftar', $request_tahun)->count();

        // ! DATA KEALAS X-TKJ-A //
        $karyawanswasta_xtkja_2020 = HasilHitunganModel::where('kelas', 'X-tkj-A')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2020')->count();
        $pegawainegeri_xtkja_2020 = HasilHitunganModel::where('kelas', 'X-tkj-A')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2020')->count();
        $pekerja_tdk_tetap_xtkja_2020 = HasilHitunganModel::where('kelas', 'X-tkj-A')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2020')->count();
        $usaha_xtkja_2020 = HasilHitunganModel::where('kelas', 'X-tkj-A')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2020')->count();

        $karyawanswasta_xtkja_2021 = HasilHitunganModel::where('kelas', 'X-tkj-A')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2021')->count();
        $pegawainegeri_xtkja_2021 = HasilHitunganModel::where('kelas', 'X-tkj-A')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2021')->count();
        $pekerja_tdk_tetap_xtkja_2021 = HasilHitunganModel::where('kelas', 'X-tkj-A')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2021')->count();
        $usaha_xtkja_2021 = HasilHitunganModel::where('kelas', 'X-tkj-A')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2021')->count();

        $karyawanswasta_xtkja_2022 = HasilHitunganModel::where('kelas', 'X-tkj-A')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2022')->count();
        $pegawainegeri_xtkja_2022 = HasilHitunganModel::where('kelas', 'X-tkj-A')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2022')->count();
        $pekerja_tdk_tetap_xtkja_2022 = HasilHitunganModel::where('kelas', 'X-tkj-A')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2022')->count();
        $usaha_xtkja_2022 = HasilHitunganModel::where('kelas', 'X-tkj-A')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2022')->count();

        $karyawanswasta_xtkja_2023 = HasilHitunganModel::where('kelas', 'X-tkj-A')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2023')->count();
        $pegawainegeri_xtkja_2023 = HasilHitunganModel::where('kelas', 'X-tkj-A')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2023')->count();
        $pekerja_tdk_tetap_xtkja_2023 = HasilHitunganModel::where('kelas', 'X-tkj-A')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2023')->count();
        $usaha_xtkja_2023 = HasilHitunganModel::where('kelas', 'X-tkj-A')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2023')->count();

        $karyawanswasta_xtkja_2024 = HasilHitunganModel::where('kelas', 'X-tkj-A')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2024')->count();
        $pegawainegeri_xtkja_2024 = HasilHitunganModel::where('kelas', 'X-tkj-A')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2024')->count();
        $pekerja_tdk_tetap_xtkja_2024 = HasilHitunganModel::where('kelas', 'X-tkj-A')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2024')->count();
        $usaha_xtkja_2024 = HasilHitunganModel::where('kelas', 'X-tkj-A')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2024')->count();

        $karyawanswasta_xtkja_2025 = HasilHitunganModel::where('kelas', 'X-tkj-A')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2025')->count();
        $pegawainegeri_xtkja_2025 = HasilHitunganModel::where('kelas', 'X-tkj-A')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2025')->count();
        $pekerja_tdk_tetap_xtkja_2025 = HasilHitunganModel::where('kelas', 'X-tkj-A')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2025')->count();
        $usaha_xtkja_2025 = HasilHitunganModel::where('kelas', 'X-tkj-A')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2025')->count();

        // ! DATA KEALAS X-TKJ-B //
        $karyawanswasta_xtkjb_2020 = HasilHitunganModel::where('kelas', 'X-tkj-b')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2020')->count();
        $pegawainegeri_xtkjb_2020 = HasilHitunganModel::where('kelas', 'X-tkj-b')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2020')->count();
        $pekerja_tdk_tetap_xtkjb_2020 = HasilHitunganModel::where('kelas', 'X-tkj-b')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2020')->count();
        $usaha_xtkjb_2020 = HasilHitunganModel::where('kelas', 'X-tkj-b')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2020')->count();

        $karyawanswasta_xtkjb_2021 = HasilHitunganModel::where('kelas', 'X-tkj-b')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2021')->count();
        $pegawainegeri_xtkjb_2021 = HasilHitunganModel::where('kelas', 'X-tkj-b')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2021')->count();
        $pekerja_tdk_tetap_xtkjb_2021 = HasilHitunganModel::where('kelas', 'X-tkj-b')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2021')->count();
        $usaha_xtkjb_2021 = HasilHitunganModel::where('kelas', 'X-tkj-b')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2021')->count();

        $karyawanswasta_xtkjb_2022 = HasilHitunganModel::where('kelas', 'X-tkj-b')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2022')->count();
        $pegawainegeri_xtkjb_2022 = HasilHitunganModel::where('kelas', 'X-tkj-b')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2022')->count();
        $pekerja_tdk_tetap_xtkjb_2022 = HasilHitunganModel::where('kelas', 'X-tkj-b')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2022')->count();
        $usaha_xtkjb_2022 = HasilHitunganModel::where('kelas', 'X-tkj-b')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2022')->count();

        $karyawanswasta_xtkjb_2023 = HasilHitunganModel::where('kelas', 'X-tkj-b')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2023')->count();
        $pegawainegeri_xtkjb_2023 = HasilHitunganModel::where('kelas', 'X-tkj-b')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2023')->count();
        $pekerja_tdk_tetap_xtkjb_2023 = HasilHitunganModel::where('kelas', 'X-tkj-b')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2023')->count();
        $usaha_xtkjb_2023 = HasilHitunganModel::where('kelas', 'X-tkj-b')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2023')->count();

        $karyawanswasta_xtkjb_2024 = HasilHitunganModel::where('kelas', 'X-tkj-b')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2024')->count();
        $pegawainegeri_xtkjb_2024 = HasilHitunganModel::where('kelas', 'X-tkj-b')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2024')->count();
        $pekerja_tdk_tetap_xtkjb_2024 = HasilHitunganModel::where('kelas', 'X-tkj-b')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2024')->count();
        $usaha_xtkjb_2024 = HasilHitunganModel::where('kelas', 'X-tkj-b')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2024')->count();

        $karyawanswasta_xtkjb_2025 = HasilHitunganModel::where('kelas', 'X-tkj-b')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2025')->count();
        $pegawainegeri_xtkjb_2025 = HasilHitunganModel::where('kelas', 'X-tkj-b')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2025')->count();
        $pekerja_tdk_tetap_xtkjb_2025 = HasilHitunganModel::where('kelas', 'X-tkj-b')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2025')->count();
        $usaha_xtkjb_2025 = HasilHitunganModel::where('kelas', 'X-tkj-b')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2025')->count();

        // ! DATA KEALAS X-TKJ-C //
        $karyawanswasta_xtkjc_2020 = HasilHitunganModel::where('kelas', 'X-tkj-c')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2020')->count();
        $pegawainegeri_xtkjc_2020 = HasilHitunganModel::where('kelas', 'X-tkj-c')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2020')->count();
        $pekerja_tdk_tetap_xtkjc_2020 = HasilHitunganModel::where('kelas', 'X-tkj-c')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2020')->count();
        $usaha_xtkjc_2020 = HasilHitunganModel::where('kelas', 'X-tkj-c')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2020')->count();

        $karyawanswasta_xtkjc_2021 = HasilHitunganModel::where('kelas', 'X-tkj-c')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2021')->count();
        $pegawainegeri_xtkjc_2021 = HasilHitunganModel::where('kelas', 'X-tkj-c')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2021')->count();
        $pekerja_tdk_tetap_xtkjc_2021 = HasilHitunganModel::where('kelas', 'X-tkj-c')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2021')->count();
        $usaha_xtkjc_2021 = HasilHitunganModel::where('kelas', 'X-tkj-c')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2021')->count();

        $karyawanswasta_xtkjc_2022 = HasilHitunganModel::where('kelas', 'X-tkj-c')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2022')->count();
        $pegawainegeri_xtkjc_2022 = HasilHitunganModel::where('kelas', 'X-tkj-c')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2022')->count();
        $pekerja_tdk_tetap_xtkjc_2022 = HasilHitunganModel::where('kelas', 'X-tkj-c')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2022')->count();
        $usaha_xtkjc_2022 = HasilHitunganModel::where('kelas', 'X-tkj-c')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2022')->count();

        $karyawanswasta_xtkjc_2023 = HasilHitunganModel::where('kelas', 'X-tkj-c')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2023')->count();
        $pegawainegeri_xtkjc_2023 = HasilHitunganModel::where('kelas', 'X-tkj-c')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2023')->count();
        $pekerja_tdk_tetap_xtkjc_2023 = HasilHitunganModel::where('kelas', 'X-tkj-c')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2023')->count();
        $usaha_xtkjc_2023 = HasilHitunganModel::where('kelas', 'X-tkj-c')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2023')->count();

        $karyawanswasta_xtkjc_2024 = HasilHitunganModel::where('kelas', 'X-tkj-c')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2024')->count();
        $pegawainegeri_xtkjc_2024 = HasilHitunganModel::where('kelas', 'X-tkj-c')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2024')->count();
        $pekerja_tdk_tetap_xtkjc_2024 = HasilHitunganModel::where('kelas', 'X-tkj-c')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2024')->count();
        $usaha_xtkjc_2024 = HasilHitunganModel::where('kelas', 'X-tkj-c')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2024')->count();

        $karyawanswasta_xtkjc_2025 = HasilHitunganModel::where('kelas', 'X-tkj-c')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2025')->count();
        $pegawainegeri_xtkjc_2025 = HasilHitunganModel::where('kelas', 'X-tkj-c')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2025')->count();
        $pekerja_tdk_tetap_xtkjc_2025 = HasilHitunganModel::where('kelas', 'X-tkj-c')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2025')->count();
        $usaha_xtkjc_2025 = HasilHitunganModel::where('kelas', 'X-tkj-c')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2025')->count();

        // ! DATA KEALAS X-TKJ-D //
        $karyawanswasta_xtkjd_2020 = HasilHitunganModel::where('kelas', 'X-tkj-d')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2020')->count();
        $pegawainegeri_xtkjd_2020 = HasilHitunganModel::where('kelas', 'X-tkj-d')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2020')->count();
        $pekerja_tdk_tetap_xtkjd_2020 = HasilHitunganModel::where('kelas', 'X-tkj-d')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2020')->count();
        $usaha_xtkjd_2020 = HasilHitunganModel::where('kelas', 'X-tkj-d')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2020')->count();

        $karyawanswasta_xtkjd_2021 = HasilHitunganModel::where('kelas', 'X-tkj-d')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2021')->count();
        $pegawainegeri_xtkjd_2021 = HasilHitunganModel::where('kelas', 'X-tkj-d')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2021')->count();
        $pekerja_tdk_tetap_xtkjd_2021 = HasilHitunganModel::where('kelas', 'X-tkj-d')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2021')->count();
        $usaha_xtkjd_2021 = HasilHitunganModel::where('kelas', 'X-tkj-d')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2021')->count();

        $karyawanswasta_xtkjd_2022 = HasilHitunganModel::where('kelas', 'X-tkj-d')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2022')->count();
        $pegawainegeri_xtkjd_2022 = HasilHitunganModel::where('kelas', 'X-tkj-d')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2022')->count();
        $pekerja_tdk_tetap_xtkjd_2022 = HasilHitunganModel::where('kelas', 'X-tkj-d')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2022')->count();
        $usaha_xtkjd_2022 = HasilHitunganModel::where('kelas', 'X-tkj-d')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2022')->count();

        $karyawanswasta_xtkjd_2023 = HasilHitunganModel::where('kelas', 'X-tkj-d')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2023')->count();
        $pegawainegeri_xtkjd_2023 = HasilHitunganModel::where('kelas', 'X-tkj-d')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2023')->count();
        $pekerja_tdk_tetap_xtkjd_2023 = HasilHitunganModel::where('kelas', 'X-tkj-d')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2023')->count();
        $usaha_xtkjd_2023 = HasilHitunganModel::where('kelas', 'X-tkj-d')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2023')->count();

        $karyawanswasta_xtkjd_2024 = HasilHitunganModel::where('kelas', 'X-tkj-d')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2024')->count();
        $pegawainegeri_xtkjd_2024 = HasilHitunganModel::where('kelas', 'X-tkj-d')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2024')->count();
        $pekerja_tdk_tetap_xtkjd_2024 = HasilHitunganModel::where('kelas', 'X-tkj-d')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2024')->count();
        $usaha_xtkjd_2024 = HasilHitunganModel::where('kelas', 'X-tkj-d')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2024')->count();

        $karyawanswasta_xtkjd_2025 = HasilHitunganModel::where('kelas', 'X-tkj-d')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2025')->count();
        $pegawainegeri_xtkjd_2025 = HasilHitunganModel::where('kelas', 'X-tkj-d')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2025')->count();
        $pekerja_tdk_tetap_xtkjd_2025 = HasilHitunganModel::where('kelas', 'X-tkj-d')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2025')->count();
        $usaha_xtkjd_2025 = HasilHitunganModel::where('kelas', 'X-tkj-d')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2025')->count();

        // ! DATA KEALAS XI-TKJ-A //
        $karyawanswasta_xitkja_2020 = HasilHitunganModel::where('kelas', 'xi-tkj-a')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2020')->count();
        $pegawainegeri_xitkja_2020 = HasilHitunganModel::where('kelas', 'xi-tkj-a')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2020')->count();
        $pekerja_tdk_tetap_xitkja_2020 = HasilHitunganModel::where('kelas', 'xi-tkj-a')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2020')->count();
        $usaha_xitkja_2020 = HasilHitunganModel::where('kelas', 'xi-tkj-a')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2020')->count();

        $karyawanswasta_xitkja_2021 = HasilHitunganModel::where('kelas', 'xi-tkj-a')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2021')->count();
        $pegawainegeri_xitkja_2021 = HasilHitunganModel::where('kelas', 'xi-tkj-a')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2021')->count();
        $pekerja_tdk_tetap_xitkja_2021 = HasilHitunganModel::where('kelas', 'xi-tkj-a')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2021')->count();
        $usaha_xitkja_2021 = HasilHitunganModel::where('kelas', 'xi-tkj-a')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2021')->count();

        $karyawanswasta_xitkja_2022 = HasilHitunganModel::where('kelas', 'xi-tkj-a')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2022')->count();
        $pegawainegeri_xitkja_2022 = HasilHitunganModel::where('kelas', 'xi-tkj-a')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2022')->count();
        $pekerja_tdk_tetap_xitkja_2022 = HasilHitunganModel::where('kelas', 'xi-tkj-a')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2022')->count();
        $usaha_xitkja_2022 = HasilHitunganModel::where('kelas', 'xi-tkj-a')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2022')->count();

        $karyawanswasta_xitkja_2023 = HasilHitunganModel::where('kelas', 'xi-tkj-a')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2023')->count();
        $pegawainegeri_xitkja_2023 = HasilHitunganModel::where('kelas', 'xi-tkj-a')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2023')->count();
        $pekerja_tdk_tetap_xitkja_2023 = HasilHitunganModel::where('kelas', 'xi-tkj-a')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2023')->count();
        $usaha_xitkja_2023 = HasilHitunganModel::where('kelas', 'xi-tkj-a')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2023')->count();

        $karyawanswasta_xitkja_2024 = HasilHitunganModel::where('kelas', 'xi-tkj-a')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2024')->count();
        $pegawainegeri_xitkja_2024 = HasilHitunganModel::where('kelas', 'xi-tkj-a')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2024')->count();
        $pekerja_tdk_tetap_xitkja_2024 = HasilHitunganModel::where('kelas', 'xi-tkj-a')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2024')->count();
        $usaha_xitkja_2024 = HasilHitunganModel::where('kelas', 'xi-tkj-a')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2024')->count();

        $karyawanswasta_xitkja_2025 = HasilHitunganModel::where('kelas', 'xi-tkj-a')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2025')->count();
        $pegawainegeri_xitkja_2025 = HasilHitunganModel::where('kelas', 'xi-tkj-a')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2025')->count();
        $pekerja_tdk_tetap_xitkja_2025 = HasilHitunganModel::where('kelas', 'xi-tkj-a')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2025')->count();
        $usaha_xitkja_2025 = HasilHitunganModel::where('kelas', 'xi-tkj-a')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2025')->count();

        // ! DATA KEALAS XI-TKJ-B //
        $karyawanswasta_xitkjb_2020 = HasilHitunganModel::where('kelas', 'xi-tkj-b')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2020')->count();
        $pegawainegeri_xitkjb_2020 = HasilHitunganModel::where('kelas', 'xi-tkj-b')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2020')->count();
        $pekerja_tdk_tetap_xitkjb_2020 = HasilHitunganModel::where('kelas', 'xi-tkj-b')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2020')->count();
        $usaha_xitkjb_2020 = HasilHitunganModel::where('kelas', 'xi-tkj-b')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2020')->count();

        $karyawanswasta_xitkjb_2021 = HasilHitunganModel::where('kelas', 'xi-tkj-b')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2021')->count();
        $pegawainegeri_xitkjb_2021 = HasilHitunganModel::where('kelas', 'xi-tkj-b')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2021')->count();
        $pekerja_tdk_tetap_xitkjb_2021 = HasilHitunganModel::where('kelas', 'xi-tkj-b')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2021')->count();
        $usaha_xitkjb_2021 = HasilHitunganModel::where('kelas', 'xi-tkj-b')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2021')->count();

        $karyawanswasta_xitkjb_2022 = HasilHitunganModel::where('kelas', 'xi-tkj-b')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2022')->count();
        $pegawainegeri_xitkjb_2022 = HasilHitunganModel::where('kelas', 'xi-tkj-b')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2022')->count();
        $pekerja_tdk_tetap_xitkjb_2022 = HasilHitunganModel::where('kelas', 'xi-tkj-b')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2022')->count();
        $usaha_xitkjb_2022 = HasilHitunganModel::where('kelas', 'xi-tkj-b')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2022')->count();

        $karyawanswasta_xitkjb_2023 = HasilHitunganModel::where('kelas', 'xi-tkj-b')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2023')->count();
        $pegawainegeri_xitkjb_2023 = HasilHitunganModel::where('kelas', 'xi-tkj-b')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2023')->count();
        $pekerja_tdk_tetap_xitkjb_2023 = HasilHitunganModel::where('kelas', 'xi-tkj-b')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2023')->count();
        $usaha_xitkjb_2023 = HasilHitunganModel::where('kelas', 'xi-tkj-b')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2023')->count();

        $karyawanswasta_xitkjb_2024 = HasilHitunganModel::where('kelas', 'xi-tkj-b')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2024')->count();
        $pegawainegeri_xitkjb_2024 = HasilHitunganModel::where('kelas', 'xi-tkj-b')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2024')->count();
        $pekerja_tdk_tetap_xitkjb_2024 = HasilHitunganModel::where('kelas', 'xi-tkj-b')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2024')->count();
        $usaha_xitkjb_2024 = HasilHitunganModel::where('kelas', 'xi-tkj-b')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2024')->count();

        $karyawanswasta_xitkjb_2025 = HasilHitunganModel::where('kelas', 'xi-tkj-b')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2025')->count();
        $pegawainegeri_xitkjb_2025 = HasilHitunganModel::where('kelas', 'xi-tkj-b')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2025')->count();
        $pekerja_tdk_tetap_xitkjb_2025 = HasilHitunganModel::where('kelas', 'xi-tkj-b')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2025')->count();
        $usaha_xitkjb_2025 = HasilHitunganModel::where('kelas', 'xi-tkj-b')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2025')->count();

        // ! DATA KEALAS XI-TKJ-C //
        $karyawanswasta_xitkjc_2020 = HasilHitunganModel::where('kelas', 'xi-tkj-c')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2020')->count();
        $pegawainegeri_xitkjc_2020 = HasilHitunganModel::where('kelas', 'xi-tkj-c')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2020')->count();
        $pekerja_tdk_tetap_xitkjc_2020 = HasilHitunganModel::where('kelas', 'xi-tkj-c')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2020')->count();
        $usaha_xitkjc_2020 = HasilHitunganModel::where('kelas', 'xi-tkj-c')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2020')->count();

        $karyawanswasta_xitkjc_2021 = HasilHitunganModel::where('kelas', 'xi-tkj-c')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2021')->count();
        $pegawainegeri_xitkjc_2021 = HasilHitunganModel::where('kelas', 'xi-tkj-c')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2021')->count();
        $pekerja_tdk_tetap_xitkjc_2021 = HasilHitunganModel::where('kelas', 'xi-tkj-c')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2021')->count();
        $usaha_xitkjc_2021 = HasilHitunganModel::where('kelas', 'xi-tkj-c')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2021')->count();

        $karyawanswasta_xitkjc_2022 = HasilHitunganModel::where('kelas', 'xi-tkj-c')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2022')->count();
        $pegawainegeri_xitkjc_2022 = HasilHitunganModel::where('kelas', 'xi-tkj-c')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2022')->count();
        $pekerja_tdk_tetap_xitkjc_2022 = HasilHitunganModel::where('kelas', 'xi-tkj-c')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2022')->count();
        $usaha_xitkjc_2022 = HasilHitunganModel::where('kelas', 'xi-tkj-c')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2022')->count();

        $karyawanswasta_xitkjc_2023 = HasilHitunganModel::where('kelas', 'xi-tkj-c')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2023')->count();
        $pegawainegeri_xitkjc_2023 = HasilHitunganModel::where('kelas', 'xi-tkj-c')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2023')->count();
        $pekerja_tdk_tetap_xitkjc_2023 = HasilHitunganModel::where('kelas', 'xi-tkj-c')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2023')->count();
        $usaha_xitkjc_2023 = HasilHitunganModel::where('kelas', 'xi-tkj-c')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2023')->count();

        $karyawanswasta_xitkjc_2024 = HasilHitunganModel::where('kelas', 'xi-tkj-c')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2024')->count();
        $pegawainegeri_xitkjc_2024 = HasilHitunganModel::where('kelas', 'xi-tkj-c')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2024')->count();
        $pekerja_tdk_tetap_xitkjc_2024 = HasilHitunganModel::where('kelas', 'xi-tkj-c')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2024')->count();
        $usaha_xitkjc_2024 = HasilHitunganModel::where('kelas', 'xi-tkj-c')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2024')->count();

        $karyawanswasta_xitkjc_2025 = HasilHitunganModel::where('kelas', 'xi-tkj-c')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2025')->count();
        $pegawainegeri_xitkjc_2025 = HasilHitunganModel::where('kelas', 'xi-tkj-c')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2025')->count();
        $pekerja_tdk_tetap_xitkjc_2025 = HasilHitunganModel::where('kelas', 'xi-tkj-c')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2025')->count();
        $usaha_xitkjc_2025 = HasilHitunganModel::where('kelas', 'xi-tkj-c')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2025')->count();

        // ! DATA KEALAS XII-TKJ-A //
        $karyawanswasta_xiitkja_2020 = HasilHitunganModel::where('kelas', 'XII-TKJ-A')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2020')->count();
        $pegawainegeri_xiitkja_2020 = HasilHitunganModel::where('kelas', 'XII-TKJ-A')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2020')->count();
        $pekerja_tdk_tetap_xiitkja_2020 = HasilHitunganModel::where('kelas', 'XII-TKJ-A')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2020')->count();
        $usaha_xiitkja_2020 = HasilHitunganModel::where('kelas', 'XII-TKJ-A')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2020')->count();

        $karyawanswasta_xiitkja_2021 = HasilHitunganModel::where('kelas', 'XII-TKJ-A')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2021')->count();
        $pegawainegeri_xiitkja_2021 = HasilHitunganModel::where('kelas', 'XII-TKJ-A')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2021')->count();
        $pekerja_tdk_tetap_xiitkja_2021 = HasilHitunganModel::where('kelas', 'XII-TKJ-A')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2021')->count();
        $usaha_xiitkja_2021 = HasilHitunganModel::where('kelas', 'XII-TKJ-A')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2021')->count();

        $karyawanswasta_xiitkja_2022 = HasilHitunganModel::where('kelas', 'XII-TKJ-A')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2022')->count();
        $pegawainegeri_xiitkja_2022 = HasilHitunganModel::where('kelas', 'XII-TKJ-A')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2022')->count();
        $pekerja_tdk_tetap_xiitkja_2022 = HasilHitunganModel::where('kelas', 'XII-TKJ-A')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2022')->count();
        $usaha_xiitkja_2022 = HasilHitunganModel::where('kelas', 'XII-TKJ-A')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2022')->count();

        $karyawanswasta_xiitkja_2023 = HasilHitunganModel::where('kelas', 'XII-TKJ-A')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2023')->count();
        $pegawainegeri_xiitkja_2023 = HasilHitunganModel::where('kelas', 'XII-TKJ-A')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2023')->count();
        $pekerja_tdk_tetap_xiitkja_2023 = HasilHitunganModel::where('kelas', 'XII-TKJ-A')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2023')->count();
        $usaha_xiitkja_2023 = HasilHitunganModel::where('kelas', 'XII-TKJ-A')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2023')->count();

        $karyawanswasta_xiitkja_2024 = HasilHitunganModel::where('kelas', 'XII-TKJ-A')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2024')->count();
        $pegawainegeri_xiitkja_2024 = HasilHitunganModel::where('kelas', 'XII-TKJ-A')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2024')->count();
        $pekerja_tdk_tetap_xiitkja_2024 = HasilHitunganModel::where('kelas', 'XII-TKJ-A')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2024')->count();
        $usaha_xiitkja_2024 = HasilHitunganModel::where('kelas', 'XII-TKJ-A')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2024')->count();

        $karyawanswasta_xiitkja_2025 = HasilHitunganModel::where('kelas', 'XII-TKJ-A')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2025')->count();
        $pegawainegeri_xiitkja_2025 = HasilHitunganModel::where('kelas', 'XII-TKJ-A')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2025')->count();
        $pekerja_tdk_tetap_xiitkja_2025 = HasilHitunganModel::where('kelas', 'XII-TKJ-A')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2025')->count();
        $usaha_xiitkja_2025 = HasilHitunganModel::where('kelas', 'XII-TKJ-A')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2025')->count();

        // ! DATA KEALAS XII-TKJ-B //
        $karyawanswasta_xiitkjb_2020 = HasilHitunganModel::where('kelas', 'XII-TKJ-B')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2020')->count();
        $pegawainegeri_xiitkjb_2020 = HasilHitunganModel::where('kelas', 'XII-TKJ-B')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2020')->count();
        $pekerja_tdk_tetap_xiitkjb_2020 = HasilHitunganModel::where('kelas', 'XII-TKJ-B')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2020')->count();
        $usaha_xiitkjb_2020 = HasilHitunganModel::where('kelas', 'XII-TKJ-B')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2020')->count();

        $karyawanswasta_xiitkjb_2021 = HasilHitunganModel::where('kelas', 'XII-TKJ-B')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2021')->count();
        $pegawainegeri_xiitkjb_2021 = HasilHitunganModel::where('kelas', 'XII-TKJ-B')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2021')->count();
        $pekerja_tdk_tetap_xiitkjb_2021 = HasilHitunganModel::where('kelas', 'XII-TKJ-B')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2021')->count();
        $usaha_xiitkjb_2021 = HasilHitunganModel::where('kelas', 'XII-TKJ-B')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2021')->count();

        $karyawanswasta_xiitkjb_2022 = HasilHitunganModel::where('kelas', 'XII-TKJ-B')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2022')->count();
        $pegawainegeri_xiitkjb_2022 = HasilHitunganModel::where('kelas', 'XII-TKJ-B')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2022')->count();
        $pekerja_tdk_tetap_xiitkjb_2022 = HasilHitunganModel::where('kelas', 'XII-TKJ-B')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2022')->count();
        $usaha_xiitkjb_2022 = HasilHitunganModel::where('kelas', 'XII-TKJ-B')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2022')->count();

        $karyawanswasta_xiitkjb_2023 = HasilHitunganModel::where('kelas', 'XII-TKJ-B')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2023')->count();
        $pegawainegeri_xiitkjb_2023 = HasilHitunganModel::where('kelas', 'XII-TKJ-B')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2023')->count();
        $pekerja_tdk_tetap_xiitkjb_2023 = HasilHitunganModel::where('kelas', 'XII-TKJ-B')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2023')->count();
        $usaha_xiitkjb_2023 = HasilHitunganModel::where('kelas', 'XII-TKJ-B')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2023')->count();

        $karyawanswasta_xiitkjb_2024 = HasilHitunganModel::where('kelas', 'XII-TKJ-B')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2024')->count();
        $pegawainegeri_xiitkjb_2024 = HasilHitunganModel::where('kelas', 'XII-TKJ-B')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2024')->count();
        $pekerja_tdk_tetap_xiitkjb_2024 = HasilHitunganModel::where('kelas', 'XII-TKJ-B')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2024')->count();
        $usaha_xiitkjb_2024 = HasilHitunganModel::where('kelas', 'XII-TKJ-B')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2024')->count();

        $karyawanswasta_xiitkjb_2025 = HasilHitunganModel::where('kelas', 'XII-TKJ-B')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2025')->count();
        $pegawainegeri_xiitkjb_2025 = HasilHitunganModel::where('kelas', 'XII-TKJ-B')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2025')->count();
        $pekerja_tdk_tetap_xiitkjb_2025 = HasilHitunganModel::where('kelas', 'XII-TKJ-B')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2025')->count();
        $usaha_xiitkjb_2025 = HasilHitunganModel::where('kelas', 'XII-TKJ-B')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2025')->count();

        // ! DATA KEALAS XII-TKJ-C //
        $karyawanswasta_xiitkjc_2020 = HasilHitunganModel::where('kelas', 'XII-TKJ-C')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2020')->count();
        $pegawainegeri_xiitkjc_2020 = HasilHitunganModel::where('kelas', 'XII-TKJ-C')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2020')->count();
        $pekerja_tdk_tetap_xiitkjc_2020 = HasilHitunganModel::where('kelas', 'XII-TKJ-C')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2020')->count();
        $usaha_xiitkjc_2020 = HasilHitunganModel::where('kelas', 'XII-TKJ-C')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2020')->count();

        $karyawanswasta_xiitkjc_2021 = HasilHitunganModel::where('kelas', 'XII-TKJ-C')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2021')->count();
        $pegawainegeri_xiitkjc_2021 = HasilHitunganModel::where('kelas', 'XII-TKJ-C')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2021')->count();
        $pekerja_tdk_tetap_xiitkjc_2021 = HasilHitunganModel::where('kelas', 'XII-TKJ-C')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2021')->count();
        $usaha_xiitkjc_2021 = HasilHitunganModel::where('kelas', 'XII-TKJ-C')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2021')->count();

        $karyawanswasta_xiitkjc_2022 = HasilHitunganModel::where('kelas', 'XII-TKJ-C')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2022')->count();
        $pegawainegeri_xiitkjc_2022 = HasilHitunganModel::where('kelas', 'XII-TKJ-C')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2022')->count();
        $pekerja_tdk_tetap_xiitkjc_2022 = HasilHitunganModel::where('kelas', 'XII-TKJ-C')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2022')->count();
        $usaha_xiitkjc_2022 = HasilHitunganModel::where('kelas', 'XII-TKJ-C')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2022')->count();

        $karyawanswasta_xiitkjc_2023 = HasilHitunganModel::where('kelas', 'XII-TKJ-C')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2023')->count();
        $pegawainegeri_xiitkjc_2023 = HasilHitunganModel::where('kelas', 'XII-TKJ-C')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2023')->count();
        $pekerja_tdk_tetap_xiitkjc_2023 = HasilHitunganModel::where('kelas', 'XII-TKJ-C')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2023')->count();
        $usaha_xiitkjc_2023 = HasilHitunganModel::where('kelas', 'XII-TKJ-C')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2023')->count();

        $karyawanswasta_xiitkjc_2024 = HasilHitunganModel::where('kelas', 'XII-TKJ-C')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2024')->count();
        $pegawainegeri_xiitkjc_2024 = HasilHitunganModel::where('kelas', 'XII-TKJ-C')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2024')->count();
        $pekerja_tdk_tetap_xiitkjc_2024 = HasilHitunganModel::where('kelas', 'XII-TKJ-C')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2024')->count();
        $usaha_xiitkjc_2024 = HasilHitunganModel::where('kelas', 'XII-TKJ-C')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2024')->count();

        $karyawanswasta_xiitkjc_2025 = HasilHitunganModel::where('kelas', 'XII-TKJ-C')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2025')->count();
        $pegawainegeri_xiitkjc_2025 = HasilHitunganModel::where('kelas', 'XII-TKJ-C')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2025')->count();
        $pekerja_tdk_tetap_xiitkjc_2025 = HasilHitunganModel::where('kelas', 'XII-TKJ-C')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2025')->count();
        $usaha_xiitkjc_2025 = HasilHitunganModel::where('kelas', 'XII-TKJ-C')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2025')->count();

        // ! DATA KEALAS X-TKR-A //
        $karyawanswasta_xtkra_2020 = HasilHitunganModel::where('kelas', 'X-tkr-a')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2020')->count();
        $pegawainegeri_xtkra_2020 = HasilHitunganModel::where('kelas', 'X-tkr-a')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2020')->count();
        $pekerja_tdk_tetap_xtkra_2020 = HasilHitunganModel::where('kelas', 'X-tkr-a')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2020')->count();
        $usaha_xtkra_2020 = HasilHitunganModel::where('kelas', 'X-tkr-a')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2020')->count();

        $karyawanswasta_xtkra_2021 = HasilHitunganModel::where('kelas', 'X-tkr-a')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2021')->count();
        $pegawainegeri_xtkra_2021 = HasilHitunganModel::where('kelas', 'X-tkr-a')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2021')->count();
        $pekerja_tdk_tetap_xtkra_2021 = HasilHitunganModel::where('kelas', 'X-tkr-a')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2021')->count();
        $usaha_xtkra_2021 = HasilHitunganModel::where('kelas', 'X-tkr-a')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2021')->count();

        $karyawanswasta_xtkra_2022 = HasilHitunganModel::where('kelas', 'X-tkr-a')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2022')->count();
        $pegawainegeri_xtkra_2022 = HasilHitunganModel::where('kelas', 'X-tkr-a')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2022')->count();
        $pekerja_tdk_tetap_xtkra_2022 = HasilHitunganModel::where('kelas', 'X-tkr-a')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2022')->count();
        $usaha_xtkra_2022 = HasilHitunganModel::where('kelas', 'X-tkr-a')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2022')->count();

        $karyawanswasta_xtkra_2023 = HasilHitunganModel::where('kelas', 'X-tkr-a')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2023')->count();
        $pegawainegeri_xtkra_2023 = HasilHitunganModel::where('kelas', 'X-tkr-a')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2023')->count();
        $pekerja_tdk_tetap_xtkra_2023 = HasilHitunganModel::where('kelas', 'X-tkr-a')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2023')->count();
        $usaha_xtkra_2023 = HasilHitunganModel::where('kelas', 'X-tkr-a')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2023')->count();

        $karyawanswasta_xtkra_2024 = HasilHitunganModel::where('kelas', 'X-tkr-a')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2024')->count();
        $pegawainegeri_xtkra_2024 = HasilHitunganModel::where('kelas', 'X-tkr-a')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2024')->count();
        $pekerja_tdk_tetap_xtkra_2024 = HasilHitunganModel::where('kelas', 'X-tkr-a')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2024')->count();
        $usaha_xtkra_2024 = HasilHitunganModel::where('kelas', 'X-tkr-a')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2024')->count();

        $karyawanswasta_xtkra_2025 = HasilHitunganModel::where('kelas', 'X-tkr-a')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2025')->count();
        $pegawainegeri_xtkra_2025 = HasilHitunganModel::where('kelas', 'X-tkr-a')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2025')->count();
        $pekerja_tdk_tetap_xtkra_2025 = HasilHitunganModel::where('kelas', 'X-tkr-a')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2025')->count();
        $usaha_xtkra_2025 = HasilHitunganModel::where('kelas', 'X-tkr-a')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2025')->count();

        // ! DATA KEALAS X-TKR-B //
        $karyawanswasta_xtkrb_2020 = HasilHitunganModel::where('kelas', 'X-tkr-b')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2020')->count();
        $pegawainegeri_xtkrb_2020 = HasilHitunganModel::where('kelas', 'X-tkr-b')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2020')->count();
        $pekerja_tdk_tetap_xtkrb_2020 = HasilHitunganModel::where('kelas', 'X-tkr-b')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2020')->count();
        $usaha_xtkrb_2020 = HasilHitunganModel::where('kelas', 'X-tkr-b')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2020')->count();

        $karyawanswasta_xtkrb_2021 = HasilHitunganModel::where('kelas', 'X-tkr-b')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2021')->count();
        $pegawainegeri_xtkrb_2021 = HasilHitunganModel::where('kelas', 'X-tkr-b')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2021')->count();
        $pekerja_tdk_tetap_xtkrb_2021 = HasilHitunganModel::where('kelas', 'X-tkr-b')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2021')->count();
        $usaha_xtkrb_2021 = HasilHitunganModel::where('kelas', 'X-tkr-b')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2021')->count();

        $karyawanswasta_xtkrb_2022 = HasilHitunganModel::where('kelas', 'X-tkr-b')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2022')->count();
        $pegawainegeri_xtkrb_2022 = HasilHitunganModel::where('kelas', 'X-tkr-b')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2022')->count();
        $pekerja_tdk_tetap_xtkrb_2022 = HasilHitunganModel::where('kelas', 'X-tkr-b')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2022')->count();
        $usaha_xtkrb_2022 = HasilHitunganModel::where('kelas', 'X-tkr-b')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2022')->count();

        $karyawanswasta_xtkrb_2023 = HasilHitunganModel::where('kelas', 'X-tkr-b')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2023')->count();
        $pegawainegeri_xtkrb_2023 = HasilHitunganModel::where('kelas', 'X-tkr-b')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2023')->count();
        $pekerja_tdk_tetap_xtkrb_2023 = HasilHitunganModel::where('kelas', 'X-tkr-b')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2023')->count();
        $usaha_xtkrb_2023 = HasilHitunganModel::where('kelas', 'X-tkr-b')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2023')->count();

        $karyawanswasta_xtkrb_2024 = HasilHitunganModel::where('kelas', 'X-tkr-b')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2024')->count();
        $pegawainegeri_xtkrb_2024 = HasilHitunganModel::where('kelas', 'X-tkr-b')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2024')->count();
        $pekerja_tdk_tetap_xtkrb_2024 = HasilHitunganModel::where('kelas', 'X-tkr-b')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2024')->count();
        $usaha_xtkrb_2024 = HasilHitunganModel::where('kelas', 'X-tkr-b')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2024')->count();

        $karyawanswasta_xtkrb_2025 = HasilHitunganModel::where('kelas', 'X-tkr-b')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2025')->count();
        $pegawainegeri_xtkrb_2025 = HasilHitunganModel::where('kelas', 'X-tkr-b')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2025')->count();
        $pekerja_tdk_tetap_xtkrb_2025 = HasilHitunganModel::where('kelas', 'X-tkr-b')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2025')->count();
        $usaha_xtkrb_2025 = HasilHitunganModel::where('kelas', 'X-tkr-b')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2025')->count();

        // ! DATA KEALAS X-TKR-C //
        $karyawanswasta_xtkrc_2020 = HasilHitunganModel::where('kelas', 'X-tkr-c')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2020')->count();
        $pegawainegeri_xtkrc_2020 = HasilHitunganModel::where('kelas', 'X-tkr-c')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2020')->count();
        $pekerja_tdk_tetap_xtkrc_2020 = HasilHitunganModel::where('kelas', 'X-tkr-c')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2020')->count();
        $usaha_xtkrc_2020 = HasilHitunganModel::where('kelas', 'X-tkr-c')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2020')->count();

        $karyawanswasta_xtkrc_2021 = HasilHitunganModel::where('kelas', 'X-tkr-c')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2021')->count();
        $pegawainegeri_xtkrc_2021 = HasilHitunganModel::where('kelas', 'X-tkr-c')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2021')->count();
        $pekerja_tdk_tetap_xtkrc_2021 = HasilHitunganModel::where('kelas', 'X-tkr-c')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2021')->count();
        $usaha_xtkrc_2021 = HasilHitunganModel::where('kelas', 'X-tkr-c')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2021')->count();

        $karyawanswasta_xtkrc_2022 = HasilHitunganModel::where('kelas', 'X-tkr-c')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2022')->count();
        $pegawainegeri_xtkrc_2022 = HasilHitunganModel::where('kelas', 'X-tkr-c')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2022')->count();
        $pekerja_tdk_tetap_xtkrc_2022 = HasilHitunganModel::where('kelas', 'X-tkr-c')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2022')->count();
        $usaha_xtkrc_2022 = HasilHitunganModel::where('kelas', 'X-tkr-c')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2022')->count();

        $karyawanswasta_xtkrc_2023 = HasilHitunganModel::where('kelas', 'X-tkr-c')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2023')->count();
        $pegawainegeri_xtkrc_2023 = HasilHitunganModel::where('kelas', 'X-tkr-c')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2023')->count();
        $pekerja_tdk_tetap_xtkrc_2023 = HasilHitunganModel::where('kelas', 'X-tkr-c')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2023')->count();
        $usaha_xtkrc_2023 = HasilHitunganModel::where('kelas', 'X-tkr-c')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2023')->count();

        $karyawanswasta_xtkrc_2024 = HasilHitunganModel::where('kelas', 'X-tkr-c')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2024')->count();
        $pegawainegeri_xtkrc_2024 = HasilHitunganModel::where('kelas', 'X-tkr-c')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2024')->count();
        $pekerja_tdk_tetap_xtkrc_2024 = HasilHitunganModel::where('kelas', 'X-tkr-c')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2024')->count();
        $usaha_xtkrc_2024 = HasilHitunganModel::where('kelas', 'X-tkr-c')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2024')->count();

        $karyawanswasta_xtkrc_2025 = HasilHitunganModel::where('kelas', 'X-tkr-c')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2025')->count();
        $pegawainegeri_xtkrc_2025 = HasilHitunganModel::where('kelas', 'X-tkr-c')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2025')->count();
        $pekerja_tdk_tetap_xtkrc_2025 = HasilHitunganModel::where('kelas', 'X-tkr-c')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2025')->count();
        $usaha_xtkrc_2025 = HasilHitunganModel::where('kelas', 'X-tkr-c')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2025')->count();

        // ! DATA KEALAS XI-TKJ-A //
        $karyawanswasta_xitkra_2020 = HasilHitunganModel::where('kelas', 'xi-tkr-a')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2020')->count();
        $pegawainegeri_xitkra_2020 = HasilHitunganModel::where('kelas', 'xi-tkr-a')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2020')->count();
        $pekerja_tdk_tetap_xitkra_2020 = HasilHitunganModel::where('kelas', 'xi-tkr-a')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2020')->count();
        $usaha_xitkra_2020 = HasilHitunganModel::where('kelas', 'xi-tkr-a')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2020')->count();

        $karyawanswasta_xitkra_2021 = HasilHitunganModel::where('kelas', 'xi-tkr-a')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2021')->count();
        $pegawainegeri_xitkra_2021 = HasilHitunganModel::where('kelas', 'xi-tkr-a')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2021')->count();
        $pekerja_tdk_tetap_xitkra_2021 = HasilHitunganModel::where('kelas', 'xi-tkr-a')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2021')->count();
        $usaha_xitkra_2021 = HasilHitunganModel::where('kelas', 'xi-tkr-a')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2021')->count();

        $karyawanswasta_xitkra_2022 = HasilHitunganModel::where('kelas', 'xi-tkr-a')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2022')->count();
        $pegawainegeri_xitkra_2022 = HasilHitunganModel::where('kelas', 'xi-tkr-a')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2022')->count();
        $pekerja_tdk_tetap_xitkra_2022 = HasilHitunganModel::where('kelas', 'xi-tkr-a')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2022')->count();
        $usaha_xitkra_2022 = HasilHitunganModel::where('kelas', 'xi-tkr-a')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2022')->count();

        $karyawanswasta_xitkra_2023 = HasilHitunganModel::where('kelas', 'xi-tkr-a')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2023')->count();
        $pegawainegeri_xitkra_2023 = HasilHitunganModel::where('kelas', 'xi-tkr-a')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2023')->count();
        $pekerja_tdk_tetap_xitkra_2023 = HasilHitunganModel::where('kelas', 'xi-tkr-a')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2023')->count();
        $usaha_xitkra_2023 = HasilHitunganModel::where('kelas', 'xi-tkr-a')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2023')->count();

        $karyawanswasta_xitkra_2024 = HasilHitunganModel::where('kelas', 'xi-tkr-a')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2024')->count();
        $pegawainegeri_xitkra_2024 = HasilHitunganModel::where('kelas', 'xi-tkr-a')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2024')->count();
        $pekerja_tdk_tetap_xitkra_2024 = HasilHitunganModel::where('kelas', 'xi-tkr-a')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2024')->count();
        $usaha_xitkra_2024 = HasilHitunganModel::where('kelas', 'xi-tkr-a')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2024')->count();

        $karyawanswasta_xitkra_2025 = HasilHitunganModel::where('kelas', 'xi-tkr-a')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2025')->count();
        $pegawainegeri_xitkra_2025 = HasilHitunganModel::where('kelas', 'xi-tkr-a')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2025')->count();
        $pekerja_tdk_tetap_xitkra_2025 = HasilHitunganModel::where('kelas', 'xi-tkr-a')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2025')->count();
        $usaha_xitkra_2025 = HasilHitunganModel::where('kelas', 'xi-tkr-a')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2025')->count();

        // ! DATA KEALAS XI-TKR-B //
        $karyawanswasta_xitkrb_2020 = HasilHitunganModel::where('kelas', 'xi-tkr-b')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2020')->count();
        $pegawainegeri_xitkrb_2020 = HasilHitunganModel::where('kelas', 'xi-tkr-b')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2020')->count();
        $pekerja_tdk_tetap_xitkrb_2020 = HasilHitunganModel::where('kelas', 'xi-tkr-b')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2020')->count();
        $usaha_xitkrb_2020 = HasilHitunganModel::where('kelas', 'xi-tkr-b')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2020')->count();

        $karyawanswasta_xitkrb_2021 = HasilHitunganModel::where('kelas', 'xi-tkr-b')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2021')->count();
        $pegawainegeri_xitkrb_2021 = HasilHitunganModel::where('kelas', 'xi-tkr-b')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2021')->count();
        $pekerja_tdk_tetap_xitkrb_2021 = HasilHitunganModel::where('kelas', 'xi-tkr-b')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2021')->count();
        $usaha_xitkrb_2021 = HasilHitunganModel::where('kelas', 'xi-tkr-b')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2021')->count();

        $karyawanswasta_xitkrb_2022 = HasilHitunganModel::where('kelas', 'xi-tkr-b')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2022')->count();
        $pegawainegeri_xitkrb_2022 = HasilHitunganModel::where('kelas', 'xi-tkr-b')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2022')->count();
        $pekerja_tdk_tetap_xitkrb_2022 = HasilHitunganModel::where('kelas', 'xi-tkr-b')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2022')->count();
        $usaha_xitkrb_2022 = HasilHitunganModel::where('kelas', 'xi-tkr-b')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2022')->count();

        $karyawanswasta_xitkrb_2023 = HasilHitunganModel::where('kelas', 'xi-tkr-b')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2023')->count();
        $pegawainegeri_xitkrb_2023 = HasilHitunganModel::where('kelas', 'xi-tkr-b')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2023')->count();
        $pekerja_tdk_tetap_xitkrb_2023 = HasilHitunganModel::where('kelas', 'xi-tkr-b')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2023')->count();
        $usaha_xitkrb_2023 = HasilHitunganModel::where('kelas', 'xi-tkr-b')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2023')->count();

        $karyawanswasta_xitkrb_2024 = HasilHitunganModel::where('kelas', 'xi-tkr-b')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2024')->count();
        $pegawainegeri_xitkrb_2024 = HasilHitunganModel::where('kelas', 'xi-tkr-b')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2024')->count();
        $pekerja_tdk_tetap_xitkrb_2024 = HasilHitunganModel::where('kelas', 'xi-tkr-b')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2024')->count();
        $usaha_xitkrb_2024 = HasilHitunganModel::where('kelas', 'xi-tkr-b')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2024')->count();

        $karyawanswasta_xitkrb_2025 = HasilHitunganModel::where('kelas', 'xi-tkr-b')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2025')->count();
        $pegawainegeri_xitkrb_2025 = HasilHitunganModel::where('kelas', 'xi-tkr-b')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2025')->count();
        $pekerja_tdk_tetap_xitkrb_2025 = HasilHitunganModel::where('kelas', 'xi-tkr-b')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2025')->count();
        $usaha_xitkrb_2025 = HasilHitunganModel::where('kelas', 'xi-tkr-b')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2025')->count();

        // ! DATA KEALAS XI-tkr-C //
        $karyawanswasta_xitkrc_2020 = HasilHitunganModel::where('kelas', 'xi-tkr-c')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2020')->count();
        $pegawainegeri_xitkrc_2020 = HasilHitunganModel::where('kelas', 'xi-tkr-c')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2020')->count();
        $pekerja_tdk_tetap_xitkrc_2020 = HasilHitunganModel::where('kelas', 'xi-tkr-c')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2020')->count();
        $usaha_xitkrc_2020 = HasilHitunganModel::where('kelas', 'xi-tkr-c')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2020')->count();

        $karyawanswasta_xitkrc_2021 = HasilHitunganModel::where('kelas', 'xi-tkr-c')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2021')->count();
        $pegawainegeri_xitkrc_2021 = HasilHitunganModel::where('kelas', 'xi-tkr-c')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2021')->count();
        $pekerja_tdk_tetap_xitkrc_2021 = HasilHitunganModel::where('kelas', 'xi-tkr-c')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2021')->count();
        $usaha_xitkrc_2021 = HasilHitunganModel::where('kelas', 'xi-tkr-c')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2021')->count();

        $karyawanswasta_xitkrc_2022 = HasilHitunganModel::where('kelas', 'xi-tkr-c')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2022')->count();
        $pegawainegeri_xitkrc_2022 = HasilHitunganModel::where('kelas', 'xi-tkr-c')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2022')->count();
        $pekerja_tdk_tetap_xitkrc_2022 = HasilHitunganModel::where('kelas', 'xi-tkr-c')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2022')->count();
        $usaha_xitkrc_2022 = HasilHitunganModel::where('kelas', 'xi-tkr-c')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2022')->count();

        $karyawanswasta_xitkrc_2023 = HasilHitunganModel::where('kelas', 'xi-tkr-c')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2023')->count();
        $pegawainegeri_xitkrc_2023 = HasilHitunganModel::where('kelas', 'xi-tkr-c')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2023')->count();
        $pekerja_tdk_tetap_xitkrc_2023 = HasilHitunganModel::where('kelas', 'xi-tkr-c')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2023')->count();
        $usaha_xitkrc_2023 = HasilHitunganModel::where('kelas', 'xi-tkr-c')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2023')->count();

        $karyawanswasta_xitkrc_2024 = HasilHitunganModel::where('kelas', 'xi-tkr-c')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2024')->count();
        $pegawainegeri_xitkrc_2024 = HasilHitunganModel::where('kelas', 'xi-tkr-c')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2024')->count();
        $pekerja_tdk_tetap_xitkrc_2024 = HasilHitunganModel::where('kelas', 'xi-tkr-c')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2024')->count();
        $usaha_xitkrc_2024 = HasilHitunganModel::where('kelas', 'xi-tkr-c')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2024')->count();

        $karyawanswasta_xitkrc_2025 = HasilHitunganModel::where('kelas', 'xi-tkr-c')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2025')->count();
        $pegawainegeri_xitkrc_2025 = HasilHitunganModel::where('kelas', 'xi-tkr-c')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2025')->count();
        $pekerja_tdk_tetap_xitkrc_2025 = HasilHitunganModel::where('kelas', 'xi-tkr-c')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2025')->count();
        $usaha_xitkrc_2025 = HasilHitunganModel::where('kelas', 'xi-tkr-c')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2025')->count();

        // ! DATA KEALAS XII-tkr-A //
        $karyawanswasta_xiitkra_2020 = HasilHitunganModel::where('kelas', 'XII-tkr-A')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2020')->count();
        $pegawainegeri_xiitkra_2020 = HasilHitunganModel::where('kelas', 'XII-tkr-A')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2020')->count();
        $pekerja_tdk_tetap_xiitkra_2020 = HasilHitunganModel::where('kelas', 'XII-tkr-A')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2020')->count();
        $usaha_xiitkra_2020 = HasilHitunganModel::where('kelas', 'XII-tkr-A')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2020')->count();

        $karyawanswasta_xiitkra_2021 = HasilHitunganModel::where('kelas', 'XII-tkr-A')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2021')->count();
        $pegawainegeri_xiitkra_2021 = HasilHitunganModel::where('kelas', 'XII-tkr-A')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2021')->count();
        $pekerja_tdk_tetap_xiitkra_2021 = HasilHitunganModel::where('kelas', 'XII-tkr-A')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2021')->count();
        $usaha_xiitkra_2021 = HasilHitunganModel::where('kelas', 'XII-tkr-A')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2021')->count();

        $karyawanswasta_xiitkra_2022 = HasilHitunganModel::where('kelas', 'XII-tkr-A')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2022')->count();
        $pegawainegeri_xiitkra_2022 = HasilHitunganModel::where('kelas', 'XII-tkr-A')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2022')->count();
        $pekerja_tdk_tetap_xiitkra_2022 = HasilHitunganModel::where('kelas', 'XII-tkr-A')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2022')->count();
        $usaha_xiitkra_2022 = HasilHitunganModel::where('kelas', 'XII-tkr-A')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2022')->count();

        $karyawanswasta_xiitkra_2023 = HasilHitunganModel::where('kelas', 'XII-tkr-A')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2023')->count();
        $pegawainegeri_xiitkra_2023 = HasilHitunganModel::where('kelas', 'XII-tkr-A')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2023')->count();
        $pekerja_tdk_tetap_xiitkra_2023 = HasilHitunganModel::where('kelas', 'XII-tkr-A')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2023')->count();
        $usaha_xiitkra_2023 = HasilHitunganModel::where('kelas', 'XII-tkr-A')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2023')->count();

        $karyawanswasta_xiitkra_2024 = HasilHitunganModel::where('kelas', 'XII-tkr-A')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2024')->count();
        $pegawainegeri_xiitkra_2024 = HasilHitunganModel::where('kelas', 'XII-tkr-A')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2024')->count();
        $pekerja_tdk_tetap_xiitkra_2024 = HasilHitunganModel::where('kelas', 'XII-tkr-A')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2024')->count();
        $usaha_xiitkra_2024 = HasilHitunganModel::where('kelas', 'XII-tkr-A')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2024')->count();

        $karyawanswasta_xiitkra_2025 = HasilHitunganModel::where('kelas', 'XII-tkr-A')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2025')->count();
        $pegawainegeri_xiitkra_2025 = HasilHitunganModel::where('kelas', 'XII-tkr-A')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2025')->count();
        $pekerja_tdk_tetap_xiitkra_2025 = HasilHitunganModel::where('kelas', 'XII-tkr-A')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2025')->count();
        $usaha_xiitkra_2025 = HasilHitunganModel::where('kelas', 'XII-tkr-A')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2025')->count();

        // ! DATA KEALAS XII-tkr-B //
        $karyawanswasta_xiitkrb_2020 = HasilHitunganModel::where('kelas', 'XII-tkr-B')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2020')->count();
        $pegawainegeri_xiitkrb_2020 = HasilHitunganModel::where('kelas', 'XII-tkr-B')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2020')->count();
        $pekerja_tdk_tetap_xiitkrb_2020 = HasilHitunganModel::where('kelas', 'XII-tkr-B')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2020')->count();
        $usaha_xiitkrb_2020 = HasilHitunganModel::where('kelas', 'XII-tkr-B')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2020')->count();

        $karyawanswasta_xiitkrb_2021 = HasilHitunganModel::where('kelas', 'XII-tkr-B')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2021')->count();
        $pegawainegeri_xiitkrb_2021 = HasilHitunganModel::where('kelas', 'XII-tkr-B')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2021')->count();
        $pekerja_tdk_tetap_xiitkrb_2021 = HasilHitunganModel::where('kelas', 'XII-tkr-B')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2021')->count();
        $usaha_xiitkrb_2021 = HasilHitunganModel::where('kelas', 'XII-tkr-B')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2021')->count();

        $karyawanswasta_xiitkrb_2022 = HasilHitunganModel::where('kelas', 'XII-tkr-B')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2022')->count();
        $pegawainegeri_xiitkrb_2022 = HasilHitunganModel::where('kelas', 'XII-tkr-B')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2022')->count();
        $pekerja_tdk_tetap_xiitkrb_2022 = HasilHitunganModel::where('kelas', 'XII-tkr-B')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2022')->count();
        $usaha_xiitkrb_2022 = HasilHitunganModel::where('kelas', 'XII-tkr-B')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2022')->count();

        $karyawanswasta_xiitkrb_2023 = HasilHitunganModel::where('kelas', 'XII-tkr-B')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2023')->count();
        $pegawainegeri_xiitkrb_2023 = HasilHitunganModel::where('kelas', 'XII-tkr-B')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2023')->count();
        $pekerja_tdk_tetap_xiitkrb_2023 = HasilHitunganModel::where('kelas', 'XII-tkr-B')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2023')->count();
        $usaha_xiitkrb_2023 = HasilHitunganModel::where('kelas', 'XII-tkr-B')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2023')->count();

        $karyawanswasta_xiitkrb_2024 = HasilHitunganModel::where('kelas', 'XII-tkr-B')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2024')->count();
        $pegawainegeri_xiitkrb_2024 = HasilHitunganModel::where('kelas', 'XII-tkr-B')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2024')->count();
        $pekerja_tdk_tetap_xiitkrb_2024 = HasilHitunganModel::where('kelas', 'XII-tkr-B')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2024')->count();
        $usaha_xiitkrb_2024 = HasilHitunganModel::where('kelas', 'XII-tkr-B')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2024')->count();

        $karyawanswasta_xiitkrb_2025 = HasilHitunganModel::where('kelas', 'XII-tkr-B')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2025')->count();
        $pegawainegeri_xiitkrb_2025 = HasilHitunganModel::where('kelas', 'XII-tkr-B')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2025')->count();
        $pekerja_tdk_tetap_xiitkrb_2025 = HasilHitunganModel::where('kelas', 'XII-tkr-B')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2025')->count();
        $usaha_xiitkrb_2025 = HasilHitunganModel::where('kelas', 'XII-tkr-B')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2025')->count();

        // ! DATA KEALAS XII-tkr-C //
        $karyawanswasta_xiitkrc_2020 = HasilHitunganModel::where('kelas', 'XII-tkr-C')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2020')->count();
        $pegawainegeri_xiitkrc_2020 = HasilHitunganModel::where('kelas', 'XII-tkr-C')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2020')->count();
        $pekerja_tdk_tetap_xiitkrc_2020 = HasilHitunganModel::where('kelas', 'XII-tkr-C')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2020')->count();
        $usaha_xiitkrc_2020 = HasilHitunganModel::where('kelas', 'XII-tkr-C')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2020')->count();

        $karyawanswasta_xiitkrc_2021 = HasilHitunganModel::where('kelas', 'XII-tkr-C')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2021')->count();
        $pegawainegeri_xiitkrc_2021 = HasilHitunganModel::where('kelas', 'XII-tkr-C')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2021')->count();
        $pekerja_tdk_tetap_xiitkrc_2021 = HasilHitunganModel::where('kelas', 'XII-tkr-C')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2021')->count();
        $usaha_xiitkrc_2021 = HasilHitunganModel::where('kelas', 'XII-tkr-C')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2021')->count();

        $karyawanswasta_xiitkrc_2022 = HasilHitunganModel::where('kelas', 'XII-tkr-C')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2022')->count();
        $pegawainegeri_xiitkrc_2022 = HasilHitunganModel::where('kelas', 'XII-tkr-C')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2022')->count();
        $pekerja_tdk_tetap_xiitkrc_2022 = HasilHitunganModel::where('kelas', 'XII-tkr-C')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2022')->count();
        $usaha_xiitkrc_2022 = HasilHitunganModel::where('kelas', 'XII-tkr-C')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2022')->count();

        $karyawanswasta_xiitkrc_2023 = HasilHitunganModel::where('kelas', 'XII-tkr-C')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2023')->count();
        $pegawainegeri_xiitkrc_2023 = HasilHitunganModel::where('kelas', 'XII-tkr-C')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2023')->count();
        $pekerja_tdk_tetap_xiitkrc_2023 = HasilHitunganModel::where('kelas', 'XII-tkr-C')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2023')->count();
        $usaha_xiitkrc_2023 = HasilHitunganModel::where('kelas', 'XII-tkr-C')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2023')->count();

        $karyawanswasta_xiitkrc_2024 = HasilHitunganModel::where('kelas', 'XII-tkr-C')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2024')->count();
        $pegawainegeri_xiitkrc_2024 = HasilHitunganModel::where('kelas', 'XII-tkr-C')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2024')->count();
        $pekerja_tdk_tetap_xiitkrc_2024 = HasilHitunganModel::where('kelas', 'XII-tkr-C')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2024')->count();
        $usaha_xiitkrc_2024 = HasilHitunganModel::where('kelas', 'XII-tkr-C')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2024')->count();

        $karyawanswasta_xiitkrc_2025 = HasilHitunganModel::where('kelas', 'XII-tkr-C')->where('status_pekerjaan_wali', 'Karyawan Swasta')->whereYear('tgl_daftar', '2025')->count();
        $pegawainegeri_xiitkrc_2025 = HasilHitunganModel::where('kelas', 'XII-tkr-C')->where('status_pekerjaan_wali', 'Pegawai Negri')->whereYear('tgl_daftar', '2025')->count();
        $pekerja_tdk_tetap_xiitkrc_2025 = HasilHitunganModel::where('kelas', 'XII-tkr-C')->where('status_pekerjaan_wali', 'Pekerja Tidak Tetap')->whereYear('tgl_daftar', '2025')->count();
        $usaha_xiitkrc_2025 = HasilHitunganModel::where('kelas', 'XII-tkr-C')->where('status_pekerjaan_wali', 'Usaha')->whereYear('tgl_daftar', '2025')->count();

        return view(
            'admin.analisa_data.data_bansos.status_pekerjaan_ortu.index',
            compact(
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
                'karyawanswasta_xtkja_2020',
                'karyawanswasta_xtkja_2021',
                'karyawanswasta_xtkja_2022',
                'karyawanswasta_xtkja_2023',
                'karyawanswasta_xtkja_2024',
                'karyawanswasta_xtkja_2025',
                'pegawainegeri_xtkja_2020',
                'pegawainegeri_xtkja_2021',
                'pegawainegeri_xtkja_2022',
                'pegawainegeri_xtkja_2023',
                'pegawainegeri_xtkja_2024',
                'pegawainegeri_xtkja_2025',
                'pekerja_tdk_tetap_xtkja_2020',
                'pekerja_tdk_tetap_xtkja_2021',
                'pekerja_tdk_tetap_xtkja_2022',
                'pekerja_tdk_tetap_xtkja_2023',
                'pekerja_tdk_tetap_xtkja_2024',
                'pekerja_tdk_tetap_xtkja_2025',
                'usaha_xtkja_2020',
                'usaha_xtkja_2021',
                'usaha_xtkja_2022',
                'usaha_xtkja_2023',
                'usaha_xtkja_2024',
                'usaha_xtkja_2025',
                'karyawanswasta_xtkjb_2020',
                'karyawanswasta_xtkjb_2021',
                'karyawanswasta_xtkjb_2022',
                'karyawanswasta_xtkjb_2023',
                'karyawanswasta_xtkjb_2024',
                'karyawanswasta_xtkjb_2025',
                'pegawainegeri_xtkjb_2020',
                'pegawainegeri_xtkjb_2021',
                'pegawainegeri_xtkjb_2022',
                'pegawainegeri_xtkjb_2023',
                'pegawainegeri_xtkjb_2024',
                'pegawainegeri_xtkjb_2025',
                'pekerja_tdk_tetap_xtkjb_2020',
                'pekerja_tdk_tetap_xtkjb_2021',
                'pekerja_tdk_tetap_xtkjb_2022',
                'pekerja_tdk_tetap_xtkjb_2023',
                'pekerja_tdk_tetap_xtkjb_2024',
                'pekerja_tdk_tetap_xtkjb_2025',
                'usaha_xtkjb_2020',
                'usaha_xtkjb_2021',
                'usaha_xtkjb_2022',
                'usaha_xtkjb_2023',
                'usaha_xtkjb_2024',
                'usaha_xtkjb_2025',
                'karyawanswasta_xtkjc_2020',
                'karyawanswasta_xtkjc_2021',
                'karyawanswasta_xtkjc_2022',
                'karyawanswasta_xtkjc_2023',
                'karyawanswasta_xtkjc_2024',
                'karyawanswasta_xtkjc_2025',
                'pegawainegeri_xtkjc_2020',
                'pegawainegeri_xtkjc_2021',
                'pegawainegeri_xtkjc_2022',
                'pegawainegeri_xtkjc_2023',
                'pegawainegeri_xtkjc_2024',
                'pegawainegeri_xtkjc_2025',
                'pekerja_tdk_tetap_xtkjc_2020',
                'pekerja_tdk_tetap_xtkjc_2021',
                'pekerja_tdk_tetap_xtkjc_2022',
                'pekerja_tdk_tetap_xtkjc_2023',
                'pekerja_tdk_tetap_xtkjc_2024',
                'pekerja_tdk_tetap_xtkjc_2025',
                'usaha_xtkjc_2020',
                'usaha_xtkjc_2021',
                'usaha_xtkjc_2022',
                'usaha_xtkjc_2023',
                'usaha_xtkjc_2024',
                'usaha_xtkjc_2025',
                'karyawanswasta_xtkjd_2020',
                'karyawanswasta_xtkjd_2021',
                'karyawanswasta_xtkjd_2022',
                'karyawanswasta_xtkjd_2023',
                'karyawanswasta_xtkjd_2024',
                'karyawanswasta_xtkjd_2025',
                'pegawainegeri_xtkjd_2020',
                'pegawainegeri_xtkjd_2021',
                'pegawainegeri_xtkjd_2022',
                'pegawainegeri_xtkjd_2023',
                'pegawainegeri_xtkjd_2024',
                'pegawainegeri_xtkjd_2025',
                'pekerja_tdk_tetap_xtkjd_2020',
                'pekerja_tdk_tetap_xtkjd_2021',
                'pekerja_tdk_tetap_xtkjd_2022',
                'pekerja_tdk_tetap_xtkjd_2023',
                'pekerja_tdk_tetap_xtkjd_2024',
                'pekerja_tdk_tetap_xtkjd_2025',
                'usaha_xtkjd_2020',
                'usaha_xtkjd_2021',
                'usaha_xtkjd_2022',
                'usaha_xtkjd_2023',
                'usaha_xtkjd_2024',
                'usaha_xtkjd_2025',
                'karyawanswasta_xitkja_2020',
                'karyawanswasta_xitkja_2021',
                'karyawanswasta_xitkja_2022',
                'karyawanswasta_xitkja_2023',
                'karyawanswasta_xitkja_2024',
                'karyawanswasta_xitkja_2025',
                'pegawainegeri_xitkja_2020',
                'pegawainegeri_xitkja_2021',
                'pegawainegeri_xitkja_2022',
                'pegawainegeri_xitkja_2023',
                'pegawainegeri_xitkja_2024',
                'pegawainegeri_xitkja_2025',
                'pekerja_tdk_tetap_xitkja_2020',
                'pekerja_tdk_tetap_xitkja_2021',
                'pekerja_tdk_tetap_xitkja_2022',
                'pekerja_tdk_tetap_xitkja_2023',
                'pekerja_tdk_tetap_xitkja_2024',
                'pekerja_tdk_tetap_xitkja_2025',
                'usaha_xitkja_2020',
                'usaha_xitkja_2021',
                'usaha_xitkja_2022',
                'usaha_xitkja_2023',
                'usaha_xitkja_2024',
                'usaha_xitkja_2025',
                'karyawanswasta_xitkjb_2020',
                'karyawanswasta_xitkjb_2021',
                'karyawanswasta_xitkjb_2022',
                'karyawanswasta_xitkjb_2023',
                'karyawanswasta_xitkjb_2024',
                'karyawanswasta_xitkjb_2025',
                'pegawainegeri_xitkjb_2020',
                'pegawainegeri_xitkjb_2021',
                'pegawainegeri_xitkjb_2022',
                'pegawainegeri_xitkjb_2023',
                'pegawainegeri_xitkjb_2024',
                'pegawainegeri_xitkjb_2025',
                'pekerja_tdk_tetap_xitkjb_2020',
                'pekerja_tdk_tetap_xitkjb_2021',
                'pekerja_tdk_tetap_xitkjb_2022',
                'pekerja_tdk_tetap_xitkjb_2023',
                'pekerja_tdk_tetap_xitkjb_2024',
                'pekerja_tdk_tetap_xitkjb_2025',
                'usaha_xitkjb_2020',
                'usaha_xitkjb_2021',
                'usaha_xitkjb_2022',
                'usaha_xitkjb_2023',
                'usaha_xitkjb_2024',
                'usaha_xitkjb_2025',
                'karyawanswasta_xitkjc_2020',
                'karyawanswasta_xitkjc_2021',
                'karyawanswasta_xitkjc_2022',
                'karyawanswasta_xitkjc_2023',
                'karyawanswasta_xitkjc_2024',
                'karyawanswasta_xitkjc_2025',
                'pegawainegeri_xitkjc_2020',
                'pegawainegeri_xitkjc_2021',
                'pegawainegeri_xitkjc_2022',
                'pegawainegeri_xitkjc_2023',
                'pegawainegeri_xitkjc_2024',
                'pegawainegeri_xitkjc_2025',
                'pekerja_tdk_tetap_xitkjc_2020',
                'pekerja_tdk_tetap_xitkjc_2021',
                'pekerja_tdk_tetap_xitkjc_2022',
                'pekerja_tdk_tetap_xitkjc_2023',
                'pekerja_tdk_tetap_xitkjc_2024',
                'pekerja_tdk_tetap_xitkjc_2025',
                'usaha_xitkjc_2020',
                'usaha_xitkjc_2021',
                'usaha_xitkjc_2022',
                'usaha_xitkjc_2023',
                'usaha_xitkjc_2024',
                'usaha_xitkjc_2025',
                'karyawanswasta_xiitkja_2020',
                'karyawanswasta_xiitkja_2021',
                'karyawanswasta_xiitkja_2022',
                'karyawanswasta_xiitkja_2023',
                'karyawanswasta_xiitkja_2024',
                'karyawanswasta_xiitkja_2025',
                'pegawainegeri_xiitkja_2020',
                'pegawainegeri_xiitkja_2021',
                'pegawainegeri_xiitkja_2022',
                'pegawainegeri_xiitkja_2023',
                'pegawainegeri_xiitkja_2024',
                'pegawainegeri_xiitkja_2025',
                'pekerja_tdk_tetap_xiitkja_2020',
                'pekerja_tdk_tetap_xiitkja_2021',
                'pekerja_tdk_tetap_xiitkja_2022',
                'pekerja_tdk_tetap_xiitkja_2023',
                'pekerja_tdk_tetap_xiitkja_2024',
                'pekerja_tdk_tetap_xiitkja_2025',
                'usaha_xiitkja_2020',
                'usaha_xiitkja_2021',
                'usaha_xiitkja_2022',
                'usaha_xiitkja_2023',
                'usaha_xiitkja_2024',
                'usaha_xiitkja_2025',
                'karyawanswasta_xiitkjb_2020',
                'karyawanswasta_xiitkjb_2021',
                'karyawanswasta_xiitkjb_2022',
                'karyawanswasta_xiitkjb_2023',
                'karyawanswasta_xiitkjb_2024',
                'karyawanswasta_xiitkjb_2025',
                'pegawainegeri_xiitkjb_2020',
                'pegawainegeri_xiitkjb_2021',
                'pegawainegeri_xiitkjb_2022',
                'pegawainegeri_xiitkjb_2023',
                'pegawainegeri_xiitkjb_2024',
                'pegawainegeri_xiitkjb_2025',
                'pekerja_tdk_tetap_xiitkjb_2020',
                'pekerja_tdk_tetap_xiitkjb_2021',
                'pekerja_tdk_tetap_xiitkjb_2022',
                'pekerja_tdk_tetap_xiitkjb_2023',
                'pekerja_tdk_tetap_xiitkjb_2024',
                'pekerja_tdk_tetap_xiitkjb_2025',
                'usaha_xiitkjb_2020',
                'usaha_xiitkjb_2021',
                'usaha_xiitkjb_2022',
                'usaha_xiitkjb_2023',
                'usaha_xiitkjb_2024',
                'usaha_xiitkjb_2025',
                'karyawanswasta_xiitkjc_2020',
                'karyawanswasta_xiitkjc_2021',
                'karyawanswasta_xiitkjc_2022',
                'karyawanswasta_xiitkjc_2023',
                'karyawanswasta_xiitkjc_2024',
                'karyawanswasta_xiitkjc_2025',
                'pegawainegeri_xiitkjc_2020',
                'pegawainegeri_xiitkjc_2021',
                'pegawainegeri_xiitkjc_2022',
                'pegawainegeri_xiitkjc_2023',
                'pegawainegeri_xiitkjc_2024',
                'pegawainegeri_xiitkjc_2025',
                'pekerja_tdk_tetap_xiitkjc_2020',
                'pekerja_tdk_tetap_xiitkjc_2021',
                'pekerja_tdk_tetap_xiitkjc_2022',
                'pekerja_tdk_tetap_xiitkjc_2023',
                'pekerja_tdk_tetap_xiitkjc_2024',
                'pekerja_tdk_tetap_xiitkjc_2025',
                'usaha_xiitkjc_2020',
                'usaha_xiitkjc_2021',
                'usaha_xiitkjc_2022',
                'usaha_xiitkjc_2023',
                'usaha_xiitkjc_2024',
                'usaha_xiitkjc_2025',
                'karyawanswasta_xtkra_2020',
                'karyawanswasta_xtkra_2021',
                'karyawanswasta_xtkra_2022',
                'karyawanswasta_xtkra_2023',
                'karyawanswasta_xtkra_2024',
                'karyawanswasta_xtkra_2025',
                'pegawainegeri_xtkra_2020',
                'pegawainegeri_xtkra_2021',
                'pegawainegeri_xtkra_2022',
                'pegawainegeri_xtkra_2023',
                'pegawainegeri_xtkra_2024',
                'pegawainegeri_xtkra_2025',
                'pekerja_tdk_tetap_xtkra_2020',
                'pekerja_tdk_tetap_xtkra_2021',
                'pekerja_tdk_tetap_xtkra_2022',
                'pekerja_tdk_tetap_xtkra_2023',
                'pekerja_tdk_tetap_xtkra_2024',
                'pekerja_tdk_tetap_xtkra_2025',
                'usaha_xtkra_2020',
                'usaha_xtkra_2021',
                'usaha_xtkra_2022',
                'usaha_xtkra_2023',
                'usaha_xtkra_2024',
                'usaha_xtkra_2025',
                'karyawanswasta_xtkrb_2020',
                'karyawanswasta_xtkrb_2021',
                'karyawanswasta_xtkrb_2022',
                'karyawanswasta_xtkrb_2023',
                'karyawanswasta_xtkrb_2024',
                'karyawanswasta_xtkrb_2025',
                'pegawainegeri_xtkrb_2020',
                'pegawainegeri_xtkrb_2021',
                'pegawainegeri_xtkrb_2022',
                'pegawainegeri_xtkrb_2023',
                'pegawainegeri_xtkrb_2024',
                'pegawainegeri_xtkrb_2025',
                'pekerja_tdk_tetap_xtkrb_2020',
                'pekerja_tdk_tetap_xtkrb_2021',
                'pekerja_tdk_tetap_xtkrb_2022',
                'pekerja_tdk_tetap_xtkrb_2023',
                'pekerja_tdk_tetap_xtkrb_2024',
                'pekerja_tdk_tetap_xtkrb_2025',
                'usaha_xtkrb_2020',
                'usaha_xtkrb_2021',
                'usaha_xtkrb_2022',
                'usaha_xtkrb_2023',
                'usaha_xtkrb_2024',
                'usaha_xtkrb_2025',
                'karyawanswasta_xtkrc_2020',
                'karyawanswasta_xtkrc_2021',
                'karyawanswasta_xtkrc_2022',
                'karyawanswasta_xtkrc_2023',
                'karyawanswasta_xtkrc_2024',
                'karyawanswasta_xtkrc_2025',
                'pegawainegeri_xtkrc_2020',
                'pegawainegeri_xtkrc_2021',
                'pegawainegeri_xtkrc_2022',
                'pegawainegeri_xtkrc_2023',
                'pegawainegeri_xtkrc_2024',
                'pegawainegeri_xtkrc_2025',
                'pekerja_tdk_tetap_xtkrc_2020',
                'pekerja_tdk_tetap_xtkrc_2021',
                'pekerja_tdk_tetap_xtkrc_2022',
                'pekerja_tdk_tetap_xtkrc_2023',
                'pekerja_tdk_tetap_xtkrc_2024',
                'pekerja_tdk_tetap_xtkrc_2025',
                'usaha_xtkrc_2020',
                'usaha_xtkrc_2021',
                'usaha_xtkrc_2022',
                'usaha_xtkrc_2023',
                'usaha_xtkrc_2024',
                'usaha_xtkrc_2025',
                'karyawanswasta_xitkra_2020',
                'karyawanswasta_xitkra_2021',
                'karyawanswasta_xitkra_2022',
                'karyawanswasta_xitkra_2023',
                'karyawanswasta_xitkra_2024',
                'karyawanswasta_xitkra_2025',
                'pegawainegeri_xitkra_2020',
                'pegawainegeri_xitkra_2021',
                'pegawainegeri_xitkra_2022',
                'pegawainegeri_xitkra_2023',
                'pegawainegeri_xitkra_2024',
                'pegawainegeri_xitkra_2025',
                'pekerja_tdk_tetap_xitkra_2020',
                'pekerja_tdk_tetap_xitkra_2021',
                'pekerja_tdk_tetap_xitkra_2022',
                'pekerja_tdk_tetap_xitkra_2023',
                'pekerja_tdk_tetap_xitkra_2024',
                'pekerja_tdk_tetap_xitkra_2025',
                'usaha_xitkra_2020',
                'usaha_xitkra_2021',
                'usaha_xitkra_2022',
                'usaha_xitkra_2023',
                'usaha_xitkra_2024',
                'usaha_xitkra_2025',
                'karyawanswasta_xitkrb_2020',
                'karyawanswasta_xitkrb_2021',
                'karyawanswasta_xitkrb_2022',
                'karyawanswasta_xitkrb_2023',
                'karyawanswasta_xitkrb_2024',
                'karyawanswasta_xitkrb_2025',
                'pegawainegeri_xitkrb_2020',
                'pegawainegeri_xitkrb_2021',
                'pegawainegeri_xitkrb_2022',
                'pegawainegeri_xitkrb_2023',
                'pegawainegeri_xitkrb_2024',
                'pegawainegeri_xitkrb_2025',
                'pekerja_tdk_tetap_xitkrb_2020',
                'pekerja_tdk_tetap_xitkrb_2021',
                'pekerja_tdk_tetap_xitkrb_2022',
                'pekerja_tdk_tetap_xitkrb_2023',
                'pekerja_tdk_tetap_xitkrb_2024',
                'pekerja_tdk_tetap_xitkrb_2025',
                'usaha_xitkrb_2020',
                'usaha_xitkrb_2021',
                'usaha_xitkrb_2022',
                'usaha_xitkrb_2023',
                'usaha_xitkrb_2024',
                'usaha_xitkrb_2025',
                'karyawanswasta_xitkrc_2020',
                'karyawanswasta_xitkrc_2021',
                'karyawanswasta_xitkrc_2022',
                'karyawanswasta_xitkrc_2023',
                'karyawanswasta_xitkrc_2024',
                'karyawanswasta_xitkrc_2025',
                'pegawainegeri_xitkrc_2020',
                'pegawainegeri_xitkrc_2021',
                'pegawainegeri_xitkrc_2022',
                'pegawainegeri_xitkrc_2023',
                'pegawainegeri_xitkrc_2024',
                'pegawainegeri_xitkrc_2025',
                'pekerja_tdk_tetap_xitkrc_2020',
                'pekerja_tdk_tetap_xitkrc_2021',
                'pekerja_tdk_tetap_xitkrc_2022',
                'pekerja_tdk_tetap_xitkrc_2023',
                'pekerja_tdk_tetap_xitkrc_2024',
                'pekerja_tdk_tetap_xitkrc_2025',
                'usaha_xitkrc_2020',
                'usaha_xitkrc_2021',
                'usaha_xitkrc_2022',
                'usaha_xitkrc_2023',
                'usaha_xitkrc_2024',
                'usaha_xitkrc_2025',
                'karyawanswasta_xiitkra_2020',
                'karyawanswasta_xiitkra_2021',
                'karyawanswasta_xiitkra_2022',
                'karyawanswasta_xiitkra_2023',
                'karyawanswasta_xiitkra_2024',
                'karyawanswasta_xiitkra_2025',
                'pegawainegeri_xiitkra_2020',
                'pegawainegeri_xiitkra_2021',
                'pegawainegeri_xiitkra_2022',
                'pegawainegeri_xiitkra_2023',
                'pegawainegeri_xiitkra_2024',
                'pegawainegeri_xiitkra_2025',
                'pekerja_tdk_tetap_xiitkra_2020',
                'pekerja_tdk_tetap_xiitkra_2021',
                'pekerja_tdk_tetap_xiitkra_2022',
                'pekerja_tdk_tetap_xiitkra_2023',
                'pekerja_tdk_tetap_xiitkra_2024',
                'pekerja_tdk_tetap_xiitkra_2025',
                'usaha_xiitkra_2020',
                'usaha_xiitkra_2021',
                'usaha_xiitkra_2022',
                'usaha_xiitkra_2023',
                'usaha_xiitkra_2024',
                'usaha_xiitkra_2025',
                'karyawanswasta_xiitkrb_2020',
                'karyawanswasta_xiitkrb_2021',
                'karyawanswasta_xiitkrb_2022',
                'karyawanswasta_xiitkrb_2023',
                'karyawanswasta_xiitkrb_2024',
                'karyawanswasta_xiitkrb_2025',
                'pegawainegeri_xiitkrb_2020',
                'pegawainegeri_xiitkrb_2021',
                'pegawainegeri_xiitkrb_2022',
                'pegawainegeri_xiitkrb_2023',
                'pegawainegeri_xiitkrb_2024',
                'pegawainegeri_xiitkrb_2025',
                'pekerja_tdk_tetap_xiitkrb_2020',
                'pekerja_tdk_tetap_xiitkrb_2021',
                'pekerja_tdk_tetap_xiitkrb_2022',
                'pekerja_tdk_tetap_xiitkrb_2023',
                'pekerja_tdk_tetap_xiitkrb_2024',
                'pekerja_tdk_tetap_xiitkrb_2025',
                'usaha_xiitkrb_2020',
                'usaha_xiitkrb_2021',
                'usaha_xiitkrb_2022',
                'usaha_xiitkrb_2023',
                'usaha_xiitkrb_2024',
                'usaha_xiitkrb_2025',
                'karyawanswasta_xiitkrc_2020',
                'karyawanswasta_xiitkrc_2021',
                'karyawanswasta_xiitkrc_2022',
                'karyawanswasta_xiitkrc_2023',
                'karyawanswasta_xiitkrc_2024',
                'karyawanswasta_xiitkrc_2025',
                'pegawainegeri_xiitkrc_2020',
                'pegawainegeri_xiitkrc_2021',
                'pegawainegeri_xiitkrc_2022',
                'pegawainegeri_xiitkrc_2023',
                'pegawainegeri_xiitkrc_2024',
                'pegawainegeri_xiitkrc_2025',
                'pekerja_tdk_tetap_xiitkrc_2020',
                'pekerja_tdk_tetap_xiitkrc_2021',
                'pekerja_tdk_tetap_xiitkrc_2022',
                'pekerja_tdk_tetap_xiitkrc_2023',
                'pekerja_tdk_tetap_xiitkrc_2024',
                'pekerja_tdk_tetap_xiitkrc_2025',
                'usaha_xiitkrc_2020',
                'usaha_xiitkrc_2021',
                'usaha_xiitkrc_2022',
                'usaha_xiitkrc_2023',
                'usaha_xiitkrc_2024',
                'usaha_xiitkrc_2025'
            )
        );
    }
}
