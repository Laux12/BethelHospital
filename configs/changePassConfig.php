<?php
include("database.php");

session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $oldPassword = $_POST['currentPassword'];
    $newPassword = $_POST['newPassword'];
    $confirmNewPassword = $_POST['confirmNewPassword'];

    if ($newPassword == $confirmNewPassword) {

        if ($oldPassword != $newPassword) {
            $accountID = $_SESSION['accountID'];
            $sql = "SELECT * FROM accounts WHERE accountID = '$accountID'";
            if ($result = $con->query($sql)) {
                $row = mysqli_fetch_assoc($result);
                $correctPassword = $row['pWord'];

                if (password_verify($oldPassword, $correctPassword)) {
                    $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);

                    $sql = "UPDATE accounts SET pWord = '$hashedNewPassword' WHERE accountID = '$accountID'";
                    if ($con->query($sql)) {
                        echo "$correctPassword";
                        $_SESSION['success'] = "Password has been successfully changed!";
                        header("Location: ../users/userProfile.php");
                        exit();
                    } else {
                        $_SESSION['error'] = "Failed to Update Password!";
                        header("Location: ../users/changePassword.php");
                        exit();
                    }
                } else {
                    $_SESSION['error'] = "Wrong password!";
                    header("Location: ../users/changePassword.php");
                    exit();
                }
            } else {
                $_SESSION['error'] = "Something went wrong!";
                header("Location: ../users/changePassword.php");
                exit();
            }
        } else {
            $_SESSION['error'] = "You entered your old Password!";
            header("Location: ../users/changePassword.php");
            exit();
        }
    } else {
        $_SESSION['error'] = "New Password does not match to the confirm Password";
        header("Location: ../users/changePassword.php");
        exit();
    }
}
