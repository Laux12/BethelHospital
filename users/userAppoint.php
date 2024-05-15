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
    <title>Appoint</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/all.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../styles/userInterfaceStyle.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<style>

</style>

<body>
    <?php if (isset($_SESSION['success'])) {
    ?>
        <script>
            swal({
                title: "Success",
                text: "<?php echo $_SESSION['success'] ?>",
                icon: "success",
            });
        </script>

    <?php
        unset($_SESSION['success']);
    }
    ?>
    <?php if (isset($_SESSION['error'])) {
    ?>
        <script>
            swal({
                title: "Error",
                text: "<?php echo $_SESSION['error'] ?>",
                icon: "error",
            });
        </script>

    <?php
        unset($_SESSION['error']);
    }


    ?>
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
                    <a href="userProfile.php" class="img-container">

                        <?php
                        echo "<img src='../images/$profileImg' alt='profile' width='40px'>";
                        ?>
                    </a>
                </div>
            </div>
            <div class="col-2">

            </div>
            <div class="col-8 m-4 ">
                <div class="row bg-warning m-5" style="height:100%;border:1px solid black;">
                    <div class="col-5 text-light d-flex flex-column justify-content-center align-items-center" style="background-color:#0E46A3; background: linear-gradient(to bottom, #0e46a3, #1965de); font-size:.7em; display:flex; ">
                        <h4>Please fill up the form.</h4>
                        <img src="../images/doctor2.png" alt="doctor" width="200px" height="300px">
                    </div>
                    <div class="col-7 bg-light d-flex justify-content-center align-items-center">
                        <form action="../configs/appointConfig.php" method="post" class="card bg-light d-flex justify-content-center align-items-center m-4 gap-3" style="border:none;">
                            <h4 style="font-weight:bold;">APPOINTMENT FORM</h4>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                                <input type="text" class="form-control" placeholder="Patient name" name="patientName" required>
                                <select class="form-select" required name="gender">
                                    <option value="">Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-solid fa-user"></i></span>

                                <select class="form-select" required name="relation">
                                    <option value="">Relation to the patient</option>
                                    <option value="Parents">Parents</option>
                                    <option value="Siblings">Siblings</option>
                                    <option value="Grandparents">Grandparents</option>
                                    <option value="Niece">Niece</option>
                                    <option value="Cousin">Cousin</option>
                                    <option value="Friend">Friend</option>
                                </select>
                            </div>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-solid fa-phone"></i></span>
                                <input type="tel" class="form-control" placeholder="Phone" name="phone" required>
                                <select class="form-select" required name="barangay">
                                    <option value="">Barangay</option>
                                    <option value="Aglayan">Aglayan</option>
                                    <option value="Bangcud">Bangcud</option>
                                    <option value="Barangay 1 (Poblacion)">Barangay 1 (Poblacion)</option>
                                    <option value="Barangay 2 (Poblacion)">Barangay 2 (Poblacion)</option>
                                    <option value="Barangay 3 (Poblacion)">Barangay 3 (Poblacion)</option>
                                    <option value="Barangay 4 (Poblacion)">Barangay 4 (Poblacion)</option>
                                    <option value="Barangay 5 (Poblacion)">Barangay 5 (Poblacion)</option>
                                    <option value="Barangay 6 (Poblacion)">Barangay 6 (Poblacion)</option>
                                    <option value="Barangay 7 (Poblacion)">Barangay 7 (Poblacion)</option>
                                    <option value="Barangay 8 (Poblacion)">Barangay 8 (Poblacion)</option>
                                    <option value="Barangay 9 (Poblacion)">Barangay 9 (Poblacion)</option>
                                    <option value="Barangay 10 (Poblacion)">Barangay 10 (Poblacion)</option>
                                    <option value="Barangay 11 (Poblacion)">Barangay 11 (Poblacion)</option>
                                    <option value="Barangay 12 (Poblacion)">Barangay 12 (Poblacion)</option>
                                    <option value="Barangay 13 (Poblacion)">Barangay 13 (Poblacion)</option>
                                    <option value="Barangay 14 (Poblacion)">Barangay 14 (Poblacion)</option>
                                    <option value="Barangay 15 (Poblacion)">Barangay 15 (Poblacion)</option>
                                    <option value="Barangay 16 (Poblacion)">Barangay 16 (Poblacion)</option>
                                    <option value="Barangay 17 (Poblacion)">Barangay 17 (Poblacion)</option>
                                    <option value="Barangay 18 (Poblacion)">Barangay 18 (Poblacion)</option>
                                    <option value="Barangay 19 (Poblacion)">Barangay 19 (Poblacion)</option>
                                    <option value="Barangay 20 (Poblacion)">Barangay 20 (Poblacion)</option>
                                    <option value="Barangay 21 (Poblacion)">Barangay 21 (Poblacion)</option>
                                    <option value="Barangay 22 (Poblacion)">Barangay 22 (Poblacion)</option>
                                    <option value="Barangay 23 (Poblacion)">Barangay 23 (Poblacion)</option>
                                    <option value="Barangay 24 (Poblacion)">Barangay 24 (Poblacion)</option>
                                    <option value="Barangay 25 (Poblacion)">Barangay 25 (Poblacion)</option>
                                    <option value="Barangay 26 (Poblacion)">Barangay 26 (Poblacion)</option>
                                    <option value="Barangay 27 (Poblacion)">Barangay 27 (Poblacion)</option>
                                    <option value="Barangay 28 (Poblacion)">Barangay 28 (Poblacion)</option>
                                    <option value="Barangay 29 (Poblacion)">Barangay 29 (Poblacion)</option>
                                    <option value="Barangay 30 (Poblacion)">Barangay 30 (Poblacion)</option>
                                    <option value="Barangay 31 (Poblacion)">Barangay 31 (Poblacion)</option>
                                    <option value="Barangay 32 (Poblacion)">Barangay 32 (Poblacion)</option>
                                    <option value="Barangay 33 (Poblacion)">Barangay 33 (Poblacion)</option>
                                    <option value="Barangay 34 (Poblacion)">Barangay 34 (Poblacion)</option>
                                    <option value="Barangay 35 (Poblacion)">Barangay 35 (Poblacion)</option>
                                    <option value="Barangay 36 (Poblacion)">Barangay 36 (Poblacion)</option>
                                    <option value="Barangay 37 (Poblacion)">Barangay 37 (Poblacion)</option>
                                    <option value="Barangay 38 (Poblacion)">Barangay 38 (Poblacion)</option>
                                    <option value="Barangay 39 (Poblacion)">Barangay 39 (Poblacion)</option>
                                    <option value="Barangay 40 (Poblacion)">Barangay 40 (Poblacion)</option>
                                    <option value="Barangay 41 (Poblacion)">Barangay 41 (Poblacion)</option>
                                    <option value="Barangay 42 (Poblacion)">Barangay 42 (Poblacion)</option>
                                    <option value="Barangay 43 (Poblacion)">Barangay 43 (Poblacion)</option>
                                    <option value="Barangay 44 (Poblacion)">Barangay 44 (Poblacion)</option>
                                    <option value="Barangay 45 (Poblacion)">Barangay 45 (Poblacion)</option>
                                    <option value="Barangay 46 (Poblacion)">Barangay 46 (Poblacion)</option>
                                    <option value="Barangay 47 (Poblacion)">Barangay 47 (Poblacion)</option>
                                    <option value="Barangay 48 (Poblacion)">Barangay 48 (Poblacion)</option>
                                    <option value="Barangay 49 (Poblacion)">Barangay 49 (Poblacion)</option>
                                    <option value="Barangay 50 (Poblacion)">Barangay 50 (Poblacion)</option>
                                    <option value="Busdi">Busdi</option>
                                    <option value="Caburacanan">Caburacanan</option>
                                    <option value="Can-ayan">Can-ayan</option>
                                    <option value="Capitan Angel">Capitan Angel</option>
                                    <option value="Casisang">Casisang</option>
                                    <option value="Dalwangan">Dalwangan</option>
                                    <option value="Imbayao">Imbayao</option>
                                    <option value="Indalasa">Indalasa</option>
                                    <option value="Kalasungay">Kalasungay</option>
                                    <option value="Kulaman">Kulaman</option>
                                    <option value="Laguitas">Laguitas</option>
                                    <option value="Linabo">Linabo</option>
                                    <option value="Magsaysay">Magsaysay</option>
                                    <option value="Maligaya">Maligaya</option>
                                    <option value="6Managok7">Managok</option>
                                    <option value="Miglamin">Miglamin</option>
                                    <option value="Patpat">Patpat</option>
                                    <option value="Saint Peter">Saint Peter</option>
                                    <option value="San Jose">San Jose</option>
                                    <option value="San Martin">San Martin</option>
                                    <option value="Silae">Silae</option>
                                    <option value="Sinanglanan">Sinanglanan</option>
                                    <option value="Sumpong">Sumpong</option>
                                    <option value="Violeta">Violeta</option>
                                </select>
                            </div>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                                <input type="number" class="form-control" placeholder="Patient age" name="age" required>
                                <select style="width:48%;border:none;border:1px solid #cdcecf;text-align:start;padding-left:9px;" name="aType" required>
                                    <option value="">Type</option>
                                    <option value="General Consultation">General Consultation</option>
                                    <option value="Specialist Consultation">Specialist Consultation</option>
                                    <option value="Routine Check-up">Routine Check-up</option>
                                    <option value="Diagnostic Test (e.g., X-ray, MRI, CT scan)">Diagnostic Test (e.g., X-ray, MRI, CT scan)</option>
                                    <option value="Surgical Consultation">Surgical Consultation</option>
                                    <option value="Physical Therapy Session">Physical Therapy Session</option>
                                    <option value="Mental Health Counseling">Mental Health Counseling</option>
                                    <option value="Prenatal Care">Prenatal Care</option>
                                    <option value="Postoperative Follow-up">Postoperative Follow-up</option>
                                    <option value="Vaccination Appointment">Vaccination Appointment</option>
                                    <option value="Dental Check-up">Dental Check-up</option>
                                    <option value="Eye Examination">Eye Examination</option>
                                    <option value="Pediatric Consultation">Pediatric Consultation</option>
                                </select>
                            </div>
                            <div class="input-group ">
                                <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-calendar-days"></i></span>
                                <?php
                                $minimumDate = date("Y-m-d");

                                echo " 
                                  <input type='date' required name='date' min='$minimumDate' max='2050-1-29'style='border:none;width:43%;border:1px solid #cdcecf;text-align:start;padding-left:9px;'>";
                                ?>

                                <select style="width:48%;border:none;border:1px solid #cdcecf;text-align:start; padding-left:9px;" name="time" required>
                                    <option value="">Select Time</option>
                                    <option value="08:30 AM">8:30 AM - 10:30 AM</option>
                                    <option value="10:30 AM">10:30 AM - 12:30 PM</option>
                                    <option value="12:30 AM">12:30 PM - 2:30 PM</option>
                                    <option value="14:30 AM">2:30 PM - 4:00 PM</option>
                                </select>
                                <div class="col m-1 ">
                                    <button type="submit" class="btn btn-primary mt-3" style="width:100%;">Submit</button>
                                </div>
                            </div>




                        </form>
                    </div>
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