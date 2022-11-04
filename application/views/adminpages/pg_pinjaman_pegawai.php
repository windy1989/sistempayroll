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
						<h4 class="card-title">Pinjaman Semua Pegawai</h4>
						<div class="toolbar">
							<!--        Here you can write extra buttons/actions for the toolbar              -->
						</div>
						<div class="material-datatables">
							<table id="datapinjamanpegawai" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
								<thead>
									<tr>
										<th>No</th>
										<th>Pegawai</th>
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
										<td><?=$row['namapegawai']?></td>
										<td><?=$row['no_transaksi']?></td>
										<td><?=$row['keterangan']?></td>
										<td><?=$row['terhitung_tanggal']?></td>
										<td class="text-right">Rp <?=number_format($row['nominal_total'],0,',','.')?></td>
										<td class="text-center"><?=$row['tenor']?> bulan</td>
										<td class="text-center"><?=$row['bunga']?>%</td>
										<td>
											<select class="ijinpinjaman" data-target="<?=$row['id']?>">
												<option value="0">Hapus</value>
												<option value="1" <?=$row['status'] == 1 ? 'selected' : ''?>>Menunggu</value>
												<option value="2" <?=$row['status'] == 2 ? 'selected' : ''?>>Menolak</value>
												<option value="3" <?=$row['status'] == 3 ? 'selected' : ''?>>Menyetujui</value>
											</select>
										</td>
									</tr>
									<?php $no++; } ?>
								</tbody>
								<tfoot>
									<tr>
										<th>No</th>
										<th>Pegawai</th>
										<th>No.Pengajuan</th>
										<th>Keterangan</th>
										<th>Tanggal</th>
										<th class="text-right">Nominal</th>
										<th class="text-center">Tenor</th>
										<th class="text-center">Bunga</th>
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
<script>

var table = $('#datapinjamanpegawai').DataTable({
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

table.on('focus', '.ijinpinjaman', function(e) {
	$.data(this, 'val', $(this).val());
});

table.on('change', '.ijinpinjaman', function(e) {
	var id = $(this).data('target'), thisoption = $(this), newVal = $(this).val();
	
	if (!confirm("Yakin ingin mengganti status?")) {
		thisoption.val($.data(this, 'val')); //set back
		return;                           //abort!
	}else{
		Pace.restart();
		Pace.track(function () {
			$.ajax({
				method: "POST",
				url: "../admincrud/updateIjinPinjaman",
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
</script>