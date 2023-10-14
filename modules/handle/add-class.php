<?php
// kiem tra co method POST thi moi lam tiep
if (1) {
    include './modules/handle/connect-database.php';
    $name = "";
    $code = "";
    $router = "";
    if (isset($_POST['add-class-name'])) $name = trim($_POST['add-class-name']);
    if (isset($_POST['add-class-code'])) $code = trim($_POST['add-class-code']);
    if (isset($_POST['add-class-router'])) $router = trim($_POST['add-class-router']);

    // echo 'name :'.$name;
    // echo 'code :'.$code;
    // echo 'router :'.$router;
    if ($name !== "" && $code !== "" && $router !== "") {
        $sql = "insert into class(name,code,router) values('" . $name . "','" . $code . "','" . $router . "')";
        if (mysqli_query($connect, $sql)) {
            Header("Location:them-phan-loai?category=class");
        }
    } else {
        Header("Location:them-phan-loai?category=class");
    }
}
?>