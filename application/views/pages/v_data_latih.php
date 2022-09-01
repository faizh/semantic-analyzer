<main class="content">
	<div class="container-fluid p-0">

		<h1 class="h3 mb-3">Data Latih</h1>

		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
							<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <form method="post" action="<?= base_url() ?>index.php/data/import_data_tweet" enctype="multipart/form-data">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Import Data Latih</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <div class="row">
                                            <div class="col-6">
                                                Upload file CSV
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <input type="file" name="file_csv" accept=".csv" required>
                                            </div>
                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Import Data</button>
                                      </div>
                                  </form>
                                </div>
                              </div>
                            </div>

                            <div class="modal fade" id="getTweet" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <form method="post" action="<?= base_url() ?>index.php/data/get_tweets" enctype="multipart/form-data">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Get Tweets</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <div class="row">
                                            <div class="col-6">
                                                Tanggal Awal Tweet
                                            </div>
                                            <div class="col-6">
                                                <input class="form-control" type="date" name="start_date" required>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-6">
                                                Tanggal Akhir Tweet
                                            </div>
                                            <div class="col-6">
                                                <input class="form-control" type="date" name="end_date" required>
                                            </div>
                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Get Tweets</button>
                                      </div>
                                  </form>
                                </div>
                              </div>
                            </div>

                            <button type="button" class="btn btn-primary m-2" data-toggle="modal" data-target="#exampleModalCenter">
                              Import Data Latih
                            </button>

                            <button type="button" class="btn btn-primary m-2" data-toggle="modal" data-target="#getTweet">
                              Get Tweets
                            </button>

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