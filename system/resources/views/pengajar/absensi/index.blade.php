@extends('template.base')
@section('content')
<div class="card">
	<div class="card-body">
		<h3>Data Absensi <br> Siswa Bimbingan Anda</h3>
	</div>
</div>

<div class="card mt-3">
	<div class="card-body">
		<table class="table table-bordered">
			<tr class="alert-success">
				<th width="50px">No</th>
				<th width="200px" class="text-center">Aksi</th>
				<th>Nama Pelajaran</th>
				<th>Kelas</th>
			</tr>

			@foreach($list_materi as $item)
			<tr>
				<td>{{$loop->iteration}}</td>
				<td class="text-center">
					<a href="{{url('p/absensi',$item->kelas_materi_id)}}/absensi" class="btn btn-sm alert-dark"><i class="fa fa-eye"></i> Lihat Absensi</a>
				</td>
				<td>{{strtoupper($item->materi_nama)}}</td>
				<td>{{strtoupper($item->kelas_nomor)}}</td>
			</tr>
			@endforeach
		</table>
	</div>
</div>
@endsection