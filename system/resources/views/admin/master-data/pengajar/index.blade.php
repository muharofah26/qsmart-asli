@extends('template.base')
@section('content')

<div class="card ">
  <div class="card-body bg-smart text-white">
    <h3>DATA PENGAJAR Q-SMART</h3>
  </div>
</div>

<div class="card mt-3">
  <div class="card-body">
    <a href="{{url('admin/master-data/pengajar/create')}}" class="btn bg-danger mb-3 text-white"><i class="mdi mdi-account-multiple-plus"></i> Tambah Data Pengajar</a>
    <div class="row mt-3">
     <div class="col-md-12">
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr class="bg-danger text-white">
              <th>No</th>
              <th>Aksi</th>
              <th>Foto</th>
              <th>Nama Pengajar</th>
              <th>Jurusan</th>
              <th>Asal Kampus</th>
            </tr>
          </thead>
          <tbody>
            @foreach($list_pengajar as $item)
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>
                <div class="btn-group">
                <a href="{{url('admin/master-data/pengajar',$item->pengajar_id)}}/detail" class="btn btn-sm btn-dark"><i class="mdi mdi-eye"></i></a>
                <a href="{{url('admin/master-data/pengajar',$item->pengajar_id)}}/edit" class="btn btn-sm btn-warning"><i class="mdi mdi-pen"></i></a>
                <a href="{{url('admin/master-data/pengajar',$item->pengajar_id)}}/delete" onclick="return confirm('Yakin hapus data ini?')" class="btn btn-sm btn-danger"><i class="mdi mdi-delete"></i></a>
              </div>
              </td>
              <td><img src="{{asset('system/public')}}/{{$item->pengajar_foto}}" class=" rounded-top" width="100px" alt=""></td>
              <td>{{ucwords($item->pengajar_nama)}}</td>
              <td>{{ucwords($item->pengajar_pendidikan_akhir)}}</td>
              <td>{{ucwords($item->pengajar_kampus)}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
     </div>
    </div>
  </div>
</div>

 


@endsection