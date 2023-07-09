<?php



session_start();
require_once("../lib/connex.php");
require_once("../controllers/UserController.php");

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
        $salt = "kslajGtlewi";
        $_SESSION['name'] = $user['userName'];
        $_SESSION['id'] = $user['userId'];
        $_SESSION['fingerprint'] =  md5($_SERVER['HTTP_USER_AGENT'].$_SERVER['REMOTE_ADDR'].$salt);


        //instead of using header, you need to call the controller here, and 
        //give a view for the user from there
        user_controller_login();
    }else{
        /* header("Location: login.php?msg=2"); */
        user_controller_login();
    }
}else{
    /* header("Location: login.php?msg=1"); */
    user_controller_login();
}


?>