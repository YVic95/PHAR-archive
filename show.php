<?php
    /**
     * An individual file in an archive is accessed via the GET -parameter image, 
     * which is filtered before use using the filter extension
     */
    if(isset($_GET['image'])) {
        $_GET['image'] = filter_var(
            $_GET['image'],
            FILTER_CALLBACK,
            [
                'options' => function ($value) {
                                return preg_replace('/[^_\.\w\d]+/', '', $value);
                            }
            ]
        );
        if(file_exists($_GET['image'])) {
            header('Content-Type: image/jpeg');
            header("Content-Length: " . filesize($_GET['image']));
            readfile($_GET['image']);
            exit();
        }
    }
    header("HTTP/1.0 404 Not Found");