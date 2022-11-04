<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<button class="btn btn-primary btn-raised btn-round" data-toggle="modal" data-target="#modalPinjaman">
					<span class="material-icons">
						add_circle_outline
					</span>
					Ajukan Pinjaman
				</button>
				<button class="btn btn-danger btn-raised btn-round" data-toggle="modal" data-target="#modalRekap">
					<span class="material-icons">
						summarize
					</span>
					Rekap & Pembayaran
				</button>
				<?php if($_SESSION['backjabatan'] == 'ADMIN'){ ?>
				<a class="btn btn-info btn-warning btn-round" href="<?=base_url()?>pegawai/pinjaman">
					<span class="material-icons">
						switch_account
					</span>
					Pinjaman Pegawai
				</a>
				<?php } ?>
			</div>
			<div class="col-md-12">
				<div class="card">
					<div class="card-header card-header-icon" data-background-color="purple">
						<i class="material-icons">credit_score</i>
					</div>
					<div class="card-content">
						<h4 class="card-title">Daftar Pinjaman</h4>
						<div class="toolbar">
							<!--        Here you can write extra buttons/actions for the toolbar              -->
						</div>
						<div class="material-datatables">
							<table id="datapinjaman" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
								<thead>
									<tr>
										<th>No</th>
										<th>No.Pengajuan</th>
										<th>Keterangan</th>
										<th>Tanggal</th>
										<th class="text-right">Nominal</th>
										<th class="text-center">Tenor</th>
										<th class="text-center">Bunga</th>
										<th>#</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									$no = 1;
									foreach($data as $row){ ?>
									<tr>
										<td><?=$no?></td>
										<td><?=$row['no_transaksi']?></td>
										<td><?=$row['keterangan']?></td>
										<td><?=$row['terhitung_tanggal']?></td>
										<td class="text-right">Rp <?=number_format($row['nominal_total'],0,',','.')?></td>
										<td class="text-center"><?=$row['tenor']?> bulan</td>
										<td class="text-center"><?=$row['bunga']?>%</td>
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
										<th>No.Pengajuan</th>
										<th>Keterangan</th>
										<th>Tanggal</th>
										<th>Nominal</th>
										<th>Tenor</th>
										<th>Bunga</th>
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
<div class="modal fade" id="modalPinjaman" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
					<form id="formpinjaman" class="form-horizontal">
						<div class="card-header card-header-text" data-background-color="rose">
							<h4 class="card-title">Form Permohonan Pinjaman</h4>
						</div>
						<div class="card-content">
							<div class="alert alert-success">
								<b>Perhatian!</b> Bunga saat ini untuk pinjaman adalah 1,5% dari total pinjaman ditambahkan pada potongan gaji setiap bulannya sesuai tenor yang dipilih.
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
								<label class="col-sm-3 label-on-left">Tenor</label>
								<div class="col-sm-9">
									<div class="form-group label-floating is-empty">
										<label class="control-label"></label>
										<select class="form-control" id="tenor" name="tenor" style="width:100%;">
											<option value="">Pilih salah satu...</option>
											<option value="3">3 Bulan</option>
											<option value="6">6 Bulan</option>
											<option value="12">12 Bulan</option>
											<option value="24">24 Bulan</option>
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
				<h4 class="modal-title">Rekap & Pembayaran</h4>
			</div>
			<div class="modal-body">
				<div class="card">
					<div class="card-header card-header-text" data-background-color="rose">
						<h4 class="card-title">Rekap</h4>
					</div>
					<div class="card-content">
						<div class="alert alert-success">
							Pembayaran (termasuk bunga) otomatis dimasukkan pada saat slip gaji dibuat setiap bulannya.
						</div>
						<?php if($cicilan){ ?>
						<div class="table-responsive">
							<table class="table">
								<thead>
									<th>No</th>
									<th>Transaksi</th>
									<th>Pinjaman/Terbayar</th>
									<th>%</th>
									<!-- <th>Bayar</th> -->
								</thead>
								<tbody>
									<?php 
									$no = 1;
									foreach($cicilan as $row){
									?>
									<tr>
										<td><?=$no?></td>
										<td><?=$row['no_transaksi']?></td>
										<td>
											Rp <?=number_format($row['nominal_total'],0,',','.').' / Rp '.number_format($row['terbayar'],0,',','.')?>
											<p>
												<div class="progress">
												  <div class="progress-bar" role="progressbar" aria-valuenow="<?=number_format(($row['terbayar']/$row['nominal_total'])*100,2)?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=number_format(($row['terbayar']/$row['nominal_total'])*100,2)?>%;">
													<?=number_format((($row['terbayar'] - ($row['bunga'] * $row['tenor'] * $row['nominal_total'] / 100))/$row['nominal_total'])*100,0) < 0 ? 0 : number_format((($row['terbayar'] - ($row['bunga'] * $row['tenor'] * $row['nominal_total'] / 100))/$row['nominal_total'])*100,0) ?>%
												  </div>
												</div>
											</p>
										</td>
										<td>
											<span class="label label-info" style="font-size:15px;"><?=number_format((($row['terbayar'] - ($row['bunga'] * $row['tenor'] * $row['nominal_total'] / 100))/$row['nominal_total'])*100,0) < 0 ? 0 : number_format((($row['terbayar'] - ($row['bunga'] * $row['tenor'] * $row['nominal_total'] / 100))/$row['nominal_total'])*100,0) ?>%</span>
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
<script>

var table = $('#datapinjaman').DataTable({
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
			url: "../admincrud/dapatkanPinjaman",
			data: {id:id}
		}).done(function( data ) {
			$('#temp').val(data.id);
			$('#tanggalefektif').val(data.terhitung_tanggal);
			AutoNumeric.set('#nominal',data.nominal_total);
			$('#tenor').val(data.tenor);
			$('#keterangan').val(data.keterangan);
			
			$('#modalPinjaman').modal('toggle');
			
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
				url: "../admincrud/hapusPinjaman",
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

$("#modalPinjaman").on("hide.bs.modal", function () {
	$("#formpinjaman")[0].reset();
	$('#temp').val('');
});
</script>