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
                <h3 class="card-title">Kategoriler</h3>



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

                  <a href="kategori-ekle">
                    <button class="btn btn-success" style="float: right">Yeni kategori</button></a>
                  <thead>
                  
                    <tr>
                      <th>Kategori no</th>
                      <th>Kategori adı</th>
                      <th>Kategori sıra</th>
                      <th>Kategori durum</th>
                      <th>Düzenle</th>
                      <th>Sil</th>
                      <th>Ürünlere git </th>
                    
                    </tr>
              
                  </thead>
                  <tbody>
                     <?php 
                      $kategoriler=$baglanti->prepare("SELECT *FROM kategori order by kategori_id ASC");
                      $kategoriler->execute();
                      while($kategorilerCek=$kategoriler->fetch(PDO::FETCH_ASSOC)){?>
                    <tr>
                      <td><?php echo $kategorilerCek['kategori_id'] ?></td>
                      <td><?php echo $kategorilerCek['kategori_adi'] ?></td>
                      <td><?php echo $kategorilerCek['kategori_sira'] ?></td>
                                   
                     
                      <td><span class="tag tag-success">
                        <?php 
                          if($kategorilerCek['kategori_durum']=="0"){
                            echo "Pasif";
                          }else if($kategorilerCek['kategori_durum']=="1"){
                            echo "Aktif";
                          }
                         ?>
                          
                        </span></td>

                        <td><a href="kategori-duzenle?id=<?php echo $kategorilerCek["kategori_id"] ?> ">
                        <button  class="btn btn-info">Düzenle</button></td> </a>

                      <td><a href="islem/islem.php?kategoriSil&id=<?php echo $kategorilerCek["kategori_id"] ?>">
                        <button  class="btn btn-danger">Sil</button></td> </a>

                        <td><button type="submit" class="btn btn-success">Git</button></td>
                      
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
