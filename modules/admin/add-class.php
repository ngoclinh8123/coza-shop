<?php
include_once './modules/admin/heading-ad.php';
include_once './modules/handle/function.php';
include_once './modules/handle/connect-database.php';

$dataClass = array();
if ($connect) {
    $sql = "select * from class";
    $result = mysqli_query($connect, $sql);
    while ($row = mysqli_fetch_array($result)) {
        array_push($dataClass, $row);
    }
}

$category = "";
if (isset($_GET['category'])) {
    $category = $_GET['category'];
} else $category = "class";
?>

<!-- cac class trong database -->
<div class="class-block">
    <!-- add class -->
    <div class="add-class-block <?php if ($category == "class") echo "open";
                                else echo "" ?>">
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
                <div>Tên phân loại :</div>
                <input type="text" name="add-class-name">
            </div>
            <div class="cb-add-class-row">
                <div>Mã phân loại :</div>
                <input type="text" name="add-class-code">
            </div>
            <div class="cb-add-class-row">
                <div>URL :</div>
                <input type="text" name="add-class-router">
            </div>
            <div class="cb-add-class-submit">
                <input type="submit" value="Thêm">
            </div>
        </form>

        <div class="cb-item cb-item-head">
            <span class="cb-item-col-1">Tên phân loại</span>
            <span class="cb-item-col-2">Mã phân loại</span>
            <span class="cb-item-col-3">URL</span>
            <span class="cb-item-col-4"></span>
        </div>

        <?php
        foreach ($dataClass as $key => $value) {
        ?>

            <div class="cb-item ">
                <span class="cb-item-col-1"><?php echo $value['name']; ?></span>
                <span class="cb-item-col-2"><?php echo $value['code']; ?></span>
                <span class="cb-item-col-3"><?php echo $value['router']; ?></span>
                <span class="cb-item-col-4"><a href="xu-ly-xoa-class?id=<?php echo $value['id']; ?>">Xóa</a></span>
            </div>
        <?php
        }
        ?>
    </div>

</div>

<script>
    const addClassBtn = document.querySelector(".cb-head-add");
    const addClassBlock = document.querySelector(".cb-add-class-block");
    if (addClassBtn) {
        addClassBtn.onclick = function() {
            addClassBlock.classList.toggle("open")
        }
    }

    const addSizeBtn = document.querySelector(".add-size-btn");
    const addSizeBlock = document.querySelector(".cb-add-size-block");
    if (addSizeBtn) {
        addSizeBtn.onclick = function() {
            addSizeBlock.classList.toggle("open");
        }
    }

    const subnavAddClassBtn = document.querySelector(".as-head-item--add-class")
    const subnavAddSizeBtn = document.querySelector(".as-head-item--add-size")
    const addClassContainer = document.querySelector(".add-class-block")
    const addSizeContainer = document.querySelector(".add-size-block")

    if (subnavAddClassBtn) {
        subnavAddClassBtn.onclick = function() {
            if (!addClassContainer.classList.contains('open')) {
                addClassContainer.classList.add('open');
                addSizeContainer.classList.remove('open');
                subnavAddClassBtn.classList.add("action");
                subnavAddSizeBtn.classList.remove("action");
            }
        }
    }

    if (subnavAddSizeBtn) {
        subnavAddSizeBtn.onclick = function() {
            if (!addSizeContainer.classList.contains('open')) {
                addSizeContainer.classList.add('open');
                addClassContainer.classList.remove('open');
                subnavAddSizeBtn.classList.add("action");
                subnavAddClassBtn.classList.remove("action");
            }
        }
    }
</script>

<?php
include './modules/admin/foot-ad.php';
?>