<?php

//run check-session... it will return "true" if there is a session, 
//and it will set $name_session to $_SESSION['name'];
//otherwise, it will return false
function check-session(){
    session_start();

    if(isset($_SESSION['fingerprint']) && $_SESSION['fingerprint'] == md5($_SERVER['HTTP_USER_AGENT'].$_SERVER['REMOTE_ADDR'].'kslajGtlewi')){
        $name_session = $_SESSION['name'];
        return true;
    }

    else{
        return false;
    }
}

?>