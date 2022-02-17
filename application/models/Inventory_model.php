<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Inventory_model extends CI_Model
{
    public function get_data($table)
    {
        return $this->db->get($table);
    }

    public function insert_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function update_data($table, $data, $where)
    {
        $this->db->update($table, $data, $where);
    }

    public function delete_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function get_jk()
    {
        $this->db->select('*');
        $this->db->from('jadwal_kajian jk');
        $this->db->join('masjid m', 'jk.id_masjid = m.id_masjid', 'left');
        $this->db->join('ustad u', 'jk.id_ustad = u.id_ustad', 'left');
        $this->db->join('kajian k', 'jk.id_kajian = k.id_kajian', 'left');
        return $this->db->get();
    }

    public function cek_login()
    {
        $username = set_value('username');
        $password = set_value('password');

        $result = $this->db->where('username', $username)
                           ->where('password', $password)
                           ->limit(1)
                           ->get('user');
        if($result->num_rows() > 0){
            return $result->row();
        } else {
            return false;
        }
    }
}

/* End of file Inventory_model.php */
