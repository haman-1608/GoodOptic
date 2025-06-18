<?php

$server = "localhost";
$user = "root";
$password = "";
$db = "GoodOptic";

$conn = mysqli_connect($server, $user, $password, $db);

if (!$conn) {
    die("Kết nối thất bại:" . mysqli_connect_error());
}
