@extends('template.base')
@section('content')
<div class="card">
	<div class="card-body">
		<h3>Galeri Kegiatan</h3>
	</div>
</div>

<div class="card mt-3">
	<div class="card-body">
		<!-- Button trigger modal -->
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
			Upload Galeri
		</button>



		<div class="row mt-3">
			@foreach($list_galeri as $item)
			<div class="col-md-4">
				<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
					<div class="carousel-inner">
						<div class="carousel-item active">
							<img class="d-block w-100" src="{{asset('system/public')}}/{{$item->foto}}" alt="First slide">
							<div class="carousel-caption d-none d-md-block">
								<h5>{{ucwords($item->judul)}}</h5>
								<a href="{{url('admin/website/galeri',$item->galeri_id)}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus foto ini?')"><i class="fa fa-trash"></i> Hapus Foto</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			@endforeach
		</div>

	</div>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Galeri Kegiatan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="" method="POST" enctype="multipart/form-data">
					@csrf
					<span>Judul foto</span>
					<input type="text" name="judul" required class="form-control mb-3">

					<span>Pilih foto</span>
					<input type="file" accept="image/*" name="foto" required class="form-control">

					<button class="btn btn-primary mt-3">Upload Galeri</button>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection