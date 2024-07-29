@extends('template.base')
@section('content')

<div class="card">
	<div class="card-body alert-success">
		<div class="row">
			<div class="col-md-6">
				<div class="d-flex align-items-center">
					<img src="{{asset('system/public')}}/{{$author->siswa_foto}}" width="80px" alt="">
					<table class="table table-sm ml-3">
						<tr>
							<th width="100px">Nama</th>
							<td>: {{ucwords($author->siswa_nama)}}</td>
						</tr>   
						<tr>
							<th width="100px">Kode Nama</th>
							<td>: {{ucwords($author->siswa_kode)}}</td>
						</tr>
						<tr>
							<th width="100px">Kelas</th>
							<td>: {{ucwords($author->siswa_kelas)}}</td>
						</tr>
						<tr>
							<th width="100px">Jenis Kelamin</th>
							<td>: {{ucwords($author->siswa_jenis_kelamin)}}</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="card mt-3">
	<div class="card-body">
		Nilai sementara siswa
		<table class="table  table-bordered">
			<tr class="bg-utama">
				<th class="text-center" width="50px">No</th>
				<th>Nama Mata Pelajaran</th>
				<th width="15%">Jumlah Ujian</th>
				<th width="15%">Nilai Rata Rata</th>
			</tr>

			@foreach($list_mapel as $item)
			@php
			$totalSoal = App\Models\JawabanMaster::where('mapel_id',$item->kelas_materi_id)
			->where('siswa_id',$author->siswa_id)
			->count();

			$totalNilai = App\Models\JawabanMaster::where('mapel_id',$item->kelas_materi_id)
			->where('siswa_id',$author->siswa_id)
			->sum('nilai');

			@endphp
			<tr>
				<td class="text-center">{{$loop->iteration}}</td>
				<td>{{strtoupper($item->materi_nama)}}</td>
				<td>{{$totalSoal}}</td>
				<td>
					
					@if($totalNilai > 0)
					{{number_format($totalNilai / $totalSoal,2)}}
					@else
					0
					@endif

				</td>
			</tr>
			@endforeach
		</table>
	</div>
</div>
@endsection