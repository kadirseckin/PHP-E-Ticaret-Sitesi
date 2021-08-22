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
            <?php require_once 'header.php' ?>
            <!-- Header Area End Here -->
         
            <!-- Begin Login Content Area -->
            <div class="page-section mb-60">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-30">
                            <!-- Login Form s-->
                        
                        <div style="text-align:center;">
                              <?php 
                         if(@$_GET['girisdurum']=="hata"){
                            echo "<b style='font-size:20px; color:red;'>Bilgileriniz hatalı </b>";
                            }
                        ?>
                        </div>

                            <form action="islem.php" method="POST">
                                
                                <div class="login-form">

                                    <h4 class="login-title">Giriş yap</h4>
                                    <div class="row">

                                        <div class="col-md-12 col-12 mb-20">
                                            <label>Kullanıcı adı</label>
                                            <input required class="mb-0" name="kadi" type="text" placeholder="Kullanıcı adı">
                                        </div>
                                        <div class="col-12 mb-20">
                                            <label>Şifre</label>
                                            <input required class="mb-0" name="sifre" type="password" placeholder="Şifre">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="check-box d-inline-block ml-0 ml-md-2 mt-10">
                                                <input type="checkbox" id="remember_me">
                                                <label for="remember_me">Beni hatırla</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mt-10 mb-20 text-left text-md-right">
                                            <a href="#"> Şifrenizi mi unuttunuz?</a>
                                        </div>
                                       
                                        <div class="col-md-12">
                                            <button  type="submit" name="login"
                                                class="register-button mt-0">GİRİŞ YAP</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>


                        <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
                              <div style="text-align:center;">
                              <?php 
                         if(@$_GET['durum']=="sifrehata"){
                            echo "<b style='font-size:20px; color:red;'>Girilen şifreler uyuşmuyor. </b>";
                            }
                        if(@$_GET['durum']=="kullaniciZatenVar"){
                            echo "<b style='font-size:20px; color:red;'>Bu kullanıcı adı kullanılıyor. </b>";
                        } 
                         if(@$_GET['durum']=="sifreKarakterHata"){
                            echo "<b style='font-size:20px; color:red;'>Şifre en az 8 karakter olmalı. </b>";
                        } 
                         if(@$_GET['durum']=="basarili"){
                            echo "<b style='font-size:20px; color:green;'>Kayıt başarılı </b>";
                        } 
                         if(@$_GET['durum']=="hata"){
                            echo "<b style='font-size:20px; color:red;'>Kayıt yapılırken hata oluştu. </b>";
                        } 
                        ?>
                        </div>

                             <form action="islem.php" method ="POST" >
                                <div class="login-form">
                                    <h4 class="login-title">Kayıt ol</h4>
                                    <div class="row">

                                        <div class="col-md-6 col-12 mb-20">
                                            <label>Kullanıcı Adı</label>
                                            <input name="kadi" required class="mb-0" type="text" placeholder="Kullanıcı Adı">
                                        </div>
                                        <div class="col-md-6 col-12 mb-20">
                                            <label>Ad Soyad</label>
                                            <input name="adsoyad" required class="mb-0" type="text" placeholder="Ad Soyad">
                                        </div>
                                        <div class="col-md-12 mb-20">
                                            <label>Email Adresi*</label>
                                            <input name="email" required class="mb-0" type="email" placeholder="Email Adresi">
                                        </div>
                                        <div class="col-md-6 mb-20">
                                            <label>Şifre</label>
                                            <input name="sifre" required class="mb-0" type="password" placeholder="Şifre">
                                        </div>
                                        <div class="col-md-6 mb-20">
                                            <label>Şifre tekrar</label>
                                            <input name="sifretekrar" required class="mb-0" type="password" placeholder="Şifre tekrar">
                                        </div>
                                        <div class="col-12">
                                            <button name="register" type="submit" class="register-button mt-0">Kayıt OL</button>
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
    </body>

<!-- login-register31:27-->
</html>
