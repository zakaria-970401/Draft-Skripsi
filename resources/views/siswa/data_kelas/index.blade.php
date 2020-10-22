@extends('layout/mastersiswa')

@section('judul', 'Halaman Data Kelas')

@section('konten')
<div class="breadcrumbs ace-save-state" id="breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="/siswa">Home</a>
        </li>
        <li>
            <i class="ace-icon fa fa-university home-icon"></i>
            <a href="#">Data Kelas</a>
        </li>
    </ul><!-- /.breadcrumb -->
</div>
<div class="page-content">
    <div class="row">
        <div class="col-xs-12">
            <h4 class="header blue bolder ">DATA KELAS SMK KARYA GUNA JAYA</h4>
            <table id="myTable" class="display">
                    <thead>
                        <tr>
                            <th class="text-center">No.</th>
                            <th class="text-center">Kelas</th>
                            <th class="text-center">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data_kelas as $data)    
                        <tr>
                            <td class="text-center">{{$loop->iteration}}</td>
                            <td class="text-center">{{$data->kelas}}</td>
                            <td class="text-center">
                                <a href="/siswa/detail_kelas/{{$data->id}}" class="btn btn-info btn-sm">
                                    <i class="fa fa-eye"> Detail</i></a>
                                
                                </td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>  
        </div>
    </div>
    
@endsection