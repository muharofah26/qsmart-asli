@extends('template.base')
@section('content')

<div class="card">
	<div class="card-body">
		<h3>Profil Akun</h3>
	</div>
</div>

<div class="card mt-3">
	<div class="card-body">
		<div class="row">
			<div class="col-md-4">
				<center>
					<img src="{{asset('system/public')}}/{{$author->pengajar_foto}}" width="200px" alt="">
				</center>
				
			</div>

			<div class="col-md-6">
				<a href="{{url('p/profil',$author->pengajar_id)}}/edit" class="btn btn-dark"><i class="fa fa-pencil" style="font-size: 10pt;"></i> Edit</a>
				
				<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal">
					<i class="fa fa-key"></i> Ganti Pasword
				</button>


				<!-- Modal -->
				<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Ganti Passsword</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form action="{{url('p/profil/ganti-password')}}" method="post">
									@csrf
									<div class="form-group">
										<span>Password Baru</span>
										<input type="password" name="new" minlength="3" class="form-control">
									</div>

									<div class="form-group">
										<span>Konfirmasi Password Baru</span>
										<input type="password" name="confirm" minlength="3" class="form-control">
									</div>

									<button class="btn btn-danger">Ganti Password</button>
								</form>
							</div>
						</div>
					</div>
				</div>


				<table class="table table-borderless">
					<tr>
						<th>Nama</th>
						<td>: {{ucwords($author->pengajar_nama)}}</td>
					</tr>

					<tr>
						<th>Email</th>
						<td>: {{ucwords($author->email)}}</td>
					</tr>

					<tr>
						<th>Pendidikan Terakhir</th>
						<td>: {{ucwords($author->pengajar_pendidikan_akhir)}}</td>
					</tr>

					<tr>
						<th>Tanggal Lahir</th>
						<td>: {{ucwords($author->pengajar_tanggal_lahir)}}</td>
					</tr>

					<tr>
						<th>Alamat</th>
						<td>: {{ucwords($author->pengajar_alamat)}}</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>

@endsection