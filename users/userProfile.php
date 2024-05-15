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
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/all.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-solid.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/regular.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css" />
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="../styles/userInterfaceStyle.css">
    <link rel="stylesheet" href="../styles/userProfileStyle.css">

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
    <div class="main-cotnainer">
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
                <p>Profile</p>

            </div>
        </div>
        <div class="main">
            <div class="profile-box">
                <div class="profile-details">
                    <form action="../configs/upload.php" method="post" enctype="multipart/form-data" class="profile-image-container">
                        <div class="background">
                            <div class="img-contain">
                                <?php echo "<img src='../images/$profileImg' alt='profile' width='100px'> " ?>
                                <label for="upload-img">
                                    <i class="fa-regular fa-camera"></i>
                                </label>
                            </div>
                        </div>
                        <?php echo "<p> $firstName $lastName </p>" ?>
                        <input type="file" id="upload-img" name="file" style="display: none;">
                        <button type="submit" value="upload" name="upload">Submit profile</button>
                    </form>
                    <div class="profile-information">
                        <p>Account ID:</p>
                        <?php echo "<p> $accountID</p>" ?>
                        <p>Username:</p>
                        <?php echo "<p> $userName</p>" ?>
                        <p>Phone number:</p>
                        <?php echo "<p> $phoneNumber</p>" ?>
                    </div>
                </div>
                <div class="buttons">
                    <a href="changePassword.php">Change password</a>
                    <a href="../configs/logout.php">Logout</a>
                </div>
            </div>
            <div class="table-container">
                <p>Appointment History</p>
                <table id="myTable" class="table table-striped" style="width:100%; height:100%">

                    <thead>

                        <tr>
                            <td>Appoint ID</td>
                            <td>Patient Name</td>
                            <td>Date</td>
                            <td>Time</td>
                            <td>Status</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tr>
                        <?php
                        $query = "SELECT * FROM userappointments WHERE accountID = $accountID ORDER BY aStatus ASC  LIMIT 0,4 ";
                        $result = mysqli_query($con, $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                            $aDate = strtotime($row["aDate"]);

                        ?>

                            <td> <?php echo $row['apmtID'] ?></td>
                            <td> <?php echo $row['patientName'] ?></td>
                            <td> <?php echo $row['aDate'] ?></td>
                            <td> <?php echo $row['aTime'] ?></td>
                            <td> <?php $status = $row['aStatus'];
                                    if ($status) {
                                        echo "Done";
                                    } else {

                                        echo "Pending";
                                    }
                                    ?></td>
                            <td> <?php echo "<button class='deleteButton' id='delete' onclick='update(" . $row["apmtID"] . "," . $aDate . ")'><i class='fa-solid fa-trash-can'></i></button>" ?></td>


                    </tr>
                <?php
                        }
                ?>

                </table>
            </div>
        </div>

    </div>

    <script>
        new DataTable('#myTable', {
            info: false,
            ordering: false,
            paging: false,
            columnDefs: [{
                "targets": "_all",
                "defaultContent": "-"
            }]
        });
    </script>
    <script>
        var apmtID = null;
        var aDate = null;

        function update(id, date) {
            swal({
                    title: "Are you sure?",
                    text: "You want to delete this appointment?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        apmtID = id;
                        aDate = date;
                        updateAppointment();
                    } else {

                    }
                });

        }

        function updateAppointment() {
            let currentID = apmtID;

            $.ajax({
                url: '../configs/deleteAppointment.php',
                method: 'POST',
                data: {
                    currentID: currentID,
                    aDate: aDate
                },
                success: function(response) {


                    location.reload();


                },
                error: function(xhr, status, error) {
                    swal("Error", "Something went wrong!", "error")
                        .then((value) => {
                            if ($(value)) {
                                location.reload();
                            } else {
                                location.reload();
                            }
                        });;
                }
            });
        }
    </script>
</body>

</html>