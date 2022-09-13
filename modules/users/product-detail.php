<?php
  if(isset($_GET['id'])){
    // session_start();
    include_once './modules/users/header-html-tag.php';
    include_once './modules/handle/connect-database.php';
    include_once './modules/users/header.php';

    $data=array();
    $dataClass=array();

      if($connect){
        $id=$_GET['id'];
        $sql='select * from product where id='.$id;
        $result=mysqli_query($connect, $sql);
        while($row=mysqli_fetch_array($result)){
          array_push($data,$row);
        }
      }
      if(count($data)>0){

    $data=$data[0];
    if($connect){
      $sql="select name from class where code = '".$data['class']."'";
      $result=mysqli_query($connect, $sql);
      while($row=mysqli_fetch_array($result)){
        array_push($dataClass,$row);
      }
    }
    $dataClass=$dataClass[0]['name'];

    // echo $dataClass;

    $code=$data['code'];
    $image=explode("|",$data['image']);
    $name=$data['name'];
    $desc=$data['description'];
    $price=$data['price'];
    $color=$data['color'];
    $size=$data['size'];
    $weight=$data['weight'];
    $dimension=$data['dimension'];
    $material=$data['material'];


    $sizes = explode('|',$size);
    $colors=explode('|',$color);

    $size=implode(', ',explode('|',$size));
    $color=implode(', ',explode('|',$color));

    $path='./includes/images/';
?>
    <div class="product-detail-user">
      

      <!-- path -->
      <div class="prd-path">
        <span>Coza Store</span>
        <i class="fas fa-angle-right"></i>
        <span><?php echo $dataClass; ?></span>
        <i class="fas fa-angle-right"></i>
        <span><?php echo $code; ?></span>
      </div>

      <!-- item -->
      
      <div class="prd-wrap">
        <div class="prd-wrap-row">
          <div class="prd-col--1">
            <img class="active" src="<?php echo $path.$image[0] ?>" alt="" />
            <img class="" src="<?php echo $path.$image[1] ?>" alt="" />
            <img class="" src="<?php echo $path.$image[2] ?>" alt="" />
          </div>
          <div class="prd-col--2">
            <div class="prd-col--2-border">
              <img class="active" src="<?php echo $path.$image[0] ?>" alt="" />
              <img class="" src="<?php echo $path.$image[1] ?>" alt="" />
              <img class="" src="<?php echo $path.$image[2] ?>" alt="" />
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
                <span>Màu sắc</span>
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
                  <input type="submit" value=" Thêm vào giỏ hàng " /><?php if($keyUserLogin) echo '<a href="" class="prd-buy-now">Mua ngay</a>'; ?><span class="prd-buy-now-fake">Mua ngay</span>
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
        // $userId=$_SESSION['id'];
        // $newItem=$id."-".$size."-".$color."-".$amountItem;
        // $allItem=array();
        if($connect){
          // $sql='select product from cart where id= (select cartid from user where id='.$userId.')';
          // $result=mysqli_query($connect,$sql);
          // while($row=mysqli_fetch_array($result)){
          //   array_push($allItem,$row);
          // }
          // $allItem=explode('|',$allItem[0]['product']);
          // array_push($allItem,$newItem);
          // $newData=implode("|",$allItem);
          // $sql="update cart set product='".$newData."' where id=(select cartid from user where id=".$userId.")";
            if($keyUserLogin){
              $sql="insert into cart(userId,productId,amount,color,size) values (".$userId.",".$id.",'".$amountItem."','".$color."','".$size."')";
              if(mysqli_query($connect,$sql)){
                echo '<div class="register-success-form"><div class="register-success-content"><i class="fas fa-times"></i><div class="register-success-title">Đã thêm sản phẩm vào giỏ hàng</div><a href="san-pham?id='.$_GET['id'].'">Tiếp tục</a></div></div>';
              }else echo '<div class="register-success-form"><div class="register-success-content"><i class="fas fa-times"></i><div class="register-success-title">Có lỗi xảy ra khi thêm vào giỏ hàng</div><a href="tat-ca-san-pham?page=1">Thử lại</a></div></div>';
            }else{
              echo '<div class="register-success-form"><div class="register-success-content"><i class="fas fa-times"></i><div class="register-success-title">Vui lòng đăng nhập để sử dụng tính năng này</div><a href="dang-nhap">Đăng nhập</a></div></div>';
            }
        }
      }
    ?>

    <script src="./modules/users/js/product-detail.js"></script>

<?php
      }else{
      
?>
    <div class="bl-error-block">
        <div class="bl-error-content">
            <span>* Không sản phẩm nào được tìm thấy :((</span>
        </div>
    </div>
<?php
      }
    include './modules/users/footer.php';
    include './modules/users/footer-html-tag.php';
  }else{
    include './modules/users/home.php';
  }
?>
