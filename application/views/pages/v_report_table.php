<main class="content">
	<div class="container-fluid p-0">

		<h1 class="h3 mb-3">Data Uji + Naive Bayes</h1>

		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<div class="row">
							<div class="col-12 col-lg-12 col-xxl-9 d-flex">
								<div class="flex-fill" style="padding: 10px;">
									<table class="table" id="example">
										<thead>
											<tr>
												<th style="text-align: center;" class="d-none d-xl-table-cell" width="80%">Tweet</th>
												<th style="text-align: center;" class="d-none d-xl-table-cell" width="20%">Sentiment</th>
												<th style="text-align: center;" class="d-none d-xl-table-cell" width="20%">Naive Bayes</th>
											</tr>
										</thead>
										<tbody>
											<?php 
											if (count($data_uji) == 0) { ?>
												<tr>
													<td style="text-align: center;" colspan="2">No Data</td>
												</tr>
											<?php }else{
												foreach ($data_uji as $tweet) {
													if ($tweet->sentiment != $tweet->naive_bayes_analysis) {
														$class = "warning";
													}else{
														$class = "success";
													}
												 ?>
													<tr>
														<td><?= $tweet->clean_tweet ?></td>
														<td><?= $tweet->sentiment ?></td>
														<td><button class="btn btn-<?= $class ?>"><?= $tweet->naive_bayes_analysis ?></button></td>
													</tr>
												<?php }
											} ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<div class="card-body">
					</div>
				</div>
			</div>
		</div>

	</div>
</main>