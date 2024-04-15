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
        $this->db->select('tbl_user.sex,tbl_user.name,tbl_user.u_pic,tbl_user_bio.id_user,tbl_user_bio.generasi,tbl_user_bio.ibu,tbl_user_bio.ayah,tbl_user_bio.pasangan,YEAR(tbl_user.birth_date) AS year'); //mengambil semua data
        $this->db->from('tbl_user'); //dari table
        $this->db->join('tbl_user_bio', 'tbl_user_bio.id_user=tbl_user.id_user');
        $query = $this->db->get(); //eksekusi query
        return $query; //mengembalikan nilai yang didapat
    }
    function get_data_kepkel()
    {
        $this->db->select('tbl_user_bio.id_user,'); //mengambil semua data
        $this->db->from('tbl_user'); //dari table
        $this->db->join('tbl_user_bio', 'tbl_user_bio.id_user=tbl_user.id_user');
        $this->db->where('tbl_user.sex', "male");
        $this->db->where("tbl_user_bio.pasangan!=''");
        $query = $this->db->get(); //eksekusi query
        return $query; //mengembalikan nilai yang didapat
    }
    function get_data_pasangan()
    {
        $this->db->select('tbl_user_bio.id_user,tbl_user_bio.pasangan,'); //mengambil semua data
        $this->db->from('tbl_user'); //dari table
        $this->db->join('tbl_user_bio', 'tbl_user_bio.id_user=tbl_user.id_user');
        $this->db->where('tbl_user.sex', "male");
        $this->db->where("tbl_user_bio.pasangan!=''");
        $query = $this->db->get(); //eksekusi query
        return $query; //mengembalikan nilai yang didapat
    }

    function get_data_anak()
    {
        $this->db->select('tbl_user_bio.id_user,tbl_user_bio.ibu,'); //mengambil semua data
        $this->db->from('tbl_user'); //dari table
        $this->db->join('tbl_user_bio', 'tbl_user_bio.id_user=tbl_user.id_user');
        $this->db->where("tbl_user_bio.ibu!=''");
        $query = $this->db->get(); //eksekusi query
        return $query; //mengembalikan nilai yang didapat
    }
    function get_data_relasi()
    {
        $this->db->select('tbl_user.id_user,tbl_user.name,tbl_user.sex,tbl_user_bio.*'); //mengambil semua data
        $this->db->from('tbl_user'); //dari table
        $this->db->join('tbl_user_bio', 'tbl_user_bio.id_user=tbl_user.id_user');
        $query = $this->db->get(); //eksekusi query
        return $query; //mengembalikan nilai yang didapat
    }

    function get_data_relasi_val()
    {
        $this->db->select('tbl_user.id_user,tbl_user.name,tbl_user.sex,temp_tbl_user_bio.*'); //mengambil semua data
        $this->db->from('tbl_user'); //dari table
        $this->db->join('temp_tbl_user_bio', 'temp_tbl_user_bio.id_user=tbl_user.id_user');
        $query = $this->db->get(); //eksekusi query
        return $query; //mengembalikan nilai yang didapat
    }

    //get_ibu
    function get_ibu()
    {
        $this->db->select('tbl_user.id_user,tbl_user.name'); //mengambil semua data
        $this->db->from('tbl_user'); //dari table
        $this->db->join('tbl_user_bio', 'tbl_user_bio.ibu=tbl_user.id_user');
        $query = $this->db->get(); //eksekusi query
        return $query; //mengembalikan nilai yang didapat
    }

    //get_ayah
    function get_ayah()
    {
        $this->db->select('tbl_user.id_user,tbl_user.name'); //mengambil semua data
        $this->db->from('tbl_user'); //dari table
        $this->db->join('tbl_user_bio', 'tbl_user_bio.ayah=tbl_user.id_user');
        $query = $this->db->get(); //eksekusi query
        return $query; //mengembalikan nilai yang didapat
    }

    //get_pasangan
    function get_pasangan()
    {
        $this->db->select('tbl_user.id_user,tbl_user.name'); //mengambil semua data
        $this->db->from('tbl_user'); //dari table
        $this->db->join('tbl_user_bio', 'tbl_user_bio.pasangan=tbl_user.id_user');
        $query = $this->db->get(); //eksekusi query
        return $query; //mengembalikan nilai yang didapat
    }

    //get_pasangan
    function get_by()
    {
        $this->db->select('tbl_user.id_user,tbl_user.name'); //mengambil semua data
        $this->db->from('tbl_user'); //dari table
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
    function get_count_tot($table)
    {
        $this->db->select('COUNT(u_user) AS tot'); //menghitung jumlah data
        $this->db->from($table); //dari table
        $query = $this->db->get(); //eksekusi query
        return $query; //mengembalikan nilai yang didapat
    }
    function get_count_male($table)
    {
        $this->db->select('COUNT(sex) AS M'); //menghitung jumlah data
        $this->db->from($table); //dari table
        $this->db->where('sex="male"');
        $query = $this->db->get(); //eksekusi query
        return $query; //mengembalikan nilai yang didapat
    }
    function get_count_female($table)
    {
        $this->db->select('COUNT(sex) AS F'); //menghitung jumlah data
        $this->db->from($table); //dari table
        $this->db->where('sex="female"');
        $query = $this->db->get(); //eksekusi query
        return $query; //mengembalikan nilai yang didapat
    }
    function get_count_gen($table)
    {
        $this->db->select('Max(generasi) AS tot'); //menghitung jumlah data
        $this->db->from($table); //dari table
        $this->db->where('generasi!="X"');
        $query = $this->db->get(); //eksekusi query
        return $query; //mengembalikan nilai yang didapat
    }
}