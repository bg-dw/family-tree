<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Galeri extends CI_Controller
{
    function __construct()
    {
        //akan berjalan ketika controller C_login di jalankan
        parent::__construct();
        $this->load->model('usr/M_galeri');

        if ($this->session->userdata('login') != 'acc') {
            redirect(base_url('login/')); //mengarahkan ke halaman master
        } elseif ($this->session->userdata('login') == 'acc' && $this->session->userdata('level') == 'um') {
            redirect(base_url('master-dashboard')); //mengarahkan ke halaman user
        } elseif ($this->session->userdata('login') == 'acc' && $this->session->userdata('level') == 'usm') {
            redirect(base_url('dashboard-usm')); //mengarahkan ke halaman user
        }
    }

    private $perPage = 2;
    public function index()
    {
        if (!empty($this->input->get('page'))) {
            $start = $this->perPage * intval($this->input->get('page'));
            $query = $this->M_galeri->get_data_galeri_limit($this->perPage, $start);
            $data['posts'] = $query->result();

            $q = $this->load->view('user/data_galeri', $data);
            echo json_encode($q);

        } else {
            $start = 0;
            $tot = $this->M_galeri->sum_galeri()->row();
            $us = $this->M_galeri->get_data_galeri();
            $query = $this->M_galeri->get_data_galeri_limit($this->perPage, $start);
            $data['content'] = 'user/v_galeri';
            $data['posts'] = $query->result();
            $data['uploader'] = $us->result();
            $data['total'] = $tot->total;

            $this->load->view('_layout/user/main', $data);
        }
    }
}