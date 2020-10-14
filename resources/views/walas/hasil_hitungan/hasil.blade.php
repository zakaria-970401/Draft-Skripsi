@extends('layout/masterwalas')

@section('judul', 'Halaman Data Hasil Seleksi Naive')

@section('konten')
<div class="breadcrumbs ace-save-state" id="breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="/walas">Home</a>
        </li>
        <li>
            <i class="ace-icon fa fa-gavel home-icon"></i>
            <a href="/">Hasil Keputusan</a>
        </li>
    </ul><!-- /.breadcrumb -->
</div>

<div class="page-content">
    <div class="row">
        <div class="col-xs-12">
            <h4 class="header blue bolder ">Master Data Hasil Seleksi</h4>
            <table id="myTable" class="display">
                    <thead>                            
                        <tr>
                            <th class="text-center">No.</th>
                            <th class="text-center">Nama Siswa</th>
                            <th class="text-center">Kelas</th>
                            <th class="text-center">Kelengkapan Ortu</th>
                            <th class="text-center">Status Rumah Wali</th>
                            <th class="text-center">Status Pekerjaan Wali</th>
                            <th class="text-center">Status SK Tidak Mampu</th>
                            <th class="text-center">Probabilitas Dapat </th>
                            <th class="text-center">Probabilitas Tidak Dapat </th>
                            <th class="text-center">Keterangan</th>
                            <th class="text-center">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach ($join_tbl as $data)
                            <td class="text-center">{{$loop->iteration}}</td>
                            <td class="text-center">{{$data->nama_siswa}}</td>
                            <td class="text-center">{{$data->kelas}}</td>
                            <td class="text-center">{{$data->status_kelengkapan_ortu}}</td>
                            <td class="text-center">{{$data->status_rumah_ortu}}</td>
                            <td class="text-center">{{$data->status_pekerjaan_wali}}</td>
                            <td class="text-center">{{$data->status_sk_tidakmampu}}</td>
                            <td class="text-center">{{$data->probabilitas_dapat}}</td>
                            <td class="text-center">{{$data->probabilitas_tdkdapat}}</td>
                            <td class="text-center">
                                @if($data->probabilitas_tdkdapat < $data->probabilitas_dapat)
                                <span class="label label-sm label-success">Dapat Bantuan</span>
                                @else
                                <span class="label label-sm label-danger">Tidak Dapat Bantuan</span>
                                @endif
                            </td>
                            <td class="text-center">
                            <a href="/walas/show_hitung_hasil_datatraining/{{$data->id}}" class="btn btn-info btn-sm"><i class="fa fa-eye"> Detail</i></a>
                            </td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>  
        </div>
    </div>
    
@endsection