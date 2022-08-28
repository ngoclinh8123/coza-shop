
      <!-- heading -->
      <?php
          include_once './modules/handle/get-user-info.php';
          // get all product from database
          $allProduct=array();
          if($connect){
            $sql2='select * from product';
            $result=mysqli_query($connect,$sql2);
            while($row=mysqli_fetch_array($result)){
              array_push($allProduct,$row);
            }
            // echo '<pre>';print_r($allProduct);
          }
      ?>
      <div class="heading">
        <div class="wrap f-c-c">
          <div class="logo">
            <a href="./index.php"
              ><img src="./includes/images/logo-coza-store.png"
            /></a>
          </div>
          <div class="heading-nav">
            <ul class="nav">
              <li class="nav-item">
                <a href="trang-chu">Home</a>
              </li>
              <li class="nav-item">
                <a href="">Shop</a>
                <ul class="sub-nav">
                  <li class="sub-nav-item">
                    <a href="tat-ca-san-pham?page=1">All Products</a>
                  </li>
                  <li class="sub-nav-item">
                    <a href="">Women</a>
                  </li>
                  <li class="sub-nav-item">
                    <a href="">Men</a>
                  </li>
                  <li class="sub-nav-item">
                    <a href="">Bag</a>
                  </li>
                  <li class="sub-nav-item">
                    <a href="">Shoes</a>
                  </li>
                  <li class="sub-nav-item">
                    <a href="">Watches</a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="">Features</a>
              </li>
              <li class="nav-item">
                <a href="./modules/users/blog.php">Blog</a>
              </li>
              <li class="nav-item">
                <a href="">About</a>
              </li>
              <li class="nav-item">
                <a href="">Contact</a>
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
            <form action="" method="post">
              <input
                type="text"
                name="search"
                placeholder="Search..."
                autofocus
              /><input type="submit" value="Search" />
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
          echo '<pre>';print_r($dataCart);echo '</pre>';
        }
         ?>
        <div class="home-cart">
          <div class="home-cart-modal"></div>
          <div class="home-cart-block">
            <div class="home-cart-wrap f-c-c">
              <div class="home-cart-title"><span>YOUR CART</span></div>
              <?php
                // for($i=1;$i<count($dataCart);$i++){
                //   $item=explode("-",$dataCart[$i]);
                //   foreach($allProduct as $key=>$value){
                //     if($item[0]==$value['id']){
                //       $image=explode("|",$value['productimage'])[0];
                //       $name=$value['productname'];
                //       $size=$item[1];
                //       $color=$item[2];
                //       $amount=$item[3];
                //       $price=$value['productprice'];
                
              ?>
                <div class="home-cart-item">
                  <div class="home-cart-item--img">
                    <a href="./product-detail.php?id=<?php echo $item[0]; ?>">
                      <img src="<?php echo $image; ?>" alt="" />
                      <span class=""><i class="fas fa-times"></i></span>
                    </a>
                  </div>
                  <div class="home-cart-item--info">
                    <div class="home-cart-item--name">
                      <a href="./product-detail.php?id=<?php echo $item[0]; ?>"><?php echo $name; ?></a>
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
                //     }
                //   }
                // }
              ?>
              <div class="home-cart-total">
                Total : <span class="home-cart-total-price">0</span>
                <span>VNĐ</span>
              </div>
              <a href="./cart.php" class="home-cart-view">
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
                <h1><?php echo $username ?></h1>
              <div class="home-account-exit">
                <i class="fas fa-times"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
<script src="./modules/users/js/heading.js"></script>
