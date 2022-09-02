<?php
    session_start();
    if(isset($_SESSION['user-email'])){
    include_once './modules/users/header-html-tag.php';
    include_once './modules/handle/connect-database.php';
    include_once './modules/handle/get-user-info.php';
    $name="";
    $phone="";
    $address="";
    $dataAddress=array(); 
    if($connect){
        $sql="select * from orderaddress where userId =".$userId;
        $result=mysqli_query($connect,$sql);
        while($row=mysqli_fetch_array($result)){
            array_push($dataAddress,$row);
        }
    }
    // echo $userdata['id'];
    // echo '<pre>';print_r($dataAddress);
?>

<div class="bill-row-2">
    <div class="row">
        <div class="bill-row-title col c-8">
            <i class="fa-solid fa-location-dot"></i>
            <span>Địa Chỉ Nhận Hàng</span>
        </div>
        <div class="bill-row-add-new">
            <i class="fas fa-plus"></i>
            <span>Thêm địa chỉ mới</span>
        </div>
    </div> 
    <div class="bill-aa-wrap">
        <?php
            for($i=0;$i<count($dataAddress);$i++){
        ?>
            <div class="aa-row">
                <i class="fas fa-map-marker-alt"></i>
                <label for="" class="">
                    <span class="bill-user"><?php echo $dataAddress[$i]['name']; ?></span>
                    <span class="bill-phone">( <?php echo $dataAddress[$i]['phone']; ?> ) - </span>
                    <span class="bill-address"><?php echo $dataAddress[$i]['address']; ?></span>
                </label>
                <a href="xu-ly-xoa-dia-chi?id=<?php echo $dataAddress[$i]['id']; ?>">Xóa</a>
            </div>
        <?php
            }
        ?>
        <div class="aa-modal">
            <form action="xu-ly-them-dia-chi?id=<?php echo $userId; ?>" class="aa-content" method="post">
                <div class="aa-content-title">Địa chỉ mới</div>
                <div class="row aa-content-row">
                    <div class="col c-6">
                        <input type="text" name="aa-name" placeholder="Họ và tên" class="aa-content-row-input"> 
                    </div>
                    <div class="col c-6">
                        <input type="text" name="aa-phone" placeholder="Số điện thoại" class="aa-content-row-input"> 
                    </div>
                </div>
                <div class="row aa-content-row">
                    <div class="col c-12">
                        <input type="text" class="aa-content-row-input" name="aa-address" placeholder="Địa chỉ cụ thể">
                    </div>
                </div>
                <div class="aa-content-row">
                    <span class="aa-content-fake">Hoàn thành</span>
                    <input type="submit" class="aa-content-confirm" value="Hoàn thành">
                    <span class="aa-content-return">Trở lại</span>
                </div>
            </form>
        </div>

        <div class="aa-row">
            <a href="gio-hang" class="aa-link-back">Trở lại</a>
        </div>
    </div>
</div>
<script src="./modules/users/js/add-address.js"></script>
<?php
    include './modules/users/footer-html-tag.php';
    }
?>