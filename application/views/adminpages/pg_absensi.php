<link href="<?=base_url()?>assets/plugins/digital-clock/assets/css/style.css?v=16" rel="stylesheet" />
<style>
	.choice.active-success .icon {
		border-color: green;
		color: green;
	}
	
	.overlay {
	  overflow: visible;
	  pointer-events: none;
	  background:none !important;
	}
</style>
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<button class="btn btn-success btn-raised btn-round" data-toggle="modal" data-target="#modalRekap">
					<span class="material-icons">
						ballot
					</span>
					Rekap Absensi & Poin
				</button>
				<?php if($_SESSION['backjabatan'] == 'ADMIN'){ ?>
				<a class="btn btn-danger btn-raised btn-round" href="<?=base_url()?>pegawai/absensi">
					<span class="material-icons">
						engineering
					</span>
					Absensi Pegawai
				</a>
				<?php } ?>
				<div class="card">
					<div class="card-header card-header-text" data-background-color="rose">
						<h4 class="card-title">Live Absensi <?=date('d-m-Y')?></h4>
					</div>
					<div class="card-content">
						<div class="row">
							<div class="col-md-2">
								<ul class="nav nav-pills nav-pills-icons nav-pills-primary nav-stacked" role="tablist">
									<!-- color-classes: "nav-pills-primary", "nav-pills-info", "nav-pills-success", "nav-pills-warning","nav-pills-danger" -->
									<li class="active">
										<a href="#schedule-2" role="tab" data-toggle="tab">
											<i class="material-icons">schedule</i> Absensi
										</a>
									</li>
									<li>
										<a href="#dashboard-2" role="tab" data-toggle="tab">
											<i class="material-icons">event_note</i> Log
										</a>
									</li>
								</ul>
							</div>
							<div class="col-md-10">
								<div class="tab-content">
									<div class="tab-pane active" id="schedule-2" style="zoom:0.7;">
										<div class="row">
											<div class="col-md-6 col-md-offset-3">
												<div id="clock" class="light">
													<div class="display">
														<div class="weekdays"></div>
														<div class="ampm"></div>
														<div class="alarm"></div>
														<div class="digits"></div>
													</div>
												</div>
											</div>
											<div class="col-md-12">
												<!--      Wizard container        -->
												<div class="wizard-container">
													<div class="card wizard-card" data-color="rose" id="wizardProfile">
														<form action="#" method="">
															<!--        You can switch " data-color="purple" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->
															<div class="tab-content">
																<div class="tab-pane active" id="Opsi">
																	 <h4 class="info-text"> Satu klik/tap tombol <b>"CEKLOG"</b> akan menyimpan absen. Mohon berhati-hati!</h4>
																	<div class="row">
																		<div class="col-lg-10 col-lg-offset-1">
																		
																			<?php 
																			$statusmasuk = '';
																			$statuspulang = '';
																			$statusout = '';
																			$statusin = '';
																			if(isset($absentoday)){
																				if($absentoday['jam_masuk'] !== NULL){
																					$statusmasuk = 'overlay';
																				}
																				if($absentoday['jam_pulang'] !== NULL){
																					$statuspulang = 'overlay';
																				}
																				if($absentoday['istirahat_keluar'] !== NULL){
																					$statusout = 'overlay';
																				}
																				if($absentoday['istirahat_masuk'] !== NULL){
																					$statusin = 'overlay';
																				}
																			}
																			
																			?>
																			<div class="row">
																				<div class="col-md-3 col-xs-6 <?=$statusmasuk?>">
																					<div class="choice <?=$statusmasuk !== '' ? 'active-success' : '' ?>" data-toggle="wizard-radio">
																						<input type="radio" name="jobb" value="masuk">
																						<div class="icon">
																							<i class="fa fa-sign-in"></i>
																						</div>
																						<h6>Masuk : <?=$libur['iskerja'] ? $libur['iskerja']['masuk'] : '00:00'?></h6>
																					</div>
																				</div>
																				<div class="col-md-3 col-xs-6 <?=$statusout?>">
																					<div class="choice <?=$statusout !== '' ? 'active-success' : '' ?>" data-toggle="wizard-radio">
																						<input type="radio" name="jobb" value="istirahatout">
																						<div class="icon">
																							<i class="fa fa-outdent"></i>
																						</div>
																						<h6>Istirahat Out : <?=$libur['iskerja'] ? $libur['iskerja']['istirahat_keluar'] : '00:00'?></h6>
																					</div>
																				</div>
																				<div class="col-md-3 col-xs-6 <?=$statusin?>">
																					<div class="choice <?=$statusin !== '' ? 'active-success' : '' ?>" data-toggle="wizard-radio">
																						<input type="radio" name="jobb" value="istirahatin">
																						<div class="icon">
																							<i class="fa fa-indent"></i>
																						</div>
																						<h6>Istirahat In : <?=$libur['iskerja'] ? $libur['iskerja']['istirahat_masuk'] : '00:00'?></h6>
																					</div>
																				</div>
																				<div class="col-md-3 col-xs-6 <?=$statuspulang?>">
																					<div class="choice <?=$statuspulang !== '' ? 'active-success' : '' ?>" data-toggle="wizard-radio">
																						<input type="radio" name="jobb" value="pulang">
																						<div class="icon">
																							<i class="fa fa-sign-out"></i>
																						</div>
																						<h6>Pulang : <?=$libur['iskerja'] ? $libur['iskerja']['pulang'] : '00:00'?></h6>
																					</div>
																				</div>
																			</div>
																		</div>
																		<div class="mt-3 col-lg-10 col-lg-offset-1">
																			<div class="form-group label-floating">
																				<label class="control-label" style="font-size:15px;">Alasan/Keterangan</label>
																				<input type="text" class="form-control" id="alasan" name="alasan">
																			</div>
																		</div>
																		<div class="col-lg-12 text-center mt-3">
																			<?php if($libur['iskerja'] == NULL){ ?>
																				<div class="alert alert-rose alert-with-icon" data-notify="container">
																					<i class="material-icons" data-notify="icon">notifications</i>
																					<button type="button" aria-hidden="true" class="close">
																						<i class="material-icons">close</i>
																					</button>
																					<span data-notify="message">Hari off / weekend</span>
																				</div>
																			<?php }elseif($libur['islibur']){ ?>
																				<div class="alert alert-rose alert-with-icon" data-notify="container">
																					<i class="material-icons" data-notify="icon">notifications</i>
																					<button type="button" aria-hidden="true" class="close">
																						<i class="material-icons">close</i>
																					</button>
																					<span data-notify="message">Libur / tanggal merah : <?=$libur['islibur']['keterangan']?></span>
																				</div>
																			<?php }else{ ?>
																				<button class="btn btn-success btn-round" style="font-size:30px;" id="btn-go-ceklog" <?=isset($absentoday['jam_pulang']) ? 'disabled' : ''?>><i class="fa fa-check-square-o" style="font-size:35px;"></i> Ceklog</button>
																			<?php } ?>
																		</div>
																		<div class="col-lg-12 mt-3">
																			<h3>Info Penting</h3>
																			<p>
																				<ol>
																					<li>Apabila hari libur atau tanggal merah, maka absensi akan ditutup.</li>
																					<li>Tombol ceklog akan non-aktif jika anda sudah melakukan ceklog pulang.</li>
																					<li>Poin keterlambatan akan dihitung dari selisih antara jadwal masuk seharusnya dengan waktu masuk pegawai (dibulatkan kebawah).</li>
																					<li>Pengaturan hari kerja dan libur tanggal merah ada di Manajemen - Perusahaan.</li>
																				</ol>
																			</p>
																		</div>
																	</div>
																</div>
															</div>
														</form>
													</div>
												</div>
												<!-- wizard container -->
											</div>
										</div>
									</div>
									<div class="tab-pane" id="dashboard-2">
										<div class="material-datatables">
											<table id="dataabsensi" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
												<thead>
													<tr>
														<th>No</th>
														<th>Tanggal</th>
														<th>Masuk</th>
														<th>Istirahat</th>
														<th>Pulang</th>
													</tr>
												</thead>
												<tbody>
													<?php 
													$no = 1;
													foreach($listabsensi as $row){
													?>
													<tr>
														<td><?=$no?></td>
														<td><?=date('d/m/y',strtotime($row['tanggal']))?></td>
														<td><?=date('H:i',strtotime($row['jam_masuk']))?></td>
														<td><?=$row['istirahat_keluar'] !== NULL ? date('H:i',strtotime($row['istirahat_keluar'])) : '<span class="label label-danger">Kosong</span>'?> s/d <?=$row['istirahat_masuk'] !== NULL ? date('H:i',strtotime($row['istirahat_masuk'])) : '<span class="label label-danger">Kosong</span>'?></td>
														<td><?=$row['jam_pulang'] !== NULL ? date('H:i',strtotime($row['jam_pulang'])) : '<span class="label label-danger">Kosong</span>'?></td>
													</tr>
													<?php $no++; } ?>
												</tbody>
												<tfoot>
													<tr>
														<th>No</th>
														<th>Tanggal</th>
														<th>Masuk</th>
														<th>Pulang</th>
														<th>Istirahat</th>
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
			</div>
		</div>
	</div>
