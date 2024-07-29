@extends('template.base')
@section('content')
<div class="card">
	<div class="card-body alert-success">
		<div class="d-flex align-items-center">
			<img src="{{asset('system/public')}}/{{$detail->siswa_foto}}" onerror="this.src='{{url('public/assets/kelas-3.jpeg')}}';" width="80px" alt="">
			<table class="table table-sm ml-3 table-borderless">
				<tr>
					<th width="100px">Nama Pelajaran</th>
					<td>: {{ucwords($detail->materi_nama)}}</td>
				</tr>   
				<tr>
					<th width="100px">Kelas Pelajaran</th>
					<td>: {{$detail->kelas_nomor}}</td>
				</tr>
			</table>
		</div>
	</div>
</div>

<div class="card mt-3">
	<div class="card-body">
		<table class="table table-bordered table-hover" >
			<tr class="alert-success">
				<th>No</th>
				<th>Nama Siswa</th>
				<th>Tanggal Absensi</th>
				<th>Status Kehadiran</th>
			</tr>
			@foreach($list_absensi as $item)

			<tr class="@if($item->absensi_status == "Alfa") alert-danger @elseif($item->absensi_status == "Izin") alert-warning @elseif($item->absensi_status == "Hadir") alert-success @endif">
				<td>{{$loop->iteration}}</td>
				<td>{{strtoupper($item->siswa->siswa_nama)}}</td>
				<td>{{$item->absensi_tanggal}}</td>
				<td>
					{{$item->absensi_status}}
				</td>
			</tr>
			@endforeach
		</table>
	</div>
</div>
@endsection