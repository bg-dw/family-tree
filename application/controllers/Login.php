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
			redirect(base_url('master-dashboard')); //mengarahkan ke halaman master
		} elseif ($this->session->userdata('login') == 'acc' && $this->session->userdata('level') == 'usm') {
			redirect(base_url('user_manager/dashboard')); //mengarahkan ke halaman user
		} elseif ($this->session->userdata('login') == 'acc' && $this->session->userdata('level') == 'us') {
			redirect(base_url('user/dashboard')); //mengarahkan ke halaman user
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
					$isi = array(
						'login' => 'acc',
						'id' => $data['id_user'],
						'user' => $data['u_user'],
						'upass' => $data['u_pass'],
						'level' => $data['u_level'],
						'pic' => $data['u_pic'],
						'nama' => $data['nick_name'],
						'nama_l' => $data['name'],
						'sex' => $data['sex'],
						'born' => $data['tempat_lahir'],
						'date' => $data['birth_date'],
						'work' => $data['pekerjaan'],
						'telp' => $data['telp'],
						'addr' => $data['alamat'],
						'rt' => $data['rt'],
						'rw' => $data['rw'],
						'desa' => $data['desa'],
						'kec' => $data['kec'],
						'kab' => $data['kab'],
						'prov' => $data['prov']
					); //memberikan nilai yang di ambil dari databae pada userdata user
					$this->session->set_userdata($isi);
					$this->session->set_flashdata('success', 'Selamat datang ' . $data['name'] . " !");
					redirect(base_url('master-dashboard'));
				} elseif ($data['u_level'] == 'us') {
					$this->session->set_userdata('login', TRUE); //memberikan nilai TRUE pada userdata login
					$this->session->set_userdata('user', $data['uname']); //memberikan nilai yang di ambil dari databae pada userdata user
					$this->session->set_userdata('pwd', $data['pwd']);
					$this->session->set_userdata('id', $data['id_user']);
					$this->session->set_userdata('mail', $data['mail']);
					$this->session->set_userdata('level', $data['level_user']);
					$this->session->set_flashdata('success', 'Selamat datang ' . $data['uname'] . " !");
					redirect(base_url('user/dashboard/'));
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