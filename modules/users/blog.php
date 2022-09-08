<?php
    ini_set('display_errors', 0);
    session_start();
    include_once './modules/handle/connect-database.php';
    include_once './modules/users/header-html-tag.php';
    include_once './modules/users/header.php';
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

    // echo '<pre>';print_r($result);
?>
    <div class="blog-wrap">
        <div class="blog-content">
            <?php
                foreach ($result as $key => $value){
                    if($key==0){
            ?>

                        <div class="blog-item">
                            <a href="<?php echo $value['link']; ?>" target="_blank" rel="noopener">
                                <div class="row">
                                    <div class="col c-5">
                                        <div class="blog-item-img">
                                        <img src="<?php echo $value['image']; ?>" alt="">
                                        </div>
                                    </div>
                                    <div class="col c-7">
                                        <div class="blog-item-content">
                                            <div class="blog-item-title">
                                                <span><?php echo $value['title']; ?></span>
                                            </div>
                                            <div class="blog-item-desc">
                                                <span><?php echo $value['desc']; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

            <?php
                    }else{
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
    </div>
<?php
    }
    else{
        // echo '<h1>Có lỗi xảy ra @@</h1>';
?>
    <div class="bl-error-block">
        <div class="bl-error-content">
            <span>* Tính năng tạm thời bị khóa</span>
        </div>
    </div>
<?php     
    }
    include './modules/users/footer.php';
    include './modules/users/footer-html-tag.php';
?>