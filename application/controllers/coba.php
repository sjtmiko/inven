<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coba extends CI_Controller {
    public function index()	{
		//Pemanggilan Tampil Admin
		$data = array(  'isi' 	=> 'admin/v_admin',
						'nav'	=>	'admin/v_nav_admin',
						'title' => 'Tampil Dashboard Admin');
		$this->load->view('layout/wrapper',$data); 
	}
}