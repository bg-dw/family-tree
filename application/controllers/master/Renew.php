<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Renew extends CI_Controller
{
    function __construct()
    {
        //akan berjalan ketika controller login di jalankan
        parent::__construct();
        $this->load->model('M_profile');
    }
    //logout akun
    public function new_ses($id)
    {
        $where = array(
            'id_user' => $id
        );
        $query = $this->M_profile->get_data_by($where, 'tbl_user');
        if ($query->num_rows() > 0):
            $data = $query->row_array(); //mengambil data dengan cara membuatnya menjadi array
            $isi = array(
                'login' => 'acc',
                'id' => $data['id_user'],
                'user' => $data['u_user'],
                'upass' => $data['u_pass'],
                'level' => $data['u_level'],
                'pic' => $data['u_pic'],
                'nama' => $data['nick_name'],
                'nama_l' => $data['name'],
                'sex' => $data['sex'],
                'born' => $data['tempat_lahir'],
                'date' => $data['birth_date'],
                'work' => $data['pekerjaan'],
                'telp' => $data['telp'],
                'addr' => $data['alamat'],
                'rt' => $data['rt'],
                'rw' => $data['rw'],
                'desa' => $data['desa'],
                'kec' => $data['kec'],
                'kab' => $data['kab'],
                'prov' => $data['prov']
            ); //memberikan nilai yang di ambil dari databae pada userdata user
            return $this->session->set_userdata($isi);
        endif;
    }
}