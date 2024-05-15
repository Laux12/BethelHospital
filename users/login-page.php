<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/all.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

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
                title: "<?php echo $_SESSION['error'] ?>",
                text: "",
                icon: "warning",
            });
        </script>
    <?php
        unset($_SESSION['error']);
    }
    ?>

    <div class="container-fluid bg-dark" style="height:100vh; width:100%;  background-image:url('../images/background.png'); background-size:cover;">
        <div class="row">
            <div class="col-7 bg vh-100" style="border-top-right-radius: 40px;border-bottom-right-radius: 40px; background: linear-gradient(to bottom, #0E46A3, #171764);">
                <div class="row-2 " style="height:15%;"></div>
                <div class="row-3 m-5">
                    <div class="col"></div>
                    <a href="../index.php" class="btn btn-primary mb-2 text-center d-flex justify-content-center align-items-center" style="width: 100px;">
                        <span class="material-icons">
                            arrow_back
                        </span>
                    </a>
                    <div class="col text-justify text-light">
                        <h3>Welcome <i class="fa-light fa-party-horn text-warning"></i></h3>
                        <br>
                        <p class="fs-5">We're thrilled to have you here. Your journey with us begins now. Whether you're
                            returning or
                            it's your first time, we're excited to see you.

                            Our platform is your gateway to a world of possibilities. From managing your account to
                            accessing exclusive features, you're in control every step of the way.

                            Login now to unlock the full potential of our platform. Your experience awaits!</p>
                    </div>
                </div>

                <div class="row-2 text-light m-5">
                    <p>Don't have an Account?</p>
                    <a href="signup-page.php" class="btn bg-primary text-light fw-bold" style="width: 22%;">SIGNUP</a>
                </div>
            </div>
            <div class="col-5 d-flex justify-content-center align-items-center">
                <div class="card bg-light d-flex justify-content-center align-items-center" style="width: 70%;height:auto;">
                    <form action="../configs/loginConfig.php" method="post" class="card-body d-flex flex-column justify-content-center align-items-center">
                        <img src="../images/bethelLogo.png " alt="logo" style="height: 20%;width:20%;">
                        <h5 class="mt-3 fw-bold">LOGIN</h5>

                        <div class="input-group mb-3 mt-4">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-circle-user"></i></span>
                            <input type="text" class="form-control" placeholder="Username" name="username" required>
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                            <input type="password" class="form-control" placeholder="Password" name="password" required>
                        </div>
                        <div class="form-check d-flex justify-content-start align-items-start ">
                        </div>
                        <button class="btn bg-primary w-100 text-light mt-1 mb-3" type="submit" name="login" value="login">LOGIN</button>
                        <p><a href="forgotPassword.php" style="text-decoration:none;">Forgot Password?</a></p>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <script>
        showpass = document.getElementById('showPassword');
        password = document.getElementById('password');

        function box() {
            if (showpass.checked) {
                password.type = "text";
            } else {
                password.type = "password";
            }
        }
    </script>
</body>

</html>