<?php
    include_once './modules/handle/connect-database.php';
    $userId=$_GET['id'];
    if(isset($_POST['aa-name']) && isset($_POST['aa-phone']) && isset($_POST['aa-address'])){
        if($_POST['aa-name'] !='' && $_POST['aa-phone'] !='' && $_POST['aa-address'] !=''){
            $aaName= $_POST['aa-name'];
            $aaPhone= $_POST['aa-phone'];
            $aaAddress= $_POST['aa-address'];
            if($connect){
                $sql="insert into orderaddress(userId,name,phone,address) values(".$userId.",'".$aaName."','".$aaPhone."','".$aaAddress."')";
                if(mysqli_query($connect,$sql)) echo '<a href="dia-chi-nhan-hang"></a>';
            }
        }
    }
?>
<script>
    if(document.querySelector("a")){
        document.querySelector("a").click();
    }
</script>
