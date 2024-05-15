<?php
require_once("../configs/database.php");
session_start();
$query = "SELECT * FROM userfeedbacks fb, accounts act WHERE fb.accountID = act.accountID";
$result = mysqli_query($con, $query);
$firstName = $_SESSION['firstName'];
$lastName = $_SESSION['lastName'];
$profileImg = $_SESSION['profileIMG'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Feeback Dashboard</title>
	<link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/all.css">
	<link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-solid.css">
	<link rel="stylesheet" href="../styles/AppointmentStyle.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
	<link rel="stylesheet" href="../styles/chartStyle.css">
	<link rel="stylesheet" href="../styles/feedbackStyle.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
	<div class="main-container">
		<div class="main-sidebar">
			<div class="sidebar-header">
				<p>BETHEL BH.</p>
			</div>
			<div class="navigations">
				<a class="nav-items" href="dashboard.php">
					<i class="fa-solid fa-chart-simple"></i>
					<p>Dashboard</p>
				</a>
				<a class="nav-items" href="Appointments.php">
					<i class="fa-regular fa-calendar-check"></i>
					<p>Appointments</p>
				</a>
				<a class="nav-items" href="UserAccounts.php">
					<i class="fa-regular fa-file-invoice"></i>
					<p>Accounts</p>

				</a>
				<a class="nav-items actives" href="feedback.php">
					<i class="fa-solid fa-message-smile"></i>
					<p>Feedbacks</p>
				</a>
				<a class="nav-items" href="../configs/logout.php">
					<i class="fa-solid fa-left-from-bracket"></i>
					<p>Logout</p>
				</a>
			</div>
		</div>
		<div class="main-section">
			<div class="upper-section">
				<div class="search-container">
					<input type="text" placeholder="Search feedback" id="searchFeedback">
					<i class="fa-regular fa-magnifying-glass"></i>
				</div>
				<div class="profile-container">
					<?php
					echo "<img src='../images/$profileImg' alt='profile'>";
					?>
				</div>
			</div>
			<div class="feedback-container" id="feedback-container">
				<?php
				while ($row = mysqli_fetch_assoc($result)) {
				?>
					<div class=" feedback-card">
						<div class="header">
							<div class="image-container">
								<?php
								$pfp = $row["profileImg"];

								echo "<img src='../images/$pfp' alt='profile' width='60px'>" ?>
							</div>
							<div class="name-rating-container">
								<p><?php echo $row['firstName'] . " " . $row['lastName']  ?></p>
								<div class="rating-container">
									<p><?php echo $row["rating"] ?></p>
									<i class="fa-solid fa-star"></i>
								</div>

							</div>

						</div>
						<div class="feedback">
							<p><?php echo $row["comments"] ?></p>
						</div>
					</div>
				<?php
				}
				?>



			</div>
		</div>
	</div>
	<script>
		$(document).ready(function() {
			$("#searchFeedback").on("keyup", function() {
				var getFeedback = $(this).val();
				$.ajax({
					method: 'POST',
					url: '../configs/searchFeedback.php',
					data: {
						name: getFeedback
					},
					success: function(response) {
						$("#feedback-container").html(response);
					}
				});
			});
		});
	</script>


</body>

</html>