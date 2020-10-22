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
            <a href="#">Data Penerimaan Bansos Siswa</a>
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
            text: 'Grafik Data Bansos Siswa Dapat Dan Tidak Dapat Tahun {{$request_tahun}}'
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
        name: 'DAPAT',
        data: [
            {{$x_tkja_dpt}}, 
            {{$x_tkjb_dpt}},    
            {{$x_tkjc_dpt}}, 
            {{$x_tkjd_dpt}},    
            {{$xi_tkja_dpt}}, 
            {{$xi_tkjb_dpt}},    
            {{$xi_tkjc_dpt}},    
            {{$xii_tkja_dpt}},    
            {{$xii_tkjb_dpt}},    
            {{$xii_tkjc_dpt}},    
            {{$x_tkra_dpt}},    
            {{$x_tkrb_dpt}},    
            {{$x_tkrc_dpt}},    
            {{$xi_tkra_dpt}},    
            {{$xi_tkrb_dpt}},    
            {{$xi_tkrc_dpt}},    
            {{$xii_tkra_dpt}},    
            {{$xii_tkrb_dpt}},    
            {{$xii_tkrc_dpt}}
               ]
    },
     {
        name: 'TIDAK DAPAT',
        data: [ 
            {{$x_tkja_tdkdpt}}, 
            {{$x_tkjb_tdkdpt}},    
            {{$x_tkjc_tdkdpt}}, 
            {{$x_tkjd_tdkdpt}},    
            {{$xi_tkja_tdkdpt}}, 
            {{$xi_tkjb_tdkdpt}},    
            {{$xi_tkjc_tdkdpt}},    
            {{$xii_tkja_tdkdpt}},    
            {{$xii_tkjb_tdkdpt}},    
            {{$xii_tkjc_tdkdpt}},    
            {{$x_tkra_tdkdpt}},    
            {{$x_tkrb_tdkdpt}},    
            {{$x_tkrc_tdkdpt}},    
            {{$xi_tkra_tdkdpt}},    
            {{$xi_tkrb_tdkdpt}},    
            {{$xi_tkrc_tdkdpt}},    
            {{$xii_tkra_tdkdpt}},    
            {{$xii_tkrb_tdkdpt}},    
            {{$xii_tkrc_tdkdpt}}
             ]
    }]
});

    
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
        pointStart: 2020
    }
},

series: [{
    name: 'DAPAT BANSOS',
    data: [
        {{$siswa_dpt_2020}},
        {{$siswa_dpt_2021}},
        {{$siswa_dpt_2022}},
        {{$siswa_dpt_2023}},
        {{$siswa_dpt_2024}},
        {{$siswa_dpt_2025}}
          ]
}, {
    name: 'TIDAK DAPAT BANSOS',
    data: [
        {{$siswa_tdkdpt_2020}},
        {{$siswa_tdkdpt_2021}},
        {{$siswa_tdkdpt_2022}},
        {{$siswa_tdkdpt_2023}},
        {{$siswa_tdkdpt_2024}},
        {{$siswa_tdkdpt_2025}}
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