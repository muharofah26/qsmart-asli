<!DOCTYPE html>
<html lang="en">
<head>
  @include('landing.section.assets')
</head>
<body>
 @include('landing.section.navbar')
 <!-- END nav -->
 
 <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('{{asset("system/public")}}/{{$website->gambar_utama}}');">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
      <div class="col-md-9 ftco-animate text-center">
        <h1 class="mb-5 bread">{{ucwords($title)}}</h1>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section services-section" id="sini">
  <div class="container">
   @yield('content')
 </div>
</section>


<footer class="ftco-footer bg-bottom ftco-no-pt" style="background-image: url(images/bg_3.jpg);">
  <div class="container">

   <div class="row">
    <div class="col-md-12 text-center">

      <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Politeknik Negeri Ketapang
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
      </div>
    </div>
  </div>
</footer>



<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


@include('landing.section.js')
<script>
  document.addEventListener('DOMContentLoaded', function() {
    setTimeout(function() {
      var target = document.getElementById('sini');
      if(target) {
        window.scrollTo({
          top: target.offsetTop,
          behavior: 'smooth'
        });
      }
        }, 1000); // Ubah nilai delay (dalam milidetik) sesuai kebutuhan
  });
</script>
</body>
</html>