<!DOCTYPE html>
<html lang="en">
<?php session_start();?>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/dashcss.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Lumia - v2.2.1
  * Template URL: https://bootstrapmade.com/lumia-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body onload="funvis()">
<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center">
  <div class="container d-flex align-items-center">

    <div class="logo mr-auto">
      <a href="index.html"><img src="assets/img/logomod.png" alt="" class="img-fluid"></a>

    </div>

    <nav class="nav-menu d-none d-lg-block">
      <ul>
        <li class="active"><a href="index.html">Home</a></li>
        <li class="drop-down"><a href="">User</a>
          <ul>
            <li><a href="#team">Profile</a></li>
            <li class="contact Us"><a href="index.html">logout</a>

            </li>
          </ul>
        </li>
        <li><a href="#contact">Blog</a></li>

      </ul>
    </nav><!-- .nav-menu -->

    <div class="header-social-links">
      <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
      <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
      <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
      <a href="#" class="linkedin"><i class="icofont-linkedin"></i></i></a>
    </div>

  </div>
</header><!-- End Header -->


<main class="container-fluid navbar-compensation" >
  <section class="container xl-top-margin">
    <div class="row l-bottom-pad">
      <div class="col-xs-offset-4 col-xs-4 col-sm-offset-0 col-sm-2 valign-middle nofloat">
        <div class="img-container profile-photo">
          <div class="img-profile-photo profile-photo__container" style="background-image: url(https://dcpd01profile.blob.core.windows.net/avatars/Avatar_01.svg);" >

          </div>
        </div>
      </div>
      <div class="col-xs-12 col-sm-6 valign-middle nofloat phone-center s-bottom-margin" >
        <h2 class="user-greeting no-bottom-margin" >Good evening!</h2>
        <span class="text-medium--light dc-text-italic" >Mr. <?php echo $_SESSION['username'] ?></span>
      </div>

    </div>
  </section>
  <section class="container xl-bottom-margin" >
    <center>

      <ul class="pagination pagination-lg" >
        <li>
          <a  onclick="funvis1()">Available Jobs</a>
        </li>
        <li>
          <a onclick="funvis2()" >Work History</a>
        </li>
        <li>
          <a onclick="funvis3()">Skills &amp; Badges</a>
        </li>
      </ul>
    </center>

    <div class="container" style="margin-bottom: 100px;  "><div class="tab-empty" id="ahmad1">
      <h2 class="title-medium m-bottom-margin">No jobs available.</h2>
      <p class="text-big">Awesome! You have no more jobs to do!<br>We will email you as soon as new work is available.<br>Meanwhile, why not grab yourself a cup of coffee?
      </p>
    </div>
      <div class="container" style="margin-bottom: 100px; "><div class="tab-empty" id="ahmad2">
        <h2 class="title-medium m-bottom-margin">no samples submitted </h2>
      </div>
        <div class="container" style="margin-bottom: 100px; "><div class="tab-empty" id="ahmad3">
          <h2 class="title-medium m-bottom-margin">Language Tests</h2>
          <p class="text-big">You can find language tests as a requirement when trying to access a job. When you pass a test, you improve your ranking and potential for being allocated to paying jobs. You need a validated payment method to do language tests. For more info, check out our
          </p>
        </div>
        </div>
  </section>


  <!-- ======= Breadcrumbs ======= -->


</main><!-- End #main -->



<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

<!-- Vendor JS Files -->
<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
<script src="assets/vendor/counterup/counterup.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/venobox/venobox.min.js"></script>
<script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>
<script>
  function funvis1() {
    var x = document.getElementById("ahmad1");
    var y = document.getElementById("ahmad2");
    var z = document.getElementById("ahmad3");
    if (x.style.display === "none") {
      x.style.display = "block";
      y.style.display = "none";
      z.style.display = "none";
    } else {
      x.style.display = "none";
      y.style.display = "none";
      z.style.display = "none";
    }
  }
  function funvis2() {
    var x = document.getElementById("ahmad1");
    var y = document.getElementById("ahmad2");
    var z = document.getElementById("ahmad3");
    if (y.style.display === "none") {
      y.style.display = "block";
      x.style.display = "none";
      z.style.display = "none";
    } else {
      x.style.display = "none";
      y.style.display = "none";
      z.style.display = "none";
    }
  }
  function funvis3() {
    var x = document.getElementById("ahmad1");
    var y = document.getElementById("ahmad2");
    var z = document.getElementById("ahmad3");
    if (z.style.display === "none") {
      z.style.display = "block";
      x.style.display = "none";
      y.style.display = "none";
    } else {
      x.style.display = "none";
      y.style.display = "none";
      z.style.display = "none";
    }
  }
  function funvis() {
    var x = document.getElementById("ahmad1");
    var y = document.getElementById("ahmad2");
    var z = document.getElementById("ahmad3");
    x.style.display = "none";
    y.style.display = "none";
    z.style.display = "none";
  }
</script>
</body>

</html>