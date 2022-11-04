<?php
class Adminprint extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('admincrud_model');
		$this->load->library('session');
		$this->load->helper('url');
	}
	
	public function cetak_pembelian()
	{
		$param = $this->input->post('id');
		
		$data['infopembelian'] = $this->admincrud_model->get_pembelian_cetak($param);
		
		if (empty($data['infopembelian']) || !isset($_SESSION['backaktif']))
		{
			show_404();
		}

		$data['judul'] = 'Cetak Detail Pembelian';
			
		$this->load->view('printtemplates/header',$data);
		$this->load->view('print/pembelian',$data);
		$this->load->view('printtemplates/footer',$data);
	}
	
	public function cetak_penjualan()
	{
		$param = $this->input->post('id');
		
		$data['infopenjualan'] = $this->admincrud_model->get_penjualan_cetak($param);
		
		if (empty($data['infopenjualan']) || !isset($_SESSION['backaktif']))
		{
			show_404();
		}

		$data['judul'] = 'Cetak Detail Penjualan';
			
		$this->load->view('printtemplates/header',$data);
		$this->load->view('print/penjualan',$data);
		$this->load->view('printtemplates/footer',$data);
	}
	
	public function cetak_masukkeluar()
	{	
		$data['data'] = $this->admincrud_model->get_masuk_keluar();
		
		if (empty($data['data']) || !isset($_SESSION['backaktif']))
		{
			show_404();
		}
		
		$firstword = substr($data['data']['utama']['NO_TRANSAKSI'],0,2);
		
		if($firstword == 'RE' || $firstword == 'PR' || $firstword == ''){
			$data['judul'] = 'Surat Reservasi';
		}else{
			$data['judul'] = 'Surat Jalan';
		}
			
		$this->load->view('printtemplates/header',$data);
		$this->load->view('print/masukkeluar',$data);
		$this->load->view('printtemplates/footer',$data);
	}
	
	public function cetak_kartu_stok()
	{	
		$data['data'] = $this->admincrud_model->get_kartu_stok();
		
		if (empty($data['data']) || !isset($_SESSION['backaktif']))
		{
			show_404();
		}
		
		$data['judul'] = 'Kartu Stok';
			
		$this->load->view('printtemplates/header',$data);
		$this->load->view('print/kartustok',$data);
		$this->load->view('printtemplates/footer',$data);
	}
	
	public function cetak_invoice()
	{	
		$data['data'] = $this->admincrud_model->get_invoice();
		
		if (empty($data['data']) || !isset($_SESSION['backaktif']))
		{
			echo '0';
			exit();
		}
		
		$data['judul'] = 'Invoice';
		$data['terbilang'] = $this;
			
		$this->load->view('printtemplates/header',$data);
		$this->load->view('print/invoice',$data);
		$this->load->view('printtemplates/footer',$data);
	}
	
	public function cetak_kwitansi()
	{	
		$data['data'] = $this->admincrud_model->get_kwitansi();
		
		if (empty($data['data']) || !isset($_SESSION['backaktif']))
		{
			echo '0';
			exit();
		}
		
		$data['judul'] = 'Kwitansi';
		$data['terbilang'] = $this;
		
		$this->load->view('printtemplates/header',$data);
		$this->load->view('print/kwitansi',$data);
		$this->load->view('printtemplates/footer',$data);
	}
	
	public function cetakstokrealtime()
	{	
		$data['data'] = $this->admincrud_model->list_stok_realtime();
		
		if (empty($data['data']) || !isset($_SESSION['backaktif']))
		{
			show_404();
		}
		
		$data['judul'] = 'Stok Realtime (Saat ini)';
			
		$this->load->view('printtemplates/header',$data);
		$this->load->view('print/stokrealtime',$data);
		$this->load->view('printtemplates/footer',$data);
	}
	
	public function cetakrecycleproduksi()
	{	
		$data['data'] = $this->admincrud_model->get_recycle_produksi_cetak();
		
		if (empty($data['data']) || !isset($_SESSION['backaktif']))
		{
			show_404();
		}
		
		$data['judul'] = 'Kartu Recycle/Produksi';
		$data['konversitanggal'] = $this;
			
		$this->load->view('printtemplates/header',$data);
		$this->load->view('print/recycleproduksi',$data);
		$this->load->view('printtemplates/footer',$data);
	}
	
	public function cetak_retur()
	{	
		$data['data'] = $this->admincrud_model->get_retur_cetak();
		
		if (empty($data['data']) || !isset($_SESSION['backaktif']))
		{
			show_404();
		}
		
		$data['judul'] = 'Kartu Retur';
		$data['konversitanggal'] = $this;
			
		$this->load->view('printtemplates/header',$data);
		$this->load->view('print/retur',$data);
		$this->load->view('printtemplates/footer',$data);
	}
	
	public function getDayIndonesia($date)
    {
        if($date != '0000-00-00'){
            $data = $this->hari(date('D', strtotime($date)));
        }else{
            $data = '-';
        }
  
        return $data;
    }
	
	public function cetaklaporantransaksi()
	{
		$param = $this->input->post('param');
		
		$arrParam = array();
				
		parse_str($param, $arrParam);
		
		$data['data'] = $this->admincrud_model->getlistjualbeli($arrParam['opsi1'],$arrParam['modetransaksi1'],$arrParam['tglmulai1'],$arrParam['tglakhir1']);
		
		if (empty($data['data']) || !isset($_SESSION['backaktif']))
		{
			echo '0';
			exit();
		}
		
		if($arrParam['opsi1'] == 'pembelian'){
			$data['judul'] = 'Laporan Transaksi Pembelian';
		}elseif($arrParam['opsi1'] == 'penjualan'){
			$data['judul'] = 'Laporan Transaksi Penjualan';
		}
			
		$this->load->view('printtemplates/header',$data);
		
		if($arrParam['opsi1'] == 'pembelian'){
			$this->load->view('print/laporanpembelian',$data);
		}elseif($arrParam['opsi1'] == 'penjualan'){
			$this->load->view('print/laporanpenjualan',$data);
		}
		$this->load->view('printtemplates/footer',$data);
	}
	
	public function cetakhutangpiutang()
	{
		$param = $this->input->post('param');
		
		$arrParam = array();
				
		parse_str($param, $arrParam);
		
		$data['data'] = $this->admincrud_model->getlisthutangpiutang($arrParam['opsi2'],$arrParam['modetransaksi2'],$arrParam['tglmulai2'],$arrParam['tglakhir2']);
		
		if (empty($data['data']) || !isset($_SESSION['backaktif']))
		{
			echo '0';
			exit();
		}
		
		if($arrParam['opsi2'] == 'hutang'){
			$data['judul'] = 'Laporan Hutang';
		}elseif($arrParam['opsi2'] == 'piutang'){
			$data['judul'] = 'Laporan Piutang';
		}
			
		$this->load->view('printtemplates/header',$data);
		
		if($arrParam['opsi2'] == 'hutang'){
			$this->load->view('print/laporanhutang',$data);
		}elseif($arrParam['opsi2'] == 'piutang'){
			$this->load->view('print/laporanpiutang',$data);
		}
		$this->load->view('printtemplates/footer',$data);
	}
	
	public function cetakproduksi()
	{
		$param = $this->input->post('param');
		
		$arrParam = array();
				
		parse_str($param, $arrParam);
		
		$data['data'] = $this->admincrud_model->getlistrecycleproduksi($arrParam['opsi3'],$arrParam['modetransaksi3'],$arrParam['tglmulai3'],$arrParam['tglakhir3']);
		
		if (empty($data['data']) || !isset($_SESSION['backaktif']))
		{
			echo '0';
			exit();
		}
		
		if($arrParam['opsi3'] == 'recycle'){
			$data['judul'] = 'Laporan Recycle';
		}elseif($arrParam['opsi3'] == 'produksi'){
			$data['judul'] = 'Laporan Produksi';
		}
			
		$this->load->view('printtemplates/header',$data);
		$this->load->view('print/laporanrecycle',$data);
		$this->load->view('printtemplates/footer',$data);
	}
  
    function hari($day) {
        $hari = $day;
  
        switch ($hari) {
            case "Sun":
                $hari = "Minggu";
                break;
            case "Mon":
                $hari = "Senin";
                break;
            case "Tue":
                $hari = "Selasa";
                break;
            case "Wed":
                $hari = "Rabu";
                break;
            case "Thu":
                $hari = "Kamis";
                break;
            case "Fri":
                $hari = "Jum'at";
                break;
            case "Sat":
                $hari = "Sabtu";
                break;
        }
        return $hari;
    }
	
	function penyebut($nilai) {
		$nilai = abs($nilai);
		$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
		$temp = "";
		if ($nilai < 12) {
			$temp = " ". $huruf[$nilai];
		} else if ($nilai <20) {
			$temp = $this->penyebut($nilai - 10). " belas";
		} else if ($nilai < 100) {
			$temp = $this->penyebut($nilai/10)." puluh". $this->penyebut($nilai % 10);
		} else if ($nilai < 200) {
			$temp = " seratus" . $this->penyebut($nilai - 100);
		} else if ($nilai < 1000) {
			$temp = $this->penyebut($nilai/100) . " ratus" . $this->penyebut($nilai % 100);
		} else if ($nilai < 2000) {
			$temp = " seribu" . $this->penyebut($nilai - 1000);
		} else if ($nilai < 1000000) {
			$temp = $this->penyebut($nilai/1000) . " ribu" . $this->penyebut($nilai % 1000);
		} else if ($nilai < 1000000000) {
			$temp = $this->penyebut($nilai/1000000) . " juta" . $this->penyebut($nilai % 1000000);
		} else if ($nilai < 1000000000000) {
			$temp = $this->penyebut($nilai/1000000000) . " milyar" . $this->penyebut(fmod($nilai,1000000000));
		} else if ($nilai < 1000000000000000) {
			$temp = $this->penyebut($nilai/1000000000000) . " trilyun" . $this->penyebut(fmod($nilai,1000000000000));
		}     
		return $temp;
	}
	
	public function terbilang($nilai) {
		if($nilai<0) {
			$hasil = "minus ". trim($this->penyebut($nilai));
		} else {
			$hasil = trim($this->penyebut($nilai));
		}     		
		return $hasil;
	}
}
?>