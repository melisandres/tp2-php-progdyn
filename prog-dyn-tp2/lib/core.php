<?php

/* this adds escape characters before quotes*/
function safe($param){
    return addslashes($param);
}

/* this sends content through a buffer to your layout */
function render($file, $data = null){
    $layout_file = VIEW_DIR.'/layouts/layout.php';
    ob_start();
    include_once($file);
    $content = ob_get_clean();
    include_once($layout_file);
}

/*check if the user is logged. Will return "true" if the session fingerprint matches the current $_SERVER data, otherwise, it will return false*/
function checkSession(){

    if(isset($_SESSION['fingerprint']) && $_SESSION['fingerprint'] == md5($_SERVER['HTTP_USER_AGENT'].$_SERVER['REMOTE_ADDR'].'kslajGtlewi')){
    return true;
    }else{
        return false;
    }
}

?>