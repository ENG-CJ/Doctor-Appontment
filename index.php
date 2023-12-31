<?php
include_once "./application/config/conn.db.php";

function getNumberRows($table)
{
  $num = 0;
  $sql = "SELECT COUNT(*) as count FROM $table";
  $result = DatabaseConnection::getConnection()->query($sql);
  if ($result) {
    $row = $result->fetch_assoc();
    $num = $row['count'];
  }

  return $num;
}


?>

<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
  <!-- Meta Tags -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="keywords" content="Site keywords here" />
  <meta name="description" content="" />
  <meta name="copyright" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Title -->
  <title>Doctor Care</title>

  <!-- Favicon -->
  <link rel="icon" href="img/favicon.png" />

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet" />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <!-- Nice Select CSS -->
  <link rel="stylesheet" href="css/nice-select.css" />
  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="css/font-awesome.min.css" />
  <!-- icofont CSS -->
  <link rel="stylesheet" href="css/icofont.css" />
  <!-- Slicknav -->
  <link rel="stylesheet" href="css/slicknav.min.css" />
  <!-- Owl Carousel CSS -->
  <link rel="stylesheet" href="css/owl-carousel.css" />
  <!-- Datepicker CSS -->
  <link rel="stylesheet" href="css/datepicker.css" />
  <!-- Animate CSS -->
  <link rel="stylesheet" href="css/animate.min.css" />
  <!-- Magnific Popup CSS -->
  <link rel="stylesheet" href="css/magnific-popup.css" />

  <!-- Medipro CSS -->
  <link rel="stylesheet" href="css/normalize.css" />
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="css/responsive.css" />
</head>

