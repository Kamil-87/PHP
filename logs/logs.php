<?php

const DIR_LOGS = 'logs';

function logging ()
{
    if(!is_dir(DIR_LOGS)) {
        mkdir(DIR_LOGS, 0777);
    }
    $today = date('G:i:s d.m.Y');
    file_put_contents(DIR_LOGS . '/log.txt', $today . "\r\n", FILE_APPEND);

    $logs = count(
                    explode("\r\n",
                        file_get_contents(DIR_LOGS . '/log.txt')
                    )
                ) - 1;
    var_dump($logs);

    if($logs >= 10) {
        $dir = __DIR__ . '/' . DIR_LOGS . '/';
        var_dump($dir);
        $count = count(scandir($dir)) - 2;
        rename($dir . 'log.txt', $dir . 'log' . $count . '.txt');
    }
}

logging();
