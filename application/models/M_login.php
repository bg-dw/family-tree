<?php
class M_login extends CI_Model
{
    function cek_db($uname, $pwd)
    {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $where = array('u_user' => $uname, 'u_pass' => $pwd);
        $this->db->where($where);
        $query = $this->db->get();
        return $query;
    }
}