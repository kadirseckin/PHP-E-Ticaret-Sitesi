<!DOCTYPE html>
<html>
<head>
  
</head>
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
                <h3 class="card-title">Site ayarları</h3>
                
                <b style="float:right;">
                  <?php 
                 if(@$_GET['yuklenme']=="basarili"){
                    echo "<span style='color:lime'> Güncelleme işlemi başarılı </span>";
                 }else if (@$_GET['yuklenme']=="basarisiz") {
                    echo "<span style='color:red'> Güncelleme işlemi başarısız </span>";
                 }

                 ?>
                </b>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
              <form action="islem/islem.php" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label>Site başlığı</label>
                    <input type="text" value="<?php echo $ayarCek['baslik'] ?>" name="baslik" class="form-control" placeholder="Başlık giriniz">
                  </div>
                  <div class="form-group">
                    <label>Site açıklaması</label>
                    <input type="text" value="<?php echo $ayarCek['aciklama'] ?>" class="form-control" name="aciklama" placeholder="Açıklama giriniz">
                  </div>

                  <div class="form-group">
                    <label>Anahtar kelime</label>
                    <input type="text" value="<?php echo $ayarCek['anahtarkelime'] ?>" class="form-control"  name="anahtarkelime"  placeholder="Anahtar kelime giriniz">
                  </div>           
                
                <!-- /.card-body -->

                <div class="form-group">
                  <button type="submit" name="ayarKaydet" class="btn btn-success">Gönder</button>
                </div>

              </form>

            </div>

            <!-- Logo form  yükleme-->
            <form action="islem/islem.php" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                  
                  <input type="hidden" name="eskilogo" value="<?php echo $ayarCek['logo'] ?>">

                  <div class="form-group">
                   
                    <img src="resimler/logo/<?php echo $ayarCek['logo'] ?>" style="height: 100px; 
                    border-radius: 50%;">
                  </div>
                      
                  <div class="form-group">
                    <label>Logo</label>
                    <input type="file" name="logo" class="form-control" required>
                  </div>
                        
                
                <!-- /.card-body -->

                <div class="form-group">
                  <button type="submit" name="logoKaydet" class="btn btn-success">Logo kaydet</button>
                </div>

              </form>
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
