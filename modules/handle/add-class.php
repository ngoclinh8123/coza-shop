<?php
// kiem tra co method POST thi moi lam tiep
    if(1){
        include './modules/handle/connect-database.php';
        $name="";
        $code="";
        $router="";
        if(isset($_POST['add-class-name'])) $name=$_POST['add-class-name'];
        if(isset($_POST['add-class-code'])) $code=$_POST['add-class-code'];
        if(isset($_POST['add-class-router'])) $router=$_POST['add-class-router'];

        // echo 'name :'.$name;
        // echo 'code :'.$code;
        // echo 'router :'.$router;
        $sql="insert into class(name,code,router) values('".$name."','".$code."','".$router."')";
        mysqli_query($connect,$sql);
        echo '<a href="them-phan-loai" hidden></a>';
    }
?>

<script>
    const linkBack =document.querySelector("a");
    if(linkBack) linkBack.click();
</script>
