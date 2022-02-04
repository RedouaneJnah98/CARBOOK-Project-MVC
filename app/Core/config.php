<?php

// website ttitle
define('WEBSITE_TITLE', 'Car Rental');

// protocal type http or https
define('PROTOCAL', 'http');

// root ans asset paths
// $path = str_replace("\\", "/", PROTOCAL . "://" . $_SERVER['SERVER_NAME'] . __DIR__ . "/");
$path = str_replace("\\", "/", PROTOCAL . "://" . $_SERVER['SERVER_NAME'] . __DIR__  . "/");
$path = str_replace($_SERVER['DOCUMENT_ROOT'], "", $path);

// // $path = str_replace($_SERVER['DOCUMENT_ROOT'], "", $path);

define('ROOT', str_replace("app/Core", "public", $path));
define('ASSETS', str_replace("app/Core", "public/assets", $path));