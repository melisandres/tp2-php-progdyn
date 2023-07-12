<h2>La discussion</h2>
<table>

<thead>
    <tr>
        <th>Titre</th>
        <th>Article </th>
        <th>Author</th>
        <th>Date</th>
        <?php
        if (isset($_SESSION['fingerprint'])){
            echo "<th>EDIT</th>
            <th>DELETE</th>";
        }       

        ?>

    </tr>
</thead>
<tbody>
    <?php foreach ($data as $row) {?>
        <tr>
            <td> <?=$row['forumTitle']; ?> </td>
            <td> <?=$row['forumArticle']; ?> </td>
            <td> <?=$row['userName']; ?> </td>
            <td> <?=$row['forumDate']; ?> </td>

            <?php 
            if(isset($_SESSION['id']) && $_SESSION == $row['forumUserId']){
                echo "<td> <a href=?module=forum&action=show&id=".$row['forumId']."'>EDIT </a></td>
                <td> <a href='?module=forum&action=delete&id=".$row['forumId']."'>DELETE </a></td>";
            }
            ?>
        </tr>
   <?php } ?>
</tbody>
</table>