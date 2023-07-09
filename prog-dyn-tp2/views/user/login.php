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
    
<h1>Login</h1>
<span class="error"><?= $msg;?></span>
<form action="controllers/authentification.php" method="POST">
    <label>Nom d'utilisateur
        <input type="text" name="username" maxlength="35" >
    </label>
    
    <label>Mot de passe
        <input type="password" name="password" minlength="6" maxlength="20">
    </label>
    <input type="submit" value="Login">
</form>