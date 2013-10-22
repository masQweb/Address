<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class  Address extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('address_model');
	}

	public function states()
	{
		$result         = $this->address_model->get_states();
		$data['states'] = $result->result_array();

		foreach($data['states'] as $aItem){
			echo "id:".$aItem['id']."--".$aItem['name_st'];
			echo '<br />';
		}
	}

	public function state($id_state)
	{

		$result = $this->address_model->get_state($id_state);
		$result = array_pop($result->result_array());
		echo $result['name_st'];
	}
}

/* End of file address.php */
/* Location: ./application/controllers/welcome.php */