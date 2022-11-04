  <div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<button class="btn btn-primary btn-raised btn-round" data-toggle="modal" data-target="#modalLembur">
					<span class="material-icons">
						add_circle_outline
					</span>
					Ajukan Lembur
				</button>
				<button class="btn btn-danger btn-raised btn-round" data-toggle="modal" data-target="#modalRekap">
					<span class="material-icons">
						summarize
					</span>
					Rekap Lembur
				</button>
				<?php if($_SESSION['backjabatan'] == 'ADMIN'){ ?>
				<a class="btn btn-info btn-warning btn-round" href="<?=base_url()?>pegawai/lembur">
					<span class="material-icons">
						switch_account
					</span>
					Lembur Pegawai
				</a>
				<?php } ?>
			</div>
			<div class="col-md-12">
				<div class="card">
					<div class="card-header card-header-icon" data-background-color="purple">
						<i class="material-icons">schedule</i>
					</div>
					<div class="card-content">
						<h4 class="card-title">Daftar Lembur</h4>
						<div class="toolbar">
							<!--        Here you can write extra buttons/actions for the toolbar              -->
						</div>
						<div class="material-datatables">
							<table id="datalembur" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
								<thead>
									<tr>
										<th>No</th>
										<th>Tanggal</th>
										<th>Alasan</th>
										<th>Menit</th>
										<th class="text-center">Bukti</th>
										<th>Status</th>
										<th>#</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									$no = 1;
									foreach($listlembur as $row){
									?>
									<tr>
										<td><?=$no?></td>
										<td><?=$row['tanggal']?></td>
										<td><?=$row['alasan']?></td>
										<td><?=$row['nilai']?></td>
										<td class="text-center">
											<?php if($row['bukti']){?>
											<a href="<?=base_url()?>get/bukti/lembur/<?=$row['id']?>" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i></a>
											<?php }else{ ?>
											<i class="fa fa-hourglass-half" aria-hidden="true"></i>
											<?php } ?>
										</td>
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
										<th>Tanggal</th>
										<th>Alasan</th>
										<th>Menit</th>
										<th class="text-center">Bukti</th>
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
<div class="modal fade" id="modalLembur" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
					<form id="formpengajuanlembur" class="form-horizontal">
						<div class="card-header card-header-text" data-background-color="rose">
							<h4 class="card-title">Form Permohonan Lembur</h4>
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
								<label class="col-sm-3 label-on-left">Jumlah</label>
								<div class="col-sm-9">
									<div class="form-group label-floating is-empty">
                                        <input type="text" class="form-control" id="menit" name="menit" value="00:00" />
										<span class="help-block">Menit overtime.</span>
                                    </div>
								</div>
							</div>
							<div class="row">
								<label class="col-sm-3 label-on-left">Alasan</label>
								<div class="col-sm-9">
									<div class="form-group label-floating is-empty">
										<label class="control-label"></label>
										<textarea class="form-control" id="alasan" name="alasan" autocomplete="off"></textarea>
										<span class="help-block">Alasan lembur.</span>
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
				<h4 class="modal-title">Rekap Lembur</h4>
			</div>
			<div class="modal-body">
				<div class="card">
					<div class="card-header card-header-text" data-background-color="rose">
						<h4 class="card-title">Rekap</h4>
					</div>
					<div class="card-content">
						<?php if($rekap){ ?>
						<div class="table-responsive">
							<table id="datarekaplembur" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
								<thead>
									<th>No</th>
									<th>Bulan</th>
									<th>Tot.Jam:Menit</th>
								</thead>
								<tbody>
									<?php 
									$no = 1;
									foreach($rekap as $row){
									?>
									<tr>
										<td><?=$no?></td>
										<td><?=$row['tahun'].'-'.sprintf("%02d",$row['bulan'])?></td>
										<td>
											<?=$row['total']?>
										</td>
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

var table = $('#datalembur,#datarekaplembur').DataTable({
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

$(document).ready(function(){
	$('#menit').datetimepicker({format: 'HH:mm'});
})

table.on('click', '.edit', function() {
	var id = $(this).data('id');
	
	Pace.restart();
	Pace.track(function () {
		$.ajax({
			method: "POST",
			url: "../admincrud/dapatkanLembur",
			data: {id:id}
		}).done(function( data ) {
			$('#temp').val(data.id);
			$('#tanggalefektif').val(data.tanggal);
			$('#menit').val(data.nilai);
			$('#alasan').val(data.alasan);
			
			$('#modalLembur').modal('toggle');
			
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
				url: "../admincrud/hapusLembur",
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

$("#modalLembur").on("hide.bs.modal", function () {
	$("#formpengajuanlembur")[0].reset();
	$("#menit").val('00:00');
	$('#temp').val('');
});


</script>