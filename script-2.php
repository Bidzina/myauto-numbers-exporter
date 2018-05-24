<?php

$handle = fopen("ids.txt", "r");

if ($handle) {
    while (($line = fgets($handle)) !== false) {
        $url = 'https://www.myauto.ge/ka/detail/'.trim($line);
        $content = file_get_contents($url);
        $item = preg_match_all('/tel\:\+(\d+)\"/s', $content ,$estimates);
        file_put_contents('numbers.txt', implode("\n", $estimates[1])."\n", FILE_APPEND);
    }

    fclose($handle);
} else {
    // error opening the file.
}