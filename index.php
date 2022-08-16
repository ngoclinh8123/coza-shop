<?php
    $url= $_GET['url'];
    include './routes.php';
    $path='';
    foreach ($routers as $key=>$value){
        if($key==$url) $path='./'.$value;
    }
    include $path;
?>