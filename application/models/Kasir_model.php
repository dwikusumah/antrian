<?php
class Kasir_model extends CI_Model{
 
    function cek_table(){
		$r = $this->db->count_all_results('tbl_transaksi');
		if ($r>0) {
			return TRUE ;
		} else {
			return FALSE;
		}
    }

    function getAllTransaksi(){
        return $this->db->get('tbl_transaksi')->result();
    }
    
    public function transaksi($pesan){
		return $this->db->insert('tbl_transaksi',$pesan);
    }
    
    public function transaksi_detail($data){
		return $this->db->insert('tbl_transaksi_detail',$data);
	}

}