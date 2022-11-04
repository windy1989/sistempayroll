<?php
class All_model extends CI_Model{
	public function __construct()
	{
		$this->load->database();
		$this->load->library('session');
		$this->load->helper('string');
	}
	
	function goLogin(){
		$this->load->helper('string');
		
		$uname = $this->input->post('uname');
		$pw = $this->input->post('pw');

		$sql = "SELECT * FROM pegawai WHERE uname = ? AND status > 0";
		$query = $this->db->query($sql, [$uname]);
		$result = $query->num_rows();
		
		if($result > 0){
			$row = $query->row_array();
			
			if(password_verify($pw, $row['pass']))
			{
				$sqlaktif = "UPDATE pegawai SET aktif = 1 WHERE uname = ? AND status > 0";
				$queryaktif = $this->db->query($sqlaktif, [$uname]);
				
				$_SESSION['backaktif'] = '1';
				$_SESSION['backuserid'] = $row['id'];
				$_SESSION['backusername'] = $row['uname'];
				$_SESSION['backfullname'] = $row['nama_lengkap'];
				$_SESSION['backjabatan'] = $row['hak_akses'];
				$_SESSION['backuseremail'] = $row['email'];
				$_SESSION['backuserfoto'] = $row['foto_profil'];
				
				return '2';
			}else{
				return '1';
			}
			
		}else{
			return '0';
		}

		return $email;
    }
	
	function gauth(){
		$clientid = '622364620078-ognuqjca8hmgpv85tirp7h6rq2omh8l9.apps.googleusercontent.com';
				
		$token = $this->input->post('token');
		$email = $this->input->post('email');
		
		$json = file_get_contents('https://oauth2.googleapis.com/tokeninfo?id_token='.$token); // this WILL do an http request for you
		$data = json_decode($json);
		$tokenclientid = $data->{'aud'};

		if($tokenclientid == $clientid){
			$sql = "SELECT * FROM pegawai WHERE email = ? AND status > 0";
			$query = $this->db->query($sql, [$email]);
			$result = $query->num_rows();
			
			if($result > 0){
				$row = $query->row_array();
				
				$sqlaktif = "UPDATE pegawai SET aktif = 1 WHERE email = ? AND status > 0";
				$queryaktif = $this->db->query($sqlaktif, [$email]);
				
				$_SESSION['backaktif'] = '1';
				$_SESSION['backuserid'] = $row['id'];
				$_SESSION['backusername'] = $row['uname'];
				$_SESSION['backfullname'] = $row['nama_lengkap'];
				$_SESSION['backjabatan'] = $row['hak_akses'];
				$_SESSION['backuseremail'] = $row['email'];
				$_SESSION['backuserfoto'] = $row['foto_profil'];
				
				return '1';
				
			}else{
				return '0';
			}
		}else{
			return '2';
		}
	}
	
	function goLogout(){
		$sqlaktif = "UPDATE pegawai SET aktif = 0 WHERE id = ? AND status > 0";
		$queryaktif = $this->db->query($sqlaktif, [$_SESSION['backuserid']]);
	}
	
	function add_pegawai(){
		
		if($this->input->post('temp') !== ''){
			if($this->input->post('pass') == ''){
				$sqlubah = "UPDATE pegawai SET hak_akses = ?,nama_lengkap = ?,hp = ?, email = ?,phone = ?,tempat_lahir = ?,tanggal_lahir = ?, jk = ?,status_kawin = ?,golongan_darah = ?,agama=?,tipe_id=?,no_id=?,kode_pos=?,alamat_id=?,alamat_domisili=? WHERE id = ?";
				$queryubah = $this->db->query($sqlubah, [$this->input->post('hakakses'),$this->input->post('namalengkap'),$this->input->post('hp'),$this->input->post('email'),$this->input->post('telepon'),$this->input->post('tempatlahir'),$this->input->post('tanggallahir'),$this->input->post('jk'),$this->input->post('statuskawin'),$this->input->post('goldar'),$this->input->post('agama'),$this->input->post('identitas'),$this->input->post('nomorid'),$this->input->post('kodepos'),$this->input->post('alamatasal'),$this->input->post('alamatnow'),$this->input->post('temp')]);
			}else{
				$sqlubah = "UPDATE pegawai SET pass=?, hak_akses = ?,nama_lengkap = ?,hp = ?, email = ?,phone = ?,tempat_lahir = ?,tanggal_lahir = ?, jk = ?,status_kawin = ?,golongan_darah = ?,agama=?,tipe_id=?,no_id=?,kode_pos=?,alamat_id=?,alamat_domisili=? WHERE id = ?";
				$queryubah = $this->db->query($sqlubah, [password_hash($this->input->post('pass'),PASSWORD_DEFAULT),$this->input->post('hakakses'),$this->input->post('namalengkap'),$this->input->post('hp'),$this->input->post('email'),$this->input->post('telepon'),$this->input->post('tempatlahir'),$this->input->post('tanggallahir'),$this->input->post('jk'),$this->input->post('statuskawin'),$this->input->post('goldar'),$this->input->post('agama'),$this->input->post('identitas'),$this->input->post('nomorid'),$this->input->post('kodepos'),$this->input->post('alamatasal'),$this->input->post('alamatnow'),$this->input->post('temp')]);
			}
			
			#update notifikasi
			$this->add_notifikasi('Edit akun berhasil!','Selamat! Akun '.$this->input->post('namalengkap').' berhasil diedit.','ADMIN',0);
			
			return '1';
		}else{
			$sql = "SELECT * FROM pegawai WHERE uname = ? AND status > 0";
			$query = $this->db->query($sql, [$this->input->post('uname')]);
			$result = $query->num_rows();
			
			if($result > 0){
				return '0';
			}else{
				$sqltambah = "INSERT INTO pegawai VALUES(DEFAULT,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,0,1,'')";
				$querytambah = $this->db->query($sqltambah, [$this->input->post('uname'),password_hash($this->input->post('pass'),PASSWORD_DEFAULT),$this->input->post('hakakses'),$this->input->post('namalengkap'),$this->input->post('hp'),$this->input->post('email'),$this->input->post('telepon'),$this->input->post('tempatlahir'),$this->input->post('tanggallahir'),$this->input->post('jk'),$this->input->post('statuskawin'),$this->input->post('goldar'),$this->input->post('agama'),$this->input->post('identitas'),$this->input->post('nomorid'),$this->input->post('kodepos'),$this->input->post('alamatasal'),$this->input->post('alamatnow')]);

				#update notifikasi
				$this->add_notifikasi('Pembuatan akun berhasil!','Selamat! Akun '.$this->input->post('uname').' berhasil ditambahkan.','ADMIN',0);
				
				return '1';
			}
		}
	}
	
	function list_pegawai(){
		$sql = "SELECT *,IFNULL((SELECT id FROM pegawai_upah WHERE id_pegawai = pegawai.id AND status > 0),0) AS statuspajak FROM pegawai WHERE status > 0";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		
		return $result;
	}
	
	function list_keluarga(){
		$sql = "SELECT *,(SELECT nama_lengkap FROM pegawai WHERE id = id_pegawai) AS NAMAPEGAWAI,(SELECT nama FROM relasi_keluarga WHERE id = id_relasi) AS RELASI FROM pegawai_keluarga WHERE status > 0";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		
		return $result;
	}
	
	function list_pendidikan(){
		$sql = "SELECT *,(SELECT nama_lengkap FROM pegawai WHERE id = id_pegawai) AS NAMAPEGAWAI,(SELECT nama FROM pendidikan WHERE id = id_pendidikan) AS JENJANG FROM pegawai_pendidikan WHERE status > 0";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		
		return $result;
	}
	
	function list_pengalaman(){
		$sql = "SELECT *,(SELECT nama_lengkap FROM pegawai WHERE id = id_pegawai) AS NAMAPEGAWAI FROM pegawai_pengalaman_kerja WHERE status > 0";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		
		return $result;
	}
	
	function list_pegawai_pekerjaan(){
		$sql = "SELECT *,(SELECT nama_lengkap FROM pegawai WHERE id = id_pegawai) AS NAMAPEGAWAI,(SELECT nama FROM organisasi WHERE id = id_organisasi) AS NAMAORGANISASI,(SELECT nama FROM posisi_pekerjaan WHERE id = id_posisi_pekerjaan) AS NAMAPOSISI,(SELECT nama FROM posisi_level WHERE id = id_posisi_level) AS NAMALEVEL,(SELECT nama FROM cabang WHERE id = id_cabang) AS NAMACABANG FROM pegawai_pekerjaan WHERE status > 0";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		
		return $result;
	}
	
	function list_organisasi(){
		$sql = "SELECT * FROM organisasi WHERE status > 0";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		
		return $result;
	}
	
	function list_posisi(){
		$sql = "SELECT * FROM posisi_pekerjaan WHERE status > 0";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		
		return $result;
	}
	
	function list_level(){
		$sql = "SELECT * FROM posisi_level WHERE status > 0";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		
		return $result;
	}
	
	function list_cabang(){
		$sql = "SELECT * FROM cabang WHERE status > 0";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		
		return $result;
	}
	
	function get_pegawai(){
		
		$id = $this->input->post('id');
		$sql = "SELECT * FROM pegawai WHERE id = ? AND status > 0 LIMIT 1";
		$query = $this->db->query($sql,[$id]);
		$result = $query->row_array();
		
		return $result;
	}
	
	function del_pegawai(){
		
		$id = $this->input->post('id');
		$sql = "UPDATE pegawai SET status = 0 WHERE id = ? AND status > 0";
		$query = $this->db->query($sql,[$id]);
		
	}
	
	function get_kode_pegawai(){
		$sql = "SELECT * FROM pegawai_pekerjaan WHERE status > 0 ORDER BY no_pegawai DESC LIMIT 1";
		$query = $this->db->query($sql);
		$result = $query->row_array();
		$jum = $query->num_rows();
		
		if($jum > 0){
			$kodebaru = $this->increment($result['no_pegawai']);
		}else{
			$kodebaru = 'PEG'.date('Y').'001';
		} 
		
		return $kodebaru;
	}
	
	function increment($string)
	{
	   return preg_replace_callback('/^([^0-9]*)([0-9]+)([^0-9]*)$/', function($m)
	   {
		  return $m[1].str_pad($m[2]+1, strlen($m[2]), '0', STR_PAD_LEFT).$m[3];
	   }, $string);
	}
	
	function add_pekerjaan_pegawai(){
		
		if($this->input->post('temp') !== ''){
			$sql = "SELECT * FROM pegawai_pekerjaan WHERE no_pegawai = ? AND status > 0 AND id <> ?";
			$query = $this->db->query($sql, [$this->input->post('nomorpegawai'),$this->input->post('temp')]);
			$result = $query->num_rows();
			
			if($result > 0){
				return '0';
			}else{
				$sqltambah = "UPDATE pegawai_pekerjaan SET id_pegawai = ?, no_pegawai = ?, id_organisasi = ?, id_posisi_pekerjaan = ?, id_posisi_level = ?, status_pekerja = ?, id_cabang = ?, tanggal_mulai = ?, tanggal_selesai = ?, tanggal_update = DEFAULT WHERE id = ? AND status > 0";
				$querytambah = $this->db->query($sqltambah, [$this->input->post('pegawai'),$this->input->post('nomorpegawai'),$this->input->post('organisasi'),$this->input->post('posisi'),$this->input->post('level'),$this->input->post('statuspekerja'),$this->input->post('cabang'),$this->input->post('tanggalmulai'),$this->input->post('tanggalakhir'),$this->input->post('temp')]);
				
				return '1';
			}
		}else{
			$sql = "SELECT * FROM pegawai_pekerjaan WHERE no_pegawai = ? AND status > 0";
			$query = $this->db->query($sql, [$this->input->post('nomorpegawai')]);
			$result = $query->num_rows();
			
			if($result > 0){
				return '0';
			}else{
				$sqltambah = "INSERT INTO pegawai_pekerjaan VALUES(DEFAULT,?,?,?,?,?,?,?,?,?,DEFAULT,1)";
				$querytambah = $this->db->query($sqltambah, [$this->input->post('pegawai'),$this->input->post('nomorpegawai'),$this->input->post('organisasi'),$this->input->post('posisi'),$this->input->post('level'),$this->input->post('statuspekerja'),$this->input->post('cabang'),$this->input->post('tanggalmulai'),$this->input->post('tanggalakhir')]);
				
				#update notifikasi
				$this->add_notifikasi('Pekerjaan berhasil ditambahkan!','Selamat! Anda berhasil ditambahkan kepada pekerjaan dengan nomor pegawai '.$this->input->post('nomorpegawai').' berhasil ditambahkan.','KARYAWAN',$this->input->post('pegawai'));
				
				return '1';
			}
		}
	}
	
	function get_pekerjaan_pegawai(){
		
		$id = $this->input->post('id');
		$sql = "SELECT * FROM pegawai_pekerjaan WHERE id = ? AND status > 0 LIMIT 1";
		$query = $this->db->query($sql,[$id]);
		$result = $query->row_array();
		
		return $result;
	}
	
	function del_pekerjaan_pegawai(){
		
		$id = $this->input->post('id');
		$sql = "UPDATE pegawai_pekerjaan SET status = 0 WHERE id = ? AND status > 0";
		$query = $this->db->query($sql,[$id]);
		
	}
	
	function add_benefit(){
		
		if($this->input->post('temp') !== ''){
			
			$sqltambah = "UPDATE benefit SET nama=?,berlaku_awal=?,berlaku_akhir=?,keterangan=?,nominal_cover=? WHERE id=? AND status > 0";
			$querytambah = $this->db->query($sqltambah, [$this->input->post('nama'),$this->input->post('tanggalmulai'),$this->input->post('tanggalakhir'),$this->input->post('keterangan'),str_replace('.','',$this->input->post('plafon')),$this->input->post('temp')]);
				
		}else{
			$sqltambah = "INSERT INTO benefit VALUES(DEFAULT,?,?,?,?,?,1)";
			$querytambah = $this->db->query($sqltambah, [$this->input->post('nama'),$this->input->post('tanggalmulai'),$this->input->post('tanggalakhir'),$this->input->post('keterangan'),str_replace('.','',$this->input->post('plafon'))]);
		}
		
		#update notifikasi
		$this->add_notifikasi('Benefit berhasil ditambahkan!','Selamat! Anda berhasil menambahkan '.$this->input->post('nama'),'ADMIN',0);
		
		return '1';
	}
	
	function list_benefit(){
		$sql = "SELECT * FROM benefit WHERE status > 0";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		
		return $result;
	}
	
	function get_benefit(){
		
		$id = $this->input->post('id');
		$sql = "SELECT * FROM benefit WHERE id = ? AND status > 0 LIMIT 1";
		$query = $this->db->query($sql,[$id]);
		$result = $query->row_array();
		
		return $result;
	}
	
	function del_benefit(){
		
		$id = $this->input->post('id');
		$sql = "UPDATE benefit SET status = 0 WHERE id = ? AND status > 0";
		$query = $this->db->query($sql,[$id]);
		
	}
	
	function list_pegawai_benefit(){
		$sql = "SELECT *,(SELECT nama_lengkap FROM pegawai WHERE id = id_pegawai) AS NAMAPEGAWAI,(SELECT nama FROM benefit WHERE id = id_benefit) AS NAMABENEFIT FROM pegawai_benefit WHERE status > 0";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		
		return $result;
	}
	
