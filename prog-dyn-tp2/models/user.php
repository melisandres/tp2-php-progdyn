<?php

function user_model_authentification(){
    require_once(CONNEX_DIR);

    foreach ($_POST as $key => $value) {
        $$key = mysqli_real_escape_string($connex, $value);
    }

    $sql = "SELECT * from user WHERE userUname = '$username'"; 
    $result = mysqli_query($connex, $sql);
    $count = mysqli_num_rows($result);

    if($count == 1){
        //there's one match for userUname
        $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
        mysqli_close($connex);
        $dbpassword = $user['userPassword'];

        if (password_verify($password, $dbpassword)){
            //the password typed in matches the dbpassword
            $salt = "kslajGtlewi";
            //set all the session variables
            session_regenerate_id();
            $_SESSION['logon'] = true;
            $_SESSION['name'] = $user['userName'];
            $_SESSION['id'] = $user['userId'];
            $_SESSION['fingerprint'] =  md5($_SERVER['HTTP_USER_AGENT'].$_SERVER['REMOTE_ADDR'].$salt);
            return "/forum/create.php";
        }else{
            return "/user/login.php";
            /* password error */
        }
    }else{
        return "/user/login.php";
            /* username error */
    } 

}

function user_model_store($request){
    require(CONNEX_DIR);

    foreach ($request as $key => $value) {
        $$key = mysqli_real_escape_string($connex, $value);
    }
    $password = password_hash($password, PASSWORD_BCRYPT);
    $sql = "INSERT INTO user (userName, userUname, userPassword, userBirthday) VALUES ('$name', '$username', '$password', '$birthday')";
    $result = mysqli_query($connex, $sql);
    mysqli_close($connex);
}

?>