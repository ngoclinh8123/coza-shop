<?php
    if(isset($_POST['order-choose'])){
        include_once './modules/handle/connect-database.php';
        
        $ids=explode('|',$_POST['order-choose']);
        array_shift($ids);
        $ids=implode(',',$ids);
        $title=$_POST['choose-title'];
        $idValid=array();
        $idIsValid=array();
        $levelTitle=array();
        if($connect){
            // lay level cua tat ca don duoc chon
            $sql="select o.id,s.level from orders as o inner join orderstatus as s on o.status=s.id where o.id in(".$ids.") ";
            $result=mysqli_query($connect,$sql);
            while($row=mysqli_fetch_array($result)){
                array_push($idValid,$row);
            }
            // echo '<pre>';print_r($idValid);

            // lay level cua trang thai moi
            $sql="select level from orderstatus where id=".$title;
            $result=mysqli_query($connect,$sql);
            while($row=mysqli_fetch_array($result)){
                array_push($levelTitle,$row);
            }
            // echo '<pre>';print_r($levelTitle);
            $levelTitle=$levelTitle[0]['level'];


            // echo $title;
            foreach($idValid as $key => $value){
                if($value['level'] < $levelTitle){
                    array_push($idIsValid,$value['id']);
                }
            }

            echo '<pre>';print_r($idIsValid);
            $ids=implode(',',$idIsValid);
            echo $ids;
            // echo $title;
            if($ids!=""){
                $sql="update orders set status='".$title."' where id in(".$ids.")";
                if(mysqli_query($connect,$sql)) header("Location:danh-sach-don-hang");
                else header("Location:danh-sach-don-hang");
            }else header("Location:danh-sach-don-hang");
        }

        
    }else{
        header("Location:danh-sach-don-hang");
    }
?>

