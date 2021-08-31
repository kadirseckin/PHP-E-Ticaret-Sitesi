


<!doctype html>
<html class="no-js" lang="zxx">
    
<!-- login-register31:27-->
<head>
      
    </head>
    <body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
        <!-- Begin Body Wrapper -->
        <div class="body-wrapper">
            <!-- Begin Header Area -->
            <?php 
            require_once 'header.php';

            if(@$_SESSION['normalgiris']==null){
                header("Location:index");
                die();

            }

             ?>
            <!-- Header Area End Here -->
         
            <!-- Begin Login Content Area -->
            <div class="page-section mb-60">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-30">
                            <!-- Login Form s-->
                        
                        <div style="text-align:center;">
                              <?php 
                         if(@$_GET['guncelleme']=="basarili"){
                            echo "<b style='font-size:20px; color:green;'>Güncelleme işlemi başarılı </b>";
                            }
                        if(@$_GET['guncelleme']=="basarisiz"){
                            echo "<b style='font-size:20px; color:red;'>Güncelleme işlemi başarısız </b>";
                            }

                        ?>
                        </div>

                            <form action="admin/islem/islem.php" method="POST">
                                
                                <div class="login-form">

                                    <h4 class="login-title">Kullanıcı bilgileri</h4>
                                    <div class="row">
                                        <input type="hidden" name="kullaniciid" value="<?php echo $kullaniciCek['kullanici_id'] ?>">

                                        <div class="col-md-12 col-12 mb-20">
                                            <label>Ad soyad</label>
                                            <input value="<?php echo $kullaniciCek['kullanici_adsoyad'] ?>" required class="mb-0" name="adsoyad" type="text" placeholder="Ad Soyad">
                                        </div>
                                        <div class="col-12 mb-20">
                                            <label>Email</label>
                                            <input value="<?php echo $kullaniciCek['kullanici_mail'] ?>" required class="mb-0" name="email" type="text" placeholder="Email">
                                        </div>

                                        <div class="col-12 mb-20">
                                            <label>Ülke</label>
                                            <input value="<?php echo $kullaniciCek['kullanici_adres'] ?>" required class="mb-0" name="adres" type="text" placeholder="Adres">
                                        </div>
                                        
                                        <div class="col-12 mb-20">
                                            <label>Şehir</label>
                                            <input value="<?php echo $kullaniciCek['kullanici_il'] ?>" required class="mb-0" name="sehir" type="text" placeholder="Sehir">
                                        </div>

                                        <div class="col-12 mb-20">
                                            <label>İlçe</label>
                                            <input value="<?php echo $kullaniciCek['kullanici_ilce'] ?>" required class="mb-0" name="ilce" type="text" placeholder="İlçe">
                                        </div>

                                        <div class="col-12 mb-20">
                                            <label>Telefon</label>
                                            <input value="<?php echo $kullaniciCek['kullanici_tel'] ?>" required class="mb-0" name="telefon" type="text" placeholder="Telefon">
                                        </div>

                                        
                                       
                                        <div class="col-md-12">
                                            <button  type="submit" name="kullaniciDuzenle"
                                                class="register-button mt-0">Kaydet</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>


       
                    </div>
                </div>
            </div>
            <!-- Login Content Area End Here -->
            <!-- Begin Footer Area -->
            <?php require_once 'footer.php' ?>
            <!-- Footer Area End Here -->
        </div>

         <script src="js/vendor/jquery-1.12.4.min.js"></script>
        <!-- Popper js -->
        <script src="js/vendor/popper.min.js"></script>
        <!-- Bootstrap V4.1.3 Fremwork js -->
        <script src="js/bootstrap.min.js"></script>
        <!-- Ajax Mail js -->
        <script src="js/ajax-mail.js"></script>
        <!-- Meanmenu js -->
        <script src="js/jquery.meanmenu.min.js"></script>
        <!-- Wow.min js -->
        <script src="js/wow.min.js"></script>
        <!-- Slick Carousel js -->
        <script src="js/slick.min.js"></script>
        <!-- Owl Carousel-2 js -->
        <script src="js/owl.carousel.min.js"></script>
        <!-- Magnific popup js -->
        <script src="js/jquery.magnific-popup.min.js"></script>
        <!-- Isotope js -->
        <script src="js/isotope.pkgd.min.js"></script>
        <!-- Imagesloaded js -->
        <script src="js/imagesloaded.pkgd.min.js"></script>
        <!-- Mixitup js -->
        <script src="js/jquery.mixitup.min.js"></script>
        <!-- Countdown -->
        <script src="js/jquery.countdown.min.js"></script>
        <!-- Counterup -->
        <script src="js/jquery.counterup.min.js"></script>
        <!-- Waypoints -->
        <script src="js/waypoints.min.js"></script>
        <!-- Barrating -->
        <script src="js/jquery.barrating.min.js"></script>
        <!-- Jquery-ui -->
        <script src="js/jquery-ui.min.js"></script>
        <!-- Venobox -->
        <script src="js/venobox.min.js"></script>
        <!-- Nice Select js -->
        <script src="js/jquery.nice-select.min.js"></script>
        <!-- ScrollUp js -->
        <script src="js/scrollUp.min.js"></script>
        <!-- Main/Activator js -->
        <script src="js/main.js"></script>
    </body>

<!-- login-register31:27-->
</html>
