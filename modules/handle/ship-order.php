<?php

    //giao hang 3
    // huy don 5

    function handleItem($items){
        $itemArr=explode("|",$items);
        array_shift($itemArr);
        $itemStr=implode(',',$itemArr);
        return $itemStr;
    }

    include './modules/handle/connect-database.php';
    if($connect){
        $sql="";
        if(isset($_POST['o-item-handle-cancel'])){
            $item=$_POST['o-item-handle-cancel'];
            $item=handleItem($item);
            $sql="update orders set status='3' where id in(".$item.")";
            if(mysqli_query($connect,$sql)){
                header('Location: danh-sach-don-hang');
            }else{
                header('Location: trang-chu');
            }
        }else if(isset($_POST['o-item-handle-ship'])){
            $item= $_POST['o-item-handle-ship'];
            $item=handleItem($item);
            $sql="update orders set status='5' where id in(".$item.")";
            if(mysqli_query($connect,$sql)){
                header('Location: danh-sach-don-hang');
            }else{
                header('Location: trang-chu');
            }
        }else{
            header('Location: trang-chu');
        }
        
    }