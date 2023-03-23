<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Galeri extends CI_Controller
{
    function __construct()
    {
        //akan berjalan ketika controller C_login di jalankan
        parent::__construct();
        $this->load->model('usm/M_galeri');

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
        $data['content'] = 'user-manager/v_galeri';
        $id = $this->session->userdata('id');
        $data['rec'] = $this->M_galeri->get_data_galeri($id)->result();
        $this->load->view('_layout/usm/main', $data);
    }

    //tambah portofolio
    public function add_galeri()
    {
        $x = $this->input->post('link');
        $link = explode("/", $x);

        $data = array(
            'id_user' => $this->session->userdata('id'),
            'media_galeri' => $link[3] . "/" . $link[4] . "/",
            'create_at' => date('Y-m-d H:i:s'),
            'id_log' => $this->session->userdata('id'),
            'acc_admin' => "accept"
        );
        $q = $this->M_galeri->db_input($data, 'tbl_galeri');
        if ($q):
            $this->session->set_flashdata('success', ' Berhasil Disimpan!');
            redirect('galeri-usm');
        else:
            $this->session->set_flashdata('warning', ' Gagal menyimpan data!');
            redirect('galeri-usm');
        endif;
    }
    public function update_galeri()
    {
        $id = $this->input->post('id_galeri');
        $x = $this->input->post('link');
        $link = explode("/", $x);

        $where = array('id_galeri' => $id);
        $data = array(
            'media_galeri' => $link[3] . "/" . $link[4] . "/",
            'id_log' => $this->session->userdata('id'),
            'acc_admin' => "accept"
        );
        $q = $this->M_galeri->db_update($where, $data, 'tbl_galeri');
        if ($q):
            $this->session->set_flashdata('success', ' Berhasil Disimpan!');
            redirect('galeri-usm');
        else:
            $this->session->set_flashdata('warning', ' Gagal menyimpan data!');
            redirect('galeri-usm');
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
            redirect('galeri-usm');
        else:
            $this->session->set_flashdata('warning', ' Gagal menghapus data!');
            redirect('galeri-usm');
        endif;
    }
}