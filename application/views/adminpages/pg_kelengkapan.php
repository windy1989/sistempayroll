<div class="content">
	<div class="container-fluid">
		<div class="col-sm-12">
			<div class="nav-center">
				<ul class="nav nav-pills nav-pills-warning nav-pills-icons" role="tablist">
					<li class="active">
						<a href="#1" role="tab" data-toggle="tab">
							<i class="material-icons">family_restroom</i> Keluarga
						</a>
					</li>
					<li>
						<a href="#2" role="tab" data-toggle="tab">
							<i class="material-icons">school</i> Pendidikan
						</a>
					</li>
					<li>
						<a href="#3" role="tab" data-toggle="tab">
							<i class="material-icons">work</i> Pengalaman
						</a>
					</li>
					<li>
						<a href="#4" role="tab" data-toggle="tab">
							<i class="material-icons">engineering</i> Posisi
						</a>
					</li>
				</ul>
			</div>
			<div class="tab-content">
				<div class="tab-pane active" id="1">
					<div class="card">
						<div class="card-header">
							<!-- <h4 class="card-title">Description about product</h4>
							<p class="category">
								More information here
							</p> -->
						</div>
						<div class="card-content row">
							<div class="col-md-12">
								<button class="btn btn-primary btn-raised btn-round" data-toggle="modal" data-target="#modalKeluarga">
									<span class="material-icons">
										add_circle_outline
									</span>
									Tambah Keluarga
								</button>
								<div class="card">
									<div class="card-header card-header-text" data-background-color="purple">
										<h4 class="card-title">Data Keluarga</h4>
									</div>
									<div class="card-content">
										<div class="table-responsive">
											<table id="datakeluarga" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
												<thead>
													<tr>
														<th>No</th>
														<th>Nama</th>
														<th>Relasi</th>
														<th>Kontak</th>
														<th>Alamat</th>
														<th>#</th>
													</tr>
												</thead>
												<tbody>
													<?php $no=1; foreach($keluarga as $row){ ?>
													<tr>
														<td><?=$no?></td>
														<td><?=$row['nama_lengkap']?></td>
														<td><?=$row['RELASI']?></td>
														<td><?=$row['kontak_darurat']?></td>
														<td><?=$row['alamat']?></td>
														<td class="text-right">
															<a href="javascript:void(0);" class="btn btn-simple btn-warning btn-icon editkeluarga" data-id="<?=$row['id']?>"><i class="material-icons">mode_edit_outline</i></a>
															<a href="javascript:void(0);" class="btn btn-simple btn-danger btn-icon removekeluarga" data-id="<?=$row['id']?>"><i class="material-icons">close</i></a>
														</td>
													</tr>
													<?php $no++; } ?>
												</tbody>
												<tfoot>
													<tr>
														<th>No</th>
														<th>Nama</th>
														<th>Relasi</th>
														<th>Kontak</th>
														<th>Alamat</th>
														<th>#</th>
													</tr>
												</tfoot>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="tab-pane" id="2">
					<div class="card">
						<div class="card-header">
							<!-- <h4 class="card-title">Description about product</h4>
							<p class="category">
								More information here
							</p> -->
						</div>
						<div class="card-content row">
							<div class="col-md-12">
								<button class="btn btn-primary btn-raised btn-round" data-toggle="modal" data-target="#modalPendidikan">
									<span class="material-icons">
										add_circle_outline
									</span>
									Tambah Pendidikan
								</button>
								<div class="card">
									<div class="card-header card-header-text" data-background-color="purple">
										<h4 class="card-title">Riwayat Pendidikan</h4>
									</div>
									
									<div class="card-content">
										<div class="table-responsive">
											<table id="datapendidikan" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
												<thead>
													<tr>
														<th>No</th>
														<th>Jenjang</th>
														<th>Institusi</th>
														<th>Jurusan</th>
														<th>Tahun</th>
														<th>#</th>
													</tr>
												</thead>
												<tbody>
													<?php $no=1; foreach($pendidikan as $row){ ?>
													<tr>
														<td><?=$no?></td>
														<td><?=$row['JENJANG']?></td>
														<td><?=$row['nama_institusi']?></td>
														<td><?=$row['jurusan']?></td>
														<td><?=$row['tahun_mulai'].' - '.$row['tahun_selesai']?></td>
														<td class="text-right">
															<a href="javascript:void(0);" class="btn btn-simple btn-warning btn-icon editpendidikan" data-id="<?=$row['id']?>"><i class="material-icons">mode_edit_outline</i></a>
															<a href="javascript:void(0);" class="btn btn-simple btn-danger btn-icon removependidikan" data-id="<?=$row['id']?>"><i class="material-icons">close</i></a>
														</td>
													</tr>
													<?php $no++; } ?>
												</tbody>
												<tfoot>
													<tr>
														<th>No</th>
														<th>Jenjang</th>
														<th>Institusi</th>
														<th>Jurusan</th>
														<th>Tahun</th>
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
						</div>
					</div>
				</div>
				<div class="tab-pane" id="3">
					<div class="card">
						<div class="card-header">
							<!-- <h4 class="card-title">Description about product</h4>
							<p class="category">
								More information here
							</p> -->
						</div>
						<div class="card-content row">
							<div class="col-md-12">
								<button class="btn btn-primary btn-raised btn-round" data-toggle="modal" data-target="#modalPengalaman">
									<span class="material-icons">
										add_circle_outline
									</span>
									Tambah Pengalaman
								</button>
								<div class="card">
									<div class="card-header card-header-text" data-background-color="purple">
										<h4 class="card-title">Pengalaman Kerja</h4>
									</div>
									
									<div class="card-content">
										<div class="table-responsive">
											<table id="datapengalaman" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
												<thead>
													<tr>
														<th>No</th>
														<th>Perusahaan</th>
														<th>Posisi</th>
														<th>Tahun</th>
														<th>#</th>
													</tr>
												</thead>
												<tbody>
													<?php $no=1; foreach($pengalaman as $row){ ?>
													<tr>
														<td><?=$no?></td>
														<td><?=$row['nama_perusahaan']?></td>
														<td><?=$row['posisi']?></td>
														<td><?=$row['mulai'].' - '.$row['selesai']?></td>
														<td class="text-right">
															<a href="javascript:void(0);" class="btn btn-simple btn-warning btn-icon editpengalaman" data-id="<?=$row['id']?>"><i class="material-icons">mode_edit_outline</i></a>
															<a href="javascript:void(0);" class="btn btn-simple btn-danger btn-icon removepengalaman" data-id="<?=$row['id']?>"><i class="material-icons">close</i></a>
														</td>
													</tr>
													<?php $no++; } ?>
												</tbody>
												<tfoot>
													<tr>
														<th>No</th>
														<th>Perusahaan</th>
														<th>Posisi</th>
														<th>Tahun</th>
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
						</div>
					</div>
				</div>
				<div class="tab-pane" id="4">
					<div class="card">
						<div class="card-header">
							<!-- <h4 class="card-title">Description about product</h4>
							<p class="category">
								More information here
							</p> -->
						</div>
						<div class="card-content row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-header card-header-text" data-background-color="purple">
										<h4 class="card-title">Posisi Kerja di PT. XYZ</h4>
									</div>
									
									<div class="card-content">
										<div class="material-datatables table-responsive">
											<table id="datapegawaipekerjaan" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
												<thead>
													<tr>
														<th>No</th>
														<th>No.Pegawai</th>
														<th>Organisasi</th>
														<th>Level</th>
														<th>Posisi</th>
														<th>Status</th>
														<th>Cabang</th>
													</tr>
												</thead>
												<tbody>
													<?php $no=1; foreach($pekerjaan as $row){ ?>
													<tr>
														<td><?=$no?></td>
														<td><?=$row['no_pegawai']?></td>
														<td><?=$row['NAMAORGANISASI']?></td>
														<td><?=$row['NAMALEVEL']?></td>
														<td><?=$row['NAMAPOSISI']?></td>
														<td><?=$row['status_pekerja']?></td>
														<td><?=$row['NAMACABANG']?></td>
													</tr>
													<?php $no++; } ?>
												</tbody>
												<tfoot>
													<tr>
														<th>No</th>
														<th>No.Pegawai</th>
														<th>Organisasi</th>
														<th>Level</th>
														<th>Posisi</th>
														<th>Status</th>
														<th>Cabang</th>
													</tr>
												</tfoot>
											</table>
										</div>
									</div>
									<!-- end content-->
								</div>
								<!--  end card  -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="modalKeluarga" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
					<form id="formkeluarga" class="form-horizontal">
						<div class="card-header card-header-text" data-background-color="rose">
							<h4 class="card-title">Form Keluarga</h4>
						</div>
						<div class="card-content">
							<div class="row">
								<label class="col-sm-3 label-on-left">Nama Lengkap</label>
								<div class="col-sm-9">
									<div class="form-group label-floating is-empty">
										<label class="control-label"></label>
										<input type="hidden" id="tempkeluarga" name="tempkeluarga">
										<input type="text" class="form-control" id="namakeluarga" name="namakeluarga" autocomplete="off">
										<span class="help-block">Ex. Budi Setio</span>
									</div>
								</div>
							</div>
							<div class="row">
								<label class="col-sm-3 label-on-left">Relasi</label>
								<div class="col-sm-9">
									<div class="form-group label-floating is-empty">
										<label class="control-label"></label>
										<select class="form-control" id="relasikeluarga" name="relasikeluarga" style="width:100%;">
											<option value="">Pilih relasi...</option>
											<?php foreach($relasi as $row){ ?>
											<option value="<?=$row['id']?>"><?=$row['nama']?></option>
											<?php } ?>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<label class="col-sm-3 label-on-left">Kontak Darurat</label>
								<div class="col-sm-9">
									<div class="form-group label-floating is-empty">
										<label class="control-label"></label>
										<input type="text" class="form-control" id="kontakkeluarga" name="kontakkeluarga" autocomplete="off">
										<span class="help-block">Nama pendek untuk login aplikasi.</span>
									</div>
								</div>
							</div>
							<div class="row">
								<label class="col-sm-3 label-on-left">Alamat</label>
								<div class="col-sm-9">
									<div class="form-group label-floating is-empty">
										<label class="control-label"></label>
										<textarea class="form-control" id="alamatkeluarga" name="alamatkeluarga" autocomplete="off"></textarea>
										<span class="help-block">Alamat tempat tinggal sekarang</span>
									</div>
								</div>
							</div>
							<div class="row">
								<label class="col-sm-3 label-on-left">Kartu Identitas</label>
								<div class="col-sm-9">
									<div class="form-group">
                                        <input type="text" class="form-control" id="nomoridkeluarga" name="nomoridkeluarga" autocomplete="off">
										<span class="help-block">Nomor kartu identitas sesuai opsi.</span>
                                    </div>
								</div>
							</div>
							<div class="row">
								<label class="col-sm-3 label-on-left">Jenis Kelamin</label>
								<div class="col-sm-9 checkbox-radios">
									<div class="radio">
										<label>
											<input type="radio" name="jkkeluarga" value="L" checked="true"> Laki-laki
										</label>
									</div>
									<div class="radio">
										<label>
											<input type="radio" name="jkkeluarga" value="P"> Perempuan
										</label>
									</div>
								</div>
							</div>
							<div class="row">
								<label class="col-sm-3 label-on-left">Tanggal Lahir</label>
								<div class="col-sm-9">
									<div class="form-group">
                                        <input type="text" class="form-control datepicker" value="<?=date("Y-m-d")?>" id="tanggallahirkeluarga" name="tanggallahirkeluarga" autocomplete="off">
										<span class="help-block">Tanggal lahir</span>
                                    </div>
								</div>
							</div>
							<div class="row">
								<label class="col-sm-3 label-on-left">Agama</label>
								<div class="col-sm-9 checkbox-radios">
									<div class="radio">
										<label>
											<input type="radio" name="agamakeluarga" value="ISLAM" checked="true"> Islam
										</label>
									</div>
									<div class="radio">
										<label>
											<input type="radio" name="agamakeluarga" value="KRISTEN"> Kristen
										</label>
									</div>
									<div class="radio">
										<label>
											<input type="radio" name="agamakeluarga" value="KATOLIK"> Katolik
										</label>
									</div>
									<div class="radio">
										<label>
											<input type="radio" name="agamakeluarga" value="HINDU"> Hindu
										</label>
									</div>
									<div class="radio">
										<label>
											<input type="radio" name="agamakeluarga" value="BUDHA"> BUDHA
										</label>
									</div>
								</div>
							</div>
							<div class="row">
								<label class="col-sm-3 label-on-left">Status Kawin</label>
								<div class="col-sm-9 checkbox-radios">
									<div class="radio">
										<label>
											<input type="radio" name="statuskawinkeluarga" value="BELUM MENIKAH" checked="true"> Belum Menikah
										</label>
									</div>
									<div class="radio">
										<label>
											<input type="radio" name="statuskawinkeluarga" value="MENIKAH"> Menikah
										</label>
									</div>
								</div>
							</div>
							<div class="row">
								<label class="col-sm-3 label-on-left">Pakerjaan</label>
								<div class="col-sm-9">
									<div class="form-group label-floating is-empty">
										<label class="control-label"></label>
										<input type="text" class="form-control" id="pekerjaankeluarga" name="pekerjaankeluarga" autocomplete="off">
										<span class="help-block">Ex. Karyawan Swasta</span>
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