<body>
  <!-- Preloader -->
  <div class="preloader">
    <div class="loader">
      <div class="loader-outter"></div>
      <div class="loader-inner"></div>

      <div class="indicator">
        <svg width="16px" height="12px">
          <polyline id="back" points="1 6 4 6 6 11 10 1 12 6 15 6"></polyline>
          <polyline id="front" points="1 6 4 6 6 11 10 1 12 6 15 6"></polyline>
        </svg>
      </div>
    </div>
  </div>
  <!-- End Preloader -->

  <!-- Header Area -->
  <header class="header">
    <!-- Header Inner -->
    <div class="header-inner">
      <div class="container">
        <div class="inner">
          <div class="row">
            <div class="col-lg-3 col-md-3 col-12">
              <!-- Start Logo -->
              <div class="logo">
                <a href="index.html" style="font-size: 25px; margin-top: 17px">Doctor Care</a>
              </div>
              <!-- End Logo -->
              <!-- Mobile Nav -->
              <div class="mobile-nav"></div>
              <!-- End Mobile Nav -->
            </div>
            <div class="col-lg-7 col-md-9 col-12">
              <!-- Main Menu -->
              <div class="main-menu">
                <nav class="navigation">
                  <ul class="nav menu">
                    <li class="active"><a href="#">Home</a></li>

                    <li><a href="./application/">Login</a></li>
                  </ul>
                </nav>
              </div>
              <!--/ End Main Menu -->
            </div>
            <div class="col-lg-2 col-12">
              <div class="get-quote">
                <a href="./application/view/start.php" class="btn">Join</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/ End Header Inner -->
  </header>
  <!-- End Header Area -->

  <!-- Slider Area -->
  <section class="slider">
    <div class="hero-slider">
      <!-- Start Single Slider -->
      <div class="single-slider" style="background-image: url('images/slider2.jpg')">
        <div class="container">
          <div class="row">
            <div class="col-lg-7">
              <div class="text">
                <h1>
                  We Provide <span>Online</span> Medical Appointments
                  <span>Trust!</span>
                </h1>
                <p>
                  Seamlessly schedule your appointments with ease - anytime,
                  anywhere! Experience hassle-free booking with our online
                  appointment system for efficient, convenient, and timely
                  healthcare services.
                </p>
                <div class="button">
                  <a href="./application/view/start.php" class="btn">Join</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End Single Slider -->
      <!-- Start Single Slider -->
      <div class="single-slider" style="background-image: url('images/slider.jpg')">
        <div class="container">
          <div class="row">
            <div class="col-lg-7">
              <div class="text">
                <h1>Meet <span>Experienced</span> Doctors</h1>
                <p>
                  Connect with our team of experienced doctors and receive
                  expert care that's tailored to your unique health needs.
                  Your well-being is our priority.
                </p>
                <div class="button">
                  <a href="./application/view/start.php" class="btn">Join</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Start End Slider -->
      <!-- Start Single Slider -->
      <div class="single-slider" style="background-image: url('images/slider3.jpg')">
        <div class="container">
          <div class="row">
            <div class="col-lg-7">
              <div class="text">
                <h1>24/7 <span>Support</span></h1>
                <p>
                  Access our round-the-clock online appointment support for
                  convenient scheduling anytime, ensuring your health needs
                  are met with ease, no matter the hour
                </p>
                <div class="button">
                  <a href="./application/view/start.php" class="btn">Join</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End Single Slider -->
    </div>
  </section>
  <!--/ End Slider Area -->

  <!-- Start Fun-facts -->
  <div id="fun-facts" class="fun-facts section overlay">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6 col-12">
          <!-- Start Single Fun -->
          <div class="single-fun">
            <i class="icofont icofont-home"></i>
            <div class="content">
              <span class="counter"><?php echo getNumberRows("hospitals") ?></span>
              <p>Registered Hospitals</p>
            </div>
          </div>
          <!-- End Single Fun -->
        </div>
        <div class="col-lg-4 col-md-6 col-12">
          <!-- Start Single Fun -->
          <div class="single-fun">
            <i class="icofont icofont-user-alt-3"></i>
            <div class="content">
              <span class="counter"><?php echo getNumberRows("doctors") ?></span>
              <p>Specialist Doctors</p>
            </div>
          </div>
          <!-- End Single Fun -->
        </div>
        <div class="col-lg-4 col-md-6 col-12">
          <!-- Start Single Fun -->
          <div class="single-fun">
            <i class="icofont-simple-smile"></i>
            <div class="content">
              <span class="counter"><?php echo getNumberRows("patients") ?></span>
              <p>Happy Patients</p>
            </div>
          </div>
          <!-- End Single Fun -->
        </div>
      </div>
    </div>
  </div>
  <!--/ End Fun-facts -->

  <!-- Start Why choose -->
  <section class="why-choose section">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-title">
            <h2>We Offer Different Services To Improve Your Health</h2>
            <img src="images/section-img.png" alt="#" />
            <!-- <p>Lorem ipsum dolor sit amet consectetur adipiscing elit praesent aliquet. pretiumts</p> -->
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6 col-12">
          <!-- Start Choose Left -->
          <div class="choose-left">
            <h3>Who We Are</h3>
            <p>
              At Doctor Care, we are your dedicated platform for modern
              healthcare accessibility. Empowering patients and doctors alike,
              we strive to revolutionize the healthcare experience. With a
              commitment to innovation and compassionate care, we bridge the
              gap between patients and experienced healthcare providers in a
              seamless and convenient online environment
            </p>
            <!-- <p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. </p> -->
            <div class="row">
              <div class="col-lg-6">
                <ul class="list">
                  <li>
                    <i class="fa fa-caret-right"></i>Virtual Consultations
                  </li>
                  <li>
                    <i class="fa fa-caret-right"></i>Appointment Scheduling.
                  </li>
                  <li><i class="fa fa-caret-right"></i>Health Monitoring.</li>
                </ul>
              </div>
            </div>
          </div>
          <!-- End Choose Left -->
        </div>
        <div class="col-lg-6 col-12">
          <!-- Start Choose Rights -->
          <div class="choose-right">
            <div class="video-image">
              <!-- Video Animation -->
              <!-- <div class="promo-video">
									<div class="waves-block">
										<div class="waves wave-1"></div>
										<div class="waves wave-2"></div>
										<div class="waves wave-3"></div>
									</div>
								</div> -->
              <!--/ End Video Animation -->
              <a href="#" class="video video-popup mfp-iframe"><i class="fa fa-play"></i></a>
            </div>
          </div>
          <!-- End Choose Rights -->
        </div>
      </div>
    </div>
  </section>
  <!--/ End Why choose -->

  <!-- Start Appointment -->
  <section class="appointment">
    <div class="container">
      <div class="row">
        <div class="col-lg-12"></div>
      </div>
      <div class="row">
        <div class="col-lg-6 col-md-12">
          <div class="appointment-image">
            <img src="images/contact-img.png" alt="#" />
          </div>
        </div>
        <div class="col-lg-6 col-md-12 mt-5">
          <h2>We Are Always Ready to Help You. Book An Appointment</h2>
          <img src="images/section-img.png" class='mt-2' alt="#" />
          <!-- <p>Lorem ipsum dolor sit amet consectetur adipiscing elit praesent aliquet. pretiumts</p> -->
        </div>
      </div>
    </div>
  </section>
  <!-- End Appointment -->

  <!-- Footer Area -->
  <footer id="footer" class="footer">
    <!-- Footer Top -->

    <div class="copyright">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-12">
            <div class="copyright-content">
              <p>
                © Copyright 2023 | All Rights Reserved by
                <a href="#">@DoctorCare</a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/ End Copyright -->
  </footer>
  <!--/ End Footer Area -->

  <!-- jquery Min JS -->
  <script src="js/jquery.min.js"></script>
  <!-- jquery Migrate JS -->
  <script src="js/jquery-migrate-3.0.0.js"></script>
  <!-- jquery Ui JS -->
  <script src="js/jquery-ui.min.js"></script>
  <!-- Easing JS -->
  <script src="js/easing.js"></script>
  <!-- Color JS -->
  <script src="js/colors.js"></script>
  <!-- Popper JS -->
  <script src="js/popper.min.js"></script>
  <!-- Bootstrap Datepicker JS -->
  <script src="js/bootstrap-datepicker.js"></script>
  <!-- Jquery Nav JS -->
  <script src="js/jquery.nav.js"></script>
  <!-- Slicknav JS -->
  <script src="js/slicknav.min.js"></script>
  <!-- ScrollUp JS -->
  <script src="js/jquery.scrollUp.min.js"></script>
  <!-- Niceselect JS -->
  <script src="js/niceselect.js"></script>
  <!-- Tilt Jquery JS -->
  <script src="js/tilt.jquery.min.js"></script>
  <!-- Owl Carousel JS -->
  <script src="js/owl-carousel.js"></script>
  <!-- counterup JS -->
  <script src="js/jquery.counterup.min.js"></script>
  <!-- Steller JS -->
  <script src="js/steller.js"></script>
  <!-- Wow JS -->
  <script src="js/wow.min.js"></script>
  <!-- Magnific Popup JS -->
  <script src="js/jquery.magnific-popup.min.js"></script>
  <!-- Counter Up CDN JS -->
  <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
  <!-- Bootstrap JS -->
  <script src="js/bootstrap.min.js"></script>
  <!-- Main JS -->
  <script src="js/main.js"></script>
</body>

</html>