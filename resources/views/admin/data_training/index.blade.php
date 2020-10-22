@extends('layout/masteradmin')

@section('judul', 'Halaman Data Training')

@section('konten')

<div class="main-content-inner">
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="/admin">Home</a>
            </li>
            <li>
                <i class="ace-icon fa fa-database home-icon"></i>
                <a href="#">Data Training Bansos</a>
            </li>
        </ul><!-- /.breadcrumb -->
    </div>
    <br>
    <div class="page-header">
        <h1>
            Master Data Training
        </h1>
    </div>
        <div class="space-6"></div>
        <div class="page-content">
            <div class="row">
                <div class="col-xs-12">
            <a href="#modal-hitung" data-toggle="modal" class="btn btn-info btn-xl"><i class="fa fa-calculator"> Hitung Naive Baiyes</a></i>
            <a href="#modal-excel" data-toggle="modal" class="btn btn-success btn-xl"><i class="fa fa-file-excel-o"> Import Data Sampel</a></i>
            <a href="#modal-hapus" data-toggle="modal" class="btn btn-danger btn-xl"><i class="fa fa-trash"> Hapus Semua Data Training</a></i>
                    <div class="space-6"></div>
                    <div id="highcharts_datatraining"></div>

                    <table id="myTable" class="display">
                        <thead>
                            <tr>
                                <th class="text-center">No.</th>
                                <th class="text-center">Tangal Daftar</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">NISN</th>
                                <th class="text-center">Kelas</th>
                                <th class="text-center">Kelengkapan Ortu</th>
                                <th class="text-center">Status YatimPiatu</th>
                                <th class="text-center">Status Rumah Ortu</th>
                                <th class="text-center">Status Pekerjaan Ortu</th>
                                <th class="text-center">SK Tidak Mampu</th>
                                <th class="text-center">Dokumen SK Tidak Mampu</th>
                                <th class="text-center" style="width:3%">Keterangan</th>
                                <th class="text-center" style="width:10%">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach ($datatraining as $data)
                                <td class="text-center">{{$loop->iteration}}</td>
                                <td class="text-center">
                                    {{\Carbon\Carbon::parse($data->tanggal_daftar)->format('d-M-y')}}
                                </td>
                                 <td class="text-center">{{$data->nama_siswa}}</td>
                                 <td class="text-center">{{$data->nisn}}</td>
                                 <td class="text-center">{{$data->kelas}}</td>
                                 <td class="text-center">{{$data->status_kelengkapan_ortu}}</td>
                                 <td class="text-center">
                                     @if($data->status_yatimpiatu == null)
                                     -
                                     @else
                                     {{$data->status_yatimpiatu}}
                                     @endif
                                    </td>
                                 <td class="text-center">{{$data->status_rumah_ortu}}</td>
                                 <td class="text-center">{{$data->status_pekerjaan_wali}}</td>
                                 <td class="text-center">{{$data->status_sk_tidakmampu}}</td>
                                 <td class="text-center">
                                     @if($data->foto_sk_tidakmampu == null)
                                     -
                                     @else
                                     {{$data->foto_sk_tidakmampu}}
                                     @endif
                                    </td>
                                 <td class="text-center">
                                     @if($data->keterangan == 'Dapat')
                                     <span class="label label-sm label-success">Dapat Bantuan</span>
                                     @else
                                     <span class="label label-sm label-danger">Tidak Dapat Bantuan</span>
                                     @endif
                                    </td>
                                 <td class="text-center">
                                 <a href="/admin/edit_datatraining/{{$data->id}}" class="btn btn-primary btn-sm"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="Edit"></a></i>     
                                 <a href="/admin/hapus_data_training/{{$data->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Hapus"></a></i>     
                                </td>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

   <!-- Modal DAFTAR BANSOS -->
   <div class="modal fade" id="modal-excel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <div class="page-header">
                <h1>
                   Import Data Partisipan Bansos
                </h1>
            </div>
        <div class="modal-body">
                    <!-- PAGE CONTENT BEGINS -->
                    <form action="/admin/insert_data_training" class="form-horizontal" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> File Excel : </label>
                                <div class="col-md-9">
                                    <select class="form-control" id="file_excel">
                                        <option>Silahkan Pilih</option>
                                        <option value="Belum Ada">Belum Ada</option>
                                        <option value="Sudah Ada">Sudah Ada</option>
                                    </select>
                                </div>
                             </div>
                             <div class="form-group" id="download_excel">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"></label>
                                <div class="col-md-9">
                                <a href="/template_excel/TEMPLATE_DATA_TRAINING.xlsx" class="btn btn-success btn-lg"><i class="fa fa-download"> Download Template Excel </a></i>
                                </div>
                            </div>
                                <div class="form-group" id="excel-datatraining">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Upload File : </label>
                                    <div class="col-sm-9">
                                    <input type="file" id="form-field-1-1" placeholder="Silahkan di isi" class="form-control @error('file') is-invalid @enderror" name="file" required value="{{old('file')}}"/>
                                    <span class="text-danger">*CSV, XLSX, XLX</span>
                                        @error('file')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-success"><i class="fa fa-save"> Simpan</button></i>
                </div>
            </div>
        </form>
    </div>
</div>
   <div class="modal fade" id="modal-hapus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <div class="page-header">
                <h1>
                    Konfirmasi Hapus Semua Data Training??
                </h1>
            </div>  
        </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                    <a href="/admin/hapus_data_training" class="btn btn-danger"><i class="fa fa-trash"> Hapus</a></i>
                </div>
            </div>
        </form>
    </div>
