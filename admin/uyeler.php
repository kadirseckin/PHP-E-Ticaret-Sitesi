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
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Kullanıcılar</h3>

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
                  <a href="uyeler-ekle">
                    <button class="btn btn-success" style="float: right">Yeni kullanıcı</button></a>
                  <thead>
                  
                    <tr>
                      <th>Kullanıcı no</th>
                      <th>Kullanıcı adı</th>
                      <th>Ad Soyad</th>
                      <th>Adres</th>
                      <th>İl</th>
                      <th>İlçe</th>
                      <th>Telefon</th>
                      <th>Yetki</th>
                      <th>Katıldığı tarih</th>
                      <th>Düzenle</th>
                      <th>Sil</th>
                    </tr>
              
                  </thead>
                  <tbody>
                     <?php 
                      $kullanicilar=$baglanti->prepare("SELECT *FROM kullanici order by kullanici_id ASC");
                      $kullanicilar->execute();
                      while($kullanicilarCek=$kullanicilar->fetch(PDO::FETCH_ASSOC)){?>
                    <tr>
                      <td><?php echo $kullanicilarCek['kullanici_id'] ?></td>
                      <td><?php echo $kullanicilarCek['kullanici_adi'] ?></td>
                      <td><?php echo $kullanicilarCek['kullanici_adsoyad'] ?></td>
                      <td><?php echo $kullanicilarCek['kullanici_adres'] ?></td>
                      <td><?php echo $kullanicilarCek['kullanici_il'] ?></td>
                      <td><?php echo $kullanicilarCek['kullanici_ilce'] ?></td>
                      <td><?php echo $kullanicilarCek['kullanici_tel'] ?></td>
                     
                      <td><span class="tag tag-success">
                        <?php 
                          if($kullanicilarCek['kullanici_yetki']=="1"){
                            echo "Normal kullanıcı";
                          }else if($kullanicilarCek['kullanici_yetki']=="2"){
                            echo "Admin";
                          }
                         ?>
                          
                        </span></td>
                      <td><?php echo $kullanicilarCek['kullanici_zaman'] ?></td>

                      <td><button type="submit" class="btn btn-info">Düzenle</button></td>

                      <td><a href="islem/islem.php?kullanicisil&id=<?php echo $kullanicilarCek["kullanici_id"] ?>">
                        <button  class="btn btn-danger">Sil</button></td> </a>
                    </tr>
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
