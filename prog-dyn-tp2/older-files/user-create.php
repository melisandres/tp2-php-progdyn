<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
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
<h1>Formulaire pour creer un utilisateur</h1>
    <form action="user-store.php" method="POST">
        <label>Nom
            <input type="text" name="name" required minlength="2" maxlength="25" >
        </label>
        <label>Nom d'utilisateur
            <input type="text" name="username" maxlength="35" >
        </label>
        <label>Mot de passe
            <input type="password" name="password" minlength="6" maxlength="20">
        </label>
        <label>Date de naissance
            <input type="date" name="birthday">
        </label>
        <input type="submit" value="Save">
    </form>
</body>
</html>