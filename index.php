<?php
require_once "includes/functions.php";
require_once "includes/connect.php";
require_once "includes/queries.php";

session_start();

$url = parseUrl();
$path = path($url);

$page = "{$path['dir']}/{$path['file']}";
$subpage = "{$path['dir']}/{$path['subpage']}";

$title = title($url);

require_once $page;