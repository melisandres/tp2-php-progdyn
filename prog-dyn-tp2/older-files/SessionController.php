<?php
function loginCheck(){
    if(isset($_SESSION['fingerprint']) && $_SESSION['fingerprint'] == md5($_SERVER['HTTP_USER_AGENT'].$_SERVER['REMOTE_ADDR'].'kslajGtlewi')){
        return true;
    }
    else{
        return false;
    }

}

?>