	function add_benefit_pegawai(){
		
		$sql = "SELECT * FROM benefit WHERE id = ? AND status > 0 AND CURDATE() BETWEEN berlaku_awal AND berlaku_akhir";
		$query = $this->db->query($sql, [$this->input->post('benefit')]);
		$result = $query->num_rows();
		$rowbenefit = $query->row_array();
		
		if($result == 0){
			return -1;
		}else{
			$ceksaldo = $this->cek_saldo_benefit($this->input->post('benefit'));
			
			if($ceksaldo !== 0 && $ceksaldo !== -1){
				
				$dir = $_SERVER['DOCUMENT_ROOT']."/assets/img/bukti/benefit/";
			
				$namafile = '';
				
				if(empty($_FILES["uploadbukti"]["name"])){
					
				}else{
					
					if (($_FILES["uploadbukti"]["type"] == "image/gif") ||
						($_FILES["uploadbukti"]["type"] == "image/jpeg") ||
						($_FILES["uploadbukti"]["type"] == "image/png") ||
						($_FILES["uploadbukti"]["type"] == "image/pjpeg") ||
						($_FILES["uploadbukti"]["type"] == "image/jpg") ||
						($_FILES["uploadbukti"]["type"] == "image/JPG")
						){
						$ext = $this->findexts($_FILES["uploadbukti"]["name"]); 
						$randomNumber = strtoupper(random_string('alnum',20));
						$lokasi = $dir.$randomNumber.".".$ext;
						$this->uploadBerkas($_FILES["uploadbukti"]["tmp_name"],$lokasi);
						$namafile = $randomNumber.'.'.$ext;
					}
					
				}
				
				if($this->input->post('temp') !== ''){
					
					$sql = "SELECT * FROM pegawai_benefit WHERE id_pegawai = ? AND id = ? AND status > 0";
					$query = $this->db->query($sql, [$_SESSION['backuserid'],$this->input->post('temp')]);
					$result = $query->num_rows();
					$row = $query->row_array();
					
					if($namafile !== '' && $row['bukti'] !== ''){
						if(file_exists("assets/img/bukti/benefit/".$row['bukti'])){
							unlink("assets/img/bukti/benefit/".$row['bukti']);
						}
					}
					
					if($namafile == ''){
						$sqltambah = "UPDATE pegawai_benefit SET keterangan = ?, nominal = ?, id_benefit = ?, tanggal_request = NOW() WHERE id = ? AND id_pegawai = ? AND status > 0";
						$querytambah = $this->db->query($sqltambah, [$this->input->post('keterangan'),str_replace('.','',$this->input->post('nominal')),$this->input->post('benefit'),$this->input->post('temp'),$_SESSION['backuserid']]);
					}else{
						$sqltambah = "UPDATE pegawai_benefit SET bukti = ?, keterangan = ?, nominal = ?, id_benefit = ?, tanggal_request = NOW() WHERE id = ? AND id_pegawai = ? AND status > 0";
						$querytambah = $this->db->query($sqltambah, [$namafile,$this->input->post('keterangan'),str_replace('.','',$this->input->post('nominal')),$this->input->post('benefit'),$this->input->post('temp'),$_SESSION['backuserid']]);
					}
					
				}else{
					$sqltambah = "INSERT INTO pegawai_benefit VALUES(DEFAULT,?,?,NOW(),?,?,?,1)";
					$querytambah = $this->db->query($sqltambah, [$_SESSION['backuserid'],$this->input->post('benefit'),$namafile,$this->input->post('keterangan'),str_replace('.','',$this->input->post('nominal'))]);
					
					#update notifikasi
					$this->add_notifikasi('Benefit berhasil ditambahkan!','Selamat! Pengajuan benefit '.$rowbenefit["nama"].' anda berhasil disimpan.','KARYAWAN',$_SESSION['backuserid']);
					$this->add_notifikasi('Pengajuan benefit!','Selamat! Pengajuan benefit '.$rowbenefit["nama"].' atas nama '.$_SESSION["backfullname"].'.','ADMIN',0);
				}
				
				return 1;
			}elseif($ceksaldo == 0){
				return 0;
			}elseif($ceksaldo == -1){
				return -1;
			}
		}
	}
	
	function get_benefit_pegawai(){
		
		$id = $this->input->post('id');
		$sql = "SELECT * FROM pegawai_benefit WHERE id = ? AND status > 0 LIMIT 1";
		$query = $this->db->query($sql,[$id]);
		$result = $query->row_array();
		
		return $result;
	}
	
	function del_benefit_pegawai(){
		
		$id = $this->input->post('id');
		$sql = "UPDATE pegawai_benefit SET status = 0 WHERE id = ? AND status > 0";
		$query = $this->db->query($sql,[$id]);
		
	}
	
	function add_tipe_reimburse(){
		
		if($this->input->post('temptipe') !== ''){
			$sqltambah = "UPDATE pengembalian SET nama = ?, plafon = ?, keterangan = ? WHERE id = ? AND status > 0";
			$querytambah = $this->db->query($sqltambah, [$this->input->post('nama'),str_replace('.','',$this->input->post('limit')),$this->input->post('keterangan'),$this->input->post('temptipe')]);
		}else{
			$sqltambah = "INSERT INTO pengembalian VALUES(DEFAULT,?,?,?,1)";
			$querytambah = $this->db->query($sqltambah, [$this->input->post('nama'),str_replace('.','',$this->input->post('limit')),$this->input->post('keterangan')]);
		}
		
	}
	
	function list_tipe_reimburse(){
		$sql = "SELECT * FROM pengembalian WHERE status > 0";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		
		return $result;
	}
	
	function get_tipe_reimburse(){
		
		$id = $this->input->post('id');
		$sql = "SELECT * FROM pengembalian WHERE id = ? AND status > 0 LIMIT 1";
		$query = $this->db->query($sql,[$id]);
		$result = $query->row_array();
		
		return $result;
	}
	
	function del_tipe_reimburse(){
		
		$id = $this->input->post('id');
		$sql = "UPDATE pengembalian SET status = 0 WHERE id = ? AND status > 0";
		$query = $this->db->query($sql,[$id]);
		
	}
	
	function cek_saldo_reimburse(){
		
		$idtipe = $this->input->post('tipe');
		$sql = "SELECT IFNULL(SUM(pp.nominal),0) AS nominal,p.plafon AS plafon FROM pegawai_pengembalian pp, pengembalian p WHERE p.id = pp.id_pengembalian AND p.id = ? AND pp.id_pegawai = ? AND pp.status > 0 AND YEAR(pp.tgl_request) = YEAR(CURDATE())";
		$query = $this->db->query($sql,[$idtipe,$_SESSION['backuserid']]);
		$result = $query->row_array();
		
		$hasil = $result['plafon'] - $result['nominal'];
		
		if($hasil >= 0){
			return 'Rp '.number_format($hasil,0,',','.').',-';
		}else{
			return 0;
		}
	}
	
	function add_reimburse(){
		
		$sqlcek = "SELECT IFNULL(SUM(nominal),0) AS terpakai,(SELECT plafon FROM pengembalian WHERE id = ?) AS plafon FROM pegawai_pengembalian WHERE id_pegawai = ? AND id_pengembalian = ? AND YEAR(tgl_efektif) = YEAR(CURDATE()) AND status > 0";
		$querycek = $this->db->query($sqlcek,[$this->input->post('reimburse'),$_SESSION['backuserid'],$this->input->post('reimburse')]);
		$rowcek = $querycek->row_array();
		
		if($this->input->post('temp') !== ''){
			$sqlcekjum = "SELECT IFNULL(nominal,0) as nominal FROM pegawai_pengembalian WHERE id = ? AND status > 0";
			$querycekjum = $this->db->query($sqlcekjum,[$this->input->post('temp')]);
			$rowcekjum = $querycekjum->row_array();
			
			$jumnow = $rowcek['terpakai'] + str_replace('.','',$this->input->post('nominal')) - $rowcekjum['nominal'];
		}else{
			$jumnow = $rowcek['terpakai'] + str_replace('.','',$this->input->post('nominal'));
		}
		
		if($jumnow <= $rowcek['plafon']){
		
			$dir = $_SERVER['DOCUMENT_ROOT']."/assets/img/bukti/reimburse/";
			
			$namafile = '';
			
			if(empty($_FILES["uploadbukti"]["name"])){
				
			}else{
				
				if (($_FILES["uploadbukti"]["type"] == "image/gif") ||
					($_FILES["uploadbukti"]["type"] == "image/jpeg") ||
					($_FILES["uploadbukti"]["type"] == "image/png") ||
					($_FILES["uploadbukti"]["type"] == "image/pjpeg") ||
					($_FILES["uploadbukti"]["type"] == "image/jpg") ||
					($_FILES["uploadbukti"]["type"] == "image/JPG")
					){
					$ext = $this->findexts($_FILES["uploadbukti"]["name"]); 
					$randomNumber = strtoupper(random_string('alnum',20));
					$lokasi = $dir.$randomNumber.".".$ext;
					$this->uploadBerkas($_FILES["uploadbukti"]["tmp_name"],$lokasi);
					$namafile = $randomNumber.'.'.$ext;
				}
				
			}
			
			if($this->input->post('temp') !== ''){
				
				$sql = "SELECT * FROM pegawai_pengembalian WHERE id_pegawai = ? AND id = ? AND status > 0";
				$query = $this->db->query($sql, [$_SESSION['backuserid'],$this->input->post('temp')]);
				$result = $query->num_rows();
				$row = $query->row_array();
				
				if($namafile !== '' && $row['bukti'] !== ''){
					if(file_exists("assets/img/bukti/reimburse/".$row['bukti'])){
						unlink("assets/img/bukti/reimburse/".$row['bukti']);
					}
				}
				
				if($namafile == ''){
					$sqltambah = "UPDATE pegawai_pengembalian SET tgl_efektif = ?, keterangan = ?, nominal = ?, id_pengembalian = ?, tgl_request = NOW() WHERE id = ? AND id_pegawai = ? AND status > 0";
					$querytambah = $this->db->query($sqltambah, [$this->input->post('tanggalefektif'),$this->input->post('keteranganrequest'),str_replace('.','',$this->input->post('nominal')),$this->input->post('reimburse'),$this->input->post('temp'),$_SESSION['backuserid']]);
				}else{
					$sqltambah = "UPDATE pegawai_pengembalian SET tgl_efektif = ?, bukti = ?, keterangan = ?, nominal = ?, id_pengembalian = ?, tgl_request = NOW() WHERE id = ? AND id_pegawai = ? AND status > 0";
					$querytambah = $this->db->query($sqltambah, [$this->input->post('tanggalefektif'),$namafile,$this->input->post('keteranganrequest'),str_replace('.','',$this->input->post('nominal')),$this->input->post('reimburse'),$this->input->post('temp'),$_SESSION['backuserid']]);
				}
				
			}else{
				$sqltambah = "INSERT INTO pegawai_pengembalian VALUES(DEFAULT,?,?,?,?,?,?,0,NOW(),NULL,1)";
				$querytambah = $this->db->query($sqltambah, [$_SESSION['backuserid'],$this->input->post('tanggalefektif'),$namafile,$this->input->post('keteranganrequest'),str_replace('.','',$this->input->post('nominal')),$this->input->post('reimburse')]);
				
				#update notifikasi
				$this->add_notifikasi('Reimburse berhasil ditambahkan!','Selamat! Pengajuan reimburse Rp '.number_format(str_replace('.','',$this->input->post('nominal')),0,',','.').' anda berhasil disimpan.','KARYAWAN',$_SESSION['backuserid']);
				$this->add_notifikasi('Pengajuan reimburse!','Terdapat pengajuan reimburse dengan nominal Rp '.number_format(str_replace('.','',$this->input->post('nominal')),0,',','.').' atas nama '.$_SESSION["backfullname"].'.','ADMIN',0);
			}
			
			return 1;
		}else{
			return 0;
		}
	}
	
	function list_reimburse(){
		$sql = "SELECT *,(SELECT nama FROM pengembalian WHERE id = id_pengembalian) AS namareimburse FROM pegawai_pengembalian WHERE status > 0 AND id_pegawai = ?";
		$query = $this->db->query($sql,[$_SESSION['backuserid']]);
		$result = $query->result_array();
		
		return $result;
	}
	
	function list_reimburse_pegawai(){
		$sql = "SELECT *,(SELECT nama FROM pengembalian WHERE id = id_pengembalian) AS namareimburse,(SELECT nama_lengkap FROM pegawai WHERE id = id_pegawai) AS namapegawai FROM pegawai_pengembalian WHERE status > 0";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		
		return $result;
	}
	
	function get_bukti($mode,$id){
		if($mode == 'reimburse'){
			
			if($_SESSION['backjabatan'] == 'ADMIN'){
				$sql = "SELECT * FROM pegawai_pengembalian WHERE status > 0 AND id = ?";
				$query = $this->db->query($sql,[$id]);
			}elseif($_SESSION['backjabatan'] == 'KARYAWAN'){
				$sql = "SELECT * FROM pegawai_pengembalian WHERE status > 0 AND id_pegawai = ? AND id = ?";
				$query = $this->db->query($sql,[$_SESSION['backuserid'],$id]);
			}
			
			$row = $query->row_array();
			
			if($row['bukti']){
				return base_url().'assets/img/bukti/reimburse/'.$row['bukti'];
			}else{
				return base_url().'assets/img/image-not-found.png';
			}
		}elseif($mode == 'kas_dimuka'){
			
			$sql = "SELECT * FROM pegawai_kas WHERE status > 0 AND id_pegawai = ? AND id = ?";
			$query = $this->db->query($sql,[$_SESSION['backuserid'],$id]);
			$row = $query->row_array();
			
			if($row['bukti'] !== '' || isset($_SESSION['backjabatan']) == 'ADMIN'){
				return base_url().'assets/img/bukti/kas_dimuka/'.$row['bukti'];
			}else{
				return base_url().'assets/img/image-not-found.png';
			}
		}elseif($mode == 'cuti'){
			
			$sql = "SELECT * FROM pegawai_ijin WHERE status > 0 AND id_pegawai = ? AND id = ?";
			$query = $this->db->query($sql,[$_SESSION['backuserid'],$id]);
			$row = $query->row_array();
			
			if($row['bukti'] !== ''){
				return base_url().'assets/img/bukti/cuti/'.$row['bukti'];
			}else{
				return base_url().'assets/img/image-not-found.png';
			}
		}elseif($mode == 'lembur'){
			
			$sql = "SELECT * FROM pegawai_overtime WHERE status > 0 AND id_pegawai = ? AND id = ?";
			$query = $this->db->query($sql,[$_SESSION['backuserid'],$id]);
			$row = $query->row_array();
			
			if($row['bukti'] !== '' || isset($_SESSION['backjabatan']) == 'ADMIN'){
				return base_url().'assets/img/bukti/lembur/'.$row['bukti'];
			}else{
				return base_url().'assets/img/image-not-found.png';
			}
		}elseif($mode == 'benefit'){
			if($_SESSION['backjabatan'] == 'ADMIN'){
				$sql = "SELECT * FROM pegawai_benefit WHERE status > 0 AND id = ?";
				$query = $this->db->query($sql,[$id]);
			}elseif($_SESSION['backjabatan'] == 'KARYAWAN'){
				$sql = "SELECT * FROM pegawai_benefit WHERE status > 0 AND id_pegawai = ? AND id = ?";
				$query = $this->db->query($sql,[$_SESSION['backuserid'],$id]);
			}
			
			$row = $query->row_array();
			
			if($row['bukti']){
				return base_url().'assets/img/bukti/benefit/'.$row['bukti'];
			}else{
				return base_url().'assets/img/image-not-found.png';
			}
		}
		
	}
	
	function get_reimburse(){
		
		$id = $this->input->post('id');
		$sql = "SELECT * FROM pegawai_pengembalian WHERE id = ? AND id_pegawai = ? AND status > 0 LIMIT 1";
		$query = $this->db->query($sql,[$id,$_SESSION['backuserid']]);
		$result = $query->row_array();
		
		return $result;
	}
	
	function get_limit_reimburse(){
		
		$id = $this->input->post('id');
		$sql = "SELECT *,IFNULL((SELECT SUM(nominal) FROM pegawai_pengembalian WHERE id_pengembalian = pengembalian.id AND id_pegawai = ? AND status  = 3),0) AS terpakai FROM pengembalian WHERE status > 0";
		$query = $this->db->query($sql,[$_SESSION['backuserid']]);
		$result = $query->result_array();
		
		return $result;
	}
	
	function del_reimburse(){
		
		$id = $this->input->post('id');
		$sql = "UPDATE pegawai_pengembalian SET status = 0 WHERE id = ? AND id_pegawai = ? AND status > 0";
		$query = $this->db->query($sql,[$id,$_SESSION['backuserid']]);
		
	}
	
	function update_ijin_reimburse(){
		
		if($_SESSION['backjabatan'] == 'ADMIN'){
			$id = $this->input->post('id');
			$value = $this->input->post('val');
			$sql = "UPDATE pegawai_pengembalian SET status = ? WHERE id = ? AND status > 0";
			$query = $this->db->query($sql,[$value,$id]);
			
			$querycek = $this->db->query("SELECT * FROM pegawai_pengembalian WHERE id = ?",[$id]);
			$rowcek = $querycek->row_array();
			#update notifikasi
			$this->add_notifikasi('Reimburse diubah status!','Pengajuan reimburse anda dengan nominal Rp '.number_format(str_replace('.','',$rowcek["nominal"]),0,',','.').' telah diubah oleh admin.','KARYAWAN',$rowcek['id_pegawai']);
		}
	}
	
	function list_kas_pegawai(){
		$sql = "SELECT * FROM pegawai_kas WHERE id_pegawai = ? AND status > 0";
		$query = $this->db->query($sql,[$_SESSION['backuserid']]);
		$result = $query->result_array();
		
		return $result;
	}
	
	function add_kas_dimuka(){
		if($this->input->post('temp') !== ''){
			$sqltambah = "UPDATE pegawai_kas SET tanggal_request = DEFAULT, untuk_tanggal = ?, keterangan = ?, nominal_total = ? WHERE id = ? AND status > 0";
			$querytambah = $this->db->query($sqltambah, [$this->input->post('tanggalefektif'),$this->input->post('keterangan'),str_replace('.','',$this->input->post('nominal')),$this->input->post('temp')]);
		}else{
			$sqltambah = "INSERT INTO pegawai_kas VALUES(DEFAULT,?,DEFAULT,?,?,?,NULL,0,'',1)";
			$querytambah = $this->db->query($sqltambah, [$_SESSION['backuserid'],$this->input->post('tanggalefektif'),$this->input->post('keterangan'),str_replace('.','',$this->input->post('nominal'))]);
			
			#update notifikasi
			$this->add_notifikasi('Pengajuan kas advance!','Terdapat pengajuan kas advance dengan nominal Rp '.number_format(str_replace('.','',$this->input->post('nominal')),0,',','.').' atas nama '.$_SESSION["backfullname"].'.','ADMIN',0);
		}
	}
	
