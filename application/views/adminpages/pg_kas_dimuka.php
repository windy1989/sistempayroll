<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<button class="btn btn-primary btn-raised btn-round" data-toggle="modal" data-target="#modalKas">
					<span class="material-icons">
						add_circle_outline
					</span>
					Tambah Pengajuan
				</button>
				<?php if($_SESSION['backjabatan'] == 'ADMIN'){ ?>
				<a class="btn btn-info btn-raised btn-round" href="<?=base_url()?>pegawai/kas_dimuka">
					<span class="material-icons">
						switch_account
					</span>
					Kas Pegawai
				</a>
				<?php } ?>
			</div>
			<div class="col-md-12">
				<div class="card">
					<div class="card-header card-header-icon" data-background-color="purple">
						<i class="material-icons">local_atm</i>
					</div>
					<div class="card-content">
						<h4 class="card-title">Daftar Kas Dimuka</h4>
						<div class="toolbar">
							<!--        Here you can write extra buttons/actions for the toolbar              -->
						</div>
						<div class="material-datatables">
							<table id="datakas" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
								<thead>
									<tr>
										<th>No</th>
										<th>Tgl.Req</th>
										<th>Tgl.Pakai</th>
										<th>Ket.</th>
										<th class="text-right">Total</th>
										<th class="text-center">Tgl.Kembali</th>
										<th class="text-center">Bukti</th>
										<th class="text-right">Terpakai</th>
										<th class="text-center">#</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									$no = 1;
									foreach($data as $row){ ?>
									<tr>
										<td><?=$no?></td>
										<td><?=$row['tanggal_request']?></td>
										<td><?=$row['untuk_tanggal']?></td>
										<td><?=$row['keterangan']?></td>
										<td class="text-right">Rp <?=number_format($row['nominal_total'],0,',','.')?></td>
										<td class="text-center"><?=$row['tanggal_kembali'] ? date('Y-m-d',strtotime($row['tanggal_kembali'])) : ''?></td>
										<td class="text-center">
											<?php if($row['bukti'] == ''){  ?>
											<a href="#" class="uploadbukti" data-toggle="modal" data-target="#modalBukti" data-id="<?=$row['id']?>"><i class="fa fa-upload" aria-hidden="true"></i></a>
											<?php }else{ ?>
											<span class="text-success">
											<i class="fa fa-check-square-o" aria-hidden="true"></i>
											</span>
											<?php } ?>
										</td>
										<td class="text-right">Rp <?=number_format($row['nominal_terpakai'],0,',','.')?></td>
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
										<th>No</th>
										<th>Tgl.Req</th>
										<th>Tgl.Pakai</th>
										<th>Ket.</th>
										<th class="text-right">Total</th>
										<th class="text-center">Tgl.Kembali</th>
										<th class="text-center">Bukti</th>
										<th class="text-right">Terpakai</th>
										<th class="text-center">#</th>
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
<div class="modal fade" id="modalKas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
					<form id="formpermintaankas" class="form-horizontal">
						<div class="card-header card-header-text" data-background-color="rose">
							<h4 class="card-title">Form Permintaan Kas Dimuka</h4>
						</div>
						<div class="card-content">
							<div class="row">
								<label class="col-sm-3 label-on-left">Tgl.Efektif</label>
								<div class="col-sm-9">
									<div class="form-group label-floating is-empty">
										<label class="control-label"></label>
										<input type="hidden" id="temp" name="temp">
										<input type="text" class="form-control datepicker" value="<?=date("Y-m-d")?>" id="tanggalefektif" name="tanggalefektif" autocomplete="off">
										<span class="help-block">Tanggal efektif sesuai bukti.</span>
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
										<span class="help-block">Nominal total yang dibutuhkan dalam satuan Rp.</span>
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
<div class="modal fade" id="modalBukti" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					<i class="material-icons">clear</i>
				</button>
				<h4 class="modal-title">Bukti Pembayaran</h4>
			</div>
			<div class="modal-body">
				<div class="card">
					<form id="formuploadbukti" class="form-horizontal">
						<div class="card-header card-header-text" data-background-color="rose">
							<h4 class="card-title">Upload Bukti</h4>
						</div>
						<div class="card-content">
							<div class="row">
								<label class="col-sm-3 label-on-left">Bukti</label>
								<div class="col-sm-9">
									<div class="fileinput text-center fileinput-new" data-provides="fileinput" style="padding-top:30px;">
										<div class="fileinput-new thumbnail">
											<img src="<?=base_url()?>assets/img/image_placeholder.jpg" alt="...">
										</div>
										<input type="hidden" id="tempbukti" name="tempbukti">
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
								<label class="col-sm-3 label-on-left">Nominal Terpakai</label>
								<div class="col-sm-9">
									<div class="form-group label-floating is-empty">
										<label class="control-label"></label>
										<input type="text" class="form-control autonumeric" id="nominalbukti" name="nominalbukti" autocomplete="off">
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
<script>

var table = $('#datakas').DataTable({
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

table.on('click', '.edit', function() {
	var id = $(this).data('id');
	
	Pace.restart();
	Pace.track(function () {
		$.ajax({
			method: "POST",
			url: "../admincrud/dapatkanKasDimuka",
			data: {id:id}
		}).done(function( data ) {
			$('#temp').val(data.id);
			$('#tanggalefektif').val(data.untuk_tanggal);
			AutoNumeric.set('#nominal',data.nominal_total);
			$('#keterangan').val(data.keterangan);
			
			$('#modalKas').modal('toggle');
			
			Pace.stop();
		});
	});
});

table.on('click', '.uploadbukti', function(e) {
	$('#tempbukti').val($(this).data('id'));
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
				url: "../admincrud/hapusKasDimuka",
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

$("#modalKas").on("hide.bs.modal", function () {
	$("#formpermintaankas")[0].reset();
	$('#temp').val('');
});

</script>