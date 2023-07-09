<?php
require_once("connex.php");

foreach ($_POST as $key => $value) {
    $$key = mysqli_real_escape_string($connex, $value);
}


$password = password_hash($password, PASSWORD_BCRYPT);


$sql = "INSERT INTO user(userName, userUname, userPassword, userBirthday) VALUES ('$name', '$username', '$password', '$birthday')";

if(mysqli_query($connex, $sql)){
    header("Location: login.php");
}else{
    echo "Error: ".$sql."<br>".mysqli_error($connex);
}
mysqli_close($connex);
?>