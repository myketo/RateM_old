<?php

function homePage(){
    $url = "http://{$_SERVER['SERVER_NAME']}";
    return $url .= $_SERVER['SERVER_NAME'] == "localhost" ? "/RateM" : "";
}

function parseUrl()
{
    if(isset($_GET['url'])){
        return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
    }
}


function title($url = [])
{
    $default = "RateM";

    if(!isset($url[0])) return $default;

    return "$default | {$url[0]}";
}

function path($url = [])
{
    $dir = "pages/home";
    $file = "index.php";
    $subpage = "{$url[0]}.php";
    if(isset($url[0]) && file_exists("pages/{$url[0]}/$file")){
        $dir = "pages/{$url[0]}";
    }

    if(isset($url[1]) && file_exists("$dir/{$url[1]}.php")){
        $subpage = "{$url[1]}.php";
    }

    return [
        "dir" => $dir,
        "file" => $file,
        "subpage" => $subpage];
}

function showErrorAndSuccessMsg()
{
    // check for success msg
    if(isset($_SESSION['success'])){
        echo "<span class='success'>{$_SESSION['success']}</span>";
        unset($_SESSION['success']);
    }


    // check for error msg
    if(!isset($_SESSION['errors']) || !count($_SESSION['errors'])) return;

    echo "<ul class='error_list'>";
    for($i = 0; $i < count($_SESSION['errors']); $i++) echo "<li class='error'>{$_SESSION['errors'][$i]}</li>";
    echo "</ul>";

    unset($_SESSION['errors']);
}