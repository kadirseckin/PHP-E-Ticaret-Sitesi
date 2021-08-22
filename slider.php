 <div class="slider-with-banner">
                <div class="container">
                    <div class="row">
                        <!-- Begin Slider Area -->
                        <div class="col-lg-8 col-md-8">
                            <div class="slider-area">
                                <div class="slider-active owl-carousel">
                                    <!-- Begin Single Slide Area -->

                    <?php 
                      $sliderler=$baglanti->prepare("SELECT *FROM slider
                       where slider_durum=:slider_durum and slider_banner=:slider_banner
                       order by slider_sira ASC"
                        );
                      $sliderler->execute(array('slider_durum'=>1 , 'slider_banner'=>1));
                      while($sliderlerCek=$sliderler->fetch(PDO::FETCH_ASSOC)){?>
                                    <div style="background-image: 
                                    url(admin/resimler/slider/<?php echo $sliderlerCek['slider_resim'] ?>);" class="single-slide align-center-left  animation-style-01 bg-1">
                                        <div class="slider-progress"></div>
                                        <div class="slider-content">
                                            <h5><?php echo $sliderlerCek['slider_aciklama'] ?> </h5>
                                            <h2><?php echo $sliderlerCek['slider_baslik'] ?></h2>
                                           
                                            <div class="default-btn slide-btn">
                                                <a class="links" href="<?php echo $sliderlerCek['slider_link']?>"><?php echo $sliderlerCek['slider_button'] ?> </a>
                                            </div>
                                        </div>
                                    </div>

                         <?php } ?>               
                                    <!-- Single Slide Area End Here -->
                                  
                                </div>
                            </div>
                        </div>
                        <!-- Slider Area End Here -->

                        <!-- Begin Li Banner Area -->
                        <div class="col-lg-4 col-md-4 text-center pt-xs-30">
                              <?php 
                      $sliderler=$baglanti->prepare("SELECT *FROM slider
                       where slider_durum=:slider_durum and slider_banner=:slider_banner
                       order by slider_sira ASC limit 2"
                        );
                      $sliderler->execute(array('slider_durum'=>1 , 'slider_banner'=>0));
                      while($sliderlerCek=$sliderler->fetch(PDO::FETCH_ASSOC)){?>
                            <div style="margin-top:5px" class="li-banner">
                                <a href="<?php echo $sliderlerCek['slider_link'] ?>">
                                    <img src="admin/resimler/slider/<?php echo $sliderlerCek['slider_resim'] ?>" alt="">
                                </a>
                            </div>

                        <?php } ?>
                           
                        </div>
                        <!-- Li Banner Area End Here -->
                    </div>
                </div>
            </div>