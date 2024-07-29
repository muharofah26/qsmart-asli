@extends('template.base')
@section('content')

<div class="container">
    <div class="card">
        @if(Auth::guard('siswa')->user()->siswa_status_bayar == 1 AND Auth::guard('siswa')->user()->siswa_status_aktif == 1)
        <div class="card-body alert-success">
            <center>
                <h3>Upload bukti pembayaran telah berhasil !!!</h3>
                <p>Sekarang dalam proses pengecekan, silahkan tunggu pesan dari kami selajutnya, pastikan nomor yang tercantum menggunakan Whatsapp. <br>
                  Salah nomor? <a href="{{url('x/profil')}}">klik disini</a>
                </p>
                <h4>Terima Kasih ...</h4>
            </center>
        </div>
        @elseif(Auth::guard('siswa')->user()->siswa_status_bayar == 1 AND Auth::guard('siswa')->user()->siswa_status_aktif == 2)
        <div class="card-body alert-success">
              <h3>Selamat datang, {{Auth::guard('siswa')->user()->siswa_nama}} !!!</h3>
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
                            <input type="file" name="bukti_pembayaran" accept="image/*,.pdf" class="form-control">
                            <button class="btn btn-success float-right mt-3">Uplaod Bukti</button>
                        </form>
                        </div>
                      </div>
                    </div>
                  </div>
          
        </div>
        @endif
</div>
</div>

@endsection