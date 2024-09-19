@extends('template.base')
@section('content')




<div class=" mt-3">
  <div class="row">

    @foreach($list_kelas->sortBy('kelas_nomor') as $item)
    <div class="col-sm-3 stretch-card grid-margin">
      <div class="card">
        <div class="card-body alert-success px-3 text-dark">
          <a href="{{url('admin/master-data/kelas',$item->kelas_id)}}/detail" class="nav-link" style="text-decoration: none; color:rgb(5, 174, 64)">
         
          <h3 class="font-weight-semibold">Kelas {{ucwords($item->kelas_nomor)}} </h3>
          @foreach(App\Models\KelasMateri::where('kelas_id',$item->kelas_id)->where('flag_erase',1)->get() as $materi)
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