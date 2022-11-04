<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<form id="formupdatepegawai" class="form-horizontal">
						<div class="card-header card-header-text" data-background-color="rose">
							<h4 class="card-title">Info Akun</h4>
						</div>
						<div class="card-content">
							<div class="row">
								<div class="col-md-6">
									<div class="row">
										<label class="col-sm-4 label-on-left">Foto Profil</label>
										<div class="col-sm-8">
											<div class="fileinput text-center fileinput-new" data-provides="fileinput" style="padding-top:30px;">
												<div class="fileinput-new thumbnail">
													<img src="<?=base_url()?>assets/img/image_placeholder.jpg" alt="..." id="fotoprofil">
												</div>
												<div class="fileinput-preview fileinput-exists thumbnail" style=""></div>
												<div>
													<span class="btn btn-rose btn-round btn-file">
														<span class="fileinput-new">Pilih Berkas</span>
														<span class="fileinput-exists">Ganti</span>
														<input type="file" name="uploadfoto" id="uploadfoto" accept="image/*">
													<div class="ripple-container"></div></span>
													<a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Hapus<div class="ripple-container"><div class="ripple ripple-on ripple-out" style="left: 21.7344px; top: 12px; background-color: rgb(255, 255, 255); transform: scale(15.5488);"></div></div></a>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<label class="col-sm-4 label-on-left">Username</label>
										<div class="col-sm-8">
											<div class="form-group label-floating is-empty">
												<label class="control-label"></label>
												<input type="text" class="form-control" id="namauser" name="namauser" autocomplete="off">
											</div>
										</div>
									</div>
									<div class="row">
										<label class="col-sm-4 label-on-left">Email</label>
										<div class="col-sm-8">
											<div class="form-group label-floating is-empty">
												<label class="control-label"></label>
												<input type="email" class="form-control" id="email" name="email" autocomplete="off">
											</div>
										</div>
									</div>
									<div class="row">
										<label class="col-sm-4 label-on-left">Nama Lengkap</label>
										<div class="col-sm-8">
											<div class="form-group label-floating is-empty">
												<label class="control-label"></label>
												<input type="text" class="form-control" id="namalengkap" name="namalengkap" autocomplete="off">
												<span class="help-block">Nama lengkap pegawai sesuai kartu identitas</span>
											</div>
										</div>
									</div>
									<div class="row">
										<label class="col-sm-4 label-on-left">HP/Whatsapp</label>
										<div class="col-sm-8">
											<div class="form-group label-floating is-empty">
												<label class="control-label"></label>
												<input type="text" class="form-control" id="hp" name="hp" autocomplete="off">
												<span class="help-block">Nomor HP/Whatsapp terdaftar</span>
											</div>
										</div>
									</div>
									<div class="row">
										<label class="col-sm-4 label-on-left">Telepon</label>
										<div class="col-sm-8">
											<div class="form-group label-floating is-empty">
												<label class="control-label"></label>
												<input type="text" class="form-control" id="telepon" name="telepon" autocomplete="off">
												<span class="help-block">Nomor telepon perusahaan</span>
											</div>
										</div>
									</div>
									<div class="row">
										<label class="col-sm-4 label-on-left">Tempat & Tgl.Lahir</label>
										<div class="col-sm-4">
											<div class="form-group label-floating is-empty">
												<label class="control-label"></label>
												<input type="text" class="form-control" id="tempatlahir" name="tempatlahir" autocomplete="off">
												<span class="help-block">Tempat lahir sesuai kartu identitas</span>
											</div>
										</div>
										<div class="col-sm-4">
											<div class="form-group label-floating is-empty">
												<label class="control-label"></label>
												<input type="text" class="form-control datepicker" value="<?=date("Y-m-d")?>" id="tanggallahir" name="tanggallahir" autocomplete="off">
											</div>
										</div>
									</div>
									
								</div>
								<div class="col-md-6">
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
			<div class="col-md-12">
				<div class="card">
					<form id="formresetpass" action="#" method="">
						<div class="card-header card-header-icon" data-background-color="rose">
							<i class="material-icons">lock</i>
						</div>
						<div class="card-content">
							<h4 class="card-title">Reset Password</h4>
							<div class="form-group label-floating">
								<label class="control-label">
									Password Lama
									<small>*</small>
								</label>
								<input class="form-control pass" name="oldpassword" id="oldpassword" type="password" required="true" />
							</div>
							<div class="form-group label-floating">
								<label class="control-label">
									Password Baru
									<small>*</small>
								</label>
								<input class="form-control pass" name="newpassword" id="newpassword" type="password" required="true" />
							</div>
							<div class="form-group label-floating">
								<label class="control-label">
									Konfirmasi Password
									<small>*</small>
								</label>
								<input class="form-control pass" name="confirmpassword" id="confirmpassword" type="password" required="true"/>
							</div>
							<div class="category form-category">
								<small>*</small> Required fields</div>
							<div class="form-footer text-right">
								<div class="checkbox pull-left">
									<label>
										<input type="checkbox" name="lihatpass" id="lihatpass"> Lihat password
									</label>
								</div>
								<button type="submit" class="btn btn-rose btn-fill">Simpan</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
$('#namauser').val("<?=$infoakun['uname']?>");
$('#email').val("<?=$infoakun['email']?>");
$('#namalengkap').val("<?=$infoakun['nama_lengkap']?>");
$('#hp').val("<?=$infoakun['hp']?>");
$('#telepon').val("<?=$infoakun['phone']?>");
$('#tempatlahir').val("<?=$infoakun['tempat_lahir']?>");
$('#tanggallahir').val("<?=$infoakun['tanggal_lahir']?>");
$("input[name=jk][value=<?=$infoakun['jk']?>]").prop('checked', true);
$("input[name=statuskawin][value='<?=$infoakun['status_kawin']?>']").prop('checked', true);
$('#goldar').val("<?=$infoakun['golongan_darah']?>");
$("input[name=agama][value='<?=$infoakun['agama']?>']").prop('checked', true);
$("input[name=identitas][value='<?=$infoakun['tipe_id']?>']").prop('checked', true);
$('#nomorid').val("<?=$infoakun['no_id']?>");
$('#kodepos').val("<?=$infoakun['kode_pos']?>");
$('#alamatasal').val("<?=$infoakun['alamat_id']?>");
$('#alamatnow').val("<?=$infoakun['alamat_domisili']?>");

<?php
if($infoakun['foto_profil'] !== ''){
	echo '$("#fotoprofil").attr("src", "'.base_url().'assets/img/profil/'.$infoakun['foto_profil'].'");';
}
?>

$('#lihatpass').click(function(){
	if($(this).is(':checked')){
		$('.pass').attr('type','text');
	}else{
		$('.pass').attr('type','password');
	}
});
</script>