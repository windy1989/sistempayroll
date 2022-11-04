   <div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<button class="btn btn-primary btn-raised btn-round" data-toggle="modal" data-target="#modalAset">
					<span class="material-icons">
						add_circle_outline
					</span>
					Ajukan Aset
				</button>
				<?php if($_SESSION['backjabatan'] == 'ADMIN'){ ?>
				<button class="btn btn-secondary btn-raised btn-round" data-toggle="modal" data-target="#modalTambahAset">
					<span class="material-icons">
						add_circle_outline
					</span>
					Tambah Aset
				</button>
				<button class="btn btn-success btn-raised btn-round" data-toggle="modal" data-target="#modalTambahKategoriAset">
					<span class="material-icons">
						add_circle_outline
					</span>
					Tambah Kategori Aset
				</button>
				<a class="btn btn-info btn-warning btn-round" href="<?=base_url()?>pegawai/aset">
					<span class="material-icons">
						switch_account
					</span>
					Aset Pegawai
				</a>
				<?php } ?>
			</div>
			<div class="col-md-12">
				<div class="card">
					<div class="card-header card-header-icon" data-background-color="purple">
						<i class="material-icons">devices</i>
					</div>
					<div class="card-content">
						<h4 class="card-title">Daftar Aset</h4>
						<div class="toolbar">
							<!--        Here you can write extra buttons/actions for the toolbar              -->
						</div>
						<div class="material-datatables">
							<table id="dataaset" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
								<thead>
									<tr>
										<th>No</th>
										<th>Barang</th>
										<th>Tipe</th>
										<th>Pinjam</th>
										<th>Kembali</th>
										<th>Status</th>
										<th>#</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									$no = 1;
									foreach($listaset as $row){
									?>
									<tr>
										<td><?=$no?></td>
										<td><?=$row['namaaset']?></td>
										<td><?=$row['namatipe']?></td>
										<td><?=$row['tanggal_pinjam']?></td>
										<td>
											<?php
												if($row['tanggal_kembali']){
													echo $row['tanggal_kembali'];
												}else{
													echo 'Belum kembali';
												}
											?>
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
									<?php $no++; 
									} 
									?>
								</tbody>
								<tfoot>
									<tr>
										<th>No</th>
										<th>Barang</th>
										<th>Tipe</th>
										<th>Pinjam</th>
										<th>Kembali</th>
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
<div class="modal fade" id="modalAset" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					<i class="material-icons">clear</i>
				</button>
				<h4 class="modal-title">Pengajuan</h4>
			</div>
			<div class="modal-body">
				<div class="card">
					<form id="formaset" class="form-horizontal">
						<div class="card-header card-header-text" data-background-color="rose">
							<h4 class="card-title">Form Aset</h4>
						</div>
						<div class="card-content">
							<div class="row">
								<label class="col-sm-3 label-on-left">Daftar Aset</label>
								<div class="col-sm-9">
									<div class="form-group label-floating is-empty">
										<label class="control-label"></label>
										<input type="hidden" id="temp" name="temp">
										<select class="form-control select2" id="aset" name="aset" style="width:100%;">
											<option value="">Pilih tipe aset</option>
											<?php foreach($allaset as $row){ ?>
											<option value="<?=$row['id']?>"><?=$row['namaaset'].' - '.$row['namatipe']?></option>
											<?php } ?>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<label class="col-md-3"></label>
								<div class="col-md-9">
									<div class="form-group form-button">
										<button type="submit" class="btn btn-fill btn-rose">Ajukan</button>
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
<div class="modal fade" id="modalTambahAset" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
					<form id="formtambahaset" class="form-horizontal">
						<div class="card-header card-header-text" data-background-color="rose">
							<h4 class="card-title">Form Aset</h4>
						</div>
						<button class="btn btn-success float-right" id="refresh-form"><span class="material-icons">autorenew</span> Reset</button>
						<div class="card-content">
							<div class="row">
								<label class="col-sm-3 label-on-left">Daftar Kategori</label>
								<div class="col-sm-9">
									<div class="form-group label-floating is-empty">
										<label class="control-label"></label>
										<input type="hidden" id="tempaset" name="tempaset">
										<select class="form-control select2" id="kategoriaset" name="kategoriaset" style="width:100%;">
											<option value="">Pilih kategori</option>
											<?php foreach($allkategoriaset as $row){ ?>
											<option value="<?=$row['id']?>"><?=$row['nama']?></option>
											<?php } ?>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<label class="col-sm-3 label-on-left">Serial Number</label>
								<div class="col-sm-9">
									<div class="form-group label-floating is-empty">
                                        <input type="text" class="form-control" id="serialaset" name="serialaset">
										<span class="help-block">Kode serial produk.</span>
                                    </div>
								</div>
							</div>
							<div class="row">
								<label class="col-sm-3 label-on-left">Nama</label>
								<div class="col-sm-9">
									<div class="form-group label-floating is-empty">
                                        <input type="text" class="form-control" id="namaaset" name="namaaset">
										<span class="help-block">Nama barang.</span>
                                    </div>
								</div>
							</div>
							<div class="row">
								<label class="col-sm-3 label-on-left">Keterangan</label>
								<div class="col-sm-9">
									<div class="form-group label-floating is-empty">
										<label class="control-label"></label>
										<textarea class="form-control" id="keteranganaset" name="keteranganaset" autocomplete="off"></textarea>
										<span class="help-block">Keterangan tambahan</span>
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
				<?php if($allaset){ ?>
				<div class="table-responsive">
					<table class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%" id="dataallaset">
						<thead>
							<th>No</th>
							<th>Nama</th>
							<th>Kategori</th>
							<th>Serial</th>
							<th>Keterangan</th>
							<th>#</th>
						</thead>
						<tbody>
							<?php 
							$no = 1;
							
								foreach($allaset as $row){
								?>
								<tr>
									<td><?=$no?></td>
									<td><?=$row['namaaset']?></td>
									<td><?=$row['namatipe']?></td>
									<td><?=$row['serial_number']?></td>
									<td><?=$row['keterangan']?></td>
									<td>
										<?php if($row['status'] < 3){ ?>
											<a href="javascript:void(0);" class="btn btn-simple btn-warning btn-icon editaset" data-id="<?=$row['id']?>"><i class="material-icons">mode_edit_outline</i></a>
											<a href="javascript:void(0);" class="btn btn-simple btn-danger btn-icon removeaset" data-id="<?=$row['id']?>"><i class="material-icons">close</i></a>
										<?php } ?>
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
			<div class="modal-footer">
				<button type="button" class="btn btn-danger btn-simple" data-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>
<!--  End Modal -->
<div class="modal fade" id="modalTambahKategoriAset" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
					<form id="formtambahkategori" class="form-horizontal">
						<div class="card-header card-header-text" data-background-color="rose">
							<h4 class="card-title">Form Kategori Aset</h4>
						</div>
						<button class="btn btn-success float-right" id="refresh-form-kategori"><span class="material-icons">autorenew</span> Reset</button>
						<div class="card-content">
							<div class="row">
								<label class="col-sm-3 label-on-left">Nama Kategori</label>
								<div class="col-sm-9">
									<div class="form-group label-floating is-empty">
										<label class="control-label"></label>
										<input type="hidden" id="tempkategori" name="tempkategori">
										<input type="text" class="form-control" id="namakategori" name="namakategori">
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
				<?php if($allkategoriaset){ ?>
				<div class="table-responsive">
					<table class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%" id="dataallkategoriaset">
						<thead>
							<th>No</th>
							<th>Nama</th>
							<th>#</th>
						</thead>
						<tbody>
							<?php 
							$no = 1;
							
								foreach($allkategoriaset as $row){
								?>
								<tr>
									<td><?=$no?></td>
									<td><?=$row['nama']?></td>
									<td>
										<?php if($row['status'] < 3){ ?>
											<a href="javascript:void(0);" class="btn btn-simple btn-warning btn-icon editkategori" data-id="<?=$row['id']?>"><i class="material-icons">mode_edit_outline</i></a>
											<a href="javascript:void(0);" class="btn btn-simple btn-danger btn-icon removekategori" data-id="<?=$row['id']?>"><i class="material-icons">close</i></a>
										<?php } ?>
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
			<div class="modal-footer">
				<button type="button" class="btn btn-danger btn-simple" data-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>
<!--  End Modal -->
<script>

var table = $('#dataaset,#dataallaset,#dataallkategoriaset').DataTable({
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

$("#modalAset").on("hide.bs.modal", function () {
	$("#formaset")[0].reset();
	$('#temp').val('');
});


$("#modalTambahAset").on("hide.bs.modal", function () {
	$("#formtambahaset")[0].reset();
	$('#tempaset').val('');
});

$("#modalTambahKategoriAset").on("hide.bs.modal", function () {
	$("#formtambahkategori")[0].reset();
	$('#tempkategori').val('');
});

table.on('click', '.edit', function() {
	var id = $(this).data('id');
	
	Pace.restart();
	Pace.track(function () {
		$.ajax({
			method: "POST",
			url: "../admincrud/dapatkanPengajuanAset",
			data: {id:id}
		}).done(function( data ) {
			$('#temp').val(data.id);
			$('#aset').val(data.id_aset);
			
			$('#modalAset').modal('toggle');
			$('#modalAset').animate({ scrollTop: 0 }, 'slow');
			
			Pace.stop();
		});
	});
});

table.on('click', '.editaset', function() {
	var id = $(this).data('id');
	
	Pace.restart();
	Pace.track(function () {
		$.ajax({
			method: "POST",
			url: "../admincrud/dapatkanAset",
			data: {id:id}
		}).done(function( data ) {
			$('#tempaset').val(data.id);
			$('#kategoriaset').val(data.id_aset_kategori);
			$('#serialaset').val(data.serial_number);
			$('#namaaset').val(data.nama);
			$('#keteranganaset').val(data.keterangan);
			
			$('#modalTambahAset').animate({ scrollTop: 0 }, 'slow');
			
			Pace.stop();
		});
	});
});

table.on('click', '.editkategori', function() {
	var id = $(this).data('id');
	
	Pace.restart();
	Pace.track(function () {
		$.ajax({
			method: "POST",
			url: "../admincrud/dapatkanKategoriAset",
			data: {id:id}
		}).done(function( data ) {
			$('#tempkategori').val(data.id);
			$('#namakategori').val(data.nama);
			
			$('#modalTambahKategoriAset').animate({ scrollTop: 0 }, 'slow');
			
			Pace.stop();
		});
	});
});

$("#refresh-form").click(function(e){
	$("#formtambahaset")[0].reset();
	$('#tempaset').val('');
	e.preventDefault();
});

$("#refresh-form-kategori").click(function(e){
	$("#formtambahkategori")[0].reset();
	$('#tempkategori').val('');
	e.preventDefault();
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
				url: "../admincrud/hapusPengajuanAset",
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

table.on('click', '.removeaset', function(e) {
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
				url: "../admincrud/hapusAset",
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

table.on('click', '.removekategori', function(e) {
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
				url: "../admincrud/hapusKategoriAset",
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