<?php

require dirname(__DIR__) . "/vendor/autoload.php";

$dotenv = new Dotenv\Dotenv(dirname(__DIR__));
$dotenv->load();


(new Outromaker\Listener)->listen();