<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once(dirname(__FILE__) . "/Renew.php");

class Pengguna extends Renew
{
	function __construct()
	{
		//akan berjalan ketika controller C_login di jalankan
		parent::__construct();
		$this->load->model('usm/M_keluarga');

		if ($this->session->userdata('login') != 'acc') {
			redirect(base_url('login/')); //mengarahkan ke halaman master
		} elseif ($this->session->userdata('login') == 'acc' && $this->session->userdata('level') == 'um') {
			redirect(base_url('master-dashboard')); //mengarahkan ke halaman user
		} elseif ($this->session->userdata('login') == 'acc' && $this->session->userdata('level') == 'us') {
			redirect(base_url('dashboard-user')); //mengarahkan ke halaman user
		}
	}

	public function index()
	{
		$data['content'] = 'user-manager/v_pengguna';
		$where = array(
			'acc_admin' => 'accept',
			'u_level' => 'us',
		);
		$q = $this->M_keluarga->get_data_by($where, 'tbl_user');
		if ($q):
			$data['rec'] = $q->result();
		else:
			$this->session->set_flashdata('warning', ' Belum ada data!');
		endif;
		$this->load->view('_layout/usm/main', $data);
	}

	//tambah pengguna
	public function add_pengguna()
	{
		$nl = $this->input->post('nama_l');
		$nama = $this->input->post('nama');
		$jk = $this->input->post('jk');
		$loc = $this->input->post('tempat');
		$tgl = $this->input->post('tgl');
		$work = $this->input->post('pekerjaan');
		$addr = $this->input->post('alamat');
		$telp = $this->input->post('telp');
		$rt = $this->input->post('rt');
		$rw = $this->input->post('rw');
		$des = $this->input->post('desa');
		$kec = $this->input->post('kecamatan');
		$kab = $this->input->post('kabupaten');
		$prov = $this->input->post('prov');
		$level = $this->input->post('level');
		$user = $this->input->post('uname');
		$pwd = $this->input->post('pass');

		$data = array(
			'u_user' => $user,
			'u_pass' => $pwd,
			'u_level' => $level,
			'name' => $nl,
			'nick_name' => $nama,
			'sex' => $jk,
			'tempat_lahir' => $loc,
			'birth_date' => $tgl,
			'pekerjaan' => $work,
			'alamat' => $addr,
			'rt' => $rt,
			'rw' => $rw,
			'desa' => $des,
			'kec' => $kec,
			'kab' => $kab,
			'prov' => $prov,
			'telp' => $telp,
			'login' => "ban",
			'aksi' => "add",
			'create_at' => date('Y-m-d H:i:s'),
			'id_log' => $this->session->userdata('id'),
			'acc_admin' => "waiting"
		);
		$q = $this->M_keluarga->db_input($data, 'temp_tbl_user');
		if ($q):
			$this->session->set_flashdata('success', ' Berhasil Diajukan!');
			redirect('data-keluarga-usm-validasi');
		else:
			$this->session->set_flashdata('warning', ' Gagal menyimpan data!');
			redirect('data-keluarga-usm');
		endif;
	}

	public function get_user()
	{
		$id = $this->input->post('id_user');
		$where = array('id_user' => $id);
		$q = $this->M_keluarga->get_data_by($where, 'tbl_user')->row();
		echo json_encode($q);
	}


	//update pengguna
	public function update_pengguna()
	{
		$id = $this->input->post('id');
		$nl = $this->input->post('nama_l');
		$nama = $this->input->post('nama');
		$jk = $this->input->post('jk');
		$loc = $this->input->post('tempat');
		$tgl = $this->input->post('tgl');
		$work = $this->input->post('pekerjaan');
		$addr = $this->input->post('alamat');
		$telp = $this->input->post('telp');
		$rt = $this->input->post('rt');
		$rw = $this->input->post('rw');
		$des = $this->input->post('desa');
		$kec = $this->input->post('kecamatan');
		$kab = $this->input->post('kabupaten');
		$prov = $this->input->post('prov');
		$level = $this->input->post('level');
		$akses = $this->input->post('akses');
		$user = $this->input->post('uname');
		$pwd = $this->input->post('pass');

		$data = array(
			'id_user' => $id,
			'u_user' => $user,
			'u_pass' => $pwd,
			'u_level' => $level,
			'name' => $nl,
			'nick_name' => $nama,
			'sex' => $jk,
			'tempat_lahir' => $loc,
			'birth_date' => $tgl,
			'pekerjaan' => $work,
			'alamat' => $addr,
			'rt' => $rt,
			'rw' => $rw,
			'desa' => $des,
			'kec' => $kec,
			'kab' => $kab,
			'prov' => $prov,
			'telp' => $telp,
			'login' => $akses,
			'aksi' => "update",
			'create_at' => date('Y-m-d H:i:s'),
			'id_log' => $this->session->userdata('id'),
			'acc_admin' => "waiting"
		);
		$q = $this->M_keluarga->db_input($data, 'temp_tbl_user');
		if ($q):
			$this->session->set_flashdata('success', ' Berhasil Diajukan!');
			redirect('data-keluarga-usm-validasi');
		else:
			$this->session->set_flashdata('warning', ' Gagal menyimpan data!');
			redirect('data-keluarga-usm');
		endif;
	}

	//hapus pengguna
	public function delete_pengguna()
	{
		$id = $this->input->post('id');
		$where = array(
			'id_user' => $id,
			'aksi' => "delete",
			'u_level' => "us",
			'create_at' => date('Y-m-d H:i:s'),
			'id_log' => $this->session->userdata('id'),
			'acc_admin' => "waiting"
		);
		$q = $this->M_keluarga->db_input($where, 'temp_tbl_user');
		if ($q):
			$this->session->set_flashdata('success', ' Berhasil Diajukan!');
			redirect('data-keluarga-usm-validasi');
		else:
			$this->session->set_flashdata('warning', ' Gagal menghapus data!');
			redirect('data-keluarga-usm');
		endif;
	}
	function update_foto()
	{
		$id = $this->input->post('id_user');
		$loc = './assets/img/users/profile/';
		$foto = $this->set_upload('image', $loc); //input name,lokasi penempatan file,foto lama

		if (is_array($foto)):
			$data = array(
				'id_user' => $id,
				'u_pic' => $foto['file_name'],
				'aksi' => "update-foto",
				'u_level' => "us",
				'create_at' => date('Y-m-d H:i:s'),
				'id_log' => $this->session->userdata('id'),
				'acc_admin' => "waiting"
			);
			$q = $this->M_keluarga->db_input($data, 'temp_tbl_user');
			if ($q):
				$this->session->set_flashdata('success', ' Berhasil Diajukan!');
				redirect('data-keluarga-usm-validasi');
			else:
				$this->session->set_flashdata('warning', ' Gagal Memperbaharui Foto!');
				redirect('data-keluarga-usm');
			endif;
		else:
			$this->session->set_flashdata('error', $this->upload->display_errors());
			redirect('data-keluarga-usm');
		endif;
	}

	//menunggu validasi
	public function validasi()
	{
		$data['content'] = 'user-manager/v_validasi';
		$where = array(
			'acc_admin' => 'waiting',
			'u_level' => 'us',
			'id_log' => $this->session->userdata('id')
		);
		$q = $this->M_keluarga->get_data_by($where, 'temp_tbl_user');
		if ($q):
			$data['rec'] = $q->result();
		else:
			$this->session->set_flashdata('warning', ' Belum ada data!');
		endif;
		$this->load->view('_layout/usm/main', $data);
	}
}