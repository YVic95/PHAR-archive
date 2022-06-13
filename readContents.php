<?php
    try {
        $dir = opendir('phar://yvpager.phar/YVPager');
        while(($file = readdir($dir)) !== false) {
            echo "{$file}<br/>";
        }
        closedir($dir);
    } catch (Exception $e) {
        echo "Unable to open PHAR-archive: ", $e;
    }