</div>
<!-- Classic Modal -->
<div class="modal fade" id="modalRekap" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					<i class="material-icons">clear</i>
				</button>
				<h4 class="modal-title">Rekap & Poin</h4>
			</div>
			<div class="modal-body">
				<div class="card">
					<div class="card-header card-header-text" data-background-color="rose">
						<h4 class="card-title">Form Rekap</h4>
					</div>
					<div class="card-content">
						<div class="alert alert-info">
							Perhitungan poin keterlambatan diatur dari pengaturan Manajemen - Perusahaan. Menit : <b class="label label-warning"><?=$poinsetting['menit']?> / <?=$poinsetting['poin']?></b> poin, Potongan : <b class="label label-warning"><?=$poinsetting['potongan']?>% x Poin x Gaji Netto Komponen Upah</b>
						</div>
						<div class="card">
							<form id="form-lihat-rekap" class="form-horizontal">
								<div class="card-content">
									<div class="row">
										<label class="col-sm-2 label-on-left">Bulan</label>
										<div class="col-sm-5">
											<div class="form-group">
												<select class="form-control" id="bulan" name="bulan">
													<option value="01">Januari</option>
													<option value="02">Februari</option>
													<option value="03">Maret</option>
													<option value="04">April</option>
													<option value="05">Mei</option>
													<option value="06">Juni</option>
													<option value="07">Juli</option>
													<option value="08">Agustus</option>
													<option value="09">September</option>
													<option value="10">Oktober</option>
													<option value="11">November</option>
													<option value="12">Desember</option>
												</select>
											</div>
										</div>
										<div class="col-sm-5">
											<div class="form-group">
												<select class="form-control" id="tahun" name="tahun">
													<?php 
														$yearnow = date('Y');
														$yearmin = $yearnow - 3;
														$yearmax = $yearnow + 3;
													?>
													<?php for($i=$yearmin;$i<=$yearmax;$i++){ ?>
													<option value="<?=$i?>"><?=$i?></option>
													<?php } ?>
												</select>
											</div>
										</div>
									</div>
									<div class="row">
										<label class="col-md-2"></label>
										<div class="col-md-10">
											<div class="form-group form-button">
												<button type="submit" class="btn btn-fill btn-rose">Tampilkan</button>
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>
						<div class="row" id="tampil-rekap">
							
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger btn-simple" data-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>
<script>
$().ready(function() {
	demo.initMaterialWizard();
	
	var table = $('#dataabsensi').DataTable({
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
});

var datetime = '<?=date("Y-m-d H:i:s")?>';

$(function(){
	
	moment().from(datetime);
	// Cache some selectors

	var clock = $('#clock'),
		alarm = clock.find('.alarm'),
		ampm = clock.find('.ampm');

	// Map digits to their names (this will be an array)
	var digit_to_name = 'zero one two three four five six seven eight nine'.split(' ');

	// This object will hold the digit elements
	var digits = {};

	// Positions for the hours, minutes, and seconds
	var positions = [
		'h1', 'h2', ':', 'm1', 'm2', ':', 's1', 's2'
	];

	// Generate the digits with the needed markup,
	// and add them to the clock

	var digit_holder = clock.find('.digits');

	$.each(positions, function(){

		if(this == ':'){
			digit_holder.append('<div class="dots">');
		}
		else{

			var pos = $('<div>');

			for(var i=1; i<8; i++){
				pos.append('<span class="d' + i + '">');
			}

			// Set the digits as key:value pairs in the digits object
			digits[this] = pos;

			// Add the digit elements to the page
			digit_holder.append(pos);
		}

	});

	// Add the weekday names

	var weekday_names = 'MON TUE WED THU FRI SAT SUN'.split(' '),
		weekday_holder = clock.find('.weekdays');

	$.each(weekday_names, function(){
		weekday_holder.append('<span>' + this + '</span>');
	});

	var weekdays = clock.find('.weekdays span');
	
	(function update_time(){

		// Use moment.js to output the current time as a string
		// hh is for the hours in 12-hour format,
		// mm - minutes, ss-seconds (all with leading zeroes),
		// d is for day of week and A is for AM/PM

		now = moment().format("hhmmssdA");

		digits.h1.attr('class', digit_to_name[now[0]]);
		digits.h2.attr('class', digit_to_name[now[1]]);
		digits.m1.attr('class', digit_to_name[now[2]]);
		digits.m2.attr('class', digit_to_name[now[3]]);
		digits.s1.attr('class', digit_to_name[now[4]]);
		digits.s2.attr('class', digit_to_name[now[5]]);

		// The library returns Sunday as the first day of the week.
		// Stupid, I know. Lets shift all the days one position down, 
		// and make Sunday last

		var dow = now[6];
		dow--;
		
		// Sunday!
		if(dow < 0){
			// Make it last
			dow = 6;
		}

		// Mark the active day of the week
		weekdays.removeClass('active').eq(dow).addClass('active');

		// Set the am/pm text:
		ampm.text(now[7]+now[8]);

		// Schedule this function to be run again in 1 sec
		setTimeout(update_time, 1000);

	})();

	// Switch the theme

	$('a.button').click(function(){
		clock.toggleClass('light dark');
	});

});

$('#bulan').val('<?=date("m")?>');
$('#tahun').val('<?=date("Y")?>');
</script>