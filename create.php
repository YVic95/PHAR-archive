<?php 
    try {
        $phar = new Phar('./yvpager.phar', 0, 'yvpager.phar');
        if(Phar::canWrite()) {
            $phar->startBuffering();
            $phar->buildFromIterator(
                new DirectoryIterator(realpath('../component/src/YVPager')),
                '../component/src');
            $phar->stopBuffering();
        } else {
            echo 'Unable to write this PHAR-archive';
        }
    } catch (Exception $e) {
        echo 'Unable to open PHAR-archive: ', $e;
    }