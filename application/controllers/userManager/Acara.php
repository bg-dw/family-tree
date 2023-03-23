<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once(dirname(__FILE__) . "/Renew.php");

class Acara extends Renew
{
	function __construct()
	{
		//akan berjalan ketika controller C_login di jalankan
		parent::__construct();
		$this->load->model('usm/M_acara');

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
		$data['content'] = 'user-manager/v_acara';
		$id = $this->session->userdata('id');
		$data['rec'] = $this->M_acara->get_data_acara($id)->result();
		$this->load->view('_layout/usm/main', $data);
	}

	//tambah acara
	public function add_acara()
	{
		$judul = $this->input->post('judul');
		$waktu = $this->input->post('waktu');
		$isi = $this->input->post('isi');

		$data = array(
			'id_user' => $this->session->userdata('id'),
			'nama_acara' => $judul,
			'waktu_acara' => $waktu,
			'isi_acara' => $isi,
			'create_at' => date('Y-m-d H:i:s'),
			'id_log' => $this->session->userdata('id'),
			'acc_admin' => "accept"
		);
		$q = $this->M_acara->db_input($data, 'tbl_acara');
		if ($q):
			$this->session->set_flashdata('success', ' Berhasil Disimpan!');
			redirect('acara-usm');
		else:
			$this->session->set_flashdata('warning', ' Gagal menyimpan data!');
			redirect('acara-usm');
		endif;
	}

	//upload foto
	function update_foto()
	{
		$id = $this->input->post('id_acara');
		$old = $this->input->post('old');
		$loc = './assets/img/acara/';
		$foto = $this->set_upload_banner('image', $loc); //input name,lokasi penempatan file,foto lama
		$where = array('id_acara' => $id);

		if (is_array($foto)):
			$data = array(
				'gambar_acara' => $foto['file_name'],
				'id_log' => $this->session->userdata('id')
			);
			$q = $this->M_acara->db_update($where, $data, 'tbl_acara');
			if ($q):
				if ($old) {
					unlink($loc . $old);
				}
				$this->session->set_flashdata('success', ' Foto Berhasil Diperbaharui!');
				redirect('acara-usm');
			else:
				$this->session->set_flashdata('warning', ' Gagal Memperbaharui Foto!');
				redirect('acara-usm');
			endif;
		else:
			$this->session->set_flashdata('error', $this->upload->display_errors());
			redirect('acara-usm');
		endif;
	}

	//get acara
	public function get_acara()
	{
		$id = $this->input->post('id_acara');
		$q = $this->M_acara->get_data_by($id)->row();
		echo json_encode($q);
	}

	//update acara
	public function update_acara()
	{
		$id = $this->input->post('id');
		$judul = $this->input->post('judul');
		$waktu = $this->input->post('waktu');
		$isi = $this->input->post('isi');

		$where = array('id_acara' => $id);
		$data = array(
			'nama_acara' => $judul,
			'waktu_acara' => $waktu,
			'isi_acara' => $isi,
			'id_log' => $this->session->userdata('id'),
			'acc_admin' => "accept"
		);
		$q = $this->M_acara->db_update($where, $data, 'tbl_acara');
		if ($q):
			$this->session->set_flashdata('success', ' Berhasil Disimpan!');
			redirect('acara-usm');
		else:
			$this->session->set_flashdata('warning', ' Gagal menyimpan data!');
			redirect('acara-usm');
		endif;
	}

	//hapus acara
	public function delete_acara()
	{
		$id = $this->input->post('id');
		$old = $this->input->post('old');
		$loc = './assets/img/acara/';
		$where = array('id_acara' => $id);
		$q = $this->M_acara->db_delete($where, 'tbl_acara');
		if ($q):
			if ($old):
				unlink($loc . $old);
			endif;
			$this->session->set_flashdata('success', ' Berhasil Dihapus!');
			redirect('acara-usm');
		else:
			$this->session->set_flashdata('warning', ' Gagal menghapus data!');
			redirect('acara-usm');
		endif;
	}
}