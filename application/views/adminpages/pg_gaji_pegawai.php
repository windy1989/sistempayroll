<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="col-sm-3">
						<div class="form-group">
							<select class="form-control select2" id="pegawai" name="pegawai" style="width:100%;">
								<option value="">Pilih salah satu...</option>
								<?php foreach($pegawai as $row){ ?>
								<option value="<?=$row['id']?>"><?=$row['nama_lengkap']?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="col-sm-9">
						<button class="btn btn-primary btn-raised btn-round" data-toggle="modal" data-target="#modalKomponen">
							<span class="material-icons">
								add_circle_outline
							</span>
							Komponen Gaji
						</button>
						<button class="btn btn-secondary btn-raised btn-round" data-toggle="modal" data-target="#modalPajak">
							<span class="material-icons">
								request_quote
							</span>
							Proses Pajak Tahunan
						</button>
					</div>
				</div>
			</div>
			<div class="col-md-8">
				<div class="card">
					<div class="card-header card-header-icon" data-background-color="purple">
						<i class="material-icons">badge</i>
					</div>
					<div class="card-content">
						<h4 class="card-title">Komponen Gaji</h4>
						<div class="toolbar">
							<!--        Here you can write extra buttons/actions for the toolbar              -->
						</div>
						<div class="material-datatables" id="tampil">
							<div class="alert alert-success text-center">
								<b>Perhatian!</b> Silahkan pilih salah satu pegawai untuk menampilkan atau mengatur komponen upah pegawai.
							</div>
						</div>
					</div>
					<!-- end content-->
				</div>
				<!--  end card  -->
			</div>
			<!-- end col-md-12 -->
			<div class="col-md-4">
				<div class="card">
					<div class="card-header card-header-icon" data-background-color="purple">
						<i class="material-icons">badge</i>
					</div>
					<div class="card-content">
						<h4 class="card-title">Proses Payroll</h4>
						<input type="text" class="monthpicker form-control" value="<?=date("Y-m")?>" id="tahunbulangaji" name="tahunbulangaji" autocomplete="off">
						<button class="btn btn-success btn-raised btn-round btn-block" id="prosespayroll">
							<span class="material-icons">
								card_giftcard
							</span>
							Proses Payroll
						</button>
					</div>
					<!-- end content-->
				</div>
				<!--  end card  -->
			</div>
		</div>
		<!-- end row -->
	</div>
</div>
<div class="modal fade" id="modalKomponen" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
					<form id="formkomponenupah" class="form-horizontal">
						<div class="card-header card-header-text" data-background-color="rose">
							<h4 class="card-title">Form Komponen Upah Baru</h4>
						</div>
						<button class="btn btn-success float-right" id="refresh-form"><span class="material-icons">autorenew</span> Reset</button>
						<div class="card-content">
							<div class="row">
								<label class="col-sm-3 label-on-left">Nama</label>
								<div class="col-sm-9">
									<div class="form-group label-floating is-empty">
										<label class="control-label"></label>
										<input type="hidden" id="temp" name="temp">
										<input type="text" class="form-control" id="nama" name="nama" autocomplete="off">
										<span class="help-block">Nama Komponen Upah.</span>
									</div>
								</div>
							</div>
							<div class="row">
								<label class="col-sm-3 label-on-left">Tipe</label>
								<div class="col-sm-9 checkbox-radios">
									<div class="radio">
										<label>
											<input type="radio" name="opsitipe" checked="true" value="1"><span class="circle"></span><span class="check"></span> Penambah
										</label>
									</div>
									<div class="radio">
										<label>
											<input type="radio" name="opsitipe" value="2"><span class="circle"></span><span class="check"></span> Pengurang
										</label>
									</div>
								</div>
							</div>
							<div class="row">
								<label class="col-sm-3 label-on-left"></label>
								<div class="col-sm-9 checkbox-radios">
									<div class="checkbox">
										<label>
											<input type="checkbox" name="pajak" checked="checked" id="pajak"> Termasuk Pajak
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
				<?php if($allkomponen){ ?>
				<div class="table-responsive">
					<table class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%" id="dataallkomponen">
						<thead>
							<th>No</th>
							<th>Nama</th>
							<th>Tipe</th>
							<th>Pajak</th>
							<th>#</th>
						</thead>
						<tbody>
							<?php 
							$no = 1;
								foreach($allkomponen as $row){
								?>
								<tr>
									<td><?=$no?></td>
									<td><?=$row['nama']?></td>
									<td>
										<?php
											if($row['tipe'] == 1){
												echo 'Penambah/Debet';
											}else{
												echo 'Pengurang/Kredit';
											}
										?>
									</td>
									<td>
										<?php
											if($row['termasuk_pajak'] == 1){
												echo 'Termasuk';
											}else{
												echo 'Tidak';
											}
										?>
									</td>
									<td>
										<a href="javascript:void(0);" class="btn btn-simple btn-warning btn-icon editkomponen" data-id="<?=$row['id']?>"><i class="material-icons">mode_edit_outline</i></a>
										<a href="javascript:void(0);" class="btn btn-simple btn-danger btn-icon removekomponen" data-id="<?=$row['id']?>"><i class="material-icons">close</i></a>
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
<div class="modal fade" id="modalPajak" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					<i class="material-icons">clear</i>
				</button>
				<h4 class="modal-title">Proses Pajak Tahunan</h4>
			</div>
			<div class="modal-body">
				
				Pilih Tahun Pajak
				<select class="form-control" id="tahunpajak" name="tahunpajak" style="width:100%">
					<?php for($i = date('Y') - 3;$i < date('Y') + 3;$i++){ ?>
					<option value="<?=$i?>" <?=$i == date('Y') ? 'selected' : ''?>><?=$i?></option>
					<?php } ?>
				</select>
				<button class="btn btn-success btn-raised btn-round" id="prosespajak">
					<span class="material-icons">
						card_giftcard
					</span>
					Proses Pajak
				</button>
					
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger btn-simple" data-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>
<script>

var table = $('#dataallkomponen').DataTable({
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

$('.select2').select2();

$("#refresh-form").click(function(e){
	$("#formkomponenupah")[0].reset();
	$('#temp').val('');
	e.preventDefault();
});

table.on('click', '.editkomponen', function() {
	var id = $(this).data('id');
	
	Pace.restart();
	Pace.track(function () {
		$.ajax({
			method: "POST",
			url: "../admincrud/dapatkanKomponenUpah",
			data: {id:id}
		}).done(function( data ) {
			$('#temp').val(data.id);
			$('#nama').val(data.nama);
			$("input[name=opsitipe][value='" + data.tipe + "']").prop("checked",true);
			
			if(data.termasuk_pajak == 1){
				$('#pajak').prop('checked', true);
			}else{
				$('#pajak').prop('checked', false);
			}
			
			$('#modalKomponen').animate({ scrollTop: 0 }, 'slow');
			
			Pace.stop();
		});
	});
});

table.on('click', '.removekomponen', function(e) {
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
				url: "../admincrud/hapusKomponenUpah",
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

$("#pegawai").change(function (){
	var id = $(this).val();
	
	if($('#pegawai').val() !== ''){
		Pace.restart();
		Pace.track(function () {
			$.ajax({
				method: "POST",
				url: "../admincrud/dapatkanKomponenPegawai",
				data: {id:id}
			}).done(function( data ) {
				$('#tampil').html(data);
				
				Pace.stop();
			});
		});
	}
});

$("#prosespayroll").click(function(e){
	swal({
		title: 'Yakin Ingin Proses?',
		text: 'Proses akan memakan waktu agak lama, dimohon bersabar!',
		type: 'warning',
		showCancelButton: true,
		confirmButtonText: 'Ya, proses!',
		cancelButtonText: 'Jangan dulu!',
		confirmButtonClass: "btn btn-success",
		cancelButtonClass: "btn btn-danger",
		buttonsStyling: false
	}).then(function() {
		Pace.restart();
		Pace.track(function () {
			var tahunbulan = $('#tahunbulangaji').val();
			
			$.ajax({
				method: "POST",
				url: "../admincrud/prosesPayroll",
				data: {tahunbulan : tahunbulan}
			}).done(function( data ) {
				if( data !== ''){
					swal({
					  title: 'Error',
					  type: 'error',
					  html: data
					});
				}else{
					swal({
						title: 'Terkirim!',
						text: 'Informasi pembayaran gaji telah dikirimkan.',
						type: 'success'
					});
				}
				
				Pace.stop();
			});
		});
		
	}, function(dismiss) {
	  if (dismiss === 'cancel') {
		swal({
		  title: 'Tercancel',
		  text: 'Ga jadi ya:)',
		  type: 'error'
		})
		Pace.stop();
	  }
	});
});
$(document).ready(function() {
	$('.monthpicker').datetimepicker({
		format: 'YYYY-MM',
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
	 });
});
$("#prosespajak").click(function(e){
	swal({
		title: 'Yakin Ingin Proses?',
		text: 'Proses akan memakan waktu agak lama, dimohon bersabar!',
		type: 'warning',
		showCancelButton: true,
		confirmButtonText: 'Ya, proses!',
		cancelButtonText: 'Jangan dulu!',
		confirmButtonClass: "btn btn-success",
		cancelButtonClass: "btn btn-danger",
		buttonsStyling: false
	}).then(function() {
		Pace.restart();
		Pace.track(function () {
			$.ajax({
				method: "POST",
				url: "../admincrud/prosesPajak",
				data: {tahun:$('#tahunpajak').val()}
			}).done(function( data ) {
				if( data !== ''){
					swal({
					  title: 'Error',
					  type: 'error',
					  html: data
					});
				}else{
					swal({
						title: 'Terkirim!',
						text: 'Informasi pembayaran gaji telah dikirimkan.',
						type: 'success'
					});
				}
				
				Pace.stop();
			});
		});
		
	}, function(dismiss) {
	  if (dismiss === 'cancel') {
		swal({
		  title: 'Tercancel',
		  text: 'Ga jadi ya:)',
		  type: 'error'
		})
		Pace.stop();
	  }
	});
});
</script>