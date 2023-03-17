<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Galeri extends CI_Controller
{
    function __construct()
    {
        //akan berjalan ketika controller C_login di jalankan
        parent::__construct();
        $this->load->model('M_galeri');

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
        $data['content'] = 'master/v_galeri';
        $data['rec'] = $this->M_galeri->get_data_galeri()->result();
        $this->load->view('_layout/master/main', $data);
    }

    //tambah portofolio
    public function add_galeri()
    {
        $media = $this->input->post('media');
        $link = $this->input->post('link');
        $judul = $this->input->post('judul');
        $isi = $this->input->post('isi');

        $data = array(
            'id_user' => $this->session->userdata('id'),
            'jenis_media' => $media,
            'media_galeri' => $link,
            'judul_galeri' => $judul,
            'isi_galeri' => $isi,
            'create_at' => date('Y-m-d H:i:s'),
            'id_log' => $this->session->userdata('id'),
            'acc_admin' => "accept"
        );
        $q = $this->M_galeri->db_input($data, 'tbl_galeri');
        if ($q):
            $this->session->set_flashdata('success', ' Berhasil Disimpan!');
            redirect('master-galeri');
        else:
            $this->session->set_flashdata('warning', ' Gagal menyimpan data!');
            redirect('master-galeri');
        endif;
    }
    public function update_galeri()
    {
        $id = $this->input->post('id_galeri');
        $media = $this->input->post('media');
        $x = $this->input->post('link');
        $judul = $this->input->post('judul');
        $isi = $this->input->post('isi');
        $link = explode("/", $x);

        $where = array('id_galeri' => $id);
        $data = array(
            'jenis_media' => $media,
            'media_galeri' => $link[3] . "/" . $link[4] . "/",
            'judul_galeri' => $judul,
            'isi_galeri' => $isi,
            'id_log' => $this->session->userdata('id'),
            'acc_admin' => "accept"
        );
        $q = $this->M_galeri->db_update($where, $data, 'tbl_galeri');
        if ($q):
            $this->session->set_flashdata('success', ' Berhasil Disimpan!');
            redirect('master-galeri');
        else:
            $this->session->set_flashdata('warning', ' Gagal menyimpan data!');
            redirect('master-galeri');
        endif;
    }

    //get galeri
    public function get_galeri()
    {
        $id = $this->input->post('id_galeri');
        $q = $this->M_galeri->get_data_by($id)->row();
        echo json_encode($q);
    }

    //hapus galeri
    public function delete_galeri()
    {
        $id = $this->input->post('id');
        $where = array('id_galeri' => $id);
        $q = $this->M_galeri->db_delete($where, 'tbl_galeri');
        if ($q):
            $this->session->set_flashdata('success', ' Berhasil Dihapus!');
            redirect('master-galeri');
        else:
            $this->session->set_flashdata('warning', ' Gagal menghapus data!');
            redirect('master-galeri');
        endif;
    }
}