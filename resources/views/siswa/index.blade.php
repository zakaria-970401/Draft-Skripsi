@extends('layout.mastersiswa')

@section('judul', 'Halaman Utama')

@section('konten')
<div class="main-content-inner">
  <div class="breadcrumbs ace-save-state" id="breadcrumbs">
    <ul class="breadcrumb">
      <li>
        <i class="ace-icon fa fa-home home-icon"></i>
        <a href="#">Home</a>
     </li>
   </ul><!-- /.breadcrumb -->
</div>
    <br>
      <div class="page-header">
        <h1>
        Dashboard Siswa
     </h1>
   </div><!-- /.page-header -->
        <div class="container">
            <div class="row">                       
            <div class="tab-content no-border padding-24">
                <div id="home" class="tab-pane in active">
                    <div class="row">
                        <div class="col-xs-12 col-sm-3 center">
                            @if(Auth::user()->foto == Null)
                            <span class="profile-picture">
                                <img class="editable img-responsive" alt="Silahkan Tambahkan Foto" id="avatar2" src="{{asset('fotosiswa/'.$join_foto->foto)}}" />
                            </span>
                            @else
                            <span class="profile-picture">
                                <img class="editable img-responsive" alt="Silahkan Tambahkan Foto" id="avatar2" src="{{asset('foto_akunsiswa/'.Auth::user()->foto)}}" />
                            </span>
                            @endif
                            <div class="space space-4"></div>
                            <h3 class="text-dark"><b>{{Auth::user()->nama_siswa}}</b></h3>
                        </div><!-- /.col -->                 
                        <div class="col-xs-12 col-sm-9">
                            <div class="alert alert-block alert-success">
                                <button type="button" class="close" data-dismiss="alert">
                                    <i class="ace-icon fa fa-times"></i>
                                </button>
                                <p>
                                    <strong>
                                        <i class="ace-icon fa fa-check"></i>
                                        <h5> Hello, {{Auth::user()->nama_siswa}}..
                                    </strong>
                                    Selamat Datang!</h5>
                                </p>
                            </div>
                            <div class="table-header">
                                History Pendaftaran Bantuan Sosial
                            </div>
                            <table id="myTable" class="display">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th class="text-center">Tanggal Daftar</th>
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">NISN</th>
                                        <th class="text-center">Jurusan</th>
                                        <th class="text-center">Kelas</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Keterangan</th>
                                        <th class="text-center">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($status as $data)
                                        <tr>
                                            <td class="text-center">{{$loop->iteration}}</td>
                                            <td class="text-center">
                                                {{\Carbon\Carbon::parse($data->tgl_daftar)->format('d-M-Y')}}
                                            </td>
                                            <td class="text-center">{{$data->nama_siswa}}</td>
                                            <td class="text-center">{{$data->nisn}}</td>
                                            <td class="text-center">{{$data->jurusan}}</td>
                                            <td class="text-center">{{$data->kelas}}</td>
                                            <td class="text-center">
                                                @if($data->status == '1')
                                                <span class="label label-sm label-primary">Belum Di Proses</span>
                                                @elseif($data->status == '2')
                                                <span class="label label-sm label-warning">Sedang Di Proses</span>
                                                @elseif($data->status == '3')
                                                <span class="label label-sm label-success">Selesai</span>
                                            @else
                                            <span class="label label-sm label-danger">Di Tolak</span>
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
                                            <td class="text-center">
                                            <a href="/siswa/detail_databansos/{{$data->id}}" class="btn btn-info btn-sm"><i class="fa fa-eye"> Detail</i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><!-- /.col -->
            </div><!-- /.row -->






            @endsection