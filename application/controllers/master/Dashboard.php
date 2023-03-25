<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	function __construct()
	{
		//akan berjalan ketika controller C_login di jalankan
		parent::__construct();
		$this->load->model('M_keluarga');

		$data['val_data'] = $this->M_keluarga->get_count_kel('temp_tbl_user')->row();
		$data['val_hub'] = $this->M_keluarga->get_count_hub('temp_tbl_user_bio')->row();
		if ($this->session->userdata('login') != 'acc') {
			redirect(base_url('login/')); //mengarahkan ke halaman master
		} elseif ($this->session->userdata('login') == 'acc' && $this->session->userdata('level') == 'us') {
			redirect(base_url('dashboard-user')); //mengarahkan ke halaman user
		} elseif ($this->session->userdata('login') == 'acc' && $this->session->userdata('level') == 'usm') {
			redirect(base_url('dashboard-usm')); //mengarahkan ke halaman user manager
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
		$t = $this->M_keluarga->get_data_keluarga()->result();
		foreach ($t as $x) {
			if ($x->u_pic != ""):
				$img = base_url("assets/img/users/profile/" . $x->u_pic);
			else:
				$img = base_url("assets/img/users/none.png");
			endif;
			if ($x->generasi == "1"):
				$a[] = (object) array(
					'id' => intval($x->id_user),
					'gender' => $x->sex,
					'name' => $x->name,
					'img' => $img,
					'pids' => [$x->pasangan]
				);
			else:
				$a[] = (object) array(
					'id' => intval($x->id_user),
					'gender' => $x->sex,
					'name' => $x->name,
					'pids' => [$x->pasangan],
					'img' => $img,
					'mid' => $x->ibu,
					'fid' => $x->ayah
				);
			endif;
		}
		echo json_encode($a);
	}

	//cek username
	public function get_my()
	{
		$id = $this->input->post('id');
		$user = $this->input->post('uname');
		$where = array(
			'id_user' => $id,
			'u_user' => $user
		);
		$q = $this->M_keluarga->get_data_by($where, 'tbl_user')->result();
		if (count($q) >= 1) {
			echo json_encode(1);
		} else {
			echo json_encode(0);
		}
	}
	public function get_uname()
	{
		$user = $this->input->post('uname');
		$where = array(
			'u_user' => $user
		);
		$q = $this->M_keluarga->get_data_by($where, 'tbl_user')->result();
		if (count($q) >= 1) {
			echo json_encode(1);
		} else {
			echo json_encode(0);
		}
	}
}