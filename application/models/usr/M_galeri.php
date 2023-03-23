<?php
class M_galeri extends CI_Model
{
    //get galeri and user
    function get_data_galeri()
    {
        $this->db->select('tbl_user.id_user,tbl_user.name,tbl_galeri.*'); //mengambil semua data
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