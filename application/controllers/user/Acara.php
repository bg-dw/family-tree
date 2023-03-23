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
    private $perPage = 8;
    public function index()
    {
        $count = $this->M_acara->get_data_acara()->num_rows();

        if (!empty($this->input->get('page'))) {
            $start = $this->perPage * intval($this->input->get('page'));
            $query = $this->M_acara->get_data_acara_limit($this->perPage, $start);
            $data['posts'] = $query->result();

            $q = $this->load->view('user/data_acara', $data);
            echo json_encode($q);

        } else {
            $start = 0;
            $query = $this->M_acara->get_data_acara_limit($this->perPage, $start);
            $data['content'] = 'user/v_acara';
            $data['total_post'] = $count;
            $data['posts'] = $query->result();

            $this->load->view('_layout/user/main', $data);
        }
    }
}