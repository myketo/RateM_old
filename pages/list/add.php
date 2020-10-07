<form method='POST' class='list add' action='includes/list/add.php'>
    <label for='artist'>
        Artist: 
        <input type='text' placeholder='Artist' id='artist' name='artist' required>
    </label>

    <label for='rating'>
        Rating: 
        <input type='number' placeholder='Rating' id='rating' name='rating' min='1' max='10'>
    </label>

    <label for='interest'>
        Are you interested in hearing more from this artist?
        <select id='interest' name='interest'>
            <option value='3'>Yes</option>
            <option value='1'>No</option>
            <option value='2' selected>Neutral</option>
        </select>
    </label>

    <label for='comment'>
        Comment: 
        <textarea id='comment' name='comment' placeholder='Insert comment here...'></textarea>
    </label>

    <input type='submit' name='submitAdd' value='Add'>
</form>

<?php showErrorAndSuccessMsg();