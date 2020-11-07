@extends('layout.masterwalas')

@section('judul', 'Halaman Verifikasi Siswa')

@section('konten')
<div class="main-content-inner">
  <div class="breadcrumbs ace-save-state" id="breadcrumbs">
    <ul class="breadcrumb">
      <li>
        <i class="ace-icon fa fa-home home-icon"></i>
            <a href="/walas">Home</a>
         </li>
      <li>
        <i class="ace-icon fa fa-users home-icon"></i>
            <a href="#">Verifikasi Bansos Anak Didik</a>
         </li>
        </ul><!-- /.breadcrumb -->
    </div>
    <br>

                <div class="row">                       
                    <div class="col-xs-12">
                        <div class="table-header">
                            Daftar Verifikasi Bansos Anak Didik
                        </div>
                        <table id="myTable" class="display">
                    <thead>
                        <tr>
                            <th class="text-center">No.</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Kelas</th>
                            <th class="text-center">Kelengkapan Ortu</th>
                            <th class="text-center">Status YatimPiatu</th>
                            <th class="text-center">Status Rumah Ortu</th>
                            <th class="text-center">Status Pekerjaan Ortu</th>
                            <th class="text-center">SK Tidak Mampu</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Keterangan</th>
                            <th class="text-center">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($join_tbl as $data)
                        <tr>
                                <td class="text-center">{{$loop->iteration}}</td>
                                <td class="text-center">{{$data->nama_siswa}}</td>
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
                                    @if($data->status == '1')
                                    <span class="label label-sm label-primary">Belum Proses</span>
                                    @elseif($data->status == '2')
                                    <span class="label label-sm label-warning">Sedang Di Proses</span>
                                    @elseif($data->status == '4')
                                    <span class="label label-sm label-danger">Di tolak</span>
                                    @else
                                    <span class="label label-sm label-success">Selesai</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if($data->keterangan == NULL)
                                    -
                                    @elseif($data->keterangan == 'Dapat Bantuan')
                                    <span class="label label-sm label-success">Dapat Bantuan</span>
                                    @else
                                    <span class="label label-sm label-danger">Tidak Dapat Bantuan</span>
                                    @endif
                                </td>
                                <td class="text-center">@if($data->status == '1')
                                    <a href="/walas/detail_databansos/{{$data->id}}" class="btn btn-success btn-sm"><i class="fa fa-check"> Proses</a></i>
                                    @else     
                                    <a href="/walas/detail_databansos/{{$data->id}}" class="btn btn-info btn-sm"><i class="fa fa-eye"> Detail</a></i>     
                                    @endif
                                </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    



@endsection