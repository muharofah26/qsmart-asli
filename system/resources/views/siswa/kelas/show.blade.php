@extends('template.base')
@section('content')

<div class="row">
   <div class="col-md-8">
      <div class="card">
        <div class="card-body alert-success">
            <div class="row">
                <div class="col-md-6">
                    <div class="d-flex align-items-center">
                        <img src="{{asset('system/public')}}/{{$detail->siswa_foto}}" onerror="this.src='{{url('public/assets/kelas-3.jpeg')}}';" width="80px" alt="">
                        <table class="table table-sm ml-3">
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
        </div>
    </div>
    <div class="card border-0 mt-3">
        <div class="col-md-12">
            <div class="card-body table-responsive" >
                <table class="table table-bordered table-hover" style="overflow-x:scroll ">
                    <thead>
                        <tr class="alert-success">
                            <th>No</th>
                            <th>Aksi</th>
                            <th>Tanggal Mulai Tugas</th>
                            <th>Tanggal Selesai Tugas</th>
                            <th>Nilai Tugas</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($list_soal as $item)
                        @php
                        $totalNilai = App\Models\JawabanMaster::where('soal_master_id',$item->soal_master_id)
                        ->where('siswa_id',$author->siswa_id)
                        ->first();
                        @endphp
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>
                                 @if ($totalNilai && $totalNilai->nilai > 0)
                                <a href="#" class="btn btn-sm alert-secondary"><i class="fa fa-lock"></i> Lihat</a><br>
                                @else

                                <a href="{{url('x/tugas',$item->soal_master_id)}}/jawab" class="btn btn-sm alert-success">Lihat</a>
                                @endif
                            </td>
                            <td>{{$item->soal_tanggal_mulai}}</td>
                            <td>{{$item->soal_tanggal_selesai}}</td>
                            <td><b style="font-size: 16pt">{{$totalNilai->nilai ?? "Null"}}</b></td>
                        </tr>
                        @endforeach
                    </tbody>

                    <tfoot>
                        <tr class="alert-success">
                            <th>No</th>
                            <th>Aksi</th>
                            <th>Tanggal Mulai Tugas</th>
                            <th>Tanggal Selesai Tugas</th>
                            <th>Jumlah Mengumpulkan</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="card">
        <div class="card-body">
            <center>
                <img src="{{asset('system/public')}}/{{$pengajar->pengajar_foto}}" width="80%" alt=""> <br>
                <h3>{{ucwords($pengajar->pengajar_nama)}}</h3>
                ({{strtoupper($pengajar->pengajar_pendidikan_akhir)}} -  {{ucwords($pengajar->pengajar_kampus)}})
            </center>


        </div>
    </div>
</div>
</div>



@endsection