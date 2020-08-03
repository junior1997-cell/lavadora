<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Planilla
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}
	public function api_crear_planilla($codigo_planilla,$nombres_planilla,$id_cargo_ocupacion,$asig_familiar_planilla,$sueldo_basico_planilla,$monto_asig_familiar_planilla,$otros_planilla,$total_remunera_bruta_planilla,$snp_onp_planilla,$monto_onp,$id_afp,$aporte_obligatorio_planilla,$comision_sobre_ra_planilla,$prima_seguro_planilla,$total_descuento_planilla,$remuneracion_neta_planilla,$aporte_salud_planilla,$aporte_sctr_planilla,$aporte_total_planilla){
		$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://localhost/lavadora/drive_restfull/index.php/Planilla/create",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => array(
		  	'codigo_planilla' =>$codigo_planilla,
		  	'nombres_planilla' =>$nombres_planilla,
		  	'id_cargo_ocupacion' =>$id_cargo_ocupacion,
		  	'asig_familiar_planilla' =>$asig_familiar_planilla,
		  	'sueldo_basico_planilla' =>$sueldo_basico_planilla,
		  	'monto_asig_familiar_planilla' =>$monto_asig_familiar_planilla,
		  	'otros_planilla' =>$otros_planilla,
		  	'total_remunera_bruta_planilla' =>$total_remunera_bruta_planilla,
		  	'snp_onp_planilla' =>$snp_onp_planilla,
		  	'monto_onp'=>$monto_onp,
		  	'id_afp' =>$id_afp,
		  	'aporte_obligatorio_planilla' =>$aporte_obligatorio_planilla,
		  	'comision_sobre_ra_planilla' =>$comision_sobre_ra_planilla,
		  	'prima_seguro_planilla' =>$prima_seguro_planilla,
		  	'total_descuento_planilla' =>$total_descuento_planilla,
		  	'remuneracion_neta_planilla' =>$remuneracion_neta_planilla,
		  	'aporte_salud_planilla' =>$aporte_salud_planilla,
		  	'aporte_sctr_planilla' =>$aporte_sctr_planilla,
		  	'aporte_total_planilla' =>$aporte_total_planilla,
		  	'fecha_planilla' =>$fecha_planilla),
		  CURLOPT_HTTPHEADER => array(
		    "Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VUU2hUQnZPZ2R2SHI5UG5DdExGbXlUZy53Lmc1Y01pOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlY2ZpLi90RmxTRFhPOS9NOTlFNGxWS0xNOGdodzhOeQ=="
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		$data=json_decode($response,true);
		return $data;
	}	

	Public function listarPlanillas(){

			$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => "http://drymatch.informaticapp.com/index.php/Planilla",
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

	public function api_select_usuario(){

		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://localhost/lavadora/drive_restfull/index.php/Planilla/usuarioselect",
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
		$data= json_decode($response, true);
		return $data;
	}

	public function api_select_afp(){

		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://localhost/lavadora/drive_restfull/index.php/Planilla/afpselect",
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
		$data= json_decode($response, true);
		return $data;
	}

	public function api_select_cargo(){
		
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://localhost/lavadora/drive_restfull/index.php/Planilla/cargoselect",
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
		$data= json_decode($response, true);
		return $data;

	}

}		



?>