<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Permiso
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	
	//Implementar un método para listar los registros
	 
	public function listar_all_api_permiso()
	{
		 
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://localhost/git/lavadora/drive_restfull/index.php/permiso",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
		     "Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VKS0VTTGNTY1hyUkNxQVJseFNSanFuaFA0NkRxeE9TOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlRG1TQ0lmMW5JSkRZMG1uQzJwMHFzNGxmNGRnUGRGUw=="
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		
		$data= json_decode( $response,true);

		return $data;	

	//var_dump ($data); die;	
	}	
	

}

?>