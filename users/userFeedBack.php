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
    <title>Feedback</title>

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../styles/userFeedbackStyle.css">
    <link rel="stylesheet" href="../styles/userInterfaceStyle.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>

    <!-- NAVBAR START -->
    <div class="main-container">
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
        <div class="main-sections">
            <div class="forms-container">
                <div class="title-section">
                    <p>Feedback Form</p>
                </div>
                <div>
                    <div>
                        <div class="icons-container">
                            <i class="fas fa-star star-light submit_star" id="submit_star_1" data-rating="1"></i>
                            <i class="fas fa-star star-light submit_star" id="submit_star_2" data-rating="2"></i>
                            <i class="fas fa-star star-light submit_star" id="submit_star_3" data-rating="3"></i>
                            <i class="fas fa-star star-light submit_star" id="submit_star_4" data-rating="4"></i>
                            <i class="fas fa-star star-light submit_star" id="submit_star_5" data-rating="5"></i>

                        </div>
                        <div class="comment-container">
                            <p>What can you say about our Service</p>
                            <textarea name="comment" placeholder="Describe your thoughts here..." id="comment" required></textarea>
                        </div>
                    </div>

                    <div class="button-container">
                        <button type="button" name="submit" id="submit">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- NAVBAR END -->
    <script>
        function back() {
            window.location = "userInterface.php";
        }
    </script>
    <script>
        var rating_data = 0;
        $(document).ready(function() {
            $(document).on('mouseenter', '.submit_star', function() {
                var rating = $(this).data('rating');
                resetColor();
                for (var count = 1; count <= rating; count++) {
                    $('#submit_star_' + count).addClass('text-warning');
                    $('#submit_star_' + count).removeClass('star-light');
                }
            });
        });

        function resetColor() {
            for (var count = rating_data + 1; count <= 5; count++) {
                $('#submit_star_' + count).addClass('star-light');
                $('#submit_star_' + count).removeClass('text-warning');
            }
        }
        $(document).on('mouseleave', '.submit_star', function() {
            resetColor();
        });
        $(document).on('click', '.submit_star', function() {
            rating_data = $(this).data('rating');
            for (var count = 1; count <= rating_data; count++) {
                $('#submit_star_' + count).addClass('text-warning');
            }
        });

        $('#submit').click(function() {
            var userComment = $('#comment').val();

            $.ajax({

                url: '../configs/submitFeedBack.php',
                method: 'POST',
                data: {
                    rating_data: rating_data,
                    userComment: userComment,
                },
                success: function(response) {
                    swal("Success", "Your feedback has been sumbitted!", "success")
                        .then((value) => {
                            if ($(value)) {
                                location.reload();
                            } else {
                                location.reload();
                            }
                        });;
                },
                error: function(xhr) {
                    swal("Error", "Something went wrong submitting your feedback!", "error")
                        .then((value) => {
                            if ($(value)) {
                                location.reload();
                            } else {
                                location.reload();
                            }
                        });;
                }

            });

        });
    </script>
</body>

</html>