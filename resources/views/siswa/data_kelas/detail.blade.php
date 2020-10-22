@extends('layout/mastersiswa')

@section('judul' , 'Halaman Detail Kelas')

@section('konten')

<div class="page-header">
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="/siswa">Home</a>
            </li>
            <li>
                <i class="ace-icon fa fa-university home-icon"></i>
                <a href="/siswa/daftar_kelas">Data Kelas</a>
            </li>
            <li>
                <i class="ace-icon fa fa-eye home-icon"></i>
                <a href="#">Detail Data Kelas</a>
            </li>
        </ul><!-- /.breadcrumb -->
    </div>
<div class="page-content">
<div class="row">
    <div class="col-xs-12">
            <div id="user-profile-1" class="user-profile row">
                <div class="col-xs-12 col-sm-3 center">
                    <div>
                        <br>
                        <br>
                        <span class="profile-picture">
                            <img id="avatar" class="editable img-responsive" alt="Belum Ada Foto" src="{{asset('foto_walas/'.$join_kelas->foto)}}" style="width:500px" />
                        </span>

                        <h3 class="header smaller lighter blue">Informasi Wali Kelas Siswa</h3>
                        <div class="profile-user-info profile-user-info-striped">
                            <div class="profile-info-row">
                                <div class="profile-info-name"> Nama Lengkap </div>
                                <div class="profile-info-value">
                                    <span class="editable" id="username">{{$join_kelas->nama}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="profile-user-info profile-user-info-striped">
                            <div class="profile-info-row">
                                <div class="profile-info-name"> NUPTK </div>
                                <div class="profile-info-value">
                                    <span class="editable" id="username">{{$join_kelas->nuptk}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="profile-user-info profile-user-info-striped">
                            <div class="profile-info-row">
                                <div class="profile-info-name"> Wali Kelas</div>
                                <div class="profile-info-value">
                                    <span class="editable" id="username">{{$join_kelas->kelas}}</span>
                                </div>
                            </div>
                        <div class="space-4"></div>
                     
                    </div>

                    <div class="space-6"></div>

                    <div class="profile-contact-info">
                        <div class="space-6"></div>
                    </div>

                    <div class="hr hr12 dotted"></div>

                    <div class="clearfix">

                    </div>

                    <div class="hr hr16 dotted"></div>
                </div>

                <div class="col-xs-12 col-sm-9">
                    <div class="center">
                        
                    </div>

                    <div class="space-12"></div>
                 
                    <h4 class="header blue bolder ">Data Anak Didik</h4>
                    <table id="myTable" class="display">
                            <thead>
                                
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th class="text-center">Nama Siswa</th>
                                    <th class="text-center">NISN</th>
                                    <th class="text-center">Jurusan</th>
                                    <th class="text-center">Kelas</th>
                                    <th class="text-center">Foto</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($join_loop as $data)
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
                                    <td class="text-center">{{$data->kelas}}</td>
                                    <td class="text-center">
                                        <center><img src="{{ asset('fotosiswa/'.$data->foto)}}" style="width: 78px" alt="">
                                    </td>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
    

@endsection