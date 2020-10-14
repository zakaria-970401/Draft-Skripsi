@extends('layout/mastersiswa')

@section('judul', 'Halaman Update Profile')
   
@section('konten')

<div class="page-content">
    <div class="col-sm-offset-1 col-sm-10">
        <div class="space"></div>
          <form class="form-horizontal" action="/siswa/updateprofile" method="post">
            @method('PATCH')   
              @csrf
              <div class="space"></div>
                 <h4 class="header blue bolder smaller">Informasi Siswa</h4>
                 <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-email">Nama Lengkap</label>
                            <div class="col-sm-9">
                                <span class="input-icon input-icon-right">
                                    <input type="email" id="form-field-email" value="" />
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-email">NISN</label>
                            <div class="col-sm-9">
                                <span class="input-icon input-icon-right">
                                    <input type="email" id="form-field-email" value="" />
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-email">Jurusan</label>
                            <div class="col-sm-9">
                                <span class="input-icon input-icon-right">
                                    <input type="email" id="form-field-email" value="" />
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-email">Kelas</label>
                            <div class="col-sm-9">
                                <span class="input-icon input-icon-right">
                                    <input type="email" id="form-field-email" value="" />
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-email">Jenis Kelamin</label>
                            <div class="col-sm-9">
                                <span class="input-icon input-icon-right">
                                    <input type="email" id="form-field-email" value="" />
                                </span>
                            </div>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-email">Alamat</label>
                            <div class="col-sm-9">
                                <span class="input-icon input-icon-right">
                                    <input type="email" id="form-field-email" value="" />
                                </span>
                            </div>
                        </div>     
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-email">NO. HP</label>
                            <div class="col-sm-9">
                                <span class="input-icon input-icon-right">
                                    <input type="email" id="form-field-email" value="" />
                                </span>
                            </div>
                        </div>     
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-email">Nama Ayah</label>
                            <div class="col-sm-9">
                                <span class="input-icon input-icon-right">
                                    <input type="email" id="form-field-email" value="" />
                                </span>
                            </div>
                        </div>     
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-email">Nama Ibu</label>
                            <div class="col-sm-9">
                                <span class="input-icon input-icon-right">
                                    <input type="email" id="form-field-email" value="" />
                                </span>
                            </div>
                        </div>     
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-email">Pekrjaan Orang Tua</label>
                            <div class="col-sm-9">
                                <span class="input-icon input-icon-right">
                                    <input type="email" id="form-field-email" value="" />
                                </span>
                            </div>
                        </div>     
                     </div>
                 </div>
                    
                        <div class="space-2"></div>
                        <h4 class="header blue bolder smaller">Informasi Akun</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-email">Username</label>
                                    <div class="col-sm-9">
                                        <span class="input-icon input-icon-right">
                                            <input type="email" id="form-field-email" value="" />
                                        </span>
                                    </div>
                                </div>     
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-email">Password</label>
                                    <div class="col-sm-9">
                                        <span class="input-icon input-icon-right">
                                            <input type="email" id="form-field-email" value="" />
                                        </span>
                                    </div>
                                </div> 
                            </div> 
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-email">Foto Profile</label>
                                    <div class="col-sm-9">
                                            <img class="editable img-responsive" alt="Alex's Avatar" id="avatar2" src="/assets/images/avatars/profile-pic.jpg" style="width: 30%"/>
                                    </div>
                                </div> 
                                 <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-email"></label>
                                    <div class="col-sm-9">
                                        <span class="input-icon input-icon-right">
                                            <input type="file" id="form-field-email" value="" />
                                        </span>
                                    </div>
                            </div>
                        </div>
                    </div>

            <div class="clearfix form-actions">
                <div class="col-md-offset-3 col-md-9">
                    <button class="btn btn-success" type="button">
                        <i class="ace-icon fa fa-check bigger-110"></i>
                        Simpan
                    </button>

                    <button class="btn" type="reset">
                        <i class="ace-icon fa fa-undo bigger-110"></i>
                        Reset
                    </button>
                </div>
            </div>
        </form>
    </div><!-- /.span -->
</div><!-- /.user-profile -->
</div>

<!-- PAGE CONTENT ENDS -->
</div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.page-content -->
</div>
</div><!-- /.main-content -->

@endsection