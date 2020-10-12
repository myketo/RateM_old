<?php $items = getAllItems(); ?>

<div class='show'>
    <table class='tablesorter list-table'>
        <thead>
            <tr>
                <th class='nr'>nr</th>
                <th class='artist'>Artist</th>
                <th class='rating'>Rating</th>
                <th class='interest'>Interest</th>
                <th class='comment'>Comment</th>
                <th class='delete'>Delete</th>
                <th class='edit'>Edit</th>
            </tr>
        </thead>
        <tbody>
        <?php for($i = 0; $i < count($items); $i++){ ?>
            <tr>
                <td><?=$i+1?></td>
                <td><?=$items[$i]['artist']?></td>
                <td><?=$items[$i]['rating']?></td>
                <td><img src='<?=$items[$i]['interest']?>' class='icon'></td>
                <td><?=$items[$i]['comment']?></td>
                <td><a href='includes/list/delete.php?id=<?=$items[$i]['id']?>'>Delete</a></td>
                <td><a href='list/edit/<?=$items[$i]['id']?>'>Edit</a></td>
            </tr>
        <?php } ?>
        </tbody>
        <tr class='tablesorter-ignoreRow'>
            <td colspan='7'><a href='list/add'>Add Artist</a></td>
        </tr>
    </table>

    <script src='scripts/list.js'></script>
    <?php showErrorAndSuccessMsg(); ?>
</div>