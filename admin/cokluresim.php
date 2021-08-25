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

           
            <form action="resimyukle" method="post" enctype="multipart/form-data" class="dropzone">
                <input type="hidden" name="urunid" value="<?php echo @$_GET['id']  ?>">
            </form>

            <div class="card">
              <div class="card-header">
               




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

                
                  <thead>
                  
                    <tr>
                      <th>Resim</th>
                
                      <th>Sil</th>
                      
                    
                    </tr>
              
                  </thead>
                  <tbody>
                     <?php 
                      $cokluresim=$baglanti->prepare("SELECT *FROM cokluresim where urun_id=:urun_id order by id ASC");
                      $cokluresim->execute(array('urun_id'=>@$_GET['id']));
                      while($cokluresimCek=$cokluresim->fetch(PDO::FETCH_ASSOC)){?>
                    <tr>
                      <td><img src="resimler/cokluresim/<?php echo $cokluresimCek['resim'] ?>" style="height: 150px; 
                    "></td>
                      
                        <form action="islem/islem.php" method="POST">
                      <td>
                        <input type="hidden" name="urun_id" value="<?php echo $cokluresimCek['urun_id'] ?>">
                        <input type="hidden" name="id" value="<?php echo $cokluresimCek['id'] ?>">
                        <input type="hidden" name="resim" value="<?php echo $cokluresimCek['resim'] ?>">
                         <button name="cokluResimSil" class="btn btn-danger" type="submit">Sil</button></a>
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
