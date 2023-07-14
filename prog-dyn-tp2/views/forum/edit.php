<h1>Modifier</h1>
<?php
    if(isset($_SESSION['fingerprint'])){
        echo "<p class='msg'>".$_SESSION['name'].", corrigez bien votre histoire!</p>";
    }else echo "Vous ne devriez pas être ici!";

    //validation variables
    $titleError = $articleError = $dateError = null;

    //variables des donnees
    $title = $article = $date = null;

    //chercher les valeures

    foreach($data as $key=>$value){
        $$key = $value;
    }
?>
<form action="?module=forum&action=update" method="POST">

<label>Titre
            <input type="text" name="title" required minlength="5" maxlength="100" value="<?= $forumTitle;?>">
            <span class="error"><?=$titleError;?></span>
        </label>

        <label>Article
            <textarea name="article" required maxlength="1000" rows="20" cols="70" value="<?= $forumArticle;?>"><?= $forumArticle;?></textarea>
            <span class="error"><?=$articleError;?></span>
        </label>

        <input type="hidden" name="date" value="<?=date('Y-m-d')?>">
        
        <input type="hidden" name="id" value="<?=$forumId;?>">

        <button type="submit">save</button>

</form>