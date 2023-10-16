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
        ?>
        <div class="pl-block">
          <div class="pl-block-heading">
            <!-- <span>Danh sách sản phẩm</span> -->
            <div class="pl-nav">
              
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
              <div class="pl-col--3"><span><?php echo number_format($value['price'], 0, '.', '.'); ?></span><span>VND</span></div>
      
              <div class="pl-col--6">
                <span class="pl-edit-btn"><a href="sua-san-pham?id=<?php echo $value['id']; ?>">Sửa</a></span>
                <span>|</span>
                <span class="pl-delete-btn"><a onClick = "return confirmDelete(<?php echo $value['id']; ?>)" href="#">Xóa</a></span>
              </div>
            </div>
            <?php
                }
            ?>
          </form>
        </div>

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
            const subnavItems=Array.from(document.querySelectorAll(".pls-row input"));
            const productItemIds=Array.from(document.querySelectorAll(".pl-item .pl-col--7 span"))
            console.log(productItemIds)

            var renderItemChecked = function(code,render){
              productItemIds.forEach(function(productItemId){
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

        <script>
          function confirmDelete (productID) {
            if (confirm("Bạn muốn xóa sản phẩm này?")) {
              window.location.href = `xoa-san-pham?id=${productID}`;
            }
            return false;
          }
        </script>
        <?php
          include './modules/admin/foot-ad.php';
        ?>
