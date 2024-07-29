@extends('landing.section.base')
@section('content')
<div class="row">
@foreach($list_pengajar as $item)
<div class="col-sm-4 stretch-card grid-margin">
	<div class="card shadow">
		<a href="{{url('berita',$item->berita_id)}}/detail" style="text-decoration: none">
			<div class="card-body p-0">
				<img class=" w-100" src="{{asset('system/public')}}/{{$item->pengajar_foto}}" onerror="this.src='{{url('public/assets/kelas-3.jpeg')}}';" height="350px" alt="" />
			</div>
			<div class="card-body px-3 text-dark">

				<h6 class="font-weight-semibold text-primary"> {{ucwords($item->pengajar_nama)}}</h6>
				<h6 class="text-secondary">{{$item->pengajar_pendidikan_akhir}}</h6>
			</a>
		</div>
	</div>
</div>
@endforeach
</div>
@endsection