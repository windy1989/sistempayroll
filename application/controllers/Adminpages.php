<?php 
class Adminpages extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('all_model');
		$this->load->library('session');
		$this->load->helper('url');
	}
	
	function returnUrl($pg){
		$pageparam = 'pg_'.$pg;
		
		return $pageparam;
	}
	
	public function view($page = NULL)
	{
		if(!isset($_SESSION['backaktif'])){
			$page = 'login';
		}else{
			if($page == NULL){
				//$data['rekap'] = $this->all_model->get_rekap_home();
				$page = 'utama';
			}
			
			//$data['jumnotif'] = $this->all_model->get_notifikasi();
			
			if($page == 'pegawai')
			{
				$data['data'] = $this->all_model->list_pegawai();
				$data['keluarga'] = $this->all_model->list_keluarga();
				$data['pendidikan'] = $this->all_model->list_pendidikan();
				$data['pengalaman'] = $this->all_model->list_pengalaman();
			}
			
			if($page == 'benefit')
			{
				$data['data'] = $this->all_model->list_benefit();
			}
			
			if($page == 'kas_dimuka')
			{
				$data['data'] = $this->all_model->list_kas_pegawai();
			}
			
			if($page == 'pinjaman')
			{
				$data['data'] = $this->all_model->list_pinjaman();
				$data['cicilan'] = $this->all_model->list_cicilan();
			}
			
			if($page == 'reimburse')
			{
				$data['reimburse'] = $this->all_model->list_reimburse();
				$data['tipereimburse'] = $this->all_model->list_tipe_reimburse();
				$data['limitreimburse'] = $this->all_model->get_limit_reimburse();
			}
			
			if($page == 'absensi')
			{
				$data['listabsensi'] = $this->all_model->list_absensi();
				$data['absentoday'] = $this->all_model->get_absen_today();
				$data['libur'] = $this->all_model->get_libur_today();
				$data['poinsetting'] = $this->all_model->get_poin_setting();
			}
			
			if($page == 'cuti')
			{
				$data['listcuti'] = $this->all_model->list_cuti();
				$data['listijin'] = $this->all_model->list_ijin();
				$data['rekap'] = $this->all_model->list_ijin_rekap();
			}
			
			if($page == 'lembur')
			{
				$data['listlembur'] = $this->all_model->list_lembur();
				$data['rekap'] = $this->all_model->list_lembur_rekap();
			}
			
			if($page == 'aset')
			{
				$data['listaset'] = $this->all_model->list_aset();
				$data['allaset'] = $this->all_model->all_aset();
				$data['allkategoriaset'] = $this->all_model->all_kategori_aset();
			}
			
			if($page == 'file')
			{
				$data['listfile'] = $this->all_model->list_file();
			}
			
			if($page == 'gaji')
			{
				$data['infogaji'] = $this->all_model->get_pengaturan_gaji($_SESSION['backuserid']);
				$data['mykomponen'] = $this->all_model->get_komponen_pegawai($_SESSION['backuserid']);
				$data['mypinjaman'] = $this->all_model->get_my_pinjaman($_SESSION['backuserid']);
				$data['totalabsen'] = $this->all_model->get_total_absen(date("Y", strtotime("-1 months")),date("m", strtotime("-1 months")),$_SESSION['backuserid']);
				$data['totalpoin'] = $this->all_model->get_total_poin(date("Y", strtotime("-1 months")),date("m", strtotime("-1 months")),$_SESSION['backuserid']);
				$data['poinsetting'] = $this->all_model->get_poin_setting();
				$data['infothr'] = $this->all_model->get_info_thr_pegawai();
			}
			
			if($page == 'perusahaan')
			{
				$data['infoperusahaan'] = $this->all_model->get_info_perusahaan();
				$data['infocabang'] = $this->all_model->list_cabang();
				$data['infokerja'] = $this->all_model->list_jadwal_kerja();
				$data['infolibur'] = $this->all_model->list_libur();
				$data['infoorganisasi'] = $this->all_model->list_organisasi();
				$data['infolevel'] = $this->all_model->list_level();
				$data['infoposisi'] = $this->all_model->list_posisi();
				$data['infopoin'] = $this->all_model->get_poin_setting();
				$data['komponenupah'] = $this->all_model->list_komponen_upah();
				$data['komponenthr'] = $this->all_model->list_komponen_thr();
			}
			
			if($page == 'klaim_benefit')
			{
				$data['infobenefit'] = $this->all_model->list_klaim_benefit();
				$data['tipebenefit'] = $this->all_model->list_benefit();
				$data['limitbenefit'] = $this->all_model->get_limit_benefit();
			}
			
			if($page == 'laporan')
			{
				$jadwal = $this->all_model->list_jadwal_kerja();
				$data['infolibur'] = $this->all_model->list_libur();
				
				$arrallday = array();
				$arrweekend = array();
				
				if(count($jadwal) > 0){
					foreach($jadwal as $row){
						$arrallday[] = $row['hari'] - 1;
					}
				}
				
				for($i=0;$i<7;$i++){
					if(in_array($i, $arrallday)) {
						//do nothing
					}else{
						$arrweekend[] = $i;
					}
				}
				
				
				$data['weekend'] = $arrweekend;
			}
			
			if($page == 'akun')
			{
				$data['infoakun'] = $this->all_model->get_akun();
			}
			
			if($page == 'kelengkapan')
			{
				$data['relasi'] = $this->all_model->list_relasi_keluarga();
				$data['jenjang'] = $this->all_model->list_jenjang_pendidikan();
				$data['keluarga'] = $this->all_model->list_keluarga_pegawai();
				$data['pendidikan'] = $this->all_model->list_pendidikan_pegawai();
				$data['pengalaman'] = $this->all_model->list_pengalaman_pegawai();
				$data['pekerjaan'] = $this->all_model->list_pekerjaan_pegawai();
			}
			
			if($page == 'utama')
			{
				if($_SESSION['backjabatan'] == 'ADMIN'){
					$data['dataabsen'] = $this->all_model->list_absensi_pegawai_all(date('Y-m-d'));
					$data['datareimburse'] = $this->all_model->list_reimburse_pegawai();
					$data['datakas'] = $this->all_model->list_kas_pegawai_all();
					$data['datapinjaman'] = $this->all_model->list_pinjaman_pegawai_all();
					$data['datacuti'] = $this->all_model->list_cuti_pegawai_all();
					$data['datalembur'] = $this->all_model->list_lembur_pegawai_all();
					$data['rekapstatus'] = $this->all_model->rekap_status_pekerja();
					$data['rekaporganisasi'] = $this->all_model->rekap_organisasi();
					$data['databenefit'] = $this->all_model->list_benefit_pegawai();
				}

				$data['rekapreimburse'] = $this->all_model->get_rekap_reimburse();
				$data['rekapkas'] = $this->all_model->get_rekap_kas();
				$data['rekappinjaman'] = $this->all_model->get_rekap_pinjaman();
				$data['totalmasuk'] = $this->all_model->get_total_masuk(date('Y'),date('m'),$_SESSION['backuserid']);
				$data['totalijin'] = $this->all_model->get_total_ijin(date('Y'),date('m'),$_SESSION['backuserid']);
				$data['totalabsen'] = $this->all_model->get_total_absen(date('Y'),date('m'),$_SESSION['backuserid']);
				$data['totalpoin'] = $this->all_model->get_total_poin(date('Y'),date('m'),$_SESSION['backuserid']);
			}
			
			if($page == 'notifikasi'){
				$data['daftarpesan'] = $this->all_model->list_notifikasi();
			}
		}
		
		$data['judul'] = $page;
		
		//CEK HALAMAN URL SAMA GA DI FOLDER VIEW PAGES, LEK GA ADA BUKA HALAMAN NOT FOUND
		if ( ! file_exists(APPPATH.'views/adminpages/'.$this->returnUrl($page).'.php'))
		{
			show_404();
		}
		
		//LOAD HALAMAN YANG MELIPUTI HEADER, NAVIGATION, HALAMAN ITU SENDIRI, DAN FOOTER
		
		#$data['notifikasi'] = $this->all_model->get_notifikasi();
		$this->load->view('admintemplates/header',$data);
		if(isset($_SESSION['backaktif'])){
			$this->load->view('admintemplates/nav',$data);
			$this->load->view('admintemplates/main_panel',$data);
		}
		$this->load->view('adminpages/'.$this->returnUrl($page),$data);
		if(isset($_SESSION['backaktif'])){
			$this->load->view('admintemplates/footer_aktif',$data);
		}else{
			$this->load->view('admintemplates/footer',$data);
		}
	}
	
	public function pekerjaan_pegawai(){
		if(!isset($_SESSION['backaktif']) || $_SESSION['backjabatan'] == 'KARYAWAN'){
			redirect(site_url());
		}else{
			$data['data'] = $this->all_model->list_pegawai_pekerjaan();
		}
		
		$page = 'pekerjaan_pegawai';
		
		$data['judul'] = $page;
		$data['pegawai'] = $this->all_model->list_pegawai();
		$data['organisasi'] = $this->all_model->list_organisasi();
		$data['posisi'] = $this->all_model->list_posisi();
		$data['level'] = $this->all_model->list_level();
		$data['cabang'] = $this->all_model->list_cabang();
		$data['kodepegawai'] = $this->all_model->get_kode_pegawai();
		
		//CEK HALAMAN URL SAMA GA DI FOLDER VIEW PAGES, LEK GA ADA BUKA HALAMAN NOT FOUND
		if ( ! file_exists(APPPATH.'views/adminpages/'.$this->returnUrl($page).'.php'))
		{
			show_404();
		}
		
		//LOAD HALAMAN YANG MELIPUTI HEADER, NAVIGATION, HALAMAN ITU SENDIRI, DAN FOOTER
		
		#$data['notifikasi'] = $this->all_model->get_notifikasi();
		$this->load->view('admintemplates/header',$data);
		$this->load->view('admintemplates/nav',$data);
		$this->load->view('admintemplates/main_panel',$data);
		$this->load->view('adminpages/'.$this->returnUrl($page),$data);
		$this->load->view('admintemplates/footer_aktif',$data);
	}
	
	public function benefit_pegawai(){
		if(!isset($_SESSION['backaktif']) || $_SESSION['backjabatan'] == 'KARYAWAN'){
			redirect(site_url());
		}else{
			$data['data'] = $this->all_model->list_pegawai_benefit();
		}
		
		$page = 'benefit_pegawai';
		
		$data['judul'] = $page;
		$data['data'] = $this->all_model->list_benefit_pegawai();
		
		//CEK HALAMAN URL SAMA GA DI FOLDER VIEW PAGES, LEK GA ADA BUKA HALAMAN NOT FOUND
		if ( ! file_exists(APPPATH.'views/adminpages/'.$this->returnUrl($page).'.php'))
		{
			show_404();
		}
		
		//LOAD HALAMAN YANG MELIPUTI HEADER, NAVIGATION, HALAMAN ITU SENDIRI, DAN FOOTER
		
		#$data['notifikasi'] = $this->all_model->get_notifikasi();
		$this->load->view('admintemplates/header',$data);
		$this->load->view('admintemplates/nav',$data);
		$this->load->view('admintemplates/main_panel',$data);
		$this->load->view('adminpages/'.$this->returnUrl($page),$data);
		$this->load->view('admintemplates/footer_aktif',$data);
	}
	
	public function reimburse_pegawai(){
		if(!isset($_SESSION['backaktif']) || $_SESSION['backjabatan'] == 'KARYAWAN'){
			redirect(site_url());
		}else{
			$data['data'] = $this->all_model->list_reimburse_pegawai();
		}
		
		$page = 'reimburse_pegawai';
		
		$data['judul'] = $page;
		
		//CEK HALAMAN URL SAMA GA DI FOLDER VIEW PAGES, LEK GA ADA BUKA HALAMAN NOT FOUND
		if ( ! file_exists(APPPATH.'views/adminpages/'.$this->returnUrl($page).'.php'))
		{
			show_404();
		}
		
		//LOAD HALAMAN YANG MELIPUTI HEADER, NAVIGATION, HALAMAN ITU SENDIRI, DAN FOOTER
		
		#$data['notifikasi'] = $this->all_model->get_notifikasi();
		$this->load->view('admintemplates/header',$data);
		$this->load->view('admintemplates/nav',$data);
		$this->load->view('admintemplates/main_panel',$data);
		$this->load->view('adminpages/'.$this->returnUrl($page),$data);
		$this->load->view('admintemplates/footer_aktif',$data);
	}
	
	public function kas_pegawai(){
		if(!isset($_SESSION['backaktif']) || $_SESSION['backjabatan'] == 'KARYAWAN'){
			redirect(site_url());
		}else{
			$data['data'] = $this->all_model->list_kas_pegawai_all();
		}
		
		$page = 'kas_pegawai';
		
		$data['judul'] = $page;
		
		//CEK HALAMAN URL SAMA GA DI FOLDER VIEW PAGES, LEK GA ADA BUKA HALAMAN NOT FOUND
		if ( ! file_exists(APPPATH.'views/adminpages/'.$this->returnUrl($page).'.php'))
		{
			show_404();
		}
		
		//LOAD HALAMAN YANG MELIPUTI HEADER, NAVIGATION, HALAMAN ITU SENDIRI, DAN FOOTER
		
		#$data['notifikasi'] = $this->all_model->get_notifikasi();
		$this->load->view('admintemplates/header',$data);
		$this->load->view('admintemplates/nav',$data);
		$this->load->view('admintemplates/main_panel',$data);
		$this->load->view('adminpages/'.$this->returnUrl($page),$data);
		$this->load->view('admintemplates/footer_aktif',$data);
	}
	
	public function pinjaman_pegawai(){
		if(!isset($_SESSION['backaktif']) || $_SESSION['backjabatan'] == 'KARYAWAN'){
			redirect(site_url());
		}else{
			$data['data'] = $this->all_model->list_pinjaman_pegawai_all();
		}
		
		$page = 'pinjaman_pegawai';
		
		$data['judul'] = $page;
		
		//CEK HALAMAN URL SAMA GA DI FOLDER VIEW PAGES, LEK GA ADA BUKA HALAMAN NOT FOUND
		if ( ! file_exists(APPPATH.'views/adminpages/'.$this->returnUrl($page).'.php'))
		{
			show_404();
		}
		
		//LOAD HALAMAN YANG MELIPUTI HEADER, NAVIGATION, HALAMAN ITU SENDIRI, DAN FOOTER
		
		#$data['notifikasi'] = $this->all_model->get_notifikasi();
		$this->load->view('admintemplates/header',$data);
		$this->load->view('admintemplates/nav',$data);
		$this->load->view('admintemplates/main_panel',$data);
		$this->load->view('adminpages/'.$this->returnUrl($page),$data);
		$this->load->view('admintemplates/footer_aktif',$data);
	}
	
	public function absensi_pegawai(){
		if(!isset($_SESSION['backaktif']) || $_SESSION['backjabatan'] == 'KARYAWAN'){
			redirect(site_url());
		}else{
			$data['data'] = $this->all_model->list_absensi_pegawai_all(date('Y-m-d'));
		}
		
		$page = 'absensi_pegawai';
		
		$data['judul'] = $page;
		
		//CEK HALAMAN URL SAMA GA DI FOLDER VIEW PAGES, LEK GA ADA BUKA HALAMAN NOT FOUND
		if ( ! file_exists(APPPATH.'views/adminpages/'.$this->returnUrl($page).'.php'))
		{
			show_404();
		}
		
		//LOAD HALAMAN YANG MELIPUTI HEADER, NAVIGATION, HALAMAN ITU SENDIRI, DAN FOOTER
		
		#$data['notifikasi'] = $this->all_model->get_notifikasi();
		$this->load->view('admintemplates/header',$data);
		$this->load->view('admintemplates/nav',$data);
		$this->load->view('admintemplates/main_panel',$data);
		$this->load->view('adminpages/'.$this->returnUrl($page),$data);
		$this->load->view('admintemplates/footer_aktif',$data);
	}
	
	public function cuti_pegawai(){
		if(!isset($_SESSION['backaktif']) || $_SESSION['backjabatan'] == 'KARYAWAN'){
			redirect(site_url());
		}else{
			$data['data'] = $this->all_model->list_cuti_pegawai_all();
		}
		
		$page = 'cuti_pegawai';
		
		$data['judul'] = $page;
		
		//CEK HALAMAN URL SAMA GA DI FOLDER VIEW PAGES, LEK GA ADA BUKA HALAMAN NOT FOUND
		if ( ! file_exists(APPPATH.'views/adminpages/'.$this->returnUrl($page).'.php'))
		{
			show_404();
		}
		
		//LOAD HALAMAN YANG MELIPUTI HEADER, NAVIGATION, HALAMAN ITU SENDIRI, DAN FOOTER
		
		#$data['notifikasi'] = $this->all_model->get_notifikasi();
		$this->load->view('admintemplates/header',$data);
		$this->load->view('admintemplates/nav',$data);
		$this->load->view('admintemplates/main_panel',$data);
		$this->load->view('adminpages/'.$this->returnUrl($page),$data);
		$this->load->view('admintemplates/footer_aktif',$data);
	}
	
	public function lembur_pegawai(){
		if(!isset($_SESSION['backaktif']) || $_SESSION['backjabatan'] == 'KARYAWAN'){
			redirect(site_url());
		}else{
			$data['data'] = $this->all_model->list_lembur_pegawai_all();
		}
		
		$page = 'lembur_pegawai';
		
		$data['judul'] = $page;
		
		//CEK HALAMAN URL SAMA GA DI FOLDER VIEW PAGES, LEK GA ADA BUKA HALAMAN NOT FOUND
		if ( ! file_exists(APPPATH.'views/adminpages/'.$this->returnUrl($page).'.php'))
		{
			show_404();
		}
		
		//LOAD HALAMAN YANG MELIPUTI HEADER, NAVIGATION, HALAMAN ITU SENDIRI, DAN FOOTER
		
		#$data['notifikasi'] = $this->all_model->get_notifikasi();
		$this->load->view('admintemplates/header',$data);
		$this->load->view('admintemplates/nav',$data);
		$this->load->view('admintemplates/main_panel',$data);
		$this->load->view('adminpages/'.$this->returnUrl($page),$data);
		$this->load->view('admintemplates/footer_aktif',$data);
	}
	
	public function file_pegawai(){
		if(!isset($_SESSION['backaktif']) || $_SESSION['backjabatan'] == 'KARYAWAN'){
			redirect(site_url());
		}else{
			$data['data'] = $this->all_model->list_file_pegawai_all();
		}
		
		$page = 'file_pegawai';
		
		$data['judul'] = $page;
		
		//CEK HALAMAN URL SAMA GA DI FOLDER VIEW PAGES, LEK GA ADA BUKA HALAMAN NOT FOUND
		if ( ! file_exists(APPPATH.'views/adminpages/'.$this->returnUrl($page).'.php'))
		{
			show_404();
		}
		
		//LOAD HALAMAN YANG MELIPUTI HEADER, NAVIGATION, HALAMAN ITU SENDIRI, DAN FOOTER
		
		#$data['notifikasi'] = $this->all_model->get_notifikasi();
		$this->load->view('admintemplates/header',$data);
		$this->load->view('admintemplates/nav',$data);
		$this->load->view('admintemplates/main_panel',$data);
		$this->load->view('adminpages/'.$this->returnUrl($page),$data);
		$this->load->view('admintemplates/footer_aktif',$data);
	}
	
	public function aset_pegawai(){
		if(!isset($_SESSION['backaktif']) || $_SESSION['backjabatan'] == 'KARYAWAN'){
			redirect(site_url());
		}else{
			$data['data'] = $this->all_model->list_aset_pegawai_all();
		}
		
		$page = 'aset_pegawai';
		
		$data['judul'] = $page;
		
		//CEK HALAMAN URL SAMA GA DI FOLDER VIEW PAGES, LEK GA ADA BUKA HALAMAN NOT FOUND
		if ( ! file_exists(APPPATH.'views/adminpages/'.$this->returnUrl($page).'.php'))
		{
			show_404();
		}
		
		//LOAD HALAMAN YANG MELIPUTI HEADER, NAVIGATION, HALAMAN ITU SENDIRI, DAN FOOTER
		
		#$data['notifikasi'] = $this->all_model->get_notifikasi();
		$this->load->view('admintemplates/header',$data);
		$this->load->view('admintemplates/nav',$data);
		$this->load->view('admintemplates/main_panel',$data);
		$this->load->view('adminpages/'.$this->returnUrl($page),$data);
		$this->load->view('admintemplates/footer_aktif',$data);
	}
	
	public function gaji_pegawai(){
		if(!isset($_SESSION['backaktif']) || $_SESSION['backjabatan'] == 'KARYAWAN'){
			redirect(site_url());
		}else{
			//$data['data'] = $this->all_model->list_gaji_pegawai_all();
			$data['pegawai'] = $this->all_model->list_pegawai();
			$data['allkomponen'] = $this->all_model->list_komponen_upah();
		}
		
		$page = 'gaji_pegawai';
		
		$data['judul'] = $page;
		
		//CEK HALAMAN URL SAMA GA DI FOLDER VIEW PAGES, LEK GA ADA BUKA HALAMAN NOT FOUND
		if ( ! file_exists(APPPATH.'views/adminpages/'.$this->returnUrl($page).'.php'))
		{
			show_404();
		}
		
		//LOAD HALAMAN YANG MELIPUTI HEADER, NAVIGATION, HALAMAN ITU SENDIRI, DAN FOOTER
		
		#$data['notifikasi'] = $this->all_model->get_notifikasi();
		$this->load->view('admintemplates/header',$data);
		$this->load->view('admintemplates/nav',$data);
		$this->load->view('admintemplates/main_panel',$data);
		$this->load->view('adminpages/'.$this->returnUrl($page),$data);
		$this->load->view('admintemplates/footer_aktif',$data);
	}
}
?>