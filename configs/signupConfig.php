<?php
include("database.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $firstName = $_POST["firstname"];
    $lastName = $_POST["lastname"];
    $phoneNumber = $_POST["phoneNumber"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];
    $role =  "user";
    $profileIMG = "emptyProfile.png";
    $hashPassword = "";

    if ($password == $confirmPassword) {
        $hashPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "SELECT * FROM accounts WHERE userName = '$username'";
        $result = $con->query($sql);
        if (!$result->num_rows > 0) {
            $sql = "INSERT INTO accounts (firstName, lastName,userName,phoneNumber, pWord, role, profileImg) VALUES ('$firstName', '$lastName','$username', '$phoneNumber', '$hashPassword', '$role', '$profileIMG')";
            if (mysqli_query($con, $sql)) {
                $_SESSION['success'] = 'Account created successfully';
                header("Location: ../users/signup-page.php");
                exit();
            } else {
                $_SESSION['error'] = 'Something went wrong, please try again! ' . mysqli_error($con);
                header("Location: ../users/signup-page.php");
                exit();
            }
        } else {
            $_SESSION["error"] = "Username Already Used!";
            header("Location: ../users/signup-page.php");
            exit();
        }
    } else {
        $_SESSION["error"] = "Password and confirm password does not match!";
        header("Location: ../users/signup-page.php");

        exit();
    }
}
