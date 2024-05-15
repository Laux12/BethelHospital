<?php
include("database.php");


if (isset($_POST['currentID'])) {
    $apmtID = $_POST['currentID'];

    $sql = "UPDATE userappointments SET aStatus = 1 WHERE apmtID='$apmtID'";
    if ($con->query($sql) === TRUE) {
        echo "User information updated successfully";
    } else {
        echo "Error updating user information: ";
    }
} else {
    echo "Missing required fields";
}
