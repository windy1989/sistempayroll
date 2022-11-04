 <div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<button class="btn btn-primary btn-raised btn-round btn-just-icon" data-toggle="modal" data-target="#modalPegawaiPekerjaan">
					<span class="material-icons">
						add_circle_outline
					</span>
				</button>
			</div>
			<div class="col-md-12">
				<div class="card">
					<div class="card-header card-header-icon" data-background-color="purple">
						<i class="material-icons">badge</i>
					</div>
					<div class="card-content">
						<h4 class="card-title">Daftar Jabatan Pegawai</h4>
						<div class="toolbar">
							<!--        Here you can write extra buttons/actions for the toolbar              -->
						</div>
						<div class="material-datatables">
							<table id="datapegawaipekerjaan" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th>No.Pegawai</th>
										<th>Organisasi</th>
										<th>Level</th>
										<th>Posisi</th>
										<th>Status</th>
										<th>Cabang</th>
										<th class="disabled-sorting text-right">#</th>
									</tr>
								</thead>
								<tbody>
									<?php $no=1; foreach($data as $row){ ?>
									<tr>
										<td><?=$no?></td>
										<td><?=$row['NAMAPEGAWAI']?></td>
										<td><?=$row['no_pegawai']?></td>
										<td><?=$row['NAMAORGANISASI']?></td>
										<td><?=$row['NAMALEVEL']?></td>
										<td><?=$row['NAMAPOSISI']?></td>
										<td><?=$row['status_pekerja']?></td>
										<td><?=$row['NAMACABANG']?></td>
										<td class="text-right">
											<a href="javascript:void(0);" class="btn btn-simple btn-warning btn-icon view" data-id="<?=$row['id']?>"><i class="material-icons">visibility</i></a>
											<a href="javascript:void(0);" class="btn btn-simple btn-warning btn-icon edit" data-id="<?=$row['id']?>"><i class="material-icons">mode_edit_outline</i></a>
											<a href="javascript:void(0);" class="btn btn-simple btn-danger btn-icon remove" data-id="<?=$row['id']?>"><i class="material-icons">close</i></a>
										</td>
									</tr>
									<?php $no++; } ?>
								</tbody>
								<tfoot>
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th>No.Pegawai</th>
										<th>Organisasi</th>
										<th>Level</th>
										<th>Posisi</th>
										<th>Status</th>
										<th>Cabang</th>
										<th class="text-right">#</th>
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
<div class="modal fade" id="modalPegawaiPekerjaan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
					<form id="formpekerjaanpegawai" class="form-horizontal">
						<div class="card-header card-header-text" data-background-color="rose">
							<h4 class="card-title">Form Posisi Pegawai</h4>
						</div>
						<div class="card-content">
							<div class="row">
								<label class="col-sm-3 label-on-left">Pegawai</label>
								<div class="col-sm-9">
									<div class="form-group">
										<input type="hidden" id="temp" name="temp">
										<select class="form-control select2" id="pegawai" name="pegawai" style="width:100%;">
											<?php foreach($pegawai as $row){ ?>
											<option value="<?=$row['id']?>"><?=$row['nama_lengkap']?></option>
											<?php } ?>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<label class="col-sm-3 label-on-left">Nomor Pegawai</label>
								<div class="col-sm-7">
									<div class="form-group label-floating is-empty">
										<label class="control-label"></label>
										<input type="text" class="form-control" id="nomorpegawai" name="nomorpegawai" autocomplete="off" value="<?=$kodepegawai?>">
										<span class="help-block">Tekan tombol hijau. Format PEG{TAHUN}{NOMOR}</span>
									</div>
								</div>
								<div class="col-sm-2">
									<button class="btn btn-success btn-raised btn-round btn-just-icon" id="btn-generate-nopeg"><span class="material-icons">autorenew</span></button>
								</div>
							</div>
							<div class="row">
								<label class="col-sm-3 label-on-left">Organisasi</label>
								<div class="col-sm-9">
									<div class="form-group">
										<select class="form-control" id="organisasi" name="organisasi" style="width:100%;">
											<?php foreach($organisasi as $row){ ?>
											<option value="<?=$row['id']?>"><?=$row['nama']?></option>
											<?php } ?>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<label class="col-sm-3 label-on-left">Posisi</label>
								<div class="col-sm-9">
									<div class="form-group">
										<select class="form-control" id="posisi" name="posisi" style="width:100%;">
											<?php foreach($posisi as $row){ ?>
											<option value="<?=$row['id']?>"><?=$row['nama']?></option>
											<?php } ?>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<label class="col-sm-3 label-on-left">Level</label>
								<div class="col-sm-9">
									<div class="form-group">
										<select class="form-control" id="level" name="level" style="width:100%;">
											<?php foreach($level as $row){ ?>
											<option value="<?=$row['id']?>"><?=$row['nama']?></option>
											<?php } ?>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<label class="col-sm-3 label-on-left">Status Pekerja</label>
								<div class="col-sm-9">
									<div class="form-group">
										<select class="form-control" id="statuspekerja" name="statuspekerja" style="width:100%;">
											<option value="KONTRAK">Kontrak</option>
											<option value="TETAP">Tetap</option>
											<option value="PERCOBAAN">Percobaan</option>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<label class="col-sm-3 label-on-left">Cabang</label>
								<div class="col-sm-9">
									<div class="form-group">
										<select class="form-control" id="cabang" name="cabang" style="width:100%;">
											<?php foreach($cabang as $row){ ?>
											<option value="<?=$row['id']?>"><?=$row['nama'].' - '.$row['kota']?></option>
											<?php } ?>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<label class="col-sm-3 label-on-left">TMT</label>
								<div class="col-sm-4">
									<div class="form-group">
                                        <input type="text" class="form-control datepicker" value="<?=date("Y-m-d")?>" id="tanggalmulai" name="tanggalmulai" autocomplete="off">
										<span class="help-block">Tanggal mulai tugas</span>
                                    </div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
                                        <input type="text" class="form-control datepicker" value="<?=date("Y-m-d")?>" id="tanggalakhir" name="tanggalakhir" autocomplete="off">
										<span class="help-block">Tanggal selesai tugas</span>
                                    </div>
								</div>
							</div>
							<div class="row">
								<label class="col-md-3"></label>
								<div class="col-md-9">
									<div class="form-group form-button">
										<button type="submit" class="btn btn-fill btn-rose" id="simpanpegawai">Simpan</button>
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
	var table = $('#datapegawaipekerjaan').DataTable({
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
	
	$('.select2').select2({
		dropdownParent: $(".modal-body")
	});
	
	// Edit record
	table.on('click', '.edit', function() {
		var id = $(this).data('id');
		
		Pace.restart();
		Pace.track(function () {
			$.ajax({
				method: "POST",
				url: "../admincrud/dapatkanPekerjaanPegawai",
				data: {id:id}
			}).done(function( data ) {
				$('#temp').val(data.id);
				$('#pegawai').val(data.id_pegawai).trigger('change');
				$('#nomorpegawai').val(data.no_pegawai);
				$('#organisasi').val(data.id_organisasi);
				$('#posisi').val(data.id_posisi_pekerjaan);
				$('#level').val(data.id_posisi_level);
				$('#statuspekerja').val(data.status_pekerja);
				$('#cabang').val(data.id_cabang);
				$('#tanggalmulai').val(data.tanggal_mulai);
				$('#tanggalakhir').val(data.tanggal_selesai);
				
				$('#modalPegawaiPekerjaan').modal('toggle');
				Pace.stop();
			});
		});
	});
	
	$("#modalPegawaiPekerjaan").on("hide.bs.modal", function () {
		$("#formpekerjaanpegawai")[0].reset();
		$('#temp').val('');
		$('.select2 option:eq(0)').prop('selected',true).trigger('change');
		$("#formpekerjaanpegawai :input").prop("disabled", false);
	});
	
	// Delete a record
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
					url: "../admincrud/hapusPekerjaanPegawai",
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
	
	// View record
	table.on('click', '.view', function() {
		var id = $(this).data('id');
		
		Pace.restart();
		Pace.track(function () {
			$.ajax({
				method: "POST",
				url: "../admincrud/dapatkanPekerjaanPegawai",
				data: {id:id}
			}).done(function( data ) {
				$('#temp').val(data.id);
				$('#pegawai').val(data.id_pegawai).trigger('change');
				$('#nomorpegawai').val(data.no_pegawai);
				$('#organisasi').val(data.id_organisasi);
				$('#posisi').val(data.id_posisi_pekerjaan);
				$('#level').val(data.id_posisi_level);
				$('#statuspekerja').val(data.status_pekerja);
				$('#cabang').val(data.id_cabang);
				$('#tanggalmulai').val(data.tanggal_mulai);
				$('#tanggalakhir').val(data.tanggal_selesai);
				$("#formpekerjaanpegawai :input").prop("disabled", true);
				
				$('#modalPegawaiPekerjaan').modal('toggle');
				Pace.stop();
			});
		});
	});
</script>