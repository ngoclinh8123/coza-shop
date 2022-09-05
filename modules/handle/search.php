<?php
    session_start();
    if(isset($_GET['search-submit'])){
        
        $search= $_GET['search'];
        // strtoupper(trim($search));
        $search=trim($search);
        
        include './modules/handle/connect-database.php';
        include './modules/users/header-html-tag.php';
        include './modules/users/header.php';
        
        $dataProduct=array();
        if($connect){
            $sql='select id,code,name,description from product';
            $result=mysqli_query($connect,$sql);
            while($row=mysqli_fetch_array($result)){
                array_push($dataProduct,$row);
            }
        }

        // echo '<pre>';print_r($dataProduct);echo '</pre>';

        // $search="áo";

        $pattern="#".$search."#imsu";
        // echo $search.'</br>';

        // echo strtoupper($search);
        // echo $search;

        // khong chuyen utf8 thanh chu hoa duoc :<

        $resultId=array();

        foreach($dataProduct as $index => $product){
            foreach($product as $key =>$value){
                // $value=strtoupper($value);
                if(preg_match($pattern,$value)){
                    array_push($resultId,$product['id']);
                    break;
                }
            }
        }

        // echo '<pre>';print_r($result);echo '</pre>';


        $resultString=implode(',',$resultId);

        $data=array();
        if(count($resultId) >0){
            if($connect){
                $sql='select * from product where id in('.$resultString.')';
                $result=mysqli_query($connect,$sql);
                while($row=mysqli_fetch_array($result)){
                    array_push($data,$row);
                }
            }
        }
            
        // echo '<pre>';print_r($data);
        $amoutItemInPage=8;
        $amountPage=createPagination($data,$amoutItemInPage);

?>
    <div class="lap-container">
        <div class="lap-wrap">
                <div class="lap-title" style="font-size:1.2rem; color:rgba(0,0,0,.5)">
                    <span>Kết quả tìm kiếm : <?php echo $_GET['search'] ?></span>
                    <span style="color:red">(<?php echo count($resultId) ?>) sản phẩm</span>
                </div>

                <div class="row">
                    <?php
                        if(isset($_GET['page'])) $page=$_GET['page'];
                        else $page=1;

                        // tru di 1 vi trong vong lap dung index bat dau tu 0
                        $start=($page-1)*$amoutItemInPage-1;
                        $end=$page*$amoutItemInPage-1;

                        foreach($data as $key => $product){
                            if($key> $start && $key<=$end){
                                $imgs=explode("|",$product['image']);
                                $image='./includes/images/'.$imgs[0];
                                $id=$product['id'];
                                $name=$product['name'];
                                $price=$product['price'];
                                
                                
                    ?>
                        <div class="col c-3">
                            <div class="lap-item">
                                <a href="san-pham?id=<?php echo $id ?>">
                                    <div class="lap-item-img">
                                        <img src="<?php echo $image ?>" alt="">
                                    </div>
                                    <div class="lap-item-name">
                                        <span><?php echo $name ?></span>
                                    </div>
                                    <div class="lap-item-price">
                                        <span><?php echo $price ?></span><span> VNĐ</span>
                                    </div>
                                </a>
                            </div>     
                        </div>

                    <?php
                            }
                        }
                    ?>
                </div>
                <?php
                    if(count($data)>0){
                ?>       
                    <div class="lap-pag-row">
                        <div class="lap-pag-item">
                            <span class="lap-pag-prev"><i class="fas fa-angle-left"></i></span>
                        </div>
                        
                        <?php
                            if($page==1){
                                echo '<div class="lap-pag-item--1 choose"><a href="tat-ca-san-pham?page=1"><span>1</span></a></div>';
                            }else echo '<div class="lap-pag-item--1"><a href="tat-ca-san-pham?page=1"><span>1</span></a></div>';
                            // so page > 5 thi moi can ...
                            if($amountPage>5){
                                echo '<div class="lap-pag-item"><span class="lap-pag-dot">...</span></div>';
                            }
                            if($amountPage>1){
                                for($i=2;$i<=$amountPage;$i++){
                                    if($i==$page){
                                        echo '<div class="lap-pag-item choose"><a href="tat-ca-san-pham?page='.$i.'"><span>'.$i.'</span></a></div>';
                                    }else{
                                        echo '<div class="lap-pag-item"><a href="tat-ca-san-pham?page='.$i.'"><span>'.$i.'</span></a></div>';
                                        // echo 'okkkkkkkk';
                                    }
                                }
                                // echo 'long hown 2';
                            }
                            if($amountPage>5){
                                echo '<div class="lap-pag-item"><span class="lap-pag-dot">...</span></div>';
                            }
                        ?>      
                        <div class="lap-pag-item">
                            <span class="lap-pag-next"><i class="fas fa-angle-right"></i></span>
                        </div>
                    </div>
                <?php
                    }
                ?>
            </div>
       </div>

    <script src="./modules/users/js/shop-all.js"></script>
<?php
        include './modules/users/footer.php';
        include './modules/users/footer-html-tag.php';

}
