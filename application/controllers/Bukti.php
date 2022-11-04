<?php
class Bukti extends CI_Controller
{	
	//LOAD FUNGSI LIBRARY TAMBAHAN
	public function __construct()
	{
		parent::__construct();
		$this->load->model('all_model');
		$this->load->library('session');
		$this->load->helper('url');
	}
	
	//FUNGSI 
	public function view($mode,$id)
	{
		$data['judul'] = 'Bukti '.$mode;
		$data['isi'] = $this->all_model->get_bukti($mode,$id);
		
		if(isset($data['isi'])){
			$this->load->view('adminpages/pg_bukti',$data);
		}else{
			show_404();
		}
	}
}