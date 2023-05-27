<?php

@include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $date = strtotime($_POST['date']);
   $date = date('Y-m-d H:i:s', $date);
   $requests = mysqli_real_escape_string($conn, $_POST['requests']);
   $destination = $_POST['destination'];
   setcookie('user_id', create_unique_id(), time() + 60*60*24*30, '/');
   $booking_id = create_unique_id();
   

   $select = " SELECT * FROM user_form WHERE email = '$email' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

    $insert = "INSERT INTO booking(name, email, date, requests, destination, booking_id) VALUES('$name','$email', '$date', '$requests','$destination', '$booking_id')";
    mysqli_query($conn, $insert);
    header('location:login_form.php');

      
   }else{

    $error[] = 'Bu kullanıcı kayıtlı değil! Lütfen önce kayıt olun!';
      
   }

};


?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Gezinti - Rezervasyon</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    

    <!-- Favicon -->
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
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


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
                    <a href="about.html" class="nav-item nav-link">Hakkımızda</a>
                    <a href="service.html" class="nav-item nav-link">Hizmetlerimiz</a>
                    <a href="package.html" class="nav-item nav-link">Paketlerimiz</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown">Hızlı Erişim</a>
                        <div class="dropdown-menu m-0">
                            <a href="destination.html" class="dropdown-item">Varış Noktaları</a>
                            <a href="booking.php" class="dropdown-item active">Rezervasyon</a>
                            <a href="team.html" class="dropdown-item">Seyahat Rehberlerimiz</a>
                            <a href="testimonial.html" class="dropdown-item">Referanslar</a>
                        </div>
                    </div>
                    <a href="contact.html" class="nav-item nav-link">İletişim</a>
                </div>
                <a href="login_form.php" class="btn btn-primary rounded-pill py-2 px-4">Kayıt Ol</a>
            </div>
        </nav>

        <div class="container-fluid bg-primary py-5 mb-5 hero-header">
            <div class="container py-5">
                <div class="row justify-content-center py-5">
                    <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                        <h1 class="display-3 text-white animated slideInDown">Rezervasyon</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="index.html">Ana Sayfa</a></li>
                                <li class="breadcrumb-item"><a href="#">Hızlı Erişim</a></li>
                                <li class="breadcrumb-item text-white active" aria-current="page">Rezervasyon</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar & Hero End -->


    <!-- Process Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center pb-4 wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Süreç</h6>
                <h1 class="mb-5">3 Kolay Adım</h1>
            </div>
            <div class="row gy-5 gx-4 justify-content-center">
                <div class="col-lg-4 col-sm-6 text-center pt-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="position-relative border border-primary pt-5 pb-4 px-4">
                        <div class="d-inline-flex align-items-center justify-content-center bg-primary rounded-circle position-absolute top-0 start-50 translate-middle shadow" style="width: 100px; height: 100px;">
                            <i class="fa fa-globe fa-3x text-white"></i>
                        </div>
                        <h5 class="mt-4">Bir Hedef Seçin</h5>
                        <hr class="w-25 mx-auto bg-primary mb-1">
                        <hr class="w-50 mx-auto bg-primary mt-0">
                        <p class="mb-0">Sehayat etmek istediğiniz yerleri sitemizden araştırıp, hangi paketi seçeçeğinize kolayca karar verebilirsiniz.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 text-center pt-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="position-relative border border-primary pt-5 pb-4 px-4">
                        <div class="d-inline-flex align-items-center justify-content-center bg-primary rounded-circle position-absolute top-0 start-50 translate-middle shadow" style="width: 100px; height: 100px;">
                            <i class="fa fa-dollar-sign fa-3x text-white"></i>
                        </div>
                        <h5 class="mt-4">Çevrim içi Ödeme</h5>
                        <hr class="w-25 mx-auto bg-primary mb-1">
                        <hr class="w-50 mx-auto bg-primary mt-0">
                        <p class="mb-0">Size uygun olan paketi bulduktan sonra ödeme işlemini kolay ve hızlıca online şekilde sistemimiz üzerinden gerçekleştirebilirsiniz.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 text-center pt-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="position-relative border border-primary pt-5 pb-4 px-4">
                        <div class="d-inline-flex align-items-center justify-content-center bg-primary rounded-circle position-absolute top-0 start-50 translate-middle shadow" style="width: 100px; height: 100px;">
                            <i class="fa fa-plane fa-3x text-white"></i>
                        </div>
                        <h5 class="mt-4">Anında Uç</h5>
                        <hr class="w-25 mx-auto bg-primary mb-1">
                        <hr class="w-50 mx-auto bg-primary mt-0">
                        <p class="mb-0">Ödeme işleminizi gerçekleştirdikten sonra seçtiğiniz tarihler arasında uçuşa hazırsınız. Tatilinizin keyfini çıkartabilirsiniz.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Process Start -->


    <!-- Booking Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="booking p-5">
                <div class="row g-5 align-items-center">
                    <div class="col-md-6 text-white">
                        <h6 class="text-white text-uppercase">Rezervasyon</h6>
                        <h1 class="text-white mb-4">Online Rezervasyon</h1>
                        <p class="mb-4">Seyahat planlarınızın kontrolünü elinize alın. Rezervasyonlarınızı online olarak yönetin.</p>
                        <p class="mb-4">Varış noktanızı, seyahat tarihlerinizi ve kişsel bilgilerinizi girin. Size en uygun paketleri arayın ve seçiminizi yapın. Özel yemek siparişi ya da otel, araba kiralama ya da özel şoför hizmeti gibi hizmetleri "Özel İstekler" bölümünde belirtebilirsiniz. Tüm paket bilgilerinizi ve rezervasyon onayınızı e‑posta ile alın. Rezervasyon referans numaranızla hesabınıza online giriş yaparak seyahat planlarınızı yönetin.</p>
                        
                    </div>
                    <div class="col-md-6">
                        <h1 class="text-white mb-4">Tur Satın Al</h1>


                        <div class="form-container">

                        

                            <form action="" method="post">
                                <?php
                                    if(isset($error)){
                                        foreach($error as $error){
                                        echo '<span class="error-msg">'.$error.'</span>';
                                        };
                                    };
                                ?>
                                
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control bg-transparent" name="name" required placeholder="Adınız ve Soyadınız">
                                            <label for="name">Adınız ve Soyadınız</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="email" class="form-control bg-transparent" name="email" required placeholder="Email Adresiniz">
                                            <label for="email">Email Adresiniz</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating date" id="date3" data-target-input="nearest">
                                            <input type="date" class="form-control bg-transparent datetimepicker-input" name="date" required placeholder="Date & Time" data-target="#date3" data-toggle="datetimepicker" />
                                            <label for="date">Tarih & Saat</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <select class="form-select bg-transparent" name="destination">
                                                <option value="Varış noktası seçiniz">Varış noktası seçiniz</option>
                                                <option value="İsviçre">İsviçre</option>
                                                <option value="Kanada">Kanada</option>
                                                <option value="Kazakistan">Kazakistan</option>
                                                <option value="Güney Kore">Güney Kore</option>
                                                <option value="Finlandiya">Finlandiya</option>
                                                <option value="Özbekistan">Özbekistan</option>
                                                <option value="İtalya">İtalya</option>
                                                <option value="Japonya">Japonya</option>
                                            </select>
                                            <label for="destination">Varış Noktaları</label>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-floating">
                                            <textarea class="form-control bg-transparent" required placeholder="Special Request" name="requests" style="height: 100px"></textarea>
                                            <label for="requests">Özel İstekler</label>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <input type="submit" name="submit" value="Rezervasyon Yaptır" class="btn btn-outline-light w-100 py-3">
                                        <!--<button class="btn btn-outline-light w-100 py-3" type="submit">Rezervasyon Yap</button>-->
                                    </div>

                                </div>    
                                
                            </form>

                        </div>



                        

                    
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Booking Start -->
        

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Kurumsal</h4>
                    <a class="btn btn-link" href="about.html">Hakkımızda</a>
                    <a class="btn btn-link" href="contact.html">İletişim</a>
                    <a class="btn btn-link" href="privacy.html">Gizlilik Politikası</a>
                    <a class="btn btn-link" href="term.html">Kullanım Koşulları</a>
                    <a class="btn btn-link" href="helpfaqs.html">SSS & Yardım</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Bize Ulaşın</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Halkalı Merkez, Halkalı, 34303 Küçükçekmece/İstanbul</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+90 534 879 5544</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>gezinti@gmail.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="https://twitter.com/zaimuniv?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor" target="_blank"><i class="fab fa-twitter fw-normal"></i></a>
                        <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="https://www.facebook.com/zaimuniv/?locale=tr_TR" target="_blank"><i class="fab fa-facebook-f fw-normal"></i></a>
                        <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="https://www.linkedin.com/school/zaimuniv/?original_referer=https%3A%2F%2Fwww%2Egoogle%2Ecom%2F&originalSubdomain=tr" target="_blank"><i class="fab fa-linkedin-in fw-normal"></i></a>
                        <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="https://www.instagram.com/zaimuniv/" target="_blank"><i class="fab fa-instagram fw-normal"></i></a>
                        <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle" href="https://www.youtube.com/@izuniversite/featured" target="_blank"><i class="fab fa-youtube fw-normal"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Galeri</h4>
                    <div class="row g-2 pt-2">
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/paris.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/istanbul.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/mısır.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/isvicre2.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/roma.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/japonya3.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Haber Bülteni</h4>
                    <p>Haberlerimizden ve kampanyalarımızdan faydalanmak için email yoluyla kaydolabilirsiniz.</p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <input class="form-control border-primary w-100 py-3 ps-4 pe-5" type="text" placeholder="Email adresinizi giriniz">
                        <a href="login_form.php">
                            <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">Kayıt Ol</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="index.html">Gezinti</a>, Bütün Hakları Saklıdır. Nursena Aydın ve Süreyya Engin tarafından dizayn edilmiştir.
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <div class="footer-menu">
                            <a href="index.html">Ana Sayfa</a>
                            <a href="cookies.html">Çerez Politikası</a>
                            <a href="helpfaqs.html">Yardım</a>
                            <a href="helpfaqs.html">SSS</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>