<?php 

 session_start();
    ob_start();

  require_once 'admin/islem/baglanti.php';
  require_once 'function.php';
  
  $ayar=$baglanti->prepare("SELECT * from  ayarlar where id=?");
  $ayar->execute(array(1)); // idsi 1 olan
  $ayarCek=$ayar->fetch(PDO::FETCH_ASSOC);

  $hakkimizda=$baglanti->prepare("SELECT * from  hakkimizda where hakkimizda_id=?");
  $hakkimizda->execute(array(1)); // idsi 1 olan
  $hakkimizdaCek=$hakkimizda->fetch(PDO::FETCH_ASSOC);

  $kullanicisor=$baglanti->prepare("
    SELECT *from kullanici 
    where kullanici_adi=:kullanici_adi
     " );

  $kullanicisor->execute(array(
    'kullanici_adi'=>@$_SESSION['normalgiris']

  ));

  $kullaniciCek=$kullanicisor->fetch(PDO::FETCH_ASSOC);
  

 ?>

 <head>
       <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>E-Ticaret Projesi</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
        <!-- Material Design Iconic Font-V2.2.0 -->
        <link rel="stylesheet" href="css/material-design-iconic-font.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <!-- Font Awesome Stars-->
        <link rel="stylesheet" href="css/fontawesome-stars.css">
        <!-- Meanmenu CSS -->
        <link rel="stylesheet" href="css/meanmenu.css">
        <!-- owl carousel CSS -->
        <link rel="stylesheet" href="css/owl.carousel.min.css">
        <!-- Slick Carousel CSS -->
        <link rel="stylesheet" href="css/slick.css">
        <!-- Animate CSS -->
        <link rel="stylesheet" href="css/animate.css">
        <!-- Jquery-ui CSS -->
        <link rel="stylesheet" href="css/jquery-ui.min.css">
        <!-- Venobox CSS -->
        <link rel="stylesheet" href="css/venobox.css">
        <!-- Nice Select CSS -->
        <link rel="stylesheet" href="css/nice-select.css">
        <!-- Magnific Popup CSS -->
        <link rel="stylesheet" href="css/magnific-popup.css">
        <!-- Bootstrap V4.1.3 Fremwork CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- Helper CSS -->
        <link rel="stylesheet" href="css/helper.css">
        <!-- Main Style CSS -->
        <link rel="stylesheet" href="style.css">
        <!-- Responsive CSS -->
        <link rel="stylesheet" href="css/responsive.css">
        <!-- Modernizr js -->
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
 </head>  

    <header>
      
                
                <!-- Begin Header Middle Area -->
                <div class="header-middle pl-sm-0 pr-sm-0 pl-xs-0 pr-xs-0">
                    <div class="container">
                        <div class="row">
                            <!-- Begin Header Logo Area -->
                            <div class="col-lg-3">
                                <div class="logo pb-sm-30 pb-xs-30">
                                    <a href="index.html">
                                        <img src="images/menu/logo/1.jpg" alt="">
                                    </a>
                                </div>
                            </div>
                            <!-- Header Logo Area End Here -->
                            <!-- Begin Header Middle Right Area -->
                            <div class="col-lg-9 pl-0 ml-sm-15 ml-xs-15">
                                <!-- Begin Header Middle Searchbox Area -->
                                <form action="#" class="hm-searchbox">
                                   
                                    <input type="text" placeholder="Aradığınız ürünü giriniz ...">
                                    <button class="li-btn" type="submit"><i class="fa fa-search"></i></button>
                                </form>
                                <!-- Header Middle Searchbox Area End Here -->
                                <!-- Begin Header Middle Right Area -->
                                <div class="header-middle-right">
                                    <ul class="hm-menu">
                                        <!-- Begin Header Middle Wishlist Area -->
                                        <li class="hm-wishlist">
                                            <a href="kullanici" style="display:<?php if(@$_SESSION['normalgiris']==null){
                                                echo 'none';
                                            } ?>;">
                                                
                                                <i class="fa fa-user-o"></i>
                                            </a>

                                        </li>
                                        <!-- Header Middle Wishlist Area End Here -->
                                        <!-- Begin Header Mini Cart Area -->
                                        <li class="hm-minicart">
                                            <div class="hm-minicart-trigger">
                                                <span class="item-icon"></span>
                                                <span class="item-text">Sepetim
                                                    <span class="cart-item-count"><?php 
                                                     echo count(@(array)$_COOKIE['sepet']);

                                                     ?></span>
                                                </span>
                                            </div>
                                            <span></span>
                                            <div class="minicart">
                                                <ul class="minicart-product-list">

                                                       <?php 
                                                          $sepetToplam=0;
                                                          
                                                                                                    
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
                                                    <li>
                                                        <a href="single-product.html" class="minicart-product-image">
                                                            <img src="admin/resimler/urunler/<?php 
                                                        echo $urunlerCek['urun_resim'] ?>" alt="cart products">
                                                        </a>
                                                        <div class="minicart-product-details">
                                                            <h6><a href="single-product.html"><?php 
                                                        echo $urunlerCek['urun_baslik'] ?></a></h6>
                                                            <span><?php 
                                                        echo $urunlerCek['urun_fiyat']."₺ (".$value." adet)" ?> </span>
                                                        </div>
                                                        <a href="islem?sepetsil&id=<?php echo $key ?>">
                                                        <button class="close" title="Sil">
                                                            <i class="fa fa-close"></i>
                                                        </button>
                                                        </a>
                                                    </li>

                                                <?php 
                                                    $adet=$value;
                                                    $urunFiyat=$urunlerCek['urun_fiyat'];
                                                    $sepetToplam+=($urunFiyat*$adet);

                                            } ?>
                                                    
                                                </ul>
                                                <p class="minicart-total">Toplam Fiyat: <span><?php echo $sepetToplam ?>₺</span></p>
                                                <div class="minicart-button">
                                                    <a href="sepet" class="li-button li-button-fullwidth li-button-dark">
                                                        <span>Sepeti görüntüle</span>
                                                    </a>
                                                    
                                                </div>
                                            </div>
                                        </li>
                                        <!-- Header Mini Cart Area End Here -->


                                    </ul>
                                </div>
                                <!-- Header Middle Right Area End Here -->
                            </div>
                            <!-- Header Middle Right Area End Here -->
                        </div>
                    </div>
                </div>
                <!-- Header Middle Area End Here -->
                <!-- Begin Header Bottom Area -->
                <div class="header-bottom header-sticky d-none d-lg-block d-xl-block">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- Begin Header Bottom Menu Area -->
                                   <div class="hb-menu">
                                    <nav>
                                        <ul>
                                         <li><a href="index"> Anasayfa  </a></li>

                                            <li class="megamenu-holder"><a href="">Kategorİler</a>
                                                <ul class="megamenu hb-megamenu">
                                                    <li>
                                                        <ul>
                                                             <?php  
                  $kategori=$baglanti->prepare("SELECT * FROM kategori where  kategori_durum=:kategori_durum and  kategori_sira  between 1 and 10 limit 8");
                  $kategori->execute(array('kategori_durum'=>1));
                  while ($kategoricek=$kategori->fetch(PDO::FETCH_ASSOC)) { ?>
                                                            <li><a href="urunler-<?=seolink($kategoricek['kategori_adi']).'-'.$kategoricek['kategori_id'] ?>"><?php echo  $kategoricek['kategori_adi'] ?></a></li>
                                                        <?php } ?>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <ul>
                                                               <?php  
                  $kategori=$baglanti->prepare("SELECT * FROM  kategori  where kategori_durum=:kategori_durum and kategori_sira  between 10 and 20 limit 8 ");
                  $kategori->execute(array('kategori_durum'=>1));
                  while ($kategoricek=$kategori->fetch(PDO::FETCH_ASSOC)) { ?>
                                                            <li><a href="urunler-<?=seolink($kategoricek['kategori_adi']).'-'.$kategoricek['kategori_id'] ?>"><?php echo  $kategoricek['kategori_adi'] ?></a></li>
                                                        <?php } ?>

                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <ul>
                                                               <?php  
                  $kategori=$baglanti->prepare("SELECT * FROM  kategori  where kategori_durum=:kategori_durum and kategori_sira  between 20 and 30 limit 8 ");
                   $kategori->execute(array('kategori_durum'=>1));
                  while ($kategoricek=$kategori->fetch(PDO::FETCH_ASSOC)) { ?>
                                                            <li><a href="urunler-<?=seolink($kategoricek['kategori_adi']).'-'.$kategoricek['kategori_id'] ?>"><?php echo  $kategoricek['kategori_adi'] ?></a></li>
                                                        <?php } ?>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                     
                                           
                                            
                                            <li><a href="hakkimizda">Hakkımızda</a></li>
                                             <li><a href="iletisim">Iletişim</a></li>
                                            <li><a href="bilgi">Sık Sorulan Sorular</a></li>
                                           
                                            

                                            <li style="float:right;"><a style="display:<?php 
                                                if(@$_SESSION['normalgiris']==null){
                                                    echo 'none';
                                            } ?>;" href="cikis"><b>Çıkış</b></a></li>
                                    
                                           
                                         <li style="float: right; margin-top:14px ;">
                                           <div class="ht-setting-trigger"><span><b style="display:<?php 
                                                if(@$_SESSION['normalgiris']==null){
                                                    echo 'none';
                                            } ?>;">HESAP İŞLEMLERİ</b></span></div>
                                                                    <div class="setting ht-setting">
                                                                        <ul class="ht-setting-list">
                                                                            <li><a href="kullanici">Hesabım</a></li>
                                                                            <li><a href="sepet">Sepetim</a></li>
                                                                            <li><a href="siparisler">Siparişlerim</a></li>
                                                                            <li><a href="sifremidegistir">Şifremi değiştir</a></li>
                                                                        </ul>
                                                    </div>
                                                                
                                         </li>
                                           
                                             
                                                                  
            

                                            <li style="float:right;"><a style="display:<?php 
                                                if(@$_SESSION['normalgiris']!=null){
                                                    echo 'none';
                                            } ?>;" href="giris">Giriş/Kayıt</a></li>
                                            
                                            
                                        </ul>
                                    </nav>
                                </div>
                                <!-- Header Bottom Menu Area End Here -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Header Bottom Area End Here -->
                <!-- Begin Mobile Menu Area -->
                <div class="mobile-menu-area d-lg-none d-xl-none col-12">
                    <div class="container"> 
                        <div class="row">
                            <div class="mobile-menu">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Mobile Menu Area End Here -->
            </header>