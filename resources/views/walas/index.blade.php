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
                    <div class="col-md-4">
                        <div class="infobox infobox-orange">
                            <div class="infobox-icon">
                                <i class="ace-icon fa fa-bell"></i>
                            </div>                        
                            <div class="infobox-data">
                                <a href="#">
                                    <span class="infobox-data-number">{{$proses}}</span>
                                    <div class="infobox-content">Sedang Proses</div>
                                </a>
                            </div>
                        </div>
                    </div>
                      <div class="col-md-4">
                        <div class="infobox infobox-red">
                            <div class="infobox-icon">
                                <i class="ace-icon fa fa-close"></i>
                            </div>                        
                            <div class="infobox-data">
                                <a href="#">
                                <span class="infobox-data-number">{{$tolak}}</span>
                                <div class="infobox-content">Di Tolak</div>
                            </a>
                        </div>
                    </div>
                </div>
                      <div class="col-md-4">
                        <div class="infobox infobox-green">
                            <div class="infobox-icon">
                                <i class="ace-icon fa fa-check"></i>
                            </div>                        
                            <div class="infobox-data">
                                <a href="#">
                                <span class="infobox-data-number">{{$selesai}}</span>
                                <div class="infobox-content">Selesai</div>
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
                                            <img class="editable img-responsive" alt="Alex's Avatar" id="avatar2" src=" {{ asset('foto_walas/'.Auth::user()->foto)}}" style="width: 500px" alt="Belum Ada Foto" />
                                        </span>
                                        <div class="space space-4"></div>
                                        <h5 class="text-dark">{{Auth::user()->nama}}</h5>
                                    </div><!-- /.col -->                 
                                    <div class="col-xs-12 col-sm-9">
                                    <div id="grafik-tahunan">
                                    </div>
                                    </div>
                                </div>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div>
                </div>
                        
                        
<script type="text/javascript">

Highcharts.chart('grafik-tahunan', {

title: {
    text: 'GRAFIK PENERIMAAN BANSOS SISWA'
},

yAxis: {
    title: {
        text: 'GRAFIK PENERIMAAN BANSOS SISWA'
    }
},

xAxis: {
    accessibility: {
        rangeDescription: 'Range: 2017 to 2020'
    }
},

legend: {
    layout: 'vertical',
    align: 'right',
    verticalAlign: 'middle'
},

plotOptions: {
    series: {
        label: {
            connectorAllowed: false
        },
        pointStart: 2017
    }
},

series: [{
    name: 'SISWA YANG DAPAT',
    data: [
            104,
            135,
            97,
            81
          ]
}, {
    name: 'SISWA YANG TIDAK DAPAT',
    data: [
        5,
        13,
        8,
        11
         ]
}],

responsive: {
    rules: [{
        condition: {
            maxWidth: 500
        },
        chartOptions: {
            legend: {
                layout: 'horizontal',
                align: 'center',
                verticalAlign: 'bottom'
            }
        }
    }]
}

});
    </script>
        
    @endsection