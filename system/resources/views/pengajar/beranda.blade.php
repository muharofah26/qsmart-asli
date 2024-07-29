@extends('template.base')
@section('content')

<div class="row">

  <div class="col-xl-12">
    <div class="card">
      <div class="card-body alert-success">
        <center>
          <img src="{{asset('system/public')}}/{{Auth::guard('pengajar')->user()->pengajar_foto}}" width="30%" alt="">
          <h3>Selamat datang {{ucwords(Auth::guard('pengajar')->user()->pengajar_nama)}}</h3>
          <p>Silahkan periksa jadwal kelas anda hari ini, pastikan semua berjalan dengan baik</p>
        </center>
      </div>
    </div>
  </div>
</div>
@endsection