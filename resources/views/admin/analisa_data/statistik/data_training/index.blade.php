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
            <i class="ace-icon fa fa-bar-chart home-icon"></i>
            <a href="#">Data Statistik Training/Latih</a>
        </li>
    </ul><!-- /.breadcrumb -->
</div>


   <div class="page-content">
        <div class="row">
        <div class="col-xs-12">
            <div id="container"></div>
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
        text: 'Statistik Data Training/Data Latih'
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
            text: 'Total Persentase'
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
            colorByPoint: true,
            data: [
                {
                    name: "Ortu/Wali Lengkap",
                    y: {{$ortu_lengkap_persen}},
                },
                {
                    name: "Ortu/Wali Tidak Lengkap",
                    y: {{$ortu_tdklengkap_persen}},
                    drilldown: "Ortu/Wali Tidak Lengkap"
                },
                {
                    name: "Karyawan Swasta",
                    y: {{$karyawanswasta_persen}}
                },
                {
                    name: "Pegawai Negeri",
                    y: {{$pegawainegeri_persen}},
                },
                {
                    name: "Usaha",
                    y: {{$usaha_persen}},
                },
                {
                    name: "Pekerja Tidak Tetap",
                    y: {{$pekerja_tdk_tetap_persen}},
                },
                {
                    name: "Rumah Sendiri",
                    y: {{$rumahsendiri_persen}},
                },
                {
                    name: "Rumah Sewa",
                    y: {{$rumahsewa_persen}},
                },
                {
                    name: "Kontrakan",
                    y: {{$kontrakan_persen}},
                },
                {
                    name: "Tinggal Dengan Saudara",
                    y: {{$rumahsaudara_persen}},
                },
                {
                    name: "Punya SK",
                    y: {{$ada_sk_persen}},
                },
                {
                    name: "Tidak Punya SK",
                    y: {{$tdk_ada_sk_persen}},
                }
            ]
        }
    ],
    drilldown: {
        series: [
            {
                name: "Ortu/Wali Tidak Lengkap",
                id: "Ortu/Wali Tidak Lengkap",
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

    </script>
        
@endsection