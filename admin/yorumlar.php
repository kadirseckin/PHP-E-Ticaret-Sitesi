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

          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Yorumlar</h3>



                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <div style=" margin:10px; font-size: 24px;">
                      
                        <?php 
                          if(@$_GET['onay']=="basarili"){
                            echo "<b style='color:green'>Yorum onaylandı </b>";
                          }elseif (@$_GET['onay']=="basarisiz") {
                            echo "<b style='color:red'>Yorum onaylanırken hata. </b>";
                          }

                          if(@$_GET['silme']=="basarili"){
                            echo "<b style='color:green'>Yorum silme başarılı </b>";
                          }elseif (@$_GET['silme']=="basarisiz") {
                            echo "<b style='color:red'>Yorum silinirken hata. </b>";
                          }
                         ?>

                     </div>
                  
                  <thead>
                  
                    <tr>
                     
                      <th>Yorum zaman</th>
                      <th>Yorum detay</th>
                      <th>Ürün id</th>
                      <th>Kullanıcı id</th>
                      <th>Onayla</th>
                      <th>Sil</th>
                    
                    </tr>
              
                  </thead>
                  <tbody>
                     <?php 
                      $yorumlar=$baglanti->prepare("
                        SELECT *FROM yorumlar
                         WHERE  yorum_onay=:yorum_onay
                         order by yorum_zaman DESC");

                      $yorumlar->execute(array('yorum_onay'=>0 )); //onaylanmamış yorumları burada listele
                      while($yorumlarCek=$yorumlar->fetch(PDO::FETCH_ASSOC)){?>
                    <tr>
                      <td><?php echo $yorumlarCek['yorum_zaman'] ?></td>
                      <td><?php echo $yorumlarCek['yorum_detay'] ?></td>
                      <td><?php echo $yorumlarCek['urun_id'] ?></td>
                      <td><?php echo $yorumlarCek['kullanici_id'] ?></td>
                                   
                     
                      <form action="islem/islem.php" method="post">
                        <td>
                        <input type="hidden" name="yorumid" value="<?php echo $yorumlarCek['yorum_id'] ?>">
                        <button name="yorumOnayla" class="btn btn-success">Onayla</button></td> 
                      </form>

                      <td><a href="islem/islem.php?yorumSil&id=<?php echo $yorumlarCek['yorum_id'] ?>">
                        <button  class="btn btn-danger">Sil</button></td> </a>

                 
                      
                  <?php } ?>
                   
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
 <?php require_once 'footer.php' ?>



</body>
</html>
