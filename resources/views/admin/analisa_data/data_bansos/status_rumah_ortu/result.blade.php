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
            <a href="#">Data Penerimaan Bansos</a>
        </li>
    </ul><!-- /.breadcrumb -->
</div>
    
<form action="/admin/cari_penerimaan_tahun" method="POST">
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
        <br>
        <br>
        <div class="col-xs-12">
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
        text: 'Grafik Status Pekerjaan Orang Tua/Wali Siswa'
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
            'XII-TKR-C',
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Grafik Status Pekerjaan Orang Tua/Wali Siswa'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:1}</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.1,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Rumah Sendiri',
        data: [49.9, 71.5, 106.4, 129.2, 121.0, 176.0, 115.6, 178.5, 13.4, 89.1, 95.6, 54.4, 78.5, 112.4, 142.1, 47.6, 54.4, 95.6, 24.4]

    }, {
        name: 'Rumah Sewa',
        data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 75.0, 104.3, 91.2, 83.5, 106.6, 92.3, 16.5, 66.4, 121.1, 31.6, 54.4, 95.6, 114.4]

    }, {
        name: 'Kontrakan',
        data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3, 51.2, 148.5, 113.4, 145.1, 90.6, 54.4, 67.6, 156.4]

    }, {
        name: 'Tinggal Dengan Saudara',
        data: [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 51.1, 148.5, 57.4, 167.1, 31.6, 23.4, 55.6, 178.4]

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
        type: 'area',
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
                return this.value / 1000;
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
        name: 'Rumah Sendiri',
        data: [13, 17, 21, 22, 50, 50]
    }, {
        name: 'Rumah Sewa',
        data: [23, 54, 21, 22, 50, 50]
    },{
        name: 'Kontrakan',
        data: [13, 17, 21, 22, 50, 50]
    },{
        name: 'Tinggal Dengan Saudara',
        data: [13, 17, 21, 22, 50, 50]
    }]
});

</script>
    
@endsection