@extends('template.base')
@section('content')

<div class="row">
    <div class="col-md-7">
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Lihat</th>
                        </tr>
                    </thead>
                    @foreach($list_siswa as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{ucwords($item->siswa_nama)}}</td>
                        <td>
                            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample{{$item->siswa_id}}" aria-expanded="false" aria-controls="collapseExample">
                                Cek Jawaban
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-5">
        <div class="card">
            <div class="card-body">
                <center>
                    <h3>Jawaban Siswa</h3>
                </center>
            </div>
        </div>
        @foreach($list_siswa as $item)
        <div class="collapse mt-3" id="collapseExample{{$item->siswa_id}}">
          <div class="card card-body">
            Nama : {{ucwords($item->siswa_nama)}}
            @foreach(App\Models\Soal::where('soal_master_id',$detail->soal_master_id)->get() as $soal)
            <div class="mt-3">
               {{$loop->iteration}}. {{$soal->soal_pertanyaan}} <br>
               <b>Jawaban : {{App\Models\Jawaban::where('jawaban_soal_master_id',$detail->soal_master_id)->where('jawaban_soal_id',$soal->soal_id)->where('jawaban_user_id',$item->siswa_id)->first()->jawaban ?? 'Belum menjawab'}}</b>
           </div>
           @endforeach

           <form action="{{url('p/tugas',$detail->soal_master_id)}}/nilai" method="post">
            @csrf
            @php
            $nilai = App\Models\JawabanMaster::where('soal_master_id',$detail->soal_master_id)->where('siswa_id',$item->siswa_id)->first();
            @endphp


            <sub>min = 0 <br> max = 100</sub>
            <input type="hidden" name="siswa_id" value="{{$item->siswa_id}}">
               <input type="number" name="nilai" min="0" max="100" style="height: 100px; width: 130px; font-size: 24px;" class="form-control mt-2" value="{{$nilai->nilai ?? 0}}"> 
               <button class="btn btn-dark btn-lg mt-2">Nilai</button>
           </form>
       </div>
   </div>
   @endforeach
</div>
</div>


@endsection