<template>
    <!-- Main charts -->
    <div class="row">
            <div class="col">
                <!-- Sales stats -->
                <div class="card">
                    <div class="card-header d-sm-flex align-items-sm-center py-sm-0">
                        <h5 class="py-sm-2 my-sm-1">Sales statistics</h5>
                        <div class="mt-2 mt-sm-0 ms-sm-auto">
                            <select class="form-select" id="select_date">
                                <option value="val1">June, 29 - July, 5</option>
                                <option value="val2">June, 22 - June 28</option>
                                <option value="val3" selected>June, 15 - June, 21</option>
                                <option value="val4">June, 8 - June, 14</option>
                            </select>
                        </div>
                    </div>

                    <div class="card-body pb-0">
                        <!-- Quick stats boxes -->
						<div class="row">
							<div class="col-lg-4">

								<!-- Members online -->
								<div class="card bg-teal text-white">
									<div class="card-body">
										<div class="d-flex">
											<h3 class="mb-0">3,450</h3>
											<span class="badge bg-black bg-opacity-50 rounded-pill align-self-center ms-auto">+53,6%</span>
										</div>
										
										<div>
											Members online
											<div class="fs-sm opacity-75">489 avg</div>
										</div>
									</div>

									<div class="rounded-bottom overflow-hidden mx-3" id="members-online"></div>
								</div>
								<!-- /members online -->

							</div>

							<div class="col-lg-4">

								<!-- Current server load -->
								<div class="card bg-pink text-white">
									<div class="card-body">
										<div class="d-flex align-items-center">
											<h3 class="mb-0">49.4%</h3>
											<div class="dropdown d-inline-flex ms-auto">
												<a href="#" class="text-white d-inline-flex align-items-center dropdown-toggle" data-bs-toggle="dropdown">
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
										
										<div>
											Current server load
											<div class="fs-sm opacity-75">34.6% avg</div>
										</div>
									</div>

									<div class="rounded-bottom overflow-hidden" id="server-load"></div>
								</div>
								<!-- /current server load -->

							</div>

							<div class="col-lg-4">

								<!-- Today's revenue -->
								<div class="card bg-primary text-white">
									<div class="card-body">
										<div class="d-flex align-items-center">
											<h3 class="mb-0">$18,390</h3>
											<div class="ms-auto">
												<a class="text-white" data-card-action="reload">
													<i class="ph-arrows-clockwise"></i>
												</a>
											</div>
										</div>
										
										<div>
											Today's revenue
											<div class="fs-sm opacity-75">$37,578 avg</div>
										</div>
									</div>

									<div class="rounded-bottom overflow-hidden" id="today-revenue"></div>
								</div>
								<!-- /today's revenue -->

							</div>
						</div>
						<!-- /quick stats boxes -->
                    </div>

                    <div class="chart mb-2">
						<apexchart
							type="line" height="350" :series="series"
							:options="optionsLine"
							></apexchart>
					</div>
                    <div class="chart" id="monthly-sales-stats"></div>
                </div>
                <!-- /sales stats -->

            </div>
        </div>
        <!-- /main charts -->
	</template>
<script>
 export default {
			data(){
				return {
					series: [{
								name: "Music",
								data: [1, 15, 26, 20, 33, 27]
							},
							{
								name: "Photos",
								data: [3, 33, 21, 42, 19, 32]
							},
							{
								name: "Files",
								data: [0, 39, 52, 11, 29, 43]
							}
					],
					optionsLine : {
									chart: {
												height: 328,
												type: 'line',
												zoom: {
														enabled: false
												}												
									},									
									stroke: {
												curve: 'smooth',
												width: 1
									},
									markers: {
											size: 4,
											strokeWidth: 0,
											hover: {
												size: 5
											}
									},
									grid: {
											show: true,
											padding: {
														bottom: 0
											}
									},
									labels: ['01/15/2002', '01/16/2002', '01/17/2002', '01/18/2002', '01/19/2002', '01/20/2002'],
									xaxis: {
											tooltip: {
														enabled: false
										}
									},
									legend: {
												position: 'bottom',
												horizontalAlign: 'right',
												offsetY: 10.5
									}
								}
				}
			}
			

 }
</script>