		<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

		class Address_model extends CI_Model {

		public function get_state($id){

		$query = $this->db->get_where('states', array('id'=>$id));
		return $query;
	}

		public function get_states(){

		$query = $this->db->get('states');
		return $query;

	}
		public function get_municipaly($id_mu){

		$query = $this->db->get_where('mucipalitys', array('id'=>$id_mu));
		return $query;

	}
		public function get_municipalytis($id_state){

		$query = $this->db->get_where('mucipalitys', array('state_id'=>$id_state));
		return $query;

	}
		public function get_postal($id_postal){

		$query = $this->db->get_where('postal_codes', array('id'=>$id_postal));
		return $query;
	}
		public function get_postals($id_muni){

		$query = $this->db->get_where('postal_codes', array('mucicipality_id'=>$id_muni));
		return $query;
	}
	 	public function get_colonie($id_colo){

		$query = $this->db->get_where('colonies', array('id'=>$id_colo));
		return $query;
	}
		public function get_colonies($id_municipaly){

		$query = $this->db->get_where('colonies', array('postal_code_id'=>$id_municipaly));
		return $query;
	}
}