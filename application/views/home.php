<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Malendro Putro Printing</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/bootstrap-icons/bootstrap-icons.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/boxicons/css/boxicons.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/glightbox/css/glightbox.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/remixicon/remixicon.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/swiper/swiper-bundle.min.css') ?>" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/css/own.css') ?>" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="<?= base_url('c_home') ?>">Malendro Printing</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><button type="button" class="btn btn-outline-primary text-own-white" data-bs-toggle="modal" data-bs-target="#login">Login</button></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <h3 style="background: rgba(255, 255, 255, 0.3);">Welcome to <strong>Malendro Printing</strong></h3>
      <h2>We print your document in easy way</h2>
      <a href="#services" class="btn-get-started scrollto">Get Started</a>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title">
          <h2>Services</h2>
          <h3>Kami menyajikan layanan yang <span>Keren!</span></h3>
          <p>Fokus kami yaitu memudahkan kamu untuk mencetak dokumen atau sesuai dengan kebutuhan kamu</p>
        </div>

        <div class="row justify-content-center">

          <div class="col-md-6 col-lg-3 d-flex d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-printer"></i></div>
              <h4 class="title"></h4>
              <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#dokumen">
                Cetak Dokumen
              </button>
              <p class="description open-poppins-400 text-own-black">Kamu bisa mencetak segala dokumen yang kamu inginkan</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-file"></i></div>
              <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#poster">
                Cetak Poster
              </button>
              <p class="description open-poppins-400 text-own-black">Cetak poster yang udah kamu design disini!</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-clipboard"></i></div>
              <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#banner">
                Cetak Banner
              </button>
              <p class="description open-poppins-400 text-own-black">Kamu bisa mencetak Banner kamu disini!</p>
            </div>
          </div>

        </div>


        <!-- Modal Dokumen -->
        <div class="modal fade" id="dokumen" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Dokumen</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="row d-flex justify-content-around">
                  <div class="col-sm-6">
                    <a href="<?= base_url('c_home/cek') ?>" class="open-poppins-400 btn btn-primary" style="margin-left: 2.5rem;">Cek Pesananmu</a>
                  </div>
                  <div class="col-sm-6">
                    <a href="<?= base_url('c_home/cetak/dokumen') ?>" class="open-poppins-400 btn btn-success" style="margin-left: 2.5rem;">Cetak Dokumen</a>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal Poster -->
        <div class="modal fade" id="poster" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Poster</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="row d-flex justify-content-around">
                  <div class="col-sm-6">
                    <a href="<?= base_url('c_home/cek') ?>" class="open-poppins-400 btn btn-primary" style="margin-left: 2.5rem;">Cek Pesananmu</a>
                  </div>
                  <div class="col-sm-6">
                    <a href="<?= base_url('c_home/cetak/poster') ?>" class="open-poppins-400 btn btn-success" style="margin-left: 2.5rem;">Cetak Poster</a>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal Banner -->
        <div class="modal fade" id="banner" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Banner</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="row d-flex justify-content-around">
                  <div class="col-sm-6">
                    <a href="<?= base_url('c_home/cek') ?>" class="open-poppins-400 btn btn-primary" style="margin-left: 2.5rem;">Cek Pesananmu</a>
                  </div>
                  <div class="col-sm-6">
                    <a href="<?= base_url('c_home/cetak/banner') ?>" class="open-poppins-400 btn btn-success" style="margin-left: 2.5rem;">Cetak Banner</a>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Services Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="container d-md-flex py-4">

            <div class="me-md-auto text-center text-md-start">
              <div class="copyright">
                &copy; Copyright <strong><span>Malendro Printing</span></strong>. All Rights Reserved
              </div>
              <div class="credits">
              </div>
            </div>
            <div class="social-links text-center text-md-right pt-3 pt-md-0">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Modal -->
  <div class="modal fade" id="login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content rounded">
        <form action="<?= base_url('c_home/proses_login') ?>" method="post">
          <div class="modal-body">
            <div class="h4 text-center">
              Login
            </div>
            <div class="mb-3">
              <label class="form-label">Username</label>
              <input type="text" name="username" class="form-control">
            </div>
            <div class="mb-3">
              <label class="form-label">Password</label>
              <input type="password" name="password" class="form-control">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <input type="submit" name="login" class="btn btn-primary" value="Login">
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Vendor JS Files -->
  <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/glightbox/js/glightbox.min.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/isotope-layout/isotope.pkgd.min.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/swiper/swiper-bundle.min.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/php-email-form/validate.js') ?>"></script>

  <!-- Template Main JS File -->
  <script src="<?= base_url('assets/js/main.js') ?>"></script>

</body>

</html>