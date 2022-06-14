<main class="content">
	<div class="container-fluid p-0">

		<h1 class="h3 mb-3">Table Report</h1>

		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<div class="row">
							<div class="col-12 col-lg-12 col-xxl-9 d-flex">
								<div class="card flex-fill">
									<div class="card-header">
									</div>
									<table class="table" id="example">
										<thead>
											<tr>
												<th>Name</th>
												<th class="d-none d-xl-table-cell">Start Date</th>
												<th class="d-none d-xl-table-cell">End Date</th>
												<th>Status</th>
												<th class="d-none d-md-table-cell">Assignee</th>
											</tr>
										</thead>
										<tbody>
											<?php for ($i=0; $i < 100; $i++) { ?>
												<tr>
													<td>Project Apollo</td>
													<td class="d-none d-xl-table-cell"><?= $i ?></td>
													<td class="d-none d-xl-table-cell">31/06/2021</td>
													<td><span class="badge bg-success">Done</span></td>
													<td class="d-none d-md-table-cell">Vanessa Tucker</td>
												</tr>
											<?php } ?>
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