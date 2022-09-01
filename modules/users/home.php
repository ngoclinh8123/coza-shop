<?php
  // session_start();
  include './modules/handle/connect-database.php';
  
  include './modules/users/header-html-tag.php';


  // get product infomation

?>
    <div class="home-user">
      <?php
        include './modules/users/header-top.php';
        include './modules/users/header.php';
      ?>

      <!-- slide -->
      <div class="home-slide">
        <div class="home-slide__item active">
          <img src="./includes/images/slide-01.jpg" alt="" />
          <div class="slide-content">
            <div class="slide__title--top">
              <span>Women Collection 2018</span>
            </div>
            <div class="slide__title--mid">
              <span>NEW SEASON</span>
            </div>
            <div class="slide__title--action">
              <span><a href="">SHOP NOW</a></span>
            </div>
          </div>
        </div>
        <div class="home-slide__item">
          <img src="./includes/images/slide-02.jpg" alt="" />
          <div class="slide-content">
            <div class="slide__title--top">
              <span>Men New-Season</span>
            </div>
            <div class="slide__title--mid">
              <span>JACKETS & COATS</span>
            </div>
            <div class="slide__title--action">
              <span><a href="">SHOP NOW</a></span>
            </div>
          </div>
        </div>
        <div class="home-slide__item">
          <img src="./includes/images/slide-03.jpg" alt="" />
          <div class="slide-content">
            <div class="slide__title--top">
              <span>Men Collection 2018</span>
            </div>
            <div class="slide__title--mid">
              <span>NEW ARRIVALS</span>
            </div>
            <div class="slide__title--action">
              <span><a href="">SHOP NOW</a></span>
            </div>
          </div>
        </div>

        <!-- next prev button -->
        <div class="n-p__btn p-btn f-c-c">
          <i class="fas fa-caret-left"></i>
        </div>
        <div class="n-p__btn n-btn f-c-c">
          <i class="fas fa-caret-right"></i>
        </div>
      </div>

      <!-- banner -->
      <div class="banner">
        <div class="wrap">
          <div class="row">
            <div class="col l-4">
              <div class="banner-item">
                <img src="./includes/images/banner-01.jpg" alt="" />
                <div class="banner-content">
                  <div class="banner-content--top">
                    <p>Women</p>
                  </div>
                  <div class="banner-content--bot">
                    <p>Spring 2018</p>
                  </div>
                </div>
                <div class="banner-modal">
                  <div class="banner-action">
                    <span>
                      <a href="">
                        <div class="banner-title">SHOP NOW</div>
                        <span class="banner-line"></span>
                      </a>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col l-4">
              <div class="banner-item">
                <img src="./includes/images/banner-02.jpg" alt="" />
                <div class="banner-content">
                  <div class="banner-content--top">
                    <p>Men</p>
                  </div>
                  <div class="banner-content--bot">
                    <p>Spring 2018</p>
                  </div>
                </div>
                <div class="banner-modal">
                  <div class="banner-action">
                    <span>
                      <a href="">
                        <div class="banner-title">SHOP NOW</div>
                        <span class="banner-line"></span>
                      </a>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col l-4">
              <div class="banner-item">
                <img src="./includes/images/banner-01.jpg" alt="" />
                <div class="banner-content">
                  <div class="banner-content--top">
                    <p>Accessories</p>
                  </div>
                  <div class="banner-content--bot">
                    <p>New Trend</p>
                  </div>
                </div>
                <div class="banner-modal">
                  <div class="banner-action">
                    <span>
                      <a href="">
                        <div class="banner-title">SHOP NOW</div>
                        <span class="banner-line"></span>
                      </a>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- store overview -->
      <div class="store-ovv">
        <div class="wrap2">
          <div class="store-ovv-block f-c-c">
            <div class="store-ovv-title">
              <span>Store Overview</span>
            </div>
            <div class="store-ovv-nav">
              <span class="store-ovv-nav-item active">Men</span>
              <span class="store-ovv-nav-item">Women</span>
              <span class="store-ovv-nav-item">Shoes</span>
              <span class="store-ovv-nav-item">Watches</span>
            </div>
            <div class="store-ovv-block-product show best-seller">
              <div class="store-ovv-product">
                
                <?php
                  $dataBestSeller=array();
                  $sql='select * from product';
                  if($connect){
                    $result=mysqli_query($connect,$sql);
                    while($row=mysqli_fetch_array($result)){
                      array_push($dataBestSeller,$row);
                    }
                  }
                  // echo '<pre>';
                  // print_r($dataBestSeller[0]);
                  foreach($dataBestSeller as $key=>$value){
                ?>

                
                    <div class="store-ovv__item">
                      <div class="store-ovv__item-img">
                        <img src="
                        <?php 
                          $image=explode("|",$value['image']);
                          $path='./includes/images/';
                          echo $path.$image[0];
                         ?>
                         " alt="" />
                        <div class="store-ovv__detail">
                          <a href="san-pham?id=<?php echo $value['id']; ?>"
                            ><span class="store-ovv__detail-content"
                              >Chi Tiết</span
                            ></a
                          >
                        </div>
                      </div>
                      <div class="store-ovv--content">
                        <div class="store-ovv--name">
                          <span><?php  echo $value['name'] ?></span>
                        </div>
                      </div>
                      <div class="store-ovv--bot">
                        <div class="store-ovv--price">
                          <span><?php echo $value['price'].' VND' ?></span>
                        </div>
                        <div class="store-ovv--like">
                          <i class="fas fa-heart active"></i>
                          <i class="far fa-heart"></i>
                        </div>
                      </div>
                    </div>

                <?php } ?>

                  
                <!-- <div class="store-ovv__item">
           
                  <div class="store-ovv__item-img">
                    <img src="./includes/images/product-01.jpg" alt="" />
                    <div class="store-ovv__detail">
                      <a href="./product-detail.php"
                        ><span class="store-ovv__detail-content"
                          >DETAIL</span
                        ></a
                      >
                    </div>
                  </div>
                  <div class="store-ovv--content">
                    <div class="store-ovv--name">
                      <span>Esprit Ruffle Shift</span>
                    </div>
                    <div class="store-ovv--like">
                      <i class="fas fa-heart active"></i>
                      <i class="far fa-heart"></i>
                    </div>
                  </div>
                  <div class="store-ovv--price">
                    <span>$16.64</span>
                  </div>
            
                </div> -->
                
              </div>
            </div>
            <div class="store-ovv-block-product featured">
              <div class="store-ovv-product">
                <div class="store-ovv__item">
                  <!-- <a href=""> -->
                  <div class="store-ovv__item-img">
                    <img src="./includes/images/product-01.jpg" alt="" />
                    <div class="store-ovv__detail">
                      <a href=""
                        ><span class="store-ovv__detail-content"
                          >DETAIL</span
                        ></a
                      >
                    </div>
                  </div>
                  <div class="store-ovv--content">
                    <div class="store-ovv--name">
                      <span>Esprit Ruffle Shift</span>
                    </div>
                    <div class="store-ovv--like">
                      <i class="fas fa-heart active"></i>
                      <i class="far fa-heart"></i>
                    </div>
                  </div>
                  <div class="store-ovv--price">
                    <span>$16.64</span>
                  </div>
                  <!-- </a> -->
                </div>
                <div class="store-ovv__item">
                  <!-- <a href=""> -->
                  <div class="store-ovv__item-img">
                    <img src="./includes/images/product-01.jpg" alt="" />
                    <div class="store-ovv__detail">
                      <a href=""
                        ><span class="store-ovv__detail-content"
                          >DETAIL</span
                        ></a
                      >
                    </div>
                  </div>
                  <div class="store-ovv--content">
                    <div class="store-ovv--name">
                      <span>Esprit Ruffle Shift</span>
                    </div>
                    <div class="store-ovv--like">
                      <i class="fas fa-heart active"></i>
                      <i class="far fa-heart"></i>
                    </div>
                  </div>
                  <div class="store-ovv--price">
                    <span>$16.64</span>
                  </div>
                  <!-- </a> -->
                </div>
                <div class="store-ovv__item">
                  <!-- <a href=""> -->
                  <div class="store-ovv__item-img">
                    <img src="./includes/images/product-01.jpg" alt="" />
                    <div class="store-ovv__detail">
                      <a href=""
                        ><span class="store-ovv__detail-content"
                          >DETAIL</span
                        ></a
                      >
                    </div>
                  </div>
                  <div class="store-ovv--content">
                    <div class="store-ovv--name">
                      <span>Esprit Ruffle Shift</span>
                    </div>
                    <div class="store-ovv--like">
                      <i class="fas fa-heart active"></i>
                      <i class="far fa-heart"></i>
                    </div>
                  </div>
                  <div class="store-ovv--price">
                    <span>$16.64</span>
                  </div>
                  <!-- </a> -->
                </div>
                <div class="store-ovv__item">
                  <!-- <a href=""> -->
                  <div class="store-ovv__item-img">
                    <img src="./includes/images/product-01.jpg" alt="" />
                    <div class="store-ovv__detail">
                      <a href=""
                        ><span class="store-ovv__detail-content"
                          >DETAIL</span
                        ></a
                      >
                    </div>
                  </div>
                  <div class="store-ovv--content">
                    <div class="store-ovv--name">
                      <span>Esprit Ruffle Shift</span>
                    </div>
                    <div class="store-ovv--like">
                      <i class="fas fa-heart active"></i>
                      <i class="far fa-heart"></i>
                    </div>
                  </div>
                  <div class="store-ovv--price">
                    <span>$16.64</span>
                  </div>
                  <!-- </a> -->
                </div>
                <div class="store-ovv__item">
                  <!-- <a href=""> -->
                  <div class="store-ovv__item-img">
                    <img src="./includes/images/product-01.jpg" alt="" />
                    <div class="store-ovv__detail">
                      <a href=""
                        ><span class="store-ovv__detail-content"
                          >DETAIL</span
                        ></a
                      >
                    </div>
                  </div>
                  <div class="store-ovv--content">
                    <div class="store-ovv--name">
                      <span>Esprit Ruffle Shift</span>
                    </div>
                    <div class="store-ovv--like">
                      <i class="fas fa-heart active"></i>
                      <i class="far fa-heart"></i>
                    </div>
                  </div>
                  <div class="store-ovv--price">
                    <span>$16.64</span>
                  </div>
                  <!-- </a> -->
                </div>
                <div class="store-ovv__item">
                  <!-- <a href=""> -->
                  <div class="store-ovv__item-img">
                    <img src="./includes/images/product-01.jpg" alt="" />
                    <div class="store-ovv__detail">
                      <a href=""
                        ><span class="store-ovv__detail-content"
                          >DETAIL</span
                        ></a
                      >
                    </div>
                  </div>
                  <div class="store-ovv--content">
                    <div class="store-ovv--name">
                      <span>Esprit Ruffle Shift</span>
                    </div>
                    <div class="store-ovv--like">
                      <i class="fas fa-heart active"></i>
                      <i class="far fa-heart"></i>
                    </div>
                  </div>
                  <div class="store-ovv--price">
                    <span>$16.64</span>
                  </div>
                  <!-- </a> -->
                </div>
                <div class="store-ovv__item">
                  <!-- <a href=""> -->
                  <div class="store-ovv__item-img">
                    <img src="./includes/images/product-01.jpg" alt="" />
                    <div class="store-ovv__detail">
                      <a href=""
                        ><span class="store-ovv__detail-content"
                          >DETAIL</span
                        ></a
                      >
                    </div>
                  </div>
                  <div class="store-ovv--content">
                    <div class="store-ovv--name">
                      <span>Esprit Ruffle Shift</span>
                    </div>
                    <div class="store-ovv--like">
                      <i class="fas fa-heart active"></i>
                      <i class="far fa-heart"></i>
                    </div>
                  </div>
                  <div class="store-ovv--price">
                    <span>$16.64</span>
                  </div>
                  <!-- </a> -->
                </div>
                <div class="store-ovv__item">
                  <!-- <a href=""> -->
                  <div class="store-ovv__item-img">
                    <img src="./includes/images/product-01.jpg" alt="" />
                    <div class="store-ovv__detail">
                      <a href=""
                        ><span class="store-ovv__detail-content"
                          >DETAIL</span
                        ></a
                      >
                    </div>
                  </div>
                  <div class="store-ovv--content">
                    <div class="store-ovv--name">
                      <span>Esprit Ruffle Shift</span>
                    </div>
                    <div class="store-ovv--like">
                      <i class="fas fa-heart active"></i>
                      <i class="far fa-heart"></i>
                    </div>
                  </div>
                  <div class="store-ovv--price">
                    <span>$16.64</span>
                  </div>
                  <!-- </a> -->
                </div>
              </div>
            </div>
            <div class="store-ovv-block-product sale">
              <div class="store-ovv-product">
                <div class="store-ovv__item">
                  <!-- <a href=""> -->
                  <div class="store-ovv__item-img">
                    <img src="./includes/images/product-01.jpg" alt="" />
                    <div class="store-ovv__detail">
                      <a href=""
                        ><span class="store-ovv__detail-content"
                          >DETAIL</span
                        ></a
                      >
                    </div>
                  </div>
                  <div class="store-ovv--content">
                    <div class="store-ovv--name">
                      <span>Esprit Ruffle Shift</span>
                    </div>
                    <div class="store-ovv--like">
                      <i class="fas fa-heart active"></i>
                      <i class="far fa-heart"></i>
                    </div>
                  </div>
                  <div class="store-ovv--price">
                    <span>$16.64</span>
                  </div>
                  <!-- </a> -->
                </div>
                <div class="store-ovv__item">
                  <!-- <a href=""> -->
                  <div class="store-ovv__item-img">
                    <img src="./includes/images/product-01.jpg" alt="" />
                    <div class="store-ovv__detail">
                      <a href=""
                        ><span class="store-ovv__detail-content"
                          >DETAIL</span
                        ></a
                      >
                    </div>
                  </div>
                  <div class="store-ovv--content">
                    <div class="store-ovv--name">
                      <span>Esprit Ruffle Shift</span>
                    </div>
                    <div class="store-ovv--like">
                      <i class="fas fa-heart active"></i>
                      <i class="far fa-heart"></i>
                    </div>
                  </div>
                  <div class="store-ovv--price">
                    <span>$16.64</span>
                  </div>
                  <!-- </a> -->
                </div>
                <div class="store-ovv__item">
                  <!-- <a href=""> -->
                  <div class="store-ovv__item-img">
                    <img src="./includes/images/product-01.jpg" alt="" />
                    <div class="store-ovv__detail">
                      <a href=""
                        ><span class="store-ovv__detail-content"
                          >DETAIL</span
                        ></a
                      >
                    </div>
                  </div>
                  <div class="store-ovv--content">
                    <div class="store-ovv--name">
                      <span>Esprit Ruffle Shift</span>
                    </div>
                    <div class="store-ovv--like">
                      <i class="fas fa-heart active"></i>
                      <i class="far fa-heart"></i>
                    </div>
                  </div>
                  <div class="store-ovv--price">
                    <span>$16.64</span>
                  </div>
                  <!-- </a> -->
                </div>
                <div class="store-ovv__item">
                  <!-- <a href=""> -->
                  <div class="store-ovv__item-img">
                    <img src="./includes/images/product-01.jpg" alt="" />
                    <div class="store-ovv__detail">
                      <a href=""
                        ><span class="store-ovv__detail-content"
                          >DETAIL</span
                        ></a
                      >
                    </div>
                  </div>
                  <div class="store-ovv--content">
                    <div class="store-ovv--name">
                      <span>Esprit Ruffle Shift</span>
                    </div>
                    <div class="store-ovv--like">
                      <i class="fas fa-heart active"></i>
                      <i class="far fa-heart"></i>
                    </div>
                  </div>
                  <div class="store-ovv--price">
                    <span>$16.64</span>
                  </div>
                  <!-- </a> -->
                </div>
                <div class="store-ovv__item">
                  <!-- <a href=""> -->
                  <div class="store-ovv__item-img">
                    <img src="./includes/images/product-01.jpg" alt="" />
                    <div class="store-ovv__detail">
                      <a href=""
                        ><span class="store-ovv__detail-content"
                          >DETAIL</span
                        ></a
                      >
                    </div>
                  </div>
                  <div class="store-ovv--content">
                    <div class="store-ovv--name">
                      <span>Esprit Ruffle Shift</span>
                    </div>
                    <div class="store-ovv--like">
                      <i class="fas fa-heart active"></i>
                      <i class="far fa-heart"></i>
                    </div>
                  </div>
                  <div class="store-ovv--price">
                    <span>$16.64</span>
                  </div>
                  <!-- </a> -->
                </div>
                <div class="store-ovv__item">
                  <!-- <a href=""> -->
                  <div class="store-ovv__item-img">
                    <img src="./includes/images/product-01.jpg" alt="" />
                    <div class="store-ovv__detail">
                      <a href=""
                        ><span class="store-ovv__detail-content"
                          >DETAIL</span
                        ></a
                      >
                    </div>
                  </div>
                  <div class="store-ovv--content">
                    <div class="store-ovv--name">
                      <span>Esprit Ruffle Shift</span>
                    </div>
                    <div class="store-ovv--like">
                      <i class="fas fa-heart active"></i>
                      <i class="far fa-heart"></i>
                    </div>
                  </div>
                  <div class="store-ovv--price">
                    <span>$16.64</span>
                  </div>
                  <!-- </a> -->
                </div>
              </div>
            </div>
            <div class="store-ovv-block-product top-rate">
              <div class="store-ovv-product">
                <div class="store-ovv__item">
                  <!-- <a href=""> -->
                  <div class="store-ovv__item-img">
                    <img src="./includes/images/product-01.jpg" alt="" />
                    <div class="store-ovv__detail">
                      <a href=""
                        ><span class="store-ovv__detail-content"
                          >DETAIL</span
                        ></a
                      >
                    </div>
                  </div>
                  <div class="store-ovv--content">
                    <div class="store-ovv--name">
                      <span>Esprit Ruffle Shift</span>
                    </div>
                    <div class="store-ovv--like">
                      <i class="fas fa-heart active"></i>
                      <i class="far fa-heart"></i>
                    </div>
                  </div>
                  <div class="store-ovv--price">
                    <span>$16.64</span>
                  </div>
                  <!-- </a> -->
                </div>
                <div class="store-ovv__item">
                  <!-- <a href=""> -->
                  <div class="store-ovv__item-img">
                    <img src="./includes/images/product-01.jpg" alt="" />
                    <div class="store-ovv__detail">
                      <a href=""
                        ><span class="store-ovv__detail-content"
                          >DETAIL</span
                        ></a
                      >
                    </div>
                  </div>
                  <div class="store-ovv--content">
                    <div class="store-ovv--name">
                      <span>Esprit Ruffle Shift</span>
                    </div>
                    <div class="store-ovv--like">
                      <i class="fas fa-heart active"></i>
                      <i class="far fa-heart"></i>
                    </div>
                  </div>
                  <div class="store-ovv--price">
                    <span>$16.64</span>
                  </div>
                  <!-- </a> -->
                </div>
                <div class="store-ovv__item">
                  <!-- <a href=""> -->
                  <div class="store-ovv__item-img">
                    <img src="./includes/images/product-01.jpg" alt="" />
                    <div class="store-ovv__detail">
                      <a href=""
                        ><span class="store-ovv__detail-content"
                          >DETAIL</span
                        ></a
                      >
                    </div>
                  </div>
                  <div class="store-ovv--content">
                    <div class="store-ovv--name">
                      <span>Esprit Ruffle Shift</span>
                    </div>
                    <div class="store-ovv--like">
                      <i class="fas fa-heart active"></i>
                      <i class="far fa-heart"></i>
                    </div>
                  </div>
                  <div class="store-ovv--price">
                    <span>$16.64</span>
                  </div>
                  <!-- </a> -->
                </div>
                <div class="store-ovv__item">
                  <!-- <a href=""> -->
                  <div class="store-ovv__item-img">
                    <img src="./includes/images/product-01.jpg" alt="" />
                    <div class="store-ovv__detail">
                      <a href=""
                        ><span class="store-ovv__detail-content"
                          >DETAIL</span
                        ></a
                      >
                    </div>
                  </div>
                  <div class="store-ovv--content">
                    <div class="store-ovv--name">
                      <span>Esprit Ruffle Shift</span>
                    </div>
                    <div class="store-ovv--like">
                      <i class="fas fa-heart active"></i>
                      <i class="far fa-heart"></i>
                    </div>
                  </div>
                  <div class="store-ovv--price">
                    <span>$16.64</span>
                  </div>
                  <!-- </a> -->
                </div>
                <div class="store-ovv__item">
                  <!-- <a href=""> -->
                  <div class="store-ovv__item-img">
                    <img src="./includes/images/product-01.jpg" alt="" />
                    <div class="store-ovv__detail">
                      <a href=""
                        ><span class="store-ovv__detail-content"
                          >DETAIL</span
                        ></a
                      >
                    </div>
                  </div>
                  <div class="store-ovv--content">
                    <div class="store-ovv--name">
                      <span>Esprit Ruffle Shift</span>
                    </div>
                    <div class="store-ovv--like">
                      <i class="fas fa-heart active"></i>
                      <i class="far fa-heart"></i>
                    </div>
                  </div>
                  <div class="store-ovv--price">
                    <span>$16.64</span>
                  </div>
                  <!-- </a> -->
                </div>
                <div class="store-ovv__item">
                  <!-- <a href=""> -->
                  <div class="store-ovv__item-img">
                    <img src="./includes/images/product-01.jpg" alt="" />
                    <div class="store-ovv__detail">
                      <a href=""
                        ><span class="store-ovv__detail-content"
                          >DETAIL</span
                        ></a
                      >
                    </div>
                  </div>
                  <div class="store-ovv--content">
                    <div class="store-ovv--name">
                      <span>Esprit Ruffle Shift</span>
                    </div>
                    <div class="store-ovv--like">
                      <i class="fas fa-heart active"></i>
                      <i class="far fa-heart"></i>
                    </div>
                  </div>
                  <div class="store-ovv--price">
                    <span>$16.64</span>
                  </div>
                  <!-- </a> -->
                </div>
              </div>
            </div>
            <!-- button -->
            <div class="slick__btn slick__btn-prev f-c-c">
              <i class="fas fa-angle-left"></i>
            </div>
            <div class="slick__btn slick__btn-next f-c-c">
              <i class="fas fa-angle-right"></i>
            </div>
          </div>
        </div>
      </div>

      <!-- our blog -->
      <div class="h-blog">
        <div class="wrap3">
          <div class="h-blog-block f-c-c">
            <div class="h-blog__title">Our Blog</div>
            <div class="row">
              <div class="col l-4 c-12 m-4">
                <div class="h-blog__item-img">
                  <a href="">
                    <img src="./includes/images/blog-02.jpg" alt="" />
                  </a>
                </div>
                <div class="h-blog__item-info">
                  By<span>Nancy Ward</span>on<span>July 22, 2017</span>
                </div>
                <div class="h-blog__item-title">
                  <a href="">
                    8 Inspiring Ways to Wear Dresses in the Winter
                  </a>
                </div>
                <div class="h-blog__item-content">
                  Nulla quis lorem ut libero malesuada feugiat. Proin eget
                  tortor risus. Vestibulum ac diam sit amet quam vehicula
                  elementum sed sit amet dui. Nulla quis lorem ut libero
                  malesuada feugiat. Nulla porttitor accumsan tincidunt. Nulla
                  porttitor accumsan tincidunt. Curabitur arcu erat, accumsan id
                  imperdiet et, porttitor at sem. Pellentesque in ipsum id orci
                  porta dapibus. Cras ultricies ligula sed magna dictum porta.
                  Nulla quis lorem ut libero malesuada feugiat.
                </div>
              </div>
              <div class="col l-4 c-12 m-4">
                <div class="h-blog__item-img">
                  <a href="">
                    <img src="./includes/images/blog-01.jpg" alt="" />
                  </a>
                </div>
                <div class="h-blog__item-info">
                  By<span>Nancy Ward</span>on<span>July 22, 2017</span>
                </div>
                <div class="h-blog__item-title">
                  <a href="">
                    8 Inspiring Ways to Wear Dresses in the Winter
                  </a>
                </div>
                <div class="h-blog__item-content">
                  Nulla quis lorem ut libero malesuada feugiat. Proin eget
                  tortor risus. Vestibulum ac diam sit amet quam vehicula
                  elementum sed sit amet dui. Nulla quis lorem ut libero
                  malesuada feugiat. Nulla porttitor accumsan tincidunt. Nulla
                  porttitor accumsan tincidunt. Curabitur arcu erat, accumsan id
                  imperdiet et, porttitor at sem. Pellentesque in ipsum id orci
                  porta dapibus. Cras ultricies ligula sed magna dictum porta.
                  Nulla quis lorem ut libero malesuada feugiat.
                </div>
              </div>
              <div class="col l-4 c-12 m-4">
                <div class="h-blog__item-img">
                  <a href="">
                    <img src="./includes/images/blog-01.jpg" alt="" />
                  </a>
                </div>
                <div class="h-blog__item-info">
                  By<span>Nancy Ward</span>on<span>July 22, 2017</span>
                </div>
                <div class="h-blog__item-title">
                  <a href="">
                    8 Inspiring Ways to Wear Dresses in the Winter
                  </a>
                </div>
                <div class="h-blog__item-content">
                  Nulla quis lorem ut libero malesuada feugiat. Proin eget
                  tortor risus. Vestibulum ac diam sit amet quam vehicula
                  elementum sed sit amet dui. Nulla quis lorem ut libero
                  malesuada feugiat. Nulla porttitor accumsan tincidunt. Nulla
                  porttitor accumsan tincidunt. Curabitur arcu erat, accumsan id
                  imperdiet et, porttitor at sem. Pellentesque in ipsum id orci
                  porta dapibus. Cras ultricies ligula sed magna dictum porta.
                  Nulla quis lorem ut libero malesuada feugiat.
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php
      include './modules/users/footer.php';
    ?>

    <script
      type="text/javascript"
      src="https://code.jquery.com/jquery-1.11.0.min.js"
    ></script>
    <script
      type="text/javascript"
      src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"
    ></script>
    <script
      type="text/javascript"
      src="./includes/libraries/slick-1.8.1/slick/slick.min.js"
    ></script>
    <script src="./modules/users/js/home-user.js"></script>
<?php
  include './modules/users/footer-html-tag.php';
?>
<!-- https://technext.github.io/cozastore/contact.html# -->
