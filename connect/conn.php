<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "db_saw_do";
$conn = mysqli_connect($hostname, $username, $password, $database);

if ($conn->connect_error) {
    die('Connect Error (' . $db->connect_errno . ')' . $db->connect_error);
}
