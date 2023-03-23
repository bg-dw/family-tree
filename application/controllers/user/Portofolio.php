<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Portofolio extends CI_Controller
{
    function __construct()
    {
        //akan berjalan ketika controller C_login di jalankan
        parent::__construct();
        $this->load->model('usr/M_porto');

        if ($this->session->userdata('login') != 'acc') {
            redirect(base_url('login/')); //mengarahkan ke halaman master
        } elseif ($this->session->userdata('login') == 'acc' && $this->session->userdata('level') == 'um') {
            redirect(base_url('master-dashboard')); //mengarahkan ke halaman user
        } elseif ($this->session->userdata('login') == 'acc' && $this->session->userdata('level') == 'usm') {
            redirect(base_url('dashboard-usm')); //mengarahkan ke halaman user
        }
    }
    private $perPage = 6;

    public function index()
    {
        $count = $this->M_porto->get_data_porto()->num_rows();

        if (!empty($this->input->get('page'))) {
            $start = $this->perPage * intval($this->input->get('page'));
            $query = $this->M_porto->get_data_porto_limit($this->perPage, $start);
            $data['posts'] = $query->result();

            $q = $this->load->view('user/data', $data);
            echo json_encode($q);

        } else {
            $start = 0;
            $query = $this->M_porto->get_data_porto_limit($this->perPage, $start);
            $data['content'] = 'user/v_portofolio';
            $data['total_post'] = $count;
            $data['posts'] = $query->result();

            $this->load->view('_layout/user/main', $data);
        }
    }
}