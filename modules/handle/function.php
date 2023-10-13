<?php
    // session_start();
    function countDay($month,$year){
        $day=0;
        if($month==1||$month==3||$month==5||$month==7||$month==8||$month==10||$month==12) $day=31;
        else if($month==4||$month==6||$month==9||$month==11) $day=30;
        else if($month==2){
            if($year%4==0 && $year%100!=0|| $year%400==0) $day=29;
            else $day=28;
        }
        return $day;
    }
    function randomString($lenght){
        $string=array_merge(range(0,9),range('a','z'),range('A','Z'));
        $string=str_shuffle(implode('',$string));
        $str=substr($string,0,$lenght-6);
        $year=date("y");
        $month=date("m");
        $day=date("d");
        $str=$year.$month.$day.$str;
        return $str;
    }

    function createImageName($image){
        $type=substr($image['name'],-3);
        $name=randomString(15);
        $imageName=$name.".".$type;
        return $imageName;
    }

    function createPagination($array,$num){
        $numpro=count($array);
        return ceil($numpro/$num);
    }



    function findMax($arr){
        echo '<pre>';print_r($arr);echo '</pre>';
        $max=$arr[0];
        for($i=0;$i<count($arr);$i++){
            if($arr[$i]>$max){
                $max=$arr[$i];
            } 
        }
        return $max;
    }

function handleUrl(&$module=null,&$action=null,$key=false){
    // echo $_SESSION['email'];
    if(isset($_GET['url'])) $url=$_GET['url'];
    else $url='trang-chu';

    // echo 'url cu:'.$url.'</br>';
    global $routers;
    if($key){
        global $routerAdmin;
        // echo '<pre>';print_r($routerAdmin);
        $routers=array_merge($routers,$routerAdmin);

    }
    // echo '<pre>';print_r($routers);
    // $flag=false;
    foreach($routers as $key=>$value){
        $pattern='#^'.$key.'$#';
        if(preg_match($pattern,$url)){
            $url=preg_replace($pattern,$value,$url);
            break;
            // $flag=false;
        }
    }

    // foreach($routers as $key=>$value){
    //     if(password_verify($key,$url)){
    //         $url=$value;
    //         break;
    //     }
    // }
    // if($flag){
    //     $url='modules/users/404.php';
    // }
    $urlArr=explode('/',$url);
    // echo '<pre>';print_r($urlArr);

    if(isset($urlArr[0])){
        $module=$urlArr[0];
        unset($urlArr[0]);
    }

    if(isset($urlArr[1])){
        $action=$urlArr[1];
        unset($urlArr[1]);
    }

    $urlArr=array_values($urlArr);
    // echo $urlArr;
    return $urlArr;
}