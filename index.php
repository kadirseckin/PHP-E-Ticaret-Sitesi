<!doctype html>
<html class="no-js" lang="zxx">
    
<!-- index28:48-->
<head>
      
    </head>
    <body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
        <!-- Begin Body Wrapper -->
        <div class="body-wrapper">
            <!-- Begin Header Area -->

            <?php require_once 'header.php';?>

            <!-- Header Area End Here -->
            <!-- Begin Slider With Banner Area -->
            <?php require_once 'slider.php'; ?>
            <!-- Slider With Banner Area End Here -->

            <!-- Begin Product Area -->
            <div class="product-area pt-60 pb-50">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="li-product-tab">
                                <ul class="nav li-product-menu">
                                   <li><a class="active" data-toggle="tab" href="#li-new-product"><span>Yeni ürünler</span></a></li>
                                   
                                </ul>               
                            </div>
                            <!-- Begin Li's Tab Menu Content Area -->
                        </div>
                    </div>
                    <div class="tab-content">
                       <div id="li-new-product" class="tab-pane active show" role="tabpanel">
                            <div class="row">
                                <div class="product-active owl-carousel">
                                

                                <?php 
                        $urunler=$baglanti->prepare("SELECT * FROM  urunler  order by urun_zaman DESC");
                        $urunler->execute();
                         while ($urunlercek=$urunler->fetch(PDO::FETCH_ASSOC)) { 

                         ?>
                                    <div class="col-lg-12">
                                        <!-- single-product-wrap start -->
                                        <div class="single-product-wrap">
                                            <div class="product-image">
                                                <a href="urun-detay-<?=seolink($urunlercek['urun_baslik']).'-'.$urunlercek['urun_id'] ?>">
                                                    <img style="height: 200px" src="Admin/resimler/urunler/<?php echo $urunlercek['urun_resim'] ?>" alt="Li's Product Image">
                                                </a>
                                                <span class="sticker">New</span>
                                            </div>
                                            <div class="product_desc">
                                                <div class="product_desc_info">
                                                
                                                 <h4><a class="product_name" href="urun-detay-<?=seolink($urunlercek['urun_baslik']).'-'.$urunlercek['urun_id'] ?>"><?php echo $urunlercek['urun_baslik'] ?></a></h4>
                                                    <div class="price-box">
                                                        <span class="new-price new-price-2"><?php echo $urunlercek['urun_fiyat'] ?>₺</span>
                                                      
                                                    </div>
                                                </div>
                                                <div class="add-actions">
                                                    <ul class="add-actions-link">
                                                           <li class="add-cart active"><a href="urun-detay-<?=seolink($urunlercek['urun_baslik']).'-'.$urunlercek['urun_id'] ?>">Detaya git</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single-product-wrap end -->
                                    </div>
                                    
                                    <?php } ?>
                            </div>
                        </div>
                     
                       
                    </div>
                </div>
            </div>
            <BR>
            <!-- Product Area End Here -->
            <!-- Begin Li's Static Banner Area -->
            <div class="li-static-banner">
                <div class="container">
                    <div class="row">

                        <?php 
                           $sliderler=$baglanti->prepare("SELECT *from slider where slider_banner=:slider_banner order by slider_sira DESC limit 3");
                           $sliderler->execute(array(
                            'slider_banner'=>0
                           ));

                            while($sliderCek=$sliderler->fetch(PDO::FETCH_ASSOC)){ ?>
                        <!-- Begin Single Banner Area -->
                        <div class="col-lg-4 col-md-4 text-center">
                            <div class="single-banner">
                                <a href="#">
                                    <img style="max-width:500px; max-height:500px" src="admin/resimler/slider/<?php echo $sliderCek['slider_resim'] ?>" alt="Li's Static Banner">
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                        <!-- Single Banner Area End Here -->
                     
                        <!-- Single Banner Area End Here -->
                    </div>
                </div>
            </div>
            <!-- Li's Static Banner Area End Here -->
        <br>
            <!-- Begin Footer Area -->
                
               <?php require_once 'footer.php';?>
            <!-- Footer Area End Here -->

            <!-- Begin Quick View | Modal Area -->
          
            <!-- Quick View | Modal Area End Here -->
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

<!-- index30:23-->
</html>