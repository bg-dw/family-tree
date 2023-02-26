<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	function __construct()
	{
		//akan berjalan ketika controller login di jalankan
		parent::__construct();
		$this->load->model('M_login');
	}

	public function index()
	{
		if ($this->session->userdata('login') == 'acc' && $this->session->userdata('level') == 'um') {
			redirect(base_url('master/beranda/')); //mengarahkan ke halaman master
		} elseif ($this->session->userdata('login') == 'acc' && $this->session->userdata('level') == 'us') {
			redirect(base_url('user/beranda')); //mengarahkan ke halaman user
		}

		$this->load->view('login/v_login');

		// menghancurkan/menghilangkan session yang sudah dibuat ketika login
		$this->session->sess_destroy();
	}

	//cek username dan password login
	public function auth()
	{
		$uname = $this->input->post('uname');
		$pwd = $this->input->post('upass');

		$query = $this->M_login->cek_db($uname, $pwd); //memanggil fungsi cek_db dari model M_login dengan parameter $uname , $pwd
		if ($query->num_rows() > 0) {
			$data = $query->row_array(); //mengambil data dengan cara membuatnya menjadi array
			if ($data['login'] == 'acc') {
				if ($data['u_level'] == 'um') {
					$this->session->set_userdata('login', 'acc'); //memberikan nilai TRUE pada userdata login
					$this->session->set_userdata('nama', $data['nick_name']); //memberikan nilai yang di ambil dari databae pada userdata user
					$this->session->set_userdata('pwd', $data['u_pass']);
					$this->session->set_userdata('id', $data['id_user']);
					$this->session->set_userdata('level', $data['u_level']);
					$this->session->set_flashdata('success', 'Selamat datang ' . $data['u_nama'] . " !");
					redirect(base_url('master/dashboard/'));
				} elseif ($data['u_level'] == 'us') {
					$this->session->set_userdata('login', TRUE); //memberikan nilai TRUE pada userdata login
					$this->session->set_userdata('user', $data['uname']); //memberikan nilai yang di ambil dari databae pada userdata user
					$this->session->set_userdata('pwd', $data['pwd']);
					$this->session->set_userdata('id', $data['id_user']);
					$this->session->set_userdata('mail', $data['mail']);
					$this->session->set_userdata('level', $data['level_user']);
					$this->session->set_flashdata('success', 'Selamat datang ' . $data['uname'] . " !");
					redirect(base_url('user/beranda/'));
				} else {
					$this->session->set_flashdata('error', 'Akses terbatas!'); //membuat flashdata dengan parameter error
					redirect(base_url('login/'));
				}
			} else {
				$this->session->set_flashdata('error', 'Tidak Diijinkan Masuk!'); //membuat flashdata dengan parameter error
				redirect(base_url('login/'));
			}
		} else {
			$this->session->set_flashdata('error', 'Username atau Password anda salah!'); //membuat flashdata dengan parameter error
			redirect(base_url('login/'));
		}
	}

	//logout akun
	public function logout()
	{
		$this->session->sess_destroy(); //menghancurkan/menghilangkan session yang sudah dibuat ketika login
		redirect(base_url('login/'));
	}
}