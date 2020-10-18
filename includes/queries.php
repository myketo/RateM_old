<?php
function checkForArtistByName($artist)
{
    global $conn;

    $sql = "SELECT `artist` FROM `items` WHERE `artist` = ?;";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "s", $artist);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    return mysqli_num_rows($result);
}

function checkForArtistById($id)
{
    global $conn;

    $sql = "SELECT * FROM `items` WHERE `id` = ?;";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    return mysqli_num_rows($result);
}

function addArtist($artist, $rating, $interest, $comment)
{
    global $conn;

    $sql = "INSERT INTO `items`(`artist`, `rating`, `interest`, `comment`) VALUES(?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "siis", $artist, $rating, $interest, $comment);

    return mysqli_stmt_execute($stmt);
}

function editArtist($id, $artist, $rating, $interest, $comment)
{
    global $conn;

    $rated_at = date('Y-m-d H:i:s');
    if($rating == ""){ $rating = NULL; $rated_at = NULL; }
    if($comment == "") $comment = NULL;

    $sql = "UPDATE `items` SET `artist` = ?, `rating` = ?, `interest` = ?, `comment` = ?, `rated_at` = ? WHERE `id` = ?";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "siissi", $artist, $rating, $interest, $comment, $rated_at, $id);

    return mysqli_stmt_execute($stmt);
}

function deleteArtist($id)
{
    global $conn;

    $sql = "DELETE FROM `items` WHERE `id` = ?;";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);

    return mysqli_stmt_execute($stmt);
}

function getItems()
{
    global $conn;

    $sql = "SELECT * FROM `items`;";
    $result = mysqli_query($conn, $sql);
    if(!$result) return;
    
    $rows = [];
    $i = 0;

    while($row = mysqli_fetch_array($result))
    {
        $row['interest'] = "assets/interest/{$row['interest']}.png";
        if($row['rating'] == 0) $row['rating'] = "";
        $row['status'] = boolval($row['rating']);
        $row['date'] = getTimeAgo($row['created_at']);
        $row['rated'] = getTimeAgo($row['rated_at']);
        $rows[$i] = $row;
        $i++;
    }
    return $rows;
}

function getArtistById($id)
{
    global $conn;

    $sql = "SELECT * FROM `items` WHERE `id` = ?;";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    if(!mysqli_num_rows($result)) return;

    $item = mysqli_fetch_array($result);
    if($item['rating'] == 0) $item['rating'] = "";
    
    return $item;
}

function getAllUnrated()
{
    global $conn;

    $sql = "SELECT * FROM `items` WHERE `rating` IS NULL;";
    $result = mysqli_query($conn, $sql);
    if(!$result) return;

    $rows = [];
    $i = 0;
    while($row = mysqli_fetch_array($result)){
        $row['date'] = getTimeAgo($row['created_at']);
        $rows[$i] = $row;
        $i++;
    }

    return $rows;
}