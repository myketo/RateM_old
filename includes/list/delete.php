<?php
require_once "../functions.php";
require_once "../connect.php";
require_once "../queries.php";
session_start();

// check if user came from the proper page
if($_SERVER['HTTP_REFERER'] !== homePage() . "/list"){
    header("Location: " . homePage());
    die();
}

// check if id field is set
if(!isset($_GET['id'])){
    header("Location: " . homePage());
    die();
}


$id = htmlspecialchars($_GET['id']);

// check id field
if(!is_numeric($id)){
    header("Location: " . homePage());
    die();
}

if(!checkForArtistById($id)){
    header("Location: " . homePage());
    die();
}


// failed to delete artist
if(!deleteArtist($id)){
    $_SESSION['errors'] = ["Error while deleting an item."];
    header("Location: " . homePage() . "/list");
    die();
}

// successfuly deleted artist
$_SESSION['success'] = "Successfuly deleted an item.";
header("Location: " . homePage() . "/list");
die();