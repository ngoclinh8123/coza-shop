<?php
    ini_set('display_errors',1);
    include_once './modules/admin/heading-ad.php';
    include_once './modules/handle/function.php';
    include_once './modules/handle/connect-database.php';

?>
    <div class="orders-wrap">
        <div class="o-container">
            <div class="o-nav">
                <div class="o-nav-item o-add-order">
                    <span>
                        <i class="fas fa-plus"></i>
                        <span>Thêm đơn hàng</span>
                    </span>
                </div>
                <div class="o-nav-item o-handle">
                    <span>
                        <i class="fas fa-cog"></i>
                        <span>Thao tác</span>
                    </span>
                    <div class="o-suv-nav-list o-suv-nav-list-handle">
                        
                        <form action="xu-ly-van-chuyen" method="post" class="o-suv-nav-item o-suv-nav-item-real o-item-handle-ship-real">
                            <input type="text" class="o-item-handle-ship" name="o-item-handle-ship" hidden>
                            <input type="submit" value="Giao đơn hàng" class="">
                        </form>
                        <div class="o-suv-nav-item o-suv-nav-item-fake o-item-handle-ship-fake">
                            <span>Giao đơn hàng</span>
                        </div>
                        <form action="xu-ly-van-chuyen" method="post" class="o-suv-nav-item o-suv-nav-item-real o-item-handle-cancel-real">
                            <input type="text" class="o-item-handle-cancel" name="o-item-handle-cancel" hidden>
                            <input type="submit" value="Hủy đơn" class="">
                        </form>
                        <div class="o-suv-nav-item o-suv-nav-item-fake o-item-handle-cancel-fake">
                            <span>Hủy đơn</span>
                        </div>
                    </div>
                </div>
                <div class="o-nav-item o-change-title-fake">
                    <span>
                        <i class="fas fa-exchange-alt"></i>
                        <span>Đổi trạng thái</span>
                    </span>
                </div>
                <div class="o-nav-item o-change-title">
                    <span>
                        <i class="fas fa-exchange-alt"></i>
                        <span>Đổi trạng thái</span>
                    </span>
                </div>
            </div>

            <!-- doi trang thai don hang -->
            <div class="modal-change-title">
                <div class="o-modal-content">
                    <div class="o-modal-exit">
                        <!-- <i class="fas fa-times"></i> -->
                        <i class="fas fa-times-circle"></i>
                    </div>
                    <form action="xu-ly-doi-trang-thai-don-hang" method="post" name="change-title-order">
                        <div class="o-modal-title">
                            <span>Đổi trạng thái đơn hàng</span>
                        </div>
        
                        <div class="o-modal-text-top">
                            <span>Đổi trạng thái cho đơn hàng đã chọn</span>
                        </div>
                        <div class="o-modal-text">
                            <span>Trạng thái mới</span>
                        </div>
                        <select name="choose-title" id="" class="o-choose-title">
                            <?php
                                $dataStatus=array();
                                if($connect){
                                    $sql="select * from orderstatus order by level";
                                    $result=mysqli_query($connect,$sql);
                                    while($row=mysqli_fetch_array($result)){
                                        array_push($dataStatus,$row);
                                    }

                                    foreach ($dataStatus as $key => $value){
                            ?>
                                <option value=" <?php echo $value['id'] ?> "><?php echo $value['name'] ?></option>
                            <?php
                                    }
                                }
                            ?>
                        </select>
                        <input type="text" name="order-choose" hidden class="order-choose-input">
                        <div class="o-submit"><input type="submit" value="Lưu" ></div>
                    </form>
                </div>
            </div>
            <div class="o-row o-row-head">
                <div class="row">
                    <div class="col c-1 o-col-input">
                        <input type="checkbox" name="select-all-order" class="o-select-all">
                    </div>
                    <div class="col c-1 ">
                        <span>ID</span>
                    </div>
                    <div class="col c-2">
                        <span>Ngày tạo</span>
                    </div>
                    <div class="col c-3">
                        <span>Khách hàng</span>
                    </div>
                    <div class="col c-2">
                        <span>Trạng thái</span>
                    </div>
                    <div class="col c-2">
                        <span>Đơn vị vận chuyển</span>
                    </div>
                    <div class="col c-1">
                        <span></span>
                    </div>
                </div>
            </div>
            <?php
                $dataOrders=array();
                if($connect){
                    $sql='select o.id,o.product,o.year,o.month,o.day,o.time,o.price,o.status,a.userId,a.name,a.phone,a.address  from orders as o inner join orderaddress as a on o.addressId=a.id order by o.id desc';
                    $result=mysqli_query($connect,$sql);
                    while($row=mysqli_fetch_array($result)){
                        array_push($dataOrders,$row);
                    }
                }

                // echo '<pre>';print_r($dataOrders);
                foreach($dataOrders as $key=>$value){   
            ?>

            <div class="o-row">
                <div class="row">
                    <div class="col c-1 o-col-input o-col-input-item">
                        <input type="checkbox" name="select-orders[]" value="<?php echo $value[0]; ?>">
                    </div>
                    <div class="col c-1">
                        <a href="don-hang?id=<?php echo $value[0];?>" class="o-id"><?php echo 'DH'.str_pad($value[0],4,'0',STR_PAD_LEFT); ?></a>
                    </div>
                    <div class="col c-2">
                        <span class="o-time"><?php echo $value['day'].'/'.$value['month'].'/'.$value['year'].' '.$value['time'] ?></span>
                    </div>
                    <div class="col c-3 o-customer">
                        <span class="o-name"><?php echo $value['name']; ?></span><span>-</span><span class="o-phone"><?php echo $value['phone']; ?></span>
                    </div>
                    <div class="col c-2">
                        <?php
                            foreach($dataStatus as $keyStatus=>$valueStatus) {
                                if($valueStatus['id']==$value['status']){
                        ?>
                                    <span class="o-title <?php echo $valueStatus['class']; ?>"><?php echo $valueStatus['name']; ?></span>

                        <?php

                                }
                            }
                        ?>
                    </div>
                    <div class="col c-2">
                        <span class="o-ship">Giao hang tiet kiem</span>
                    </div>
                    <div class="col c-1 o-action-btn">
                        <i class="fas fa-ellipsis-v"></i>
                        <div class="o-action-list">
                            <div class="o-action-item">
                                <a class="o-action-detail" href="don-hang?id=<?php echo $value[0]; ?>">Chi tiết</a>
                            </div>
                            <div class="o-action-item">
                                <span>Hủy đơn</span>
                            </div>
                            <label for="o-detete--<?php echo $value[0] ?>" class="o-action-item">Xóa đơn</label>
                                <form action="xu-ly-xoa-don-hang" method="POST">
                                    <input type="text" value="<?php echo $value[0] ?>" name="id-product-delete" hidden>
                                    <input type="submit" value="Xóa đơn" id="o-detete--<?php echo $value[0] ?>" hidden>
                                </form>
                        </div>
                    </div>
                </div>
            </div>

            <?php
                }
            ?>
        </div>
    </div>
<script src="./modules/admin/js/admin.js"></script>
</body>
</html>