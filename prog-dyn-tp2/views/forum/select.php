<?php 
$msg = null;
if(isset($_GET['msg'])){
    if ($_GET['msg']==3){
        $msg = "Deconnexion!";
    }elseif ($_GET['msg']==4){
        $msg = "Message supprimé!";
    }elseif($_GET['msg']==5){
        $msg = "Invalid request";
    }elseif($_GET['msg']==6){
        $msg = "Vous navez pas la permission de suprimer les messages des autres!";
    }elseif($_GET['msg']==7){
        $msg = "Vous navez pas la permission de modifier les messages des autres!";
    }elseif($_GET['msg']==8){
        $msg = "Message modifié!";
    }elseif($_GET['msg']==9){
        $msg = "Message enregistré!";
    }
}


?>

<h2>La discussion</h2>
<p class="msg"><?= $msg;?></p>
<table>

<thead>
    <tr>
        <th>Auteur</th>
        <th>Titre</th>
        <th>Article </th>
        <th>Date</th>
        <?php
        if (isset($_SESSION['fingerprint'])){
            echo   "<th>EDIT</th>
                    <th>DELETE</th>";
        }       

        ?>

    </tr>
</thead>

<tbody>
    <?php foreach ($data as $row) {?>
        <tr <?php if(isset($_SESSION['id']) && $_SESSION['id'] == $row['forumUserId']){echo "class='userRow'";}?>>
            <td> <?=$row['userName']; ?> </td>
            <td> <?=$row['forumTitle']; ?> </td>
            <td> <?=$row['forumArticle']; ?> </td>
            <td> <?=$row['forumDate']; ?> </td>

            <?php 
            if(isset($_SESSION['id']) && $_SESSION['id'] == $row['forumUserId']){
                echo "<td> <a href='?module=forum&action=show&id=".$row['forumId']."'>EDIT</a></td>
                <td> <a href='?module=forum&action=delete&id=".$row['forumId']."'>DELETE</a></td>";
            }
            ?>
        </tr>
   <?php } ?>
</tbody>
</table>