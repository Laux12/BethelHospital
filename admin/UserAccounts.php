<?php

require_once("../configs/database.php");
session_start();
$query = "SELECT * FROM accounts ORDER BY accountID ASC";
$result = mysqli_query($con, $query);
$profileImg = $_SESSION['profileIMG'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Accounts</title>
	<link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/all.css">
	<link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-solid.css">
	<link rel="stylesheet" href="../styles/AppointmentStyle.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
	<link rel="stylesheet" href="../styles/chartStyle.css">
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
				<a class="nav-items actives">
					<i class="fa-regular fa-file-invoice"></i>
					<p>Accounts</p>
				</a>
				<a class="nav-items " href="feedback.php">
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
					<input type="text" placeholder="Search account" id="getAccount">
					<i class="fa-regular fa-magnifying-glass"></i>
				</div>
				<div class="profile-container">
					<?php
					echo "<img src='../images/$profileImg' alt='profile'>";
					?>
				</div>
			</div>
			<div class="third-section">
				<div class="table-container">
					<div class="table-head">
						<p>Accounts</p>
					</div>
					<table>
						<col style="width: 10%;">
						<col style="width: 30%;">
						<col style="width: 20%;">
						<col style="width: 17%;">
						<col style="width: 17%;">
						<col style="width: 17%;">

						<col>
						<thead>
							<tr>
								<td>ID</td>
								<td>Name</td>
								<td>Username</td>
								<td>Password</td>
								<td>Phone #.</td>
								<td>Access</td>

							</tr>
						</thead>
						<tbody id="displayData">
							<tr>
								<?php
								while ($row = mysqli_fetch_assoc($result)) {
								?>
									<td> <?php echo $row['accountID'] ?></td>
									<td> <?php $profileImg = $row['profileImg'];
											echo  "<div class='user-profile'>" ?>

										<?php echo " <img src='../images/$profileImg' alt='user-profile'>" .   $row['firstName'] . " " . $row['lastName']
										?>
										<?php
										echo "</div>";
										?>


									</td>
									<td> <?php echo $row['userName'] ?></td>
									<td> <?php echo mb_strimwidth($row['pWord'], 0, 15, "...") ?></td>

									<td> <?php echo $row['phoneNumber'] ?></td>
									<td> <?php echo $row['role'] ?></td>

							</tr>
						<?php
								}
						?>

						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<script>
		$(document).ready(function() {
			$("#getAccount").on("keyup", function() {
				var getAppointment = $(this).val();
				$.ajax({
					method: 'POST',
					url: '../configs/searchAccount.php',
					data: {
						name: getAppointment
					},
					success: function(response) {
						$("#displayData").html(response);
					}
				});
			});
		});
	</script>
</body>

</html>