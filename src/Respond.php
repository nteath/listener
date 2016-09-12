<?php

namespace Outromaker;

use Requests;

class Respond
{
    public static function outroCreated($jobId, $filename, $url)
    {
        $headers = array('Accept' => 'application/json');
        $details = [
            'job'  => $jobId,
            'file' => $filename,
            'url'  => $url,
        ];

        $received = Requests::post('http://tuber2.inlinkz.org/queue/postback', $headers, $details);

        // Must be true/false
        return $received;
    }


    public static function outroFailed($jobId, $filename, $message)
    {
        $headers = array('Accept' => 'application/json');
        $details = [
            'job'      => $jobId,
            'file'     => $filename,
            'message'  => $message,
        ];

        $received = Requests::post('http://tuber2.inlinkz.org/queue/postback', $headers, $details);

        // Must be true/false
        return $received;
    }
}