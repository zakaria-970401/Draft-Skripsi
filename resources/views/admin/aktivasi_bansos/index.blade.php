@extends('layout/masteradmin')

@section('judul', 'Halaman Aktivasi Pendaftaran Bansos')

@section('konten')

<div class="main-content-inner">
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="/admin">Home</a>
            </li>
            <li>
                <i class="ace-icon fa fa-power-off home-icon"></i>
                <a href="#">Setting Aktivasi Bansos Siswa </a>
            </li>
        </ul><!-- /.breadcrumb -->
    </div>
    <br>
    
    <div class="card">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
              <div class="card-body">
                <h3 class="header smaller lighter blue">Hidupkan/Matikan Pendaftaran Bansos Siswa</h3>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="center">Status Registrasi Bansos</th>
                            <th class="center">Opsi</th>
                        </tr>
                    </thead>
                    @if($status->status == 1)
                    <tbody>
                      <tr>
                        <td class="center"><h4>
                            <div style="width:400px;" data-percent="SEDANG AKTIF" class="inline middle no-margin progress progress-striped active pos-rel">
                              <div class="progress-bar progress-bar-success" style="width:150%"></div>
                            </div>
                            </h4>
                    </td>
                        <td class="center">
                          <a href="/admin/aktivasi_bansos/{{$status->id}}" class="btn btn-danger btn-md"><i class="fa fa-power-off"> Non-aktifkan Pendaftaran</i></a>
                        </td>
                      </tr>
                    </tbody>
                    @endif
                    @if($status->status == 2)
                    <tbody>
                      <tr>
                        <td class="center">
                            <h5>
                              <div style="width:400px;" data-percent="NONAKTIF" class="inline middle no-margin progress progress-striped active pos-rel">
                                <div class="progress-bar progress-bar-danger" style="width:150%"></div>
                              </div>                        </h5>
                    </td>
                        <td class="center">
                        <a href="/admin/aktivasi_bansos/{{$status->id}}" class="btn btn-success btn-md"><i class="fa fa-check"> aktifkan Pendaftaran</i></a>
                        </td>
                      </tr>
                    </tbody>
                    @endif
                  </table>
                </div>
              </div>
            </div>
            </div>
    
           
    
    @endsection