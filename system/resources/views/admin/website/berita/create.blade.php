@extends('template.base')
@section('content')

<div class="card">
	<div class="card-body">
		<h3>Buat Berita & Informasi</h3>
	</div>
</div>

<div class="card mt-3">
	<div class="card-body">
		
		<form action="{{url('admin/website/berita/create')}}" method="POST" enctype="multipart/form-data">
			@csrf
			<div class="row">
				<div class="col-md-12">
					<span>Judul Berita</span>
					<input type="text" required name="judul" class="form-control">
				</div>
				<div class="col-md-6 mt-3">
					<span>Kategori</span>
					<select name="kategori" id="" class="form-control">
						<option value="berita">Berita</option>
						<option value="informasi">Informasi</option>
					</select>
				</div>

				<div class="col-md-6 mt-3">
					<span>Cover Berita</span>
					<input type="file" required accept="image/*" name="foto" class="form-control">
				</div>

				<div class="col-md-12 mt-3">
					<span>Isi Berita/Informasi</span>
					<textarea name="isi" id="" class="form-control"></textarea>
				</div>

				<button class="btn btn-block btn-primary mt-3">Post Berita</button>
			</div>
		</form>
	</div>
</div>
@endsection