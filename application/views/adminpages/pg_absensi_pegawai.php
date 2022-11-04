<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-2">
						<h5>Pilih Tanggal Cek</h5>
						<input type="text" class="form-control" value="<?=date("Y-m-d")?>" id="tanggalcekabsen" name="tanggalcekabsen" autocomplete="off">
					</div>
				</div>
				<div class="card">
					<div class="card-header card-header-text" data-background-color="rose">
						<h4 class="card-title">Data Absensi</h4>
					</div>
					<div class="card-content">
						<div class="row">
							<div class="col-md-12" id="tampil-rekap">
								<div class="material-datatables">
									<table id="dataabsensi" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
										<thead>
											<tr>
												<th>No</th>
												<th>Nama</th>
												<th>Info</th>
												<th>Masuk</th>
												<th>Istirahat</th>
												<th>Pulang</th>
											</tr>
										</thead>
										<tbody>
											<?php 
											$no = 1;
											foreach($data as $row){
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
												<td><?=$masuk?></td>
												<td><?=$istirahat_keluar?> s/d <?=$istirahat_masuk?></td>
												<td><?=$pulang?></td>
											</tr>
											<?php $no++; } ?>
										</tbody>
										<tfoot>
											<tr>
												<th>No</th>
												<th>Nama</th>
												<th>Info</th>
												<th>Masuk</th>
												<th>Istirahat</th>
												<th>Pulang</th>
											</tr>
										</tfoot>
									</table>
								</div>
								<script>
								$('#dataabsensi').DataTable({
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
								</script>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
$().ready(function() {
	$('#tanggalcekabsen').datetimepicker({
		format: 'YYYY-MM-DD',
		icons: {
			time: "fa fa-clock-o",
			date: "fa fa-calendar",
			up: "fa fa-chevron-up",
			down: "fa fa-chevron-down",
			previous: 'fa fa-chevron-left',
			next: 'fa fa-chevron-right',
			today: 'fa fa-screenshot',
			clear: 'fa fa-trash',
			close: 'fa fa-remove',
			inline: true
		}
	}).on('dp.change', function (e){  
		var tgl = $('#tanggalcekabsen').val();
		
		Pace.restart();
		Pace.track(function () {
			
			$.ajax({
				type: "POST",
				url: "../admincrud/lihatRekapAbsenTanggal",
				data: {tgl:tgl}
			}).done(function (data) {
				$('#tampil-rekap').html(data);
				
				Pace.stop();
			});
		});
	});
});
</script>