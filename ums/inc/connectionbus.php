<?php 

    // $connection = mysqli_connect(dbsever, dbuser, password, dbname);

    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'userdb';

    $connection = mysqli_connect('localhost', 'root', '', 'userdb');

    // mysqli_connect_errno(); mysqli_connect_error();

    // Checking the connection
    if (mysqli_connect_errno()){
        die('Database connection failed' . mysqli_connect_error());
    }
    
    $dbhost1 = 'localhost';
    $dbuser1 = 'root';
    $dbpass1 = '';
    $dbname1 = 'busdb';

    $connect = mysqli_connect('localhost', 'root', '', 'busdb');

    if (mysqli_connect_errno()) {
        die('Database(busdb) Connection Failed' . mysqli_connect_error());
    }

?>