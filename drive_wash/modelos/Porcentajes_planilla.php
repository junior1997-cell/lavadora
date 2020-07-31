<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Porcentajep
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}
	//FUNCION API ARA LISTAR LOS PORCENTAJES DE DESCUENTO O ASIMILACION A PLANILLA
	public function porcentaje_Des(){

		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://drymatch.informaticapp.com/index.php/porcentajes/porcentajes_pago",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_HTTPHEADER => array(
		    "Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VUU2hUQnZPZ2R2SHI5UG5DdExGbXlUZy53Lmc1Y01pOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlY2ZpLi90RmxTRFhPOS9NOTlFNGxWS0xNOGdodzhOeQ=="
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		$data=json_decode($response,true);
		return $data;
		//var_dump($data); die;
	}
		//FUNCION API ARA LISTAR LOS srct, eessalud, rmv
	public function porcentaje_pago(){


			$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => "http://drymatch.informaticapp.com/index.php/porcentajes",
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "GET",
			  CURLOPT_HTTPHEADER => array(
			    "Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VUU2hUQnZPZ2R2SHI5UG5DdExGbXlUZy53Lmc1Y01pOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlY2ZpLi90RmxTRFhPOS9NOTlFNGxWS0xNOGdodzhOeQ=="
			  ),
			));

			$response = curl_exec($curl);

			curl_close($curl);
			$data=json_decode($response,true);
			return $data;

	}

	
}

?>