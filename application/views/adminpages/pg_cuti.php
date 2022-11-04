 <div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<button class="btn btn-primary btn-raised btn-round" data-toggle="modal" data-target="#modalCuti">
					<span class="material-icons">
						add_circle_outline
					</span>
					Ajukan Cuti
				</button>
				<button class="btn btn-danger btn-raised btn-round" data-toggle="modal" data-target="#modalRekap">
					<span class="material-icons">
						summarize
					</span>
					Rekap Cuti
				</button>
				<?php if($_SESSION['backjabatan'] == 'ADMIN'){ ?>
				<button class="btn btn-info btn-raised btn-round" data-toggle="modal" data-target="#modalTipe">
					<span class="material-icons">
						category
					</span>
					Tipe Cuti / Ijin
				</button>
				<a class="btn btn-info btn-warning btn-round" href="<?=base_url()?>pegawai/cuti">
					<span class="material-icons">
						switch_account
					</span>
					Cuti Pegawai
				</a>
				<?php } ?>
			</div>
			<div class="col-md-12">
				<div class="card">
					<div class="card-header card-header-icon" data-background-color="purple">
						<i class="material-icons">event_busy</i>
					</div>
					<div class="card-content">
						<h4 class="card-title">Daftar Cuti</h4>
						<div class="toolbar">
							<!--        Here you can write extra buttons/actions for the toolbar              -->
						</div>
						<div class="material-datatables">
							<table id="datacuti" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
								<thead>
									<tr>
										<th>No</th>
										<th>Tgl.Req</th>
										<th>Tgl.Pakai</th>
										<th>Bukti</th>
										<th>Ket.</th>
										<th>Tipe</th>
										<th>Status</th>
										<th>#</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									$no = 1;
									foreach($listcuti as $row){
									?>
									<tr>
										<td><?=$no?></td>
										<td><?=$row['tanggal_tambah']?></td>
										<td><?=$row['tanggal']?></td>
										<td class="text-center">
											<?php if($row['bukti']){?>
											<a href="<?=base_url()?>get/bukti/cuti/<?=$row['id']?>" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i></a>
											<?php }else{ ?>
											<i class="fa fa-hourglass-half" aria-hidden="true"></i>
											<?php } ?>
										</td>
										<td><?=$row['keterangan']?></td>
										<td><?=$row['namaijin']?></td>
										<td>
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
										<td>
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
										<th>Bukti</th>
										<th>Ket.</th>
										<th>Tipe</th>
										<th>Status</th>
										<th>#</th>
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
<div class="modal fade" id="modalCuti" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
					<form id="formcuti" class="form-horizontal">
						<div class="card-header card-header-text" data-background-color="rose">
							<h4 class="card-title">Form Permohonan Cuti/Ijin</h4>
						</div>
						<div class="card-content">
							<div class="alert alert-success">
								<b>Perhatian!</b> Silahkan cek ketersediaan ijin/cuti pada fitur Rekap Cuti, angka tersebut adalah batas ijin/cuti selama 1 tahun dari perusahaan.
							</div>
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
								<label class="col-sm-3 label-on-left">Tipe</label>
								<div class="col-sm-9">
									<div class="form-group label-floating is-empty">
										<label class="control-label"></label>
										<select class="form-control" id="tipe" name="tipe" style="width:100%;">
											<?php
												foreach($listijin as $row){
													echo '<option value="'.$row['id'].'">'.$row['nama'].'</option>';
												}
											?>
										</select>
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
<div class="modal fade" id="modalRekap" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					<i class="material-icons">clear</i>
				</button>
				<h4 class="modal-title">Rekap Cuti & Ijin</h4>
			</div>
			<div class="modal-body">
				<div class="card">
					<div class="card-header card-header-text" data-background-color="rose">
						<h4 class="card-title">Rekap</h4>
					</div>
					<div class="card-content">
						<?php if($rekap){ ?>
						<div class="table-responsive">
							<table class="table">
								<thead>
									<th>No</th>
									<th>Ijin</th>
									<th>Durasi/Terpakai</th>
									<th>%</th>
									<!-- <th>Bayar</th> -->
								</thead>
								<tbody>
									<?php 
									$no = 1;
									foreach($rekap as $row){
									?>
									<tr>
										<td><?=$no?></td>
										<td><?=$row['namaijin']?></td>
										<td>
											<?=number_format($row['durasi'],0,',','.').' / '.number_format($row['terpakai'],0,',','.')?>
											<p>
												<div class="progress">
												  <div class="progress-bar" role="progressbar" aria-valuenow="<?=number_format(($row['terpakai']/$row['durasi'])*100,2)?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=number_format(($row['terpakai']/$row['durasi'])*100,2)?>%;">
													<?=number_format(($row['terpakai']/$row['terpakai'])*100,0)?>%
												  </div>
												</div>
											</p>
										</td>
										<td>
											<span class="label label-info" style="font-size:15px;"><?=number_format(($row['terpakai']/$row['durasi'])*100,2)?>%</span>
										</td>
										<!-- <td style="font-size:30px;">
											<a href="<?=base_url()?>bayar/pinjaman/<?=$row['no_transaksi']?>"><i class="fa fa-money" aria-hidden="true"></i></a>
										</td> -->
									</tr>
									<?php 
									$no++;
									} 
									?>
								</tbody>
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
			<div class="modal-footer">
				<button type="button" class="btn btn-danger btn-simple" data-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="modalTipe" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					<i class="material-icons">clear</i>
				</button>
				<h4 class="modal-title">Tambah/Edit</h4>
			</div>
			<div class="modal-body">
				<div class="card">
					<form id="formtipecuti" class="form-horizontal">
						<div class="card-header card-header-text" data-background-color="rose">
							<h4 class="card-title">Form Tipe Ijin/Cuti</h4>
						</div>
						<button class="btn btn-success float-right" id="refresh-form-tipe"><span class="material-icons">autorenew</span> Reset</button>
						<div class="card-content">
							<div class="row">
								<label class="col-sm-3 label-on-left">Nama</label>
								<div class="col-sm-9">
									<div class="form-group label-floating is-empty">
										<label class="control-label"></label>
										<input type="hidden" id="temptipe" name="temptipe">
										<input type="text" class="form-control" id="nama" name="nama" autocomplete="off">
										<span class="help-block">Ex. Cuti Operasi</span>
									</div>
								</div>
							</div>
							<div class="row">
								<label class="col-sm-3 label-on-left">Durasi</label>
								<div class="col-sm-9">
									<div class="form-group label-floating is-empty">
										<label class="control-label"></label>
										<input type="number" class="form-control" id="durasi" name="durasi" autocomplete="off">
										<span class="help-block">Nominal limit setiap tahunnya</span>
									</div>
								</div>
							</div>
							<div class="row">
								<label class="col-sm-3 label-on-left">Tipe</label>
								<div class="col-sm-9 checkbox-radios">
									<div class="radio">
										<label>
											<input type="radio" name="tipecuti" value="Ijin" checked="true"> Ijin
										</label>
									</div>
									<div class="radio">
										<label>
											<input type="radio" name="tipecuti" value="Cuti"> Cuti
										</label>
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
				<div class="row" style="padding:20px !important;">
					<div class="material-datatables">
						<table id="datatipecuti" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama</th>
									<th>Durasi</th>
									<th>Tipe</th>
									<th>#</th>
								</tr>
							</thead>
							<tbody>
								<?php $no=1; foreach($listijin as $row){ ?>
								<tr>
									<td><?=$no?></td>
									<td><?=$row['nama']?></td>
									<td><?=$row['durasi']?> / tahun</td>
									<td><?=$row['tipe']?></td>
									<td class="text-right">
										<a href="javascript:void(0);" class="btn btn-simple btn-warning btn-icon editcuti" data-id="<?=$row['id']?>"><i class="material-icons">mode_edit_outline</i></a>
										<a href="javascript:void(0);" class="btn btn-simple btn-danger btn-icon removecuti" data-id="<?=$row['id']?>"><i class="material-icons">close</i></a>
									</td>
								</tr>
								<?php $no++; } ?>
							</tbody>
							<tfoot>
								<tr>
									<th>No</th>
									<th>Nama</th>
									<th>Durasi</th>
									<th>Tipe</th>
									<th>#</th>
								</tr>
							</tfoot>
						</table>
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

var table = $('#datacuti,#datatipecuti').DataTable({
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
			url: "../admincrud/dapatkanCuti",
			data: {id:id}
		}).done(function( data ) {
			$('#temp').val(data.id);
			$('#tanggalefektif').val(data.tanggal);
			$('#tipe').val(data.id_ijin);
			$('#keterangan').val(data.keterangan);
			
			$('#modalCuti').modal('toggle');
			
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
				url: "../admincrud/hapusCuti",
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

$("#modalCuti").on("hide.bs.modal", function () {
	$("#formcuti")[0].reset();
	$('#temp').val('');
});

$("#refresh-form-tipe").click(function(e){
	$("#formtipecuti")[0].reset();
	$('#temptipe').val('');
	e.preventDefault();
});

$("#modalTipe").on("hide.bs.modal", function () {
	$("#formtipecuti")[0].reset();
	$('#temptipe').val('');
});

table.on('click', '.editcuti', function() {
	var id = $(this).data('id');
	
	Pace.restart();
	Pace.track(function () {
		$.ajax({
			method: "POST",
			url: "../admincrud/dapatkanTipeCuti",
			data: {id:id}
		}).done(function( data ) {
			$('#temptipe').val(data.id);
			$('#nama').val(data.nama);
			$('#durasi').val(data.durasi);
			$('#keterangan').val(data.tipe);
			
			$('#modalTipe').animate({ scrollTop: 0 }, 'slow');
			
			Pace.stop();
		});
	});
});

table.on('click', '.removecuti', function(e) {
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
				url: "../admincrud/hapusTipeCuti",
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

</script>