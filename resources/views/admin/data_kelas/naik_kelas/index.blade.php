@extends('layout/masteradmin')

@section('judul', 'Halaman Naik Kelas')

@section('konten')

<div class="main-content-inner">
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="/admin">Home</a>
            </li>
            <li>
                <i class="ace-icon fa fa-university home-icon"></i>
                <a href="/admin/naik_kelas">Setting Kenaikan Kelas</a>
            </li>
        </ul><!-- /.breadcrumb -->
    </div>
    <br>
    
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <form action="/admin/naik_kelas" method="POST">
                    @csrf
                <h3 class="header smaller lighter blue">Kenaikan Kelas Siswa</h3>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Dari Kelas : </label>
                    <div class="col-sm-9">
                        <select class="form-control" name="darikelas[]" required>
                            <option>Silahkan Pilih</option>
                            @foreach ($kelas as $data)                                
                            <option value="{{$data->id_kelas}}">{{$data->kelas}}</option>
                            @endforeach
                        </select>
                    </div>
                 </div>
                 <hr style="background-color: black">
                 <hr style="background-color: black">
                 <hr style="background-color: black">
                 <hr style="background-color: black">
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Ke Kelas : </label>
                    <div class="col-sm-9">
                        <select class="form-control" name="kekelas" required>
                            <option>Silahkan Pilih</option>
                            @foreach ($kelas as $data)                                
                            <option value="{{$data->id_kelas}}">{{$data->kelas}}</option>
                            @endforeach
                            <option value="Lulus">Lulus</option>
                        </select>
                    </div>
                 </div>
                 <br>
                 <br>
                 <br>
                 <a href="#modalkelas" data-toggle="modal" class="btn btn-success btn-block"><i class="fa fa-save"> Simpan</a></i>
                </div>
            </div>

            <div class="modal fade" id="modalkelas" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h3 class="modal-title">Apakah Anda Yakin?</h3>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                      <button type="submit" class="btn btn-success"><i class="fa fa-check"> Ya, Lanjutkan</button></i>
                    </div>
                  </div>
                </div>
             </div>
        
		

    
@endsection