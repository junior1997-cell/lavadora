<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class TipoLavado
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}
	/*============================
	 funcion crear
	 ============================*/
	public function crear_tipo_lavado_api($nombre,$precio){

     //var_dump($nombre,$precio);die;
			$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => "http://drymatch.informaticapp.com/index.php/TipoLavado",
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "POST",
			  CURLOPT_POSTFIELDS => 
			  "nombre=".$nombre.
			  "&precio=".$precio,
			  CURLOPT_HTTPHEADER => array(
			    "Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VUU2hUQnZPZ2R2SHI5UG5DdExGbXlUZy53Lmc1Y01pOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlY2ZpLi90RmxTRFhPOS9NOTlFNGxWS0xNOGdodzhOeQ==",
			    "Content-Type: application/x-www-form-urlencoded"
			  ),
			));

			$response = curl_exec($curl);

			curl_close($curl);

			$data = json_decode($response,true);
			return $data;
			//print_r($data["Detalle"]);
			#var_dump($data);die;

	}
	/*============================
	 funcion listar
	 ============================*/
	public function listar_api_tipo_lavado(){
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://drymatch.informaticapp.com/index.php/TipoLavado",
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
		$data = json_decode($response, true);
		return $data;
		//var_dump($data);die;
	}
	/*============================
	 funcion mostrar 1 
	 ============================*/
	public function mostrar_uniq_api_tipo_lavado($id){
		//var_dump($id);
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://drymatch.informaticapp.com/index.php/TipoLavado/".$id,
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
		$data= json_decode($response, true);
		return $data;
		//var_dump($data);die;

	}
	/*============================
	 funcion  editar
	 ============================*/
	public function editar_api_tipo_lavado($id,$nombre,$precio){
		//var_dump($id,$nombre,$precio,$imagen);die;
		$curl = curl_init();
		//$estado = 1;
		//var_dump($estado);
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://drymatch.informaticapp.com/index.php/TipoLavado/".$id,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "PUT",
		  CURLOPT_POSTFIELDS => 
		  "nombre=".$nombre.
		  "&precio=".$precio,
		  CURLOPT_HTTPHEADER => array(
		    "Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VUU2hUQnZPZ2R2SHI5UG5DdExGbXlUZy53Lmc1Y01pOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlY2ZpLi90RmxTRFhPOS9NOTlFNGxWS0xNOGdodzhOeQ==",
		    "Content-Type: application/x-www-form-urlencoded"
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);

		$data = json_decode($response,true);
		return $data;
		//var_dump($data);

	}
	/*============================
	 funcion Dasactivar
	 ============================*/
	public function Dasactivar_uniq_tipo_lavado($id){

		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://drymatch.informaticapp.com/index.php/TipoLavado/".$id,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "DELETE",
		  CURLOPT_HTTPHEADER => array(
		    "Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VUU2hUQnZPZ2R2SHI5UG5DdExGbXlUZy53Lmc1Y01pOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlY2ZpLi90RmxTRFhPOS9NOTlFNGxWS0xNOGdodzhOeQ=="
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		$data = json_decode($response,true);
		return $data;
		//var_dump($data);
	}

	/*============================
	 funcion Activar
	 ============================*/

	public function Activar_uniq_tipo_prendas($id){

		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://drymatch.informaticapp.com/index.php/TipoLavado/recuperar/".$id,
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
		$data = json_decode($response,true);
		return $data;

	}

	public function listar_api_tipolavado_enventa(){


		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://drymatch.informaticapp.com/index.php/TipoLavado",
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
		$data = json_decode($response,true);
		return $data;
	}
	
}

?>