<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MVC</title>
    <link rel="stylesheet" href="resources/css/style.css">
</head>
<body>
    <nav>
        <ul>
            <li><a href="index.php">Lire</a></li>
            <?php
            if(isset($_SESSION['loggedon'])){
                echo '<li><a href="?module=forum&action=create">Écrire</a></li>';
                echo '<li><a href="?module=user&action=logout">Se deconnecter</a></li>';
            }else{
                echo '<li><a href="?module=user&action=loginPage">Se connecter</a></li>';
            }
            ?>

        </ul>

    </nav>
    <main>
        <?php echo $content;?>

    </main>
</body>
</html>