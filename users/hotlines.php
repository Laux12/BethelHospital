<?php
include("../configs/database.php");
session_start();
$accountID = $_SESSION['accountID'];
$firstName = $_SESSION['firstName'];
$userName = $_SESSION['userName'];
$lastName = $_SESSION['lastName'];
$lastName = $_SESSION['lastName'];
$phoneNumber = $_SESSION['phoneNumber'];
$profileImg = $_SESSION['profileIMG'];


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotlines</title>
    <link rel="stylesheet" href="../styles/userInterfaceStyle.css">
    <link rel="stylesheet" href="../styles/hotlineStyle.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/all.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
    <div class="main-container">
        <div class="header">
            <div class="left-side">
                <a class="btn text-light m-2 text-dark" href="userInterface.php"> <span class="material-icons m-2">
                        arrow_back_ios_new
                    </span></a>
                <div class="img-container">
                    <img src="../images/bethelLogo.png" alt="logo" width="80px">
                </div>
                <p>BETHEL BAPTIST HOSPITAL</p>
            </div>
            <div class="profile-container">
                <div>
                    <?php echo "<p>$firstName $lastName </p>" ?>
                    <?php echo "<p style='font-size: 14px;'>$userName </p>" ?>

                </div>
                <a href="userProfile.php" class="img-container">

                    <?php
                    echo "<img src='../images/$profileImg' alt='profile' width='40px'>";
                    ?>
                </a>
            </div>
        </div>
        <div class="main-section">
            <div class="card-container">
                <div class="title-container">
                    <p>Emerygency Hotlines</p>
                </div>
                <div class="contact-container">
                    <div class="numbers-container">
                        <div class="phone-icon-container">
                            <i class="fa-solid fa-phone"></i>
                        </div>
                        <div class="name-container">
                            <p>Emergency Hotlines(BBH)</p>
                        </div>
                        <div class="phone-container">
                            <p>(088)-318-2708</p>
                        </div>
                    </div>
                    <div class="numbers-container">
                        <div class="phone-icon-container">
                            <i class="fa-solid fa-phone"></i>
                        </div>
                        <div class="name-container">
                            <p>Emergency Hotlines(BBH)</p>
                        </div>
                        <div class="phone-container">
                            <p>(088)-318-2709</p>
                        </div>
                    </div>
                    <div class="numbers-container">
                        <div class="phone-icon-container">
                            <i class="fa-solid fa-phone"></i>
                        </div>
                        <div class="name-container">
                            <p>Emergency Hotlines(BBH)</p>
                        </div>
                        <div class="phone-container">
                            <p>(088)-318-2710</p>
                        </div>
                    </div>
                    <div class="numbers-container">
                        <div class="phone-icon-container">
                            <i class="fa-solid fa-phone"></i>
                        </div>
                        <div class="name-container">
                            <p>Emergency Hotlines(BBH)</p>
                        </div>
                        <div class="phone-container">
                            <p>(088)-318-2711   </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</body>

</html>