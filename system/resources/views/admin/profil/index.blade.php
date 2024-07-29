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
					<img src="{{asset('system/public')}}/{{$author->foto}}" width="200px" alt="">
				</center>
				
			</div>

			<div class="col-md-6">
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
								<form action="{{url('admin/profil',$author->admin_id)}}/ganti-password" method="post" enctype="multipart/form-data">
									@csrf
									@method("PUT")
									<div class="form-group">
										<span>Nama</span>
										<input type="text" name="nama" minlength="3" value="{{ucwords($author->nama)}}" class="form-control">
									</div>

									<div class="form-group">
										<span>Email</span>
										<input type="text" name="email" minlength="3" value="{{ucwords($author->email)}}" class="form-control">
									</div>

									<div class="form-group">
										<span>Foto</span>
										<input type="file" name="foto" minlength="3" accept="image/*"  class="form-control">
									</div>

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
						<td>: {{ucwords($author->nama)}}</td>
					</tr>

					<tr>
						<th>Email</th>
						<td>: {{ucwords($author->email)}}</td>
					</tr>
					<tr>
						<td colspan="2">

							<button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#exampleModal">
								<i class="fa fa-cogs"></i> Update Profil
							</button>

						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>

@endsection