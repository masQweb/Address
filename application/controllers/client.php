<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Client extends CI_Controller {
    	  
        function __construct() {
        parent::__construct();
        $this->load->library('nusoap_lib');
        }

  
     function index() {

        $this->nusoap_client = new nusoap_client("http://localhost/Address/");

        if($this->nusoap_client->fault)
        {
             $text = 'Error: '.$this->nusoap_client->fault;
        }
        else
        {
            if ($this->nusoap_client->getError())
            {
                 $text = 'Error: '.$this->nusoap_client->getError();
            }
            else
            {
                 $row = $this->nusoap_client->call(
                          'obtenerMiembro',
                           array('Miembro')
                        );
                        }
     }
        }
      }