<?php
$items = getAllItems();

echo "<table class='list show'>
    <tr>
        <th>Artist</th>
        <th>Rating</th>
    </tr>";

for($i = 0; $i < count($items); $i++)
{
    echo "<tr>
        <td>{$items[$i]['artist']}</td>
        <td>{$items[$i]['rating']}</td>
    </tr>";
}

echo "<tr>
        <td colspan='2'><a href='list/add'>Add Artist</a></td>
    </tr>
</table>";