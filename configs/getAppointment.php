<?php
include("database.php");
if (isset($_POST['apmtID'])) {
    $apmtID = $_POST['apmtID'];

    $sql = "SELECT * FROM appointments WHERE apmtID = $apmtID";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {   
        $row = $result->fetch_assoc();  
        echo json_encode($row);
    } else {
        echo json_encode(array('error' => 'User not found'));
    }
} else {
    echo json_encode(array('error' => 'Missing stud_id parameter'));
}
$conn->close();