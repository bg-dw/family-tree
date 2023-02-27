<?php
class M_keluarga extends CI_Model
{
    //mengambil data dari database
    function get_data($table)
    {
        $this->db->select('*'); //mengambil semua data
        $this->db->from($table); //dari table
        $query = $this->db->get(); //eksekusi query
        return $query; //mengembalikan nilai yang didapat
    }

    function get_data_by($where, $table)
    {
        $this->db->select('*'); //mengambil semua data
        $this->db->from($table); //dari table
        $this->db->where($where);
        $query = $this->db->get(); //eksekusi query
        return $query; //mengembalikan nilai yang didapat
    }

    function get_data_keluarga()
    {
        $this->db->select('tbl_user.sex,tbl_user.name,tbl_user_bio.id_user,tbl_user_bio.generasi,tbl_user_bio.ibu,tbl_user_bio.ayah,tbl_user_bio.pasangan'); //mengambil semua data
        $this->db->from('tbl_user'); //dari table
        $this->db->join('tbl_user_bio', 'tbl_user_bio.id_user=tbl_user.id_user');
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

    //count data dari database
    function get_count($table)
    {
        $this->db->select('count(id_user) as total'); //menghitung jumlah data
        $this->db->from($table); //dari table
        $query = $this->db->get(); //eksekusi query
        return $query; //mengembalikan nilai yang didapat
    }
}