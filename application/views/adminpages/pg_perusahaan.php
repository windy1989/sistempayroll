 <div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="nav-center">
					<ul class="nav nav-pills nav-pills-warning nav-pills-icons" role="tablist">
						<li class="active">
							<a href="#pengaturan-perusahaan" role="tab" data-toggle="tab">
								<i class="material-icons">business</i> Perusahaan
							</a>
						</li>
						<li>
							<a href="#pengaturan-cabang" role="tab" data-toggle="tab">
								<i class="material-icons">account_tree</i> Cabang
							</a>
						</li>
						<li>
							<a href="#pengaturan-jadwal" role="tab" data-toggle="tab">
								<i class="material-icons">event_available</i> Jadwal
							</a>
						</li>
						<li>
							<a href="#pengaturan-libur" role="tab" data-toggle="tab">
								<i class="material-icons">event_busy</i> Libur
							</a>
						</li>
						<li>
							<a href="#pengaturan-organisasi" role="tab" data-toggle="tab">
								<i class="material-icons">group_work</i> Kelompok
							</a>
						</li>
						<li>
							<a href="#pengaturan-poin" role="tab" data-toggle="tab">
								<i class="material-icons">book_online</i> Poin
							</a>
						</li>
						<li>
							<a href="#pengaturan-thr" role="tab" data-toggle="tab">
								<i class="material-icons">card_giftcard</i> THR
							</a>
						</li>
					</ul>
				</div>
				<div class="tab-content">
					<div class="tab-pane active" id="pengaturan-perusahaan">
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
										<form id="formperusahaan" class="form-horizontal">
											<div class="card-header card-header-text" data-background-color="rose">
												<h4 class="card-title">Info Perusahaan</h4>
											</div>
											<div class="card-content">
												<div class="row">
													<div class="col-md-6">
														<div class="row">
															<label class="col-sm-3 label-on-left">Logo</label>
															<div class="col-sm-9">
																<div class="fileinput text-center fileinput-new" data-provides="fileinput" style="padding-top:30px;">
																	<div class="fileinput-new thumbnail">
																		<img src="<?=base_url()?>assets/img/image_placeholder.jpg" alt="..." id="filelogo">
																	</div>
																	<div class="fileinput-preview fileinput-exists thumbnail" style=""></div>
																	<div>
																		<span class="btn btn-rose btn-round btn-file">
																			<span class="fileinput-new">Pilih Berkas</span>
																			<span class="fileinput-exists">Ganti</span>
																			<input type="file" name="uploadlogo" id="uploadlogo" accept="image/*">
																		<div class="ripple-container"></div></span>
																		<a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Hapus<div class="ripple-container"><div class="ripple ripple-on ripple-out" style="left: 21.7344px; top: 12px; background-color: rgb(255, 255, 255); transform: scale(15.5488);"></div></div></a>
																	</div>
																</div>
															</div>
														</div>
														<div class="row">
															<label class="col-sm-3 label-on-left">Nama</label>
															<div class="col-sm-9">
																<div class="form-group label-floating is-empty">
																	<label class="control-label"></label>
																	<input type="text" class="form-control" id="namaperusahaan" name="namaperusahaan" autocomplete="off">
																	<span class="help-block">Nama Perusahaan Resmi Terdaftar</span>
																</div>
															</div>
														</div>
														<div class="row">
															<label class="col-sm-3 label-on-left">Alamat</label>
															<div class="col-sm-9">
																<div class="form-group label-floating is-empty">
																	<label class="control-label"></label>
																	<textarea class="form-control" id="alamat" name="alamat" autocomplete="off"></textarea>
																	<span class="help-block">Alamat domisili kantor/perusahaan pusat</span>
																</div>
															</div>
														</div>
														<div class="row">
															<label class="col-sm-3 label-on-left">Kota</label>
															<div class="col-sm-9">
																<div class="form-group label-floating is-empty">
																	<label class="control-label"></label>
																	<input type="text" class="form-control" id="kota" name="kota" autocomplete="off">
																	<span class="help-block">Kota tempat perusahaaan berada</span>
																</div>
															</div>
														</div>
														<div class="row">
															<label class="col-sm-3 label-on-left">Provinsi</label>
															<div class="col-sm-9">
																<div class="form-group label-floating is-empty">
																	<label class="control-label"></label>
																	<input type="text" class="form-control" id="provinsi" name="provinsi" autocomplete="off">
																	<span class="help-block">Provinsi tempat perusahaaan berada</span>
																</div>
															</div>
														</div>
														<div class="row">
															<label class="col-sm-3 label-on-left">UMR</label>
															<div class="col-sm-9">
																<div class="form-group label-floating is-empty">
																	<label class="control-label"></label>
																	<input type="text" class="form-control autonumeric" id="umr" name="umr" autocomplete="off">
																	<span class="help-block">UMR daerah tempat domisili perusahaan</span>
																</div>
															</div>
														</div>
														
													</div>
													<div class="col-md-6">
														<div class="row">
															<label class="col-sm-3 label-on-left">Telepon</label>
															<div class="col-sm-9">
																<div class="form-group label-floating is-empty">
																	<label class="control-label"></label>
																	<input type="text" class="form-control" id="telepon" name="telepon" autocomplete="off">
																	<span class="help-block">Nomor telepon perusahaan</span>
																</div>
															</div>
														</div>
														<div class="row">
															<label class="col-sm-3 label-on-left">HP</label>
															<div class="col-sm-9">
																<div class="form-group label-floating is-empty">
																	<label class="control-label"></label>
																	<input type="text" class="form-control" id="hp" name="hp" autocomplete="off">
																	<span class="help-block">Nomor kontak hp perusahaan</span>
																</div>
															</div>
														</div>
														<div class="row">
															<label class="col-sm-3 label-on-left">Email</label>
															<div class="col-sm-9">
																<div class="form-group label-floating is-empty">
																	<label class="control-label"></label>
																	<input type="email" class="form-control" id="email" name="email" autocomplete="off">
																	<span class="help-block">Email resmi perusahaan</span>
																</div>
															</div>
														</div>
														<div class="row">
															<label class="col-sm-3 label-on-left">NPWP</label>
															<div class="col-sm-9">
																<div class="form-group label-floating is-empty">
																	<label class="control-label"></label>
																	<input type="text" class="form-control" id="npwp" name="npwp" autocomplete="off">
																	<span class="help-block">NPWP resmi terdaftar perusahaan</span>
																</div>
															</div>
														</div>
														<div class="row">
															<label class="col-sm-3 label-on-left">TTD</label>
															<div class="col-sm-9">
																<div class="fileinput text-center fileinput-new" data-provides="fileinput" style="padding-top:30px;">
																	<div class="fileinput-new thumbnail">
																		<img src="<?=base_url()?>assets/img/image_placeholder.jpg" alt="..." id="filettd">
																	</div>
																	<div class="fileinput-preview fileinput-exists thumbnail" style=""></div>
																	<div>
																		<span class="btn btn-rose btn-round btn-file">
																			<span class="fileinput-new">Pilih Berkas</span>
																			<span class="fileinput-exists">Ganti</span>
																			<input type="file" name="uploadttd" id="uploadttd" accept="image/*">
																		<div class="ripple-container"></div></span>
																		<a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Hapus<div class="ripple-container"><div class="ripple ripple-on ripple-out" style="left: 21.7344px; top: 12px; background-color: rgb(255, 255, 255); transform: scale(15.5488);"></div></div></a>
																	</div>
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
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane" id="pengaturan-cabang">
						<div class="card">
							<div class="card-header">
								<!-- <h4 class="card-title">Location of the product</h4>
								<p class="category">
									More information here
								</p> -->
							</div>
							<div class="card-content row">
								<div class="col-md-12">
									<div class="card">
										<div class="card-header card-header-text" data-background-color="purple">
											<h4 class="card-title">Daftar Cabang</h4>
										</div>
										
										<div class="card-content">
											<div class="toolbar">
												<!--        Here you can write extra buttons/actions for the toolbar              -->
												<button class="btn btn-info btn-raised btn-round" data-toggle="modal" data-target="#modalTambahCabang">
													<span class="material-icons">
														add_circle_outline
													</span>
													Tambah Cabang
												</button>
											</div>
											<div class="material-datatables">
												<table id="datacabang" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
													<thead>
														<tr>
															<th>No</th>
															<th>Nama Cabang</th>
															<th>Alamat</th>
															<th>Kota</th>
															<th>Kode Pos</th>
															<th>#</th>
														</tr>
													</thead>
													<tbody>
														<?php 
														$no = 1;
														foreach($infocabang as $row){
														?>
														<tr>
															<td><?=$no?></td>
															<td><?=$row['nama']?></td>
															<td><?=$row['alamat']?></td>
															<td><?=$row['kota']?></td>
															<td><?=$row['kode_pos']?></td>
															<td>
																<a href="javascript:void(0);" class="btn btn-simple btn-warning btn-icon editcabang" data-id="<?=$row['id']?>"><i class="material-icons">mode_edit_outline</i></a>
																<a href="javascript:void(0);" class="btn btn-simple btn-danger btn-icon removecabang" data-id="<?=$row['id']?>"><i class="material-icons">close</i></a>
															</td>
														</tr>
														<?php $no++; 
														} 
														?>
													</tbody>
													<tfoot>
														<tr>
															<th>No</th>
															<th>Nama Cabang</th>
															<th>Alamat</th>
															<th>Kota</th>
															<th>Kode Pos</th>
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
					<div class="tab-pane" id="pengaturan-jadwal">
						<div class="card">
							<div class="card-header">
								<!-- <h4 class="card-title">Location of the product</h4>
								<p class="category">
									More information here
								</p> -->
							</div>
							<div class="card-content row">
								<div class="col-md-12">
									<div class="card">
										<div class="card-header card-header-text" data-background-color="red">
											<h4 class="card-title">Daftar Jadwal Kerja</h4>
										</div>
										
										<div class="card-content">
											<div class="toolbar">
												<!--        Here you can write extra buttons/actions for the toolbar              -->
												<button class="btn btn-info btn-raised btn-round" data-toggle="modal" data-target="#modalTambahKerja">
													<span class="material-icons">
														add_circle_outline
													</span>
													Tambah Jadwal Kerja
												</button>
											</div>
											<div class="material-datatables">
												<table id="datakerja" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
													<thead>
														<tr>
															<th>No</th>
															<th>Nama</th>
															<th>Masuk</th>
															<th>Pulang</th>
															<th>Istirahat</th>
															<th>#</th>
														</tr>
													</thead>
													<tbody>
														<?php 
														$no = 1;
														foreach($infokerja as $row){
														?>
														<tr>
															<td><?=$no?></td>
															<td><?=$row['nama']?></td>
															<td><?=$row['masuk']?></td>
															<td><?=$row['pulang']?></td>
															<td><?=$row['istirahat_keluar'].' - '.$row['istirahat_masuk']?></td>
															<td>
																<a href="javascript:void(0);" class="btn btn-simple btn-warning btn-icon editkerja" data-id="<?=$row['id']?>"><i class="material-icons">mode_edit_outline</i></a>
																<a href="javascript:void(0);" class="btn btn-simple btn-danger btn-icon removekerja" data-id="<?=$row['id']?>"><i class="material-icons">close</i></a>
															</td>
														</tr>
														<?php $no++; 
														} 
														?>
													</tbody>
													<tfoot>
														<tr>
															<th>No</th>
															<th>Nama</th>
															<th>Masuk</th>
															<th>Pulang</th>
															<th>Istirahat</th>
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
					<div class="tab-pane" id="pengaturan-libur">
						<div class="card">
							<div class="card-header">
								<!-- <h4 class="card-title">Help center</h4>
								<p class="category">
									More information here
								</p> -->
							</div>
							<div class="card-content row">
								<div class="col-md-6">
									<div class="card">
										<div class="card-header card-header-text" data-background-color="green">
											<h4 class="card-title">Daftar Libur</h4>
										</div>
										
										<div class="card-content">
											<div class="toolbar">
												<!--        Here you can write extra buttons/actions for the toolbar              -->
												<button class="btn btn-info btn-raised btn-round" data-toggle="modal" data-target="#modalTambahLibur">
													<span class="material-icons">
														add_circle_outline
													</span>
													Tambah Libur
												</button>
											</div>
											<div class="material-datatables">
												<table id="datalibur" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
													<thead>
														<tr>
															<th>No</th>
															<th>Tanggal</th>
															<th>Keterangan</th>
															<th>#</th>
														</tr>
													</thead>
													<tbody>
														<?php 
														$no = 1;
														foreach($infolibur as $row){
														?>
														<tr>
															<td><?=$no?></td>
															<td class="barislibur"><?=$row['tanggal']?></td>
															<td><?=$row['keterangan']?></td>
															<td>
																<!-- <a href="javascript:void(0);" class="btn btn-simple btn-warning btn-icon editlibur" data-id="<?=$row['id']?>"><i class="material-icons">mode_edit_outline</i></a> -->
																<a href="javascript:void(0);" class="btn btn-simple btn-danger btn-icon removelibur" data-id="<?=$row['id']?>"><i class="material-icons">close</i></a>
															</td>
														</tr>
														<?php $no++; 
														} 
														?>
													</tbody>
													<tfoot>
														<tr>
															<th>No</th>
															<th>Tanggal</th>
															<th>Keterangan</th>
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
					<div class="tab-pane" id="pengaturan-organisasi">
						<div class="card">
							<div class="card-header">
								<!-- <h4 class="card-title">Help center</h4>
								<p class="category">
									More information here
								</p> -->
							</div>
							<div class="card-content row">
								<div class="col-md-6">
									<div class="card">
										<div class="card-header card-header-text" data-background-color="green">
											<h4 class="card-title">Organisasi</h4>
										</div>
										
										<div class="card-content">
											<div class="toolbar">
												<!--        Here you can write extra buttons/actions for the toolbar              -->
											</div>
											<div class="material-datatables">
												<table id="dataorganisasi" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
													<thead>
														<tr>
															<th>No</th>
															<th>Nama</th>
															<th>#</th>
														</tr>
													</thead>
													<tbody id="bodiorganisasi">
														<?php 
														$no = 1;
														foreach($infoorganisasi as $row){
														?>
														<tr>
															<td><?=$no?></td>
															<td><?=$row['nama']?></td>
															<td>
																<!-- <a href="javascript:void(0);" class="btn btn-simple btn-warning btn-icon editlibur" data-id="<?=$row['id']?>"><i class="material-icons">mode_edit_outline</i></a> -->
																<a href="javascript:void(0);" class="btn btn-simple btn-danger btn-icon removeorganisasi" data-id="<?=$row['id']?>"><i class="material-icons">close</i></a>
															</td>
														</tr>
														<?php $no++; 
														} 
														?>
													</tbody>
													<tfoot>
														<tr>
															<th colspan="2"><input type="text" class="form-control" id="namaorganisasi" name="namaorganisasi" placeholder="Ketik nama organisasi" style="width:100%;"></th>
															<th><button class="btn btn-info" id="btn-tambah-organisasi">Simpan</button></th>
														</tr>
													</tfoot>
												</table>
											</div>
										</div>
										<!-- end content-->
									</div>
									<!--  end card  -->
								</div>
								<div class="col-md-6">
									<div class="card">
										<div class="card-header card-header-text" data-background-color="purple">
											<h4 class="card-title">Level</h4>
										</div>
										
										<div class="card-content">
											<div class="toolbar">
												<!--        Here you can write extra buttons/actions for the toolbar              -->
											</div>
											<div class="material-datatables">
												<table id="datalevel" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
													<thead>
														<tr>
															<th>No</th>
															<th>Nama</th>
															<th>#</th>
														</tr>
													</thead>
													<tbody id="bodilevel">
														<?php 
														$no = 1;
														foreach($infolevel as $row){
														?>
														<tr>
															<td><?=$no?></td>
															<td><?=$row['nama']?></td>
															<td>
																<!-- <a href="javascript:void(0);" class="btn btn-simple btn-warning btn-icon editlibur" data-id="<?=$row['id']?>"><i class="material-icons">mode_edit_outline</i></a> -->
																<a href="javascript:void(0);" class="btn btn-simple btn-danger btn-icon removelevel" data-id="<?=$row['id']?>"><i class="material-icons">close</i></a>
															</td>
														</tr>
														<?php $no++; 
														} 
														?>
													</tbody>
													<tfoot>
														<tr>
															<th colspan="2"><input type="text" class="form-control" id="namalevel" name="namalevel" placeholder="Ketik nama level" style="width:100%;"></th>
															<th><button class="btn btn-info" id="btn-tambah-level">Simpan</button></th>
														</tr>
													</tfoot>
												</table>
											</div>
										</div>
										<!-- end content-->
									</div>
									<!--  end card  -->
								</div>
								<div class="col-md-6">
									<div class="card">
										<div class="card-header card-header-text" data-background-color="red">
											<h4 class="card-title">Posisi</h4>
										</div>
										
										<div class="card-content">
											<div class="toolbar">
												<!--        Here you can write extra buttons/actions for the toolbar              -->
											</div>
											<div class="material-datatables">
												<table id="dataposisi" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
													<thead>
														<tr>
															<th>No</th>
															<th>Nama</th>
															<th>#</th>
														</tr>
													</thead>
													<tbody id="bodiposisi">
														<?php 
														$no = 1;
														foreach($infoposisi as $row){
														?>
														<tr>
															<td><?=$no?></td>
															<td><?=$row['nama']?></td>
															<td>
																<!-- <a href="javascript:void(0);" class="btn btn-simple btn-warning btn-icon editlibur" data-id="<?=$row['id']?>"><i class="material-icons">mode_edit_outline</i></a> -->
																<a href="javascript:void(0);" class="btn btn-simple btn-danger btn-icon removeposisi" data-id="<?=$row['id']?>"><i class="material-icons">close</i></a>
															</td>
														</tr>
														<?php $no++; 
														} 
														?>
													</tbody>
													<tfoot>
														<tr>
															<th colspan="2"><input type="text" class="form-control" id="namaposisi" name="namaposisi" placeholder="Ketik nama posisi proyek" style="width:100%;"></th>
															<th><button class="btn btn-info" id="btn-tambah-posisi">Simpan</button></th>
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
					<div class="tab-pane" id="pengaturan-poin">
						<div class="card">
							<div class="card-header">
								<!-- <h4 class="card-title">Help center</h4>
								<p class="category">
									More information here
								</p> -->
							</div>
							<div class="card-content row">
								<div class="col-md-6">
									<div class="card">
										<div class="card-header card-header-text" data-background-color="rose">
											<h4 class="card-title">Form Poin Keterlambatan</h4>
										</div>
										<div class="card-content">
											<div class="toolbar">
												<!--        Here you can write extra buttons/actions for the toolbar              -->
											</div>
											<div class="row">
												<label class="col-sm-3 label-on-left">Menit Poin</label>
												<div class="col-sm-9">
													<div class="form-group label-floating is-empty">
														<label class="control-label"></label>
														<input type="number" class="form-control" id="menitpoin" name="menitpoin" autocomplete="off" step="1">
														<span class="help-block">Menit keterlambatan untuk mendapatkan 1 poin.</span>
													</div>
												</div>
											</div>
											<div class="row">
												<label class="col-sm-3 label-on-left">Potongan (%)</label>
												<div class="col-sm-9">
													<div class="form-group label-floating is-empty">
														<label class="control-label"></label>
														<input type="number" class="form-control" id="potonganpoin" name="potonganpoin" autocomplete="off" step="1">
														<span class="help-block">Potongan % untuk pengali potongan gaji dan poin.</span>
													</div>
												</div>
											</div>
											<div class="row">
												<label class="col-md-3"></label>
												<div class="col-md-9">
													<div class="form-group form-button">
														<button type="submit" class="btn btn-fill btn-success" id="btn-tambah-poin">
															<span class="material-icons">
																add_circle_outline
															</span> Simpan
														</button>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane" id="pengaturan-thr">
						<div class="card">
							<div class="card-header">
								<!-- <h4 class="card-title">Help center</h4>
								<p class="category">
									More information here
								</p> -->
							</div>
							<div class="card-content row">
								<div class="col-md-8">
									<div class="card">
										<div class="card-header card-header-text" data-background-color="rose">
											<h4 class="card-title">Form Komponen THR</h4>
										</div>
										<div class="card-content">
											<div class="toolbar">
												<!--        Here you can write extra buttons/actions for the toolbar              -->
											</div>
											<div class="table-responsive">
												<table id="datakomponenthr" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
													<thead>
														<tr>
															<th>Komponen</th>
															<th>#</th>
														</tr>
													</thead>
													<tbody id="bodikomponenthr">
														<?php 
															if(count($komponenthr) > 0){
																foreach($komponenthr as $row){
														?>
														<tr class="baristhr" data-id="<?=$row['id_komponen_upah']?>">
															<td><?=$row['namakomponen']?></td>
															<td>
																<button class="btn btn-sm btn-danger" onclick="removeThis(this);"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
															</td>
														</tr>
														<?php 
																}
														}else{
															echo '<tr class="kosongthr"><td>Data tidak ditemukan!</td><td></td></tr>';
														}
														?>
													</tbody>
													<tfoot>
														<tr>
															<th colspan="2">
																<div class="row">
																	<div class="col-md-12 text-center">
																		<select class="form-control select2" id="komponenthr" name="komponenthr" style="width:100%">
																			<?php foreach($komponenupah as $row){ ?>
																			<option value="<?=$row['id']?>"><?=$row['nama']?></option>
																			<?php } ?>
																		</select>
																		<button class="btn btn-info btn-sm" id="tambahkomponenthr"><i class="fa fa-plus-circle"></i></button>
																	</div>
																</div>
															</th>
														</tr>
														<tr>
															<th colspan="2">
																<button class="btn btn-success btn-sm btn-block" id="simpankomponenthr"><i class="fa fa-floppy-o" aria-hidden="true"></i> Simpan</button>
															</th>
														</tr>
													</tfoot>
												</table>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="card">
										<div class="card-header card-header-text" data-background-color="purple">
											<h4 class="card-title">Proses THR</h4>
										</div>
										<div class="card-content text-center">
											<div class="toolbar">
												<!--        Here you can write extra buttons/actions for the toolbar              -->
											</div>
											Pilih Tahun THR
											<select class="form-control" id="tahunthr" name="tahunthr" style="width:100%">
												<?php for($i = date('Y') - 3;$i < date('Y') + 3;$i++){ ?>
												<option value="<?=$i?>" <?=$i == date('Y') ? 'selected' : ''?>><?=$i?></option>
												<?php } ?>
											</select>
											<button class="btn btn-success btn-raised btn-round" id="prosesthr">
												<span class="material-icons">
													card_giftcard
												</span>
												Proses THR
											</button>
										</div>
										<div class="card-footer" id="cekerror">
										
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modalTambahCabang" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
					<form id="formcabang" class="form-horizontal">
						<div class="card-header card-header-text" data-background-color="rose">
							<h4 class="card-title">Form Cabang</h4>
						</div>
						<div class="card-content">
							<div class="row">
								<label class="col-sm-3 label-on-left">Cabang</label>
								<div class="col-sm-9">
									<div class="form-group label-floating is-empty">
										<label class="control-label"></label>
										<input type="hidden" id="tempcabang" name="tempcabang">
										<input type="text" class="form-control" id="namacabang" name="namacabang">
										<span class="help-block">Nama cabang</span>
									</div>
								</div>
							</div>
							<div class="row">
								<label class="col-sm-3 label-on-left">Alamat</label>
								<div class="col-sm-9">
									<div class="form-group label-floating is-empty">
										<label class="control-label"></label>
										<textarea class="form-control" id="alamatcabang" name="alamatcabang" autocomplete="off"></textarea>
										<span class="help-block">Alamat cabang lengkap</span>
									</div>
								</div>
							</div>
							<div class="row">
								<label class="col-sm-3 label-on-left">Kota</label>
								<div class="col-sm-9">
									<div class="form-group label-floating is-empty">
										<label class="control-label"></label>
										<input type="text" class="form-control" id="kotacabang" name="kotacabang">
										<span class="help-block">Kota domisili cabang</span>
									</div>
								</div>
							</div>
							<div class="row">
								<label class="col-sm-3 label-on-left">Kode Pos</label>
								<div class="col-sm-9">
									<div class="form-group label-floating is-empty">
										<label class="control-label"></label>
										<input type="text" class="form-control" id="kodeposcabang" name="kodeposcabang">
										<span class="help-block">Kode pos cabang</span>
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

