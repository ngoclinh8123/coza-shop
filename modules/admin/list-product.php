        <?php
            include_once './modules/admin/heading-ad.php';
        ?>
        <!-- product list -->
        <?php
          include_once './modules/handle/connect-database.php';

          $data=array();
          $dataClass=array();
          if($connect){
              $sql='select * from product order by id desc';
              $result= mysqli_query($connect,$sql);
              while($row= mysqli_fetch_assoc($result)){
                  array_push($data,$row);
                  
              }
              $sql='select * from class';
              $result= mysqli_query($connect,$sql);
              while($row= mysqli_fetch_assoc($result)){
                  array_push($dataClass,$row);
                  
              }
              
          }
          // echo '<pre>';print_r($data);echo '</pre>';
          // echo '<pre>';print_r($dataClass);echo '</pre>';
        ?>
        <div class="pl-block">
          <div class="pl-block-heading">
            <!-- <span>Danh sách sản phẩm</span> -->
            <div class="pl-nav">

              <div class="pl-nav-item pl-nav-change-status">
                <span>
                  <i class="fas fa-cog"></i>
                  <span>Đổi trạng thái</span>
                </span>
              </div>
              
            </div>
          </div>
          <form action="" method="post">
            <div class="pl-htable">
              <div class="pl-col--1 j-c-c">
                <input type="checkbox" name="pl-all" value="1" />
              </div>
              <div class="pl-col--7">
                <span>ID</span>
              </div>
              <div class="pl-col--2">
                <span>Sản Phẩm</span><span>(<?php echo count($data); ?>)</span>
              </div>
              <div class="pl-col--3 j-c-c">
                <span>Giá Bán</span>
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
              <div class="pl-col--7">
                <span><?php echo $value['code']; ?></span>
              </div>
              <div class="pl-col--2">
                <div class="pl-item-img">
                  <img src="<?php 
                  $img=explode('|',$value['image']); 
                  echo './includes/images/'.$img[0];
                  ?>" alt="" />
                </div>
                <div class="pl-item-info">
                  <div class="pl-item-name"><?php echo $value['name']; ?></div>
                  <div class="pl-item-desc"><?php echo $value['description']; ?></div>
                </div>
              </div>
              <div class="pl-col--3"><span><?php echo $value['price']; ?></span><span>VND</span></div>
              <div class="pl-col--4">
                <span><?php echo implode(', ',explode('|',$value['size'])); ?></span>
              </div>
              <div class="pl-col--5">
                <span><?php echo implode(', ',explode('|',$value['color'])); ?></span>
              </div>
              <div class="pl-col--6">
                <span class="pl-edit-btn"><a href="sua-san-pham?id=<?php echo $value['id']; ?>">Sửa</a></span>
                <span>|</span>
                <span class="pl-delete-btn"><a href="xoa-san-pham?id=<?php echo $value['id']; ?>">Xóa</a></span>
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
        <!-- <div class="modal-change-status">
          <div class="modal-status-content">
            <div class="modal-status-exit">
                <i class="fas fa-times-circle"></i>
            </div>
            <form action="" method="post" name="">
                <div class="o-modal-title">
                    <span>Đổi trạng thái cho sản phẩm</span>
                </div>

                <div class="o-modal-text-top">
                    <span>Trạng thái mới sẽ giúp sản phẩm dễ dàng được tìm thấy</span>
                </div>
                <div class="o-modal-text">
                    <span>Trạng thái mới</span>
                </div>
                <select name="choose-status" id="" class="o-choose-title">
                    <option value="dang-lay-hang"></option>
                    <option value="dang-giao-hang">Đang giao hàng</option>
                    <option value="hoan-thanh">Hoàn thành</option>
                    <option value="da-huy">Đã hủy</option>
                </select>
                <input type="text" name="order-choose" hidden class="order-choose-input">
                <div class="o-submit"><input type="submit" value="Lưu" ></div>
            </form>
        </div> -->

        <!-- sub nav block -->
        <div class="pl-sub-nav-block">
                <div class="pls-row pls-row-head">
                  <span>
                    <i class="fas fa-filter"></i>
                    <span>Phân loại</span>
                  </span>
                </div>

                <?php
                  foreach ($dataClass as $key => $value){
                ?>
                <div class="pls-row">
                  <input type="checkbox" name="" id="<?php echo $value['id'] ?>" value="<?php echo $value['code']?>" checked="checked"><label for="<?php echo $value['id'] ?>"><?php echo $value['name']; ?></label>
                </div>

                <?php
                  }
                ?>
                
        </div>

        </div>
        <script>

            const changeStatusBtn=document.querySelector(".pl-nav-change-status");
            changeStatusBtn.onclick=function() {
              alert("Tính năng tạm thời bị khóa")
            }

            const subnavItems=Array.from(document.querySelectorAll(".pls-row input"));
            const productItemIds=Array.from(document.querySelectorAll(".pl-item .pl-col--7 span"))
            // console.log(productItemIds)

            var renderItemChecked = function(code,render){
              productItemIds.forEach(function(productItemId){
                // console.log(productItemId);
                if(render){
                  if(productItemId.innerText.slice(0,2) == code){
                    productItemId.parentElement.parentElement.style.display='flex';
                  }
                }else{
                  if(productItemId.innerText.slice(0,2) == code){
                    productItemId.parentElement.parentElement.style.display='none'
                  }
                }
              })
            }

            function checkChecked(){
              subnavItems.forEach(function(subnavItem,index){
                if(subnavItem.checked){
                  renderItemChecked(subnavItem.value,true);
                }else{
                  renderItemChecked(subnavItem.value,false);
                }
              })
            }

            



            checkChecked()

            subnavItems.forEach(function(subnavItem,index){
              subnavItem.onclick=function(){
                checkChecked()
              }
            })

        </script>
        <?php
          include './modules/admin/foot-ad.php';
        ?>
