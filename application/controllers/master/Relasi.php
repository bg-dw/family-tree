<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Relasi extends CI_Controller
{
    function __construct()
    {
        //akan berjalan ketika controller C_login di jalankan
        parent::__construct();
        $this->load->model('M_keluarga');
        $this->load->model('M_relasi');

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
        // $start = microtime(true);
        if ($q):
            $x = 0;
            foreach ($q->result() as $a) {
                //id_bio,id_user,gen,id_ibu,ibu,id_ayah,ayah,id_pasangan,pasangan
                $rel[$x]['id_bio'] = $a->id_bio;
                $rel[$x]['id_user'] = $a->id_user;
                $rel[$x]['nama'] = $a->name;
                $rel[$x]['sex'] = $a->sex;
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
        // $end = microtime(true);
        $data['rec'] = $rel;
        $this->load->view('_layout/master/main', $data);
    }

    //mendapatkan data user
    public function get_user()
    {
        $col = "id_user,name,nick_name,sex";
        $q = $this->M_relasi->get_data_col('tbl_user', $col)->result();
        $data = '<option value="">--Pilih User--</option>';
        foreach ($q as $row):
            $data .= '<option value="' . $row->id_user . "," . $row->sex . '">' . $row->name . " [ " . $row->nick_name . " ]" . '</option>';
        endforeach;
        echo json_encode($data);
    }

    //mendapatakan data pasangan
    public function get_pasangan()
    {
        $id_awal = $this->input->post('id_user');
        $id = explode(',', $id_awal);
        $col = "id_user,name,nick_name,sex";
        if ($id[1] == "male"):
            $sex = "female";
        else:
            $sex = "male";
        endif;
        $where = array('sex' => $sex); //mendapatkan lawan jenis

        $q = $this->M_relasi->get_data_col_where('tbl_user', $col, $where)->result();
        $data = '<option value="">--Pilih Pasangan--</option>';
        foreach ($q as $row):
            $data .= '<option value="' . $row->id_user . '">' . $row->name . " [ " . $row->nick_name . " ]" . '</option>';
        endforeach;
        echo json_encode($data);
    }

    //mendapatkan data bapak atau ibuk
    public function get_ortu()
    {
        $id_awal = $this->input->post('id_user');
        $id = explode(',', $id_awal);
        $sex = $this->input->post('jk');

        $q = $this->M_relasi->get_data_ortu($sex)->result();
        $data = "";
        if ($sex == "male"):
            $data = '<option value="">--Pilih Ayah--</option>';
        else:
            $data = '<option value="">--Pilih Ibu--</option>';
        endif;
        foreach ($q as $row):
            if ($row->id_user != $id[0]):
                $data .= '<option value="' . $row->id_user . '">' . $row->name . " [ " . $row->nick_name . " ] Gen-" . $row->generasi . '</option>';
            endif;
        endforeach;
        echo json_encode($data);
    }

    //tambah relasi
    public function add_relasi()
    {
        $id_awal = $this->input->post('id_user');
        $id = explode(',', $id_awal);
        $id_pas = $this->input->post('id_pasangan');
        $id_ibu = $this->input->post('id_ibu');
        $gen_ibu = $this->input->post('gen_ibu');
        $id_ayah = $this->input->post('id_ayah');
        $gen_ayah = $this->input->post('gen_ayah');

        if ($id_awal):
            $gen = "1";
            if ($gen_ibu != ""):
                $gen = $gen_ibu + 1;
            elseif ($gen_ayah != ""):
                $gen = $gen_ayah + 1;
            endif;
            $data = array(
                'id_user' => $id[0],
                'generasi' => $gen,
                'ibu' => $id_ibu,
                'ayah' => $id_ayah,
                'pasangan' => $id_pas,
                'create_at' => date('Y-m-d H:i:s'),
                'id_log' => $this->session->userdata('id'),
                'acc_admin' => "accept"
            );
            $q = $this->M_relasi->db_input($data, 'tbl_user_bio');
            if ($q):
                $this->session->set_flashdata('success', ' Berhasil Disimpan!');
                redirect('master/relasi/');
            else:
                $this->session->set_flashdata('error', ' Gagal menyimpan data!');
                redirect('master/relasi/');
            endif;
        else:
            $this->session->set_flashdata('error', ' Harap isi form dengan benar!');
            redirect('master/relasi/');
        endif;
    }

    //update relasi
    public function update_relasi()
    {
        $id_bio = $this->input->post('id_bio');
        $id_pas = $this->input->post('id_pasangan');
        $id_ibu = $this->input->post('id_ibu');
        $gen_ibu = $this->input->post('gen_ibu');
        $id_ayah = $this->input->post('id_ayah');
        $gen_ayah = $this->input->post('gen_ayah');

        if ($id_bio):
            $gen = "1";
            if ($gen_ibu != ""):
                $gen = $gen_ibu + 1;
            elseif ($gen_ayah != ""):
                $gen = $gen_ayah + 1;
            endif;
            $where = array('id_bio' => $id_bio);
            $data = array(
                'generasi' => $gen,
                'ibu' => $id_ibu,
                'ayah' => $id_ayah,
                'pasangan' => $id_pas,
                'id_log' => $this->session->userdata('id'),
                'acc_admin' => "accept"
            );
            $q = $this->M_relasi->db_update($where, $data, 'tbl_user_bio');
            if ($q):
                $this->session->set_flashdata('success', ' Berhasil Disimpan!');
                redirect('master/relasi/');
            else:
                $this->session->set_flashdata('error', ' Gagal menyimpan data!');
                redirect('master/relasi/');
            endif;
        else:
            $this->session->set_flashdata('error', ' Harap isi form dengan benar!');
            redirect('master/relasi/');
        endif;
    }

    //hapus relasi
    public function delete_relasi()
    {
        $id = $this->input->post('id');
        $where = array('id_bio' => $id);

        $q = $this->M_relasi->db_delete($where, 'tbl_user_bio');
        if ($q):
            $this->session->set_flashdata('success', ' Berhasil Dihapus!');
            redirect('master/relasi/');
        else:
            $this->session->set_flashdata('error', ' Gagal menghapus data!');
            redirect('master/relasi/');
        endif;

    }

}