	function get_kas_dimuka(){
		
		$id = $this->input->post('id');
		$sql = "SELECT * FROM pegawai_kas WHERE id = ? AND id_pegawai = ? AND status > 0 LIMIT 1";
		$query = $this->db->query($sql,[$id,$_SESSION['backuserid']]);
		$result = $query->row_array();
		
		return $result;
	}
	
	function del_kas_dimuka(){
		
		$id = $this->input->post('id');
		$sql = "UPDATE pegawai_kas SET status = 0 WHERE id = ? AND id_pegawai = ? AND status > 0";
		$query = $this->db->query($sql,[$id,$_SESSION['backuserid']]);
		
	}
	
	function list_kas_pegawai_all(){
		$sql = "SELECT *,(SELECT nama_lengkap FROM pegawai WHERE id = id_pegawai) AS namapegawai FROM pegawai_kas WHERE status > 0";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		
		return $result;
	}
	
	function update_ijin_kas(){
		
		if($_SESSION['backjabatan'] == 'ADMIN'){
			$id = $this->input->post('id');
			$value = $this->input->post('val');
			$sql = "UPDATE pegawai_kas SET status = ? WHERE id = ? AND status > 0";
			$query = $this->db->query($sql,[$value,$id]);
			
			$querycek = $this->db->query("SELECT * FROM pegawai_kas WHERE id = ?",[$id]);
			$rowcek = $querycek->row_array();
			#update notifikasi
			$this->add_notifikasi('Pengajuan kas advance diubah status!','Pengajuan kas advance anda dengan nominal Rp '.number_format($rowcek["nominal_total"],0,',','.').' telah diubah oleh admin.','KARYAWAN',$rowcek['id_pegawai']);
		}
	}
	
	function upload_bukti_kas(){
		
	
		$dir = $_SERVER['DOCUMENT_ROOT']."/assets/img/bukti/kas_dimuka/";
		
		$namafile = '';
		
		if(empty($_FILES["uploadbukti"]["name"])){
			
		}else{
			if (($_FILES["uploadbukti"]["type"] == "image/gif") ||
				($_FILES["uploadbukti"]["type"] == "image/jpeg") ||
				($_FILES["uploadbukti"]["type"] == "image/png") ||
				($_FILES["uploadbukti"]["type"] == "image/pjpeg") ||
				($_FILES["uploadbukti"]["type"] == "image/jpg") ||
				($_FILES["uploadbukti"]["type"] == "image/JPG")
				){
				$ext = $this->findexts($_FILES["uploadbukti"]["name"]); 
				$randomNumber = strtoupper(random_string('alnum',20));
				$lokasi = $dir.$randomNumber.".".$ext;
				$this->uploadBerkas($_FILES["uploadbukti"]["tmp_name"],$lokasi);
				$namafile = $randomNumber.'.'.$ext;
			}
		}
		
		if($this->input->post('tempbukti') !== ''){
			
			$sql = "SELECT * FROM pegawai_kas WHERE id_pegawai = ? AND id = ? AND status > 0";
			$query = $this->db->query($sql, [$_SESSION['backuserid'],$this->input->post('tempbukti')]);
			$result = $query->num_rows();
			$row = $query->row_array();
			
			if($row['bukti'] !== ''){
				if(file_exists("assets/img/bukti/kas_dimuka/".$row['bukti'])){
					unlink("assets/img/bukti/kas_dimuka/".$row['bukti']);
				}
			}
			
			$sqltambah = "UPDATE pegawai_kas SET tanggal_kembali = NOW(), bukti = ?, nominal_terpakai = ? WHERE id = ? AND id_pegawai = ? AND status > 0";
			$querytambah = $this->db->query($sqltambah, [$namafile,str_replace('.','',$this->input->post('nominalbukti')),$this->input->post('tempbukti'),$_SESSION['backuserid']]);
			
		}
		
	}
	
	function add_pinjaman(){
		if($this->input->post('temp') !== ''){
			$sqltambah = "UPDATE pegawai_pinjaman SET nominal_total = ?, tenor = ?, terhitung_tanggal = ?, keterangan = ? WHERE id = ? AND id_pegawai = ? AND status > 0";
			$querytambah = $this->db->query($sqltambah, [str_replace('.','',$this->input->post('nominal')),$this->input->post('tenor'),$this->input->post('tanggalefektif'),$this->input->post('keterangan'),$this->input->post('temp'),$_SESSION['backuserid']]);
		}else{
			$no = date('ymd').strtoupper(random_string('alnum',10));
			
			$sqltambah = "INSERT INTO pegawai_pinjaman VALUES(DEFAULT,?,?,?,?,?,?,?,1)";
			$querytambah = $this->db->query($sqltambah, [$no,$_SESSION['backuserid'],str_replace('.','',$this->input->post('nominal')),$this->input->post('tenor'),1.5,$this->input->post('tanggalefektif'),$this->input->post('keterangan')]);
			
			#update notifikasi
			$this->add_notifikasi('Pengajuan pinjaman!','Terdapat pengajuan pinjaman dengan nominal Rp '.number_format(str_replace('.','',$this->input->post('nominal')),0,',','.').' atas nama '.$_SESSION["backfullname"].'.','ADMIN',0);
		}
	}
	
	function list_pinjaman(){
		$sql = "SELECT * FROM pegawai_pinjaman WHERE id_pegawai = ? AND status > 0";
		$query = $this->db->query($sql,[$_SESSION['backuserid']]);
		$result = $query->result_array();
		
		return $result;
	}
	
	function list_cicilan(){
		$sql = "SELECT *,IFNULL((SELECT SUM(nominal) FROM pembayaran_pinjaman WHERE id_pegawai_pinjaman = pegawai_pinjaman.id AND status > 0),0) AS terbayar FROM pegawai_pinjaman WHERE id_pegawai = ? AND status > 0";
		$query = $this->db->query($sql,[$_SESSION['backuserid']]);
		$result = $query->result_array();
		
		return $result;
	}
	
	function get_pinjaman(){
		
		$id = $this->input->post('id');
		$sql = "SELECT * FROM pegawai_pinjaman WHERE id = ? AND id_pegawai = ? AND status > 0 LIMIT 1";
		$query = $this->db->query($sql,[$id,$_SESSION['backuserid']]);
		$result = $query->row_array();
		
		return $result;
	}
	
	function del_pinjaman(){
		
		$id = $this->input->post('id');
		$sql = "UPDATE pegawai_pinjaman SET status = 0 WHERE id = ? AND id_pegawai = ? AND status > 0";
		$query = $this->db->query($sql,[$id,$_SESSION['backuserid']]);
		
	}
	
	function list_pinjaman_pegawai_all(){
		$sql = "SELECT *,(SELECT nama_lengkap FROM pegawai WHERE id = id_pegawai) AS namapegawai FROM pegawai_pinjaman WHERE status > 0";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		
		return $result;
	}
	
	function go_absen(){
		
		$sql = "SELECT * FROM pegawai_absensi WHERE id_pegawai = ? AND tanggal = CURDATE() AND status = 1";
		$query = $this->db->query($sql,[$_SESSION['backuserid']]);
		$row = $query->row_array();
		$jum = $query->num_rows();
		
		if($jum > 0){
		
			if($this->input->post('tipemasuk') == 'masuk'){
				return 0;
			}elseif($this->input->post('tipemasuk') == 'istirahatout'){
				if($row['jam_pulang'] == NULL){
					if($row['istirahat_keluar'] == NULL){
						$sqlupdate = $this->db->query('UPDATE pegawai_absensi SET istirahat_keluar = NOW(),keterangan_istirahat_keluar = ? WHERE id_pegawai = ? AND tanggal = CURDATE() AND status = 1', [$this->input->post('alasan'),$_SESSION['backuserid']]);
						
						return '1';
					}else{
						return '0';
					}
				}else{
					return '-3';
				}
			}elseif($this->input->post('tipemasuk') == 'istirahatin'){
				if($row['jam_pulang'] == NULL){
					if($row['istirahat_keluar'] !== NULL){
						if($row['istirahat_masuk'] == NULL){
							$sqlupdate = $this->db->query('UPDATE pegawai_absensi SET istirahat_masuk = NOW(),keterangan_istirahat_masuk = ? WHERE id_pegawai = ? AND tanggal = CURDATE() AND status = 1', [$this->input->post('alasan'),$_SESSION['backuserid']]);
							
							return '1';
						}else{
							return '0';
						}
					}else{
						return '-2';
					}
				}else{
					return '-3';
				}
			}elseif($this->input->post('tipemasuk') == 'pulang'){
				if($row['jam_pulang'] == NULL){
					$sqlupdate = $this->db->query('UPDATE pegawai_absensi SET jam_pulang = NOW(),keterangan_pulang = ? WHERE id_pegawai = ? AND tanggal = CURDATE() AND status = 1', [$this->input->post('alasan'),$_SESSION['backuserid']]);
					
					return '1';
				}else{
					return '0';
				}
			}
			
		}else{
			if($this->input->post('tipemasuk') !== 'masuk'){
				return '-1';
			}else{
				$sqlupdate = $this->db->query('INSERT INTO pegawai_absensi VALUES(DEFAULT,?,CURDATE(),NOW(),?,DEFAULT,"",DEFAULT,"",DEFAULT,"",1)', [$_SESSION['backuserid'],$this->input->post('alasan')]);
				
				return '1';
			}
		}
		
	}
	
	function list_absensi(){
		$sql = "SELECT * FROM pegawai_absensi WHERE id_pegawai = ? AND status = 1 ORDER BY tanggal DESC";
		$query = $this->db->query($sql,[$_SESSION['backuserid']]);
		$result = $query->result_array();
		
		return $result;
	}
	
	function get_absen_today(){
		$sql = "SELECT * FROM pegawai_absensi WHERE id_pegawai = ? AND tanggal = CURDATE() AND status = 1";
		$query = $this->db->query($sql,[$_SESSION['backuserid']]);
		$result = $query->row_array();
		
		return $result;
	}
	
	function get_poin_setting(){
		$sql = "SELECT * FROM poin WHERE status = 1";
		$query = $this->db->query($sql);
		$result = $query->row_array();
		
		return $result;
	}
	
	function update_ijin_pinjaman(){
		
		if($_SESSION['backjabatan'] == 'ADMIN'){
			$id = $this->input->post('id');
			$value = $this->input->post('val');
			$sql = "UPDATE pegawai_pinjaman SET status = ? WHERE id = ? AND status > 0";
			$query = $this->db->query($sql,[$value,$id]);
			
			$querycek = $this->db->query("SELECT * FROM pegawai_pinjaman WHERE id = ?",[$id]);
			$rowcek = $querycek->row_array();
			#update notifikasi
			$this->add_notifikasi('Pengajuan pinjaman diubah status!','Pengajuan pinjaman anda dengan nominal Rp '.number_format($rowcek["nominal_total"],0,',','.').' telah diubah oleh admin.','KARYAWAN',$rowcek['id_pegawai']);
		}
	}
	
	function get_total_masuk($year,$month,$id){
		
		$bulan = $year.'-'.$month.'%';
		
		$sql = $this->db->query('SELECT IFNULL(COUNT(*),0) AS total FROM pegawai_absensi WHERE status > 0 AND DAYOFWEEK(tanggal) IN (SELECT hari FROM jadwal_kerja WHERE status > 0) AND tanggal NOT IN (SELECT tanggal FROM jadwal_libur WHERE status > 0) AND tanggal LIKE ? AND id_pegawai = ?',[$bulan,$id]);
		$row = $sql->row_array();
		
		return $row;
		
	}
	
	function get_total_ijin($year,$month,$id){
		
		$bulan = $year.'-'.$month.'%';
		
		$sql = $this->db->query('SELECT IFNULL(COUNT(*),0) AS total FROM pegawai_ijin WHERE status = 3 AND DAYOFWEEK(tanggal) IN (SELECT hari FROM jadwal_kerja WHERE status > 0) AND tanggal NOT IN (SELECT tanggal FROM jadwal_libur WHERE status > 0) AND tanggal LIKE ? AND id_pegawai = ?',[$bulan,$id]);
		$row = $sql->row_array();
		
		return $row;
		
	}
	
	function get_total_absen($year,$month,$id){
		
		$bulan = $year.'-'.$month.'%';
		
		$sqlgetjadwalkerja = $this->db->query('SELECT (hari - 1) AS hari FROM jadwal_kerja WHERE status > 0');
		$rowgetjadwalkerja = $sqlgetjadwalkerja->result_array();
		
		$sqlgetharilibur = $this->db->query('SELECT IFNULL(COUNT(*),0) AS total FROM jadwal_libur WHERE status > 0 AND tanggal LIKE ?',[$bulan]);
		$rowgetharilibur = $sqlgetharilibur->row_array();
		
		$sqlgettotalijin = $this->db->query('SELECT IFNULL(COUNT(*),0) AS total FROM pegawai_ijin WHERE status = 3 AND DAYOFWEEK(tanggal) IN (SELECT hari FROM jadwal_kerja WHERE status > 0) AND tanggal NOT IN (SELECT tanggal FROM jadwal_libur WHERE status > 0) AND tanggal LIKE ? AND id_pegawai = ?',[$bulan,$id]);
		$rowijin = $sqlgettotalijin->row_array();
		
		$sqltotalmasuk = $this->db->query('SELECT IFNULL(COUNT(*),0) AS total FROM pegawai_absensi WHERE status > 0 AND DAYOFWEEK(tanggal) IN (SELECT hari FROM jadwal_kerja WHERE status > 0) AND tanggal NOT IN (SELECT tanggal FROM jadwal_libur WHERE status > 0) AND tanggal LIKE ? AND id_pegawai = ?',[$bulan,$id]);
		$rowmasuk = $sqltotalmasuk->row_array();
		
		$arrHariOff = array(0,1,2,3,4,5,6);
			
		foreach($rowgetjadwalkerja as $row){
			if (($key = array_search($row['hari'], $arrHariOff)) !== false) {
				unset($arrHariOff[$key]);
			}
		}
		
		$arrWorkingDays = $this->countDays($year, $month, $arrHariOff); // DAPATKAN HARI SESUAI HARI KERJA
		
		$jumlahabsen = count($arrWorkingDays) - $rowgetharilibur['total'] - $rowijin['total'] - $rowmasuk['total'];
		
		return $jumlahabsen;
	}
	
	function get_libur_today(){
		$sqlgetjadwalkerja = $this->db->query('SELECT * FROM jadwal_kerja WHERE status > 0 AND hari = DAYOFWEEK(CURDATE())');
		$rowgetjadwalkerja = $sqlgetjadwalkerja->row_array();
		$jumkerja = $sqlgetjadwalkerja->num_rows();
		
		$sqlgetharilibur = $this->db->query('SELECT keterangan FROM jadwal_libur WHERE status > 0 AND tanggal = CURDATE()');
		$rowgetharilibur = $sqlgetharilibur->row_array();
		$jumlibur = $sqlgetharilibur->num_rows();
		
		$result = array();
		
		$result['iskerja'] = $rowgetjadwalkerja;
		
		$result['islibur'] = $rowgetharilibur;
		
		return $result;
	}
	
	function get_total_poin($year,$month,$id){
		
		$bulan = $year.'-'.$month.'%';
		
		$sql = $this->db->query('SELECT jam_masuk,(SELECT masuk FROM jadwal_kerja WHERE hari = DAYOFWEEK(pegawai_absensi.tanggal)) AS tenggat_masuk FROM pegawai_absensi WHERE status > 0 AND DAYOFWEEK(tanggal) IN (SELECT hari FROM jadwal_kerja WHERE status > 0) AND tanggal NOT IN (SELECT tanggal FROM jadwal_libur WHERE status > 0) AND tanggal LIKE ? AND id_pegawai = ?',[$bulan,$id]);
		$rows = $sql->result_array();
		
		$mintelat = 0;
		
		foreach($rows as $row){
			$mintelat = (strtotime(explode(' ',$row['jam_masuk'])[1]) - strtotime($row['tenggat_masuk'])) / 60;
		}
		
		return floor($mintelat)/5;
	}
	
	function list_absensi_pegawai_all($tgl){
		
		$sql = "SELECT *,
					IFNULL((SELECT id FROM jadwal_kerja WHERE hari = DAYOFWEEK(?) AND status > 0),0) AS cekjadwalkerja,
					IFNULL((SELECT id FROM jadwal_libur WHERE tanggal = ? AND status > 0),0) AS cekharilibur,
					IFNULL((SELECT id FROM pegawai_ijin WHERE tanggal = DAYOFWEEK(?) AND status = 3 AND id_pegawai = pegawai.id),0) AS cekijin,
					IFNULL((SELECT CONCAT(jam_masuk,'|',IFNULL(jam_pulang,''),'|',IFNULL(istirahat_keluar,''),'|',IFNULL(istirahat_masuk,'')) FROM pegawai_absensi WHERE id_pegawai = pegawai.id AND tanggal = ? AND status > 0),'') AS cekabsen 
				FROM pegawai WHERE status > 0 ORDER BY nama_lengkap ASC";
		$query = $this->db->query($sql,[$tgl,$tgl,$tgl,$tgl]);
		$result = $query->result_array();
		
		return $result;
	}
	
