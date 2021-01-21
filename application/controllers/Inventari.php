<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventari extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->model('inventari_model');

    }

	public function index()
	{
	    $data['hasil']=$this->model_mahasiswa->TampilMahasiswa();
        $this->load->view('v_mahasiswa',$data);
        $data = array(
            'stk_barang_data' => $stk_barang,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'isi' 	=> 'stk_barang/stk_barang_list',
            'nav'	=>	'admin/v_nav_admin',
            'title' => 'Daftar Inventaris');
        $this->load->view('layout/wrapper',$data);
	}
}