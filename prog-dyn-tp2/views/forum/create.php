<h1>Écrire</h1>
<?php
    if(isset($_SESSION['fingerprint'])){
        echo "<p>Welcome ".$_SESSION['name']."!</p>";
    }else echo "Welcome unknown user!";

    //validation variables
    $titleError = $articleError = $dateError = null;

    //variables des donnees
    $title = $article = $date = null;
?>
<form action="?module=forum&action=store" method="POST">

        <label>Titre
            <input type="text" name="title" required minlength="5" maxlength="100" value="<?= $title;?>">
            <span class="error"><?=$titleError;?></span>
        </label>

        <label>Article
            <textarea name="article" required maxlength="1000" rows="20" cols="70" value="<?= $article;?>"></textarea>
            <span class="error"><?=$articleError;?></span>
        </label>

        <input type="hidden" name="date" value="<?=date('Y-m-d')?>">

        <input type="hidden" name="id" value="<?= $_SESSION['id'];?>">

        <button type="submit">save</button>

</form>