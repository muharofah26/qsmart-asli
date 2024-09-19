@extends('template.base')
@section('content')


<div class="card">
    <div class="card-body">
    <button type="button" class="btn btn-lg alert-success float-right" data-toggle="modal" data-target="#exampleModal">
    Tambah Materi Pilihan
    </button>

      <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Kelas</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{url('admin/master-data/kelas-materi',$kelas->kelas_id)}}/create" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <span>Icon Materi</span>
                <input type="file" accept="image/*" name="materi_icon[]" required class="form-control">
            </div>

            <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                <span>Mapel Pilihan</span>
                <input type="text" name="kelas_materi_pilihan[]" required class="form-control">
            </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                <span>Guru Pengampu</span>
                <select name="pengajar_id[]" required id="" class="form-control">
                <option value="" hidden>-- Pilih Pengajar --</option>
                @foreach($list_pengajar as $pengajar)
                <option value="{{$pengajar->pengajar_id}}">{{ucwords($pengajar->pengajar_nama)}}</option>
                @endforeach
                </select>
            </div>
            </div>
            </div>

            <div id="dynamicTableUntuk">

            </div>
            <button type="button" name="add" id="add_untuk" class="btn btn-sm alert-dark mb-3"><i class="fa fa-plus"></i> Materi Kelas</button>

            <button class="btn alert-success btn-block mt-3">TAMBAH KELAS</button>
          </form>
        </div>
      </div>
    </div>
  </div>
    </div>
</div>

<div class="row mt-3">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body alert-success">
                <h3>Jumlah Mapel</h3>
                <h1>{{$totalMapel}}</h1>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body alert-warning">
                <h3>Jumlah Siswa</h3>
                <h1>{{$totalSiswa}}
                </h1>
            </div>
        </div>
    </div>
</div>



{{-- body --}}

<div class="row mt-5">
    <div class="col-md-6">
       <div class="card">
        <div class="card-body">
            <center>
                <h3>Data Materi Kelas {{$kelas->kelas_nomor}}</h3>
            </center>
            
            <table class="table">
                <thead>
                    <tr class="alert-success">
                        <th>No</th>
                        <th>Aksi</th>
                        <th>Nama Materi</th>
                        <th>Guru Pengajar</th>
                    </tr>
                </thead>
    
                <tbody>
                    @foreach($list_materi as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td><a href="{{url('admin/master-data/kelas',$item->kelas_materi_id)}}/delete-materi" class="btn btn-sm alert-danger" onclick="return confirm('Yakin hapus data ini?')">Hapus</a></td>
                        <td>{{ucwords($item->materi_nama)}}</td>
                        <td>{{ucwords($item->pengajar->pengajar_nama)}}</td>
                    </tr>
                    @endforeach
                </tbody>

                <tfoot>
                    <tr class="alert-success">
                        <th>No</th>
                        <th>Aksi</th>
                        <th>Nama Materi</th>
                        <th>Guru Pengajar</th>
                    </tr>
                </tfoot>
            </table>
        </div>
       </div>
    </div>
    
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <center>
                    <h3>Data Siswa Kelas {{$kelas->kelas_nomor}}</h3>
                </center>

                <table class="table">
                    <thead>
                        <tr class="alert-warning">
                            <th>No</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                        </tr>
                    </thead>

                    @foreach($list_siswa as $siswa)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{ucwords($siswa->siswa_nama)}}</td>
                        <td>{{ucwords($siswa->siswa_jenis_kelamin)}}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>


  




<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>


<script type="text/javascript">
  var u = 0;

  $("#add_untuk").click(function() {

    ++u;

    var isi_dasar = `
    <div class="row mb-3 mt-3">
    <div class="col-md-12">
      <div class="form-group">
                <span>Icon Materi</span>
                <input type="file" accept="image/*" name="materi_icon[]" required class="form-control">
            </div>
            </div>

          <div class="col-md-6">
            <div class="form-group">
              <span>Mapel Pilihan</span>
              <input type="text" name="kelas_materi_pilihan[]" required class="form-control">
          </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <span>Guru Pengampu</span>
            <select name="pengajar_id[]" required id="" class="form-control">
              <option value="" hidden>-- Pilih Pengajar --</option>
              @foreach($list_pengajar as $pengajar)
              <option value="{{$pengajar->pengajar_id}}">{{ucwords($pengajar->pengajar_nama)}}</option>
              @endforeach
            </select>
          </div>
          </div>
        </div>
    `;

    $("#dynamicTableUntuk").append(isi_dasar);

  });

  $(document).on('click', '.remove-tr-untuk', function() {
    $(this).parents('tr').remove();
  });
</script>



@endsection