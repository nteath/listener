<?php

namespace Outromaker;


use Pheanstalk\Pheanstalk;


class Listener
{
    public function listen()
    {
        try {
            $queue = new Pheanstalk(getenv('IP'), getenv('PORT'));
            $queue->watch("outros");

            while($job = $queue->reserve()) {
                $jobData = json_decode($job->getData(), true);
                $result  = $this->render($jobData['commmand']);

                // Outro created successfully
                if ($result === true) {
                    $confirmed = Respond::outroCreated($job->getId(), $jobData['filename'], 'http://google.com');

                    // Outromaker confirms that everything is ok (or not)
                    $confirmed == true ? $queue->delete($job) : $queue->release($job);
                    continue;
                }

                Respond::outroFailed($job->getId(), $jobData['filename'], 'Reason why it failed');
                $queue->release($job);
                continue;
            }

        } catch (ConnectionException $e) {
            die('ConnectionException: ' . $e->getMessage());
        } catch (\Pheanstalk\Exception $e) {
            die('Pheanstalk\Exception: ' . $e->getMessage());
        }
    }


    private function render($command)
    {
        // $command = $this->replaceYoutubeStreams($command);
        $command  = 'ls';
        $lastLine = exec($command, $output, $returnCode);

        if ($returnCode === 0) {
            return true;
        }

        return $lastLine;
    }


    private function replaceYoutubeStreams($command)
    {
        $temp    = preg_match_all('/{{(.*?)}}/s', $command, $matches);
        $matches = $matches[1];

        $parsedCommand = $command;
        foreach ($matches as $match) {
            $stream = '"' . trim(shell_exec($match)) . '"';
            $find   = '{{' . $match . '}}';

            $parsedCommand = str_replace_first($find, $stream, $parsedCommand);
        }

        return $parsedCommand;
    }
}