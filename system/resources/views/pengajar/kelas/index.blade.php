@extends('template.base')
@section('content')

<div class=" mt-3">
    <div class="row">
      @if(count($list_materi) > 0)
      @foreach($list_materi->sortBy('kelas_nomor') as $item)
      <div class="col-sm-3 stretch-card grid-margin">
        <a href="{{url('p/kelas',$item->kelas_materi_id)}}/detail" style="text-decoration: none">
        <div class="card shadow">
          <div class="card-body p-0">
            <img class=" w-100" src="{{asset('system/public')}}/{{$item->kelas_icon}}" onerror="this.src='{{url('public/assets/kelas-3.jpeg')}}';" height="300px" alt="" />
          </div>
          <div class="card-body px-3 text-dark">
           
            <h5 class="font-weight-semibold"> {{ucwords($item->materi_nama)}} <br>{{ucwords($item->kelas->kelas_nama)}}</h5>
            <div class="d-flex justify-content-between font-weight-semibold">
              <p class="mb-0">
                <i class="mdi mdi-school star-color pr-1"></i>Kelas {{$item->kelas_nomor}} </p>
            </div>
          </div>
        </div>
      </a>
      </div>
      @endforeach
  @else
  <div class="col-md-12">
      <div class="card">
        <div class="card-body alert-danger">
          <center>
            <h3>Maaf, Anda tidak memiliki kelass</h3>
            <p>Silahkan lapor ke admin jika anda seharusnya memiliki kelas!!!</p>
          </center>
        </div>
      </div>
    </div>
  @endif
    </div>
  </div>

@endsection