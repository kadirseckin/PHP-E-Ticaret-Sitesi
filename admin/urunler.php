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
                <h3 class="card-title">Ürünler tablosu</h3>



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

                  <a href="urunler-ekle?katid=<?php echo $_GET['katid'] ?>">
                    <button class="btn btn-success" style="float: right">Yeni ürün</button></a>
                  <thead>
                  
                    <tr>
                      <th>Resim</th>
                      <th>Başlık</th>
                      <th>Model</th>
                      <th>Renk</th>
                      <th>Durum</th>
                      <th>Sıra</th>
                      <th>Adet</th>
                      <th>Düzenle</th>
                      <th>Sil</th>
                    </tr>
              
                  </thead>
                  <tbody>
                     <?php 
                      $urunler=$baglanti->prepare("SELECT *FROM urunler
                       where kategori_id=:kategori_id order by urun_id ASC");
                      $urunler->execute(array('kategori_id'=>$_GET['katid']));
                      while($urunlerCek=$urunler->fetch(PDO::FETCH_ASSOC)){?>
                    <tr>
                      <td>
                        <img src="resimler/urunler/<?php echo $urunlerCek['urun_resim'] ?>" 
                        style="height: 50px; "></td>

                      <td><?php echo $urunlerCek['urun_baslik'] ?></td>
                      <td><?php echo $urunlerCek['urun_model'] ?></td>
                      <td><?php echo $urunlerCek['urun_renk'] ?></td>
                      <td><span class="tag tag-success">
                        <?php 
                          if($urunlerCek['urun_durum']=="0"){
                            echo "Pasif";
                          }else if($urunlerCek['urun_durum']=="1"){
                            echo "Aktif";
                          }
                         ?>
                          
                        </span></td>
                      <td><?php echo $urunlerCek['urun_sira'] ?></td>
                       <td><?php echo $urunlerCek['urun_adet'] ?></td>
                    
                                   
                     
                      

                        <td><a href="urunler-duzenle?id=<?php echo $urunlerCek["urun_id"] ?> ">
                        <button  class="btn btn-info">Düzenle</button></td> </a>

                        <form action="islem/islem.php" method="POST">
                      <td>
                       
                        <input type="hidden" name="id" value="<?php echo $urunlerCek['urun_id'] ?>">
                        <input type="hidden" name="resim" value="<?php echo $urunlerCek['urun_resim'] ?>">
                        <input type="hidden" name="kat_id" value="<?php echo $urunlerCek['kategori_id'] ?>">
                         <button name="urunSil" class="btn btn-danger" type="submit">Sil</button></a>
                      </td>
                    </form>
                                    
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
