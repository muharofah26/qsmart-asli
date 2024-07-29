@if(Auth::guard('siswa')->user())
<nav class="sidebar bg-smart  sidebar-offcanvas" id="sidebar" style="color: #ffffff !important; height: 100vh; ">
  <ul class="nav fixed-top">
    <li class="nav-item nav-profile border-bottom">
      <a href="#" class="nav-link flex-column">
        <div class="nav-profile-image">
          @if(Auth::guard('siswa')->user() )
          <img src="{{asset('system/public')}}/{{Auth::guard('siswa')->user()->siswa_foto}}" style="border:3px solid #ffffff" alt="profile" />
          @elseif(Auth::guard('pengajar')->user())
          <img src="{{asset('system/public')}}/{{Auth::guard('pengajar')->user()->pengajar_foto}}" style="border:3px solid #ffffff" alt="profile" />
          @else

          @endif
          <!--change to offline or busy as needed-->
        </div>
        <div class="nav-profile-text d-flex ml-0 mb-3 flex-column">

          <span class="font-weight-semibold mb-1 mt-2 text-center">@if(Auth::guard('siswa')->user() ) {{ucwords(Auth::guard('siswa')->user()->siswa_nama)}} @else {{ucwords(Auth::guard('admin')->user()->nama)}} @endif</span>
          <span class="text-secondary icon-sm text-center">@if(Auth::guard('siswa')->user() ) Kelas {{ucwords(Auth::guard('siswa')->user()->siswa_kelas)}} @else {{ucwords(Auth::guard('admin')->user()->nama)}} @endif</span>
        </div>
      </a>
    </li>
    <li class="nav-item pt-3">
      <a class="nav-link d-block" href="index.html">
        {{-- <img class="sidebar-brand-logo" src="{{url('public')}}/assets/images/logo.svg" alt="" /> --}}
        {{-- <img class="sidebar-brand-logomini" src="{{url('public')}}/assets/images/logo-mini.svg" alt="" /> --}}

        <div class="small font-weight-light pt-1">SISTEM MANAGEMENT Q-SMART</div>
      </a>
    </li>
    <li class="pt-2 pb-1">
      <span class="nav-item-head">Menu</span>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{url('x/beranda')}}">
        <i class="mdi mdi-home menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>

  </li>
  @if(Auth::guard('siswa')->user()->siswa_status_aktif == 2)
<!--   <li class="nav-item">
    <a class="nav-link" href="{{url('x/kelas')}}">
      <i class="mdi mdi-glassdoor menu-icon"></i>
      <span class="menu-title">Data Kelas</span>
    </a>
  </li>
 -->
  <li class="nav-item">
    <a class="nav-link" href="{{url('x/absensi')}}">
      <i class="mdi mdi-calendar-multiple menu-icon"></i>
      <span class="menu-title">Data Absensi</span>
    </a>
  </li>


<!--   <li class="nav-item">
    <a class="nav-link" href="{{url('x/nilai')}}">
      <i class="mdi mdi-lead-pencil menu-icon"></i>
      <span class="menu-title">Raport/Nilai</span>
    </a>
  </li> -->

  @endif

  <li class="nav-item">
    <a class="nav-link" href="{{url('x/profil')}}">
      <i class="mdi mdi-contacts menu-icon"></i>
      <span class="menu-title">Profil Akun</span>
    </a>
  </li>

</ul>
</nav>

