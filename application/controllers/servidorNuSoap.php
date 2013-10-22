<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ServidorNuSoap extends CI_Controller {

 	function __construct() {
	 	parent::__construct();
	 	 $this->load->library('Nusoap_lib');
	 	 $this->nusoap_server = new soap_server();
 		$this->nusoap_server->configureWSDL("MiembroWSDL", "urn:MiembroWSDL");

 $this->nusoap_server->wsdl->addComplexType(
 "Miembro",
 "complexType",
 "array",
 "",
 "SOAP-ENC:Array",
 array(
 "id"=>array("name"=>"id", "type"=>"xsd:int"),
 "nombre"=>array("name"=>"nombre", "type"=>"xsd:string"),
 "apellido"=>array("name"=>"apellido", "type"=>"xsd:string")
 )
 );    

 $this->nusoap_server->register(
 "obtenerMiembro",
 array(
 "id" => "xsd:int",
 ),
 array("return"=>"tns:Miembro"),
 "urn:MiembroWSDL",
 "urn:MiembroWSDL#obtenerMiembro",
 "rpc",
 "encoded",
 "Obtiene la información de un miembro especificado"
 );
 }

 function index() {
 if($this->uri->segment(3) == "wsdl") {
 $_SERVER['QUERY_STRING'] = "wsdl";
 } else {
 $_SERVER['QUERY_STRING'] = "";
 }

 $this->nusoap_server->service(file_get_contents("php://input"));
 }

 function obtener_miembro() {
 function obtenerMiembro($idMiembro) {
 $CI =& get_instance();

 $this->load->model("Miembro");

 $row = $this->Miembro->obtenerMiembro($idMiembro);

 return $row;
 }

 $this->nusoap_server->service(file_get_contents("php://input"));
 }
}