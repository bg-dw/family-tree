<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Acara extends CI_Controller
{
	function __construct()
	{
		//akan berjalan ketika controller C_login di jalankan
		parent::__construct();
		$this->load->model('M_login');
	}
	
	public function index()
	{
		// if ($this->session->userdata('login') == TRUE && $this->session->userdata('level') == 'root') {
		// 	redirect(base_url('admin/beranda/')); //mengarahkan ke halaman admin
		// } elseif ($this->session->userdata('login') == TRUE && $this->session->userdata('level') == 'usr') {
		// 	redirect(base_url('user/beranda')); //mengarahkan ke halaman manager
		// }
        $data['content'] = 'master/v_acara';
		$this->load->view('main',$data);
	}
}
