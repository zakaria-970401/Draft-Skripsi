@extends('layout/masteradmin')

@section('judul', 'Halaman Data Siswa')

@section('konten')


<div class="main-content-inner">
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
            </li>
            <li>
                <i class="ace-icon fa fa-users home-icon"></i>
                <a href="#">Data Siswa/Siswi</a>
            </li>
        </ul><!-- /.breadcrumb -->
    </div>
    <br>
    <div class="page-header">
        <h1>
            Master Data Siswa-Siswa SMK KARYA GUNA JAYA 
        </h1>
        <br>
        @if (session('status'))
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5><i class="fa fa-check"></i> Notifikasi</h5>
          <b>{{session ('status') }}</b>
        </div>           
      
        @endif

        <div class="space-6"></div>
        <div class="page-content">
            <div class="row">
                <div class="col-xs-12">
                    <button type="button" data-target="#modal-daftar" data-toggle="modal" class="btn btn-info"><i class="fa fa-plus"> Tambah Data Siswa</button></i>
                    <a href="#modal-excel" data-toggle="modal" class="btn btn-success"><i class="fa fa-file-excel-o"> Import Excel Data Siswa</a></i>
                    <a href="/admin/export_datasiswa" class="btn btn-warning"><i class="fa fa-cloud-download"> Download Excel Data Siswa</a></i>
                    <div class="space-6"></div>
                    <table id="myTable" class="display">
                        <thead>
                            <tr>
                                <th class="text-center">No.</th>
                                <th class="text-center">Nama Siswa</th>
                                <th class="text-center">NISN</th>
                                <th class="text-center">Jurusan</th>
                                <th class="text-center">Kelas</th>
                                <th class="text-center">Foto</th>
                                <th class="text-center">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach ($siswa as $sw)
                                <td class="text-center">{{ $loop->iteration}}</td>
                                <td class="text-center">{{$sw->nama_siswa}}</td>
                                 <td class="text-center">{{$sw->nisn}}</td>
                                <td class="text-center">
                                @if($sw->id_jurusan == '1')
                                    TKJ
                                @else
                                    TKR
                                @endif
                                </td>
                                <td class="text-center">
                                    @if($sw->id_kelas == 'K01')
                                    X-TKJ-A
                                    @elseif($sw->id_kelas == 'K02')
                                    X-TKJ-B
                                    @elseif($sw->id_kelas == 'K03')
                                    X-TKJ-C
                                    @elseif($sw->id_kelas == 'K04')
                                    X-TKJ-D
                                    @elseif($sw->id_kelas == 'K05')
                                    XI-TKJ-A
                                    @elseif($sw->id_kelas == 'K06')
                                    XI-TKJ-B
                                    @elseif($sw->id_kelas == 'K07')
                                    XI-TKJ-C
                                    @elseif($sw->id_kelas == 'K08')
                                    XII-TKJ-A
                                    @elseif($sw->id_kelas == 'K09')
                                    XII-TKJ-B
                                    @elseif($sw->id_kelas == 'K10')
                                    XII-TKJ-C
                                    @elseif($sw->id_kelas == 'K11')
                                    X-TKR-A
                                    @elseif($sw->id_kelas == 'K12')
                                    X-TKR-B
                                    @elseif($sw->id_kelas == 'K13')
                                    X-TKR-C
                                    @elseif($sw->id_kelas == 'K14')
                                    XI-TKR-A
                                    @elseif($sw->id_kelas == 'K15')
                                    XI-TKR-B
                                    @elseif($sw->id_kelas == 'K16')
                                    XI-TKR-C
                                    @elseif($sw->id_kelas == 'K17')
                                    XII-TKR-A
                                    @elseif($sw->id_kelas == 'K18')
                                    XII-TKR-B
                                    @elseif($sw->id_kelas == 'K19')
                                    XII-TKR-C
                                    @endif
                                </td>
                                <td class="text-center">
                                    <center><img class="img-responsive" src="{{asset('fotosiswa/'.$sw->foto)}}" style="width: 78px" alt="" />
                                    </td>
                                    <td class="text-center">
                                        <a href="/admin/hapus_datasiswa/{{$sw->id}}" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"> Hapus</i></a>
                                        <a href="/admin/edit_datasiswa/{{$sw->id}}" class="btn btn-info btn-sm">
                                            <i class="fa fa-eye"> Detail</i></a>
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
    <div class="modal fade" id="modal-daftar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="page-header">
                    <h1>
                       Tambah Data Siswa
                    </h1>
                </div>
            <div class="modal-body">
                        <!-- PAGE CONTENT BEGINS -->
                        <form action="/admin/insertsiswa" class="form-horizontal" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
	                        <div class="space-4"></div>
                            <div class="row">
                                <div class="col-md-6" id="upload_manual1">
                                    <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Nama Siswa : </label>
										<div class="col-sm-9">
                                        <input type="text" id="form-field-1-1" placeholder="Silahkan di isi" class="form-control" name="nama_siswa" required value="{{old('nama_siswa')}}"/>
										</div>
                                    </div>
                                    <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Nisn Siswa : </label>
										<div class="col-sm-9">
                                        <input type="text" id="form-field-1-1" placeholder="Silahkan di isi" class="form-control @error('nisn') is-invalid @enderror" name="nisn" required value="{{old('nisn')}}"/>
                                            @error('nisn')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Jurusan : </label>
										<div class="col-sm-9">
											<select class="form-control" name="jurusan" required>
                                                <option>Silahkan Pilih</option>
                                                <option value="TKJ">Teknik Komputer Dan Jaringan</option>
                                                <option value="TKR">Teknik Kendaraan Ringan</option>
                                            </select>
                                        </div>
									 </div>
                                    <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kelas : </label>
										<div class="col-sm-9">
											<select class="form-control" name="id_kelas" required>
                                                <option>Silahkan Pilih</option>
                                                <option value="X-TKJ-A">X-TKJ-A</option>
                                                <option value="X-TKJ-B">X-TKJ-B</option>
                                            </select>
                                        </div>
									 </div>
                                    <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Agama : </label>
										<div class="col-sm-9">
											<select class="form-control" name="id_agama" required>
                                                <option>Silahkan Pilih</option>
                                                <option value="Islam">Islam</option>
                                                <option value="Kristen">Kristen</option>
                                            </select>
                                        </div>
									 </div>
                                    <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Jenis Kelamin : </label>
										<div class="col-sm-9">
											<select class="form-control" name="jenis_kelamin" required>
                                                <option>Silahkan Pilih</option>
                                                <option value="Laki-Laki">Laki-Laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                     </div>
                                     <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Tempat Lahir : </label>
										<div class="col-sm-9">
                                        <input type="text" id="form-field-1-1" placeholder="Silahkan di isi" class="form-control" required name="tempat_lahir" value="{{old('tempat_lahir')}}"/>
										</div>
                                    </div>
                                </div>
                                <div class="col-md-6" id="upload_manual2">
                                    <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Tanggal Lahir : </label>
										<div class="col-sm-9">
                                        <input type="date" id="form-field-1-1" placeholder="Silahkan di isi" class="form-control" name="tanggal_lahir"required value="{{old('tanggal_lahir')}}"/>
										</div>
                                    </div>
                                    <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Alamat Siswa : </label>
										<div class="col-sm-9">
                                        <input type="text" id="form-field-1-1" placeholder="Silahkan di isi" class="form-control" name="alamat" required value="{{old('alamat')}}"/>
										</div>
                                    </div>

                                    <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> No.Hp : </label>
										<div class="col-sm-9">
                                            <input type="text" id="form-field-1-1" placeholder="Silahkan di isi" class="form-control" name="no_hp" required value="{{old('no_hp')}}"/>
										</div>
                                    </div>
                                    <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Nama Ayah : </label>
										<div class="col-sm-9">
                                        <input type="text" id="form-field-1-1" placeholder="Silahkan di isi" class="form-control" name="nama_ayah" required value="{{old('nama_ayah')}}"/>
										</div>
                                    </div>
                                    <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Nama Ibu : </label>
										<div class="col-sm-9">
                                        <input type="text" id="form-field-1-1" placeholder="Silahkan di isi" class="form-control" name="nama_ibu" required value="{{old('nama_ibu')}}"/>
										</div>
                                    </div>
                                    <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Foto : </label>
										<div class="col-sm-9">
											<input type="file" id="form-field-1-1" placeholder="Silahkan di isi" class="form-control" name="foto" required value="{{old('foto')}}" />
                                        </div>
                                    </div>
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

   <!-- Modal DAFTAR BANSOS -->
   <div class="modal fade" id="modal-excel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <div class="page-header">
                <h1>
                   Import Excel Data Siswa
                </h1>
            </div>
                <div class="modal-body">
                    <!-- PAGE CONTENT BEGINS -->
                    <form action="/admin/import_datasiswa" class="form-horizontal" method="POST" enctype="multipart/form-data">
                       @csrf
                    <div class="row">
                        <div class="col-md-10">
                            <!-- PAGE CONTENT BEGINS -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> File Excel : </label>
                                <div class="col-md-9">
                                    <select class="form-control" id="file_excel">
                                        <option>Silahkan Pilih</option>
                                        <option value="Belum Ada">Belum Ada</option>
                                        <option value="Sudah Ada">Sudah Ada</option>
                                    </select>
                                </div>
                             </div>
                                <div class="form-group" id="download_excel">
                                     <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"></label>
                                     <div class="col-md-9">
                                     <a href="/template_excel/TEMPLATE_DATA_SISWA.xlsx" class="btn btn-success btn-lg"><i class="fa fa-download"> Download Excel Template Upload Siswa</a></i>
                                     </div>
                                 </div>
                                 </div>
                                <div class="form-group" id="upload_excel">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Upload File : </label>
                                    <div class="col-sm-9">
                                        <input type="file" id="form-field-1-1" placeholder="Silahkan di isi" class="form-control" name="file" />
                                        <span class="text-danger">*csv,xls,xlsx</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-success"><i class="fa fa-upload"> Import</button></i>
                        </div>
                    </div>
                </div>
            </form>
        </div>
     </div>



@endsection