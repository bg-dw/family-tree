<?php
class M_relasi extends CI_Model
{
    function get_data_col($table, $col)
    {
        $this->db->select($col); //mengambil semua data
        $this->db->from($table); //dari table
        $query = $this->db->get(); //eksekusi query
        return $query; //mengembalikan nilai yang didapat
    }

    function get_data_col_where($table, $col, $where)
    {
        $this->db->select($col); //mengambil semua data
        $this->db->from($table); //dari table
        $this->db->where($where); //kondisi
        $this->db->where('timestampdiff(year, tbl_user.birth_date, curdate())>=10'); //kondisi
        $query = $this->db->get(); //eksekusi query
        return $query; //mengembalikan nilai yang didapat
    }

    function get_data_ortu($sex)
    {
        $this->db->select('tbl_user.sex,tbl_user.name,tbl_user.nick_name,tbl_user_bio.id_user,tbl_user_bio.generasi'); //mengambil semua data
        $this->db->from('tbl_user'); //dari table
        $this->db->join('tbl_user_bio', 'tbl_user_bio.id_user=tbl_user.id_user');
        $this->db->where('tbl_user.sex', $sex); //kondisi
        $this->db->where('timestampdiff(year, tbl_user.birth_date, curdate())>=10'); //kondisi
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