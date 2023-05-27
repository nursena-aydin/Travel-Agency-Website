<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Gezinti - Kullanıcı Sayfası</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style1.css">
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

</head>
<body>
    <!-- Topbar Start -->
    <div class="container-fluid bg-dark px-5 d-none d-lg-block">
        <div class="row gx-0">
            <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <small class="me-3 text-light"><i class="fa fa-map-marker-alt me-2"></i>Küçükçekmece/İstanbul, Türkiye</small>
                    <small class="me-3 text-light"><i class="fa fa-phone-alt me-2"></i>+90 534 879 5544</small>
                    <small class="text-light"><i class="fa fa-envelope-open me-2"></i>gezinti@gmail.com</small>
                </div>
            </div>
            <div class="col-lg-4 text-center text-lg-end">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="https://twitter.com/zaimuniv?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor" target="_blank"><i class="fab fa-twitter fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="https://www.facebook.com/zaimuniv/?locale=tr_TR" target="_blank"><i class="fab fa-facebook-f fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="https://www.linkedin.com/school/zaimuniv/?original_referer=https%3A%2F%2Fwww%2Egoogle%2Ecom%2F&originalSubdomain=tr" target="_blank"><i class="fab fa-linkedin-in fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="https://www.instagram.com/zaimuniv/" target="_blank"><i class="fab fa-instagram fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle" href="https://www.youtube.com/@izuniversite/featured" target="_blank"><i class="fab fa-youtube fw-normal"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar & Hero Start -->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
            <a href="index.html" class="navbar-brand p-0">
                <h1 class="text-primary m-0"><i class="fa fa-map-marker-alt me-3"></i>Gezinti</h1>
                <!-- <img src="img/logo.png" alt="Logo"> -->
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="index.html" class="nav-item nav-link">Ana Sayfa</a>
                    <a href="about.html" class="nav-item nav-link active">Hakkımızda</a>
                    <a href="service.html" class="nav-item nav-link">Hizmetlerimiz</a>
                    <a href="package.html" class="nav-item nav-link">Paketlerimiz</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Hızlı Erişim</a>
                        <div class="dropdown-menu m-0">
                            <a href="destination.html" class="dropdown-item">Varış Noktaları</a>
                            <a href="booking.php" class="dropdown-item">Rezervasyon</a>
                            <a href="team.html" class="dropdown-item">Seyahat Rehberlerimiz</a>
                            <a href="testimonial.html" class="dropdown-item">Referanslar</a>
                        </div>
                    </div>
                    <a href="contact.html" class="nav-item nav-link">İletişim</a>
                </div>
                <a href="login_form.php" class="btn btn-primary rounded-pill py-2 px-4">Kayıt Ol</a>
            </div>
        </nav>

        <div class="container-fluid bg-primary py-5 mb-5 giris-header">
            <div class="container py-5">
                <div class="row justify-content-center py-5">
                    <div class="container">

   <div class="content">
      <h3>Merhaba, <span>Kullanıcı</span></h3>
      <h1>Hoş Geldin <span><?php echo $_SESSION['user_name'] ?></span></h1>
      <p>Burası Kullanıcı Sayfası</p>
      <a href="login_form.php" class="btn">Giriş Yap</a>
      <a href="register_form.php" class="btn">Kayıt Ol</a>
      <a href="logout.php" class="btn">Çıkış Yap</a>
   </div>

</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar & Hero End -->

</div>

</body>
</html>