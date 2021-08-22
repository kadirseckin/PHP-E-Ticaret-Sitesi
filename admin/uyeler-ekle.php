<!DOCTYPE html>
<html>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

<?php 
  require_once 'header.php' ;
  require_once 'sidebar.php';

?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <div class="card card-primary col-md-12">
              <div class="card-header">
                <h3 class="card-title">Yeni kullanıcı ekle</h3>
                
                <b style="float:right;">
                  <?php 
                 if(@$_GET['yuklenme']=="basarili"){
                    echo "<span style='color:lime'> Ekleme işlemi başarılı </span>";
                 }else if (@$_GET['yuklenme']=="basarisiz") {
                    echo "<span style='color:red'> Ekleme işlemi başarısız </span>";
                 }

                 if(@$_GET['durum']=="kullanicivar"){
                  echo "<span style='color:red'> Kullanıcı zaten var </span>";
                 }

                 ?>
                </b>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
              <form action="islem/islem.php" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">

                    <div class="form-group">
                   

                  <div class="form-group">
                    <label>Resim</label>
                    <input type="file" name="resim" class="form-control"required >
                  </div>

                    <label>Kullanıcı adı</label>
                    <input type="text"  name="kadi" class="form-control" placeholder="Kullanıcı adı giriniz"required>
                  </div>

                  <label>Email</label>
                    <input type="email"  name="email" class="form-control" placeholder="Email adresi giriniz"required>
                  </div>



                  <div class="form-group">
                    <label>Şifre</label>
                    <input type="password" class="form-control" name="sifre" placeholder="Şifrenizi giriniz" required>
                  </div>

                  <div class="form-group">
                    <label>Ad Soyad</label>
                    <input type="text" class="form-control" name="adsoyad" placeholder="Ad Soyad Giriniz"required>
                  </div>

                   
                
                <!-- /.card-body -->

                <div class="form-group">
                  <button type="submit" name="uyelerKaydet" class="btn btn-success">Gönder</button>
                </div>

              </form>

            </div>

          
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->

    </section>


    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
 <?php require_once 'footer.php' ?>


<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
