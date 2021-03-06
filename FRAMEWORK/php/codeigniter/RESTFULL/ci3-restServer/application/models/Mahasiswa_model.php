<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa_model extends CI_Model {

	public function getMhs($id = null) {
		if($id === null ) :
		return $this->db->get('mahasiswa')->result();
		else:
		return $this->db->get_where('mahasiswa', ['id' => $id])->result();
		endif;
	}


	public function deleteMahasiswa($id) {
		$this->db->delete('mahasiswa', ['id' => $id]);
		return $this->db->affected_rows();
	}


	public function createMahasiswa($data) {
		$this->db->insert('mahasiswa', $data);
		return $this->db->affected_rows();
	}

	public function updateMahasiswa($data, $id) {
		$this->db->update('mahasiswa', $data, ['id' => $id]);
		return $this->db->affected_rows();
	}

}

/* End of file Mahasiswa_model.php */



?>
