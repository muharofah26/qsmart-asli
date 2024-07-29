@extends('template.base')
@section('content')

<div class="card">
    <div class="card-body">
        <center>
            <h3>Data Absensi Anda</h3>
        </center>
    </div>
</div>


<div class="card mt-3">
    <div class="card-body">
        <table class="table table-hover table-bordered">
            <thead>
                    <tr class="bg-utama text-white">
                        <th>No</th>
                        <th>Kelas</th>
                        <th>Tanggal Absensi</th>
                        <th>Mapel</th>
                        <th>Status</th>
                    </tr>
            </thead>
            <tbody>
                
                @foreach($list_absensi as $item)
                <tr class="@if($item->absensi_status == "Alfa") alert-danger @elseif($item->absensi_status == "Izin") alert-warning @elseif($item->absensi_status == "Hadir") alert-success @endif">
                    <td>{{$loop->iteration}}</td>
                    <td>Kelas {{$item->absensi_kelas_nomor}}</td>
                    <td>{{$item->absensi_tanggal}}</td>
                    <td>{{ucwords($item->mapel->materi_nama)}}</td>
                    <td>{{$item->absensi_status}}</td>
                </tr>
                @endforeach
            </tbody>

            <tfoot>
                <tr class="bg-utama text-white">
                        <th>No</th>
                        <th>Kelas</th>
                        <th>Tanggal Absensi</th>
                        <th>Mapel</th>
                        <th>Status</th>
                    </tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection