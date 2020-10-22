@extends('layout/mastersiswa')

@section('judul', 'Halaman Hasil Data Bansos')

@section('konten')
<div class="breadcrumbs ace-save-state" id="breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="#">Home</a>
        </li>
        <li>
            <i class="ace-icon fa fa-check-square home-icon"></i>
            <a href="#">Penerima Bansos</a>
        </li>
    </ul><!-- /.breadcrumb -->
</div>
<div class="page-content">
    <div class="row">
        <div class="col-xs-12">
            <h4 class="header blue bolder ">DATA SISWA-SISWI YANG MENERIMA BANSOS</h4>
            <table id="myTable" class="display">
                    <thead>
                        <tr>
                            <th class="text-center">No.</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">NISN</th>
                            <th class="text-center">Jurusan</th>
                            <th class="text-center">Kelas</th>
                            <th class="text-center">Foto</th>
                            <th class="text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($hasil as $data)                                
                        <tr>
                            <td class="text-center">{{$loop->iteration}}</td>
                            <td class="text-center">{{$data->nama_siswa}}</td>
                            <td class="text-center">{{$data->nisn}}</td>
                            <td class="text-center">
                                @if($data->id_jurusan == 1)
                                    TKJ
                                 @else
                                    TKR
                                @endif
                            </td>
                            <td class="text-center">{{$data->kelas}}</td>
                            <td class="text-center">
                                <center><img class="img-responsive" src="{{asset('fotosiswa/'.$data->foto)}}" style="width: 78px" alt="" />
                            </td>
                                <td class="text-center">
                                    <span class="label label-sm label-success">Dapat Bantuan</span>
                                </td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>  
        </div>
    </div>
    
@endsection