@extends('layout.masterwalas')

@section('judul', 'Halaman Utama')

@section('konten')
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="#">Home</a>
                </li>
            </ul><!-- /.breadcrumb -->
        </div>
        <br>
        <div class="page-header">
            <h1>
                Dashboard Wali Kelas
            </h1>
        </div><!-- /.page-header -->
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="infobox infobox-green">
                            <div class="infobox-icon">
                                <i class="ace-icon fa fa-check"></i>
                            </div>                        
                            <div class="infobox-data">
                                <a href="#">
                                <span class="infobox-data-number">{{ $permintaan_bansos}}</span>
                                <div class="infobox-content">Permintaan Bansos</div>
                            </a>
                        </div>
                    </div>
                        <div class="infobox infobox-blue">
                            <div class="infobox-icon">
                                <i class="ace-icon fa fa-users"></i>
                            </div>                        
                            <div class="infobox-data">
                                <a href="#">
                                <span class="infobox-data-number">{{$akun_walas}}</span>
                                <div class="infobox-content">Akun WaliKelas</div>
                            </a>
                        </div>
                    </div>
                        <div class="infobox infobox-brown">
                            <div class="infobox-icon">
                                <i class="ace-icon fa fa-graduation-cap"></i>
                            </div>                        
                            <div class="infobox-data">
                                <a href="#">
                                <span class="infobox-data-number">{{$data_siswa}}</span>
                                <div class="infobox-content">Data Siswa</div>
                            </a>
                        </div>
                    </div>
                        <div class="infobox infobox-black">
                            <div class="infobox-icon">
                                <i class="ace-icon fa fa-user"></i>
                            </div>                        
                            <div class="infobox-data">
                                <a href="#">
                                <span class="infobox-data-number">{{$akun_siswa}}</span>
                                <div class="infobox-content">Akun Siswa</div>
                            </a>
                        </div>
                    </div>
                        <div class="infobox infobox-red">
                            <div class="infobox-icon">
                                <i class="ace-icon fa fa-hashtag"></i>
                            </div>                        
                            <div class="infobox-data">
                                <a href="#">
                                <span class="infobox-data-number">{{$akun_admin}}</span>
                                <div class="infobox-content">Akun Admin</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            </div>
                    <hr style="background-color: black;" >
                    <div class="container">
                        <div class="tab-content no-border padding-24">
                            <div id="home" class="tab-pane in active">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-3 center">
                                        <span class="profile-picture">
                                            <img class="editable img-responsive" alt="Alex's Avatar" id="avatar2" src=" {{ asset('foto_akunadmin/'.Auth::user()->foto)}}" style="width: 500px" alt="Belum Ada Foto" />
                                        </span>
                                        <div class="space space-4"></div>
                                        <h5 class="text-dark">{{Auth::user()->nama}}</h5>
                                    </div><!-- /.col -->                 
                                    <div class="col-xs-12 col-sm-9">
                                    <div id="grafik-walas">
                                    </div>
                                    </div>
                                </div>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div>
                </div>
                        
                        
<script type="text/javascript">

Highcharts.chart('grafik-walas', {
    chart: {
        type: 'area'
    },
    title: {
        text: 'Historic and Estimated Worldwide Population Growth by Region'
    },
    subtitle: {
        text: 'Source: Wikipedia.org'
    },
    xAxis: {
        categories: ['1750', '1800', '1850', '1900', '1950', '1999', '2050'],
        tickmarkPlacement: 'on',
        title: {
            enabled: false
        }
    },
    yAxis: {
        title: {
            text: 'Billions'
        },
        labels: {
            formatter: function () {
                return this.value / 1000;
            }
        }
    },
    tooltip: {
        split: true,
        valueSuffix: ' millions'
    },
    plotOptions: {
        area: {
            stacking: 'normal',
            lineColor: '#666666',
            lineWidth: 1,
            marker: {
                lineWidth: 1,
                lineColor: '#666666'
            }
        }
    },
    series: [{
        name: 'Asia',
        data: [502, 635, 809, 947, 1402, 3634, 5268]
    }, {
        name: 'Africa',
        data: [106, 107, 111, 133, 221, 767, 1766]
    }, {
        name: 'Europe',
        data: [163, 203, 276, 408, 547, 729, 628]
    }, {
        name: 'America',
        data: [18, 31, 54, 156, 339, 818, 1201]
    }, {
        name: 'Oceania',
        data: [2, 2, 2, 6, 13, 30, 46]
    }]
});
        
</script>
                

@endsection