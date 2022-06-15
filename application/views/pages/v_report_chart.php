<main class="content">
	<div class="container-fluid p-0">
		<div class="row">			
			<div class="col-12 col-lg-12">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title">Pie Chart</h5>
						<h6 class="card-subtitle text-muted">Pie charts are excellent at showing the relational proportions between data.</h6>
					</div>
					<div class="card-body">
						<div class="chart chart-sm">
							<canvas id="chartjs-pie"></canvas>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</main>


	<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Pie chart
			new Chart(document.getElementById("chartjs-pie"), {
				type: "pie",
				data: {
					labels: ["positive", "neutral", "negative"],
					datasets: [{
						data: [
							<?= count($data_tweets['positive_tweets'] )?>,
							<?= count($data_tweets['neutral_tweets'] )?>,
							<?= count($data_tweets['negative_tweets']) ?>
						],
						backgroundColor: [
							window.theme.primary,
							window.theme.grey,
							window.theme.danger
						],
						borderColor: "transparent"
					}]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: false
					}
				}
			});
		});
	</script>