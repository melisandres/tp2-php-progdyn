<?php 
$msg = null;
if(isset($_GET['msg'])){
    if ($_GET['msg']==1){
        $msg = "Ce nom d'utilisateur n'existe pas";
    } elseif ($_GET['msg']==2){
        $msg = "Le mot de passe n'est pas correct";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        input, select{
            display: block;
            margin: 5px;
        }
        .error{
            display: block;
            color: red;
        }
    </style>
</head>
<body>
<h1>Login</h1>
    <span class="error"><?= $msg;?></span>
    <form action="authentification.php" method="POST">
        <label>Nom d'utilisateur
            <input type="text" name="username" maxlength="35" >
        </label>
        
        <label>Mot de passe
            <input type="password" name="password" minlength="6" maxlength="20">
        </label>
        <input type="submit" value="Login">
    </form>
</body>
</html>