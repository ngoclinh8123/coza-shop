<?php
    include './heading-ad.php';
    include '../handle/function.php';
    include '../handle/connect-database.php';

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
                        <div class="o-suv-nav-item "><span>Đổi trạng thái</span></div>
                        <div class="o-suv-nav-item o-order-success"><span>Giao hàng loạt</span></div>
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
            <div class="modal-change-title">
                <div class="o-modal-content">
                    <div class="o-modal-exit">
                        <!-- <i class="fas fa-times"></i> -->
                        <i class="fas fa-times-circle"></i>
                    </div>
                    <form action="../handle/change-title-order.php" method="post">
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
                            <option value="dang-lay-hang">Đang lấy hàng</option>
                            <option value="dang-giao-hang">Đang giao hàng</option>
                            <option value="hoan-thanh">Hoàn thành</option>
                            <option value="da-huy">Đã hủy</option>
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
                    $sql='select * from orders order by id desc';
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
                        <input type="checkbox" name="select-orders[]" value="<?php echo $value['id']; ?>">
                    </div>
                    <div class="col c-1">
                        <a href="./order-detail.php?id=<?php echo $value['id'];?>" class="o-id"><?php echo 'DH'.str_pad($value['id'],4,'0',STR_PAD_LEFT); ?></a>
                    </div>
                    <div class="col c-2">
                        <span class="o-time"><?php echo $value['day'].'/'.$value['month'].'/'.$value['year'].' '.$value['timeorder'] ?></span>
                    </div>
                    <div class="col c-3 o-customer">
                        <span class="o-name"><?php echo $value['username']; ?></span><span>-</span><span class="o-phone"><?php echo $value['phone']; ?></span>
                    </div>
                    <div class="col c-2">
                        <span class="o-title <?php echo $value['title']; ?>"><?php echo $value['title']; ?></span>
                    </div>
                    <div class="col c-2">
                        <span class="o-ship">Giao hang tiet kiem</span>
                    </div>
                    <div class="col c-1 o-action-btn">
                        <i class="fas fa-ellipsis-v"></i>
                        <div class="o-action-list">
                            <div class="o-action-item">
                                <a class="o-action-detail" href="./order-detail.php?id=<?php echo $value['id']; ?>">Chi tiết</a>
                            </div>
                            <div class="o-action-item">
                                <span>Hủy đơn</span>
                            </div>
                            <div class="o-action-item">
                                <span>Xóa đơn</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
                }
            ?>
        </div>
    </div>
<script src="./js/admin.js"></script>
</body>
</html>