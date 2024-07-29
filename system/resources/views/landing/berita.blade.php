@extends('landing.section.base')
@section('content')

@foreach($list_berita->sortByDesc('created_at') as $item)
<div class="col-sm-4 stretch-card grid-margin">
	<div class="card shadow">
		<a href="{{url('berita',$item->berita_id)}}/detail" style="text-decoration: none">
			<div class="card-body p-0">
				<img class=" w-100" src="{{asset('system/public')}}/{{$item->foto}}" onerror="this.src='{{url('public/assets/kelas-3.jpeg')}}';" height="300px" alt="" />
			</div>
			<div class="card-body px-3 text-dark">

				<h5 class="font-weight-semibold text-dark"> {{ucwords($item->judul)}}</h5>
				<div class="d-flex justify-content-between font-weight-semibold">
					<p class="mb-0 text-secondary">
						<i class="mdi mdi-school star-color pr-1"></i>Kat: {{$item->kategori}} </p>

					</div>
				</a>
			</div>
		</div>
	</div>
	@endforeach
	@endsection