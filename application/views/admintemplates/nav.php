	<div class="wrapper">
        <div class="sidebar" data-active-color="rose" data-background-color="black" data-image="../assets/img/sidebar-1.jpg">
            <!--
        Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
        Tip 2: you can also add an image using data-image tag
        Tip 3: you can change the color of the sidebar with data-background-color="white | black"
    -->
            <div class="logo">
                <a href="<?=base_url()?>" class="simple-text">
					PT. XYZ
                </a>
            </div>
            <div class="logo logo-mini">
                <a href="<?=base_url()?>" class="simple-text">
                    XYZ
                </a>
            </div>
            <div class="sidebar-wrapper">
                <div class="user">
                    <div class="photo">
                        <?=$_SESSION['backuserfoto'] ? '<img src="'.base_url("assets/img/profil/").$_SESSION["backuserfoto"].'">' : '<img src="'.base_url("assets/img/default-avatar.png").'">'?>
                    </div>
                    <div class="info">
                        <a data-toggle="collapse" href="#collapseExample" class="<?=in_array($judul, array('kelengkapan','akun')) ? '' : 'collapsed'?>" aria-expanded="<?=in_array($judul, array('kelengkapan','akun')) ? 'true' : 'false'?>">
                            <?=ucwords($_SESSION['backfullname'])?>
                            <b class="caret"></b>
                        </a>
                        <div class="collapse <?=in_array($judul, array('kelengkapan','akun')) ? 'in' : ''?>" id="collapseExample" aria-expanded="<?=in_array($judul, array('kelengkapan','akun')) ? 'true' : 'false'?>">
                            <ul class="nav">
                                <li class="<?=$judul == 'akun' ? 'active' : ''?>">
                                    <a href="<?=base_url()?>akun">Akun</a>
                                </li>
								<li class="<?=$judul == 'kelengkapan' ? 'active' : ''?>">
                                    <a href="<?=base_url()?>kelengkapan">Kelengkapan</a>
                                </li>
								<li>
                                    <a href="javascript:void(0);" id="logout">Keluar</a>
                                </li>
							</ul>
                        </div>
                    </div>
                </div>
                <ul class="nav">
                    <li class="<?=$judul == 'utama' ? 'active' : ''?>">
                        <a href="<?=base_url()?>">
                            <i class="material-icons">dashboard</i>
                            <p>Dashboard</p>
                        </a>
                    </li>
					
					<li class="<?=in_array($judul, array('reimburse','kas_dimuka','pinjaman','gaji','klaim_benefit')) ? 'active' : ''?>">
                        <a data-toggle="collapse" href="#componentsExamples" <?=in_array($judul, array('reimburse','kas_dimuka','pinjaman','gaji','klaim_benefit')) ? 'aria-expanded="true"' : ''?>>
                            <i class="material-icons">price_change</i>
                            <p>Keuangan
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse <?=in_array($judul, array('reimburse','kas_dimuka','pinjaman','gaji','reimburse_pegawai','kas_pegawai','pinjaman_pegawai','gaji_pegawai','klaim_benefit')) ? 'in' : ''?>" id="componentsExamples">
                            <ul class="nav">
								<li class="<?=$judul == 'reimburse' || $judul == 'reimburse_pegawai' ? 'active' : ''?>">
									<a href="<?=base_url()?>reimburse">
										<i class="material-icons">payments</i>
										Reimburse
									</a>
								</li>
								<li class="<?=$judul == 'kas_dimuka' || $judul == 'kas_pegawai' ? 'active' : ''?>">
									<a href="<?=base_url()?>kas_dimuka">
										<i class="material-icons">local_atm</i>
										Kas Dimuka
									</a>
								</li>
								<li class="<?=$judul == 'pinjaman' || $judul == 'pinjaman_pegawai' ? 'active' : ''?>">
									<a href="<?=base_url()?>pinjaman">
										<i class="material-icons">credit_score</i>
										Pinjaman
									</a>
								</li>
								<li class="<?=$judul == 'gaji' || $judul == 'gaji_pegawai' ? 'active' : ''?>">
									<a href="<?=base_url()?>gaji">
										<i class="material-icons">account_balance_wallet</i>
										<p>Gaji</p>
									</a>
								</li>
								<li class="<?=$judul == 'klaim_benefit' ? 'active' : ''?>">
									<a href="<?=base_url()?>klaim_benefit">
										<i class="material-icons">health_and_safety</i>
										<p>Klaim Benefit</p>
									</a>
								</li>
                            </ul>
                        </div>
                    </li>
					<li class="<?=in_array($judul, array('absensi','cuti','lembur','absensi_pegawai','cuti_pegawai','lembur_pegawai')) ? 'active' : ''?>">
                        <a data-toggle="collapse" href="#componentsExamples1" <?=in_array($judul, array('absensi','cuti','lembur')) ? 'aria-expanded="true"' : ''?>>
                            <i class="material-icons">date_range</i>
                            <p>Kehadiran
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse <?=in_array($judul, array('absensi','cuti','lembur','absensi_pegawai','cuti_pegawai','lembur_pegawai')) ? 'in' : ''?>" id="componentsExamples1">
                            <ul class="nav">
								<li class="<?=$judul == 'absensi' || $judul == 'absensi_pegawai' ? 'active' : ''?>">
									<a href="<?=base_url()?>absensi">
										<i class="material-icons">verified</i>
										Absensi
									</a>
								</li>
								<li class="<?=$judul == 'cuti' || $judul == 'cuti_pegawai' ? 'active' : ''?>">
									<a href="<?=base_url()?>cuti">
										<i class="material-icons">event_busy</i>
										Cuti / Ijin
									</a>
								</li>
								<li class="<?=$judul == 'lembur' || $judul == 'lembur_pegawai' ? 'active' : ''?>">
									<a href="<?=base_url()?>lembur">
										<i class="material-icons">schedule</i>
										Lembur
									</a>
								</li>
                            </ul>
                        </div>
                    </li>
					<li class="<?=$judul == 'file' || $judul == 'file_pegawai' ? 'active' : ''?>">
                        <a href="<?=base_url()?>file">
                            <i class="material-icons">folder</i>
                            <p>File</p>
                        </a>
                    </li>
					<li class="<?=$judul == 'aset' || $judul == 'aset_pegawai' ? 'active' : ''?>">
                        <a href="<?=base_url()?>aset">
                            <i class="material-icons">devices</i>
                            <p>Aset</p>
                        </a>
                    </li>
					<?php if($_SESSION['backjabatan'] == 'ADMIN'){ ?>
					<li class="<?=in_array($judul, array('perusahaan','pegawai','benefit','laporan','pekerjaan_pegawai')) ? 'active' : ''?>">
                        <a data-toggle="collapse" href="#componentsExamples2" <?=in_array($judul, array('perusahaan','pegawai','benefit','laporan','pekerjaan_pegawai')) ? 'aria-expanded="true"' : ''?>>
                            <i class="material-icons">settings</i>
                            <p>Manajemen
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse <?=in_array($judul, array('perusahaan','pegawai','benefit','laporan','pekerjaan_pegawai','benefit_pegawai')) ? 'in' : ''?>" id="componentsExamples2">
                            <ul class="nav">
								<li class="<?=$judul == 'perusahaan' ? 'active' : ''?>">
									<a href="<?=base_url()?>perusahaan">
										<i class="material-icons">business</i>
										Perusahaan
									</a>
								</li>
								<li class="<?=$judul == 'pegawai' || $judul == 'pekerjaan_pegawai' ? 'active' : ''?>">
									<a href="<?=base_url()?>pegawai">
										<i class="material-icons">badge</i>
										Pegawai
									</a>
								</li>
								<li class="<?=$judul == 'benefit' || $judul == 'benefit_pegawai' ? 'active' : ''?>">
									<a href="<?=base_url()?>benefit">
										<i class="material-icons">health_and_safety</i>
										Benefit
									</a>
								</li>
								<li class="<?=$judul == 'laporan' ? 'active' : ''?>">
									<a href="<?=base_url()?>laporan">
										<i class="material-icons">receipt_long</i>
										Laporan
									</a>
								</li>
                            </ul>
                        </div>
                    </li>
					<?php } ?>
                </ul>
            </div>
        </div>
		<div class="main-panel">