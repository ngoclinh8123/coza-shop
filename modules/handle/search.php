<?php
    if(isset($_POST['search-submit'])){
        
        $search= $_POST['search'];
        strtoupper(trim($search));
        
        include './modules/handle/connect-database.php';
        include './modules/users/header-html-tag.php';
        include './modules/users/header.php';
        
        $dataProduct=array();
        if($connect){
            $sql='select code,name,description from product';
            $result=mysqli_query($connect,$sql);
            while($row=mysqli_fetch_array($result)){
                array_push($dataProduct,$row);
            }
        }

        // echo '<pre>';print_r($dataProduct);echo '</pre>';


        $pattern="#".$search."#imsU";

        echo strtoupper($search);
        echo $search;

        // khong chuyen utf8 thanh chu hoa duoc :<

        foreach($dataProduct as $index => $product){
            foreach($product as $key =>$value){
                $value=strtoupper($value);
                if(preg_match($pattern,$value)){
                    echo 'ok :'.$index."-".$key.'</br>';
                }
            }
        }

        include './modules/users/footer.php';
        include './modules/users/footer-html-tag.php';

    }
