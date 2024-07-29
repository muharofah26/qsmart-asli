@extends('template.base')
@section('content')

<div class="card">
	<div class="card-body">
		<h3>Buat Berita & Informasi</h3>
	</div>
</div>

<div class="card mt-3">
	<div class="card-body">
		
		<form action="{{url('admin/website/berita',$detail->berita_id)}}/edit" method="POST" enctype="multipart/form-data">
			@csrf
			@method("PUT")
			<div class="row">
				<div class="col-md-12">
					<span>Judul Berita</span>
					<input type="text" required name="judul" value="{{$detail->judul}}" class="form-control">
				</div>
				<div class="col-md-6 mt-3">
					<span>Kategori</span>
					<select name="kategori" id="" class="form-control">
						<option  value="berita" @if($detail->kategori == "Berita") selected @endif> Berita</option>
						<option value="informasi" @if($detail->kategori == "Informasi") selected @endif> Informasi</option>
					</select>
				</div>

				<div class="col-md-6 mt-3">
					<span>Cover Berita</span>
					<input type="file" required accept="image/*" name="foto" class="form-control">
				</div>

				<div class="col-md-12 mt-3">
					<span>Isi Berita/Informasi</span>
					<textarea name="isi" id="" class="form-control">value="{!! $detail->isi !!}"</textarea>
				</div>

				<button class="btn btn-block btn-primary mt-3">Post Berita</button>
			</div>
		</form>
	</div>
</div>
@endsection