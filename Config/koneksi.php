<?php 
    $rootDir = $_SERVER['DOCUMENT_ROOT'].'/AZARINE/';
    $server = "localhost"; // nama server
    $user = "root";
    $pass = '';
    $db = "projek_azarine"; // nama database 

    $koneksi = mysqli_connect($server, $user, $pass, $db);

    if(mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }
?>