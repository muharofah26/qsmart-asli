@extends('template.base')
@section('content')

@foreach($list_soal as $item)
<div class="card mb-3">
    <div class="card-body">
        {{$loop->iteration}}. {{$item->soal_pertanyaan}}
    </div>
</div>
@endforeach

@endsection