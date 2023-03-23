<?php
class M_porto extends CI_Model
{
    //get porto and user
    function get_data_porto()
    {
        $this->db->select('tbl_user.id_user,tbl_user.name,tbl_portofolio.*'); //mengambil semua data
        $this->db->from('tbl_user'); //dari table
        $this->db->join('tbl_portofolio', 'tbl_portofolio.id_user=tbl_user.id_user');
        $query = $this->db->get(); //eksekusi query
        return $query; //mengembalikan nilai yang didapat
    }
    function get_data_porto_limit($limit, $start)
    {
        $this->db->select('tbl_user.id_user,tbl_user.name,tbl_user.u_pic,tbl_user.pekerjaan,tbl_portofolio.*'); //mengambil semua data
        $this->db->from('tbl_user'); //dari table
        $this->db->join('tbl_portofolio', 'tbl_portofolio.id_user=tbl_user.id_user');
        $this->db->limit($limit, $start);
        $query = $this->db->get(); //eksekusi query
        return $query; //mengembalikan nilai yang didapat
    }
    function get_data_by($id)
    {
        $this->db->select('tbl_user.id_user,tbl_user.name,tbl_portofolio.*'); //mengambil semua data
        $this->db->from('tbl_user'); //dari table
        $this->db->join('tbl_portofolio', 'tbl_portofolio.id_user=tbl_user.id_user');
        $this->db->where('tbl_portofolio.id_porto', $id);
        $query = $this->db->get(); //eksekusi query
        return $query; //mengembalikan nilai yang didapat
    }
}