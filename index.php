<?php
    include './routes.php';
    include './modules/handle/function.php';
    $module='module';
    $action='users';
    $path=handleUrl($module,$action);
    echo $module.'</br>';
    echo $action.'</br>';
    echo $path.'</br>';

    // foreach ($routers as $key=>$value){
    //     if($key==$url) $path=$value;
    // }
    // echo 'current file:'.$_SERVER['SCRIPT_FILENAME'].'</br>';
    // echo 'path:'.$path;
    // include $path;
?>