 <div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header card-header-icon" data-background-color="purple">
						<i class="material-icons">badge</i>
					</div>
					<div class="card-content">
						<h4 class="card-title">Daftar Benefit Pegawai</h4>
						<div class="toolbar">
							<!--        Here you can write extra buttons/actions for the toolbar              -->
						</div>
						<div class="material-datatables">
							<table id="datapegawaibenefit" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
								<thead>
									<tr>
										<th width="5%">No</th>
										<th width="10%">Nama</th>
										<th width="15%">Benefit</th>
										<th width="10%">Tanggal</th>
										<th width="10%">Bukti</th>
										<th width="25%">Keterangan</th>
										<th width="15%">Nominal</th>
										<th width="10%">#</th>
									</tr>
								</thead>
								<tbody>
									<?php $no=1; foreach($data as $row){ ?>
									<tr>
										<td><?=$no?></td>
										<td><?=$row['namapegawai']?></td>
										<td><?=$row['namabenefit']?></td>
										<td><?=$row['tanggal_request']?></td>
										<td class="text-center"><a href="<?=base_url()?>get/bukti/benefit/<?=$row['id']?>" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
										<td><?=$row['keterangan']?></td>
										<td class="text-right">Rp <?=number_format($row['nominal'],0,',','.')?>,-</td>
										<td class="text-center">
											<select class="ijinbenefit" data-target="<?=$row['id']?>">
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
										<th width="5%">No</th>
										<th width="10%">Nama</th>
										<th width="15%">Benefit</th>
										<th width="10%">Tanggal</th>
										<th width="10%">Bukti</th>
										<th width="25%">Keterangan</th>
										<th width="15%">Nominal</th>
										<th width="10%">#</th>
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
<script>
	var table = $('#datapegawaibenefit').DataTable({
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
	
	table.on('focus', '.ijinbenefit', function(e) {
		$.data(this, 'val', $(this).val());
	});

	table.on('change', '.ijinbenefit', function(e) {
		var id = $(this).data('target'), thisoption = $(this), newVal = $(this).val();
		
		if (!confirm("Yakin ingin mengganti status?")) {
			thisoption.val($.data(this, 'val')); //set back
			return;                           //abort!
		}else{
			Pace.restart();
			Pace.track(function () {
				$.ajax({
					method: "POST",
					url: "../admincrud/updateIjinBenefit",
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