<?php
include("database.php");
session_start();


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $appointmentID = $_POST['currentID'];
    $sql = "SELECT * FROM userappointments WHERE apmtID = '$appointmentID' AND aStatus = 0";
    $result = mysqli_query($con, $sql);
    $aDate = $_POST['aDate'];
    $aDate = date('M', $aDate);
    if ($result->num_rows > 0) {

        $sql = "UPDATE totalappointments SET total = total- 1 WHERE month = '$aDate'";
        $query = "DELETE FROM userappointments WHERE apmtID = '$appointmentID'";
        if ($con->query($query) && $con->query($sql)) {
            $_SESSION['success'] = "Appointment has been deleted successfully!";
        } else {
            $_SESSION['error'] = "Something went wrong deleting appointment";
        }
    } else {
        $_SESSION['error'] = "Cant delete appointment, because appointment already finished!";
    }
}
