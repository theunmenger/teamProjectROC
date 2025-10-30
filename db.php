<?php
$DB_HOST = "localhost";
$DB_USER = "root";
$DB_PASS = "password";
$DB_NAME = "teamproject";

function db() {
    static $conn = null;
    if ($conn === null) {
        $conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
        if (!$conn) {
            die('Database verbinding mislukt: ' . mysqli_connect_error());
        }
        mysqli_set_charset($conn, 'utf8mb4');
    }
    return $conn;
}
?>