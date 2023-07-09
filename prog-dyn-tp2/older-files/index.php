<?php
require_once('header.php');
?>

<?php
        require_once("connex.php");
        /*you sent msg in the navigation bar in update-client at line 23*/
        $msg = null;

        if(isset($_GET['msg'])){
            if($_GET['msg']==1){
                $msg = "Le client a été modifié!";
            }elseif($_GET['msg']==2){
                $msg = "Le client a été supprimé!";
            }
        }

        $sql = "SELECT forumTitle, forumArticle, forumDate, userName FROM forum INNER JOIN user ON forumUserId = userId order by forumDate";
        $result = mysqli_query($connex, $sql);
?>

<?= $msg; ?>

<h1>Client List</h1>
<table>
    <thead>
        <tr>
            <th>Date</th>
            <th>Auteur</th>
            <th>Titre</th>
            <th>Article</th>
            <th>Modifier</th>
            <th>Suprimer</th>
        </tr>
    </thead>
    <tbody>
        <?php
                foreach($result as $row){
                    ?>
                    <tr>
                        <td><?= $row['forumDate'];?></td>
                        <td><?= $row['userName']?></td>
                        <td><?= $row['forumTitle'];?></td>
                        <td><?= $row['forumArticle'];?></td>
                        <td> <a href="client-edit.php?id=<?= $row['id']?>">Edit</a> </td>
                        <td>
                            <form action="delete-client.php" method="post">
                                <input type="hidden" name="id" value="<?=$row['id'];?>">
                                <input type="submit" value="Effacer">    
                            </form>
                        </td>
                    </tr>
                    <?php
                }
        ?>

    </tbody>
</table>

<a href="create-article.php">Ajouter</a>
    
</body>
</html>

