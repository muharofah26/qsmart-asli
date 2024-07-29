@extends('template.base')
@section('content')


<div class="card">
    <div class="card-body">
        <center>
            <h3>Data Pembayaran</h3>
        </center>
    </div>
</div>

<div class="card mt-3">
    <div class="card-body">
        <!-- Button trigger modal -->
        <button type="button" class="btn bg-utama mb-3 float-right" data-toggle="modal" data-target="#exampleModal">
            <i class="mdi mdi-plus-box"></i> Data Pembayaran
        </button>
  
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Metode Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                <form action="{{url('admin/metode-pembayaran')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <span>Nama Pembayaran</span>
                    <input type="text" name="pembayaran_nama" class="form-control">
                </div>

                <div class="form-group">
                    <span>Nomor Pembayaran</span>
                    <input type="text" name="pembayaran_nomor" class="form-control">
                </div>

                <div class="form-group">
                    <span>Nama Penerima Pembayaran</span>
                    <input type="text" name="pembayaran_penerima" class="form-control">
                </div>

                <div class="form-group">
                    <span>Icon Pembayaran</span>
                    <input type="file" accept="image/*" name="pembayaran_icon" class="form-control">
                </div>
                <button class="btn btn-block bg-utama">Simpan</button>
                </form>
                </div>
            </div>
            </div>
        </div>

        <div class="mt-3">
            <table class="table table-hover mt-3 table-striped">
                <thead>
                    <tr class="bg-utama text-white mt-3">
                        <th>Aksi</th>
                        <th>No</th>
                        <th>Ikon</th>
                        <th>Nama Pembayaran</th>
                        <th>No Pembayaran</th>
                        <th>Nama Penerima</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($list_pembayaran as $item)
                        <tr>
                            <td>
                                <a href="{{url('admin/metode-pembayaran',$item->pembayaran_id)}}/delete" onclick="return confirm('Yakin menghapus metode pembayaran?')" class="btn border-0 btn-danger">Hapus</a>
                            </td>
                            <td>{{$loop->iteration}}</td>
                            <td>
                                <img src="{{asset('system/public')}}/{{$item->pembayaran_icon}}" width="100%" alt="">
                            </td>
                            <td>{{$item->pembayaran_nama}}</td>
                            <td>{{$item->pembayaran_nomor}}</td>
                            <td>{{$item->pembayaran_penerima}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

  
    </div>
</div>

@endsection