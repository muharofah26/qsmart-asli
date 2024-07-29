@extends('landing.section.base')
@section('content')
	<div class="row mt-3">
			@foreach($list_galeri->sortByDesc('created_at') as $item)
			<div class="col-md-4">
				<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
					<div class="carousel-inner">
						<div class="carousel-item active">
							<img class="d-block w-100" src="{{asset('system/public')}}/{{$item->foto}}" alt="First slide">
							<div class="carousel-caption d-none d-md-block">
								<b>{{ucwords($item->judul)}}</b>
							</div>
						</div>
					</div>
				</div>
			</div>
			@endforeach
		</div>


@endsection