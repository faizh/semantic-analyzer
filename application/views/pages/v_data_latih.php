<main class="content">
	<div class="container-fluid p-0">

		<h1 class="h3 mb-3">Data Latih</h1>

		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
							<form method="post" action="<?= base_url() ?>index.php/data/import_data_tweet">
								<div class="row">
									<div class="card-body col-2">
										<label>Start Date</label>
										<input type="date" name="start_date" class="form-control" placeholder="Input" required>
									</div>
									<div class="card-body col-2">
										<label>End Date</label>
										<input type="date" name="end_date" class="form-control" placeholder="Input" required>
									</div>
								</div>
								<div class="row">
									<div class="col-3">
										<button type="submit" class="form-control btn btn-primary">Import Data Twitter</button>
									</div>
								</div>
							</br>
							</form>
						<div class="row">
							<div class="col-12 col-lg-12 col-xxl-9 d-flex">
								<div class="flex-fill" style="padding: 10px;">
									<table class="table" id="example">
										<thead>
											<tr>
												<th style="text-align: center;" class="d-none d-xl-table-cell" width="80%">Tweet</th>
												<th style="text-align: center;" class="d-none d-xl-table-cell" width="20%">Sentiment</th>
											</tr>
										</thead>
										<tbody>
											<?php 
											if (count($data_tweets) == 0) { ?>
												<tr>
													<td style="text-align: center;" colspan="2">No Data</td>
												</tr>
											<?php }else{
												foreach ($data_tweets as $tweet) { ?>
													<tr>
														<td><?= $tweet->clean_tweet ?></td>
														<td><?= $tweet->sentiment ?></td>
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