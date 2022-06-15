<?php 
    $phar = new Phar('text.phar');
    $phar->startBuffering();
    $phar['testText.txt'] = file_get_contents('../textFiles/testText.txt');
    $phar->stopBuffering();

    echo nl2br(file_get_contents('phar://text.phar/testText.txt'));