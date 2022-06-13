<?php 
    try {
        $phar = new Phar('./autopager.phar', 0, 'autopager.phar');
        if(Phar::canWrite()) {
            $phar->startBuffering();
            //Adding all files from YVPager component
            $phar->buildFromIterator(
                new DirectoryIterator(realpath('../component/src/YVPager')),
                '../component/src');
            //Adding autoloader to the archive
            $phar->addFromString('autoloader.php', file_get_contents('autoloader.php'));
            //Assign an autoloader as a stub file
            $phar->setDefaultStub('autoloader.php', 'autoloader.php');
            $phar->stopBuffering();
        } else {
            echo 'Unable to write this PHAR-archive';
        }
    } catch (Exception $e) {
        echo "Unable to open PHAR-archive: ", $e;
    }