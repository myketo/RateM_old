<?php $items = getAllItems(); ?>

<table class='list show'>
    <tr>
        <th>nr</th>
        <th>Artist</th>
        <th>Rating</th>
        <th>Delete</th>
        <th>Edit</th>
    </tr>
<?php for($i = 0; $i < count($items); $i++){ ?>
    <tr>
        <td><?=$i+1?></td>
        <td><?=$items[$i]['artist']?></td>
        <td><?=$items[$i]['rating']?></td>
        <td><a href='includes/list/delete.php?id=<?=$items[$i]['id']?>'>Delete</a></td>
        <td><a href='list/edit/<?=$items[$i]['id']?>'>Edit</a></td>
    </tr>
<?php } ?>
    <tr>
        <td colspan='5'><a href='list/add'>Add Artist</a></td>
    </tr>
</table>

<?php showErrorAndSuccessMsg();