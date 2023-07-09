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
            <li><a href="index.php">Accueil</a></li>
            <li><a href="?module=user&action=login">Log in</a></li>
            <li><a href="?module=user&action=show">Lister les utilisateurs</a></li>
            <li><a href="?module=user&action=create">Ajouter l'utilisateur</a></li>
            <li><a href="?module=forum&action=create">write a post!</a></li>
            <li><a href="?module=forum&action=show">show all posts!</a></li>

        </ul>

    </nav>
    <main>
        <?php echo $content;?>

    </main>
</body>
</html>