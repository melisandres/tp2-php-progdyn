<?php

//this brings a user to the log in page
function user_controller_loginPage(){
    render(VIEW_DIR.'/user/login.php');
}


//this logs a user in
function user_controller_login(){
    require_once(MODEL_DIR.'/user.php');
    $result = user_model_authentification();
    if ($result == "succes"){
        header("Location: ?module=forum&action=select");
    }else{
        //the error messages have been added into the result by the model
        render(VIEW_DIR.'/user/login.php', $result);
    }   
}

//this logs a user out
function user_controller_logout(){
    session_destroy();
    header("Location: ?module=forum&action=select&msg=3");
}

//to bring a user to the view that allows them to create an account
function user_controller_create(){
    render(VIEW_DIR.'/user/create.php');
}

//this creates a new user account
function user_controller_store($request){
    //this is where I would call core to do a form validation
    require_once(MODEL_DIR.'/user.php');
    user_model_store($request);
    //message de succes pour le nouvel utilisateur
    $result = array("msg"=>3);
    render(VIEW_DIR.'/user/login.php', $result);

}

?>