			<div class="content">
                <div class="container-fluid" style="zoom:0.85;">
					<?php if($_SESSION['backjabatan'] == 'ADMIN'){ ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="green">
                                    <i class="material-icons">language</i>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title">Administrasi HR</h4>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12">
											<div class="card">
												<div class="card-header card-header-text" data-background-color="orange">
													<h4 class="card-title">Rekap Absensi</h4>
													<p class="category">Seluruh pegawai per Hari ini (<?=date('Y-m-d')?>)</p>
												</div>
												<div class="card-content table-responsive">
													<table id="dataabsensi" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
														<thead>
															<tr>
																<th>No</th>
																<th>Nama</th>
																<th>Info</th>
																<th>CekIn-Out</th>
																<th>Istirahat</th>
															</tr>
														</thead>
														<tbody>
															<?php 
															$no = 1;
															foreach($dataabsen as $row){
															?>
															<tr>
																<td><?=$no?></td>
																<td><?=ucwords($row['nama_lengkap'])?></td>
																<td>
																	<?php 
																		$masuk = '00:00';
																		$pulang = '00:00';
																		$istirahat_keluar = '00:00';
																		$istirahat_masuk = '00:00';
																		
																		if($row['cekjadwalkerja'] !== 0 && $row['cekharilibur'] == 0 && $row['cekijin'] == 0 && $row['cekabsen'] !== ''){
																			echo 'WEEKDAY';
																			
																			if(explode('|',$row['cekabsen'])[0] !== ''){
																				$masuk = date('H:i',strtotime(explode('|',$row['cekabsen'])[0]));
																			}
																			if(explode('|',$row['cekabsen'])[1] !== ''){
																				$pulang = date('H:i',strtotime(explode('|',$row['cekabsen'])[1]));
																			}
																			if(explode('|',$row['cekabsen'])[2] !== ''){
																				$istirahat_keluar = date('H:i',strtotime(explode('|',$row['cekabsen'])[2]));
																			}
																			if(explode('|',$row['cekabsen'])[3] !== ''){
																				$istirahat_masuk = date('H:i',strtotime(explode('|',$row['cekabsen'])[3]));
																			}
																			
																		}else{
																			if($row['cekjadwalkerja'] == 0){
																				echo 'WEEKEND';
																			}elseif($row['cekharilibur'] > 0){
																				echo 'LIBUR';
																			}elseif($row['cekijin'] > 0){
																				echo 'IJIN';
																			}elseif($row['cekabsen'] == ''){
																				echo 'ABSEN';
																			}
																		}
																		
																		
																	?>
																</td>
																<td><?=$masuk.' s/d '.$pulang?></td>
																<td><?=$istirahat_keluar?> s/d <?=$istirahat_masuk?></td>
															</tr>
															<?php $no++; } ?>
														</tbody>
														<tfoot>
															<tr>
																<th>No</th>
																<th>Nama</th>
																<th>Info</th>
																<th>CekIn-Out</th>
																<th>Istirahat</th>
															</tr>
														</tfoot>
													</table>
												</div>
											</div>
											
										</div>
										<div class="col-lg-6 col-md-12">
											<div class="card">
												<div class="card-header card-header-tabs" data-background-color="rose">
													<div class="nav-tabs-navigation">
														<div class="nav-tabs-wrapper">
															<span class="nav-tabs-title">Pengajuan:</span>
															<ul class="nav nav-tabs" data-tabs="tabs">
																<li class="active">
																	<a href="#reimburse" data-toggle="tab">
																		<i class="material-icons">payments</i> Reimburse
																		<div class="ripple-container"></div>
																	</a>
																</li>
																<li class="">
																	<a href="#kas" data-toggle="tab">
																		<i class="material-icons">local_atm</i> Kas
																		<div class="ripple-container"></div>
																	</a>
																</li>
																<li class="">
																	<a href="#pinjaman" data-toggle="tab">
																		<i class="material-icons">credit_score</i> Pinjaman
																		<div class="ripple-container"></div>
																	</a>
																</li>
																<li class="">
																	<a href="#cuti" data-toggle="tab">
																		<i class="material-icons">event_busy</i> Cuti
																		<div class="ripple-container"></div>
																	</a>
																</li>
																<li class="">
																	<a href="#lembur" data-toggle="tab">
																		<i class="material-icons">schedule</i> Lembur
																		<div class="ripple-container"></div>
																	</a>
																</li>
																<li class="">
																	<a href="#benefit" data-toggle="tab">
																		<i class="material-icons">health_and_safety</i> Benefit
																		<div class="ripple-container"></div>
																	</a>
																</li>
															</ul>
														</div>
													</div>
												</div>
												<div class="card-content">
													<div class="tab-content">
														<div class="tab-pane active" id="reimburse">
															<div class="material-datatables table-responsive">
																<table id="datareimbursepegawai" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
																	<thead>
																		<tr>
																			<th width="5%">No</th>
																			<th width="10%">Nama</th>
																			<th width="15%">Tipe Reim.</th>
																			<th width="10%">Tanggal</th>
																			<th width="15%">Nominal</th>
																		</tr>
																	</thead>
																	<tbody>
																		<?php $no=1; foreach($datareimburse as $row){ if($row['status'] == 1){ ?>
																		<tr>
																			<td><?=$no?></td>
																			<td><?=$row['namapegawai']?></td>
																			<td><?=$row['namareimburse']?></td>
																			<td><?=$row['tgl_efektif']?></td>
																			<td class="text-right">Rp <?=number_format($row['nominal'],0,',','.')?>,-</td>
																		</tr>
																		<?php $no++; } } ?>
																	</tbody>
																	<tfoot>
																		<tr>
																			<th width="5%">No</th>
																			<th width="10%">Nama</th>
																			<th width="15%">Tipe Reim.</th>
																			<th width="10%">Tanggal</th>
																			<th width="15%">Nominal</th>
																		</tr>
																	</tfoot>
																</table>
															</div>
														</div>
														<div class="tab-pane" id="kas">
															<div class="material-datatables table-responsive">
																<table id="datakaspegawai" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
																	<thead>
																		<tr>
																			<th>No</th>
																			<th>Pegawai</th>
																			<th>Tgl.Pakai</th>
																			<th>Total</th>
																		</tr>
																	</thead>
																	<tbody>
																		<?php 
																		$no = 1;
																		foreach($datakas as $row){ if($row['status'] == 1){ ?>
																		<tr>
																			<td><?=$no?></td>
																			<td><?=$row['namapegawai']?></td>
																			<td><?=$row['untuk_tanggal']?></td>
																			<td class="text-right">Rp <?=number_format($row['nominal_terpakai'],0,',','.')?></td>
																		</tr>
																		<?php $no++; } } ?>
																	</tbody>
																	<tfoot>
																		<tr>
																			<th>No</th>
																			<th>Pegawai</th>
																			<th>Tgl.Pakai</th>
																			<th>Total</th>
																		</tr>
																	</tfoot>
																</table>
															</div>
														</div>
														<div class="tab-pane" id="pinjaman">
															<div class="material-datatables table-responsive">
																<table id="datapinjamanpegawai" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
																	<thead>
																		<tr>
																			<th>No</th>
																			<th>Pegawai</th>
																			<th>Tanggal</th>
																			<th>Nominal</th>
																			<th>Tenor</th>
																			<th>Bunga</th>
																		</tr>
																	</thead>
																	<tbody>
																		<?php 
																		$no = 1;
																		foreach($datapinjaman as $row){ if($row['status'] == 1){ ?>
																		<tr>
																			<td><?=$no?></td>
																			<td><?=$row['namapegawai']?></td>
																			<td><?=$row['terhitung_tanggal']?></td>
																			<td class="text-right">Rp <?=number_format($row['nominal_total'],0,',','.')?></td>
																			<td class="text-center"><?=$row['tenor']?> bulan</td>
																			<td class="text-center"><?=$row['bunga']?>%</td>
																		</tr>
																		<?php $no++; } } ?>
																	</tbody>
																	<tfoot>
																		<tr>
																			<th>No</th>
																			<th>Pegawai</th>
																			<th>Tanggal</th>
																			<th>Nominal</th>
																			<th>Tenor</th>
																			<th>Bunga</th>
																		</tr>
																	</tfoot>
																</table>
															</div>
														</div>
														<div class="tab-pane" id="cuti">
															<div class="material-datatables table-responsive">
																<table id="datacutipegawai" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
																	<thead>
																		<tr>
																			<th>No</th>
																			<th>Pegawai</th>
																			<th>Tipe</th>
																			<th>Tanggal</th>
																		</tr>
																	</thead>
																	<tbody>
																		<?php 
																		$no = 1;
																		foreach($datacuti as $row){ if($row['status'] == 1){ ?>
																		<tr>
																			<td><?=$no?></td>
																			<td><?=$row['namapegawai']?></td>
																			<td><?=$row['namaijin']?></td>
																			<td><?=$row['tanggal']?></td>
																		</tr>
																		<?php $no++; } } ?>
																	</tbody>
																	<tfoot>
																		<tr>
																			<th>No</th>
																			<th>Pegawai</th>
																			<th>Tipe</th>
																			<th>Tanggal</th>
																		</tr>
																	</tfoot>
																</table>
															</div>
														</div>
														<div class="tab-pane" id="lembur">
															<div class="material-datatables table-responsive">
																<table id="datalemburpegawai" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
																	<thead>
																		<tr>
																			<th>No</th>
																			<th>Pegawai</th>
																			<th>Tanggal</th>
																			<th>Total</th>
																		</tr>
																	</thead>
																	<tbody>
																		<?php 
																		$no = 1;
																		foreach($datalembur as $row){ if($row['status'] == 1){ ?>
																		<tr>
																			<td><?=$no?></td>
																			<td><?=$row['namapegawai']?></td>
																			<td><?=$row['tanggal']?></td>
																			<td><?=$row['nilai']?></td>
																		</tr>
																		<?php $no++; } } ?>
																	</tbody>
																	<tfoot>
																		<tr>
																			<th>No</th>
																			<th>Pegawai</th>
																			<th>Tanggal</th>
																			<th>Total</th>
																		</tr>
																	</tfoot>
																</table>
															</div>
														</div>
														<div class="tab-pane" id="benefit">
															<div class="material-datatables table-responsive">
																<table id="datapegawaibenefit" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
																	<thead>
																		<tr>
																			<th width="5%">No</th>
																			<th width="10%">Nama</th>
																			<th width="15%">Benefit</th>
																			<th width="10%">Tanggal</th>
																			<th width="15%">Nominal</th>
																		</tr>
																	</thead>
																	<tbody>
																		<?php $no=1; foreach($databenefit as $row){ if($row['status'] == 1){ ?>
																		<tr>
																			<td><?=$no?></td>
																			<td><?=$row['namapegawai']?></td>
																			<td><?=$row['namabenefit']?></td>
																			<td><?=$row['tanggal_request']?></td>
																			<td class="text-right">Rp <?=number_format($row['nominal'],0,',','.')?>,-</td>
																		</tr>
																		<?php $no++; } } ?>
																	</tbody>
																	<tfoot>
																		<tr>
																			<th width="5%">No</th>
																			<th width="10%">Nama</th>
																			<th width="15%">Benefit</th>
																			<th width="10%">Tanggal</th>
																			<th width="15%">Nominal</th>
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
										<div class="col-md-6">
											<div class="card">
												<div class="card-header card-header-icon" data-background-color="red">
													<i class="material-icons">pie_chart</i>
												</div>
												<div class="card-content">
													<h4 class="card-title">Status Pegawai</h4>
												</div>
												<div id="chartStatusPekerja" class="ct-chart"></div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="card">
												<div class="card-header card-header-icon" data-background-color="blue">
													<i class="material-icons">leaderboard</i>
												</div>
												<div class="card-content">
													<h4 class="card-title">Organisasi</h4>
												</div>
												<div id="chartOrganisasi" class="ct-chart"></div>
											</div>
										</div>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
					<?php } ?>
					<h3>Rekapitulasi Pegawai</h3>
					<br>
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="orange">
                                    <i class="material-icons">payments</i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Sisa Reimburse</p>
                                    <h3 class="card-title"><?=number_format($rekapreimburse['total'],0)?></h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons text-danger">warning</i>
                                        <a href="<?=base_url('reimburse')?>">Selengkapnya...</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="rose">
                                    <i class="material-icons">local_atm</i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Sisa Kas Dimuka</p>
                                    <h3 class="card-title"><?=number_format($rekapkas['total'] - $rekapkas['terpakai'],0)?></h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons text-danger">warning</i>
                                        <a href="<?=base_url('kas_dimuka')?>">Selengkapnya...</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="green">
                                    <i class="material-icons">credit_score</i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Total Pinjaman</p>
                                    <h3 class="card-title"><?=number_format($rekappinjaman['total'],0)?></h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons text-danger">warning</i>
                                        <a href="<?=base_url('pinjaman')?>">Selengkapnya...</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="blue">
                                   <i class="fa fa-sign-in"></i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Jumlah Masuk</p>
                                    <h3 class="card-title"><?=$totalmasuk['total']?></h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                       <i class="material-icons">update</i>
									   Selama 1 bulan terakhir
                                    </div>
                                </div>
                            </div>
                        </div>
						<div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="orange">
                                    <i class="fa fa-calendar-minus-o"></i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Jumlah Ijin</p>
                                    <h3 class="card-title"><?=$totalijin['total']?></h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">update</i>
										Selama 1 bulan terakhir
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="rose">
                                    <i class="fa fa-calendar-times-o"></i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Jumlah Absen</p>
                                    <h3 class="card-title"><?=$totalabsen?></h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">update</i>
										Selama 1 bulan terakhir
                                    </div>
                                </div>
                            </div>
                        </div>
						<div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="green">
                                    <i class="fa fa-cc"></i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Poin Terlambat</p>
                                    <h3 class="card-title"><?=$totalpoin?></h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">update</i>
										Selama 1 bulan terakhir
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			
			<script type="text/javascript">
				$(document).ready(function() {

					// Javascript method's body can be found in assets/js/demos.js
					//demo.initDashboardPageCharts();

					//demo.initVectorMap();
					//demo.initCharts();
					<?php if($_SESSION['backjabatan'] == 'ADMIN'){ ?>
					$('#dataabsensi,#datareimbursepegawai,#datakaspegawai,#datapinjamanpegawai,#datacutipegawai,#datalemburpegawai,#datapegawaibenefit').DataTable({
						"pagingType": "full_numbers",
						"lengthMenu": [
							[5,10, 25, 50, -1],
							[5,10, 25, 50, "All"]
						],
						responsive: true,
						language: {
							search: "_INPUT_",
							searchPlaceholder: "Search records",
						}
					});
					
					var dataStatusPekerja = {
						labels: [
									<?php 
									foreach($rekapstatus as $row){  
										echo '"'.$row['status_pekerja'].'",';
									} 
									?>
								],
						series: [
									<?php 
									foreach($rekapstatus as $row){  
										echo $row['jumlah'].',';
									} 
									?>
								]
					};

					var optionStatusPekerja = {
						height: '230px'
					};

					Chartist.Pie('#chartStatusPekerja', dataStatusPekerja, optionStatusPekerja);
					
					var dataOrganisasi = {
						labels: [
									<?php 
									foreach($rekaporganisasi as $row){  
										echo '"'.$row['namaorganisasi'].'",';
									} 
									?>
								],
						series: [[
									<?php 
									foreach($rekaporganisasi as $row){  
										echo $row['jumlah'].',';
									} 
									?>
								]]
					};

					var optionOrganisasi = {
						height: '230px',
						chartPadding: { top: 25, right: 25, bottom: 25, left: 25}
					};

					Chartist.Bar('#chartOrganisasi', dataOrganisasi, optionOrganisasi);
					
					<?php } ?>
				});
			</script>