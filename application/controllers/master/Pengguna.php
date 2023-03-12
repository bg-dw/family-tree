<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once(dirname(__FILE__) . "/Renew.php");

class Pengguna extends Renew
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
			$this->session->set_flashdata('warning', ' Belum ada data!');
		endif;
		$this->load->view('_layout/master/main', $data);
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
			'login' => "acc",
			'create_at' => date('Y-m-d H:i:s'),
			'id_log' => $this->session->userdata('id'),
			'acc_admin' => "accept"
		);
		$q = $this->M_keluarga->db_input($data, 'tbl_user');
		if ($q):
			$this->session->set_flashdata('success', ' Berhasil Disimpan!');
			redirect('master-data-keluarga');
		else:
			$this->session->set_flashdata('warning', ' Gagal menyimpan data!');
			redirect('master-data-keluarga');
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

		$where = array('id_user' => $id);

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
			'login' => $akses,
			'create_at' => date('Y-m-d H:i:s'),
			'id_log' => $this->session->userdata('id'),
			'acc_admin' => "accept"
		);
		$q = $this->M_keluarga->db_update($where, $data, 'tbl_user');
		if ($q):
			$this->session->set_flashdata('success', ' Berhasil Disimpan!');
			redirect('master-data-keluarga');
		else:
			$this->session->set_flashdata('warning', ' Gagal menyimpan data!');
			redirect('master-data-keluarga');
		endif;
	}

	//hapus pengguna
	public function delete_pengguna()
	{
		$id = $this->input->post('id');
		$old = $this->input->post('old');
		$loc = './assets/img/users/profile/';
		$where = array('id_user' => $id);
		$q = $this->M_keluarga->db_delete($where, 'tbl_user');
		if ($q):
			if ($old):
				unlink($loc . $old);
			endif;
			$this->session->set_flashdata('success', ' Berhasil Dihapus!');
			redirect('master-data-keluarga');
		else:
			$this->session->set_flashdata('warning', ' Gagal menghapus data!');
			redirect('master-data-keluarga');
		endif;
	}
	function update_foto()
	{
		$id = $this->input->post('id_user');
		$old = $this->input->post('old');
		$loc = './assets/img/users/profile/';
		$foto = $this->set_upload('image', $loc); //input name,lokasi penempatan file,foto lama
		$where = array('id_user' => $id);

		if (is_array($foto)):
			$data = array(
				'u_pic' => $foto['file_name'],
				'id_log' => $this->session->userdata('id')
			);
			$q = $this->M_profile->db_update($where, $data, 'tbl_user');
			if ($q):
				if ($old) {
					unlink($loc . $old);
				}
				$this->session->set_flashdata('success', ' Foto Berhasil Diperbaharui!');
				redirect('master-data-keluarga');
			else:
				$this->session->set_flashdata('warning', ' Gagal Memperbaharui Foto!');
				redirect('master-data-keluarga');
			endif;
		else:
			$this->session->set_flashdata('error', $this->upload->display_errors());
			redirect('master-data-keluarga');
		endif;
	}
}