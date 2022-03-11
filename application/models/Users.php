<?php 

class Users extends CI_Model{

	function show($table){
		$this->load->database(); 
		return $this->db->get($table);
	}
	function get_detail_user($id){
		$this->load->database(); 
		return $this->db->query('
		SELECT
			a.id AS id_user,
			a.nama AS nama_user,
			a.ktp AS ktp_user,
			a.email AS email_user,
			a.username AS username_user,
			a.device_id AS device_user,
			a.aktif AS aktif_user,
			a.status AS status_user,
			b.nama AS nama_alamat,
			b.jenis_alamat AS jenisalamat_alamat,
			b.alamat AS alamat_alamat,
			b.lat AS let_alamat,
			b.lng AS lng_alamat,
			b.keterangan AS keterangan_alamat,
			b.utama AS utama_alamat,
			c.nama AS nama_telepon,
			c.jenis_perangkat AS jenisperangkat_telepon,
			c.jenis_telepon AS jenistelepon_telepon,
			c.nomor AS nomor_telepon,
			c.ref AS ref_telepon,
			c.utama AS utama_telepon
		FROM pb_user a
		  INNER JOIN pb_user_alamat b
		  ON a.id= b.user_id
		  INNER JOIN pb_user_telepon c
		  ON a.id= c.user_id 
		  WHERE a.id = $id;
				   ');
	}
	 

	function store($data,$table){  
		$this->load->database();
		$this->db->insert($table,$data);
	}
	
	function get_detail($where,$table){	
		$this->load->database();	
		return $this->db->get_where($table,$where);
	}	
	function update($where,$data,$table){
		$this->load->database();	
		$this->db->where($where); 
		$this->db->update($table,$data);
	}
	function destroy($where,$table){
		$this->load->database(); 
		$this->db->where($where);
		$this->db->delete($table);
	}
	function cek($username, $password) {
    $this->db->where("username", $username);
    $this->db->where("password", $password);
    return $this->db->get("user");
    }
	

}


