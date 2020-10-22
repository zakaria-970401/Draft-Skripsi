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
            <a href="#">Data Status Pekerjaan Orang Tua/Wali</a>
        </li>
    </ul><!-- /.breadcrumb -->
</div>

<form action="/admin/cari_pekerjaanortu_tahun" method="POST">
    @csrf
   <div class="page-content">
        <div class="form-group">
            <label class="col-sm-2 control-label no-padding-right"> Cari Berdasarkan Tahun : </label>
        <div class="col-sm-4">
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
    <button type="submit" class="btn btn-secondary btn-sm"><i class="fa fa-search"> Cari</i></button>
    <button type="button" id="btn_show_tahun" class="btn btn-info btn-sm"><i class="fa fa-eye"> Tampilan Grafik Tahunan</i></button>
    <button type="button" id="btn_hide_tahun" class="btn btn-danger btn-sm"><i class="fa fa-close"> Sembunyikan Grafik Tahunan</i></button>
    </div>
    </form>
        <div class="row">
        <div class="col-xs-12">
            <br>
            <div id="container"></div>
        </div>
        <div class="col-xs-12">
            <br>
            <div id="grafik-tahunan"></div>
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
        text: 'GRAFIK STATUS PEKERJAAN ORANG TUA/WALI SISWA'
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
            text: 'GRAFIK STATUS PEKERJAAN ORANG TUA/WALI SISWA'
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
            borderWidth: 1
        }
    },
    series: [{
        name: 'Karyawan Swasta',
        data: [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]

    }, {
        name: 'Pegawai Negeri',
        data: [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]

    }, {
        name: 'Pekerja Tidak Tetap',
        data: [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]

    }, {
        name: 'Usaha',
        data: [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]

    }]
});
          

Highcharts.chart('grafik-tahunan', {

title: {
    text: 'GRAFIK TAHUNAN STATUS PEKERJAAN ORANG TUA/WALI SISWA'
},


yAxis: {
    title: {
        text: 'GRAFIK TAHUNAN STATUS PEKERJAAN ORANG TUA/WALI SISWA'
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
    name: 'KARYAWAN SWASTA',
    data: [
            {{$karyawanswasta_siswa_2020}}, 
            {{$karyawanswasta_siswa_2021}}, 
            {{$karyawanswasta_siswa_2022}}, 
            {{$karyawanswasta_siswa_2023}}, 
            {{$karyawanswasta_siswa_2024}}, 
            {{$karyawanswasta_siswa_2025}} 
            ]
}, {
    name: 'PEGAWAI NEGERI',
    data: [
            {{$pegawainegeri_siswa_2020}}, 
            {{$pegawainegeri_siswa_2021}}, 
            {{$pegawainegeri_siswa_2022}}, 
            {{$pegawainegeri_siswa_2023}}, 
            {{$pegawainegeri_siswa_2024}}, 
            {{$pegawainegeri_siswa_2025}}
    ]
}, {
    name: 'PEKERJA TIDAK TETAP',
    data: [
            {{$pekerja_tdk_tetap_siswa_2020}}, 
            {{$pekerja_tdk_tetap_siswa_2021}}, 
            {{$pekerja_tdk_tetap_siswa_2022}}, 
            {{$pekerja_tdk_tetap_siswa_2023}}, 
            {{$pekerja_tdk_tetap_siswa_2024}}, 
            {{$pekerja_tdk_tetap_siswa_2025}}
    ]
}, {
    name: 'USAHA',
    data: [
            {{$usaha_siswa_2020}}, 
            {{$usaha_siswa_2021}}, 
            {{$usaha_siswa_2022}}, 
            {{$usaha_siswa_2023}}, 
            {{$usaha_siswa_2024}}, 
            {{$usaha_siswa_2025}}
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