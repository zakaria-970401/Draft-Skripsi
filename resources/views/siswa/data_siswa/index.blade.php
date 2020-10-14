@extends('layout/mastersiswa')

@section('judul', 'Halaman Data Siswa')

@section('konten')
<div class="breadcrumbs ace-save-state" id="breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="#">Home</a>
        </li>
        <li>
            <i class="ace-icon fa fa-users home-icon"></i>
            <a href="#">Data Siswa</a>
        </li>
    </ul><!-- /.breadcrumb -->
</div>
<div class="page-content">
    <div class="row">
        <div class="col-xs-12">
            <h4 class="header blue bolder ">DATA SISWA-SISWI SMK KARYA GUNA JAYA</h4>
            <table id="myTable" class="display">
                    <thead>
                        <tr>
                            <th class="text-center">No.</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">NISN</th>
                            <th class="text-center">Jurusan</th>
                            <th class="text-center">Kelas</th>
                            <th class="text-center">Foto</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data_siswa as $data)    
                        <tr>
                            <td class="text-center">{{$loop->iteration}}</td>
                            <td class="text-center">{{$data->nama_siswa}}</td>
                            <td class="text-center">{{$data->nisn}}</td>
                            <td class="text-center">
                                @if($data->id_jurusan == 1)
                                Teknik Komputer Dan Jaringan
                                @else
                                Teknik Kendaraan Ringan
                                @endif
                            </td>
                            <td class="text-center">
                            @if($data->id_kelas == 'K01')
                            X-TKJ-A
                            @elseif($data->id_kelas == 'K02')
                            X-TKJ-B
                            @elseif($data->id_kelas == 'K03')
                            X-TKJ-C
                            @elseif($data->id_kelas == 'K04')
                            X-TKJ-D
                            @elseif($data->id_kelas == 'K05')
                            XI-TKJ-A
                            @elseif($data->id_kelas == 'K06')
                            XI-TKJ-B
                            @elseif($data->id_kelas == 'K07')
                            XI-TKJ-C
                            @elseif($data->id_kelas == 'K08')
                            XII-TKJ-A
                            @elseif($data->id_kelas == 'K09')
                            XII-TKJ-B
                            @elseif($data->id_kelas == 'K10')
                            XII-TKJ-C
                            @elseif($data->id_kelas == 'K11')
                            X-TKR-A
                            @elseif($data->id_kelas == 'K12')
                            X-TKR-B
                            @elseif($data->id_kelas == 'K13')
                            X-TKR-C
                            @elseif($data->id_kelas == 'K14')
                            XI-TKR-A
                            @elseif($data->id_kelas == 'K15')
                            XI-TKR-B
                            @elseif($data->id_kelas == 'K16')
                            XI-TKR-C
                            @elseif($data->id_kelas == 'K17')
                            XII-TKR-A
                            @elseif($data->id_kelas == 'K18')
                            XII-TKR-B
                            @elseif($data->id_kelas == 'K19')
                            XII-TKR-C
                            @endif
                            </td>
                            <td class="text-center">
                            <center><img class="img-responsive" alt="Belum Ada Foto" id="avatar2" src="{{asset('fotosiswa/'.$data->foto)}}" style="width: 78px"/>
                                </td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>  
        </div>
    </div>
    
@endsection