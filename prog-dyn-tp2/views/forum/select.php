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
    }
    echo $_SESSION['id'];
}

/* if(isset($data['msg'])){
    if ($data['msg']==3){
        $msg = "Deconnexion!";
    }elseif ($data['msg']==4){
        $msg = "Message supprimé!";
    }elseif($data['msg']==5){
        $msg = "Invalid request";
    }
} */


?>

<h2>La discussion</h2>
<p class="msg"><?= $msg;?></p>
<table>

<thead>
    <tr>
        <th>Author</th>
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
        <tr>
            <td> <?=$row['userName']; ?> </td>
            <td> <?=$row['forumTitle']; ?> </td>
            <td> <?=$row['forumArticle']; ?> </td>
            <td> <?=$row['forumDate']; ?> </td>

            <?php 
            if(isset($_SESSION['id']) && $_SESSION['id'] == $row['forumUserId']){
                echo "<td> <a href=?module=forum&action=show&id=".$row['forumId']."'>EDIT </a></td>
                <td> <a href='?module=forum&action=delete&id=".$row['forumId']."'>DELETE </a></td>";
            }
            ?>
        </tr>
   <?php } ?>
</tbody>
</table>