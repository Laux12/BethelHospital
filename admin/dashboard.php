<?php
require_once("../configs/database.php");
session_start();
$query = "SELECT * FROM userappointments";
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
	<title>Dashboard</title>
	<link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/all.css">
	<link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-solid.css">
	<link rel="stylesheet" href="../styles/dashboardStyle.css">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
	<link rel="stylesheet" href="../styles/chartStyle.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
	<div class="main-container">
		<div class="main-sidebar">
			<div class="sidebar-header">
				<p>BETHEL BH.</p>
			</div>
			<div class="navigations">
				<a class="nav-items actives">
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
					<input type="text" placeholder="Search appointment" id="getAppointment">
					<i class="fa-regular fa-magnifying-glass"></i>
				</div>
				<div class="profile-container">
					<?php
					echo "<img src='../images/$profileImg' alt='profile'>";
					?>
					</label>
				</div>
			</div>
			<div class="second-section">
				<div class="greeting-card">
					<div class="img-container">
						<img src="../images/doctor.png" alt="doctor" width="120px ">
					</div>
					<div class="greetings">
						<p>Hello there , <?php echo "<span>sir $firstName</span>" ?></p>
						<p>Whatever you do, do with determination. You have only one life to live, do your work with passsion and give your best.</p>
					</div>

				</div>
				<div class="total-appointments">

					<p>Total Appointment</p>
					<?php
					$query = "SELECT * FROM userappointments ORDER BY apmtID ";
					$result = mysqli_query($con, $query);
					$total = $result->num_rows;
					echo "<p>$total</p>";
					?>

					<img src="../images/line.png" alt="line" width="260px">
				</div>
				<div class="current-appointment">
					<p>Pending Appointments Today</p>
					<?php

					$dateToday = date('dmy');
					$totalToday = 0;

					while ($row = mysqli_fetch_assoc($result)) {
						$date = strtotime($row["aDate"]);
						$status = $row['aStatus'];
						$date = date('dmy', $date);
						if ($dateToday == $date && $status == 0) {
							$totalToday = $totalToday + 1;
						}
					}
					echo "<p>$totalToday</p>";
					?>
					<img src="../images/line2.png" alt="line2" width="260px">
				</div>
			</div>
			<div class="third-section">
				<div class="table-container">
					<div class="table-head">
						<p>Appointments</p>
						<a href="Appointments.php">See more</a>
					</div>
					<table>
						<col style="width: 20%;">
						<col style="width: 34%;">
						<col style="width: 29%;">
						<col style="width: 29%;">
						<col>
						<thead>
							<tr>
								<td>Appoint ID</td>
								<td>Patient Name</td>
								<td>Date</td>
								<td>Time</td>
								<td>Status</td>
							</tr>
						</thead>
						<tbody id="displayData">
							<tr>
								<?php
								$query = "SELECT * FROM userappointments ORDER BY aStatus ASC LIMIT 0,10 ";
								$result = mysqli_query($con, $query);
								while ($row = mysqli_fetch_assoc($result)) {
								?>
									<td> <?php echo $row['apmtID'] ?></td>
									<td> <?php echo $row['patientName'] ?></td>
									<td> <?php echo $row['aDate'] ?></td>
									<td> <?php echo $row['aTime'] ?></td>
									<td> <?php $status = $row['aStatus'];
											if ($status) {
												echo "<i class=' fa-solid fa-circle-check'></i>";
											} else {

												echo "<button type='button' style='border:none; ' class='updateButton' onclick='update(" . $row["apmtID"] . ")'><i class='fa-solid fa-circle-ellipsis''></i></button>
										
												";
											}
											?></td>
							</tr>
						<?php
								}
						?>
						</tbody>
					</table>
				</div>

				<div class="chart-container">
					<div class="widget">
						<canvas id="appointment"></canvas>
					</div>
				</div>
			</div>
		</div>
		<div id="liveAlertPlaceholder"></div>
	</div>
	<?php
	require_once("../configs/database.php");
	$query = "SELECT * FROM totalappointments";
	$result = mysqli_query($con, $query);
	while ($row = mysqli_fetch_assoc($result)) {

		$dataArray[] = $row['total'];
	}
	?>

	<script>
		var apmtID = null;

		function update(id) {
			swal({
					title: "Are you sure?",
					text: "You want to finish this appointment?",
					icon: "warning",
					buttons: true,
					dangerMode: true,
				})
				.then((willDelete) => {
					if (willDelete) {
						swal("Appointment Updated", {
							icon: "success",

						});
						apmtID = id;
						updateAppointment();
					} else {

					}
				});

		}

		function updateAppointment() {
			let currentID = apmtID;
			$.ajax({
				url: '../configs/updateAppointment.php',
				method: 'POST',
				data: {
					currentID: currentID,
				},
				success: function(response) {
					swal("Success", "Appointment has been Updated!", "success")
						.then((value) => {
							if ($(value)) {
								location.reload();
							} else {
								location.reload();
							}
						});
				},
				error: function(xhr, status, error) {
					swal("Error", "Something went wrong!", "error")
						.then((value) => {
							if ($(value)) {
								location.reload();
							} else {
								location.reload();
							}
						});
				}
			});
		}


		const dataArrayJs = <?php echo json_encode($dataArray) ?>;
		const ctx = document.getElementById("appointment");

		Chart.defaults.color = "#333";
		Chart.defaults.font.family = "Poppins";

		new Chart(ctx, {
			type: "bar",
			data: {
				labels: [
					"Jan",
					"Feb",
					"Mar",
					"Apr",
					"May",
					"Jun",
					"Jul",
					"Aug",
					"Sep",
					"Oct",
					"Nov",
					"Dec",
				],
				datasets: [{
					label: "Appointment: ",
					data: dataArrayJs,
					backgroundColor: "#0e46a3",
					borderRadius: 6,
					borderSkipped: false,
				}, ],
			},
			// continuation

			options: {
				responsive: true,
				maintainAspectRatio: false,
				plugins: {
					legend: {
						display: false,
					},
					title: {
						display: true,
						text: "Total Appointments in year 2024",
						padding: {
							bottom: 16,
						},
						font: {
							size: 16,
							weight: "normal",
						},
					},
					tooltip: {
						backgroundColor: "black",

					},
				},
				scales: {
					x: {
						border: {
							dash: [2, 4],
						},
						grid: {
							color: "white",
						},
						title: {
							text: "2024",
						},
					},
					y: {
						grid: {
							color: "black",
						},
						border: {
							dash: [2, 4],
						},
						beginAtZero: true,
						title: {
							display: true,
							text: "Appointments",
						},
					},
				},
			},
		});
	</script>
	<script>
		$(document).ready(function() {
			$("#getAppointment").on("keyup", function() {
				var getAppointment = $(this).val();

				$.ajax({
					method: 'POST',
					url: '../configs/searchAjax.php',
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