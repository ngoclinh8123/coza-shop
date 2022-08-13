<?php
    session_start();
    include './header-html-tag.php';
    include '../handle/connect-database.php';
    include './header.php';

    $data=array();
    if(isset($_GET['id'])){
      if($connect){
        $id=$_GET['id'];
        $sql='select * from product where id='.$id;
        $result=mysqli_query($connect, $sql);
          while($row=mysqli_fetch_array($result)){
            array_push($data,$row);
          }
      }
    }
    $data=$data[0];

    $image=explode("|",$data['productimage']);
    $name=$data['productname'];
    $desc=$data['productdescription'];
    $price=$data['productprice'];
    $color=$data['productcolor'];
    $size=$data['productzise'];
    $weight=$data['productweight'];
    $dimension=$data['productdimension'];
    $material=$data['productmaterial'];


    $sizes = explode('|',$size);
    $colors=explode('|',$color);

    $size=implode(', ',explode('|',$size));
    $color=implode(', ',explode('|',$color));

?>
    <div class="product-detail-user">
      

      <!-- path -->
      <div class="prd-path">
        <span>Home</span>
        <i class="fas fa-angle-right"></i>
        <span>Men</span>
        <i class="fas fa-angle-right"></i>
        <span>Lightweight Jacket</span>
      </div>

      <!-- item -->
      <div class="prd-wrap">
        <div class="prd-wrap-row">
          <div class="prd-col--1">
            <img class="active" src="<?php echo $image[0] ?>" alt="" />
            <img class="" src="<?php echo $image[1] ?>" alt="" />
            <img class="" src="<?php echo $image[2] ?>" alt="" />
          </div>
          <div class="prd-col--2">
            <div class="prd-col--2-border">
              <img class="active" src="<?php echo $image[0] ?>" alt="" />
              <img class="" src="<?php echo $image[1] ?>" alt="" />
              <img class="" src="<?php echo $image[2] ?>" alt="" />
            </div>
          </div>
          <div class="prd-col--3">
            <div class="prd-col--3-row prd-name"><?php echo $name ?></div>
            <div class="prd-col--3-row prd-price">
              <span><?php echo $price ?></span><span> VNĐ</span>
            </div>
            <div class="prd-col--3-row prd-desc"><?php echo $desc ?></div>

            <form action="" method="post">
              <input type="text" class="prd-id" value="<?php echo $_GET["id"] ?>" hidden>
              <div class="prd-form-row size">
                <span>Size</span>
                <select name="size" id="">
                  <option value="">Choose an option</option>
                  <?php
                    
                      foreach ($sizes as $key=>$value) {
                        if(isset($_POST['size'])){
                          if($_POST['size']==$value){
                            echo '<option value="'.$value.'" selected>Size '.$value.'</option>';
                          }else echo '<option value="'.$value.'">Size '.$value.'</option>';
                        }else echo '<option value="'.$value.'">Size '.$value.'</option>';
                      }
                    
                  ?>
                </select>
              </div>
              <?php
                if(isset($_POST['size'])){
                  if($_POST['size']==''){
                    echo '<div class="prd-form-error size"><span>* Vui lòng chọn trường này</span></div>';
                  }else echo '';
                }
              ?>
      
              <div class="prd-form-row color">
                <span>Color</span>
                <select name="color" id="">
                  <option value="">Choose an option</option>
                  <?php
                    if(isset($_POST['color'])){
                      foreach ($colors as $key => $value){
                        if($_POST['color'] == $value){
                          echo '<option value="'.$value.'" selected>'.$value.'</option>';
                        }else echo '<option value="'.$value.'">'.$value.'</option>';
                      }
                    }else {
                      foreach ($colors as $key => $value){
                        echo '<option value="'.$value.'">'.$value.'</option>';
                      }
                    }
                  ?>
                </select>
              </div>
                <?php
                  if(isset($_POST['color'])){
                    if($_POST['color']==''){
                      echo '<div class="prd-form-error color"><span>* Vui lòng chọn trường này</span></div>';
                    }else echo '';
                  }
                ?>
              <div class="prd-form-row">
                <div class="prd-btn-avtive">
                  <p class="prd-form-row-btn prd-des-btn">-</p>
                  <p class="prd-form-row-btn prd-amount">1</p>
                  <p class="prd-form-row-btn prd-inc-btn">+</p>
                </div>
                <input id="amount-item" type="number" value="1" hidden name="amount-item" />
              </div>
              <div class="prd-form-row">
                <div class="prd-form-btn">
                  <input type="submit" value=" Thêm vào giỏ hàng " /><a href="" class="prd-buy-now">Mua ngay</a><span class="prd-buy-now-fake">Mua ngay</span>
                </div>
              </div>
            </form>
          </div>

          <div class="prd-wrap-col--2"></div>
        </div>

        <!-- prd detail -->
        <div class="prd-detail-info">
          <div class="prd-detail-nav">
            <span class="active">Description</span>
            <span>Addition infomation</span>
            <span>Reviews</span>
          </div>
          <div class="prd-detail-row">
            <div class="prd-detail-item-infomation prd-detail-desc active"><?php echo $desc ?></div>
            <div class="prd-detail-item-infomation prd-detail-infomation">
              <div class="prd-detail-infomation-wrap">
                <div class="prd-detail-info-row">
                  <div>Weight</div>
                  <span><?php echo $weight; ?></span>
                </div>
                <div class="prd-detail-info-row">
                  <div>Dimensions</div>
                  <span><?php  echo $dimension; ?></span>
                </div>
                <div class="prd-detail-info-row">
                  <div>Materials</div>
                  <span><?php echo $material; ?></span>
                </div>
                <div class="prd-detail-info-row">
                  <div>Color</div>
                  <span><?php echo $color; ?></span>
                </div>
                <div class="prd-detail-info-row">
                  <div>Size</div>
                  <span><?php echo $size; ?></span>
                </div>
              </div>
            </div>
            <div class="prd-detail-item-infomation prd-detail-review"></div>
          </div>
        </div>
      </div>
    </div>
    

    <!-- handle add product to cart -->
    <?php
      if(isset($_POST['size']) && $_POST['size'] !='' && isset($_POST['color']) && $_POST['color'] !=''){
        $id=$_GET['id'];
        $size=$_POST['size'];
        $color=$_POST['color'];
        $amountItem=$_POST['amount-item'];
        $userId=$_SESSION['id'];
        $newItem=$id."-".$size."-".$color."-".$amountItem;
        $allItem=array();
        if($connect){
          $sql='select product from cart where id= (select cartid from user where id='.$userId.')';
          $result=mysqli_query($connect,$sql);
          while($row=mysqli_fetch_array($result)){
            array_push($allItem,$row);
          }
          $allItem=explode('|',$allItem[0]['product']);
          array_push($allItem,$newItem);
          $newData=implode("|",$allItem);
          $sql="update cart set product='".$newData."' where id=(select cartid from user where id=".$userId.")";
          if(mysqli_query($connect,$sql)){
            echo '<div class="register-success-form"><div class="register-success-content"><i class="fas fa-times"></i><div class="register-success-title">Đã thêm sản phẩm vào giỏ hàng</div><a href="./list-all-product.php?page=1">Tiếp tục</a></div></div>';
          }else echo '<div class="register-success-form"><div class="register-success-content"><i class="fas fa-times"></i><div class="register-success-title">Có lỗi xảy ra khi thêm vào giỏ hàng</div><a href="./list-all-product.php?page=1">Thử lại</a></div></div>';
        }
      }
    ?>

    <script src="./js/product-detail.js"></script>

<?php
    include './footer.php';
    include './footer-html-tag.php';
?>
