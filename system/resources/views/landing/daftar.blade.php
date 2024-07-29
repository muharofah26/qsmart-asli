@extends('landing.section.base')
@section('content')
<div class="container">
    <div class="card shadow border-0">
        <div class="card-body">
    
    <h3 class="text-primary">Data Siswa Baru</h3>
    <form action="{{url('daftar-bimbel')}}" method="POST"  enctype="multipart/form-data">
    @csrf
   
    <div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <span>Nama Siswa</span>
            <input type="text" required name="siswa_nama"  class="form-control">
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <span>Email Siswa/Orang Tua/Wali</span>
            <input type="text" required name="email" class="form-control">
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <span>Nomor Telpon Siswa/Orang Tua/Wali</span>
            <input type="number" required name="siswa_notlp" class="form-control">
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <span>Alamat Siswa</span>
            <input type="text" required name="siswa_alamat" class="form-control">
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <span>Tempat Lahir</span>
            <input type="text" required name="siswa_tempat_lahir" class="form-control">
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <span>Tanggal Lahir</span>
            <input type="date" required name="siswa_tanggal_lahir" placeholder="Tempat Lahir" class="form-control">
        </div>
    </div>

    <div class="col-md-6">
        <span>Jenis Kelamin</span>
        <select name="siswa_jenis_kelamin" id="" class="form-control" required>
            <option value="" hidden>-- Jenis Kelamin --</option>
            <option value="laki-laki">Laki-laki</option>
            <option value="perempuan">Perempuan</option>
        </select>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <span>Asal Sekolah</span>
            <input type="text" required name="siswa_asal_sekolah" class="form-control">
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <span>Jurusan di Sekolah (Opsional)</span>
            <input type="text" required name="siswa_jurusan" class="form-control">
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <span>Rangking Sekolah Siswa</span>
            <input type="number" required name="siswa_rangking" class="form-control">
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <span>Raport Sekolah Siswa</span>
            <input type="file" accept="image/*" required name="siswa_raport" class="form-control">
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <span>Kelas Yang Diambil</span>
            <select class="form-control" required name="siswa_kelas">
                <option value="" hidden>--kelas--</option>
                @foreach($list_kelas->sortBy('kelas_nomor') as $item)
                <option value="{{$item->kelas_nomor}}">Kelas {{ucwords($item->kelas_nomor)}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <span>Foto Siswa</span>
            <input type="file" accept="image/*" required name="siswa_foto" class="form-control">
        </div>
    </div>
    <br>
    <div class="col-md-12 mt-5">
        <h3  class="text-primary">Data Orang Tua</h3>
    </div>
        <div class="col-md-6">
            <div class="form-group">
                <span>Nama Ibu/Wali</span>
                <input type="text"  required name="siswa_ibu" class="form-control">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <span>Nama Ayah/Wali</span>
                <input type="text"  required name="siswa_ayah" class="form-control">
            </div>
        </div>


        <div class="col-md-6">
            <div class="form-group">
                <span>Alamat Orang Tua</span>
                <input type="text"  required name="siswa_alamat_ortu" class="form-control">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <span>Nomor Telpon Orang Tua</span>
                <input type="number"  required name="siswa_ortu_notlp" class="form-control">
            </div>
        </div>

        <div class="col-md-12">
            <button class="btn btn-block btn-primary btn-lg mb-5">Daftar Sekarang</button>
        </div>


</div>
</form>
</div>
</div>
@endsection
