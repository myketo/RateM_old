<?php
require_once "../functions.php";
require_once "../connect.php";
require_once "../queries.php";
session_start();

// check if form was submitted
if(!isset($_POST['submitAdd'])){
    header("Location: " . homePage());
    die();
}


$_SESSION['errors'] = [];


// checking interest field
if(empty($_POST['interest']) || ($_POST['interest'] < 1) || $_POST['interest'] > 3){
    array_push($_SESSION['errors'], "An error occurred while adding an artist");
    header("Location: " . homePage() . "/list/add");
    die();
}


// checking artist field
if(empty($_POST['artist'])){
    array_push($_SESSION['errors'], "Artist field can not be empty");
    header("Location: " . homePage() . "/list/add");
    die();
}

if(checkForArtistByName($_POST['artist'])){
    array_push($_SESSION['errors'], "This artist is already on your list");
}


// checking rating field
if(!empty($_POST['rating'])){
    if(!is_numeric($_POST['rating'])){
        array_push($_SESSION['errors'], "Rating must be a number");
    }

    if($_POST['rating'] < 1 || $_POST['rating'] > 10){
        array_push($_SESSION['errors'], "Rating must be a number between 1-10");
    }
}


// check for errors
if(count($_SESSION['errors'])){
    header("Location: " . homePage() . "/list/add");
    die();
}


// failed to add artist
if(!addArtist($_POST['artist'], $_POST['rating'], $_POST['interest'])){
    array_push($_SESSION['errors'], "An error occurred while adding an artist");
    header("Location: " . homePage() . "/list/add");
    die();
}

// successfully added artist
$_SESSION['success'] = "Successfully added a new artist to your list!";
header("Location: " . homePage() . "/list/add");
die();