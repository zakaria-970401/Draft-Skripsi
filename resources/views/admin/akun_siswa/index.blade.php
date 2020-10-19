@extends('layout/masteradmin')

@section('judul', 'Halaman Akun Siswa')

@section('konten')


<div class="main-content-inner">
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="/admin">Home</a>
            </li>
            <li>
                <i class="ace-icon fa fa-users home-icon"></i>
                <a href="#">Akun Siswa</a>
            </li>
        </ul><!-- /.breadcrumb -->
    </div>
    <br>
    <div class="page-header">
        <h1>
            Master Data Akun Siswa/Siswi 
        </h1>
    
        <div class="space-6"></div>
        <div class="page-content">
            <div class="row">
                <div class="col-xs-12">
                    <button type="button" data-target="#modal-daftar" data-toggle="modal" class="btn btn-info"><i class="fa fa-plus"> Tambah Akun Siswa</button></i>
                    <a href="#modal-excel" data-toggle="modal" class="btn btn-success"><i class="fa fa-file-excel-o"> Import Excel Akun Siswa</a></i>
                    <a href="/admin/export_akunsiswa" class="btn btn-warning"><i class="fa fa-cloud-download"> Download Excel Akun Siswa</a></i>
                    <div class="space-6"></div>
                    <table id="myTable" class="display">
                        <thead>
                            <tr>
                                <th class="text-center">No.</th>
                                <th class="text-center">Nama Siswa</th>
                                <th class="text-center">NISN</th>
                                <th class="text-center">Jurusan</th>
                                <th class="text-center">Kelas</th>
                                <th class="text-center">E-mail</th>
                                <th class="text-center">Password</th>
                                <th class="text-center">Foto</th>
                                <th class="text-center">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach ($join_loop as $sw)
                                <td class="text-center">{{$loop->iteration}}</td>
                                <td class="text-center">{{$sw->nama_siswa}}</td>
                                <td class="text-center">{{$sw->nisn}}</td>
                                <td class="text-center">
                                    @if($sw->jurusan== 'Teknik Komputer Dan Jarngan')
                                    TKJ
                                    @else
                                    TKR
                                    @endif
                                </td>
                                <td class="text-center">{{$sw->kelas}}</td>
                                <td class="text-center">{{$sw->email}}</td>
                                <td class="text-center">*********</td>
                                <td class="text-center">
                                    <center><img class="img-responsive" src="{{asset('foto_akunsiswa/'.$sw->foto)}}" style="width: 78px" alt="" />
                                </td>
                                <td class="text-center">
                                    <a href="/admin/edit_akunsiswa/{{$sw->id}}" class="btn btn-info btn-sm">
                                        <i class="fa fa-pencil"> Edit</i></a>
                                        <a href="/admin/hapus_akunsiswa/{{$sw->id}}" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"> Hapus</i></a>
                                </td>        
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

           <!-- Modal DAFTAR BANSOS -->
   <div class="modal fade" id="modal-excel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <div class="page-header">
                <h1>
                   Import Akun Siswa
                </h1>
            </div>
        <div class="modal-body">
                    <!-- PAGE CONTENT BEGINS -->
                    <form action="/admin/import_akun_siswa" class="form-horizontal" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-10">
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
                                <a href="/template_excel/TEMPLATE_AKUN_SISWA.xlsx" class="btn btn-success btn-lg"><i class="fa fa-download"> Download Template Excel </a></i>
                                </div>
                            </div>
                                <div class="form-group" id="excel-datatraining">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Upload File : </label>
                                    <div class="col-sm-9">
                                    <input type="file" id="form-field-1-1" placeholder="Silahkan di isi" class="form-control @error('file') is-invalid @enderror" name="file" required value="{{old('file')}}"/>
                                    <span class="text-danger">*CSV, XLSX, XLX</span>
                                        @error('file')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
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
    <div class="modal fade" id="modal-daftar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="page-header">
                    <h1>
                       Tambah Akun Siswa
                    </h1>
                </div>
            <div class="modal-body">
                        <!-- PAGE CONTENT BEGINS -->
                        <form action="/admin/insert_akunsiswa" class="form-horizontal" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
						<div class="row">
							<div class="col-md-12">
                                    <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Nama Siswa : </label>
										<div class="col-sm-9">
                                        <input type="text" id="form-field-1-1" placeholder="Silahkan di isi" class="form-control" name="nama_siswa" required value="{{old('nama_siswa')}}"/>
										</div>
                                    </div>
                                    <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> NISN : </label>
										<div class="col-sm-9">
                                        <input type="text" id="form-field-1-1" placeholder="Silahkan di isi" class="form-control @error('nisn') is-invalid @enderror" name="nisn" required value="{{old('nisn')}}"/>
                                            @error('nisn')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Email : </label>
										<div class="col-md-6">
                                        <input type="text" id="form-field-1-1" placeholder="Silahkan di isi" class="form-control @error('email') is-invalid @enderror" name="email_dpn" required value="{{old('email')}}"/>
                                            @error('email')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
										<div class="col-md-3">
                                        <input type="text" id="form-field-1-1" class="form-control @error('email') is-invalid @enderror" name="email_blkg" value="@kgj.com" readonly/>
                                            @error('email')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Password : </label>
										<div class="col-sm-9">
                                        <input type="text" id="form-field-1-1" placeholder="Silahkan di isi" class="form-control @error('password') is-invalid @enderror" name="password" required value="{{old('password')}}"/>
                                            @error('password')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Konfirmasi Password : </label>
										<div class="col-sm-9">
                                        <input type="text" id="form-field-1-1" placeholder="Silahkan di isi" class="form-control @error('konfirmasi_password') is-invalid @enderror" name="konfirmasi_password" required value="{{old('konfirmasi_password')}}"/>
                                            @error('konfirmasi_password')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Foto : </label>
										<div class="col-sm-9">
                                        <input type="file" id="form-field-1-1" placeholder="Silahkan di isi" class="form-control @error('foto') is-invalid @enderror" name="foto" required value="{{old('foto')}}"/>
                                            @error('foto')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
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
     
     

            
@endsection