<!DOCTYPE html>
<html lang="en">
<head>
    @include('landing.section.assets')
</head>

<style>
    .divider:after,
    .divider:before {
        content: "";
        flex: 1;
        height: 1px;
        background: #eee;
    }
</style>
<body>
    <div class="container py-5 h-100">
      <div class="row d-flex align-items-center justify-content-center h-100">
        <div class="col-md-8 col-lg-7 col-xl-6">
          <img src="{{url('public/logo/qsmart.jpeg')}}"
          class="img-fluid" alt="Phone image">
      </div>
      <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
        <center>
            <h3>Selamat datang di Qsmart</h3>
            <p>Rumah Belajar Ketapang</p>
        </center>
        <form action="{{url('siswa-login')}}" method="post">
            @csrf
            <!-- Email input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <label class="form-label" for="form1Example13">Email</label>
                <input type="email" name="email" id="form1Example13" required class="form-control form-control-lg" />
            </div>

            <!-- Password input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <label class="form-label" for="form1Example23">Password</label>
                <input type="password" id="form1Example23" required name="password" class="form-control form-control-lg" />
            </div>

            <div class="d-flex justify-content-around align-items-center mb-4">

                <!-- <a href="#!">Forgot password?</a> -->
            </div>

            <!-- Submit button -->
            <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn mb-3 btn-primary btn-lg btn-block">Masuk</button>
            <center>
                -Atau-
            </center>
            <a href="{{url('daftar-bimbel')}}" class="btn btn-info btn-block btn-lg mt-3">Daftar Anggota</a>


        </form>
    </div>
</div>
</div>
<script src="{{url('public')}}/assets/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="{{url('public')}}/assets/vendors/jquery-bar-rating/jquery.barrating.min.js"></script>
<script src="{{url('public')}}/assets/vendors/chart.js/Chart.min.js"></script>
<script src="{{url('public')}}/assets/vendors/flot/jquery.flot.js"></script>
<script src="{{url('public')}}/assets/vendors/flot/jquery.flot.resize.js"></script>
<script src="{{url('public')}}/assets/vendors/flot/jquery.flot.categories.js"></script>
<script src="{{url('public')}}/assets/vendors/flot/jquery.flot.fillbetween.js"></script>
<script src="{{url('public')}}/assets/vendors/flot/jquery.flot.stack.js"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{url('public')}}/assets/js/off-canvas.js"></script>
<script src="{{url('public')}}/assets/js/hoverable-collapse.js"></script>
<script src="{{url('public')}}/assets/js/misc.js"></script>
<script src="{{url('public')}}/assets/js/settings.js"></script>
<script src="{{url('public')}}/assets/js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="{{url('public')}}/assets/js/dashboard.js"></script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Notifikasi -->
@foreach(['success', 'warning', 'error', 'info'] as $status)
@if (session($status))
<script>
  Swal.fire({
    icon: "{{ $status }}",
    title: "{{ Str::upper($status) }}",
    text: "{{ session($status) }}!",
    showConfirmButton: false,
    timer: 15000
})
</script>
@endif
@endforeach

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
</body>
</html>