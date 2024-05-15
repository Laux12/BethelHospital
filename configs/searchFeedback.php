<?php
include("database.php");
$name = $_POST['name'];
$query = "SELECT * FROM userfeedbacks fb, accounts act WHERE fb.accountID = act.accountID AND act.firstName LIKE '$name%'";

$result = mysqli_query($con, $query);
$data = '';
while ($row = mysqli_fetch_assoc($result)) {
    $pfp = $row["profileImg"];
    $data .=  "<div class='feedback-card'>" . "<div class='header'>" . "<div class='image-container'>" . "<img src='../images/$pfp' alt='profile' width='60px'>" . "</div><div class='name-rating-container'>" . "<p>" . $row['firstName'] . " " . $row['lastName'] . "</p>" . "<div class='rating-container'>" . "<p>" .  $row["rating"] . "</p>"  . "<i class='fa-solid fa-star'></i></div></div></div><div class='feedback'><p>" .  $row["comments"]  .  "</p></div></div>";
}

if ($data == null) {
    echo "<div style='text-align:center; text-wrap:nowrap;width:100%'>No Data Found</div>";
} else {
    echo $data;
}
