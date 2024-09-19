@extends('template.base')
@section('content')


<div class="card">
    <div class="card-body">
        <!-- <a href="{{url('p/kelas',$detail->kelas_materi_id)}}/buat-tugas" class="btn btn-lg alert-success float-right" >Buat Tugas</a> -->
        <button type="button" class="btn btn-lg alert-success float-right ml-2 mr-2"  data-toggle="modal" data-target="#exampleModal">
            Buat Absensi
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Absensi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{url('p/kelas',$detail->kelas_materi_id)}}/absensi" method="POST">
                            @csrf
                            <div class="form-group">
                                <span>Tanggal Absensi</span>
                                <input type="date" class="form-control" required name="absensi_tanggal">
                            </div>


                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr class="alert-success">
                                        <th>Nama Siswa</th>
                                        <th>Status Kehadiran</th>
                                    </tr>
                                </thead>
                                @foreach($list_siswa as $item)
                                <tr>
                                    <td>{{ucwords($item->siswa_nama)}}</td>
                                    <td>
                                        <input type="hidden" name="absensi_siswa_id[]" value="{{$item->siswa_id}}">
                                        <select class="form-control" name="absensi_status[]">
                                            <option value="Hadir">Hadir</option>
                                            <option value="Izin">Izin</option>
                                            <option value="Alfa">Alfa</option>
                                        </select>
                                    </td>
                                </tr>
                                @endforeach
                            </table>


                            <button class="btn alert-success">Buat Absensi</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-3">
  
    <div class="col-md-4">
        <div class="card">
            <div class="card-body alert-success">
                <h3>Jumlah Siswa</h3>
                <h1>{{$jumlahSiswa}}</h1>
            </div>
        </div>
    </div>
</div>



{{-- body --}}

<div class="row mt-5">
 
<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <center>
                <h3>Data Absensi Hari Ini</h3>
            </center>

            <table class="table">
                <thead>
                    <tr class="alert-warning">
                        <th>No</th>
                        <th>Nama</th>
                        <th>Kehadiran</th>
                    </tr>
                </thead>

                @foreach($absen_today as $absen)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{ucwords($absen->siswa->siswa_nama)}}</td>
                    <td>{{$absen->absensi_status}} </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
</div>






@endsection