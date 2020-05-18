<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Events_model extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}

	function ShowCountries($id="") {
		if(!empty($id)){
			$query = $this->db->get_where('events', array('idEvents' => $id));
			return $query->row_array();
		}else{
			$query = $this->db->get('events');
			return $query->result_array();
		}
	}

	// vlozenie zaznamu
	public function insert($data = array()) {
		$insert = $this->db->insert('events', $data);
		if($insert){
			return $this->db->insert_id();
		}else{
			return false;
		}
	}

	// aktualizacia zaznamu
	public function update($data, $id) {
		if(!empty($data) && !empty($id)){
			$update = $this->db->update('events', $data, array('idEvents'=>$id));
			return $update?true:false;
		}else{
			return false;
		}
	}

	// odstranenie zaznamu
	public function delete($id){
		$delete = $this->db->delete('events',array('idEvents'=>$id));
		return $delete?true:false;
	}

}
