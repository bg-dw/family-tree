<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once(dirname(__FILE__) . "/Renew.php");
class Profile extends Renew
{
    function __construct()
    {
        //akan berjalan ketika controller C_login di jalankan
        parent::__construct();
        $this->load->model('M_profile');
        $this->load->model('M_keluarga');

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
        $data['content'] = 'master/v_profile';
        $this->load->view('_layout/master/main', $data);
    }

    //update profile
    public function update()
    {
        $nm_l = $this->input->post('nama_l');
        $nm = $this->input->post('nama_p');
        $jk = $this->input->post('jk');
        $born = $this->input->post('born');
        $tgl = $this->input->post('tgl');
        $work = $this->input->post('pekerjaan');
        $telp = $this->input->post('telp');
        $addr = $this->input->post('alamat');
        $rt = $this->input->post('rt');
        $rw = $this->input->post('rw');
        $ds = $this->input->post('desa');
        $kec = $this->input->post('kec');
        $kab = $this->input->post('kab');
        $prov = $this->input->post('prov');

        $where = array('id_user' => $this->session->userdata('id'));

        $data = array(
            'name' => $nm_l,
            'nick_name' => $nm,
            'sex' => $jk,
            'tempat_lahir' => $born,
            'birth_date' => $tgl,
            'pekerjaan' => $work,
            'alamat' => $addr,
            'rt' => $rt,
            'rw' => $rw,
            'desa' => $ds,
            'kec' => $kec,
            'kab' => $kab,
            'prov' => $prov,
            'telp' => $telp,
            'id_log' => $this->session->userdata('id')
        );
        if ($this->session->userdata('id') != ""):
            $q = $this->M_profile->db_update($where, $data, 'tbl_user');
            if ($q):
                $this->session->set_flashdata('success', ' Data Berhasil Diperbaharui!');
                $this->new_ses($this->session->userdata('id'));
                redirect('master-profile');
            else:
                $this->session->set_flashdata('error', ' Gagal Memperbaharui Data!');
                redirect('master-profile');
            endif;
        else:
            $this->session->set_flashdata('error', ' Gagal Memperbaharui Data!');
            redirect('master-profile');
        endif;
    }

    public function update_username()
    {
        $nm = $this->input->post('u_baru');

        $where = array('id_user' => $this->session->userdata('id'));

        $data = array(
            'u_user' => $nm,
            'id_log' => $this->session->userdata('id')
        );
        if ($this->session->userdata('id') != ""):
            $q = $this->M_profile->db_update($where, $data, 'tbl_user');
            if ($q):
                $this->session->set_flashdata('success', ' Data Berhasil Diperbaharui!');
                redirect('logout');
            else:
                $this->session->set_flashdata('error', ' Gagal Memperbaharui Data!');
                redirect('master-dashboard');
            endif;
        else:
            $this->session->set_flashdata('error', ' Gagal Memperbaharui Data!');
            redirect('master-dashboard');
        endif;
    }

    //update password
    public function update_password()
    {
        $pwd = $this->input->post('pwd');

        $where = array('id_user' => $this->session->userdata('id'));

        $data = array(
            'u_pass' => $pwd,
            'id_log' => $this->session->userdata('id')
        );
        if ($this->session->userdata('id') != ""):
            $q = $this->M_profile->db_update($where, $data, 'tbl_user');
            if ($q):
                $this->session->set_flashdata('success', ' Data Berhasil Diperbaharui!');
                redirect('logout');
            else:
                $this->session->set_flashdata('error', ' Gagal Memperbaharui Data!');
                redirect('master-dashboard');
            endif;
        else:
            $this->session->set_flashdata('error', ' Gagal Memperbaharui Data!');
            redirect('master-dashboard');
        endif;
    }

    //update foto profile
    function update_foto()
    {
        $old = $this->input->post('old');
        $loc = './assets/img/users/profile/';
        $foto = $this->set_upload('image', $loc); //input name,lokasi penempatan file,foto lama
        $where = array('id_user' => $this->session->userdata('id'));

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
                $this->new_ses($this->session->userdata('id'));
                redirect('master-profile');
            else:
                $this->session->set_flashdata('error', ' Gagal Memperbaharui Foto!');
                redirect('master-profile');
            endif;
        else:
            $this->session->set_flashdata('error', $this->upload->display_errors());
            redirect('master-profile');
        endif;
    }
}