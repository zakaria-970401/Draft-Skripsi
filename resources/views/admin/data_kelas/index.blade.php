@extends('layout/masteradmin')

@section('judul', 'Halaman Data Kelas')

@section('konten')
<div class="breadcrumbs ace-save-state" id="breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="#">Home</a>
        </li>
        <li>
            <i class="ace-icon fa fa-university home-icon"></i>
            <a href="#">Data Kelas</a>
        </li>
    </ul><!-- /.breadcrumb -->
</div>
<div class="page-content">
    <div class="row">
        <div class="col-xs-12">
            <h4 class="header blue bolder ">DATA KELAS SMK KARYA GUNA JAYA</h4>
            <a href="#modal-kelas" data-toggle="modal" class="btn btn-primary btn-sm"><i class="fa fa-plus">  Tambah Kelas</i></a>
            <br>
            <br>
            <table id="myTable" class="display">
                    <thead>
                        <tr>
                            <th class="text-center">No.</th>
                            <th class="text-center">Kelas</th>
                            <th class="text-center">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data_kelas as $data)    
                        <tr>
                            <td class="text-center">{{$loop->iteration}}</td>
                            <td class="text-center">{{$data->kelas}}</td>
                            <td class="text-center">
                                <a href="/admin/detail_kelas/{{$data->id}}" class="btn btn-info btn-sm">
                                    <i class="fa fa-eye"> Detail</i></a>
                                    <a href="/admin/hapus_kelas/{{$data->id}}" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"> Hapus</i></a>
                                </td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>  
        </div>
    </div>

    <div class="modal fade" id="modal-kelas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                    <h4>
                        Form Edit Kelas
                    </h4>   	  
            </div>
              <div class="modal-body">
              <form action="/admin/tambah_datakelas" class="form-horizontal" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-10">
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Jurusan : </label>
                            <div class="col-sm-9">
                                <select class="form-control" name="id_jurusan" required>
                                    <option>Silahkan Pilih</option>
                                    <option value="1">Teknik Komputer Dan Jaringan</option>
                                    <option value="2">Teknik Kendaraan Ringan</option>
                                </select>
                            </div>
                         </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> ID Akhir Kelas : </label>
                            <div class="col-sm-9">
                            <input type="text" id="form-field-1-1" placeholder="Silahkan di isi" class="form-control" name="" value="{{$kelas_terakhir->id_kelas}}" disabled/>
                        </div>
                       </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> ID Kelas : </label>
                            <div class="col-sm-9">
                            <input type="text" id="form-field-1-1" placeholder="Silahkan di isi" class="form-control" name="id_kelas" required/>
                        </div>
                       </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Nama Kelas : </label>
                            <div class="col-sm-9">
                            <input type="text" id="form-field-1-1" placeholder="Silahkan di isi" class="form-control" name="kelas" required/>
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