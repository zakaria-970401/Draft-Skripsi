 @extends('layout/mastersiswa')

@section('judul' , 'Halaman Profile')

@section('konten')

<div class="page-header">
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="/siswa">Home</a>
            </li>
            <li>
                <i class="ace-icon fa fa-user home-icon"></i>
                <a href="#">Profile Siswa</a>
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
                            <img id="avatar" class="editable img-responsive" alt="Foto Belum Ada" src="{{asset('foto_akunsiswa/'.Auth::user()->foto)}}" style="500px" />
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

                <div class="col-md-8 col-sm-9">
                    <div class="center">
                        
                    </div>

                    <div class="space-12"></div>
                    <h3 class="header smaller lighter blue">Informasi Pribadi Siswa</h3>
                    <div class="profile-user-info profile-user-info-striped">
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Nama Siswa </div>

                            <div class="profile-info-value">
                                <span class="editable" id="username">{{Auth::user()->nama_siswa}}</span>
                            </div>
                        </div>

                        <div class="profile-info-row">
                            <div class="profile-info-name"> NISN </div>
                            <div class="profile-info-value">
                                <span class="editable" id="country">{{Auth::user()->nisn}}</span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Jurusan </div>
                            <div class="profile-info-value">
                                @if($join_siswa->id_jurusan == 1)
                                Teknik Komputer Dan Jaringan
                                @else
                                Teknik Kendaraan Ringan
                                @endif
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Kelas </div>
                            <div class="profile-info-value">
                                {{$join_kelas->kelas}}
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Agama </div>
                            <div class="profile-info-value">
                                <span>
                                @if($join_siswa->id_agama == 1)
                                Islam
                                @elseif($join_siswa->id_agama == 2)
                                Protestan
                                @elseif($join_siswa->id_agama == 3)
                                Katolik
                                @elseif($join_siswa->id_agama == 4)
                                Budha
                                @elseif($join_siswa->id_agama == 5)
                                Hindu
                                @else
                                Konghucu
                                @endif
                                </span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Tempat, Tanggal Lahir </div>
                            <div class="profile-info-value">
                            <span>
                                {{$join_siswa->tempat_lahir}}, 
                                {{\Carbon\Carbon::parse($join_siswa->tanggal_lahir)->format('d-M-Y')}}</span>
                            </div>
                        </div>

                        <div class="profile-info-row">
                            <div class="profile-info-name"> Alamat </div>
                            <div class="profile-info-value">
                                <i class="fa fa-map-marker light-orange bigger-110"></i>
                            <span>{{$join_siswa->alamat}}</span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> No. HP </div>

                            <div class="profile-info-value">
                                <span>{{$join_siswa->no_hp}}</span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Nama Ayah </div>
                            <div class="profile-info-value">
                                <span>{{$join_siswa->nama_ayah}}</span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Nama Ibu </div>
                            <div class="profile-info-value">
                                <span>{{$join_siswa->nama_ibu}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.user-profile -->
        </div>
    </div><!-- /.col -->
</div><!-- /.row -->
      
<!-- Modal DAFTAR BANSOS -->
<div class="modal fade" id="modal-update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h3 class="header smaller lighter blue">Informasi Pribadi Siswa</h3>
        <div class="modal-body">
                    <!-- PAGE CONTENT BEGINS -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-3 control-label no-padding-right" for="form-field-1-1"> Nama Siswa</label>
                                <div class="col-sm-9">
                                <input type="text" id="form-field-1-1" placeholder="Silahkan di isi" class="form-control" name="nama_siswa" value="{{Auth::user()->nama_siswa}}" disabled/>
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> NISN Siswa : </label>
                                <div class="col-sm-9">
                                <input type="text" id="form-field-1-1" placeholder="Silahkan di isi" class="form-control @error('nisn') is-invalid @enderror" name="nisn" value="{{Auth::user()->nisn}}" disabled/>
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Jurusan : </label>
                                    <div class="col-sm-9">
                                        @if($join_siswa->id_jurusan == 1)
                                            <input type="text" id="form-field-1-1" placeholder="Silahkan di isi" class="form-control @error('nisn') is-invalid @enderror" name="nisn" value="Teknik Komputer Dan Jaringan" disabled/>
                                        @else
                                            <input type="text" id="form-field-1-1" placeholder="Silahkan di isi" class="form-control @error('nisn') is-invalid @enderror" name="nisn" value="Teknik Kendaraan Ringan" disabled/>
                                        @endif
                                        </div>
                                     </div>
                                     <br>
                                     <br>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kelas : </label>
                                    <div class="col-sm-9">
                                        <input type="text" id="form-field-1-1" placeholder="Silahkan di isi" class="form-control @error('nisn') is-invalid @enderror" name="nisn" value="{{$join_kelas->kelas}}" disabled/>
                                    </div>
                                 </div>
                                 <br>
                                <br>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Agama : </label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="id_agama" disabled>
                                            @if ($join_siswa->id_agama == 1)
                                            <option>Islam</option>
                                            @elseif ($join_siswa->id_agama == 2)
                                            <option>Potestan</option>
                                            @elseif ($join_siswa->id_agama == 3)
                                            <option>Katolik</option>
                                            @elseif ($join_siswa->id_agama == 4)
                                            <option>Budha</option>
                                            @elseif ($join_siswa->id_agama == 5)
                                            <option>Hindu</option>
                                            @else
                                            <option>Konghucu</option>
                                            @endif
                                        </select>
                                    </div>
                                 </div>
                                 <br>
                                <br>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Jenis Kelamin : </label>
                                    <div class="col-sm-9">
                                        @if($join_siswa->jenis_kelamin == 'L')
                                        <input type="text" id="form-field-1-1" placeholder="Silahkan di isi" class="form-control @error('nisn') is-invalid @enderror" name="nisn" value="Laki-Laki" disabled/>
                                        @else
                                        <input type="text" id="form-field-1-1" placeholder="Silahkan di isi" class="form-control @error('nisn') is-invalid @enderror" name="nisn" value="Perempuan" disabled/>
                                        @endif
                                    </div>
                                 </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Alamat Siswa : </label>
                                    <div class="col-sm-9">
                                    <input type="text" id="form-field-1-1" placeholder="Silahkan di isi" class="form-control" value="{{$join_siswa->alamat}}" disabled/>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> No.Hp : </label>
                                    <div class="col-sm-9">
                                    <input type="text" id="form-field-1-1" placeholder="Silahkan di isi" class="form-control" name="no_hp" value="{{$join_siswa->no_hp}}" disabled/>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Nama Ayah : </label>
                                    <div class="col-sm-9">
                                    <input type="text" id="form-field-1-1" placeholder="Silahkan di isi" class="form-control" name="nama_ayah" value="{{$join_siswa->nama_ayah}}" disabled/>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Nama Ibu : </label>
                                    <div class="col-sm-9">
                                    <input type="text" id="form-field-1-1" placeholder="Silahkan di isi" class="form-control" name="nama_ibu" value="{{$join_siswa->nama_ibu}}" disabled/>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Foto Siswa : </label>
                                    <div class="col-sm-9">
                                    <img src="{{asset('fotosiswa/'.$join_siswa->foto)}}" alt="Belum Ada Foto" readonly style="width:100px"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                                
                        <hr style="background-color: black">
                          <h3 class="header smaller lighter blue">Edit Akun Siswa</h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> E-Mail : </label>
                                            <div class="col-sm-9">
                                                <input type="text" id="input-username" placeholder="Silahkan di isi" class="form-control" name="email" value="{{Auth::user()->email}}" disabled  />
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <div class="form-group" id="foto-profile-before">
                                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Foto Profile : </label>
                                            <div class="col-sm-9">
                                                <img src="{{asset('foto_akunsiswa/'.Auth::user()->foto)}}" alt="Belum Ada Foto" readonly style="width:150px"/>
                                                
                                            </div>
                                        </div>
                                        <form action="/siswa/update_profilesiswa/{{Auth::user()->id}}" class="form-horizontal" method="POST" enctype="multipart/form-data">
                                            @method('PATCH')
                                            {{ csrf_field() }}
                                        <div class="form-group" id="foto-profile">
                                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Foto Profile : </label>
                                            <div class="col-sm-9">
                                                <input type="file" id="input-username" placeholder="Silahkan di isi" class="form-control" name="foto" required />
                                            </div>
                                        </div>
                                    <button type="button" id="btn_edit_akunsiswa" class="btn btn-info btn-md"><i class="fa fa-pencil"> Edit Akun</button></i>
                                    <button type="button" id="btn_batal_edit_akunsiswa" class="btn btn-danger btn-md"><i class="fa fa-close"> Batal</button></i>
                                    <button type="submit" id="btn_simpan" class="btn btn-success btn-md"><i class="fa fa-save"> Update Foto!</button></i>
                                     </form>
                                    </div>
                                    <form action="/siswa/update_passwordsiswa/{{Auth::user()->id}}" class="form-horizontal" method="POST" enctype="multipart/form-data">
                                        @method('PATCH')
                                        {{ csrf_field() }}
                                    <div class="col-md-6" id="form_password">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Password Baru : </label>
                                            <div class="col-sm-9">
                                                <input type="text" id="input-username" placeholder="Silahkan di isi" class="form-control" name="password" autocomplete="off" required/>
                                                <span class="text-danger"> *Maks. 6 Digit</span>
                                            </div>
                                        </div>
                                    <center><button type="submit" id="btn_simpan" class="btn btn-success btn-md"><i class="fa fa-save"> Update Password!</button></i>
                                    </form>
                                  </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                </div>
            </div>
        </div><!-- /.page-content -->
     </div>
 </div><!-- /.main-content -->

                    
                @endsection