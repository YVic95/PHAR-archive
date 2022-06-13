<?php 
    require_once('autopager.phar');

    $obj = new YVPager\FilePager(
        new YVPager\PagesList(),
        __DIR__ . '/../textFiles/testText.txt');
    //print_r($obj->getItemsCount());
    foreach($obj->getItems() as $line) {
        echo htmlspecialchars($line)."<br /> ";
    }
    echo "<p>$obj</p>";