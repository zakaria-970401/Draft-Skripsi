@extends('layout/masteradmin')

@section('judul', 'Halaman Data Hasil Seleksi Naive')

@section('konten')
<div class="breadcrumbs ace-save-state" id="breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="/admin">Home</a>
        </li>
        <li>
            <i class="ace-icon fa fa-gavel home-icon"></i>
            <a href="#">Hasil Keputusan</a>
        </li>
    </ul><!-- /.breadcrumb -->
</div>

<div class="page-content">
    <div class="row">
        <div class="col-xs-12">
            <br>
            <form action="/admin/simpan_to_datatraining" method="POST">
                {{ csrf_field() }}

            <a href="#modal-simpan" data-toggle="modal" class="btn btn-success"><i class="fa fa-save"> Simpan Ke Data Training</a></i>
            <a href="#modal-hapus" data-toggle="modal" class="btn btn-danger"><i class="fa fa-trash"> Hapus Semua Data Hasil Seleksi</a></i>
            <br>
            <h4 class="header blue bolder ">Master Data Hasil Seleksi Naive Baiyes</h4>
            <table id="myTable" class="display">
                    <thead>                            
                        <tr>
                            <th class="text-center">No.</th>
                            <th class="text-center">Nama Siswa</th>
                            <th class="text-center">Kelas</th>
                            <th class="text-center">Kelengkapan Ortu</th>
                            <th class="text-center">Status Rumah Wali</th>
                            <th class="text-center">Status Pekerjaan Wali</th>
                            <th class="text-center">Status SK Tidak Mampu</th>
                            <th class="text-center">Probabilitas Dapat </th>
                            <th class="text-center">Probabilitas Tidak Dapat </th>
                            <th class="text-center">Keterangan</th>
                            <th class="text-center">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                          <tr>
                            @foreach ($result as $data)
                            <td class="text-center">{{$loop->iteration}}</td>
                            
                            <input type="hidden" name="tanggal_daftar[]" value="{{$data->tgl_daftar}}">
                            <input type="hidden" name="nisn[]" value="{{$data->nisn}}">
                          
                            <td class="text-center">
                            <input type="hidden" name="nama_siswa[]" value="{{$data->nama_siswa}}">
                              {{$data->nama_siswa}}
                            </td>
                            <td class="text-center">
                                <input type="hidden" name="kelas[]" value="{{$data->kelas}}">
                                {{$data->kelas}}
                            </td>
                            <td class="text-center">
                                <input type="hidden" name="status_kelengkapan_ortu[]" value="{{$data->status_kelengkapan_ortu}}">
                                {{$data->status_kelengkapan_ortu}}
                            </td>
                            <td class="text-center">
                                <input type="hidden" name="status_rumah_ortu[]" value="{{$data->status_rumah_ortu}}">
                                {{$data->status_rumah_ortu}}
                            </td>
                            <td class="text-center">
                                <input type="hidden" name="status_pekerjaan_wali[]" value="{{$data->status_pekerjaan_wali}}">
                                {{$data->status_pekerjaan_wali}}
                            </td>
                            <td class="text-center">
                                <input type="hidden" name="status_sk_tidakmampu[]" value="{{$data->status_sk_tidakmampu}}">
                                {{$data->status_sk_tidakmampu}}
                            </td>
                            <td class="text-center">{{$data->probabilitas_dapat}}</td>
                            <td class="text-center">{{$data->probabilitas_tdkdapat}}</td>
                            <td class="text-center">
                                @if($data->probabilitas_tdkdapat < $data->probabilitas_dapat)
                                <input type="hidden" name="keterangan[]" value="Dapat">
                                <span class="label label-sm label-success">Dapat Bantuan</span>
                                @else
                                <input type="hidden" name="keterangan[]" value="Tidak Dapat">
                                <span class="label label-sm label-danger">Tidak Dapat Bantuan</span>
                                @endif
                            </td>
                            <td class="text-center">
                            <a href="/admin/show_hitung_hasil_datatraining/{{$data->id}}" class="btn btn-info btn-sm"><i class="fa fa-eye"> Detail</i></a>
                            </td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>  
        </div>
    </div>
    <div class="modal fade" id="modal-simpan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success">
                    <h3>
                        Konfirmasi Simpan Ke Data Traning?
                    </h3>
              
            </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Nanti Dulu,</button>
                        <button type="submit" class="btn btn-success"><i class="fa fa-check">  Ya, Simpan</button></i>
                    </form>
                    </div>
                </div>
        </div>
    </div>


    <div class="modal fade" id="modal-hapus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                    <h3>
                        Konfirmasi Hapus Semua Data?
                    </h3>
              
            </div>
                    <div class="modal-footer bg-danger">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Nanti Dulu,</button>
                        <a href="/admin/hapus_hasil_hitungan" class="btn btn-success"><i class="fa fa-check"> Ya, Hapus</a></i>
                    </div>
                </div>
            </form>
        </div>
    </div>

    
@endsection