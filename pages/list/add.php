<form method='POST' class='list add' action='includes/list/add.php'>
    <label for='artist'>
        Artist: 
        <input type='text' placeholder='Artist' id='artist' name='artist' required>
    </label>

    <label for='rating'>
        Rating: 
        <input type='number' placeholder='Rating' id='rating' name='rating' min='1' max='10'>
    </label>

    <input type='submit' name='submitAdd' value='Add'>
</form>

<?php showErrorAndSuccessMsg();