<?php

function homePage()
{
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

function countItems($items = [])
{
    $count = 
        ['all' => count($items),
        'rated' => 0,
        'unrated' => 0];

    foreach($items as $item) $item['status'] ? $count['rated']++ : $count['unrated']++;

    return $count;
}

function getTimeAdded($created_at)
{
    $origin = date_create($created_at);
    $target = date_create('now');
    $interval = date_diff($origin, $target);

    $mins = $interval->format('%i');
    $hours = $interval->format('%h');
    $days = $interval->format('%d');
    $date = $origin->format('d-m G:i');

    if($hours == 0){
        return "$mins minutes ago";
    }elseif($days == 0){
        return "$hours hours ago";
    }else{
        return $date;
    }
}