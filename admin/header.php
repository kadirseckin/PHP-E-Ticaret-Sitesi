<?php
  session_start(); 

  require_once 'islem/baglanti.php';

  if($_SESSION['girisbelgesi']==null){
    Header("Location:login?durum=izinsizgiris");
  }
  
   $kullanicisor=$baglanti->prepare("
    SELECT *from kullanici 
    where kullanici_adi=:kullanici_adi and 
    kullanici_yetki=:kullanici_yetki " );

  $kullanicisor->execute(array(
    'kullanici_adi'=>$_SESSION['girisbelgesi'],
    'kullanici_yetki'=>2

  ));

  $ayar=$baglanti->prepare("SELECT * from  ayarlar where id=?");
  $ayar->execute(array(1)); // idsi 1 olan
  $ayarCek=$ayar->fetch(PDO::FETCH_ASSOC);

  $hakkimizda=$baglanti->prepare("SELECT * from  hakkimizda where hakkimizda_id=?");
  $hakkimizda->execute(array(1)); // idsi 1 olan
  $hakkimizdaCek=$hakkimizda->fetch(PDO::FETCH_ASSOC);


 ?>



<head> 
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3| Dashboard</title>

  <link rel="stylesheet" type="text/css" href="dropzone.css">
  <script type="text/javascript" src="dropzone.js"></script>
  
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>



  <!-- Navbar -->
  <br>

  <!-- Main Sidebar Container -->
