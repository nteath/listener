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

//        $command  = "ffmpeg -y -loop 1 -i /home/project/public/files/backgrounds/1.jpg -ss 0 -t 00:00:10.00  -i \"https://r6---sn-vuxbavcx-5ui6.googlevideo.com/videoplayback?signature=31FD85E3A953C4303B487DF0E85863848DF652E1.09313A92CCCCC634A920C85FE543A6B5D2B84FB4&sparams=dur%2Cei%2Cid%2Cinitcwndbps%2Cip%2Cipbits%2Citag%2Clmt%2Cmime%2Cmm%2Cmn%2Cms%2Cmv%2Cpl%2Cratebypass%2Crequiressl%2Csource%2Cupn%2Cexpire&sver=3&upn=ohE1DeEXE8I&itag=22&mn=sn-vuxbavcx-5ui6&mm=31&id=o-AGAKZ1_LR98hVZKmtIW3r-18fj25u9tBW434c7Bc1pCz&source=youtube&pl=24&mv=m&ipbits=0&ms=au&ei=TLLSV5OlBISbWc6Bn7gC&lmt=1472341546050468&dur=63.088&expire=1473447596&ratebypass=yes&key=yt6&mime=video%2Fmp4&mt=1473425163&ip=62.103.179.190&initcwndbps=836250&requiressl=yes\" -filter_complex \"[0:v]scale=w=1920:h=1080,setsar=ratio=1[0]; [1:v]scale=w=1844:h=1037[1];  [0] [1] overlay=x=53:y=22 [100]\" -t 10 -map \"[100]\"   -r 25 -pix_fmt yuv420p  /home/project/public/files/outros/1.mp4 2>&1";

        $command = 'ls';
        $lastLine = exec($command, $output, $returnCode);

        if ($returnCode !== 0) {
            echo 'COMMAND FAILED!!!';
            echo "\n";
            echo $lastLine;
        } else {
            Response::success($job->getId(), '1', 'http://google.com');
            echo "\nOK\n";
        }

        $queue->delete($job);

//        $received = json_decode($job->getData(), true);
//        $command  = $received['command'];
//
//        sleep(10);
//        $queue->delete($job);
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
