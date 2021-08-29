<!doctype html>
<html class="no-js" lang="zxx">
    
<!-- single-product-normal31:50-->
<head>
 <title>Ürün detay</title>

</head>
     
    <body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
        <!-- Begin Body Wrapper -->
        <div class="body-wrapper">

             <?php 

             require_once 'header.php';

              $urunler=$baglanti->prepare("
                SELECT * FROM urunler
                where urun_id=:urun_id
                order by urun_sira ASC"
              );
            
            $urunler->execute(array(
                 'urun_id'=>$_GET['urun_id']
            ));

            $urunlerCek=$urunler->fetch(PDO::FETCH_ASSOC);


             ?>     

             
            <!-- Header Area End Here -->
         
            <!-- content-wraper start -->

            <div class="content-wraper">

                <div class="container">
                    <div class="row single-product-area">
                        <div class="col-lg-5 col-md-6">
                           <!-- Product Details Left -->
                            <div class="product-details-left">

                                <div class="product-details-images slider-navigation-1">

                         <?php 
                             $cokluresim=$baglanti->prepare("SELECT *FROM cokluresim where urun_id=:urun_id order by id ASC");
                            $cokluresim->execute(array('urun_id'=>$_GET['urun_id']));
                            while($cokluresimCek=$cokluresim->fetch(PDO::FETCH_ASSOC)){?>
                                    <div  class="lg-image">
                                        <img style="max-width: 300px;" src="admin/resimler/cokluresim/<?php echo $cokluresimCek['resim'] ?>" alt="product image">
                                    </div>

                                <?php } ?>

                                <div  class="lg-image">
                                        <img style="max-width: 300px;" src="admin/resimler/urunler/<?php echo $urunlerCek['urun_resim'] ?>" alt="product image">
                                    </div>

                               


                                </div>
                                

                                <div class="product-details-thumbs slider-thumbs-1">
                                    <?php 
                             $cokluresim=$baglanti->prepare("SELECT *FROM cokluresim where urun_id=:urun_id order by id ASC");
                            $cokluresim->execute(array('urun_id'=>$_GET['urun_id']));
                            while($cokluresimCek=$cokluresim->fetch(PDO::FETCH_ASSOC)){?>
                                    <div class="sm-image"><img style="height:70px;" src="admin/resimler/cokluresim/<?php echo $cokluresimCek['resim'] ?>" alt="product image

                                     thumb"></div>

                                         <?php } ?>

                                         <div class="sm-image"><img style="height:70px;" src="admin/resimler/urunler/<?php echo $urunlerCek['urun_resim'] ?>" alt="product image

                                     thumb"></div>
                                   
                                </div>
                           
                            </div>
                            <!--// Product Details Left -->
                        </div>

                        <div class="col-lg-7 col-md-6">
                            <div class="product-details-view-content sp-normal-content pt-60">
                                <div class="product-info">
                                    <h2><?php echo $urunlerCek['urun_baslik'] ?></h2>
                                    
                                 
                                    <div class="price-box pt-20">
                                        <span class="new-price new-price-2">
                                            <?php echo $urunlerCek['urun_fiyat']." ₺"; ?></span>
                                    </div>
                                    <div class="product-desc">
                                        <p>
                                            <span><?php echo $urunlerCek['urun_aciklama'] ?>
                                            </span>
                                        </p>
                                    </div>

                                    <div class="single-add-to-cart">
                                        <form action="islem" method="post" class="cart-quantity">
                                            <div class="quantity">
                                                <label>Adet</label>
                                                <div class="">
                                                
                                                    <input name="adet" class="cart-plus-minus-box" value="1" 
                                                    type="number" min="1">
                                                    
                                                    <input type="hidden" name="urun_id" value="<?php echo $urunlerCek['urun_id'] ?>">
                                                </div>
                                            </div>
                                            <button name="sepeteEkle" class="add-to-cart" type="submit">Sepete ekle</button>
                                        </form>
                                    </div>
                                    <div class="product-additional-info">
                                        <div class="product-social-sharing">
                                            <ul>
                                                <li class="facebook"><a href="#"><i class="fa fa-facebook"></i>Facebook</a></li>
                                                <li class="twitter"><a href="#"><i class="fa fa-twitter"></i>Twitter</a></li>
                                                <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i>Google +</a></li>
                                                <li class="instagram"><a href="#"><i class="fa fa-instagram"></i>Instagram</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 


                    </div>
                </div>
            </div>
            <!-- content-wraper end -->
            <!-- Begin Product Area -->
            <div class="product-area pt-40">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="li-product-tab">
                                <ul class="nav li-product-menu">
                                   <li><a class="active" data-toggle="tab" href="#description"><span>Açıklama</span></a></li>
                                  
                                   <li><a data-toggle="tab" href="#reviews"><span>Yorumlar</span></a></li>
                                </ul>               
                            </div>
                            <!-- Begin Li's Tab Menu Content Area -->
                        </div>
                    </div>
                    <div class="tab-content">
                        <div id="description" class="tab-pane active show" role="tabpanel">
                            <div class="product-description">
                                <span><?php echo $urunlerCek['urun_aciklama'] ?></span>
                            </div>
                        </div>
                        <div id="product-details" class="tab-pane" role="tabpanel">
                            <div class="product-details-manufacturer">
                                <a href="#">
                                    <img src="images/product-details/1.jpg" alt="Product Manufacturer Image">
                                </a>
                                <p><span>Reference</span> demo_7</p>
                                <p><span>Reference</span> demo_7</p>
                            </div>
                        </div>
                        <div id="reviews" class="tab-pane" role="tabpanel">
                            <div class="product-reviews">
                                <div class="product-details-comment-block">
                                    <div class="comment-review">
                                    
                                    <div class="comment-author-infos pt-25">
                                        <?php
                                         $yorumlar=$baglanti->prepare("
                                            SELECT * FROM yorumlar 
                                            where urun_id=:urun_id and yorum_onay=:yorum_onay 
                                            order by yorum_zaman DESC");
                                         $yorumlar->execute(array(
                                             'urun_id'=>$_GET['urun_id'],
                                             'yorum_onay'=>1  
                                         ));

                                        while($yorumlarCek=$yorumlar->fetch(PDO::FETCH_ASSOC)){  
                                         ?>

                                         <?php  //yorumu yapanın adını alacağız.
                                            $kullaniciid=$yorumlarCek['kullanici_id'];

                                            $kullanici=$baglanti->prepare("
                                            SELECT * FROM kullanici 
                                            where kullanici_id=:kullanici_id
                                            ");
                                         $kullanici->execute(array(
                                               'kullanici_id'=>$kullaniciid
                                         ));

                                         $yorumAtanKullanici=$kullanici->fetch(PDO::FETCH_ASSOC);

                                          ?>

                                       <span><?php echo $yorumAtanKullanici['kullanici_adsoyad'] ?></span>
                                       <span style="font-weight: 100;">
                                        &nbsp;<?php echo $yorumlarCek['yorum_zaman']; ?></span>
                                        <em><?php echo $yorumlarCek['yorum_detay'] ?></em>
                                        <br>

                                     <?php } ?>
                                    </div>
                                  
                                    <div class="review-btn">
                                        <a style="display:<?php 
                                                if(@$_SESSION['normalgiris']==null){
                                                    echo 'none';
                                            } ?>;" class="review-links" href="#" data-toggle="modal" data-target="#mymodal">
                                        Yorum yaz</a>
                                    </div>
                                    <!-- Begin Quick View | Modal Area -->
                                    <div class="modal fade modal-wrapper" id="mymodal" >
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <h3 class="review-page-title">Yorumunuzu belirtin</h3>
                                                    <div class="modal-inner-area row">
                                                    
                                                        <div class="col-lg-12">
                                                            <div class="li-review-content">
                                                                <!-- Begin Feedback Area -->
                                                                <div class="feedback-area">
                                                                    <div class="feedback">

                                                                        <form action="admin/islem/islem.php" 
                                                                        method="post">

                                                                        <input type="hidden" name="urunid" value="<?php echo $urunlerCek['urun_id'] ?>">

                                                                        <input type="hidden" name="kullaniciid" value="<?php echo $kullaniciCek['kullanici_id'] ?>">

                                                                            <p class="feedback-form">
                                                                                <label for="feedback">Yorumunuz</label>
                                                                                <textarea required name="yorum" cols="45" rows="8" ></textarea>
                                                                            </p>
                                                                            <div class="feedback-input">
                                                                              
                                                                                <div class="feedback-btn pb-15">
                                                                                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">Kapat</a>

                                                                                   <button  class="btn btn-info btn-xs" type="submit" name="yorumKaydet">Gönder</button>
                                                                                </div>
                                                                            </div>

                                                                        </form>
                                                                    </div>
                                                                </div>
                                                                <!-- Feedback Area End Here -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>   
                                    <!-- Quick View | Modal Area End Here -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Product Area End Here -->
            <!-- Begin Li's Laptop Product Area -->
            <section class="product-area li-laptop-product pt-30 pb-50">
                <div class="container">
                    <div class="row">
                        <!-- Begin Li's Section Area -->
                        <div class="col-lg-12">
                            <div class="li-section-title">
                                <h2>
                                    <span>Benzer ürünler</span>
                                </h2>
                            </div>
                            <div class="row">
                                <div class="product-active owl-carousel">

                                 <?php 
                                    $urunler=$baglanti->prepare("SELECT * FROM urunler where kategori_id=:kategori_id and urun_durum=:urun_durum order by urun_sira ASC");
                                                     $urunler->execute(array(
                                                        'kategori_id'=>$urunlerCek['kategori_id'],
                                                        'urun_durum'=>1
                                                    ));


                                            while($urunlerCek=$urunler->fetch(PDO::FETCH_ASSOC)){
                                  ?>

                                    <div class="col-lg-12">
                                        <!-- single-product-wrap start -->
                                        <div class="single-product-wrap">
                                            <div class="product-image">
                                                <a href="urun-detay-<?=seolink($urunlerCek['urun_baslik']).'-'.$urunlerCek['urun_id'] ?>">
                                                    <img src="admin/resimler/urunler/<?php  echo 
                                                     $urunlerCek['urun_resim'] ?>" alt="Li's Product Image">
                                                </a>
                                                <span class="sticker">Yeni</span>
                                            </div>
                                            <div class="product_desc">
                                                <div class="product_desc_info">
                                                    <div class="product-review">
                                                      
                                                    </div>
                                                    <h4><a class="product_name" href="urun-detay-<?=seolink($urunlerCek['urun_baslik']).'-'.$urunlerCek['urun_id'] ?>"  >
                                                        <?php  echo 
                                                     $urunlerCek['urun_baslik'] ?></a></h4>
                                                    <div class="price-box">
                                                        <span class="new-price new-price-2"><?php  echo 
                                                     $urunlerCek['urun_fiyat']." ₺" ?></span>
                                                    </div>
                                                </div>
                                               
                                                    <div class="add-actions">
                                                    <ul class="add-actions-link">
                                                        <li class="add-cart active"><a href="urun-detay-<?=seolink($urunlerCek['urun_baslik']).'-'.$urunlerCek['urun_id'] ?>">Detaya git</a></li>
                                                      
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
                        <!-- Li's Section Area End Here -->
                    </div>
                </div>
            </section>
            <!-- Li's Laptop Product Area End Here -->
            <!-- Begin Footer Area -->
             <?php require_once 'footer.php' ?>
            <!-- Footer Area End Here -->
            <!-- Begin Quick View | Modal Area -->
            <div class="modal fade modal-wrapper" id="exampleModalCenter" >
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div class="modal-inner-area row">
                                <div class="col-lg-5 col-md-6 col-sm-6">
                                   <!-- Product Details Left -->
                                    <div class="product-details-left">
                                        <div class="product-details-images slider-navigation-1">
                                            <div class="lg-image">
                                                <img src="images/product/large-size/1.jpg" alt="product image">
                                            </div>
                                            <div class="lg-image">
                                                <img src="images/product/large-size/2.jpg" alt="product image">
                                            </div>
                                            <div class="lg-image">
                                                <img src="images/product/large-size/3.jpg" alt="product image">
                                            </div>
                                            <div class="lg-image">
                                                <img src="images/product/large-size/4.jpg" alt="product image">
                                            </div>
                                            <div class="lg-image">
                                                <img src="images/product/large-size/5.jpg" alt="product image">
                                            </div>
                                            <div class="lg-image">
                                                <img src="images/product/large-size/6.jpg" alt="product image">
                                            </div>
                                        </div>
                                        <div class="product-details-thumbs slider-thumbs-1">                                        
                                            <div class="sm-image"><img src="images/product/small-size/1.jpg" alt="product image thumb"></div>
                                            <div class="sm-image"><img src="images/product/small-size/2.jpg" alt="product image thumb"></div>
                                            <div class="sm-image"><img src="images/product/small-size/3.jpg" alt="product image thumb"></div>
                                            <div class="sm-image"><img src="images/product/small-size/4.jpg" alt="product image thumb"></div>
                                            <div class="sm-image"><img src="images/product/small-size/5.jpg" alt="product image thumb"></div>
                                            <div class="sm-image"><img src="images/product/small-size/6.jpg" alt="product image thumb"></div>
                                        </div>
                                    </div>
                                    <!--// Product Details Left -->
                                </div>

                                <div class="col-lg-7 col-md-6 col-sm-6">
                                    <div class="product-details-view-content pt-60">
                                        <div class="product-info">
                                            <h2>Today is a good day Framed poster</h2>
                                            <span class="product-details-ref">Reference: demo_15</span>
                                            <div class="rating-box pt-20">
                                                <ul class="rating rating-with-review-item">
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                    <li class="review-item"><a href="#">Read Review</a></li>
                                                    <li class="review-item"><a href="#">Write Review</a></li>
                                                </ul>
                                            </div>
                                            <div class="price-box pt-20">
                                                <span class="new-price new-price-2">$57.98</span>
                                            </div>
                                            <div class="product-desc">
                                                <p>
                                                    <span>100% cotton double printed dress. Black and white striped top and orange high waisted skater skirt bottom. Lorem ipsum dolor sit amet, consectetur adipisicing elit. quibusdam corporis, earum facilis et nostrum dolorum accusamus similique eveniet quia pariatur.
                                                    </span>
                                                </p>
                                            </div>
                                            <div class="product-variants">
                                                <div class="produt-variants-size">
                                                    <label>Dimension</label>
                                                    <select class="nice-select">
                                                        <option value="1" title="S" selected="selected">40x60cm</option>
                                                        <option value="2" title="M">60x90cm</option>
                                                        <option value="3" title="L">80x120cm</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="single-add-to-cart">
                                                <form action="#" class="cart-quantity">
                                                    <div class="quantity">
                                                        <label>Quantity</label>
                                                        <div class="cart-plus-minus">
                                                            <input class="cart-plus-minus-box" value="1" type="text">
                                                            <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                            <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                                        </div>
                                                    </div>
                                                    <button class="add-to-cart" type="submit">Add to cart</button>
                                                </form>
                                            </div>
                                            <div class="product-additional-info pt-25">
                                                <a class="wishlist-btn" href="wishlist.html"><i class="fa fa-heart-o"></i>Add to wishlist</a>
                                                <div class="product-social-sharing pt-25">
                                                    <ul>
                                                        <li class="facebook"><a href="#"><i class="fa fa-facebook"></i>Facebook</a></li>
                                                        <li class="twitter"><a href="#"><i class="fa fa-twitter"></i>Twitter</a></li>
                                                        <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i>Google +</a></li>
                                                        <li class="instagram"><a href="#"><i class="fa fa-instagram"></i>Instagram</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>   
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

<!-- single-product-normal31:50-->
</html>
