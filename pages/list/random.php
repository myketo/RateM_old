<?php $item = getRandomUnrated(); ?>

<div class='random'>
    <a href='list/random'>Randomize again</a>

    <h1><?=$item['artist']?></h1>
    <a href='list/edit/<?=$item['id']?>'>Rate</a>
    <br>

    <p>Added: <?=$item['date']?></p>
</div>