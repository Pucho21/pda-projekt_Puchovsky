<?php defined('BASEPATH') OR exit('No direct script access allowed');

class WorldChamps_model extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}

	function ZobrazZnamky($id="") {
		if(!empty($id)){
			//Error moze byt tu v zelenom id
			$query = $this->db->get_where('world_champs', array('idWorldChamps' => $id));
			return $query->row_array();
		}else{
			$query = $this->db->get('world_champs');
			return $query->result_array();
		}

	}

	function ZobrazZnamkySpravne($id=""){
		if(!empty($id)){
			$this->db->select('idWorldChamps, Name, Country')
				->from('world_champs');
			$query = $this->db->get();
			return $query->row_array();
		}else{
			$this->db->select('idWorldChamps, Name, Country')
				->from('world_champs');
			$query = $this->db->get();
			return $query->result_array();
		}

	}

	//  naplnenie selectu z tabulky country
	public function NaplnDropdownStudenti($id = ""){
		$this->db->order_by('country')
			->select('idcountry, country AS cele_meno')
			->from('country');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$dropdowns = $query->result();
			foreach ($dropdowns as $dropdown)
			{
				//tuto som menil idRepresentative na idcoutry a to iste aj v add-edit na riadkoch 21 22
				$dropdownlist[$dropdown->idcountry] = $dropdown->cele_meno;
			}
			$dropdownlist[''] = 'Pick country';
			return $dropdownlist;
		}
	}

	// vlozenie zaznamu
	public function insert($data = array()) {
		$insert = $this->db->insert('world_champs', $data);
		if($insert){
			return $this->db->insert_id();
		}else{
			return false;
		}
	}

	// aktualizacia zaznamu
	public function update($data, $id) {
		if(!empty($data) && !empty($id)){
			//Tu moze byt Error v idRepresentative
			$update = $this->db->update('world_champs', $data, array('idWorldChamps'=>$id));
			return $update?true:false;
		}else{
			return false;
		}
	}

	// odstranenie zaznamu
	public function delete($id){
		//Tu moze byt Error v idRepresentative
		$delete = $this->db->delete('world_champs',array('idWorldChamps'=>$id));
		return $delete?true:false;
	}

}

