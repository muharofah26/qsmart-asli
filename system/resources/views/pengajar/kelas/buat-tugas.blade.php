@extends('template.base')
@section('content')


<style>
    .input-group {
      display: flex;
      margin-bottom: 15px; /* Sesuaikan sesuai kebutuhan Anda */
    }
  
    .input-group-append {
      display: flex;
    }
  
    .input-group-append button {
      border-top-left-radius: 0;
      border-bottom-left-radius: 0;
    }
  </style> 
  
  
  <div class="col-md-12">
    <div class="card mt-3">
      <div class="card-body">
        <center>
          <h3>Form Buat Soal</h3>
         </center>
     <div class="form-group">
      <label>Tipe Pertanyaan: <b class="red"> *</b></label>
      <select name="surattugas_tujuan" class="form-control" id="pilihan" required="">
        <option value="form1">Pilihan Ganda</option>
        <option value="form2">Jawaban Bebas</option>
      </select>
    </div>
  
  
  
  <form action="{{url('p/kelas',$detail->kelas_materi_id)}}/buat-tugas" method="POST">
     @csrf
     <div class="row mb-3">
      <div class="col-md-6">
        <span>Tanggal Mulai Tugas</span>
        <input type="date" class="form-control" required name="soal_tanggal_mulai">
      </div>
      <div class="col-md-6">
        <span>Tanggal Selesai Tugas</span>
        <input type="date" class="form-control" required name="soal_tanggal_selesai">
      </div>
     </div>
    <input type="hidden" value="{{$detail->kelas_materi_id}}" name="soal_mapel_id">
    <input type="hidden" value="{{$detail->kelas_nomor}}" name="soal_kelas_nomor">
     <div id="formContainer">
      <!-- Form baru akan ditampilkan di sini -->
    </div>
    <button class="btn alert-success btn-block mt-3 mb-5" type="submit"><b><i class="fa fa-save"></i> SIMPAN</b></button>
    <a href="{{url('p/kelas',$detail->kelas_id)}}/detail" onclick="return confirm('Tinggalkan form')" class="btn btn-dark">Selesai</a>
  </form>
  </div>
  </div>
  </div>
  </div>
  
  
  <script>
    const pilihanSelect = document.getElementById('pilihan');
    const formContainer = document.getElementById('formContainer');
  
    function tampilkanFormYangDipilih() {
      const pilihan = pilihanSelect.value;
  
      formContainer.innerHTML = '';
  
      switch (pilihan) {
      case 'form1':
        formContainer.innerHTML = `
        <label>Masukan Pertanyaan: <b class="red"> *</b></label>
        <textarea name="soal_pertanyaan"  cols="30" class="form-control Naldysummernote">Masukan pertanyaan disini ....</textarea>
        
        <div class="row">
          <div class="col-md-12">
             <input type="text" placeholder="Masukan Pilihan" name="pilihan[]" required class="form-control mt-3 mb-3">
          </div>
        </div>
  
        <div id="dynamicOpsi"> </div>
  
        <input type="hidden" name="soal_type" value="1">
  
        <button type="button" name="add" id="opsi" class="btn btn-sm alert-warning mb-3"><i class="fa fa-plus"></i> Tambah Opsi</button> `;  
        break;
      case 'form2':
        formContainer.innerHTML = `
        <label>Masukan Pertanyaan: <b class="red"> *</b></label>
        <input type="hidden" name="soal_type" value="2">
        <textarea name="soal_pertanyaan"  cols="30" class="form-control Naldysummernote">Masukan pertanyaan disini ....</textarea>`;
        break;
  
      default:
        formContainer.innerHTML = '<button class="btn btn-danger btn-sm mt-3">Pilih Tujuan Terlebih Dahulu</button>';
        break;
      }
    }
  
    pilihanSelect.addEventListener('change', tampilkanFormYangDipilih);
  
    tampilkanFormYangDipilih();
  </script>
  
  
  
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  
  <script type="text/javascript">
    var u = 0;
  
    $("#opsi").click(function() {
  
      ++u;
  
      var isi_opsi = `
      <div class="row">
        <div class="col-md-12">
           <input type="text" placeholder="Masukan Pilihan" name="pilihan[]" required class="form-control mt-3 mb-3">
        </div>
      </div>
      `;
  
      $("#dynamicOpsi").append(isi_opsi);
  
    });
  
    $(document).on('click', '.remove-tr-untuk', function() {
      $(this).parents('tr').remove();
    });
  </script>
  

@endsection