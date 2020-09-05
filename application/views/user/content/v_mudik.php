
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Mudik - Gratis</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?php echo base_url();?>assets/user/img/favicon.png" rel="icon">
  <link href="<?php echo base_url();?>assets/user/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url();?>assets/user/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/user/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/user/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/user/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/user/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="<?php echo base_url()?>assets/user/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?php echo base_url()?>assets/user/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Plato - v2.1.0
  * Template URL: https://bootstrapmade.com/plato-responsive-bootstrap-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
  <div class="wrap">

    <!-- ======= Hero Section ======= -->
    <section id="hero">
      <div class="hero-container" data-aos="fade-up">
        <h1>Mudik Gratis</span></h1>
      </div>
    </section><!-- End Hero -->

    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center">
      <div class="container d-flex align-items-center">

        <div class="logo mr-auto">
          <h1 class="text-light"><a href="index.html"><span>Mudik</span></a></h1>
          <!-- Uncomment below if you prefer to use an image logo -->
          <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>
        <nav class="nav-menu d-none d-lg-block">
          <ul>
            <li class=""><a href="#home">Home</a></li>
            <li><a href="#booking">Booking Ticket</a></li>
             <li><a href="#status">Status Tiket</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><a href="<?php echo site_url('mudik/logout'); ?>">Logout</a></li>
          </ul>
        </nav><!-- .nav-menu -->

      </div>
    </header><!-- End Header -->

    <main id="main">

    <!-- ======= Home ======= -->
      <section id="home" class="home">
        <div class="container">

          <div class="row">
            <div class="col-xl-7 pt-4 pt-lg-0 d-flex align-items-stretch">
              <div class="content d-flex flex-column justify-content-center" data-aos="fade-left">
                <h3>Tips Mudik</h3>
                <div class="row">
                  <div class="col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="100">
                    <i class="bx bx-receipt"></i>
                    <h4>1. Periksa Kondisi Kendaraan</h4>
                    <p>Hal utama dan paling penting dilakukan sebelum mudik adalah memeriksa kondisi kendaraan Anda terlebih dulu.</p>
                  </div>
                  <div class="col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="200">
                    <i class="bx bx-cube-alt"></i>
                    <h4>2.Bawa Uang Tunai Secukupnya</h4>
                    <p>Membawa uang tunai tergolong penting di saat Anda mudik. Sebab, selama perjalanan menuju kampung halaman, tidak selalu ada mesin ATM dan tidak semua toko bisa dibayar dengan kartu debit atau kartu kredit.</p>
                  </div>
                  <div class="col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="300">
                    <i class="bx bx-images"></i>
                    <h4>3. Bawa Makanan dan Minuman Secukupnya</h4>
                    <p>Kemacetan saat mudik sering terjadi. Macet bisa terjadi di mana saja, seperti saat berada di tol, di jalanan panjang atau jalanan kecil yang menjadi jalur mudik.</p>
                  </div>
                  <div class="col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="400">
                    <i class="bx bx-shield"></i>
                    <h4>4. Aktifkan GPS atau Pakai Aplikasi Peta</h4>
                    <p>Khusus bagi Anda yang tidak hafal jalan, atau tertarik untuk mencari jalan mudik alternatif guna menghindari kemacetan, ada baiknya mengaktifkan GPS.</p>
                  </div>
                </div>
              </div><!-- End .content-->
            </div>
          </div>

        </div>
      </section><!-- End Section -->


       <!-- ======= Contact Us Section ======= -->
      <section id="booking" class="faq">
        <div class="container">

          <div class="section-title" data-aos="fade-down">
            <span>Booking Ticket</span>
            <h2>Booking Ticket</h2>
          </div>
          <form action="<?php echo site_url('user/bookingticket'); ?>" method="POST" class="register-form" id="login-form" data-aos="fade-up" data-aos-delay="400">
              <input type="hidden" value="" name="id"/> 
              <input type="hidden" value="<?=$this->session->userdata('id')?>" name="id_login"/> 
            <div class="form-group">
              <label for="nama">Nama</label>
              <input type="text" class="form-control" name="nama" id="nama" aria-describedby="emailHelp" placeholder="Nama">
            </div>
            <div class="form-group">
              <label for="tranportasi">Moda Transportasi</label>
              <select class="form-control" name="transportasi" id="transportasi">
              <?php 
              $no = 1;
              foreach($data as $u){ 
              ?>
              <option><?php echo $u->transportasi ?></option>
              <?php } ?>              
             </select>
              </div>
              <div class="form-group">
              <label for="tranportasi">Rute</label>
              <select class="form-control" name="rute" id="rute">
              <?php 
              $no = 1;
              foreach($data as $u){ 
              ?>
              <option><?php echo $u->rute ?></option>
               <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label for="nama">Jadwal</label>
              <input type="date" class="form-control" name="jadwal" id="jadwal" aria-describedby="emailHelp" placeholder="Jadwal">
             </div>
             <div class="form-group">
              <label for="rute">Jumlah Penumpang</label>
              <select class="form-control" name="jumlahpenumpang" id="jumlahpenumpang">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
              <small id="" class="form-text text-muted">Batas Penumpang 5orang</small>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>

        </div>
      </section><!-- End Contact Us Section -->

        <!-- ======= Contact Us Section ======= -->
      <section id="status" class="faq">
        <div class="container">

          <div class="section-title" data-aos="fade-down">
            <span>Ticket</span>
            <h2>Ticket</h2>
            <?php if ($booking->status === 'Setuju'): ?>
                      <a href="<?php echo site_url('user/downloadtiket'); ?>">Download file</a>   
              <?php else: ?>
                      Belum diverfikasi Admin
              <?php endif ?>
           
          </div>
        </div>
      </section><!-- End Contact Us Section -->


      <!-- ======= Clients Section ======= -->
     <section id="contact" class="contact">
        <div class="container">

          <div class="section-title" data-aos="fade-down">
            <span>Contact Us</span>
            <h2>Contact Us</h2>
          </div>

          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-12" data-aos="fade-up" data-aos-delay="100">
              <div class="info-box">
                <i class="bx bx-map"></i>
                <h3>Our Address</h3>
                <p>A108 Adam Street, New York, NY 535022</p>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="200">
              <div class="info-box">
                <i class="bx bx-envelope"></i>
                <h3>Email Us</h3>
                <p>info@example.com<br>contact@example.com</p>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="300">
              <div class="info-box">
                <i class="bx bx-phone-call"></i>
                <h3>Call Us</h3>
                <p>+1 5589 55488 55<br>+1 6678 254445 41</p>
              </div>
            </div>
          </div>

          <form action="forms/contact.php" method="post" role="form" class="php-email-form mt-4" data-aos="fade-up" data-aos-delay="400">
            <div class="form-row">
              <div class="col-md-6 form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validate"></div>
              </div>
              <div class="col-md-6 form-group">
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
      </section><!-- End Contact Us Section -->
<!-- End Contact Us Section -->

    

    <!-- ======= Footer ======= -->
    <footer id="footer">

      <div class="footer-newsletter">
        <div class="container">
        <div class="copyright">
          &copy; Copyright <strong><span>Plato</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/plato-responsive-bootstrap-website-template/ -->
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
      </div>
    </footer><!-- End Footer -->

  </div>

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?php echo base_url()?>assets/user/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url()?>assets/user/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url()?>assets/user/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="<?php echo base_url()?>assets/user/vendor/php-email-form/validate.js"></script>
  <script src="<?php echo base_url()?>assets/user/vendor/jquery-sticky/jquery.sticky.js"></script>
  <script src="<?php echo base_url()?>assets/user/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?php echo base_url()?>assets/user/vendor/venobox/venobox.min.js"></script>
  <script src="<?php echo base_url()?>assets/user/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="<?php echo base_url()?>assets/user/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="<?php echo base_url()?>assets/user/js/main.js"></script>

</body>

</html>