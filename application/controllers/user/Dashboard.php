<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	function __construct()
	{
		//akan berjalan ketika controller C_login di jalankan
		parent::__construct();
		$this->load->model('usr/M_keluarga');

		if ($this->session->userdata('login') != 'acc') {
			redirect(base_url('login/')); //mengarahkan ke halaman login
		} elseif ($this->session->userdata('login') == 'acc' && $this->session->userdata('level') == 'um') {
			redirect(base_url('master-dashboard')); //mengarahkan ke halaman master
		} elseif ($this->session->userdata('login') == 'acc' && $this->session->userdata('level') == 'usm') {
			redirect(base_url('dashboard-usm')); //mengarahkan ke halaman user manager
		}
	}

	public function index()
	{
		$data['content'] = 'user/v_dashboard';
		$data['all'] = $this->M_keluarga->get_count_tot('tbl_user')->row();
		$data['male'] = $this->M_keluarga->get_count_male('tbl_user')->row();
		$data['female'] = $this->M_keluarga->get_count_female('tbl_user')->row();
		$data['gen'] = $this->M_keluarga->get_count_gen('tbl_user_bio')->row();
		$this->load->view('_layout/user/main', $data);
	}

	public function get_fam()
	{
		$t = $this->M_keluarga->get_data_keluarga()->result();
		$kep = $this->M_keluarga->get_data_kepkel()->result();
		$ibu = $this->M_keluarga->get_data_pasangan()->result();
		$anak = $this->M_keluarga->get_data_anak()->result();


		$link = array();
		$unions = "";
		$links = "";
		foreach ($kep as $row) {//kepala keluarga
			array_push($link, array($row->id_user, "un" . $row->id_user));//link ayah ke union
			$links .= '["' . $row->id_user . '",' . '"un' . $row->id_user . '"],';
			foreach ($ibu as $bar) {//pasangan
				if ($row->id_user == $bar->id_user)://jika user merupakan pasangan dari kepala keluarga
					array_push($link, array($bar->pasangan, "un" . $row->id_user));//link ibu ke union
					$links .= '["' . $bar->pasangan . '",' . '"un' . $row->id_user . '"],';
					$temp_anak = [];
					$temp_id = "";
					foreach ($anak as $s) {//anak
						if ($bar->pasangan == $s->ibu)://jika user merupakan anak dari ibu
							$temp_anak[] = $s->id_user;
							$temp_id = $s->id_user;
							$links .= '["un' . $row->id_user . '",' . '"' . $s->id_user . '"],';
						endif;
					}
					$child = "";
					for ($i = 0; $i < count($temp_anak); $i++) {
						$child .= '"' . $temp_anak[$i] . '",';
					}
					$unions .= '"un' . $row->id_user . '":{"id":"un' . $row->id_user . '","partner":["' . $row->id_user . '","' . $bar->pasangan . '"],"children":[' . $child . ']},';
					array_push($link, array("un" . $row->id_user, $temp_id));//link union ke anak
				endif;
			}
		}

		$start = "";
		$person = "";
		foreach ($t as $x) {//menginisialisasi variable person
			$own_union = "";
			$prnt_union = "";
			for ($b = 0; $b < count($link); $b++) {
				if ($x->id_user == $link[$b][0]):
					$own_union .= '"' . $link[$b][1] . '"';
				endif;
				if ($x->id_user == $link[$b][1]):
					$prnt_union .= '"' . $link[$b][0] . '"';
				endif;
			}
			if ($x->generasi == "1"):
				$start = '"' . $x->id_user . '"';
				$person .= '"' . $x->id_user . '":{"id":"' . $x->id_user . '","name":"' . $x->name . '","birthyear":' . $x->year . ',"own_unions":[' . $own_union . '],"parent_union":[]},';
			else:
				$person .= '"' . $x->id_user . '":{"id":"' . $x->id_user . '","name":"' . $x->name . '","birthyear":' . $x->year . ',"own_unions":[' . $own_union . '],"parent_union":[]},';
			endif;
		}

		$pembuka = 'data = {"start":' . $start . ',';
		$ps = '"persons":{' . $person . '},';
		$un = '"unions":{' . $unions . '},';
		$lin = '"links":[' . $links . ']';
		$penutup = '}';
		$script = $pembuka . $ps . $un . $lin . $penutup;
		$fileName = './assets/bundles/ftree/' . "data.js";
		file_put_contents($fileName, $script);
		echo json_encode($link);
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