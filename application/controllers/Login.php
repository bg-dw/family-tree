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
			redirect(base_url('dashboard-usm')); //mengarahkan ke halaman user
		} elseif ($this->session->userdata('login') == 'acc' && $this->session->userdata('level') == 'us') {
			redirect(base_url('dashboard-us')); //mengarahkan ke halaman user
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
		if ($query->num_rows() > 0):
			$data = $query->row_array(); //mengambil data dengan cara membuatnya menjadi array
			if ($data['login'] == 'acc'):
				if ($data['u_level'] == 'um'):
					$this->sesi($data);
					redirect(base_url('master-dashboard'));
				elseif ($data['u_level'] == 'usm'):
					$this->sesi($data);
					redirect(base_url('dashboard-usm'));
				elseif ($data['u_level'] == 'us'):
					$this->sesi($data);
					redirect(base_url('dashboard-us'));
				else:
					$this->session->set_flashdata('error', 'Akses terbatas!'); //membuat flashdata dengan parameter error
					redirect(base_url('login/'));
				endif;
			else:
				$this->session->set_flashdata('error', 'Tidak Diijinkan Masuk!'); //membuat flashdata dengan parameter error
				redirect(base_url('login/'));
			endif;
		else:
			$this->session->set_flashdata('error', 'Username atau Password anda salah!'); //membuat flashdata dengan parameter error
			redirect(base_url('login/'));
		endif;
	}

	function sesi($data)
	{
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
		$set = $this->session->set_userdata($isi);
		$this->session->set_flashdata('success', 'Selamat datang ' . $data['name'] . " !");
		return $set; //mengembalikan data dengan variable $isi
	}

	//logout akun
	public function logout()
	{
		$this->session->sess_destroy(); //menghancurkan/menghilangkan session yang sudah dibuat ketika login
		redirect(base_url('login/'));
	}
}