	function list_cuti(){
		$sql = "SELECT *,IFNULL((SELECT nama FROM ijin WHERE id = id_ijin AND status > 0),'') AS namaijin FROM pegawai_ijin WHERE id_pegawai = ? AND status > 0";
		$query = $this->db->query($sql,[$_SESSION['backuserid']]);
		$result = $query->result_array();
		
		return $result;
	}
	
	function list_ijin(){
		$sql = "SELECT * FROM ijin WHERE status > 0";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		
		return $result;
	}
	
	function list_ijin_rekap(){
		$sql = "SELECT IFNULL(COUNT(id_ijin),0) AS terpakai,IFNULL((SELECT nama FROM ijin WHERE id = id_ijin),0) AS namaijin,IFNULL((SELECT durasi FROM ijin WHERE id = id_ijin),0) AS durasi FROM pegawai_ijin WHERE id_pegawai = ? AND status = 3 GROUP BY id_ijin";
		$query = $this->db->query($sql,[$_SESSION['backuserid']]);
		$result = $query->result_array();
		
		return $result;
	}
	
	function add_cuti(){
		
		$sql = "SELECT * FROM pegawai_ijin WHERE id_pegawai = ? AND tanggal = ? AND status > 0";
		$query = $this->db->query($sql, [$_SESSION['backuserid'],$this->input->post('tanggalefektif')]);
		$result = $query->num_rows();
		$row = $query->row_array();
		
		$sqlcek = "SELECT IFNULL(COUNT(*),0) AS jumlahijin,IFNULL((SELECT durasi FROM ijin WHERE id = ?),0) AS jumlahdurasi FROM pegawai_ijin WHERE id_pegawai = ? AND id_ijin = ? AND status > 0";
		$querycek = $this->db->query($sqlcek, [$this->input->post('tipe'),$_SESSION['backuserid'],$this->input->post('tipe')]);
		$rowcek = $querycek->row_array();
		
		$dir = $_SERVER['DOCUMENT_ROOT']."/assets/img/bukti/cuti/";
			
		$namafile = '';
		
		if($result > 0){
			if($this->input->post('temp') !== ''){
				
				$sql = "SELECT * FROM pegawai_ijin WHERE id = ? AND status > 0";
				$query = $this->db->query($sql, [$this->input->post('temp')]);
				$row = $query->row_array();
				
				if($row['tanggal'] == $this->input->post('tanggalefektif')){
					
					if(empty($_FILES["uploadbukti"]["name"])){
			
					}else{
						if (($_FILES["uploadbukti"]["type"] == "image/gif") ||
							($_FILES["uploadbukti"]["type"] == "image/jpeg") ||
							($_FILES["uploadbukti"]["type"] == "image/png") ||
							($_FILES["uploadbukti"]["type"] == "image/pjpeg") ||
							($_FILES["uploadbukti"]["type"] == "image/jpg") ||
							($_FILES["uploadbukti"]["type"] == "image/JPG")
							){
							$ext = $this->findexts($_FILES["uploadbukti"]["name"]); 
							$randomNumber = strtoupper(random_string('alnum',20));
							$lokasi = $dir.$randomNumber.".".$ext;
							$this->uploadBerkas($_FILES["uploadbukti"]["tmp_name"],$lokasi);
							$namafile = $randomNumber.'.'.$ext;
						}
					}
					
					if($namafile !== '' && $row['bukti'] !== ''){
						if(file_exists("assets/img/bukti/cuti/".$row['bukti'])){
							unlink("assets/img/bukti/cuti/".$row['bukti']);
						}
					}
					
					if($namafile == ''){
						$sqltambah = "UPDATE pegawai_ijin SET id_ijin = ?, keterangan = ?, tanggal = ?, tanggal_tambah = DEFAULT WHERE id = ? AND id_pegawai = ? AND status BETWEEN 1 AND 2";
						$querytambah = $this->db->query($sqltambah, [$this->input->post('tipe'),$this->input->post('keterangan'),$this->input->post('tanggalefektif'),$this->input->post('temp'),$_SESSION['backuserid']]);
					}else{
						$sqltambah = "UPDATE pegawai_ijin SET id_ijin = ?, keterangan = ?, tanggal = ?, tanggal_tambah = DEFAULT, bukti = ? WHERE id = ? AND id_pegawai = ? AND status BETWEEN 1 AND 2";
						$querytambah = $this->db->query($sqltambah, [$this->input->post('tipe'),$this->input->post('keterangan'),$this->input->post('tanggalefektif'),$namafile,$this->input->post('temp'),$_SESSION['backuserid']]);
					}
					
					return '1';
				}else{
					if($result > 0){
						return '0';
					}else{
						if(empty($_FILES["uploadbukti"]["name"])){
			
						}else{
							if (($_FILES["uploadbukti"]["type"] == "image/gif") ||
								($_FILES["uploadbukti"]["type"] == "image/jpeg") ||
								($_FILES["uploadbukti"]["type"] == "image/png") ||
								($_FILES["uploadbukti"]["type"] == "image/pjpeg") ||
								($_FILES["uploadbukti"]["type"] == "image/jpg") ||
								($_FILES["uploadbukti"]["type"] == "image/JPG")
								){
								$ext = $this->findexts($_FILES["uploadbukti"]["name"]); 
								$randomNumber = strtoupper(random_string('alnum',20));
								$lokasi = $dir.$randomNumber.".".$ext;
								$this->uploadBerkas($_FILES["uploadbukti"]["tmp_name"],$lokasi);
								$namafile = $randomNumber.'.'.$ext;
							}
						}
						
						if($namafile !== '' && $row['bukti'] !== ''){
							if(file_exists("assets/img/bukti/cuti/".$row['bukti'])){
								unlink("assets/img/bukti/cuti/".$row['bukti']);
							}
						}
						
						if($namafile == ''){
							$sqltambah = "UPDATE pegawai_ijin SET id_ijin = ?, keterangan = ?, tanggal = ?, tanggal_tambah = DEFAULT WHERE id = ? AND id_pegawai = ? AND status BETWEEN 1 AND 2";
							$querytambah = $this->db->query($sqltambah, [$this->input->post('tipe'),$this->input->post('keterangan'),$this->input->post('tanggalefektif'),$this->input->post('temp'),$_SESSION['backuserid']]);
						}else{
							$sqltambah = "UPDATE pegawai_ijin SET id_ijin = ?, keterangan = ?, tanggal = ?, tanggal_tambah = DEFAULT, bukti = ? WHERE id = ? AND id_pegawai = ? AND status BETWEEN 1 AND 2";
							$querytambah = $this->db->query($sqltambah, [$this->input->post('tipe'),$this->input->post('keterangan'),$this->input->post('tanggalefektif'),$namafile,$this->input->post('temp'),$_SESSION['backuserid']]);
						}
						
						return '1';
					}
				}
			}else{
				return '0';		
			}
		}elseif($rowcek['jumlahijin'] > $rowcek['jumlahdurasi']){
			return '-1';
		}else{
			
			if(empty($_FILES["uploadbukti"]["name"])){
			
			}else{
				if (($_FILES["uploadbukti"]["type"] == "image/gif") ||
					($_FILES["uploadbukti"]["type"] == "image/jpeg") ||
					($_FILES["uploadbukti"]["type"] == "image/png") ||
					($_FILES["uploadbukti"]["type"] == "image/pjpeg") ||
					($_FILES["uploadbukti"]["type"] == "image/jpg") ||
					($_FILES["uploadbukti"]["type"] == "image/JPG")
					){
					$ext = $this->findexts($_FILES["uploadbukti"]["name"]); 
					$randomNumber = strtoupper(random_string('alnum',20));
					$lokasi = $dir.$randomNumber.".".$ext;
					$this->uploadBerkas($_FILES["uploadbukti"]["tmp_name"],$lokasi);
					$namafile = $randomNumber.'.'.$ext;
				}
			}
			
			if($row){
				if($row['bukti']){
					if(file_exists("assets/img/bukti/cuti/".$row['bukti'])){
						unlink("assets/img/bukti/cuti/".$row['bukti']);
					}
				}
			}
			
			if($this->input->post('temp') !== ''){
				if($namafile == ''){
					$sqltambah = "UPDATE pegawai_ijin SET id_ijin = ?, keterangan = ?, tanggal = ?, tanggal_tambah = DEFAULT WHERE id = ? AND id_pegawai = ? AND status BETWEEN 1 AND 2";
					$querytambah = $this->db->query($sqltambah, [$this->input->post('tipe'),$this->input->post('keterangan'),$this->input->post('tanggalefektif'),$this->input->post('temp'),$_SESSION['backuserid']]);
				}else{
					$sqltambah = "UPDATE pegawai_ijin SET id_ijin = ?, keterangan = ?, tanggal = ?, tanggal_tambah = DEFAULT, bukti = ? WHERE id = ? AND id_pegawai = ? AND status BETWEEN 1 AND 2";
					$querytambah = $this->db->query($sqltambah, [$this->input->post('tipe'),$this->input->post('keterangan'),$this->input->post('tanggalefektif'),$namafile,$this->input->post('temp'),$_SESSION['backuserid']]);
				}
			}else{
				$sqltambah = "INSERT INTO pegawai_ijin VALUES(DEFAULT,?,?,?,?,DEFAULT,?,1)";
				$querytambah = $this->db->query($sqltambah, [$_SESSION['backuserid'],$this->input->post('tipe'),$this->input->post('keterangan'),$this->input->post('tanggalefektif'),$namafile]);
				
				#update notifikasi
				$this->add_notifikasi('Pengajuan ijin!','Terdapat pengajuan ijin pada tanggal '.$this->input->post('tanggalefektif').' atas nama '.$_SESSION["backfullname"].'.','ADMIN',0);
			}
			
			return '1';
		}
	}
	
	function countDays($year, $month, $ignore) {
		$count = 0;
		$counter = mktime(0, 0, 0, $month, 1, $year);
		$days = array();
		
		$bulantahun = $year.'-'.$month.'%';
		
		while (date("n", $counter) == $month) {
			if (in_array(date("w", $counter), $ignore) == false) {
				$days[] = date('Y-m-d', $counter);
			}
			$counter = strtotime("+1 day", $counter);
		}
		return $days;
	}
	
	function list_cuti_pegawai_all(){
		$sql = "SELECT *,(SELECT nama_lengkap FROM pegawai WHERE id = id_pegawai) AS namapegawai, (SELECT nama FROM ijin WHERE id = id_ijin) AS namaijin FROM pegawai_ijin WHERE status > 0";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		
		return $result;
	}
	
	function update_ijin_cuti(){
		
		if($_SESSION['backjabatan'] == 'ADMIN'){
			$id = $this->input->post('id');
			$value = $this->input->post('val');
			$sql = "UPDATE pegawai_ijin SET status = ? WHERE id = ? AND status > 0";
			$query = $this->db->query($sql,[$value,$id]);
			
			$querycek = $this->db->query("SELECT * FROM pegawai_ijin WHERE id = ?",[$id]);
			$rowcek = $querycek->row_array();
			#update notifikasi
			$this->add_notifikasi('Pengajuan ijin diubah status!','Pengajuan ijin anda pada tanggal '.$rowcek["tanggal"].' telah diubah oleh admin.','KARYAWAN',$rowcek['id_pegawai']);
		}
	}
	
	//FUNGSI UNTUK MENCARI EXTENSI SEBUAH FILE
	function findexts ($filename) 
	{ 
		 $filename = strtolower($filename) ; 
		 $exts = explode(".", $filename) ; 
		 $n = count($exts)-1; 
		 $exts = $exts[$n]; 
		 return $exts; 
	}
	
	//FUNGSI UNTUK MENG-COPY BERKAS DARI KLIEN KE SERVER
	function uploadBerkas($file, $namabaru){
		// pindahkan file
		if($_SESSION['backaktif']){
			$terupload = move_uploaded_file($file, $namabaru);
		}
	}
	
	function get_cuti(){
		
		$id = $this->input->post('id');
		$sql = "SELECT * FROM pegawai_ijin WHERE id = ? AND id_pegawai = ? AND status BETWEEN 1 AND 2 LIMIT 1";
		$query = $this->db->query($sql,[$id,$_SESSION['backuserid']]);
		$result = $query->row_array();
		
		return $result;
	}
	
	function get_tipe_cuti(){
		
		$id = $this->input->post('id');
		$sql = "SELECT * FROM ijin WHERE id = ? AND status > 0 LIMIT 1";
		$query = $this->db->query($sql,[$id]);
		$result = $query->row_array();
		
		return $result;
	}
	
	function del_tipe_cuti(){
		
		$id = $this->input->post('id');
		$sql = "UPDATE ijin SET status = 0 WHERE id = ? AND status > 0";
		$query = $this->db->query($sql,[$id]);
		
	}
	
	function del_cuti(){
		
		$id = $this->input->post('id');
		$sql = "UPDATE pegawai_ijin SET status = 0 WHERE id = ? AND id_pegawai = ? AND status > 0";
		$query = $this->db->query($sql,[$id,$_SESSION['backuserid']]);
		
	}
	
	function add_tipe_cuti(){
		
		if($this->input->post('temptipe') !== ''){
			$sqltambah = "UPDATE ijin SET nama = ?, durasi = ?, tipe = ? WHERE id = ? AND status > 0";
			$querytambah = $this->db->query($sqltambah, [$this->input->post('nama'),$this->input->post('durasi'),$this->input->post('tipecuti'),$this->input->post('temptipe')]);
		}else{
			$sqltambah = "INSERT INTO ijin VALUES(DEFAULT,?,?,?,1)";
			$querytambah = $this->db->query($sqltambah, [$this->input->post('nama'),$this->input->post('durasi'),$this->input->post('tipecuti')]);
		}
		
	}
	
	function list_lembur(){
		$sql = "SELECT * FROM pegawai_overtime WHERE id_pegawai = ? AND status > 0";
		$query = $this->db->query($sql,[$_SESSION['backuserid']]);
		$result = $query->result_array();
		
		return $result;
	}
	
