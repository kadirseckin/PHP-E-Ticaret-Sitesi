<?php 
  require_once 'header.php' ;
  require_once 'sidebar.php';

  $kategoriler=$baglanti->prepare("SELECT * from  kategori where kategori_id=:kategori_id");
  $kategoriler->execute(array(
    'kategori_id'=>$_GET['id']
  )); // idsi 1 olan
  $kategorilerCek=$kategoriler->fetch(PDO::FETCH_ASSOC);
 ?>

<!DOCTYPE html>
<html>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">




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
                <h3 class="card-title">Yeni kategori ekle</h3>
                
  
                </b>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
              <form action="islem/islem.php" method="POST">
                <div class="card-body">
                  <div class="form-group">

                    <input type="hidden" name="kategori_id" value="<?php echo $kategorilerCek['kategori_id'] ?>">
                    <div class="form-group">
                                  
                    <label>Kategori adı</label>
                    <input type="text" value="<?php echo $kategorilerCek['kategori_adi'] ?>"  name="katadi" class="form-control" placeholder="Kategori adı giriniz"required>
                  </div>


                  <div class="form-group">
                    <label>Kategori sırası</label>
                    <input type="text"  value="<?php echo $kategorilerCek['kategori_sira'] ?>" class="form-control" name="sira" placeholder="Kategori sıra giriniz" required>
                  </div>

                  <div class="form-group">
                  <label>Kategori durum</label>
                  <select name="kategoridurum"  class="form-control select2" style="width: 100%;">
                    
                    <option value="1" 
                    <?php if($kategorilerCek['kategori_durum']== 1) echo "selected";?>>
                      Aktif</option>

                    <option value="0"
                    <?php if($kategorilerCek['kategori_durum']== 0) echo "selected";?>>
                      Pasif
                  </option>
                    
                  </select>
                </div>
                   
                
                <!-- /.card-body -->

                <div class="form-group">
                  <button type="submit" name="kategoriDuzenle" class="btn btn-success">Gönder</button>
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