</div>
   <!-- Modal DAFTAR BANSOS -->
   <div class="modal fade" id="modal-hitung" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <div class="page-header">
                <h1>
                   <i class="fa fa-cogs">
                   Setting DataSet
                </i>
              </h1>
            </div>
        <div class="modal-body">
                    <!-- PAGE CONTENT BEGINS -->
                    <form action="/admin/hitung_data_training" class="form-horizontal" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="form-field-select-3">Status Kelengkapan Orang Tua : </label>
                                <br />
                                <select class="form-control" id="status_kelengkapan_ortu" name="status_kelengkapan_ortu">
                                    <option>--Silahkan Pilih--</option>
                                    <option value="Lengkap">Lengkap </option>
                                    <option value="Tidak Lengkap">Tidak Lengkap</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="form-field-select-3">Status Kepemilikan Rumah Orang Tua : </label>
                                <br />
                                <select class="form-control" id="status_rumahortu" name="status_rumah_ortu">
                                    <option>--Silahkan Pilih--</option>
                                    <option value="Rumah Sendiri">Rumah Sendiri</option>
                                    <option value="Rumah Sewa">Rumah Sewa</option>
                                    <option value="Kontrakan">Kontrakan</option>
                                    <option value="Tinggal Dengan Saudara">Tinggal Dengan Saudara</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="form-field-select-3">Status Pekerjaan Orang Tua : </label>
                                <br />
                                <select class="form-control" id="status_pekerjaanortu" name="status_pekerjaan_wali">
                                    <option>--Silahkan Pilih--</option>
                                    <option value="Karyawan Swasta">Karyawan Swasta</option>
                                    <option value="Pegawai Negri">Pegawai Negeri</option>
                                    <option value="Pekerja Tidak Tetap">Pekerja Tidak Tetap</option>
                                    <option value="Usaha">Usaha</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="form-field-select-3">Surat Keterangan Tidak Mampu : </label>
                                <br />
                                <select class="form-control" id="status_sk" name="status_sk_tidakmampu">
                                    <option>--Silahkan Pilih--</option>
                                    <option value="Ada">Ada</option>
                                    <option value="Tidak Ada">Tidak Ada</option>
                                </select>
                            </div>
                         </div>
                         
                   </div>
                   </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-success"><i class="fa fa-calculator"> Hitung</button></i>
                    </div>
                </div>
            </form>
          </div>
        </div>

                     