@elseif(Auth::guard('admin')->user() )
<nav class="sidebar bg-smart sidebar-offcanvas" id="sidebar" style="color: #ffffff !important; height: 100vh; ">
  <ul class="nav fixed-top">
    <li class="nav-item nav-profile border-bottom">
      <a href="#" class="nav-link flex-column">
        <div class="nav-profile-image">
          <img src="{{asset('system/public')}}/{{Auth::guard('admin')->user()->foto}}" style="border:3px solid #ffffff" alt="profile" />
          <!--change to offline or busy as needed-->
        </div>
        <div class="nav-profile-text d-flex ml-0 mb-3 flex-column">
          <span class="font-weight-semibold mb-1 mt-2 text-center">Admin QSMART</span>
          <span class="text-secondary icon-sm text-center"></span>
        </div>
      </a>
    </li>
    <li class="nav-item pt-3">
      <a class="nav-link d-block" href="index.html">
        {{-- <img class="sidebar-brand-logo" src="{{url('public')}}/assets/images/logo.svg" alt="" /> --}}
        {{-- <img class="sidebar-brand-logomini" src="{{url('public')}}/assets/images/logo-mini.svg" alt="" /> --}}
        <h3>QSMART</h3>
        <div class="small font-weight-light pt-1">SISTEM MANAGEMENT Q-SMART</div>
      </a>
    </li>
    <li class="pt-2 pb-1">
      <span class="nav-item-head">Menu</span>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{url('admin/beranda')}}">
        <i class="mdi mdi-home menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>


    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#masterdata" aria-expanded="false" aria-controls="masterdata">
        <i class="mdi mdi-buffer menu-icon"></i>
        <span class="menu-title">Master Data</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="masterdata">
        <ul class="nav flex-column sub-menu">

          <li class="nav-item">
            <a class="nav-link" href="{{url('admin/master-data/pengajar')}}">Data Pengajar</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{url('admin/master-data/siswa')}}">Data Siswa</a>
          </li>


          <li class="nav-item">
            <a class="nav-link" href="{{url('admin/master-data/kelas')}}">Data Kelas</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{url('admin/master-data/paket-pembelajaran')}}">Paket Pembelajaran</a>
          </li>


        </ul>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{url('admin/metode-pembayaran')}}">
        <i class="mdi mdi-dns menu-icon"></i>
        <span class="menu-title">Metode Pembayaran</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#laporanbulanan" aria-expanded="false" aria-controls="laporanbulanan">
        <i class="mdi mdi-folder-multiple menu-icon"></i>
        <span class="menu-title">Laporan</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="laporanbulanan">
        <ul class="nav flex-column sub-menu">

          <li class="nav-item">
            <a class="nav-link" href="{{url('admin/laporan')}}">Laporan </a>
          </li>

         
        </ul>
      </div>
    </li>


    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#website" aria-expanded="false" aria-controls="website">
        <i class="mdi mdi-web menu-icon"></i>
        <span class="menu-title">Website</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="website">
        <ul class="nav flex-column sub-menu">

          <li class="nav-item">
            <a class="nav-link" href="{{url('admin/website/profil-website')}}">Profil Qsmart</a>
          </li>



          <li class="nav-item">
            <a class="nav-link" href="{{url('admin/website/galeri')}}">Galeri</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{url('admin/website/berita')}}">Berita</a>
          </li>

        </ul>
      </div>
    </li>


    <li class="nav-item">
      <a class="nav-link" href="{{url('admin/profil')}}">
        <i class="mdi mdi-contacts menu-icon"></i>
        <span class="menu-title">Profil Akun</span>
      </a>
    </li>

  </ul>
</nav>

@elseif(Auth::guard('pengajar')->user() )

<nav class="sidebar bg-smart sidebar-offcanvas" id="sidebar" style="color: #ffffff !important; height: 100vh; ">
  <ul class="nav fixed-top">
    <li class="nav-item nav-profile border-bottom">
      <a href="#" class="nav-link flex-column">
        <div class="nav-profile-image">
          <img src="{{asset('system/public')}}/{{Auth::guard('pengajar')->user()->pengajar_foto}}" alt="profile" />
          <!--change to offline or busy as needed-->
        </div>
        <div class="nav-profile-text d-flex ml-0 mb-3 flex-column">
          <span class="font-weight-semibold mb-1 mt-2 text-center">{{ucwords(Auth::guard('pengajar')->user()->pengajar_nama)}}</span>
          <span class="text-secondary icon-sm text-center">{{ucwords(Auth::guard('pengajar')->user()->email)}}</span>
        </div>
      </a>
    </li>
    <li class="nav-item pt-3">
      <a class="nav-link d-block" href="index.html">
        {{-- <img class="sidebar-brand-logo" src="{{url('public')}}/assets/images/logo.svg" alt="" /> --}}
        {{-- <img class="sidebar-brand-logomini" src="{{url('public')}}/assets/images/logo-mini.svg" alt="" /> --}}
        <h3>QSMART</h3>
        <div class="small font-weight-light pt-1">SISTEM MANAGEMENT Q-SMART</div>
      </a>
    </li>
    <li class="pt-2 pb-1">
      <span class="nav-item-head">Menu</span>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{url('p/beranda')}}">
        <i class="mdi mdi-home menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{url('p/kelas')}}">
        <i class="mdi mdi-school menu-icon"></i>
        <span class="menu-title">Kelas Anda</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{url('p/absensi')}}">
        <i class="mdi mdi-book-open-page-variant menu-icon"></i>
        <span class="menu-title">Absensi</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{url('p/laporan')}}">
        <i class="mdi  mdi-folder-multiple menu-icon"></i>
        <span class="menu-title">Laporan</span>
      </a>
    </li>


    <li class="nav-item">
      <a class="nav-link" href="{{url('p/profil')}}">
        <i class="mdi mdi-contacts menu-icon"></i>
        <span class="menu-title">Profil Akun</span>
      </a>
    </li>
    
  </ul>
</nav>
@endif