@extends('layout/masterwalas')

@section('judul' , 'Halaman Detail Dataset Siswa')

@section('konten')

<div class="page-header">
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="/walas">Home</a>
            </li>
            <li>
                <i class="ace-icon fa fa-check home-icon"></i>
                <a href="/walas/bansos_anakdidik">Verifikasi Bansos Anak Didik</a>
            </li>
            <li>
                <i class="ace-icon fa fa-eye home-icon"></i>
                <a href="#">Detail Data</a>
            </li>
        </ul><!-- /.breadcrumb -->
    </div>

    
<div class="page-content">
    <div class="row">
        <div class="col-xs-10">
            @if($status->status == '1')
                    <div class="space-12"></div>
                    <h3 class="header smaller lighter blue">Detail  Dataset Siswa</h3>
                    <div class="col-xs-8">
                        <a href="/walas/bansos_anakdidik" class="btn btn-primary"> <i class="fa fa-reply">   Kembali</i></a>
                    </div>
                    <div class="col-xs-4">
                        <a href="#modal-edit" data-toggle="modal" class="btn btn-primary"> <i class="fa fa-pencil"> Edit Data</i></a>
                        <a href="/walas/hapus_dataset_siswa/{{$status->id}}" class="btn btn-danger"> <i class="fa fa-trash"> Hapus Data</i></a>
                    </div>
                    <br>
                    <br>
                    <br>
        
                <form action="/walas/proses_dataset_siswa/{{$status->id}}" method="POST">
                        @csrf
                    <div class="profile-user-info profile-user-info-striped">
                        <div class="profile-info-row">
                            <div class="profile-user-info profile-user-info-striped">
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Nama Siswa </div>
        
                                    <div class="profile-info-value">
                                        <input type="hidden" name="nama_siswa" value="{{$status->nama_siswa}}">
                                        <span class="editable" id="username">
                                            {{$status->nama_siswa}}
                                        </span>
                                    </div>
                                </div>
        
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> NISN </div>
                                    <div class="profile-info-value">
                                        <input type="hidden" name="nisn" value="{{$status->nisn}}">
                                        <span class="editable" id="country">
                                            {{$status->nisn}}
                                        </span>
                                    </div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Tanggal Pendaftaran </div>
                                    <div class="profile-info-value">
                                        <input type="hidden" name="tgl_daftar" value="{{$status->tgl_daftar}}">
                                        {{Carbon\Carbon::parse($status->tgl_daftar)->format('d-M-y')}}
                                    </div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Jurusan </div>
                                    <div class="profile-info-value">
                                        {{$status->jurusan}}
                                    </div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Kelas </div>
                                    <input type="hidden" name="kelas" value="{{$status->kelas}}">
                                    <div class="profile-info-value">
                                        {{$status->kelas}}
                                    </div>
                                </div>
                              
                                <div class="profile-info-row">
                                    <div class="profile-info-name">Kelengkapan Ortu </div>
                                    <input type="hidden" name="status_kelengkapan_ortu" value="{{$status->status_kelengkapan_ortu}}">
                                    <div class="profile-info-value">
                                        {{$status->status_kelengkapan_ortu}}
                                    </div>
                                </div>
                                
                                <div class="profile-info-row">
                                    <div class="profile-info-name">Rumah Ortu </div>
                                    <input type="hidden" name="status_rumah_ortu" value="{{$status->status_rumah_ortu}}">
                                    <div class="profile-info-value">
                                        {{$status->status_rumah_ortu}}
                                    </div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name">Pekerjaan Wali </div>
                                    <input type="hidden" name="status_pekerjaan_wali" value="{{$status->status_pekerjaan_wali}}">
                                    <div class="profile-info-value">
                                        {{$status->status_pekerjaan_wali}}
                                    </div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name">SK Tidak Mampu </div>
                                    <input type="hidden" name="status_sk_tidakmampu" value="{{$status->status_sk_tidakmampu}}">
                                    <div class="profile-info-value">
                                        {{$status->status_sk_tidakmampu}}
                                    </div>
                                </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name">Foto SK Tidak Mampu </div>
                            <div class="profile-info-value">
                                @if($status->foto == Null)
                               Tidak Ada Lampiran
                               @else
                               <a href="#foto-sk" data-toggle="modal" class="btn btn-info btn-sm"> Lihat Lampiran</a>
                               @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
                <div class="col-xs-8">
                </div>
                <div class="col-xs-4">
                    <a href="#modal-tolak" data-toggle="modal" class="btn btn-danger"> <i class="fa fa-ban"> Tolak Data</i></a>
                    <button type="submit" class="btn btn-success"> <i class="fa fa-check"> Proses Data</i></button>
                </form>
                </div>
            </div><!-- /.user-profile -->
            @elseif($status->status == '2')
                    <div class="space-12"></div>
                    <h3 class="header smaller lighter blue">Detail  Dataset Siswa</h3>
                    <div class="col-xs-8">
                        <a href="/walas/bansos_anakdidik" class="btn btn-primary"> <i class="fa fa-reply">   Kembali</i></a>
                    </div>
                    <div class="col-xs-4">
                        <a href="#modal-edit" data-toggle="modal" class="btn btn-primary"> <i class="fa fa-pencil"> Edit Data</i></a>
                        <a href="/walas/hapus_dataset_siswa/{{$status->id}}" class="btn btn-danger"> <i class="fa fa-trash"> Hapus Data</i></a>
                    </div>
                    <br>
                    <br>
                    <br>
        
                <form action="/walas/proses_dataset_siswa/{{$status->id}}" method="POST">
                        @csrf
                    <div class="profile-user-info profile-user-info-striped">
                        <div class="profile-info-row">
                            <div class="profile-user-info profile-user-info-striped">
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Nama Siswa </div>
        
                                    <div class="profile-info-value">
                                        <input type="hidden" name="nama_siswa" value="{{$status->nama_siswa}}">
                                        <span class="editable" id="username">
                                            {{$status->nama_siswa}}
                                        </span>
                                    </div>
                                </div>
        
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> NISN </div>
                                    <div class="profile-info-value">
                                        <input type="hidden" name="nisn" value="{{$status->nisn}}">
                                        <span class="editable" id="country">
                                            {{$status->nisn}}
                                        </span>
                                    </div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Tanggal Pendaftaran </div>
                                    <div class="profile-info-value">
                                        <input type="hidden" name="tgl_daftar" value="{{$status->tgl_daftar}}">
                                        {{Carbon\Carbon::parse($status->tgl_daftar)->format('d-M-y')}}
                                    </div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Jurusan </div>
                                    <div class="profile-info-value">
                                        {{$status->jurusan}}
                                    </div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Kelas </div>
                                    <input type="hidden" name="kelas" value="{{$status->kelas}}">
                                    <div class="profile-info-value">
                                        {{$status->kelas}}
                                    </div>
                                </div>
                              
                                <div class="profile-info-row">
                                    <div class="profile-info-name">Kelengkapan Ortu </div>
                                    <input type="hidden" name="status_kelengkapan_ortu" value="{{$status->status_kelengkapan_ortu}}">
                                    <div class="profile-info-value">
                                        {{$status->status_kelengkapan_ortu}}
                                    </div>
                                </div>
                                
                                <div class="profile-info-row">
                                    <div class="profile-info-name">Rumah Ortu </div>
                                    <input type="hidden" name="status_rumah_ortu" value="{{$status->status_rumah_ortu}}">
                                    <div class="profile-info-value">
                                        {{$status->status_rumah_ortu}}
                                    </div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name">Pekerjaan Wali </div>
                                    <input type="hidden" name="status_pekerjaan_wali" value="{{$status->status_pekerjaan_wali}}">
                                    <div class="profile-info-value">
                                        {{$status->status_pekerjaan_wali}}
                                    </div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name">SK Tidak Mampu </div>
                                    <input type="hidden" name="status_sk_tidakmampu" value="{{$status->status_sk_tidakmampu}}">
                                    <div class="profile-info-value">
                                        {{$status->status_sk_tidakmampu}}
                                    </div>
                                </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name">Foto SK Tidak Mampu </div>
                            <div class="profile-info-value">
                                @if($status->foto == Null)
                               Tidak Ada Lampiran
                               @else
                               <a href="#foto-sk" data-toggle="modal" class="btn btn-info btn-sm"> Lihat Lampiran</a>
                               @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
                <div class="col-xs-8">
                </div>
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-success btn-block"> <i class="fa fa-check"> Proses Data</i></button>
                </form>
                </div>
            </div><!-- /.user-profile -->
            @elseif($status->status == '3')
            <div class="row">
                <div class="col-xs-10">
                            <div class="space-12"></div>
                            <h3 class="header smaller lighter blue">Detail  Dataset Siswa</h3>
                            <div class="col-xs-9">
                                <a href="/walas/bansos_anakdidik" class="btn btn-primary"> <i class="fa fa-reply"> Kembali</i></a>
                            </div>
                            <div class="col-xs-3">
                                <a href="/walas/hapus_dataset_siswa/{{$status->id}}" class="btn btn-danger"> <i class="fa fa-trash"> Hapus Data</i></a>
                            </div>
                            <br>
                            <br>
                            <br>

                            <div class="profile-user-info profile-user-info-striped">
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Nama Siswa </div>
        
                                    <div class="profile-info-value">
                                        <input type="hidden" name="nama_siswa" value="{{$status->nama_siswa}}">
                                        <span class="editable" id="username">
                                            {{$status->nama_siswa}}
                                        </span>
                                    </div>
                                </div>
        
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> NISN </div>
                                    <div class="profile-info-value">
                                        <input type="hidden" name="nisn" value="{{$status->nisn}}">
                                        <span class="editable" id="country">
                                            {{$status->nisn}}
                                        </span>
                                    </div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Tanggal Pendaftaran </div>
                                    <div class="profile-info-value">
                                        <input type="hidden" name="tgl_daftar" value="{{$status->tgl_daftar}}">
                                        {{Carbon\Carbon::parse($status->tgl_daftar)->format('d-M-y')}}
                                    </div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Jurusan </div>
                                    <div class="profile-info-value">
                                        {{$status->jurusan}}
                                    </div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Kelas </div>
                                    <input type="hidden" name="kelas" value="{{$status->kelas}}">
                                    <div class="profile-info-value">
                                        {{$status->kelas}}
                                    </div>
                                </div>
                              
                                <div class="profile-info-row">
                                    <div class="profile-info-name">Kelengkapan Ortu </div>
                                    <input type="hidden" name="status_kelengkapan_ortu" value="{{$status->status_kelengkapan_ortu}}">
                                    <div class="profile-info-value">
                                        {{$status->status_kelengkapan_ortu}}
                                    </div>
                                </div>
                                
                                <div class="profile-info-row">
                                    <div class="profile-info-name">Rumah Ortu </div>
                                    <input type="hidden" name="status_rumah_ortu" value="{{$status->status_rumah_ortu}}">
                                    <div class="profile-info-value">
                                        {{$status->status_rumah_ortu}}
                                    </div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name">Pekerjaan Wali </div>
                                    <input type="hidden" name="status_pekerjaan_wali" value="{{$status->status_pekerjaan_wali}}">
                                    <div class="profile-info-value">
                                        {{$status->status_pekerjaan_wali}}
                                    </div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name">SK Tidak Mampu </div>
                                    <input type="hidden" name="status_sk_tidakmampu" value="{{$status->status_sk_tidakmampu}}">
                                    <div class="profile-info-value">
                                        {{$status->status_sk_tidakmampu}}
                                    </div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name">Foto SK Tidak Mampu </div>
                                    <div class="profile-info-value">
                                        @if($status->foto == Null)
                                       Tidak Ada Lampiran
                                       @else
                                       <a href="#foto-sk" data-toggle="modal" class="btn btn-info btn-sm"> Lihat Lampiran</a>
                                       @endif
                                    </div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name">Alasan Di Tolak </div>
                                    <div class="profile-info-value">
                                        @if($status->alasan_tolak == NULL)
                                        -
                                        @else<h4 class="text-center"><b>{{$status->alasan_tolak}}</b></h4>
                                    </div>
                                    @endif
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name">Pemeriksa </div>
                                    <div class="profile-info-value">
                                        <h4 class="text-center"><b>{{$status->pemeriksa}}</b></h4>
                                    </div>
                                </div>
                              
                            </div>
                        </div>
                    </div>
            @elseif($status->status == '4')
            <div class="row">
                <div class="col-xs-10">
                            <div class="space-12"></div>
                            <h3 class="header smaller lighter blue">Detail  Dataset Siswa</h3>
                            <div class="col-xs-9">
                                <a href="/walas/bansos_anakdidik" class="btn btn-primary"> <i class="fa fa-reply"> Kembali</i></a>
                            </div>
                            <div class="col-xs-3">
                                <a href="/walas/hapus_dataset_siswa/{{$status->id}}" class="btn btn-danger"> <i class="fa fa-trash"> Hapus Data</i></a>
                            </div>
                            <br>
                            <br>
                            <br>

                            <div class="profile-user-info profile-user-info-striped">
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Nama Siswa </div>
        
                                    <div class="profile-info-value">
                                        <input type="hidden" name="nama_siswa" value="{{$status->nama_siswa}}">
                                        <span class="editable" id="username">
                                            {{$status->nama_siswa}}
                                        </span>
                                    </div>
                                </div>
        
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> NISN </div>
                                    <div class="profile-info-value">
                                        <input type="hidden" name="nisn" value="{{$status->nisn}}">
                                        <span class="editable" id="country">
                                            {{$status->nisn}}
                                        </span>
                                    </div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Tanggal Pendaftaran </div>
                                    <div class="profile-info-value">
                                        <input type="hidden" name="tgl_daftar" value="{{$status->tgl_daftar}}">
                                        {{Carbon\Carbon::parse($status->tgl_daftar)->format('d-M-y')}}
                                    </div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Jurusan </div>
                                    <div class="profile-info-value">
                                        {{$status->jurusan}}
                                    </div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Kelas </div>
                                    <input type="hidden" name="kelas" value="{{$status->kelas}}">
                                    <div class="profile-info-value">
                                        {{$status->kelas}}
                                    </div>
                                </div>
                              
                                <div class="profile-info-row">
                                    <div class="profile-info-name">Kelengkapan Ortu </div>
                                    <input type="hidden" name="status_kelengkapan_ortu" value="{{$status->status_kelengkapan_ortu}}">
                                    <div class="profile-info-value">
                                        {{$status->status_kelengkapan_ortu}}
                                    </div>
                                </div>
                                
                                <div class="profile-info-row">
                                    <div class="profile-info-name">Rumah Ortu </div>
                                    <input type="hidden" name="status_rumah_ortu" value="{{$status->status_rumah_ortu}}">
                                    <div class="profile-info-value">
                                        {{$status->status_rumah_ortu}}
                                    </div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name">Pekerjaan Wali </div>
                                    <input type="hidden" name="status_pekerjaan_wali" value="{{$status->status_pekerjaan_wali}}">
                                    <div class="profile-info-value">
                                        {{$status->status_pekerjaan_wali}}
                                    </div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name">SK Tidak Mampu </div>
                                    <input type="hidden" name="status_sk_tidakmampu" value="{{$status->status_sk_tidakmampu}}">
                                    <div class="profile-info-value">
                                        {{$status->status_sk_tidakmampu}}
                                    </div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name">Foto SK Tidak Mampu </div>
                                    <div class="profile-info-value">
                                        @if($status->foto == Null)
                                       Tidak Ada Lampiran
                                       @else
                                       <a href="#foto-sk" data-toggle="modal" class="btn btn-info btn-sm"> Lihat Lampiran</a>
                                       @endif
                                    </div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name">Alasan Di Tolak </div>
                                    <div class="profile-info-value">
                                        <h4><b><center>{{$status->alasan_tolak}}</h4>
                                    </div>
                                </div>
                              
                            </div>
                        </div>
                    </div>
            @endif
        </div>
    </div><!-- /.col -->
