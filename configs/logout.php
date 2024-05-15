<?php
session_start();
$_SESSION = array();
session_unset();
session_destroy();
header("location: ../users/login-page.php");
exit;
