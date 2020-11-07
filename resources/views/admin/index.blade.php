@extends('layout.masteradmin')

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
                Dashboard Admin
            </h1>
        </div><!-- /.page-header -->
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="infobox infobox-blue">
                            <div class="infobox-icon">
                                <i class="ace-icon fa fa-database"></i>
                            </div>                        
                            <div class="infobox-data">
                                <a href="/admin/data_training">
                                <span class="infobox-data-number">{{$datatraining}}</span>
                                <div class="infobox-content">Data Training</div>
                            </a>
                        </div>
                    </div>
                        <div class="infobox infobox-purple">
                            <div class="infobox-icon">
                                <i class="ace-icon fa fa-book"></i>
                            </div>                        
                            <div class="infobox-data">
                                <a href="/admin/dataset_siswa">
                                <span class="infobox-data-number">{{$dataset}}</span>
                                <div class="infobox-content">Permintaan Bansos</div>
                            </a>
                        </div>
                    </div>
                        <div class="infobox infobox-brown">
                            <div class="infobox-icon">
                                <i class="ace-icon fa fa-users"></i>
                            </div>                        
                            <div class="infobox-data">
                                <a href="/admin/data_siswa">
                                <span class="infobox-data-number">{{$datasiswa}}</span>
                                <div class="infobox-content">Data Siswa</div>
                            </a>
                        </div>
                    </div>
                        <div class="infobox infobox-black">
                            <div class="infobox-icon">
                                <i class="ace-icon fa fa-user"></i>
                            </div>                        
                            <div class="infobox-data">
                                <a href="/admin/akunsiswa">
                                <span class="infobox-data-number">{{$akunsiswa}}</span>
                                <div class="infobox-content">Akun Siswa</div>
                            </a>
                        </div>
                    </div>
                        <div class="infobox infobox-orange">
                            <div class="infobox-icon">
                                <i class="ace-icon fa fa-graduation-cap"></i>
                            </div>                        
                            <div class="infobox-data">
                                <a href="/admin/daftar_walas">
                                <span class="infobox-data-number">{{$akunwalas}}</span>
                                <div class="infobox-content">Akun Walikelas</div>
                            </a>
                        </div>
                    </div>
                        <div class="infobox infobox-red">
                            <div class="infobox-icon">
                                <i class="ace-icon fa fa-hashtag"></i>
                            </div>                        
                            <div class="infobox-data">
                                <a href="/admin/akunadmin">
                                <span class="infobox-data-number">{{$akunadmin}}</span>
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
                                    <div id="container">
                                    </div>
                                    </div>
                                </div>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div>
                </div>
                        
                    
                        
<script type="text/javascript">
Highcharts.chart('container', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'GRAFIK TAHUNAN PENERIMAAN BANTUAN SOSIAL SISWA'
    },
    xAxis: {
        categories: ['2020','2021','2022','2023','2024','2025']
    },
    yAxis: {
        title: {
            text: 'GRAFIK TAHUNAN PENERIMAAN BANTUAN SOSIAL SISWA'
        }
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        }
    },
    series: [{
        name: 'SISWA YANG DAPAT',
        data: [
        {{$siswa_dpt_2020}},
        {{$siswa_dpt_2021}},
        {{$siswa_dpt_2022}},
        {{$siswa_dpt_2023}},
        {{$siswa_dpt_2024}},
        {{$siswa_dpt_2025}}
        ]
    }, {
        name: 'SISWA YANG TIDAK DAPAT',
        data: [
        {{$siswa_tdkdpt_2020}},
        {{$siswa_tdkdpt_2021}},
        {{$siswa_tdkdpt_2022}},
        {{$siswa_tdkdpt_2023}},
        {{$siswa_tdkdpt_2024}},
        {{$siswa_tdkdpt_2025}}
        ]
    }]
});
</script>

@endsection