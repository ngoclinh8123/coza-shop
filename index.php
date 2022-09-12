<?php
    session_start();
    // session_destroy();
    // ini_set('display_errors', 0);
    include_once './routes.php';
    include_once './modules/handle/function.php';
    $module='module';
    $action='users';

    $keyAdmin=false;
    if(isset($_SESSION['admin-email'])) $keyAdmin=true;


    $path=handleUrl($module,$action,$keyAdmin);
    // echo $module.'</br>';
    // echo $action.'</br>';
    // echo '<pre>';print_r($path);
    if(isset($path[0])){
        $file=$path[0];
        $file= './'.$module.'/'.$action.'/'.$file;
        if(file_exists($file)){
            include_once($file);
        }else{
            // include './modules/users/404.php';
        include './modules/users/home.php';

        }
    }else{
        // include './modules/users/404.php';
        include './modules/users/home.php';
        // header('Location: trang-chu');
    }

    // foreach ($routers as $key=>$value){
    //     if($key==$url) $path=$value;
    // }
    // echo 'current file:'.$_SERVER['SCRIPT_FILENAME'].'</br>';
    // echo 'path:'.$path;
    // include $path;
?>