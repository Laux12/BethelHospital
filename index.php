<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bethel Baptist Hospital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/all.css">
</head>

<body>

    <div class="container-xl bg-light p-0" style="height:auto;width:100%; overflow-x: hidden;">
        <header class="navbar navbar-expand " style="background-color:white;">
            <a href="#">
                <img src="images/bethelLogo.png" alt="logo" class="rounded" style="height: 5rem;width: 5rem;margin-left: 2rem;">
            </a>
            <h2 class="d-flex align-items-center ms-4 mb-0" style="font-weight:bold; color:#0E46A3;">BETHEL BAPTIST HOSPITAL
            </h2>
        </header>
        <div class="row">
            <div class="col-8 bg-light">
                <p class="head_text text-primary fs-1 fw-bold mt-5 m-4">Efficiency with Compassion: Where Every Minute
                    Counts and Every Patient Matters</p>
                <p class="m-4 text-justify fs-5">Bethel Baptist Hospital, nestled in the heart of Malaybalay City,
                    Philippines, stands as a beacon of compassionate healthcare delivery since its inception. Founded on the principles of service, excellence, and community, Bethel Baptist Hospital has been dedicated to providing comprehensive medical care to individuals and families for decades.<br><br> At Bethel Baptist Hospital, our mission is not merely to treat ailments but to nurture health and well-being in every individual we serve. With a steadfast commitment to holistic care, we strive to address the diverse healthcare needs of our community, offering a range of medical services and treatments tailored to each patient's unique requirements.
                </p>
                <div class="col  pb-5 pt-4">
                    <div class="row  ">
                        <div class="col-3 offset-1">
                            <button onclick="login()" class="btn btn-primary m-1 fs-6 fw-bold p-2" id="loginBTN" style=" height:100%;width:90%;">LOGIN</button>
                        </div>
                        <div class="col-3 ">
                            <button onclick="signup()" class="btn btn-primary m-1 fs-6 fw-bold p-2" id="signupBTN" style=" height:100%;width:90%;">SIGN
                                UP</button>
                        </div>
                    </div>
                </div>


            </div>
            <div class="col-4 bg-light">
                <img src="images\doctor1.png" alt="" draggable="false" style="height:90%; width:90%; ">
            </div>
        </div>


        <div class="row bg-light d=flex justify-content-center align-items-center gap-4 mt-5 mb-5">
            <div class="col-2 bg-light me-3 ">
                <img src="images/mission.png" alt="logo" style="width:100%;">
            </div>
            <div class="col-7 pt-4 ">
                <h4 class="text-primary">OUR MISSION</h4>
                <p class="fs-6 text-justify"> The mission of Bethel Baptist Hospital is to provide compassionate and
                    high-quality
                    healthcare
                    services to individuals and communities, prioritizing holistic well-being and fostering a culture of
                    excellence
                    in patient care. Through a commitment to innovation, collaboration, and continuous improvement, we
                    strive to address healthcare disparities, promote health education, and empower individuals to lead
                    healthier lives. Our mission extends beyond the walls of our facility, reaching out to marginalized
                    populations and underserved communities to ensure equitable access to healthcare services and
                    promote
                    overall wellness.</p>
            </div>
        </div>
        <div class="row bg-light d=flex justify-content-center  align-items-center gap-4 mt-5 mb-5">

            <div class="col-7 bg-light me-3">
                <h4 class="text-primary">OUR SERVICES</h4>
                <p class="fs-6 text-justify">At Bethel Baptist Hospital, we offer a wide range of medical services to
                    address the diverse needs of
                    our patients. Our services include:Primary care and family medicine specialty care in areas such as
                    cardiology, oncology, orthopedics, and more emergency and urgent care Diagnostic imaging and
                    laboratory
                    services Surgical services, including minimally invasive procedures rehabilitation and physical
                    therapy
                    women's health services pediatrics and pediatric specialty care mental health and behavioral health
                    services wellness and preventive care programs </p>
            </div>
            <div class="col-2 bg-light">
                <img src="images/services.png" alt="logo" style="height:100%;width:100%;">
            </div>
        </div>
        <div class="row" style="background-color:#0E46A3;">
            <div class="row-6">
                <div class="col m-5 text-light ">
                    <h6 class="fw-bold">CONTACT US</h6>
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

    </div>
    <script>
        //loginBTN = document.getElementById("loginBTN");
        // signupBTN = document.getElementById("signupBTN");

        function login() {
            window.location = "users/login-page.php";
        }

        function signup() {
            window.location = "users/signup-page.php";
        }
    </script>
</body>

</html>