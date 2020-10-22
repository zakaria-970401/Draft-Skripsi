@extends('layout/masteradmin')

@section('judul' , 'Halaman Edit Walikelas')

@section('konten')

<div class="page-header">
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="/admin">Home</a>
            </li>
            <li>
                <i class="ace-icon fa fa-user home-icon"></i>
                <a href="/admin/daftar_walas">Data Wali Kelas</a>
            </li>
            <li>
                <i class="ace-icon fa fa-pencil home-icon"></i>
                <a href="#">Edit Data Wali Kelas</a>
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
                        <span class="profile-picture">
                            <img id="avatar" class="editable img-responsive" alt="Belum Ada Foto" src="{{asset('foto_walas/'.$walas->foto)}}" />
                        </span>
                        <div class="space-4"></div>
                        <div class="width-80 label label-success label-xlg ">
                            <div class="inline position-relative">
                                <a href="#modal-update" data-toggle="modal" class="user-title-label">
                                    <i class="ace-icon fa fa-pencil light-green"></i>
                                    <span class="white">Edit Data</span>
                                </a>
                            </div>
                        </div>
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

                    <h3 class="header smaller lighter blue">Informasi Wali Kelas Siswa</h3>
                    <div class="profile-user-info profile-user-info-striped">
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Nama Lengkap </div>
                            <div class="profile-info-value">
                                <span class="editable" id="username">{{$walas->nama}}</span>
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
                    </div>

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
                
<!-- Modal DAFTAR BANSOS -->

<div class="modal fade" id="modal-update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
    <div class="modal-header">
        <center><h3 class="header smaller lighter blue">Edit Akun Walikelas</h3>
    <div class="modal-body">
                <!-- PAGE CONTENT BEGINS -->
                <form action="/admin/edit_walas/{{$walas->id}}" class="form-horizontal" method="POST" enctype="multipart/form-data">
                    @method('PATCH')
                    {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-3 control-label no-padding-right" for="form-field-1-1"> Nama </label>
                            <div class="col-sm-9">
                            <input type="text" id="form-field-1-1" placeholder="Silahkan di isi" class="form-control" name="nama" required value="{{$walas->nama}}"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label no-padding-right" for="form-field-1-1"> NUPTK </label>
                            <div class="col-sm-9">
                            <input type="text" id="form-field-1-1" placeholder="Silahkan di isi" class="form-control" name="nuptk" required value="{{$walas->nuptk}}"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Wali Kelas : </label>
                            <div class="col-sm-9">
                                    <select class="form-control my_select" id="" name="id_kelas">
                                        <option value="{{$join_kelas->kelas}}">{{$join_kelas->kelas}}</option>
                                        <option>--Silahkan Pilih--</option>
                                        @foreach ($loopkelas as $kls)
                                        <option value="{{$kls->id_kelas}}">{{$kls->kelas}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> E-mail :</label>
                            <div class="col-sm-9">
                            <input type="email" id="form-field-1-1" placeholder="Silahkan di isi" class="form-control" name="email" value="{{$walas->email}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Password :</label>
                            <div class="col-sm-9">
                            <input type="text" id="form-field-1-1" placeholder="Silahkan di isi" class="form-control" name="password" value="{{$walas->password}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Foto Walikelas : </label>
                            <div class="col-sm-3">
                            <img src="{{asset('foto_walas/'.$walas->foto)}}" alt="Belum Ada Foto" readonly style="width:100px"/>
                        </div>
                        <input type="file" id="form-field-1-1" placeholder="Silahkan di isi" class="form-control" name="foto">
                        </div>
                     </div>
                     </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-success"><i class="fa fa-save"> Simpan</button></i>
                    </div>
                </form>
            </div>
        </div>
    </div>
        <!-- PAGE CONTENT ENDS -->
    </div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.page-content -->
</div>
</div><!-- /.main-content -->

    
@endsection