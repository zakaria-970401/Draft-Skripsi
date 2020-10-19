@extends('layout/masteradmin')

@section('judul', 'Halaman Data Wali Kelas')

@section('konten')
<div class="breadcrumbs ace-save-state" id="breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="/admin">Home</a>
        </li>
        <li>
            <i class="ace-icon fa fa-users home-icon"></i>
            <a href="#">Data Wali Kelas</a>
        </li>
    </ul><!-- /.breadcrumb -->
</div>
<div class="page-content">
    <div class="row">
        <div class="col-xs-12">
            <div class="space-6"></div>
            <button type="button" data-target="#modal-daftar" data-toggle="modal" class="btn btn-primary"><i class="fa fa-plus"> Tambah Data Walas </button></i>
            <a href="/admin/export_akunwalas" class="btn btn-warning"><i class="fa fa-cloud-download"> Download Excel Akun Walikelas</a></i>
            <h4 class="header blue bolder ">DATA WALI KELAS</h4>
            <table id="myTable" class="display">
                    <thead>
                        <tr>
                            <th class="text-center">No.</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">NUPTK</th>
                            <th class="text-center">Wali Kelas</th>
                            <th class="text-center">Foto</th>
                            <th class="text-center">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($walas as $data)    
                        <tr>
                            <td class="text-center">{{$loop->iteration}}</td>
                            <td class="text-center">{{$data->nama}}</td>
                            <td class="text-center">{{$data->nuptk}}</td>
                            <td class="text-center">{{$data->walikelas}}
                            </td>
                            <td class="text-center">
                                <center><img class="img-responsive" src=" {{ asset('foto_walas/'.$data->foto)}}" style="width: 78px" alt="" />
                            </td>
                            <td class="text-center">
                                <a href="/admin/hapus_datawalas/{{$data->id}}" class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"> Hapus</i></a>
                                <a href="/admin/edit_walas/{{$data->id}}" class="btn btn-info btn-sm">
                                    <i class="fa fa-pencil"> Edit</i></a>
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
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="page-header">
                    <h1>
                       Tambah Data Wali Kelas
                    </h1>
                </div>
            <div class="modal-body">
                        <!-- PAGE CONTENT BEGINS -->
                        <form action="/admin/post_walas" class="form-horizontal" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
						<div class="row">
							<div class="col-md-10">
                                <h3 class="header smaller lighter blue">Infromasi Pribadi Walikelas</h3>
                                    <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Nama : </label>
										<div class="col-sm-9">
                                        <input type="text" id="form-field-1-1" placeholder="Silahkan di isi" class="form-control" name="nama" required value="{{old('nama')}}"/>
                                    </div>
                                    </div>
                                    <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> NUPTK : </label>
										<div class="col-sm-9">
                                        <input type="text" id="form-field-1-1" placeholder="Silahkan di isi" class="form-control" name="nuptk" required/>
                                    </div>
                                    </div>
                                    <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Wali Kelas : </label>
										<div class="col-sm-9">
                                                <select class="form-control my_select" id="" name="walikelas">
                                                    <option>--Silahkan Pilih--</option>
                                                    @foreach ($loopkelas as $kls)
                                                    <option value="{{$kls->kelas}}">{{$kls->kelas}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <h3 class="header smaller lighter blue">Akun Walikelas</h3>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> E-mail : </label>
                                            <div class="col-sm-9">
                                            <input type="email" id="form-field-1-1" placeholder="Silahkan di isi" class="form-control" name="email" required/>
                                        </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Password : </label>
                                            <div class="col-sm-9">
                                            <input type="password" id="form-field-1-1" placeholder="Silahkan di isi" class="form-control" name="password" required/>
                                        </div>
                                        </div>
                                    <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Foto : </label>
										<div class="col-sm-9">
                                        <input type="file" id="form-field-1-1" placeholder="Silahkan di isi" class="form-control" name="foto" required>
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