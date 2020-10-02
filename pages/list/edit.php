<?php
if(!isset($_GET['id']) || !checkForArtistById($_GET['id'])){
    header("Location: " . homePage());
    die();
}

$item = getArtistById($_GET['id']);
?>

<form method='POST' class='list edit' action='includes/list/edit.php'>
    <label for='artist'>
        Artist: 
        <input type='text' placeholder='Artist' id='artist' name='artist' value='<?=$item['artist']?>' required>
    </label>

    <label for='rating'>
        Rating: 
        <input type='number' placeholder='Rating' id='rating' name='rating' min='1' max='10' value='<?=$item['rating']?>'>
    </label>

    <input type='hidden' name='id' value='<?=$item['id']?>'>
    <input type='submit' name='submitEdit' value='Edit'>
</form>

<?php showErrorAndSuccessMsg();