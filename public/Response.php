<?php

require dirname(__DIR__) . "/vendor/autoload.php";
require dirname(__DIR__) . "/.env";
require dirname(__DIR__) . "/vendor/rmccue/requests/library/Requests.php";

Requests::register_autoloader();

class Response
{
    public static function success($jobId, $filename, $url)
    {
        $details = [
            'job'  => $jobId,
            'file' => $filename,
            'url'  => $url,
        ];

        $response = Requests::get('http://tuber2.inlinkz.org/nteath', [], [json_encode($details)]);

        echo $response->body;
    }
}