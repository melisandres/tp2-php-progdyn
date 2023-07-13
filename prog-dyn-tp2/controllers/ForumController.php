<?php

//show ALL the articles
function forum_controller_select(){
    require_once(MODEL_DIR.'/forum.php');
    $data = forum_model_list();
    require_once(CORE_DIR);
    if(!checkSession()){
        session_destroy();
        $_SESSION['id'] = null;
        $_SESSION['loggedon'] = null;   
    }
    render(VIEW_DIR.'/forum/select.php', $data);
}

//brings us to the page where we can write an article
function forum_controller_create(){
    //check if the session is valid
    require_once(CORE_DIR);
    if(!checkSession()){
        header('Location: ?module=forum&action=select&msg=5');
    }else{
        render(VIEW_DIR.'/forum/create.php');
    }

}

//this prepares/shows the "edit page"
function forum_controller_show($request){
    require_once(CORE_DIR);
    if(!checkSession()){
        header('Location: ?module=forum&action=select&msg=5');
    }else{
        require_once(MODEL_DIR.'/forum.php');
        $data = forum_model_show($request);
        render(VIEW_DIR.'/forum/edit.php', $data);
    }
}

//this updates the DB with edited article
function forum_controller_update($request){
    require_once(CORE_DIR);
    if(!checkSession()){
        header('Location: ?module=forum&action=select&msg=5');
    }else{
        require_once(MODEL_DIR.'/forum.php');
        forum_model_update($request);
        $data = forum_model_list();
        render(VIEW_DIR.'/forum/select.php', $data);
    }

}

//this deletes an article
function forum_controller_delete($request){
    require_once(CORE_DIR);
    if(!checkSession()){
        header('Location: ?module=forum&action=select&msg=5');
    }else{
        require_once(MODEL_DIR.'/forum.php');
        $result= forum_model_delete($request);

        if($result){
            header('Location: ?module=forum&action=select&msg=4');
        }else{
            header('Location: ?module=forum&action=select&msg=6');
        }
    }
}

//this saves an article
function forum_controller_store($request){
    require_once(CORE_DIR);
    if(checkSession()){
        require_once(MODEL_DIR.'/forum.php');
        forum_model_store($request);
        //prepare the select view
        $data = forum_model_list();
        render(VIEW_DIR.'/forum/select.php', $data);
    }
}


?>