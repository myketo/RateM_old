<?php

function parseUrl()
{
    if(isset($_GET['url'])){
        return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
    }
}


function title()
{
    $default = "RateM";

    if(!isset($_GET['url'])) return $default;

    $url = parseUrl();
    return "$default | {$url[0]}";
}


function page()
{
    $def_dir = "pages/home";
    $def_file = "index.php";
    $default = "$def_dir/$def_file";

    if(!isset($_GET['url'])) return $default;

    $url = parseUrl();

    return file_exists("pages/{$url[0]}/$def_file") ? "pages/{$url[0]}/$def_file" : $default;
}