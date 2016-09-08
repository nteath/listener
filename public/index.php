<?php

use Pheanstalk\Pheanstalk;
use Pheanstalk\Exception\ConnectionException;

require dirname(__DIR__) . "/vendor/autoload.php";
require dirname(__DIR__) . "/.env";

try
{
    $queue = new Pheanstalk($config['ip'], $config['port']);
    $queue->watch("outros");

    while($job = $queue->reserve()) {

        $received = json_decode($job->getData(), true);
        $command  = $received['command'];

        sleep(10);
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