<div class="modal fade" id="modalTambahKerja" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
					<form id="formkerja" class="form-horizontal">
						<div class="card-header card-header-text" data-background-color="rose">
							<h4 class="card-title">Form Jadwal Kerja</h4>
						</div>
						<div class="card-content">
							<div class="row">
								<label class="col-sm-3 label-on-left">Cabang</label>
								<div class="col-sm-9">
									<div class="form-group label-floating is-empty">
										<label class="control-label"></label>
										<input type="hidden" id="tempkerja" name="tempkerja">
										<select class="selectpicker" data-style="btn btn-primary btn-round" id="hari" name="hari">
											<option value="1">Minggu</option>
											<option value="2">Senin</option>
											<option value="3">Selasa</option>
											<option value="4">Rabu</option>
											<option value="5">Kamis</option>
											<option value="6">Jumat</option>
											<option value="7">Sabtu</option>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<label class="col-sm-3 label-on-left">Jam Masuk</label>
								<div class="col-sm-9">
									<div class="form-group label-floating is-empty">
										<label class="control-label"></label>
										<input type="text" class="form-control timepicker" value="07:00" id="jammasuk" name="jammasuk" />
										<span class="help-block">Jam Masuk Kerja</span>
									</div>
								</div>
							</div>
							<div class="row">
								<label class="col-sm-3 label-on-left">Jam Pulang</label>
								<div class="col-sm-9">
									<div class="form-group label-floating is-empty">
										<label class="control-label"></label>
										<input type="text" class="form-control timepicker" value="17:00" id="jampulang" name="jampulang" />
										<span class="help-block">Jam Pulang Kerja</span>
									</div>
								</div>
							</div>
							<div class="row">
								<label class="col-sm-3 label-on-left">Istirahat Keluar</label>
								<div class="col-sm-9">
									<div class="form-group label-floating is-empty">
										<label class="control-label"></label>
										<input type="text" class="form-control timepicker" value="12:00" id="istirahatmulai" name="istirahatmulai" />
										<span class="help-block">Jam Istirahat Mulai</span>
									</div>
								</div>
							</div>
							<div class="row">
								<label class="col-sm-3 label-on-left">Istirahat Kembali</label>
								<div class="col-sm-9">
									<div class="form-group label-floating is-empty">
										<label class="control-label"></label>
										<input type="text" class="form-control timepicker" value="13:00" id="istirahatselesai" name="istirahatselesai" />
										<span class="help-block">Jam Istirahat Selesai</span>
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

