@extends('template.base')
@section('content')

<div class="card">
    <div class="card-body bg-smart text-white">
        <center>
            <h3>DETAIL PENGAJAR</h3>
        </center>
    </div>
</div>

<div class="card mt-3">
    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                    <span>Foto Pengajar</span>
                    <div>
                        <img src="{{ asset('system/public/' . $pengajar->pengajar_foto) }}" alt="Foto Pengajar" class="img-thumbnail" style="max-width: 150px;">
                    </div>
            </div>
            <div class="col-md-8">
                <div class="row">

       
            <div class="col-md-6 mt-3">
                <span>Nama Pengajar</span>
                <p class="form-control-static">{{ $pengajar->pengajar_nama }}</p>
            </div>

            <div class="col-md-6 mt-3">
                <span>E-Mail Pengajar</span>
                <p class="form-control-static">{{ $pengajar->pengajar_email }}</p>
            </div>

            <div class="col-md-6 mt-3">
                <span>Alamat Pengajar</span>
                <p class="form-control-static">{{ $pengajar->pengajar_alamat }}</p>
            </div>

            <div class="col-md-6 mt-3">
                <span>No WA Pengajar</span>
                <p class="form-control-static">{{ $pengajar->pengajar_notllp }}</p>
            </div>

            <div class="col-md-6 mt-3">
                <span>Pendidikan Terakhir</span>
                <p class="form-control-static">{{ $pengajar->pengajar_pendidikan_akhir }}</p>
            </div>

            <div class="col-md-6 mt-3">
                <span>Sekolah/Kampus Terakhir</span>
                <p class="form-control-static">{{ $pengajar->pengajar_kampus }}</p>
            </div>

            <div class="col-md-6 mt-3">
                <span>Tanggal Lahir</span>
                <p class="form-control-static">{{ $pengajar->pengajar_tanggal_lahir }}</p>
            </div>

            </div>
        </div>
    </div>
    </div>
</div>
@endsection