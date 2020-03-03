<?php 
 
class M_data extends CI_Model{
	function tampil_data(){
		return $this->db->get('user'); // data dari database dengan tabel user
    }
    function input_data($data,$table){ //menginputkan data ke database
		$this->db->insert($table,$data);//menginputkan data ke database dengan function input_data
    }
    function hapus_data($where,$table){ // menghapus data dengan menyeleksi query untuk menghapus record
        $this->db->where($where); //menangkap array dari variabel $where yang dikirimkan dari controller hapus
        $this->db->delete($table);
    }
    function edit_data($where,$table){ // mengedit data dengan menyeleksi query untuk mengedit data		
        return $this->db->get_where($table,$where);
    }
    function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}	
    
}