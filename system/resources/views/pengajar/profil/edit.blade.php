@extends('template.base')
@section('content')

<div class="card">
	<div class="card-body bg-smart text-white">
		<center>
			<h3>FORM EDIT DATA PENGAJAR</h3>
		</center>
	</div>
</div>

<div class="card mt-3">
	<div class="card-body">
		<form action="{{url('p/profil',$detail->pengajar_id)}}/edit" method="post" enctype="multipart/form-data">
			@csrf
			@method("PUT")
			<div class="row">
				<div class="col-md-6 mt-3">
					<span>Nama Pengajar</span>
					<input type="text" name="pengajar_nama" value="{{ucwords($detail->pengajar_nama)}}" class="form-control">
				</div>

				<div class="col-md-6 mt-3">
					<span>E-Mail Pengajar</span>
					<input type="email" name="pengajar_email" value="{{ucwords($detail->email)}}" class="form-control">
				</div>

				<div class="col-md-6 mt-3">
					<span>Alamat Pengajar</span>
					<input type="text" name="pengajar_alamat" value="{{ucwords($detail->pengajar_alamat)}}" required class="form-control">
				</div>

				<div class="col-md-6 mt-3">
					<span>No WA Pengajar</span>
					<input type="number" name="pengajar_notlp" value="{{ucwords($detail->pengajar_notlp)}}" required class="form-control">
				</div>

				<div class="col-md-6 mt-3">
					<span>Pendidikan Terakhir</span>
					<input type="text" name="pengajar_pendidikan_akhir" value="{{ucwords($detail->pengajar_pendidikan_akhir)}}" class="form-control">
				</div>

				<div class="col-md-6 mt-3">
					<span>Sekolah/Kampus Terakhir</span>
					<input type="text" name="pengajar_kampus" value="{{ucwords($detail->pengajar_kampus)}}" class="form-control">
				</div>

				<div class="col-md-6 mt-3">
					<span>Tanggal Lahir</span>
					<input type="date" required class="form-control" value="{{ucwords($detail->pengajar_tanggal_lahir)}}" name="pengajar_tanggal_lahir">
				</div>

				<div class="col-md-6 mt-3">
					<span>Foto Pengajar</span>
					<input type="file" accept="image/*" class="form-control" name="pengajar_foto">
				</div>


				<div class="col-md-12">
					<button class="btn btn-danger mt-3 btn-lg float-right">Update Data Pengajar</button>
				</div>

			</div>
		</form>
	</div>
</div>

@endsection