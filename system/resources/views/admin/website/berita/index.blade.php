@extends('template.base')
@section('content')

<div class="card">
	<div class="card-body">
		<h3>Berita & Informasi</h3>
	</div>
</div>

<div class="card mt-3">
	<div class="card-body">
		<a href="{{url('admin/website/berita/create')}}" class="btn btn-primary">Buat Berita/Informasi</a>
	</div>
</div>



<div class=" mt-3">
	<div class="row">
		@if(count($list_berita) > 0)
		@foreach($list_berita->sortByDesc('created_at') as $item)
		<div class="col-sm-4 stretch-card grid-margin">
			<div class="card shadow">
				<a href="{{url('admin/website/berita',$item->berita_id)}}/detail" style="text-decoration: none">
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
						<div class="float-right">
							<a href="{{url('admin/website/berita',$item->berita_id)}}/delete" class="btn btn-sm btn-danger" onclick="return confirm('Yakin menghapus berita ini?')"><i class="fa fa-trash"></i></a>
							<a href="{{url('admin/website/berita',$item->berita_id)}}/edit" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
						</div>
					</div>
				</div>
			</div>
			@endforeach
			@else
			<div class="col-md-12">
				<div class="card">
					<div class="card-body alert-danger">
						<center>
							<h3>Anda belum memiliki berita/Informasi</h3>
							<p>Silahkan buat berita atau informasi terlebih dahulu !!!</p>
						</center>
					</div>
				</div>
			</div>
			@endif
		</div>
	</div>

	@endsection