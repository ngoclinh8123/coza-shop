<?php
    include_once './modules/admin/heading-ad.php';
    include_once './modules/handle/function.php';
    include_once './modules/handle/connect-database.php';

    $dataClass=array();
    if($connect){
        $sql="select * from class";
        $result=mysqli_query($connect,$sql);
        while($row=mysqli_fetch_array($result)){
            array_push($dataClass,$row);
        }
    }

    // echo '<pre>';print_r($dataClass);echo '</pre>';

?>

<!-- cac class trong database -->
<div class="class-block">
    <!-- add class -->
    <div class="add-class-block">
        <div class="cb-head-row">
            <div class="cb-head-item cb-head-add">
                <span>
                    <i class="fas fa-plus"></i>
                    <span>Thêm phân loại</span>
                </span>
            </div>
        </div>

        <form action="xu-ly-them-phan-loai" method="post" class="cb-add-class-block" name="add-class">
            <div class="cb-add-class-row">
                <span>Tên phân loại :</span><input type="text" name="add-class-name">
            </div>
            <div class="cb-add-class-row">
                <span>Mã phân loại :</span><input type="text" name="add-class-code">
            </div>
            <div class="cb-add-class-row">
                <span>URL :</span><input type="text" name="add-class-router">
            </div>
            <div class="cb-add-class-submit">
                <input type="submit" value="Thêm">
            </div>
        </form>

        <div class="cb-item cb-item-head">
        <span class="cb-item-col-1">Tên phân loại</span> 
        <span class="cb-item-col-2">Mã phân loại</span>
        <span class="cb-item-col-3">URL</span>
        </div>

        <?php
            foreach ($dataClass as $key => $value){
        ?>

            <div class="cb-item ">
                <span class="cb-item-col-1"><?php echo $value['name']; ?></span> 
                <span class="cb-item-col-2"><?php echo $value['code']; ?></span>
                <span class="cb-item-col-3"><?php echo $value['router']; ?></span>
            </div>

        <?php
            }
        ?>
    </div>

    <!-- add size -->
    <div class="add-size-block">
        <div class="cb-head-row">
            <div class="cb-head-item add-size-btn">
                <span>
                    <i class="fas fa-plus"></i>
                    <span>Thêm kích thước</span>
                </span>
            </div>
        </div>
        <div class="asb-row asb-row-head">
            <div class="asb-col--1">
                <span>Size</span>
            </div>
            <div class="asb-col--2">
                <span>Thao tác</span>
            </div>
        </div>
        <div class="asb-row">
            <div class="asb-col--1">
                <span>S</span>
            </div>
            <div class="asb-col--2">
                <a href="" class="asb--delete-btn">Xóa</a>
            </div>
        </div>
    </div>
</div>


<!-- cac san pham tu class -->
<div class="ac-subnav-block">
        <div class="as-row-head">
            <div class="as-head-item as-head-item--add-class">
                <span>Thêm phân loại</span>
            </div>
            <div class="as-head-item as-head-item--add-class">
                <span>Thêm kích thước</span>
            </div>
        </div>
</div>

<script>
    const addClassBtn=document.querySelector(".cb-head-add");
    const addClassBlock=document.querySelector(".cb-add-class-block");
    // console.log(addClassBtn);
    if(addClassBtn){
        addClassBtn.onclick=function(){
            // alert("ok");
            addClassBlock.classList.toggle("open")
        }
    }
</script>

<?php
    include './modules/admin/foot-ad.php';
?>