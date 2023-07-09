<h2>Liste de Villes</h2>
<table>

<thead>
    <tr>
        <th>id</th>
        <th>nom de ville</th>
        <th>Edit</th>
    </tr>
</thead>
<tbody>
    <?php foreach ($data as $row) {?>
        <tr>
            <td> <?=$row['id']; ?> </td>
            <td> <?=$row['cityName']; ?> </td>
            <td> <a href="?module=city&action=show&id=<?= $row['id'];?>">EDIT </a></td>
        </tr>
   <?php } ?>
</tbody>
</table>