@extends('layout/masterwalas')

@section('judul' , 'Halaman Profile Walikelas')

@section('konten')

<div class="page-header">
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="/walas">Home</a>
            </li>
            <li>
                <i class="ace-icon fa fa-user home-icon"></i>
                <a href="#">Profile Walikelas</a>
            </li>
        </ul><!-- /.breadcrumb -->
    </div>
<div class="page-content">
<div class="row">
    <div class="col-xs-12">
            <div id="user-profile-1" class="user-profile row">
                <div class="col-xs-12 col-sm-3 center">
                    <div>
                        <span class="profile-picture">
                            <img id="avatar" class="editable img-responsive" alt="Foto Belum Ada" src="{{asset('foto_walas/'.Auth::user()->foto)}}" style="100px" />
                        </span>
                        <div class="space-4"></div>
                        <div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
                            <div class="inline position-relative">
                            <a href="#modal-update" data-toggle="modal" class="user-title-label">
                                    <i class="ace-icon fa fa-pencil light-green"></i>
                                    <span class="white">Edit Profile</span>
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

                    <div class="profile-user-info profile-user-info-striped">
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Nama </div>

                            <div class="profile-info-value">
                                <span class="editable" id="username">{{Auth::user()->nama}}</span>
                            </div>
                        </div>

                        <div class="profile-info-row">
                            <div class="profile-info-name"> NUPTK </div>

                            <div class="profile-info-value">
                                <span class="editable" id="country">{{Auth::user()->nuptk}}</span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> E-mail </div>

                            <div class="profile-info-value">
                                <span class="editable" id="country">{{Auth::user()->email}}</span>
                            </div>
                        </div>

                        <div class="profile-info-row">
                            <div class="profile-info-name"> Password </div>

                            <div class="profile-info-value">
                                <span class="editable" id="age">*********</span>
                            </div>
                        </div>

                    </div>
                        </div>
                    </form>
            </div><!-- /.user-profile -->
        </div>
                        
<!-- Modal DAFTAR BANSOS -->
<div class="modal fade" id="modal-update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h3 class="header smaller lighter blue">Edit Akun walas</h3>
        <div class="modal-body">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="col-md-3 control-label no-padding-right" for="form-field-1-1"> Nama</label>
                                <div class="col-sm-9">
                                <input type="text" id="form-field-1-1" placeholder="Silahkan di isi" class="form-control" name="nama" required value="{{$walas->nama}}" readonly/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label no-padding-right" for="form-field-1-1"> NUPTK</label>
                                <div class="col-sm-9">
                                <input type="text" id="form-field-1-1" placeholder="Silahkan di isi" class="form-control" name="nuptk" required value="{{$walas->nuptk}}" readonly/>
                                </div>
                            </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> E-Mail : </label>
                            <div class="col-sm-9">
                                <input type="text" id="input-username" placeholder="Silahkan di isi" class="form-control" name="email" value="{{$walas->email}}" readonly  />
                            </div>
                        </div>
                        <h3 class="header smaller lighter blue">Foto Walikelas</h3>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Foto : </label>
                            <div class="col-sm-9">
                            <img src="{{asset('foto_walas/'.$walas->foto)}}" alt="Belum Ada Foto" readonly style="width:100px"/>
                            </div>
                        </div>
                    </div>
            
                    <button type="button" id="btn_changepw" class="btn btn-info"><i class="fa fa-pencil"> Ganti Password</i></button>

                    <form action="/walas/update_pw_akunwalas/{{$walas->id}}" class="form-horizontal" method="POST" enctype="multipart/form-data">
                        @method('PATCH')
                        {{ csrf_field() }}
                    <div class="col-md-6" id="form_password">
                        <h3 class="header smaller lighter blue">Ganti Password</h3>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Password Baru : </label>
                            <div class="col-sm-9">
                                <input type="text" id="input-password" placeholder="Silahkan di isi" class="form-control" name="password" autocomplete="off" />
                            </div>
                        </div>
                        <center><button type="submit" id="btn_changepw" class="btn btn-success btn-mdz"><i class="fa fa-save"> Simpan</i></button>
                        <button type="button" id="batal_btn_changepw" class="btn btn-danger btn-mdz"><i class="fa fa-close"> Batal</i></button>
                        </form>
                    </div>
                 </div>
            </div>
        </div>
    </div>

        <!-- PAGE CONTENT ENDS -->
    </div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.page-content -->
</div>
</div><!-- /.main-content -->
</div><!-- /.main-content -->
    
@endsection