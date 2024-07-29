@extends('landing.section.base')
@section('content')
<div class="card mt-3">
	<div class="card-body">
		<div class="row">
			<div class="col-md-4">
				<img src="{{asset('system/public')}}/{{$detail->foto}}" width="100%" alt="">
			</div>

			<div class="col-md-8">
				<h3>{{ucwords($detail->judul)}}</h3>
				<b>Kategori : {{$detail->kategori}}</b>
				<p class="mt-3">{!!$detail->isi!!}</p>
			</div>
		</div>
	</div>
</div>
	@endsection