<div class="modal fade" id="modalTambahLibur" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
					<form id="formlibur" class="form-horizontal">
						<div class="card-header card-header-text" data-background-color="rose">
							<h4 class="card-title">Form Libur</h4>
						</div>
						<div class="card-content">
							<div class="row">
								<label class="col-sm-3 label-on-left">Tanggal</label>
								<div class="col-sm-9">
									<div class="form-group label-floating is-empty">
										<label class="control-label"></label>
										<input type="text" class="form-control datepicker" value="<?=date("Y-m-d")?>" id="tanggallibur" name="tanggallibur" autocomplete="off">
									</div>
								</div>
							</div>
							<div class="row">
								<label class="col-sm-3 label-on-left">Keterangan</label>
								<div class="col-sm-9">
									<div class="form-group label-floating is-empty">
										<label class="control-label"></label>
										<input type="text" class="form-control" id="keteranganlibur" name="keteranganlibur" />
										<span class="help-block">Keterangan Libur Tanggal Merah</span>
									</div>
								</div>
							</div>
							<div class="row">
								<label class="col-md-3"></label>
								<div class="col-md-9">
									<div class="form-group form-button">
										<button type="submit" class="btn btn-fill btn-success">
											<span class="material-icons">
												add_circle_outline
											</span> Tambah
										</button>
									</div>
								</div>
							</div>
						</div>
					</form>
					<div class="table-responsive">
						<table id="dataliburall" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
							<thead>
								<tr>
									<th>Tanggal</th>
									<th>Keterangan</th>
									<th>#</th>
								</tr>
							</thead>
							<tbody id="bodilibur">
								<tr class="kosonglibur"><td colspan="3">Data tidak ditemukan!</td></tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger btn-simple" data-dismiss="modal">Tutup</button>
				<button type="button" class="btn btn-danger btn-simple" id="btn-simpan-libur">Simpan</button>
			</div>
		</div>
	</div>
