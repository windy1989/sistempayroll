<?php
class Admincrud extends CI_Controller
{	
	//LOAD FUNGSI LIBRARY TAMBAHAN
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('all_model');
		$this->load->library('session');
		$this->load->helper('url');
	}
	
	//FUNGSI LOGIN YANG DITERUSKAN KE MODEL ALL
	public function login()
	{
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			echo $this->all_model->goLogin();
		}else{
			show_404();
		}
	}
	
	//FUNGSI LOGOUT APLIKASI
	public function signout()
	{
		$this->all_model->goLogout();
		session_destroy();
	}
	
	public function tambah_pegawai(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			echo $this->all_model->add_pegawai();
		}else{
			show_404();
		}
	}
	
	public function dapatkan_pegawai(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			header('Content-Type: application/json');
			echo json_encode($this->all_model->get_pegawai());
		}else{
			show_404();
		}
	}
	
	public function hapus_pegawai(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			echo $this->all_model->del_pegawai();
		}else{
			show_404();
		}
	}
	
	public function getTime(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			echo date('Y-m-d h:i:s');
		}else{
			show_404();
		}
	}
	
	public function getKodePegawai(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			echo $this->all_model->get_kode_pegawai();
		}else{
			show_404();
		}
	}
	
	public function tambahPekerjaanPegawai(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			echo $this->all_model->add_pekerjaan_pegawai();
		}else{
			show_404();
		}
	}
	
	public function dapatkanPekerjaanPegawai(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			header('Content-Type: application/json');
			echo json_encode($this->all_model->get_pekerjaan_pegawai());
		}else{
			show_404();
		}
	}
	
	public function hapusPekerjaanPegawai(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			echo $this->all_model->del_pekerjaan_pegawai();
		}else{
			show_404();
		}
	}
	
	public function tambahBenefit(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			echo $this->all_model->add_benefit();
		}else{
			show_404();
		}
	}
	
	public function dapatkanBenefit(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			header('Content-Type: application/json');
			echo json_encode($this->all_model->get_benefit());
		}else{
			show_404();
		}
	}
	
	public function hapusBenefit(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			echo $this->all_model->del_benefit();
		}else{
			show_404();
		}
	}
	
	public function tambahBenefitPegawai(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			echo $this->all_model->add_benefit_pegawai();
		}else{
			show_404();
		}
	}
	
	public function dapatkanBenefitPegawai(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			header('Content-Type: application/json');
			echo json_encode($this->all_model->get_benefit_pegawai());
		}else{
			show_404();
		}
	}
	
	public function hapusBenefitPegawai(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			echo $this->all_model->del_benefit_pegawai();
		}else{
			show_404();
		}
	}
	
	public function tambahTipeReimburse(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			echo $this->all_model->add_tipe_reimburse();
		}else{
			show_404();
		}
	}
	
	public function dapatkanTipeReimburse(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			header('Content-Type: application/json');
			echo json_encode($this->all_model->get_tipe_reimburse());
		}else{
			show_404();
		}
	}
	
	public function hapusTipeReimburse(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			echo $this->all_model->del_tipe_reimburse();
		}else{
			show_404();
		}
	}
	
	public function cekSaldoReimburse(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			echo $this->all_model->cek_saldo_reimburse();
		}else{
			show_404();
		}
	}
	
	public function tambahReimburse(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			echo $this->all_model->add_reimburse();
		}else{
			show_404();
		}
	}
	
	public function dapatkanReimburse(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			header('Content-Type: application/json');
			echo json_encode($this->all_model->get_reimburse());
		}else{
			show_404();
		}
	}
	
	public function hapusReimburse(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			echo $this->all_model->del_reimburse();
		}else{
			show_404();
		}
	}
	
	public function updateIjinReimburse(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			echo $this->all_model->update_ijin_reimburse();
		}else{
			show_404();
		}
	}
	
	public function tambahKasDimuka(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			echo $this->all_model->add_kas_dimuka();
		}else{
			show_404();
		}
	}
	
	public function dapatkanKasDimuka(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			header('Content-Type: application/json');
			echo json_encode($this->all_model->get_kas_dimuka());
		}else{
			show_404();
		}
	}
	
	public function hapusKasDimuka(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			echo $this->all_model->del_kas_dimuka();
		}else{
			show_404();
		}
	}
	
	public function updateIjinKas(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			echo $this->all_model->update_ijin_kas();
		}else{
			show_404();
		}
	}
	
	public function uploadBuktiKas(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			echo $this->all_model->upload_bukti_kas();
		}else{
			show_404();
		}
	}
	
	public function tambahPinjaman(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			echo $this->all_model->add_pinjaman();
		}else{
			show_404();
		}
	}
	
	public function dapatkanPinjaman(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			header('Content-Type: application/json');
			echo json_encode($this->all_model->get_pinjaman());
		}else{
			show_404();
		}
	}
	
	public function hapusPinjaman(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			echo $this->all_model->del_pinjaman();
		}else{
			show_404();
		}
	}
	
	public function updateIjinPinjaman(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			echo $this->all_model->update_ijin_pinjaman();
		}else{
			show_404();
		}
	}
	
	public function goAbsen(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			echo $this->all_model->go_absen();
		}else{
			show_404();
		}
	}
	
	public function lihatRekapAbsen(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			$totalmasuk = $this->all_model->get_total_masuk($this->input->post('tahun'),$this->input->post('bulan'),$_SESSION['backuserid']);
			$totalijin = $this->all_model->get_total_ijin($this->input->post('tahun'),$this->input->post('bulan'),$_SESSION['backuserid']);
			$totalabsen = $this->all_model->get_total_absen($this->input->post('tahun'),$this->input->post('bulan'),$_SESSION['backuserid']);
			$totalpoin = $this->all_model->get_total_poin($this->input->post('tahun'),$this->input->post('bulan'),$_SESSION['backuserid']);
			?>
			<div class="col-lg-6 col-md-6 col-sm-12">
				<div class="card card-stats">
					<div class="card-header" data-background-color="green">
						<i class="fa fa-sign-in"></i>
					</div>
					<div class="card-content">
						<p class="category">Masuk</p>
						<h3 class="card-title"><?=$totalmasuk['total']?></h3>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-12">
				<div class="card card-stats">
					<div class="card-header" data-background-color="orange">
						<i class="fa fa-calendar-minus-o"></i>
					</div>
					<div class="card-content">
						<p class="category">Ijin</p>
						<h3 class="card-title"><?=$totalijin['total']?></h3>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-12">
				<div class="card card-stats">
					<div class="card-header" data-background-color="rose">
						<i class="fa fa-calendar-times-o"></i>
					</div>
					<div class="card-content">
						<p class="category">Absen</p>
						<h3 class="card-title"><?=$totalabsen?></h3>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-12">
				<div class="card card-stats">
					<div class="card-header" data-background-color="blue">
						<i class="fa fa-cc"></i>
					</div>
					<div class="card-content">
						<p class="category">Poin Terlambat</p>
						<h3 class="card-title"><?=$totalpoin?></h3>
					</div>
				</div>
			</div>
			<?php
		}else{
			show_404();
		}
	}
	
	public function lihatRekapAbsenTanggal(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			$data = $this->all_model->list_absensi_pegawai_all($this->input->post('tgl'));
			?>
				<div class="material-datatables">
					<table id="dataabsensi" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th>Info</th>
								<th>Masuk</th>
								<th>Istirahat</th>
								<th>Pulang</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$no = 1;
							foreach($data as $row){
							?>
							<tr>
								<td><?=$no?></td>
								<td><?=ucwords($row['nama_lengkap'])?></td>
								<td>
									<?php 
										$masuk = '00:00';
										$pulang = '00:00';
										$istirahat_keluar = '00:00';
										$istirahat_masuk = '00:00';
										
										if($row['cekjadwalkerja'] !== 0 && $row['cekharilibur'] == 0 && $row['cekijin'] == 0 && $row['cekabsen'] !== ''){
											echo 'WEEKDAY';
											
											if(explode('|',$row['cekabsen'])[0] !== ''){
												$masuk = date('H:i',strtotime(explode('|',$row['cekabsen'])[0]));
											}
											if(explode('|',$row['cekabsen'])[1] !== ''){
												$pulang = date('H:i',strtotime(explode('|',$row['cekabsen'])[1]));
											}
											if(explode('|',$row['cekabsen'])[2] !== ''){
												$istirahat_keluar = date('H:i',strtotime(explode('|',$row['cekabsen'])[2]));
											}
											if(explode('|',$row['cekabsen'])[3] !== ''){
												$istirahat_masuk = date('H:i',strtotime(explode('|',$row['cekabsen'])[3]));
											}
											
										}else{
											if($row['cekjadwalkerja'] == 0){
												echo 'WEEKEND';
											}elseif($row['cekharilibur'] > 0){
												echo 'LIBUR';
											}elseif($row['cekijin'] > 0){
												echo 'IJIN';
											}elseif($row['cekabsen'] == ''){
												echo 'ABSEN';
											}
										}
										
									?>
								</td>
								<td><?=$masuk?></td>
								<td><?=$istirahat_keluar?> s/d <?=$istirahat_masuk?></td>
								<td><?=$pulang?></td>
							</tr>
							<?php $no++; } ?>
						</tbody>
						<tfoot>
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th>Info</th>
								<th>Masuk</th>
								<th>Istirahat</th>
								<th>Pulang</th>
							</tr>
						</tfoot>
					</table>
				</div>
				<script>
				$('#dataabsensi').DataTable({
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
			<?php
		}else{
			show_404();
		}
		
	}
	
	public function tambahCuti(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			echo $this->all_model->add_cuti();
		}else{
			show_404();
		}
	}
	
	public function dapatkanCuti(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			header('Content-Type: application/json');
			echo json_encode($this->all_model->get_cuti());
		}else{
			show_404();
		}
	}
	
	public function updateIjinCuti(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			echo $this->all_model->update_ijin_cuti();
		}else{
			show_404();
		}
	}
	
	public function dapatkanTipeCuti(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			header('Content-Type: application/json');
			echo json_encode($this->all_model->get_tipe_cuti());
		}else{
			show_404();
		}
	}
	
	public function hapusCuti(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			echo $this->all_model->del_cuti();
		}else{
			show_404();
		}
	}
	
	public function hapusTipeCuti(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			echo $this->all_model->del_tipe_cuti();
		}else{
			show_404();
		}
	}
	
	public function tambahTipeCuti(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			echo $this->all_model->add_tipe_cuti();
		}else{
			show_404();
		}
	}
	
	public function tambahLembur(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			echo $this->all_model->add_lembur();
		}else{
			show_404();
		}
	}
	
	public function dapatkanLembur(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			header('Content-Type: application/json');
			echo json_encode($this->all_model->get_lembur());
		}else{
			show_404();
		}
	}
	
	public function hapusLembur(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			echo $this->all_model->del_lembur();
		}else{
			show_404();
		}
	}
	
	public function updateIjinLembur(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			echo $this->all_model->update_ijin_lembur();
		}else{
			show_404();
		}
	}
	
	public function tambahFile(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			echo $this->all_model->add_file();
		}else{
			show_404();
		}
	}
	
	public function dapatkanFile(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			header('Content-Type: application/json');
			echo json_encode($this->all_model->get_file());
		}else{
			show_404();
		}
	}
	
	public function hapusFile(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			echo $this->all_model->del_file();
		}else{
			show_404();
		}
	}
	
	public function updateIjinFile(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			echo $this->all_model->update_ijin_file();
		}else{
			show_404();
		}
	}
	
	public function tambahPengajuanAset(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			echo $this->all_model->add_pengajuan_aset();
		}else{
			show_404();
		}
	}
	
	public function dapatkanPengajuanAset(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			header('Content-Type: application/json');
			echo json_encode($this->all_model->get_pengajuan_aset());
		}else{
			show_404();
		}
	}
	
	public function hapusPengajuanAset(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			echo $this->all_model->del_pengajuan_aset();
		}else{
			show_404();
		}
	}
	
	public function tambahAset(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			echo $this->all_model->add_aset();
		}else{
			show_404();
		}
	}
	
	public function tambahKategoriAset(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			echo $this->all_model->add_kategori_aset();
		}else{
			show_404();
		}
	}
	
	public function dapatkanAset(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			header('Content-Type: application/json');
			echo json_encode($this->all_model->get_aset());
		}else{
			show_404();
		}
	}
	
	public function hapusAset(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			echo $this->all_model->del_aset();
		}else{
			show_404();
		}
	}
	
	public function dapatkanKategoriAset(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			header('Content-Type: application/json');
			echo json_encode($this->all_model->get_kategori_aset());
		}else{
			show_404();
		}
	}
	
	public function hapusKategoriAset(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			echo $this->all_model->del_kategori_aset();
		}else{
			show_404();
		}
	}
	
	public function updateIjinAset(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			echo $this->all_model->update_ijin_aset();
		}else{
			show_404();
		}
	}
	
	public function kembaliAset(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			echo $this->all_model->kembali_aset();
		}else{
			show_404();
		}
	}
	
	public function tambahKomponenUpah(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			echo $this->all_model->add_komponen_upah();
		}else{
			show_404();
		}
	}
	
	public function dapatkanKomponenPegawai(){
		
		$data = $this->all_model->get_komponen_pegawai($this->input->post('id'));
		$komponenupah = $this->all_model->list_komponen_upah();
		
		?>
			<table id="dataupahpegawai" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
				<thead>
					<tr>
						<th>Komponen</th>
						<th>Nominal</th>
						<th>#</th>
					</tr>
				</thead>
				<tbody id="bodikomponen">
					<?php 
						if(count($data) > 0){
							foreach($data as $row){
					?>
					<tr>
						<td><?=$row['nama']?></td>
						<td>
							<input type="text" class="form-control inputkomponen autonumeric" value="<?=round($row['nominal'],0)?>" data-id="<?=$row['id_komponen_upah']?>">
						</td>
						<td>
							<button class="btn btn-sm btn-danger" onclick="removeThis(this);"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
						</td>
					</tr>
					<?php 
							}
					}else{
						echo '<tr class="kosong"><td colspan="4">Data tidak ditemukan!</td></tr>';
					}
					?>
				</tbody>
				<tfoot>
					<tr>
						<th colspan="2">
							<div class="row">
								<div class="col-md-6 col-md-offset-6">
									<select class="form-control select2" id="komponen" name="komponen" style="width:100%">
										<?php foreach($komponenupah as $row){ ?>
										<option value="<?=$row['id']?>"><?=$row['nama']?></option>
										<?php } ?>
									</select>
								</div>
							</div>
						</th>
						<th><button class="btn btn-info btn-sm" id="tambahkomponen"><i class="fa fa-plus-circle"></i></button></th>
					</tr>
					<tr>
						<th colspan="3">
							<button class="btn btn-success btn-sm btn-block" id="simpankomponenpegawai"><i class="fa fa-floppy-o" aria-hidden="true"></i> Simpan</button>
						</th>
					</tr>
				</tfoot>
			</table>
			<script>
				$('.select2').select2();
				
				$('#tambahkomponen').click(function(){
					var namakomponen = $('#komponen').select2('data')[0].text, idkomponen = $('#komponen').val();
					
					if($('.kosong').length){
						$('#bodikomponen').html('');
					}
					
					var ada = false;
					
					$(".inputkomponen").each(function() {
						if($(this).data('id') == idkomponen){
							ada = true;
						}
					});
					
					if(ada == false){ 
						var newRow = '<tr><td>' + namakomponen + '</td><td><input type="text" class="form-control inputkomponen autonumeric" value="0" data-id="' + idkomponen + '"></td><td><button class="btn btn-sm btn-danger" onclick="removeThis(this);"><i class="fa fa-trash-o" aria-hidden="true"></i></button></td></tr>';
						$('#bodikomponen').append(newRow);
						
						new AutoNumeric('.inputkomponen[data-id="' + idkomponen + '"]', {
							digitGroupSeparator : '.',
							decimalCharacter : ',',
							decimalPlaces : 0,
						});
					}
				});
				
				function removeThis(o) {
					var p=o.parentNode.parentNode;
					 p.parentNode.removeChild(p);
				}
				
				$('#simpankomponenpegawai').click(function(){
					var arrkomponen = [], arrnominal = [], pegawai = $('#pegawai').val();
					
					$(".inputkomponen").each(function() {
						arrkomponen.push($(this).data('id'));
						arrnominal.push($(this).val());
					});
					
					if(arrkomponen.length > 0){
						Pace.restart();
						Pace.track(function () {
							
							$.ajax({
								type: "POST",
								url: "../admincrud/tambahKomponenPegawai",
								data: { arrkomponen: arrkomponen, arrnominal: arrnominal, pegawai: pegawai }
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
				
				var b = new AutoNumeric.multiple('.autonumeric', {
					digitGroupSeparator : '.',
					decimalCharacter : ',',
					decimalPlaces : 0,
				});
			</script>
		<?php
		
	}
	
	public function dapatkanKomponenUpah(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			header('Content-Type: application/json');
			echo json_encode($this->all_model->get_komponen_upah());
		}else{
			show_404();
		}
	}
	
	public function hapusKomponenUpah(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			echo $this->all_model->del_komponen_upah();
		}else{
			show_404();
		}
	}
	
	public function tambahKomponenPegawai(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			echo $this->all_model->add_komponen_pegawai();
		}else{
			show_404();
		}
	}
	
	public function tambahPengaturanGaji(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			echo $this->all_model->add_pengaturan_gaji();
		}else{
			show_404();
		}
	}
	
	public function updatePengaturanGaji(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			echo $this->all_model->update_pengaturan_gaji();
		}else{
			show_404();
		}
	}
	
	public function prosesTHR(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			$tahun = $this->input->post('tahun');
			
			$listcek = $this->all_model->list_pegawai();
			
			$alert = '';
			
			$arrnokomponen = array();
			$arrnoinfogaji = array();
			
			foreach($listcek as $rows){
				$infogaji = $this->all_model->get_pengaturan_gaji($rows['id']);
				$mykomponen = $this->all_model->get_komponen_pegawai($rows['id']);
				if(count($mykomponen) == 0){
					$arrnokomponen[] = $rows['nama_lengkap'];
				}
				if(!isset($infogaji)){
					$arrnoinfogaji[] = $rows['nama_lengkap'];
				}
			}
			
			$alert .= "Komponen upah belum diisi : ".implode(', ',$arrnokomponen);
			$alert .= "<br>Pengaturan Pajak belum ditentukan : ".implode(', ',$arrnoinfogaji);
			
			$listkomponenthr = $this->all_model->list_komponen_thr();
			$listpegawai = $this->all_model->list_pegawai();
			
			$isikomponen = '';
			
			if(count($arrnokomponen) == 0 && count($arrnoinfogaji) == 0){
				foreach($listpegawai as $rowpegawai){
					$infogaji = $this->all_model->get_pengaturan_gaji($rowpegawai['id']);
					$mykomponen = $this->all_model->get_komponen_pegawai($rowpegawai['id']);
					
					$totalkomponen = 0;
					$totalgajipph = 0;
					
					$isikomponen = "<hr><h2>Info THR ".ucwords($rowpegawai['nama_lengkap'])."</h2><h3>Upah Komponen</h3>";
						
					foreach($listkomponenthr as $rowthr){
						$no = 1;
						foreach($mykomponen as $rowkomponen){
							
							if($rowthr['id_komponen_upah'] == $rowkomponen['id_komponen_upah']){
								$isikomponen .= "<br> ".$no.". ".$rowkomponen['nama']." Rp ".number_format($rowkomponen['nominal'],0,',','.');
							
								if($rowkomponen['tipe'] == 1){
									$totalkomponen += $rowkomponen['nominal'];
								}else{
									$totalkomponen -= $rowkomponen['nominal'];
								}
								
								if($rowkomponen['tipe'] == 1 && $rowkomponen['termasuk_pajak'] == 1){
									$totalgajipph += $rowkomponen['nominal'];
								}elseif($rowkomponen['tipe'] == 2 && $rowkomponen['termasuk_pajak'] == 1){
									$totalgajipph -= $rowkomponen['nominal'];
								}
							}
							
							$no++;
						}
					}
					
					$isikomponen .= "<h3>Total Gaji Rp ".number_format($totalkomponen,0,',','.')."</h3><h3>Total Gaji PPh Rp ".number_format($totalgajipph,0,',','.')."</h3>";
					
					#hitung pajak
					/* $gaji = $totalgajipph;
					$biayajabatan = 0;
					$netosebulan = $gaji - $biayajabatan;
					$netosetahun = $netosebulan * 12;
					$bataspajak = 54000000;
					if(isset($infogaji)){
						if($infogaji["tipe_ptkp"] == 'TK0'){
							$bataspajak = 54000000;
						}elseif($infogaji["tipe_ptkp"] == 'TK1'){
							$bataspajak = 58500000;
						}elseif($infogaji["tipe_ptkp"] == 'TK2'){
							$bataspajak = 63000000;
						}elseif($infogaji["tipe_ptkp"] == 'TK3'){
							$bataspajak = 67500000;
						}elseif($infogaji["tipe_ptkp"] == 'K0'){
							$bataspajak = 58500000;
						}elseif($infogaji["tipe_ptkp"] == 'K1'){
							$bataspajak = 63000000;
						}elseif($infogaji["tipe_ptkp"] == 'K2'){
							$bataspajak = 67500000;
						}elseif($infogaji["tipe_ptkp"] == 'K3'){
							$bataspajak = 72000000;
						}
						
						$pajakkenasetahun = 0;
						$pajakpph21 = 0;
						$pajakperbulan = 0;
					}
					
					$tipepajak = '';
					$pesanpajak = '';
					$isipajak = '';
					
					if($infogaji){
						$pajakkenasetahun = $netosetahun - $bataspajak;
						
						if($pajakkenasetahun > 0){
							if($infogaji['ispkp'] == 1){
								if($pajakkenasetahun > 50000000){
									$pajakpph21 = (50000000 * 5 / 100) + (($pajakkenasetahun - 50000000) * 15 / 100);
								}else{
									$pajakpph21 = $pajakkenasetahun * 5 / 100;
								}
							}elseif($infogaji['ispkp'] == 0){
								$pajakpph21 = $pajakkenasetahun * 5 / 100 * 1.2;
							}
						}else{
							$pajakkenasetahun = 0;
						}
						
						if($infogaji['tipe_perhitungan'] == 1){
							$tipepajak = 'Gross';
							$pajakperbulan = $pajakpph21 / 12;
							$pesanpajak = 'Pajak tipe Gross, ditanggung oleh karyawan.';
						}elseif($infogaji['tipe_perhitungan'] == 2){
							$tipepajak = 'Gross Up';
							$pajakperbulan = 0;
							$pesanpajak = 'Pajak tipe Gross Up, ditanggung oleh perusahaan.';
						}elseif($infogaji['tipe_perhitungan'] == 3){
							$tipepajak = 'Nett';
							$pajakperbulan = 0;
							$pesanpajak = 'Pajak tipe Nett, ditanggung oleh perusahaan.';
						}
						
						$isipajak = "<hr><h3>Perhitungan Pajak ".$tipepajak."</h3>";
						
						$isipajak .= "<br>Gaji : Rp ".number_format($gaji,0,',','.');
						//$isipajak .= "<br>Biaya Jabatan : Rp ".number_format($biayajabatan,0,',','.');
						$isipajak .= "<br>Neto Sebulan: Rp ".number_format($netosebulan,0,',','.');
						$isipajak .= "<br>Neto Setahun: Rp ".number_format($netosetahun,0,',','.');
						$isipajak .= "<br>PTKP: Rp ".number_format($bataspajak,0,',','.');
						$isipajak .= "<br>PKP Setahun: Rp ".number_format($pajakkenasetahun,0,',','.');
						$isipajak .= "<br>PPh 21 Setahun: Rp ".number_format($pajakpph21,0,',','.');
						$isipajak .= "<br><h3>Pajak Per Bulan: Rp ".number_format($pajakperbulan,0,',','.')."</h3>";
						$isipajak .= "<br><h4>INFO PAJAK : ".$pesanpajak."</h4>";
					} */
					
					$isifinal = "<div align=center><h3>THR Diterima : Rp ".number_format($totalkomponen,0,',','.')."</h3></div>";
					
					$this->updateHistoriTHRPegawai($rowpegawai['id'],$tahun,$totalkomponen,0,$totalkomponen);
					
					$this->sendMail('Info Pembayaran THR','Rekapitulasi THR',$isikomponen.$isifinal,$rowpegawai['email']);
				}
			}else{
				echo $alert;
			}
		}else{
			show_404();
		}
	}
	
	public function prosesPajak(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			$tahun = $this->input->post('tahun');
			
			$listpegawai = $this->all_model->list_pegawai();
			
			$isikomponen = '';
			
			foreach($listpegawai as $rowpegawai){
				$infogaji = $this->all_model->get_pengaturan_gaji($rowpegawai['id']);
				$totalgaji = $this->all_model->get_gaji_pegawai($rowpegawai['id'],$tahun);
				
				$totalgajipph = $totalgaji;
				
				$isikomponen = "<hr><h2>Info Pajak ".ucwords($rowpegawai['nama_lengkap'])."</h2>";
					
				$isikomponen .= "<h3>Total Gaji PPh Rp ".number_format($totalgajipph,0,',','.')."</h3>";
				
				#hitung pajak
				$gaji = $totalgajipph;
				$netosetahun = $gaji;
				$bataspajak = 54000000;
				if(isset($infogaji)){
					if($infogaji["tipe_ptkp"] == 'TK0'){
						$bataspajak = 54000000;
					}elseif($infogaji["tipe_ptkp"] == 'TK1'){
						$bataspajak = 58500000;
					}elseif($infogaji["tipe_ptkp"] == 'TK2'){
						$bataspajak = 63000000;
					}elseif($infogaji["tipe_ptkp"] == 'TK3'){
						$bataspajak = 67500000;
					}elseif($infogaji["tipe_ptkp"] == 'K0'){
						$bataspajak = 58500000;
					}elseif($infogaji["tipe_ptkp"] == 'K1'){
						$bataspajak = 63000000;
					}elseif($infogaji["tipe_ptkp"] == 'K2'){
						$bataspajak = 67500000;
					}elseif($infogaji["tipe_ptkp"] == 'K3'){
						$bataspajak = 72000000;
					}
					
					$pajakkenasetahun = 0;
					$pajakpph21 = 0;
				}
				
				$tipepajak = '';
				$pesanpajak = '';
				$isipajak = '';
				
				if($infogaji){
					$pajakkenasetahun = $netosetahun - $bataspajak;
					
					if($pajakkenasetahun > 0){
						if($infogaji['ispkp'] == 1){
							if($pajakkenasetahun > 50000000){
								$pajakpph21 = (50000000 * 5 / 100) + (($pajakkenasetahun - 50000000) * 15 / 100);
							}else{
								$pajakpph21 = $pajakkenasetahun * 5 / 100;
							}
						}elseif($infogaji['ispkp'] == 0){
							$pajakpph21 = $pajakkenasetahun * 5 / 100 * 1.2;
						}
					}else{
						$pajakkenasetahun = 0;
					}
					
					if($infogaji['tipe_perhitungan'] == 1){
						$tipepajak = 'Gross';
						$pesanpajak = 'Pajak tipe Gross, ditanggung oleh karyawan.';
					}elseif($infogaji['tipe_perhitungan'] == 2){
						$tipepajak = 'Gross Up';
						$pesanpajak = 'Pajak tipe Gross Up, ditanggung oleh perusahaan.';
					}elseif($infogaji['tipe_perhitungan'] == 3){
						$tipepajak = 'Nett';
						$pesanpajak = 'Pajak tipe Nett, ditanggung oleh perusahaan.';
					}
					
					$isipajak = "<hr><h3>Perhitungan Pajak ".$tipepajak."</h3>";
					
					$isipajak .= "<br>Gaji : Rp ".number_format($gaji,0,',','.');
					$isipajak .= "<br>Neto Setahun: Rp ".number_format($netosetahun,0,',','.');
					$isipajak .= "<br>PTKP: Rp ".number_format($bataspajak,0,',','.');
					$isipajak .= "<br>PKP Setahun: Rp ".number_format($pajakkenasetahun,0,',','.');
					$isipajak .= "<br><h3>PPh 21 Setahun: Rp ".number_format($pajakpph21,0,',','.')."</h3>";
					$isipajak .= "<br><h4>INFO PAJAK : ".$pesanpajak."</h4>";
				}
				
				$isifinal = "<div align=center><h3>Pajak Dibayarkan/Ditanggung : Rp ".number_format($pajakpph21,0,',','.')."</h3></div>";
				
				$this->updateHistoriPajakPegawai($rowpegawai['id'],$tahun,$pajakpph21);
				
				$this->sendMail('Info Pembayaran Pajak','Rekapitulasi Pajak',$isikomponen.$isipajak.$isifinal,$rowpegawai['email']);
			}
		}else{
			show_404();
		}
	}
	
	public function prosesPayroll(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			$tahunbulan = $this->input->post('tahunbulan');
			
			$listpegawai = $this->all_model->list_pegawai();
			$listcek = $this->all_model->list_pegawai();
			$poinsetting = $this->all_model->get_poin_setting();
			
			$alert = '';
			
			$arrnokomponen = array();
			$arrnoinfogaji = array();
			
			foreach($listcek as $rows){
				$infogaji = $this->all_model->get_pengaturan_gaji($rows['id']);
				$mykomponen = $this->all_model->get_komponen_pegawai($rows['id']);
				if(count($mykomponen) == 0){
					$arrnokomponen[] = $rows['nama_lengkap'];
				}
				if(!isset($infogaji)){
					$arrnoinfogaji[] = $rows['nama_lengkap'];
				}
			}
			
			$alert .= "Komponen upah belum diisi : ".implode(', ',$arrnokomponen);
			$alert .= "<br>Pengaturan Pajak belum ditentukan : ".implode(', ',$arrnoinfogaji);
			
			if(count($arrnokomponen) == 0 && count($arrnoinfogaji) == 0){
				foreach($listpegawai as $rowpegawai){
					$infogaji = $this->all_model->get_pengaturan_gaji($rowpegawai['id']);
					$mykomponen = $this->all_model->get_komponen_pegawai($rowpegawai['id']);
					$mypinjaman = $this->all_model->get_my_pinjaman($rowpegawai['id']);
					$totalabsen = $this->all_model->get_total_absen(date("Y", strtotime(date( "Y-m-d", strtotime( date($tahunbulan) ) )."-1 months")),date("m", strtotime(date( "Y-m-d", strtotime( date($tahunbulan) ) )."-1 months")),$rowpegawai['id']);
					$totalpoin = $this->all_model->get_total_poin(date("Y", strtotime(date( "Y-m-d", strtotime( date($tahunbulan) ) )."-1 months")),date("m", strtotime(date( "Y-m-d", strtotime( date($tahunbulan) ) )."-1 months")),$rowpegawai['id']);
					
					$totalpinjaman = 0;
					$totalabsenterlambat = 0;
					$totalkomponen = 0;
					$totalgajipph = 0;
					
					#komponen
					$isikomponen = "<hr><h3>Upah Komponen</h3>";
					
					$no = 1;
					foreach($mykomponen as $row){
						
						$isikomponen .= "<br> ".$no.". ".$row['nama']." Rp ".number_format($row['nominal'],0,',','.');
						
						if($row['tipe'] == 1){
							$totalkomponen += $row['nominal'];
						}else{
							$totalkomponen -= $row['nominal'];
						}
						
						if($row['tipe'] == 1 && $row['termasuk_pajak'] == 1){
							$totalgajipph += $row['nominal'];
						}elseif($row['tipe'] == 2 && $row['termasuk_pajak'] == 1){
							$totalgajipph -= $row['nominal'];
						}
						
						$no++;
					}
					
					//$isikomponen .= "<h3>Total Gaji Rp ".number_format($totalkomponen,0,',','.')."</h3><h3>Total Gaji PPh Rp ".number_format($totalgajipph,0,',','.')."</h3>";
					$isikomponen .= "<h3>Total Gaji Rp ".number_format($totalkomponen,0,',','.')."</h3>";
					
					#pinjaman
					$isipinjaman = '<hr><h3>Potongan Pinjaman</h3>';
					
					$no = 1;
															
					foreach($mypinjaman as $row){
						if($row['terbayar'] > $row['nominal_total']){
							//do nothing
						}else{
							$isipinjaman .= "<br>".$no.". Rp ".number_format($row['nominal_total'],0,',','.')." / Rp ".number_format($row['terbayar'],0,',','.');
							$no++;
							$totalpinjaman += ($row['nominal_total'] / $row['tenor']) + ($row['nominal_total'] * ($row['bunga']/100));
							
							$this->updatePembayaranPinjaman($row['id'],($row['nominal_total'] / $row['tenor']) + ($row['nominal_total'] * ($row['bunga']/100)),'Dipotong dari gaji bulanan.');
						}
					} 
					
					$isipinjaman .= "<h3>Total Rp ".number_format($totalpinjaman,0,',','.')."</h3>";
					
					#absensi & overtime
					$isiabsensi = '<hr><h3>Potongan Keterlambatan & Absensi</h3>';
					
					$totalabsenterlambat = ($totalabsen * 200000) + ($totalpoin * $poinsetting['potongan']/100 * $totalkomponen);
					
					$isiabsensi .= "<br>Total Absen : <b>".$totalabsen."</b>";
					$isiabsensi .= "<br>Total Poin Keterlambatan : <b>".$totalpoin."</b>";
					
					$isiabsensi .= "<h3>Total Rp ".number_format($totalabsenterlambat,0,',','.')."</h3>";
					
					#hitung pajak
					/* $gaji = $totalgajipph;
					$biayajabatan = 0;
					$netosebulan = $gaji - $biayajabatan;
					$netosetahun = $netosebulan * 12;
					$bataspajak = 54000000;
					if(isset($infogaji)){
						if($infogaji["tipe_ptkp"] == 'TK0'){
							$bataspajak = 54000000;
						}elseif($infogaji["tipe_ptkp"] == 'TK1'){
							$bataspajak = 58500000;
						}elseif($infogaji["tipe_ptkp"] == 'TK2'){
							$bataspajak = 63000000;
						}elseif($infogaji["tipe_ptkp"] == 'TK3'){
							$bataspajak = 67500000;
						}elseif($infogaji["tipe_ptkp"] == 'K0'){
							$bataspajak = 58500000;
						}elseif($infogaji["tipe_ptkp"] == 'K1'){
							$bataspajak = 63000000;
						}elseif($infogaji["tipe_ptkp"] == 'K2'){
							$bataspajak = 67500000;
						}elseif($infogaji["tipe_ptkp"] == 'K3'){
							$bataspajak = 72000000;
						}
					}
					
					$pajakkenasetahun = 0;
					$pajakpph21 = 0;
					$pajakperbulan = 0;
					
					$pajakkenasetahun = $netosetahun - $bataspajak;
					
					if($pajakkenasetahun > 0){
						if($infogaji['ispkp'] == 1){
							if($pajakkenasetahun > 50000000){
								$pajakpph21 = (50000000 * 5 / 100) + (($pajakkenasetahun - 50000000) * 15 / 100);
							}else{
								$pajakpph21 = $pajakkenasetahun * 5 / 100;
							}
						}elseif($infogaji['ispkp'] == 0){
							$pajakpph21 = $pajakkenasetahun * 5 / 100 * 1.2;
						}
					}else{
						$pajakkenasetahun = 0;
					}
					
					$tipepajak = '';
					$pesanpajak = '';
					
					if($infogaji['tipe_perhitungan'] == 1){
						$tipepajak = 'Gross';
						$pajakperbulan = $pajakpph21 / 12;
						$pesanpajak = 'Pajak tipe Gross, ditanggung oleh karyawan.';
					}elseif($infogaji['tipe_perhitungan'] == 2){
						$tipepajak = 'Gross Up';
						$pajakperbulan = 0;
						$pesanpajak = 'Pajak tipe Gross Up, ditanggung oleh perusahaan.';
					}elseif($infogaji['tipe_perhitungan'] == 3){
						$tipepajak = 'Nett';
						$pajakperbulan = 0;
						$pesanpajak = 'Pajak tipe Nett, ditanggung oleh perusahaan.';
					} 
					
					$isipajak = "<hr><h3>Perhitungan Pajak ".$tipepajak."</h3>";
					
					$isipajak .= "<br>Gaji : Rp ".number_format($gaji,0,',','.');
					$isipajak .= "<br>Neto Sebulan: Rp ".number_format($netosebulan,0,',','.');
					$isipajak .= "<br>Neto Setahun: Rp ".number_format($netosetahun,0,',','.');
					$isipajak .= "<br>PTKP: Rp ".number_format($bataspajak,0,',','.');
					$isipajak .= "<br>PKP Setahun: Rp ".number_format($pajakkenasetahun,0,',','.');
					$isipajak .= "<br>PPh 21 Setahun: Rp ".number_format($pajakpph21,0,',','.');
					$isipajak .= "<br><h3>Pajak Per Bulan: Rp ".number_format($pajakperbulan,0,',','.')."</h3>";
					$isipajak .= "<br><h4>INFO PAJAK : ".$pesanpajak."</h4>"; */
					
					//$isifinal = "<div align=center><h3>Gaji Diterima : Rp ".number_format($totalkomponen - $pajakperbulan - $totalabsenterlambat - $totalpinjaman,0,',','.')."</h3></div>";
					
					$isifinal = "<div align=center><h3>Gaji Diterima : Rp ".number_format($totalkomponen - $totalabsenterlambat - $totalpinjaman,0,',','.')."</h3></div>";
					
					$this->updateHistoriGajiPegawai($rowpegawai['id'],$tahunbulan,$totalkomponen,$totalpinjaman,$totalabsenterlambat,0,$totalkomponen - $totalabsenterlambat - $totalpinjaman);
					$this->sendMail('Info Pembayaran Gaji','Rekapitulasi Gaji '.$tahunbulan,$isikomponen.$isipinjaman.$isiabsensi.$isifinal,$rowpegawai['email']);
				}
			}else{
				echo $alert;
			}
		}else{
			show_404();
		}
	}
	
	function updateHistoriGajiPegawai($idpegawai,$bulantahun,$totalkomponen,$totalpinjaman,$totalkehadiran,$totalpajak,$totalditerima){
		$this->all_model->update_histori_gaji($idpegawai,$bulantahun,$totalkomponen,$totalpinjaman,$totalkehadiran,$totalpajak,$totalditerima);
	}
	
	function updateHistoriTHRPegawai($idpegawai,$tahun,$totalkomponen,$totalpajak,$totalditerima){
		$this->all_model->update_histori_thr($idpegawai,$tahun,$totalkomponen,$totalpajak,$totalditerima);
	}
	
	function updateHistoriPajakPegawai($idpegawai,$tahun,$pajakpph21){
		$this->all_model->update_histori_pajak($idpegawai,$tahun,$pajakpph21);
	}
	
	function sendMail($judul,$subjudul,$isi,$email){
		
		$this->load->library('email'); # LOAD LIBRARY UNTUK EMAIL
		$this->email->set_mailtype("html"); # TYPE EMAIL
		$this->email->set_newline("\r\n"); # BUAT BARIS BARU

		//ISI EMAIL
		$htmlContent = '<html>
			<head>
			<title>'.$judul.'</title>
			</head>
			<body>
			<div align="center">
			<img src="https://sistempayroll.xyz/assets/img/favicon_2.png" alt="PT. XYZ CORP." border="0" width="150px" height="auto">
			</div>
			<h1>'.$subjudul.'</h1>
			<div style="width:100%;height:100%;background-color:#f2f2f2;padding:30px;">'.$isi.'</div></body></html>';
		
		$this->email->from('info@sistempayroll.xyz','Info XYZ');
		$this->email->to($email); # KEPADA SIAPA EMAIL DIKIRIMKAN
		$this->email->from('info@sistempayroll.xyz','Info XYZ'); # SETTING ASAL / PENGIRIM
		$this->email->subject($judul); 	# SETTING JUDUL
		$this->email->message($htmlContent);	# SETTING ISI KE DALAM METHOD
		 
		$this->email->send(); # KIRIMKAN PESAN HTML / EXECUTE EMAIL
	}
	
	function updatePembayaranPinjaman($idpinjaman,$nominal,$bukti){
		$this->all_model->update_pembayaran_pinjaman($idpinjaman,$nominal,$bukti);
	}
	
	public function tambahInfoPerusahaan(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			echo $this->all_model->add_info_perusahaan();
		}else{
			show_404();
		}
	}
	
	public function tambahCabang(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			echo $this->all_model->add_cabang();
		}else{
			show_404();
		}
	}
	
	public function dapatkanCabang(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			header('Content-Type: application/json');
			echo json_encode($this->all_model->get_cabang());
		}else{
			show_404();
		}
	}
	
	public function hapusCabang(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			echo $this->all_model->del_cabang();
		}else{
			show_404();
		}
	}
	
	public function tambahJadwalKerja(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			echo $this->all_model->add_jadwal_kerja();
		}else{
			show_404();
		}
	}
	
	public function dapatkanKerja(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			header('Content-Type: application/json');
			echo json_encode($this->all_model->get_jadwal_kerja());
		}else{
			show_404();
		}
	}
	
	public function hapusKerja(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			echo $this->all_model->del_jadwal_kerja();
		}else{
			show_404();
		}
	}
	
	public function tambahLibur(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			echo $this->all_model->add_libur();
		}else{
			show_404();
		}
	}
	
	public function hapusLibur(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			echo $this->all_model->del_libur();
		}else{
			show_404();
		}
	}
	
	public function tambahOrganisasi(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			echo $this->all_model->add_organisasi();
		}else{
			show_404();
		}
	}
	
	public function hapusOrganisasi(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			echo $this->all_model->del_organisasi();
		}else{
			show_404();
		}
	}
	
	public function tambahLevel(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			echo $this->all_model->add_level();
		}else{
			show_404();
		}
	}
	
	public function hapusLevel(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			echo $this->all_model->del_level();
		}else{
			show_404();
		}
	}
	
	public function tambahPosisi(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			echo $this->all_model->add_posisi();
		}else{
			show_404();
		}
	}
	
	public function hapusPosisi(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			echo $this->all_model->del_posisi();
		}else{
			show_404();
		}
	}
	
	public function tambahPoin(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			echo $this->all_model->add_poin();
		}else{
			show_404();
		}
	}
	
	public function tambahKomponenTHR(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			echo $this->all_model->add_komponen_thr();
		}else{
			show_404();
		}
	}
	
	public function cekSaldoBenefit(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			echo $this->all_model->cek_saldo_benefit($this->input->post('tipe'));
		}else{
			show_404();
		}
	}
	
	public function updateIjinBenefit(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			echo $this->all_model->update_ijin_benefit();
		}else{
			show_404();
		}
	}
	
	public function laporanGaji(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			$gaji = $this->all_model->laporan_gaji();
			?>
			<table id="datahistorigaji" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
				<thead>
					<tr>
						<th>No</th>
						<th>Pegawai</th>
						<th class="text-right">Komponen</th>
						<th class="text-right">Pinjaman</th>
						<th class="text-right">Kehadiran</th>
						<th class="text-right">Diterima</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$no = 1;
					foreach($gaji as $row){
					?>
					<tr>
						<td><?=$no?></td>
						<td><?=$row['namapegawai']?></td>
						<td class="text-right">Rp <?=number_format($row['total_komponen'],0)?></td>
						<td class="text-right">Rp <?=number_format($row['total_pinjaman'],0)?></td>
						<td class="text-right">Rp <?=number_format($row['total_kehadiran'],0)?></td>
						<td class="text-right">Rp <?=number_format($row['total_diterima'],0)?></td>
					</tr>
					<?php $no++; 
					} 
					?>
				</tbody>
				<tfoot>
					<tr>
						<th>No</th>
						<th>Pegawai</th>
						<th class="text-right">Komponen</th>
						<th class="text-right">Pinjaman</th>
						<th class="text-right">Kehadiran</th>
						<th class="text-right">Diterima</th>
					</tr>
				</tfoot>
			</table>
			<?php
		}else{
			show_404();
		}
	}
	
	public function laporanTHR(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			$thr = $this->all_model->laporan_thr();
			?>
			<table id="datahistorithr" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
				<thead>
					<tr>
						<th>No</th>
						<th>Pegawai</th>
						<th class="text-right">Komponen</th>
						<th class="text-right">Pajak</th>
						<th class="text-right">Diterima</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$no = 1;
					foreach($thr as $row){
					?>
					<tr>
						<td><?=$no?></td>
						<td><?=$row['namapegawai']?></td>
						<td class="text-right">Rp <?=number_format($row['total_komponen'],0)?></td>
						<td class="text-right">Rp <?=number_format($row['total_pajak'],0)?></td>
						<td class="text-right">Rp <?=number_format($row['total_diterima'],0)?></td>
					</tr>
					<?php $no++; 
					} 
					?>
				</tbody>
				<tfoot>
					<tr>
						<th>No</th>
						<th>Pegawai</th>
						<th class="text-right">Komponen</th>
						<th class="text-right">Pajak</th>
						<th class="text-right">Diterima</th>
					</tr>
				</tfoot>
			</table>
			<?php
		}else{
			show_404();
		}
	}
	
	public function laporanAbsensi(){
		$tahun = explode('-',$this->input->post('tahunbulan'))[0];
		$bulan = explode('-',$this->input->post('tahunbulan'))[1];
		
		$listpegawai = $this->all_model->list_pegawai();
		
		?>
		<table id="datahistoriabsensi" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
			<thead>
				<tr>
					<th>No</th>
					<th>Pegawai</th>
					<th class="text-right">Masuk</th>
					<th class="text-right">Ijin</th>
					<th class="text-right">Absen</th>
					<th class="text-right">Poin</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$no = 1;
				$totalmasuk = 0;
				$totalijin = 0;
				$totalabsen = 0;
				$totalpoin = 0;
				foreach($listpegawai as $row){
					$isiemail = '';
					$totalmasuk = $this->all_model->get_total_masuk($tahun,$bulan,$row['id']);
					$totalijin = $this->all_model->get_total_ijin($tahun,$bulan,$row['id']);
					$totalabsen = $this->all_model->get_total_absen($tahun,$bulan,$row['id']);
					$totalpoin = $this->all_model->get_total_poin($tahun,$bulan,$row['id']);
					
					$isiemail .= 'Total Masuk : <b>'.$totalmasuk['total'].'</b>';
					$isiemail .= '<br>Total Ijin : <b>'.$totalijin['total'].'</b>';
					$isiemail .= '<br>Total Absen : <b>'.$totalabsen.'</b>';
					$isiemail .= '<br>Total Poin Terlambat : <b>'.$totalpoin.'</b>';
					
					?>
					<tr>
						<td><?=$no?></td>
						<td><?=$row['nama_lengkap']?></td>
						<td class="text-right"><?=$totalmasuk['total']?></td>
						<td class="text-right"><?=$totalijin['total']?></td>
						<td class="text-right"><?=$totalabsen?></td>
						<td class="text-right"><?=$totalpoin?></td>
					</tr>
				<?php $no++; 
				
					$this->sendMail('Info Rekap Absensi '.$this->input->post('tahunbulan'),'Rekapitulasi Absensi',$isiemail,$row['email']);
				} 
				?>
			</tbody>
			<tfoot>
				<tr>
					<th>No</th>
					<th>Pegawai</th>
					<th class="text-right">Masuk</th>
					<th class="text-right">Ijin</th>
					<th class="text-right">Absen</th>
					<th class="text-right">Poin</th>
				</tr>
			</tfoot>
		</table>
	<?php
	}
	
	public function updatePegawai(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			echo $this->all_model->update_pegawai();
		}else{
			show_404();
		}
	}
	
	public function tambahKeluarga(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			echo $this->all_model->add_keluarga();
		}else{
			show_404();
		}
	}
	
	public function dapatkanKeluarga(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			header('Content-Type: application/json');
			echo json_encode($this->all_model->get_keluarga());
		}else{
			show_404();
		}
	}
	
	public function hapusKeluarga(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			echo $this->all_model->del_keluarga();
		}else{
			show_404();
		}
	}
	
	public function tambahPendidikan(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			echo $this->all_model->add_pendidikan();
		}else{
			show_404();
		}
	}
	
	public function dapatkanPendidikan(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			header('Content-Type: application/json');
			echo json_encode($this->all_model->get_pendidikan());
		}else{
			show_404();
		}
	}
	
	public function hapusPendidikan(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			echo $this->all_model->del_pendidikan();
		}else{
			show_404();
		}
	}
	
	public function tambahPengalaman(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			echo $this->all_model->add_pengalaman();
		}else{
			show_404();
		}
	}
	
	public function dapatkanPengalaman(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			header('Content-Type: application/json');
			echo json_encode($this->all_model->get_pengalaman());
		}else{
			show_404();
		}
	}
	
	public function hapusPengalaman(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			echo $this->all_model->del_pengalaman();
		}else{
			show_404();
		}
	}
	
	public function getNotifikasi(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			echo $this->all_model->get_notifikasi();
		}else{
			show_404();
		}
	}
	
	public function gauth(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			echo $this->all_model->gauth();
		}else{ 
			show_404();
		}
	}
	
	public function resetPass(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			echo $this->all_model->reset_password();
		}else{ 
			show_404();
		}
	}
	
	public function dapatkan_pajak_pegawai(){
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			$id = $this->input->post('id');
			header('Content-Type: application/json');
			echo json_encode($this->all_model->get_pengaturan_gaji($id));
		}else{ 
			show_404();
		}
	}
}