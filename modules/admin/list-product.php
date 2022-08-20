        <?php
            include './modules/admin/heading-ad.php';
        ?>
        <!-- product list -->
        <?php
          include './modules/handle/connect-database.php';

          $data=array();
          if($connect){
              $sql='select * from product';
              $result= mysqli_query($connect,$sql);
              while($row= mysqli_fetch_assoc($result)){
                  array_push($data,$row);
                  
              }
              
          }
          // echo '<pre>';print_r($data);echo '</pre>';
        ?>
        <div class="pl-block">
          <div class="pl-block-heading">
            <span>Danh sách sản phẩm</span>
          </div>
          <form action="" method="post">
            <div class="pl-htable">
              <div class="pl-col--1 j-c-c">
                <input type="checkbox" name="pl-all" value="1" />
              </div>
              <div class="pl-col--2">
                <span>Sản Phẩm</span>
              </div>
              <div class="pl-col--3 j-c-c">
                <span>Giá Tiền</span>
              </div>
              <div class="pl-col--4 j-c-c">
                <span>Size</span>
              </div>
              <div class="pl-col--5 j-c-c">
                <span>Màu Sắc</span>
              </div>
              <div class="pl-col--6 j-c-c">
                <span>Thao Tác</span>
              </div>
            </div>
            <?php
                foreach ($data as $key=>$value){
            ?>
            <div class="pl-item">
              <div class="pl-col--1">
                <input type="checkbox" name="pl-item[]" value="<?php echo $value['id']; ?>" />
              </div>
              <div class="pl-col--2">
                <div class="pl-item-img">
                  <img src="<?php 
                  $img=explode('|',$value['productimage']); 
                  echo './includes/images/'.$img[0];
                  ?>" alt="" />
                </div>
                <div class="pl-item-info">
                  <div class="pl-item-name"><?php echo $value['productname']; ?></div>
                  <div class="pl-item-desc"><?php echo $value['productdescription']; ?></div>
                </div>
              </div>
              <div class="pl-col--3"><span><?php echo $value['productprice']; ?></span><span>VND</span></div>
              <div class="pl-col--4">
                <span><?php echo implode(', ',explode('|',$value['productzise'])); ?></span>
              </div>
              <div class="pl-col--5">
                <span><?php echo implode(', ',explode('|',$value['productcolor'])); ?></span>
              </div>
              <div class="pl-col--6">
                <span class="pl-edit-btn"><a href="./modules/handle/edit-product.php?id=<?php echo $value['id']; ?>">Sửa</a></span>
                <span>|</span>
                <span class="pl-delete-btn"><a href="./delete-product.php?id=<?php echo $value['id']; ?>">Xóa</a></span>
              </div>
            </div>
            <?php
                }
            ?>
            <!-- <div class="pl-delete-all">
                <input type="submit" value="Xóa Tất Cả">
            </div> -->
          </form>
        </div>
        <?php
          include './modules/admin/foot-ad.php';
        ?>
