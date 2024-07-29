@extends('landing.section.base')
@section('content')

<div class="row">

    <div class="col-md-8">
        <img src="{{asset('system/public')}}/{{$siswa->siswa_foto}}" width="100%" alt="">
        <table class="table table-borderless table-striped table-hover">
            <tr>
                <th>Kode Siswa</th>
                <td>: {{ucwords($siswa->siswa_kode)}}</td>
            </tr>

            <tr>
                <th>Nama Siswa</th>
                <td>: {{ucwords($siswa->siswa_nama)}}</td>
            </tr>

            <tr>
                <th>Jenis Kelamin</th>
                <td>: {{ucwords($siswa->siswa_jenis_kelamin)}}</td>
            </tr>

            <tr>
                <th>Alamat Lengkap</th>
                <td>: {{ucwords($siswa->siswa_alamat)}}</td>
            </tr>

            <tr>
                <th>Kelas</th>
                <td>: <span class="badge badge-success">Kelas {{ucwords($siswa->siswa_kelas)}}</span>   </td>
            </tr>

            <tr>
                <th>Asal Sekolah</th>
                <td>: {{ucwords($siswa->siswa_asal_sekolah)}}  </td>
            </tr>

            <tr>
                <th>Jurusan</th>
                <td>: {{ucwords($siswa->siswa_jurusan)}}  </td>
            </tr>

            <tr>
                <th>Tempat Tanggal Lahir</th>
                <td>: {{ucwords($siswa->siswa_tempat_lahir)}}, {{ucwords($siswa->siswa_tanggal_lahir)}}</td>
            </tr>

            <tr>
                <th>Kelas</th>
                <td>: {{ucwords($siswa->siswa_nama)}}</td>
            </tr>

            <tr>
                <th>No Telp.</th>
                <td>: {{ucwords($siswa->siswa_notlp)}}</td>
            </tr>

            <tr>
                <th>Email</th>
                <td>: {{ucwords($siswa->email)}}</td>
            </tr>

            <tr>
                <td colspan="2"><b>Data Orang Tua/Wali</b></td>
            </tr>
            <tr>
                <th>Nama Ayah</th>
                <td>: {{ucwords($siswa->siswa_ayah)}}</td>
            </tr>

            <tr>
                <th>Nama Ibu</th>
                <td>: {{ucwords($siswa->siswa_ibu)}}</td>
            </tr>

            <tr>
                <th>Alamat Orang Tua/Wali</th>
                <td>: {{ucwords($siswa->siswa_alamat_ortu)}}</td>
            </tr>

            <tr>
                <th>Unduh Raport</th>
                <td> <a href="" class="btn btn-dark"><i class="mdi mdi-download"></i> Download File Raport</a></td>
            </tr>
        </table>
    </div>

    <div class="col-md-4">
        <form action="{{url('pilih-kelas',$siswa->siswa_id)}}/lanjut-pembayaran" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            Anda akan membeli paket kelas {{$siswa->siswa_kelas}}, lihat detail Paket <br>


  <div class="form-group mt-5">
    <span>Pilih Paket Kelas</span>
    <select name="siswa_paket_les_id" id="" class="form-control" required>
        <option value="" hidden>-- Pilih Paket Kelas --</option>
        @foreach($pilih_paket as $paket)
        <option value="{{$paket->paket_detail_id}}">{{strtoupper($paket->paketNama->paket_nama)}} / Rp.{{number_format($paket->paket_biaya_daftar)}}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <span>Metode Pembayaran</span>
    <select name="siswa_metode_bayar" id="" required class="form-control">
        <option value="" hidden>-- Metode Pembayaran --</option>
        @foreach($list_pembayaran as $pembayaran)
        <option value="{{$pembayaran->pembayaran_id}}">{{ucwords($pembayaran->pembayaran_nama)}}</option>
        @endforeach
    </select>
</div>
<button class="btn btn-primary">Lanjut Pembayaran</button>
</form>
</div>
</div>
@endsection