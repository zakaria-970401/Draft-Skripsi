@extends('layout/mastersiswa')

@section('judul', 'Halaman Program Bansos')

@section('konten')

<div class="main-content-inner">
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
            </li>
            <li>
                <i class="ace-icon fa fa-book home-icon"></i>
                <a href="#">Program Bansos</a>
            </li>
        </ul><!-- /.breadcrumb -->
    </div>
    <br>
    <div class="page-header">
        <h1>
            Daftar Siswa Yang Daftar Bantuan Sosial
        </h1>
        <div class="space-6"></div>
        <div class="page-content">
            <div class="row">
                <div class="col-xs-12">
                    @if($cek_data == NULL)
                    <button type="button" data-target="#modal-daftar" data-toggle="modal" class="btn btn-info"><i class="fa fa-plus"> Daftar Program Bansos</button></i>
                    @else
                    <button type="button" data-target="#modal-daftar" data-toggle="modal" class="btn btn-info" disabled><i class="fa fa-plus"> Daftar Program Bansos</button></i>
                    @endif
                    <div class="space-6"></div>
                    <table id="myTable" class="display">
                        <thead>
                            <tr>
                                <th class="text-center">No.</th>
                                <th class="text-center">Tangal</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">NISN</th>
                                <th class="text-center">Jurusan</th>
                                <th class="text-center">Kelas</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_bansos as $data)
                            <tr>
                                <td class="text-center">{{$loop->iteration}}</td>
                                <td class="text-center">{{Carbon\Carbon::parse($data->tgl_daftar)->format('d-M-y')}}</td>
                                <td class="text-center">{{$data->nama_siswa}}</td>
                                <td class="text-center">{{$data->nisn}}</td>
                                <td class="text-center">{{$data->jurusan}}</td>
                                <td class="text-center">{{$data->kelas}}</td>
                                <td class="text-center">
                                    @if($data->status== 1)
                                    <span class="label label-sm label-info">Belum Di Proses</span>
                                    @elseif($data->status== 2)
                                    <span class="label label-sm label-warning">Sedang Di Proses</span>
                                    @elseif($data->status== 3)
                                    <span class="label label-sm label-success">Selesai</span>
                                    @else
                                    <span class="label label-sm label-danger">Ditolak</span>
                                    @endif
                                    </td>
                                <td class="text-center">
                                    @if($data->keterangan == 'Dapat Bantuan')
                                    <span class="label label-sm label-success">Dapat Bantuan</span>
                                    @elseif($data->keterangan == 'Tidak Dapat Bantuan')
                                    <span class="label label-sm label-danger">Tidak Dapat Bantuan</span>
                                    @else
                                    -
                                    @endif
                                </td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
                </div>
            </div>
        </div>

            <!-- Modal DAFTAR BANSOS -->
    <div class="modal fade" id="modal-daftar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="page-header">
                    <h1>
                        Pendaftaran Bantuan Sosial Siswa
                    </h1>
                </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <!-- PAGE CONTENT BEGINS -->
                        <form action="/siswa/daftar_bansos" class="form-horizontal" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama Lengkap : </label>
                                <div class="col-sm-9">
                                <input type="text" id="form-field-1" class="col-xs-10 col-sm-8" name="nama_siswa" value="{{Auth::user()->nama_siswa}}" readonly/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> NISN : </label>
                                <div class="col-sm-9">
                                    <input type="text" id="form-field-1" class="col-xs-10 col-sm-8" name="nisn" value="{{Auth::user()->nisn}}" readonly/>
                                </div>
                            </div>
                        </div>                        
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Jurusan : </label>
                            <div class="col-sm-9">
                            @if($join_jurusan->id_jurusan == 1)
                            <input type="text" id="form-field-1" class="col-xs-10 col-sm-8" name="jurusan"  value="Teknik Komputer Dan Jaringan" readonly/>
                            @else
                            <input type="text" id="form-field-1" class="col-xs-10 col-sm-8" name="jurusan"  value="Teknik Kendaraan Ringan" readonly/>
                            @endif
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kelas : </label>
                            <div class="col-sm-9">
                            <input type="text" id="form-field-1" class="col-xs-10 col-sm-8" name="kelas" value="{{$join_kelas->kelas}}" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" id="form-field-1" class="col-xs-8 col-sm-8" name="tgl_daftar" value="{{ $tanggal }}" hidden/>
                            </div>
                </div>
                </div>
                <hr style="background-color: black">
                <h5 class="text-center"><b>Silahkan Isi Data Di Bawah ini</b></h5>
                <div class="space-8"></div>
                <div class="row">
                    <div class="col-xs-12">
                            <div class="form-group">
                                    <label for="form-field-select-3">Status Kelengkapan Orang Tua : </label>
                                    <br />
                                    <select class="form-control" id="status_kelengkapan_ortu" name="status_kelengkapan_ortu">
                                        <option>--Silahkan Pilih--</option>
                                        <option value="Lengkap">Lengkap </option>
                                        <option value="Tidak Lengkap">Tidak Lengkap</option>
                                    </select>
                                </div>
                            <div class="form-group" id="status_yatim">
                                    <label for="form-field-select-3">Status Yatim : </label>
                                    <br />
                                    <select class="form-control" id="" name="status_yatimpiatu">
                                        <option value="">-</option>
                                        <option value="Tanpa Ayah">Tanpa Ayah</option>
                                        <option value="Tanpa Ibu">Tanpa Ibu</option>
                                        <option value="Tanpa Ayah Dan Ibu">Tanpa Ayah Dan Ibu</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="form-field-select-3">Status Kepemilikan Rumah Orang Tua : </label>
                                    <br />
                                    <select class="form-control" id="" name="status_rumah_ortu">
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
                                        <option>--Silahkan Pilih--</option>
                                        <option value="Ada">Ada</option>
                                        <option value="Tidak Ada">Tidak Ada</option>
                                    </select>
                                </div>
                                <div class="form-group" id="sk_tidak_mampu">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Upload Surat : </label>
                                    <div class="col-sm-9">
                                        <input type="file" class="col-xs-10 col-sm-8" name="foto"/>
                                        <span class="text-danger">*JPEG, JPEG, PNG<span>
                                    </div>
                                </div>
                                <div class="form-group">
                                  <div class="col-sm-9">
                                        <input type="text" class="col-xs-10 col-sm-8" name="status" value="1" hidden/>
                                    </div>
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

  


@endsection