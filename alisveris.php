<!doctype html>
<html class="no-js" lang="zxx">
    
<!-- shopping-cart31:32-->
<head>
     
</head>
    <body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
        <!-- Begin Body Wrapper -->
        <div class="body-wrapper">
            <!-- Begin Header Area -->
            <?php include_once 'header.php' ?>
            <!-- Header Area End Here -->
          
            <!--Shopping Cart Area Strat-->
            <div class="Shopping-cart-area pt-60 pb-60">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <?php if(@$_GET['durum']=="eklendi"){
                                echo "<b style='color:green'> Ürününüz sepete eklendi </b>";
                            } ?>
                            <form action="islem" method="post">
                             
                             <input type="hidden" name="toplamfiyat" value="<?php echo $_GET['toplamfiyat'] ?>">
                              <input type="hidden" name="kadi" value="<?php echo $kullaniciCek['kullanici_id'] ?>">

                              <div class="row">
                                    <div class="col-md-6">
                                        <div class="cart-page-total">
                                            <h2 style="color:green">Ödeme sayfası</h2>
                                            <ul>
                                                <li>Ödenecek tutar <span><?php echo $_GET['toplamfiyat']?>₺</span></li>
                                                
                                            </ul>
                                            
                                        </div>
                                    </div>
                                </div>
                          
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="cart-page-total">
                                            
                                            <select name="odeme">
                                                <option value="1">Kapıda Ödeme</option>
                                                <option value="0">Kart ile Ödeme</option>
                                            </select>
                                           <br> <br>

                                           <button class="btn btn-info"  style="float: right;" name="alisverisBitir" type="submit"> Alışverişi tamamla</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--Shopping Cart Area End-->
            <!-- Begin Footer Area -->
            <?php include_once 'footer.php' ?>
            <!-- Footer Area End Here -->
        </div>
        <!-- Body Wrapper End Here -->
        <!-- jQuery-V1.12.4 -->
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

<!-- shopping-cart31:32-->
</html>