@extends('template.base')
@section('content')

<div class="card">
    <div class="card-body bg-smart text-white">
        <center>
            <h3>FORM PENDAFTARAN PENGAJAR</h3>
        </center>
    </div>
</div>

<div class="card mt-3">
    <div class="card-body">
        <form action="{{url('admin/master-data/pengajar/create')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">

            <div class="col-md-6 mt-3">
                <span>Nama Pengajar</span>
                <input type="text" name="pengajar_nama" required class="form-control">
            </div>

            <div class="col-md-6 mt-3">
                <span>E-Mail Pengajar</span>
                <input type="email" name="pengajar_email" required class="form-control">
            </div>

            <div class="col-md-6 mt-3">
                <span>Alamat Pengajar</span>
                <input type="text" name="pengajar_alamat" required class="form-control">
            </div>

            <div class="col-md-6 mt-3">
                <span>No WA Pengajar</span>
                <input type="number" name="pengajar_notllp" required class="form-control">
            </div>

            <div class="col-md-6 mt-3">
                <span>Pendidikan Terakhir</span>
                <input type="text" name="pengajar_pendidikan_akhir" required class="form-control">
            </div>

            <div class="col-md-6 mt-3">
                <span>Sekolah/Kampus Terakhir</span>
                <input type="text" name="pengajar_kampus" required class="form-control">
            </div>

            <div class="col-md-6 mt-3">
                <span>Tanggal Lahir</span>
                <input type="date" required class="form-control" name="pengajar_tanggal_lahir">
            </div>

            <div class="col-md-6 mt-3">
                <span>Foto Pengajar</span>
                <input type="file" accept="image/*" required class="form-control" name="pengajar_foto">
            </div>


            <div class="col-md-12">
                <button class="btn btn-danger mt-3 btn-lg float-right">Tambah Data Pengajar</button>
            </div>

        </div>
        </form>
    </div>
</div>
@endsection