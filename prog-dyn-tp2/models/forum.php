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
    $updated = "";
    require(CONNEX_DIR);
    foreach($request as $key => $value){
        $$key = mysqli_real_escape_string($connex, $value);
    }

    //make sure the user currently logged in is the author
    $sql = "SELECT userId FROM user INNER JOIN forum WHERE userId = forumUserId AND forumId = '$id'";
    $result = mysqli_query($connex, $sql);
    $result = mysqli_fetch_assoc($result);
    if($result['userId'] != $_SESSION['id']){
        $updated = false;
    }else{
        $sql = "UPDATE forum SET forumTitle = '$title', forumArticle = '$article', forumDate = '$date' WHERE forumId = '$id'"; 
        $result = mysqli_query($connex, $sql);
        $updated = true;
    }
    mysqli_close($connex);
    return $updated;
}



function forum_model_delete($request){
    require(CONNEX_DIR);
    //this is the id of the post up for deletion
    $id = mysqli_real_escape_string($connex, $request['id']);

    //make sure the current user is the author
    $isTheAuthor = forum_model_verifyUser($id);

    if($isTheAuthor){
        $sql = "DELETE FROM forum WHERE forumId = '$id'";
        mysqli_query($connex, $sql);
    }
    mysqli_close($connex);
    return $isTheAuthor;
}


function forum_model_verifyUser($id){
    require(CONNEX_DIR);
    $isTheAuthor = "";

    //make sure the current user in is the author
    $sql = "SELECT userId FROM user INNER JOIN forum WHERE userId = forumUserId AND forumId = '$id'";

    //query the database, and prepare the result
    $result = mysqli_query($connex, $sql);
    $result = mysqli_fetch_assoc($result);

    //set the boolean based on the result
    if($result['userId'] == $_SESSION['id']){
        $isTheAuthor = true;
    }else{
        $isTheAuthor = false;
    } 
    return $isTheAuthor;
}

//keeping the connex and the like, try the previous code, but with the count code, just copy the working code elsewhere to be sure. 


/* function forum_model_delete($request){
    require(CONNEX_DIR);
    //this is the id of the post up for deletion
    $id = mysqli_real_escape_string($connex, $request['id']);
    $currentId = $_SESSION['id'];

    //make sure the user currently logged in is the author
    $sql = "SELECT userId FROM user INNER JOIN forum WHERE userId = forumUserId AND forumId = '$id' AND userId = '$currentid'";
    $result = mysqli_query($connex, $sql);
    $count = mysqli_num_rows($result);
    if($count == 1){
        $sql = "DELETE FROM forum WHERE forumId = '$id'";
        mysqli_query($connex, $sql);
        $deleted = true;
    }else{
        $deleted = false;
        echo $currentId;
    }
    mysqli_close($connex);
    return $deleted;
} */
?>