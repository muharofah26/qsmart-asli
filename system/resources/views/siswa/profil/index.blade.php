@extends('template.base')
@section('content')

<div class="card mb-3">
	<div class="card-body alert-success">
		<div class="row">
			<div class="col-md-6">
				<div class="d-flex align-items-center">
					<img src="{{asset('system/public')}}/{{$siswa->siswa_foto}}" width="80px" alt="">
					<table class="table table-sm ml-3">
						<tr>
							<th width="100px">Nama</th>
							<td>: {{ucwords($siswa->siswa_nama)}}</td>
						</tr>   
						<tr>
							<th width="100px">Kode Nama</th>
							<td>: {{ucwords($siswa->siswa_kode)}}</td>
						</tr>
						<tr>
							<th width="100px">Kelas</th>
							<td>: {{ucwords($siswa->siswa_kelas)}}</td>
						</tr>
						<tr>
							<th width="100px">Jenis Kelamin</th>
							<td>: {{ucwords($siswa->siswa_jenis_kelamin)}}</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="card border-0">
	<div class="card-body ">
        <a href="{{url('x/profil',$siswa->siswa_id)}}/edit" class="btn btn-dark"><i class="fa fa-pencil" style="font-size: 10pt;"></i> Edit</a>
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
            <form action="{{url('x/profil/ganti-password')}}" method="post">
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

<div class="table-responsive">
   <table class="table table-borderless table-striped table-hover mt-3">
    <tr>
        <th width="200px">Kode Siswa</th>
        <td>: {{ucwords($siswa->siswa_kode)}}</td>
    </tr>

    <tr>
        <th>Nama Siswa</th>
        <td>: {{ucwords($siswa->siswa_nama)}}</td>
    </tr>

    <tr>
        <th>Jenis Kelamin</th>
        <td>: {{ucwords($siswa->siswa_jenis_kelamin)}}</td>
    </tr>

    <tr>
        <th>Alamat Lengkap</th>
        <td>: {{ucwords($siswa->siswa_alamat)}}</td>
    </tr>

    <tr>
        <th>Kelas</th>
        <td>: <span class="badge badge-success">Kelas {{ucwords($siswa->siswa_kelas)}}</span>   </td>
    </tr>

    <tr>
        <th>Asal Sekolah</th>
        <td>: {{ucwords($siswa->siswa_asal_sekolah)}}  </td>
    </tr>

    <tr>
        <th>Jurusan</th>
        <td>: {{ucwords($siswa->siswa_jurusan)}}  </td>
    </tr>

    <tr>
        <th>Tempat Tanggal Lahir</th>
        <td>: {{ucwords($siswa->siswa_tempat_lahir)}}, {{ucwords($siswa->siswa_tanggal_lahir)}}</td>
    </tr>

    <tr>
        <th>Kelas</th>
        <td>: {{ucwords($siswa->siswa_nama)}}</td>
    </tr>

    <tr>
        <th>No Telp.</th>
        <td>: {{ucwords($siswa->siswa_notlp)}}</td>
    </tr>

    <tr>
        <th>Email</th>
        <td>: {{ucwords($siswa->email)}}</td>
    </tr>

    <tr>
        <td colspan="2"><b>Data Orang Tua/Wali</b></td>
    </tr>
    <tr>
        <th>Nama Ayah</th>
        <td>: {{ucwords($siswa->siswa_ayah)}}</td>
    </tr>

    <tr>
        <th>Nama Ibu</th>
        <td>: {{ucwords($siswa->siswa_ibu)}}</td>
    </tr>

    <tr>
        <th>Alamat Orang Tua/Wali</th>
        <td>: {{ucwords($siswa->siswa_alamat_ortu)}}</td>
    </tr>

</table> 
</div>

</div>
</div>
@endsection