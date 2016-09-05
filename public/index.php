<?php

use Pheanstalk\Exception\ConnectionException;
use Pheanstalk\Pheanstalk;

require dirname(__DIR__) . "/vendor/autoload.php";
require dirname(__DIR__) . "/.env";

try
{
    $queue = new Pheanstalk($config['ip'], $config['port']);
    $queue->watch("outros");

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
