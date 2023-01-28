<?php
$username = "root";
$password = "";
$database = "prodavnica";
$host = "localhost";

$conn = new mysqli( $host, $username, $password, $database);
if($conn->connect_errno){
    exit("Konekcija neuspesna: " . $conn->connect_errno);
}
?>