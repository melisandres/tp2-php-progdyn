<?php

function user_controller_store($request){
    require_once(MODEL_DIR.'/user.php');
     var_dump($request);
    user_model_store($request);
    render(VIEW_DIR.'/user/login.php');
}

function user_controller_show(){
    render(VIEW_DIR.'/user/show.php');
}

function user_controller_login(){
    require_once(MODEL_DIR.'/user.php');
    $result = user_model_authentification();
    render(VIEW_DIR.$result);
}

function user_controller_logout(){
    session_destroy();
    render(VIEW_DIR.'/base/welcome.php');
}

function user_controller_create(){
    render(VIEW_DIR.'/user/create.php');
}

?>