@extends('template.base')
@section('content')

@if(Auth::guard('siswa')->user()->siswa_status_bayar == 1 AND Auth::guard('siswa')->user()->siswa_status_aktif == 1)
<div class="container">
    <div class="card">
        <div class="card-body alert-success">
            <center>
                <h3>Upload bukti pembayaran telah berhasil !!!</h3>
                <p>Sekarang dalam proses pengecekan, silahkan tunggu pesan dari kami selajutnya, pastikan nomor yang tercantum menggunakan Whatsapp. <br>
                  Salah nomor? <a href="{{url('x/profil')}}">klik disini</a>
              </p>
              <h4>Terima Kasih ...</h4>
          </center>
      </div>
  </div>
</div>

@elseif(Auth::guard('siswa')->user()->siswa_status_bayar == 1 AND Auth::guard('siswa')->user()->siswa_status_aktif == 2)

<div class="row mb-3">
    <div class="col-md-4 mb-3 col-6">
        <div class="card bg-warning text-white border-warning">
            <div class="card-body">
                <center>
                    <h1>{{ $alfa ?? 0 }}</h1>
                    <b>Total Alfa</b>
                </center>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-3 col-6">
        <div class="card bg-warning text-white border-warning">
            <div class="card-body">
                <center>
                    <h1>{{ $izin ?? 0}}</h1>
                    <b>Total Izin</b>
                </center>
            </div>
        </div>
    </div>

       <div class="col-md-4 mb-3 col-12">
        <div class="card bg-warning text-white border-warning">
            <div class="card-body">
                <center>
                    <h1>{{ $hadir ?? 0}}</h1>
                    <b>Total Pertemuan</b>
                </center>
            </div>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-md-12">
   <div class="card mb-3">
    <div class="card-body alert-success">
        <div class="row">
            <div class="col-md-6">
                <div class="d-flex align-items-center">
                    <img src="{{asset('system/public')}}/{{Auth::guard('siswa')->user()->siswa_foto}}" width="80px" alt="">
                    <table class="table table-sm ml-3">
                        <tr>
                            <th width="100px">Nama</th>
                            <td>: {{ucwords(Auth::guard('siswa')->user()->siswa_nama)}}</td>
                        </tr>   
                        <tr>
                            <th width="100px">Kode Nama</th>
                            <td>: {{ucwords(Auth::guard('siswa')->user()->siswa_kode)}}</td>
                        </tr>
                        <tr>
                            <th width="100px">Kelas</th>
                            <td>: {{ucwords(Auth::guard('siswa')->user()->siswa_kelas)}}</td>
                        </tr>
                        <tr>
                            <th width="100px">Jenis Kelamin</th>
                            <td>: {{ucwords(Auth::guard('siswa')->user()->siswa_jenis_kelamin)}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
</div>


@else
<div class="card-body alert-danger">
    <center>
        <h3>Anda belum melakukan proses pembayaran</h3>
        <p>Silahkankan lakukan pembayaran terlebih dahulu untuk membuka akses lainnya</p>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
            Upload bukti pembayaran
        </button>
    </center>
</div>
</div>
@endif



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Bukti Pembayaran</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="{{url('x/upload-bukti-pendaftaran',Auth::guard('siswa')->user()->siswa_id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <span>Bukti Pembayaran (Screnshoot/Pdf file)</span>
            <input type="file" name="bukti_bayar_pendaftaran" accept="image/*,.pdf" class="form-control">
            <button class="btn btn-success float-right mt-3">Uplaod Bukti</button>
        </form>
    </div>
</div>
</div>
</div>
@endsection