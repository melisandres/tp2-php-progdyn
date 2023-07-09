<?php

function user_model_authentication(){
    require(CONNEX_DIR);
    $sql = "SELECT * from user WHERE userUname = '$username'"; 
    $result = mysqli_query($connex, $sql);
    $count = mysqli_num_rows($result);
    if($count ==1){
        //3. check password
        $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
    }else{
        $user = "";
    }
    mysqli_close($connex);
    return $user;
}

?>