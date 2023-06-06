<?php
spl_autoload_register('classAutoLoader');

function classAutoLoader($className){
    $url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    if(strpos($url, 'inc') != false){
        $path = '../classses/';
    }else{
        $path = 'classes/';
    }
    $extension = '.class.php';
    require_once $path . $className . $extension;
}
?>