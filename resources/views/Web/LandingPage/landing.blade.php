<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Landing Page</title>
    <link href="{{ asset('assets/img/laptop.png') }}" rel="icon">
    <!-- Bootstrap CSS -->
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/vendor/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
  </head>
  <body>
      
    <header id="header" class="fixed-top header-transparent">
        <div class="container-fluid">

            <div class="row justify-content-center">
                <div class="col-xl-11 d-flex align-items-center">
                    <h1 class="logo mr-auto"><a href="index.html">Laptop</a></h1>
                    <nav class="nav-menu d-none d-lg-block">
                        <ul>
                            <li class="active"><a href="{{ route('dashboard') }}">Home</a></li>
                            @guest
                                <li><a href="#about">About Us</a></li>
                                <li><a href="#contact">Contact Us</a></li>
                                <li><a href="{{ __('login') }}">Login</a></li>
                                <li><a href="{{ __('register') }}">Register</a></li>
                                @else
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </a>
                            @endguest
                        </ul>
                    </nav><!-- .nav-menu -->
                </div>
            </div>
        </div>
    </header><!-- End Header -->

    <!-- ======= Intro Section ======= -->
    <section id="intro">
        <div class="intro-container">
        <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">

            <ol class="carousel-indicators"></ol>

            <div class="carousel-inner" role="listbox">

            <div class="carousel-item active" style="background-image: url(img/laptop1.jpg)">
                <div class="carousel-container">
                <div class="container">
                    <h2 class="animate__animated animate__fadeInDown">SISTEM PENDUKUNG KEPUTUSAN PEMILIHAN LAPTOP</h2>
                    <p class="animate__animated animate__fadeInUp">Mencari sebuah informasi tentang laptop agar dengan raking yang terbaik dan spesifikasi laptop yang sesuai dengan kebutuhan.</p>
                    
                </div>
                </div>
            </div>

            <div class="carousel-item" style="background-image: url(img/laptop2.jpg)">
                <div class="carousel-container">
                <div class="container">
                    <h2 class="animate__animated animate__fadeInDown">SISTEM PENDUKUNG KEPUTUSAN PEMILIHAN LAPTOP</h2>
                    <p class="animate__animated animate__fadeInUp">Mencari sebuah informasi tentang laptop agar dengan raking yang terbaik dan spesifikasi laptop yang sesuai dengan kebutuhan.</p>
                    
                </div>
                </div>
            </div>

            <div class="carousel-item" style="background-image: url(img/laptop3.jpg)">
                <div class="carousel-container">
                <div class="container">
                    <h2 class="animate__animated animate__fadeInDown">SISTEM PENDUKUNG KEPUTUSAN PEMILIHAN LAPTOP</h2>
                    <p class="animate__animated animate__fadeInUp">Mencari sebuah informasi tentang laptop agar dengan raking yang terbaik dan spesifikasi laptop yang sesuai dengan kebutuhan anda.</p>
                </div>
                </div>
            </div>

            </div>

            <a class="carousel-control-prev" href="#introCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon ion-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
            </a>

            <a class="carousel-control-next" href="#introCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon ion-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
            </a>

        </div>
        </div>
    </section><!-- End Intro Section -->

    <main id="main">

        
        <!-- ======= About Us Section ======= -->
        <section id="about">
        <div class="container" data-aos="fade-up">

            <header class="section-header">
            <h3>About Us</h3>
            <h4 class="d-flex justify-content-center">SISTEM PENDUKUNG KEPUTUSAN</h4>
            <p class="d-flex align-items-center">Sistem Pendukung Keputusan Laptop merupakan sistem untuk membantu para pengambil keputusan dengan menggunakan data yang diolah menjadi informasi untuk mengambil keputusan dari masalah semiterstruktur. Dalam implementasi SPK, hasil dari keputusan sistem bukan hal yang menjadi utama. 
                Sistem hanya menghasilkan keluaran yang mengkalulasi data – data sebagaimana pertimbangan seorang yang mengambil keputusan.</p>
            </header>

            <div class="row about-cols">

            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="about-col">
                <div class="img">
                    <img src="assets/img/about-mission.jpg" alt="" class="img-fluid">
                    <div class="icon"><i class="ion-ios-speedometer-outline"></i></div>
                </div>
                <h2 class="title"><a href="#">Our Mission</a></h2>
                <p>
                    mencari informasi tentang banyak nya laptop di pasaran yang memiliki spesifikasi dengan harga yang relatif.
                </p>
                </div>
            </div>

            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="about-col">
                <div class="img">
                    <img src="assets/img/about-plan.jpg" alt="" class="img-fluid">
                    <div class="icon"><i class="ion-ios-list-outline"></i></div>
                </div>
                <h2 class="title"><a href="#">Our Plan</a></h2>
                <p>
                    mendapatkan informasi laptop yang sesuai dengan budget dan kebutuhan masyarakat.
                </p>
                </div>
            </div>

            <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                <div class="about-col">
                <div class="img">
                    <img src="assets/img/about-vision.jpg" alt="" class="img-fluid">
                    <div class="icon"><i class="ion-ios-eye-outline"></i></div>
                </div>
                <h2 class="title"><a href="#">Our Vision</a></h2>
                <p>
                    melihat perbandingan harga serta spesifkasi laptop dan kebutuhan yang digunakan untuk masyarakat.
                </p>
                </div>
            </div>

            </div>

        </div>
        </section><!-- End About Us Section -->

        
       
       

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
            <h3>Contact Us</h3>
            <p>contact person</p>
            </div>

            <div class="row contact-info">

            <div class="col-md-4">
                <div class="contact-address">
                <i class="ion-ios-location-outline"></i>
                <h3>Address</h3>
                <address>Bekasi Selatan</address>
                </div>
            </div>

            <div class="col-md-4">
                <div class="contact-phone">
                <i class="ion-ios-telephone-outline"></i>
                <h3>Phone Number</h3>
                <p><a href="tel:+155895548855">0896027817010</a></p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="contact-email">
                <i class="ion-ios-email-outline"></i>
                <h3>Email</h3>
                <p><a href="mailto:info@example.com">sutrisnoario@gmail.com</a></p>
                </div>
            </div>

            </div>

            <div class="form">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                <div class="form-row">
                <div class="form-group col-md-6">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                    <div class="validate"></div>
                </div>
                <div class="form-group col-md-6">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                    <div class="validate"></div>
                </div>
                </div>
                <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validate"></div>
                </div>
                <div class="form-group">
                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                <div class="validate"></div>
                </div>
                <div class="mb-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
                </div>
                <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
            </div>

        </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">
        <div class="container ">
            <div class="row justify-content-between">

            <div class="col-lg-6 col-6 footer-info">
                <h3>SISTEM PENDUKUNG KEPUTUSAN PEMILIHAN LAPTOP</h3>
                <p>Mencari sebuah informasi tentang laptop agar dengan raking yang terbaik dan spesifikasi laptop yang sesuai dengan kebutuhan.</p>
            </div>
            <div class="col-lg-3 col-6 footer-info">
                <h3>Contact Us</h3>
                <p>
                    Bekasi Selatan, <br>
                    Jawa Barat<br>
                    <strong>Phone:</strong> 0896027817010<br>
                    <strong>Email:</strong> sutrisnoario@gmail.com<br>
                </p>
            </div>
            
        </div>
        </div>

        <div class="container">
        <div class="copyright">
            &copy; Copyright <strong>SPK</strong>
        </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    <!-- Uncomment below i you want to use a preloader -->
    <!-- <div id="preloader"></div> -->

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
    <script src="assets/vendor/aos/aos.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
  </body>
</html>