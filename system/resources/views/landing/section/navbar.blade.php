@php

function checkRouteActive($route){
  if(Route::current()->uri == $route) return 'active';
}
@endphp

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light scrolled awake" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{url('/')}}">QSMART<span>Bimbel Orang Ketapang</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{checkRouteActive('/')}}"><a href="{{url('/')}}" class="nav-link">Home</a></li>
                <li class="nav-item {{checkRouteActive('tentang')}}"><a href="{{url('tentang')}}" class="nav-link">Tentang Q-Smart</a></li>
                <li class="nav-item {{checkRouteActive('pengajar')}}"><a href="{{url('pengajar')}}" class="nav-link">Pengajar</a></li>
                <li class="nav-item {{checkRouteActive('berita-dan-info')}}"><a href="{{url('berita-dan-info')}}" class="nav-link">Berita & Info</a></li>
                <li class="nav-item {{checkRouteActive('galeri')}}"><a href="{{url('galeri')}}" class="nav-link">Galeri</a></li>
                <li class="nav-item {{checkRouteActive('kontak')}}"><a href="{{url('kontak')}}" class="nav-link">Kontak</a></li>
                <li class="nav-item"><a href="{{url('login')}}" class="nav-link btn btn-primary btn-sm" style="color:#ffffff !important">Daftar/Masuk</a></li>
            </ul>
        </div>
    </div>
</nav>