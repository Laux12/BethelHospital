<?php
include("database.php");

$name = $_POST['name'];

$sql = "SELECT * FROM userappointments WHERE patientName LIKE '$name%' OR apmtID LIKE '$name%' OR aDate LIKE '$name%' ORDER BY aStatus ASC";
$result = mysqli_query($con, $sql);
$data = '';
while ($row = mysqli_fetch_assoc($result)) {
    $status = $row['aStatus'];
    if ($status) {
        $status = "<i class=' fa-solid fa-circle-check'></i>";
    } else {
        $status = "<i class='fa-solid fa-circle-ellipsis'></i>";
    }
    $data .=  "<tr> <td>" . $row['apmtID'] . "</td><td>" . $row['patientName'] . "</td><td>" . $row['age'] . "</td><td>" . $row['patientGender'] . "</td><td>" .  $row['typeOfAppointment'] . "</td><td>"  . $row['phoneNumber'] . "</td><td>" .  $row['aDate'] . "</td><td>" .  $row['aTime'] . "</td><td>" .  $row['address'] . "</td><td>" .
        $status .
        "</td></tr>";
}

if ($data == null) {
    echo "<div style='text-align:center; text-wrap:nowrap;width:100%'>No Data Found</div>";
} else {
    echo $data;
}
