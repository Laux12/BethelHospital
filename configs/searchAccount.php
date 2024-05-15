<?php
include("database.php");

$name = $_POST['name'];

$sql = "SELECT * FROM accounts WHERE accountID LIKE '$name%' OR userName LIKE '$name%' OR firstName LIKE '$name%' OR lastName LIKE '$name%'  ORDER BY accountID ASC";
$query = mysqli_query($con, $sql);
$data = '';
while ($row = mysqli_fetch_assoc($query)) {
    $profileImg = $row['profileImg'];
    $data .=  "<tr> <td>" . $row['accountID'] . "</td><td>" . " <div class='user-profile'>" . " <img src='../images/$profileImg' alt='user-profile'>"  . $row['firstName'] . " " . $row['lastName'] . "</td><td>" . $row['userName'] . "</td><td>" . mb_strimwidth($row['pWord'], 0, 15, "...") . "</td><td>" .  $row['phoneNumber'] . "</td><td>" . $row['role'] .
        "</td></tr>";
}

if ($data == null) {
    echo "<div style='text-align:center; text-wrap:nowrap;width:100%'>No Data Found</div>";
} else {
    echo $data;
}
