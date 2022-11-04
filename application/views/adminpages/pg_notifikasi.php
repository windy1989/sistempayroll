 <div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header card-header-icon" data-background-color="purple">
						<i class="material-icons">badge</i>
					</div>
					<div class="card-content">
						<h4 class="card-title">Daftar Notifikasi</h4>
						<div class="toolbar">
							<!--        Here you can write extra buttons/actions for the toolbar              -->
						</div>
						<div class="material-datatables">
							<table id="datanotifikasi" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
								<thead>
									<tr>
										<th>No</th>
										<th>Judul</th>
										<th>Isi</th>
										<th>Waktu</th>
									</tr>
								</thead>
								<tbody>
									<?php $no=1; foreach($daftarpesan as $row){ ?>
									<tr>
										<td><?=$no?></td>
										<td><?=$row['judul']?></td>
										<td><?=$row['isi']?></td>
										<td><?=$row['tanggal']?></td>
									</tr>
									<?php $no++; } ?>
								</tbody>
								<tfoot>
									<tr>
										<th>No</th>
										<th>Judul</th>
										<th>Isi</th>
										<th>Waktu</th>
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
	var table = $('#datanotifikasi').DataTable({
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
</script>