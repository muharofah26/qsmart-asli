@extends('template.base')
@section('content')


<div class="card">
    <div class="card-body">
        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
   Tambah Kelas
  </button>

  <h3>DAFTAR KELAS</h3>
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
          <form action="{{url('admin/master-data/kelas/create')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <span>Kelas</span>
                <input type="text" name="kelas_nama" required class="form-control">
            </div>

            <div class="form-group">
              <span>Kode Kelas</span>
              <input type="text" name="kelas_kode" required class="form-control">
          </div>

          <div class="form-group">
            <span>Icon Kelas</span>
            <input type="file" accept="image/*" name="kelas_icon" required class="form-control">
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
          

            <div id="dynamicTableUntukCreate">

            </div>
            <button type="button" name="add" id="add_untukCreate" class="btn btn-sm btn-dark mb-3"><i class="fa fa-plus"></i> Untuk</button>

            <button class="btn btn-primary btn-block mt-3">TAMBAH KELAS</button>
          </form>
        </div>
      </div>
    </div>
  </div>
    </div>
</div>

<div class=" mt-3">
  <div class="row">

    @foreach($list_kelas->sortBy('kelas_nomor') as $item)
    <div class="col-sm-3 stretch-card grid-margin">
      <div class="card">
        <div class="card-body alert-success px-3 text-dark">
          <a href="{{url('admin/master-data/kelas',$item->kelas_id)}}/detail" class="nav-link" style="text-decoration: none; color:rgb(5, 174, 64)">
         
          <h3 class="font-weight-semibold">Kelas {{ucwords($item->kelas_nomor)}} </h3>
          @foreach(App\Models\KelasMateri::where('kelas_id',$item->kelas_id)->get() as $materi)
          <div class="d-flex justify-content-between">
            <p class="text-muted font-13 mb-0">- {{ucwords($materi->materi_nama)}} <br></p> 
          </div>
          @endforeach
          <div class="d-flex mt-3 justify-content-between font-weight-semibold">
            <p class="mb-0">
              <i class="mdi mdi-human-child star-color pr-1"></i>{{App\Models\Siswa::where('siswa_kelas',$item->kelas_nomor)->count()}} Total Siswa </p>
          </div>
        </a>
        </div>
      </div>
    </div>
 
    @endforeach

  </div>
</div>




<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>


<script type="text/javascript">
  var u = 0;

  $("#add_untuk").click(function() {

    ++u;

    var isi_dasar = `
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
    `;

    $("#dynamicTableUntuk").append(isi_dasar);

  });

  $(document).on('click', '.remove-tr-untuk', function() {
    $(this).parents('tr').remove();
  });
</script>



@endsection