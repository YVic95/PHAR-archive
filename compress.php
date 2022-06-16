<?php
    try {
        $phar = new Phar('compress.phar', 0, 'compress.phar');
        if(Phar::canWrite() && Phar::canCompress()) {
            $phar->startBuffering();
            //Adds all files from the folder
            foreach(glob('../photos/*') as $img) {
                $phar[basename($img)] = file_get_contents($img);
            }
            //Assigns the stub file
            $phar['show.php'] = file_get_contents('show.php');
            $phar->setDefaultStub('show.php', 'show.php');
            //File compression
            $phar->compress(Phar::GZ);

            $phar->stopBuffering();
        } else {
            echo 'Unable to write this PHAR-archive';
        } 
    } catch (Exception $e) {
        echo 'Unable to open PHAR-archive: ', $e;
    }