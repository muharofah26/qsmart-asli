@extends('template.base')
@section('content')
<div class="card">
	<div class="card-body">
		<table class="table">
			<tr class="alert-success">
				<th>No</th>
				<th>Nama Pelajaran</th>
				<th>Kelas</th>
				<th>Jumlah Siswa Masuk</th>
				<th>Jumlah Siswa Alfa</th>
				<th>Jumlah Siswa Izin</th>
			</tr>

			@foreach($list_materi as $item)
			<tr>
				<td>{{$loop->iteration}}</td>
				<td>{{strtoupper($item->materi_nama)}}</td>
				<td>{{strtoupper($item->kelas_nomor)}}</td>
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