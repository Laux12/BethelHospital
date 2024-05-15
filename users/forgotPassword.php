<?php
require_once("../configs/database.php");
session_start();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
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
                title: "Error",
                text: "<?php echo $_SESSION['error'] ?>",
                icon: "error",
            });
        </script>
    <?php
        unset($_SESSION['error']);
    }
    ?>

    <div class="container-fluid bg-light w-100 vh-100 " style="background-image:url('../images/background.png'); background-size:cover;">
        <div class="row">
            <div class="col-5  d-flex justify-content-center align-items-center">
                <div class="card bg-light d-flex justify-content-center align-items-center" style="width: 70%;height:auto;">

                    <form action="../configs/recoverAccount.php" method="post" style="width: 100%;" class="card-body d-flex flex-column justify-content-center align-items-center">

                        <img src="../images/bethelLogo.png " alt="logo" style="height: 20%;width:20%;">
                        <h4 class="fw-bold mt-3 mb-4">Forgot Password</h4>
                        <div class="input-group mb-2">
                            <span class="input-group-text"><span class="material-icons">
                                    account_circle
                                </span></span>
                            <input type="text" class="form-control" placeholder="Username" name="username" required>
                        </div>

                        <div class="input-group mb-2">
                            <span class="input-group-text">
                                <span class="material-icons">lock</span>
                            </span>
                            <input type="password" class="form-control" placeholder="New Password" name="newPassword" required>
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text">
                                <span class="material-icons">lock_clock</span>
                            </span>
                            <input type="password" class="form-control" placeholder="Confirm new password" name="confirmNewPassword" required>
                        </div>
                        <input type="submit" class="btn btn-primary m-2 mt-5" name="singup" value="Confirm" style="width:97%;">

                    </form>

                </div>
            </div>

            <div class="col-7 bg-primary vh-100 d-flex align-items-center justify-content-center" style="border-top-left-radius: 40px;border-bottom-left-radius: 40px;background: linear-gradient(to bottom, #0E46A3, #171764);">

                <div class="row-3">


                    <div class="col text-justify text-light mb-5">
                        <h3 class="fw-bold">Recover account Form</h3><br>
                        <p>


                            Get started managing your appointments with ease.<br> New patient or existing one, we're
                            happy to have you!<br><br>

                            Our hospital appointment system is your gateway to convenient healthcare scheduling.
                            <br>
                            Sign up today and experience a more streamlined way to manage your health!
                        </p>
                    </div>

                    <a href="login-page.php"><button class="btn btn-primary  mb-3 text-light fw-medium" style="width:30%;">
                            Back
                        </button></a>
                </div>
            </div>


</body>

</html>