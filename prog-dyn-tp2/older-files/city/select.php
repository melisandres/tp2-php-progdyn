<h2>La discussion</h2>
<table>

<thead>
    <tr>
        <th>Titre</th>
        <th>Article </th>
        <th>Date</th>
        <th>EDIT</th>
    </tr>
</thead>
<tbody>
    <?php foreach ($data as $row) {?>
        <tr>
            <td> <?=$row['forumTitle']; ?> </td>
            <td> <?=$row['forumArticle']; ?> </td>
            <td> <?=$row['forumDate']; ?> </td>
            <td> <a href="?module=city&action=show&id=<?= $row['id'];?>">EDIT </a></td>
        </tr>
   <?php } ?>
</tbody>
</table> 