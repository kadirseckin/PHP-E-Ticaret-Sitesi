<?php include 'header.php';

require_once 'sidebar.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <section class="content">
    <div class="container-fluid">

      <div class="row">
       


          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Sipariş tablosu</h3>

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
                      <th>Sipariş id </th>
                      <th>Kullanıcı id </th>
                      <th>Ürün id</th>
                      <th>Sipariş zaman</th>
                      <th>ürün adet</th>
                      <th>ürün fiyat </th>
                      <th>Toplam fiyat</th>
                      <th>Ödeme durumu</th>
                      <th>Durum</th>
                      

                    </tr> 
                  </thead>
                  <tbody>
                    <?php  
                    $siparis=$baglanti->prepare("SELECT * FROM  siparisler  order by siparis_zaman DESC");
                    $siparis->execute();
                    while ($sipariscek=$siparis->fetch(PDO::FETCH_ASSOC)) { ?>
                      <tr>
                            <td><?php echo $sipariscek['siparis_id'] ?></td>
                        <td><?php echo $sipariscek['kullanici_id'] ?></td>
                        <td><?php echo $sipariscek['urun_id'] ?></td>
                        <td><?php echo $sipariscek['siparis_zaman'] ?></td>
                        <td><?php echo $sipariscek['urun_adet'] ?></td>
                   <td><?php echo $sipariscek['urun_fiyat'] ?></td>
                     <td><?php echo $sipariscek['toplam_fiyat'] ?></td>
                       <td><span class="tag tag-success">
                          <?php if ($sipariscek['odeme_turu']=="1") {
                            echo "Kapıda ödeme";
                          }elseif($sipariscek['odeme_turu']=="0"){
                            echo "Kart ile ödeme";
                          } ?>




                        </span></td> 
                        <?php if ($sipariscek['siparis_onay']=="0") { ?>
                       
            

                        <td><a href="islem/islem.php?siparisonayla&id=<?php echo $sipariscek['siparis_id'] ?>"><button type="submit" class="btn btn-info" onclick="return confirm('Sipariş onaylansın mı?')">Onayla</button></a>
                     
                     <a href="islem/islem.php?siparisreddet&id=<?php echo $sipariscek['siparis_id'] ?>"> <button  type="submit" class="btn btn-danger"  onclick="return confirm('Sipariş reddedilsin mi?')">Reddet</button></a>  </td>

                  <?php     }else if($sipariscek['siparis_onay']=="1"){
                          echo "<td><b style='color:green'>Onaylandı</b></td>";
                  }else if($sipariscek['siparis_onay']=="2"){
                          echo "<td><b style='color:red'>Reddedildi</b></td>";
                  } ?>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>











          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php require_once 'footer.php'; ?>