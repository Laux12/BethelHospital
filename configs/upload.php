<?php
include("database.php");
session_start();
$accountID = $_SESSION['accountID'];
if (isset($_POST['upload'])) {
    if (!empty($_FILES['file']['name'])) {
        print_r($_FILES['file']);
        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));


        $allowed = array('jpg', 'jpeg', 'png');

        if (in_array($fileActualExt, $allowed)) {

            if ($fileError === 0) {
                if ($fileSize < 5000000) {

                    $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                    $fileDestination = '../images/' . $fileNameNew;

                    $sql = "UPDATE accounts SET profileImg = '$fileNameNew' WHERE accountID = '$accountID'";
                    if ($con->query($sql)) {
                        move_uploaded_file($fileTmpName, $fileDestination);
                        $_SESSION['success'] = "Profile updated Successfully";
                        $_SESSION['profileIMG'] = $fileNameNew;
                        header("Location: ../users/userProfile.php");
                        exit();
                    } else {
                        $_SESSION['error'] = "Something went wrong";

                        header("Location: ../users/userProfile.php");
                        exit();
                    }
                } else {
                    $_SESSION['error'] = "File is too large!";
                    header("Location: ../users/userProfile.php");
                    exit();
                }
            } else {
                $_SESSION['error'] = "There was an error uploading the file";

                header("Location: ../users/userProfile.php");
                exit();
            }
        } else {
            $_SESSION['error'] = "Unable to upload file this type!";

            header("Location: ../users/userProfile.php");
            exit();
        }
    } else {
        $_SESSION['error'] = "Upload a image file first!";

        header("Location: ../users/userProfile.php");
        exit();
    }
} else {
    $_SESSION['error'] = "Upload a image file first!";

    header("Location: ../users/userProfile.php");
    exit();
}
