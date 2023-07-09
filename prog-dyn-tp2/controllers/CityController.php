<?php
function city_controller_index(){
    require_once(MODEL_DIR.'/city.php');
    $data = city_model_list();
    //return print_r($data);
    render(VIEW_DIR.'/city/select.php', $data);
}

function city_controller_create(){
    render(VIEW_DIR.'/city/create.php');
}

function city_controller_store($request){
    require_once(MODEL_DIR.'/city.php');
    city_model_store($request);
    header("Location: ?module=city&action=index");
}

function city_controller_show($request){
    require_once(MODEL_DIR.'/city.php');
    $data = city_model_show($request);
    render(VIEW_DIR.'/city/edit.php');

}

?>