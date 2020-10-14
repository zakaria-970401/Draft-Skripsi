@extends('layout/masteradmin')

@section('judul' , 'Halaman Edit Akun Admin')

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
                <a href="/admin/akunadmin">Data Akun Admin</a>
            </li>
            <li>
                <i class="ace-icon fa fa-pencil home-icon"></i>
                <a href="#">Edit Akun Admin</a>
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
                            <img id="avatar" class="editable img-responsive" alt=" " src="{{asset('foto_akunadmin/'.$admin->foto)}}" />
                        </span>
                        <div class="space-4"></div>
                        <div class="width-80 label label-success label-xlg ">
                            <div class="inline position-relative">
                                <a href="#modal-update" data-toggle="modal" class="user-title-label">
                                    <i class="ace-icon fa fa-pencil light-green"></i>
                                    <span class="white">Edit Akun</span>
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

                    <h3 class="header smaller lighter blue">Informasi Akun Admin</h3>

                    <div class="profile-user-info profile-user-info-striped">
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Nama </div>
                            <div class="profile-info-value">
                                <span class="editable" id="username">{{$admin->nama}}</span>
                            </div>
                        </div>
                           <div class="profile-info-row">
                                <div class="profile-info-name"> Email </div>
                                <div class="profile-info-value">
                                    <span class="editable" id="username">{{$admin->email}}</span>
                                </div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name"> Password </div>
                                <div class="profile-info-value">
                                    <span class="editable" id="username">**********</span>
                                </div>
                            </div>        
                        </div><!-- /.user-profile -->
                    </div>
                </div>
                    
<!-- Modal DAFTAR BANSOS -->
<div class="modal fade" id="modal-update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h3 class="header smaller lighter blue">Edit Akun Siswa</h3>
        <div class="modal-body">
                    <!-- PAGE CONTENT BEGINS -->
                    <form action="/admin/update_akunadmin/{{$admin->id}}" class="form-horizontal" method="POST" enctype="multipart/form-data">
                        @method('PATCH')
                        {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-3 control-label no-padding-right" for="form-field-1-1"> Nama</label>
                                <div class="col-sm-9">
                                <input type="text" id="form-field-1-1" placeholder="Silahkan di isi" class="form-control" name="nama" required value="{{$admin->nama}}"/>
                                </div>
                            </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> E-Mail : </label>
                            <div class="col-sm-9">
                                <input type="text" id="input-username" placeholder="Silahkan di isi" class="form-control" name="email" value="{{$admin->email}}"  />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Password : </label>
                            <div class="col-sm-9">
                                <input type="text" id="input-password" placeholder="Silahkan di isi" class="form-control" name="password"  value="{{$admin->password}}" />
                            </div>
                        </div>
                        <div class="form-group" id="input-confirm-password-akunsiswa">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Confirm Password : </label>
                            <div class="col-sm-9">
                                <input type="text" id="form-field-1-1" placeholder="Silahkan di isi" class="form-control" name="password" required value="{{$admin->password}}" />
                            </div>
                        </div>
                        <div class="form-group" id="input-confirm-password-akunsiswa">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Foto  : </label>
                            <div class="col-sm-9">
                                <input type="file" id="form-field-1-1" placeholder="Silahkan di isi" class="form-control" name="foto" value="{{$admin->foto}}" />
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <img class="img-responsive" src=" {{ asset('foto_akunadmin/'.$admin->foto)}}" style="width: 100px" alt="" />
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
        <!-- PAGE CONTENT ENDS -->
    </div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.page-content -->
</div>
</div><!-- /.main-content -->

    
@endsection