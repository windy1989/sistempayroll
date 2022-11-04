<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<button class="btn btn-primary btn-raised btn-round" data-toggle="modal" data-target="#modalBenefit">
					<span class="material-icons">
						add_circle_outline
					</span>
					Tambah Pengajuan
				</button>
				<button class="btn btn-danger btn-raised btn-round" data-toggle="modal" data-target="#modalLimit">
					<span class="material-icons">
						speed
					</span>
					Cek Limit
				</button>
			</div>
			<div class="col-md-12">
				<div class="card">
					<div class="card-header card-header-icon" data-background-color="purple">
						<i class="material-icons">health_and_safety</i>
					</div>
					<div class="card-content">
						<h4 class="card-title">Daftar Pengajuan Benefit</h4>
						<div class="toolbar">
							<!--        Here you can write extra buttons/actions for the toolbar              -->
						</div>
						<div class="material-datatables">
							<table id="databenefit" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
								<thead>
									<tr>
										<th width="5%">No</th>
										<th width="15%">Nama</th>
										<th width="10%">Berlaku</th>
										<th width="10%" class="text-center">Bukti</th>
										<th width="25%">Keterangan</th>
										<th width="15%" class="text-right">Nominal</th>
										<th width="10%" class="text-center">Status</th>
										<th width="10%" class="text-right">#</th>
									</tr>
								</thead>
								<tbody>
									<?php $no=1; foreach($infobenefit as $row){ ?>
									<tr>
										<td><?=$no?></td>
										<td><?=$row['nama']?></td>
										<td><?=$row['berlaku_awal']?> s/d <?=$row['berlaku_akhir']?></td>
										<td class="text-center"><a href="<?=base_url()?>get/bukti/benefit/<?=$row['id']?>" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
										<td><?=$row['keterangan']?></td>
										<td class="text-right">Rp <?=number_format($row['nominal'],0,',','.')?>,-</td>
										<td class="text-center">
											<?php 
												if($row['status'] == 1){
													echo '<button class="btn btn-warning btn-round btn-fab btn-fab-mini"><i class="fa fa-hourglass-half" aria-hidden="true"></i></button>';
												}elseif($row['status'] == 2){
													echo '<button class="btn btn-danger btn-round btn-fab btn-fab-mini"><i class="fa fa-times" aria-hidden="true"></i></button>';
												}elseif($row['status'] == 3){
													echo '<button class="btn btn-success btn-round btn-fab btn-fab-mini"><i class="fa fa-check" aria-hidden="true"></i></button>';
												}
											?>
										</td>
										<td class="text-right">
											<?php if($row['status'] < 3){ ?>
											<a href="javascript:void(0);" class="btn btn-simple btn-warning btn-icon edit" data-id="<?=$row['id']?>"><i class="material-icons">mode_edit_outline</i></a>
											<a href="javascript:void(0);" class="btn btn-simple btn-danger btn-icon remove" data-id="<?=$row['id']?>"><i class="material-icons">close</i></a>
											<?php } ?>
										</td>
									</tr>
									<?php $no++; } ?>
								</tbody>
								<tfoot>
									<tr>
										<th width="5%">No</th>
										<th width="15%">Nama</th>
										<th width="10%">Berlaku</th>
										<th width="10%" class="text-center">Bukti</th>
										<th width="25%">Keterangan</th>
										<th width="15%" class="text-right">Nominal</th>
										<th width="10%" class="text-center">Status</th>
										<th width="10%" class="text-right">#</th>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
					<!-- end content-->
				</div>
				<!--  end card  -->
			</div>
			<!-- end col-md-12 -->
		</div>
		<!-- end row -->
	</div>
</div>
<!-- Classic Modal -->
<div class="modal fade" id="modalBenefit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					<i class="material-icons">clear</i>
				</button>
				<h4 class="modal-title">Tambah/Edit</h4>
			</div>
			<div class="modal-body">
				<div class="card">
					<form id="formpermintaanbenefit" class="form-horizontal">
						<div class="card-header card-header-text" data-background-color="rose">
							<h4 class="card-title">Form Klaim Benefit</h4>
						</div>
						<div class="card-content">
							<div class="row">
								<label class="col-sm-3 label-on-left">Nama</label>
								<div class="col-sm-9">
									<div class="form-group label-floating is-empty">
										<label class="control-label"></label>
										<input type="hidden" id="temp" name="temp">
										<select class="form-control select2" id="benefit" name="benefit" style="width:100%;">
											<option value="">Pilih tipe benefit</option>
											<?php foreach($tipebenefit as $row){ ?>
											<option value="<?=$row['id']?>"><?=$row['nama'].' Berlaku : '.$row['berlaku_awal'].' s/d '.$row['berlaku_akhir']?></option>
											<?php } ?>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<label class="col-sm-3 label-on-left">Saldo Benefit</label>
								<div class="col-sm-9">
									<span class="btn btn-info" id="saldobenefit">0</span>.
								</div>
							</div>
							<div class="row">
								<label class="col-sm-3 label-on-left">Bukti</label>
								<div class="col-sm-9">
									<div class="fileinput text-center fileinput-new" data-provides="fileinput" style="padding-top:30px;">
										<div class="fileinput-new thumbnail">
											<img src="<?=base_url()?>assets/img/image_placeholder.jpg" alt="...">
										</div>
										<div class="fileinput-preview fileinput-exists thumbnail" style=""></div>
										<div>
											<span class="btn btn-rose btn-round btn-file">
												<span class="fileinput-new">Pilih gambar</span>
												<span class="fileinput-exists">Ganti</span>
												<input type="file" name="uploadbukti" id="uploadbukti" accept="image/*">
											<div class="ripple-container"></div></span>
											<a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Hapus<div class="ripple-container"><div class="ripple ripple-on ripple-out" style="left: 21.7344px; top: 12px; background-color: rgb(255, 255, 255); transform: scale(15.5488);"></div></div></a>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<label class="col-sm-3 label-on-left">Keterangan</label>
								<div class="col-sm-9">
									<div class="form-group label-floating is-empty">
										<label class="control-label"></label>
										<textarea class="form-control" id="keterangan" name="keterangan" autocomplete="off"></textarea>
										<span class="help-block">Keterangan tambahan.</span>
									</div>
								</div>
							</div>
							<div class="row">
								<label class="col-sm-3 label-on-left">Nominal</label>
								<div class="col-sm-9">
									<div class="form-group label-floating is-empty">
										<label class="control-label"></label>
										<input type="text" class="form-control autonumeric" id="nominal" name="nominal" autocomplete="off">
										<span class="help-block">Nominal dalam satuan Rp.</span>
									</div>
								</div>
							</div>
							
							<div class="row">
								<label class="col-md-3"></label>
								<div class="col-md-9">
									<div class="form-group form-button">
										<button type="submit" class="btn btn-fill btn-rose">Simpan</button>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger btn-simple" data-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>
