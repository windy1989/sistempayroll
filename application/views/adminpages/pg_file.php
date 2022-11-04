   <div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<button class="btn btn-primary btn-raised btn-round" data-toggle="modal" data-target="#modalFile">
					<span class="material-icons">
						add_circle_outline
					</span>
					Tambah File
				</button>
				<?php if($_SESSION['backjabatan'] == 'ADMIN'){ ?>
				<a class="btn btn-info btn-warning btn-round" href="<?=base_url()?>pegawai/file">
					<span class="material-icons">
						switch_account
					</span>
					File Pegawai
				</a>
				<?php } ?>
			</div>
			<div class="col-md-12">
				<div class="card">
					<div class="card-header card-header-icon" data-background-color="purple">
						<i class="material-icons">folder</i>
					</div>
					<div class="card-content">
						<h4 class="card-title">Daftar File</h4>
						<div class="toolbar">
							<!--        Here you can write extra buttons/actions for the toolbar              -->
						</div>
						<div class="material-datatables">
							<table id="datafile" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
								<thead>
									<tr>
										<th>No</th>
										<th>Tgl.Upload</th>
										<th>Pemilik</th>
										<th>Judul</th>
										<th>Keterangan</th>
										<th>Berkas</th>
										<th>Status</th>
										<th>#</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									$no = 1;
									foreach($listfile as $row){
										if($row['id_pegawai'] == $_SESSION['backuserid'] || ($row['status'] == 3 && $row['hak_akses'] == "UMUM")){
									?>
									<tr>
										<td><?=$no?></td>
										<td><?=$row['tanggal_upload']?></td>
										<td><?=$row['namapegawai']?></td>
										<td><?=$row['judul']?></td>
										<td><?=$row['keterangan']?></td>
										<td class="text-center">
											<?php if($row['nama_file']){?>
											<a href="<?=base_url()?>assets/upload/file/<?=$row['nama_file']?>" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i></a>
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
											<?php if($row['status'] < 3 && $row['id_pegawai'] == $_SESSION['backuserid']){ ?>
												<a href="javascript:void(0);" class="btn btn-simple btn-warning btn-icon edit" data-id="<?=$row['id']?>"><i class="material-icons">mode_edit_outline</i></a>
												<a href="javascript:void(0);" class="btn btn-simple btn-danger btn-icon remove" data-id="<?=$row['id']?>"><i class="material-icons">close</i></a>
											<?php } ?>
										</td>
									</tr>
									<?php $no++; 
										}
									} 
									?>
								</tbody>
								<tfoot>
									<tr>
										<th>No</th>
										<th>Tgl.Upload</th>
										<th>Pemilik</th>
										<th>Judul</th>
										<th>Keterangan</th>
										<th>Berkas</th>
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
<div class="modal fade" id="modalFile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
					<form id="formfile" class="form-horizontal">
						<div class="card-header card-header-text" data-background-color="rose">
							<h4 class="card-title">Form File Baru</h4>
						</div>
						<div class="card-content">
							<div class="alert alert-success">
								<b>Perhatian!</b> File yang bisa diunggah hanyalah file dalam bentuk <b>PDF</b> dengan maksimal ukuran <b>10Mb</b>.
							</div>
							<div class="row">
								<label class="col-sm-3 label-on-left">Judul</label>
								<div class="col-sm-9">
									<div class="form-group label-floating is-empty">
										<label class="control-label"></label>
										<input type="hidden" id="temp" name="temp">
										<input type="text" class="form-control" id="judul" name="judul" autocomplete="off">
										<span class="help-block">Info utama file yang ingin diunggah.</span>
									</div>
								</div>
							</div>
							<div class="row">
								<label class="col-sm-3 label-on-left">Keterangan</label>
								<div class="col-sm-9">
									<div class="form-group label-floating is-empty">
										<label class="control-label"></label>
										<textarea class="form-control" id="keterangan" name="keterangan" autocomplete="off"></textarea>
										<span class="help-block">Keterangan tambahan</span>
									</div>
								</div>
							</div>
							<div class="row">
								<label class="col-sm-3 label-on-left">Berkas</label>
								<div class="col-sm-9">
									<div class="fileinput text-center fileinput-new" data-provides="fileinput" style="padding-top:30px;">
										<div class="fileinput-new thumbnail">
											<img src="<?=base_url()?>assets/img/image_placeholder.jpg" alt="...">
										</div>
										<div class="fileinput-preview fileinput-exists thumbnail" style=""></div>
										<div>
											<span class="btn btn-rose btn-round btn-file">
												<span class="fileinput-new">Pilih Berkas</span>
												<span class="fileinput-exists">Ganti</span>
												<input type="file" name="uploadbukti" id="uploadbukti" accept="application/pdf">
											<div class="ripple-container"></div></span>
											<a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Hapus<div class="ripple-container"><div class="ripple ripple-on ripple-out" style="left: 21.7344px; top: 12px; background-color: rgb(255, 255, 255); transform: scale(15.5488);"></div></div></a>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<label class="col-sm-3 label-on-left">Hak Akses</label>
								<div class="col-sm-9 checkbox-radios">
									<div class="radio">
										<label>
											<input type="radio" name="opsiakses" checked="true" value="PERSONAL"><span class="circle"></span><span class="check"></span> Personal
										</label>
									</div>
									<div class="radio">
										<label>
											<input type="radio" name="opsiakses" value="UMUM"><span class="circle"></span><span class="check"></span> Umum
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
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger btn-simple" data-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>
<!--  End Modal -->
<script>

var table = $('#datafile').DataTable({
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
			url: "../admincrud/dapatkanFile",
			data: {id:id}
		}).done(function( data ) {
			$('#temp').val(data.id);
			$('#judul').val(data.judul);
			$('#keterangan').val(data.keterangan);
			$("input[name=opsiakses][value=" + data.hak_akses + "]").prop('checked', true);
			
			$('#modalFile').modal('toggle');
			$('#modalFile').animate({ scrollTop: 0 }, 'slow');
			
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
				url: "../admincrud/hapusFile",
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

$("#modalFile").on("hide.bs.modal", function () {
	$("#formfile")[0].reset();
	$('#temp').val('');
});

$('#uploadbukti').on('change', function() {
	if (this.files[0].size > 10485760) {
		swal({
		  title: 'Ups!',
		  text: 'File anda lebih dari 10Mb',
		  type: 'error'
		});
		this.val('');
	}
});
</script>