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
    <section class="vh-100">
        <div class="container py-5 h-100">
          <div class="row d-flex align-items-center justify-content-center h-100">
            <div class="col-md-8 col-lg-7 col-xl-6">
              <img src="{{url('public/logo/sma.png')}}"
                class="img-fluid" alt="Phone image">
            </div>
            <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                <center>
                    <h3>Selamat datang siswa Qsmart</h3>
                </center>
              <form action="{{url('pengajar-login')}}" method="post">
                @csrf
                <!-- Email input -->
                <div data-mdb-input-init class="form-outline mb-4">
                    <label class="form-label" for="form1Example13">Email address</label>
                  <input type="email" name="email" id="form1Example13" class="form-control form-control-lg" />
                </div>
      
                <!-- Password input -->
                <div data-mdb-input-init class="form-outline mb-4">
                    <label class="form-label" for="form1Example23">Password</label>
                  <input type="password" id="form1Example23" name="password" class="form-control form-control-lg" />
                </div>
      
                <div class="d-flex justify-content-around align-items-center mb-4">
                  <!-- Checkbox -->
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
                    <label class="form-check-label" for="form1Example3"> Remember me </label>
                  </div>
                  <a href="#!">Forgot password?</a>
                </div>
      
                <!-- Submit button -->
                <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg btn-block">Masuk</button>
      
               
              </form>
            </div>
          </div>
        </div>
      </section> 
</body>
</html>