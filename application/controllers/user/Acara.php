<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Acara extends CI_Controller
{
    function __construct()
    {
        //akan berjalan ketika controller C_login di jalankan
        parent::__construct();
        $this->load->model('usr/M_acara');

        if ($this->session->userdata('login') != 'acc') {
            redirect(base_url('login/')); //mengarahkan ke halaman master
        } elseif ($this->session->userdata('login') == 'acc' && $this->session->userdata('level') == 'um') {
            redirect(base_url('master-dashboard')); //mengarahkan ke halaman user
        } elseif ($this->session->userdata('login') == 'acc' && $this->session->userdata('level') == 'usm') {
            redirect(base_url('dashboard-usm')); //mengarahkan ke halaman user
        }
    }

    public function index()
    {
        $data['content'] = 'user/v_acara';
        $data['rec'] = $this->M_acara->get_data_acara()->result();
        $this->load->view('_layout/user/main', $data);
    }
}