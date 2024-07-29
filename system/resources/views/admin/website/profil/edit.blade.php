@extends('template.base')
@section('content')

<div class="card">
	<div class="card-body">
		<form action="{{url('admin/website/profil-website',$detail->website_id)}}/edit" method="POST" enctype="multipart/form-data">
			@csrf
			@method("PUT")
			<div class="form-group mt-3">
				<span>Tentang</span>
				<textarea style="height:300px" name="tentang" height="300px" placeholder="Tentang qsmart" id="" class="form-control">{{$detail->tentang}}</textarea>
			</div>

			<div class="form-group mt-3">
				<span>Gambar</span>
				<input type="file" accept="image/*" required name="gambar_utama" class="form-control">
			</div>

			<div class="form-group mt-3">
				<span>Maps</span>
				<textarea style="height:300px" name="maps" height="300px" placeholder="Tentang qsmart" id="" class="form-control">{{$detail->maps}}</textarea>
			</div>

			<div class="form-group mt-3">
				<span>Alamat</span>
				<input type="text" required name="alamat" value="{{$detail->alamat}}" class="form-control">
			</div>

			<div class="form-group mt-3">
				<span>No Wa</span>
				<input type="text" required name="kontak" value="{{$detail->kontak}}" class="form-control">
			</div>

			<div class="form-group mt-3">
				<span>Email</span>
				<input type="text" required name="email" value="{{$detail->email}}" class="form-control">
			</div>

			<button class="btn btn-primary mt-3">Update</button>
		</form>
	</div>
</div>


@endsection