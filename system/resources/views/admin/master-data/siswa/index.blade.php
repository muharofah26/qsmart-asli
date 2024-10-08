@extends('template.base')
@section('content')
<div class="row">

    <div class="col-md-4 col-12 mb-3">
        <div class="card border-0 shadow bg-warning text-white">
            <div class="card-body">
                <h3>Jumlah Siswa <br> {{$jumlahSiswa}}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-4 col-12 mb-3">
        <div class="card border-0 shadow bg-warning text-white">
            <div class="card-body">
                <h3>Jumlah Laki-laki <br> {{$lakiLaki}}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-4 col-12 mb-3">
        <div class="card border-0 shadow bg-warning text-white">
            <div class="card-body">
                <h3>Jumlah Perempuan<br> {{$perempuan}}</h3>
            </div>
        </div>
    </div>

</div>

<div class="card mt-3">
    <div class="card-body table-responsive">
        <center>
            <h3>Data pelajar Qsmart</h3>
        </center>

        <table class="table table-hover table-striped table-bordered">
            <thead>
                <tr class="bg-warning text-white text-center">
                    <th>No</th>
                    <th>Aksi</th>
                    <th>Kode Siswa</th>
                    <th>Nama Siswa</th>
                    <th>Paket Kelas</th>
                    <th>Kelas</th>
                </tr>
            </thead>
        <tbody>
            @foreach($list_siswa as $item)
            <tr>
                <td class="text-center">{{$loop->iteration}}</td>
                <td width="200px">
                    <div class="btn-group">
                        <a href="{{url('admin/master-data/siswa',$item->siswa_id)}}/delete" onclick="return confirm('Yakin menghapus data ini?')" class="btn btn-sm btn-danger"><i class="mdi mdi-delete"></i></a>
                        <a href="{{url('admin/master-data/siswa',$item->siswa_id)}}/edit" class="btn btn-sm btn-success"><i class="mdi mdi-eyedropper"></i></a>
                        <a href="{{url('admin/master-data/siswa',$item->siswa_id)}}/detail" class="btn btn-sm btn-dark"><i class="mdi mdi-eye"></i></a>
                    </div>
                </td>
                <td>{{ucwords($item->siswa_kode)}}</td>
                <td>{{ucwords($item->siswa_nama)}}</td>
                <td>{{strtoupper($item->paket->paketNama->paket_nama ?? $item->siswa_paket_les_id)}}</td>
                <td class="text-center">{{$item->siswa_kelas}}</td>
            </tr>
            @endforeach
        </tbody>

            <tfoot>
                <tr class="bg-warning text-white text-center">
                    <th>No</th>
                    <th>Aksi</th>
                    <th>Kode Siswa</th>
                    <th>Nama Siswa</th>
                    <th>Paket Kelas</th>
                    <th>Kelas</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection