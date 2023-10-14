<!-- add product -->
<?php
include_once './modules/admin/heading-ad.php';
include_once './modules/handle/function.php';
include_once './modules/handle/connect-database.php';

$dataClass = array();
if ($connect) {
    $sql = 'select * from class';
    $result = mysqli_query($connect, $sql);
    while ($row = mysqli_fetch_array($result)) {
        array_push($dataClass, $row);
    }
}

$idArray = array();
$sql = 'select max(id) from product';
$result = mysqli_query($connect, $sql);
while ($row = mysqli_fetch_array($result)) {
    array_push($idArray, $row);
}

?>
<div class="ap-block">
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-title-heading">Thêm sản phẩm</div>
        <div class="form-big-row">
            <div class="form-big-col">

                <!-- product class -->
                <div class="form-row">
                    <div class="form-title">Phân loại<span>(Bắt buộc)</span></div>
                    <select name="add-class" id="">
                        <?php
                        foreach ($dataClass as $key => $value) {
                            echo '<option value="' . $value['code'] . '">' . $value['name'] . '</option>';
                        }
                        ?>

                    </select>
                </div>

                <!-- product name -->
                <div class="form-row">
                    <div class="form-title">Tên <span>(Bắt buộc)</span></div>
                    <?php
                    if (isset($_POST['add-name']) && trim($_POST['add-name']) != "") {
                        echo '<input type="text" name="add-name" value="' . $_POST['add-name'] . '">';
                    } else {
                        echo '<input type="text" name="add-name" value="" class="input-error">';
                        echo '<div class="form-error">Trường này không được để trống</div>';
                    }
                    ?>
                </div>

                <!-- product description -->
                <div class="form-row">
                    <div class="form-title">Mô tả</div>
                    <?php
                    echo '<textarea class="add-textarea" name="add-desc">' . $_POST['add-desc'] . '</textarea>';
                    ?>
                </div>

                <div class="form-row">
                    <div class="form-title">Giá tiền(VNĐ) <span>(Bắt buộc)</span></div>

                    <?php
                    if (isset($_POST['add-price']) && trim($_POST['add-price']) != "") {
                        echo '<input type="number" name="add-price" min="0" value="' . $_POST['add-price'] . '">';
                    } else {
                        echo '<input type="number" name="add-price" min="0" class="input-error" >';
                        echo '<div class="form-error">Trường này không được để trống</div>';
                    }
                    ?>
                </div>

            </div>
            <div class="form-big-col">
                <div class="form-row">
                    <div class="form-title">Hình ảnh(1) <span>(Bắt buộc)</span></div>
                    <?php
                    $path = "../../includes/images/";
                    if ($_FILES["add-image-1"]['error'] === UPLOAD_ERR_OK) {
                        echo '<img src="' . $path . $_FILES["add-image-1"]["name"] . '">';
                    }
                    ?>
                    <input type="file" name="add-image-1">
                    <div class="form-title">Hình ảnh(2) <span>(Bắt buộc)</span></div>
                    <?php
                    $path = "../../includes/images/";
                    if ($_FILES["add-image-2"]['error'] === UPLOAD_ERR_OK) {
                        echo '<img src="' . $path . $_FILES["add-image-2"]["name"] . '">';
                    }
                    ?>
                    <input type="file" name="add-image-2">
                    <div class="form-title">Hình ảnh(3) <span>(Bắt buộc)</span></div>
                    <?php
                    $path = "../../includes/images/";
                    if ($_FILES["add-image-3"]['error'] === UPLOAD_ERR_OK) {
                        echo '<img src="' . $path . $_FILES["add-image-3"]["name"] . '">';
                    }
                    ?>
                    <input type="file" name="add-image-3">
                </div>
                <div class="form-row">
                    <div class="add-btn">
                        <input type="submit" value="Thêm">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<?php

$class = $_POST['add-class'];

$name = $_POST['add-name'];
$desc = $_POST['add-desc'];
$price = $_POST['add-price']; 

if (trim($_POST['add-name']) != "" && trim($_POST['add-price']) != "" && trim($_FILES['add-image-1']['tmp_name']) != "" && trim($_FILES['add-image-2']['tmp_name']) != ""  && trim($_FILES['add-image-3']['tmp_name']) != "") {

    $path = './includes/images/';
    $image = array();

    $image1Name = createImageName($_FILES['add-image-1']);
    $destination = $path . $image1Name;
    array_push($image, $image1Name);
    move_uploaded_file($_FILES['add-image-1']['tmp_name'], $destination);

    $image2Name = createImageName($_FILES['add-image-2']);
    $destination = $path . $image2Name;
    array_push($image, $image2Name);
    move_uploaded_file($_FILES['add-image-2']['tmp_name'], $destination);

    $image3Name = createImageName($_FILES['add-image-3']);
    $destination = $path . $image3Name;
    array_push($image, $image3Name);
    move_uploaded_file($_FILES['add-image-3']['tmp_name'], $destination);

    $image = implode('|', $image);

    $sql = "insert into product(class,name,description,image,price) values('" . $class . "','" . $name . "','" . $desc . "','" . $image . "','" . $price . "')";
    if ($connect) {
        if (mysqli_query($connect, $sql)) {
            $idArray = array();
            $sql = 'select max(id) from product';
            $result = mysqli_query($connect, $sql);
            while ($row = mysqli_fetch_array($result)) {
                array_push($idArray, $row);
            }
            // echo '<pre>';print_r($idArray);echo '</pre>';
            $id = $idArray[0]['max(id)'];
            $id = str_pad($id, 4, "0", STR_PAD_LEFT);
            $code = $class . $id;
            $sql = "update product set code='" . $code . "' where id=" . $id;
            if (mysqli_query($connect, $sql)) {
                echo '<div class="add-success-model"><div class="add-success-title"><span class="add-sucess-message">Thêm dữ liệu thành công</span><span class="add-sucess-button"><a href="">OK</a></span></div></div>';
            }
        } else {
            // echo "<h1 style='color:red;'>Co loi xay ra!!</h1>";
            echo '<div class="add-success-model"><div class="add-success-title"><span class="add-sucess-message">Có lỗi xảy ra</span><span class="add-sucess-button"><a href="">OK</a></span></div></div>';
        }
    }
} else {
    // echo '<div class="add-success-model"><div class="add-success-title"><span class="add-sucess-message">Thêm dữ liệu thành công</span><span class="add-sucess-button"><a href="">OK</a></span></div></div>';
}
?>
<?php
include './modules/admin/foot-ad.php';
?>