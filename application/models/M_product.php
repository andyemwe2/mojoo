<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_product extends CI_Model {
    public function all(){
        $hasil = $this->db->get('t_produk');
        if($hasil->num_rows() > 0){
            return $hasil->result();
        } else {
            return array();
        }
    }
    
    public function find($id){
        //Query mencari record berdasarkan ID-nya
        $hasil = $this->db->where('id', $id)
                          ->limit(1)
                          ->get('t_produk');
        if($hasil->num_rows() > 0){
            return $hasil->row();
        } else {
            return array();
        }
    }

    public function cek_name($name){
        $hasil = $this->db->where('name', $name)
                          ->get('t_produk');
        return $hasil->num_rows();
    }
    
    public function create($data_t_produk){
        //Query INSERT INTO
        $this->db->insert('t_produk', $data_t_produk);
    }

    public function update($id, $data_t_produk){
        //Query UPDATE FROM ... WHERE id=...
        $this->db->where('id', $id)
                 ->update('t_produk', $data_t_produk);
    }
    
    public function delete($id){
        //Query DELETE ... WHERE id=...
        $this->db->where('id', $id)
                 ->delete('t_produk');
    }
}