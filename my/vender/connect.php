<?php

    $connect = simplexml_load_file('test1.xml');
	echo "111";
    if (!$connect) {
        die('Error connect to DataBase');
    }
?>