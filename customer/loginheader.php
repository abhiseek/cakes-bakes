<!DOCTYPE html>
<html lang="en">
<?php 
$email=$_SESSION['email'];
$user=$_SESSION['fname'];
?>

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Cakes&Bakes.</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">


      <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Resort Inn Responsive , Smartphone Compatible web template , Samsung, LG, Sony Ericsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- //for-mobile-apps -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="assets/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/chocolat.css" type="text/css" media="screen">
    <link href="assets/css/easy-responsive-tabs.css" rel='stylesheet' type='text/css'/>
    <link rel="stylesheet" href="assets/css/flexslider.css" type="text/css" media="screen" property="" />
    <link rel="stylesheet" href="assets/css/jquery-ui.css" />
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <script type="text/javascript" src="assets/js/modernizr-2.6.2.min.js"></script>
    <!--fonts-->
    <link href="//fonts.googleapis.com/css?family=Oswald:300,400,700" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Federo" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <!--//fonts-->

  
  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <a href="home.php" class="logo d-flex align-items-center me-auto me-lg-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1><span>Cakes</span>&Bakes<span>.</span></h1>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="home.php">Home</a></li>
          <!-- <li><a href="home.php/#about">About</a></li> -->
          <li><a href="displaycategory.php">Menu</a></li>
          <!-- <li><a href="<?=BASE_URL?>customer/home.php/#about">About</a></li>
          <li><a href="#events">Events</a></li>
          <li><a href="#chefs">Chefs</a></li>
          <li><a href="#gallery">Gallery</a></li> -->
          <li><a href="viewcart.php">view cart</a></li>
          <li><a href="userreport2.php">ordered</a></li>
          <li><a href="viewcancel.php">cancel</a></li>
          <!-- <li><a href="#chefs">Chefs</a></li>
          <li><a href="#gallery">Gallery</a></li> -->
          <li class="dropdown"><a href="#"><b><?=$user?></b> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
            <li><a href="#"><b>PROFILE</b></a></li>
              <li ><a href="#"><span><?=$email?></span> </a>
              <!-- <i class="bi bi-chevron-down dropdown-indicator"></i> -->
                <ul>
                  <li><a href="#"></a></li>
                  
                  <!-- <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li> -->
                </ul>
              </li>
              <li><a href="destroy.php">logout</a></li>
              <!-- <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li> -->
            </ul>
          </li>
          
       

      <!-- <a class="btn-book-a-table" href="#contact">Contact</a>
      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i> -->
      </ul>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="container">
        <div  class="d-flex justify-content-between align-items-center">
          <!-- <h2>Sample Inner Page</h2> -->
          <ol >
            <!-- <li><a href="home.php">Home</a></li> -->
            <!-- <li>Menu</li> -->
          </ol>
        </div>

      </div>
    </div><!-- End Breadcrumbs -->

    <!-- <section class="sample-page">
      
      <div class="title-w3-agileits title-black-wthree" data-aos="fade-up">
<div class="plans-section" >
				 
        <h1 >
          CATEGORY
        </h1>

      </div>
    </section> -->
  </main><!-- End #main -->


 