@extends('layout.masterwalas')
@section('judul', 'Halaman Hasil Perhitungan')

@section('konten')
<div class="col-xs-12">
    <h3 class="header smaller lighter blue">Perhitungan Algoritma Naive Baiyes</h3>
    <a href="/walas/bansos_anakdidik" class="btn btn-danger btn-xl"><i class="fa fa-reply"> Kembali</a></i>


      {{-- !!!!!!!!!!!!!!!!!! BATAS FORM ACTION!!!!!!!!!!!!!!!!!!!!!!!!--}}
    <form action="/walas/simpan_dataset_siswa" method="POST">
      @csrf
      {{-- INPUTAN NAMA SISWA NISN DAN TANGGAL DAFTAR--}}
      <input type="hidden" name="tgl_daftar" value="{{$tgl_daftar}}">
      <input type="hidden" name="nama_siswa" value="{{$nama_siswa}}">
      <input type="hidden" name="kelas" value="{{$kelas}}">
      <input type="hidden" name="nisn" value="{{$nisn}}">
      <input type="hidden" name="status" value="3">

    <br>
    <br>
    <div class="tabbable">
      <ul class="nav nav-tabs" id="myTab">
        <li>
          <a data-toggle="tab" href="#data-training">
            <i class="green ace-icon fa fa-archive bigger-120"></i>
            Data Training
          </a>
        </li>
        <li>
          <a data-toggle="tab" href="#hitung-label">
            <i class="green ace-icon fa fa-bars bigger-120"></i>
            Perhitungan Label/Class
          </a>
        </li>
        <li>
          <a data-toggle="tab" href="#hitung-atribut">
            <i class="green ace-icon fa fa-database bigger-120"></i>
            Perhitungan Data Atribut
          </a>
        </li>
        <li class="active">
          <a data-toggle="tab" href="#hasil-keputusan">
            <i class="green ace-icon fa fa-bar-chart-o bigger-120"></i>
            Hasil Keputusan
          </a>
        </li>
        </li>
      </ul>

      <div class="tab-content">
        <div id="data-training" class="tab-pane fade">
          <div class="space-6"></div>
          <div id="highcharts_datatraining"></div>
          <div class="table-header">
            DATA TRAINING
          </div>
          <table id="myTable" class="display">
              <thead>
                  <tr>
                      <th class="text-center">No.</th>
                      <th class="text-center">Tangal Daftar</th>
                      <th class="text-center">Nama</th>
                      <th class="text-center">NISN</th>
                      <th class="text-center">Kelas</th>
                      <th class="text-center">Kelengkapan Ortu</th>
                      <th class="text-center">Status YatimPiatu</th>
                      <th class="text-center">Status Rumah Ortu</th>
                      <th class="text-center">Status Pekerjaan Ortu</th>
                      <th class="text-center">SK Tidak Mampu</th>
                      <th class="text-center">Dokumen SK Tidak Mampu</th>
                      <th class="text-center">Keterangan</th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      @foreach ($datatraining as $data)
                      <td class="text-center">{{$loop->iteration}}</td>
                      <td class="text-center">
                          {{\Carbon\Carbon::parse($data->tanggal_daftar)->format('d-M-y')}}
                      </td>
                       <td class="text-center">{{$data->nama_siswa}}</td>
                       <td class="text-center">{{$data->nisn}}</td>
                       <td class="text-center">{{$data->kelas}}</td>
                       <td class="text-center">{{$data->status_kelengkapan_ortu}}</td>
                       <td class="text-center">
                           @if($data->status_yatimpiatu == null)
                           -
                           @else
                           {{$data->status_yatimpiatu}}
                           @endif
                          </td>
                       <td class="text-center">{{$data->status_rumah_ortu}}</td>
                       <td class="text-center">{{$data->status_pekerjaan_wali}}</td>
                       <td class="text-center">{{$data->status_sk_tidakmampu}}</td>
                       <td class="text-center">
                           @if($data->foto_sk_tidakmampu == null)
                           -
                           @else
                           {{$data->foto_sk_tidakmampu}}
                           @endif
                          </td>
                       <td class="text-center">
                           @if($data->keterangan == 'Dapat')
                           <span class="label label-sm label-success">Dapat Bantuan</span>
                           @else
                           <span class="label label-sm label-danger">Tidak Dapat Bantuan</span>
                           @endif
                          </td>
                      </td>
                  </tr>
                  @endforeach
              </tbody>
              </table>
          </div>
    
      <div class="clearfix">
        <div class="pull-right tableTools-container"></div>
    </div>

  
    <div id="hitung-label" class="tab-pane fade">
    <div class="row">
       <div class="col-xs-12">
            <h4 class="text-center">Menghitung Label/Class</h4>
        <table id="dynamic-table" class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                  <th class="center" colspan="3"><h5><b>P(C) = P(Class)</h5></th>
                </tr>
                <tr>
                  <th class="center"><h5>P(Dapat) / Total Data</h5></th>
                  <th class="center"><h5>P(Tidak Dapat) / Total Data </h5></th>
                </tr>
            </thead>
            <tbody>
              <tr>
                  <td class="center">{{$hitung_label_dapat}} / {{$hitung_total_datatraining}}</td>
                  <td class="center">{{$hitung_label_tdkdapat}} / {{$hitung_total_datatraining}}</td>
              </tr>
              <tr>
              <td class="center">
                <input type="hidden" name="label_dapat" value="{{$pembagian_label_dapat}}"><h5><b> Hasil : {{$pembagian_label_dapat}}
                  </h5>
                </td>
                  <td class="center">
                    <input type="hidden" name="label_tdkdapat" value="{{$pembagian_label_tdkdapat}}"><h5><b> Hasil : {{$pembagian_label_tdkdapat}}
                    </h5>
                  </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div id="hitung-atribut" class="tab-pane fade">
      <div class="row">
        <div class="col-xs-12">
            <h4 class="text-center">Menghitung Nilai Atribut "Status Kelengkapan Orang Tua/Wali"</h4>
        <table id="dynamic-table" class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                  <th class="center"><h5>Status Kelengkapan Orang Tua/Wali</h5></th>
                  <th class="center"><h5>Dapat </h5></th>
                  <th class="center"><h5>Tidak Dapat</h5></th>
                  <th class="center"><h5> Probabilitas Dapat </h5></th>
                  <th class="center"><h5> Probabilitas Tidak Dapat </h5></th>
                </tr>
            </thead>
            <tbody>
              <tr>
                  <td class="center">
                    <input type="hidden" name="status_kelengkapan_ortu" value="{{$status_kelengkapan_ortu}}">
                    P({{ $status_kelengkapan_ortu }})</td>
                  @if( $status_kelengkapan_ortu == 'Lengkap')
                  <td class="center">
                    {{ $status_kelengkapan_ortu_lengkap_dapat_request }} / {{$hitung_total_datatraining}} 
                  </td>
                    <td class="center">
                    {{ $status_kelengkapan_ortu_lengkap_tdkdapat_request }} / {{$hitung_total_datatraining}}
                  </td>
                  <td class="center">
                    <input type="hidden" name="ortu_lengkap_dapat" value="{{$probabilitas_kelengkapan_ortu_lengkap_dapat_request}}">
                      <b>{{$probabilitas_kelengkapan_ortu_lengkap_dapat_request}} 
                      </td>  
                  </td>
                  <td class="center">
                    <input type="hidden" name="ortu_lengkap_tdkdapat" value="{{$probabilitas_kelengkapan_ortu_lengkap_tdkdapat_request}}">
                      <b>{{$probabilitas_kelengkapan_ortu_lengkap_tdkdapat_request}} </td>  
                  </td>
              @endif
                  @if( $status_kelengkapan_ortu == 'Tidak Lengkap')
                  <td class="center">
                    {{ $status_kelengkapan_ortu_tdklengkap_dapat_request }} / {{$hitung_total_datatraining}} 
                  </td>
                    <td class="center">
                    {{ $status_kelengkapan_ortu_tdklengkap_tdkdapat_request }} / {{$hitung_total_datatraining}}
                  </td>
                  <td class="center">
                    <input type="hidden" name="ortu_tdklengkap_dapat" value="{{$probabilitas_kelengkapan_ortu_tdklengkap_dapat_request}}">
                      <b>{{$probabilitas_kelengkapan_ortu_tdklengkap_dapat_request}} </td>  
                  </td>
                  <td class="center">
                    <input type="hidden" name="ortu_tdklengkap_tdkdapat" value="{{$probabilitas_kelengkapan_ortu_tdklengkap_tdkdapat_request}}">
                      <b>{{$probabilitas_kelengkapan_ortu_tdklengkap_tdkdapat_request}} </td>  
                  </td>
                </tr>
              @endif
            </tbody>
          </table>
    
    <hr style="background-color: black">
      <br>
            <h4 class="text-center">Menghitung Nilai Atribut "Status Kepemilikan Rumah Orang Tua/Wali"</h4>
        <table id="dynamic-table" class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                  <th class="center"><h5>Status Kepemilikan Rumah Orang Tua/Wali</h5></th>
                  <th class="center"><h5>Dapat </h5></th>
                  <th class="center"><h5>Tidak Dapat</h5></th>
                  <th class="center"><h5> Probabilitas Dapat </h5></th>
                  <th class="center"><h5> Probabilitas Tidak Dapat </h5></th>
                </tr>
            </thead>
            <tbody>
              <tr>
                  <td class="center"> <input type="hidden" name="status_rumah_ortu" value="{{$status_rumah_ortu}}">
                    P({{ $status_rumah_ortu }})</td>
                  @if( $status_rumah_ortu == 'Rumah Sendiri')
                  <td class="center">{{$status_rumah_sendiri_request_dapat}} / {{ $hitung_total_datatraining}}</td>
                  <td class="center">{{$status_rumah_sendiri_request_tdkdapat}} / {{ $hitung_total_datatraining}}
                  </td>
                  <td class="center">
                    <input type="hidden" name="rumah_sendiri_dapat" value="{{$probabilitas_status_rumah_sendiri_request_dapat}}">
                    <b>{{$probabilitas_status_rumah_sendiri_request_dapat}}
                    </td>
                  <td class="center">
                    <input type="hidden" name="rumah_sendiri_tdkdapat" value="{{$probabilitas_status_rumah_sendiri_request_tdkdapat}}">
                    <b>
                      {{$probabilitas_status_rumah_sendiri_request_tdkdapat}}</td>
                </tr>
                @endif
                  @if( $status_rumah_ortu == 'Rumah Sewa')
                  <td class="center">{{$status_rumah_sewa_request_dapat}} / {{ $hitung_total_datatraining}}</td>
                  <td class="center">{{$status_rumah_sewa_request_tdkdapat}} / {{ $hitung_total_datatraining}}</td>
                  <td class="center">
                    <input type="hidden" name="rumah_sewa_dapat" value="{{$probabilitas_status_rumah_sewa_request_tdkdapat}}">
                    <b>{{$probabilitas_status_rumah_sewa_request_tdkdapat}}
                    </td>
                  <td class="center">
                    <input type="hidden" name="rumah_sewa_tdkdapat" value="{{$probabilitas_status_rumah_sewa_request_tdkdapat}}">
                    <b>{{$probabilitas_status_rumah_sewa_request_tdkdapat}}
                    </td>
                </tr>
                @endif
                  @if( $status_rumah_ortu == 'Kontrakan')
                  <td class="center">{{$status_rumah_kontrakan_request_dapat}} / {{ $hitung_total_datatraining}}</td>
                  <td class="center">{{$status_rumah_kontrakan_request_tdkdapat}} / {{ $hitung_total_datatraining}}</td>
                  <td class="center">
                    <input type="hidden" name="rumah_kontrakan_dapat" value="{{$probabilitas_status_rumah_kontrakan_request_dapat}}">
                    <b>
                      {{$probabilitas_status_rumah_kontrakan_request_dapat}}
                    </td>
                  <td class="center">
                    <input type="hidden" name="rumah_kontrakan_tdkdapat" value="{{$probabilitas_status_rumah_kontrakan_request_tdkdapat}}">
                    <b>{{$probabilitas_status_rumah_kontrakan_request_tdkdapat}}
                    </td>
                </tr>
                @endif
                  @if( $status_rumah_ortu == 'Tinggal Dengan Saudara')
                  <td class="center">{{$status_rumah_saudara_request_dapat}} / {{ $hitung_total_datatraining}}</td>
                  <td class="center">{{$status_rumah_saudara_request_tdkdapat}} / {{ $hitung_total_datatraining}}</td>
                  <td class="center">
                    <input type="hidden" name="rumah_saudara_dapat" value="{{$probabilitas_status_rumah_saudara_request_dapat}}">
                    <b>{{$probabilitas_status_rumah_saudara_request_dapat}}
                    </td>
                  <td class="center">
                    <input type="hidden" name="rumah_saudara_tdkdapat" value="{{$probabilitas_status_rumah_saudara_request_tdkdapat}}">
                    <b>{{$probabilitas_status_rumah_saudara_request_tdkdapat}}
                    </td>
                </tr>
                @endif
                <tr>
            </tbody>
          </table>
      <hr style="background-color: black">
      <br>

      <h4 class="text-center">Menghitung Nilai Atribut "Status Pekerjaan Orang Tua/Wali"</h4>
        <table id="dynamic-table" class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                  <th class="center"><h5>Status Pekerjaan Orang Tua/Wali</h5></th>
                  <th class="center"><h5>Dapat </h5></th>
                  <th class="center"><h5>Tidak Dapat</h5></th>
                  <th class="center"><h5> Probabilitas Dapat </h5></th>
                  <th class="center"><h5> Probabilitas Tidak Dapat </h5></th>
                </tr>
            </thead>
            <tbody>
              <tr>
                  <td class="center"><input type="hidden" name="status_pekerjaan_wali" value="{{$status_pekerjaan_wali}}">
                    P( {{ $status_pekerjaan_wali }})</td>
                  @if($status_pekerjaan_wali == 'Karyawan Swasta')
                  <td class="center">{{$status_pekerja_swasta_request_dapat}} / {{ $hitung_total_datatraining}}</td>
                  <td class="center">{{$status_pekerja_swasta_request_tdkdapat}} / {{ $hitung_total_datatraining}}</td>
                  <td class="center">
                    <input type="hidden" name="pekerja_swasta_dapat" value="{{$probabilitas_status_pekerja_swasta_request_dapat}}">
                    {{$probabilitas_status_pekerja_swasta_request_dapat}}
                  </td>
                  <td class="center">
                    <input type="hidden" name="pekerja_swasta_tdkdapat" value="{{$probabilitas_status_pekerja_swasta_request_tdkdapat}}">
                    {{$probabilitas_status_pekerja_swasta_request_tdkdapat}}
                  </td>
                  @endif
                  @if($status_pekerjaan_wali == 'Pegawai Negri')
                  <td class="center">{{$status_pekerja_negri_request_dapat}} / {{ $hitung_total_datatraining}}</td>
                  <td class="center">{{$status_pekerja_negri_request_tdkdapat}} / {{ $hitung_total_datatraining}}</td>
                  <td class="center">
                    <input type="hidden" name="pekerja_negri_dapat" value="{{$probabilitas_status_pekerja_negri_request_dapat}}">
                    <b>
                      {{$probabilitas_status_pekerja_negri_request_dapat}}
                    </td>
                  <td class="center">
                    <input type="hidden" name="pekerja_negri_tdkdapat" value="{{$probabilitas_status_pekerja_negri_request_tdkdapat}}">
                    <b>{{$probabilitas_status_pekerja_negri_request_tdkdapat}}
                    </td>
                  @endif
                  @if($status_pekerjaan_wali == 'Pekerja Tidak Tetap')
                  <td class="center">{{$status_pekerja_tdktetap_request_dapat}} / {{ $hitung_total_datatraining}}</td>
                  <td class="center">{{$status_pekerja_tdktetap_request_tdkdapat}} / {{ $hitung_total_datatraining}}</td>
                  <td class="center">
                    <input type="hidden" name="pekerja_tdktetap_dapat" value="{{$probabilitas_status_pekerja_tdktetap_request_dapat}}">
                    <b>{{$probabilitas_status_pekerja_tdktetap_request_dapat}}
                    </td>
                  <td class="center">
                    <input type="hidden" name="pekerja_tdktetap_tdkdapat" value="{{$probabilitas_status_pekerja_tdktetap_request_tdkdapat}}">
                    <b>
                      {{$probabilitas_status_pekerja_tdktetap_request_tdkdapat}}</td>
                  @endif
                  @if($status_pekerjaan_wali == 'Usaha')
                  <td class="center">{{$status_pekerja_usaha_request_dapat}} / {{ $hitung_total_datatraining}}</td>
                  <td class="center">{{$status_pekerja_usaha_request_tdkdapat}} / {{ $hitung_total_datatraining}}</td>
                  <td class="center">
                    <input type="hidden" name="pekerja_usaha_dapat" value="{{$probabilitas_status_pekerja_usaha_request_dapat}}">
                    <b>{{$probabilitas_status_pekerja_usaha_request_dapat}}</td>
                  <td class="center">
                    <input type="hidden" name="pekerja_usaha_tdkdapat" value="{{$probabilitas_status_pekerja_usaha_request_tdkdapat}}">
                    <b>{{$probabilitas_status_pekerja_usaha_request_tdkdapat}}</td>
                  @endif
                </tr>
            </tbody>
          </table>
          <hr style="background-color: black">
          <br>
          <h4 class="text-center">Menghitung Nilai Atribut "Status SK Tidak Mampu"</h4>
          <table id="dynamic-table" class="table table-striped table-bordered table-hover">
              <thead>
                  <tr>
                    <th class="center"><h5>Status Lampiran SK Tidak Mampu</h5></th>
                    <th class="center"><h5>Dapat </h5></th>
                    <th class="center"><h5>Tidak Dapat</h5></th>
                    <th class="center"><h5> Probabilitas Dapat </h5></th>
                    <th class="center"><h5> Probabilitas Tidak Dapat </h5></th>
                  </tr>
              </thead>
              <tbody>
                  @if($status_sk_tidakmampu == 'Ada')
                    <td class="center"><input type="hidden" name="status_sk_tidakmampu" value="{{$status_sk_tidakmampu}}">
                      P( {{$status_sk_tidakmampu}})</td>
                    <td class="center">{{$status_skada_request_dapat}} / {{$hitung_total_datatraining}}</td>
                    <td class="center">{{$status_skada_request_tdkdapat}} / {{$hitung_total_datatraining}}</td>
                    <td class="center">
                      <input type="hidden" name="sk_ada_dapat" value="{{$probabilitas_status_skada_request_dapat}}">
                      <b>
                        {{$probabilitas_status_skada_request_dapat}}</td>
                    <td class="center">
                      <input type="hidden" name="sk_ada_tdkdapat" value="{{$probabilitas_status_skada_request_tdkdapat}}">
                      <b>{{$probabilitas_status_skada_request_tdkdapat}}</td>
                  @endif
                  @if($status_sk_tidakmampu == 'Tidak Ada')
                  <td class="center"><input type="hidden" name="status_sk_tidakmampu" value="{{$status_sk_tidakmampu}}"></td>
                    <td class="center">P( {{$status_sk_tidakmampu}})</td>
                    <td class="center">{{$status_sktdkada_request_dapat}} / {{$hitung_total_datatraining}}</td>
                    <td class="center">{{$status_sktdkada_request_tdkdapat}} / {{$hitung_total_datatraining}}</td>
                    <td class="center">
                      <input type="hidden" name="sk_tdkada_dapat" value="{{$probabilitas_status_sktdkada_request_dapat}}">
                      <b>{{$probabilitas_status_sktdkada_request_dapat}}</td>
                    <td class="center">
                      <input type="hidden" name="sk_tdkada_tdkdapat" value="{{$probabilitas_status_sktdkada_request_tdkdapat}}">
                      <b>{{$probabilitas_status_sktdkada_request_tdkdapat}}</td>
                  @endif
              </tbody>
            </table>
          </div>
        </div>
      </div>
      
        <div id="hasil-keputusan" class="tab-pane fade in active">
            <div class="row">
              <div class="col-xs-12">
                
                <div id="spk">
                
                </div>
      
                <h3 class="header smaller lighter blue"><center>Hasil Keputusan Algoritma Naive Baiyes</h3>
                
                <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                  <thead>
                      <tr>
                        <th class="center" colspan="2"><h5>Perhitungan Probabilitas Akhir</h5></th>
                        <th class="center"><h5>Jumlah</h5></th>
                      </tr>
                  </thead>
                  <tbody>
                      @if($status_kelengkapan_ortu == 'Lengkap' && 
                    $status_rumah_ortu == 'Rumah Sendiri' &&
                    $status_pekerjaan_wali == 'Karyawan Swasta' &&
                    $status_sk_tidakmampu == 'Ada'
                        ) 
                     <tr>
                        <td class="center"><b><h5>Probabilitas Dapat</h5></td>                 
                          <td class="center"><b><h5>  
                           {{$probabilitas_kelengkapan_ortu_lengkap_dapat_request}} * 
                           {{$probabilitas_status_rumah_sendiri_request_dapat}} *
                           {{$probabilitas_status_pekerja_swasta_request_dapat}} *
                           {{$probabilitas_status_skada_request_dapat}}</h5>
                          </td>
                          <td class="center"><b><h5>
                            <?php
                            $nilai1 = number_format($probabilitas_kelengkapan_ortu_lengkap_dapat_request *
                                      $probabilitas_status_rumah_sendiri_request_dapat *
                                      $probabilitas_status_pekerja_swasta_request_dapat *
                                      $probabilitas_status_skada_request_dapat, 7);
                            ?>
                            <input type="hidden" name="probabilitas_dapat" value="{{$nilai1}}">
                               {{$nilai1}}  
                          </h5>
                        </td> 
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Probabilitas Tidak Dapat</h5></td>
                          <td class="center"><b><h5>
                            {{$probabilitas_kelengkapan_ortu_lengkap_tdkdapat_request}} * 
                            {{$probabilitas_status_rumah_sendiri_request_tdkdapat}} *
                            {{$probabilitas_status_pekerja_swasta_request_tdkdapat}} *
                            {{$probabilitas_status_skada_request_tdkdapat}}
                          </h5>
                        </td>
                        <td class="center"><b><h5>
                          <?php
                        $nilai2 = number_format($probabilitas_kelengkapan_ortu_lengkap_tdkdapat_request *
                        $probabilitas_status_rumah_sendiri_request_tdkdapat *
                        $probabilitas_status_pekerja_swasta_request_tdkdapat *
                        $probabilitas_status_skada_request_tdkdapat, 7);
                        ?>
                         <input type="hidden" name="probabilitas_tdkdapat" value="{{$nilai2}}">
                         {{$nilai2}}  
                        </h5></td>
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Keterangan</h5></td>
                          <td class="center" colspan="2">
                            @if($nilai1 > $nilai2)
                            <br>
                              <b>
                                <input type="hidden" name="keterangan" value="Dapat Bantuan">
                                <span class="label label label-success">Dapat Bantuan<h2></span>
                                </h2>
                                @else
                                <input type="hidden" name="keterangan" value="Tidak Dapat Bantuan">
                              <span class="label label label-danger">Tidak Dapat Bantuan<h2></span>
                              </h2>
                            </td> 
                            @endif
                         </tr>
                        @endif
                      @if($status_kelengkapan_ortu == 'Lengkap' && 
                    $status_rumah_ortu == 'Rumah Sendiri' &&
                    $status_pekerjaan_wali == 'Karyawan Swasta' &&
                    $status_sk_tidakmampu == 'Tidak Ada'
                        ) 
                     <tr>
                        <td class="center"><b><h5>Probabilitas Dapat</h5></td>                 
                          <td class="center"><b><h5>  
                           {{$probabilitas_kelengkapan_ortu_lengkap_dapat_request}} * 
                           {{$probabilitas_status_rumah_sendiri_request_dapat}} *
                           {{$probabilitas_status_pekerja_swasta_request_dapat}} *
                           {{$probabilitas_status_sktdkada_request_dapat}}</h5>
                          </td>
                          <td class="center"><b><h5>
                            <?php
                            $nilai1 = number_format($probabilitas_kelengkapan_ortu_lengkap_dapat_request *
                                      $probabilitas_status_rumah_sendiri_request_dapat *
                                      $probabilitas_status_pekerja_swasta_request_dapat *
                                      $probabilitas_status_sktdkada_request_dapat, 7);
                            ?>
                            <input type="hidden" name="probabilitas_dapat" value="{{$nilai1}}">
                               {{$nilai1}}  
                          </h5>
                        </td> 
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Probabilitas Tidak Dapat</h5></td>
                        <td class="center"><b><h5>
                          {{$probabilitas_kelengkapan_ortu_lengkap_tdkdapat_request}} * 
                          {{$probabilitas_status_rumah_sendiri_request_tdkdapat}} *
                          {{$probabilitas_status_pekerja_swasta_request_tdkdapat}} *
                          {{$probabilitas_status_sktdkada_request_tdkdapat}}
                        </h5>
                      </td>
                      <td class="center"><b><h5>
                        <?php
                        $nilai2 = number_format($probabilitas_kelengkapan_ortu_lengkap_tdkdapat_request *
                                  $probabilitas_status_rumah_sendiri_request_tdkdapat *
                                  $probabilitas_status_pekerja_swasta_request_tdkdapat *
                                  $probabilitas_status_sktdkada_request_tdkdapat, 7);
                        ?>
                         <input type="hidden" name="probabilitas_tdkdapat" value="{{$nilai2}}">
                          {{$nilai2}}  
                      </h5></td>
                    </tr>
                     </tr>
                      <tr>
                        <td class="center"><b><h5>Keterangan</h5></td>
                          <td class="center" colspan="2">
                            @if($nilai1 > $nilai2)
                            <br>
                              <b>
                                <input type="hidden" name="keterangan" value="Dapat Bantuan">
                                <span class="label label label-success">Dapat Bantuan<h2></span>
                                </h2>
                                @else
                                <input type="hidden" name="keterangan" value="Tidak Dapat Bantuan">
                              <span class="label label label-danger">Tidak Dapat Bantuan<h2></span>
                              </h2>
                            </td> 
                            @endif
                         </tr>
                        @endif
                      @if($status_kelengkapan_ortu == 'Lengkap' && 
                    $status_rumah_ortu == 'Rumah Sendiri' &&
                    $status_pekerjaan_wali == 'Pegawai Negri' &&
                    $status_sk_tidakmampu == 'Ada'
                        ) 
                     <tr>
                        <td class="center"><b><h5>Probabilitas Dapat</h5></td>                 
                          <td class="center"><b><h5>  
                           {{$probabilitas_kelengkapan_ortu_lengkap_dapat_request}} * 
                           {{$probabilitas_status_rumah_sendiri_request_dapat}} *
                           {{$probabilitas_status_pekerja_negri_request_dapat}} *
                           {{$probabilitas_status_skada_request_dapat}}</h5>
                          </td>
                          <td class="center"><b><h5>
                            <?php
                            $nilai1 = number_format($probabilitas_kelengkapan_ortu_lengkap_dapat_request *
                                      $probabilitas_status_rumah_sendiri_request_dapat *
                                      $probabilitas_status_pekerja_negri_request_dapat *
                                      $probabilitas_status_skada_request_dapat, 7);
                            ?>
                            <input type="hidden" name="probabilitas_dapat" value="{{$nilai1}}">
                               {{$nilai1}}  
                          </h5>
                        </td> 
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Probabilitas Tidak Dapat</h5></td>
                        <td class="center"><b><h5>
                          {{$probabilitas_kelengkapan_ortu_lengkap_tdkdapat_request}} * 
                          {{$probabilitas_status_rumah_sendiri_request_tdkdapat}} *
                          {{$probabilitas_status_pekerja_negri_request_tdkdapat}} *
                          {{$probabilitas_status_skada_request_tdkdapat}}
                        </h5>
                      </td>
                      <td class="center"><b><h5>
                        <?php
                        $nilai2 = number_format($probabilitas_kelengkapan_ortu_lengkap_tdkdapat_request *
                                  $probabilitas_status_rumah_sendiri_request_tdkdapat *
                                  $probabilitas_status_pekerja_negri_request_tdkdapat *
                                  $probabilitas_status_skada_request_tdkdapat, 7);
                        ?>
                         <input type="hidden" name="probabilitas_tdkdapat" value="{{$nilai2}}">
                          {{$nilai2}}  
                      </h5></td>
                    </tr>
                    <tr>
                      <td class="center"><b><h5>Keterangan</h5></td>
                        <td class="center" colspan="2">
                          @if($nilai1 > $nilai2)
                          <br>
                            <b>
                              <input type="hidden" name="keterangan" value="Dapat Bantuan">
                              <span class="label label label-success">Dapat Bantuan<h2></span>
                              </h2>
                              @else
                              <input type="hidden" name="keterangan" value="Tidak Dapat Bantuan">
                            <span class="label label label-danger">Tidak Dapat Bantuan<h2></span>
                            </h2>
                          </td> 
                          @endif
                       </tr>
                      @endif
                      @if($status_kelengkapan_ortu == 'Lengkap' && 
                    $status_rumah_ortu == 'Rumah Sendiri' &&
                    $status_pekerjaan_wali == 'Pegawai Negri' &&
                    $status_sk_tidakmampu == 'Tidak Ada'
                        ) 
                     <tr>
                        <td class="center"><b><h5>Probabilitas Dapat</h5></td>                 
                          <td class="center"><b><h5>  
                           {{$probabilitas_kelengkapan_ortu_lengkap_dapat_request}} * 
                           {{$probabilitas_status_rumah_sendiri_request_dapat}} *
                           {{$probabilitas_status_pekerja_negri_request_dapat}} *
                           {{$probabilitas_status_sktdkada_request_dapat}}</h5>
                          </td>
                          <td class="center"><b><h5>
                            <?php
                            $nilai1 = number_format($probabilitas_kelengkapan_ortu_lengkap_dapat_request *
                                      $probabilitas_status_rumah_sendiri_request_dapat *
                                      $probabilitas_status_pekerja_negri_request_dapat *
                                      $probabilitas_status_sktdkada_request_dapat, 7);
                            ?>
                            <input type="hidden" name="probabilitas_dapat" value="{{$nilai1}}">
                               {{$nilai1}}  
                          </h5>
                        </td> 
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Probabilitas Tidak Dapat</h5></td>
                        <td class="center"><b><h5>
                          {{$probabilitas_kelengkapan_ortu_lengkap_tdkdapat_request}} * 
                          {{$probabilitas_status_rumah_sendiri_request_tdkdapat}} *
                          {{$probabilitas_status_pekerja_negri_request_tdkdapat}} *
                          {{$probabilitas_status_sktdkada_request_tdkdapat}}
                        </h5>
                      </td>
                      <td class="center"><b><h5>
                        <?php
                        $nilai2 = number_format($probabilitas_kelengkapan_ortu_lengkap_tdkdapat_request *
                                  $probabilitas_status_rumah_sendiri_request_tdkdapat *
                                  $probabilitas_status_pekerja_negri_request_tdkdapat *
                                  $probabilitas_status_sktdkada_request_tdkdapat, 7);
                        ?>
                         <input type="hidden" name="probabilitas_tdkdapat" value="{{$nilai2}}">
                          {{$nilai2}}  
                      </h5></td>
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Keterangan</h5></td>
                          <td class="center" colspan="2">
                            @if($nilai1 > $nilai2)
                            <br>
                              <b>
                                <input type="hidden" name="keterangan" value="Dapat Bantuan">
                                <span class="label label label-success">Dapat Bantuan<h2></span>
                                </h2>
                                @else
                                <input type="hidden" name="keterangan" value="Tidak Dapat Bantuan">
                              <span class="label label label-danger">Tidak Dapat Bantuan<h2></span>
                              </h2>
                            </td> 
                            @endif
                         </tr>
                        @endif
                      @if($status_kelengkapan_ortu == 'Lengkap' && 
                    $status_rumah_ortu == 'Rumah Sendiri' &&
                    $status_pekerjaan_wali == 'Pekerja Tidak Tetap' &&
                    $status_sk_tidakmampu == 'Ada'
                        ) 
                     <tr>
                        <td class="center"><b><h5>Probabilitas Dapat</h5></td>                 
                          <td class="center"><b><h5>  
                           {{$probabilitas_kelengkapan_ortu_lengkap_dapat_request}} * 
                           {{$probabilitas_status_rumah_sendiri_request_dapat}} *
                           {{$probabilitas_status_pekerja_tdktetap_request_dapat}} *
                           {{$probabilitas_status_skada_request_dapat}}</h5>
                          </td>
                          <td class="center"><b><h5>
                            <?php
                            $nilai1 = number_format($probabilitas_kelengkapan_ortu_lengkap_dapat_request *
                                      $probabilitas_status_rumah_sendiri_request_dapat *
                                      $probabilitas_status_pekerja_tdktetap_request_dapat *
                                      $probabilitas_status_skada_request_dapat, 7);
                            ?>
                            <input type="hidden" name="probabilitas_dapat" value="{{$nilai1}}">
                               {{$nilai1}}  
                          </h5>
                        </td> 
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Probabilitas Tidak Dapat</h5></td>
                        <td class="center"><b><h5>
                          {{$probabilitas_kelengkapan_ortu_lengkap_tdkdapat_request}} * 
                          {{$probabilitas_status_rumah_sendiri_request_tdkdapat}} *
                          {{$probabilitas_status_pekerja_tdktetap_request_tdkdapat}} *
                          {{$probabilitas_status_skada_request_tdkdapat}}
                        </h5>
                      </td>
                      <td class="center"><b><h5>
                        <?php
                        $nilai2 = number_format($probabilitas_kelengkapan_ortu_lengkap_tdkdapat_request *
                                  $probabilitas_status_rumah_sendiri_request_tdkdapat *
                                  $probabilitas_status_pekerja_tdktetap_request_tdkdapat *
                                  $probabilitas_status_skada_request_tdkdapat, 7);
                        ?>
                         <input type="hidden" name="probabilitas_tdkdapat" value="{{$nilai2}}">
                          {{$nilai2}}  
                      </h5></td>
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Keterangan</h5></td>
                          <td class="center" colspan="2">
                            @if($nilai1 > $nilai2)
                            <br>
                              <b>
                                <input type="hidden" name="keterangan" value="Dapat Bantuan">
                                <span class="label label label-success">Dapat Bantuan<h2></span>
                                </h2>
                                @else
                                <input type="hidden" name="keterangan" value="Tidak Dapat Bantuan">
                              <span class="label label label-danger">Tidak Dapat Bantuan<h2></span>
                              </h2>
                            </td> 
                            @endif
                         </tr>
                        @endif
                      @if($status_kelengkapan_ortu == 'Lengkap' && 
                    $status_rumah_ortu == 'Rumah Sendiri' &&
                    $status_pekerjaan_wali == 'Pekerja Tidak Tetap' &&
                    $status_sk_tidakmampu == 'Tidak Ada'
                        ) 
                     <tr>
                        <td class="center"><b><h5>Probabilitas Dapat</h5></td>                 
                          <td class="center"><b><h5>  
                           {{$probabilitas_kelengkapan_ortu_lengkap_dapat_request}} * 
                           {{$probabilitas_status_rumah_sendiri_request_dapat}} *
                           {{$probabilitas_status_pekerja_tdktetap_request_dapat}} *
                           {{$probabilitas_status_sktdkada_request_dapat}}</h5>
                          </td>
                          <td class="center"><b><h5>
                            <?php
                            $nilai1 = number_format($probabilitas_kelengkapan_ortu_lengkap_dapat_request *
                                      $probabilitas_status_rumah_sendiri_request_dapat *
                                      $probabilitas_status_pekerja_tdktetap_request_dapat *
                                      $probabilitas_status_sktdkada_request_dapat, 7);
                            ?>
                            <input type="hidden" name="probabilitas_dapat" value="{{$nilai1}}">
                               {{$nilai1}}  
                          </h5>
                        </td> 
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Probabilitas Tidak Dapat</h5></td>
                        <td class="center"><b><h5>
                          {{$probabilitas_kelengkapan_ortu_lengkap_tdkdapat_request}} * 
                          {{$probabilitas_status_rumah_sendiri_request_tdkdapat}} *
                          {{$probabilitas_status_pekerja_tdktetap_request_tdkdapat}} *
                          {{$probabilitas_status_sktdkada_request_tdkdapat}}
                        </h5>
                      </td>
                      <td class="center"><b><h5>
                        <?php
                        $nilai2 = number_format($probabilitas_kelengkapan_ortu_lengkap_tdkdapat_request *
                                  $probabilitas_status_rumah_sendiri_request_tdkdapat *
                                  $probabilitas_status_pekerja_tdktetap_request_tdkdapat *
                                  $probabilitas_status_sktdkada_request_tdkdapat, 7);
                        ?>
                         <input type="hidden" name="probabilitas_tdkdapat" value="{{$nilai2}}">
                          {{$nilai2}}  
                      </h5></td>
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Keterangan</h5></td>
                          <td class="center" colspan="2">
                            @if($nilai1 > $nilai2)
                            <br>
                              <b>
                                <input type="hidden" name="keterangan" value="Dapat Bantuan">
                                <span class="label label label-success">Dapat Bantuan<h2></span>
                                </h2>
                                @else
                                <input type="hidden" name="keterangan" value="Tidak Dapat Bantuan">
                              <span class="label label label-danger">Tidak Dapat Bantuan<h2></span>
                              </h2>
                            </td> 
                            @endif
                         </tr>
                        @endif
                      @if($status_kelengkapan_ortu == 'Lengkap' && 
                    $status_rumah_ortu == 'Rumah Sendiri' &&
                    $status_pekerjaan_wali == 'Usaha' &&
                    $status_sk_tidakmampu == 'Ada'
                        ) 
                     <tr>
                        <td class="center"><b><h5>Probabilitas Dapat</h5></td>                 
                          <td class="center"><b><h5>  
                           {{$probabilitas_kelengkapan_ortu_lengkap_dapat_request}} * 
                           {{$probabilitas_status_rumah_sendiri_request_dapat}} *
                           {{$probabilitas_status_pekerja_usaha_request_dapat}} *
                           {{$probabilitas_status_skada_request_dapat}}</h5>
                          </td>
                          <td class="center"><b><h5>
                            <?php
                            $nilai1 = number_format($probabilitas_kelengkapan_ortu_lengkap_dapat_request *
                                      $probabilitas_status_rumah_sendiri_request_dapat *
                                      $probabilitas_status_pekerja_usaha_request_dapat *
                                      $probabilitas_status_skada_request_dapat, 7);
                            ?>
                            <input type="hidden" name="probabilitas_dapat" value="{{$nilai1}}">
                               {{$nilai1}}  
                          </h5>
                        </td> 
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Probabilitas Tidak Dapat</h5></td>
                        <td class="center"><b><h5>
                          {{$probabilitas_kelengkapan_ortu_lengkap_tdkdapat_request}} * 
                          {{$probabilitas_status_rumah_sendiri_request_tdkdapat}} *
                          {{$probabilitas_status_pekerja_usaha_request_tdkdapat}} *
                          {{$probabilitas_status_skada_request_tdkdapat}}
                        </h5>
                      </td>
                      <td class="center"><b><h5>
                        <?php
                        $nilai2 = number_format($probabilitas_kelengkapan_ortu_lengkap_tdkdapat_request *
                                  $probabilitas_status_rumah_sendiri_request_tdkdapat *
                                  $probabilitas_status_pekerja_usaha_request_tdkdapat *
                                  $probabilitas_status_skada_request_tdkdapat, 7);
                        ?>
                         <input type="hidden" name="probabilitas_tdkdapat" value="{{$nilai2}}">
                          {{$nilai2}}  
                      </h5></td>
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Keterangan</h5></td>
                          <td class="center" colspan="2">
                            @if($nilai1 > $nilai2)
                            <br>
                              <b>
                                <input type="hidden" name="keterangan" value="Dapat Bantuan">
                                <span class="label label label-success">Dapat Bantuan<h2></span>
                                </h2>
                                @else
                                <input type="hidden" name="keterangan" value="Tidak Dapat Bantuan">
                              <span class="label label label-danger">Tidak Dapat Bantuan<h2></span>
                              </h2>
                            </td> 
                            @endif
                         </tr>
                        @endif
                      @if($status_kelengkapan_ortu == 'Lengkap' && 
                    $status_rumah_ortu == 'Rumah Sendiri' &&
                    $status_pekerjaan_wali == 'Usaha' &&
                    $status_sk_tidakmampu == 'Tidak Ada'
                        ) 
                     <tr>
                        <td class="center"><b><h5>Probabilitas Dapat</h5></td>                 
                          <td class="center"><b><h5>  
                           {{$probabilitas_kelengkapan_ortu_lengkap_dapat_request}} * 
                           {{$probabilitas_status_rumah_sendiri_request_dapat}} *
                           {{$probabilitas_status_pekerja_usaha_request_dapat}} *
                           {{$probabilitas_status_sktdkada_request_dapat}}</h5>
                          </td>
                          <td class="center"><b><h5>
                            <?php
                            $nilai1 = number_format($probabilitas_kelengkapan_ortu_lengkap_dapat_request *
                                      $probabilitas_status_rumah_sendiri_request_dapat *
                                      $probabilitas_status_pekerja_usaha_request_dapat *
                                      $probabilitas_status_sktdkada_request_dapat, 7);
                            ?>
                            <input type="hidden" name="probabilitas_dapat" value="{{$nilai1}}">
                               {{$nilai1}}  
                          </h5>
                        </td> 
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Probabilitas Tidak Dapat</h5></td>
                        <td class="center"><b><h5>
                          {{$probabilitas_kelengkapan_ortu_lengkap_tdkdapat_request}} * 
                          {{$probabilitas_status_rumah_sendiri_request_tdkdapat}} *
                          {{$probabilitas_status_pekerja_usaha_request_tdkdapat}} *
                          {{$probabilitas_status_sktdkada_request_tdkdapat}}
                        </h5>
                      </td>
                      <td class="center"><b><h5>
                        <?php
                        $nilai2 = number_format($probabilitas_kelengkapan_ortu_lengkap_tdkdapat_request *
                                  $probabilitas_status_rumah_sendiri_request_tdkdapat *
                                  $probabilitas_status_pekerja_usaha_request_tdkdapat *
                                  $probabilitas_status_sktdkada_request_tdkdapat, 7);
                        ?>
                         <input type="hidden" name="probabilitas_tdkdapat" value="{{$nilai2}}">
                          {{$nilai2}}  
                      </h5></td>
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Keterangan</h5></td>
                          <td class="center" colspan="2">
                            @if($nilai1 > $nilai2)
                            <br>
                              <b>
                                <input type="hidden" name="keterangan" value="Dapat Bantuan">
                                <span class="label label label-success">Dapat Bantuan<h2></span>
                                </h2>
                                @else
                                <input type="hidden" name="keterangan" value="Tidak Dapat Bantuan">
                              <span class="label label label-danger">Tidak Dapat Bantuan<h2></span>
                              </h2>
                            </td> 
                            @endif
                         </tr>
                        @endif
                      @if($status_kelengkapan_ortu == 'Lengkap' && 
                    $status_rumah_ortu == 'Rumah Sewa' &&
                    $status_pekerjaan_wali == 'Karyawan Swasta' &&
                    $status_sk_tidakmampu == 'Ada'
                        ) 
                     <tr>
                        <td class="center"><b><h5>Probabilitas Dapat</h5></td>                 
                          <td class="center"><b><h5>  
                           {{$probabilitas_kelengkapan_ortu_lengkap_dapat_request}} * 
                           {{$probabilitas_status_rumah_sewa_request_dapat}} *
                           {{$probabilitas_status_pekerja_swasta_request_dapat}} *
                           {{$probabilitas_status_skada_request_dapat}}</h5>
                          </td>
                          <td class="center"><b><h5>
                            <?php
                            $nilai1 = number_format($probabilitas_kelengkapan_ortu_lengkap_dapat_request *
                                      $probabilitas_status_rumah_sewa_request_dapat *
                                      $probabilitas_status_pekerja_swasta_request_dapat *
                                      $probabilitas_status_skada_request_dapat, 7);
                            ?>
                            <input type="hidden" name="probabilitas_dapat" value="{{$nilai1}}">
                               {{$nilai1}}  
                          </h5>
                        </td> 
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Probabilitas Tidak Dapat</h5></td>
                        <td class="center"><b><h5>
                          {{$probabilitas_kelengkapan_ortu_lengkap_tdkdapat_request}} * 
                          {{$probabilitas_status_rumah_sewa_request_tdkdapat}} *
                          {{$probabilitas_status_pekerja_swasta_request_tdkdapat}} *
                          {{$probabilitas_status_skada_request_tdkdapat}}
                        </h5>
                      </td>
                      <td class="center"><b><h5>
                        <?php
                        $nilai2 = number_format($probabilitas_kelengkapan_ortu_lengkap_tdkdapat_request *
                                  $probabilitas_status_rumah_sewa_request_tdkdapat *
                                  $probabilitas_status_pekerja_swasta_request_tdkdapat *
                                  $probabilitas_status_skada_request_tdkdapat, 7);
                        ?>
                         <input type="hidden" name="probabilitas_tdkdapat" value="{{$nilai2}}">
                          {{$nilai2}}  
                      </h5></td>
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Keterangan</h5></td>
                          <td class="center" colspan="2">
                            @if($nilai1 > $nilai2)
                            <br>
                              <b>
                                <input type="hidden" name="keterangan" value="Dapat Bantuan">
                                <span class="label label label-success">Dapat Bantuan<h2></span>
                                </h2>
                                @else
                                <input type="hidden" name="keterangan" value="Tidak Dapat Bantuan">
                              <span class="label label label-danger">Tidak Dapat Bantuan<h2></span>
                              </h2>
                            </td> 
                            @endif
                         </tr>
                        @endif
                      @if($status_kelengkapan_ortu == 'Lengkap' && 
                    $status_rumah_ortu == 'Rumah Sewa' &&
                    $status_pekerjaan_wali == 'Karyawan Swasta' &&
                    $status_sk_tidakmampu == 'Tidak Ada'
                        ) 
                     <tr>
                        <td class="center"><b><h5>Probabilitas Dapat</h5></td>                 
                          <td class="center"><b><h5>  
                           {{$probabilitas_kelengkapan_ortu_lengkap_dapat_request}} * 
                           {{$probabilitas_status_rumah_sewa_request_dapat}} *
                           {{$probabilitas_status_pekerja_swasta_request_dapat}} *
                           {{$probabilitas_status_sktdkada_request_dapat}}</h5>
                          </td>
                          <td class="center"><b><h5>
                            <?php
                            $nilai1 = number_format($probabilitas_kelengkapan_ortu_lengkap_dapat_request *
                                      $probabilitas_status_rumah_sewa_request_dapat *
                                      $probabilitas_status_pekerja_swasta_request_dapat *
                                      $probabilitas_status_sktdkada_request_dapat, 7);
                            ?>
                            <input type="hidden" name="probabilitas_dapat" value="{{$nilai1}}">
                               {{$nilai1}}  
                          </h5>
                        </td> 
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Probabilitas Tidak Dapat</h5></td>
                        <td class="center"><b><h5>
                          {{$probabilitas_kelengkapan_ortu_lengkap_tdkdapat_request}} * 
                          {{$probabilitas_status_rumah_sewa_request_tdkdapat}} *
                          {{$probabilitas_status_pekerja_swasta_request_tdkdapat}} *
                          {{$probabilitas_status_sktdkada_request_tdkdapat}}
                        </h5>
                      </td>
                      <td class="center"><b><h5>
                        <?php
                        $nilai2 = number_format($probabilitas_kelengkapan_ortu_lengkap_tdkdapat_request *
                                  $probabilitas_status_rumah_sewa_request_tdkdapat *
                                  $probabilitas_status_pekerja_swasta_request_tdkdapat *
                                  $probabilitas_status_sktdkada_request_tdkdapat, 7);
                        ?>
                         <input type="hidden" name="probabilitas_tdkdapat" value="{{$nilai2}}">
                          {{$nilai2}}  
                      </h5></td>
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Keterangan</h5></td>
                          <td class="center" colspan="2">
                            @if($nilai1 > $nilai2)
                            <br>
                              <b>
                                <input type="hidden" name="keterangan" value="Dapat Bantuan">
                                <span class="label label label-success">Dapat Bantuan<h2></span>
                                </h2>
                                @else
                                <input type="hidden" name="keterangan" value="Tidak Dapat Bantuan">
                              <span class="label label label-danger">Tidak Dapat Bantuan<h2></span>
                              </h2>
                            </td> 
                            @endif
                         </tr>
                        @endif
                      @if($status_kelengkapan_ortu == 'Lengkap' && 
                    $status_rumah_ortu == 'Rumah Sewa' &&
                    $status_pekerjaan_wali == 'Pegawai Negri' &&
                    $status_sk_tidakmampu == 'Ada'
                        ) 
                     <tr>
                        <td class="center"><b><h5>Probabilitas Dapat</h5></td>                 
                          <td class="center"><b><h5>  
                           {{$probabilitas_kelengkapan_ortu_lengkap_dapat_request}} * 
                           {{$probabilitas_status_rumah_sewa_request_dapat}} *
                           {{$probabilitas_status_pekerja_negri_request_dapat}} *
                           {{$probabilitas_status_skada_request_dapat}}</h5>
                          </td>
                          <td class="center"><b><h5>
                            <?php
                            $nilai1 = number_format($probabilitas_kelengkapan_ortu_lengkap_dapat_request *
                                      $probabilitas_status_rumah_sewa_request_dapat *
                                      $probabilitas_status_pekerja_negri_request_dapat *
                                      $probabilitas_status_skada_request_dapat, 7);
                            ?>
                            <input type="hidden" name="probabilitas_dapat" value="{{$nilai1}}">
                               {{$nilai1}}  
                          </h5>
                        </td> 
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Probabilitas Tidak Dapat</h5></td>
                        <td class="center"><b><h5>
                          {{$probabilitas_kelengkapan_ortu_lengkap_tdkdapat_request}} * 
                          {{$probabilitas_status_rumah_sewa_request_tdkdapat}} *
                          {{$probabilitas_status_pekerja_negri_request_tdkdapat}} *
                          {{$probabilitas_status_skada_request_tdkdapat}}
                        </h5>
                      </td>
                      <td class="center"><b><h5>
                        <?php
                        $nilai2 = number_format($probabilitas_kelengkapan_ortu_lengkap_tdkdapat_request *
                                  $probabilitas_status_rumah_sewa_request_tdkdapat *
                                  $probabilitas_status_pekerja_negri_request_tdkdapat *
                                  $probabilitas_status_skada_request_tdkdapat, 7);
                        ?>
                         <input type="hidden" name="probabilitas_tdkdapat" value="{{$nilai2}}">
                          {{$nilai2}}  
                      </h5></td>
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Keterangan</h5></td>
                          <td class="center" colspan="2">
                            @if($nilai1 > $nilai2)
                            <br>
                              <b>
                                <input type="hidden" name="keterangan" value="Dapat Bantuan">
                                <span class="label label label-success">Dapat Bantuan<h2></span>
                                </h2>
                                @else
                                <input type="hidden" name="keterangan" value="Tidak Dapat Bantuan">
                              <span class="label label label-danger">Tidak Dapat Bantuan<h2></span>
                              </h2>
                            </td> 
                            @endif
                         </tr>
                        @endif
                      @if($status_kelengkapan_ortu == 'Lengkap' && 
                    $status_rumah_ortu == 'Rumah Sewa' &&
                    $status_pekerjaan_wali == 'Pegawai Negri' &&
                    $status_sk_tidakmampu == 'Tidak Ada'
                        ) 
                     <tr>
                        <td class="center"><b><h5>Probabilitas Dapat</h5></td>                 
                          <td class="center"><b><h5>  
                           {{$probabilitas_kelengkapan_ortu_lengkap_dapat_request}} * 
                           {{$probabilitas_status_rumah_sewa_request_dapat}} *
                           {{$probabilitas_status_pekerja_negri_request_dapat}} *
                           {{$probabilitas_status_sktdkada_request_dapat}}</h5>
                          </td>
                          <td class="center"><b><h5>
                            <?php
                            $nilai1 = number_format($probabilitas_kelengkapan_ortu_lengkap_dapat_request *
                                      $probabilitas_status_rumah_sewa_request_dapat *
                                      $probabilitas_status_pekerja_negri_request_dapat *
                                      $probabilitas_status_sktdkada_request_dapat, 7);
                            ?>
                            <input type="hidden" name="probabilitas_dapat" value="{{$nilai1}}">
                               {{$nilai1}}  
                          </h5>
                        </td> 
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Probabilitas Tidak Dapat</h5></td>
                        <td class="center"><b><h5>
                          {{$probabilitas_kelengkapan_ortu_lengkap_tdkdapat_request}} * 
                          {{$probabilitas_status_rumah_sewa_request_tdkdapat}} *
                          {{$probabilitas_status_pekerja_negri_request_tdkdapat}} *
                          {{$probabilitas_status_sktdkada_request_tdkdapat}}
                        </h5>
                      </td>
                      <td class="center"><b><h5>
                        <?php
                        $nilai2 = number_format($probabilitas_kelengkapan_ortu_lengkap_tdkdapat_request *
                                  $probabilitas_status_rumah_sewa_request_tdkdapat *
                                  $probabilitas_status_pekerja_negri_request_tdkdapat *
                                  $probabilitas_status_sktdkada_request_tdkdapat, 7);
                        ?>
                         <input type="hidden" name="probabilitas_tdkdapat" value="{{$nilai2}}">
                          {{$nilai2}}  
                      </h5></td>
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Keterangan</h5></td>
                          <td class="center" colspan="2">
                            @if($nilai1 > $nilai2)
                            <br>
                              <b>
                                <input type="hidden" name="keterangan" value="Dapat Bantuan">
                                <span class="label label label-success">Dapat Bantuan<h2></span>
                                </h2>
                                @else
                                <input type="hidden" name="keterangan" value="Tidak Dapat Bantuan">
                              <span class="label label label-danger">Tidak Dapat Bantuan<h2></span>
                              </h2>
                            </td> 
                            @endif
                         </tr>
                        @endif
                      @if($status_kelengkapan_ortu == 'Lengkap' && 
                    $status_rumah_ortu == 'Rumah Sewa' &&
                    $status_pekerjaan_wali == 'Pekerja Tidak Tetap' &&
                    $status_sk_tidakmampu == 'Ada'
                        ) 
                     <tr>
                        <td class="center"><b><h5>Probabilitas Dapat</h5></td>                 
                          <td class="center"><b><h5>  
                           {{$probabilitas_kelengkapan_ortu_lengkap_dapat_request}} * 
                           {{$probabilitas_status_rumah_sewa_request_dapat}} *
                           {{$probabilitas_status_pekerja_tdktetap_request_dapat}} *
                           {{$probabilitas_status_skada_request_dapat}}</h5>
                          </td>
                          <td class="center"><b><h5>
                            <?php
                            $nilai1 = number_format($probabilitas_kelengkapan_ortu_lengkap_dapat_request *
                                      $probabilitas_status_rumah_sewa_request_dapat *
                                      $probabilitas_status_pekerja_tdktetap_request_dapat *
                                      $probabilitas_status_skada_request_dapat, 7);
                            ?>
                            <input type="hidden" name="probabilitas_dapat" value="{{$nilai1}}">
                               {{$nilai1}}  
                          </h5>
                        </td> 
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Probabilitas Tidak Dapat</h5></td>
                        <td class="center"><b><h5>
                          {{$probabilitas_kelengkapan_ortu_lengkap_tdkdapat_request}} * 
                          {{$probabilitas_status_rumah_sewa_request_tdkdapat}} *
                          {{$probabilitas_status_pekerja_tdktetap_request_tdkdapat}} *
                          {{$probabilitas_status_skada_request_tdkdapat}}
                        </h5>
                      </td>
                      <td class="center"><b><h5>
                        <?php
                        $nilai2 = number_format($probabilitas_kelengkapan_ortu_lengkap_tdkdapat_request *
                                  $probabilitas_status_rumah_sewa_request_tdkdapat *
                                  $probabilitas_status_pekerja_tdktetap_request_tdkdapat *
                                  $probabilitas_status_skada_request_tdkdapat, 7);
                        ?>
                         <input type="hidden" name="probabilitas_tdkdapat" value="{{$nilai2}}">
                          {{$nilai2}}  
                      </h5></td>
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Keterangan</h5></td>
                          <td class="center" colspan="2">
                            @if($nilai1 > $nilai2)
                            <br>
                              <b>
                                <input type="hidden" name="keterangan" value="Dapat Bantuan">
                                <span class="label label label-success">Dapat Bantuan<h2></span>
                                </h2>
                                @else
                                <input type="hidden" name="keterangan" value="Tidak Dapat Bantuan">
                              <span class="label label label-danger">Tidak Dapat Bantuan<h2></span>
                              </h2>
                            </td> 
                            @endif
                         </tr>
                        @endif
                      @if($status_kelengkapan_ortu == 'Lengkap' && 
                    $status_rumah_ortu == 'Rumah Sewa' &&
                    $status_pekerjaan_wali == 'Pekerja Tidak Tetap' &&
                    $status_sk_tidakmampu == 'Tidak Ada'
                        ) 
                     <tr>
                        <td class="center"><b><h5>Probabilitas Dapat</h5></td>                 
                          <td class="center"><b><h5>  
                           {{$probabilitas_kelengkapan_ortu_lengkap_dapat_request}} * 
                           {{$probabilitas_status_rumah_sewa_request_dapat}} *
                           {{$probabilitas_status_pekerja_tdktetap_request_dapat}} *
                           {{$probabilitas_status_sktdkada_request_dapat}}</h5>
                          </td>
                          <td class="center"><b><h5>
                            <?php
                            $nilai1 = number_format($probabilitas_kelengkapan_ortu_lengkap_dapat_request *
                                      $probabilitas_status_rumah_sewa_request_dapat *
                                      $probabilitas_status_pekerja_tdktetap_request_dapat *
                                      $probabilitas_status_sktdkada_request_dapat, 7);
                            ?>
                            <input type="hidden" name="probabilitas_dapat" value="{{$nilai1}}">
                               {{$nilai1}}  
                          </h5>
                        </td> 
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Probabilitas Tidak Dapat</h5></td>
                        <td class="center"><b><h5>
                          {{$probabilitas_kelengkapan_ortu_lengkap_tdkdapat_request}} * 
                          {{$probabilitas_status_rumah_sewa_request_tdkdapat}} *
                          {{$probabilitas_status_pekerja_tdktetap_request_tdkdapat}} *
                          {{$probabilitas_status_sktdkada_request_tdkdapat}}
                        </h5>
                      </td>
                      <td class="center"><b><h5>
                        <?php
                        $nilai2 = number_format($probabilitas_kelengkapan_ortu_lengkap_tdkdapat_request *
                                  $probabilitas_status_rumah_sewa_request_tdkdapat *
                                  $probabilitas_status_pekerja_tdktetap_request_tdkdapat *
                                  $probabilitas_status_sktdkada_request_tdkdapat, 7);
                        ?>
                         <input type="hidden" name="probabilitas_tdkdapat" value="{{$nilai2}}">
                          {{$nilai2}}  
                      </h5></td>
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Keterangan</h5></td>
                          <td class="center" colspan="2">
                            @if($nilai1 > $nilai2)
                            <br>
                              <b>
                                <input type="hidden" name="keterangan" value="Dapat Bantuan">
                                <span class="label label label-success">Dapat Bantuan<h2></span>
                                </h2>
                                @else
                                <input type="hidden" name="keterangan" value="Tidak Dapat Bantuan">
                              <span class="label label label-danger">Tidak Dapat Bantuan<h2></span>
                              </h2>
                            </td> 
                            @endif
                         </tr>
                        @endif
                      @if($status_kelengkapan_ortu == 'Lengkap' && 
                    $status_rumah_ortu == 'Rumah Sewa' &&
                    $status_pekerjaan_wali == 'Usaha' &&
                    $status_sk_tidakmampu == 'Ada'
                        ) 
                     <tr>
                        <td class="center"><b><h5>Probabilitas Dapat</h5></td>                 
                          <td class="center"><b><h5>  
                           {{$probabilitas_kelengkapan_ortu_lengkap_dapat_request}} * 
                           {{$probabilitas_status_rumah_sewa_request_dapat}} *
                           {{$probabilitas_status_pekerja_usaha_request_dapat}} *
                           {{$probabilitas_status_skada_request_dapat}}</h5>
                          </td>
                          <td class="center"><b><h5>
                            <?php
                            $nilai1 = number_format($probabilitas_kelengkapan_ortu_lengkap_dapat_request *
                                      $probabilitas_status_rumah_sewa_request_dapat *
                                      $probabilitas_status_pekerja_usaha_request_dapat *
                                      $probabilitas_status_skada_request_dapat, 7);
                            ?>
                            <input type="hidden" name="probabilitas_dapat" value="{{$nilai1}}">
                               {{$nilai1}}  
                          </h5>
                        </td> 
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Probabilitas Tidak Dapat</h5></td>
                        <td class="center"><b><h5>
                          {{$probabilitas_kelengkapan_ortu_lengkap_tdkdapat_request}} * 
                          {{$probabilitas_status_rumah_sewa_request_tdkdapat}} *
                          {{$probabilitas_status_pekerja_usaha_request_tdkdapat}} *
                          {{$probabilitas_status_skada_request_tdkdapat}}
                        </h5>
                      </td>
                      <td class="center"><b><h5>
                        <?php
                        $nilai2 = number_format($probabilitas_kelengkapan_ortu_lengkap_tdkdapat_request *
                                  $probabilitas_status_rumah_sewa_request_tdkdapat *
                                  $probabilitas_status_pekerja_usaha_request_tdkdapat *
                                  $probabilitas_status_skada_request_tdkdapat, 7);
                        ?>
                         <input type="hidden" name="probabilitas_tdkdapat" value="{{$nilai2}}">
                          {{$nilai2}}  
                      </h5></td>
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Keterangan</h5></td>
                          <td class="center" colspan="2">
                            @if($nilai1 > $nilai2)
                            <br>
                              <b>
                                <input type="hidden" name="keterangan" value="Dapat Bantuan">
                                <span class="label label label-success">Dapat Bantuan<h2></span>
                                </h2>
                                @else
                                <input type="hidden" name="keterangan" value="Tidak Dapat Bantuan">
                              <span class="label label label-danger">Tidak Dapat Bantuan<h2></span>
                              </h2>
                            </td> 
                            @endif
                         </tr>
                        @endif
                      @if($status_kelengkapan_ortu == 'Lengkap' && 
                    $status_rumah_ortu == 'Rumah Sewa' &&
                    $status_pekerjaan_wali == 'Usaha' &&
                    $status_sk_tidakmampu == 'Tidak Ada'
                        ) 
                     <tr>
                        <td class="center"><b><h5>Probabilitas Dapat</h5></td>                 
                          <td class="center"><b><h5>  
                           {{$probabilitas_kelengkapan_ortu_lengkap_dapat_request}} * 
                           {{$probabilitas_status_rumah_sewa_request_dapat}} *
                           {{$probabilitas_status_pekerja_usaha_request_dapat}} *
                           {{$probabilitas_status_sktdkada_request_dapat}}</h5>
                          </td>
                          <td class="center"><b><h5>
                            <?php
                            $nilai1 = number_format($probabilitas_kelengkapan_ortu_lengkap_dapat_request *
                                      $probabilitas_status_rumah_sewa_request_dapat *
                                      $probabilitas_status_pekerja_usaha_request_dapat *
                                      $probabilitas_status_sktdkada_request_dapat, 7);
                            ?>
                            <input type="hidden" name="probabilitas_dapat" value="{{$nilai1}}">
                               {{$nilai1}}  
                          </h5>
                        </td> 
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Probabilitas Tidak Dapat</h5></td>
                        <td class="center"><b><h5>
                          {{$probabilitas_kelengkapan_ortu_lengkap_tdkdapat_request}} * 
                          {{$probabilitas_status_rumah_sewa_request_tdkdapat}} *
                          {{$probabilitas_status_pekerja_usaha_request_tdkdapat}} *
                          {{$probabilitas_status_sktdkada_request_tdkdapat}}
                        </h5>
                      </td>
                      <td class="center"><b><h5>
                        <?php
                        $nilai2 = number_format($probabilitas_kelengkapan_ortu_lengkap_tdkdapat_request *
                                  $probabilitas_status_rumah_sewa_request_tdkdapat *
                                  $probabilitas_status_pekerja_usaha_request_tdkdapat *
                                  $probabilitas_status_sktdkada_request_tdkdapat, 7);
                        ?>
                         <input type="hidden" name="probabilitas_tdkdapat" value="{{$nilai2}}">
                          {{$nilai2}}  
                      </h5></td>
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Keterangan</h5></td>
                          <td class="center" colspan="2">
                            @if($nilai1 > $nilai2)
                            <br>
                              <b>
                                <input type="hidden" name="keterangan" value="Dapat Bantuan">
                                <span class="label label label-success">Dapat Bantuan<h2></span>
                                </h2>
                                @else
                                <input type="hidden" name="keterangan" value="Tidak Dapat Bantuan">
                              <span class="label label label-danger">Tidak Dapat Bantuan<h2></span>
                              </h2>
                            </td> 
                            @endif
                         </tr>
                        @endif
                      @if($status_kelengkapan_ortu == 'Lengkap' && 
                    $status_rumah_ortu == 'Kontrakan' &&
                    $status_pekerjaan_wali == 'Karyawan Swasta' &&
                    $status_sk_tidakmampu == 'Ada'
                        ) 
                     <tr>
                        <td class="center"><b><h5>Probabilitas Dapat</h5></td>                 
                          <td class="center"><b><h5>  
                           {{$probabilitas_kelengkapan_ortu_lengkap_dapat_request}} * 
                           {{$probabilitas_status_rumah_kontrakan_request_dapat}} *
                           {{$probabilitas_status_pekerja_swasta_request_dapat}} *
                           {{$probabilitas_status_skada_request_dapat}}</h5>
                          </td>
                          <td class="center"><b><h5>
                            <?php
                            $nilai1 = number_format($probabilitas_kelengkapan_ortu_lengkap_dapat_request *
                                      $probabilitas_status_rumah_kontrakan_request_dapat *
                                      $probabilitas_status_pekerja_swasta_request_dapat *
                                      $probabilitas_status_skada_request_dapat, 7);
                            ?>
                            <input type="hidden" name="probabilitas_dapat" value="{{$nilai1}}">
                               {{$nilai1}}  
                          </h5>
                        </td> 
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Probabilitas Tidak Dapat</h5></td>
                        <td class="center"><b><h5>
                          {{$probabilitas_kelengkapan_ortu_lengkap_tdkdapat_request}} * 
                          {{$probabilitas_status_rumah_kontrakan_request_tdkdapat}} *
                          {{$probabilitas_status_pekerja_swasta_request_tdkdapat}} *
                          {{$probabilitas_status_skada_request_tdkdapat}}
                        </h5>
                      </td>
                      <td class="center"><b><h5>
                        <?php
                        $nilai2 = number_format($probabilitas_kelengkapan_ortu_lengkap_tdkdapat_request *
                                  $probabilitas_status_rumah_kontrakan_request_tdkdapat *
                                  $probabilitas_status_pekerja_swasta_request_tdkdapat *
                                  $probabilitas_status_skada_request_tdkdapat, 7);
                        ?>
                         <input type="hidden" name="probabilitas_tdkdapat" value="{{$nilai2}}">
                          {{$nilai2}}  
                      </h5></td>
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Keterangan</h5></td>
                          <td class="center" colspan="2">
                            @if($nilai1 > $nilai2)
                            <br>
                              <b>
                                <input type="hidden" name="keterangan" value="Dapat Bantuan">
                                <span class="label label label-success">Dapat Bantuan<h2></span>
                                </h2>
                                @else
                                <input type="hidden" name="keterangan" value="Tidak Dapat Bantuan">
                              <span class="label label label-danger">Tidak Dapat Bantuan<h2></span>
                              </h2>
                            </td> 
                            @endif
                         </tr>
                        @endif
                      @if($status_kelengkapan_ortu == 'Lengkap' && 
                    $status_rumah_ortu == 'Kontrakan' &&
                    $status_pekerjaan_wali == 'Karyawan Swasta' &&
                    $status_sk_tidakmampu == 'Tidak Ada'
                        ) 
                     <tr>
                        <td class="center"><b><h5>Probabilitas Dapat</h5></td>                 
                          <td class="center"><b><h5>  
                           {{$probabilitas_kelengkapan_ortu_lengkap_dapat_request}} * 
                           {{$probabilitas_status_rumah_kontrakan_request_dapat}} *
                           {{$probabilitas_status_pekerja_swasta_request_dapat}} *
                           {{$probabilitas_status_sktdkada_request_dapat}}</h5>
                          </td>
                          <td class="center"><b><h5>
                            <?php
                            $nilai1 = number_format($probabilitas_kelengkapan_ortu_lengkap_dapat_request *
                                      $probabilitas_status_rumah_kontrakan_request_dapat *
                                      $probabilitas_status_pekerja_swasta_request_dapat *
                                      $probabilitas_status_sktdkada_request_dapat, 7);
                            ?>
                            <input type="hidden" name="probabilitas_dapat" value="{{$nilai1}}">
                               {{$nilai1}}  
                          </h5>
                        </td> 
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Probabilitas Tidak Dapat</h5></td>
                        <td class="center"><b><h5>
                          {{$probabilitas_kelengkapan_ortu_lengkap_tdkdapat_request}} * 
                          {{$probabilitas_status_rumah_kontrakan_request_tdkdapat}} *
                          {{$probabilitas_status_pekerja_swasta_request_tdkdapat}} *
                          {{$probabilitas_status_sktdkada_request_tdkdapat}}
                        </h5>
                      </td>
                      <td class="center"><b><h5>
                        <?php
                        $nilai2 = number_format($probabilitas_kelengkapan_ortu_lengkap_tdkdapat_request *
                                  $probabilitas_status_rumah_kontrakan_request_tdkdapat *
                                  $probabilitas_status_pekerja_swasta_request_tdkdapat *
                                  $probabilitas_status_sktdkada_request_tdkdapat, 7);
                        ?>
                         <input type="hidden" name="probabilitas_tdkdapat" value="{{$nilai2}}">
                          {{$nilai2}}  
                      </h5></td>
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Keterangan</h5></td>
                          <td class="center" colspan="2">
                            @if($nilai1 > $nilai2)
                            <br>
                              <b>
                                <input type="hidden" name="keterangan" value="Dapat Bantuan">
                                <span class="label label label-success">Dapat Bantuan<h2></span>
                                </h2>
                                @else
                                <input type="hidden" name="keterangan" value="Tidak Dapat Bantuan">
                              <span class="label label label-danger">Tidak Dapat Bantuan<h2></span>
                              </h2>
                            </td> 
                            @endif
                         </tr>
                        @endif
                      @if($status_kelengkapan_ortu == 'Lengkap' && 
                    $status_rumah_ortu == 'Kontrakan' &&
                    $status_pekerjaan_wali == 'Pegawai Negri' &&
                    $status_sk_tidakmampu == 'Ada'
                        ) 
                     <tr>
                        <td class="center"><b><h5>Probabilitas Dapat</h5></td>                 
                          <td class="center"><b><h5>  
                           {{$probabilitas_kelengkapan_ortu_lengkap_dapat_request}} * 
                           {{$probabilitas_status_rumah_kontrakan_request_dapat}} *
                           {{$probabilitas_status_pekerja_negri_request_dapat}} *
                           {{$probabilitas_status_skada_request_dapat}}</h5>
                          </td>
                          <td class="center"><b><h5>
                            <?php
                            $nilai1 = number_format($probabilitas_kelengkapan_ortu_lengkap_dapat_request *
                                      $probabilitas_status_rumah_kontrakan_request_dapat *
                                      $probabilitas_status_pekerja_negri_request_dapat *
                                      $probabilitas_status_skada_request_dapat, 7);
                            ?>
                            <input type="hidden" name="probabilitas_dapat" value="{{$nilai1}}">
                               {{$nilai1}}  
                          </h5>
                        </td> 
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Probabilitas Tidak Dapat</h5></td>
                        <td class="center"><b><h5>
                          {{$probabilitas_kelengkapan_ortu_lengkap_tdkdapat_request}} * 
                          {{$probabilitas_status_rumah_kontrakan_request_tdkdapat}} *
                          {{$probabilitas_status_pekerja_negri_request_tdkdapat}} *
                          {{$probabilitas_status_skada_request_tdkdapat}}
                        </h5>
                      </td>
                      <td class="center"><b><h5>
                        <?php
                        $nilai2 = number_format($probabilitas_kelengkapan_ortu_lengkap_tdkdapat_request *
                                  $probabilitas_status_rumah_kontrakan_request_tdkdapat *
                                  $probabilitas_status_pekerja_negri_request_tdkdapat *
                                  $probabilitas_status_skada_request_tdkdapat, 7);
                        ?>
                         <input type="hidden" name="probabilitas_tdkdapat" value="{{$nilai2}}">
                          {{$nilai2}}  
                      </h5></td>
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Keterangan</h5></td>
                          <td class="center" colspan="2">
                            @if($nilai1 > $nilai2)
                            <br>
                              <b>
                                <input type="hidden" name="keterangan" value="Dapat Bantuan">
                                <span class="label label label-success">Dapat Bantuan<h2></span>
                                </h2>
                                @else
                                <input type="hidden" name="keterangan" value="Tidak Dapat Bantuan">
                              <span class="label label label-danger">Tidak Dapat Bantuan<h2></span>
                              </h2>
                            </td> 
                            @endif
                         </tr>
                        @endif
                      @if($status_kelengkapan_ortu == 'Lengkap' && 
                    $status_rumah_ortu == 'Kontrakan' &&
                    $status_pekerjaan_wali == 'Pegawai Negri' &&
                    $status_sk_tidakmampu == 'Tidak Ada'
                        ) 
                     <tr>
                        <td class="center"><b><h5>Probabilitas Dapat</h5></td>                 
                          <td class="center"><b><h5>  
                           {{$probabilitas_kelengkapan_ortu_lengkap_dapat_request}} * 
                           {{$probabilitas_status_rumah_kontrakan_request_dapat}} *
                           {{$probabilitas_status_pekerja_negri_request_dapat}} *
                           {{$probabilitas_status_sktdkada_request_dapat}}</h5>
                          </td>
                          <td class="center"><b><h5>
                            <?php
                            $nilai1 = number_format($probabilitas_kelengkapan_ortu_lengkap_dapat_request *
                                      $probabilitas_status_rumah_kontrakan_request_dapat *
                                      $probabilitas_status_pekerja_negri_request_dapat *
                                      $probabilitas_status_sktdkada_request_dapat, 7);
                            ?>
                            <input type="hidden" name="probabilitas_dapat" value="{{$nilai1}}">
                               {{$nilai1}}  
                          </h5>
                        </td> 
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Probabilitas Tidak Dapat</h5></td>
                        <td class="center"><b><h5>
                          {{$probabilitas_kelengkapan_ortu_lengkap_tdkdapat_request}} * 
                          {{$probabilitas_status_rumah_kontrakan_request_tdkdapat}} *
                          {{$probabilitas_status_pekerja_negri_request_tdkdapat}} *
                          {{$probabilitas_status_sktdkada_request_tdkdapat}}
                        </h5>
                      </td>
                      <td class="center"><b><h5>
                        <?php
                        $nilai2 = number_format($probabilitas_kelengkapan_ortu_lengkap_tdkdapat_request *
                                  $probabilitas_status_rumah_kontrakan_request_tdkdapat *
                                  $probabilitas_status_pekerja_negri_request_tdkdapat *
                                  $probabilitas_status_sktdkada_request_tdkdapat, 7);
                        ?>
                         <input type="hidden" name="probabilitas_tdkdapat" value="{{$nilai2}}">
                          {{$nilai2}}  
                      </h5></td>
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Keterangan</h5></td>
                          <td class="center" colspan="2">
                            @if($nilai1 > $nilai2)
                            <br>
                              <b>
                                <input type="hidden" name="keterangan" value="Dapat Bantuan">
                                <span class="label label label-success">Dapat Bantuan<h2></span>
                                </h2>
                                @else
                                <input type="hidden" name="keterangan" value="Tidak Dapat Bantuan">
                              <span class="label label label-danger">Tidak Dapat Bantuan<h2></span>
                              </h2>
                            </td> 
                            @endif
                         </tr>
                        @endif
                      @if($status_kelengkapan_ortu == 'Lengkap' && 
                    $status_rumah_ortu == 'Kontrakan' &&
                    $status_pekerjaan_wali == 'Pekerja Tidak Tetap' &&
                    $status_sk_tidakmampu == 'Ada'
                        ) 
                     <tr>
                        <td class="center"><b><h5>Probabilitas Dapat</h5></td>                 
                          <td class="center"><b><h5>  
                           {{$probabilitas_kelengkapan_ortu_lengkap_dapat_request}} * 
                           {{$probabilitas_status_rumah_kontrakan_request_dapat}} *
                           {{$probabilitas_status_pekerja_tdktetap_request_dapat}} *
                           {{$probabilitas_status_skada_request_dapat}}</h5>
                          </td>
                          <td class="center"><b><h5>
                            <?php
                            $nilai1 = number_format($probabilitas_kelengkapan_ortu_lengkap_dapat_request *
                                      $probabilitas_status_rumah_kontrakan_request_dapat *
                                      $probabilitas_status_pekerja_tdktetap_request_dapat *
                                      $probabilitas_status_skada_request_dapat, 7);
                            ?>
                            <input type="hidden" name="probabilitas_dapat" value="{{$nilai1}}">
                               {{$nilai1}}  
                          </h5>
                        </td> 
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Probabilitas Tidak Dapat</h5></td>
                        <td class="center"><b><h5>
                          {{$probabilitas_kelengkapan_ortu_lengkap_tdkdapat_request}} * 
                          {{$probabilitas_status_rumah_kontrakan_request_tdkdapat}} *
                          {{$probabilitas_status_pekerja_tdktetap_request_tdkdapat}} *
                          {{$probabilitas_status_skada_request_tdkdapat}}
                        </h5>
                      </td>
                      <td class="center"><b><h5>
                        <?php
                        $nilai2 = number_format($probabilitas_kelengkapan_ortu_lengkap_tdkdapat_request *
                                  $probabilitas_status_rumah_kontrakan_request_tdkdapat *
                                  $probabilitas_status_pekerja_tdktetap_request_tdkdapat *
                                  $probabilitas_status_skada_request_tdkdapat, 7);
                        ?>
                         <input type="hidden" name="probabilitas_tdkdapat" value="{{$nilai2}}">
                          {{$nilai2}}  
                      </h5></td>
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Keterangan</h5></td>
                          <td class="center" colspan="2">
                            @if($nilai1 > $nilai2)
                            <br>
                              <b>
                                <input type="hidden" name="keterangan" value="Dapat Bantuan">
                                <span class="label label label-success">Dapat Bantuan<h2></span>
                                </h2>
                                @else
                                <input type="hidden" name="keterangan" value="Tidak Dapat Bantuan">
                              <span class="label label label-danger">Tidak Dapat Bantuan<h2></span>
                              </h2>
                            </td> 
                            @endif
                         </tr>
                        @endif
                      @if($status_kelengkapan_ortu == 'Lengkap' && 
                    $status_rumah_ortu == 'Kontrakan' &&
                    $status_pekerjaan_wali == 'Pekerja Tidak Tetap' &&
                    $status_sk_tidakmampu == 'Tidak Ada'
                        ) 
                     <tr>
                        <td class="center"><b><h5>Probabilitas Dapat</h5></td>                 
                          <td class="center"><b><h5>  
                           {{$probabilitas_kelengkapan_ortu_lengkap_dapat_request}} * 
                           {{$probabilitas_status_rumah_kontrakan_request_dapat}} *
                           {{$probabilitas_status_pekerja_tdktetap_request_dapat}} *
                           {{$probabilitas_status_sktdkada_request_dapat}}</h5>
                          </td>
                          <td class="center"><b><h5>
                            <?php
                            $nilai1 = number_format($probabilitas_kelengkapan_ortu_lengkap_dapat_request *
                                      $probabilitas_status_rumah_kontrakan_request_dapat *
                                      $probabilitas_status_pekerja_tdktetap_request_dapat *
                                      $probabilitas_status_sktdkada_request_dapat, 7);
                            ?>
                            <input type="hidden" name="probabilitas_dapat" value="{{$nilai1}}">
                               {{$nilai1}}  
                          </h5>
                        </td> 
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Probabilitas Tidak Dapat</h5></td>
                        <td class="center"><b><h5>
                          {{$probabilitas_kelengkapan_ortu_lengkap_tdkdapat_request}} * 
                          {{$probabilitas_status_rumah_kontrakan_request_tdkdapat}} *
                          {{$probabilitas_status_pekerja_tdktetap_request_tdkdapat}} *
                          {{$probabilitas_status_sktdkada_request_tdkdapat}}
                        </h5>
                      </td>
                      <td class="center"><b><h5>
                        <?php
                        $nilai2 = number_format($probabilitas_kelengkapan_ortu_lengkap_tdkdapat_request *
                                  $probabilitas_status_rumah_kontrakan_request_tdkdapat *
                                  $probabilitas_status_pekerja_tdktetap_request_tdkdapat *
                                  $probabilitas_status_sktdkada_request_tdkdapat, 7);
                        ?>
                         <input type="hidden" name="probabilitas_tdkdapat" value="{{$nilai2}}">
                          {{$nilai2}}  
                      </h5></td>
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Keterangan</h5></td>
                          <td class="center" colspan="2">
                            @if($nilai1 > $nilai2)
                            <br>
                              <b>
                                <input type="hidden" name="keterangan" value="Dapat Bantuan">
                                <span class="label label label-success">Dapat Bantuan<h2></span>
                                </h2>
                                @else
                                <input type="hidden" name="keterangan" value="Tidak Dapat Bantuan">
                              <span class="label label label-danger">Tidak Dapat Bantuan<h2></span>
                              </h2>
                            </td> 
                            @endif
                         </tr>
                        @endif
                      @if($status_kelengkapan_ortu == 'Lengkap' && 
                    $status_rumah_ortu == 'Kontrakan' &&
                    $status_pekerjaan_wali == 'Usaha' &&
                    $status_sk_tidakmampu == 'Ada'
                        ) 
                     <tr>
                        <td class="center"><b><h5>Probabilitas Dapat</h5></td>                 
                          <td class="center"><b><h5>  
                           {{$probabilitas_kelengkapan_ortu_lengkap_dapat_request}} * 
                           {{$probabilitas_status_rumah_kontrakan_request_dapat}} *
                           {{$probabilitas_status_pekerja_usaha_request_dapat}} *
                           {{$probabilitas_status_skada_request_dapat}}</h5>
                          </td>
                          <td class="center"><b><h5>
                            <?php
                            $nilai1 = number_format($probabilitas_kelengkapan_ortu_lengkap_dapat_request *
                                      $probabilitas_status_rumah_kontrakan_request_dapat *
                                      $probabilitas_status_pekerja_usaha_request_dapat *
                                      $probabilitas_status_skada_request_dapat, 7);
                            ?>
                            <input type="hidden" name="probabilitas_dapat" value="{{$nilai1}}">
                               {{$nilai1}}  
                          </h5>
                        </td> 
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Probabilitas Tidak Dapat</h5></td>
                        <td class="center"><b><h5>
                          {{$probabilitas_kelengkapan_ortu_lengkap_tdkdapat_request}} * 
                          {{$probabilitas_status_rumah_kontrakan_request_tdkdapat}} *
                          {{$probabilitas_status_pekerja_usaha_request_tdkdapat}} *
                          {{$probabilitas_status_skada_request_tdkdapat}}
                        </h5>
                      </td>
                      <td class="center"><b><h5>
                        <?php
                        $nilai2 = number_format($probabilitas_kelengkapan_ortu_lengkap_tdkdapat_request *
                                  $probabilitas_status_rumah_kontrakan_request_tdkdapat *
                                  $probabilitas_status_pekerja_usaha_request_tdkdapat *
                                  $probabilitas_status_skada_request_tdkdapat, 7);
                        ?>
                         <input type="hidden" name="probabilitas_tdkdapat" value="{{$nilai2}}">
                          {{$nilai2}}  
                      </h5></td>
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Keterangan</h5></td>
                          <td class="center" colspan="2">
                            @if($nilai1 > $nilai2)
                            <br>
                              <b>
                                <input type="hidden" name="keterangan" value="Dapat Bantuan">
                                <span class="label label label-success">Dapat Bantuan<h2></span>
                                </h2>
                                @else
                                <input type="hidden" name="keterangan" value="Tidak Dapat Bantuan">
                              <span class="label label label-danger">Tidak Dapat Bantuan<h2></span>
                              </h2>
                            </td> 
                            @endif
                         </tr>
                        @endif
                      @if($status_kelengkapan_ortu == 'Lengkap' && 
                    $status_rumah_ortu == 'Kontrakan' &&
                    $status_pekerjaan_wali == 'Usaha' &&
                    $status_sk_tidakmampu == 'Tidak Ada'
                        ) 
                     <tr>
                        <td class="center"><b><h5>Probabilitas Dapat</h5></td>                 
                          <td class="center"><b><h5>  
                           {{$probabilitas_kelengkapan_ortu_lengkap_dapat_request}} * 
                           {{$probabilitas_status_rumah_kontrakan_request_dapat}} *
                           {{$probabilitas_status_pekerja_usaha_request_dapat}} *
                           {{$probabilitas_status_sktdkada_request_dapat}}</h5>
                          </td>
                          <td class="center"><b><h5>
                            <?php
                            $nilai1 = number_format($probabilitas_kelengkapan_ortu_lengkap_dapat_request *
                                      $probabilitas_status_rumah_kontrakan_request_dapat *
                                      $probabilitas_status_pekerja_usaha_request_dapat *
                                      $probabilitas_status_sktdkada_request_dapat, 7);
                            ?>
                            <input type="hidden" name="probabilitas_dapat" value="{{$nilai1}}">
                               {{$nilai1}}  
                          </h5>
                        </td> 
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Probabilitas Tidak Dapat</h5></td>
                        <td class="center"><b><h5>
                          {{$probabilitas_kelengkapan_ortu_lengkap_tdkdapat_request}} * 
                          {{$probabilitas_status_rumah_kontrakan_request_tdkdapat}} *
                          {{$probabilitas_status_pekerja_usaha_request_tdkdapat}} *
                          {{$probabilitas_status_sktdkada_request_tdkdapat}}
                        </h5>
                      </td>
                      <td class="center"><b><h5>
                        <?php
                        $nilai2 = number_format($probabilitas_kelengkapan_ortu_lengkap_tdkdapat_request *
                                  $probabilitas_status_rumah_kontrakan_request_tdkdapat *
                                  $probabilitas_status_pekerja_usaha_request_tdkdapat *
                                  $probabilitas_status_sktdkada_request_tdkdapat, 7);
                        ?>
                         <input type="hidden" name="probabilitas_tdkdapat" value="{{$nilai2}}">
                          {{$nilai2}}  
                      </h5></td>
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Keterangan</h5></td>
                          <td class="center" colspan="2">
                            @if($nilai1 > $nilai2)
                            <br>
                              <b>
                                <input type="hidden" name="keterangan" value="Dapat Bantuan">
                                <span class="label label label-success">Dapat Bantuan<h2></span>
                                </h2>
                                @else
                                <input type="hidden" name="keterangan" value="Tidak Dapat Bantuan">
                              <span class="label label label-danger">Tidak Dapat Bantuan<h2></span>
                              </h2>
                            </td> 
                            @endif
                         </tr>
                        @endif
                      @if($status_kelengkapan_ortu == 'Lengkap' && 
                    $status_rumah_ortu == 'Tinggal Dengan Saudara' &&
                    $status_pekerjaan_wali == 'Karyawan Swasta' &&
                    $status_sk_tidakmampu == 'Ada'
                        ) 
                     <tr>
                        <td class="center"><b><h5>Probabilitas Dapat</h5></td>                 
                          <td class="center"><b><h5>  
                           {{$probabilitas_kelengkapan_ortu_lengkap_dapat_request}} * 
                           {{$probabilitas_status_rumah_saudara_request_dapat}} *
                           {{$probabilitas_status_pekerja_swasta_request_dapat}} *
                           {{$probabilitas_status_skada_request_dapat}}</h5>
                          </td>
                          <td class="center"><b><h5>
                            <?php
                            $nilai1 = number_format($probabilitas_kelengkapan_ortu_lengkap_dapat_request *
                                      $probabilitas_status_rumah_saudara_request_dapat *
                                      $probabilitas_status_pekerja_swasta_request_dapat *
                                      $probabilitas_status_skada_request_dapat, 7);
                            ?>
                            <input type="hidden" name="probabilitas_dapat" value="{{$nilai1}}">
                               {{$nilai1}}  
                          </h5>
                        </td> 
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Probabilitas Tidak Dapat</h5></td>
                        <td class="center"><b><h5>
                          {{$probabilitas_kelengkapan_ortu_lengkap_tdkdapat_request}} * 
                          {{$probabilitas_status_rumah_saudara_request_tdkdapat}} *
                          {{$probabilitas_status_pekerja_swasta_request_tdkdapat}} *
                          {{$probabilitas_status_skada_request_tdkdapat}}
                        </h5>
                      </td>
                      <td class="center"><b><h5>
                        <?php
                        $nilai2 = number_format($probabilitas_kelengkapan_ortu_lengkap_tdkdapat_request *
                                  $probabilitas_status_rumah_saudara_request_tdkdapat *
                                  $probabilitas_status_pekerja_swasta_request_tdkdapat *
                                  $probabilitas_status_skada_request_tdkdapat, 7);
                        ?>
                         <input type="hidden" name="probabilitas_tdkdapat" value="{{$nilai2}}">
                          {{$nilai2}}  
                      </h5></td>
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Keterangan</h5></td>
                          <td class="center" colspan="2">
                            @if($nilai1 > $nilai2)
                            <br>
                              <b>
                                <input type="hidden" name="keterangan" value="Dapat Bantuan">
                                <span class="label label label-success">Dapat Bantuan<h2></span>
                                </h2>
                                @else
                                <input type="hidden" name="keterangan" value="Tidak Dapat Bantuan">
                              <span class="label label label-danger">Tidak Dapat Bantuan<h2></span>
                              </h2>
                            </td> 
                            @endif
                         </tr>
                        @endif
                      @if($status_kelengkapan_ortu == 'Lengkap' && 
                    $status_rumah_ortu == 'Tinggal Dengan Saudara' &&
                    $status_pekerjaan_wali == 'Karyawan Swasta' &&
                    $status_sk_tidakmampu == 'Tidak Ada'
                        ) 
                     <tr>
                        <td class="center"><b><h5>Probabilitas Dapat</h5></td>                 
                          <td class="center"><b><h5>  
                           {{$probabilitas_kelengkapan_ortu_lengkap_dapat_request}} * 
                           {{$probabilitas_status_rumah_saudara_request_dapat}} *
                           {{$probabilitas_status_pekerja_swasta_request_dapat}} *
                           {{$probabilitas_status_sktdkada_request_dapat}}</h5>
                          </td>
                          <td class="center"><b><h5>
                            <?php
                            $nilai1 = number_format($probabilitas_kelengkapan_ortu_lengkap_dapat_request *
                                      $probabilitas_status_rumah_saudara_request_dapat *
                                      $probabilitas_status_pekerja_swasta_request_dapat *
                                      $probabilitas_status_sktdkada_request_dapat, 7);
                            ?>
                            <input type="hidden" name="probabilitas_dapat" value="{{$nilai1}}">
                               {{$nilai1}}  
                          </h5>
                        </td> 
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Probabilitas Tidak Dapat</h5></td>
                        <td class="center"><b><h5>
                          {{$probabilitas_kelengkapan_ortu_lengkap_tdkdapat_request}} * 
                          {{$probabilitas_status_rumah_saudara_request_tdkdapat}} *
                          {{$probabilitas_status_pekerja_swasta_request_tdkdapat}} *
                          {{$probabilitas_status_sktdkada_request_tdkdapat}}
                        </h5>
                      </td>
                      <td class="center"><b><h5>
                        <?php
                        $nilai2 = number_format($probabilitas_kelengkapan_ortu_lengkap_tdkdapat_request *
                                  $probabilitas_status_rumah_kontrakan_request_tdkdapat *
                                  $probabilitas_status_pekerja_swasta_request_tdkdapat *
                                  $probabilitas_status_sktdkada_request_tdkdapat, 7);
                        ?>
                         <input type="hidden" name="probabilitas_tdkdapat" value="{{$nilai2}}">
                          {{$nilai2}}  
                      </h5></td>
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Keterangan</h5></td>
                          <td class="center" colspan="2">
                            @if($nilai1 > $nilai2)
                            <br>
                              <b>
                                <input type="hidden" name="keterangan" value="Dapat Bantuan">
                                <span class="label label label-success">Dapat Bantuan<h2></span>
                                </h2>
                                @else
                                <input type="hidden" name="keterangan" value="Tidak Dapat Bantuan">
                              <span class="label label label-danger">Tidak Dapat Bantuan<h2></span>
                              </h2>
                            </td> 
                            @endif
                         </tr>
                        @endif
                      @if($status_kelengkapan_ortu == 'Lengkap' && 
                    $status_rumah_ortu == 'Tinggal Dengan Saudara' &&
                    $status_pekerjaan_wali == 'Pegawai Negri' &&
                    $status_sk_tidakmampu == 'Ada'
                        ) 
                     <tr>
                        <td class="center"><b><h5>Probabilitas Dapat</h5></td>                 
                          <td class="center"><b><h5>  
                           {{$probabilitas_kelengkapan_ortu_lengkap_dapat_request}} * 
                           {{$probabilitas_status_rumah_saudara_request_dapat}} *
                           {{$probabilitas_status_pekerja_negri_request_dapat}} *
                           {{$probabilitas_status_skada_request_dapat}}</h5>
                          </td>
                          <td class="center"><b><h5>
                            <?php
                            $nilai1 = number_format($probabilitas_kelengkapan_ortu_lengkap_dapat_request *
                                      $probabilitas_status_rumah_saudara_request_dapat *
                                      $probabilitas_status_pekerja_negri_request_dapat *
                                      $probabilitas_status_skada_request_dapat, 7);
                            ?>
                            <input type="hidden" name="probabilitas_dapat" value="{{$nilai1}}">
                               {{$nilai1}}  
                          </h5>
                        </td> 
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Probabilitas Tidak Dapat</h5></td>
                        <td class="center"><b><h5>
                          {{$probabilitas_kelengkapan_ortu_lengkap_tdkdapat_request}} * 
                          {{$probabilitas_status_rumah_saudara_request_tdkdapat}} *
                          {{$probabilitas_status_pekerja_negri_request_tdkdapat}} *
                          {{$probabilitas_status_skada_request_tdkdapat}}
                        </h5>
                      </td>
                      <td class="center"><b><h5>
                        <?php
                        $nilai2 = number_format($probabilitas_kelengkapan_ortu_lengkap_tdkdapat_request *
                                  $probabilitas_status_rumah_saudara_request_tdkdapat *
                                  $probabilitas_status_pekerja_negri_request_tdkdapat *
                                  $probabilitas_status_skada_request_tdkdapat, 7);
                        ?>
                         <input type="hidden" name="probabilitas_tdkdapat" value="{{$nilai2}}">
                          {{$nilai2}}  
                      </h5></td>
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Keterangan</h5></td>
                          <td class="center" colspan="2">
                            @if($nilai1 > $nilai2)
                            <br>
                              <b>
                                <input type="hidden" name="keterangan" value="Dapat Bantuan">
                                <span class="label label label-success">Dapat Bantuan<h2></span>
                                </h2>
                                @else
                                <input type="hidden" name="keterangan" value="Tidak Dapat Bantuan">
                              <span class="label label label-danger">Tidak Dapat Bantuan<h2></span>
                              </h2>
                            </td> 
                            @endif
                         </tr>
                        @endif
                      @if($status_kelengkapan_ortu == 'Lengkap' && 
                    $status_rumah_ortu == 'Tinggal Dengan Saudara' &&
                    $status_pekerjaan_wali == 'Pegawai Negri' &&
                    $status_sk_tidakmampu == 'Tidak Ada'
                        ) 
                     <tr>
                        <td class="center"><b><h5>Probabilitas Dapat</h5></td>                 
                          <td class="center"><b><h5>  
                           {{$probabilitas_kelengkapan_ortu_lengkap_dapat_request}} * 
                           {{$probabilitas_status_rumah_saudara_request_dapat}} *
                           {{$probabilitas_status_pekerja_negri_request_dapat}} *
                           {{$probabilitas_status_sktdkada_request_dapat}}</h5>
                          </td>
                          <td class="center"><b><h5>
                            <?php
                            $nilai1 = number_format($probabilitas_kelengkapan_ortu_lengkap_dapat_request *
                                      $probabilitas_status_rumah_saudara_request_dapat *
                                      $probabilitas_status_pekerja_negri_request_dapat *
                                      $probabilitas_status_sktdkada_request_dapat, 7);
                            ?>
                            <input type="hidden" name="probabilitas_dapat" value="{{$nilai1}}">
                               {{$nilai1}}  
                          </h5>
                        </td> 
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Probabilitas Tidak Dapat</h5></td>
                        <td class="center"><b><h5>
                          {{$probabilitas_kelengkapan_ortu_lengkap_tdkdapat_request}} * 
                          {{$probabilitas_status_rumah_saudara_request_tdkdapat}} *
                          {{$probabilitas_status_pekerja_negri_request_tdkdapat}} *
                          {{$probabilitas_status_sktdkada_request_tdkdapat}}
                        </h5>
                      </td>
                      <td class="center"><b><h5>
                        <?php
                        $nilai2 = number_format($probabilitas_kelengkapan_ortu_lengkap_tdkdapat_request *
                                  $probabilitas_status_rumah_kontrakan_request_tdkdapat *
                                  $probabilitas_status_pekerja_negri_request_tdkdapat *
                                  $probabilitas_status_sktdkada_request_tdkdapat, 7);
                        ?>
                         <input type="hidden" name="probabilitas_tdkdapat" value="{{$nilai2}}">
                          {{$nilai2}}  
                      </h5></td>
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Keterangan</h5></td>
                          <td class="center" colspan="2">
                            @if($nilai1 > $nilai2)
                            <br>
                              <b>
                                <input type="hidden" name="keterangan" value="Dapat Bantuan">
                                <span class="label label label-success">Dapat Bantuan<h2></span>
                                </h2>
                                @else
                                <input type="hidden" name="keterangan" value="Tidak Dapat Bantuan">
                              <span class="label label label-danger">Tidak Dapat Bantuan<h2></span>
                              </h2>
                            </td> 
                            @endif
                         </tr>
                        @endif
                      @if($status_kelengkapan_ortu == 'Lengkap' && 
                    $status_rumah_ortu == 'Tinggal Dengan Saudara' &&
                    $status_pekerjaan_wali == 'Pekerja Tidak Tetap' &&
                    $status_sk_tidakmampu == 'Ada'
                        ) 
                     <tr>
                        <td class="center"><b><h5>Probabilitas Dapat</h5></td>                 
                          <td class="center"><b><h5>  
                           {{$probabilitas_kelengkapan_ortu_lengkap_dapat_request}} * 
                           {{$probabilitas_status_rumah_saudara_request_dapat}} *
                           {{$probabilitas_status_pekerja_tdktetap_request_dapat}} *
                           {{$probabilitas_status_skada_request_dapat}}</h5>
                          </td>
                          <td class="center"><b><h5>
                            <?php
                            $nilai1 = number_format($probabilitas_kelengkapan_ortu_lengkap_dapat_request *
                                      $probabilitas_status_rumah_saudara_request_dapat *
                                      $probabilitas_status_pekerja_tdktetap_request_dapat *
                                      $probabilitas_status_skada_request_dapat, 7);
                            ?>
                            <input type="hidden" name="probabilitas_dapat" value="{{$nilai1}}">
                               {{$nilai1}}  
                          </h5>
                        </td> 
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Probabilitas Tidak Dapat</h5></td>
                        <td class="center"><b><h5>
                          {{$probabilitas_kelengkapan_ortu_lengkap_tdkdapat_request}} * 
                          {{$probabilitas_status_rumah_saudara_request_tdkdapat}} *
                          {{$probabilitas_status_pekerja_tdktetap_request_tdkdapat}} *
                          {{$probabilitas_status_skada_request_tdkdapat}}
                        </h5>
                      </td>
                      <td class="center"><b><h5>
                        <?php
                        $nilai2 = number_format($probabilitas_kelengkapan_ortu_lengkap_tdkdapat_request *
                                  $probabilitas_status_rumah_saudara_request_tdkdapat *
                                  $probabilitas_status_pekerja_tdktetap_request_tdkdapat *
                                  $probabilitas_status_skada_request_tdkdapat, 7);
                        ?>
                         <input type="hidden" name="probabilitas_tdkdapat" value="{{$nilai2}}">
                          {{$nilai2}}  
                      </h5></td>
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Keterangan</h5></td>
                          <td class="center" colspan="2">
                            @if($nilai1 > $nilai2)
                            <br>
                              <b>
                                <input type="hidden" name="keterangan" value="Dapat Bantuan">
                                <span class="label label label-success">Dapat Bantuan<h2></span>
                                </h2>
                                @else
                                <input type="hidden" name="keterangan" value="Tidak Dapat Bantuan">
                              <span class="label label label-danger">Tidak Dapat Bantuan<h2></span>
                              </h2>
                            </td> 
                            @endif
                         </tr>
                        @endif
                      @if($status_kelengkapan_ortu == 'Lengkap' && 
                    $status_rumah_ortu == 'Tinggal Dengan Saudara' &&
                    $status_pekerjaan_wali == 'Pekerja Tidak Tetap' &&
                    $status_sk_tidakmampu == 'Tidak Ada'
                        ) 
                     <tr>
                        <td class="center"><b><h5>Probabilitas Dapat</h5></td>                 
                          <td class="center"><b><h5>  
                           {{$probabilitas_kelengkapan_ortu_lengkap_dapat_request}} * 
                           {{$probabilitas_status_rumah_saudara_request_dapat}} *
                           {{$probabilitas_status_pekerja_tdktetap_request_dapat}} *
                           {{$probabilitas_status_sktdkada_request_dapat}}</h5>
                          </td>
                          <td class="center"><b><h5>
                            <?php
                            $nilai1 = number_format($probabilitas_kelengkapan_ortu_lengkap_dapat_request *
                                      $probabilitas_status_rumah_saudara_request_dapat *
                                      $probabilitas_status_pekerja_tdktetap_request_dapat *
                                      $probabilitas_status_sktdkada_request_dapat, 7);
                            ?>
                            <input type="hidden" name="probabilitas_dapat" value="{{$nilai1}}">
                               {{$nilai1}}  
                          </h5>
                        </td> 
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Probabilitas Tidak Dapat</h5></td>
                        <td class="center"><b><h5>
                          {{$probabilitas_kelengkapan_ortu_lengkap_tdkdapat_request}} * 
                          {{$probabilitas_status_rumah_saudara_request_tdkdapat}} *
                          {{$probabilitas_status_pekerja_tdktetap_request_tdkdapat}} *
                          {{$probabilitas_status_sktdkada_request_tdkdapat}}
                        </h5>
                      </td>
                      <td class="center"><b><h5>
                        <?php
                        $nilai2 = number_format($probabilitas_kelengkapan_ortu_lengkap_tdkdapat_request *
                                  $probabilitas_status_rumah_kontrakan_request_tdkdapat *
                                  $probabilitas_status_pekerja_tdktetap_request_tdkdapat *
                                  $probabilitas_status_sktdkada_request_tdkdapat, 7);
                        ?>
                         <input type="hidden" name="probabilitas_tdkdapat" value="{{$nilai2}}">
                          {{$nilai2}}  
                      </h5></td>
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Keterangan</h5></td>
                          <td class="center" colspan="2">
                            @if($nilai1 > $nilai2)
                            <br>
                              <b>
                                <input type="hidden" name="keterangan" value="Dapat Bantuan">
                                <span class="label label label-success">Dapat Bantuan<h2></span>
                                </h2>
                                @else
                                <input type="hidden" name="keterangan" value="Tidak Dapat Bantuan">
                              <span class="label label label-danger">Tidak Dapat Bantuan<h2></span>
                              </h2>
                            </td> 
                            @endif
                         </tr>
                        @endif
                      @if($status_kelengkapan_ortu == 'Lengkap' && 
                    $status_rumah_ortu == 'Tinggal Dengan Saudara' &&
                    $status_pekerjaan_wali == 'Usaha' &&
                    $status_sk_tidakmampu == 'Ada'
                        ) 
                     <tr>
                        <td class="center"><b><h5>Probabilitas Dapat</h5></td>                 
                          <td class="center"><b><h5>  
                           {{$probabilitas_kelengkapan_ortu_lengkap_dapat_request}} * 
                           {{$probabilitas_status_rumah_saudara_request_dapat}} *
                           {{$probabilitas_status_pekerja_usaha_request_dapat}} *
                           {{$probabilitas_status_skada_request_dapat}}</h5>
                          </td>
                          <td class="center"><b><h5>
                            <?php
                            $nilai1 = number_format($probabilitas_kelengkapan_ortu_lengkap_dapat_request *
                                      $probabilitas_status_rumah_saudara_request_dapat *
                                      $probabilitas_status_pekerja_usaha_request_dapat *
                                      $probabilitas_status_skada_request_dapat, 7);
                            ?>
                            <input type="hidden" name="probabilitas_dapat" value="{{$nilai1}}">
                               {{$nilai1}}  
                          </h5>
                        </td> 
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Probabilitas Tidak Dapat</h5></td>
                        <td class="center"><b><h5>
                          {{$probabilitas_kelengkapan_ortu_lengkap_tdkdapat_request}} * 
                          {{$probabilitas_status_rumah_saudara_request_tdkdapat}} *
                          {{$probabilitas_status_pekerja_usaha_request_tdkdapat}} *
                          {{$probabilitas_status_skada_request_tdkdapat}}
                        </h5>
                      </td>
                      <td class="center"><b><h5>
                        <?php
                        $nilai2 = number_format($probabilitas_kelengkapan_ortu_lengkap_tdkdapat_request *
                                  $probabilitas_status_rumah_saudara_request_tdkdapat *
                                  $probabilitas_status_pekerja_usaha_request_tdkdapat *
                                  $probabilitas_status_skada_request_tdkdapat, 7);
                        ?>
                         <input type="hidden" name="probabilitas_tdkdapat" value="{{$nilai2}}">
                          {{$nilai2}}  
                      </h5></td>
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Keterangan</h5></td>
                          <td class="center" colspan="2">
                            @if($nilai1 > $nilai2)
                            <br>
                              <b>
                                <input type="hidden" name="keterangan" value="Dapat Bantuan">
                                <span class="label label label-success">Dapat Bantuan<h2></span>
                                </h2>
                                @else
                                <input type="hidden" name="keterangan" value="Tidak Dapat Bantuan">
                              <span class="label label label-danger">Tidak Dapat Bantuan<h2></span>
                              </h2>
                            </td> 
                            @endif
                         </tr>
                        @endif
                      @if($status_kelengkapan_ortu == 'Lengkap' && 
                    $status_rumah_ortu == 'Tinggal Dengan Saudara' &&
                    $status_pekerjaan_wali == 'Usaha' &&
                    $status_sk_tidakmampu == 'Tidak Ada'
                        ) 
                     <tr>
                        <td class="center"><b><h5>Probabilitas Dapat</h5></td>                 
                          <td class="center"><b><h5>  
                           {{$probabilitas_kelengkapan_ortu_lengkap_dapat_request}} * 
                           {{$probabilitas_status_rumah_saudara_request_dapat}} *
                           {{$probabilitas_status_pekerja_usaha_request_dapat}} *
                           {{$probabilitas_status_sktdkada_request_dapat}}</h5>
                          </td>
                          <td class="center"><b><h5>
                            <?php
                            $nilai1 = number_format($probabilitas_kelengkapan_ortu_lengkap_dapat_request *
                                      $probabilitas_status_rumah_saudara_request_dapat *
                                      $probabilitas_status_pekerja_usaha_request_dapat *
                                      $probabilitas_status_sktdkada_request_dapat, 7);
                            ?>
                            <input type="hidden" name="probabilitas_dapat" value="{{$nilai1}}">
                               {{$nilai1}}  
                          </h5>
                        </td> 
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Probabilitas Tidak Dapat</h5></td>
                        <td class="center"><b><h5>
                          {{$probabilitas_kelengkapan_ortu_lengkap_tdkdapat_request}} * 
                          {{$probabilitas_status_rumah_saudara_request_tdkdapat}} *
                          {{$probabilitas_status_pekerja_usaha_request_tdkdapat}} *
                          {{$probabilitas_status_sktdkada_request_tdkdapat}}
                        </h5>
                      </td>
                      <td class="center"><b><h5>
                        <?php
                        $nilai2 = number_format($probabilitas_kelengkapan_ortu_lengkap_tdkdapat_request *
                                  $probabilitas_status_rumah_kontrakan_request_tdkdapat *
                                  $probabilitas_status_pekerja_usaha_request_tdkdapat *
                                  $probabilitas_status_sktdkada_request_tdkdapat, 7);
                        ?>
                         <input type="hidden" name="probabilitas_tdkdapat" value="{{$nilai2}}">
                          {{$nilai2}}  
                      </h5></td>
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Keterangan</h5></td>
                          <td class="center" colspan="2">
                            @if($nilai1 > $nilai2)
                            <br>
                              <b>
                                <input type="hidden" name="keterangan" value="Dapat Bantuan">
                                <span class="label label label-success">Dapat Bantuan<h2></span>
                                </h2>
                                @else
                                <input type="hidden" name="keterangan" value="Tidak Dapat Bantuan">
                              <span class="label label label-danger">Tidak Dapat Bantuan<h2></span>
                              </h2>
                            </td> 
                            @endif
                         </tr>
                        @endif
                      @if($status_kelengkapan_ortu == 'Tidak Lengkap' && 
                    $status_rumah_ortu == 'Rumah Sendiri' &&
                    $status_pekerjaan_wali == 'Karyawan Swasta' &&
                    $status_sk_tidakmampu == 'Ada'
                        ) 
                     <tr>
                        <td class="center"><b><h5>Probabilitas Dapat</h5></td>                 
                          <td class="center"><b><h5>  
                           {{$probabilitas_kelengkapan_ortu_tdklengkap_dapat_request}} * 
                           {{$probabilitas_status_rumah_sendiri_request_dapat}} *
                           {{$probabilitas_status_pekerja_swasta_request_dapat}} *
                           {{$probabilitas_status_skada_request_dapat}}</h5>
                          </td>
                          <td class="center"><b><h5>
                            <?php
                            $nilai1 = number_format($probabilitas_kelengkapan_ortu_tdklengkap_dapat_request *
                                      $probabilitas_status_rumah_sendiri_request_dapat *
                                      $probabilitas_status_pekerja_swasta_request_dapat *
                                      $probabilitas_status_skada_request_dapat, 7);
                            ?>
                            <input type="hidden" name="probabilitas_dapat" value="{{$nilai1}}">
                               {{$nilai1}}  
                          </h5>
                        </td> 
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Probabilitas Tidak Dapat</h5></td>
                        <td class="center"><b><h5>
                          {{$probabilitas_kelengkapan_ortu_tdklengkap_tdkdapat_request}} * 
                          {{$probabilitas_status_rumah_sendiri_request_tdkdapat}} *
                          {{$probabilitas_status_pekerja_swasta_request_tdkdapat}} *
                          {{$probabilitas_status_skada_request_tdkdapat}}
                        </h5>
                      </td>
                      <td class="center"><b><h5>
                        <?php
                        $nilai2 = number_format($probabilitas_kelengkapan_ortu_tdklengkap_tdkdapat_request *
                                  $probabilitas_status_rumah_sendiri_request_tdkdapat *
                                  $probabilitas_status_pekerja_swasta_request_tdkdapat *
                                  $probabilitas_status_skada_request_tdkdapat, 7);
                        ?>
                         <input type="hidden" name="probabilitas_tdkdapat" value="{{$nilai2}}">
                          {{$nilai2}}  
                      </h5></td>
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Keterangan</h5></td>
                          <td class="center" colspan="2">
                            @if($nilai1 > $nilai2)
                            <br>
                              <b>
                                <input type="hidden" name="keterangan" value="Dapat Bantuan">
                                <span class="label label label-success">Dapat Bantuan<h2></span>
                                </h2>
                                @else
                                <input type="hidden" name="keterangan" value="Tidak Dapat Bantuan">
                              <span class="label label label-danger">Tidak Dapat Bantuan<h2></span>
                              </h2>
                            </td> 
                            @endif
                         </tr>
                        @endif
                      @if($status_kelengkapan_ortu == 'Tidak Lengkap' && 
                    $status_rumah_ortu == 'Rumah Sendiri' &&
                    $status_pekerjaan_wali == 'Karyawan Swasta' &&
                    $status_sk_tidakmampu == 'Tidak Ada'
                        ) 
                     <tr>
                        <td class="center"><b><h5>Probabilitas Dapat</h5></td>                 
                          <td class="center"><b><h5>  
                           {{$probabilitas_kelengkapan_ortu_tdklengkap_dapat_request}} * 
                           {{$probabilitas_status_rumah_sendiri_request_dapat}} *
                           {{$probabilitas_status_pekerja_swasta_request_dapat}} *
                           {{$probabilitas_status_sktdkada_request_dapat}}</h5>
                          </td>
                          <td class="center"><b><h5>
                            <?php
                            $nilai1 = number_format($probabilitas_kelengkapan_ortu_tdklengkap_dapat_request *
                                      $probabilitas_status_rumah_sendiri_request_dapat *
                                      $probabilitas_status_pekerja_swasta_request_dapat *
                                      $probabilitas_status_sktdkada_request_dapat, 7);
                            ?>
                            <input type="hidden" name="probabilitas_dapat" value="{{$nilai1}}">
                               {{$nilai1}}  
                          </h5>
                        </td> 
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Probabilitas Tidak Dapat</h5></td>
                        <td class="center"><b><h5>
                          {{$probabilitas_kelengkapan_ortu_tdklengkap_tdkdapat_request}} * 
                          {{$probabilitas_status_rumah_sendiri_request_tdkdapat}} *
                          {{$probabilitas_status_pekerja_swasta_request_tdkdapat}} *
                          {{$probabilitas_status_sktdkada_request_tdkdapat}}
                        </h5>
                      </td>
                      <td class="center"><b><h5>
                        <?php
                        $nilai2 = number_format($probabilitas_kelengkapan_ortu_tdklengkap_tdkdapat_request *
                                  $probabilitas_status_rumah_sendiri_request_tdkdapat *
                                  $probabilitas_status_pekerja_swasta_request_tdkdapat *
                                  $probabilitas_status_sktdkada_request_tdkdapat, 7);
                        ?>
                         <input type="hidden" name="probabilitas_tdkdapat" value="{{$nilai2}}">
                          {{$nilai2}}  
                      </h5></td>
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Keterangan</h5></td>
                          <td class="center" colspan="2">
                            @if($nilai1 > $nilai2)
                            <br>
                              <b>
                                <input type="hidden" name="keterangan" value="Dapat Bantuan">
                                <span class="label label label-success">Dapat Bantuan<h2></span>
                                </h2>
                                @else
                                <input type="hidden" name="keterangan" value="Tidak Dapat Bantuan">
                              <span class="label label label-danger">Tidak Dapat Bantuan<h2></span>
                              </h2>
                            </td> 
                            @endif
                         </tr>
                        @endif
                      @if($status_kelengkapan_ortu == 'Tidak Lengkap' && 
                    $status_rumah_ortu == 'Rumah Sendiri' &&
                    $status_pekerjaan_wali == 'Pegawai Negri' &&
                    $status_sk_tidakmampu == 'Ada'
                        ) 
                     <tr>
                        <td class="center"><b><h5>Probabilitas Dapat</h5></td>                 
                          <td class="center"><b><h5>  
                           {{$probabilitas_kelengkapan_ortu_tdklengkap_dapat_request}} * 
                           {{$probabilitas_status_rumah_sendiri_request_dapat}} *
                           {{$probabilitas_status_pekerja_negri_request_dapat}} *
                           {{$probabilitas_status_skada_request_dapat}}</h5>
                          </td>
                          <td class="center"><b><h5>
                            <?php
                            $nilai1 = number_format($probabilitas_kelengkapan_ortu_tdklengkap_dapat_request *
                                      $probabilitas_status_rumah_sendiri_request_dapat *
                                      $probabilitas_status_pekerja_negri_request_dapat *
                                      $probabilitas_status_skada_request_dapat, 7);
                            ?>
                            <input type="hidden" name="probabilitas_dapat" value="{{$nilai1}}">
                               {{$nilai1}}  
                          </h5>
                        </td> 
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Probabilitas Tidak Dapat</h5></td>
                        <td class="center"><b><h5>
                          {{$probabilitas_kelengkapan_ortu_tdklengkap_tdkdapat_request}} * 
                          {{$probabilitas_status_rumah_sendiri_request_tdkdapat}} *
                          {{$probabilitas_status_pekerja_negri_request_tdkdapat}} *
                          {{$probabilitas_status_skada_request_tdkdapat}}
                        </h5>
                      </td>
                      <td class="center"><b><h5>
                        <?php
                        $nilai2 = number_format($probabilitas_kelengkapan_ortu_tdklengkap_tdkdapat_request *
                                  $probabilitas_status_rumah_sendiri_request_tdkdapat *
                                  $probabilitas_status_pekerja_negri_request_tdkdapat *
                                  $probabilitas_status_skada_request_tdkdapat, 7);
                        ?>
                         <input type="hidden" name="probabilitas_tdkdapat" value="{{$nilai2}}">
                          {{$nilai2}}  
                      </h5></td>
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Keterangan</h5></td>
                          <td class="center" colspan="2">
                            @if($nilai1 > $nilai2)
                            <br>
                              <b>
                                <input type="hidden" name="keterangan" value="Dapat Bantuan">
                                <span class="label label label-success">Dapat Bantuan<h2></span>
                                </h2>
                                @else
                                <input type="hidden" name="keterangan" value="Tidak Dapat Bantuan">
                              <span class="label label label-danger">Tidak Dapat Bantuan<h2></span>
                              </h2>
                            </td> 
                            @endif
                         </tr>
                        @endif
                      @if($status_kelengkapan_ortu == 'Tidak Lengkap' && 
                    $status_rumah_ortu == 'Rumah Sendiri' &&
                    $status_pekerjaan_wali == 'Pegawai Negri' &&
                    $status_sk_tidakmampu == 'Tidak Ada'
                        ) 
                     <tr>
                        <td class="center"><b><h5>Probabilitas Dapat</h5></td>                 
                          <td class="center"><b><h5>  
                           {{$probabilitas_kelengkapan_ortu_tdklengkap_dapat_request}} * 
                           {{$probabilitas_status_rumah_sendiri_request_dapat}} *
                           {{$probabilitas_status_pekerja_negri_request_dapat}} *
                           {{$probabilitas_status_sktdkada_request_dapat}}</h5>
                          </td>
                          <td class="center"><b><h5>
                            <?php
                            $nilai1 = number_format($probabilitas_kelengkapan_ortu_tdklengkap_dapat_request *
                                      $probabilitas_status_rumah_sendiri_request_dapat *
                                      $probabilitas_status_pekerja_negri_request_dapat *
                                      $probabilitas_status_sktdkada_request_dapat, 7);
                            ?>
                            <input type="hidden" name="probabilitas_dapat" value="{{$nilai1}}">
                               {{$nilai1}}  
                          </h5>
                        </td> 
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Probabilitas Tidak Dapat</h5></td>
                        <td class="center"><b><h5>
                          {{$probabilitas_kelengkapan_ortu_tdklengkap_tdkdapat_request}} * 
                          {{$probabilitas_status_rumah_sendiri_request_tdkdapat}} *
                          {{$probabilitas_status_pekerja_negri_request_tdkdapat}} *
                          {{$probabilitas_status_sktdkada_request_tdkdapat}}
                        </h5>
                      </td>
                      <td class="center"><b><h5>
                        <?php
                        $nilai2 = number_format($probabilitas_kelengkapan_ortu_tdklengkap_tdkdapat_request *
                                  $probabilitas_status_rumah_sendiri_request_tdkdapat *
                                  $probabilitas_status_pekerja_negri_request_tdkdapat *
                                  $probabilitas_status_sktdkada_request_tdkdapat, 7);
                        ?>
                         <input type="hidden" name="probabilitas_tdkdapat" value="{{$nilai2}}">
                          {{$nilai2}}  
                      </h5></td>
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Keterangan</h5></td>
                          <td class="center" colspan="2">
                            @if($nilai1 > $nilai2)
                            <br>
                              <b>
                                <input type="hidden" name="keterangan" value="Dapat Bantuan">
                                <span class="label label label-success">Dapat Bantuan<h2></span>
                                </h2>
                                @else
                                <input type="hidden" name="keterangan" value="Tidak Dapat Bantuan">
                              <span class="label label label-danger">Tidak Dapat Bantuan<h2></span>
                              </h2>
                            </td> 
                            @endif
                         </tr>
                        @endif
                      @if($status_kelengkapan_ortu == 'Tidak Lengkap' && 
                    $status_rumah_ortu == 'Rumah Sendiri' &&
                    $status_pekerjaan_wali == 'Pekerja Tidak Tetap' &&
                    $status_sk_tidakmampu == 'Ada'
                        ) 
                     <tr>
                        <td class="center"><b><h5>Probabilitas Dapat</h5></td>                 
                          <td class="center"><b><h5>  
                           {{$probabilitas_kelengkapan_ortu_tdklengkap_dapat_request}} * 
                           {{$probabilitas_status_rumah_sendiri_request_dapat}} *
                           {{$probabilitas_status_pekerja_tdktetap_request_dapat}} *
                           {{$probabilitas_status_skada_request_dapat}}</h5>
                          </td>
                          <td class="center"><b><h5>
                            <?php
                            $nilai1 = number_format($probabilitas_kelengkapan_ortu_tdklengkap_dapat_request *
                                      $probabilitas_status_rumah_sendiri_request_dapat *
                                      $probabilitas_status_pekerja_tdktetap_request_dapat *
                                      $probabilitas_status_skada_request_dapat, 7);
                            ?>
                            <input type="hidden" name="probabilitas_dapat" value="{{$nilai1}}">
                               {{$nilai1}}  
                          </h5>
                        </td> 
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Probabilitas Tidak Dapat</h5></td>
                        <td class="center"><b><h5>
                          {{$probabilitas_kelengkapan_ortu_tdklengkap_tdkdapat_request}} * 
                          {{$probabilitas_status_rumah_sendiri_request_tdkdapat}} *
                          {{$probabilitas_status_pekerja_tdktetap_request_tdkdapat}} *
                          {{$probabilitas_status_skada_request_tdkdapat}}
                        </h5>
                      </td>
                      <td class="center"><b><h5>
                        <?php
                        $nilai2 = number_format($probabilitas_kelengkapan_ortu_tdklengkap_tdkdapat_request *
                                  $probabilitas_status_rumah_sendiri_request_tdkdapat *
                                  $probabilitas_status_pekerja_tdktetap_request_tdkdapat *
                                  $probabilitas_status_skada_request_tdkdapat, 7);
                        ?>
                         <input type="hidden" name="probabilitas_tdkdapat" value="{{$nilai2}}">
                          {{$nilai2}}  
                      </h5></td>
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Keterangan</h5></td>
                          <td class="center" colspan="2">
                            @if($nilai1 > $nilai2)
                            <br>
                              <b>
                                <input type="hidden" name="keterangan" value="Dapat Bantuan">
                                <span class="label label label-success">Dapat Bantuan<h2></span>
                                </h2>
                                @else
                                <input type="hidden" name="keterangan" value="Tidak Dapat Bantuan">
                              <span class="label label label-danger">Tidak Dapat Bantuan<h2></span>
                              </h2>
                            </td> 
                            @endif
                         </tr>
                        @endif
                      @if($status_kelengkapan_ortu == 'Tidak Lengkap' && 
                    $status_rumah_ortu == 'Rumah Sendiri' &&
                    $status_pekerjaan_wali == 'Pekerja Tidak Tetap' &&
                    $status_sk_tidakmampu == 'Tidak Ada'
                        ) 
                     <tr>
                        <td class="center"><b><h5>Probabilitas Dapat</h5></td>                 
                          <td class="center"><b><h5>  
                           {{$probabilitas_kelengkapan_ortu_tdklengkap_dapat_request}} * 
                           {{$probabilitas_status_rumah_sendiri_request_dapat}} *
                           {{$probabilitas_status_pekerja_tdktetap_request_dapat}} *
                           {{$probabilitas_status_sktdkada_request_dapat}}</h5>
                          </td>
                          <td class="center"><b><h5>
                            <?php
                            $nilai1 = number_format($probabilitas_kelengkapan_ortu_tdklengkap_dapat_request *
                                      $probabilitas_status_rumah_sendiri_request_dapat *
                                      $probabilitas_status_pekerja_tdktetap_request_dapat *
                                      $probabilitas_status_sktdkada_request_dapat, 7);
                            ?>
                            <input type="hidden" name="probabilitas_dapat" value="{{$nilai1}}">
                               {{$nilai1}}  
                          </h5>
                        </td> 
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Probabilitas Tidak Dapat</h5></td>
                        <td class="center"><b><h5>
                          {{$probabilitas_kelengkapan_ortu_tdklengkap_tdkdapat_request}} * 
                          {{$probabilitas_status_rumah_sendiri_request_tdkdapat}} *
                          {{$probabilitas_status_pekerja_tdktetap_request_tdkdapat}} *
                          {{$probabilitas_status_sktdkada_request_tdkdapat}}
                        </h5>
                      </td>
                      <td class="center"><b><h5>
                        <?php
                        $nilai2 = number_format($probabilitas_kelengkapan_ortu_tdklengkap_tdkdapat_request *
                                  $probabilitas_status_rumah_sendiri_request_tdkdapat *
                                  $probabilitas_status_pekerja_tdktetap_request_tdkdapat *
                                  $probabilitas_status_sktdkada_request_tdkdapat, 7);
                        ?>
                         <input type="hidden" name="probabilitas_tdkdapat" value="{{$nilai2}}">
                          {{$nilai2}}  
                      </h5></td>
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Keterangan</h5></td>
                          <td class="center" colspan="2">
                            @if($nilai1 > $nilai2)
                            <br>
                              <b>
                                <input type="hidden" name="keterangan" value="Dapat Bantuan">
                                <span class="label label label-success">Dapat Bantuan<h2></span>
                                </h2>
                                @else
                                <input type="hidden" name="keterangan" value="Tidak Dapat Bantuan">
                              <span class="label label label-danger">Tidak Dapat Bantuan<h2></span>
                              </h2>
                            </td> 
                            @endif
                         </tr>
                        @endif
                      @if($status_kelengkapan_ortu == 'Tidak Lengkap' && 
                    $status_rumah_ortu == 'Rumah Sendiri' &&
                    $status_pekerjaan_wali == 'Usaha' &&
                    $status_sk_tidakmampu == 'Ada'
                        ) 
                     <tr>
                        <td class="center"><b><h5>Probabilitas Dapat</h5></td>                 
                          <td class="center"><b><h5>  
                           {{$probabilitas_kelengkapan_ortu_tdklengkap_dapat_request}} * 
                           {{$probabilitas_status_rumah_sendiri_request_dapat}} *
                           {{$probabilitas_status_pekerja_usaha_request_dapat}} *
                           {{$probabilitas_status_skada_request_dapat}}</h5>
                          </td>
                          <td class="center"><b><h5>
                            <?php
                            $nilai1 = number_format($probabilitas_kelengkapan_ortu_tdklengkap_dapat_request *
                                      $probabilitas_status_rumah_sendiri_request_dapat *
                                      $probabilitas_status_pekerja_usaha_request_dapat *
                                      $probabilitas_status_skada_request_dapat, 7);
                            ?>
                            <input type="hidden" name="probabilitas_dapat" value="{{$nilai1}}">
                               {{$nilai1}}  
                          </h5>
                        </td> 
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Probabilitas Tidak Dapat</h5></td>
                        <td class="center"><b><h5>
                          {{$probabilitas_kelengkapan_ortu_tdklengkap_tdkdapat_request}} * 
                          {{$probabilitas_status_rumah_sendiri_request_tdkdapat}} *
                          {{$probabilitas_status_pekerja_usaha_request_tdkdapat}} *
                          {{$probabilitas_status_skada_request_tdkdapat}}
                        </h5>
                      </td>
                      <td class="center"><b><h5>
                        <?php
                        $nilai2 = number_format($probabilitas_kelengkapan_ortu_tdklengkap_tdkdapat_request *
                                  $probabilitas_status_rumah_sendiri_request_tdkdapat *
                                  $probabilitas_status_pekerja_usaha_request_tdkdapat *
                                  $probabilitas_status_skada_request_tdkdapat, 7);
                        ?>
                         <input type="hidden" name="probabilitas_tdkdapat" value="{{$nilai2}}">
                          {{$nilai2}}  
                      </h5></td>
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Keterangan</h5></td>
                          <td class="center" colspan="2">
                            @if($nilai1 > $nilai2)
                            <br>
                              <b>
                                <input type="hidden" name="keterangan" value="Dapat Bantuan">
                                <span class="label label label-success">Dapat Bantuan<h2></span>
                                </h2>
                                @else
                                <input type="hidden" name="keterangan" value="Tidak Dapat Bantuan">
                              <span class="label label label-danger">Tidak Dapat Bantuan<h2></span>
                              </h2>
                            </td> 
                            @endif
                         </tr>
                        @endif
                      @if($status_kelengkapan_ortu == 'Tidak Lengkap' && 
                    $status_rumah_ortu == 'Rumah Sendiri' &&
                    $status_pekerjaan_wali == 'Usaha' &&
                    $status_sk_tidakmampu == 'Tidak Ada'
                        ) 
                     <tr>
                        <td class="center"><b><h5>Probabilitas Dapat</h5></td>                 
                          <td class="center"><b><h5>  
                           {{$probabilitas_kelengkapan_ortu_tdklengkap_dapat_request}} * 
                           {{$probabilitas_status_rumah_sendiri_request_dapat}} *
                           {{$probabilitas_status_pekerja_usaha_request_dapat}} *
                           {{$probabilitas_status_sktdkada_request_dapat}}</h5>
                          </td>
                          <td class="center"><b><h5>
                            <?php
                            $nilai1 = number_format($probabilitas_kelengkapan_ortu_tdklengkap_dapat_request *
                                      $probabilitas_status_rumah_sendiri_request_dapat *
                                      $probabilitas_status_pekerja_usaha_request_dapat *
                                      $probabilitas_status_sktdkada_request_dapat, 7);
                            ?>
                            <input type="hidden" name="probabilitas_dapat" value="{{$nilai1}}">
                               {{$nilai1}}  
                          </h5>
                        </td> 
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Probabilitas Tidak Dapat</h5></td>
                        <td class="center"><b><h5>
                          {{$probabilitas_kelengkapan_ortu_tdklengkap_tdkdapat_request}} * 
                          {{$probabilitas_status_rumah_sendiri_request_tdkdapat}} *
                          {{$probabilitas_status_pekerja_usaha_request_tdkdapat}} *
                          {{$probabilitas_status_sktdkada_request_tdkdapat}}
                        </h5>
                      </td>
                      <td class="center"><b><h5>
                        <?php
                        $nilai2 = number_format($probabilitas_kelengkapan_ortu_tdklengkap_tdkdapat_request *
                                  $probabilitas_status_rumah_sendiri_request_tdkdapat *
                                  $probabilitas_status_pekerja_usaha_request_tdkdapat *
                                  $probabilitas_status_sktdkada_request_tdkdapat, 7);
                        ?>
                         <input type="hidden" name="probabilitas_tdkdapat" value="{{$nilai2}}">
                          {{$nilai2}}  
                      </h5></td>
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Keterangan</h5></td>
                          <td class="center" colspan="2">
                            @if($nilai1 > $nilai2)
                            <br>
                              <b>
                                <input type="hidden" name="keterangan" value="Dapat Bantuan">
                                <span class="label label label-success">Dapat Bantuan<h2></span>
                                </h2>
                                @else
                                <input type="hidden" name="keterangan" value="Tidak Dapat Bantuan">
                              <span class="label label label-danger">Tidak Dapat Bantuan<h2></span>
                              </h2>
                            </td> 
                            @endif
                         </tr>
                        @endif
                      @if($status_kelengkapan_ortu == 'Tidak Lengkap' && 
                    $status_rumah_ortu == 'Rumah Sewa' &&
                    $status_pekerjaan_wali == 'Karyawan Swasta' &&
                    $status_sk_tidakmampu == 'Ada'
                        ) 
                     <tr>
                        <td class="center"><b><h5>Probabilitas Dapat</h5></td>                 
                          <td class="center"><b><h5>  
                           {{$probabilitas_kelengkapan_ortu_tdklengkap_dapat_request}} * 
                           {{$probabilitas_status_rumah_sewa_request_dapat}} *
                           {{$probabilitas_status_pekerja_swasta_request_dapat}} *
                           {{$probabilitas_status_skada_request_dapat}}</h5>
                          </td>
                          <td class="center"><b><h5>
                            <?php
                            $nilai1 = number_format($probabilitas_kelengkapan_ortu_tdklengkap_dapat_request *
                                      $probabilitas_status_rumah_sewa_request_dapat *
                                      $probabilitas_status_pekerja_swasta_request_dapat *
                                      $probabilitas_status_skada_request_dapat, 7);
                            ?>
                            <input type="hidden" name="probabilitas_dapat" value="{{$nilai1}}">
                               {{$nilai1}}  
                          </h5>
                        </td> 
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Probabilitas Tidak Dapat</h5></td>
                        <td class="center"><b><h5>
                          {{$probabilitas_kelengkapan_ortu_tdklengkap_tdkdapat_request}} * 
                          {{$probabilitas_status_rumah_sewa_request_tdkdapat}} *
                          {{$probabilitas_status_pekerja_swasta_request_tdkdapat}} *
                          {{$probabilitas_status_skada_request_tdkdapat}}
                        </h5>
                      </td>
                      <td class="center"><b><h5>
                        <?php
                        $nilai2 = number_format($probabilitas_kelengkapan_ortu_tdklengkap_tdkdapat_request *
                                  $probabilitas_status_rumah_sewa_request_tdkdapat *
                                  $probabilitas_status_pekerja_swasta_request_tdkdapat *
                                  $probabilitas_status_skada_request_tdkdapat, 7);
                        ?>
                         <input type="hidden" name="probabilitas_tdkdapat" value="{{$nilai2}}">
                          {{$nilai2}}  
                      </h5></td>
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Keterangan</h5></td>
                          <td class="center" colspan="2">
                            @if($nilai1 > $nilai2)
                            <br>
                              <b>
                                <input type="hidden" name="keterangan" value="Dapat Bantuan">
                                <span class="label label label-success">Dapat Bantuan<h2></span>
                                </h2>
                                @else
                                <input type="hidden" name="keterangan" value="Tidak Dapat Bantuan">
                              <span class="label label label-danger">Tidak Dapat Bantuan<h2></span>
                              </h2>
                            </td> 
                            @endif
                         </tr>
                        @endif
                      @if($status_kelengkapan_ortu == 'Tidak Lengkap' && 
                    $status_rumah_ortu == 'Rumah Sewa' &&
                    $status_pekerjaan_wali == 'Karyawan Swasta' &&
                    $status_sk_tidakmampu == 'Tidak Ada'
                        ) 
                     <tr>
                        <td class="center"><b><h5>Probabilitas Dapat</h5></td>                 
                          <td class="center"><b><h5>  
                           {{$probabilitas_kelengkapan_ortu_tdklengkap_dapat_request}} * 
                           {{$probabilitas_status_rumah_sewa_request_dapat}} *
                           {{$probabilitas_status_pekerja_swasta_request_dapat}} *
                           {{$probabilitas_status_sktdkada_request_dapat}}</h5>
                          </td>
                          <td class="center"><b><h5>
                            <?php
                            $nilai1 = number_format($probabilitas_kelengkapan_ortu_tdklengkap_dapat_request *
                                      $probabilitas_status_rumah_sewa_request_dapat *
                                      $probabilitas_status_pekerja_swasta_request_dapat *
                                      $probabilitas_status_sktdkada_request_dapat, 7);
                            ?>
                            <input type="hidden" name="probabilitas_dapat" value="{{$nilai1}}">
                               {{$nilai1}}  
                          </h5>
                        </td> 
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Probabilitas Tidak Dapat</h5></td>
                        <td class="center"><b><h5>
                          {{$probabilitas_kelengkapan_ortu_tdklengkap_tdkdapat_request}} * 
                          {{$probabilitas_status_rumah_sewa_request_tdkdapat}} *
                          {{$probabilitas_status_pekerja_swasta_request_tdkdapat}} *
                          {{$probabilitas_status_sktdkada_request_tdkdapat}}
                        </h5>
                      </td>
                      <td class="center"><b><h5>
                        <?php
                        $nilai2 = number_format($probabilitas_kelengkapan_ortu_tdklengkap_tdkdapat_request *
                                  $probabilitas_status_rumah_sewa_request_tdkdapat *
                                  $probabilitas_status_pekerja_swasta_request_tdkdapat *
                                  $probabilitas_status_sktdkada_request_tdkdapat, 7);
                        ?>
                         <input type="hidden" name="probabilitas_tdkdapat" value="{{$nilai2}}">
                          {{$nilai2}}  
                      </h5></td>
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Keterangan</h5></td>
                          <td class="center" colspan="2">
                            @if($nilai1 > $nilai2)
                            <br>
                              <b>
                                <input type="hidden" name="keterangan" value="Dapat Bantuan">
                                <span class="label label label-success">Dapat Bantuan<h2></span>
                                </h2>
                                @else
                                <input type="hidden" name="keterangan" value="Tidak Dapat Bantuan">
                              <span class="label label label-danger">Tidak Dapat Bantuan<h2></span>
                              </h2>
                            </td> 
                            @endif
                         </tr>
                        @endif
                      @if($status_kelengkapan_ortu == 'Tidak Lengkap' && 
                    $status_rumah_ortu == 'Rumah Sewa' &&
                    $status_pekerjaan_wali == 'Pegawai Negri' &&
                    $status_sk_tidakmampu == 'Ada'
                        ) 
                     <tr>
                        <td class="center"><b><h5>Probabilitas Dapat</h5></td>                 
                          <td class="center"><b><h5>  
                           {{$probabilitas_kelengkapan_ortu_tdklengkap_dapat_request}} * 
                           {{$probabilitas_status_rumah_sewa_request_dapat}} *
                           {{$probabilitas_status_pekerja_negri_request_dapat}} *
                           {{$probabilitas_status_skada_request_dapat}}</h5>
                          </td>
                          <td class="center"><b><h5>
                            <?php
                            $nilai1 = number_format($probabilitas_kelengkapan_ortu_tdklengkap_dapat_request *
                                      $probabilitas_status_rumah_sewa_request_dapat *
                                      $probabilitas_status_pekerja_negri_request_dapat *
                                      $probabilitas_status_skada_request_dapat, 7);
                            ?>
                            <input type="hidden" name="probabilitas_dapat" value="{{$nilai1}}">
                               {{$nilai1}}  
                          </h5>
                        </td> 
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Probabilitas Tidak Dapat</h5></td>
                        <td class="center"><b><h5>
                          {{$probabilitas_kelengkapan_ortu_tdklengkap_tdkdapat_request}} * 
                          {{$probabilitas_status_rumah_sewa_request_tdkdapat}} *
                          {{$probabilitas_status_pekerja_negri_request_tdkdapat}} *
                          {{$probabilitas_status_skada_request_tdkdapat}}
                        </h5>
                      </td>
                      <td class="center"><b><h5>
                        <?php
                        $nilai2 = number_format($probabilitas_kelengkapan_ortu_tdklengkap_tdkdapat_request *
                                  $probabilitas_status_rumah_sewa_request_tdkdapat *
                                  $probabilitas_status_pekerja_negri_request_tdkdapat *
                                  $probabilitas_status_skada_request_tdkdapat, 7);
                        ?>
                         <input type="hidden" name="probabilitas_tdkdapat" value="{{$nilai2}}">
                          {{$nilai2}}  
                      </h5></td>
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Keterangan</h5></td>
                          <td class="center" colspan="2">
                            @if($nilai1 > $nilai2)
                            <br>
                              <b>
                                <input type="hidden" name="keterangan" value="Dapat Bantuan">
                                <span class="label label label-success">Dapat Bantuan<h2></span>
                                </h2>
                                @else
                                <input type="hidden" name="keterangan" value="Tidak Dapat Bantuan">
                              <span class="label label label-danger">Tidak Dapat Bantuan<h2></span>
                              </h2>
                            </td> 
                            @endif
                         </tr>
                        @endif
                      @if($status_kelengkapan_ortu == 'Tidak Lengkap' && 
                    $status_rumah_ortu == 'Rumah Sewa' &&
                    $status_pekerjaan_wali == 'Pegawai Negri' &&
                    $status_sk_tidakmampu == 'Tidak Ada'
                        ) 
                     <tr>
                        <td class="center"><b><h5>Probabilitas Dapat</h5></td>                 
                          <td class="center"><b><h5>  
                           {{$probabilitas_kelengkapan_ortu_tdklengkap_dapat_request}} * 
                           {{$probabilitas_status_rumah_sewa_request_dapat}} *
                           {{$probabilitas_status_pekerja_negri_request_dapat}} *
                           {{$probabilitas_status_sktdkada_request_dapat}}</h5>
                          </td>
                          <td class="center"><b><h5>
                            <?php
                            $nilai1 = number_format($probabilitas_kelengkapan_ortu_tdklengkap_dapat_request *
                                      $probabilitas_status_rumah_sewa_request_dapat *
                                      $probabilitas_status_pekerja_negri_request_dapat *
                                      $probabilitas_status_sktdkada_request_dapat, 7);
                            ?>
                            <input type="hidden" name="probabilitas_dapat" value="{{$nilai1}}">
                               {{$nilai1}}  
                          </h5>
                        </td> 
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Probabilitas Tidak Dapat</h5></td>
                        <td class="center"><b><h5>
                          {{$probabilitas_kelengkapan_ortu_tdklengkap_tdkdapat_request}} * 
                          {{$probabilitas_status_rumah_sewa_request_tdkdapat}} *
                          {{$probabilitas_status_pekerja_negri_request_tdkdapat}} *
                          {{$probabilitas_status_sktdkada_request_tdkdapat}}
                        </h5>
                      </td>
                      <td class="center"><b><h5>
                        <?php
                        $nilai2 = number_format($probabilitas_kelengkapan_ortu_tdklengkap_tdkdapat_request *
                                  $probabilitas_status_rumah_sewa_request_tdkdapat *
                                  $probabilitas_status_pekerja_negri_request_tdkdapat *
                                  $probabilitas_status_sktdkada_request_tdkdapat, 7);
                        ?>
                         <input type="hidden" name="probabilitas_tdkdapat" value="{{$nilai2}}">
                          {{$nilai2}}  
                      </h5></td>
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Keterangan</h5></td>
                          <td class="center" colspan="2">
                            @if($nilai1 > $nilai2)
                            <br>
                              <b>
                                <input type="hidden" name="keterangan" value="Dapat Bantuan">
                                <span class="label label label-success">Dapat Bantuan<h2></span>
                                </h2>
                                @else
                                <input type="hidden" name="keterangan" value="Tidak Dapat Bantuan">
                              <span class="label label label-danger">Tidak Dapat Bantuan<h2></span>
                              </h2>
                            </td> 
                            @endif
                         </tr>
                        @endif
                      @if($status_kelengkapan_ortu == 'Tidak Lengkap' && 
                    $status_rumah_ortu == 'Rumah Sewa' &&
                    $status_pekerjaan_wali == 'Pekerja Tidak Tetap' &&
                    $status_sk_tidakmampu == 'Ada'
                        ) 
                     <tr>
                        <td class="center"><b><h5>Probabilitas Dapat</h5></td>                 
                          <td class="center"><b><h5>  
                           {{$probabilitas_kelengkapan_ortu_tdklengkap_dapat_request}} * 
                           {{$probabilitas_status_rumah_sewa_request_dapat}} *
                           {{$probabilitas_status_pekerja_tdktetap_request_dapat}} *
                           {{$probabilitas_status_skada_request_dapat}}</h5>
                          </td>
                          <td class="center"><b><h5>
                            <?php
                            $nilai1 = number_format($probabilitas_kelengkapan_ortu_tdklengkap_dapat_request *
                                      $probabilitas_status_rumah_sewa_request_dapat *
                                      $probabilitas_status_pekerja_tdktetap_request_dapat *
                                      $probabilitas_status_skada_request_dapat, 7);
                            ?>
                            <input type="hidden" name="probabilitas_dapat" value="{{$nilai1}}">
                               {{$nilai1}}  
                          </h5>
                        </td> 
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Probabilitas Tidak Dapat</h5></td>
                        <td class="center"><b><h5>
                          {{$probabilitas_kelengkapan_ortu_tdklengkap_tdkdapat_request}} * 
                          {{$probabilitas_status_rumah_sewa_request_tdkdapat}} *
                          {{$probabilitas_status_pekerja_tdktetap_request_tdkdapat}} *
                          {{$probabilitas_status_skada_request_tdkdapat}}
                        </h5>
                      </td>
                      <td class="center"><b><h5>
                        <?php
                        $nilai2 = number_format($probabilitas_kelengkapan_ortu_tdklengkap_tdkdapat_request *
                                  $probabilitas_status_rumah_sewa_request_tdkdapat *
                                  $probabilitas_status_pekerja_tdktetap_request_tdkdapat *
                                  $probabilitas_status_skada_request_tdkdapat, 7);
                        ?>
                         <input type="hidden" name="probabilitas_tdkdapat" value="{{$nilai2}}">
                          {{$nilai2}}  
                      </h5></td>
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Keterangan</h5></td>
                          <td class="center" colspan="2">
                            @if($nilai1 > $nilai2)
                            <br>
                              <b>
                                <input type="hidden" name="keterangan" value="Dapat Bantuan">
                                <span class="label label label-success">Dapat Bantuan<h2></span>
                                </h2>
                                @else
                                <input type="hidden" name="keterangan" value="Tidak Dapat Bantuan">
                              <span class="label label label-danger">Tidak Dapat Bantuan<h2></span>
                              </h2>
                            </td> 
                            @endif
                         </tr>
                        @endif
                      @if($status_kelengkapan_ortu == 'Tidak Lengkap' && 
                    $status_rumah_ortu == 'Rumah Sewa' &&
                    $status_pekerjaan_wali == 'Pekerja Tidak Tetap' &&
                    $status_sk_tidakmampu == 'Tidak Ada'
                        ) 
                     <tr>
                        <td class="center"><b><h5>Probabilitas Dapat</h5></td>                 
                          <td class="center"><b><h5>  
                           {{$probabilitas_kelengkapan_ortu_tdklengkap_dapat_request}} * 
                           {{$probabilitas_status_rumah_sewa_request_dapat}} *
                           {{$probabilitas_status_pekerja_tdktetap_request_dapat}} *
                           {{$probabilitas_status_sktdkada_request_dapat}}</h5>
                          </td>
                          <td class="center"><b><h5>
                            <?php
                            $nilai1 = number_format($probabilitas_kelengkapan_ortu_tdklengkap_dapat_request *
                                      $probabilitas_status_rumah_sewa_request_dapat *
                                      $probabilitas_status_pekerja_tdktetap_request_dapat *
                                      $probabilitas_status_sktdkada_request_dapat, 7);
                            ?>
                            <input type="hidden" name="probabilitas_dapat" value="{{$nilai1}}">
                               {{$nilai1}}  
                          </h5>
                        </td> 
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Probabilitas Tidak Dapat</h5></td>
                        <td class="center"><b><h5>
                          {{$probabilitas_kelengkapan_ortu_tdklengkap_tdkdapat_request}} * 
                          {{$probabilitas_status_rumah_sewa_request_tdkdapat}} *
                          {{$probabilitas_status_pekerja_tdktetap_request_tdkdapat}} *
                          {{$probabilitas_status_sktdkada_request_tdkdapat}}
                        </h5>
                      </td>
                      <td class="center"><b><h5>
                        <?php
                        $nilai2 = number_format($probabilitas_kelengkapan_ortu_tdklengkap_tdkdapat_request *
                                  $probabilitas_status_rumah_sewa_request_tdkdapat *
                                  $probabilitas_status_pekerja_tdktetap_request_tdkdapat *
                                  $probabilitas_status_sktdkada_request_tdkdapat, 7);
                        ?>
                         <input type="hidden" name="probabilitas_tdkdapat" value="{{$nilai2}}">
                          {{$nilai2}}  
                      </h5></td>
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Keterangan</h5></td>
                          <td class="center" colspan="2">
                            @if($nilai1 > $nilai2)
                            <br>
                              <b>
                                <input type="hidden" name="keterangan" value="Dapat Bantuan">
                                <span class="label label label-success">Dapat Bantuan<h2></span>
                                </h2>
                                @else
                                <input type="hidden" name="keterangan" value="Tidak Dapat Bantuan">
                              <span class="label label label-danger">Tidak Dapat Bantuan<h2></span>
                              </h2>
                            </td> 
                            @endif
                         </tr>
                        @endif
                      @if($status_kelengkapan_ortu == 'Tidak Lengkap' && 
                    $status_rumah_ortu == 'Rumah Sewa' &&
                    $status_pekerjaan_wali == 'Usaha' &&
                    $status_sk_tidakmampu == 'Ada'
                        ) 
                     <tr>
                        <td class="center"><b><h5>Probabilitas Dapat</h5></td>                 
                          <td class="center"><b><h5>  
                           {{$probabilitas_kelengkapan_ortu_tdklengkap_dapat_request}} * 
                           {{$probabilitas_status_rumah_sewa_request_dapat}} *
                           {{$probabilitas_status_pekerja_usaha_request_dapat}} *
                           {{$probabilitas_status_skada_request_dapat}}</h5>
                          </td>
                          <td class="center"><b><h5>
                            <?php
                            $nilai1 = number_format($probabilitas_kelengkapan_ortu_tdklengkap_dapat_request *
                                      $probabilitas_status_rumah_sewa_request_dapat *
                                      $probabilitas_status_pekerja_usaha_request_dapat *
                                      $probabilitas_status_skada_request_dapat, 7);
                            ?>
                            <input type="hidden" name="probabilitas_dapat" value="{{$nilai1}}">
                               {{$nilai1}}  
                          </h5>
                        </td> 
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Probabilitas Tidak Dapat</h5></td>
                        <td class="center"><b><h5>
                          {{$probabilitas_kelengkapan_ortu_tdklengkap_tdkdapat_request}} * 
                          {{$probabilitas_status_rumah_sewa_request_tdkdapat}} *
                          {{$probabilitas_status_pekerja_usaha_request_tdkdapat}} *
                          {{$probabilitas_status_skada_request_tdkdapat}}
                        </h5>
                      </td>
                      <td class="center"><b><h5>
                        <?php
                        $nilai2 = number_format($probabilitas_kelengkapan_ortu_tdklengkap_tdkdapat_request *
                                  $probabilitas_status_rumah_sewa_request_tdkdapat *
                                  $probabilitas_status_pekerja_usaha_request_tdkdapat *
                                  $probabilitas_status_skada_request_tdkdapat, 7);
                        ?>
                         <input type="hidden" name="probabilitas_tdkdapat" value="{{$nilai2}}">
                          {{$nilai2}}  
                      </h5></td>
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Keterangan</h5></td>
                          <td class="center" colspan="2">
                            @if($nilai1 > $nilai2)
                            <br>
                              <b>
                                <input type="hidden" name="keterangan" value="Dapat Bantuan">
                                <span class="label label label-success">Dapat Bantuan<h2></span>
                                </h2>
                                @else
                                <input type="hidden" name="keterangan" value="Tidak Dapat Bantuan">
                              <span class="label label label-danger">Tidak Dapat Bantuan<h2></span>
                              </h2>
                            </td> 
                            @endif
                         </tr>
                        @endif
                      @if($status_kelengkapan_ortu == 'Tidak Lengkap' && 
                    $status_rumah_ortu == 'Rumah Sewa' &&
                    $status_pekerjaan_wali == 'Usaha' &&
                    $status_sk_tidakmampu == 'Tidak Ada'
                        ) 
                     <tr>
                        <td class="center"><b><h5>Probabilitas Dapat</h5></td>                 
                          <td class="center"><b><h5>  
                           {{$probabilitas_kelengkapan_ortu_tdklengkap_dapat_request}} * 
                           {{$probabilitas_status_rumah_sewa_request_dapat}} *
                           {{$probabilitas_status_pekerja_usaha_request_dapat}} *
                           {{$probabilitas_status_sktdkada_request_dapat}}</h5>
                          </td>
                          <td class="center"><b><h5>
                            <?php
                            $nilai1 = number_format($probabilitas_kelengkapan_ortu_tdklengkap_dapat_request *
                                      $probabilitas_status_rumah_sewa_request_dapat *
                                      $probabilitas_status_pekerja_usaha_request_dapat *
                                      $probabilitas_status_sktdkada_request_dapat, 7);
                            ?>
                            <input type="hidden" name="probabilitas_dapat" value="{{$nilai1}}">
                               {{$nilai1}}  
                          </h5>
                        </td> 
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Probabilitas Tidak Dapat</h5></td>
                        <td class="center"><b><h5>
                          {{$probabilitas_kelengkapan_ortu_tdklengkap_tdkdapat_request}} * 
                          {{$probabilitas_status_rumah_sewa_request_tdkdapat}} *
                          {{$probabilitas_status_pekerja_usaha_request_tdkdapat}} *
                          {{$probabilitas_status_sktdkada_request_tdkdapat}}
                        </h5>
                      </td>
                      <td class="center"><b><h5>
                        <?php
                        $nilai2 = number_format($probabilitas_kelengkapan_ortu_tdklengkap_tdkdapat_request *
                                  $probabilitas_status_rumah_sewa_request_tdkdapat *
                                  $probabilitas_status_pekerja_usaha_request_tdkdapat *
                                  $probabilitas_status_sktdkada_request_tdkdapat, 7);
                        ?>
                         <input type="hidden" name="probabilitas_tdkdapat" value="{{$nilai2}}">
                          {{$nilai2}}  
                      </h5></td>
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Keterangan</h5></td>
                          <td class="center" colspan="2">
                            @if($nilai1 > $nilai2)
                            <br>
                              <b>
                                <input type="hidden" name="keterangan" value="Dapat Bantuan">
                                <span class="label label label-success">Dapat Bantuan<h2></span>
                                </h2>
                                @else
                                <input type="hidden" name="keterangan" value="Tidak Dapat Bantuan">
                              <span class="label label label-danger">Tidak Dapat Bantuan<h2></span>
                              </h2>
                            </td> 
                            @endif
                         </tr>
                        @endif
                      @if($status_kelengkapan_ortu == 'Tidak Lengkap' && 
                    $status_rumah_ortu == 'Kontrakan' &&
                    $status_pekerjaan_wali == 'Karyawan Swasta' &&
                    $status_sk_tidakmampu == 'Ada'
                        ) 
                     <tr>
                        <td class="center"><b><h5>Probabilitas Dapat</h5></td>                 
                          <td class="center"><b><h5>  
                           {{$probabilitas_kelengkapan_ortu_tdklengkap_dapat_request}} * 
                           {{$probabilitas_status_rumah_kontrakan_request_dapat}} *
                           {{$probabilitas_status_pekerja_swasta_request_dapat}} *
                           {{$probabilitas_status_skada_request_dapat}}</h5>
                          </td>
                          <td class="center"><b><h5>
                            <?php
                            $nilai1 = number_format($probabilitas_kelengkapan_ortu_tdklengkap_dapat_request *
                                      $probabilitas_status_rumah_kontrakan_request_dapat *
                                      $probabilitas_status_pekerja_swasta_request_dapat *
                                      $probabilitas_status_skada_request_dapat, 7);
                            ?>
                            <input type="hidden" name="probabilitas_dapat" value="{{$nilai1}}">
                               {{$nilai1}}  
                          </h5>
                        </td> 
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Probabilitas Tidak Dapat</h5></td>
                        <td class="center"><b><h5>
                          {{$probabilitas_kelengkapan_ortu_tdklengkap_tdkdapat_request}} * 
                          {{$probabilitas_status_rumah_kontrakan_request_tdkdapat}} *
                          {{$probabilitas_status_pekerja_swasta_request_tdkdapat}} *
                          {{$probabilitas_status_skada_request_tdkdapat}}
                        </h5>
                      </td>
                      <td class="center"><b><h5>
                        <?php
                        $nilai2 = number_format($probabilitas_kelengkapan_ortu_tdklengkap_tdkdapat_request *
                                  $probabilitas_status_rumah_kontrakan_request_tdkdapat *
                                  $probabilitas_status_pekerja_swasta_request_tdkdapat *
                                  $probabilitas_status_skada_request_tdkdapat, 7);
                        ?>
                         <input type="hidden" name="probabilitas_tdkdapat" value="{{$nilai2}}">
                          {{$nilai2}}  
                      </h5></td>
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Keterangan</h5></td>
                          <td class="center" colspan="2">
                            @if($nilai1 > $nilai2)
                            <br>
                              <b>
                                <input type="hidden" name="keterangan" value="Dapat Bantuan">
                                <span class="label label label-success">Dapat Bantuan<h2></span>
                                </h2>
                                @else
                                <input type="hidden" name="keterangan" value="Tidak Dapat Bantuan">
                              <span class="label label label-danger">Tidak Dapat Bantuan<h2></span>
                              </h2>
                            </td> 
                            @endif
                         </tr>
                        @endif
                      @if($status_kelengkapan_ortu == 'Tidak Lengkap' && 
                    $status_rumah_ortu == 'Kontrakan' &&
                    $status_pekerjaan_wali == 'Karyawan Swasta' &&
                    $status_sk_tidakmampu == 'Tidak Ada'
                        ) 
                     <tr>
                        <td class="center"><b><h5>Probabilitas Dapat</h5></td>                 
                          <td class="center"><b><h5>  
                           {{$probabilitas_kelengkapan_ortu_tdklengkap_dapat_request}} * 
                           {{$probabilitas_status_rumah_kontrakan_request_dapat}} *
                           {{$probabilitas_status_pekerja_swasta_request_dapat}} *
                           {{$probabilitas_status_sktdkada_request_dapat}}</h5>
                          </td>
                          <td class="center"><b><h5>
                            <?php
                            $nilai1 = number_format($probabilitas_kelengkapan_ortu_tdklengkap_dapat_request *
                                      $probabilitas_status_rumah_kontrakan_request_dapat *
                                      $probabilitas_status_pekerja_swasta_request_dapat *
                                      $probabilitas_status_sktdkada_request_dapat, 7);
                            ?>
                            <input type="hidden" name="probabilitas_dapat" value="{{$nilai1}}">
                               {{$nilai1}}  
                          </h5>
                        </td> 
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Probabilitas Tidak Dapat</h5></td>
                        <td class="center"><b><h5>
                          {{$probabilitas_kelengkapan_ortu_tdklengkap_tdkdapat_request}} * 
                          {{$probabilitas_status_rumah_kontrakan_request_tdkdapat}} *
                          {{$probabilitas_status_pekerja_swasta_request_tdkdapat}} *
                          {{$probabilitas_status_sktdkada_request_tdkdapat}}
                        </h5>
                      </td>
                      <td class="center"><b><h5>
                        <?php
                        $nilai2 = number_format($probabilitas_kelengkapan_ortu_tdklengkap_tdkdapat_request *
                                  $probabilitas_status_rumah_kontrakan_request_tdkdapat *
                                  $probabilitas_status_pekerja_swasta_request_tdkdapat *
                                  $probabilitas_status_sktdkada_request_tdkdapat, 7);
                        ?>
                         <input type="hidden" name="probabilitas_tdkdapat" value="{{$nilai2}}">
                          {{$nilai2}}  
                      </h5></td>
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Keterangan</h5></td>
                          <td class="center" colspan="2">
                            @if($nilai1 > $nilai2)
                            <br>
                              <b>
                                <input type="hidden" name="keterangan" value="Dapat Bantuan">
                                <span class="label label label-success">Dapat Bantuan<h2></span>
                                </h2>
                                @else
                                <input type="hidden" name="keterangan" value="Tidak Dapat Bantuan">
                              <span class="label label label-danger">Tidak Dapat Bantuan<h2></span>
                              </h2>
                            </td> 
                            @endif
                         </tr>
                        @endif
                      @if($status_kelengkapan_ortu == 'Tidak Lengkap' && 
                    $status_rumah_ortu == 'Kontrakan' &&
                    $status_pekerjaan_wali == 'Pegawai Negri' &&
                    $status_sk_tidakmampu == 'Ada'
                        ) 
                     <tr>
                        <td class="center"><b><h5>Probabilitas Dapat</h5></td>                 
                          <td class="center"><b><h5>  
                           {{$probabilitas_kelengkapan_ortu_tdklengkap_dapat_request}} * 
                           {{$probabilitas_status_rumah_kontrakan_request_dapat}} *
                           {{$probabilitas_status_pekerja_negri_request_dapat}} *
                           {{$probabilitas_status_skada_request_dapat}}</h5>
                          </td>
                          <td class="center"><b><h5>
                            <?php
                            $nilai1 = number_format($probabilitas_kelengkapan_ortu_tdklengkap_dapat_request *
                                      $probabilitas_status_rumah_kontrakan_request_dapat *
                                      $probabilitas_status_pekerja_negri_request_dapat *
                                      $probabilitas_status_skada_request_dapat, 7);
                            ?>
                            <input type="hidden" name="probabilitas_dapat" value="{{$nilai1}}">
                               {{$nilai1}}  
                          </h5>
                        </td> 
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Probabilitas Tidak Dapat</h5></td>
                        <td class="center"><b><h5>
                          {{$probabilitas_kelengkapan_ortu_tdklengkap_tdkdapat_request}} * 
                          {{$probabilitas_status_rumah_kontrakan_request_tdkdapat}} *
                          {{$probabilitas_status_pekerja_negri_request_tdkdapat}} *
                          {{$probabilitas_status_skada_request_tdkdapat}}
                        </h5>
                      </td>
                      <td class="center"><b><h5>
                        <?php
                        $nilai2 = number_format($probabilitas_kelengkapan_ortu_tdklengkap_tdkdapat_request *
                                  $probabilitas_status_rumah_kontrakan_request_tdkdapat *
                                  $probabilitas_status_pekerja_negri_request_tdkdapat *
                                  $probabilitas_status_skada_request_tdkdapat, 7);
                        ?>
                         <input type="hidden" name="probabilitas_tdkdapat" value="{{$nilai2}}">
                          {{$nilai2}}  
                      </h5></td>
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Keterangan</h5></td>
                          <td class="center" colspan="2">
                            @if($nilai1 > $nilai2)
                            <br>
                              <b>
                                <input type="hidden" name="keterangan" value="Dapat Bantuan">
                                <span class="label label label-success">Dapat Bantuan<h2></span>
                                </h2>
                                @else
                                <input type="hidden" name="keterangan" value="Tidak Dapat Bantuan">
                              <span class="label label label-danger">Tidak Dapat Bantuan<h2></span>
                              </h2>
                            </td> 
                            @endif
                         </tr>
                        @endif
                      @if($status_kelengkapan_ortu == 'Tidak Lengkap' && 
                    $status_rumah_ortu == 'Kontrakan' &&
                    $status_pekerjaan_wali == 'Pegawai Negri' &&
                    $status_sk_tidakmampu == 'Tidak Ada'
                        ) 
                     <tr>
                        <td class="center"><b><h5>Probabilitas Dapat</h5></td>                 
                          <td class="center"><b><h5>  
                           {{$probabilitas_kelengkapan_ortu_tdklengkap_dapat_request}} * 
                           {{$probabilitas_status_rumah_kontrakan_request_dapat}} *
                           {{$probabilitas_status_pekerja_negri_request_dapat}} *
                           {{$probabilitas_status_sktdkada_request_dapat}}</h5>
                          </td>
                          <td class="center"><b><h5>
                            <?php
                            $nilai1 = number_format($probabilitas_kelengkapan_ortu_tdklengkap_dapat_request *
                                      $probabilitas_status_rumah_kontrakan_request_dapat *
                                      $probabilitas_status_pekerja_negri_request_dapat *
                                      $probabilitas_status_sktdkada_request_dapat, 7);
                            ?>
                            <input type="hidden" name="probabilitas_dapat" value="{{$nilai1}}">
                               {{$nilai1}}  
                          </h5>
                        </td> 
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Probabilitas Tidak Dapat</h5></td>
                        <td class="center"><b><h5>
                          {{$probabilitas_kelengkapan_ortu_tdklengkap_tdkdapat_request}} * 
                          {{$probabilitas_status_rumah_kontrakan_request_tdkdapat}} *
                          {{$probabilitas_status_pekerja_negri_request_tdkdapat}} *
                          {{$probabilitas_status_sktdkada_request_tdkdapat}}
                        </h5>
                      </td>
                      <td class="center"><b><h5>
                        <?php
                        $nilai2 = number_format($probabilitas_kelengkapan_ortu_tdklengkap_tdkdapat_request *
                                  $probabilitas_status_rumah_kontrakan_request_tdkdapat *
                                  $probabilitas_status_pekerja_negri_request_tdkdapat *
                                  $probabilitas_status_sktdkada_request_tdkdapat, 7);
                        ?>
                         <input type="hidden" name="probabilitas_tdkdapat" value="{{$nilai2}}">
                          {{$nilai2}}  
                      </h5></td>
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Keterangan</h5></td>
                          <td class="center" colspan="2">
                            @if($nilai1 > $nilai2)
                            <br>
                              <b>
                                <input type="hidden" name="keterangan" value="Dapat Bantuan">
                                <span class="label label label-success">Dapat Bantuan<h2></span>
                                </h2>
                                @else
                                <input type="hidden" name="keterangan" value="Tidak Dapat Bantuan">
                              <span class="label label label-danger">Tidak Dapat Bantuan<h2></span>
                              </h2>
                            </td> 
                            @endif
                         </tr>
                        @endif
                      @if($status_kelengkapan_ortu == 'Tidak Lengkap' && 
                    $status_rumah_ortu == 'Kontrakan' &&
                    $status_pekerjaan_wali == 'Pekerja Tidak Tetap' &&
                    $status_sk_tidakmampu == 'Ada'
                        ) 
                     <tr>
                        <td class="center"><b><h5>Probabilitas Dapat</h5></td>                 
                          <td class="center"><b><h5>  
                           {{$probabilitas_kelengkapan_ortu_tdklengkap_dapat_request}} * 
                           {{$probabilitas_status_rumah_kontrakan_request_dapat}} *
                           {{$probabilitas_status_pekerja_tdktetap_request_dapat}} *
                           {{$probabilitas_status_skada_request_dapat}}</h5>
                          </td>
                          <td class="center"><b><h5>
                            <?php
                            $nilai1 = number_format($probabilitas_kelengkapan_ortu_tdklengkap_dapat_request *
                                      $probabilitas_status_rumah_kontrakan_request_dapat *
                                      $probabilitas_status_pekerja_tdktetap_request_dapat *
                                      $probabilitas_status_skada_request_dapat, 7);
                            ?>
                            <input type="hidden" name="probabilitas_dapat" value="{{$nilai1}}">
                               {{$nilai1}}  
                          </h5>
                        </td>               
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Probabilitas Tidak Dapat</h5></td>
                        <td class="center"><b><h5>
                          {{$probabilitas_kelengkapan_ortu_tdklengkap_tdkdapat_request}} * 
                          {{$probabilitas_status_rumah_kontrakan_request_tdkdapat}} *
                          {{$probabilitas_status_pekerja_tdktetap_request_tdkdapat}} *
                          {{$probabilitas_status_skada_request_tdkdapat}}
                        </h5>
                      </td>
                      <td class="center"><b><h5>
                        <?php
                        $nilai2 = number_format($probabilitas_kelengkapan_ortu_tdklengkap_tdkdapat_request *
                                  $probabilitas_status_rumah_kontrakan_request_tdkdapat *
                                  $probabilitas_status_pekerja_tdktetap_request_tdkdapat *
                                  $probabilitas_status_skada_request_tdkdapat, 9);
                        ?>
                         <input type="hidden" name="probabilitas_tdkdapat" value="{{$nilai2}}">
                          {{$nilai2}}  
                      </h5></td>
                      </tr>
                      <tr>
                      <td class="center"><b><h5>Keterangan</h5></td>
                      <td class="center" colspan="2">
                        @if($nilai1 > $nilai2)
                        <br>
                          <b>
                            <span class="label label label-success">Dapat Bantuan<h2></span>
                          </h2>
                          @else
                          <span class="label label label-danger">Tidak Dapat Bantuan<h2></span>
                          </h2>
                        </td> 
                        @endif
                      </tr>
                        @endif
                      @if($status_kelengkapan_ortu == 'Tidak Lengkap' && 
                    $status_rumah_ortu == 'Kontrakan' &&
                    $status_pekerjaan_wali == 'Pekerja Tidak Tetap' &&
                    $status_sk_tidakmampu == 'Tidak Ada'
                        ) 
                     <tr>
                        <td class="center"><b><h5>Probabilitas Dapat</h5></td>                 
                          <td class="center"><b><h5>  
                           {{$probabilitas_kelengkapan_ortu_tdklengkap_dapat_request}} * 
                           {{$probabilitas_status_rumah_kontrakan_request_dapat}} *
                           {{$probabilitas_status_pekerja_tdktetap_request_dapat}} *
                           {{$probabilitas_status_sktdkada_request_dapat}}</h5>
                          </td>
                          <td class="center"><b><h5>
                            <?php
                            $nilai1 = number_format($probabilitas_kelengkapan_ortu_tdklengkap_dapat_request *
                                      $probabilitas_status_rumah_kontrakan_request_dapat *
                                      $probabilitas_status_pekerja_tdktetap_request_dapat *
                                      $probabilitas_status_sktdkada_request_dapat, 7);
                            ?>
                            <input type="hidden" name="probabilitas_dapat" value="{{$nilai1}}">
                               {{$nilai1}}  
                          </h5>
                        </td> 
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Probabilitas Tidak Dapat</h5></td>
                        <td class="center"><b><h5>
                          {{$probabilitas_kelengkapan_ortu_tdklengkap_tdkdapat_request}} * 
                          {{$probabilitas_status_rumah_kontrakan_request_tdkdapat}} *
                          {{$probabilitas_status_pekerja_tdktetap_request_tdkdapat}} *
                          {{$probabilitas_status_sktdkada_request_tdkdapat}}
                        </h5>
                      </td>
                      <td class="center"><b><h5>
                        <?php
                        $nilai2 = number_format($probabilitas_kelengkapan_ortu_tdklengkap_tdkdapat_request *
                                  $probabilitas_status_rumah_kontrakan_request_tdkdapat *
                                  $probabilitas_status_pekerja_tdktetap_request_tdkdapat *
                                  $probabilitas_status_sktdkada_request_tdkdapat, 7);
                        ?>
                         <input type="hidden" name="probabilitas_tdkdapat" value="{{$nilai2}}">
                          {{$nilai2}}  
                      </h5></td>
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Keterangan</h5></td>
                          <td class="center" colspan="2">
                            @if($nilai1 > $nilai2)
                            <br>
                              <b>
                                <input type="hidden" name="keterangan" value="Dapat Bantuan">
                                <span class="label label label-success">Dapat Bantuan<h2></span>
                                </h2>
                                @else
                                <input type="hidden" name="keterangan" value="Tidak Dapat Bantuan">
                              <span class="label label label-danger">Tidak Dapat Bantuan<h2></span>
                              </h2>
                            </td> 
                            @endif
                         </tr>
                        @endif
                      @if($status_kelengkapan_ortu == 'Tidak Lengkap' && 
                    $status_rumah_ortu == 'Kontrakan' &&
                    $status_pekerjaan_wali == 'Usaha' &&
                    $status_sk_tidakmampu == 'Ada'
                        ) 
                     <tr>
                        <td class="center"><b><h5>Probabilitas Dapat</h5></td>                 
                          <td class="center"><b><h5>  
                           {{$probabilitas_kelengkapan_ortu_tdklengkap_dapat_request}} * 
                           {{$probabilitas_status_rumah_kontrakan_request_dapat}} *
                           {{$probabilitas_status_pekerja_usaha_request_dapat}} *
                           {{$probabilitas_status_skada_request_dapat}}</h5>
                          </td>
                          <td class="center"><b><h5>
                            <?php
                            $nilai1 = number_format($probabilitas_kelengkapan_ortu_tdklengkap_dapat_request *
                                      $probabilitas_status_rumah_kontrakan_request_dapat *
                                      $probabilitas_status_pekerja_usaha_request_dapat *
                                      $probabilitas_status_skada_request_dapat, 7);
                            ?>
                            <input type="hidden" name="probabilitas_dapat" value="{{$nilai1}}">
                               {{$nilai1}}  
                          </h5>
                        </td> 
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Probabilitas Tidak Dapat</h5></td>
                        <td class="center"><b><h5>
                          {{$probabilitas_kelengkapan_ortu_tdklengkap_tdkdapat_request}} * 
                          {{$probabilitas_status_rumah_kontrakan_request_tdkdapat}} *
                          {{$probabilitas_status_pekerja_usaha_request_tdkdapat}} *
                          {{$probabilitas_status_skada_request_tdkdapat}}
                        </h5>
                      </td>
                      <td class="center"><b><h5>
                        <?php
                        $nilai2 = number_format($probabilitas_kelengkapan_ortu_tdklengkap_tdkdapat_request *
                                  $probabilitas_status_rumah_kontrakan_request_tdkdapat *
                                  $probabilitas_status_pekerja_usaha_request_tdkdapat *
                                  $probabilitas_status_skada_request_tdkdapat, 7);
                        ?>
                         <input type="hidden" name="probabilitas_tdkdapat" value="{{$nilai2}}">
                          {{$nilai2}}  
                      </h5></td>
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Keterangan</h5></td>
                          <td class="center" colspan="2">
                            @if($nilai1 > $nilai2)
                            <br>
                              <b>
                                <input type="hidden" name="keterangan" value="Dapat Bantuan">
                                <span class="label label label-success">Dapat Bantuan<h2></span>
                                </h2>
                                @else
                                <input type="hidden" name="keterangan" value="Tidak Dapat Bantuan">
                              <span class="label label label-danger">Tidak Dapat Bantuan<h2></span>
                              </h2>
                            </td> 
                            @endif
                         </tr>
                        @endif
                      @if($status_kelengkapan_ortu == 'Tidak Lengkap' && 
                    $status_rumah_ortu == 'Kontrakan' &&
                    $status_pekerjaan_wali == 'Usaha' &&
                    $status_sk_tidakmampu == 'Tidak Ada'
                        ) 
                     <tr>
                        <td class="center"><b><h5>Probabilitas Dapat</h5></td>                 
                          <td class="center"><b><h5>  
                           {{$probabilitas_kelengkapan_ortu_tdklengkap_dapat_request}} * 
                           {{$probabilitas_status_rumah_kontrakan_request_dapat}} *
                           {{$probabilitas_status_pekerja_usaha_request_dapat}} *
                           {{$probabilitas_status_sktdkada_request_dapat}}</h5>
                          </td>
                          <td class="center"><b><h5>
                            <?php
                            $nilai1 = number_format($probabilitas_kelengkapan_ortu_tdklengkap_dapat_request *
                                      $probabilitas_status_rumah_kontrakan_request_dapat *
                                      $probabilitas_status_pekerja_usaha_request_dapat *
                                      $probabilitas_status_sktdkada_request_dapat, 7);
                            ?>
                            <input type="hidden" name="probabilitas_dapat" value="{{$nilai1}}">
                               {{$nilai1}}  
                          </h5>
                        </td> 
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Probabilitas Tidak Dapat</h5></td>
                        <td class="center"><b><h5>
                          {{$probabilitas_kelengkapan_ortu_tdklengkap_tdkdapat_request}} * 
                          {{$probabilitas_status_rumah_kontrakan_request_tdkdapat}} *
                          {{$probabilitas_status_pekerja_usaha_request_tdkdapat}} *
                          {{$probabilitas_status_sktdkada_request_tdkdapat}}
                        </h5>
                      </td>
                      <td class="center"><b><h5>
                        <?php
                        $nilai2 = number_format($probabilitas_kelengkapan_ortu_tdklengkap_tdkdapat_request *
                                  $probabilitas_status_rumah_kontrakan_request_tdkdapat *
                                  $probabilitas_status_pekerja_usaha_request_tdkdapat *
                                  $probabilitas_status_sktdkada_request_tdkdapat, 7);
                        ?>
                         <input type="hidden" name="probabilitas_tdkdapat" value="{{$nilai2}}">
                          {{$nilai2}}  
                      </h5></td>
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Keterangan</h5></td>
                          <td class="center" colspan="2">
                            @if($nilai1 > $nilai2)
                            <br>
                              <b>
                                <input type="hidden" name="keterangan" value="Dapat Bantuan">
                                <span class="label label label-success">Dapat Bantuan<h2></span>
                                </h2>
                                @else
                                <input type="hidden" name="keterangan" value="Tidak Dapat Bantuan">
                              <span class="label label label-danger">Tidak Dapat Bantuan<h2></span>
                              </h2>
                            </td> 
                            @endif
                         </tr>
                        @endif
                      @if($status_kelengkapan_ortu == 'Tidak Lengkap' && 
                    $status_rumah_ortu == 'Tinggal Dengan Saudara' &&
                    $status_pekerjaan_wali == 'Karyawan Swasta' &&
                    $status_sk_tidakmampu == 'Ada'
                        ) 
                     <tr>
                        <td class="center"><b><h5>Probabilitas Dapat</h5></td>                 
                          <td class="center"><b><h5>  
                           {{$probabilitas_kelengkapan_ortu_tdklengkap_dapat_request}} * 
                           {{$probabilitas_status_rumah_saudara_request_dapat}} *
                           {{$probabilitas_status_pekerja_swasta_request_dapat}} *
                           {{$probabilitas_status_skada_request_dapat}}</h5>
                          </td>
                          <td class="center"><b><h5>
                            <?php
                            $nilai1 = number_format($probabilitas_kelengkapan_ortu_tdklengkap_dapat_request *
                                      $probabilitas_status_rumah_saudara_request_dapat *
                                      $probabilitas_status_pekerja_swasta_request_dapat *
                                      $probabilitas_status_skada_request_dapat, 7);
                            ?>
                            <input type="hidden" name="probabilitas_dapat" value="{{$nilai1}}">
                               {{$nilai1}}  
                          </h5>
                        </td> 
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Probabilitas Tidak Dapat</h5></td>
                        <td class="center"><b><h5>
                          {{$probabilitas_kelengkapan_ortu_tdklengkap_tdkdapat_request}} * 
                          {{$probabilitas_status_rumah_saudara_request_tdkdapat}} *
                          {{$probabilitas_status_pekerja_swasta_request_tdkdapat}} *
                          {{$probabilitas_status_skada_request_tdkdapat}}
                        </h5>
                      </td>
                      <td class="center"><b><h5>
                        <?php
                        $nilai2 = number_format($probabilitas_kelengkapan_ortu_tdklengkap_tdkdapat_request *
                                  $probabilitas_status_rumah_saudara_request_tdkdapat *
                                  $probabilitas_status_pekerja_swasta_request_tdkdapat *
                                  $probabilitas_status_skada_request_tdkdapat, 7);
                        ?>
                         <input type="hidden" name="probabilitas_tdkdapat" value="{{$nilai2}}">
                          {{$nilai2}}  
                      </h5></td>
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Keterangan</h5></td>
                          <td class="center" colspan="2">
                            @if($nilai1 > $nilai2)
                            <br>
                              <b>
                                <input type="hidden" name="keterangan" value="Dapat Bantuan">
                                <span class="label label label-success">Dapat Bantuan<h2></span>
                                </h2>
                                @else
                                <input type="hidden" name="keterangan" value="Tidak Dapat Bantuan">
                              <span class="label label label-danger">Tidak Dapat Bantuan<h2></span>
                              </h2>
                            </td> 
                            @endif
                         </tr>
                        @endif
                      @if($status_kelengkapan_ortu == 'Tidak Lengkap' && 
                    $status_rumah_ortu == 'Tinggal Dengan Saudara' &&
                    $status_pekerjaan_wali == 'Karyawan Swasta' &&
                    $status_sk_tidakmampu == 'Tidak Ada'
                        ) 
                     <tr>
                        <td class="center"><b><h5>Probabilitas Dapat</h5></td>                 
                          <td class="center"><b><h5>  
                           {{$probabilitas_kelengkapan_ortu_tdklengkap_dapat_request}} * 
                           {{$probabilitas_status_rumah_saudara_request_dapat}} *
                           {{$probabilitas_status_pekerja_swasta_request_dapat}} *
                           {{$probabilitas_status_sktdkada_request_dapat}}</h5>
                          </td>
                          <td class="center"><b><h5>
                            <?php
                            $nilai1 = number_format($probabilitas_kelengkapan_ortu_tdklengkap_dapat_request *
                                      $probabilitas_status_rumah_saudara_request_dapat *
                                      $probabilitas_status_pekerja_swasta_request_dapat *
                                      $probabilitas_status_sktdkada_request_dapat, 7);
                            ?>
                            <input type="hidden" name="probabilitas_dapat" value="{{$nilai1}}">
                               {{$nilai1}}  
                          </h5>
                        </td> 
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Probabilitas Tidak Dapat</h5></td>
                        <td class="center"><b><h5>
                          {{$probabilitas_kelengkapan_ortu_tdklengkap_tdkdapat_request}} * 
                          {{$probabilitas_status_rumah_saudara_request_tdkdapat}} *
                          {{$probabilitas_status_pekerja_swasta_request_tdkdapat}} *
                          {{$probabilitas_status_sktdkada_request_tdkdapat}}
                        </h5>
                      </td>
                      <td class="center"><b><h5>
                        <?php
                        $nilai2 = number_format($probabilitas_kelengkapan_ortu_tdklengkap_tdkdapat_request *
                                  $probabilitas_status_rumah_kontrakan_request_tdkdapat *
                                  $probabilitas_status_pekerja_swasta_request_tdkdapat *
                                  $probabilitas_status_sktdkada_request_tdkdapat, 7);
                        ?>
                         <input type="hidden" name="probabilitas_tdkdapat" value="{{$nilai2}}">
                          {{$nilai2}}  
                      </h5></td>
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Keterangan</h5></td>
                          <td class="center" colspan="2">
                            @if($nilai1 > $nilai2)
                            <br>
                              <b>
                                <input type="hidden" name="keterangan" value="Dapat Bantuan">
                                <span class="label label label-success">Dapat Bantuan<h2></span>
                                </h2>
                                @else
                                <input type="hidden" name="keterangan" value="Tidak Dapat Bantuan">
                              <span class="label label label-danger">Tidak Dapat Bantuan<h2></span>
                              </h2>
                            </td> 
                            @endif
                         </tr>
                        @endif
                      @if($status_kelengkapan_ortu == 'Tidak Lengkap' && 
                    $status_rumah_ortu == 'Tinggal Dengan Saudara' &&
                    $status_pekerjaan_wali == 'Pegawai Negri' &&
                    $status_sk_tidakmampu == 'Ada'
                        ) 
                     <tr>
                        <td class="center"><b><h5>Probabilitas Dapat</h5></td>                 
                          <td class="center"><b><h5>  
                           {{$probabilitas_kelengkapan_ortu_tdklengkap_dapat_request}} * 
                           {{$probabilitas_status_rumah_saudara_request_dapat}} *
                           {{$probabilitas_status_pekerja_negri_request_dapat}} *
                           {{$probabilitas_status_skada_request_dapat}}</h5>
                          </td>
                          <td class="center"><b><h5>
                            <?php
                            $nilai1 = number_format($probabilitas_kelengkapan_ortu_tdklengkap_dapat_request *
                                      $probabilitas_status_rumah_saudara_request_dapat *
                                      $probabilitas_status_pekerja_negri_request_dapat *
                                      $probabilitas_status_skada_request_dapat, 7);
                            ?>
                            <input type="hidden" name="probabilitas_dapat" value="{{$nilai1}}">
                               {{$nilai1}}  
                          </h5>
                        </td> 
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Probabilitas Tidak Dapat</h5></td>
                        <td class="center"><b><h5>
                          {{$probabilitas_kelengkapan_ortu_tdklengkap_tdkdapat_request}} * 
                          {{$probabilitas_status_rumah_saudara_request_tdkdapat}} *
                          {{$probabilitas_status_pekerja_negri_request_tdkdapat}} *
                          {{$probabilitas_status_skada_request_tdkdapat}}
                        </h5>
                      </td>
                      <td class="center"><b><h5>
                        <?php
                        $nilai2 = number_format($probabilitas_kelengkapan_ortu_tdklengkap_tdkdapat_request *
                                  $probabilitas_status_rumah_saudara_request_tdkdapat *
                                  $probabilitas_status_pekerja_negri_request_tdkdapat *
                                  $probabilitas_status_skada_request_tdkdapat, 7);
                        ?>
                         <input type="hidden" name="probabilitas_tdkdapat" value="{{$nilai2}}">
                          {{$nilai2}}  
                      </h5></td>
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Keterangan</h5></td>
                          <td class="center" colspan="2">
                            @if($nilai1 > $nilai2)
                            <br>
                              <b>
                                <input type="hidden" name="keterangan" value="Dapat Bantuan">
                                <span class="label label label-success">Dapat Bantuan<h2></span>
                                </h2>
                                @else
                                <input type="hidden" name="keterangan" value="Tidak Dapat Bantuan">
                              <span class="label label label-danger">Tidak Dapat Bantuan<h2></span>
                              </h2>
                            </td> 
                            @endif
                         </tr>
                        @endif
                      @if($status_kelengkapan_ortu == 'Tidak Lengkap' && 
                    $status_rumah_ortu == 'Tinggal Dengan Saudara' &&
                    $status_pekerjaan_wali == 'Pegawai Negri' &&
                    $status_sk_tidakmampu == 'Tidak Ada'
                        ) 
                     <tr>
                        <td class="center"><b><h5>Probabilitas Dapat</h5></td>                 
                          <td class="center"><b><h5>  
                           {{$probabilitas_kelengkapan_ortu_tdklengkap_dapat_request}} * 
                           {{$probabilitas_status_rumah_saudara_request_dapat}} *
                           {{$probabilitas_status_pekerja_negri_request_dapat}} *
                           {{$probabilitas_status_sktdkada_request_dapat}}</h5>
                          </td>
                          <td class="center"><b><h5>
                            <?php
                            $nilai1 = number_format($probabilitas_kelengkapan_ortu_tdklengkap_dapat_request *
                                      $probabilitas_status_rumah_saudara_request_dapat *
                                      $probabilitas_status_pekerja_negri_request_dapat *
                                      $probabilitas_status_sktdkada_request_dapat, 7);
                            ?>
                            <input type="hidden" name="probabilitas_dapat" value="{{$nilai1}}">
                               {{$nilai1}}  
                          </h5>
                        </td> 
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Probabilitas Tidak Dapat</h5></td>
                        <td class="center"><b><h5>
                          {{$probabilitas_kelengkapan_ortu_tdklengkap_tdkdapat_request}} * 
                          {{$probabilitas_status_rumah_saudara_request_tdkdapat}} *
                          {{$probabilitas_status_pekerja_negri_request_tdkdapat}} *
                          {{$probabilitas_status_sktdkada_request_tdkdapat}}
                        </h5>
                      </td>
                      <td class="center"><b><h5>
                        <?php
                        $nilai2 = number_format($probabilitas_kelengkapan_ortu_tdklengkap_tdkdapat_request *
                                  $probabilitas_status_rumah_kontrakan_request_tdkdapat *
                                  $probabilitas_status_pekerja_negri_request_tdkdapat *
                                  $probabilitas_status_sktdkada_request_tdkdapat, 7);
                        ?>
                         <input type="hidden" name="probabilitas_tdkdapat" value="{{$nilai2}}">
                          {{$nilai2}}  
                      </h5></td>
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Keterangan</h5></td>
                          <td class="center" colspan="2">
                            @if($nilai1 > $nilai2)
                            <br>
                              <b>
                                <input type="hidden" name="keterangan" value="Dapat Bantuan">
                                <span class="label label label-success">Dapat Bantuan<h2></span>
                                </h2>
                                @else
                                <input type="hidden" name="keterangan" value="Tidak Dapat Bantuan">
                              <span class="label label label-danger">Tidak Dapat Bantuan<h2></span>
                              </h2>
                            </td> 
                            @endif
                         </tr>
                        @endif
                      @if($status_kelengkapan_ortu == 'Tidak Lengkap' && 
                    $status_rumah_ortu == 'Tinggal Dengan Saudara' &&
                    $status_pekerjaan_wali == 'Pekerja Tidak Tetap' &&
                    $status_sk_tidakmampu == 'Ada'
                        ) 
                     <tr>
                        <td class="center"><b><h5>Probabilitas Dapat</h5></td>                 
                          <td class="center"><b><h5>  
                           {{$probabilitas_kelengkapan_ortu_tdklengkap_dapat_request}} * 
                           {{$probabilitas_status_rumah_saudara_request_dapat}} *
                           {{$probabilitas_status_pekerja_tdktetap_request_dapat}} *
                           {{$probabilitas_status_skada_request_dapat}}</h5>
                          </td>
                          <td class="center"><b><h5>
                            <?php
                            $nilai1 = number_format($probabilitas_kelengkapan_ortu_tdklengkap_dapat_request *
                                      $probabilitas_status_rumah_saudara_request_dapat *
                                      $probabilitas_status_pekerja_tdktetap_request_dapat *
                                      $probabilitas_status_skada_request_dapat, 7);
                            ?>
                            <input type="hidden" name="probabilitas_dapat" value="{{$nilai1}}">
                               {{$nilai1}}  
                          </h5>
                        </td> 
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Probabilitas Tidak Dapat</h5></td>
                        <td class="center"><b><h5>
                          {{$probabilitas_kelengkapan_ortu_tdklengkap_tdkdapat_request}} * 
                          {{$probabilitas_status_rumah_saudara_request_tdkdapat}} *
                          {{$probabilitas_status_pekerja_tdktetap_request_tdkdapat}} *
                          {{$probabilitas_status_skada_request_tdkdapat}}
                        </h5>
                      </td>
                      <td class="center"><b><h5>
                        <?php
                        $nilai2 = number_format($probabilitas_kelengkapan_ortu_tdklengkap_tdkdapat_request *
                                  $probabilitas_status_rumah_saudara_request_tdkdapat *
                                  $probabilitas_status_pekerja_tdktetap_request_tdkdapat *
                                  $probabilitas_status_skada_request_tdkdapat, 7);
                        ?>
                         <input type="hidden" name="probabilitas_tdkdapat" value="{{$nilai2}}">
                          {{$nilai2}}  
                      </h5></td>
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Keterangan</h5></td>
                          <td class="center" colspan="2">
                            @if($nilai1 > $nilai2)
                            <br>
                              <b>
                                <input type="hidden" name="keterangan" value="Dapat Bantuan">
                                <span class="label label label-success">Dapat Bantuan<h2></span>
                                </h2>
                                @else
                                <input type="hidden" name="keterangan" value="Tidak Dapat Bantuan">
                              <span class="label label label-danger">Tidak Dapat Bantuan<h2></span>
                              </h2>
                            </td> 
                            @endif
                         </tr>
                        @endif
                      @if($status_kelengkapan_ortu == 'Tidak Lengkap' && 
                    $status_rumah_ortu == 'Tinggal Dengan Saudara' &&
                    $status_pekerjaan_wali == 'Pekerja Tidak Tetap' &&
                    $status_sk_tidakmampu == 'Tidak Ada'
                        ) 
                     <tr>
                        <td class="center"><b><h5>Probabilitas Dapat</h5></td>                 
                          <td class="center"><b><h5>  
                           {{$probabilitas_kelengkapan_ortu_tdklengkap_dapat_request}} * 
                           {{$probabilitas_status_rumah_saudara_request_dapat}} *
                           {{$probabilitas_status_pekerja_tdktetap_request_dapat}} *
                           {{$probabilitas_status_sktdkada_request_dapat}}</h5>
                          </td>
                          <td class="center"><b><h5>
                            <?php
                            $nilai1 = number_format($probabilitas_kelengkapan_ortu_tdklengkap_dapat_request *
                                      $probabilitas_status_rumah_saudara_request_dapat *
                                      $probabilitas_status_pekerja_tdktetap_request_dapat *
                                      $probabilitas_status_sktdkada_request_dapat, 7);
                            ?>
                            <input type="hidden" name="probabilitas_dapat" value="{{$nilai1}}">
                               {{$nilai1}}  
                          </h5>
                        </td> 
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Probabilitas Tidak Dapat</h5></td>
                        <td class="center"><b><h5>
                          {{$probabilitas_kelengkapan_ortu_tdklengkap_tdkdapat_request}} * 
                          {{$probabilitas_status_rumah_saudara_request_tdkdapat}} *
                          {{$probabilitas_status_pekerja_tdktetap_request_tdkdapat}} *
                          {{$probabilitas_status_sktdkada_request_tdkdapat}}
                        </h5>
                      </td>
                      <td class="center"><b><h5>
                        <?php
                        $nilai2 = number_format($probabilitas_kelengkapan_ortu_tdklengkap_tdkdapat_request *
                                  $probabilitas_status_rumah_kontrakan_request_tdkdapat *
                                  $probabilitas_status_pekerja_tdktetap_request_tdkdapat *
                                  $probabilitas_status_sktdkada_request_tdkdapat, 7);
                        ?>
                         <input type="hidden" name="probabilitas_tdkdapat" value="{{$nilai2}}">
                          {{$nilai2}}  
                      </h5></td>
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Keterangan</h5></td>
                          <td class="center" colspan="2">
                            @if($nilai1 > $nilai2)
                            <br>
                              <b>
                                <input type="hidden" name="keterangan" value="Dapat Bantuan">
                                <span class="label label label-success">Dapat Bantuan<h2></span>
                                </h2>
                                @else
                                <input type="hidden" name="keterangan" value="Tidak Dapat Bantuan">
                              <span class="label label label-danger">Tidak Dapat Bantuan<h2></span>
                              </h2>
                            </td> 
                            @endif
                         </tr>
                        @endif
                      @if($status_kelengkapan_ortu == 'Tidak Lengkap' && 
                    $status_rumah_ortu == 'Tinggal Dengan Saudara' &&
                    $status_pekerjaan_wali == 'Usaha' &&
                    $status_sk_tidakmampu == 'Ada'
                        ) 
                     <tr>
                        <td class="center"><b><h5>Probabilitas Dapat</h5></td>                 
                          <td class="center"><b><h5>  
                           {{$probabilitas_kelengkapan_ortu_tdklengkap_dapat_request}} * 
                           {{$probabilitas_status_rumah_saudara_request_dapat}} *
                           {{$probabilitas_status_pekerja_usaha_request_dapat}} *
                           {{$probabilitas_status_skada_request_dapat}}</h5>
                          </td>
                          <td class="center"><b><h5>
                            <?php
                            $nilai1 = number_format($probabilitas_kelengkapan_ortu_tdklengkap_dapat_request *
                                      $probabilitas_status_rumah_saudara_request_dapat *
                                      $probabilitas_status_pekerja_usaha_request_dapat *
                                      $probabilitas_status_skada_request_dapat, 7);
                            ?>
                            <input type="hidden" name="probabilitas_dapat" value="{{$nilai1}}">
                               {{$nilai1}}  
                          </h5>
                        </td> 
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Probabilitas Tidak Dapat</h5></td>
                        <td class="center"><b><h5>
                          {{$probabilitas_kelengkapan_ortu_tdklengkap_tdkdapat_request}} * 
                          {{$probabilitas_status_rumah_saudara_request_tdkdapat}} *
                          {{$probabilitas_status_pekerja_usaha_request_tdkdapat}} *
                          {{$probabilitas_status_skada_request_tdkdapat}}
                        </h5>
                      </td>
                      <td class="center"><b><h5>
                        <?php
                        $nilai2 = number_format($probabilitas_kelengkapan_ortu_tdklengkap_tdkdapat_request *
                                  $probabilitas_status_rumah_saudara_request_tdkdapat *
                                  $probabilitas_status_pekerja_usaha_request_tdkdapat *
                                  $probabilitas_status_skada_request_tdkdapat, 7);
                        ?>
                         <input type="hidden" name="probabilitas_tdkdapat" value="{{$nilai2}}">
                          {{$nilai2}}  
                      </h5></td>
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Keterangan</h5></td>
                          <td class="center" colspan="2">
                            @if($nilai1 > $nilai2)
                            <br>
                              <b>
                                <input type="hidden" name="keterangan" value="Dapat Bantuan">
                                <span class="label label label-success">Dapat Bantuan<h2></span>
                                </h2>
                                @else
                                <input type="hidden" name="keterangan" value="Tidak Dapat Bantuan">
                              <span class="label label label-danger">Tidak Dapat Bantuan<h2></span>
                              </h2>
                            </td> 
                            @endif
                         </tr>
                        @endif
                      @if($status_kelengkapan_ortu == 'Tidak Lengkap' && 
                    $status_rumah_ortu == 'Tinggal Dengan Saudara' &&
                    $status_pekerjaan_wali == 'Usaha' &&
                    $status_sk_tidakmampu == 'Tidak Ada'
                        ) 
                     <tr>
                        <td class="center"><b><h5>Probabilitas Dapat</h5></td>                 
                          <td class="center"><b><h5>  
                           {{$probabilitas_kelengkapan_ortu_tdklengkap_dapat_request}} * 
                           {{$probabilitas_status_rumah_saudara_request_dapat}} *
                           {{$probabilitas_status_pekerja_usaha_request_dapat}} *
                           {{$probabilitas_status_sktdkada_request_dapat}}</h5>
                          </td>
                          <td class="center"><b><h5>
                            <?php
                            $nilai1 = number_format($probabilitas_kelengkapan_ortu_tdklengkap_dapat_request *
                                      $probabilitas_status_rumah_saudara_request_dapat *
                                      $probabilitas_status_pekerja_usaha_request_dapat *
                                      $probabilitas_status_sktdkada_request_dapat, 7);
                            ?>
                            <input type="hidden" name="probabilitas_dapat" value="{{$nilai1}}">
                               {{$nilai1}}  
                          </h5>
                        </td> 
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Probabilitas Tidak Dapat</h5></td>
                        <td class="center"><b><h5>
                          {{$probabilitas_kelengkapan_ortu_tdklengkap_tdkdapat_request}} * 
                          {{$probabilitas_status_rumah_saudara_request_tdkdapat}} *
                          {{$probabilitas_status_pekerja_usaha_request_tdkdapat}} *
                          {{$probabilitas_status_sktdkada_request_tdkdapat}}
                        </h5>
                      </td>
                      <td class="center"><b><h5>
                        <?php
                        $nilai2 = number_format($probabilitas_kelengkapan_ortu_tdklengkap_tdkdapat_request *
                                  $probabilitas_status_rumah_kontrakan_request_tdkdapat *
                                  $probabilitas_status_pekerja_usaha_request_tdkdapat *
                                  $probabilitas_status_sktdkada_request_tdkdapat, 7);
                        ?>
                         <input type="hidden" name="probabilitas_tdkdapat" value="{{$nilai2}}">
                          {{$nilai2}}  
                      </h5></td>
                      </tr>
                      <tr>
                        <td class="center"><b><h5>Keterangan</h5></td>
                          <td class="center" colspan="2">
                            @if($nilai1 > $nilai2)
                            <br>
                              <b>
                                <input type="hidden" name="keterangan" value="Dapat Bantuan">
                                <span class="label label label-success">Dapat Bantuan<h2></span>
                                </h2>
                                @else
                                <input type="hidden" name="keterangan" value="Tidak Dapat Bantuan">
                              <span class="label label label-danger">Tidak Dapat Bantuan<h2></span>
                              </h2>
                            </td> 
                            @endif
                         </tr>
                        @endif
                  </tbody>
                </table>
                <div class="row">
                  <div class="col-md-4">
                  </div>
                  <div class="col-md-6" bg-success>
                  </div>
                  <div class="col-md-2">
                    <button type="submit" class="btn btn-success btn-block"><i class="fa fa-floppy-o"> Simpan</i></button>
                  </div>
                </div>
              </div>
            </div>
          </form>
          </div>
        </div>
 
         <!-- Modal DAFTAR BANSOS -->
   <div class="modal fade" id="modal-hitung" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <div class="page-header">
                <h1>
                   <i class="fa fa-cogs">
                   Setting DataSet
                </i>
              </h1>
            </div>
        <div class="modal-body">
                    <!-- PAGE CONTENT BEGINS -->
                    <form action="/walas/hitung_data_training" class="form-horizontal" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="form-field-select-3">Status Kelengkapan Orang Tua : </label>
                                <br />
                                <select class="form-control" id="status_kelengkapan_ortu" name="status_kelengkapan_ortu">
                                    <option>--Silahkan Pilih--</option>
                                    <option value="Lengkap">Lengkap </option>
                                    <option value="Tidak Lengkap">Tidak Lengkap</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="form-field-select-3">Status Kepemilikan Rumah Orang Tua : </label>
                                <br />
                                <select class="form-control" id="status_rumahortu" name="status_rumah_ortu">
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
                                <select class="form-control" id="status_pekerjaanortu" name="status_pekerjaan_wali">
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
                                <select class="form-control" id="status_sk" name="status_sk_tidakmampu">
                                    <option>--Silahkan Pilih--</option>
                                    <option value="Ada">Ada</option>
                                    <option value="Tidak Ada">Tidak Ada</option>
                                </select>
                            </div>
                         </div>                       
                      </div>
                   </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-success"><i class="fa fa-calculator"> Hitung</button></i>
                    </div>
                </div>
            </form>
          </div>
        </div>
       </div>
      </div>
    </div>
  

   
@endsection