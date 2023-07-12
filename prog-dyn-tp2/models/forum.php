<?php


//whow all the posts
function forum_model_list(){
    require(CONNEX_DIR);
    $sql = "SELECT forumTitle, forumArticle, forumDate, forumUserId, forumId, userName FROM forum INNER JOIN user ON forumUserId = userId ORDER BY forumDate DESC";
    $result = mysqli_query($connex, $sql);
    $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_close($connex);
    return $result;
}


//show a post in order for it to be modified
function forum_model_show($request){
    require(CONNEX_DIR);
    $id = mysqli_real_escape_string($connex, $request['id']);
    $sql = "SELECT * FROM forum WHERE forumId = '$id'";
    $result = mysqli_query($connex, $sql);
    $result = mysqli_fetch_assoc($result);
    mysqli_close($connex);
    return $result;
}


//save a new post
function forum_model_store($request){
    require(CONNEX_DIR);
    foreach($request as $key => $value){
        $$key = mysqli_real_escape_string($connex, $value);
    }
    $sql = "INSERT INTO forum (forumTitle, forumArticle, forumDate, forumUserId) VALUES ('$title', '$article', '$date', '$id')";
    $result = mysqli_query($connex, $sql);
    mysqli_close($connex);
}


//save the modification to a post
function forum_model_update($request){
    require(CONNEX_DIR);
    foreach($request as $key => $value){
        $$key = mysqli_real_escape_string($connex, $value);
    }
    $sql = "UPDATE forum SET forumTitle = '$title', forumArticle = '$article', forumDate = '$date' WHERE forumId = '$id'"; 
    $result = mysqli_query($connex, $sql);
    mysqli_close($connex);
}



function forum_model_delete($request){
    require(CONNEX_DIR);
    $id = mysqli_real_escape_string($connex, $request['id']);
    $sql = "DELETE FROM forum WHERE forumId = '$id'";
    $result = mysqli_query($connex, $sql);
    mysqli_close($connex);
}


?>