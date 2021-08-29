
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>

</head>
<body>
<?php require_once 'header.php' ?>
<div class="Shopping-cart-area pt-60 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-12">


           <form action="#">
            <div class="table-content table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="li-product-thumbnail">Resim</th>
                            <th class="cart-product-name">Başlık</th>
                            <th class="li-product-price">Ücret</th>
                            <th class="li-product-quantity">Adet</th>
                             <th class="li-product-quantity">Zaman</th>
                              <th class="li-product-quantity">Onay durumu</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php 
                            $kid=$kullaniciCek['kullanici_id'];



                            $siparis=$baglanti->prepare("SELECT * FROM  siparisler where kullanici_id=:kullanici_id order by siparis_zaman DESC");
                            $siparis->execute(array(
                              'kullanici_id'=>$kid

                          ));
                           while ($sipariscek=$siparis->fetch(PDO::FETCH_ASSOC)) {
                                $alinanid=$sipariscek['urun_id'];
                                 
                                $urunler=$baglanti->prepare("SELECT * FROM  urunler where urun_id=:urun_id ");
                                $urunler->execute(array(
                                  'urun_id'=>$alinanid

                                ));

                                $urunlercek=$urunler->fetch(PDO::FETCH_ASSOC);


                            ?>



                            <tr>
    

                                <td class="li-product-thumbnail"><a href="#"><img style="width: 200px" src="admin/resimler/urunler/<?php echo $urunlercek['urun_resim'] ?>" alt="Li's Product Image"></a></td>

                                <td class="li-product-name"><a href="#"><?php echo $urunlercek['urun_baslik'] ?></a></td>

                                <td class="li-product-price"><span class="amount"><?php echo $sipariscek['urun_fiyat'] ?>₺</span></td>

                                <td class="quantity">
                                  
                                    
                                        <?php echo $sipariscek['urun_adet'] ?>
                                        
                                   
                                </td>


                                      <td class="li-product-price"><span class="amount"><?php echo $sipariscek['siparis_zaman'] ?></span></td>

                                    <td>
                                       <?php 
                                         if($sipariscek['siparis_onay']==0){
                                            echo "<b style='color:orange'> Sipariş beklemede</b>";

                                         }else if($sipariscek['siparis_onay']==1){
                                            echo "<b style='color:green'> Sipariş onaylandı</b>";

                                         }else if($sipariscek['siparis_onay']==2){
                                            echo "<b style='color:red'> Sipariş reddedildi</b>";
                                         }
                                        ?>
                                    </td>



                            </tr>
                          



                     

                        <?php } ?>



                    </tbody>
                </table>
            </div>
            
            <?php require_once 'footer.php' ?>
        </form>
    </div>
</div>
</div>
</div>
<!--Shopping Cart Area End-->
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
</html>
