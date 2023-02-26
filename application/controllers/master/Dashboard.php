<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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
		}
	}

	public function index()
	{
		$data['content'] = 'master/v_dashboard';
		// $where = array(
		//     'verifikasi' => 'done',
		//     'level_user' => 'usr'
		// );
		// $a = array();
		$this->load->view('_layout/master/main', $data);
	}

	public function get_fam()
	{
		// $data['kel'] = $this->M_keluarga->get_data_keluarga()->result();
		$t = $this->M_keluarga->get_data_keluarga()->result();
		foreach ($t as $x) {
			if ($x->generasi == "1") {
				$a[] = (object) array(
					'id' => intval($x->id_user),
					'gender' => $x->sex,
					'name' => $x->u_nama,
					'img' => base_url('assets/img/none2.png'),
					'pids' => [$x->pasangan]
				);
			} else {
				$a[] = (object) array(
					'id' => intval($x->id_user),
					'gender' => $x->sex,
					'name' => $x->u_nama,
					'pids' => [$x->pasangan],
					'img' => base_url('assets/img/none2.png'),
					'mid' => $x->ibu,
					'fid' => $x->ayah
				);
			}
		}
		echo json_encode($a);
	}

	//timeline
	public function timeline()
	{
		$data['content'] = 'master/v_timeline';
		$this->load->view('_layout/master/main', $data);
	}
}