@extends('template.base')
@section('content')
<form action="{{url('x/tugas',$detail->soal_master_id)}}/jawab" method="post">
    @csrf
   <input type="hidden" name="soal_master_id" value="{{$detail->soal_master_id}}">
   <input type="hidden" name="kelas" value="{{$detail->soal_kelas_nomor}}">
   <input type="hidden" name="mapel_id" value="{{$detail->soal_mapel_id}}">
   <input type="hidden" name="pengajar_id" value="{{$detail->soal_pengajar_id}}">
    @foreach($list_pertanyaan as $item)
    <div class="card mb-3">
        <div class="card-body">
            {{$loop->iteration}}. {{$item->soal_pertanyaan}}
            <input type="hidden" value="{{$item->soal_id}}" name="jawaban_soal_id[]">
            <input type="hidden" value="{{$item->soal_mapel_id}}" name="jawaban_mapel_id[]">
            <input type="hidden" value="{{$item->soal_pengajar_id}}" name="jawaban_pengajar_id[]">
            <input type="hidden" value="{{$item->soal_kelas_nomor}}" name="jawaban_kelas_nomor[]">
            <input type="hidden" value="{{$detail->soal_master_id}}" name="jawaban_soal_master_id[]">
            <textarea name="jawaban[]" class="form-control mt-2" required id="" placeholder="Jawab disini" cols="30" rows="3"></textarea  >
        </div>
    </div>
    @endforeach

    <div class="card">
        <div class="card-body">
            <button class="btn alert-success btn-block">Kirim Jawaban</button>
        </div>
    </div>
</form>

@endsection