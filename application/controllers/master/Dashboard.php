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
		} elseif ($this->session->userdata('login') == 'acc' && $this->session->userdata('level') == 'usm') {
			redirect(base_url('user_manager/beranda')); //mengarahkan ke halaman user
		}
	}

	public function index()
	{
		$data['content'] = 'master/v_dashboard';
		$data['all'] = $this->M_keluarga->get_count_tot('tbl_user')->row();
		$data['male'] = $this->M_keluarga->get_count_male('tbl_user')->row();
		$data['female'] = $this->M_keluarga->get_count_female('tbl_user')->row();
		$data['gen'] = $this->M_keluarga->get_count_gen('tbl_user_bio')->row();
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
					'name' => $x->name,
					'img' => base_url('assets/img/none2.png'),
					'pids' => [$x->pasangan]
				);
			} else {
				$a[] = (object) array(
					'id' => intval($x->id_user),
					'gender' => $x->sex,
					'name' => $x->name,
					'pids' => [$x->pasangan],
					'img' => base_url('assets/img/none2.png'),
					'mid' => $x->ibu,
					'fid' => $x->ayah
				);
			}
		}
		echo json_encode($a);
	}

	//cek username
	public function get_uname()
	{
		$user = $this->input->post('uname');
		$where = array('u_user' => $user);
		$q = $this->M_keluarga->get_data_by($where, 'tbl_user')->result();
		if (count($q) >= 1) {
			echo json_encode(1);
		} else {
			echo json_encode(0);
		}
	}
}