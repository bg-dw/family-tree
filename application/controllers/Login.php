<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
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

		$this->load->view('login/v_login');

		//menghancurkan/menghilangkan session yang sudah dibuat ketika login
		// $this->session->sess_destroy();
	}

	//cek username dan password login
	public function auth()
	{
		// $uname = $this->input->post('uname');
		// $pwd = $this->input->post('upass');

		// $query = $this->M_login->cek_db_login($uname, $pwd); //memanggil fungsi cek_db_login dari model M_login dengan parameter $uname , $pass
		// if ($query->num_rows() > 0) {
		// 	$data = $query->row_array(); //mengambil data dengan cara membuatnya menjadi array
		// 	if ($data['login'] == 'log') {
		// 		if ($data['verifikasi'] == 'done') {
		// 			if ($data['level_user'] == 'root') {
		// 				$this->session->set_userdata('login', TRUE); //memberikan nilai TRUE pada userdata login
		// 				$this->session->set_userdata('user', $data['uname']); //memberikan nilai yang di ambil dari databae pada userdata user
		// 				$this->session->set_userdata('pwd', $data['pwd']);
		// 				$this->session->set_userdata('id', $data['id_user']);
		// 				$this->session->set_userdata('mail', $data['mail']);
		// 				$this->session->set_userdata('level', $data['level_user']);
		// 				$this->session->set_flashdata('success', 'Selamat datang ' . $data['uname'] . " !");
		// 				redirect(base_url('admin/beranda/'));
		// 			} elseif ($data['level_user'] == 'usr') {
		// 				$this->session->set_userdata('login', TRUE); //memberikan nilai TRUE pada userdata login
		// 				$this->session->set_userdata('user', $data['uname']); //memberikan nilai yang di ambil dari databae pada userdata user
		// 				$this->session->set_userdata('pwd', $data['pwd']);
		// 				$this->session->set_userdata('id', $data['id_user']);
		// 				$this->session->set_userdata('mail', $data['mail']);
		// 				$this->session->set_userdata('level', $data['level_user']);
		// 				$this->session->set_flashdata('success', 'Selamat datang ' . $data['uname'] . " !");
		// 				redirect(base_url('user/beranda/'));
		// 			} else {
		// 				$this->session->set_flashdata('warning', 'Akses terbatas!'); //membuat flashdata dengan parameter warning
		// 				redirect(base_url('c_login/'));
		// 			}
		// 		} else {
		// 			$this->session->set_flashdata('warning', 'Silahkan Buka Email Anda Untuk Verifikasi Akun!'); //membuat flashdata dengan parameter warning
		// 			redirect(base_url('c_login/'));
		// 		}
		// 	} else {
		// 		$this->session->set_flashdata('warning', 'Akun Diblokir!'); //membuat flashdata dengan parameter warning
		// 		redirect(base_url('c_login/'));
		// 	}
		// } else {
		// 	$this->session->set_flashdata('warning', 'Username atau Password anda salah!'); //membuat flashdata dengan parameter warning
		// 	redirect(base_url('c_login/'));
		// }
		
		redirect(base_url('master/dashboard/'));
	}

	//logout akun
	public function logout()
	{
		// $this->session->sess_destroy(); //menghancurkan/menghilangkan session yang sudah dibuat ketika login
		redirect(base_url('login/'));
	}
}
