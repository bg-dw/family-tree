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
        $this->db->select('tbl_user.sex,tbl_user.name,tbl_user.u_pic,tbl_user_bio.id_user,tbl_user_bio.generasi,tbl_user_bio.ibu,tbl_user_bio.ayah,tbl_user_bio.pasangan'); //mengambil semua data
        $this->db->from('tbl_user'); //dari table
        $this->db->join('tbl_user_bio', 'tbl_user_bio.id_user=tbl_user.id_user');
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

    function get_me($id)
    {
        $this->db->select('tbl_user.id_user,tbl_user.name,tbl_user.sex,tbl_user_bio.*'); //mengambil semua data
        $this->db->from('tbl_user'); //dari table
        $this->db->join('tbl_user_bio', 'tbl_user_bio.id_user=tbl_user.id_user');
        $this->db->where('tbl_user.id_user', $id);
        $query = $this->db->get(); //eksekusi query
        return $query; //mengembalikan nilai yang didapat
    }
    function get_my_fam($as_ibu, $as_ayah) //id ibu dan ayah(mencari data anak dengan orang tua yang sama)
    {
        $this->db->select('tbl_user.*,tbl_user_bio.generasi'); //mengambil semua data
        $this->db->from('tbl_user'); //dari table
        $this->db->join('tbl_user_bio', 'tbl_user_bio.id_user=tbl_user.id_user');
        $this->db->where('tbl_user_bio.ibu', $as_ibu);
        $this->db->where('tbl_user_bio.ayah', $as_ayah);
        $this->db->where('tbl_user_bio.pasangan', "");
        $this->db->order_by('tbl_user.birth_date', 'DESC');
        $this->db->order_by('tbl_user.create_at', 'ASC');
        $query = $this->db->get(); //eksekusi query
        return $query; //mengembalikan nilai yang didapat
    }
    function get_ortu($as_ibu, $as_ayah) //id ibu dan ayah
    {
        $this->db->select('tbl_user.*,tbl_user_bio.generasi'); //mengambil semua data
        $this->db->from('tbl_user'); //dari table
        $this->db->join('tbl_user_bio', 'tbl_user_bio.id_user=tbl_user.id_user');
        $this->db->where_in('tbl_user.id_user', [$as_ibu, $as_ayah]);
        $this->db->order_by('tbl_user.sex', 'DESC');
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
        $query = $this->db->get(); //eksekusi query
        return $query; //mengembalikan nilai yang didapat
    }
}