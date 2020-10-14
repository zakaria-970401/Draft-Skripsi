@extends('layout/masterwalas')

@section('judul', 'Halaman Detail Data Hasil Seleksi Naive')

@section('konten')

<div class="page-header">
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="/walas">Home</a>
            </li>
            <li>
                <i class="ace-icon fa fa-calculator home-icon"></i>
                <a href="/walas/get_hasil_dataverifikasi">Perhitungan Data Bansos</a>
            </li>
            <li>
                <i class="ace-icon fa fa-eye home-icon"></i>
                <a href="#">Detail Perhitungan Data Bansos</a>
            </li>
        </ul><!-- /.breadcrumb -->
    </div>
<div class="page-content">
<div class="row">
    <div class="col-xs-12">
            <div id="user-profile-1" class="user-profile row">
                <div class="col-xs-12 col-sm-6 center">
                    <div>
                        <h3 class="header smaller lighter blue">Perhitungan Class/Label</h3>
                        <div class="profile-user-info profile-user-info-striped">
                            <div class="profile-info-row">
                                <div class="profile-info-name"> P(Dapat) </div>
                                <div class="profile-info-value">
                                <span class="editable" id="username">{{$show->label_dapat}} </span>
                                </div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name"> P(Tidak Dapat) </div>
                                <div class="profile-info-value">
                                <span class="editable" id="username">{{$show->label_tdkdapat}}  </span>
                                </div>
                            </div>
                        </div>
                        <h3 class="header smaller lighter blue">Perhitungan Atribut Kelengkapan Ortu</h3>
                        <div class="profile-user-info profile-user-info-striped">
                            <div class="profile-info-row">
                                <div class="profile-info-name"> P(Dapat) </div>
                                <div class="profile-info-value">
                                <span class="editable" id="username">
                                @if($show->status_kelengkapan_ortu == 'Lengkap')
                                    {{$show->ortu_lengkap_dapat}} 
                                </span>
                                @elseif($show->status_kelengkapan_ortu == 'Tidak Lengkap')
                                     {{$show->ortu_tdklengkap_dapat}} 
                                </span>
                                @endif
                                </div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name"> P(Tidak Dapat) </div>
                                <div class="profile-info-value">
                                <span class="editable" id="username">
                                @if($show->status_kelengkapan_ortu == 'Lengkap')
                                    {{$show->ortu_lengkap_tdkdapat}} 
                                </span>
                                @elseif($show->status_kelengkapan_ortu == 'Tidak Lengkap')
                                     {{$show->ortu_tdklengkap_tdkdapat}} 
                                </span>
                                @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="space-6"></div>

                    <div class="profile-contact-info">
                        <div class="space-6"></div>
                    </div>

                    <div class="hr hr12 dotted"></div>

                    <div class="clearfix">

                    </div>

                    <div class="hr hr16 dotted"></div>
                </div>

                <div class="col-xs-12 col-sm-6">
                    <div class="center">
                        
                    </div>
                    <h3 class="header smaller lighter blue">Perhitungan Atribut Rumah Ortu</h3>
                    <div class="profile-user-info profile-user-info-striped">
                        <div class="profile-info-row">
                            <div class="profile-info-name"> P(Dapat) </div>
                            <div class="profile-info-value">
                            <span class="editable" id="username">
                            @if($show->status_rumah_ortu == 'Rumah Sendiri')
                                {{$show->rumah_sendiri_dapat}} 
                            </span>
                            @elseif($show->status_rumah_ortu == 'Rumah Sewa')
                                 {{$show->rumah_sewa_dapat}} 
                            </span>
                            @elseif($show->status_rumah_ortu == 'Kontrakan')
                                 {{$show->rumah_kontrakan_dapat}} 
                            </span>
                            @elseif($show->status_rumah_ortu == 'Tinggal Dengan Saudara')
                                 {{$show->rumah_saudara_dapat}} 
                            </span>
                            @endif
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> P(Tidak Dapat) </div>
                            <div class="profile-info-value">
                            <span class="editable" id="username">
                            @if($show->status_rumah_ortu == 'Rumah Sendiri')
                                {{$show->rumah_sendiri_tdkdapat}} 
                            </span>
                            @elseif($show->status_rumah_ortu == 'Rumah Sewa')
                                 {{$show->rumah_sewa_tdkdapat}} 
                            </span>
                            @elseif($show->status_rumah_ortu == 'Kontrakan')
                                 {{$show->rumah_kontrakan_tdkdapat}} 
                            </span>
                            @elseif($show->status_rumah_ortu == 'Tinggal Dengan Saudara')
                                 {{$show->rumah_saudara_tdkdapat}} 
                            </span>
                            @endif
                            </div>
                        </div>
                    </div>
                    <h3 class="header smaller lighter blue">Perhitungan Atribut Pekerjaan Wali</h3>
                    <div class="profile-user-info profile-user-info-striped">
                        <div class="profile-info-row">
                            <div class="profile-info-name"> P(Dapat) </div>
                            <div class="profile-info-value">
                            <span class="editable" id="username">
                            @if($show->status_pekerjaan_wali == 'Karyawan Swasta')
                                {{$show->pekerja_swasta_dapat}} 
                            </span>
                            @elseif($show->status_pekerjaan_wali == 'Pegawai Negri')
                                 {{$show->pekerja_negri_dapat}} 
                            </span>
                            @elseif($show->status_pekerjaan_wali == 'Pekerja Tidak Tetap')
                                 {{$show->pekerja_tdktetap_dapat}} 
                            </span>
                            @elseif($show->status_pekerjaan_wali == 'Usaha')
                                 {{$show->pekerja_usaha_dapat}} 
                            </span>
                            @endif
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> P(Tidak Dapat) </div>
                            <div class="profile-info-value">
                            <span class="editable" id="username">
                            @if($show->status_pekerjaan_wali == 'Karyawan Swasta')
                                {{$show->pekerja_swasta_tdkdapat}} 
                            </span>
                            @elseif($show->status_pekerjaan_wali == 'Pegawai Negri')
                                 {{$show->pekerja_negri_tdkdapat}} 
                            </span>
                            @elseif($show->status_pekerjaan_wali == 'Pekerja Tidak Tetap')
                                 {{$show->pekerja_tdktetap_tdkdapat}} 
                            </span>
                            @elseif($show->status_pekerjaan_wali == 'Usaha')
                                 {{$show->pekerja_usaha_tdkdapat}} 
                            </span>
                            @endif
                            </div>
                        </div>
                    </div>
                    <h3 class="header smaller lighter blue">Perhitungan Atribut SK Tidak Mampu</h3>
                    <div class="profile-user-info profile-user-info-striped">
                        <div class="profile-info-row">
                            <div class="profile-info-name"> P(Dapat) </div>
                            <div class="profile-info-value">
                            <span class="editable" id="username">
                            @if($show->status_sk_tidakmampu == 'Ada')
                                {{$show->sk_ada_dapat}} 
                            </span>
                            @endif
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> P(Tidak Dapat) </div>
                            <div class="profile-info-value">
                            <span class="editable" id="username">
                            @if($show->status_sk_tidakmampu == 'Ada')
                                {{$show->sk_ada_tdkdapat}} 
                            </span>
                            @endif
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div><!-- /.user-profile -->
            <h3 class="header smaller lighter blue">Hasil Akhir</h3>
            <div class="profile-user-info profile-user-info-striped">
                <div class="profile-info-row">
                    <div class="profile-info-name"> P(Dapat) </div>
                    <div class="profile-info-value">
                    <span class="editable" id="username"> <b>{{$show->probabilitas_dapat}}</b> </span>
                    </div>
                </div>
                <div class="profile-info-row">
                    <div class="profile-info-name"> P(Tidak Dapat) </div>
                    <div class="profile-info-value">
                    <span class="editable" id="username"> <b>{{$show->probabilitas_tdkdapat}}  </span>
                    </div>
                </div>
            </div>
            <br>

            <div id="container">
            </div>
           
        </div>
    </div><!-- /.col -->
</div><!-- /.row -->


    <script type="text/javascript"> 
  Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Grafik Probabilitas Akhir'
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        type: 'category',
        labels: {
            rotation: -45,
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Grafik Probabilitas Akhir'
        }
    },
    legend: {
        enabled: false
    },
    tooltip: {
        pointFormat: ''
    },
    series: [{
        name: 'Population',
        data: [
            ['Probabilitas Dapat', {{$show->probabilitas_dapat}}],
            ['Probabilitas Tidak Dapat', {{$show->probabilitas_tdkdapat}}],
        ],
        dataLabels: {
            enabled: true,
            rotation: -10,
            color: '#FFFFFF',
            align: 'right',
            y: 10, // 10 pixels down from the top
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    }]
});
</script>
    
@endsection