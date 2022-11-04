   <div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<button class="btn btn-primary btn-raised btn-round" data-toggle="modal" data-target="#modalBenefit">
					<span class="material-icons">
						add_circle_outline
					</span>
					Tambah Benefit
				</button>
				<a class="btn btn-info btn-warning btn-round" href="<?=base_url()?>pegawai/benefit">
					<span class="material-icons">
						switch_account
					</span>
					Benefit Pegawai
				</a>
			</div>
			<div class="col-md-12">
				<div class="card">
					<div class="card-header card-header-icon" data-background-color="purple">
						<i class="material-icons">health_and_safety</i>
					</div>
					<div class="card-content">
						<h4 class="card-title">Daftar Benefit</h4>
						<div class="toolbar">
							<!--        Here you can write extra buttons/actions for the toolbar              -->
						</div>
						<div class="material-datatables">
							<table id="databenefit" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th>Periode</th>
										<th>Keterangan</th>
										<th class="text-right">Limit/Plafon</th>
										<th>#</th>
									</tr>
								</thead>
								<tbody>
									<?php $no=1; foreach($data as $row){ ?>
									<tr>
										<td><?=$no?></td>
										<td><?=$row['nama']?></td>
										<td><?=$row['berlaku_awal'].' s/d '.$row['berlaku_akhir']?></td>
										<td><?=$row['keterangan']?></td>
										<td class="text-right">Rp <?=number_format($row['nominal_cover'],0,'.',',')?></td>
										<td>
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
										<th>Periode</th>
										<th>Keterangan</th>
										<th class="text-right">Limit/Plafon</th>
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
<div class="modal fade" id="modalBenefit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					<i class="material-icons">clear</i>
				</button>
				<h4 class="modal-title">Tambar / Edit</h4>
			</div>
			<div class="modal-body">
				<div class="card">
					<form id="formbenefit" class="form-horizontal">
						<div class="card-header card-header-text" data-background-color="rose">
							<h4 class="card-title">Form Benefit</h4>
						</div>
						<div class="card-content">
							<div class="row">
								<label class="col-sm-3 label-on-left">Nama Benefit</label>
								<div class="col-sm-9">
									<div class="form-group label-floating is-empty">
										<label class="control-label"></label>
										<input type="hidden" id="temp" name="temp">
										<input type="text" class="form-control" id="nama" name="nama" autocomplete="off">
										<span class="help-block">Ex. Asuransi AIA</span>
									</div>
								</div>
							</div>
							<div class="row">
								<label class="col-sm-3 label-on-left">Berlaku</label>
								<div class="col-sm-4">
									<div class="form-group">
                                        <input type="text" class="form-control datepicker" value="<?=date("Y-m-d")?>" id="tanggalmulai" name="tanggalmulai" autocomplete="off">
										<span class="help-block">Mulai</span>
                                    </div>
								</div>
								<label class="col-sm-1 label-on-right">s/d</label>
								<div class="col-sm-4">
									<div class="form-group">
                                        <input type="text" class="form-control datepicker" value="<?=date("Y-m-d")?>" id="tanggalakhir" name="tanggalakhir" autocomplete="off">
										<span class="help-block">Akhir</span>
                                    </div>
								</div>
							</div>
							<div class="row">
								<label class="col-sm-3 label-on-left">Keterangan</label>
								<div class="col-sm-9">
									<div class="form-group label-floating is-empty">
										<label class="control-label"></label>
										<textarea class="form-control" id="keterangan" name="keterangan" autocomplete="off"></textarea>
										<span class="help-block">Tambahan keterangan mengenai benefit</span>
									</div>
								</div>
							</div>
							<div class="row">
								<label class="col-sm-3 label-on-left">Nominal Plafon</label>
								<div class="col-sm-9">
									<div class="form-group label-floating is-empty">
										<label class="control-label"></label>
										<input type="text" class="form-control autonumeric" id="plafon" name="plafon" autocomplete="off">
										<span class="help-block">Plafon nilai maksimal benefit yang disediakan perusahaan</span>
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

// Edit record
table.on('click', '.edit', function() {
	var id = $(this).data('id');
	
	Pace.restart();
	Pace.track(function () {
		$.ajax({
			method: "POST",
			url: "../admincrud/dapatkanBenefit",
			data: {id:id}
		}).done(function( data ) {
			$('#temp').val(data.id);
			$('#nama').val(data.nama);
			$('#tanggalmulai').val(data.berlaku_awal);
			$('#tanggalakhir').val(data.berlaku_akhir);
			$('#keterangan').val(data.keterangan);
			AutoNumeric.set('#plafon',data.nominal_cover);
			$('#modalBenefit').modal('toggle');
			Pace.stop();
		});
	});
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
				url: "../admincrud/hapusBenefit",
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
			url: "../admincrud/dapatkanBenefit",
			data: {id:id}
		}).done(function( data ) {
			$('#temp').val(data.id);
			$('#nama').val(data.nama);
			$('#tanggalmulai').val(data.berlaku_awal);
			$('#tanggalakhir').val(data.berlaku_akhir);
			$('#keterangan').val(data.keterangan);
			$('#plafon').val(data.nominal_cover);
			
			$("#formbenefit :input").prop("disabled", true);
			$('#modalBenefit').modal('toggle');
			Pace.stop();
		});
	});
});

$("#modalBenefit").on("hide.bs.modal", function () {
    $("#formbenefit")[0].reset();
	$('#temp').val('');
	$("#formbenefit :input").prop("disabled", false);
});
</script> 