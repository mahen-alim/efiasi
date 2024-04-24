<!--
=========================================================
* Soft UI Dashboard - v1.0.7
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard
* Copyright 2023 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Soft UI Dashboard by Creative Tim
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="{{ asset ('css/nucleo-icons.css')}}" rel="stylesheet" />
  <link href="{{ asset ('css/nucleo-svg.css')}}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="{{ asset ('css/nucleo-svg.css')}}" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="{{ asset ('css/soft-ui-dashboard.css?v=1.0.7')}}" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Kanit&display=swap" rel="stylesheet">
  <style>
    body{
        font-family: "DM Sans", sans-serif;
        overflow-y: hidden; 
    }
    span {
        background-image: linear-gradient(to right top, #FF8577, #FFD8C2);
    
    }
    #title{
        margin-top: -20px;
    }
    .card{
        margin-top:-50px;
    }
    #login-btn{
        border: 1px solid #FF8577;
        color: #FF8577;
    }
    #login-btn:hover{
        background-image: linear-gradient(to right top, #FF8577, #FFD8C2);
        color: white;
        border: none;
    }
    #regis-btn{
        color: black;
    }
    #regis-btn:hover{
        text-decoration: underline;
    }
    #link-reset{
        margin-top: -20px;
    }
    .input:focus {
        border-color: #FF8577 !important;
    }

  </style>
</head>

<body class="">
  <main class="main-content  mt-0">
    <section class="min-vh-100 mb-8">
      <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg">
        <span class="mask"></span>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-5 text-center mx-auto" id="title">
              {{-- <h3 class="text-white mb-2">Selamat Datang!</h3>
              <p class="text-lead text-white">Masukkan email dan password untuk masuk ke menu dashboard.</p> --}}
            </div>
          </div>
        </div>
      </div>
      <div class="container" style="margin-top: -300px;">
        <div class="row mt-lg-n10 mt-md-n11 mt-n10">
          <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
            <div class="card z-index-0" style="margin-top: -50px;">
              <div class="card-header text-center pt-4">
                <h5>Login with</h5>
              </div>
            <div class="row px-xl-5 px-sm-4 px-3">
                <div class="col-3 me-auto px-1 mx-auto">
                  <a class="btn btn-outline-light w-100" href="{{ route('google-auth') }}">
                    <svg width="24px" height="32px" viewBox="0 0 64 64" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                      <g id="Artboard" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="google-icon" transform="translate(3.000000, 2.000000)" fill-rule="nonzero">
                          <path d="M57.8123233,30.1515267 C57.8123233,27.7263183 57.6155321,25.9565533 57.1896408,24.1212666 L29.4960833,24.1212666 L29.4960833,35.0674653 L45.7515771,35.0674653 C45.4239683,37.7877475 43.6542033,41.8844383 39.7213169,44.6372555 L39.6661883,45.0037254 L48.4223791,51.7870338 L49.0290201,51.8475849 C54.6004021,46.7020943 57.8123233,39.1313952 57.8123233,30.1515267" id="Path" fill="#4285F4"></path>
                          <path d="M29.4960833,58.9921667 C37.4599129,58.9921667 44.1456164,56.3701671 49.0290201,51.8475849 L39.7213169,44.6372555 C37.2305867,46.3742596 33.887622,47.5868638 29.4960833,47.5868638 C21.6960582,47.5868638 15.0758763,42.4415991 12.7159637,35.3297782 L12.3700541,35.3591501 L3.26524241,42.4054492 L3.14617358,42.736447 C7.9965904,52.3717589 17.959737,58.9921667 29.4960833,58.9921667" id="Path" fill="#34A853"></path>
                          <path d="M12.7159637,35.3297782 C12.0932812,33.4944915 11.7329116,31.5279353 11.7329116,29.4960833 C11.7329116,27.4640054 12.0932812,25.4976752 12.6832029,23.6623884 L12.6667095,23.2715173 L3.44779955,16.1120237 L3.14617358,16.2554937 C1.14708246,20.2539019 0,24.7439491 0,29.4960833 C0,34.2482175 1.14708246,38.7380388 3.14617358,42.736447 L12.7159637,35.3297782" id="Path" fill="#FBBC05"></path>
                          <path d="M29.4960833,11.4050769 C35.0347044,11.4050769 38.7707997,13.7975244 40.9011602,15.7968415 L49.2255853,7.66898166 C44.1130815,2.91684746 37.4599129,0 29.4960833,0 C17.959737,0 7.9965904,6.62018183 3.14617358,16.2554937 L12.6832029,23.6623884 C15.0758763,16.5505675 21.6960582,11.4050769 29.4960833,11.4050769" id="Path" fill="#EB4335"></path>
                        </g>
                      </g>
                    </svg>
                  </a>
                </div>
                <div class="mt-2 position-relative text-center">
                  <p class="text-sm font-weight-bold mb-2 text-secondary text-border d-inline z-index-2 bg-white px-3">
                    or
                  </p>
                </div>
            </div>
              <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email">{{ __('Email Address') }}</label>                         
                                <!-- HTML -->
                                <input id="email" type="email" class="form-control input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <h5 class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </h5>
                                @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <h5 class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </h5>
                                @enderror
                        </div>

                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        
                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                        
                        <div class="text-center">
                            <button type="submit" class="btn w-100 mt-4 mb-0" id="login-btn">
                                {{ __('Login') }}
                            </button>
                        </div>
                                      

                    </form>
                    </div>
                    <div class="card-footer text-center pt-0 px-lg-2 px-1 mt-5">
                        <p class="mb-4 text-sm mx-auto" id="link-reset">
                          Don't Have an Account?
                          <a href="{{ route('register') }}" class="font-weight-bold" id="regis-btn">
                              {{ __('Register Now?') }}
                          </a>
                        </p>
                       
                        <p class="mb-4 text-sm mx-auto" id="link-reset">
                            Forgot Your Password?
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="font-weight-bold" id="regis-btn">
                                    {{ __('Reset Now!') }}
                                </a>
                            @endif
                        </p>                    
                    </div>
                    
                  </div>
                  <div class="image-container">
                      <img src="{{ asset('img/aa.png') }}" alt=""  style="width: 300px; height: 300px; margin-left: 600px; margin-top: -180px; border-bottom-right-radius: 20px;">
                  </div>
                  
                  <div class="image-container2">
                      <img src="{{ asset('img/aa.png') }}" alt="" style="width: 300px; height: 300px; transform: scaleX(-1); margin-left: -500px;  margin-top: -330px; border-bottom-right-radius: 20px;">
                  </div>
                
          </div>
        </div>
      </div>
    </section>
  </main>
  <!--   Core JS Files   -->
  <script src="{{ asset ('js/core/popper.min.js') }}"></script>
  <script src="{{ asset ('js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset ('js/plugins/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ asset ('js/plugins/smooth-scrollbar.min.js') }}"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset ('js/soft-ui-dashboard.min.js?v=1.0.7"></script>
</body>

</html>