<!DOCTYPE html>
<html>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

<?php 
  require_once 'header.php' ;
  require_once 'sidebar.php';

  $urunler=$baglanti->prepare("SELECT *FROM urunler where urun_id=:urun_id");
  $urunler->execute(array('urun_id'=>$_GET['id']));
  $urunlerCek=$urunler->fetch(PDO::FETCH_ASSOC); 

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
                <h3 class="card-title">Ürün düzenle</h3>
                
  
                </b>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
              <form action="islem/islem.php" method="POST" enctype="multipart/form-data">
                <div class="card-body">

                   <input type="hidden" name="katsid" value="<?php echo $urunlerCek['kategori_id'] ?>">
                   <input type="hidden" name="urun_id" value="<?php echo $urunlerCek['urun_id'] ?>">

                  <input type="hidden" name="eskiurunresim" value="<?php echo $urunlerCek['urun_resim'] ?>">


                  <div class="form-group">
                 
                    <img src="resimler/urunler/<?php echo $urunlerCek['urun_resim'] ?>" style="height: 250px;">
                  </div>

                  <div class="form-group">                                    
                    <label>Ürün resim</label>
                    <input type="file"  name="urunresim" class="form-control">
                  </div>

                 


                    <div class="form-group">
                  <label>Ürün Kategori</label>
                  <select name="urunkategori" class="form-control select2" style="width: 100%;">
                   
                    <?php 
                     

                     $kategori=$baglanti->prepare("SELECT *FROM kategori  order by kategori_id ASC" );
                     $kategori->execute();
                     while($kategoricek=$kategori->fetch(PDO::FETCH_ASSOC)){ ?>
                        <option <?php if($urunlerCek['kategori_id']==$kategoricek['kategori_id']){echo 'selected';} ?>
                          value="<?php echo $kategoricek['kategori_id'] ?>" >
                           <?php echo $kategoricek['kategori_adi'] ?></option>
                     <?php  }?> 
                    
                    
                    
                  </select>
                </div>
                    
                    


                  <div class="form-group">                                    
                    <label>Ürün başlık</label>
                    <input  value="<?php echo $urunlerCek['urun_baslik'] ?>" type="text"  name="urunbaslik" class="form-control" placeholder="Ürün adı giriniz" required>
                  </div> 


                  <div class="form-group">
                    <label>Ürün açıklama</label>
                    <textarea class="ckeditor" id="editor1" name="urunaciklama" >
                    <?php echo $urunlerCek['urun_aciklama'] ?>
                  </textarea>
                  </div>

                  <div class="form-group">
                    <label>Ürün sıra</label>
                    <input  value="<?php echo $urunlerCek['urun_sira'] ?>"  type="text" class="form-control" name="urunsira" placeholder="Ürün sıra giriniz" required>
                  </div>

                  <div class="form-group">
                    <label>Ürün model</label>
                    <input  value="<?php echo $urunlerCek['urun_model'] ?>" type="text" class="form-control" name="urunmodel" placeholder="Ürün model giriniz" required>
                  </div>

                  <div class="form-group">
                    <label>Ürün renk</label>
                    <input  value="<?php echo $urunlerCek['urun_renk'] ?>"type="text" class="form-control" name="urunrenk" placeholder="Ürün renk giriniz" required>
                  </div>

                    <div class="form-group">
                    <label>Ürün adet</label>
                    <input value="<?php echo $urunlerCek['urun_adet'] ?>" type="text" class="form-control" name="urunadet" placeholder="Ürün adet giriniz" required>
                  </div>

                    <div class="form-group">
                    <label>Ürün fiyat</label>
                    <input  value="<?php echo $urunlerCek['urun_fiyat'] ?>"type="text" class="form-control" name="urunfiyat" placeholder="Ürün fiyat giriniz" required>
                  </div>

                    <div class="form-group">
                    <label>Ürün anahtar kelime</label>
                    <input value="<?php echo $urunlerCek['urun_etiket'] ?>" type="text" class="form-control" name="urunanahtar" placeholder="Ürün anahtar kelime giriniz" required>
                  </div>

                 
                

                  <div class="form-group">
                  <label>Ürün durum</label>
                  <select name="urundurum" class="form-control select2" style="width: 100%;">
                    
                    <option value="1" <?php if($urunlerCek['urun_durum']==1){echo 'selected';} ?>>Aktif</option>
                    <option value="0" <?php if($urunlerCek['urun_durum']==0){echo 'selected';}?>>Pasif</option>
                    
                  </select>
                </div>
                   

                 <div class="form-group">
                  <label>Öne çıkar</label>
                  <select name="urunonecikan" class="form-control select2" style="width: 100%;">
                    
                    <option value="1" <?php if($urunlerCek['urun_onecikan']==1){echo 'selected';}?>>
                    Öne çıkar</option>
                    <option value="0"  <?php if($urunlerCek['urun_onecikan']==0){echo 'selected';}?>>
                    Çıkarma</option>
                    
                  </select>
                </div>
                      
                
                <!-- /.card-body -->

                <div class="form-group">
                  <button type="submit" name="urunDuzenle" class="btn btn-success">Gönder</button>
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
