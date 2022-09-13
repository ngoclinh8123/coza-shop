
      <!-- heading -->
      <?php
          include_once './modules/handle/get-user-info.php';
          // get all product from database
          $allProduct=array();
          $dataClass=array();
          if($connect){
            $sql2='select * from product';
            $result=mysqli_query($connect,$sql2);
            while($row=mysqli_fetch_array($result)){
              array_push($allProduct,$row);
            }
            // echo '<pre>';print_r($allProduct);

            $sql='select * from class';
            $result=mysqli_query($connect,$sql);
            while($row=mysqli_fetch_array($result)){
              array_push($dataClass,$row);
            }
          }

          // echo '<pre>';print_r($dataClass);
      ?>
      <div class="heading">
        <div class="wrap f-c-c">
          <div class="logo">
            <a href="."
              ><img src="./includes/images/logo-sheeta-shop.png"
            /></a>
          </div>
          <div class="heading-nav">
            <ul class="nav">
              <li class="nav-item">
                <a href=".">Trang chủ</a>
              </li>
              <li class="nav-item">
                <a href="">Cửa hàng</a>
                <ul class="sub-nav">
                    <li class="sub-nav-item">
                      <a href="cua-hang">Tất cả sản phẩm</a>
                    </li>
                  <?php
                    foreach ($dataClass as $key => $value){
                  ?>

                    <li class="sub-nav-item">
                      <a href="cua-hang?request=<?php echo $value['router'] ?>&page=1"><?php echo $value['name'] ?></a>
                    </li>

                  <?php
                    }
                  ?>
                </ul>
              </li>
              <!-- <li class="nav-item">
                <a href="">Features</a>
              </li> -->
              <li class="nav-item">
                <a href="tin-tuc">Bài viết</a>
              </li>
              <!-- <li class="nav-item">
                <a href="">About</a>
              </li> -->
              <li class="nav-item">
                <a href="">Liên hệ</a>
              </li>
            </ul>
          </div>
          <div class="heading-ac f-c-c">
            <div class="heading-ac-icon heading-search">
              <i class="fas fa-search"></i>
            </div>
            <div class="heading-ac-icon heading-cart">
              <i class="fas fa-shopping-cart"></i>
              <span class="heading-ac-status">0</span>
            </div>

            <!-- liked product update late -->
            <!-- <div class="heading-ac-icon heading-liked">
              <i class="far fa-heart"></i>
              <span class="heading-ac-status">0</span>
            </div> -->
            <!-- <div class="heading-ac-avatar">
              <img src="../../includes/images/product-01.jpg" alt="" />
            </div> -->
            <div class="heading-ac-icon heading-account-guess">
              <i class="fas fa-user"></i>
            </div>
          </div>
        </div>

        <!-- search modal -->
        <div class="search-modal f-c-c">
          <div class="search-wrap">
            <form action="tim-kiem" method="get">
              <input
                type="text"
                name="search"
                placeholder="Search..."
                class="search-input"
              /><input type="submit" value="Search" name="search-submit"/>
            </form>
            <div class="exit-btn">
              <i class="fas fa-times"></i>
            </div>
          </div>
        </div>

        <!--cart  -->
        <?php 
        if($connect){
          $dataCart=array();
          $sql="select * from cart where userId= (select id from user where email='".$useremail."')";
          $result=mysqli_query($connect,$sql);
          while ($row=mysqli_fetch_array($result)){
            array_push($dataCart,$row);
          }

          // ngan cach cac id san pham bang '|'
          // $dataCart=explode("|",$dataCart[0]['product']);
          // echo '<pre>';print_r($dataCart);echo '</pre>';
        }
         ?>
        <div class="home-cart">
          <div class="home-cart-modal"></div>
          <div class="home-cart-block">
            <div class="home-cart-wrap f-c-c">
              <div class="home-cart-title"><span>YOUR CART</span></div>
              <div class="home-cart-empty"><span>Bạn chưa có sản phẩm nào trong giỏ</span></div>
              <?php
                for($i=0;$i<count($dataCart);$i++){
                  // echo '<pre>';print_r($dataCart[$i]);
                //   $item=explode("-",$dataCart[$i]);
                  foreach($allProduct as $key=>$value){
                    if($dataCart[$i]['productId']==$value['id']){
                      $image=explode("|",$value['image'])[0];
                      $path='./includes/images/';
                      $image=$path.$image;
                      $name=$value['name'];
                      $size=$dataCart[$i]['size'];
                      $color=$dataCart[$i]['color'];
                      $amount=$dataCart[$i]['amount'];
                      $price=$value['price'];
                
              ?>
                <div class="home-cart-item">
                  <div class="home-cart-item--img">
                    <a href="san-pham?id=<?php echo $dataCart[$i]['productId']; ?>">
                      <img src="<?php echo $image; ?>" alt="" />
                      <span class=""><i class="fas fa-times"></i></span>
                    </a>
                  </div>
                  <div class="home-cart-item--info">
                    <div class="home-cart-item--name">
                      <a href="san-pham?id=<?php echo $dataCart[$i]['productId']; ?>"><?php echo $name; ?></a>
                    </div>
                    <div class="home-cart-size-color">
                      <span><?php echo $size; ?></span> - <span><?php echo $color; ?></span>
                    </div>
                    <div class="home-cart-item--amount"><?php echo $amount ?></div>
                    x
                    <span class="home-cart-item--price"><?php echo $price ?></span>
                    <span>VNĐ</span>
                  </div>
                </div>
              <?php
                    }
                  }
                }
              ?>
              <div class="home-cart-total">
                Tổng cộng : <span class="home-cart-total-price">0</span>
                <span>VNĐ</span>
              </div>
              <a href="gio-hang" class="home-cart-view">
                <div class="home-cart-btn-view">Chi tiết</div>
              </a>
              <div class="home-cart-exit">
                <i class="fas fa-times"></i>
              </div>
            </div>
          </div>
        </div>

        <!-- user -->
        <div class="home-account">
          <div class="home-account-modal"></div>
          <div class="home-account-block">
            <div class="home-account-wrap f-c-c">
              <div class="home-account-title"><span>YOUR ACOUNT</span></div>
              <div class="home-account-img">
                <img src="./includes/images/GUESS.jpg" alt="">
              </div>
              <h1><?php echo $username ?></h1>
              <h2><?php echo $useremail ?></h2>
              <div class="home-account-exit">
                <i class="fas fa-times"></i>
              </div>
              
              <?php
                if($keyUserLogin){
              ?>
                <div class="home-account-list">
                  <div class="home-account-item">
                    <a href="">
                      <i class="fas fa-exit"></i>
                      <span>Địa chỉ nhận hàng</span>
                    </a>
                  </div>
                </div>
              <?php
                }
              ?>
              <?php
                if($keyUserLogin){
                  echo '<div class="home-account-logout"><a href="dang-nhap">Đăng xuất</a></div>';
                }else{
                  echo '<div class="home-account-logout"><a href="dang-nhap">Đăng nhập</a></div>';
                }
              ?>
              
            </div>
          </div>
        </div>
      </div>
<script src="./modules/users/js/heading.js"></script>
