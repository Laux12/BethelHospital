<?php

include("database.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] = "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM accounts WHERE userName = '$username'";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["pWord"])) {
            $_SESSION["accountID"] = $row["accountID"];
            $_SESSION["userName"] = $row["userName"];
            $_SESSION["firstName"] = $row["firstName"];
            $_SESSION["lastName"] = $row["lastName"];
            $_SESSION["phoneNumber"] = $row["phoneNumber"];
            $_SESSION["role"] = $row["role"];
            $_SESSION["profileIMG"] = $row["profileImg"];


            switch ($row["role"]) {
                case "user":
                    header("Location: ../users/userInterface.php");
                    exit();
                    break;
                case "admin":
                    header("Location: ../admin/dashboard.php");
                    exit();
                    break;
            }
        } else {
            $_SESSION["error"] = "Incorrect password!";
            header("Location: ../users/login-page.php");

            exit();
        }
    } else {
        $_SESSION["error"] = "Incorrect username or password!";
        header("Location: ../users/login-page.php");

        exit();
    }
}
