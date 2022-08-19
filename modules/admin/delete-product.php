<?php
    include '../handle/connect-database.php';
    // echo 'xoa san pham';
    // echo $_GET['id'];
    if($connect){
        // delete image
        $sql='select * from product where id = '.$_GET['id'];
        $result=mysqli_query($connect,$sql);
        $data=array();
        while($row=mysqli_fetch_array($result)){
            array_push($data,$row);
        }
        $data=$data[0];
        $image=explode("|",$data['productimage']);
        $path='../../includes/images/';
        foreach($image as $key=>$value){
            unlink($path.$value);
        }

        // delete in mysql

        $sql='set FOREIGN_KEY_CHECKS=0';
        mysqli_query($connect,$sql);
        $sql='delete from product where id='.$_GET['id'];
        mysqli_query($connect,$sql);
    }
?>
    <a href="./list-product.php"></a>
    <script>
        const btn=document.querySelector("a");
        btn.click();
    </script>