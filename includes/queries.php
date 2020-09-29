<?php
function checkForArtist($artist)
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

function addArtist($artist, $rating)
{
    global $conn;

    $sql = "INSERT INTO `items`(`artist`, `rating`) VALUES(?, ?);";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "si", $artist, $rating);

    return mysqli_stmt_execute($stmt);
}

function getAllItems()
{
    global $conn;

    $sql = "SELECT * FROM `items`;";
    $result = mysqli_query($conn, $sql);

    if(!$result) return;

    $rows = [];
    while($row = mysqli_fetch_array($result)) $rows[] = $row;

    return $rows;
}