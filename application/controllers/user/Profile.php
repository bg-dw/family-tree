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

        if ($this->session->userdata('login') != 'acc') {
            redirect(base_url('login/')); //mengarahkan ke halaman login
        } elseif ($this->session->userdata('login') == 'acc' && $this->session->userdata('level') == 'um') {
            redirect(base_url('master-dashboard')); //mengarahkan ke halaman master
        } elseif ($this->session->userdata('login') == 'acc' && $this->session->userdata('level') == 'usm') {
            redirect(base_url('dashboard-usm')); //mengarahkan ke halaman usermanager
        }
    }

    public function index()
    {
        $data['content'] = 'user/v_profile';
        $this->load->view('_layout/user/main', $data);
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
                redirect('profile-us');
            else:
                $this->session->set_flashdata('error', ' Gagal Memperbaharui Foto!');
                redirect('profile-us');
            endif;
        else:
            $this->session->set_flashdata('error', $this->upload->display_errors());
            redirect('profile-us');
        endif;
    }
}