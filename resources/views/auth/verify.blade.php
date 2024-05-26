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
    .close.close-button {
        font-size: 20px;
        border: none;
        background: none;
        position: absolute;
        right: 10px;
        top: 10px;
    }

  </style>
</head>

<body class="">
  <main class="main-content  mt-0">
    <section class="min-vh-100 mb-8">
      <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" >
        <span class="mask"></span>
        <div class="container">
          <div class="row justify-content-center">
            <img src="" alt="">
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row mt-lg-n10 mt-md-n11 mt-n10">
          <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
            <div class="card z-index-0" style="margin-top: -50px;">
                <div class="card-header text-center pt-4">
                    <h5>Verify Your Email Address</h5>
                </div>
                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    <script>
                        function closeAlert() {
                            var alert = document.getElementById('successAlert');
                            alert.style.display = 'none';
                        }
                    </script>


                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <div class="text-center">
                            <button type="submit" class="btn w-100 mt-4 mb-0" id="login-btn">
                                {{ __('click here to request another') }}
                            </button>
                        </div>
                    </form>
                </div>
                <div class="image-container">
                    <img src="{{ asset('img/aa.png') }}" alt=""  style="width: 300px; height: 300px; margin-left: 600px; margin-top: -19px; border-bottom-right-radius: 20px;">
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
