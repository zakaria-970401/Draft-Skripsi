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
                        <div class="infobox infobox-green">
                            <div class="infobox-icon">
                                <i class="ace-icon fa fa-database"></i>
                            </div>                        
                            <div class="infobox-data">
                                <a href="#">
                                <span class="infobox-data-number">5</span>
                                <div class="infobox-content">Data Kriteria</div>
                            </a>
                        </div>
                    </div>
                        <div class="infobox infobox-blue">
                            <div class="infobox-icon">
                                <i class="ace-icon fa fa-book"></i>
                            </div>                        
                            <div class="infobox-data">
                                <a href="#">
                                <span class="infobox-data-number">32</span>
                                <div class="infobox-content">Data Training</div>
                            </a>
                        </div>
                    </div>
                        <div class="infobox infobox-brown">
                            <div class="infobox-icon">
                                <i class="ace-icon fa fa-users"></i>
                            </div>                        
                            <div class="infobox-data">
                                <a href="#">
                                <span class="infobox-data-number">432</span>
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
                                <span class="infobox-data-number">341</span>
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
                                <span class="infobox-data-number">3</span>
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
                                    <div id="highcharts_dashboardadmin">
                                    </div>
                                    </div>
                                </div>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div>
                </div>
                        
                        
<script type="text/javascript">

// Create the chart
Highcharts.chart('highcharts_dashboardadmin', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Browser market shares. January, 2018'
    },
    subtitle: {
        text: 'Click the columns to view versions. Source: <a href="http://statcounter.com" target="_blank">statcounter.com</a>'
    },
    accessibility: {
        announceNewData: {
            enabled: true
        }
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: 'Total percent market share'
        }

    },
    legend: {
        enabled: false
    },
    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{point.y:.1f}%'
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
    },

    series: [
        {
            name: "Browsers",
            colorByPoint: true,
            data: [
                {
                    name: "X-TKJ-A",
                    y: 12.74,
                },
                {
                    name: "X-TKJ-B",
                    y: 42.74,
                },
                {
                    name: "X-TKJ-C",
                    y: 65.74,
                },
                {
                    name: "X-TKJ-D",
                    y: 23.74,
                },
                {
                    name: "XI-TKJ-A",
                    y: 62.74,
                },
                {
                    name: "XI-TKJ-B",
                    y: 72.74,
                },
                {
                    name: "XI-TKJ-C",
                    y: 22.74,
                },
                {
                    name: "XII-TKJ-A",
                    y: 32.74,
                },
                {
                    name: "XII-TKJ-B",
                    y: 32.74,
                },
                {
                    name: "XII-TKJ-C",
                    y: 42.74,
                },
                {
                    name: "X-TKR-A",
                    y: 62.74,
                },
                {
                    name: "X-TKR-B",
                    y: 65.74,
                },
                {
                    name: "X-TKR-C",
                    y: 82.74,
                },
                {
                    name: "XI-TKR-A",
                    y: 32.74,
                },
                {
                    name: "XI-TKR-B",
                    y: 74.74,
                },
                {
                    name: "XI-TKR-C",
                    y: 32.74,
                },
                {
                    name: "XII-TKR-A",
                    y: 22.74,
                },
                {
                    name: "XII-TKR-B",
                    y: 86.74,
                },
                {
                    name: "XII-TKR-C",
                    y: 42.74,
                },
       
            ]
        }
    ],
});

</script>
                

@endsection