<?php
    // ini_set('display_errors', 0);
    // session_start();
    include_once './modules/handle/connect-database.php';
    include_once './modules/users/header-html-tag.php';
    include_once './modules/users/header-top.php';
    include_once './modules/users/header.php';
    include_once './modules/handle/function.php';

    $content=file_get_contents("https://vnexpress.net/giai-tri/thoi-trang");
    if($content){
    $partern='#<article class="item-news item-news-common">(.*)</article>#simU'; 
    preg_match_all($partern,$content,$matches);
    // echo '<pre>';print_r($matches);
    $result=array();
    foreach($matches[0] as $key =>$value){

        // link
        $pattern='#href="(.*)"#imsU';
        if(preg_match($pattern,$value,$matches))
        // echo '<pre>';print_r($matches);
        $result[$key]['link']=$matches[1];

        // title
        $pattern='#title="(.*)"#imsU';
        if(preg_match($pattern,$value,$matches))
        // echo '<pre>';print_r($matches);
        $result[$key]['title']=$matches[1];

        // description
        $pattern='#<p class="description">.*<a.*>(.*)<\/a>#imsU';
        // $pattern='/<p class="description">.*<a.*>(.*)<\/a>/Umis';
        if(preg_match($pattern,$value,$matches)){
            // phai convert ve kieu string vi thang trim chi nhan string ma thang mathches[1] kieu string[] -.-
            $result[$key]['desc']=trim((string)$matches[1]);
        }

        // image 
        if(preg_match('#data-src#imsU',$value)){
            $pattern='#data-src="(.*)"#imsU';
        }else $pattern='#src="(.*)"#imsU';
        if(preg_match($pattern,$value,$matches)){
            // phai convert ve kieu string vi thang trim chi nhan string ma thang mathches[1] kieu string[] -.-
            $result[$key]['image']=$matches[1];
        }
    }

    if(isset($_GET['page'])){
        $page=$_GET['page'];
    }else{
        $page=1;
    }
    // echo '<pre>';print_r($result);
    $amoutItemInPage=8;
    $amountPage=createPagination($result,$amoutItemInPage);
    // echo $amountPage;
?>
    <div class="blog-wrap">
        <div class="blog-content">
            <?php
                
                // foreach ($result as $key => $value){
                //     if($key==0){
            ?>
<!-- 
                        <div class="blog-item">
                            <a href="<?php //echo $value['link']; ?>" target="_blank" rel="noopener">
                                <div class="row">
                                    <div class="col c-5">
                                        <div class="blog-item-img">
                                        <img src="<?php //echo $value['image']; ?>" alt="">
                                        </div>
                                    </div>
                                    <div class="col c-7">
                                        <div class="blog-item-content">
                                            <div class="blog-item-title">
                                                <span><?php //echo $value['title']; ?></span>
                                            </div>
                                            <div class="blog-item-desc">
                                                <span><?php //echo $value['desc']; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div> -->

            <?php
                    // }else{
            ?>
                        <!-- <div class="blog-item">
                            <a href="<?php //echo $value['link']; ?>" target="_blank" rel="noopener">
                                <div class="row">            
                                    <div class="col c-9">
                                        <div class="blog-item-content">
                                            <div class="blog-item-title">
                                                <span><?php //echo $value['title']; ?></span>
                                            </div>
                                            <div class="blog-item-desc">
                                                <span><?php //echo $value['desc']; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col c-3">
                                        <div class="blog-item-img">
                                        <img src="<?php //echo $value['image']; ?>" alt="">
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div> -->
            <?php
                //     }
                // }
            ?>

            <!-- sua lai sau khi chia pagination -->
            <?php
                // echo 'pl';
                $start=($page-1)*$amoutItemInPage-1;
                $end=$page*$amoutItemInPage-1;

                foreach($result as $key => $value){
                    if($key> $start && $key<=$end){
            ?>
                <div class="blog-item">
                    <a href="<?php echo $value['link']; ?>" target="_blank" rel="noopener">
                        <div class="row">            
                            <div class="col c-9">
                                <div class="blog-item-content">
                                    <div class="blog-item-title">
                                        <span><?php echo $value['title']; ?></span>
                                    </div>
                                    <div class="blog-item-desc">
                                        <span><?php echo $value['desc']; ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col c-3">
                                <div class="blog-item-img">
                                <img src="<?php echo $value['image']; ?>" alt="">
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            <?php
                    }
                }
            ?>
        </div>
        
        <!-- pagination -->
        <div class="lap-pag-row">
            <div class="lap-pag-item">
                <span class="lap-pag-prev"><i class="fas fa-angle-left"></i></span>
            </div>
            
            <?php
                if($page==1){
                    echo '<div class="lap-pag-item--1 choose"><a href="tin-tuc?page=1"><span>1</span></a></div>';
                }else echo '<div class="lap-pag-item--1"><a href="tin-tuc?page=1"><span>1</span></a></div>';
                // so page > 5 thi moi can ...
                if($amountPage>5){
                    echo '<div class="lap-pag-item"><span class="lap-pag-dot">...</span></div>';
                }
                if($amountPage>1){
                    for($i=2;$i<=$amountPage;$i++){
                        if($i==$page){
                            echo '<div class="lap-pag-item choose"><a href="tin-tuc?page='.$i.'"><span>'.$i.'</span></a></div>';
                        }else{
                            echo '<div class="lap-pag-item"><a href="tin-tuc?page='.$i.'"><span>'.$i.'</span></a></div>';
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

    

<?php
    }
    else{
        // echo '<h1>Có lỗi xảy ra @@</h1>';
?>
    <div class="bl-error-block">
        <div class="bl-error-content">
            <span>* Tính năng tạm thời bị phong ấn :((</span>
        </div>
    </div>

    <!-- <script src="./modules/users/js/shop-all.js"></script> -->

    
<?php     
    }
    include './modules/users/footer.php';
?>
    <!-- <script>
        // pagination
        console.log('ok');
        alert("ok");
        let pagBtns = Array.from(document.querySelectorAll(".lap-pag-item a"));
        let pagDots = Array.from(document.querySelectorAll(".lap-pag-dot"));
        const prevBtn = document.querySelector(".lap-pag-prev");
        const nextBtn = document.querySelector(".lap-pag-next");
        function renderPagination(pagBtns, start, end) {
        pagBtns.forEach(function (pagBtn, index) {
            if (index >= startPoint && index < endPoint) {
            pagBtn.style.display = "flex";
            } else pagBtn.style.display = "none";
        });
        }
        let startPoint = 0;
        let endPoint = startPoint + 4;
        if (pagBtns.length > 0) {
        pagBtns[0].style.display = "flex";
        }
        if (pagBtns.length < 5) {
        nextBtn.classList.add("off");
        }
        prevBtn.classList.add("off");
        if (pagBtns.length > 4) pagDots[1].style.display = "flex";
        renderPagination(pagBtns, startPoint, endPoint);
        if (pagBtns.length > 4) {
        prevBtn.onclick = function () {
            if (startPoint > 0) {
            startPoint--;
            endPoint--;
            renderPagination(pagBtns, startPoint, endPoint);
            }
            if (startPoint == 0) {
            pagDots[0].style.display = "none";
            prevBtn.classList.add("off");
            }
            if (endPoint < pagBtns.length) {
            pagDots[1].style.display = "flex";
            nextBtn.classList.remove("off");
            }
        };

        nextBtn.onclick = function () {
            if (endPoint < pagBtns.length) {
            startPoint++;
            endPoint++;
            renderPagination(pagBtns, startPoint, endPoint);
            prevBtn.classList.remove("off");
            }
            // hien dau ... sau page 1
            if (startPoint > 0) pagDots[0].style.display = "flex";
            if (endPoint == pagBtns.length) {
            pagDots[1].style.display = "none";
            nextBtn.classList.add("off");
            }
        };
        }

    </script> -->
    <script src="./modules/users/js/shop-all.js"></script>

<?php
    include './modules/users/footer-html-tag.php';
?>