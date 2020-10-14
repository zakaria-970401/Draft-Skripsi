@extends('layout/mastersiswa')

@section('judul' , 'Halaman Detail Dataset Siswa')

@section('konten')

<div class="page-header">
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="/siswa">Home</a>
            </li>
            <li>
                <i class="ace-icon fa fa-eye home-icon"></i>
                <a href="#">Detail Data Bansos Siswa</a>
            </li>
        </ul><!-- /.breadcrumb -->
    </div>

    
<div class="page-content">
    <div class="row">
        <div class="col-xs-10">
                    <div class="space-12"></div>
                    <h3 class="header smaller lighter blue">Detail  Data Bansos {{Auth::user()->nama_siswa}}</h3>
                    <div class="col-xs-8">
                        <a href="/siswa/" class="btn btn-primary"> <i class="fa fa-reply">   Kembali</i></a>
                    </div>
                    <div class="col-xs-4">
                    @if($status->status == 3)
                    <a href="/siswa/print_databansos/{{$status->id}}" class="btn btn-success"> <i class="fa fa-print"> Print Surat Pengantar</i></a>
                    @else
                    @endif
                    </div>
                    <br>
                    <br>
                    <br>
        
                    <div class="profile-user-info profile-user-info-striped">
                        <div class="profile-info-row">
                            <div class="profile-user-info profile-user-info-striped">
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Nama Siswa </div>
        
                                    <div class="profile-info-value">
                                        <input type="hidden" name="nama_siswa" value="{{$status->nama_siswa}}">
                                        <span class="editable" id="username">
                                            {{$status->nama_siswa}}
                                        </span>
                                    </div>
                                </div>
        
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> NISN </div>
                                    <div class="profile-info-value">
                                        <input type="hidden" name="nisn" value="{{$status->nisn}}">
                                        <span class="editable" id="country">
                                            {{$status->nisn}}
                                        </span>
                                    </div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Tanggal Pendaftaran </div>
                                    <div class="profile-info-value">
                                        <input type="hidden" name="tgl_daftar" value="{{$status->tgl_daftar}}">
                                        {{Carbon\Carbon::parse($status->tgl_daftar)->format('d-M-y')}}
                                    </div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Jurusan </div>
                                    <div class="profile-info-value">
                                        {{$status->jurusan}}
                                    </div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Kelas </div>
                                    <input type="hidden" name="kelas" value="{{$status->kelas}}">
                                    <div class="profile-info-value">
                                        {{$status->kelas}}
                                    </div>
                                </div>
                              
                                <div class="profile-info-row">
                                    <div class="profile-info-name">Kelengkapan Ortu </div>
                                    <input type="hidden" name="status_kelengkapan_ortu" value="{{$status->status_kelengkapan_ortu}}">
                                    <div class="profile-info-value">
                                        {{$status->status_kelengkapan_ortu}}
                                    </div>
                                </div>
                                
                                <div class="profile-info-row">
                                    <div class="profile-info-name">Rumah Ortu </div>
                                    <input type="hidden" name="status_rumah_ortu" value="{{$status->status_rumah_ortu}}">
                                    <div class="profile-info-value">
                                        {{$status->status_rumah_ortu}}
                                    </div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name">Pekerjaan Wali </div>
                                    <input type="hidden" name="status_pekerjaan_wali" value="{{$status->status_pekerjaan_wali}}">
                                    <div class="profile-info-value">
                                        {{$status->status_pekerjaan_wali}}
                                    </div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name">SK Tidak Mampu </div>
                                    <input type="hidden" name="status_sk_tidakmampu" value="{{$status->status_sk_tidakmampu}}">
                                    <div class="profile-info-value">
                                        {{$status->status_sk_tidakmampu}}
                                    </div>
                                </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name">Foto SK Tidak Mampu </div>
                            <div class="profile-info-value">
                                @if($status->foto == Null)
                               Tidak Ada Lampiran
                               @else
                               <a href="#foto-sk" data-toggle="modal" class="btn btn-info btn-sm"> Lihat Lampiran</a>
                               @endif
                            </div>
                        </div>
                        @if($status->status == 4)
                        <div class="profile-info-row">
                            <div class="profile-info-name">Alasan Di Tolak </div>
                            <div class="profile-info-value">
                                <h4 class="text-center"><b>{{$status->alasan_tolak}}</b><h4>
                            </div>
                        </div>
                        @endif
                        <div class="profile-info-row">
                            <div class="profile-info-name">Pemeriksa </div>
                            <div class="profile-info-value">
                                <h4 class="text-center"><b>{{$status->pemeriksa}}</b>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                </div>
      


  
  <!-- Modal -->
  <div class="modal fade" id="foto-sk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Lampiran SK Tidak Mampu</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <img src="{{asset('foto_sktidakmampu/'.$status->foto)}}" style="height:30%">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->



      
@endsection