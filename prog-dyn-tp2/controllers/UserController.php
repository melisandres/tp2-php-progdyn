<?php

function user_controller_create(){
    render(VIEW_DIR.'/user/create.php');
}

function user_controller_show(){
    render(VIEW_DIR.'/user/show.php');
}

function user_controller_login(){
    render(VIEW_DIR.'/user/login.php');
}

?>