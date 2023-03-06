<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna extends CI_Controller
{
	function __construct()
	{
		//akan berjalan ketika controller C_login di jalankan
		parent::__construct();
		$this->load->model('M_keluarga');

		if ($this->session->userdata('login') != 'acc') {
			redirect(base_url('login/')); //mengarahkan ke halaman master
		} elseif ($this->session->userdata('login') == 'acc' && $this->session->userdata('level') == 'us') {
			redirect(base_url('user/beranda')); //mengarahkan ke halaman user
		} elseif ($this->session->userdata('login') == 'acc' && $this->session->userdata('level') == 'usm') {
			redirect(base_url('user_manager/beranda')); //mengarahkan ke halaman user
		}
	}

	public function index()
	{
		$data['content'] = 'master/v_pengguna';
		$where = array('acc_admin' => 'accept');
		$q = $this->M_keluarga->get_data_by($where, 'tbl_user');
		if ($q):
			$data['rec'] = $q->result();
		else:
			$this->session->set_flashdata('error', ' Belum ada data!');
		endif;
		$this->load->view('_layout/master/main', $data);
	}
}