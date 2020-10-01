<?php
 if(!defined('BASEPATH')) exit('Hacking Attempt : Keluar dari sistem !! ');
class M_login extends CI_Model{
    public function __construct(){
        parent::__construct();
    }
    // membuat fungsi ambilPengguna
    public function ambilPengguna($username, $password){
        //menselec database codeigniter yang dari tabel user
        $this->db->select('*');
        $this->db->from('t_user');
        // di mana username = $username
        $this->db->where('username', $username);
        // di mana password = $password
        $this->db->where('password', $password);
        // di mana status = $status
        // $this->db->where('status', $status);
        // membuat query yang mengambil datase
        $query = $this->db->get();
        // kembali ke query
        return $query->num_rows();
    }   
    //PENJELASAN SAMA SEPERTI DI ATAS , KESEL BRO NGETIK'E :V
    public function dataPengguna($username){
		$this->db->select('id');
    	$this->db->select('username');
    	$this->db->select('password');
		$this->db->select('role');
        $this->db->select('nama');
   		$this->db->where('username', $username);
        $query = $this->db->get('t_user');
        return $query->row();
    }
}
?>