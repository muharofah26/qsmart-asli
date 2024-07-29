@extends('template.base')
@section('content')


<div class="row">
	<div class="col-md-4">
		<div class="card">
			<div class="card-body alert-success">
				<h3>Total Siswa</h3>
				<h1>{{$totalSiswa}}</h1>
			</div>
		</div>
	</div>


	<div class="col-md-4">
		<div class="card">
			<div class="card-body alert-success">
				<h3>Total Pengajar</h3>
				<h1>{{$totalPengajar}}</h1>
			</div>
		</div>
	</div>

	<div class="col-md-4">
		<div class="card">
			<div class="card-body alert-success">
				<h3>Total Mata Pelajaran</h3>
				<h1>{{$totalMapel}}</h1>
			</div>
		</div>
	</div>

</div>

<div class="card mt-3">
	<div class="card-body">
		<table class="table">
			<tr class="alert-success">
				<th>No</th>
				<th>Nama Pelajaran</th>
				<th>Nama Pengajar</th>
				<th>Kelas</th>
				<th>Total Siswa</th>
				<th>Jumlah Siswa Masuk</th>
				<th>Jumlah Siswa Alfa</th>
				<th>Jumlah Siswa Izin</th>
			</tr>

			@foreach($list_materi as $item)
			<tr>
				<td>{{$loop->iteration}}</td>
				<td>{{strtoupper($item->materi_nama)}}</td>
				<td>{{strtoupper($item->pengajar->pengajar_nama)}}</td>
				<td>{{strtoupper($item->kelas_nomor)}}</td>
				<td>
					{{App\Models\Siswa::where('siswa_kelas',$item->kelas_nomor)->count()}} Total Siswa
				</td>
				<td>
					{{
						App\Models\Absensi::where('absensi_mapel_id',$item->kelas_materi_id)
						->where('absensi_status','Hadir')
						->count()
					}}
				</td>

				<td>
					{{App\Models\Absensi::where('absensi_mapel_id',$item->kelas_materi_id)
					->where('absensi_status','Alfa')
					->count()
				}}
			</td>
			<td>
				{{	App\Models\Absensi::where('absensi_mapel_id',$item->kelas_materi_id)
				->where('absensi_status','Izin')
				->count()
			}}
		</td>
	</tr>
	@endforeach
</table>
</div>
</div>

@endsection