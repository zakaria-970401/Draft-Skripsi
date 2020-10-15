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
        type: 'column'
    },
    title: {
        text: 'Grafik Penerimaan Bansos Siswa Tahun {{$request_tahun}}'
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
            text: 'Grafik Data Bansos Siswa Dapat Dan Tidak Dapat'
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
        data: [{{$x_tkja_lengkap}}, 22  ]

    }, {
        name: 'ORANG TUA SISWA TIDAK LENGKAP',
        data: [{{$x_tkja_tdklengkap}},22  ]

    }]
});


Highcharts.chart('grafik-tahunan', {
    chart: {
        type: 'area'
    },
    title: {
        text: 'Grafik Penerimaan Tahunan Bansos'
    },
    xAxis: {
        categories: ['2020', '2021', '2022', '2023', '2024', '2025'],
        tickmarkPlacement: 'on',
        title: {
            enabled: false
        }
    },
    yAxis: {
        title: {
            text: 'Grafik Penerimaan Tahunan Bansos'
        },
        labels: {
            formatter: function () {
                return this.value / 100;
            }
        }
    },
    tooltip: {
        split: true,
        valueSuffix: ' Siswa'
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
        name: 'ORANG TUA SISWA LENGKAP',
        data: [{{$x_tkja_lengkap_2020}}, {{$x_tkja_lengkap_2021}}, 21, 22, 50, 50]
    }, {
        name: 'ORANG TUA SISWA TIDAK LENGKAP',
        data: [{{$x_tkja_tdklengkap_2020}}, {{$x_tkja_tdklengkap_2021}}, 70, 20, 10, 50]
    }]
});

</script>
    
@endsection