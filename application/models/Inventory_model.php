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

    public function barang_masuk()
    {
        $this->db->select('*');
        $this->db->from('barang_masuk bm');
        $this->db->join('tbl_barang b', 'b.id_barang = bm.id_barang', 'left');
        $this->db->join('tbl_supplier s', 's.id_supplier = bm.id_supplier', 'left');
        return $this->db->get();
    }

    public function barang_keluar()
    {
        $this->db->select('*');
        $this->db->from('barang_keluar bm');
        $this->db->join('tbl_barang b', 'b.id_barang = bm.id_barang', 'left');
        $this->db->join('tbl_perusahaan p', 'p.id_perusahaan = bm.id_perusahaan', 'left');
        return $this->db->get();
    }

    public function get_barang()
    {
        $this->db->select('*');
        $this->db->from('tbl_barang b');
        $this->db->join('tbl_kategori k', 'k.id_kategori = b.id_kategori', 'left');
        $this->db->join('tbl_supplier s', 's.id_supplier = b.id_supplier', 'left');
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
