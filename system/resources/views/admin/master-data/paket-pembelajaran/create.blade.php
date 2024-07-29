@extends('template.base')
@section('content')
<div class="card">
    <div class="card-body">
        <center>
            <h3>FORM PAKET PEMBELAJARAN</h3>
        </center>

       <form action="{{url('admin/master-data/paket-pembelajaran/create')}}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-12 ">
                <div class="form-group">
                    <span>Nama Paket</span>
                    <input type="text" required name="paket_nama" class="form-control">
                </div>
            </div>

            <div class="col-md-12 mb-5">
                <div class="form-group">
                    <span>Deskripsi Paket</span>
                    <textarea name="paket_deskripsi" placeholder="Deskripsi perbedaan paket dengan yang lainnya ..." id="" cols="30" rows="10" class="form-control"></textarea>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <span>Untuk Kelas</span>
                    <input type="number" required name="paket_kelas[]" class="form-control">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <span>Harga Pendaftaran</span>
                    <input type="text" placeholder="Rp. xxxx" required name="paket_biaya_daftar[]" class="form-control">
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <span>Harga SPP/Bulan</span>
                    <input type="number" placeholder="Rp. xxxx" required name="paket_spp_bulan[]" class="form-control">
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <span>Harga SPP/Semester</span>
                    <input type="number" placeholder="Rp. xxxx" required name="paket_spp_semester[]" class="form-control">
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <span>Harga SPP/Tahun</span>
                    <input type="number" placeholder="Rp. xxxx" required name="paket_spp_tahun[]" class="form-control">
                </div>
            </div>
        </div>


            <div id="dynamicTableUntuk"></div>
            <div class="row">
                <div class="col-md-12">
                    <button type="button" name="add" id="add_untuk" class="btn btn-sm btn-dark mb-3"><i class="fa fa-plus"></i> Untuk</button>
                </div>
            </div>
            
            

        <div class="row">
            <div class="col-md-12">
                <button class="btn btn-lg btn-danger btn-block">SIMPAN</button>
            </div>
        </div>
       </form>
    </div>
</div>




<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>


<script type="text/javascript">
  var u = 0;

  $("#add_untuk").click(function() {

    ++u;

    var isi_dasar = `
    <div class="row bg-light mb-5 mt-5">
        <hr>
    <div class="col-md-6">
                <div class="form-group">
                    <span>Untuk Kelas</span>
                    <input type="number" required name="paket_kelas[]" class="form-control">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <span>Harga Pendaftaran</span>
                    <input type="text" placeholder="Rp. xxxx" required name="paket_biaya_daftar[]" class="form-control">
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <span>Harga SPP/Bulan</span>
                    <input type="number" placeholder="Rp. xxxx" required name="paket_spp_bulan[]" class="form-control">
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <span>Harga SPP/Semester</span>
                    <input type="number" placeholder="Rp. xxxx" required name="paket_spp_semester[]" class="form-control">
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <span>Harga SPP/Tahun</span>
                    <input type="number" placeholder="Rp. xxxx" required name="paket_spp_tahun[]" class="form-control">
                </div>
            </div>
                    
            <div class="col-md-12">
            <p class="text-danger btn btn-sm btn-light float-right  remove-tr-untuk" type="button"><i class="mdi mdi-window-close"></i> Hapus</p>
            </div>
            </div>
    `;

    $("#dynamicTableUntuk").append(isi_dasar);

  });

  $(document).on('click', '.remove-tr-untuk', function() {
    $(this).closest('.row').remove(); // Menghapus elemen terdekat dengan class 'row'
});
</script>
@endsection