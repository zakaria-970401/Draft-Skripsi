@extends('layout/masteradmin')

@section('judul', 'Halaman Analisa Data Bansos')

@section('konten')
<div class="breadcrumbs ace-save-state" id="breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="/admin">Home</a>
        </li>
        <li>
            <i class="ace-icon fa fa-bar-chart home-icon"></i>
            <a href="/">Data Status Kelengkapan Orang Tua Siswa</a>
        </li>
    </ul><!-- /.breadcrumb -->
</div>
    
<form action="/admin/cari_statusortu_tahun" method="POST">
    @csrf
    <div class="page-content">
        <div class="row">
            <div class="col-md-7">
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Cari Berdasarkan Tahun : </label>
            <div class="col-sm-9">
                <select class="form-control" name="tahun" style="width: 100%;">
                <option value="{{$request_tahun}}">{{$request_tahun}}</option>
                <option>Silahkan Pilih</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
                <option value="2025">2025</option>
            </select>
        </div>
      </div>
    </div>
            <button type="submit" class="btn btn-secondary btn-sm"><i class="fa fa-search"> Cari</i></button>
            <button type="button" id="btn_show_tahun" class="btn btn-info btn-sm"><i class="fa fa-eye"> Tampilan Grafik Tahunan</i></button>
            <button type="button" id="btn_hide_tahun" class="btn btn-danger btn-sm"><i class="fa fa-close"> Sembunyikan Grafik Tahunan</i></button>
        </form>
        <div class="col-xs-12">
            <br>
            <br>
            <div id="container">
            </div>
        </div>
        <div class="col-xs-12">
            <hr style="background-color: black">
            <br>
                <div id="grafik-tahunan">
            </div>
        </div>
    </div>

<script type="text/javascript">
Highcharts.chart('container', {
    chart: {
        backgroundColor: {
            linearGradient: [0, 0, 500, 500],
            stops: [
                [0, 'rgb(255, 255, 255)'],
                [1, 'rgb(200, 200, 255)']
            ]
        },
        type: 'column'
    },
    title: {
        text: 'GRAFIK TAHUNAN KELENGKAPAN ORANG TUA SISWA DI TAHUN {{$request_tahun}}'
    },
    subtitle: {
    },
    xAxis: {
        categories: [
            'X-TKJ-A',
            'X-TKJ-B',
            'X-TKJ-C',
            'X-TKJ-D',
            'XI-TKJ-A',
            'XI-TKJ-B',
            'XI-TKJ-C',
            'XII-TKJ-A',
            'XII-TKJ-B',
            'XII-TKJ-C',
            'X-TKR-A',
            'X-TKR-B',
            'X-TKR-C',
            'XI-TKR-A',
            'XI-TKR-B',
            'XI-TKR-C',
            'XII-TKR-A',
            'XII-TKR-B',
            'XII-TKR-C'
        ],
        crosshair: true
    },
    yAxis: {
        title: {
            text: 'GRAFIK STATUS KELENGKAPAN ORANG TUA SISWA DI TAHUN{{$request_tahun}}'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.f}</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'ORANG TUA SISWA LENGKAP',
        data: [
                {{$x_tkja_lengkap}}, 
                {{$x_tkjb_lengkap}}, 
                {{$x_tkjc_lengkap}}, 
                {{$x_tkjd_lengkap}}, 
                {{$xi_tkja_lengkap}}, 
                {{$xi_tkjb_lengkap}}, 
                {{$xi_tkjc_lengkap}}, 
                {{$xii_tkja_lengkap}}, 
                {{$xii_tkjb_lengkap}}, 
                {{$xii_tkjc_lengkap}}, 
                {{$x_tkra_lengkap}}, 
                {{$x_tkrb_lengkap}}, 
                {{$x_tkrc_lengkap}}, 
                {{$xi_tkra_lengkap}}, 
                {{$xi_tkrb_lengkap}}, 
                {{$xi_tkrc_lengkap}}, 
                {{$xii_tkra_lengkap}}, 
                {{$xii_tkrb_lengkap}}, 
                {{$xii_tkrc_lengkap}}, 
              ]

    }, {
        name: 'ORANG TUA SISWA TIDAK LENGKAP',
        data: [
                 {{$x_tkja_tdklengkap}}, 
                {{ $x_tkjb_tdklengkap}}, 
                {{ $x_tkjc_tdklengkap}}, 
                {{ $x_tkjd_tdklengkap}}, 
                {{ $xi_tkja_tdklengkap}}, 
                {{ $xi_tkjb_tdklengkap}}, 
                {{ $xi_tkjc_tdklengkap}}, 
                {{ $xii_tkja_tdklengkap}}, 
                {{ $xii_tkjb_tdklengkap}}, 
                {{ $xii_tkjc_tdklengkap}}, 
                {{ $x_tkra_tdklengkap}}, 
                {{ $x_tkrb_tdklengkap}}, 
                {{ $x_tkrc_tdklengkap}}, 
                {{ $xi_tkra_tdklengkap}}, 
                {{ $xi_tkrb_tdklengkap}}, 
                {{ $xi_tkrc_tdklengkap}}, 
                {{ $xii_tkra_tdklengkap}}, 
                {{ $xii_tkrb_tdklengkap}}, 
                {{ $xii_tkrc_tdklengkap}},
        ]
    }]
});

             
Highcharts.chart('grafik-tahunan', {
    chart: {
        backgroundColor: {
            linearGradient: [0, 0, 500, 500],
            stops: [
                [0, 'rgb(255, 255, 255)'],
                [1, 'rgb(200, 200, 255)']
            ]
        },
        type: 'area'
    },

    title: {
        text: 'GRAFIK TAHUNAN KELENGKAPAN ORANG TUA SISWA'
    },
  
    xAxis: {
        allowDecimals: false,
        labels: {
            formatter: function () {
                return this.value; // clean, unformatted number for year
            }
        },
        accessibility: {
            rangeDescription: 'Range: 2020 to 2025.'
        }
    },
    yAxis: {
        title: {
            text: 'GRAFIK TAHUNAN KELENGKAPAN ORANG TUA SISWA'
        },
        labels: {
            formatter: function () {
                return this.value;
            }
        }
    },
    tooltip: {
        pointFormat: '{point.y} SISWA YANG {series.name}'
    },
    plotOptions: {
        area: {
            pointStart: 2020,
            marker: {
                enabled: false,
                symbol: 'circle',
                radius: 2,
                states: {
                    hover: {
                        enabled: true
                    }
                }
            }
        }
    },
    series: [{
        name: 'LENGKAP',
        data: [
                {{$siswa_lengkap_2020}}, 
                {{$siswa_lengkap_2021}},
                {{$siswa_lengkap_2021}}, 
                {{$siswa_lengkap_2021}}, 
                {{$siswa_lengkap_2021}}, 
                {{$siswa_lengkap_2021}}
        ]
    }, {
        name: 'TIDAK LENGKAP',
        data: [ {{$siswa_tdklengkap_2020}}, 
                {{$siswa_tdklengkap_2021}}, 
                {{$siswa_tdklengkap_2022}}, 
                {{$siswa_tdklengkap_2023}}, 
                {{$siswa_tdklengkap_2024}}, 
                {{$siswa_tdklengkap_2025}}
        ]
    }]
});
    </script>
        
    @endsection