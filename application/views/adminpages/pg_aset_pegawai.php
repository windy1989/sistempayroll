<style>
	select option[value="1"] {
	  background: rgba(242, 245, 66, 0.3);
	}

	select option[value="2"] {
	  background: rgba(247, 98, 82, 0.3);
	}

	select option[value="3"] {
	  background: rgba(79, 240, 101, 0.3);
	}
</style>
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header card-header-icon" data-background-color="purple">
						<i class="material-icons">badge</i>
					</div>
					<div class="card-content">
						<h4 class="card-title">Aset Semua Pegawai</h4>
						<div class="toolbar">
							<!--        Here you can write extra buttons/actions for the toolbar              -->
						</div>
						<div class="material-datatables">
							<table id="dataasetpegawai" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
								<thead>
									<tr>
										<th>No</th>
										<th>Pegawai</th>
										<th>Barang</th>
										<th>Tipe</th>
										<th class="text-center">Pinjam</th>
										<th class="text-center">Kembali</th>
										<th class="text-center">#</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									$no = 1;
									foreach($data as $row){
									?>
									<tr>
										<td><?=$no?></td>
										<td><?=$row['namapegawai']?></td>
										<td><?=$row['namaaset']?></td>
										<td><?=$row['namatipe']?></td>
										<td class="text-center"><?=$row['tanggal_pinjam']?></td>
										<td class="text-center">
											<?php
												if($row['tanggal_kembali']){
													echo $row['tanggal_kembali'];
												}else{
											?>
												<a href="javascript:void(0);" class="btn btn-simple btn-warning btn-icon editkembali" data-id="<?=$row['id']?>"><i class="material-icons">volunteer_activism</i></a>
											<?php
												}
											?>
										</td>
										<td class="text-center">
											<select class="ijinaset" data-target="<?=$row['id']?>">
												<option value="0">Hapus</value>
												<option value="1" <?=$row['status'] == 1 ? 'selected' : ''?>>Menunggu</value>
												<option value="2" <?=$row['status'] == 2 ? 'selected' : ''?>>Menolak</value>
												<option value="3" <?=$row['status'] == 3 ? 'selected' : ''?>>Menyetujui</value>
											</select>
										</td>
									</tr>
									<?php $no++; 
									} 
									?>
								</tbody>
								<tfoot>
									<tr>
										<th>No</th>
										<th>Pegawai</th>
										<th>Barang</th>
										<th>Tipe</th>
										<th class="text-center">Pinjam</th>
										<th class="text-center">Kembali</th>
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
<script>

var table = $('#dataasetpegawai').DataTable({
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

table.on('focus', '.ijinaset', function(e) {
	$.data(this, 'val', $(this).val());
});

table.on('change', '.ijinaset', function(e) {
	var id = $(this).data('target'), thisoption = $(this), newVal = $(this).val();
	
	if (!confirm("Yakin ingin mengganti status?")) {
		thisoption.val($.data(this, 'val')); //set back
		return;                           //abort!
	}else{
		Pace.restart();
		Pace.track(function () {
			$.ajax({
				method: "POST",
				url: "../admincrud/updateIjinAset",
				data: {id:id,val:newVal}
			}).done(function( data ) {
				swal({
					title: "Yay!",
					text: "Status berhasil diubah!",
					type: "success",
					allowOutsideClick: false
				}).then(function () {
					location.reload();
				});
			});
		});
	}
	
	$.data(this, 'val', newVal);
});

table.on('click', '.editkembali', function(e) {
	var id = $(this).data('id');
	
	swal({
		title: 'Yakin?',
		text: 'Anda ingin mencatat bahwa barang ini sudah kembali ??!',
		type: 'warning',
		showCancelButton: true,
		confirmButtonText: 'Ya, sudah kembali!',
		cancelButtonText: 'Jangan dulu!',
		confirmButtonClass: "btn btn-success",
		cancelButtonClass: "btn btn-danger",
		buttonsStyling: false
	}).then(function() {
		Pace.restart();
		Pace.track(function () {
			$.ajax({
				method: "POST",
				url: "../admincrud/kembaliAset",
				data: {id:id}
			}).done(function( data ) {
				swal({
					title: 'Yeay!',
					text: 'Aset berhasil dikembalikan dan disimpan.',
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