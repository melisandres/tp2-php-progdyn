<h1>creer un compte</h1>
<?php
     //validation variables
    $nameError = $userNameError = $passwordError = $birthdayError = null;

    //variables des donnees
    $name = $userName = $password = $birthday = null; 
?>
<form action="?module=user&action=store" method="POST">

    <label>Name
        <input type="text" name="name" minlength="2" maxlength="25" value="<?= $name;?>">
        <spam><?=$nameError?></span>
    </label>
    <label>Username (email)
        <input type="email" name="userUname" value="<?= $userName;?>">
        <spam><?=$userNameError?></span>
    </label>
    <label>Password
        <input minlength="6" maxlength="20" type="password" name="password" value="<?= $password;?>">
        <spam><?=$passwordError?></span>
    </label>
    <label>Birthday
        <input type="date" name="birthday" value="<?= $birthday;?>">
        <spam><?=$birthdayError?></span>
    </label>
    <button type="submit">save</button>
</form>