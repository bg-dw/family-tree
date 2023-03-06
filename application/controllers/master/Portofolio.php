<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Portofolio extends CI_Controller
{
    function __construct()
    {
        //akan berjalan ketika controller C_login di jalankan
        parent::__construct();
        $this->load->model('M_porto');

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
        $data['content'] = 'master/v_portofolio';
        $data['rec'] = $this->M_porto->get_data_porto()->result();
        $this->load->view('_layout/master/main', $data);
    }
}