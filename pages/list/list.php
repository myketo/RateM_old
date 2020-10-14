<?php
$items = getItems();
$count = countItems($items);
?>

<div class='show'>
    <a href='list/add'>Add Artist</a><br>
    <button class='all'>ALL[<?=$count['all']?>]</button>
    <button class='rated'>RATED[<?=$count['rated']?>]</button>
    <button class='unrated'>UNRATED[<?=$count['unrated']?>]</button>
    <input type='text' placeholder='Search...' class='search'>

    <table class='tablesorter list-table'>
        <thead>
            <tr>
                <th>Nr</th>
                <th>Artist</th>
                <th>Rating</th>
                <th>Interest</th>
                <th>Comment</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody class='list-table-body'>
        <?php for($i = 0; $i < count($items); $i++){ ?>
            <tr>
                <td><?=$i+1?></td>
                <td><?=$items[$i]['artist']?></td>
                <td class='rating'><?=$items[$i]['rating']?></td>
                <td><img src='<?=$items[$i]['interest']?>' class='icon'></td>
                <td><?=$items[$i]['comment']?></td>
                <td><a href='includes/list/delete.php?id=<?=$items[$i]['id']?>'>Delete</a></td>
                <td><a href='list/edit/<?=$items[$i]['id']?>'>Edit</a></td>
            </tr>
        <?php } ?>
        </tbody>
        <!-- <tr class='tablesorter-ignoreRow'>
            <td colspan='8'><a href='list/add'>Add Artist</a></td>
        </tr> -->
    </table>

    <script src='scripts/list.js'></script>
    <?php showErrorAndSuccessMsg(); ?>
</div>