<!--  End Modal -->
<!-- Classic Modal -->
<div class="modal fade" id="modalLimit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					<i class="material-icons">clear</i>
				</button>
				<h4 class="modal-title">Lihat Limit Cover Benefit</h4>
			</div>
			<div class="modal-body">
				<div class="card">
					<div class="card-content">
						<?php if($limitbenefit){ ?>
						<div class="table-responsive">
							<table class="table">
								<thead>
									<th>No</th>
									<th>Benefit</th>
									<th>Plafon/Terpakai</th>
									<th>%</th>
								</thead>
								<tbody>
									<?php 
									$no = 1;
									
										foreach($limitbenefit as $row){
										?>
										<tr>
											<td><?=$no?></td>
											<td><?=$row['nama']?></td>
											<td>
												Rp <?=number_format($row['nominal_cover'],0,',','.').' / Rp '.number_format($row['terpakai'],0,',','.')?>
												<p>
													<div class="progress">
													  <div class="progress-bar" role="progressbar" aria-valuenow="<?=number_format(($row['terpakai']/$row['nominal_cover'])*100,2)?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=number_format(($row['terpakai']/$row['nominal_cover'])*100,2)?>%;">
														<?=number_format(($row['terpakai']/$row['nominal_cover'])*100,0)?>%
													  </div>
													</div>
												</p>
											</td>
											<td>
												<span class="label label-info" style="font-size:15px;"><?=number_format(($row['terpakai']/$row['nominal_cover'])*100,2)?>%</span>
											</td>
										</tr>
										<?php 
										$no++;
										}
									?>
								</tbody>
							</table>
						</div>
						<?php 
						}else{
							echo 'Data kosong!';
						}
						?>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger btn-simple" data-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>
<!--  End Modal -->
<script>
//LAMAN PEGAWAI

var table = $('#databenefit').DataTable({
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

$("#modalBenefit").on("hide.bs.modal", function () {
	$("#formpermintaanbenefit")[0].reset();
	$('#temp').val('');
});

$("#benefit").change(function(e){
	var tipe = $(this).val();
	
	if(tipe !== ''){
		Pace.restart();
		Pace.track(function () {
			$.ajax({
				method: "POST",
				url: "../admincrud/cekSaldoBenefit",
				data: {tipe:tipe}
			}).done(function( data ) {
				if(data == '-1'){
					$('#saldobenefit').text('Benefit telah kadaluarsa!');
				}else{
					$('#saldobenefit').text(data);
				}
				
				Pace.stop();
			});
		});
	}
});

table.on('click', '.edit', function() {
	var id = $(this).data('id');
	
	Pace.restart();
	Pace.track(function () {
		$.ajax({
			method: "POST",
			url: "../admincrud/dapatkanBenefitPegawai",
			data: {id:id}
		}).done(function( data ) {
			$('#temp').val(data.id);
			$('#benefit').val(data.id_benefit);
			AutoNumeric.set('#nominal',data.nominal);
			$('#keterangan').val(data.keterangan);
			$('#modalBenefit').modal('toggle');
			$('#modalBenefit').animate({ scrollTop: 0 }, 'slow');
			
			Pace.stop();
		});
	});
});

table.on('click', '.remove', function(e) {
	var id = $(this).data('id');
	
	swal({
		title: 'Yakin?',
		text: 'Anda tidak akan bisa mengembalikan data ini!',
		type: 'warning',
		showCancelButton: true,
		confirmButtonText: 'Ya, hapus!',
		cancelButtonText: 'Jangan dulu!',
		confirmButtonClass: "btn btn-success",
		cancelButtonClass: "btn btn-danger",
		buttonsStyling: false
	}).then(function() {
		Pace.restart();
		Pace.track(function () {
			$.ajax({
				method: "POST",
				url: "../admincrud/hapusBenefitPegawai",
				data: {id:id}
			}).done(function( data ) {
				swal({
					title: 'Terhapus!',
					text: 'Data berhasil dihapus.',
					type: 'success'
				});
				
				location.reload();
			});
		});
		Pace.stop();
	}, function(dismiss) {
	  if (dismiss === 'cancel') {
		swal({
		  title: 'Tercancel',
		  text: 'Data anda aman :)',
		  type: 'error'
		})
		Pace.stop();
	  }
	});
});

//END FORM PEGAWAI
</script>