@extends('layout.masteradmin')

@section('judul', 'Halaman Data Kriteria')

@section('konten')
    <div class="col-xs-12">
        <h3 class="header smaller lighter blue">Data Kriteria</h3>

        <div class="clearfix">
            <div class="pull-right tableTools-container"></div>
        </div>
        <div class="col">
            <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#tb-data-modal"><i class="fa fa-plus"> Tambah Data</a></i>
        </div>
        <br>

        <!-- Modal TAMBAH DATA -->
<div class="modal fade" id="tb-data-modal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel">Tambah Kriteria Baru</h4>
        </div>
        <div class="modal-body">
             <form action="/admin/tambah_datakriteria" method="POST">
                @csrf
                <h5>Kriteria</h5>
                <textarea class="form-control" name="kriteria" id="form-field-8" placeholder="Silahkan Di isi.."></textarea>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-success"><i class="fa fa-save"> Simpan!</button></i>
        </div>
      </div>
    </form>
    </div>
  </div>
        <div>
            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="center">No.</th>
                        <th class="center">Kriteria</th>
                        <th class="center">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($datakriteria as $item)
                  <tr>
                    <td class="center"><h5>{{$loop->iteration}}</h5></td>
                    <td class="center"><h5>{{$item->kriteria}}</td></h5>
                    <td class="center">
                      <a href="/admin/edit_kriteria/{{$item->id}}" class="btn btn-info btn-sm"><i class="fa fa-pencil"> Edit</i></a>
                    <a href="/admin/hapus_datakriteria/{{$item->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"> Hapus</i></a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>

       

@endsection