@extends('layout/masteradmin')

@section('judul', 'Halaman Akun Admin')

@section('konten')


<div class="main-content-inner">
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="/admin">Home</a>
            </li>
            <li>
                <i class="ace-icon fa fa-user home-icon"></i>
                <a href="#">Akun Admin</a>
            </li>
        </ul><!-- /.breadcrumb -->
    </div>
    <br>
    <div class="page-header">
        <h1>
            Master Data Akun Admin
        </h1>
    
        <div class="space-6"></div>
        <div class="page-content">
            <div class="row">
                <div class="col-xs-12">
                    <button type="button" data-target="#modal-daftar" data-toggle="modal" class="btn btn-primary"><i class="fa fa-plus"> Tambah Akun Admin </button></i>
                    <div class="space-6"></div>
                    <table id="myTable" class="display">
                        <thead>
                            <tr>
                                <th class="text-center">No.</th>
                                <th class="text-center">Nama Admin</th>
                                <th class="text-center">E-mail</th>
                                <th class="text-center">Password</th>
                                <th class="text-center">Foto</th>
                                <th class="text-center">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach ($admin as $data)
                            <td class="text-center">{{$loop->iteration}}</td>
                                <td class="text-center">{{$data->nama}}</td>
                                <td class="text-center">{{$data->email}}</td>
                                <td class="text-center">*******</td>
                                <td class="text-center">
                                <center><img class="img-responsive" src=" {{ asset('foto_akunadmin/'.$data->foto)}}" style="width: 78px" alt="" />
                                    </td>
                                    <td class="text-center">
                                    <a href="/admin/get_edit_akunadmin/{{$data->id}}" class="btn btn-info btn-sm">
                                            <i class="fa fa-pencil"> Edit</i></a>
                                        <a href="/admin/hapus_akunadmin/{{$data->id}}" class="btn btn-danger btn-sm">
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
    <div class="modal fade" id="modal-daftar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="page-header">
                    <h1>
                       Tambah Akun Admin
                    </h1>
                </div>
            <div class="modal-body">
                        <!-- PAGE CONTENT BEGINS -->
                        <form action="/admin/post_akunadmin" class="form-horizontal" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
						<div class="row">
							<div class="col-md-10">
                                    <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Nama Lengkap : </label>
										<div class="col-sm-9">
                                        <input type="text" id="form-field-1-1" placeholder="Silahkan di isi" class="form-control" name="nama" required value="{{old('nama')}}"/>
                                    </div>
                                    <div class="form-group">
                                    
                                        <input type="hidden" id="form-field-1-1" placeholder="Silahkan di isi" class="form-control" name="nisn" value="0"/>
                                        
                                    </div>
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> E-mail : </label>
										<div class="col-sm-9">
                                        <input type="text" id="form-field-1-1" placeholder="Silahkan di isi" class="form-control @error('email') is-invalid @enderror" name="email" required value="{{old('email')}}"/>
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