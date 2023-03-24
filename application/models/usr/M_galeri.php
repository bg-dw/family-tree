<?php
class M_galeri extends CI_Model
{
    //get galeri and user
    function get_data_galeri()
    {
        $this->db->select('tbl_user.name,tbl_user.u_user,tbl_user.nick_name,tbl_user.u_pic,count(tbl_galeri.id_user) as total'); //mengambil semua data
        $this->db->from('tbl_user'); //dari table
        $this->db->join('tbl_galeri', 'tbl_galeri.id_user=tbl_user.id_user');
        $this->db->order_by('total', 'DESC');
        $this->db->group_by('tbl_galeri.id_user');
        $query = $this->db->get(); //eksekusi query
        return $query; //mengembalikan nilai yang didapat
    }
    function sum_galeri()
    {
        $this->db->select('count(tbl_galeri.id_user) as total'); //mengambil semua data
        $this->db->from('tbl_user'); //dari table
        $this->db->join('tbl_galeri', 'tbl_galeri.id_user=tbl_user.id_user');
        $query = $this->db->get(); //eksekusi query
        return $query; //mengembalikan nilai yang didapat
    }

    function get_data_galeri_limit($limit, $start)
    {
        $this->db->select('tbl_user.id_user,tbl_user.name,tbl_user.u_pic,tbl_user.pekerjaan,tbl_galeri.*'); //mengambil semua data
        $this->db->from('tbl_user'); //dari table
        $this->db->join('tbl_galeri', 'tbl_galeri.id_user=tbl_user.id_user');
        $this->db->limit($limit, $start);
        $this->db->order_by('tbl_galeri.create_at', 'DESC');
        $query = $this->db->get(); //eksekusi query
        return $query; //mengembalikan nilai yang didapat
    }


    function get_data_by($id)
    {
        $this->db->select('tbl_user.id_user,tbl_user.name,tbl_galeri.*'); //mengambil semua data
        $this->db->from('tbl_user'); //dari table
        $this->db->join('tbl_galeri', 'tbl_galeri.id_user=tbl_user.id_user');
        $this->db->where('tbl_galeri.id_galeri', $id);
        $query = $this->db->get(); //eksekusi query
        return $query; //mengembalikan nilai yang didapat
    }
}