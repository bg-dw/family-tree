<?php
class M_acara extends CI_Model
{
    //mengambil data dari database
    function get_data_acara()
    {
        $this->db->select('tbl_user.id_user,tbl_user.name,tbl_acara.*'); //mengambil semua data
        $this->db->from('tbl_user'); //dari table
        $this->db->join('tbl_acara', 'tbl_acara.id_user=tbl_user.id_user');
        $query = $this->db->get(); //eksekusi query
        return $query; //mengembalikan nilai yang didapat
    }
    function get_data_acara_limit($limit, $start)
    {
        $this->db->select('tbl_user.id_user,tbl_user.name,tbl_acara.*'); //mengambil semua data
        $this->db->from('tbl_user'); //dari table
        $this->db->join('tbl_acara', 'tbl_acara.id_user=tbl_user.id_user');
        $this->db->limit($limit, $start);
        $this->db->order_by('tbl_acara.create_at', 'DESC');
        $query = $this->db->get(); //eksekusi query
        return $query; //mengembalikan nilai yang didapat
    }

    function get_data_by($id)
    {
        $this->db->select('tbl_user.id_user,tbl_user.name,tbl_acara.*'); //mengambil semua data
        $this->db->from('tbl_user'); //dari table
        $this->db->join('tbl_acara', 'tbl_acara.id_user=tbl_user.id_user');
        $this->db->where('tbl_acara.id_acara', $id);
        $query = $this->db->get(); //eksekusi query
        return $query; //mengembalikan nilai yang didapat
    }
}