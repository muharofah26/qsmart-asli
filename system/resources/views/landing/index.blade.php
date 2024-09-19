<!DOCTYPE html>
<html lang="en">
<head>
	@include('landing.section.assets')
</head>
<body>

	
	@include('landing.section.navbar')
	<!-- END nav -->
	
	<div class="hero-wrap js-fullheight" style="background-image: url('{{asset("system/public")}}/{{$website->gambar_utama}}');">
		<div class="overlay"></div>
		<div class="container">
			<div class="row no-gutters slider-text js-fullheight align-items-center" data-scrollax-parent="true">
				<div class="col-md-7 ftco-animate">
					{{-- <span class="subheading">Welcome to Pacific</span> --}}
					<h1 class="mb-4 "><b>Rumah Belajar</b> <br> <b>Qsmart</b> </h1>
					<p>Tingkatkan Prestasi Akademis Anda dengan Rumbel Qsmart Ketapang! Di sini, kami menawarkan program bimbingan belajar yang dirancang khusus untuk membantu Anda meraih nilai tertinggi. Dengan metode pembelajaran yang inovatif dan pengajar berpengalaman, Anda akan mendapatkan dukungan penuh dalam setiap langkah menuju kesuksesan.</p>
					<a href="{{url('daftar-bimbel')}}" class="btn btn-primary btn-lg text-white">Daftar Bimbel</a>
				</div>
			</div>
		</div>
	</div>
	<section class="ftco-section ftco-no-pb ftco-no-pt">
		<div class="container">
			<div class="row">

				
	<!-- 			
				<div class="col-md-12">
					<div class="ftco-search d-flex justify-content-center">
						<div class="row">
							

							<div class="col-md-12 mt-5">
								<div id="carouselExampleControls" class="carousel slide mb-5" data-ride="carousel">
									<div class="carousel-inner">
										<div class="carousel-item shadow active" style="border: 5px solid #c70039; border-radius: 15px">
											<img src="{{url('public/landing/slider/1.png')}}" style="border-radius: 12px" class="d-block hadow w-100" alt="...">
										</div>
										<div class="carousel-item shadow" style="border: 5px solid #c70039; border-radius: 15px">
											<img src="{{url('public/landing/slider/2.jpg')}}" style="border-radius: 12px" class="d-block w-100" alt="...">
										</div>
										<div class="carousel-item shadow" style="border: 5px solid #c70039; border-radius: 15px">
											<img src="{{url('public/landing/slider/3.jpg')}}" style="border-radius: 12px" class="d-block w-100" alt="...">
										</div>
									</div>
									<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
										<span class="carousel-control-prev-icon" aria-hidden="true"></span>
										<span class="sr-only">Previous</span>
									</a>
									<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
										<span class="carousel-control-next-icon" aria-hidden="true"></span>
										<span class="sr-only">Next</span>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div> -->
			</div>
		</section>

		<section class="ftco-section services-section bg-danger text-white">
			<div class="container">
				<div class="row d-flex">

					

					<div class="col-md-6 order-md-last heading-section pl-md-5 ftco-animate d-flex align-items-center">
						<div class="w-100">
							<span class="subheading text-white">Tentang Qsmart</span>
							<h2 class="mb-4 text-white">Apa itu QSMART?</h2>
							<p>{!!$website->tentang!!}</p>
							<p><a href="{{url('daftar-bimbel')}}" class="btn btn-warning  text-white py-3 px-4">Daftar Anggota Qsmart</a></p>
						</div>
					</div>
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
								<div class="services services-1 color-1 d-block img" style="background-image: url(public/logo/tk.png); height:200px">
									<div class="media-body">
										
										
									</div>
								</div>      
							</div>
							<div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
								<div class="services services-1 color-2 d-block img" style="background-image: url(public/logo/sd.png); height:200px">
									<div class="media-body">
									</div>
								</div>    
							</div>
							<div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
								<div class="services services-1 color-3 d-block img" style="background-image: url(public//logo/smp.png); height:200px);">
									<div class="media-body">
										
									</div>
								</div>      
							</div>
							<div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
								<div class="services services-1 color-4 d-block img" style="background-image: url(public/logo/sma.png); height:200px;">
									<div class="media-body">
									</div>
								</div>      
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		

		
	<!-- 	
		<section class="ftco-section ftco-about img"style="background-image: url(public/landing/slider/1.png);">
			<div class="overlay"></div>
			<div class="container py-md-5">
				<div class="row py-md-5">
					<div class="col-md d-flex align-items-center justify-content-center">
						<a href="https://vimeo.com/45830194" class="icon-video popup-vimeo d-flex align-items-center justify-content-center mb-4">
							<span class="fa fa-play"></span>
						</a>
					</div>
				</div>
			</div>
		</section>
 -->
		<!-- <section class="ftco-section ftco-about ftco-no-pt img">
			<div class="container">
				<div class="row d-flex">
					<div class="col-md-12 about-intro">
						<div class="row">
							<div class="col-md-5 d-flex align-items-stretch">
								<div class="img d-flex w-100 align-items-center justify-content-center" style="background-image:url(public/landing/images/person.webp);">
								</div>
							</div>
							<div class="col-md-7 pl-md-5 py-5">
								<div class="row justify-content-start pb-3">
									<div class="col-md-12 heading-section ftco-animate">
										<h2 class="mb-4 text-danger">Solusi untuk Belajar Super Cepat dan Tepat!</h2>
										<p>Ikuti rumah belajar qsmart yang dimentor oleh guru guru berpendidikan tinggi</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
 -->
		


		<footer class="ftco-footer bg-bottom ftco-no-pt" style="background-image: url(public/landing/images/bg_3.jpg);">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">

						<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Rumbel Qsmart
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
						</div>
					</div>
				</div>
			</footer>
			
			

			<!-- loader -->
			<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

			@include('landing.section.js')
		</body>
		</html>