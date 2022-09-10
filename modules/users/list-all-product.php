<?php
    // session_start();
    include_once './modules/users/header-html-tag.php';
    include_once './modules/users/header-top.php';
    include_once './modules/handle/connect-database.php';
    include_once './modules/users/header.php';
    include_once './modules/handle/function.php';
    $data=array();
    if($connect){
        $sql='select * from product';
        $result=mysqli_query($connect,$sql);
        while($row=mysqli_fetch_array($result)){
            array_push($data,$row);
        }
    }
    $amoutItemInPage=8;
    $amountPage=createPagination($data,$amoutItemInPage);
    // echo 'dayyyyyyyy:'.$amountPage;
?>

       <div class="lap-container">
        <div class="lap-wrap">
                <div class="lap-title"><span>Tất cả sản phẩm</span></div>
                <div class="row">
                    <?php
                        $page=$_GET['page'];

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
            </div>
       </div>

    <script src="./modules/users/js/shop-all.js"></script>
<?php
    include './modules/users/footer.php';
    include './modules/users/footer-html-tag.php';
?>