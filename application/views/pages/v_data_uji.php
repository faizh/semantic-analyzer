<main class="content">
	<div class="container-fluid p-0">

		<h1 class="h3 mb-3">Data Latih</h1>

		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<div class="row">
							<form action="<?= base_url() ?>index.php/data/create_data_uji" method="post">
	                            <div class="row">
	                                <div class="col-3">
	                                    <select class="form-select form-control" aria-label=".form-select-sm example" name="presentase_data_uji">
	                                        <option selected="" disabled>Presentase Data Uji</option>
	                                        <option value="10">10%</option>
	                                        <option value="20">20%</option>
	                                        <option value="30">30%</option>
	                                        <option value="40">40%</option>
	                                    </select> 
	                                </col>
	                            </div>

	                            <div class="row mt-2">
	                                <div class="col-6">
	                                    <button type="submit" class="btn btn-primary">Get Data Uji</button>
	                                </div>
	                            </div>
	                            </br>
	                        </form></br>
						</div>

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
											if (count($data_uji) == 0) { ?>
												<tr>
													<td style="text-align: center;" colspan="2">No Data</td>
												</tr>
											<?php }else{
												foreach ($data_uji as $tweet) { ?>
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