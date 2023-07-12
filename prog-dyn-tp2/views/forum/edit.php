<h1>Modifier</h1>
<?php
    if(isset($_SESSION['fingerprint'])){
        echo "<p>Welcome ".$_SESSION['name']."!</p>";
    }else echo "Welcome unknown user!";

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
            <textarea name="article" required maxlength="1000" rows="20" cols="70" value="<?= $forumArticle;?>"><?= $forumArticle;?>
            </textarea>
            <span class="error"><?=$articleError;?></span>
        </label>

        <label>Date
            <input type="date" name="date" maxlength="10" value="<?= $forumDate;?>">
            <span class="error"><?=$dateError;?></span>
        </label>
        
        <input type="hidden" name="id" value="<?=$forumId;?>">

        <button type="submit">save</button>

</form>