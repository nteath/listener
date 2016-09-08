<?php

use Pheanstalk\Pheanstalk;
use Pheanstalk\Exception\ConnectionException;

require dirname(__DIR__) . "/vendor/autoload.php";
require dirname(__DIR__) . "/.env";

try
{
    $queue = new Pheanstalk($config['ip'], $config['port']);
    $queue->watch("outros");

    // ******************************************************
    // ******************************************************
    // ******************************************************
    // ******************************************************

    $command = "ffmpeg  -loop 1 -i /home/project/public/files/backgrounds/1.jpg -ss 0 -t 00:00:15.00  -i \"https://r6---sn-vuxbavcx-5ui6.googlevideo.com/videoplayback?lmt=1472341546050468&sparams=dur%2Cei%2Cid%2Cinitcwndbps%2Cip%2Cipbits%2Citag%2Clmt%2Cmime%2Cmm%2Cmn%2Cms%2Cmv%2Cpl%2Cratebypass%2Crequiressl%2Csource%2Cupn%2Cexpire&ipbits=0&requiressl=yes&initcwndbps=867500&source=youtube&ei=GzHRV_6MHtXgWozYmPAG&mn=sn-vuxbavcx-5ui6&ip=62.103.179.190&mm=31&itag=22&pl=24&signature=D941D5E7370CBB60911509687C68DB792D43FE68.9C4C2ECA87C5550DC697A3F4D4E34651FDFF99F4&id=o-AM2yOcXZRnNAUWIBLWBm4zzAent2pZsdHhf0xoKtFBQ1&mv=m&upn=oRURBeLb1IE&mt=1473326806&ms=au&key=yt6&mime=video%2Fmp4&expire=1473348987&dur=63.088&sver=3&ratebypass=yes\" -ss 0 -t 00:00:15.00  -i \"https://r5---sn-vuxbavcx-5uie.googlevideo.com/videoplayback?pl=24&ipbits=0&initcwndbps=802500&ip=62.103.179.190&key=yt6&itag=22&requiressl=yes&ei=HTHRV4r6Kor_iAa1wpzIBQ&lmt=1471760265607732&source=youtube&mv=m&mt=1473326806&ms=au&mn=sn-vuxbavcx-5uie&mime=video%2Fmp4&dur=57.213&id=o-ABaeZ7lomqh2DMSk3lDSeiIk39gu310gaVo8ZqQwDlNC&sver=3&signature=C3F71B285729BCAC770E6D92F59C8E2025D08FE5.2089580666A8E00E2B79E240B416862E8C46ADD1&upn=JHOoLVO0Qus&expire=1473348989&mm=31&ratebypass=yes&sparams=dur%2Cei%2Cid%2Cinitcwndbps%2Cip%2Cipbits%2Citag%2Clmt%2Cmime%2Cmm%2Cmn%2Cms%2Cmv%2Cpl%2Cratebypass%2Crequiressl%2Csource%2Cupn%2Cexpire\" -ss 0 -t 00:00:15.00  -i \"https://r6---sn-vuxbavcx-5uie.googlevideo.com/videoplayback?expire=1473348992&id=o-ALoRnOHKxb0cTR7ueq04nE_cUQ0ABk4SSc6bdvTN4ViY&ei=IDHRV4qKFZycWuH3qMgJ&lmt=1471869087624982&ip=62.103.179.190&mv=m&mt=1473326806&ms=au&sver=3&mm=31&dur=308.569&mn=sn-vuxbavcx-5uie&signature=355DB87DB12AF5FCBA86105046A44592192C75A5.97775A68374D116B4A7B7EA37409697B660F4E46&key=yt6&itag=22&ipbits=0&mime=video%2Fmp4&requiressl=yes&ratebypass=yes&initcwndbps=802500&source=youtube&sparams=dur%2Cei%2Cid%2Cinitcwndbps%2Cip%2Cipbits%2Citag%2Clmt%2Cmime%2Cmm%2Cmn%2Cms%2Cmv%2Cpl%2Cratebypass%2Crequiressl%2Csource%2Cupn%2Cexpire&pl=24&upn=3zzwLrAA6mk\" -i https://i.ytimg.com/vi/5MeiwLLZjDo/hqdefault.jpg -i /home/project/public/files/sounds/1.mp3  -filter_complex \"[0:v]scale=w=1920:h=1080,setsar=ratio=1[0]; [1:v]scale=w=698:h=393[1]; [2:v]scale=w=447:h=251[2]; [3:v]scale=w=628:h=352[3]; [4:v]scale=w=418:h=312[4]; [0] [1] overlay=x=19:y=26 [100];   [100] [2] overlay=x=746:y=435 [101];   [101] [3] overlay=x=1265:y=682 [102];   [102] [4] overlay=x=25:y=454 [103]; [5:a]afade=t=in:ss=0:d=2,afade=t=out:st=13:d=2,volume=0.5,aformat=sample_fmts=fltp:sample_rates=44100:channel_layouts=stereo[music]; [1:a]aformat=sample_fmts=fltp:sample_rates=44100:channel_layouts=stereo[vsound]; [music][vsound]amerge[audio]\" -t 15 -map \"[103]\"  -map \"[audio]\" -strict -2 -c:a aac  -r 25 -pix_fmt yuv420p  /home/project/public/files/outros/1.mp4";
//        $command = "ffmpeg  -loop 1 -i /home/project/public/files/backgrounds/1.jpg -ss 0 -t 00:00:10.00  -i \"https://r6---sn-vuxbavcx-5uie.googlevideo.com/videoplayback?upn=8x2JmRZKUaI&source=youtube&lmt=1471869087624982&ei=IDDRV-W9G5KjWt-QhagC&mime=video%2Fmp4&key=yt6&initcwndbps=808750&signature=CCB26196EA075B391EFEFB5CA5E5120B6A2B226E.058B0C2D67B941CD2FAE7035A8807941E0B3F977&itag=22&ratebypass=yes&expire=1473348736&sver=3&ipbits=0&dur=308.569&ms=au&mt=1473326399&sparams=dur%2Cei%2Cid%2Cinitcwndbps%2Cip%2Cipbits%2Citag%2Clmt%2Cmime%2Cmm%2Cmn%2Cms%2Cmv%2Cpl%2Cratebypass%2Crequiressl%2Csource%2Cupn%2Cexpire&mv=m&ip=62.103.179.190&requiressl=yes&id=o-AA0ppmiUiD-7dlPyr4Vl6SuGEPpoTlzjqzJ_XgOL6aC9&pl=24&mm=31&mn=sn-vuxbavcx-5uie\" -filter_complex \"[0:v]scale=w=1920:h=1080,setsar=ratio=1[0]; [1:v]scale=w=1844:h=1037[1];  [0] [1] overlay=x=53:y=22 [100]\" -t 10 -map \"[100]\"   -r 25 -pix_fmt yuv420p  /home/project/public/files/outros/1.mp4";

    return exec($command, $output);

    while($job = $queue->reserve()) {

        $received = json_decode($job->getData(), true);
        $command  = $received['command'];


        $command = "ffmpeg  -loop 1 -i /home/project/public/files/backgrounds/1.jpg -ss 0 -t 00:00:15.00  -i \"https://r6---sn-vuxbavcx-5ui6.googlevideo.com/videoplayback?lmt=1472341546050468&sparams=dur%2Cei%2Cid%2Cinitcwndbps%2Cip%2Cipbits%2Citag%2Clmt%2Cmime%2Cmm%2Cmn%2Cms%2Cmv%2Cpl%2Cratebypass%2Crequiressl%2Csource%2Cupn%2Cexpire&ipbits=0&requiressl=yes&initcwndbps=867500&source=youtube&ei=GzHRV_6MHtXgWozYmPAG&mn=sn-vuxbavcx-5ui6&ip=62.103.179.190&mm=31&itag=22&pl=24&signature=D941D5E7370CBB60911509687C68DB792D43FE68.9C4C2ECA87C5550DC697A3F4D4E34651FDFF99F4&id=o-AM2yOcXZRnNAUWIBLWBm4zzAent2pZsdHhf0xoKtFBQ1&mv=m&upn=oRURBeLb1IE&mt=1473326806&ms=au&key=yt6&mime=video%2Fmp4&expire=1473348987&dur=63.088&sver=3&ratebypass=yes\" -ss 0 -t 00:00:15.00  -i \"https://r5---sn-vuxbavcx-5uie.googlevideo.com/videoplayback?pl=24&ipbits=0&initcwndbps=802500&ip=62.103.179.190&key=yt6&itag=22&requiressl=yes&ei=HTHRV4r6Kor_iAa1wpzIBQ&lmt=1471760265607732&source=youtube&mv=m&mt=1473326806&ms=au&mn=sn-vuxbavcx-5uie&mime=video%2Fmp4&dur=57.213&id=o-ABaeZ7lomqh2DMSk3lDSeiIk39gu310gaVo8ZqQwDlNC&sver=3&signature=C3F71B285729BCAC770E6D92F59C8E2025D08FE5.2089580666A8E00E2B79E240B416862E8C46ADD1&upn=JHOoLVO0Qus&expire=1473348989&mm=31&ratebypass=yes&sparams=dur%2Cei%2Cid%2Cinitcwndbps%2Cip%2Cipbits%2Citag%2Clmt%2Cmime%2Cmm%2Cmn%2Cms%2Cmv%2Cpl%2Cratebypass%2Crequiressl%2Csource%2Cupn%2Cexpire\" -ss 0 -t 00:00:15.00  -i \"https://r6---sn-vuxbavcx-5uie.googlevideo.com/videoplayback?expire=1473348992&id=o-ALoRnOHKxb0cTR7ueq04nE_cUQ0ABk4SSc6bdvTN4ViY&ei=IDHRV4qKFZycWuH3qMgJ&lmt=1471869087624982&ip=62.103.179.190&mv=m&mt=1473326806&ms=au&sver=3&mm=31&dur=308.569&mn=sn-vuxbavcx-5uie&signature=355DB87DB12AF5FCBA86105046A44592192C75A5.97775A68374D116B4A7B7EA37409697B660F4E46&key=yt6&itag=22&ipbits=0&mime=video%2Fmp4&requiressl=yes&ratebypass=yes&initcwndbps=802500&source=youtube&sparams=dur%2Cei%2Cid%2Cinitcwndbps%2Cip%2Cipbits%2Citag%2Clmt%2Cmime%2Cmm%2Cmn%2Cms%2Cmv%2Cpl%2Cratebypass%2Crequiressl%2Csource%2Cupn%2Cexpire&pl=24&upn=3zzwLrAA6mk\" -i https://i.ytimg.com/vi/5MeiwLLZjDo/hqdefault.jpg -i /home/project/public/files/sounds/1.mp3  -filter_complex \"[0:v]scale=w=1920:h=1080,setsar=ratio=1[0]; [1:v]scale=w=698:h=393[1]; [2:v]scale=w=447:h=251[2]; [3:v]scale=w=628:h=352[3]; [4:v]scale=w=418:h=312[4]; [0] [1] overlay=x=19:y=26 [100];   [100] [2] overlay=x=746:y=435 [101];   [101] [3] overlay=x=1265:y=682 [102];   [102] [4] overlay=x=25:y=454 [103]; [5:a]afade=t=in:ss=0:d=2,afade=t=out:st=13:d=2,volume=0.5,aformat=sample_fmts=fltp:sample_rates=44100:channel_layouts=stereo[music]; [1:a]aformat=sample_fmts=fltp:sample_rates=44100:channel_layouts=stereo[vsound]; [music][vsound]amerge[audio]\" -t 15 -map \"[103]\"  -map \"[audio]\" -strict -2 -c:a aac  -r 25 -pix_fmt yuv420p  /home/project/public/files/outros/1.mp4";
//        $command = "ffmpeg  -loop 1 -i /home/project/public/files/backgrounds/1.jpg -ss 0 -t 00:00:10.00  -i \"https://r6---sn-vuxbavcx-5uie.googlevideo.com/videoplayback?upn=8x2JmRZKUaI&source=youtube&lmt=1471869087624982&ei=IDDRV-W9G5KjWt-QhagC&mime=video%2Fmp4&key=yt6&initcwndbps=808750&signature=CCB26196EA075B391EFEFB5CA5E5120B6A2B226E.058B0C2D67B941CD2FAE7035A8807941E0B3F977&itag=22&ratebypass=yes&expire=1473348736&sver=3&ipbits=0&dur=308.569&ms=au&mt=1473326399&sparams=dur%2Cei%2Cid%2Cinitcwndbps%2Cip%2Cipbits%2Citag%2Clmt%2Cmime%2Cmm%2Cmn%2Cms%2Cmv%2Cpl%2Cratebypass%2Crequiressl%2Csource%2Cupn%2Cexpire&mv=m&ip=62.103.179.190&requiressl=yes&id=o-AA0ppmiUiD-7dlPyr4Vl6SuGEPpoTlzjqzJ_XgOL6aC9&pl=24&mm=31&mn=sn-vuxbavcx-5uie\" -filter_complex \"[0:v]scale=w=1920:h=1080,setsar=ratio=1[0]; [1:v]scale=w=1844:h=1037[1];  [0] [1] overlay=x=53:y=22 [100]\" -t 10 -map \"[100]\"   -r 25 -pix_fmt yuv420p  /home/project/public/files/outros/1.mp4";

        return exec($command, $output);

        // Always delete a successful job
        //
        // $queue->delete($job);
        $queue->release($job);
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
