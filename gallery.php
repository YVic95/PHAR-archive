<?php 
    try {
        $phar = new Phar('./gallery.phar', 0, 'gallery.phar');
        if(Phar::canWrite()) {
            $phar->startBuffering();
            //Adds all files from the folder
            foreach(glob('../photos/*') as $img) {
                //echo $img;
                $phar[basename($img)] = file_get_contents($img);
            }
            //Assigns the stub file
            $phar['show.php'] = file_get_contents('show.php');
            $phar->setDefaultStub('show.php', 'show.php');
            $phar->stopBuffering();
        } else {
            echo 'Unable to write this PHAR-archive';
        }
    } catch (Exception $e) {
        echo 'Unable to open PHAR-archive: ', $e;
    }