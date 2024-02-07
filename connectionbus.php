<?php 

    // $connection = mysqli_connect(dbsever, dbuser, password, dbname);
    
    $dbhost1 = 'localhost';
    $dbuser1 = 'root';
    $dbpass1 = '';
    $dbname1 = 'busdb';

    $connect = mysqli_connect('localhost', 'root', '', 'busdb');

    if (mysqli_connect_errno()) {
        die('Database(busdb) Connection Failed' . mysqli_connect_error());
    }

?>