<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "BehtelHospital1";
$con = mysqli_connect($servername, $username, $password, $dbname);
if (!$con) {
    die("Connection Error!");
}
