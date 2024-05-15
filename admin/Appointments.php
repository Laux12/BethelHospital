<?php
require_once("../configs/database.php");
$query = "SELECT * FROM userappointments ORDER BY aStatus ASC";
session_start();
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
	<title>Appointments</title>
	<link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/all.css">
	<link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-solid.css">
	<link rel="stylesheet" href="../styles/AppointmentStyle.css">
	<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
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
				<a class="nav-items" href="dashboard.php">
					<i class="fa-solid fa-chart-simple"></i>
					<p>Dashboard</p>
				</a>
				<a class="nav-items actives">
					<i class="fa-regular fa-calendar-check"></i>
					<p>Appointments</p>
				</a>
				<a class="nav-items" href="UserAccounts.php">
					<i class="fa-regular fa-file-invoice"></i>
					<p>Accounts</p>

				</a>
				<a class="nav-items" href="feedback.php">
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
				</div>
			</div>
			<div class="third-section">
				<div class="table-container">
					<div class="table-head">
						<p>Appointments</p>
					</div>
					<table>
						<col style="width: 10%;">
						<col style="width: 12%;">
						<col style="width: 12%;">
						<col style="width: 12%;">
						<col style="width: 12%;">
						<col style="width: 12%;">
						<col style="width: 12%;">
						<col style="width: 12%;">
						<col style="width: 12%;">
						<col style="width: 12%;">
						<col>
						<thead>
							<tr>
								<td>ID</td>
								<td>Name</td>
								<td>Age</td>
								<td>Gender</td>
								<td>Relation</td>
								<td>Type</td>
								<td>Number</td>
								<td>Date</td>
								<td>Time</td>
								<td>Address</td>
								<td>Status</td>
							</tr>
						</thead>
						<tbody id="displayData">
							<tr>
								<?php
								while ($row = mysqli_fetch_assoc($result)) {
								?>
									<td> <?php echo $row['apmtID'] ?></td>
									<td> <?php echo $row['patientName'] ?></td>
									<td> <?php echo $row['age'] ?></td>
									<td> <?php echo $row['patientGender'] ?></td>
									<td> <?php echo $row['relation'] ?></td>
									<td> <?php echo $row['typeOfAppointment'] ?></td>
									<td> <?php echo $row['phoneNumber'] ?></td>
									<td> <?php echo $row['aDate'] ?></td>
									<td> <?php echo $row['aTime'] ?></td>
									<td> <?php echo $row['address'] ?></td>
									<td> <?php $status = $row['aStatus'];
											if ($status) {
												echo "<i class=' fa-solid fa-circle-check'></i>";
											} else {

												echo "<button type='button'style='border:none;'class='updateButton'  onclick='update(" . $row["apmtID"] . ")'><i class='fa-solid fa-circle-ellipsis' ></i></button>
										
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
			</div>
		</div>
	</div>
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
						});;
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