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
    <nav>
        <?php
        if(isset($name_session)){
            echo "<p>Salut ".$name_session."</p>";
        }
        ?>
        <a href="index.php">forum</a>
        <a href="login.php">Log in</a>    
    </nav>