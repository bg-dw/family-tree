<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once(dirname(__FILE__) . "/Renew.php");

class Portofolio extends Renew
{
    function __construct()
    {
        //akan berjalan ketika controller C_login di jalankan
        parent::__construct();
        $this->load->model('usm/M_porto');

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
        $data['content'] = 'user-manager/v_portofolio';
        $id = $this->session->userdata('id');
        $data['rec'] = $this->M_porto->get_data_porto($id)->result();
        $this->load->view('_layout/usm/main', $data);
    }

    //tambah portofolio
    public function add_porto()
    {
        $judul = $this->input->post('judul');
        $isi = $this->input->post('isi');

        $data = array(
            'id_user' => $this->session->userdata('id'),
            'judul_porto' => $judul,
            'isi_porto' => $isi,
            'create_at' => date('Y-m-d H:i:s'),
            'id_log' => $this->session->userdata('id'),
            'acc_admin' => "accept"
        );
        $q = $this->M_porto->db_input($data, 'tbl_portofolio');
        if ($q):
            $this->session->set_flashdata('success', ' Berhasil Disimpan!');
            redirect('portofolio-usm');
        else:
            $this->session->set_flashdata('warning', ' Gagal menyimpan data!');
            redirect('portofolio-usm');
        endif;
    }

    //upload foto
    function update_foto()
    {
        $id = $this->input->post('id_porto');
        $old = $this->input->post('old');
        $loc = './assets/img/porto/';
        $foto = $this->set_upload_banner('image', $loc); //input name,lokasi penempatan file,foto lama
        $where = array('id_porto' => $id);

        if (is_array($foto)):
            $data = array(
                'gambar_porto' => $foto['file_name'],
                'id_log' => $this->session->userdata('id')
            );
            $q = $this->M_porto->db_update($where, $data, 'tbl_portofolio');
            if ($q):
                if ($old) {
                    unlink($loc . $old);
                }
                $this->session->set_flashdata('success', ' Foto Berhasil Diperbaharui!');
                redirect('portofolio-usm');
            else:
                $this->session->set_flashdata('warning', ' Gagal Memperbaharui Foto!');
                redirect('portofolio-usm');
            endif;
        else:
            $this->session->set_flashdata('error', $this->upload->display_errors());
            redirect('portofolio-usm');
        endif;
    }
    //update portofolio
    public function update_porto()
    {
        $id = $this->input->post('id_porto');
        $judul = $this->input->post('judul');
        $isi = $this->input->post('isi');

        $where = array('id_porto' => $id);
        $data = array(
            'judul_porto' => $judul,
            'isi_porto' => $isi,
            'id_log' => $this->session->userdata('id'),
            'acc_admin' => "accept"
        );
        $q = $this->M_porto->db_update($where, $data, 'tbl_portofolio');
        if ($q):
            $this->session->set_flashdata('success', ' Berhasil Disimpan!');
            redirect('portofolio-usm');
        else:
            $this->session->set_flashdata('warning', ' Gagal menyimpan data!');
            redirect('portofolio-usm');
        endif;
    }


    //get porto
    public function get_porto()
    {
        $id = $this->input->post('id_porto');
        $q = $this->M_porto->get_data_by($id)->row();
        echo json_encode($q);
    }

    //hapus porto
    public function delete_porto()
    {
        $id = $this->input->post('id');
        $old = $this->input->post('old');
        $loc = './assets/img/porto/';
        $where = array('id_porto' => $id);
        $q = $this->M_porto->db_delete($where, 'tbl_portofolio');
        if ($q):
            if ($old):
                unlink($loc . $old);
            endif;
            $this->session->set_flashdata('success', ' Berhasil Dihapus!');
            redirect('portofolio-usm');
        else:
            $this->session->set_flashdata('warning', ' Gagal menghapus data!');
            redirect('portofolio-usm');
        endif;
    }
}