	function add_lembur(){
		
		$sql = "SELECT * FROM pegawai_overtime WHERE id_pegawai = ? AND tanggal = ? AND status > 0";
		$query = $this->db->query($sql, [$_SESSION['backuserid'],$this->input->post('tanggalefektif')]);
		$result = $query->num_rows();
		$row = $query->row_array();
		
		$dir = $_SERVER['DOCUMENT_ROOT']."/assets/img/bukti/lembur/";
			
		$namafile = '';
		
		if($result > 0){
			if($this->input->post('temp') !== ''){
				$sql = "SELECT * FROM pegawai_overtime WHERE id = ? AND status > 0";
				$query = $this->db->query($sql, [$this->input->post('temp')]);
				$row = $query->row_array();
				
				if($row['tanggal'] == $this->input->post('tanggalefektif')){
					
					if(empty($_FILES["uploadbukti"]["name"])){
			
					}else{
						if (($_FILES["uploadbukti"]["type"] == "image/gif") ||
							($_FILES["uploadbukti"]["type"] == "image/jpeg") ||
							($_FILES["uploadbukti"]["type"] == "image/png") ||
							($_FILES["uploadbukti"]["type"] == "image/pjpeg") ||
							($_FILES["uploadbukti"]["type"] == "image/jpg") ||
							($_FILES["uploadbukti"]["type"] == "image/JPG")
							){
							$ext = $this->findexts($_FILES["uploadbukti"]["name"]); 
							$randomNumber = strtoupper(random_string('alnum',20));
							$lokasi = $dir.$randomNumber.".".$ext;
							$this->uploadBerkas($_FILES["uploadbukti"]["tmp_name"],$lokasi);
							$namafile = $randomNumber.'.'.$ext;
						}
					}
					
					if($namafile !== '' && $row['bukti'] !== ''){
						if(file_exists("assets/img/bukti/lembur/".$row['bukti'])){
							unlink("assets/img/bukti/lembur/".$row['bukti']);
						}
					}
					
					if($namafile == ''){
						$sqltambah = "UPDATE pegawai_overtime SET alasan = ?, tanggal = ?, nilai = ? WHERE id = ? AND id_pegawai = ? AND status BETWEEN 1 AND 2";
						$querytambah = $this->db->query($sqltambah, [$this->input->post('alasan'),$this->input->post('tanggalefektif'),$this->input->post('menit'),$this->input->post('temp'),$_SESSION['backuserid']]);
					}else{
						$sqltambah = "UPDATE pegawai_overtime SET alasan = ?, tanggal = ?, nilai = ?, bukti = ? WHERE id = ? AND id_pegawai = ? AND status BETWEEN 1 AND 2";
						$querytambah = $this->db->query($sqltambah, [$this->input->post('alasan'),$this->input->post('tanggalefektif'),$this->input->post('menit'),$namafile,$this->input->post('temp'),$_SESSION['backuserid']]);
					}
					
					return '1';
				}else{
					if($result > 0){
						return '0';
					}else{
						if(empty($_FILES["uploadbukti"]["name"])){
			
						}else{
							if (($_FILES["uploadbukti"]["type"] == "image/gif") ||
								($_FILES["uploadbukti"]["type"] == "image/jpeg") ||
								($_FILES["uploadbukti"]["type"] == "image/png") ||
								($_FILES["uploadbukti"]["type"] == "image/pjpeg") ||
								($_FILES["uploadbukti"]["type"] == "image/jpg") ||
								($_FILES["uploadbukti"]["type"] == "image/JPG")
								){
								$ext = $this->findexts($_FILES["uploadbukti"]["name"]); 
								$randomNumber = strtoupper(random_string('alnum',20));
								$lokasi = $dir.$randomNumber.".".$ext;
								$this->uploadBerkas($_FILES["uploadbukti"]["tmp_name"],$lokasi);
								$namafile = $randomNumber.'.'.$ext;
							}
						}
						
						if($namafile !== '' && $row['bukti'] !== ''){
							if(file_exists("assets/img/bukti/lembur/".$row['bukti'])){
								unlink("assets/img/bukti/lembur/".$row['bukti']);
							}
						}
						
						if($namafile == ''){
							$sqltambah = "UPDATE pegawai_overtime SET alasan = ?, tanggal = ?, nilai = ? WHERE id = ? AND id_pegawai = ? AND status BETWEEN 1 AND 2";
							$querytambah = $this->db->query($sqltambah, [$this->input->post('alasan'),$this->input->post('tanggalefektif'),$this->input->post('menit'),$this->input->post('temp'),$_SESSION['backuserid']]);
						}else{
							$sqltambah = "UPDATE pegawai_overtime SET alasan = ?, tanggal = ?, nilai = ?, bukti = ? WHERE id = ? AND id_pegawai = ? AND status BETWEEN 1 AND 2";
							$querytambah = $this->db->query($sqltambah, [$this->input->post('alasan'),$this->input->post('tanggalefektif'),$this->input->post('menit'),$namafile,$this->input->post('temp'),$_SESSION['backuserid']]);
						}
						
						return '1';
					}
				}
			}else{
				return '0';		
			}
		}else{
			if(empty($_FILES["uploadbukti"]["name"])){
			
			}else{
				if (($_FILES["uploadbukti"]["type"] == "image/gif") ||
					($_FILES["uploadbukti"]["type"] == "image/jpeg") ||
					($_FILES["uploadbukti"]["type"] == "image/png") ||
					($_FILES["uploadbukti"]["type"] == "image/pjpeg") ||
					($_FILES["uploadbukti"]["type"] == "image/jpg") ||
					($_FILES["uploadbukti"]["type"] == "image/JPG")
					){
					$ext = $this->findexts($_FILES["uploadbukti"]["name"]); 
					$randomNumber = strtoupper(random_string('alnum',20));
					$lokasi = $dir.$randomNumber.".".$ext;
					$this->uploadBerkas($_FILES["uploadbukti"]["tmp_name"],$lokasi);
					$namafile = $randomNumber.'.'.$ext;
				}
			}
			
			
			
			if($row){
				if($row['bukti']){
					if(file_exists("assets/img/bukti/lembur/".$row['bukti'])){
						unlink("assets/img/bukti/lembur/".$row['bukti']);
					}
				}
			}
			
			if($this->input->post('temp') !== ''){
				if($namafile == ''){
					$sqltambah = "UPDATE pegawai_overtime SET alasan = ?, tanggal = ?, nilai = ? WHERE id = ? AND id_pegawai = ? AND status BETWEEN 1 AND 2";
					$querytambah = $this->db->query($sqltambah, [$this->input->post('alasan'),$this->input->post('tanggalefektif'),$this->input->post('menit'),$this->input->post('temp'),$_SESSION['backuserid']]);
				}else{
					$sqltambah = "UPDATE pegawai_overtime SET alasan = ?, tanggal = ?, nilai = ?, bukti = ? WHERE id = ? AND id_pegawai = ? AND status BETWEEN 1 AND 2";
					$querytambah = $this->db->query($sqltambah, [$this->input->post('alasan'),$this->input->post('tanggalefektif'),$this->input->post('menit'),$namafile,$this->input->post('temp'),$_SESSION['backuserid']]);
				}
			}else{
				$sqltambah = "INSERT INTO pegawai_overtime VALUES(DEFAULT,?,?,?,?,?,1)";
				$querytambah = $this->db->query($sqltambah, [$_SESSION['backuserid'],$this->input->post('tanggalefektif'),$this->input->post('menit'),$this->input->post('alasan'),$namafile]);
				
				#update notifikasi
				$this->add_notifikasi('Pengajuan lembur!','Terdapat pengajuan lembur pada tanggal '.$this->input->post('tanggalefektif').' atas nama '.$_SESSION["backfullname"].'.','ADMIN',0);
			}
			
			return '1';
		}
	}
	
	function get_lembur(){
		
		$id = $this->input->post('id');
		$sql = "SELECT * FROM pegawai_overtime WHERE id = ? AND id_pegawai = ? AND status > 0 LIMIT 1";
		$query = $this->db->query($sql,[$id,$_SESSION['backuserid']]);
		$result = $query->row_array();
		
		return $result;
	}
	
	function del_lembur(){
		
		$id = $this->input->post('id');
		$sql = "UPDATE pegawai_overtime SET status = 0 WHERE id = ? AND id_pegawai = ? AND status > 0";
		$query = $this->db->query($sql,[$id,$_SESSION['backuserid']]);
		
	}
	
	function list_lembur_rekap(){
		$sql = 'SELECT MONTH(tanggal) AS bulan,YEAR(tanggal) AS tahun,TIME_FORMAT(SEC_TO_TIME(SUM(TIME_TO_SEC(nilai))),"%H:%i") AS total FROM pegawai_overtime WHERE id_pegawai = ? AND status > 0 GROUP BY MONTH(tanggal) ORDER BY tanggal DESC';
		$query = $this->db->query($sql,[$_SESSION['backuserid']]);
		$result = $query->result_array();
		
		return $result;
	}
	
	function list_lembur_pegawai_all(){
		$sql = "SELECT *,(SELECT nama_lengkap FROM pegawai WHERE id = id_pegawai) AS namapegawai FROM pegawai_overtime WHERE status > 0";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		
		return $result;
	}
	
	function update_ijin_lembur(){
		
		if($_SESSION['backjabatan'] == 'ADMIN'){
			$id = $this->input->post('id');
			$value = $this->input->post('val');
			$sql = "UPDATE pegawai_overtime SET status = ? WHERE id = ? AND status > 0";
			$query = $this->db->query($sql,[$value,$id]);
			
			$querycek = $this->db->query("SELECT * FROM pegawai_overtime WHERE id = ?",[$id]);
			$rowcek = $querycek->row_array();
			#update notifikasi
			$this->add_notifikasi('Pengajuan lembur diubah status!','Pengajuan lembur anda pada tanggal '.$rowcek["tanggal"].' telah diubah oleh admin.','KARYAWAN',$rowcek['id_pegawai']);
		}
	}
	
	function list_file(){
		$sql = "SELECT *,(SELECT nama_lengkap FROM pegawai WHERE id = id_pegawai) AS namapegawai FROM pegawai_file WHERE status > 0";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		
		return $result;
	}
	
	function add_file(){
		
		$dir = $_SERVER['DOCUMENT_ROOT']."/assets/upload/file/";
		
		$namafile = '';
		
		$filesize = filesize($_FILES["uploadbukti"]["tmp_name"]);
		
		
		if($filesize <= 10485760){
			
			if(empty($_FILES["uploadbukti"]["name"])){
				
			}else{
				
				if ($_FILES["uploadbukti"]["type"] == "application/pdf"){
					$ext = $this->findexts($_FILES["uploadbukti"]["name"]); 
					$randomNumber = strtoupper(random_string('alnum',20));
					$lokasi = $dir.$randomNumber.".".$ext;
					$this->uploadBerkas($_FILES["uploadbukti"]["tmp_name"],$lokasi);
					$namafile = $randomNumber.'.'.$ext;
				}
				
			}
		
			if($this->input->post('temp') !== ''){
				
				$sql = "SELECT * FROM pegawai_file WHERE id_pegawai = ? AND id = ? AND status > 0";
				$query = $this->db->query($sql, [$_SESSION['backuserid'],$this->input->post('temp')]);
				$result = $query->num_rows();
				$row = $query->row_array();
				
				if($namafile !== '' && $row['nama_file'] !== ''){
					if(file_exists("assets/upload/file/".$row['nama_file'])){
						unlink("assets/upload/file/".$row['nama_file']);
					}
				}
				
				if($namafile == ''){
					$sqltambah = "UPDATE pegawai_file SET tanggal_upload = DEFAULT, judul = ?, keterangan = ?, hak_akses = ? WHERE id = ? AND id_pegawai = ? AND status BETWEEN 1 AND 2";
					$querytambah = $this->db->query($sqltambah, [$this->input->post('judul'),$this->input->post('keterangan'),$this->input->post('opsiakses'),$this->input->post('temp'),$_SESSION['backuserid']]);
				}else{
					$sqltambah = "UPDATE pegawai_file SET tanggal_upload = DEFAULT, judul = ?, keterangan = ?, hak_akses = ?, nama_file = ? WHERE id = ? AND id_pegawai = ? AND status BETWEEN 1 AND 2";
					$querytambah = $this->db->query($sqltambah, [$this->input->post('judul'),$this->input->post('keterangan'),$this->input->post('opsiakses'),$namafile,$this->input->post('temp'),$_SESSION['backuserid']]);
				}
				
			}else{
				$sqltambah = "INSERT INTO pegawai_file VALUES(DEFAULT,?,DEFAULT,?,?,?,?,1)";
				$querytambah = $this->db->query($sqltambah, [$_SESSION['backuserid'],$this->input->post('judul'),$this->input->post('keterangan'),$namafile,$this->input->post('opsiakses')]);
				
				#update notifikasi
				$this->add_notifikasi('Pengajuan file upload!','Terdapat pengajuan file upload dengan judul '.$this->input->post('judul').' atas nama '.$_SESSION["backfullname"].'.','ADMIN',0);
			}
			
			return 1;
			
		}else{
			
			return 0;
			
		}
	}
	
	function get_file(){
		
		$id = $this->input->post('id');
		$sql = "SELECT * FROM pegawai_file WHERE id = ? AND id_pegawai = ? AND status > 0 LIMIT 1";
		$query = $this->db->query($sql,[$id,$_SESSION['backuserid']]);
		$result = $query->row_array();
		
		return $result;
	}
	
	function del_file(){
		
		$id = $this->input->post('id');
		$sql = "UPDATE pegawai_file SET status = 0 WHERE id = ? AND id_pegawai = ? AND status > 0";
		$query = $this->db->query($sql,[$id,$_SESSION['backuserid']]);
		
	}
	
	function list_file_pegawai_all(){
		$sql = "SELECT *,(SELECT nama_lengkap FROM pegawai WHERE id = id_pegawai) AS namapegawai FROM pegawai_file WHERE status > 0";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		
		return $result;
	}
	
	function update_ijin_file(){
		
		if($_SESSION['backjabatan'] == 'ADMIN'){
			$id = $this->input->post('id');
			$value = $this->input->post('val');
			$sql = "UPDATE pegawai_file SET status = ? WHERE id = ? AND status > 0";
			$query = $this->db->query($sql,[$value,$id]);
			
			$querycek = $this->db->query("SELECT * FROM pegawai_file WHERE id = ?",[$id]);
			$rowcek = $querycek->row_array();
			#update notifikasi
			$this->add_notifikasi('Pengajuan upload file diubah status!','Pengajuan upload file anda dengan judul '.$rowcek["judul"].' telah diubah oleh admin.','KARYAWAN',$rowcek['id_pegawai']);
		}
	}
	
	function list_aset(){
		$sql = "SELECT *,(SELECT nama FROM aset WHERE id = id_aset) AS namaaset,IFNULL((SELECT (SELECT nama FROM aset_kategori WHERE id = aset.id_aset_kategori) FROM aset WHERE aset.id = id_aset),'') AS namatipe FROM pegawai_aset WHERE id_pegawai = ? AND status > 0";
		$query = $this->db->query($sql,[$_SESSION['backuserid']]);
		$result = $query->result_array();
		
		return $result;
	}
	
	function all_aset(){
		$sql = "SELECT id, serial_number, keterangan, nama AS namaaset, (SELECT nama FROM aset_kategori WHERE id = aset.id_aset_kategori) AS namatipe, status FROM aset WHERE status > 0";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		
		return $result;
	}
	
	function all_kategori_aset(){
		$sql = "SELECT * FROM aset_kategori WHERE status > 0";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		
		return $result;
	}
	
	function add_pengajuan_aset(){
		
		if($this->input->post('temp') !== ''){
			
			$sqltambah = "UPDATE pegawai_aset SET id_aset = ?, tanggal_pinjam = DEFAULT WHERE id = ? AND id_pegawai = ? AND status BETWEEN 1 AND 2";
			$querytambah = $this->db->query($sqltambah, [$this->input->post('aset'),$this->input->post('temp'),$_SESSION['backuserid']]);
				
		}else{
			$sqltambah = "INSERT INTO pegawai_aset VALUES(DEFAULT,?,?,DEFAULT,DEFAULT,1)";
			$querytambah = $this->db->query($sqltambah, [$_SESSION['backuserid'],$this->input->post('aset')]);
			
			#update notifikasi
			$this->add_notifikasi('Pengajuan peminjaman aset!','Terdapat pengajuan peminjaman aset baru atas nama '.$_SESSION["backfullname"].'.','ADMIN',0);
		}
		
		return '1';
	}
	
	function get_pengajuan_aset(){
		
		$id = $this->input->post('id');
		$sql = "SELECT * FROM pegawai_aset WHERE id = ? AND id_pegawai = ? AND status > 0 LIMIT 1";
		$query = $this->db->query($sql,[$id,$_SESSION['backuserid']]);
		$result = $query->row_array();
		
		return $result;
	}
	
	function del_pengajuan_aset(){
		
		$id = $this->input->post('id');
		$sql = "UPDATE pegawai_aset SET status = 0 WHERE id = ? AND id_pegawai = ? AND status > 0";
		$query = $this->db->query($sql,[$id,$_SESSION['backuserid']]);
		
	}
	
	function add_aset(){
		
		if($this->input->post('tempaset') !== ''){
			
			$sqltambah = "UPDATE aset SET id_aset_kategori = ?, serial_number = ?, nama = ?, keterangan = ? WHERE id = ? AND status > 0";
			$querytambah = $this->db->query($sqltambah, [$this->input->post('kategoriaset'),$this->input->post('serialaset'),$this->input->post('namaaset'),$this->input->post('keteranganaset'),$this->input->post('tempaset')]);
				
		}else{
			$sqltambah = "INSERT INTO aset VALUES(DEFAULT,?,?,?,?,1)";
			$querytambah = $this->db->query($sqltambah, [$this->input->post('kategoriaset'),$this->input->post('serialaset'),$this->input->post('namaaset'),$this->input->post('keteranganaset')]);
		}
		
		return '1';
	}
	
	function get_aset(){
		
		$id = $this->input->post('id');
		$sql = "SELECT * FROM aset WHERE id = ? AND status > 0 LIMIT 1";
		$query = $this->db->query($sql,[$id]);
		$result = $query->row_array();
		
		return $result;
	}
	
	function del_aset(){
		
		$id = $this->input->post('id');
		$sql = "UPDATE aset SET status = 0 WHERE id = ? AND status > 0";
		$query = $this->db->query($sql,[$id]);
		
	}
	
	function add_kategori_aset(){
		
		if($this->input->post('tempkategori') !== ''){
			
			$sqltambah = "UPDATE aset_kategori SET nama = ? WHERE id = ? AND status > 0";
			$querytambah = $this->db->query($sqltambah, [$this->input->post('namakategori'),$this->input->post('tempkategori')]);
				
		}else{
			$sqltambah = "INSERT INTO aset_kategori VALUES(DEFAULT,?,1)";
			$querytambah = $this->db->query($sqltambah, [$this->input->post('namakategori')]);
		}
		
		return '1';
	}
	
	function get_kategori_aset(){
		
		$id = $this->input->post('id');
		$sql = "SELECT * FROM aset_kategori WHERE id = ? AND status > 0 LIMIT 1";
		$query = $this->db->query($sql,[$id]);
		$result = $query->row_array();
		
		return $result;
	}
	
	function del_kategori_aset(){
		
		$id = $this->input->post('id');
		$sql = "UPDATE aset_kategori SET status = 0 WHERE id = ? AND status > 0";
		$query = $this->db->query($sql,[$id]);
		
	}
	
