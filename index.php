<?php
    include './routes.php';
    include './modules/handle/function.php';
    $module='module';
    $action='users';
    $path=handleUrl($module,$action);
    // echo $module.'</br>';
    // echo $action.'</br>';
    // echo '<pre>';print_r($path);
    if(isset($path[0])){
        $file=$path[0];
        $file= './'.$module.'/'.$action.'/'.$file;
        if(file_exists($file)){
            include_once($file);
        }else{
            include './modules/users/404.php';
        }
    }else{
        include './modules/users/404.php';
    }

    // foreach ($routers as $key=>$value){
    //     if($key==$url) $path=$value;
    // }
    // echo 'current file:'.$_SERVER['SCRIPT_FILENAME'].'</br>';
    // echo 'path:'.$path;
    // include $path;
?>