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
                            <form action="#">
                                <div class="table-content table-responsive">
                                    <table class="table">
                                        <thead>

                                        
                                            <tr>
                                                <th class="li-product-remove"></th>
                                                <th class="li-product-thumbnail">Resim</th>
                                                <th class="cart-product-name">Başlık</th>
                                                <th class="li-product-price">Fiyat</th>
                                                <th class="li-product-quantity">Adet</th>
                                                <th class="li-product-subtotal">Toplam</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                              <?php                                          
                                              $kdv=0;
                                            

                                           foreach (@(array)$_COOKIE['sepet'] as $key => $value) {

                                                  $urunler=$baglanti->prepare("
                                                    SELECT * FROM urunler
                                                    where urun_id=:urun_id
                                                    "
                                                  );
                                                
                                                $urunler->execute(array(
                                                     'urun_id'=>$key
                                                ));

                                                $urunlerCek=$urunler->fetch(PDO::FETCH_ASSOC);

                                               
                                           
                                            ?> 

                                            <tr>
                                                <td class="li-product-remove"><a href="islem?sepetsil&id=<?php echo $key ?>"><i class="fa fa-times"></i></a></td>
                                                <td class="li-product-thumbnail"><a href="#"><img src="admin/resimler/urunler/<?php echo $urunlerCek['urun_resim'] ?>" style="max-height: ;height: 130px; max-width: 200px;" alt="Li's Product Image"></a></td>
                                                <td class="li-product-name"><a href="#"><?php echo $urunlerCek['urun_baslik'] ?></a></td>
                                                <td class="li-product-price"><span class="amount">
                                                        <?php echo $urunlerCek['urun_fiyat'] ?> ₺</span></td>
                                                <td class="quantity">
                                                    <?php echo $value ?>
                                                </td>
                                                <td class="product-subtotal"><span class="amount"><?php
                                                    $adet=$value;
                                                    $urunFiyat=$urunlerCek['urun_fiyat'];

                                                    echo $adet*$urunFiyat." ₺";
                                                 ?></span></td>
                                            </tr>


                                            <?php 
                                            
                                                
                                            }

                                            $kdv=$sepetToplam*0.18;

                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                              
                                <div class="row">
                                    <div class="col-md-5 ml-auto">
                                        <div class="cart-page-total">
                                            <h2>Fiyat</h2>
                                            <ul>
                                                <li>Toplam fiyat <span><?php echo $sepetToplam ?>₺</span></li>
                                                <li>KDV <span><?php echo $kdv ?>₺</span></li>
                                                <li>Genel toplam <span><?php echo($sepetToplam+$kdv)  ?>₺</span></li>
                                            </ul>
                                            <a href="alisveris?toplamfiyat=<?php echo ($sepetToplam+$kdv)?>" style="display:<?php  //giriş yapılmamışsa veya sepet boşsa butonu gizle
                                                if(@$_SESSION['normalgiris']==null){
                                                    echo 'none';
                                            }else if(empty($_COOKIE['sepet'])){
                                                echo 'none';
                                            }

                                             ?>">Alışverişi tamamla</a>
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