	function list_aset_pegawai_all(){
		$sql = "SELECT *,(SELECT nama FROM aset WHERE id = id_aset) AS namaaset,IFNULL((SELECT (SELECT nama FROM aset_kategori WHERE id = aset.id_aset_kategori) FROM aset WHERE aset.id = id_aset),'') AS namatipe,(SELECT nama_lengkap FROM pegawai WHERE id = id_pegawai) AS namapegawai FROM pegawai_aset WHERE status > 0";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		
		return $result;
	}
	
	function update_ijin_aset(){
		
		if($_SESSION['backjabatan'] == 'ADMIN'){
			$id = $this->input->post('id');
			$value = $this->input->post('val');
			$sql = "UPDATE pegawai_aset SET status = ? WHERE id = ? AND status > 0";
			$query = $this->db->query($sql,[$value,$id]);
			
			$querycek = $this->db->query("SELECT * FROM pegawai_aset WHERE id = ?",[$id]);
			$rowcek = $querycek->row_array();
			#update notifikasi
			$this->add_notifikasi('Pengajuan peminjaman aset diubah status!','Pengajuan peminjaman aset anda pada tanggal '.$rowcek["tanggal_pinjam"].' telah diubah oleh admin.','KARYAWAN',$rowcek['id_pegawai']);
		}
	}
	
	function kembali_aset(){
		
		if($_SESSION['backjabatan'] == 'ADMIN'){
			$id = $this->input->post('id');
			$sql = "UPDATE pegawai_aset SET tanggal_kembali = NOW() WHERE id = ? AND status > 0";
			$query = $this->db->query($sql,[$id]);
		}
	}
	
	function list_komponen_upah(){
		$sql = "SELECT * FROM komponen_upah WHERE status > 0";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		
		return $result;
	}
	
	function get_gaji_pegawai($idpegawai,$tahun){
		$tahunke = $tahun.'%';
		
		$sql = "SELECT IFNULL(SUM(total_diterima),0) AS total FROM histori_upah_pegawai WHERE id_pegawai = ? AND bulantahun LIKE ? AND status > 0";
		$query = $this->db->query($sql,[$idpegawai,$tahunke]);
		$result = $query->row_array();
		
		return $result['total'];
	}
	
	function add_komponen_upah(){
		
		if($this->input->post('temp') !== ''){
			
			$sqltambah = "UPDATE komponen_upah SET nama = ?, tipe = ?, termasuk_pajak = ? WHERE id = ? AND status > 0";
			$querytambah = $this->db->query($sqltambah, [$this->input->post('nama'),$this->input->post('tipe'),$this->input->post('pajak'),$this->input->post('temp')]);
				
		}else{
			$sqltambah = "INSERT INTO komponen_upah VALUES(DEFAULT,?,?,?,1)";
			$querytambah = $this->db->query($sqltambah, [$this->input->post('nama'),$this->input->post('tipe'),$this->input->post('pajak')]);
		}
		
		return '1';
	}
	
	function get_komponen_pegawai($id){
		$sql = "
					SELECT 
						pku.id,
						pku.id_pegawai,
						pku.id_komponen_upah,
						pku.nominal,
						pku.status,
						ku.nama,
						ku.tipe,
						ku.termasuk_pajak
					FROM 
						pegawai_komponen_upah pku,
						komponen_upah ku
					WHERE 
						pku.id_pegawai = ? AND pku.status > 0 AND pku.id_komponen_upah = ku.id";
		$query = $this->db->query($sql,[$id]);
		$result = $query->result_array();
		
		return $result;
	}
	
	function get_komponen_upah(){
		
		$id = $this->input->post('id');
		$sql = "SELECT * FROM komponen_upah WHERE id = ? AND status > 0 LIMIT 1";
		$query = $this->db->query($sql,[$id]);
		$result = $query->row_array();
		
		return $result;
	}
	
	function get_info_thr_pegawai(){
		
		$sqlkomponenpegawai = "SELECT *,(SELECT nama FROM komponen_upah WHERE id = id_komponen_upah) AS namakomponen FROM pegawai_komponen_upah WHERE id_pegawai = ? AND status > 0";
		$querykomponenpegawai = $this->db->query($sqlkomponenpegawai,[$_SESSION['backuserid']]);
		$rowkomponenpegawai = $querykomponenpegawai->result_array();
		
		$sqlkomponenthr = "SELECT * FROM komponen_thr WHERE status > 0";
		$querykomponenthr = $this->db->query($sqlkomponenthr);
		$rowkomponenthr = $querykomponenthr->result_array();
		
		$arrkomponen = array();
		
		foreach($rowkomponenthr as $rowthr){
			foreach($rowkomponenpegawai as $rowkomponen){
				if($rowthr['id_komponen_upah'] == $rowkomponen['id_komponen_upah']){
					$arrkomponen[] = ['namakomponen' => $rowkomponen['namakomponen'], 'nominal' => $rowkomponen['nominal']];
				}
			}
		}
		
		$sqldaftarthr = "SELECT * FROM histori_thr_pegawai WHERE id_pegawai = ? AND status > 0";
		$querydaftarthr = $this->db->query($sqldaftarthr,[$_SESSION['backuserid']]);
		$rowdaftarthr = $querydaftarthr->result_array();
		
		$result['komponenthr'] = $arrkomponen;
		$result['daftarthr'] = $rowdaftarthr;
		
		return $result;
	}
	
	function del_komponen_upah(){
		
		$id = $this->input->post('id');
		$sql = "UPDATE komponen_upah SET status = 0 WHERE id = ? AND status > 0";
		$query = $this->db->query($sql,[$id]);
		
	}
	
	function add_komponen_pegawai(){
		
		$arrkomponen = $this->input->post('arrkomponen');
		$arrnominal = $this->input->post('arrnominal');
		$pegawai = $this->input->post('pegawai');
		$arrcombine = implode(',',$arrkomponen);
		
		$sqldel = 'DELETE FROM pegawai_komponen_upah WHERE id_komponen_upah NOT IN ('.$arrcombine.') AND id_pegawai = ? AND status > 0';
		$querydel = $this->db->query($sqldel,[$pegawai]);
		
		for($i=0;$i<count($arrkomponen);$i++){
			$sql = "SELECT * FROM pegawai_komponen_upah WHERE id_pegawai = ? AND id_komponen_upah = ? AND status > 0";
			$query = $this->db->query($sql, [$pegawai,$arrkomponen[$i]]);
			$jum = $query->num_rows();
			
			if($jum > 0){
				$sqltambah = "UPDATE pegawai_komponen_upah SET nominal = ? WHERE id_pegawai = ? AND id_komponen_upah = ? AND status > 0";
				$querytambah = $this->db->query($sqltambah, [str_replace('.','',$arrnominal[$i]),$pegawai,$arrkomponen[$i]]);
			}else{
				$sqltambah = "INSERT INTO pegawai_komponen_upah VALUES(DEFAULT,?,?,?,1)";
				$querytambah = $this->db->query($sqltambah, [$pegawai,$arrkomponen[$i],str_replace('.','',$arrnominal[$i])]);
			}
		}
		
		return 1;
	}
	
	function get_pengaturan_gaji($id){
		
		$sql = "SELECT * FROM pegawai_upah WHERE id_pegawai = ? AND status > 0 LIMIT 1";
		$query = $this->db->query($sql,[$id]);
		$result = $query->row_array();
		
		return $result;
	}
	
	function add_pengaturan_gaji(){
		
		$sql = "SELECT * FROM pegawai_upah WHERE id_pegawai = ? AND status > 0";
		$query = $this->db->query($sql, [$_SESSION['backuserid']]);
		$jum = $query->num_rows();
		
		if($jum > 0){
			$sqltambah = "UPDATE pegawai_upah SET ispkp = ?, tipe_ptkp = ?, tipe_perhitungan = ?, tipe_waktu_gaji = ?, rekening_no = ?, rekening_bank = ?, rekening_atas_nama = ?, tanggal_update = DEFAULT WHERE id_pegawai = ? AND status > 0";
			$querytambah = $this->db->query($sqltambah, [$this->input->post('wajibpajak'),$this->input->post('ptkp'),$this->input->post('perhitungan'),$this->input->post('waktugaji'),$this->input->post('norek'),$this->input->post('namabank'),$this->input->post('pemilik'),$_SESSION['backuserid']]);
		}else{
			$sqltambah = "INSERT INTO pegawai_upah VALUES(DEFAULT,?,?,?,?,?,?,?,?,DEFAULT,1)";
			$querytambah = $this->db->query($sqltambah, [$_SESSION['backuserid'],$this->input->post('wajibpajak'),$this->input->post('ptkp'),$this->input->post('perhitungan'),$this->input->post('waktugaji'),$this->input->post('norek'),$this->input->post('namabank'),$this->input->post('pemilik')]);
		}
		
		return '1';
	}
	
	function update_pengaturan_gaji(){
		
		$sqltambah = "UPDATE pegawai_upah SET ispkp = ?, tipe_ptkp = ?, tipe_perhitungan = ?, tipe_waktu_gaji = ?, rekening_no = ?, rekening_bank = ?, rekening_atas_nama = ?, tanggal_update = DEFAULT WHERE id = ? AND status > 0";
		$querytambah = $this->db->query($sqltambah, [$this->input->post('wajibpajak'),$this->input->post('ptkp'),$this->input->post('perhitungan'),$this->input->post('waktugaji'),$this->input->post('norek'),$this->input->post('namabank'),$this->input->post('pemilik'),$this->input->post('temppajak')]);
		
		return '1';
	}
	
	function get_my_pinjaman($id){
		$sql = "SELECT *,IFNULL((SELECT SUM(nominal) FROM pembayaran_pinjaman WHERE id_pegawai_pinjaman = pegawai_pinjaman.id AND status > 0),0) AS terbayar FROM pegawai_pinjaman WHERE id_pegawai = ? AND status = 3";
		$query = $this->db->query($sql,[$id]);
		$result = $query->result_array();
		
		return $result;
	}
	
	function update_pembayaran_pinjaman($idpinjaman,$nominal,$bukti){
		$sql = "SELECT tenor,IFNULL((SELECT COUNT(*) FROM pembayaran_pinjaman WHERE id_pegawai_pinjaman = ?),0) AS jumbayar FROM pegawai_pinjaman WHERE ID = ? AND status = 3";
		$query = $this->db->query($sql,[$idpinjaman,$idpinjaman]);
		$row = $query->row_array();
		
		if($row['tenor'] == $row['jumbayar']){
			//do nothing
		}else{
			$sqlinsert = "INSERT INTO pembayaran_pinjaman VALUES(DEFAULT,?,?,DEFAULT,?,1)";
			$queryinsert = $this->db->query($sqlinsert,[$idpinjaman,$nominal,$bukti]);
			
			$querycek = $this->db->query("SELECT * FROM pegawai_pinjaman WHERE id = ?",[$idpinjaman]);
			$rowcek = $querycek->row_array();
			#update notifikasi
			$this->add_notifikasi('Pembayaran peminjaman berhasil ditambahkan!','Pembayaran pinjaman dengan nomor transaksi '.$rowcek["no_transaksi"].' dan dibayarkan dengan nominal Rp '.number_format($nominal,0,',','.').' berhasil disimpan.','KARYAWAN',$rowcek['id_pegawai']);
		}
	}
	
	function add_info_perusahaan(){
		
		$sql = "SELECT * FROM perusahaan LIMIT 1";
		$query = $this->db->query($sql);
		$result = $query->num_rows();
		$row = $query->row_array();
		
		$dir = $_SERVER['DOCUMENT_ROOT']."/assets/img/perusahaan/";
			
		$namafile = '';
		$namafilettd = '';
		
		if(empty($_FILES["uploadlogo"]["name"])){
		
		}else{
			if (($_FILES["uploadlogo"]["type"] == "image/gif") ||
				($_FILES["uploadlogo"]["type"] == "image/jpeg") ||
				($_FILES["uploadlogo"]["type"] == "image/png") ||
				($_FILES["uploadlogo"]["type"] == "image/pjpeg") ||
				($_FILES["uploadlogo"]["type"] == "image/jpg") ||
				($_FILES["uploadlogo"]["type"] == "image/JPG")
				){
				$ext = $this->findexts($_FILES["uploadlogo"]["name"]); 
				$randomNumber = strtoupper(random_string('alnum',20));
				$lokasi = $dir.$randomNumber.".".$ext;
				$this->uploadBerkas($_FILES["uploadlogo"]["tmp_name"],$lokasi);
				$namafile = $randomNumber.'.'.$ext;
			}
		}
		
		if($namafile !== '' && $row['logo'] !== ''){
			if(file_exists("assets/img/perusahaan/".$row['logo'])){
				unlink("assets/img/perusahaan/".$row['logo']);
			}
		}
		
		if(empty($_FILES["uploadttd"]["name"])){
		
		}else{
			if (($_FILES["uploadttd"]["type"] == "image/gif") ||
				($_FILES["uploadttd"]["type"] == "image/jpeg") ||
				($_FILES["uploadttd"]["type"] == "image/png") ||
				($_FILES["uploadttd"]["type"] == "image/pjpeg") ||
				($_FILES["uploadttd"]["type"] == "image/jpg") ||
				($_FILES["uploadttd"]["type"] == "image/JPG")
				){
				$ext = $this->findexts($_FILES["uploadttd"]["name"]); 
				$randomNumber = strtoupper(random_string('alnum',20));
				$lokasi = $dir.$randomNumber.".".$ext;
				$this->uploadBerkas($_FILES["uploadttd"]["tmp_name"],$lokasi);
				$namafilettd = $randomNumber.'.'.$ext;
			}
		}
		
		if($namafilettd !== '' && $row['ttd'] !== ''){
			if(file_exists("assets/img/perusahaan/".$row['ttd'])){
				unlink("assets/img/perusahaan/".$row['ttd']);
			}
		}
		
		if($result > 0){
				
			if($namafile == '' && $namafilettd == ''){
				$sqltambah = "UPDATE perusahaan SET nama = ?, alamat = ?, kota = ?, provinsi = ?, umr = ?, telepon = ?, hp = ?, email = ?, npwp = ?";
				$querytambah = $this->db->query($sqltambah, [$this->input->post('namaperusahaan'),$this->input->post('alamat'),$this->input->post('kota'),$this->input->post('provinsi'),str_replace('.','',$this->input->post('umr')),$this->input->post('telepon'),$this->input->post('hp'),$this->input->post('email'),$this->input->post('npwp')]);
			}else{
				if($namafile !== '' && $namafilettd !== ''){
					$sqltambah = "UPDATE perusahaan SET logo = ?, nama = ?, alamat = ?, kota = ?, provinsi = ?, umr = ?, telepon = ?, hp = ?, email = ?, npwp = ?, ttd = ?";
					$querytambah = $this->db->query($sqltambah, [$namafile,$this->input->post('namaperusahaan'),$this->input->post('alamat'),$this->input->post('kota'),$this->input->post('provinsi'),str_replace('.','',$this->input->post('umr')),$this->input->post('telepon'),$this->input->post('hp'),$this->input->post('email'),$this->input->post('npwp'),$namafilettd]);
				}elseif($namafile !== ''){
					$sqltambah = "UPDATE perusahaan SET logo = ?, nama = ?, alamat = ?, kota = ?, provinsi = ?, umr = ?, telepon = ?, hp = ?, email = ?, npwp = ?";
					$querytambah = $this->db->query($sqltambah, [$namafile,$this->input->post('namaperusahaan'),$this->input->post('alamat'),$this->input->post('kota'),$this->input->post('provinsi'),str_replace('.','',$this->input->post('umr')),$this->input->post('telepon'),$this->input->post('hp'),$this->input->post('email'),$this->input->post('npwp')]);
				}elseif($namafilettd !== ''){
					$sqltambah = "UPDATE perusahaan SET nama = ?, alamat = ?, kota = ?, provinsi = ?, umr = ?, telepon = ?, hp = ?, email = ?, npwp = ?, ttd = ?";
					$querytambah = $this->db->query($sqltambah, [$this->input->post('namaperusahaan'),$this->input->post('alamat'),$this->input->post('kota'),$this->input->post('provinsi'),str_replace('.','',$this->input->post('umr')),$this->input->post('telepon'),$this->input->post('hp'),$this->input->post('email'),$this->input->post('npwp'),$namafilettd]);
				}
			}
			
			return '1';
		}else{
			
			$sqltambah = "INSERT INTO perusahaan VALUES(?,?,?,?,?,?,?,?,?,?,?)";
			$querytambah = $this->db->query($sqltambah, [$namafile,$this->input->post('namaperusahaan'),$this->input->post('alamat'),$this->input->post('kota'),$this->input->post('provinsi'),str_replace('.','',$this->input->post('umr')),$this->input->post('telepon'),$this->input->post('hp'),$this->input->post('email'),$this->input->post('npwp'),$namafilettd]);
			
			return '1';
		}
	}
	
	function get_info_perusahaan(){
		$sql = "SELECT * FROM perusahaan";
		$query = $this->db->query($sql);
		$result = $query->row_array();
		return $result;
	}
	
