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
    <link rel="stylesheet" href="../styles/userInterfaceStyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/all.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <title>Home</title>
</head>

<body>
    <div class="main-container">
        <div class="header">
            <div class="left-side">
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

            <div class="button-card">
                <div class="heading">
                    <div class="title">
                        <p>Location Information</p>
                    </div>

                    <div class="description">
                        <p>Locate the nearest Bethel Baptist Hospital in your Area.</p>
                    </div>
                    <div class="icon-container">
                        <img src="../images/locaitonLogo.png" alt="icon" width="100px">
                    </div>
                </div>

                <div class="button-container">
                    <a href="location.php"> GO
                    </a>
                </div>
            </div>
            <div class="button-card">
                <div class="heading">
                    <div class="title">
                        <p>Schedule Appointment</p>
                    </div>

                    <div class="description">
                        <p>Locate the nearest Bethel Baptist Hospital in your Area.</p>
                    </div>
                    <div class="icon-container">
                        <img src="../images/scheduleIcon.png" alt="icon" width="100px">
                    </div>
                </div>

                <div class="button-container">
                    <a href="userAppoint.php"> GO
                    </a>
                </div>
            </div>
            <div class="button-card">
                <div class="heading">
                    <div class="title">
                        <p>Emergency Hotlines</p>
                    </div>

                    <div class="description">
                        <p>Have a Questions? or there's an emergency Call our emergency Hotlines.</p>
                    </div>
                    <div class="icon-container">
                        <img src="../images/hotlines.png" alt="icon" width="100px">
                    </div>
                </div>

                <div class="button-container">
                    <a href="hotlines.php"> GO
                    </a>
                </div>
            </div>
            <div class="button-card">
                <div class="heading">
                    <div class="title">
                        <p>Feedback</p>
                    </div>

                    <div class="description">
                        <p>Have a comment or a suggestion? Please dont hesitate to rate our services. Let us read the words of our clients.</p>
                    </div>
                    <div class="icon-container">
                        <img src="../images/feedbackIcon.webp" alt="icon" width="100px">
                    </div>
                </div>

                <div class="button-container">
                    <a href="userFeedBack.php"> GO
                    </a>
                </div>
            </div>

        </div>
        <div class="card mb-5" style="border:none;">
            <div class="col-xl d-block bg-light " style="margin-left:50px;margin-right:50px;">
                <div class="row " style="width:100%;">
                    <div class="col-5"> <img class="m-5" src="../images/covidNews.jpg" alt="news" style="width:100%;height:auto;"></div>
                    <div class="col-1"></div>
                    <div class="col-5  m-5 d-flex justify-content-center align-items-center ">
                        <h1 id="news-header" class="fw-bolder">COVID-19: A Shifting Landscape - Boosters, New
                            Variants,
                            and Lingering
                            Effects</h1>
                    </div>
                </div>

                <p id="news-body" class=" text-justify" style="margin-left:50px;margin-right:50px;">
                    Booster Considerations: With hospitalization rates generally declining, public health officials
                    are
                    strategizing for the future. The possibility of a spring booster shot campaign for high-risk
                    individuals, such as older adults and those with compromised immune systems, is being actively
                    discussed. This targeted approach aims to maintain protection against severe illness as vaccine
                    immunity
                    might wane over time. The Centers for Disease Control and Prevention (CDC) is expected to
                    provide
                    updated guidance in the coming weeks.

                    Promising Vaccine Developments: Researchers continue their relentless pursuit of a universal
                    coronavirus
                    vaccine. A recent breakthrough involves a new vaccine technology that offers protection against
                    a
                    broad
                    range of coronaviruses in animal models. This includes previously unknown strains, potentially
                    paving
                    the way for a more comprehensive defense against future outbreaks. While human trials are still
                    needed,
                    this development offers a glimmer of hope in the ongoing battle against coronaviruses.

                    Emerging Variants and Continued Monitoring: While positive trends emerge in some areas, new
                    variants
                    remain a concern. Subvariants of the Omicron variant, known as BA.4 and BA.5, have been detected
                    in
                    various countries. Scientists are closely monitoring these variants to understand their
                    potential
                    impact
                    on transmissibility and severity of illness. Early data suggests they might be more
                    transmissible
                    than
                    previous Omicron subvariants, but their overall effect on disease course is still under
                    investigation.
                    This underscores the importance of continued vigilance and adherence to public health
                    recommendations.

                    Unexpected Social Effects: The pandemic's impact extends beyond physical health. A recent study
                    in
                    England suggests a surprising trend – a decrease in alcohol consumption among young adults
                    during
                    the
                    COVID-19 lockdowns. The potential reasons for this shift could be attributed to various factors
                    such
                    as
                    social distancing measures, closure of bars and restaurants, or a heightened awareness of health
                    risks.
                    While further research is required to validate these findings, they offer an interesting insight
                    into
                    the pandemic's broader social consequences.
                </p>
            </div>
        </div>
        <div class="card mb-5" style="border:none;">
            <div class="col-xl d-block bg-light " style="margin-left:50px;margin-right:50px;">
                <div class="row " style="width:100%;">
                    <div class="col-5"> <img class="m-5" src="../images/covidNews.jpg" alt="news" style="width:100%;height:auto;"></div>
                    <div class="col-1"></div>
                    <div class="col-5  m-5 d-flex justify-content-center align-items-center ">
                        <h1 id="news-header" class="fw-bolder">COVID-19: A Shifting Landscape - Boosters, New
                            Variants,
                            and Lingering
                            Effects</h1>
                    </div>
                </div>

                <p id="news-body" class=" text-justify" style="margin-left:50px;margin-right:50px;">
                    Booster Considerations: With hospitalization rates generally declining, public health officials
                    are
                    strategizing for the future. The possibility of a spring booster shot campaign for high-risk
                    individuals, such as older adults and those with compromised immune systems, is being actively
                    discussed. This targeted approach aims to maintain protection against severe illness as vaccine
                    immunity
                    might wane over time. The Centers for Disease Control and Prevention (CDC) is expected to
                    provide
                    updated guidance in the coming weeks.

                    Promising Vaccine Developments: Researchers continue their relentless pursuit of a universal
                    coronavirus
                    vaccine. A recent breakthrough involves a new vaccine technology that offers protection against
                    a
                    broad
                    range of coronaviruses in animal models. This includes previously unknown strains, potentially
                    paving
                    the way for a more comprehensive defense against future outbreaks. While human trials are still
                    needed,
                    this development offers a glimmer of hope in the ongoing battle against coronaviruses.

                    Emerging Variants and Continued Monitoring: While positive trends emerge in some areas, new
                    variants
                    remain a concern. Subvariants of the Omicron variant, known as BA.4 and BA.5, have been detected
                    in
                    various countries. Scientists are closely monitoring these variants to understand their
                    potential
                    impact
                    on transmissibility and severity of illness. Early data suggests they might be more
                    transmissible
                    than
                    previous Omicron subvariants, but their overall effect on disease course is still under
                    investigation.
                    This underscores the importance of continued vigilance and adherence to public health
                    recommendations.

                    Unexpected Social Effects: The pandemic's impact extends beyond physical health. A recent study
                    in
                    England suggests a surprising trend – a decrease in alcohol consumption among young adults
                    during
                    the
                    COVID-19 lockdowns. The potential reasons for this shift could be attributed to various factors
                    such
                    as
                    social distancing measures, closure of bars and restaurants, or a heightened awareness of health
                    risks.
                    While further research is required to validate these findings, they offer an interesting insight
                    into
                    the pandemic's broader social consequences.
                </p>
            </div>
        </div>
        <div class="row" style="background-color:#0E46A3;">
            <div class="row-6">
                <div class="col m-5 text-light ">
                    <h5 class="fw-bold">CONTACT US</h5>
                    <p class="fs-7">Thank you for your interest in reaching out to us. Whether you have a question,
                        feedback, or inquiry,
                        we're here to assist you. Please feel free to get in touch with us using the contact information
                        below or by filling out the contact form.</p>
                </div>
            </div>
            <div class="row-6 d-flex">
                <div class="col-3 m-5">
                    <h6 class="text-light fw-bold">CONTACT INFORMATION
                        <hr>
                    </h6>
                    <p class="text-light"><i class="fa-solid fa-phone"></i> (088)-813-2708 </p>
                    <p class="text-light"><i class="fa-solid fa-envelope"></i> bethelBH@gmail.com</p>
                    <p class="text-light"><i class="fa-solid fa-location-dot"></i> Fortich St. Malaybalay City</p>
                </div>
                <div class="col-4 text-center m-5 text-light">
                    <h6 class="text-light fw-bold">BUSINESS HOURS
                        <hr>
                    </h6>

                    <p>MONDAY - FRIDAY 8:30 am - 4:00 pm</p>
                    <p>SATURDAY - SUNDAY [ not available ]</p>

                </div>
                <div class="col-3  m-5">
                    <h6 class="text-light fw-bold">SOCIAL PLATFORMS
                        <hr>
                    </h6>

                    <p class="text-light"><i class="fa-brands fa-facebook"></i> Bethel Baptist Hospital </p>
                    <p class="text-light"><i class="fa-brands fa-instagram"></i> Bethel Baptist Hospital</p>
                </div>

            </div>
            <p class="text-center text-light">TERMS AND CONDITIONS | PRIVACY POLICY</p>
        </div>

    </div>

</body>

</html>