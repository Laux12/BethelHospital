
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