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
            <a href="#">Data Status Kepemilikan Rumah Orang Tua/Wali</a>
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
        data: [ {{$rumahsendiri_xtkja}}, 
                {{$rumahsendiri_xtkjb}}, 
                {{$rumahsendiri_xtkjc}}, 
                {{$rumahsendiri_xtkjd}}, 
                {{$rumahsendiri_xitkja}}, 
                {{$rumahsendiri_xitkjb}}, 
                {{$rumahsendiri_xitkjc}}, 
                {{$rumahsendiri_xiitkja}}, 
                {{$rumahsendiri_xiitkjb}}, 
                {{$rumahsendiri_xiitkjc}}, 
                {{$rumahsendiri_xtkra}}, 
                {{$rumahsendiri_xtkrb}}, 
                {{$rumahsendiri_xtkrc}}, 
                {{$rumahsendiri_xitkra}}, 
                {{$rumahsendiri_xitkrb}}, 
                {{$rumahsendiri_xitkrc}}, 
                {{$rumahsendiri_xiitkra}}, 
                {{$rumahsendiri_xiitkrb}}, 
                {{$rumahsendiri_xiitkrc}} 
                ]

    }, {
        name: 'Rumah Sewa',
        data: [
                {{$rumahsewa_xtkja}}, 
                {{$rumahsewa_xtkjb}}, 
                {{$rumahsewa_xtkjc}}, 
                {{$rumahsewa_xtkjd}}, 
                {{$rumahsewa_xitkja}}, 
                {{$rumahsewa_xitkjb}}, 
                {{$rumahsewa_xitkjc}}, 
                {{$rumahsewa_xiitkja}}, 
                {{$rumahsewa_xiitkjb}}, 
                {{$rumahsewa_xiitkjc}}, 
                {{$rumahsewa_xtkra}}, 
                {{$rumahsewa_xtkrb}}, 
                {{$rumahsewa_xtkrc}}, 
                {{$rumahsewa_xitkra}}, 
                {{$rumahsewa_xitkrb}}, 
                {{$rumahsewa_xitkrc}}, 
                {{$rumahsewa_xiitkra}}, 
                {{$rumahsewa_xiitkrb}}, 
                {{$rumahsewa_xiitkrc}} 
        ]

    }, {
        name: 'Kontrakan',
        data: [
                {{$kontrakan_xtkja}}, 
                {{$kontrakan_xtkjb}}, 
                {{$kontrakan_xtkjc}}, 
                {{$kontrakan_xtkjd}}, 
                {{$kontrakan_xitkja}}, 
                {{$kontrakan_xitkjb}}, 
                {{$kontrakan_xitkjc}}, 
                {{$kontrakan_xiitkja}}, 
                {{$kontrakan_xiitkjb}}, 
                {{$kontrakan_xiitkjc}}, 
                {{$kontrakan_xtkra}}, 
                {{$kontrakan_xtkrb}}, 
                {{$kontrakan_xtkrc}}, 
                {{$kontrakan_xitkra}}, 
                {{$kontrakan_xitkrb}}, 
                {{$kontrakan_xitkrc}}, 
                {{$kontrakan_xiitkra}}, 
                {{$kontrakan_xiitkrb}}, 
                {{$kontrakan_xiitkrc}} 
        ]

    }, {
        name: 'Tinggal Dengan Saudara',
        data: [
                {{$saudara_xtkja}}, 
                {{$saudara_xtkjb}}, 
                {{$saudara_xtkjc}}, 
                {{$saudara_xtkjd}}, 
                {{$saudara_xitkja}}, 
                {{$saudara_xitkjb}}, 
                {{$saudara_xitkjc}}, 
                {{$saudara_xiitkja}}, 
                {{$saudara_xiitkjb}}, 
                {{$saudara_xiitkjc}}, 
                {{$saudara_xtkra}}, 
                {{$saudara_xtkrb}}, 
                {{$saudara_xtkrc}}, 
                {{$saudara_xitkra}}, 
                {{$saudara_xitkrb}}, 
                {{$saudara_xitkrc}}, 
                {{$saudara_xiitkra}}, 
                {{$saudara_xiitkrb}}, 
                {{$saudara_xiitkrc}} 
        ]

    }]
});
          
      
Highcharts.chart('grafik-tahunan', {

title: {
    text: 'GRAFIK TAHUNAN STATUS KEPEMILIKAN RUMAH ORANG TUA/WALI SISWA'
},


yAxis: {
    title: {
        text: 'GRAFIK TAHUNAN STATUS KEPEMILIKAN RUMAH ORANG TUA/WALI SISWA'
    }
},

xAxis: {
    accessibility: {
        rangeDescription: 'Range: 2020 to 2025'
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
        pointStart: 2010
    }
},

series: [{
    name: 'RUMAH SENDIRI',
    data: [
            {{$rumahsendiri_siswa_2020}}, 
            {{$rumahsendiri_siswa_2021}}, 
            {{$rumahsendiri_siswa_2022}}, 
            {{$rumahsendiri_siswa_2023}}, 
            {{$rumahsendiri_siswa_2024}}, 
            {{$rumahsendiri_siswa_2025}} 
    ]
}, {
    name: 'RUMAH SEWA',
    data: [
            {{$rumahsewa_siswa_2020}}, 
            {{$rumahsewa_siswa_2021}}, 
            {{$rumahsewa_siswa_2022}}, 
            {{$rumahsewa_siswa_2023}}, 
            {{$rumahsewa_siswa_2024}}, 
            {{$rumahsewa_siswa_2025}} 
    ]
}, {
    name: 'KONTRAKAN',
    data: [
            {{$kontrakan_siswa_2020}}, 
            {{$kontrakan_siswa_2021}}, 
            {{$kontrakan_siswa_2022}}, 
            {{$kontrakan_siswa_2023}}, 
            {{$kontrakan_siswa_2024}}, 
            {{$kontrakan_siswa_2025}}
    ]
}, {
    name: 'TINGGAL DENGAN SADUARA',
    data: [
            {{$saudara_siswa_2020}}, 
            {{$saudara_siswa_2021}}, 
            {{$saudara_siswa_2022}}, 
            {{$saudara_siswa_2023}}, 
            {{$saudara_siswa_2024}}, 
            {{$saudara_siswa_2025}}
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