	function add_cabang(){
		
		if($this->input->post('tempcabang') !== ''){
			
			$sqltambah = "UPDATE cabang SET nama = ?, alamat = ?, kota = ?, kode_pos = ? WHERE id = ? AND status > 0";
			$querytambah = $this->db->query($sqltambah, [$this->input->post('namacabang'),$this->input->post('alamatcabang'),$this->input->post('kotacabang'),$this->input->post('kodeposcabang'),$this->input->post('tempcabang')]);
				
		}else{
			$sqltambah = "INSERT INTO cabang VALUES(DEFAULT,?,?,?,?,1)";
			$querytambah = $this->db->query($sqltambah, [$this->input->post('namacabang'),$this->input->post('alamatcabang'),$this->input->post('kotacabang'),$this->input->post('kodeposcabang')]);
		}
		
		return '1';
	}
	
	function get_cabang(){
		
		$id = $this->input->post('id');
		$sql = "SELECT * FROM cabang WHERE id = ? AND status > 0 LIMIT 1";
		$query = $this->db->query($sql,[$id]);
		$result = $query->row_array();
		
		return $result;
	}
	
	function del_cabang(){
		
		$id = $this->input->post('id');
		$sql = "UPDATE cabang SET status = 0 WHERE id = ? AND status > 0";
		$query = $this->db->query($sql,[$id]);
		
	}
	
	function list_jadwal_kerja(){
		$sql = "SELECT * FROM jadwal_kerja WHERE status > 0";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		
		return $result;
	}
	
	function list_libur(){
		$sql = "SELECT * FROM jadwal_libur WHERE status > 0";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		
		return $result;
	}
	
	function add_jadwal_kerja(){
		
		$sqlcek = "SELECT * FROM jadwal_kerja WHERE hari = ? AND status > 0";
		$querycek = $this->db->query($sqlcek,[$this->input->post('hari')]);
		$jumcek = $querycek->num_rows();
		
		if($this->input->post('tempkerja') !== ''){
			if($jumcek > 0){
				$sqltambah = "UPDATE jadwal_kerja SET nama = ?, masuk = ?, pulang = ?, istirahat_keluar = ?, istirahat_masuk = ? WHERE hari = ? AND status > 0";
				$querytambah = $this->db->query($sqltambah, [$this->input->post('nama'),$this->input->post('masuk'),$this->input->post('pulang'),$this->input->post('istirahatmulai'),$this->input->post('istirahatselesai'),$this->input->post('hari')]);
			}else{
				$sqltambah = "UPDATE jadwal_kerja SET nama = ?, hari = ?, masuk = ?, pulang = ?, istirahat_keluar = ?, istirahat_masuk = ? WHERE id = ? AND status > 0";
				$querytambah = $this->db->query($sqltambah, [$this->input->post('nama'),$this->input->post('hari'),$this->input->post('masuk'),$this->input->post('pulang'),$this->input->post('istirahatmulai'),$this->input->post('istirahatselesai'),$this->input->post('tempkerja')]);
			}
			return '1';
		}else{
			if($jumcek == 0){
				$sqltambah = "INSERT INTO jadwal_kerja VALUES(DEFAULT,?,?,?,?,?,?,1)";
				$querytambah = $this->db->query($sqltambah, [$this->input->post('nama'),$this->input->post('hari'),$this->input->post('masuk'),$this->input->post('pulang'),$this->input->post('istirahatmulai'),$this->input->post('istirahatselesai')]);
				
				return '1';
			}else{
				return '0';
			}
		}
	}
	
	function get_jadwal_kerja(){
		$id = $this->input->post('id');
		$sql = "SELECT * FROM jadwal_kerja WHERE id = ? AND status > 0 LIMIT 1";
		$query = $this->db->query($sql,[$id]);
		$result = $query->row_array();
		
		return $result;
	}
	
	function del_jadwal_kerja(){
		
		$id = $this->input->post('id');
		$sql = "DELETE FROM jadwal_kerja WHERE id = ? AND status > 0";
		$query = $this->db->query($sql,[$id]);
		
	}
	
	function add_libur(){
	
		$arrketerangan = $this->input->post('arrketerangan');
		$arrtanggal = $this->input->post('arrtanggal');
		
		for($i=0;$i<count($arrketerangan);$i++){
			$sqltambah = "INSERT INTO jadwal_libur VALUES(DEFAULT,?,?,1)";
			$querytambah = $this->db->query($sqltambah, [$arrketerangan[$i],$arrtanggal[$i]]);
		}		
		
	}
	
	function del_libur(){
		
		$id = $this->input->post('id');
		$sql = "DELETE FROM jadwal_libur WHERE id = ? AND status > 0";
		$query = $this->db->query($sql,[$id]);
		
	}
	
	function add_organisasi(){
	
		$nama = $this->input->post('namaorganisasi');
		
		$sqltambah = "INSERT INTO organisasi VALUES(DEFAULT,?,1)";
		$querytambah = $this->db->query($sqltambah, [$nama]);
		
		return $this->db->insert_id();
		
	}
	
	function del_organisasi(){
		
		$id = $this->input->post('id');
		$sql = "UPDATE organisasi SET status = 0 WHERE id = ? AND status > 0";
		$query = $this->db->query($sql,[$id]);
		
	}
	
	function add_level(){
	
		$nama = $this->input->post('namalevel');
		
		$sqltambah = "INSERT INTO posisi_level VALUES(DEFAULT,?,1)";
		$querytambah = $this->db->query($sqltambah, [$nama]);
		
		return $this->db->insert_id();
		
	}
	
	function del_level(){
		
		$id = $this->input->post('id');
		$sql = "UPDATE posisi_level SET status = 0 WHERE id = ? AND status > 0";
		$query = $this->db->query($sql,[$id]);
		
	}
	
	function add_posisi(){
	
		$nama = $this->input->post('namaposisi');
		
		$sqltambah = "INSERT INTO posisi_pekerjaan VALUES(DEFAULT,?,1)";
		$querytambah = $this->db->query($sqltambah, [$nama]);
		
		return $this->db->insert_id();
		
	}
	
	function del_posisi(){
		
		$id = $this->input->post('id');
		$sql = "UPDATE posisi_pekerjaan SET status = 0 WHERE id = ? AND status > 0";
		$query = $this->db->query($sql,[$id]);
		
	}

	function add_poin(){
	
		$menit = $this->input->post('menitpoin');
		$potongan = $this->input->post('potonganpoin');
		
		$sqlcek = "SELECT * FROM poin WHERE status > 0";
		$querycek = $this->db->query($sqlcek);
		$jumcek = $querycek->num_rows();
		
		if($jumcek > 0){
			$sqltambah = "UPDATE poin SET menit = ?, potongan = ? WHERE status > 0";
			$querytambah = $this->db->query($sqltambah, [$menit,$potongan]);
		}else{
			$sqltambah = "INSERT INTO poin VALUES(DEFAULT,?,1,?,1)";
			$querytambah = $this->db->query($sqltambah, [$menit,$potongan]);
		}		
	}
	
	function list_komponen_thr(){
		
		$sql = "SELECT *,(SELECT nama FROM komponen_upah WHERE id = id_komponen_upah) AS namakomponen FROM komponen_thr WHERE status > 0";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		
		return $result;
	}
	
	function add_komponen_thr(){
		
		$arrkomponen = $this->input->post('arrkomponen');
		$arrcombine = implode(',',$arrkomponen);
		
		$sqldel = 'DELETE FROM komponen_thr WHERE id_komponen_upah NOT IN ('.$arrcombine.') AND status > 0';
		$querydel = $this->db->query($sqldel);
		
		for($i=0;$i<count($arrkomponen);$i++){
			$sql = "SELECT * FROM komponen_thr WHERE id_komponen_upah = ? AND status > 0";
			$query = $this->db->query($sql, [$arrkomponen[$i]]);
			$jum = $query->num_rows();
			
			if($jum > 0){
				//
			}else{
				$sqltambah = "INSERT INTO komponen_thr VALUES(DEFAULT,?,1)";
				$querytambah = $this->db->query($sqltambah, [$arrkomponen[$i]]);
			}
		}
		
		return 1;
	}
	
	function update_histori_gaji($idpegawai,$bulantahun,$totalkomponen,$totalpinjaman,$totalkehadiran,$totalpajak,$totalditerima){
		$sql = "SELECT * FROM histori_upah_pegawai WHERE id_pegawai = ? AND bulantahun = ? AND status > 0";
		$querysql = $this->db->query($sql,[$idpegawai,$bulantahun]);
		$jumcek = $querysql->num_rows();
		
		if($jumcek > 0){
			$sql = "UPDATE histori_upah_pegawai SET total_komponen = ?, total_pinjaman = ?, total_kehadiran = ?, total_pajak = ?, total_diterima = ? WHERE id_pegawai = ? AND bulantahun = ? AND status > 0";
			$querysql = $this->db->query($sql,[$totalkomponen,$totalpinjaman,$totalkehadiran,$totalpajak,$totalditerima,$idpegawai,$bulantahun]);
		}else{
			$sql = "INSERT INTO histori_upah_pegawai VALUES(DEFAULT,?,?,?,?,?,?,?,1)";
			$querysql = $this->db->query($sql,[$idpegawai,$bulantahun,$totalkomponen,$totalpinjaman,$totalkehadiran,$totalpajak,$totalditerima]);
		}
		
		#update notifikasi
		$this->add_notifikasi('Pembayaran gaji berhasil!','Pembayaran gaji anda bulan '.$bulantahun.' telah dibayarkan dengan nominal Rp '.number_format($totalditerima,0,',','.').'.','KARYAWAN',$idpegawai);
	}
	
	function update_histori_thr($idpegawai,$tahun,$totalkomponen,$totalpajak,$totalditerima){
		$sql = "SELECT * FROM histori_thr_pegawai WHERE id_pegawai = ? AND tahun = ? AND status > 0";
		$querysql = $this->db->query($sql,[$idpegawai,$tahun]);
		$jumcek = $querysql->num_rows();
		
		if($jumcek > 0){
			$sql = "UPDATE histori_thr_pegawai SET total_komponen = ?, total_pajak = ?, total_diterima = ? WHERE id_pegawai = ? AND tahun = ? AND status > 0";
			$querysql = $this->db->query($sql,[$totalkomponen,$totalpajak,$totalditerima,$idpegawai,$tahun]);
		}else{
			$sql = "INSERT INTO histori_thr_pegawai VALUES(DEFAULT,?,?,?,?,?,1)";
			$querysql = $this->db->query($sql,[$idpegawai,$tahun,$totalkomponen,$totalpajak,$totalditerima]);
		}
		
		#update notifikasi
		$this->add_notifikasi('Pembayaran THR berhasil!','Pembayaran THR anda tahun '.$tahun.' telah dibayarkan dengan nominal Rp '.number_format($totalditerima,0,',','.').'.','KARYAWAN',$idpegawai);
	}
	
	function update_histori_pajak($idpegawai,$tahun,$totalpajak){
		$sql = "SELECT * FROM histori_pajak_pegawai WHERE id_pegawai = ? AND tahun = ? AND status > 0";
		$querysql = $this->db->query($sql,[$idpegawai,$tahun]);
		$jumcek = $querysql->num_rows();
		
		if($jumcek > 0){
			$sql = "UPDATE histori_pajak_pegawai SET total_pajak = ? WHERE id_pegawai = ? AND tahun = ? AND status > 0";
			$querysql = $this->db->query($sql,[$totalpajak,$idpegawai,$tahun]);
		}else{
			$sql = "INSERT INTO histori_pajak_pegawai VALUES(DEFAULT,?,?,?,1)";
			$querysql = $this->db->query($sql,[$idpegawai,$tahun,$totalpajak]);
		}
		
		#update notifikasi
		$this->add_notifikasi('Pembayaran Pajak berhasil!','Pembayaran Pajak anda tahun '.$tahun.' telah dibayarkan/ditanggung dengan nominal Rp '.number_format($totalpajak,0,',','.').'.','KARYAWAN',$idpegawai);
	}
	
	function list_klaim_benefit(){
		$sql = "SELECT
					pb.id,
					b.nama,
					b.berlaku_awal,
					b.berlaku_akhir,
					b.nominal_cover,
					pb.bukti,
					pb.keterangan,
					pb.nominal,
					pb.status
				FROM pegawai_benefit pb, benefit b
				WHERE 
					pb.id_pegawai = ? AND pb.status > 0
					AND pb.id_benefit = b.id";
		$query = $this->db->query($sql,[$_SESSION['backuserid']]);
		$result = $query->result_array();
		
		return $result;
	}
	
	function cek_saldo_benefit($idtipe){
		
		$sql = "SELECT 
					IFNULL(SUM(pb.nominal),0) AS nominal,
					IFNULL(b.nominal_cover,0) AS plafon 
				FROM 
					pegawai_benefit pb, 
					benefit b 
				WHERE 
					b.id = pb.id_benefit 
					AND b.id = ? 
					AND pb.id_pegawai = ? 
					AND pb.status > 0 
					AND CURDATE() BETWEEN b.berlaku_awal AND b.berlaku_akhir";
		$query = $this->db->query($sql,[$idtipe,$_SESSION['backuserid']]);
		$result = $query->row_array();
		
		if($result['plafon'] > 0){
			$hasil = $result['plafon'] - $result['nominal'];
			
			if($hasil >= 0){
				return 'Rp '.number_format($hasil,0,',','.').',-';
			}else{
				return 0;
			}
		}else{
			return -1;
		}
	}
	
	function get_limit_benefit(){
		
		$id = $this->input->post('id');
		$sql = "SELECT *,IFNULL((SELECT SUM(nominal) FROM pegawai_benefit WHERE id_benefit = benefit.id AND id_pegawai = ? AND status = 3),0) AS terpakai FROM benefit WHERE status > 0";
		$query = $this->db->query($sql,[$_SESSION['backuserid']]);
		$result = $query->result_array();
		
		return $result;
	}
	
	function list_benefit_pegawai(){
		$sql = "SELECT *,(SELECT nama FROM benefit WHERE id = id_benefit) AS namabenefit,(SELECT nama_lengkap FROM pegawai WHERE id = id_pegawai) AS namapegawai FROM pegawai_benefit WHERE status > 0";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		
		return $result;
	}
	
	function update_ijin_benefit(){
		
		if($_SESSION['backjabatan'] == 'ADMIN'){
			$id = $this->input->post('id');
			$value = $this->input->post('val');
			$sql = "UPDATE pegawai_benefit SET status = ? WHERE id = ? AND status > 0";
			$query = $this->db->query($sql,[$value,$id]);
			
			$querycek = $this->db->query("SELECT * FROM pegawai_benefit WHERE id = ?",[$$id]);
			$rowcek = $querycek->row_array();
			#update notifikasi
			$this->add_notifikasi('Pengajuan benefit diubah status!','Pengajuan benefit anda dengan nominal Rp '.number_format($rowcek["nominal"],0,',','.').' telah diubah statusnya.','KARYAWAN',$rowcek['id_pegawai']);
		}
	}
	
	function laporan_gaji(){
		
		$tahunbulan = $this->input->post('tahunbulan');
		$sql = "SELECT *,(SELECT nama_lengkap FROM pegawai WHERE id = id_pegawai) AS namapegawai FROM histori_upah_pegawai WHERE status > 0 AND bulantahun = ?";
		$query = $this->db->query($sql,[$tahunbulan]);
		$result = $query->result_array();
		
		return $result;
	}
	
	function laporan_thr(){
		
		$tahun = $this->input->post('tahunthr');
		$sql = "SELECT *,(SELECT nama_lengkap FROM pegawai WHERE id = id_pegawai) AS namapegawai FROM histori_thr_pegawai WHERE status > 0 AND tahun = ?";
		$query = $this->db->query($sql,[$tahun]);
		$result = $query->result_array();
		
		return $result;
	}
	
	function get_akun(){
		
		$sql = "SELECT * FROM pegawai WHERE id = ? AND status > 0";
		$query = $this->db->query($sql,[$_SESSION['backuserid']]);
		$result = $query->row_array();
		
		return $result;
	}
	
