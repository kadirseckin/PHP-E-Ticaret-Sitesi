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
                <h3 class="card-title">Hakkımızda ayarlar</h3>
                
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
              
              <form action="islem/islem.php" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">

                    <div class="form-group">
                   
                    <img src="resimler/hakkimizda/<?php echo $hakkimizdaCek['hakkimizda_resim'] ?>" style="height: 100px; 
                    border-radius: 50%;">
                  </div>
                      
                      <input type="hidden"
                       name="eskiresim" value="<?php echo $hakkimizdaCek['hakkimizda_resim']?>">

                  <div class="form-group">
                    <label>Resim</label>
                    <input type="file" name="resim" class="form-control" >
                  </div>

                    <label>Hakkımızda Başlık</label>
                    <input type="text" value="<?php echo $hakkimizdaCek['hakkimizda_baslik'] ?>" name="baslik" class="form-control" placeholder="Başlık giriniz">
                  </div>


                  <div class="form-group">
                    <label>Hakkımızda Misyon</label>
                    <input type="text" value="<?php echo $hakkimizdaCek['hakkimizda_misyon'] ?>" class="form-control" name="misyon" placeholder="Misyon giriniz">
                  </div>

                  <div class="form-group">
                    <label>Hakkımızda Vizyon</label>
                    <input type="text" value="<?php echo $hakkimizdaCek['hakkimizda_vizyon'] ?>" class="form-control" name="vizyon" placeholder="Vizyon giriniz">
                  </div>

                  <label>Hakkımzda detay</label>  
                  <textarea class="ckeditor" id="editor1" name="detay" >
                    <?php echo $hakkimizdaCek['hakkimizda_detay'] ?>
                  </textarea>
                   
                
                <!-- /.card-body -->

                <div class="form-group">
                  <button type="submit" name="hakkimizdaKaydet" class="btn btn-success">Gönder</button>
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
