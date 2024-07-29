@extends('landing.section.base')
@section('content')

<div class="row">
	<div class="col-md-5">
		{!!nl2br($website->maps)!!}
	</div>

	<div class="col-md-7">
		<h3 class="text-primary mt-5">Kontak Qsmart</h3>
		<table class="table table-borderless">
			<tr>
				<th>Alamat</th>
				<td>: {{ucwords($website->alamat)}}</td>
			</tr>

			<tr>
				<th>Kontak</th>
				<td>: {{$website->kontak}}</td>
			</tr>

			<tr>
				<th>E-Mail</th>
				<td>: {{$website->email}}</td>
			</tr>
		</table>
	</div>
</div>
@endsection