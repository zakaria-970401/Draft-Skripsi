@extends('layout/masteradmin')

@section('judul' , 'Halaman Detail')

@section('konten')

<div class="page-header">
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="/admin">Home</a>
            </li>
            <li>
                <i class="ace-icon fa fa-users home-icon"></i>
                <a href="/admin/data_siswa">Data Siswa</a>
            </li>
            <li>
                <i class="ace-icon fa fa-eye home-icon"></i>
                <a href="#">Detail Data Siswa</a>
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
                        <br>
                        <br>
                        <br>
                        <br>
                        <span class="profile-picture">
                            <img id="avatar" class="editable img-responsive" alt=" " src="{{asset('fotosiswa/'.$siswa->foto)}}" />
                        </span>
                        <div class="space-4"></div>
                        <div class="width-80 label label-success label-xlg ">
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

                    <h3 class="header smaller lighter blue">Informasi Pribadi Siswa</h3>

                    <div class="profile-user-info profile-user-info-striped">
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Nama Siswa </div>
                            <div class="profile-info-value">
                                <span class="editable" id="username">{{$siswa->nama_siswa}}</span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> NISN </div>
                            <div class="profile-info-value">
                                <span class="editable" id="username">{{$siswa->nisn}}</span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Jurusan </div>
                            <div class="profile-info-value">
                                <span class="editable" id="username">{{$siswa->jurusan}}</span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Kelas </div>
                            <div class="profile-info-value">
                                <span class="editable" id="username">{{$join_kelas->kelas}}</span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Agama </div>
                            <div class="profile-info-value">
                                <span class="editable" id="username">
                                    @if($siswa->id_agama == 1)
                                    Islam
                                    @elseif($siswa->id_agama == 2)
                                    Protestan
                                    @elseif($siswa->id_agama == 3)
                                    Katolik
                                    @elseif($siswa->id_agama == 4)
                                    Budha
                                    @elseif($siswa->id_agama == 5)
                                    Hindu
                                    @else
                                    Konghucu
                                    @endif
                                </span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Jenis Kelamin </div>
                            <div class="profile-info-value">
                                <span class="editable" id="username">
                                    @if($siswa->jenis_kelamin == "P")
                                    Perempuan
                                    @else
                                    Laki-Laki
                                    @endif
                                </span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Tempat, Tanggal Lahir</div>
                            <div class="profile-info-value">
                                <span class="editable" id="username">
                                    {{$siswa->tempat_lahir}}, {{\Carbon\Carbon::parse($siswa->tanggal_lahir)->format('d-M-y')}} </span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Alamat </div>
                            <div class="profile-info-value">
                                <span class="editable" id="username">{{$siswa->alamat}}</span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> No. HP </div>
                            <div class="profile-info-value">
                                <span class="editable" id="username">{{$siswa->no_hp}}</span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Nama Ayah </div>
                            <div class="profile-info-value">
                                <span class="editable" id="username">{{$siswa->nama_ayah}}</span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Nama Ibu </div>
                            <div class="profile-info-value">
                                <span class="editable" id="username">{{$siswa->nama_ibu}}</span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Pekerjaan Wali </div>
                            <div class="profile-info-value">
                                <span class="editable" id="username">{{$siswa->pekerjaan_wali}}</span>
                            </div>
                        </div>
                        </div>
                        <h3 class="header smaller lighter blue">Informasi Akun Siswa</h3>
                        <div class="profile-user-info profile-user-info-striped">
                            <div class="profile-info-row">
                                <div class="profile-info-name"> E-mail </div>
                                <div class="profile-info-value">
                                    <span class="editable" id="username">{{$join_akun->email}}</span>
                                </div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name"> Password </div>
                                <div class="profile-info-value">
                                    <span class="editable" id="username">**********</span>
                                </div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name"> Foto Profile </div>
                                <div class="profile-info-value">
                                    <img src="{{asset('foto_akunsiswa/'.$join_akun->foto)}}" style="width: 200px">
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
            <h3 class="header smaller lighter blue">Edit Data Siswa</h3>
        <div class="modal-body">
                    <!-- PAGE CONTENT BEGINS -->
                    <form action="/admin/update_datasiswa/{{$siswa->id}}" class="form-horizontal" method="POST" enctype="multipart/form-data">
                        @method('PATCH')
                        {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-3 control-label no-padding-right" for="form-field-1-1"> Nama Siswa</label>
                                <div class="col-sm-9">
                                <input type="text" id="form-field-1-1" placeholder="Silahkan di isi" class="form-control" name="nama_siswa" required value="{{$siswa->nama_siswa}}"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> NISN Siswa : </label>
                                <div class="col-sm-9">
                                <input type="text" id="form-field-1-1" placeholder="Silahkan di isi" class="form-control @error('nisn') is-invalid @enderror" name="nisn" required value="{{$siswa->nisn}}"/>
                                    @error('nisn')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Jurusan : </label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="jurusan" required >
                                            @if($siswa->id_jurusan == 1)
                                            <option value="1">Teknik Komputer Dan Jaringan</option>
                                            @else
                                            <option value="2">Teknik Kendaraan Ringan</option>
                                            @endif
                                            <option>Silahkan pilih</option>
                                            @foreach($loopjurusan as $jurusan)
                                            <option value="{{$jurusan->jurusan}}">{{$jurusan->jurusan}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                 </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kelas : </label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="id_kelas" required>
                                            <option value="{{$join_kelas->id_kelas}}">{{$join_kelas->kelas}}</option>
                                            <option>Silahkan pilih</option>
                                        @foreach ($loopkelas as $kelas)
                                             <option value="{{$kelas->id_kelas}}">{{$kelas->kelas}}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                 </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Agama : </label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="id_agama" required>
                                            <option value="{{$join_agama->id_agama}}">{{$join_agama->agama}}</option>
                                            <option>Silahkan Pilih</option>
                                            @foreach ($loopagama as $agama)
                                            <option value="{{$agama->id_agama}}">{{$agama->agama}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                 </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Jenis Kelamin : </label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="jenis_kelamin" required>
                                            @if($siswa->jenis_kelamin == 'P')
                                            <option value="{{$siswa->jenis_kelamin}}">Perempuan</option>
                                            @else                           
                                            <option value="{{$siswa->jenis_kelamin}}">Laki-Laki</option>
                                            @endif
                                            <option>Silahkan Pilih</option>
                                            <option value="L">Laki-Laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    </div>
                                 </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Alamat Siswa : </label>
                                    <div class="col-sm-9">
                                    <input type="text" id="form-field-1-1" placeholder="Silahkan di isi" class="form-control" required value="{{$siswa->alamat}}"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> No.Hp : </label>
                                    <div class="col-sm-9">
                                    <input type="text" id="form-field-1-1" class="form-control" name="no_hp" required value="{{$siswa->no_hp}}"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Nama Ayah : </label>
                                    <div class="col-sm-9">
                                    <input type="text" id="form-field-1-1" placeholder="Silahkan di isi" class="form-control" name="nama_ayah" required value="{{$siswa->nama_ayah}}"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Nama Ibu : </label>
                                    <div class="col-sm-9">
                                    <input type="text" id="form-field-1-1" placeholder="Silahkan di isi" class="form-control" name="nama_ibu" required value="{{$siswa->nama_ibu}}"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Pekerjaan Wali : </label>
                                    <div class="col-sm-9">
                                        <input type="text" id="form-field-1-1" placeholder="Silahkan di isi" class="form-control" name="pekerjaan_wali" required value="{{$siswa->pekerjaan_wali}}" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Foto Siswa : </label>
                                    <div class="col-sm-9">
                                    <input type="file" id="form-field-1-1" placeholder="Silahkan di isi" class="form-control @error('foto') is-invalid @enderror" name="foto" value="{{$siswa->foto}}"/>
                                        @error('foto')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
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
</div><!-- /.main-content -->


    
@endsection