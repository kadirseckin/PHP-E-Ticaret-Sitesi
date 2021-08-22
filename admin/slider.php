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
                <h3 class="card-title">Slider tablosu</h3>



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

                  <a href="slider-ekle">
                    <button class="btn btn-success" style="float: right">Yeni slider</button></a>
                  <thead>
                  
                    <tr>
                      <th>Slider resim</th>
                      <th>Slider başlık</th>
                      <th>Slider açıklama</th>
                      <th>Slider buton ismi</th>
                      <th>Slider durum</th>
                      <th>Slider sıra</th>
                      <th>Slider banner</th>
                      <th>Düzenle</th>
                      <th>Sil</th>
                      
                    
                    </tr>
              
                  </thead>
                  <tbody>
                     <?php 
                      $sliderler=$baglanti->prepare("SELECT *FROM slider order by slider_id ASC");
                      $sliderler->execute();
                      while($sliderlerCek=$sliderler->fetch(PDO::FETCH_ASSOC)){?>
                    <tr>
                      <td><img src="resimler/slider/<?php echo $sliderlerCek['slider_resim'] ?>" style="height: 50px; 
                    "></td>
                      <td><?php echo $sliderlerCek['slider_baslik'] ?></td>
                      <td><?php echo $sliderlerCek['slider_aciklama'] ?></td>
                      <td><?php echo $sliderlerCek['slider_button'] ?></td>
                      <td><span class="tag tag-success">
                        <?php 
                          if($sliderlerCek['slider_durum']=="0"){
                            echo "Pasif";
                          }else if($sliderlerCek['slider_durum']=="1"){
                            echo "Aktif";
                          }
                         ?>
                          
                        </span></td>
                      <td><?php echo $sliderlerCek['slider_sira'] ?></td>
                     <td><span class="tag tag-success">
                        <?php 
                          if($sliderlerCek['slider_banner']=="0"){
                            echo "Banner";
                          }else if($sliderlerCek['slider_banner']=="1"){
                            echo "Slider";
                          }
                         ?>
                          
                        </span></td>
                                   
                     
                      

                        <td><a href="slider-duzenle?id=<?php echo $sliderlerCek["slider_id"] ?> ">
                        <button  class="btn btn-info">Düzenle</button></td> </a>

                        <form action="islem/islem.php" method="POST">
                      <td>
                       
                        <input type="hidden" name="id" value="<?php echo $sliderlerCek['slider_id'] ?>">
                        <input type="hidden" name="resim" value="<?php echo $sliderlerCek['slider_resim'] ?>">
                         <button name="sliderSil" class="btn btn-danger" type="submit">Sil</button></a>
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
