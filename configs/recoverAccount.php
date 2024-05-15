<?php
include("database.php");

session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['username'];
    $newPassword = $_POST['newPassword'];
    $confirmNewPassword = $_POST['confirmNewPassword'];

    if ($newPassword == $confirmNewPassword) {

        $sql = "SELECT * FROM accounts WHERE userName = '$username'";
        $result = mysqli_query($con, $sql);
        if ($result->num_rows > 0) {
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

            $sql = "UPDATE accounts SET pWord = '$hashedPassword' WHERE userName = '$username'";
            if ($con->query($sql)) {
                $_SESSION['success'] = "Password has been successfully recovered!";
                header("Location: ../users/login-page.php");
                exit();
            }
        } else {
            $_SESSION['error'] = "Username does not exist!";
            header("Location: ../users/forgotPassword.php");
            exit();
        }
    } else {
        $_SESSION['error'] = "New Password does not match to the confirm Password";
        header("Location: ../users/forgotPassword.php");
        exit();
    }
}