</div><!-- /.row -->
      

<!-- Modal DAFTAR BANSOS -->
<div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h3 class="header smaller lighter blue">Informasi Pribadi Siswa</h3>
        <div class="modal-body">
                    <!-- PAGE CONTENT BEGINS -->
                    <form action="/walas/update_dataset_siswa/{{$status->id}}" class="form-horizontal" method="POST" enctype="multipart/form-data">
                        @method('PATCH')
                        {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label class="col-md-3 control-label no-padding-right" for="form-field-1-1"> Nama Siswa</label>
                                <div class="col-sm-9">
                                <input type="text" id="form-field-1-1" placeholder="Silahkan di isi" class="form-control" name="nama_siswa" value="{{$status->nama_siswa}}" disabled/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> NISN Siswa : </label>
                                <div class="col-sm-9">
                                <input type="text" id="form-field-1-1" placeholder="Silahkan di isi" class="form-control @error('nisn') is-invalid @enderror" name="nisn" value="{{$status->nisn}}" disabled/>
                                </div>
                            </div>
                            <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Jurusan : </label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="jurusan" disabled >
                                            <option value="{{$status->jurusan}}">{{$status->jurusan}}</option>
                                        </select>
                                    </div>
                                 </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kelas : </label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="id_kelas" disabled>
                                            <option value="{{$status->kelas}}">{{$status->kelas}}</option>
                                        </select>
                                    </div>
                                 </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                        <h3 class="header smaller lighter blue">Dataset Siswa</h3>
                        <div class="form-group">
                            <label for="form-field-select-4">Status Kelengkapan Orang Tua : </label>
                            <br />
                            <select class="form-control" id="status_kelengkapan_ortu" name="status_kelengkapan_ortu">
                                <option value="{{$status->status_kelengkapan_ortu}}">{{$status->status_kelengkapan_ortu}} </option>
                                <option>--Silahkan Pilih--</option>
                                <option value="Lengkap">Lengkap </option>
                                <option value="Tidak Lengkap">Tidak Lengkap</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="form-field-select-3">Status Kepemilikan Rumah Orang Tua : </label>
                            <br />
                            <select class="form-control" id="" name="status_rumah_ortu">
                                <option value="{{$status->status_rumah_ortu}}">{{$status->status_rumah_ortu}} </option>
                                <option>--Silahkan Pilih--</option>
                                <option value="Rumah Sendiri">Rumah Sendiri</option>
                                <option value="Rumah Sewa">Rumah Sewa</option>
                                <option value="Kontrakan">Kontrakan</option>
                                <option value="Tinggal Dengan Saudara">Tinggal Dengan Saudara</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="form-field-select-3">Status Pekerjaan Orang Tua : </label>
                            <br />
                            <select class="form-control" id="" name="status_pekerjaan_wali">
                                <option value="{{$status->status_pekerjaan_wali}}">{{$status->status_pekerjaan_wali}} </option>
                                <option>--Silahkan Pilih--</option>
                                <option value="Karyawan Swasta">Karyawan Swasta</option>
                                <option value="Pegawai Negri">Pegawai Negeri</option>
                                <option value="Pekerja Tidak Tetap">Pekerja Tidak Tetap</option>
                                <option value="Usaha">Usaha</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="form-field-select-3">Surat Keterangan Tidak Mampu : </label>
                            <br />
                            <select class="form-control" id="status_sk_tidak_mampu" name="status_sk_tidakmampu">
                                <option value="{{$status->status_sk_tidakmampu}}">{{$status->status_sk_tidakmampu}} </option>
                                <option>--Silahkan Pilih--</option>
                                <option value="Ada">Ada</option>
                                <option value="Tidak Ada">Tidak Ada</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label no-padding-right" for="form-field-1-1"> Lampiaran SK Tidak Mampu</label>
                            <div class="col-sm-9">
                            <input type="file" id="form-field-1-1" placeholder="Silahkan di isi" class="form-control" name="foto" value="{{$status->foto}}"/>
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
</div>
</div>

  
  <!-- Modal -->
  <div class="modal fade" id="foto-sk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Lampiran SK Tidak Mampu</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <img src="{{asset('foto_sktidakmampu/'.$status->foto)}}" style="height:30%">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->

<form action="/walas/tolak_dataset_siswa/{{$status->id}}" class="form-horizontal" method="POST" enctype="multipart/form-data">
    @method('PATCH')
    {{ csrf_field() }}
  <div class="modal fade" id="modal-tolak" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tolak Dataset Siswa</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label class="col-md-3 control-label no-padding-right" for="form-field-1-1"> Alasan Ditolak</label>
                <div class="col-sm-9">
                    <input type="hidden" id="form-field-1-1" placeholder="Silahkan di isi" class="form-control" name="nisn" value="{{$status->nisn}}"/>
                    <input type="text" id="form-field-1-1" placeholder="Silahkan di isi" class="form-control" name="alasan_tolak"/>
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary"><i class="fa fa save"> Simpan</i></button>
            </div>
        </div>
    </div>
</form>
</div>
</div>


      
@endsection