	function update_pegawai(){
		
		$sqlcek = "SELECT IFNULL((SELECT id FROM pegawai WHERE uname = ?),0) AS NILUNAME, IFNULL((SELECT id FROM pegawai WHERE email = ?),0) AS NILEMAIL";
		$querycek = $this->db->query($sqlcek,[$this->input->post('namauser'),$this->input->post('email')]);
		$rowcek = $querycek->row_array();
		
		if($rowcek['NILUNAME'] > 0 && $_SESSION['backuserid'] !== $rowcek['NILUNAME']){
			return -1;
		}elseif($rowcek['NILEMAIL'] > 0 && $_SESSION['backuserid'] !== $rowcek['NILEMAIL']){
			return 0;
		}else{
			$sql = "SELECT * FROM pegawai WHERE id = ? AND status > 0 LIMIT 1";
			$query = $this->db->query($sql,[$_SESSION['backuserid']]);
			$result = $query->num_rows();
			$row = $query->row_array();
			
			$dir = $_SERVER['DOCUMENT_ROOT']."/assets/img/profil/";
				
			$namafile = '';
			
			if(empty($_FILES["uploadfoto"]["name"])){
			
			}else{
				if (($_FILES["uploadfoto"]["type"] == "image/gif") ||
					($_FILES["uploadfoto"]["type"] == "image/jpeg") ||
					($_FILES["uploadfoto"]["type"] == "image/png") ||
					($_FILES["uploadfoto"]["type"] == "image/pjpeg") ||
					($_FILES["uploadfoto"]["type"] == "image/jpg") ||
					($_FILES["uploadfoto"]["type"] == "image/JPG")
					){
					$ext = $this->findexts($_FILES["uploadfoto"]["name"]); 
					$randomNumber = strtoupper(random_string('alnum',20));
					$lokasi = $dir.$randomNumber.".".$ext;
					$this->uploadBerkas($_FILES["uploadfoto"]["tmp_name"],$lokasi);
					$namafile = $randomNumber.'.'.$ext;
				}
			}
			
			if($namafile !== '' && $row['foto_profil'] !== ''){
				if(file_exists("assets/img/profil/".$row['foto_profil'])){
					unlink("assets/img/profil/".$row['foto_profil']);
				}
			}
			
			if($namafile == ''){
				$sqlubah = "UPDATE pegawai SET uname = ?, email = ?, nama_lengkap = ?,hp = ?,phone = ?,tempat_lahir = ?,tanggal_lahir = ?, jk = ?,status_kawin = ?,golongan_darah = ?,agama=?,tipe_id=?,no_id=?,kode_pos=?,alamat_id=?,alamat_domisili=? WHERE id = ? AND status > 0";
				$queryubah = $this->db->query($sqlubah, [$this->input->post('namauser'),$this->input->post('email'),$this->input->post('namalengkap'),$this->input->post('hp'),$this->input->post('telepon'),$this->input->post('tempatlahir'),$this->input->post('tanggallahir'),$this->input->post('jk'),$this->input->post('statuskawin'),$this->input->post('goldar'),$this->input->post('agama'),$this->input->post('identitas'),$this->input->post('nomorid'),$this->input->post('kodepos'),$this->input->post('alamatasal'),$this->input->post('alamatnow'),$_SESSION['backuserid']]);
			}else{
				$sqlubah = "UPDATE pegawai SET uname = ?, email = ?, nama_lengkap = ?,hp = ?,phone = ?,tempat_lahir = ?,tanggal_lahir = ?, jk = ?,status_kawin = ?,golongan_darah = ?,agama=?,tipe_id=?,no_id=?,kode_pos=?,alamat_id=?,alamat_domisili=?,foto_profil=? WHERE id = ? AND status > 0";
				$queryubah = $this->db->query($sqlubah, [$this->input->post('namauser'),$this->input->post('email'),$this->input->post('namalengkap'),$this->input->post('hp'),$this->input->post('telepon'),$this->input->post('tempatlahir'),$this->input->post('tanggallahir'),$this->input->post('jk'),$this->input->post('statuskawin'),$this->input->post('goldar'),$this->input->post('agama'),$this->input->post('identitas'),$this->input->post('nomorid'),$this->input->post('kodepos'),$this->input->post('alamatasal'),$this->input->post('alamatnow'),$namafile,$_SESSION['backuserid']]);
				
				$_SESSION["backuserfoto"] = $namafile;
			}
			
			$_SESSION["backfullname"] = $this->input->post('namalengkap');
			
			#update notifikasi
			$this->add_notifikasi('Profil pegawai telah diubah!','Profil pegawai dengan nama '.$_SESSION["backfullname"].' telah diubah.','ADMIN',0);
			
			return '1';
		}
	}
	
	function list_keluarga_pegawai(){
		$sql = "SELECT *,(SELECT nama FROM relasi_keluarga WHERE id = id_relasi) AS RELASI FROM pegawai_keluarga WHERE status > 0 AND id_pegawai = ?";
		$query = $this->db->query($sql,[$_SESSION['backuserid']]);
		$result = $query->result_array();
		
		return $result;
	}
	
	function list_pendidikan_pegawai(){
		$sql = "SELECT *,(SELECT nama FROM pendidikan WHERE id = id_pendidikan) AS JENJANG FROM pegawai_pendidikan WHERE status > 0 AND id_pegawai = ?";
		$query = $this->db->query($sql,[$_SESSION['backuserid']]);
		$result = $query->result_array();
		
		return $result;
	}
	
	function list_pengalaman_pegawai(){
		$sql = "SELECT * FROM pegawai_pengalaman_kerja WHERE status > 0 AND id_pegawai = ?";
		$query = $this->db->query($sql,[$_SESSION['backuserid']]);
		$result = $query->result_array();
		
		return $result;
	}
	
	function list_relasi_keluarga(){
		$sql = "SELECT * FROM relasi_keluarga WHERE status > 0";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		
		return $result;
	}
	
	function list_jenjang_pendidikan(){
		$sql = "SELECT * FROM pendidikan WHERE status > 0";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		
		return $result;
	}
	
	function add_keluarga(){
		
		if($this->input->post('tempkeluarga') !== ''){
			
			$sqltambah = "UPDATE pegawai_keluarga SET nama_lengkap=?,id_relasi=?,kontak_darurat=?,alamat=?,no_id=?,jk=?,tanggal_lahir=?,agama=?,status_kawin=?,pekerjaan=? WHERE id=? AND id_pegawai=? AND status > 0";
			$querytambah = $this->db->query($sqltambah, [$this->input->post('namakeluarga'),$this->input->post('relasikeluarga'),$this->input->post('kontakkeluarga'),$this->input->post('alamatkeluarga'),$this->input->post('nomoridkeluarga'),$this->input->post('jkkeluarga'),$this->input->post('tanggallahirkeluarga'),$this->input->post('agamakeluarga'),$this->input->post('statuskawinkeluarga'),$this->input->post('pekerjaankeluarga'),$this->input->post('tempkeluarga'),$_SESSION['backuserid']]);
				
		}else{
			$sqltambah = "INSERT INTO pegawai_keluarga VALUES(DEFAULT,?,?,?,?,?,?,?,?,?,?,?,1)";
			$querytambah = $this->db->query($sqltambah, [$_SESSION['backuserid'],$this->input->post('namakeluarga'),$this->input->post('relasikeluarga'),$this->input->post('kontakkeluarga'),$this->input->post('alamatkeluarga'),$this->input->post('nomoridkeluarga'),$this->input->post('jkkeluarga'),$this->input->post('tanggallahirkeluarga'),$this->input->post('agamakeluarga'),$this->input->post('statuskawinkeluarga'),$this->input->post('pekerjaankeluarga')]);
		}
		
		#update notifikasi
		$this->add_notifikasi('Data keluarga ditambahkan!','Data keluarga pegawai dengan nama '.$_SESSION['backfullname'].' telah ditambahkan.','ADMIN',0);
		
		return '1';
	}
	
	function get_keluarga(){
		
		$id = $this->input->post('id');
		$sql = "SELECT * FROM pegawai_keluarga WHERE id = ? AND status > 0 AND id_pegawai = ? LIMIT 1";
		$query = $this->db->query($sql,[$id,$_SESSION['backuserid']]);
		$result = $query->row_array();
		
		return $result;
	}
	
	function del_keluarga(){
		
		$id = $this->input->post('id');
		$sql = "UPDATE pegawai_keluarga SET status = 0 WHERE id = ? AND id_pegawai = ? AND status > 0";
		$query = $this->db->query($sql,[$id,$_SESSION['backuserid']]);
		
	}
	
	function add_pendidikan(){
		
		if($this->input->post('temppendidikan') !== ''){
			
			$sqltambah = "UPDATE pegawai_pendidikan SET id_pendidikan=?,nama_institusi=?,jurusan=?,nilai=?,tahun_mulai=?,tahun_selesai=? WHERE id=? AND id_pegawai=? AND status > 0";
			$querytambah = $this->db->query($sqltambah, [$this->input->post('jenjangpendidikan'),$this->input->post('namapendidikan'),$this->input->post('jurusanpendidikan'),$this->input->post('nilaipendidikan'),$this->input->post('mulaipendidikan'),$this->input->post('selesaipendidikan'),$this->input->post('temppendidikan'),$_SESSION['backuserid']]);
				
		}else{
			$sqltambah = "INSERT INTO pegawai_pendidikan VALUES(DEFAULT,?,?,?,?,?,?,?,1)";
			$querytambah = $this->db->query($sqltambah, [$_SESSION['backuserid'],$this->input->post('jenjangpendidikan'),$this->input->post('namapendidikan'),$this->input->post('jurusanpendidikan'),$this->input->post('nilaipendidikan'),$this->input->post('mulaipendidikan'),$this->input->post('selesaipendidikan')]);
		}
		
		#update notifikasi
		$this->add_notifikasi('Data pendidikan ditambahkan!','Data pendidikan pegawai dengan nama '.$_SESSION['backfullname'].' telah ditambahkan.','ADMIN',0);
		
		return '1';
	}
	
	function get_pendidikan(){
		
		$id = $this->input->post('id');
		$sql = "SELECT * FROM pegawai_pendidikan WHERE id = ? AND status > 0 AND id_pegawai = ? LIMIT 1";
		$query = $this->db->query($sql,[$id,$_SESSION['backuserid']]);
		$result = $query->row_array();
		
		return $result;
	}
	
	function del_pendidikan(){
		
		$id = $this->input->post('id');
		$sql = "UPDATE pegawai_pendidikan SET status = 0 WHERE id = ? AND id_pegawai = ? AND status > 0";
		$query = $this->db->query($sql,[$id,$_SESSION['backuserid']]);
		
	}
	
	function add_pengalaman(){
		
		if($this->input->post('temppengalaman') !== ''){
			
			$sqltambah = "UPDATE pegawai_pengalaman_kerja SET nama_perusahaan=?,posisi=?,mulai=?,selesai=? WHERE id=? AND id_pegawai=? AND status > 0";
			$querytambah = $this->db->query($sqltambah, [$this->input->post('namapengalaman'),$this->input->post('posisipengalaman'),$this->input->post('mulaipengalaman'),$this->input->post('selesaipengalaman'),$this->input->post('temppengalaman'),$_SESSION['backuserid']]);
				
		}else{
			$sqltambah = "INSERT INTO pegawai_pengalaman_kerja VALUES(DEFAULT,?,?,?,?,?,1)";
			$querytambah = $this->db->query($sqltambah, [$_SESSION['backuserid'],$this->input->post('namapengalaman'),$this->input->post('posisipengalaman'),$this->input->post('mulaipengalaman'),$this->input->post('selesaipengalaman')]);
		}
		
		#update notifikasi
		$this->add_notifikasi('Data pengalaman kerja ditambahkan!','Data pengalaman kerja pegawai dengan nama '.$_SESSION['backfullname'].' telah ditambahkan.','ADMIN',0);
		
		return '1';
	}
	
	function get_pengalaman(){
		
		$id = $this->input->post('id');
		$sql = "SELECT * FROM pegawai_pengalaman_kerja WHERE id = ? AND status > 0 AND id_pegawai = ? LIMIT 1";
		$query = $this->db->query($sql,[$id,$_SESSION['backuserid']]);
		$result = $query->row_array();
		
		return $result;
	}
	
	function del_pengalaman(){
		
		$id = $this->input->post('id');
		$sql = "UPDATE pegawai_pengalaman_kerja SET status = 0 WHERE id = ? AND id_pegawai = ? AND status > 0";
		$query = $this->db->query($sql,[$id,$_SESSION['backuserid']]);
		
	}
	
	function rekap_status_pekerja(){
		$sql = "SELECT status_pekerja, COUNT(*) AS jumlah FROM pegawai_pekerjaan WHERE status > 0 GROUP BY status_pekerja";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		
		return $result;
	}
	
	function rekap_organisasi(){
		$sql = "SELECT id_organisasi,(SELECT nama FROM organisasi WHERE id = id_organisasi) AS namaorganisasi, COUNT(*) AS jumlah FROM pegawai_pekerjaan WHERE status > 0 GROUP BY id_organisasi";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		
		return $result;
	}
	
	function get_rekap_reimburse(){
		
		$sql = "SELECT IFNULL(SUM(nominal),0) AS total FROM pegawai_pengembalian WHERE status = 3 AND id_pegawai = ? AND YEAR(tgl_efektif) = YEAR(CURDATE())";
		$query = $this->db->query($sql,[$_SESSION['backuserid']]);
		$result = $query->row_array();
		
		return $result;
	}
	
	function get_rekap_kas(){
		
		$sql = "SELECT IFNULL(SUM(nominal_total),0) total, IFNULL(SUM(nominal_terpakai),0) AS terpakai FROM pegawai_kas WHERE status = 3 AND id_pegawai = ? AND YEAR(untuk_tanggal) = YEAR(CURDATE())";
		$query = $this->db->query($sql,[$_SESSION['backuserid']]);
		$result = $query->row_array();
		
		return $result;
	}
	
	function get_rekap_pinjaman(){
		
		$sql = "SELECT IFNULL(SUM(nominal_total),0) total FROM pegawai_pinjaman WHERE status = 3 AND id_pegawai = ? AND YEAR(terhitung_tanggal) = YEAR(CURDATE())";
		$query = $this->db->query($sql,[$_SESSION['backuserid']]);
		$result = $query->row_array();
		
		return $result;
	}
	
	function list_notifikasi(){
		
		if($_SESSION['backjabatan'] == 'ADMIN'){
			$sqlupdate = $this->db->query("UPDATE notifikasi SET status = 2 WHERE (untuk_pegawai = ? OR tipe = 'ADMIN') AND status = 1",[$_SESSION['backuserid']]);
			$sql = "SELECT * FROM notifikasi WHERE (untuk_pegawai = ? OR tipe = 'ADMIN') AND status > 0 ORDER BY tanggal DESC";
			$query = $this->db->query($sql,[$_SESSION['backuserid']]);
		}elseif($_SESSION['backjabatan'] == 'KARYAWAN'){
			$sqlupdate = $this->db->query("UPDATE notifikasi SET status = 2 WHERE untuk_pegawai = ? AND tipe = 'KARYAWAN' AND status = 1",[$_SESSION['backuserid']]);
			$sql = "SELECT * FROM notifikasi WHERE untuk_pegawai = ? AND tipe = 'KARYAWAN' AND status > 0 ORDER BY tanggal DESC";
			$query = $this->db->query($sql,[$_SESSION['backuserid']]);
		}
			
		$result = $query->result_array();
		
		return $result;
	}
	
	function get_notifikasi(){
		if($_SESSION['backjabatan'] == 'ADMIN'){
			$sql = "SELECT IFNULL(COUNT(*),0) AS total FROM notifikasi WHERE (untuk_pegawai = ? OR tipe = 'ADMIN') AND status = 1 ORDER BY tanggal DESC";
			$query = $this->db->query($sql,[$_SESSION['backuserid']]);
		}elseif($_SESSION['backjabatan'] == 'KARYAWAN'){
			$sql = "SELECT IFNULL(COUNT(*),0) AS total FROM notifikasi WHERE untuk_pegawai = ? AND tipe = 'KARYAWAN' AND status = 1 ORDER BY tanggal DESC";
			$query = $this->db->query($sql,[$_SESSION['backuserid']]);
		}
			
		$result = $query->row_array();
		
		return $result['total'];
	}
	
	function add_notifikasi($judul,$isi,$tipe,$pegawai){
		$sql = "INSERT INTO notifikasi VALUES(DEFAULT,?,DEFAULT,?,?,?,?,1)";
		$query = $this->db->query($sql,[$_SESSION['backuserid'],$judul,$isi,$tipe,$pegawai]);
	}
	
	function list_pekerjaan_pegawai(){
		$sql = "SELECT *,(SELECT nama FROM organisasi WHERE id = id_organisasi) AS NAMAORGANISASI,(SELECT nama FROM posisi_pekerjaan WHERE id = id_posisi_pekerjaan) AS NAMAPOSISI,(SELECT nama FROM posisi_level WHERE id = id_posisi_level) AS NAMALEVEL,(SELECT nama FROM cabang WHERE id = id_cabang) AS NAMACABANG FROM pegawai_pekerjaan WHERE status > 0 AND id_pegawai = ?";
		$query = $this->db->query($sql,[$_SESSION['backuserid']]);
		$result = $query->result_array();
		
		return $result;
	}
	
	function reset_password(){
		
		$oldpass = $this->input->post('oldpassword');
		$newpass = $this->input->post('newpassword');
		
		$sql = "SELECT * FROM pegawai WHERE id = ? AND status > 0";
		$query = $this->db->query($sql, [$_SESSION['backuserid']]);
		$row = $query->row_array();
			
		if(password_verify($oldpass, $row['pass']))
		{
			$sqlaktif = "UPDATE pegawai SET pass = ? WHERE id = ? AND status > 0";
			$queryaktif = $this->db->query($sqlaktif, [password_hash($newpass,PASSWORD_DEFAULT),$_SESSION['backuserid']]);

			return '1';
		}else{
			return '0';
		}
			
	}
}