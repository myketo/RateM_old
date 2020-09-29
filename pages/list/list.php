<?php
$items = getAllItems();

echo "<table class='list show'>
    <tr>
        <th>nr</th>
        <th>Artist</th>
        <th>Rating</th>
        <th>Delete</th>
    </tr>";

for($i = 0; $i < count($items); $i++)
{
    echo "<tr>
        <td>", $i+1 ,"</td>
        <td>{$items[$i]['artist']}</td>
        <td>{$items[$i]['rating']}</td>
        <td><a href='includes/list/delete.php?id={$items[$i]['id']}'>Delete</a></td>
    </tr>";
}

echo "<tr>
        <td colspan='4'><a href='list/add'>Add Artist</a></td>
    </tr>
</table>";


showErrorAndSuccessMsg();