</div>

<script>
	var table = $('#datacabang,#datakerja,#datalibur,#dataorganisasi,#datalevel,#dataposisi,#datakomponenthr').DataTable({
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

	
	function removeThis(o) {
		var p=o.parentNode.parentNode;
		p.parentNode.removeChild(p);
	}

	table.on('click', '.editcabang', function() {
		var id = $(this).data('id');
		
		Pace.restart();
		Pace.track(function () {
			$.ajax({
				method: "POST",
				url: "../admincrud/dapatkanCabang",
				data: {id:id}
			}).done(function( data ) {
				$('#tempcabang').val(data.id);
				$('#namacabang').val(data.nama);
				$('#alamatcabang').val(data.alamat);
				$('#kotacabang').val(data.kota);
				$('#kodeposcabang').val(data.kode_pos);
				
				$('#modalTambahCabang').modal('toggle');
				//$('#modalTambahCabang').animate({ scrollTop: 0 }, 'slow');
				
				Pace.stop();
			});
		});
	});
	
	table.on('click', '.editkerja', function() {
		var id = $(this).data('id');
		
		Pace.restart();
		Pace.track(function () {
			$.ajax({
				method: "POST",
				url: "../admincrud/dapatkanKerja",
				data: {id:id}
			}).done(function( data ) {
				$('#tempkerja').val(data.id);
				$('#hari').val(data.hari).trigger('change');
				$('#jammasuk').val(data.masuk);
				$('#jampulang').val(data.pulang);
				$('#istirahatmulai').val(data.istirahat_keluar);
				$('#istirahatselesai').val(data.istirahat_masuk);
				
				$('#modalTambahKerja').modal('toggle');
				
				Pace.stop();
			});
		});
	});
	
	$("#modalTambahCabang").on("hide.bs.modal", function () {
		$("#formcabang")[0].reset();
		$('#tempcabang').val('');
	});
	
	$("#modalTambahKerja").on("hide.bs.modal", function () {
		$("#formkerja")[0].reset();
		$('#tempkerja').val('');
	});
	
	table.on('click', '.removecabang', function(e) {
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
					url: "../admincrud/hapusCabang",
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
	
	table.on('click', '.removekerja', function(e) {
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
					url: "../admincrud/hapusKerja",
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
	
	table.on('click', '.removelibur', function(e) {
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
					url: "../admincrud/hapusLibur",
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
	
	table.on('click', '.removeorganisasi', function(e) {
		var id = $(this).data('id'), ini = $(this);
		
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
					url: "../admincrud/hapusOrganisasi",
					data: {id:id}
				}).done(function( data ) {
					swal({
						title: 'Terhapus!',
						text: 'Data berhasil dihapus.',
						type: 'success'
					});
				
					ini.parent().parent().remove();
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
	
	table.on('click', '.removelevel', function(e) {
		var id = $(this).data('id'), ini = $(this);
		
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
					url: "../admincrud/hapusLevel",
					data: {id:id}
				}).done(function( data ) {
					swal({
						title: 'Terhapus!',
						text: 'Data berhasil dihapus.',
						type: 'success'
					});
				
					ini.parent().parent().remove();
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
	
	table.on('click', '.removeposisi', function(e) {
		var id = $(this).data('id'), ini = $(this);
		
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
					url: "../admincrud/hapusPosisi",
					data: {id:id}
				}).done(function( data ) {
					swal({
						title: 'Terhapus!',
						text: 'Data berhasil dihapus.',
						type: 'success'
					});
				
					ini.parent().parent().remove();
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
	
	<?php 
		if(count($infoperusahaan) > 0){
	?>
	$( document ).ready(function() {
		$('#namaperusahaan').val("<?=$infoperusahaan['nama']?>");
		$('#alamat').val("<?=$infoperusahaan['alamat']?>");
		$('#kota').val("<?=$infoperusahaan['kota']?>");
		$('#provinsi').val("<?=$infoperusahaan['provinsi']?>");
		$('#umr').val('<?=$infoperusahaan["umr"]?>');
		$('#telepon').val("<?=$infoperusahaan['telepon']?>");
		$('#hp').val("<?=$infoperusahaan['hp']?>");
		$('#email').val("<?=$infoperusahaan['email']?>");
		$('#npwp').val("<?=$infoperusahaan['npwp']?>");
	});
	
	<?php
			if($infoperusahaan['logo'] !== ''){
				echo '$("#filelogo").attr("src", "'.base_url().'assets/img/perusahaan/'.$infoperusahaan['logo'].'");';
			}
			if($infoperusahaan['ttd'] !== ''){
				echo '$("#filettd").attr("src", "'.base_url().'assets/img/perusahaan/'.$infoperusahaan['ttd'].'");';
			}
		}
	?>
	
	<?php 
		if(count($infopoin) > 0){
	?>
			$('#menitpoin').val("<?=$infopoin['menit']?>");
			$('#potonganpoin').val("<?=$infopoin['potongan']?>");
	<?php
		}
	?>
	
	$('.select2').select2();
	
	$('#tambahkomponenthr').click(function(){
		var namakomponen = $('#komponenthr').select2('data')[0].text, idkomponen = $('#komponenthr').val();
		
		if($('.kosongthr').length){
			$('#bodikomponenthr').html('');
		}
		
		var ada = false;
		
		$(".baristhr").each(function() {
			if($(this).data('id') == idkomponen){
				ada = true;
			}
		});
		
		if(ada == false){ 
			var newRow = '<tr class="baristhr" data-id="' + idkomponen + '"><td>' + namakomponen + '</td><td><button class="btn btn-sm btn-danger" onclick="removeThis(this);"><i class="fa fa-trash-o" aria-hidden="true"></i></button></td></tr>';
			$('#bodikomponenthr').append(newRow);
		}
	});
	
	$('#simpankomponenthr').click(function(){
		var arrkomponen = [];
		
		$(".baristhr").each(function() {
			arrkomponen.push($(this).data('id'));
		});
		
		if(arrkomponen.length > 0){
			Pace.restart();
			Pace.track(function () {
				
				$.ajax({
					type: "POST",
					url: "../admincrud/tambahKomponenTHR",
					data: { arrkomponen: arrkomponen}
				}).done(function (data) {
					swal({
						title: "Yay!",
						text: "Data berhasil disimpan!",
						type: "success",
						allowOutsideClick: false
					});
					
					Pace.stop();
				});
			});
		}
	});
	
	$("#prosesthr").click(function(e){
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
					url: "../admincrud/prosesTHR",
					data: {tahun: $('#tahunthr').val()}
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
							text: 'Informasi pembayaran thr telah dikirimkan.',
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