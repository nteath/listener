<?php

use Pheanstalk\Exception\ConnectionException;
use Pheanstalk\Pheanstalk;

require dirname(__DIR__) . "/vendor/autoload.php";

try
{
    $maxJobs = 2;
    $currentJobs = 0;
    $queue = new Pheanstalk($ip, $port);

    while($job = $queue->reserve()) {
        echo "Ffmpeg is processing....." . PHP_EOL;
        sleep(5);

        echo 'Done!' . PHP_EOL;
        $queue->delete($job);
    }
}
catch (\Pheanstalk\Exception $e)
{
    echo "Exception: " . $e->getMessage();
}
catch (ConnectionException $e)
{
    echo "Exception: " . $e->getMessage();
}
if ($queue->getConnection()->isServiceListening() == true) {
    echo "Service is listening" . "\n";
}