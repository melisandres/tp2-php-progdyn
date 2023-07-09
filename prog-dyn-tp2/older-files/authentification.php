<?php
session_start();
require_once("connex.php");

foreach ($_POST as $key => $value) {
    $$key = mysqli_real_escape_string($connex, $value);
}


//1. check username
$sql = "SELECT * from user WHERE userUname = '$username'"; 

$result = mysqli_query($connex, $sql);

$count = mysqli_num_rows($result);

//2. la reponse est egale a 1
if($count ==1){
    //3. check password
    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $dbpassword = $user['userPassword'];
    if (password_verify($password, $dbpassword)){
        session_regenerate_id();
        /* $_SESSION['logon'] = true;  */
        $_SESSION['name'] = $user['userName'];
        $_SESSION['id'] = $user['userId'];
        $salt = kslajGtlewi;
        $_SESSION['fingerprint'] =  md5($_SERVER['HTTP_USER_AGENT'].$_SERVER['REMOTE_ADDR'].$salt);
        header("Location: index.php");
    }else{
        header("Location: login.php?msg=2");
    }
}else{
    header("Location: login.php?msg=1");
}


?>