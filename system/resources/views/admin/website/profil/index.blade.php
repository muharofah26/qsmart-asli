@extends('template.base')
@section('content')

@if($count > 0)
<div class="card">
	<div class="card-body">
		<h3>Profil Website Qsmart</h3>
		<a href="{{url('admin/website/profil-website',$website->website_id)}}/edit" class="btn alert-dark"><i class="fa fa-pencil"></i> Update Profil Website</a>
	</div>
</div>

<div class="card mt-3">
	<div class="card-body">
		<div class="row">
		<div class="col-md-5">
			{!!nl2br($website->maps)!!}

			<b class="mt-3">Kontak</b>
			<div class="table-responsive">
				<table class="table">
				<tr>
					<th>Alamat</th>
					<td>: {{$website->alamat}}</td>
				</tr>

				<tr>
					<th>Email</th>
					<td>: {{$website->email}}</td>
				</tr>

				<tr>
					<th>No Telp</th>
					<td>: {{$website->kontak}}</td>
				</tr>
			</table>
			</div>
		</div>
		<div class="col-md-7">
			<img src="{{asset('system/public')}}/{{$website->gambar_utama}}" width="100%" alt="">

			<h4 class="mt-3">Tentang</h4>
			{!!$website->tentang!!}
		</div>
	</div>
	</div>
</div>
@else
<div class="card">
	<div class="card-body alert-danger">
		<center>
			<h3>Silahkan lengkapi profil website terlebih dahulu</h3>
			<a href="" class="btn btn-danger">Lengkapi Profil</a>
		</center>
	</div>
</div>
@endif

@endsection