<div class="modal fade" id="modalPendidikan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
					<form id="formpendidikan" class="form-horizontal">
						<div class="card-header card-header-text" data-background-color="rose">
							<h4 class="card-title">Form Pendidikan</h4>
						</div>
						<div class="card-content">
							<div class="row">
								<label class="col-sm-3 label-on-left">Nama Institusi</label>
								<div class="col-sm-9">
									<div class="form-group label-floating is-empty">
										<label class="control-label"></label>
										<input type="hidden" id="temppendidikan" name="temppendidikan">
										<input type="text" class="form-control" id="namapendidikan" name="namapendidikan" autocomplete="off">
										<span class="help-block">Ex. SD Karangan Bunga Melati</span>
									</div>
								</div>
							</div>
							<div class="row">
								<label class="col-sm-3 label-on-left">Jenjang</label>
								<div class="col-sm-9">
									<div class="form-group label-floating is-empty">
										<label class="control-label"></label>
										<select class="form-control" id="jenjangpendidikan" name="jenjangpendidikan" style="width:100%;">
											<option value="">Pilih jenjang...</option>
											<?php foreach($jenjang as $row){ ?>
											<option value="<?=$row['id']?>"><?=$row['nama']?></option>
											<?php } ?>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<label class="col-sm-3 label-on-left">Jurusan</label>
								<div class="col-sm-9">
									<div class="form-group label-floating is-empty">
										<label class="control-label"></label>
										<input type="text" class="form-control" id="jurusanpendidikan" name="jurusanpendidikan" autocomplete="off">
										<span class="help-block">Jurusan pendidikan, jika ada</span>
									</div>
								</div>
							</div>
							<div class="row">
								<label class="col-sm-3 label-on-left">Nilai Akhir</label>
								<div class="col-sm-9">
									<div class="form-group label-floating is-empty">
										<label class="control-label"></label>
										<input type="number" class="form-control" id="nilaipendidikan" name="nilaipendidikan" autocomplete="off">
										<span class="help-block">Nilai akhir dalam format angka / desimal</span>
									</div>
								</div>
							</div>
							<div class="row">
								<label class="col-sm-3 label-on-left">Tahun Mulai</label>
								<div class="col-sm-9">
									<div class="form-group label-floating is-empty">
										<label class="control-label"></label>
										<input type="number" class="form-control" id="mulaipendidikan" name="mulaipendidikan" autocomplete="off">
										<span class="help-block">Tahun mulai mengenyam pendidikan</span>
									</div>
								</div>
							</div>
							<div class="row">
								<label class="col-sm-3 label-on-left">Tahun Selesai</label>
								<div class="col-sm-9">
									<div class="form-group label-floating is-empty">
										<label class="control-label"></label>
										<input type="number" class="form-control" id="selesaipendidikan" name="selesaipendidikan" autocomplete="off">
										<span class="help-block">Tahun selesai mengenyam pendidikan</span>
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

