 <?php 
	$status = '';
	if(isset($infogaji)){
		$status = 'disabled';
	}
	$totalpinjaman = 0;
	$totalabsenterlambat = 0;
	$totalkomponen = 0;
	$totalgajipph = 0;
 ?>
 
 <div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-12">
					<?php if($_SESSION['backjabatan'] == 'ADMIN'){ ?>
					<a class="btn btn-info btn-warning btn-round" href="<?=base_url()?>pegawai/gaji">
						<span class="material-icons">
							switch_account
						</span>
						Gaji Pegawai
					</a>
					<?php } ?>
				</div>
				<div class="nav-center">
					<ul class="nav nav-pills nav-pills-warning nav-pills-icons" role="tablist">
						<li class="active">
							<a href="#pengaturan-gaji" role="tab" data-toggle="tab">
								<i class="material-icons">info</i> Info
							</a>
						</li>
						<li>
							<a href="#pengaturan-komponen" role="tab" data-toggle="tab">
								<i class="material-icons">account_tree</i> Komponen
							</a>
						</li>
						<li>
							<a href="#pengaturan-pinjaman" role="tab" data-toggle="tab">
								<i class="material-icons">devices_other</i> Pinjaman
							</a>
						</li>
						<li>
							<a href="#pengaturan-absensi" role="tab" data-toggle="tab">
								<i class="material-icons">pending_actions</i> Absensi
							</a>
						</li>
						<!-- <li>
							<a href="#pengaturan-pajak" role="tab" data-toggle="tab">
								<i class="material-icons">account_balance</i> Pajak
							</a>
						</li> -->
						<li>
							<a href="#pengaturan-gaji-terima" role="tab" data-toggle="tab">
								<i class="material-icons">sports_score</i> Final
							</a>
						</li>
						<li>
							<a href="#pengaturan-thr" role="tab" data-toggle="tab">
								<i class="material-icons">request_quote</i> THR
							</a>
						</li>
					</ul>
				</div>
				<div class="tab-content">
					<div class="tab-pane active" id="pengaturan-gaji">
						<div class="card">
							<div class="card-header">
								<!-- <h4 class="card-title">Description about product</h4>
								<p class="category">
									More information here
								</p> -->
							</div>
							<div class="card-content row">
								<div class="col-md-12">
									<div class="card">
										<form id="formgajipegawai" class="form-horizontal">
											<div class="card-header card-header-text" data-background-color="rose">
												<h4 class="card-title">Info Gaji</h4>
											</div>
											<div class="card-content">
												<div class="row">
													<div class="col-md-6">
														<div class="row">
															<label class="col-sm-3 label-on-left">Wajib Pajak</label>
															<div class="col-sm-9">
																<div class="form-group label-floating is-empty">
																	<label class="control-label"></label>
																	<div class="togglebutton">
																		<label>
																			<input type="checkbox" checked name="wajibpajak" id="wajibpajak" <?=$status?>>
																		</label>
																	</div>
																</div>
															</div>
														</div>
														<div class="row">
															<label class="col-sm-3 label-on-left">PTKP</label>
															<div class="col-sm-9">
																<div class="form-group label-floating is-empty">
																	<label class="control-label"></label>
																	<select class="selectpicker" data-style="btn btn-primary btn-round" id="ptkp" name="ptkp" <?=$status?>>
																		<option value="TK0">TK/0</option>
																		<option value="TK1">TK/1</option>
																		<option value="TK2">TK/2</option>
																		<option value="TK3">TK/3</option>
																		<option value="K0">K/0</option>
																		<option value="K1">K/1</option>
																		<option value="K2">K/2</option>
																		<option value="K3">K/3</option>
																	</select>
																</div>
															</div>
														</div>
														<div class="row">
															<label class="col-sm-3 label-on-left">Perhitungan</label>
															<div class="col-sm-9">
																<div class="form-group label-floating is-empty">
																	<label class="control-label"></label>
																	<select class="selectpicker" data-style="btn btn-primary btn-round" id="perhitungan" name="perhitungan" <?=$status?>>
																		<option value="1">Gross</option>
																		<option value="2">Gross Up</option>
																		<option value="3">Netto</option>
																	</select>
																</div>
															</div>
														</div>
														<div class="row">
															<label class="col-sm-3 label-on-left">Waktu Gaji</label>
															<div class="col-sm-9">
																<div class="form-group label-floating is-empty">
																	<label class="control-label"></label>
																	<select class="selectpicker" data-style="btn btn-primary btn-round" id="waktugaji" name="waktugaji" <?=$status?>>
																		<option value="1">Bulanan</option>
																		<option value="2">Mingguan</option>
																	</select>
																</div>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="row">
															<label class="col-sm-3 label-on-left">No.Rekening</label>
															<div class="col-sm-9">
																<div class="form-group label-floating is-empty">
																	<label class="control-label"></label>
																	<input type="number" class="form-control" id="norek" name="norek" autocomplete="off" <?=$status?>>
																	<span class="help-block">Nomor rekening pegawai</span>
																</div>
															</div>
														</div>
														<div class="row">
															<label class="col-sm-3 label-on-left">Nama Bank</label>
															<div class="col-sm-9">
																<div class="form-group label-floating is-empty">
																	<label class="control-label"></label>
																	<input type="text" class="form-control" id="namabank" name="namabank" autocomplete="off" <?=$status?>>
																	<span class="help-block">Nama bank rekening penerima gaji pegawai</span>
																</div>
															</div>
														</div>
														<div class="row">
															<label class="col-sm-3 label-on-left">Pemilik Rekening</label>
															<div class="col-sm-9">
																<div class="form-group label-floating is-empty">
																	<label class="control-label"></label>
																	<input type="text" class="form-control" id="pemilikrekening" name="pemilikrekening" autocomplete="off" <?=$status?>>
																	<span class="help-block">Nama pemilik rekening sesuai data dari bank</span>
																</div>
															</div>
														</div>
														<?php if(!isset($infogaji)){?>
														<div class="row">
															<label class="col-md-3"></label>
															<div class="col-md-9">
																<div class="form-group form-button">
																	<button type="submit" class="btn btn-fill btn-rose">Simpan</button>
																</div>
															</div>
														</div>
														<?php }else{ ?>
														<div class="row">
															<label class="col-md-3"></label>
															<div class="col-md-9">
																<div class="form-group form-button">
																	<div class="alert alert-info text-center">
																		Anda telah mengisi. Untuk melakukan perubahan silahkan hubungi HRD/admin terkait.
																	</div>
																</div>
															</div>
														</div>
														<?php } ?>
													</div>
													<div class="col-md-12">
														<div class="alert alert-warning">
															Perhitungan pajak dibagi menjadi 3 macam, 
															<ol>
																<li>Gross : perusahaan memotong pajak langsung dari gaji karyawan artinya ditanggung karyawan.</li>
																<li>Gross up : perusahaan menanggung dan menambahkan nominal pajak ke dalam perhitungan gaji, sehingga pajak dalam tanda kutip ditanggung oleh perusahaan.</li>
																<li>Netto : perusahaan menanggung pajak pegawai tanpa mengurangi dan menambahkan nominal pajak.</li>
															</ol>
														</div>
													</div>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane" id="pengaturan-komponen">
						<div class="card">
							<div class="card-header">
								<!-- <h4 class="card-title">Location of the product</h4>
								<p class="category">
									More information here
								</p> -->
							</div>
							<div class="card-content row">
								<div class="col-md-12">
									<div class="card">
										<div class="card-header card-header-text" data-background-color="rose">
											<h4 class="card-title">Komponen Gaji</h4>
										</div>
										<div class="card-content">
											<div class="toolbar">
												<!--        Here you can write extra buttons/actions for the toolbar -->         
											</div>
											<div class="material-datatables">
												<table id="datakomponenupah" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
													<thead>
														<tr>
															<th>No</th>
															<th>Komponen Gaji</th>
															<th>Tipe/Pajak</th>
															<th class="text-right">Nominal</th>
														</tr>
													</thead>
													<tbody>
														<?php 
														$no = 1;
														
														foreach($mykomponen as $row){
														?>
														<tr>
															<td><?=$no?></td>
															<td><?=$row['nama']?></td>
															<td>
																<?=$row['tipe'] == 1 ? 'Penambah' : 'Pengurang'?> / <?=$row['termasuk_pajak'] == 1 ? 'Ya' : 'Tidak'?>
															</td>
															<td class="text-right">
																Rp <?=number_format($row['nominal'],0,',','.')?>
															</td>
														</tr>
														<?php $no++; 
															if($row['tipe'] == 1){
																$totalkomponen += $row['nominal'];
															}else{
																$totalkomponen -= $row['nominal'];
															}
															
															if($row['tipe'] == 1 && $row['termasuk_pajak'] == 1){
																$totalgajipph += $row['nominal'];
															}elseif($row['tipe'] == 2 && $row['termasuk_pajak'] == 1){
																$totalgajipph -= $row['nominal'];
															}
														} 
														?>
													</tbody>
													<tfoot>
														<tr>
															<th colspan="4" class="text-center"><h3>Total Gaji Rp <?=number_format($totalkomponen,0,',','.')?></h3></th>
														</tr>
														<tr>
															<th colspan="4" class="text-center"><h3>Total Gaji PPh Rp <?=number_format($totalgajipph,0,',','.')?></h3></th>
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
					<div class="tab-pane" id="pengaturan-pinjaman">
						<div class="card">
							<div class="card-header">
								<!-- <h4 class="card-title">Legal info of the product</h4>
								<p class="category">
									More information here
								</p> -->
							</div>
							<div class="card-content row">
								<div class="col-md-6">
									<div class="card">
										<div class="card-header card-header-text" data-background-color="rose">
											<h4 class="card-title">Pinjaman</h4>
										</div>
										<div class="card-content">
											<?php if($mypinjaman){ ?>
											<div class="table-responsive">
												<table class="table">
													<thead>
														<th>No</th>
														<th>Total/Terbayar</th>
														<th>%</th>
														<th>Bayar bulan ini</th>
													</thead>
													<tbody>
														<?php 
														$no = 1;
														
														foreach($mypinjaman as $row){
														?>
														<tr>
															<td><?=$no?></td>
															<td>
																Rp <?=number_format($row['nominal_total'],0,',','.').' / Rp '.number_format($row['terbayar'],0,',','.')?>
																<p>
																	<div class="progress">
																	  <div class="progress-bar" role="progressbar" aria-valuenow="<?=number_format(($row['terbayar']/$row['nominal_total'])*100,2)?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=number_format(($row['terbayar']/$row['nominal_total'])*100,2)?>%;">
																		<?=number_format(($row['terbayar']/$row['nominal_total'])*100,0)?>%
																	  </div>
																	</div>
																</p>
															</td>
															<td>
																<span class="label label-info" style="font-size:15px;"><?=number_format(($row['terbayar']/$row['nominal_total'])*100,2)?>%</span>
															</td>
															<td class="text-right">
																Rp <?php 
																	echo number_format(($row['nominal_total'] / $row['tenor']) + ($row['nominal_total'] * ($row['bunga']/100)),0,',','.');
																?>
															</td>
														</tr>
														<?php 
														$no++;
															$totalpinjaman += ($row['nominal_total'] / $row['tenor']) + ($row['nominal_total'] * ($row['bunga']/100));
														} 
														?>
													</tbody>
													<tfoot>
														<tr>
															<th class="text-center" colspan="4"><h3>Total Rp <?=number_format($totalpinjaman,0,',','.');?></h3></th>
														</tr>
													</tfoot>
												</table>
											</div>
											<?php }else{ ?>
											<div class="alert alert-danger">
												Data masih kosong..
											</div>
											<?php } ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane" id="pengaturan-absensi">
						<div class="card">
							<div class="card-header">
								<!-- <h4 class="card-title">Help center</h4>
								<p class="category">
									More information here
								</p> -->
							</div>
							<div class="card-content row">
								<div class="col-md-6">
									<div class="card">
										<div class="card-header card-header-text" data-background-color="rose">
											<h4 class="card-title">Absensi & Overtime</h4>
										</div>
										<div class="card-content">
											<?php  
											
											$totalabsenterlambat = ($totalabsen * 200000) + ($totalpoin * $poinsetting['potongan']/100 * $totalkomponen);
											?>
											<div class="row">
												<div class="col-md-12">
													<div class="card card-stats">
														<div class="card-header" data-background-color="rose">
															<i class="fa fa-calendar-times-o"></i>
														</div>
														<div class="card-content">
															<p class="category">Absen</p>
															<h3 class="card-title"><?=$totalabsen?></h3>
														</div>
														<div class="card-footer text-center">
															Rp <?=number_format($totalabsen * 200000,0,',','.')?>
														</div>
													</div>
												</div>
												<div class="col-md-12">
													<div class="card card-stats">
														<div class="card-header" data-background-color="blue">
															<i class="fa fa-cc"></i>
														</div>
														<div class="card-content">
															<p class="category">Poin Terlambat</p>
															<h3 class="card-title"><?=$totalpoin?></h3>
														</div>
														<div class="card-footer text-center">
															Rp <?=number_format($totalpoin * ($poinsetting['potongan'] / 100) * $totalkomponen,0,',','.')?>
														</div>
													</div>
												</div>
												<div class="col-md-12 text-center">
													<h3>Total Rp <?=number_format($totalabsenterlambat,0,',','.')?></h3>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- <div class="tab-pane" id="pengaturan-pajak">
						<div class="card">
							<div class="card-header">
							</div>
							<div class="card-content row">
								<?php 
								//$gaji = $totalgajipph - $totalabsenterlambat - $totalpinjaman;
								$gaji = $totalgajipph;
								//$biayajabatan = $gaji * 5 / 100;
								$biayajabatan = 0;
								$netosebulan = $gaji - $biayajabatan;
								$netosetahun = $netosebulan * 12;
								$bataspajak = 54000000;
								if(isset($infogaji)){
									if($infogaji["tipe_ptkp"] == 'TK0'){
										$bataspajak = 54000000;
									}elseif($infogaji["tipe_ptkp"] == 'TK1'){
										$bataspajak = 58500000;
									}elseif($infogaji["tipe_ptkp"] == 'TK2'){
										$bataspajak = 63000000;
									}elseif($infogaji["tipe_ptkp"] == 'TK3'){
										$bataspajak = 67500000;
									}elseif($infogaji["tipe_ptkp"] == 'K0'){
										$bataspajak = 58500000;
									}elseif($infogaji["tipe_ptkp"] == 'K1'){
										$bataspajak = 63000000;
									}elseif($infogaji["tipe_ptkp"] == 'K2'){
										$bataspajak = 67500000;
									}elseif($infogaji["tipe_ptkp"] == 'K3'){
										$bataspajak = 72000000;
									}
								}
								
								$pajakkenasetahun = 0;
								$pajakpph21 = 0;
								$pajakperbulan = 0;
								
								if(isset($infogaji)){
									
								$pajakkenasetahun = $netosetahun - $bataspajak;
								
								if($pajakkenasetahun > 0){
									if($infogaji['ispkp'] == 1){
										if($pajakkenasetahun > 50000000){
											$pajakpph21 = (50000000 * 5 / 100) + (($pajakkenasetahun - 50000000) * 15 / 100);
										}else{
											$pajakpph21 = $pajakkenasetahun * 5 / 100;
										}
									}elseif($infogaji['ispkp'] == 0){
										$pajakpph21 = $pajakkenasetahun * 5 / 100 * 1.2;
									}
								}else{
									$pajakkenasetahun = 0;
								}
								
								$pajakperbulan = $pajakpph21 / 12;
								
								$tipepajak = '';
								$pesanpajak = '';
								
								if($infogaji['tipe_perhitungan'] == 1){
									$tipepajak = 'Gross';
									$pajakperbulan = $pajakpph21 / 12;
									$pesanpajak = 'Pajak tipe Gross, ditanggung oleh karyawan.';
								}elseif($infogaji['tipe_perhitungan'] == 2){
									$tipepajak = 'Gross Up';
									$pajakperbulan = 0;
									$pesanpajak = 'Pajak tipe Gross Up, ditanggung oleh perusahaan.';
								}elseif($infogaji['tipe_perhitungan'] == 3){
									$tipepajak = 'Nett';
									$pajakperbulan = 0;
									$pesanpajak = 'Pajak tipe Nett, ditanggung oleh perusahaan.';
								}
								
								?>
								<div class="col-md-6">
									<div class="card">
										<form  class="form-horizontal">
											<div class="card-header card-header-text" data-background-color="rose">
												<h4 class="card-title">Perhitungan Pajak <?=$tipepajak?></h4>
											</div>
											<div class="card-content">
												<div class="row">
													<label class="col-sm-4">Gaji</label>
													<div class="col-sm-8 text-right">
															Rp <?=number_format($gaji,0,',','.')?>
													</div>
												</div>
												<div class="row">
													<label class="col-sm-4">Biaya Jabatan</label>
													<div class="col-sm-8 text-right">
															Rp <?=number_format($biayajabatan,0,',','.')?>
													</div>
												</div>
												<hr>
												<div class="row">
													<label class="col-sm-4">Neto sebulan</label>
													<div class="col-sm-8 text-right">
															Rp <?=number_format($netosebulan,0,',','.')?>
													</div>
												</div>
												<div class="row">
													<label class="col-sm-4">Neto setahun</label>
													<div class="col-sm-8 text-right">
															Rp <?=number_format($netosetahun,0,',','.')?>
													</div>
												</div>
												<div class="row">
													<label class="col-sm-4">PTKP</label>
													<div class="col-sm-8 text-right">
															Rp <?=number_format($bataspajak,0,',','.')?>
													</div>
												</div>
												<hr>
												<div class="row">
													<label class="col-sm-4">PKP Setahun</label>
													<div class="col-sm-8 text-right">
															Rp <?=number_format($pajakkenasetahun,0,',','.')?>
													</div>
												</div>
												<div class="row">
													<label class="col-sm-4">PPh 21 Setahun</label>
													<div class="col-sm-8 text-right">
															Rp <?=number_format($pajakpph21,0,',','.')?>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-12 text-center">
														<h3> Rp <?=number_format($pajakperbulan,0,',','.')?> </h3>
													</div>
												</div>
												<div class="alert alert-info text-center">
													<b><?=$pesanpajak?></b>
												</div>
											</div>
										</form>
									</div>
								</div>
								<?php }else{ ?>
								<div class="col-md-6">
									<div class="card">
										<form  class="form-horizontal">
											<div class="card-header card-header-text" data-background-color="rose">
												<h4 class="card-title">Perhitungan Pajak</h4>
											</div>
											<div class="card-content">
												Silahkan isi informasi pajak pada tab <b>INFO</b>
											</div>
										</form>
									</div>
								</div>
								<?php } ?>
							</div>
						</div>
					</div> -->
					<div class="tab-pane" id="pengaturan-gaji-terima">
						<div class="card">
							<div class="card-header">
								<!-- <h4 class="card-title">Help center</h4>
								<p class="category">
									More information here
								</p> -->
							</div>
							<div class="card-content row">
								<div class="col-md-6">
									<div class="card">
										<form  class="form-horizontal">
											<div class="card-header card-header-text" data-background-color="rose">
												<h4 class="card-title">Gaji Diterima</h4>
											</div>
											<div class="card-content text-center">
												<div class="alert alert-success">
													<!-- <b>Total gaji - Pajak perbulan - Potongan Absen & Terlambat - Cicilan Pinjaman</b>. -->
													<b>Total gaji - Potongan Absen & Terlambat - Cicilan Pinjaman</b>.
												</div>
												<div class="alert alert-info"><h3> Rp <?=number_format($totalkomponen - $totalabsenterlambat - $totalpinjaman,0,',','.')?> </h3></div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane" id="pengaturan-thr">
						<div class="card">
							<div class="card-header">
								<!-- <h4 class="card-title">Help center</h4>
								<p class="category">
									More information here
								</p> -->
							</div>
							<div class="card-content row">
								<div class="col-md-6">
									<div class="card">
										<form  class="form-horizontal">
											<div class="card-header card-header-text" data-background-color="rose">
												<h4 class="card-title">Daftar Komponen THR</h4>
											</div>
											<div class="card-content">
												<div class="table-responsive">
													<table class="table">
														<thead>
															<th>No</th>
															<th>Nama Komponen</th>
															<th class="text-right">Nominal</th>
														</thead>
														<tbody>
															<?php 
															$no = 1; 
															foreach($infothr['komponenthr'] as $row){ 
															?>
															<tr>
																<td><?=$no?></td>
																<td><?=$row['namakomponen']?></td>
																<td class="text-right">Rp <?=number_format($row['nominal'],0,',','.')?></td>
															</tr>
															<?php $no++; } ?>
														</tbody>
													</table>
												</div>
											</div>
										</form>
									</div>
								</div>
								<div class="col-md-6">
									<div class="card">
										<form  class="form-horizontal">
											<div class="card-header card-header-text" data-background-color="rose">
												<h4 class="card-title">THR Terbayar</h4>
											</div>
											<div class="card-content">
												<div class="table-responsive">
													<table class="table">
														<thead>
															<th>No</th>
															<th>Tahun</th>
															<th class="text-right">Diterima</th>
														</thead>
														<tbody>
															<?php 
															$no = 1; 
															foreach($infothr['daftarthr'] as $row){ 
															?>
															<tr>
																<td><?=$no?></td>
																<td><?=$row['tahun']?></td>
																<td class="text-right">Rp <?=number_format($row['total_diterima'],0,',','.')?></td>
															</tr>
															<?php $no++; } ?>
														</tbody>
													</table>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
var table = $('#datakomponenupah').DataTable({
	"pagingType": "full_numbers",
	"lengthMenu": [
		[10, 25, 50, -1],
		[10, 25, 50, "All"]
	],
	responsive: true,
	language: {
		search: "_INPUT_",
		searchPlaceholder: "Search records",
	}
});

<?php 
	if(isset($infogaji)){
	?>
		$('#pemilikrekening').val('<?=$infogaji["rekening_atas_nama"]?>');
		$('#namabank').val('<?=$infogaji["rekening_bank"]?>');
		$('#norek').val('<?=$infogaji["rekening_no"]?>');
		$('#waktugaji').val('<?=$infogaji["tipe_waktu_gaji"]?>');
		$('#perhitungan').val('<?=$infogaji["tipe_perhitungan"]?>');
		$('#ptkp').val('<?=$infogaji["tipe_ptkp"]?>');
		
		var ispkp = <?=$infogaji['ispkp']?>;
		
		if(ispkp == 1){
			$('#wajibpajak').prop('checked', true);
		}else{
			$('#wajibpajak').prop('checked', false);
		}
<?php
	}
?>
</script>