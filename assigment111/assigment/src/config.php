<?php

$conn = mysqli_connect('localhost', 'root', '', 'busdb');

if (mysqli_connect_errno()) {
    die('Database(busdb) Connection Failed' . mysqli_connect_error());
}
?>