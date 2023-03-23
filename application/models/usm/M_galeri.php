<?php
class M_galeri extends CI_Model
{
    //get galeri and user
    function get_data_galeri($id)
    {
        $this->db->select('tbl_user.id_user,tbl_user.name,tbl_galeri.*'); //mengambil semua data
        $this->db->from('tbl_user'); //dari table
        $this->db->join('tbl_galeri', 'tbl_galeri.id_user=tbl_user.id_user');
        $this->db->where('tbl_galeri.id_user', $id);
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

    //menyimpan data kedalam database
    public function db_input($data, $table) //$data dan $table merupakan variable yang dikirim dari controller
    {
        $query = $this->db->insert($table, $data); //bagian ini merupakan query builder bawaan codeigniter
        return $query;
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