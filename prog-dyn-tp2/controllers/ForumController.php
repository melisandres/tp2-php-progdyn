<?php

function forum_controller_select(){
    require_once(MODEL_DIR.'/forum.php');
    $data = forum_model_list();
    //return print_r($data);
    render(VIEW_DIR.'/forum/select.php', $data);
}

function forum_controller_create(){
    render(VIEW_DIR.'/forum/create.php');
}


//this prepares the "edit page"
function forum_controller_show($request){
    require_once(MODEL_DIR.'/forum.php');
    $data = forum_model_show($request);
    render(VIEW_DIR.'/forum/edit.php', $data);
}

//this updates when the edited page is submitted
function forum_controller_update($request){
    require_once(MODEL_DIR.'/forum.php');
    forum_model_update($request);
    $data = forum_model_list();
    render(VIEW_DIR.'/forum/select.php', $data);

}

function forum_controller_delete($request){
    require_once(MODEL_DIR.'/forum.php');
    forum_model_delete($request);
    $data = forum_model_list();
    render(VIEW_DIR.'/forum/select.php', $data);
}

function forum_controller_store($request){
    require_once(MODEL_DIR.'/forum.php');
    forum_model_store($request);
    //et prépare pour voir la liste
    $data = forum_model_list();
    render(VIEW_DIR.'/forum/select.php', $data);
}


?>