<script type="text/javascript">

    // Create the chart
    Highcharts.chart('highcharts_datatraining', {
        chart: {
            backgroundColor: {
            linearGradient: [0, 0, 500, 500],
            stops: [
                [0, 'rgb(255, 255, 255)'],
                [1, 'rgb(200, 200, 255)']
            ]
        },
            type: 'column'
        },
        title: {
            text: 'Grafik Data Ktriteria Bantuan Sosial Siswa'
        },
        subtitle: {
            text: ''
        },
        accessibility: {
            announceNewData: {
                enabled: true
            }
        },
        xAxis: {
            type: 'category'
        },
        yAxis: {
            title: {
                text: 'Total Data Training'
            }
    
        },
        legend: {
            enabled: false
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                    format: '{point.y}'
                }
            }
        },
    
        tooltip: {
            headerFormat: '<span style="font-size:14px">Total {series.name}</span><br>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>'
        },
    
        series: [
            {
                name: "Data Training",
                colorByPoint: true,
                data: [
                    {
                        name: "X-TKJ-A",
                        y: {{$xtkja}},
                        drilldown: "X-TKJ-A"
                    },
                    {
                        name: "X-TKJ-B",
                        y: {{$xtkjb}},
                        drilldown: "X-TKJ-B"
                    },
                    {
                        name: "X-TKJ-C",
                        y: {{$xtkjc}},
                        drilldown: "X-TKJ-C"
                    },
                    {
                        name: "X-TKJ-D",
                        y: {{$xtkjd}},
                        drilldown: "X-TKJ-D"
                    },
                    {
                        name: "XI-TKJ-A",
                        y: {{$xitkja}},
                        drilldown: "XI-TKJ-A"
                    },
                    {
                        name: "XI-TKJ-B",
                        y: {{$xitkjb}},
                        drilldown: "XI-TKJ-B"
                    },
                    {
                        name: "XI-TKJ-C",
                        y: {{$xitkjc}},
                        drilldown: "XI-TKJ-C"
                    },
                    {
                        name: "XII-TKJ-A",
                        y: {{$xiitkja}},
                        drilldown: "XII-TKJ-A"
                    },
                    {
                        name: "XII-TKJ-B",
                        y: {{$xiitkjb}},
                        drilldown: "XII-TKJ-B"
                    },
                    {
                        name: "XII-TKJ-C",
                        y: {{$xiitkjc}},
                        drilldown: "XII-TKJ-C"
                    },
                    {
                        name: "X-TKR-A",
                        y: {{$xtkra}},
                        drilldown: "X-TKR-A"
                    },
                    {
                        name: "X-TKR-B",
                        y: {{$xtkrb}},
                        drilldown: "X-TKR-B"
                    },
                    {
                        name: "X-TKR-C",
                        y: {{$xtkrc}},
                        drilldown: "X-TKR-C"
                    },
                    {
                        name: "XI-TKR-A",
                        y: {{$xitkra}},
                        drilldown: "XI-TKR-A"
                    },
                    {
                        name: "XI-TKR-B",
                        y: {{$xitkrb}},
                        drilldown: "XI-TKR-B"
                    },
                    {
                        name: "XI-TKR-C",
                        y: {{$xitkrc}},
                        drilldown: "XI-TKR-C"
                    },
                    {
                        name: "XII-TKR-A",
                        y: {{$xiitkra}},
                        drilldown: "XII-TKR-A"
                    },
                    {
                        name: "XII-TKR-B",
                        y: {{$xiitkrb}},
                        drilldown: "XII-TKR-B"
                    },
                    {
                        name: "XII-TKR-C",
                        y: {{$xiitkrc}},
                        drilldown: "XII-TKR-C"
                    }
               ]
            }
        ],
        drilldown: {
            series: [
                {
                    name: "X-TKJ-A",
                    id: "X-TKJ-A",
                    data: [
                        [
                            "ORANG TUA LENGKAP",
                            {{$ortu_lengkap_xtkja}}
                        ],
                        [
                            "TANPA IBU",
                            {{$tanpa_ibu_xtkja}}
                        ],
                        [
                            "TANPA AYAH",
                            {{$tanpa_ayah_xtkja}}
                        ],
                        [
                            "TANPA AYAN & IBU",
                            {{$tanpa_ayah_ibu_xtkja}}
                        ],
                        [
                            "RUMAH SENDIRI",
                            {{$rumahsendiri_xtkja}}
                        ],
                        [
                            "RUMAH SEWA",
                            {{$rumahsewa_xtkja}}
                        ],
                        [
                            "KONTRAKAN",
                            {{$kontrakan_xtkja}}
                        ],
                        [
                            "TINGGAL DENGAN SAUDARA",
                            {{$rumahsaudara_xtkja}}
                        ],
                        [
                            "KARYAWAN SWASTA",
                            {{$karyawanswasta_xtkja}}
                        ],
                        [
                            "PEGAWAI NEGERI",
                            {{$pegawainegeri_xtkja}}
                        ],
                        [
                            "PEKERJA TIDAK TETAP",
                            {{$pekerja_tdk_tetap_xtkja}}
                        ],
                        [
                            "USAHA",
                            {{$usaha_xtkja }}
                        ],
                        [
                            "LAMPIRAN SK TIDAK MAMPU",
                            {{$ada_sk_xtkja }}
                        ],
                        [
                            "TIDAK ADA SK TIDAK MAMPU",
                            {{$tdk_ada_sk_xtkja }}
                        ],
                       
                    ]
                },
                {
                    name: "X-TKJ-B",
                    id: "X-TKJ-B",
                    data: [
                        [
                            "ORANG TUA LENGKAP",
                            {{$ortu_lengkap_xtkjb}}
                        ],
                        [
                            "TANPA IBU",
                            {{$tanpa_ibu_xtkjb}}
                        ],
                        [
                            "TANPA AYAH",
                            {{$tanpa_ayah_xtkjb}}
                        ],
                        [
                            "TANPA AYAN & IBU",
                            {{$tanpa_ayah_ibu_xtkjb}}
                        ],
                        [
                            "RUMAH SENDIRI",
                            {{$rumahsendiri_xtkjb}}
                        ],
                        [
                            "RUMAH SEWA",
                            {{$rumahsewa_xtkjb}}
                        ],
                        [
                            "KONTRAKAN",
                            {{$kontrakan_xtkjb}}
                        ],
                        [
                            "TINGGAL DENGAN SAUDARA",
                            {{$rumahsaudara_xtkjb}}
                        ],
                        [
                            "KARYAWAN SWASTA",
                            {{$karyawanswasta_xtkjb}}
                        ],
                        [
                            "PEGAWAI NEGERI",
                            {{$pegawainegeri_xtkjb}}
                        ],
                        [
                            "PEKERJA TIDAK TETAP",
                            {{$pekerja_tdk_tetap_xtkjb}}
                        ],
                        [
                            "USAHA",
                            {{$usaha_xtkjb }}
                        ],
                        [
                            "LAMPIRAN SK TIDAK MAMPU",
                            {{$ada_sk_xtkjb }}
                        ],
                        [
                            "TIDAK ADA SK TIDAK MAMPU",
                            {{$tdk_ada_sk_xtkjb }}
                        ],
                    ]
                },
                {
                    name: "X-TKJ-C",
                    id: "X-TKJ-C",
                    data: [
                        [
                            "ORANG TUA LENGKAP",
                            {{$ortu_lengkap_xtkjc}}
                        ],
                        [
                            "TANPA IBU",
                            {{$tanpa_ibu_xtkjc}}
                        ],
                        [
                            "TANPA AYAH",
                            {{$tanpa_ayah_xtkjc}}
                        ],
                        [
                            "TANPA AYAN & IBU",
                            {{$tanpa_ayah_ibu_xtkjc}}
                        ],
                        [
                            "RUMAH SENDIRI",
                            {{$rumahsendiri_xtkjc}}
                        ],
                        [
                            "RUMAH SEWA",
                            {{$rumahsewa_xtkjc}}
                        ],
                        [
                            "KONTRAKAN",
                            {{$kontrakan_xtkjc}}
                        ],
                        [
                            "TINGGAL DENGAN SAUDARA",
                            {{$rumahsaudara_xtkjc}}
                        ],
                        [
                            "KARYAWAN SWASTA",
                            {{$karyawanswasta_xtkjc}}
                        ],
                        [
                            "PEGAWAI NEGERI",
                            {{$pegawainegeri_xtkjc}}
                        ],
                        [
                            "PEKERJA TIDAK TETAP",
                            {{$pekerja_tdk_tetap_xtkjc}}
                        ],
                        [
                            "USAHA",
                            {{$usaha_xtkjc }}
                        ],
                        [
                            "LAMPIRAN SK TIDAK MAMPU",
                            {{$ada_sk_xtkjc }}
                        ],
                        [
                            "TIDAK ADA SK TIDAK MAMPU",
                            {{$tdk_ada_sk_xtkjc }}
                        ],
                    ]
                },
                {
                    name: "X-TKJ-D",
                    id: "X-TKJ-D",
                    data: [
                        [
                            "ORANG TUA LENGKAP",
                            {{$ortu_lengkap_xtkjd}}
                        ],
                        [
                            "TANPA IBU",
                            {{$tanpa_ibu_xtkjd}}
                        ],
                        [
                            "TANPA AYAH",
                            {{$tanpa_ayah_xtkjd}}
                        ],
                        [
                            "TANPA AYAN & IBU",
                            {{$tanpa_ayah_ibu_xtkjd}}
                        ],
                        [
                            "RUMAH SENDIRI",
                            {{$rumahsendiri_xtkjd}}
                        ],
                        [
                            "RUMAH SEWA",
                            {{$rumahsewa_xtkjd}}
                        ],
                        [
                            "KONTRAKAN",
                            {{$kontrakan_xtkjd}}
                        ],
                        [
                            "TINGGAL DENGAN SAUDARA",
                            {{$rumahsaudara_xtkjd}}
                        ],
                        [
                            "KARYAWAN SWASTA",
                            {{$karyawanswasta_xtkjd}}
                        ],
                        [
                            "PEGAWAI NEGERI",
                            {{$pegawainegeri_xtkjc}}
                        ],
                        [
                            "PEKERJA TIDAK TETAP",
                            {{$pekerja_tdk_tetap_xtkjd}}
                        ],
                        [
                            "USAHA",
                            {{$usaha_xtkjd }}
                        ],
                        [
                            "LAMPIRAN SK TIDAK MAMPU",
                            {{$ada_sk_xtkjd }}
                        ],
                        [
                            "TIDAK ADA SK TIDAK MAMPU",
                            {{$tdk_ada_sk_xtkjd }}
                        ],
                    ]
                },
                {
                    name: "XI-TKJ-A",
                    id: "XI-TKJ-A",
                    data: [
                        [
                            "ORANG TUA LENGKAP",
                            {{$ortu_lengkap_xitkja}}
                        ],
                        [
                            "TANPA IBU",
                            {{$tanpa_ibu_xitkja}}
                        ],
                        [
                            "TANPA AYAH",
                            {{$tanpa_ayah_xitkja}}
                        ],
                        [
                            "TANPA AYAN & IBU",
                            {{$tanpa_ayah_ibu_xitkja}}
                        ],
                        [
                            "RUMAH SENDIRI",
                            {{$rumahsendiri_xitkja}}
                        ],
                        [
                            "RUMAH SEWA",
                            {{$rumahsewa_xitkja}}
                        ],
                        [
                            "KONTRAKAN",
                            {{$kontrakan_xitkja}}
                        ],
                        [
                            "TINGGAL DENGAN SAUDARA",
                            {{$rumahsaudara_xitkja}}
                        ],
                        [
                            "KARYAWAN SWASTA",
                            {{$karyawanswasta_xitkja}}
                        ],
                        [
                            "PEGAWAI NEGERI",
                            {{$pegawainegeri_xitkja}}
                        ],
                        [
                            "PEKERJA TIDAK TETAP",
                            {{$pekerja_tdk_tetap_xitkja}}
                        ],
                        [
                            "USAHA",
                            {{$usaha_xitkja }}
                        ],
                        [
                            "LAMPIRAN SK TIDAK MAMPU",
                            {{$ada_sk_xitkja }}
                        ],
                        [
                            "TIDAK ADA SK TIDAK MAMPU",
                            {{$tdk_ada_sk_xitkja }}
                        ],
                       
                    ]
                },
                {
                    name: "XI-TKJ-B",
                    id: "XI-TKJ-B",
                    data: [
                        [
                            "ORANG TUA LENGKAP",
                            {{$ortu_lengkap_xitkjb}}
                        ],
                        [
                            "TANPA IBU",
                            {{$tanpa_ibu_xitkjb}}
                        ],
                        [
                            "TANPA AYAH",
                            {{$tanpa_ayah_xitkjb}}
                        ],
                        [
                            "TANPA AYAN & IBU",
                            {{$tanpa_ayah_ibu_xitkjb}}
                        ],
                        [
                            "RUMAH SENDIRI",
                            {{$rumahsendiri_xitkjb}}
                        ],
                        [
                            "RUMAH SEWA",
                            {{$rumahsewa_xitkjb}}
                        ],
                        [
                            "KONTRAKAN",
                            {{$kontrakan_xitkjb}}
                        ],
                        [
                            "TINGGAL DENGAN SAUDARA",
                            {{$rumahsaudara_xitkjb}}
                        ],
                        [
                            "KARYAWAN SWASTA",
                            {{$karyawanswasta_xitkjb}}
                        ],
                        [
                            "PEGAWAI NEGERI",
                            {{$pegawainegeri_xitkjb}}
                        ],
                        [
                            "PEKERJA TIDAK TETAP",
                            {{$pekerja_tdk_tetap_xitkjb}}
                        ],
                        [
                            "USAHA",
                            {{$usaha_xitkjb }}
                        ],
                        [
                            "LAMPIRAN SK TIDAK MAMPU",
                            {{$ada_sk_xitkjb }}
                        ],
                        [
                            "TIDAK ADA SK TIDAK MAMPU",
                            {{$tdk_ada_sk_xitkjb }}
                        ],
                       
                    ]
                },
                {
                    name: "XI-TKJ-C",
                    id: "XI-TKJ-C",
                    data: [
                        [
                            "ORANG TUA LENGKAP",
                            {{$ortu_lengkap_xitkjc}}
                        ],
                        [
                            "TANPA IBU",
                            {{$tanpa_ibu_xitkjc}}
                        ],
                        [
                            "TANPA AYAH",
                            {{$tanpa_ayah_xitkjc}}
                        ],
                        [
                            "TANPA AYAN & IBU",
                            {{$tanpa_ayah_ibu_xitkjc}}
                        ],
                        [
                            "RUMAH SENDIRI",
                            {{$rumahsendiri_xitkjc}}
                        ],
                        [
                            "RUMAH SEWA",
                            {{$rumahsewa_xitkjc}}
                        ],
                        [
                            "KONTRAKAN",
                            {{$kontrakan_xitkjc}}
                        ],
                        [
                            "TINGGAL DENGAN SAUDARA",
                            {{$rumahsaudara_xitkjc}}
                        ],
                        [
                            "KARYAWAN SWASTA",
                            {{$karyawanswasta_xitkjc}}
                        ],
                        [
                            "PEGAWAI NEGERI",
                            {{$pegawainegeri_xitkjc}}
                        ],
                        [
                            "PEKERJA TIDAK TETAP",
                            {{$pekerja_tdk_tetap_xitkjc}}
                        ],
                        [
                            "USAHA",
                            {{$usaha_xitkjc }}
                        ],
                        [
                            "LAMPIRAN SK TIDAK MAMPU",
                            {{$ada_sk_xitkjc }}
                        ],
                        [
                            "TIDAK ADA SK TIDAK MAMPU",
                            {{$tdk_ada_sk_xitkjc }}
                        ],
                       
                    ]
                },
                {
                    name: "XII-TKJ-A",
                    id: "XII-TKJ-A",
                    data: [
                        [
                            "ORANG TUA LENGKAP",
                            {{$ortu_lengkap_xiitkja}}
                        ],
                        [
                            "TANPA IBU",
                            {{$tanpa_ibu_xiitkja}}
                        ],
                        [
                            "TANPA AYAH",
                            {{$tanpa_ayah_xiitkja}}
                        ],
                        [
                            "TANPA AYAN & IBU",
                            {{$tanpa_ayah_ibu_xiitkja}}
                        ],
                        [
                            "RUMAH SENDIRI",
                            {{$rumahsendiri_xiitkja}}
                        ],
                        [
                            "RUMAH SEWA",
                            {{$rumahsewa_xiitkja}}
                        ],
                        [
                            "KONTRAKAN",
                            {{$kontrakan_xiitkja}}
                        ],
                        [
                            "TINGGAL DENGAN SAUDARA",
                            {{$rumahsaudara_xiitkja}}
                        ],
                        [
                            "KARYAWAN SWASTA",
                            {{$karyawanswasta_xiitkja}}
                        ],
                        [
                            "PEGAWAI NEGERI",
                            {{$pegawainegeri_xiitkja}}
                        ],
                        [
                            "PEKERJA TIDAK TETAP",
                            {{$pekerja_tdk_tetap_xiitkja}}
                        ],
                        [
                            "USAHA",
                            {{$usaha_xiitkja }}
                        ],
                        [
                            "LAMPIRAN SK TIDAK MAMPU",
                            {{$ada_sk_xiitkja }}
                        ],
                        [
                            "TIDAK ADA SK TIDAK MAMPU",
                            {{$tdk_ada_sk_xiitkja }}
                        ],
                       
                    ]
                },
                {
                    name: "XII-TKJ-B",
                    id: "XII-TKJ-B",
                    data: [
                        [
                            "ORANG TUA LENGKAP",
                            {{$ortu_lengkap_xiitkjb}}
                        ],
                        [
                            "TANPA IBU",
                            {{$tanpa_ibu_xiitkjb}}
                        ],
                        [
                            "TANPA AYAH",
                            {{$tanpa_ayah_xiitkjb}}
                        ],
                        [
                            "TANPA AYAN & IBU",
                            {{$tanpa_ayah_ibu_xiitkjb}}
                        ],
                        [
                            "RUMAH SENDIRI",
                            {{$rumahsendiri_xiitkjb}}
                        ],
                        [
                            "RUMAH SEWA",
                            {{$rumahsewa_xiitkjb}}
                        ],
                        [
                            "KONTRAKAN",
                            {{$kontrakan_xiitkjb}}
                        ],
                        [
                            "TINGGAL DENGAN SAUDARA",
                            {{$rumahsaudara_xiitkjb}}
                        ],
                        [
                            "KARYAWAN SWASTA",
                            {{$karyawanswasta_xiitkjb}}
                        ],
                        [
                            "PEGAWAI NEGERI",
                            {{$pegawainegeri_xiitkjb}}
                        ],
                        [
                            "PEKERJA TIDAK TETAP",
                            {{$pekerja_tdk_tetap_xiitkjb}}
                        ],
                        [
                            "USAHA",
                            {{$usaha_xiitkjb }}
                        ],
                        [
                            "LAMPIRAN SK TIDAK MAMPU",
                            {{$ada_sk_xiitkjb }}
                        ],
                        [
                            "TIDAK ADA SK TIDAK MAMPU",
                            {{$tdk_ada_sk_xiitkjb }}
                        ],
                       
                    ]
                },
                {
                    name: "XII-TKJ-C",
                    id: "XII-TKJ-C",
                    data: [
                        [
                            "ORANG TUA LENGKAP",
                            {{$ortu_lengkap_xiitkjc}}
                        ],
                        [
                            "TANPA IBU",
                            {{$tanpa_ibu_xiitkjc}}
                        ],
                        [
                            "TANPA AYAH",
                            {{$tanpa_ayah_xiitkjc}}
                        ],
                        [
                            "TANPA AYAN & IBU",
                            {{$tanpa_ayah_ibu_xiitkjc}}
                        ],
                        [
                            "RUMAH SENDIRI",
                            {{$rumahsendiri_xiitkjc}}
                        ],
                        [
                            "RUMAH SEWA",
                            {{$rumahsewa_xiitkjc}}
                        ],
                        [
                            "KONTRAKAN",
                            {{$kontrakan_xiitkjc}}
                        ],
                        [
                            "TINGGAL DENGAN SAUDARA",
                            {{$rumahsaudara_xiitkjc}}
                        ],
                        [
                            "KARYAWAN SWASTA",
                            {{$karyawanswasta_xiitkjc}}
                        ],
                        [
                            "PEGAWAI NEGERI",
                            {{$pegawainegeri_xiitkjc}}
                        ],
                        [
                            "PEKERJA TIDAK TETAP",
                            {{$pekerja_tdk_tetap_xiitkjc}}
                        ],
                        [
                            "USAHA",
                            {{$usaha_xiitkjc }}
                        ],
                        [
                            "LAMPIRAN SK TIDAK MAMPU",
                            {{$ada_sk_xiitkjc }}
                        ],
                        [
                            "TIDAK ADA SK TIDAK MAMPU",
                            {{$tdk_ada_sk_xiitkjc }}
                        ],
                       
                    ]
                },
                {
                    name: "X-TKR-A",
                    id: "X-TKR-A",
                    data: [
                        [
                            "ORANG TUA LENGKAP",
                            {{$ortu_lengkap_xtkra}}
                        ],
                        [
                            "TANPA IBU",
                            {{$tanpa_ibu_xtkra}}
                        ],
                        [
                            "TANPA AYAH",
                            {{$tanpa_ayah_xtkra}}
                        ],
                        [
                            "TANPA AYAN & IBU",
                            {{$tanpa_ayah_ibu_xtkra}}
                        ],
                        [
                            "RUMAH SENDIRI",
                            {{$rumahsendiri_xtkra}}
                        ],
                        [
                            "RUMAH SEWA",
                            {{$rumahsewa_xtkra}}
                        ],
                        [
                            "KONTRAKAN",
                            {{$kontrakan_xtkra}}
                        ],
                        [
                            "TINGGAL DENGAN SAUDARA",
                            {{$rumahsaudara_xtkra}}
                        ],
                        [
                            "KARYAWAN SWASTA",
                            {{$karyawanswasta_xtkra}}
                        ],
                        [
                            "PEGAWAI NEGERI",
                            {{$pegawainegeri_xtkra}}
                        ],
                        [
                            "PEKERJA TIDAK TETAP",
                            {{$pekerja_tdk_tetap_xtkra}}
                        ],
                        [
                            "USAHA",
                            {{$usaha_xtkra }}
                        ],
                        [
                            "LAMPIRAN SK TIDAK MAMPU",
                            {{$ada_sk_xtkra }}
                        ],
                        [
                            "TIDAK ADA SK TIDAK MAMPU",
                            {{$tdk_ada_sk_xtkra }}
                        ],
                    ]
                },
                {
                    name: "X-TKR-B",
                    id: "X-TKR-B",
                    data: [
                        [
                            "ORANG TUA LENGKAP",
                            {{$ortu_lengkap_xtkrb}}
                        ],
                        [
                            "TANPA IBU",
                            {{$tanpa_ibu_xtkrb}}
                        ],
                        [
                            "TANPA AYAH",
                            {{$tanpa_ayah_xtkrb}}
                        ],
                        [
                            "TANPA AYAN & IBU",
                            {{$tanpa_ayah_ibu_xtkrb}}
                        ],
                        [
                            "RUMAH SENDIRI",
                            {{$rumahsendiri_xtkrb}}
                        ],
                        [
                            "RUMAH SEWA",
                            {{$rumahsewa_xtkrb}}
                        ],
                        [
                            "KONTRAKAN",
                            {{$kontrakan_xtkrb}}
                        ],
                        [
                            "TINGGAL DENGAN SAUDARA",
                            {{$rumahsaudara_xtkrb}}
                        ],
                        [
                            "KARYAWAN SWASTA",
                            {{$karyawanswasta_xtkrb}}
                        ],
                        [
                            "PEGAWAI NEGERI",
                            {{$pegawainegeri_xtkrb}}
                        ],
                        [
                            "PEKERJA TIDAK TETAP",
                            {{$pekerja_tdk_tetap_xtkrb}}
                        ],
                        [
                            "USAHA",
                            {{$usaha_xtkrb }}
                        ],
                        [
                            "LAMPIRAN SK TIDAK MAMPU",
                            {{$ada_sk_xtkrb }}
                        ],
                        [
                            "TIDAK ADA SK TIDAK MAMPU",
                            {{$tdk_ada_sk_xtkrb }}
                        ],
                    ]
                },
                {
                    name: "X-TKR-C",
                    id: "X-TKR-C",
                    data: [
                        [
                            "ORANG TUA LENGKAP",
                            {{$ortu_lengkap_xtkrc}}
                        ],
                        [
                            "TANPA IBU",
                            {{$tanpa_ibu_xtkrc}}
                        ],
                        [
                            "TANPA AYAH",
                            {{$tanpa_ayah_xtkrc}}
                        ],
                        [
                            "TANPA AYAN & IBU",
                            {{$tanpa_ayah_ibu_xtkrc}}
                        ],
                        [
                            "RUMAH SENDIRI",
                            {{$rumahsendiri_xtkrc}}
                        ],
                        [
                            "RUMAH SEWA",
                            {{$rumahsewa_xtkrc}}
                        ],
                        [
                            "KONTRAKAN",
                            {{$kontrakan_xtkrc}}
                        ],
                        [
                            "TINGGAL DENGAN SAUDARA",
                            {{$rumahsaudara_xtkrc}}
                        ],
                        [
                            "KARYAWAN SWASTA",
                            {{$karyawanswasta_xtkrc}}
                        ],
                        [
                            "PEGAWAI NEGERI",
                            {{$pegawainegeri_xtkrc}}
                        ],
                        [
                            "PEKERJA TIDAK TETAP",
                            {{$pekerja_tdk_tetap_xtkrc}}
                        ],
                        [
                            "USAHA",
                            {{$usaha_xtkrc }}
                        ],
                        [
                            "LAMPIRAN SK TIDAK MAMPU",
                            {{$ada_sk_xtkrc }}
                        ],
                        [
                            "TIDAK ADA SK TIDAK MAMPU",
                            {{$tdk_ada_sk_xtkrc }}
                        ],
                    ]
                },
                {
                    name: "XI-TKR-A",
                    id: "XI-TKR-A",
                    data: [
                        [
                            "ORANG TUA LENGKAP",
                            {{$ortu_lengkap_xitkra}}
                        ],
                        [
                            "TANPA IBU",
                            {{$tanpa_ibu_xitkra}}
                        ],
                        [
                            "TANPA AYAH",
                            {{$tanpa_ayah_xitkra}}
                        ],
                        [
                            "TANPA AYAN & IBU",
                            {{$tanpa_ayah_ibu_xitkra}}
                        ],
                        [
                            "RUMAH SENDIRI",
                            {{$rumahsendiri_xitkra}}
                        ],
                        [
                            "RUMAH SEWA",
                            {{$rumahsewa_xitkra}}
                        ],
                        [
                            "KONTRAKAN",
                            {{$kontrakan_xitkra}}
                        ],
                        [
                            "TINGGAL DENGAN SAUDARA",
                            {{$rumahsaudara_xitkra}}
                        ],
                        [
                            "KARYAWAN SWASTA",
                            {{$karyawanswasta_xitkra}}
                        ],
                        [
                            "PEGAWAI NEGERI",
                            {{$pegawainegeri_xitkra}}
                        ],
                        [
                            "PEKERJA TIDAK TETAP",
                            {{$pekerja_tdk_tetap_xitkra}}
                        ],
                        [
                            "USAHA",
                            {{$usaha_xitkra }}
                        ],
                        [
                            "LAMPIRAN SK TIDAK MAMPU",
                            {{$ada_sk_xitkra }}
                        ],
                        [
                            "TIDAK ADA SK TIDAK MAMPU",
                            {{$tdk_ada_sk_xitkra }}
                        ],
                    ]
                },
                {
                    name: "XI-TKR-B",
                    id: "XI-TKR-B",
                    data: [
                        [
                            "ORANG TUA LENGKAP",
                            {{$ortu_lengkap_xitkrb}}
                        ],
                        [
                            "TANPA IBU",
                            {{$tanpa_ibu_xitkrb}}
                        ],
                        [
                            "TANPA AYAH",
                            {{$tanpa_ayah_xitkrb}}
                        ],
                        [
                            "TANPA AYAN & IBU",
                            {{$tanpa_ayah_ibu_xitkrb}}
                        ],
                        [
                            "RUMAH SENDIRI",
                            {{$rumahsendiri_xitkrb}}
                        ],
                        [
                            "RUMAH SEWA",
                            {{$rumahsewa_xitkrb}}
                        ],
                        [
                            "KONTRAKAN",
                            {{$kontrakan_xitkrb}}
                        ],
                        [
                            "TINGGAL DENGAN SAUDARA",
                            {{$rumahsaudara_xitkrb}}
                        ],
                        [
                            "KARYAWAN SWASTA",
                            {{$karyawanswasta_xitkrb}}
                        ],
                        [
                            "PEGAWAI NEGERI",
                            {{$pegawainegeri_xitkrb}}
                        ],
                        [
                            "PEKERJA TIDAK TETAP",
                            {{$pekerja_tdk_tetap_xitkrb}}
                        ],
                        [
                            "USAHA",
                            {{$usaha_xitkrb }}
                        ],
                        [
                            "LAMPIRAN SK TIDAK MAMPU",
                            {{$ada_sk_xitkrb }}
                        ],
                        [
                            "TIDAK ADA SK TIDAK MAMPU",
                            {{$tdk_ada_sk_xitkrb }}
                        ],
                    ]
                },
                {
                    name: "XI-TKR-C",
                    id: "XI-TKR-C",
                    data: [
                        [
                            "ORANG TUA LENGKAP",
                            {{$ortu_lengkap_xitkrc}}
                        ],
                        [
                            "TANPA IBU",
                            {{$tanpa_ibu_xitkrc}}
                        ],
                        [
                            "TANPA AYAH",
                            {{$tanpa_ayah_xitkrc}}
                        ],
                        [
                            "TANPA AYAN & IBU",
                            {{$tanpa_ayah_ibu_xitkrc}}
                        ],
                        [
                            "RUMAH SENDIRI",
                            {{$rumahsendiri_xitkrc}}
                        ],
                        [
                            "RUMAH SEWA",
                            {{$rumahsewa_xitkrc}}
                        ],
                        [
                            "KONTRAKAN",
                            {{$kontrakan_xitkrc}}
                        ],
                        [
                            "TINGGAL DENGAN SAUDARA",
                            {{$rumahsaudara_xitkrc}}
                        ],
                        [
                            "KARYAWAN SWASTA",
                            {{$karyawanswasta_xitkrc}}
                        ],
                        [
                            "PEGAWAI NEGERI",
                            {{$pegawainegeri_xitkrc}}
                        ],
                        [
                            "PEKERJA TIDAK TETAP",
                            {{$pekerja_tdk_tetap_xitkrc}}
                        ],
                        [
                            "USAHA",
                            {{$usaha_xitkrc }}
                        ],
                        [
                            "LAMPIRAN SK TIDAK MAMPU",
                            {{$ada_sk_xitkrc }}
                        ],
                        [
                            "TIDAK ADA SK TIDAK MAMPU",
                            {{$tdk_ada_sk_xitkrc }}
                        ],
                    ]
                },
                {
                    name: "XII-TKR-A",
                    id: "XII-TKR-A",
                    data: [
                        [
                            "ORANG TUA LENGKAP",
                            {{$ortu_lengkap_xiitkra}}
                        ],
                        [
                            "TANPA IBU",
                            {{$tanpa_ibu_xiitkra}}
                        ],
                        [
                            "TANPA AYAH",
                            {{$tanpa_ayah_xiitkra}}
                        ],
                        [
                            "TANPA AYAN & IBU",
                            {{$tanpa_ayah_ibu_xiitkra}}
                        ],
                        [
                            "RUMAH SENDIRI",
                            {{$rumahsendiri_xiitkra}}
                        ],
                        [
                            "RUMAH SEWA",
                            {{$rumahsewa_xiitkra}}
                        ],
                        [
                            "KONTRAKAN",
                            {{$kontrakan_xiitkra}}
                        ],
                        [
                            "TINGGAL DENGAN SAUDARA",
                            {{$rumahsaudara_xiitkra}}
                        ],
                        [
                            "KARYAWAN SWASTA",
                            {{$karyawanswasta_xiitkra}}
                        ],
                        [
                            "PEGAWAI NEGERI",
                            {{$pegawainegeri_xiitkra}}
                        ],
                        [
                            "PEKERJA TIDAK TETAP",
                            {{$pekerja_tdk_tetap_xiitkra}}
                        ],
                        [
                            "USAHA",
                            {{$usaha_xiitkra }}
                        ],
                        [
                            "LAMPIRAN SK TIDAK MAMPU",
                            {{$ada_sk_xiitkra }}
                        ],
                        [
                            "TIDAK ADA SK TIDAK MAMPU",
                            {{$tdk_ada_sk_xiitkra }}
                        ],
                    ]
                },
                {
                    name: "XII-TKR-B",
                    id: "XII-TKR-B",
                    data: [
                        [
                            "ORANG TUA LENGKAP",
                            {{$ortu_lengkap_xiitkrb}}
                        ],
                        [
                            "TANPA IBU",
                            {{$tanpa_ibu_xiitkrb}}
                        ],
                        [
                            "TANPA AYAH",
                            {{$tanpa_ayah_xiitkrb}}
                        ],
                        [
                            "TANPA AYAN & IBU",
                            {{$tanpa_ayah_ibu_xiitkrb}}
                        ],
                        [
                            "RUMAH SENDIRI",
                            {{$rumahsendiri_xiitkrb}}
                        ],
                        [
                            "RUMAH SEWA",
                            {{$rumahsewa_xiitkrb}}
                        ],
                        [
                            "KONTRAKAN",
                            {{$kontrakan_xiitkrb}}
                        ],
                        [
                            "TINGGAL DENGAN SAUDARA",
                            {{$rumahsaudara_xiitkrb}}
                        ],
                        [
                            "KARYAWAN SWASTA",
                            {{$karyawanswasta_xiitkrb}}
                        ],
                        [
                            "PEGAWAI NEGERI",
                            {{$pegawainegeri_xiitkrb}}
                        ],
                        [
                            "PEKERJA TIDAK TETAP",
                            {{$pekerja_tdk_tetap_xiitkrb}}
                        ],
                        [
                            "USAHA",
                            {{$usaha_xiitkrb }}
                        ],
                        [
                            "LAMPIRAN SK TIDAK MAMPU",
                            {{$ada_sk_xiitkrb }}
                        ],
                        [
                            "TIDAK ADA SK TIDAK MAMPU",
                            {{$tdk_ada_sk_xiitkrb }}
                        ],
                    ]
                },
                {
                    name: "XII-TKR-C",
                    id: "XII-TKR-C",
                    data: [
                        [
                            "ORANG TUA LENGKAP",
                            {{$ortu_lengkap_xiitkrc}}
                        ],
                        [
                            "TANPA IBU",
                            {{$tanpa_ibu_xiitkrc}}
                        ],
                        [
                            "TANPA AYAH",
                            {{$tanpa_ayah_xiitkrc}}
                        ],
                        [
                            "TANPA AYAN & IBU",
                            {{$tanpa_ayah_ibu_xiitkrc}}
                        ],
                        [
                            "RUMAH SENDIRI",
                            {{$rumahsendiri_xiitkrc}}
                        ],
                        [
                            "RUMAH SEWA",
                            {{$rumahsewa_xiitkrc}}
                        ],
                        [
                            "KONTRAKAN",
                            {{$kontrakan_xiitkrc}}
                        ],
                        [
                            "TINGGAL DENGAN SAUDARA",
                            {{$rumahsaudara_xiitkrc}}
                        ],
                        [
                            "KARYAWAN SWASTA",
                            {{$karyawanswasta_xiitkrc}}
                        ],
                        [
                            "PEGAWAI NEGERI",
                            {{$pegawainegeri_xiitkrc}}
                        ],
                        [
                            "PEKERJA TIDAK TETAP",
                            {{$pekerja_tdk_tetap_xiitkrc}}
                        ],
                        [
                            "USAHA",
                            {{$usaha_xiitkrc }}
                        ],
                        [
                            "LAMPIRAN SK TIDAK MAMPU",
                            {{$ada_sk_xiitkrc }}
                        ],
                        [
                            "TIDAK ADA SK TIDAK MAMPU",
                            {{$tdk_ada_sk_xiitkrc }}
                        ],
                    ]
                }
            ]
        }
    });
    
    </script>
                    
    
@endsection