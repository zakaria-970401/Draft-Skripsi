@extends('layout/masteradmin')

@section('judul', 'Halaman Statistik Data Training')

@section('konten')
<div class="breadcrumbs ace-save-state" id="breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="/admin">Home</a>
        </li>
        <li>
            <i class="ace-icon fa fa-pie-chart home-icon"></i>
            <a href="#">Data Perbandingan Bansos Siswa</a>
        </li>
    </ul><!-- /.breadcrumb -->
</div>


   <div class="page-content">
        <div class="row">
        <div class="col-md-6">
            <div id="kelengkapan_ortu"></div>
        </div>
        <div class="col-md-6">
            <div id="pekerjaan_ortu"></div>
        </div>
        <div class="col-md-6">
            <br>
            <div id="rumah_ortu"></div>
        </div>
        <div class="col-md-6">
            <br>
            <div id="sk"></div>
        </div>
    </div>
<script type="text/javascript">
Highcharts.setOptions({
    colors: Highcharts.map(Highcharts.getOptions().colors, function (color) {
        return {
            radialGradient: {
                cx: 0.5,
                cy: 0.3,
                r: 0.7
            },
            stops: [
                [0, color],
                [1, Highcharts.color(color).brighten(-0.3).get('rgb')] // darken
            ]
        };
    })
});

// Build the chart
Highcharts.chart('kelengkapan_ortu', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        backgroundColor: {
            linearGradient: [0, 0, 500, 500],
            stops: [
                [0, 'rgb(255, 255, 255)'],
                [1, 'rgb(200, 200, 255)']
            ]
        },
        type: 'pie'
    },
    title: {
        text: 'Status Kelengkapan Orang Tua/Wali'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            showInLegend : true,
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                connectorColor: 'silver'
            }
        }
    },
    series: [{
        name: 'Perbandingan Ortu/Wali',
        data: [
            { name: 'Ortu Lengkap', y: {{$ortu_lengkap_persen}} },
            { name: 'Ortu Tidak Lengkap', y: {{$ortu_tdklengkap_persen}}, drilldown : "Ortu Tidak Lengkap" }
        ]
    }
    ],
    drilldown: {
        series: [
            {
                name: "Ortu Tidak Lengkap",
                id: "Ortu Tidak Lengkap",
                data: [
                    [
                        "Tanpa Ayah",
                        {{$tanpa_ayah_persen}}
                    ],
                    [
                        "Tanpa Ibu",
                        {{$tanpa_ibu_persen}}
                    ],
                    [
                        "Tanpa Ayah Dan Ibu",
                        {{$tanpa_ayah_ibu_persen}}
                    ]
                ]
            }
        ]
    }
});

// Build the chart
Highcharts.chart('pekerjaan_ortu', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        backgroundColor: {
            linearGradient: [0, 0, 500, 500],
            stops: [
                [0, 'rgb(255, 255, 255)'],
                [1, 'rgb(200, 200, 255)']
            ]
        },
        type: 'pie'
    },
    title: {
        text: 'Status Pekerjaan Orang Tua/Wali'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            showInLegend : true,
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                connectorColor: 'silver'
            }
        }
    },
    series: [{
        name: 'Perbandingan Ortu/Wali',
        data: [
            { name: 'Karyawan Swasta', y: {{$karyawanswasta_persen}} },
            { name: 'Pegawai Negeri', y: {{$pegawainegeri_persen}} },
            { name: 'Pekerja Tidak Tetap', y: {{$pekerja_tdk_tetap_persen}} },
            { name: 'Usaha', y: {{$usaha_persen}} }
        ]
    }
    ],
    drilldown: {
        series: [
            {
                name: "Ortu Tidak Lengkap",
                id: "Ortu Tidak Lengkap",
                data: [
                    [
                        "Tanpa Ayah",
                        {{$tanpa_ayah_persen}}
                    ],
                    [
                        "Tanpa Ibu",
                        {{$tanpa_ibu_persen}}
                    ],
                    [
                        "Tanpa Ayah Dan Ibu",
                        {{$tanpa_ayah_ibu_persen}}
                    ]
                ]
            }
        ]
    }
});

// Build the chart
Highcharts.chart('rumah_ortu', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        backgroundColor: {
            linearGradient: [0, 0, 500, 500],
            stops: [
                [0, 'rgb(255, 255, 255)'],
                [1, 'rgb(200, 200, 255)']
            ]
        },
        type: 'pie'
    },
    title: {
        text: 'Status Kepemilikan Rumah Orang Tua/Wali'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            showInLegend : true,
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                connectorColor: 'silver'
            }
        }
    },
    series: [{
        name: 'Rumah Ortu/Wali',
        data: [
            { name: 'Rumah Sendiri', y: {{$rumahsendiri_persen}} },
            { name: 'Rumah Sewa', y: {{$rumahsewa_persen}} },
            { name: 'Kontrakan', y: {{$kontrakan_persen}} },
            { name: 'Tinggal Dengan Saudara', y: {{$rumahsaudara_persen}} }
        ]
    }
    ],
    drilldown: {
        series: [
            {
                name: "Ortu Tidak Lengkap",
                id: "Ortu Tidak Lengkap",
                data: [
                    [
                        "Tanpa Ayah",
                        {{$tanpa_ayah_persen}}
                    ],
                    [
                        "Tanpa Ibu",
                        {{$tanpa_ibu_persen}}
                    ],
                    [
                        "Tanpa Ayah Dan Ibu",
                        {{$tanpa_ayah_ibu_persen}}
                    ]
                ]
            }
        ]
    }
});

// Build the chart
Highcharts.chart('sk', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        backgroundColor: {
            linearGradient: [0, 0, 500, 500],
            stops: [
                [0, 'rgb(255, 255, 255)'],
                [1, 'rgb(200, 200, 255)']
            ]
        },
        type: 'pie'
    },
    title: {
        text: 'Status Surat Keterangan Tidak Mampu'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            showInLegend : true,
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                connectorColor: 'silver'
            }
        }
    },
    series: [{
        name: 'SK Tidak Mampu',
        data: [
            { name: 'Ada', y: {{$ada_sk_persen}} },
            { name: 'Tidak Ada', y: {{$tdk_ada_sk_persen}} }
        ]
    }
    ]
});

    </script>
        
@endsection