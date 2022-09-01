<main class="content">
	<div class="container-fluid p-0">

		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<div class="row">
							<div class="col-12 col-lg-12 col-xxl-9 d-flex">
								<div class="flex-fill" style="padding: 10px;">
									<table class="table">
										<thead>
											<tr>
												<th class="d-none d-xl-table-cell">Klasifikasi</th>
												<th class="d-none d-xl-table-cell">Positif</th>
												<th class="d-none d-xl-table-cell">Negatif</th>
												<th class="d-none d-xl-table-cell">Netral</th>
											</tr>
										</thead>
										<tbody>
											<tr>
	                                            <td>Manual</td>
	                                            <td><?= $data_tweets['data_count_test']->manual_positive ?></td>
	                                            <td><?= $data_tweets['data_count_test']->manual_negative ?></td>
	                                            <td><?= $data_tweets['data_count_test']->manual_neutral ?></td>
	                                        </tr>
											<tr>
												<td>Textblob</td>
												<td><?= $data_tweets['data_count_test']->tb_positive ?></td>
												<td><?= $data_tweets['data_count_test']->tb_negative ?></td>
												<td><?= $data_tweets['data_count_test']->tb_neutral ?></td>
											</tr>
											<tr>
												<td>Naivebayes</td>
												<td><?= $data_tweets['data_count_test']->nb_positive ?></td>
												<td><?= $data_tweets['data_count_test']->nb_negative ?></td>
												<td><?= $data_tweets['data_count_test']->nb_neutral ?></td>
											</tr>
										</tbody>
										<tfoot>
											<tr>
												<th colspan="4">Akurasi Naivebayes : <?=  $data_tweets['accuracy'] * 100 ?>%</th>
											</tr>
										</tfoot>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">			
			<div class="col-12 col-lg-6">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title">Visualisasi Pie Chart</h5>
						<h6 class="card-subtitle text-muted">Analisis Sentiment Naivebayes</h6>
					</div>
					<div class="card-body">
						<div class="chart chart-sm">
							<canvas id="chartjs-pie"></canvas>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12 col-lg-6">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title">Visualisasi Pie Chart</h5>
						<h6 class="card-subtitle text-muted">Akurasi Sentiment Naivebayes</h6>
					</div>
					<div class="card-body">
						<div class="chart chart-sm">
							<canvas id="chartjs-pie-acuracy"></canvas>
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
							<?= $data_tweets['data_count_test']->nb_positive ?>,
							<?= $data_tweets['data_count_test']->nb_neutral ?>,
							<?= $data_tweets['data_count_test']->nb_negative ?>
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

			// Pie chart
			new Chart(document.getElementById("chartjs-pie-acuracy"), {
				type: "pie",
				data: {
					labels: ["sesuai", "tidak sesuai"],
					datasets: [{
						data: [
							<?= $data_tweets['accuracy'] * 10 ?>,
							<?= (1 - $data_tweets['accuracy']) * 10 ?>,
						],
						backgroundColor: [
							window.theme.success,
							window.theme.warning
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