<div class="modal fade" id="modalPengalaman" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
					<form id="formpengalaman" class="form-horizontal">
						<div class="card-header card-header-text" data-background-color="rose">
							<h4 class="card-title">Form Pengalaman Kerja</h4>
						</div>
						<div class="card-content">
							<div class="row">
								<label class="col-sm-3 label-on-left">Perusahaan</label>
								<div class="col-sm-9">
									<div class="form-group label-floating is-empty">
										<label class="control-label"></label>
										<input type="hidden" id="temppengalaman" name="temppengalaman">
										<input type="text" class="form-control" id="namapengalaman" name="namapengalaman" autocomplete="off">
										<span class="help-block">Ex. PT. Suka Suka Saya</span>
									</div>
								</div>
							</div>
							<div class="row">
								<label class="col-sm-3 label-on-left">Posisi</label>
								<div class="col-sm-9">
									<div class="form-group label-floating is-empty">
										<label class="control-label"></label>
										<input type="text" class="form-control" id="posisipengalaman" name="posisipengalaman" autocomplete="off">
										<span class="help-block">Posisi terakhir pada perusahaan ini</span>
									</div>
								</div>
							</div>
							<div class="row">
								<label class="col-sm-3 label-on-left">Mulai bekerja</label>
								<div class="col-sm-9">
									<div class="form-group label-floating is-empty">
										<label class="control-label"></label>
										<input type="text" class="form-control monthpicker" id="mulaipengalaman" name="mulaipengalaman" autocomplete="off" value="<?=date('Y-m')?>">
										<span class="help-block">Mulai bekerja</span>
									</div>
								</div>
							</div>
							<div class="row">
								<label class="col-sm-3 label-on-left">Selesai bekerja</label>
								<div class="col-sm-9">
									<div class="form-group label-floating is-empty">
										<label class="control-label"></label>
										<input type="text" class="form-control monthpicker" id="selesaipengalaman" name="selesaipengalaman" autocomplete="off" value="<?=date('Y-m')?>">
										<span class="help-block">Selesai bekerja</span>
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
<script>
	var table = $('#datakeluarga,#datapendidikan,#datapengalaman,#datapegawaipekerjaan').DataTable({
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
	table.on('click', '.editkeluarga', function() {
		var id = $(this).data('id');
		
		Pace.restart();
		Pace.track(function () {
			$.ajax({
				method: "POST",
				url: "../admincrud/dapatkanKeluarga",
				data: {id:id}
			}).done(function( data ) {
				$('#tempkeluarga').val(data.id);
				$('#namakeluarga').val(data.nama_lengkap);
				$('#kontakkeluarga').val(data.kontak_darurat);
				$('#relasikeluarga').val(data.id_relasi);
				$('#alamatkeluarga').val(data.alamat);
				$('#nomoridkeluarga').val(data.no_id);
				$("input[name=jkkeluarga][value=" + data.jk + "]").prop('checked', true);
				$("input[name=statuskawinkeluarga][value='" + data.status_kawin + "']").prop('checked', true);
				$('#tanggallahirkeluarga').val(data.tanggal_lahir);
				$("input[name=agamakeluarga][value='" + data.agama + "']").prop('checked', true);
				$('#pekerjaankeluarga').val(data.pekerjaan);
				
				$('#modalKeluarga').modal('toggle');
				Pace.stop();
			});
		});
	});
	
	table.on('click', '.editpendidikan', function() {
		var id = $(this).data('id');
		
		Pace.restart();
		Pace.track(function () {
			$.ajax({
				method: "POST",
				url: "../admincrud/dapatkanPendidikan",
				data: {id:id}
			}).done(function( data ) {
				$('#temppendidikan').val(data.id);
				$('#namapendidikan').val(data.nama_institusi);
				$('#jenjangpendidikan').val(data.id_pendidikan);
				$('#jurusanpendidikan').val(data.jurusan);
				$('#nilaipendidikan').val(data.nilai);
				$('#mulaipendidikan').val(data.tahun_mulai);
				$('#selesaipendidikan').val(data.tahun_selesai);
				$('#modalPendidikan').modal('toggle');
				Pace.stop();
			});
		});
	});
	
	table.on('click', '.editpengalaman', function() {
		var id = $(this).data('id');
		
		Pace.restart();
		Pace.track(function () {
			$.ajax({
				method: "POST",
				url: "../admincrud/dapatkanPengalaman",
				data: {id:id}
			}).done(function( data ) {
				$('#temppengalaman').val(data.id);
				$('#namapengalaman').val(data.nama_perusahaan);
				$('#posisipengalaman').val(data.posisi);
				$('#mulaipengalaman').val(data.mulai);
				$('#selesaipengalaman').val(data.selesai);
				$('#modalPengalaman').modal('toggle');
				Pace.stop();
			});
		});
	});
	
	// Delete a record
	table.on('click', '.removekeluarga', function(e) {
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
					url: "../admincrud/hapusKeluarga",
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
	
	// Delete a record
	table.on('click', '.removependidikan', function(e) {
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
					url: "../admincrud/hapusPendidikan",
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
	
	table.on('click', '.removepengalaman', function(e) {
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
					url: "../admincrud/hapusPengalaman",
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
	
	$("#modalPendidikan").on("hide.bs.modal", function () {
		$("#formpendidikan")[0].reset();
		$('#temppendidikan').val('');
	});
	
	$("#modalKeluarga").on("hide.bs.modal", function () {
		$("#formkeluarga")[0].reset();
		$('#tempkeluarga').val('');
	});
	
	$("#modalPengalaman").on("hide.bs.modal", function () {
		$("#formpengalaman")[0].reset();
		$('#temppengalaman').val('');
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
</script>