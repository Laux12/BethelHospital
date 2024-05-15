<?php
include("database.php");
session_start();
$accountID = $_SESSION['accountID'];


if (isset($_POST['rating_data'])) {
    $rating = $_POST['rating_data'];
    $comment = $_POST['userComment'];
    if ($feedBack == NULL) {
        $sql = "SELECT * FROM userfeedbacks WHERE accountID = '$accountID'";
        if ($result = mysqli_query($con, $sql)) {
            if ($result->num_rows > 0) {
                $sql = "UPDATE userFeedBacks SET rating = '$rating', comments = '$comment' WHERE accountID = '$accountID'";
                $con->query($sql);
            } else {
                $sql = "INSERT INTO userfeedBacks (rating,comments,accountID) VALUES ('$rating', '$comment', '$accountID')";
                $con->query($sql);
            }
        } else {
        }
    }
}
