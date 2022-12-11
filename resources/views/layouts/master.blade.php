<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('custom.css')}}">
    @stack('css')
    <title>Master</title>
</head>
<body class="bg-cst">
  <nav class="navbar navbar-dark bg-primary navbar-expand-lg">
    <div class="container">
      <a class="navbar-brand" href="#">Irfan Top up</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Features</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Pricing</a>
          </li>
        </ul>
        <span class="navbar-text">
          Navbar text with an inline element
        </span>
      </div>
    </div>
  </nav>

@yield('content')
@stack('script')


<!-- Footer -->
<footer class="page-footer font-small blue pt-4 sticky-bottom">
  <div class="container">

  <!-- Footer Links -->
  <div class="container-fluid text-center text-md-left">

    <!-- Grid row -->
    <div class="row">

      <!-- Grid column -->
      <div class="col-md-6 mt-md-0 mt-3">

        <!-- Content -->
        <h5 class="text-uppercase text-color">Irfan Top Up</h5>
        <p class="text-color">Murah, Cepat, Mudah, Terpercaya dan Pelayanan 24 jam</p>

      </div>
      <!-- Grid column -->

      <hr class="clearfix w-100 d-md-none pb-3">

      <!-- Grid column -->
      <div class="col-md-3 mb-md-0 mb-3">

        <!-- Links -->
        <h5 class="text-uppercase text-color">Follow Us</h5>

        <ul class="list-unstyled">
          <li>
            <i class="fa fa-instagram text-color" aria-hidden="true"></i>
            <a href="#!">Instagram</a>
          </li>
          <li>
            <i class="fa fa-facebook-square text-color" aria-hidden="true"></i>
            <a href="#!">Facebook</a>
          </li>
          <li>
            <i class="fa fa-twitter-square text-color" aria-hidden="true"></i>
            <a href="#!">Twitter</a>
          </li>
        </ul>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-3 mb-md-0 mb-3">

        <!-- Links -->
        <h5 class="text-uppercase text-color">Contact Us</h5>

        <ul class="list-unstyled">
          <li>
            <i class="fa fa-whatsapp text-color" aria-hidden="true"></i>
            <a href="#!">Whatsapp</a>
          </li>
          <li>
            <i class="fa fa-telegram text-color" aria-hidden="true"></i>
            <a href="#!">Telegram</a>
          </li>
          <li>
            <i class="fa fa-instagram text-color" aria-hidden="true"></i>
            <a href="#!">Instagram</a>
          </li>
        </ul>

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Links -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3 text-color">© 2022 Copyright:
    <a href="/"> tokokelontongmasirfan.net</a>
  </div>
  <!-- Copyright -->

</div>
</footer>
<!-- Footer -->
</body>
</html>