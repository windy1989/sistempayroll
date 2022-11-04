<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<button class="btn btn-primary btn-raised btn-round" data-toggle="modal" data-target="#modalPegawai">
					<span class="material-icons">
						add_circle_outline
					</span>
					Tambah Pegawai
				</button>
				<button class="btn btn-info btn-raised btn-round" data-toggle="modal" data-target="#modalKeluarga">
					<span class="material-icons">
						family_restroom
					</span>
					Keluarga Pegawai
				</button>
				<button class="btn btn-warning btn-raised btn-round" data-toggle="modal" data-target="#modalPendidikan">
					<span class="material-icons">
						school
					</span>
					Pendidikan Pegawai
				</button>
				<button class="btn btn-success btn-raised btn-round" data-toggle="modal" data-target="#modalPengalaman">
					<span class="material-icons">
						work
					</span>
					Pengalaman Kerja Pegawai
				</button>
				<a class="btn btn-danger btn-raised btn-round" href="<?=base_url()?>pegawai/pekerjaan">
					<span class="material-icons">
						engineering
					</span>
					Pekerjaan Pegawai
				</a>
			</div>
			<div class="col-md-12">
				<div class="card">
					<div class="card-header card-header-icon" data-background-color="purple">
						<i class="material-icons">badge</i>
					</div>
					<div class="card-content">
						<h4 class="card-title">Daftar Pegawai</h4>
						<div class="toolbar">
							<!--        Here you can write extra buttons/actions for the toolbar              -->
						</div>
						<div class="material-datatables">
							<table id="datapegawai" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
								<thead>
									<tr>
										<th width="5%">No</th>
										<th width="15%">Nama</th>
										<th width="15%">HP/Telp</th>
										<th width="20%">Email</th>
										<th width="15%">Gender</th>
										<th width="10%">User</th>
										<th width="10%">Pajak</th>
										<th width="10%" class="disabled-sorting text-right">#</th>
									</tr>
								</thead>
								<tbody>
									<?php $no=1; foreach($data as $row){ ?>
									<tr>
										<td><?=$no?></td>
										<td><?=$row['nama_lengkap']?></td>
										<td><?=$row['foto_profil'] ? '<img src="'.base_url("assets/img/profil/").$row["foto_profil"].'" style="width:75px !important;height:auto;">' : '<img src="'.base_url("assets/img/default-avatar.png").'" style="width:75px !important;height:auto;">'?></td>
										<!-- <td><?=$row['hp'].' / '.$row['phone']?></td> -->
										<td><?=$row['email']?></td>
										<td><?=$row['jk'] == 'L' ? 'Laki-laki' : 'Perempuan'?></td>
										<td><?=$row['uname']?></td>
										<td>
											<?php if($row['statuspajak'] > 0){ ?>
												<a href="javascript:void(0);" class="btn btn-simple btn-success btn-icon editpajak" data-id="<?=$row['id']?>"><i class="material-icons">receipt</i></a>
											<?php }else{ ?>
												<i class="fa fa-hourglass-half" aria-hidden="true"></i>
											<?php } ?>
										</td>
										<td class="text-right">
											<a href="javascript:void(0);" class="btn btn-simple btn-info btn-icon view" data-id="<?=$row['id']?>"><i class="material-icons">visibility</i></a>
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
										<th>HP/Telp</th>
										<th>Email</th>
										<th>Gender</th>
										<th>User</th>
										<th width="10%">Pajak</th>
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
<div class="modal fade" id="modalPegawai" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
					<form id="formpegawai" class="form-horizontal">
						<div class="card-header card-header-text" data-background-color="rose">
							<h4 class="card-title">Form Pegawai</h4>
						</div>
						<div class="card-content">
							<div class="row">
								<label class="col-sm-3 label-on-left">Nama Lengkap</label>
								<div class="col-sm-9">
									<div class="form-group label-floating is-empty">
										<label class="control-label"></label>
										<input type="hidden" id="temp" name="temp">
										<input type="text" class="form-control" id="namalengkap" name="namalengkap" autocomplete="off">
										<span class="help-block">Ex. Budi Setio</span>
									</div>
								</div>
							</div>
							<div class="row">
								<label class="col-sm-3 label-on-left">Username</label>
								<div class="col-sm-9">
									<div class="form-group label-floating is-empty">
										<label class="control-label"></label>
										<input type="text" class="form-control" id="uname" name="uname" autocomplete="off">
										<span class="help-block">Nama pendek untuk login aplikasi.</span>
									</div>
								</div>
							</div>
							<div class="row">
								<label class="col-sm-3 label-on-left">Password</label>
								<div class="col-sm-9">
									<div class="form-group label-floating is-empty">
										<label class="control-label"></label>
										<input type="password" class="form-control" id="pass" name="pass" autocomplete="off">
										<span class="help-block">Kata sandi untuk login aplikasi.</span>
									</div>
								</div>
							</div>
							<div class="row">
								<label class="col-sm-3 label-on-left">Hak Akses</label>
								<div class="col-sm-9 checkbox-radios">
									<div class="radio">
										<label>
											<input type="radio" name="hakakses" value="ADMIN" checked="true"> Admin
										</label>
									</div>
									<div class="radio">
										<label>
											<input type="radio" name="hakakses" value="KARYAWAN"> Karyawan
										</label>
									</div>
								</div>
							</div>
							<div class="row">
								<label class="col-sm-3 label-on-left">HP</label>
								<div class="col-sm-9">
									<div class="form-group label-floating is-empty">
										<label class="control-label"></label>
										<input type="text" class="form-control" id="hp" name="hp" autocomplete="off">
										<span class="help-block">No. Handphone / Whatsapp Aktif. Ex. 081xxx</span>
									</div>
								</div>
							</div>
							<div class="row">
								<label class="col-sm-3 label-on-left">Email</label>
								<div class="col-sm-9">
									<div class="form-group label-floating is-empty">
										<label class="control-label"></label>
										<input type="email" class="form-control" id="email" name="email" autocomplete="off">
										<span class="help-block">Email aktif sebagai notifikasi data.</span>
									</div>
								</div>
							</div>
							<div class="row">
								<label class="col-sm-3 label-on-left">Telepon</label>
								<div class="col-sm-9">
									<div class="form-group label-floating is-empty">
										<label class="control-label"></label>
										<input type="text" class="form-control" id="telepon" name="telepon" autocomplete="off">
										<span class="help-block">No. Telpon Aktif. Ex. 081xxx</span>
									</div>
								</div>
							</div>
							<div class="row">
								<label class="col-sm-3 label-on-left">TTL</label>
								<div class="col-sm-5">
									<div class="form-group label-floating is-empty">
										<label class="control-label"></label>
										<input type="text" class="form-control" id="tempatlahir" name="tempatlahir" autocomplete="off">
										<span class="help-block">Asal kota lahir</span>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
                                        <input type="text" class="form-control datepicker" value="<?=date("Y-m-d")?>" id="tanggallahir" name="tanggallahir" autocomplete="off">
										<span class="help-block">Tanggal lahir</span>
                                    </div>
								</div>
							</div>
							<div class="row">
								<label class="col-sm-3 label-on-left">Jenis Kelamin</label>
								<div class="col-sm-9 checkbox-radios">
									<div class="radio">
										<label>
											<input type="radio" name="jk" value="L" checked="true"> Laki-laki
										</label>
									</div>
									<div class="radio">
										<label>
											<input type="radio" name="jk" value="P"> Perempuan
										</label>
									</div>
								</div>
							</div>
							<div class="row">
								<label class="col-sm-3 label-on-left">Status Kawin</label>
								<div class="col-sm-9 checkbox-radios">
									<div class="radio">
										<label>
											<input type="radio" name="statuskawin" value="BELUM MENIKAH" checked="true"> Belum Menikah
										</label>
									</div>
									<div class="radio">
										<label>
											<input type="radio" name="statuskawin" value="MENIKAH"> Menikah
										</label>
									</div>
								</div>
							</div>
							<div class="row">
								<label class="col-sm-3 label-on-left">Golongan Darah</label>
								<div class="col-sm-9">
									<div class="form-group label-floating is-empty">
										<label class="control-label"></label>
										<input type="text" class="form-control" id="goldar" name="goldar" autocomplete="off">
										<span class="help-block">Ex. A,O,AB,B</span>
									</div>
								</div>
							</div>
							<div class="row">
								<label class="col-sm-3 label-on-left">Agama</label>
								<div class="col-sm-9 checkbox-radios">
									<div class="radio">
										<label>
											<input type="radio" name="agama" value="ISLAM" checked="true"> Islam
										</label>
									</div>
									<div class="radio">
										<label>
											<input type="radio" name="agama" value="KRISTEN"> Kristen
										</label>
									</div>
									<div class="radio">
										<label>
											<input type="radio" name="agama" value="KATOLIK"> Katolik
										</label>
									</div>
									<div class="radio">
										<label>
											<input type="radio" name="agama" value="HINDU"> Hindu
										</label>
									</div>
									<div class="radio">
										<label>
											<input type="radio" name="agama" value="BUDHA"> BUDHA
										</label>
									</div>
								</div>
							</div>
							<div class="row">
								<label class="col-sm-3 label-on-left">Kartu Identitas</label>
								<div class="col-sm-3 checkbox-radios">
									<div class="radio">
										<label>
											<input type="radio" name="identitas" value="KTP" checked="true"> KTP
										</label>
									</div>
									<div class="radio">
										<label>
											<input type="radio" name="identitas" value="SIM"> SIM
										</label>
									</div>
									<div class="radio">
										<label>
											<input type="radio" name="identitas" value="PASSPORT"> Passport
										</label>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
                                        <input type="text" class="form-control" id="nomorid" name="nomorid" autocomplete="off">
										<span class="help-block">Nomor kartu identitas sesuai opsi.</span>
                                    </div>
								</div>
							</div>
							<div class="row">
								<label class="col-sm-3 label-on-left">Kode Pos</label>
								<div class="col-sm-9">
									<div class="form-group label-floating is-empty">
										<label class="control-label"></label>
										<input type="text" class="form-control" id="kodepos" name="kodepos" autocomplete="off">
										<span class="help-block">Ex. 61233</span>
									</div>
								</div>
							</div>
							<div class="row">
								<label class="col-sm-3 label-on-left">Alamat Asal</label>
								<div class="col-sm-9">
									<div class="form-group label-floating is-empty">
										<label class="control-label"></label>
										<textarea class="form-control" id="alamatasal" name="alamatasal" autocomplete="off"></textarea>
										<span class="help-block">Alamat sesuai kartu identitas.</span>
									</div>
								</div>
							</div>
							<div class="row">
								<label class="col-sm-3 label-on-left">Alamat Domisili</label>
								<div class="col-sm-9">
									<div class="form-group label-floating is-empty">
										<label class="control-label"></label>
										<textarea class="form-control" id="alamatnow" name="alamatnow" autocomplete="off"></textarea>
										<span class="help-block">Alamat tempat tinggal sekarang</span>
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
<!-- Classic Modal -->
<div class="modal fade" id="modalKeluarga" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" style="width:90% !important;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					<i class="material-icons">clear</i>
				</button>
				<h4 class="modal-title">Lihat</h4>
			</div>
			<div class="modal-body">
				<div class="card">
					<div class="card-header card-header-text" data-background-color="rose">
						<h4 class="card-title">Keluarga</h4>
					</div>
					<div class="card-content">
						<div class="table-responsive">
							<table id="datakeluarga" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
								<thead>
									<tr>
										<th width="5%">No</th>
										<th width="25%">Nama</th>
										<th width="25%">Relasi</th>
										<th width="20%">Kontak</th>
										<th width="25%">Pegawai</th>
									</tr>
								</thead>
								<tbody>
									<?php $no=1; foreach($keluarga as $row){ ?>
									<tr>
										<td><?=$no?></td>
										<td><?=$row['nama_lengkap']?></td>
										<td><?=$row['RELASI']?></td>
										<td><?=$row['kontak_darurat']?></td>
										<td><?=$row['NAMAPEGAWAI']?></td>
									</tr>
									<?php $no++; } ?>
								</tbody>
								<tfoot>
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th>Relasi</th>
										<th>Kontak</th>
										<th>Pegawai</th>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger btn-simple" data-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>
<!--  End Modal -->

<!-- Classic Modal -->
<div class="modal fade" id="modalPajakPegawai" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" style="width:90% !important;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					<i class="material-icons">clear</i>
				</button>
				<h4 class="modal-title">Lihat</h4>
			</div>
			<div class="modal-body">
				<div class="card">
					<div class="card-header card-header-text" data-background-color="rose">
						<h4 class="card-title">Pengaturan Gaji/Pajak Pegawai</h4>
					</div>
					<div class="card-content">
						<form id="formupdategajipegawai" class="form-horizontal">
							<div class="row">
								<div class="col-md-6">
									<div class="row">
										<label class="col-sm-3 label-on-left">Wajib Pajak</label>
										<div class="col-sm-9">
											<div class="form-group label-floating is-empty">
												<label class="control-label"></label>
												<div class="togglebutton">
													<label>
														<input type="hidden" id="temppajak" name="temppajak">
														<input type="checkbox" checked name="wajibpajak" id="wajibpajak">
													</label>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<label class="col-sm-3 label-on-left">PTKP</label>
										<div class="col-sm-9">
											<div class="form-group label-floating is-empty">
												<label class="control-label"></label>
												<select class="selectpicker" data-style="btn btn-primary btn-round" id="ptkp" name="ptkp">
													<option value="TK0">TK/0</option>
													<option value="TK1">TK/1</option>
													<option value="TK2">TK/2</option>
													<option value="TK3">TK/3</option>
													<option value="K0">K/0</option>
													<option value="K1">K/1</option>
													<option value="K2">K/2</option>
													<option value="K3">K/3</option>
												</select>
											</div>
										</div>
									</div>
									<div class="row">
										<label class="col-sm-3 label-on-left">Perhitungan</label>
										<div class="col-sm-9">
											<div class="form-group label-floating is-empty">
												<label class="control-label"></label>
												<select class="selectpicker" data-style="btn btn-primary btn-round" id="perhitungan" name="perhitungan">
													<option value="1">Gross</option>
													<option value="2">Gross Up</option>
													<option value="3">Netto</option>
												</select>
											</div>
										</div>
									</div>
									<div class="row">
										<label class="col-sm-3 label-on-left">Waktu Gaji</label>
										<div class="col-sm-9">
											<div class="form-group label-floating is-empty">
												<label class="control-label"></label>
												<select class="selectpicker" data-style="btn btn-primary btn-round" id="waktugaji" name="waktugaji">
													<option value="1">Bulanan</option>
													<option value="2">Mingguan</option>
												</select>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="row">
										<label class="col-sm-3 label-on-left">No.Rekening</label>
										<div class="col-sm-9">
											<div class="form-group label-floating is-empty">
												<label class="control-label"></label>
												<input type="number" class="form-control" id="norek" name="norek" autocomplete="off">
												<span class="help-block">Nomor rekening pegawai</span>
											</div>
										</div>
									</div>
									<div class="row">
										<label class="col-sm-3 label-on-left">Nama Bank</label>
										<div class="col-sm-9">
											<div class="form-group label-floating is-empty">
												<label class="control-label"></label>
												<input type="text" class="form-control" id="namabank" name="namabank" autocomplete="off">
												<span class="help-block">Nama bank rekening penerima gaji pegawai</span>
											</div>
										</div>
									</div>
									<div class="row">
										<label class="col-sm-3 label-on-left">Pemilik Rekening</label>
										<div class="col-sm-9">
											<div class="form-group label-floating is-empty">
												<label class="control-label"></label>
												<input type="text" class="form-control" id="pemilikrekening" name="pemilikrekening" autocomplete="off">
												<span class="help-block">Nama pemilik rekening sesuai data dari bank</span>
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
						</form>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger btn-simple" data-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>
<!--  End Modal -->

<!-- Classic Modal -->
<div class="modal fade" id="modalPendidikan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" style="width:90% !important;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					<i class="material-icons">clear</i>
				</button>
				<h4 class="modal-title">Lihat</h4>
			</div>
			<div class="modal-body">
				<div class="card">
					<div class="card-header card-header-text" data-background-color="rose">
						<h4 class="card-title">Pendidikan</h4>
					</div>
					<div class="card-content">
						<div class="table-responsive">
							<table id="datapendidikan" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
								<thead>
									<tr>
										<th width="5%">No</th>
										<th width="20%">Nama</th>
										<th width="15%">Jenjang</th>
										<th width="20%">Institusi</th>
										<th width="20%">Jurusan</th>
										<th width="20%">Tahun</th>
									</tr>
								</thead>
								<tbody>
									<?php $no=1; foreach($pendidikan as $row){ ?>
									<tr>
										<td><?=$no?></td>
										<td><?=$row['NAMAPEGAWAI']?></td>
										<td><?=$row['JENJANG']?></td>
										<td><?=$row['nama_institusi']?></td>
										<td><?=$row['jurusan']?></td>
										<td><?=$row['tahun_mulai'].' - '.$row['tahun_selesai']?></td>
									</tr>
									<?php $no++; } ?>
								</tbody>
								<tfoot>
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th>Jenjang</th>
										<th>Institusi</th>
										<th>Jurusan</th>
										<th>Tahun</th>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger btn-simple" data-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>
<!--  End Modal -->
<!-- Classic Modal -->
<div class="modal fade" id="modalPengalaman" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" style="width:90% !important;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					<i class="material-icons">clear</i>
				</button>
				<h4 class="modal-title">Lihat</h4>
			</div>
			<div class="modal-body">
				<div class="card">
					<div class="card-header card-header-text" data-background-color="rose">
						<h4 class="card-title">Pengalaman Kerja</h4>
					</div>
					<div class="card-content">
						<div class="table-responsive">
							<table id="datapengalaman" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
								<thead>
									<tr>
										<th width="5%">No</th>
										<th width="20%">Nama</th>
										<th width="15%">Perusahaan</th>
										<th width="20%">Posisi</th>
										<th width="20%">Tahun</th>
									</tr>
								</thead>
								<tbody>
									<?php $no=1; foreach($pengalaman as $row){ ?>
									<tr>
										<td><?=$no?></td>
										<td><?=$row['NAMAPEGAWAI']?></td>
										<td><?=$row['nama_perusahaan']?></td>
										<td><?=$row['posisi']?></td>
										<td><?=$row['mulai'].' - '.$row['selesai']?></td>
									</tr>
									<?php $no++; } ?>
								</tbody>
								<tfoot>
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th>Perusahaan</th>
										<th>Posisi</th>
										<th>Tahun</th>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
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
//LAMAN PEGAWAI

var table = $('#datapegawai,#datakeluarga,#datapendidikan,#datapengalaman').DataTable({
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

// View record
table.on('click', '.view', function() {
	var id = $(this).data('id');
	
	Pace.restart();
	Pace.track(function () {
		$.ajax({
			method: "POST",
			url: "../admincrud/dapatkan_pegawai",
			data: {id:id}
		}).done(function( data ) {
			$('#temp').val(data.id);
			$('#namalengkap').val(data.nama_lengkap);
			$('#uname').val(data.uname);
			$("input[name=hakakses][value='" + data.hak_akses + "']").prop('checked', true);
			$('#hp').val(data.hp);
			$('#email').val(data.email);
			$('#telepon').val(data.phone);
			$('#tempatlahir').val(data.tempat_lahir);
			$('#tanggallahir').val(data.tanggal_lahir);
			$("input[name=jk][value=" + data.jk + "]").prop('checked', true);
			$("input[name=statuskawin][value='" + data.status_kawin + "']").prop('checked', true);
			$('#goldar').val(data.golongan_darah);
			$("input[name=agama][value='" + data.agama + "']").prop('checked', true);
			$("input[name=identitas][value='" + data.tipe_id + "']").prop('checked', true);
			$('#nomorid').val(data.no_id);
			$('#kodepos').val(data.kode_pos);
			$('#alamatasal').val(data.alamat_id);
			$('#alamatnow').val(data.alamat_domisili);
			$("#formpegawai :input").prop("disabled", true);
			
			$('#modalPegawai').modal('toggle');
			Pace.stop();
		});
	});
});

// Edit record
table.on('click', '.edit', function() {
	var id = $(this).data('id');
	
	Pace.restart();
	Pace.track(function () {
		$.ajax({
			method: "POST",
			url: "../admincrud/dapatkan_pegawai",
			data: {id:id}
		}).done(function( data ) {
			$('#temp').val(data.id);
			$('#namalengkap').val(data.nama_lengkap);
			$('#uname').val(data.uname);
			$("input[name=hakakses][value='" + data.hak_akses + "']").prop('checked', true);
			$('#hp').val(data.hp);
			$('#email').val(data.email);
			$('#telepon').val(data.phone);
			$('#tempatlahir').val(data.tempat_lahir);
			$('#tanggallahir').val(data.tanggal_lahir);
			$("input[name=jk][value=" + data.jk + "]").prop('checked', true);
			$("input[name=statuskawin][value='" + data.status_kawin + "']").prop('checked', true);
			$('#goldar').val(data.golongan_darah);
			$("input[name=agama][value='" + data.agama + "']").prop('checked', true);
			$("input[name=identitas][value='" + data.tipe_id + "']").prop('checked', true);
			$('#nomorid').val(data.no_id);
			$('#kodepos').val(data.kode_pos);
			$('#alamatasal').val(data.alamat_id);
			$('#alamatnow').val(data.alamat_domisili);
			$('#uname').attr("disabled", true);
			
			$('#modalPegawai').modal('toggle');
			Pace.stop();
		});
	});
});


// Edit record
table.on('click', '.editpajak', function() {
	var id = $(this).data('id');
	
	Pace.restart();
	Pace.track(function () {
		$.ajax({
			method: "POST",
			url: "../admincrud/dapatkan_pajak_pegawai",
			data: {id:id}
		}).done(function( data ) {
			$('#temppajak').val(data.id);
			$('#pemilikrekening').val(data.rekening_atas_nama);
			$('#namabank').val(data.rekening_bank);
			$('#norek').val(data.rekening_no);
			$('#waktugaji').val(data.tipe_waktu_gaji).trigger('change');
			$('#perhitungan').val(data.tipe_perhitungan).trigger('change');
			$('#ptkp').val(data.tipe_ptkp).trigger('change');
			
			var ispkp = data.ispkp;
			
			if(ispkp == 1){
				$('#wajibpajak').prop('checked', true);
			}else{
				$('#wajibpajak').prop('checked', false);
			}
			
			$('#modalPajakPegawai').modal('toggle');
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
				url: "../admincrud/hapus_pegawai",
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

$('.card .material-datatables label').addClass('form-group');

$("#modalPegawai").on("hide.bs.modal", function () {
    $("#formpegawai")[0].reset();
	$('#temp').val('');
	$("#formpegawai :input").prop("disabled", false);
});

//END FORM PEGAWAI
</script>