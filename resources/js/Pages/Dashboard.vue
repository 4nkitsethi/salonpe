<template>
    <Head title="Dashboard" />

	<AuthenticatedLayout>
		<!-- Info alert -->
		<div class="alert alert-success alert-dismissible">
			<div class="alert-heading fw-semibold">Content sidebar</div>
			Content sidebar is used inside content area, has fixed width and supports all sidebar components. By default, content sidebar height fills all available vertical space. You can easily change this behaviour if you want content sidebar height to match inner content height. Simply add <code>.align-items-[breakpoint]-start</code> class to inner container.
			<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
		</div>
		<!-- /info alert -->
		
		<!-- Sales Chart -->
		<main-chart />	

		<!-- Dashboard content -->
		<div class="row">
			<div class="col-xl-8">

				<!-- Marketing campaigns -->
				<div class="card">
					<div class="card-header d-flex align-items-center">
						<h5 class="mb-0">Latest Orders</h5>
						<div class="d-inline-flex ms-auto">
							<span class="badge bg-success rounded-pill">28 active</span>
							<div class="dropdown d-inline-flex ms-3">
								<a href="#" class="text-body d-inline-flex align-items-center dropdown-toggle" data-bs-toggle="dropdown">
									<i class="ph-gear"></i>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<a href="#" class="dropdown-item">
										<i class="ph-arrows-clockwise me-2"></i>
										Update data
									</a>
									<a href="#" class="dropdown-item">
										<i class="ph-list-dashes me-2"></i>
										Detailed log
									</a>
									<a href="#" class="dropdown-item">
										<i class="ph-chart-line me-2"></i>
										Statistics
									</a>
									<div class="dropdown-divider"></div>
									<a href="#" class="dropdown-item">
										<i class="ph-eraser me-2"></i>
										Clear list
									</a>
								</div>
							</div>
						</div>
					</div>

					<div class="table-responsive">
						<table class="table text-nowrap">
							<thead>
								<tr>
									<th>Campaign</th>
									<th>Client</th>
									<th>Changes</th>
									<th>Budget</th>
									<th>Status</th>
									<th class="text-center" style="width: 20px;">
										<i class="ph-dots-three"></i>
									</th>
								</tr>
							</thead>
							<tbody>
								<tr class="table-light">
									<td colspan="5">Today</td>
									<td class="text-end">
										<span class="progress-meter" id="today-progress" data-progress="30"></span>
									</td>
								</tr>
								<tr>
									<td>
										<div class="d-flex align-items-center">
											<a href="#" class="d-block me-3">
												<img src="../assets/images/brands/facebook.svg" class="rounded-circle" width="36" height="36" alt="">
											</a>
											<div>
												<a href="#" class="text-body fw-semibold">Facebook</a>
												<div class="text-muted fs-sm">
													<span class="d-inline-block bg-primary rounded-pill p-1 me-1"></span>
													02:00 - 03:00
												</div>
											</div>
										</div>
									</td>
									<td><span class="text-muted">Mintlime</span></td>
									<td><span class="text-success"><i class="ph-trend-up me-2"></i> 2.43%</span></td>
									<td><h6 class="mb-0">$5,489</h6></td>
									<td><span class="badge bg-primary bg-opacity-10 text-primary">Active</span></td>
									<td class="text-center">
										<div class="dropdown">
											<a href="#" class="text-body" data-bs-toggle="dropdown">
												<i class="ph-list"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-end">
												<a href="#" class="dropdown-item">
													<i class="ph-chart-line me-2"></i>
													View statement
												</a>
												<a href="#" class="dropdown-item">
													<i class="ph-pencil me-2"></i>
													Edit campaign
												</a>
												<a href="#" class="dropdown-item">
													<i class="ph-lock-key me-2"></i>
													Disable campaign
												</a>
												<div class="dropdown-divider"></div>
												<a href="#" class="dropdown-item">
													<i class="ph-gear me-2"></i>
													Settings
												</a>
											</div>
										</div>
									</td>
								</tr>
								<tr>
									<td>
										<div class="d-flex align-items-center">
											<a href="#" class="d-block me-3">
												<img src="../assets/images/brands/youtube.svg" class="rounded-circle" width="36" height="36" alt="">
											</a>
											<div>
												<a href="#" class="text-body fw-semibold">Youtube videos</a>
												<div class="text-muted fs-sm">
													<span class="d-inline-block bg-danger rounded-pill p-1 me-1"></span>
													13:00 - 14:00
												</div>
											</div>
										</div>
									</td>
									<td><span class="text-muted">CDsoft</span></td>
									<td><span class="text-success"><i class="ph-trend-up me-2"></i> 3.12%</span></td>
									<td><h6 class="mb-0">$2,592</h6></td>
									<td><span class="badge bg-danger bg-opacity-10 text-danger">Closed</span></td>
									<td class="text-center">
										<div class="dropdown">
											<a href="#" class="text-body" data-bs-toggle="dropdown">
												<i class="ph-list"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-end">
												<a href="#" class="dropdown-item">
													<i class="ph-chart-line me-2"></i>
													View statement
												</a>
												<a href="#" class="dropdown-item">
													<i class="ph-pencil me-2"></i>
													Edit campaign
												</a>
												<a href="#" class="dropdown-item">
													<i class="ph-lock-key me-2"></i>
													Disable campaign
												</a>
												<div class="dropdown-divider"></div>
												<a href="#" class="dropdown-item">
													<i class="ph-gear me-2"></i>
													Settings
												</a>
											</div>
										</div>
									</td>
								</tr>
								<tr>
									<td>
										<div class="d-flex align-items-center">
											<a href="#" class="d-block me-3">
												<img src="../assets/images/brands/spotify.svg" class="rounded-circle" width="36" height="36" alt="">
											</a>
											<div>
												<a href="#" class="text-body fw-semibold">Spotify ads</a>
												<div class="text-muted fs-sm">
													<span class="d-inline-block bg-secondary rounded-pill p-1 me-1"></span>
													10:00 - 11:00
												</div>
											</div>
										</div>
									</td>
									<td><span class="text-muted">Diligence</span></td>
									<td><span class="text-danger"><i class="ph-trend-down me-2"></i> 8.02%</span></td>
									<td><h6 class="mb-0">$1,268</h6></td>
									<td><span class="badge bg-secondary bg-opacity-10 text-secondary">On hold</span></td>
									<td class="text-center">
										<div class="dropdown">
											<a href="#" class="text-body" data-bs-toggle="dropdown">
												<i class="ph-list"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-end">
												<a href="#" class="dropdown-item">
													<i class="ph-chart-line me-2"></i>
													View statement
												</a>
												<a href="#" class="dropdown-item">
													<i class="ph-pencil me-2"></i>
													Edit campaign
												</a>
												<a href="#" class="dropdown-item">
													<i class="ph-lock-key me-2"></i>
													Disable campaign
												</a>
												<div class="dropdown-divider"></div>
												<a href="#" class="dropdown-item">
													<i class="ph-gear me-2"></i>
													Settings
												</a>
											</div>
										</div>
									</td>
								</tr>
								<tr>
									<td>
										<div class="d-flex align-items-center">
											<a href="#" class="d-block me-3">
												<img src="../assets/images/brands/twitter.svg" class="rounded-circle" width="36" height="36" alt="">
											</a>
											<div>
												<a href="#" class="text-body fw-semibold">Twitter ads</a>
												<div class="text-muted fs-sm">
													<span class="d-inline-block bg-secondary rounded-pill p-1 me-1"></span>
													04:00 - 05:00
												</div>
											</div>
										</div>
									</td>
									<td><span class="text-muted">Deluxe</span></td>
									<td><span class="text-success"><i class="ph-trend-up me-2"></i> 2.78%</span></td>
									<td><h6 class="mb-0">$7,467</h6></td>
									<td><span class="badge bg-secondary bg-opacity-10 text-secondary">On hold</span></td>
									<td class="text-center">
										<div class="dropdown">
											<a href="#" class="text-body" data-bs-toggle="dropdown">
												<i class="ph-list"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-end">
												<a href="#" class="dropdown-item">
													<i class="ph-chart-line me-2"></i>
													View statement
												</a>
												<a href="#" class="dropdown-item">
													<i class="ph-pencil me-2"></i>
													Edit campaign
												</a>
												<a href="#" class="dropdown-item">
													<i class="ph-lock-key me-2"></i>
													Disable campaign
												</a>
												<div class="dropdown-divider"></div>
												<a href="#" class="dropdown-item">
													<i class="ph-gear me-2"></i>
													Settings
												</a>
											</div>
										</div>
									</td>
								</tr>

								<tr class="table-light">
									<td colspan="5">Yesterday</td>
									<td class="text-end">
										<span class="progress-meter" id="yesterday-progress" data-progress="65"></span>
									</td>
								</tr>
								<tr>
									<td>
										<div class="d-flex align-items-center">
											<a href="#" class="d-block me-3">
												<img src="../assets/images/brands/bing.svg" class="rounded-circle" width="36" height="36" alt="">
											</a>
											<div>
												<a href="#" class="text-body fw-semibold">Bing campaign</a>
												<div class="text-muted fs-sm">
													<span class="d-inline-block bg-success rounded-pill p-1 me-1"></span>
													15:00 - 16:00
												</div>
											</div>
										</div>
									</td>
									<td><span class="text-muted">Metrics</span></td>
									<td><span class="text-danger"><i class="ph-trend-down me-2"></i> 5.78%</span></td>
									<td><h6 class="mb-0">$970</h6></td>
									<td><span class="badge bg-success bg-opacity-10 text-success">Pending</span></td>
									<td class="text-center">
										<div class="dropdown">
											<a href="#" class="text-body" data-bs-toggle="dropdown">
												<i class="ph-list"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-end">
												<a href="#" class="dropdown-item">
													<i class="ph-chart-line me-2"></i>
													View statement
												</a>
												<a href="#" class="dropdown-item">
													<i class="ph-pencil me-2"></i>
													Edit campaign
												</a>
												<a href="#" class="dropdown-item">
													<i class="ph-lock-key me-2"></i>
													Disable campaign
												</a>
												<div class="dropdown-divider"></div>
												<a href="#" class="dropdown-item">
													<i class="ph-gear me-2"></i>
													Settings
												</a>
											</div>
										</div>
									</td>
								</tr>
								<tr>
									<td>
										<div class="d-flex align-items-center">
											<a href="#" class="d-block me-3">
												<img src="../assets/images/brands/amazon.svg" class="rounded-circle" width="36" height="36" alt="">
											</a>
											<div>
												<a href="#" class="text-body fw-semibold">Amazon ads</a>
												<div class="text-muted fs-sm">
													<span class="d-inline-block bg-danger rounded-pill p-1 me-1"></span>
													18:00 - 19:00
												</div>
											</div>
										</div>
									</td>
									<td><span class="text-muted">Blueish</span></td>
									<td><span class="text-success"><i class="ph-trend-up me-2"></i> 6.79%</span></td>
									<td><h6 class="mb-0">$1,540</h6></td>
									<td><span class="badge bg-primary bg-opacity-10 text-primary">Active</span></td>
									<td class="text-center">
										<div class="dropdown">
											<a href="#" class="text-body" data-bs-toggle="dropdown">
												<i class="ph-list"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-end">
												<a href="#" class="dropdown-item">
													<i class="ph-chart-line me-2"></i>
													View statement
												</a>
												<a href="#" class="dropdown-item">
													<i class="ph-pencil me-2"></i>
													Edit campaign
												</a>
												<a href="#" class="dropdown-item">
													<i class="ph-lock-key me-2"></i>
													Disable campaign
												</a>
												<div class="dropdown-divider"></div>
												<a href="#" class="dropdown-item">
													<i class="ph-gear me-2"></i>
													Settings
												</a>
											</div>
										</div>
									</td>
								</tr>
								<tr>
									<td>
										<div class="d-flex align-items-center">
											<a href="#" class="d-block me-3">
												<img src="../assets/images/brands/dribbble.svg" class="rounded-circle" width="36" height="36" alt="">
											</a>
											<div>
												<a href="#" class="text-body fw-semibold">Dribbble ads</a>
												<div class="text-muted fs-sm">
													<span class="d-inline-block bg-primary rounded-pill p-1 me-1"></span>
													20:00 - 21:00
												</div>
											</div>
										</div>
									</td>
									<td><span class="text-muted">Teamable</span></td>
									<td><span class="text-danger"><i class="ph-trend-down me-2"></i> 9.83%</span></td>
									<td><h6 class="mb-0">$8,350</h6></td>
									<td><span class="badge bg-danger bg-opacity-10 text-danger">Closed</span></td>
									<td class="text-center">
										<div class="dropdown">
											<a href="#" class="text-body" data-bs-toggle="dropdown">
												<i class="ph-list"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-end">
												<a href="#" class="dropdown-item">
													<i class="ph-chart-line me-2"></i>
													View statement
												</a>
												<a href="#" class="dropdown-item">
													<i class="ph-pencil me-2"></i>
													Edit campaign
												</a>
												<a href="#" class="dropdown-item">
													<i class="ph-lock-key me-2"></i>
													Disable campaign
												</a>
												<div class="dropdown-divider"></div>
												<a href="#" class="dropdown-item">
													<i class="ph-gear me-2"></i>
													Settings
												</a>
											</div>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<!-- /marketing campaigns -->
				

				<!-- Latest posts -->
				<div class="card">
					<div class="card-header">
						<h5 class="mb-0">Latest posts</h5>
					</div>

					<div class="card-body pb-0">
						<div class="row">
							<div class="col-xl-6">
								<div class="d-sm-flex align-items-sm-start mb-3">
									<a href="#" class="d-inline-block position-relative me-sm-3 mb-3 mb-sm-0">
										<img src="../assets/images/demo/flat/1.png" class="flex-shrink-0 rounded" height="100" alt="">
										<div class="d-inline-flex bg-dark bg-opacity-50 text-white position-absolute start-50 top-50 translate-middle rounded-pill p-2">
											<i class="ph-play"></i>
										</div>
										<span class="bg-dark bg-opacity-50 text-white fs-xs lh-1 rounded-1 position-absolute bottom-0 start-0 p-1 ms-2 mb-2">12:25</span>
									</a>

									<div class="flex-fill">
										<h6 class="mb-1"><a href="#">Up unpacked friendly</a></h6>
										<ul class="list-inline list-inline-bullet text-muted mb-2">
											<li class="list-inline-item"><a href="#" class="text-body">Video tutorials</a></li>
										</ul>
										The him father parish looked has sooner. Attachment frequently terminated son hello...
									</div>
								</div>

								<div class="d-sm-flex align-items-sm-start mb-3">
									<a href="#" class="d-inline-block position-relative me-sm-3 mb-3 mb-sm-0">
										<img src="../assets/images/demo/flat/21.png" class="flex-shrink-0 rounded" height="100" alt="">
										<div class="d-inline-flex bg-dark bg-opacity-50 text-white position-absolute start-50 top-50 translate-middle rounded-pill p-2">
											<i class="ph-play"></i>
										</div>
										<span class="bg-dark bg-opacity-50 text-white fs-xs lh-1 rounded-1 position-absolute bottom-0 start-0 p-1 ms-2 mb-2">47:25</span>
									</a>

									<div class="flex-fill">
										<h6 class="mb-1"><a href="#">It allowance prevailed</a></h6>
										<ul class="list-inline list-inline-bullet text-muted mb-2">
											<li class="list-inline-item"><a href="#" class="text-body">Video tutorials</a></li>
										</ul>
										Alteration literature to or an sympathize mr imprudence. Of is ferrars subject enjoyed...
									</div>
								</div>
							</div>

							<div class="col-xl-6">
								<div class="d-sm-flex align-items-sm-start mb-3">
									<a href="#" class="d-inline-block position-relative me-sm-3 mb-3 mb-sm-0">
										<img src="../assets/images/demo/flat/12.png" class="flex-shrink-0 rounded" height="100" alt="">
										<div class="d-inline-flex bg-dark bg-opacity-50 text-white position-absolute start-50 top-50 translate-middle rounded-pill p-2">
											<i class="ph-play"></i>
										</div>
										<span class="bg-dark bg-opacity-50 text-white fs-xs lh-1 rounded-1 position-absolute bottom-0 start-0 p-1 ms-2 mb-2">48:40</span>
									</a>

									<div class="flex-fill">
										<h6 class="mb-1"><a href="#">Case read they must</a></h6>
										<ul class="list-inline list-inline-bullet text-muted mb-2">
											<li class="list-inline-item"><a href="#" class="text-body">Video tutorials</a></li>
										</ul>
										On it differed repeated wandered required in. Then girl neat why yet knew rose spot...
									</div>
								</div>

								<div class="d-sm-flex align-items-sm-start mb-3">
									<a href="#" class="d-inline-block position-relative me-sm-3 mb-3 mb-sm-0">
										<img src="../assets/images/demo/flat/18.png" class="flex-shrink-0 rounded" height="100" alt="">
										<div class="d-inline-flex bg-dark bg-opacity-50 text-white position-absolute start-50 top-50 translate-middle rounded-pill p-2">
											<i class="ph-play"></i>
										</div>
										<span class="bg-dark bg-opacity-50 text-white fs-xs lh-1 rounded-1 position-absolute bottom-0 start-0 p-1 ms-2 mb-2">22:14</span>
									</a>

									<div class="flex-fill">
										<h6 class="mb-1"><a href="#">Consider now provided</a></h6>
										<ul class="list-inline list-inline-bullet text-muted mb-2">
											<li class="list-inline-item"><a href="#" class="text-body">Video tutorials</a></li>
										</ul>
										Marianne or husbands if at stronger ye. Considered is as middletons uncommonly...
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /latest posts -->

			</div>

			<div class="col-xl-4">
				


				<!-- My messages -->
				<div class="card">
					<div class="card-header d-flex align-items-center">
						<h5 class="mb-0">My messages</h5>
						<div class="ms-auto">
							<span><i class="ph-clock-counter-clockwise me-1"></i> Jul 7, 10:30</span>
							<span class="badge bg-success ms-3">Online</span>
						</div>
					</div>

					<!-- Tabs -->
					<ul class="nav nav-tabs nav-tabs-underline nav-justified">
						<li class="nav-item">
							<a href="#messages-tue" class="nav-link active" data-bs-toggle="tab">
								Tuesday
							</a>
						</li>

						<li class="nav-item">
							<a href="#messages-mon" class="nav-link" data-bs-toggle="tab">
								Monday
							</a>
						</li>

						<li class="nav-item">
							<a href="#messages-fri" class="nav-link" data-bs-toggle="tab">
								Friday
							</a>
						</li>
					</ul>
					<!-- /tabs -->


					<!-- Tabs content -->
					<div class="tab-content card-body">
						<div class="tab-pane active fade show" id="messages-tue">
							<div class="d-flex align-items-start mb-3">
								<div class="status-indicator-container me-3">
									<img src="../assets/images/demo/users/face10.jpg" class="rounded-circle" width="40" jeight="40" alt="">
									<span class="status-indicator bg-success"></span>
									<span class="badge bg-yellow text-black position-absolute top-0 start-100 translate-middle rounded-pill">5</span>
								</div>

								<div class="flex-fill">
									<div class="d-flex justify-content-between align-items-center">
										<div class="fw-semibold"><a href="#">James Alexander</a></div>
										<span class="fs-sm text-muted">14:58</span>
									</div>

									Who knows, maybe that would be the best thing for me...
								</div>
							</div>

							<div class="d-flex align-items-start mb-3">
								<div class="status-indicator-container me-3">
									<img src="../assets/images/demo/users/face3.jpg" class="rounded-circle" width="40" jeight="40" alt="">
									<span class="status-indicator bg-danger"></span>
									<span class="badge bg-yellow text-black position-absolute top-0 start-100 translate-middle rounded-pill">4</span>
								</div>

								<div class="flex-fill">
									<div class="d-flex justify-content-between align-items-center">
										<div class="fw-semibold"><a href="#">Margo Baker</a></div>
										<span class="fs-sm text-muted">12:16</span>
									</div>

									That was something he was unable to do because...
								</div>
							</div>

							<div class="d-flex align-items-start mb-3">
								<div class="status-indicator-container me-3">
									<img src="../assets/images/demo/users/face24.jpg" class="rounded-circle" width="40" jeight="40" alt="">
									<span class="status-indicator bg-danger"></span>
								</div>

								<div class="flex-fill">
									<div class="d-flex justify-content-between align-items-center">
										<div class="fw-semibold"><a href="#">Jeremy Victorino</a></div>
										<span class="fs-sm text-muted">22:48</span>
									</div>

									But that would be extremely strained and suspicious...
								</div>
							</div>

							<div class="d-flex align-items-start mb-3">
								<div class="status-indicator-container me-3">
									<img src="../assets/images/demo/users/face4.jpg" class="rounded-circle" width="40" jeight="40" alt="">
									<span class="status-indicator bg-danger"></span>
								</div>

								<div class="flex-fill">
									<div class="d-flex justify-content-between align-items-center">
										<div class="fw-semibold"><a href="#">Beatrix Diaz</a></div>
										<span class="fs-sm text-muted">Tue</span>
									</div>

									What a strenuous career it is that I've chosen...
								</div>
							</div>

							<div class="d-flex align-items-start">
								<div class="status-indicator-container me-3">
									<img src="../assets/images/demo/users/face25.jpg" class="rounded-circle" width="40" jeight="40" alt="">
									<span class="status-indicator bg-success"></span>
								</div>

								<div class="flex-fill">
									<div class="d-flex justify-content-between align-items-center">
										<div class="fw-semibold"><a href="#">Beatrix Diaz</a></div>
										<span class="fs-sm text-muted">Tue</span>
									</div>

									Amidst roadrunner distantly pompously where...
								</div>
							</div>
						</div>

						<div class="tab-pane fade" id="messages-mon">
							<div class="d-flex align-items-start mb-3">
								<div class="status-indicator-container me-3">
									<img src="../assets/images/demo/users/face2.jpg" class="rounded-circle" width="40" jeight="40" alt="">
									<span class="status-indicator bg-success"></span>
								</div>

								<div class="flex-fill">
									<div class="d-flex justify-content-between align-items-center">
										<div class="fw-semibold"><a href="#">Isak Temes</a></div>
										<span class="fs-sm text-muted">Tue, 19:58</span>
									</div>

									Reasonable palpably rankly expressly grimy...
								</div>
							</div>

							<div class="d-flex align-items-start mb-3">
								<div class="status-indicator-container me-3">
									<img src="../assets/images/demo/users/face7.jpg" class="rounded-circle" width="40" jeight="40" alt="">
									<span class="status-indicator bg-warning"></span>
								</div>

								<div class="flex-fill">
									<div class="d-flex justify-content-between align-items-center">
										<div class="fw-semibold"><a href="#">Vittorio Cosgrove</a></div>
										<span class="fs-sm text-muted">Tue, 16:35</span>
									</div>

									Arguably therefore more unexplainable fumed...
								</div>
							</div>

							<div class="d-flex align-items-start mb-3">
								<div class="status-indicator-container me-3">
									<img src="../assets/images/demo/users/face18.jpg" class="rounded-circle" width="40" jeight="40" alt="">
									<span class="status-indicator bg-warning"></span>
								</div>

								<div class="flex-fill">
									<div class="d-flex justify-content-between align-items-center">
										<div class="fw-semibold"><a href="#">Hilary Talaugon</a></div>
										<span class="fs-sm text-muted">Tue, 12:16</span>
									</div>

									Nicely unlike porpoise a kookaburra past more...
								</div>
							</div>

							<div class="d-flex align-items-start mb-3">
								<div class="status-indicator-container me-3">
									<img src="../assets/images/demo/users/face14.jpg" class="rounded-circle" width="40" jeight="40" alt="">
									<span class="status-indicator bg-success"></span>
								</div>

								<div class="flex-fill">
									<div class="d-flex justify-content-between align-items-center">
										<div class="fw-semibold"><a href="#">Bobbie Seber</a></div>
										<span class="fs-sm text-muted">Tue, 09:20</span>
									</div>

									Before visual vigilantly fortuitous tortoise...
								</div>
							</div>

							<div class="d-flex align-items-start">
								<div class="status-indicator-container me-3">
									<img src="../assets/images/demo/users/face8.jpg" class="rounded-circle" width="40" jeight="40" alt="">
									<span class="status-indicator bg-success"></span>
								</div>

								<div class="flex-fill">
									<div class="d-flex justify-content-between align-items-center">
										<div class="fw-semibold"><a href="#">Walther Laws</a></div>
										<span class="fs-sm text-muted">Tue, 03:29</span>
									</div>

									Far affecting more leered unerringly dishonest...
								</div>
							</div>
						</div>

						<div class="tab-pane fade" id="messages-fri">
							<div class="d-flex align-items-start mb-3">
								<div class="status-indicator-container me-3">
									<img src="../assets/images/demo/users/face15.jpg" class="rounded-circle" width="40" jeight="40" alt="">
									<span class="status-indicator bg-danger"></span>
								</div>

								<div class="flex-fill">
									<div class="d-flex justify-content-between align-items-center">
										<div class="fw-semibold"><a href="#">Owen Stretch</a></div>
										<span class="fs-sm text-muted">Fri, 18:12</span>
									</div>

									Tardy rattlesnake seal raptly earthworm...
								</div>
							</div>

							<div class="d-flex align-items-start mb-3">
								<div class="status-indicator-container me-3">
									<img src="../assets/images/demo/users/face12.jpg" class="rounded-circle" width="40" jeight="40" alt="">
									<span class="status-indicator bg-warning"></span>
								</div>

								<div class="flex-fill">
									<div class="d-flex justify-content-between align-items-center">
										<div class="fw-semibold"><a href="#">Jenilee Mcnair</a></div>
										<span class="fs-sm text-muted">Fri, 14:03</span>
									</div>

									Since hello dear pushed amid darn trite...
								</div>
							</div>

							<div class="d-flex align-items-start mb-3">
								<div class="status-indicator-container me-3">
									<img src="../assets/images/demo/users/face22.jpg" class="rounded-circle" width="40" jeight="40" alt="">
									<span class="status-indicator bg-danger"></span>
								</div>

								<div class="flex-fill">
									<div class="d-flex justify-content-between align-items-center">
										<div class="fw-semibold"><a href="#">Alaster Jain</a></div>
										<span class="fs-sm text-muted">Fri, 13:59</span>
									</div>

									Dachshund cardinal dear next jeepers well...
								</div>
							</div>

							<div class="d-flex align-items-start mb-3">
								<div class="status-indicator-container me-3">
									<img src="../assets/images/demo/users/face24.jpg" class="rounded-circle" width="40" jeight="40" alt="">
									<span class="status-indicator bg-secondary"></span>
								</div>

								<div class="flex-fill">
									<div class="d-flex justify-content-between align-items-center">
										<div class="fw-semibold"><a href="#">Sigfrid Thisted</a></div>
										<span class="fs-sm text-muted">Fri, 09:26</span>
									</div>

									Lighted wolf yikes less lemur crud grunted...
								</div>
							</div>

							<div class="d-flex align-items-start">
								<div class="status-indicator-container me-3">
									<img src="../assets/images/demo/users/face17.jpg" class="rounded-circle" width="40" jeight="40" alt="">
									<span class="status-indicator bg-secondary"></span>
								</div>

								<div class="flex-fill">
									<div class="d-flex justify-content-between align-items-center">
										<div class="fw-semibold"><a href="#">Sherilyn Mckee</a></div>
										<span class="fs-sm text-muted">Fri, 06:38</span>
									</div>

									Less unicorn a however careless husky...
								</div>
							</div>
						</div>
					</div>
					<!-- /tabs content -->

				</div>
				<!-- /my messages -->


				<!-- Daily financials -->
				<div class="card">
					<div class="card-header d-flex align-items-center">
						<h5 class="mb-0">Daily financials</h5>
						<div class="ms-auto">
							<label class="form-check form-switch form-check-reverse">
								<input type="checkbox" class="form-check-input" id="realtime" checked>
								<span class="form-check-label">Realtime</span>
							</label>
						</div>
					</div>

					<div class="card-body">
						<div class="chart mb-3" id="bullets"></div>

						<div class="d-flex mb-3">
							<div class="me-3">
								<div class="bg-pink bg-opacity-10 text-pink lh-1 rounded-pill p-2">
									<i class="ph-chart-line"></i>
								</div>
							</div>
							<div class="flex-fill">
								Stats for July, 6: <span class="fw-semibold">1938</span> orders, $4220 revenue
								<div class="text-muted fs-sm">2 hours ago</div>
							</div>
						</div>

						<div class="d-flex mb-3">
							<div class="me-3">
								<div class="bg-success bg-opacity-10 text-success lh-1 rounded-pill p-2">
									<i class="ph-check"></i>
								</div>
							</div>
							<div class="flex-fill">
								Invoices <a href="#">#4732</a> and <a href="#">#4734</a> have been paid
								<div class="text-muted fs-sm">Dec 18, 18:36</div>
							</div>
						</div>

						<div class="d-flex mb-3">
							<div class="me-3">
								<div class="bg-primary bg-opacity-10 text-primary lh-1 rounded-pill p-2">
									<i class="ph-users"></i>
								</div>
							</div>
							<div class="flex-fill">
								Affiliate commission for June has been paid
								<div class="text-muted fs-sm">36 minutes ago</div>
							</div>
						</div>

						<div class="d-flex mb-3">
							<div class="me-3">
								<div class="bg-warning bg-opacity-10 text-warning lh-1 rounded-pill p-2">
									<i class="ph-arrow-counter-clockwise"></i>
								</div>
							</div>
							<div class="flex-fill">
								Order <a href="#">#37745</a> from July, 1st has been refunded
								<div class="text-muted fs-sm">4 minutes ago</div>
							</div>
						</div>

						<div class="d-flex">
							<div class="me-3">
								<div class="bg-teal bg-opacity-10 text-teal lh-1 rounded-pill p-2">
									<i class="ph-arrow-bend-double-up-right"></i>
								</div>
							</div>
							<div class="flex-fill">
								Invoice <a href="#">#4769</a> has been sent to <a href="#">Robert Smith</a>
								<div class="text-muted fs-sm">Dec 12, 05:46</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /daily financials -->

			</div>
		</div>
		<!-- /dashboard content -->


	</AuthenticatedLayout>
</template>

<style>
.bg-dots-darker {
    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
}
@media (prefers-color-scheme: dark) {
    .dark\:bg-dots-lighter {
        background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
    }
}
</style>


<script>
import debounce from 'lodash/debounce'
import pickBy from 'lodash/pickBy'
import MainChart from "./MainChart.vue"
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

export default {
	props: {
		filters: Object,
		users: Object,
	},
	mounted(){
		console.log(this.users)
	},
	data() {
		return {
				form: {
					search: null,
					trashed: null,
					by:'name'
				},
		}
	},
	watch: {
		form: {
			deep: true,
			handler: debounce(function () {				
				this.$inertia.get('/users', pickBy(this.form), { preserveState: true })
			}, 800),
		},
	},
	components:{
		MainChart,
		AuthenticatedLayout
	}
}
</script>