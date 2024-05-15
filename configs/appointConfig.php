<?php
include("database.php");

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $accountID = $_SESSION['accountID'];
    $date = $_POST["date"];
    $time = $_POST["time"];

    $query = "SELECT * FROM userappointments WHERE aDate = '$date' AND aTime = '$time'";
    if ($result = mysqli_query($con, $query)) {
        if ($result->num_rows < 3) {
            $query = "SELECT * FROM userappointments WHERE  accountID = $accountID AND aStatus = 0";
            if ($result = mysqli_query($con, $query)) {
                if (!$result->num_rows > 0) {
                    $patientName = $_POST["patientName"];
                    $gender = $_POST["gender"];
                    $phoneNumber = $_POST["phone"];
                    $barangay = $_POST["barangay"];
                    $age = $_POST["age"];
                    $relation = $_POST["relation"];
                    $aType = $_POST["aType"];
                    $accountID = $_SESSION["accountID"];
                    $aStatus = 0;

                    $sql = "INSERT INTO userAppointments (patientName, patientGender,relation, phoneNumber, address, age, typeOfAppointment, aDate, aTime, aStatus, accountID) VALUES ('$patientName', '$gender','$relation', '$phoneNumber', '$barangay', '$age', '$aType', '$date', '$time','$aStatus', '$accountID')";

                    if ($con->query($sql) === TRUE) {
                        $date = strtotime($date);
                        $month = date("M", $date);
                        $sql = "UPDATE totalappointments SET total = total + 1 WHERE month =  '$month'";
                        if ($con->query($sql)) {
                            $_SESSION["success"] = "Your Appointment has been scheduled!";
                            header("Location: ../users/userAppoint.php");
                            exit;
                        } else {
                            $_SESSION["error"] = "Something went wrong!";
                            header("Location: ../users/userAppoint.php");
                            exit;
                        }
                    } else {
                        $_SESSION["error"] = "Something went wrong";
                        header("Location: ../users/userAppoint.php");
                        exit;
                    }
                } else {
                    $_SESSION["error"] = "You're already been scheduled!";
                    header("Location: ../users/userAppoint.php");
                    exit;
                }
            } else {
                $_SESSION["error"] = "Something went wrong!";
                header("Location: ../users/userAppoint.php");
                exit;
            }
        } else {
            $_SESSION["error"] = "Sorry, the total appointments in that time is full!";
            header("Location: ../users/userAppoint.php");
            exit;
        }
    }
}
