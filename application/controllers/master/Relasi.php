<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Relasi extends CI_Controller
{
    function __construct()
    {
        //akan berjalan ketika controller C_login di jalankan
        parent::__construct();
        $this->load->model('M_keluarga');

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
        $data['content'] = 'master/v_relasi';
        $record = $this->M_keluarga->get_by();
        $q = $this->M_keluarga->get_data_relasi();
        $start = microtime(true);
        if ($q):
            $x = 0;
            foreach ($q->result() as $a) {
                //id_bio,id_user,gen,id_ibu,ibu,id_ayah,ayah,id_pasangan,pasangan
                $rel[$x]['id_bio'] = $a->id_bio;
                $rel[$x]['id_user'] = $a->id_user;
                $rel[$x]['nama'] = $a->name;
                $rel[$x]['id_ibu'] = $a->ibu;
                $rel[$x]['id_ayah'] = $a->ayah;
                $rel[$x]['id_pasangan'] = $a->pasangan;
                $rel[$x]['ibu'] = "";
                $rel[$x]['ayah'] = "";
                $rel[$x]['pasangan'] = "";
                foreach ($record->result() as $b) {
                    if ($a->ibu == $b->id_user) {
                        $rel[$x]['ibu'] = $b->name;
                    }
                    if ($a->ayah == $b->id_user) {
                        $rel[$x]['ayah'] = $b->name;
                    }
                    if ($a->pasangan == $b->id_user) {
                        $rel[$x]['pasangan'] = $b->name;
                    }
                }
                $x++;
            }
        else:
            $this->session->set_flashdata('error', ' Belum ada data!');
        endif;
        // var_dump($rel);
        $end = microtime(true);
        // echo "<br>";
        // echo "<br>";
        // echo "<br>";
        // echo "load : " . ($end - $start);
        $data['rec'] = $rel;
        $this->load->view('_layout/master/main', $data);
    }

}