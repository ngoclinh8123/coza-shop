<?php
  // session_start();
  include_once './modules/handle/connect-database.php';
  include_once './modules/users/header-html-tag.php';

?>
    <div class="home-user">
      <?php
        include './modules/users/header-top.php';
        include './modules/users/header.php';
      ?>

      <!-- slide -->
      <div class="home-slide">
        <div class="home-slide__item active">
          <img src="./includes/images/slide-05.jpg" alt="" />
          <div class="slide-content">
            <div class="slide__title--top">
              <span>Featuring</span>
            </div>
            <div class="slide__title--mid">
              <span>BIG BURGER</span>
            </div>
            <div class="slide__title--action">
              <span><a href="cua-hang?request=do-an-nhanh&page=1">BUY NOW</a></span>
            </div>
          </div>
        </div>
        <div class="home-slide__item">
          <img src="./includes/images/banner-2.jpg" alt="" />
          <div class="slide-content">
            <div class="slide__title--top">
              <span>Applauding</span>
            </div>
            <div class="slide__title--mid">
              <span>GIGANTIC RAMEN</span>
            </div>
            <div class="slide__title--action">
              <span><a href="cua-hang?request=do-uong&page=1">BUY NOW</a></span>
            </div>
          </div>
        </div>
        <div class="home-slide__item">
          <img src="./includes/images/slide-06.jpg" alt="" />
          <div class="slide-content">
            <div class="slide__title--top">
              <span>Presenting</span>
            </div>
            <div class="slide__title--mid">
              <span>Huge Noodle</span>
            </div>
            <div class="slide__title--action">
              <span><a href="cua-hang?request=bua-com-mang-ve&page=1">BUY NOW</a></span>
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
          <div class="row" style="width:100%">
            <div class="col l-4">
              <div class="banner-item">
                <img src="./includes/images/banner-1.jpg" alt="" />
                <div class="banner-content">
                  <!-- <div class="banner-content--top">
                    <p>Fast food</p>
                  </div>
                  <div class="banner-content--bot">
                    <p>Spring 2022</p>
                  </div> -->
                </div>
                <div class="banner-modal">
                  <div class="banner-action">
                    <span>
                      <a href="cua-hang?request=do-an-nhanh&page=1">
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
                <img src="./includes/images/banner-2.jpg" alt="" />
                <div class="banner-content">
                  <!-- <div class="banner-content--top">
                    <p>Drinks</p>
                  </div>
                  <div class="banner-content--bot">
                    <p>Spring 2022</p>
                  </div> -->
                </div>
                <div class="banner-modal">
                  <div class="banner-action">
                    <span>
                      <a href="cua-hang?request=do-uong&page=1">
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
                <img src="./includes/images/banner-3.jpg" alt="" />
                <div class="banner-content">
                  <!-- <div class="banner-content--top">
                    <p>Dishes</p>
                  </div>
                  <div class="banner-content--bot">
                    <p>New Trend</p>
                  </div> -->
                </div>
                <div class="banner-modal">
                  <div class="banner-action">
                    <span>
                      <a href="cua-hang?request=bua-com-mang-ve&page=1">
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
              <span class="store-ovv-nav-item active">Fastfoods</span>
              <span class="store-ovv-nav-item">Drinks</span>
              <span class="store-ovv-nav-item">Dishes</span>
              <!-- <span class="store-ovv-nav-item">Wristwatch</span> -->
            </div>
            <div class="store-ovv-block-product show best-seller">
              <div class="store-ovv-product">
                
                <?php
                  $dataFastFood=array();
                  $sql="select * from product where class='FF'";
                  if($connect){
                    $result=mysqli_query($connect,$sql);
                    while($row=mysqli_fetch_array($result)){
                      array_push($dataFastFood,$row);
                    }
                  }
                  foreach($dataFastFood as $key=>$value){
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
                          <span><?php echo number_format($value['price'], 0, '.', '.').' VND' ?></span>
                        </div>
                        <div class="store-ovv--like">
                          <i class="fas fa-heart active"></i>
                          <i class="far fa-heart"></i>
                        </div>
                      </div>
                    </div>

                <?php } ?>
              </div>
            </div>
            <div class="store-ovv-block-product featured">
              <div class="store-ovv-product">
                <?php
                    $dataDrinks=array();
                    $sql="select * from product where class='DR'";
                    if($connect){
                      $result=mysqli_query($connect,$sql);
                      while($row=mysqli_fetch_array($result)){
                        array_push($dataDrinks,$row);
                      }
                    }
                    foreach($dataDrinks as $key=>$value){
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
                          <span><?php echo number_format($value['price'], 0, '.', '.').' VND' ?></span>
                        </div>
                        <div class="store-ovv--like">
                          <i class="fas fa-heart active"></i>
                          <i class="far fa-heart"></i>
                        </div>
                      </div>
                    </div>

                <?php } ?>
              </div>
            </div>
            <div class="store-ovv-block-product sale">
              <div class="store-ovv-product">
              <?php
                  $dataDishes=array();
                  $sql="select * from product where class='DS'";
                  if($connect){
                    $result=mysqli_query($connect,$sql);
                    while($row=mysqli_fetch_array($result)){
                      array_push($dataDishes,$row);
                    }
                  }
                  foreach($dataDishes as $key=>$value){
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
                          <span><?php echo number_format($value['price'], 0, '.', '.').' VND' ?></span>
                        </div>
                        <div class="store-ovv--like">
                          <i class="fas fa-heart active"></i>
                          <i class="far fa-heart"></i>
                        </div>
                      </div>
                    </div>

                <?php } ?>
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
                    <img src="./includes/images/blog-1.jpg" alt="" />
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
                    <img src="./includes/images/blog-2.jpg" alt="" />
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
                    <img src="./includes/images/blog-3.jpg" alt="" />
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
      src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
    ></script>
    <script src="./modules/users/js/home-user.js"></script>
<?php
  include_once './modules/users/footer-html-tag.php';
?>
