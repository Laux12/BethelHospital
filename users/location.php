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
    <title>Location</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/all.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../styles/userInterfaceStyle.css">
</head>
<style>

</style>

<body>

    <div class="container-fluid  w-100 vh-100 bg-light" style="overflow-y:hidden;">
        <div class="row">
            <div class="header">
                <div class="left-side">
                    <button class="btn text-light m-2 text-dark" onclick="back()"> <span class="material-icons m-2">
                            arrow_back_ios_new
                        </span></button>
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
                    <div class="img-container">
                        <?php
                        echo "<img src='../images/$profileImg' alt='profile' width='40px'>";
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-2 ">
            </div>
            <div class="col-8 m-4">
                <div class="row-2 m-2 bg-light d-flex justify-content-start align-items-end">
                    <h3><span style="color:#0086F8;">G</span><span style="color:#FF4130;">o</span><span style="color:#FFBD02">o</span><span style="color:#0086F8;">g</span><span style="color:#05A94B;">l</span><span style="color:#FF4130;">e</span>
                        <span style="color:#0086F8;">maps</span>
                    </h3>
                </div>
                <div class="card m-2 bg-light">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3707.097688856974!2d125.12232552480809!3d8.159515527896131!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x32ffa981389760e9%3A0x537bc24f93729da9!2sBethel%20Baptist%20Hospital!5e1!3m2!1sen!2sph!4v1715258437508!5m2!1sen!2sph" width="950" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <div class="col-2"></div>
        </div>

    </div>
    <script>
        const sidebar = document.querySelector('.sidebar');
        var burger = document.getElementById("burger");

        function back() {
            window.location = "userInterface.php";
        } // Select the dropdown menu

        function option() {
            // Select the dropdown menu
            const dropdownMenu = document.getElementById("hid-div");

            // Check if the dropdown menu is hidden
            if (dropdownMenu.classList.contains('d-none')) {
                // If hidden, remove the 'd-none' class to show the menu
                dropdownMenu.classList.value = "d-flex";
            } else {
                // If visible, add the 'd-none' class to hide the menu
                dropdownMenu.classList.toggle('d-none');
            }
        }
    </script>
</body>

</html>