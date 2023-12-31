<?php

function city_model_list(){
    require(CONNEX_DIR);
    $sql = "SELECT * FROM forum ORDER BY forumDate";
    $result = mysqli_query($connex, $sql);
    $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_close($connex);
    return $result;
}

function city_model_store($request){
    require(CONNEX_DIR);
    foreach($request as $key => $value){
        $$key = mysqli_real_escape_string($connex, $value);
    }
    $sql = "INSERT INTO forum (forumTitle, forumArticle, forumDate) VALUES ('$title', '$article', '$date')";
    $result = mysqli_query($connex, $sql);
    mysqli_close($connex);
}

function city_model_show($request){
    require(CONNEX_DIR);
    $id = mysqli_real_escape_string($connex, $request['id']);
    $sql = "SELECT * FROM forum WHERE forumAuthor = '$session_name'";
    $result = mysqli_query($connex, $sql);
    $result = mysqli_fetch_assoc($result);
    mysqli_close($connex);
    return $result;
}

?>