<?php 

$language_mode = $_GET['lang'];
$url = $_GET['url'];


if (!isset($_COOKIE['language_mode'])) {
	setcookie("language_mode", 'en', time() + (86400 * 1), "/");
}


setcookie("language_mode", $language_mode, time() + (86400 * 1), "/");
$req_page = explode('/', $url);

header('location: ../'.$req_page[2]);