@extends('layout/masteradmin')

@section('judul' , 'Halaman Edit Data Kriteria')

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
                        <a href="/admin/data_kriteria">Data Kriteria</a>
                    </li>
                    <li>
                        <i class="ace-icon fa fa-database home-icon"></i>
                        <a href="#">Edit Data Kriteria</a>
                    </li>
                </ul><!-- /.breadcrumb -->
            </div>
        <div class="page-content">
        <div class="row">
            <div class="col-md-8">
                <form action="/admin/update_datakriteria/{{$data->id}}" class="form-horizontal" method="POST" enctype="multipart/form-data">
                    @method('PATCH')
                    {{ csrf_field() }}
                    <br>
                    <br>
                    <br>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-3 control-label no-padding-right" for="form-field-1-1"> ID Kriteria</label>
                            <div class="col-sm-9">
                            <input type="text" id="form-field-1-1" placeholder="Silahkan di isi" class="form-control" name="nama_siswa" required value="{{$data->id}}" disabled/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label no-padding-right" for="form-field-1-1">Kriteria</label>
                            <div class="col-sm-9">
                                <input type="text" id="form-field-1-1" placeholder="Silahkan di isi" class="form-control" name="nama_siswa" required value="{{$data->kriteria}}"/>
                            </div>
                        </div>
                        <!-- PAGE CONTENT ENDS -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
                <div class="row">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-success btn-block"><i class="fa fa-save"> Simpan</button></i>
                        <a href="/admin/data_kriteria" class="btn btn-info btn-block"><i class="fa fa-reply"> Kembali</a></i>
                    </div><!-- /.page-content -->
                </div>
                </form>
            </div>
         </div><!-- /.main-content -->

    
@endsection