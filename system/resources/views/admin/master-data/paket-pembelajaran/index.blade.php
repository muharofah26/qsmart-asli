@extends('template.base')
@section('content')
<div class="card">
    <div class="card-body">
        <center>
            <h3>Data Paket Pembelajaran</h3>
        </center>
    </div>
</div>


<div class="card mt-3">
    <div class="card-body">
        <a href="{{url('admin/master-data/paket-pembelajaran/create')}}" class="btn bg-utama mb-3"><p class="text-white">  <i class="fa fa-plus" style="font-size:12pt"></i> Buat Paket Pembelajaran</p></a>
        <table class="table ">
         <thead>
            <tr class="bg-utama text-white">
                <th class="text-white">PAKET</th>
                <th class="text-white">KELAS</th>
                <th class="text-white">PENDAFTARAN</th>
                <th class="text-white">SPP/BULAN</th>
                <th class="text-white">SPP/SEMESTER</th>
                <th class="text-white">SPP/TAHUN</th>
            </tr>
        </thead>

        @foreach($list_paket as $item)

        <tr>

            <td>{{strtoupper($item->paket_nama)}}</td>
            <td>
                @foreach(App\Models\PaketPembelajaranDetail::where('paket_id',$item->paket_id)->get()->sortBy('paket_kelas') as $paket)
                KELAS {{$paket->paket_kelas}} <br>
                @endforeach
            </td>

            <td>
                @foreach(App\Models\PaketPembelajaranDetail::where('paket_id',$item->paket_id)->get()->sortBy('paket_kelas') as $paket)
                Rp. {{number_format($paket->paket_biaya_daftar)}} <br>
                @endforeach
            </td>
            <td>
                @foreach(App\Models\PaketPembelajaranDetail::where('paket_id',$item->paket_id)->get()->sortBy('paket_kelas') as $paket)
                Rp. {{number_format($paket->paket_spp_bulan)}} <br>
                @endforeach
            </td>

            <td>
                @foreach(App\Models\PaketPembelajaranDetail::where('paket_id',$item->paket_id)->get()->sortBy('paket_kelas') as $paket)
                Rp.  {{number_format($paket->paket_spp_semester)}} <br>
                @endforeach
            </td>

            <td>
                @foreach(App\Models\PaketPembelajaranDetail::where('paket_id',$item->paket_id)->get()->sortBy('paket_kelas') as $paket)
                Rp.  {{number_format($paket->paket_spp_tahun)}} <br>
                @endforeach
            </td>
        </tr>
        @endforeach
        <tfoot>
            <tr class="bg-utama text-white">
                <th class="text-white">PAKET</th>
                <th class="text-white">KELAS</th>
                <th class="text-white">PENDAFTARAN</th>
                <th class="text-white">SPP/BULAN</th>
                <th class="text-white">SPP/SEMESTER</th>
                <th class="text-white">SPP/TAHUN</th>
            </tr>
        </tfoot>
    </table>
</div>
</div>
@endsection