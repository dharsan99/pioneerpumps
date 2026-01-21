<?php
function db_connect() {
    $servername = 'localhost';
    $username = 'dhya_pioneer';
    $password = '36-qM]}+%t$t';
    $dbname = 'dhya_pioneer_pumps';

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    else{
        
    }

    return $conn;
}
?>
