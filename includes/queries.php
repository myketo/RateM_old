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

function addArtist($artist, $rating)
{
    global $conn;

    $sql = "INSERT INTO `items`(`artist`, `rating`) VALUES(?, ?);";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "si", $artist, $rating);

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

function getAllItems()
{
    global $conn;

    $sql = "SELECT * FROM `items`;";
    $result = mysqli_query($conn, $sql);

    if(!$result) return;

    $rows = [];
    while($row = mysqli_fetch_array($result))
    {
        if($row['rating'] == 0) $row['rating'] = "";
        $rows[] = $row;
    }

    return $rows;
}