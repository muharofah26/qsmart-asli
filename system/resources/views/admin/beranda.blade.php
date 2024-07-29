@extends('template.base')
@section('content')

<div class="mt-3">
  <div class="row">
  <div class="col-md-12 mb-3">
       <div class="row">
            <div class="col-md-4">
                <div class="card bg-warning text-white border-warning">
                    <div class="card-body">
                        <center>
                            <h1>{{ $totalSiswa }}</h1>
                            <b>Total Siswa</b>
                        </center>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-warning text-white border-warning">
                    <div class="card-body">
                        <center>
                            <h1>{{ $totalPengajar }}</h1>
                            <b>Total Pengajar</b>
                        </center>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-warning text-white border-warning">
                    <div class="card-body">
                        <center>
                            <h1>{{$totalMateri}}</h1>
                            <b>Total Materi</b>
                        </center>
                    </div>
                </div>
            </div>
        </div>
  </div>

    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <b>Data siswa baru daftar</b>
          <table class="table">
            <thead>
              <tr class="bg-utama">
                <th>No</th>
                <th>Foto</th>
                <th>Nama Siswa</th>
                <th>Jenis Kelamin</th>
                <th>Kelas</th>
                <th>Aksi</th>
              </tr>

              @foreach($list_siswa as $item)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td><img src="{{asset('system/public')}}/{{$item->siswa_foto}}" width="100px"></td>
                <td>{{ucwords($item->siswa_nama)}}</td>
                <td>{{ucwords($item->siswa_jenis_kelamin)}}</td>
                <td>Kelas : {{$item->siswa_kelas}}</td>
                <td>
                  <a href="{{url('admin/master-data/siswa',$item->siswa_id)}}/detail" class="btn btn-dark btn-sm"><i class="mdi mdi-eye"></i></a>
                  <a href="{{url('admin/siswa',$item->siswa_id)}}/terima" class="btn btn-success btn-sm"><i class="mdi mdi-account-check"></i> Terima</a>
                  <a href="{{url('admin/siswa',$item->siswa_id)}}/tolak" class="btn btn-danger btn-sm"><i class="mdi mdi-close"></i> Tolak</a>
                </td>
              </tr>
              @endforeach
            </thead>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection