<!DOCTYPE html>
<html>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

<?php 
  require_once 'header.php' ;
  require_once 'sidebar.php';

   $sliderler=$baglanti->prepare("SELECT * from  slider where slider_id=:slider_id");
  $sliderler->execute(array(
    'slider_id'=>$_GET['id']
  )); // idsi 1 olan
  $sliderlerCek=$sliderler->fetch(PDO::FETCH_ASSOC);

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
                <h3 class="card-title">Slider düzenle</h3>
                
  
                </b>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
              <form action="islem/islem.php" method="POST" enctype="multipart/form-data">
                <div class="card-body">

                    <input type="hidden" name="eskiSliderResim"
                     value="<?php echo $sliderlerCek['slider_resim'] ?>">

                     <input type="hidden" name="slider_id" value="<?php echo $sliderlerCek['slider_id'] ?>">


                    <div class="form-group">                                    
                    <label>Slider resim</label>
                    <input type="file"  name="sliderresim" class="form-control">
                  </div>


                  <div class="form-group">                                    
                    <label>Slider başlık</label>
                    <input type="text" value="<?php echo $sliderlerCek['slider_baslik'] ?>"  name="sliderbaslik" class="form-control" placeholder="Slider adı giriniz" required>
                  </div>


                  <div class="form-group">
                    <label>Slider açıklama</label>
                    <input type="text" value="<?php echo $sliderlerCek['slider_aciklama'] ?>" class="form-control" name="slideraciklama" placeholder="Slider sıra giriniz" required>
                  </div>

                  <div class="form-group">
                    <label>Slider sıra</label>
                    <input type="text" value="<?php echo $sliderlerCek['slider_sira'] ?>" class="form-control" name="slidersira" placeholder="Slider sıra giriniz" required>
                  </div>

                  <div class="form-group">
                    <label>Slider link</label>
                    <input type="text" value="<?php echo $sliderlerCek['slider_link'] ?>" class="form-control" name="sliderlink" placeholder="Slider sıra giriniz" required>
                  </div>

                  <div class="form-group">
                    <label>Slider buton adı</label>
                    <input type="text" value="<?php echo $sliderlerCek['slider_button'] ?>" class="form-control" name="sliderbutton" placeholder="Slider sıra giriniz" required>
                  </div>

                  <div class="form-group">
                  <label>Slider banner</label>
                  <select name="sliderbanner" class="form-control select2" style="width: 100%;">
                    
                    <option value="1"
                     <?php if($sliderlerCek['slider_banner']==1) echo "selected"; ?>>Slider
                   </option>

                    <option value="0" 
                     <?php if($sliderlerCek['slider_banner']==0) echo "selected"; ?>> Banner
                   </option>
                    
                  </select>
                </div>
                

                  <div class="form-group">
                  <label>Slider durum</label>
                  <select name="sliderdurum" class="form-control select2" style="width: 100%;">
                    
                    <option value="1"
                     <?php if($sliderlerCek['slider_durum']==1) echo "selected"; ?>>Aktif
                   </option>

                    <option value="0" 
                     <?php if($sliderlerCek['slider_durum']==0) echo "selected"; ?>> Pasif
                   </option>
                  
                    
                  </select>
                </div>
                   
                
                <!-- /.card-body -->

                <div class="form-group">
                  <button type="submit" name="sliderDuzenle" class="btn btn-success">Gönder</button>
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
