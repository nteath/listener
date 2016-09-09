<?php


require dirname(__DIR__) . "/vendor/autoload.php";
require dirname(__DIR__) . "/.env";

require dirname(__DIR__) . "/vendor/rmccue/requests/library/Requests.php";
Requests::register_autoloader();


$response = Requests::get('http://tuber2.inlinkz.org/nteath');

die($response->body);
