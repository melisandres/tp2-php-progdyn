<?php 
$msg = null;
if(isset($data['msg'])){
    if ($data['msg']==1){
        $msg = "Ce nom d'utilisateur n'existe pas";
    } elseif ($data['msg']==2){
        $msg = "Mot de passe incorrect";
    }elseif ($data['msg']==3){
        $msg = "Votre compte est crée! Veuillez entrer vos infos pour vous connecter.";
    }
}
?>

<h1>Se connecter</h1>
<span class="error"><?= $msg;?></span>
<form action="?module=user&action=login" method="POST">
    <label>Nom d'utilisateur
        <input type="text" name="username" maxlength="35" >
    </label>
    
    <label>Mot de passe
        <input type="password" name="password" minlength="6" maxlength="20">
    </label>
    <input type="submit" value="Login">
</form>

<h2>Vous n'avez pas de compte?</h2>
<a href="?module=user&action=create">Creer un compte!</a>