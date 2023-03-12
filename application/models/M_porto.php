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

    //menyimpan data kedalam database
    public function db_input($data, $table) //$data dan $table merupakan variable yang dikirim dari controller
    {
        $query = $this->db->insert($table, $data); //bagian ini merupakan query builder bawaan codeigniter
        return $query;
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

    function db_update($where, $data, $table)
    {
        $this->db->where($where);
        $query = $this->db->update($table, $data);
        return $query;
    }

    function db_delete($where, $table)
    {
        $this->db->where($where);
        $hasil = $this->db->delete($table);
        return $hasil;
    }
}