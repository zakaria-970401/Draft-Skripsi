@extends('layout/masteradmin')

@section('judul' , 'Halaman Edit Data Training')

@section('konten')
        <div class="page-header">
            <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                <ul class="breadcrumb">
                    <li>
                        <i class="ace-icon fa fa-home home-icon"></i>
                        <a href="/admin">Home</a>
                    </li>
                    <li>
                        <i class="ace-icon fa fa-database home-icon"></i>
                        <a href="/admin/data_training">Data Training</a>
                    </li>
                    <li>
                        <i class="ace-icon fa fa-pencil home-icon"></i>
                        <a href="#">Edit Data Training</a>
                    </li>
                </ul><!-- /.breadcrumb -->
            </div>
        <div class="page-content">
        <div class="row">
            <div class="col-md-10">
                <form action="/admin/update_data_training/{{$data->id}}" class="form-horizontal" method="POST" enctype="multipart/form-data">
                    @method('PATCH')
                    {{ csrf_field() }}
                    <br>
                    <br>
                    <br>
                        <div class="form-group">
                            <label class="col-md-3 control-label no-padding-right" for="form-field-1-1"> ID Data</label>
                            <div class="col-md-8">
                            <input type="text" id="form-field-1-1" placeholder="Silahkan di isi" class="form-control" value="{{$data->id}}" disabled/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label no-padding-right" for="form-field-1-1">Tanggal Daftar</label>
                            <div class="col-sm-9">
                                <input type="date" id="form-field-1-1" placeholder="Silahkan di isi" class="form-control" name="tanggal_daftar" required value="{{ $data->tanggal_daftar }}"/>
                            </div>
                        </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label no-padding-right" for="form-field-1-1">Nama Siswa </label>
                            <div class="col-sm-9">
                                <input type="text" id="form-field-1-1" placeholder="Silahkan di isi" class="form-control" name="nama_siswa" required value="{{ $data->nama_siswa }}"/>
                            </div>
                        </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label no-padding-right" for="form-field-1-1">NISN Siswa </label>
                            <div class="col-sm-9">
                                <input type="text" id="form-field-1-1" placeholder="Silahkan di isi" class="form-control" name="nisn" required value="{{ $data->nisn }}"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Jurusan </label>
                            <div class="col-md-9">
                                <select class="form-control" id="myselect" name="jurusan">
                                    <option value="{{$data->jurusan}}">{{$data->jurusan}}</option>
                                    <option>Silahkan Pilih</option>
                                    <option value="TKJ">Teknik Komputer Dan Jaringan</option>
                                    <option value="TKR">Teknik Kendaraan Ringan</option>
                                </select>
                            </div>
                         </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kelas </label>
                            <div class="col-md-9">
                                <select class="chosen-select form-control" name="kelas" id="myselect">
                                    <option value="{{$data->kelas}}">{{$data->kelas}}</option>
                                    <option>Silahkan Pilih</option>
                                    @foreach($kelas as $kls)
                                    <option value="{{$kls->kelas}}">{{$kls->kelas}}</option>
                                    @endforeach
                                 </select>
                            </div>
                         </div>
                         <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-select-3">Status Kelengkapan Orang Tua : </label>
                            <div class="col-md-9">
                            <select class="form-control" id="status_kelengkapan_ortu" name="status_kelengkapan_ortu">
                                <option value="{{$data->status_kelengkapan_ortu}}">{{$data->status_kelengkapan_ortu}}</option>
                                <option>--Silahkan Pilih--</option>
                                <option value="Lengkap">Lengkap </option>
                                <option value="Tidak Lengkap">Tidak Lengkap</option>
                            </select>
                        </div>
                    </div>
                        <div class="form-group" id="status_yatim">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-select-3">Status Yatim : </label>
                            <div class="col-md-9">
                            <select class="form-control" id="" name="status_yatimpiatu">
                                <option value="{{$data->status_yatimpiatu}}">{{$data->status_yatimpiatu}}</option>
                                <option value="">-</option>
                                <option value="Tanpa Ayah">Tanpa Ayah</option>
                                <option value="Tanpa Ibu">Tanpa Ibu</option>
                                <option value="Tanpa Ayah Dan Ibu">Tanpa Ayah Dan Ibu</option>
                            </select>
                        </div>
                     </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-select-3">Status Kepemilikan Orang Tua : </label>
                           <div class="col-md-9">
                            <select class="form-control" id="" name="status_rumah_ortu">
                                <option value="{{$data->status_rumah_ortu}}">{{$data->status_rumah_ortu}}</option>
                                <option>--Silahkan Pilih--</option>
                                <option value="Rumah Sendiri">Rumah Sendiri</option>
                                <option value="Rumah Sewa">Rumah Sewa</option>
                                <option value="Kontrakan">Kontrakan</option>
                                <option value="Tinggal Dengan Saudara">Tinggal Dengan Saudara</option>
                            </select>
                        </div>
                    </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-select-3">Status Pekerjaan Orang Tua : </label>
                           <div class="col-md-9">
                            <select class="form-control" id="" name="status_pekerjaan_wali">
                                <option value="{{$data->status_pekerjaan_wali}}">{{$data->status_pekerjaan_wali}}</option>
                                <option>--Silahkan Pilih--</option>
                                <option value="Karyawan Swasta">Karyawan Swasta</option>
                                <option value="Pegawai Negeri">Pegawai Negeri</option>
                                <option value="Pekerja Tidak Tetap">Pekerja Tidak Tetap</option>
                                <option value="Usaha">Usaha</option>
                            </select>
                        </div>
                    </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-select-3">Surat Keterangan Tidak Mampu : </label>
                           <div class="col-md-9">
                            <select class="form-control" id="status_sk_tidak_mampu" name="status_sk_tidakmampu">
                                <option value="{{$data->status_sk_tidakmampu}}">{{$data->status_sk_tidakmampu}}</option>
                                <option>--Silahkan Pilih--</option>
                                <option value="Ada">Ada</option>
                                <option value="Tidak Ada">Tidak Ada</option>
                            </select>
                        </div>
                    </div>
                        <div class="form-group" id="sk_tidak_mampu">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Upload Surat : </label>
                            <div class="col-sm-9">
                                <input type="file" class="col-xs-10 col-sm-8" name="foto_sk_tidakmampu"/>
                            </div>
                        </div>
                        <!-- PAGE CONTENT ENDS -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
                <div class="row">
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-success btn-block"><i class="fa fa-save"> Simpan</button></i>
                        <a href="/admin/data_training" class="btn btn-info btn-block"><i class="fa fa-reply"> Kembali</a></i>
                    </div><!-- /.page-content -->
                </div>
                </form>
            </div>
         </div><!-- /.main-content -->

   <script type="text/javascript">
			$('#myselect').select2({ width: '100%', placeholder: "Silahkan Pilih", allowClear: true });
</script> 
@endsection