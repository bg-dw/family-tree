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
    function set_upload($foto, $loc)
    {
        $config['upload_path'] = $loc; //path folder
        $config['allowed_types'] = 'jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload
        $config['overwrite'] = TRUE; //timpa file dengan file baru
        $config['max_size'] = 2048; // batas ukuran file: 2MB
        $config['max_width'] = 1920; // batas lebar gambar dalam piksel
        $config['max_height'] = 1080; // batas tinggi gambar dalam piksel
        $config['width'] = 400;
        $config['height'] = 400;

        $this->upload->initialize($config);
        if (!empty($_FILES[$foto]['name'])) {

            if ($this->upload->do_upload($foto)) {
                $gbr = $this->upload->data();

                //Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = $loc . $gbr['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['quality'] = '50%';
                $config['new_image'] = $loc . $gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                return $gbr;
            } else {
                return $this->upload->display_errors();
            }
        } else {
            $this->session->set_flashdata('error', ' Gambar kosong!');
        }
    }

    //foto banner 600x400
    function set_upload_banner($foto, $loc)
    {
        $config['upload_path'] = $loc; //path folder
        $config['allowed_types'] = 'jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload
        $config['overwrite'] = TRUE; //timpa file dengan file baru
        $config['max_size'] = 2048; // batas ukuran file: 2MB
        $config['max_width'] = 1920; // batas lebar gambar dalam piksel
        $config['max_height'] = 1080; // batas tinggi gambar dalam piksel
        $config['width'] = 600;
        $config['height'] = 400;

        $this->upload->initialize($config);
        if (!empty($_FILES[$foto]['name'])) {

            if ($this->upload->do_upload($foto)) {
                $gbr = $this->upload->data();

                //Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = $loc . $gbr['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['quality'] = '50%';
                $config['new_image'] = $loc . $gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                return $gbr;
            } else {
                return $this->upload->display_errors();
            }
        } else {
            $this->session->set_flashdata('error', ' Gambar kosong!');
        }
    }

}