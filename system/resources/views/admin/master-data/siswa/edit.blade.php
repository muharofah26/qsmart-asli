@extends('template.base')
@section('content')
    <div class="card">
        <div class="card-body">
            <center>
                <h3>EDIT DATA {{strtoupper($siswa->siswa_nama)}}</h3>
            </center>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-body">
            <form action="{{url('admin/master-data/siswa',$siswa->siswa_id)}}/edit" method="POST"  enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <span>Nama Siswa</span>
                        <input type="text" required name="siswa_nama" value="{{ucwords($siswa->siswa_nama)}}"  class="form-control">
                    </div>
                </div>
            
                <div class="col-md-6">
                    <div class="form-group">
                        <span>Email Siswa/Orang Tua/Wali</span>
                        <input type="text" required name="email" value="{{ucwords($siswa->email)}}" class="form-control">
                    </div>
                </div>
            
                <div class="col-md-6">
                    <div class="form-group">
                        <span>Nomor Telpon Siswa/Orang Tua/Wali</span>
                        <input type="number" required value="{{ucwords($siswa->siswa_notlp)}}" name="siswa_notlp" class="form-control">
                    </div>
                </div>
            
                <div class="col-md-6">
                    <div class="form-group">
                        <span>Alamat Siswa</span>
                        <input type="text" required name="siswa_alamat" value="{{ucwords($siswa->siswa_alamat)}}" class="form-control">
                    </div>
                </div>
            
                <div class="col-md-6">
                    <div class="form-group">
                        <span>Tempat Lahir</span>
                        <input type="text" required name="siswa_tempat_lahir" value="{{ucwords($siswa->siswa_tempat_lahir)}}" class="form-control">
                    </div>
                </div>
            
                <div class="col-md-6">
                    <div class="form-group">
                        <span>Tanggal Lahir</span>
                        <input type="date" required name="siswa_tanggal_lahir" value="{{ucwords($siswa->siswa_tanggal_lahir)}}" placeholder="Tempat Lahir" class="form-control">
                    </div>
                </div>
            
                <div class="col-md-6">
                    <span>Jenis Kelamin</span>
                    <select name="siswa_jenis_kelamin" id="" class="form-control" required>
                        <option value="" hidden>-- Jenis Kelamin --</option>
                        <option value="laki-laki" @if($siswa->siswa_jenis_kelamin == "laki-laki") selected @endif>Laki-laki</option>
                        <option value="perempuan" @if($siswa->siswa_jenis_kelamin == "perempuan") selected @endif>Perempuan</option>
                    </select>
                </div>
            
                <div class="col-md-6">
                    <div class="form-group">
                        <span>Asal Sekolah</span>
                        <input type="text" required value="{{ucwords($siswa->siswa_asal_sekolah)}}" name="siswa_asal_sekolah" class="form-control">
                    </div>
                </div>
            
                <div class="col-md-6">
                    <div class="form-group">
                        <span>Jurusan di Sekolah (Opsional)</span>
                        <input type="text" required name="siswa_jurusan" value="{{ucwords($siswa->siswa_jurusan)}}" class="form-control">
                    </div>
                </div>
            
                <div class="col-md-6">
                    <div class="form-group">
                        <span>Rangking Sekolah Siswa</span>
                        <input type="number" maxlength="2" min="1" required name="siswa_rangking" value="{{ucwords($siswa->siswa_rangking)}}" class="form-control">
                    </div>
                </div>
            
                <div class="col-md-6">
                    <div class="form-group">
                        <span>Raport Sekolah Siswa</span>
                        <input type="file" accept="image/*"  name="siswa_raport" class="form-control">
                    </div>
                </div>
            
                <div class="col-md-6">
                    <div class="form-group">
                        <span>Kelas Di Sekolah</span>
                        <input type="number" required value="{{ucwords($siswa->siswa_kelas)}}" name="siswa_kelas" class="form-control">
                    </div>
                </div>
            
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <span>Foto Siswa</span>
                                <input type="file" accept="image/*" name="siswa_foto" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                        <img src="{{asset('system/public')}}/{{$siswa->siswa_foto}}" width="100%" alt="">
                        </div>
                    </div>
                    
                </div>
                <br>
                <div class="col-md-12 mt-5">
                    <h3  class="text-primary">Data Orang Tua</h3>
                </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <span>Nama Ibu/Wali</span>
                            <input type="text"  required name="siswa_ibu" value="{{ucwords($siswa->siswa_ibu)}}" class="form-control">
                        </div>
                    </div>
            
                    <div class="col-md-6">
                        <div class="form-group">
                            <span>Nama Ayah/Wali</span>
                            <input type="text"  required name="siswa_ayah" value="{{ucwords($siswa->siswa_ayah)}}" class="form-control">
                        </div>
                    </div>
            
            
                    <div class="col-md-6">
                        <div class="form-group">
                            <span>Alamat Orang Tua</span>
                            <input type="text" value="{{ucwords($siswa->siswa_alamat_ortu)}}" required name="siswa_alamat_ortu" class="form-control">
                        </div>
                    </div>
            
                    <div class="col-md-6">
                        <div class="form-group">
                            <span>Nomor Telpon Orang Tua</span>
                            <input type="number"  required name="siswa_ortu_notlp" value="{{ucwords($siswa->siswa_ortu_notlp)}}" class="form-control">
                        </div>
                    </div>
            
                    <div class="col-md-12">
                        <button class="btn btn-block btn-primary btn-lg mb-5">Daftar Sekarang</button>
                    </div>
            
            
            </div>
            </form>
        </div>
    </div>
@endsection