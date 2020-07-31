<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Libromayor
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}
	
//listamos todos los registros
	public function api_listar_libro_mayor10(){

		$id=10;
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://drymatch.informaticapp.com/index.php/Libromayor/".$id,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_POSTFIELDS => "nombre=Jheyfer%20Arevalo%20Cavanillas&correo=jheyferarevalo@upeu.edu.pe&zip=22202&telefono1=922237532&telefono2=957655541&pais=Peru&direccion=Psj.Las%20Sombrillas%20Mz.A%20Lt-6",
		  CURLOPT_HTTPHEADER => array(
		    "Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VUU2hUQnZPZ2R2SHI5UG5DdExGbXlUZy53Lmc1Y01pOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlY2ZpLi90RmxTRFhPOS9NOTlFNGxWS0xNOGdodzhOeQ==",
		    "Content-Type: application/x-www-form-urlencoded"
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		$data = json_decode($response, true);
		return $data;


	}

	public function total_debe_haber10(){
		$cuenta=10;
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://drymatch.informaticapp.com/index.php/Libromayor/total_debe_haber/".$cuenta,
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
		//var_dump($data);die;
		return $data;
	}

	public function api_listar_libro_mayor12(){

		$id=12;
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://drymatch.informaticapp.com/index.php/Libromayor/".$id,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_POSTFIELDS => "nombre=Jheyfer%20Arevalo%20Cavanillas&correo=jheyferarevalo@upeu.edu.pe&zip=22202&telefono1=922237532&telefono2=957655541&pais=Peru&direccion=Psj.Las%20Sombrillas%20Mz.A%20Lt-6",
		  CURLOPT_HTTPHEADER => array(
		    "Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VUU2hUQnZPZ2R2SHI5UG5DdExGbXlUZy53Lmc1Y01pOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlY2ZpLi90RmxTRFhPOS9NOTlFNGxWS0xNOGdodzhOeQ==",
		    "Content-Type: application/x-www-form-urlencoded"
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		$data = json_decode($response, true);
		return $data;


	}

	public function total_debe_haber12(){
		$cuenta=12;
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://drymatch.informaticapp.com/index.php/Libromayor/total_debe_haber/".$cuenta,
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
		//var_dump($data);die;
		return $data;
	}

	public function api_listar_libro_mayor14(){

		$id=14;
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://drymatch.informaticapp.com/index.php/Libromayor/".$id,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_POSTFIELDS => "nombre=Jheyfer%20Arevalo%20Cavanillas&correo=jheyferarevalo@upeu.edu.pe&zip=22202&telefono1=922237532&telefono2=957655541&pais=Peru&direccion=Psj.Las%20Sombrillas%20Mz.A%20Lt-6",
		  CURLOPT_HTTPHEADER => array(
		    "Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VUU2hUQnZPZ2R2SHI5UG5DdExGbXlUZy53Lmc1Y01pOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlY2ZpLi90RmxTRFhPOS9NOTlFNGxWS0xNOGdodzhOeQ==",
		    "Content-Type: application/x-www-form-urlencoded"
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		$data = json_decode($response, true);
		return $data;


	}

	public function total_debe_haber14(){
		$cuenta=14;
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://drymatch.informaticapp.com/index.php/Libromayor/total_debe_haber/".$cuenta,
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
		//var_dump($data);die;
		return $data;
	}

	public function api_listar_libro_mayor20(){

		$id=20;
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://drymatch.informaticapp.com/index.php/Libromayor/".$id,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_POSTFIELDS => "nombre=Jheyfer%20Arevalo%20Cavanillas&correo=jheyferarevalo@upeu.edu.pe&zip=22202&telefono1=922237532&telefono2=957655541&pais=Peru&direccion=Psj.Las%20Sombrillas%20Mz.A%20Lt-6",
		  CURLOPT_HTTPHEADER => array(
		    "Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VUU2hUQnZPZ2R2SHI5UG5DdExGbXlUZy53Lmc1Y01pOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlY2ZpLi90RmxTRFhPOS9NOTlFNGxWS0xNOGdodzhOeQ==",
		    "Content-Type: application/x-www-form-urlencoded"
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		$data = json_decode($response, true);
		return $data;


	}

	public function total_debe_haber20(){
		$cuenta=20;
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://drymatch.informaticapp.com/index.php/Libromayor/total_debe_haber/".$cuenta,
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
		//var_dump($data);die;
		return $data;
	}

	public function api_listar_libro_mayor33(){

		$id=33;
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://drymatch.informaticapp.com/index.php/Libromayor/".$id,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_POSTFIELDS => "nombre=Jheyfer%20Arevalo%20Cavanillas&correo=jheyferarevalo@upeu.edu.pe&zip=22202&telefono1=922237532&telefono2=957655541&pais=Peru&direccion=Psj.Las%20Sombrillas%20Mz.A%20Lt-6",
		  CURLOPT_HTTPHEADER => array(
		    "Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VUU2hUQnZPZ2R2SHI5UG5DdExGbXlUZy53Lmc1Y01pOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlY2ZpLi90RmxTRFhPOS9NOTlFNGxWS0xNOGdodzhOeQ==",
		    "Content-Type: application/x-www-form-urlencoded"
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		$data = json_decode($response, true);
		return $data;


	}

	public function total_debe_haber33(){
		$cuenta=33;
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://drymatch.informaticapp.com/index.php/Libromayor/total_debe_haber/".$cuenta,
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
		//var_dump($data);die;
		return $data;
	}

	public function api_listar_libro_mayor40(){

		$id=40;
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://drymatch.informaticapp.com/index.php/Libromayor/".$id,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_POSTFIELDS => "nombre=Jheyfer%20Arevalo%20Cavanillas&correo=jheyferarevalo@upeu.edu.pe&zip=22202&telefono1=922237532&telefono2=957655541&pais=Peru&direccion=Psj.Las%20Sombrillas%20Mz.A%20Lt-6",
		  CURLOPT_HTTPHEADER => array(
		    "Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VUU2hUQnZPZ2R2SHI5UG5DdExGbXlUZy53Lmc1Y01pOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlY2ZpLi90RmxTRFhPOS9NOTlFNGxWS0xNOGdodzhOeQ==",
		    "Content-Type: application/x-www-form-urlencoded"
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		$data = json_decode($response, true);
		return $data;


	}

	public function total_debe_haber40(){
		$cuenta=40;
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://drymatch.informaticapp.com/index.php/Libromayor/total_debe_haber/".$cuenta,
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
		//var_dump($data);die;
		return $data;
	}

	public function api_listar_libro_mayor41(){

		$id=41;
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://drymatch.informaticapp.com/index.php/Libromayor/".$id,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_POSTFIELDS => "nombre=Jheyfer%20Arevalo%20Cavanillas&correo=jheyferarevalo@upeu.edu.pe&zip=22202&telefono1=922237532&telefono2=957655541&pais=Peru&direccion=Psj.Las%20Sombrillas%20Mz.A%20Lt-6",
		  CURLOPT_HTTPHEADER => array(
		    "Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VUU2hUQnZPZ2R2SHI5UG5DdExGbXlUZy53Lmc1Y01pOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlY2ZpLi90RmxTRFhPOS9NOTlFNGxWS0xNOGdodzhOeQ==",
		    "Content-Type: application/x-www-form-urlencoded"
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		$data = json_decode($response, true);
		return $data;


	}

	public function total_debe_haber41(){
		$cuenta=41;
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://drymatch.informaticapp.com/index.php/Libromayor/total_debe_haber/".$cuenta,
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
		//var_dump($data);die;
		return $data;
	}

	public function api_listar_libro_mayor42(){

		$id=42;
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://drymatch.informaticapp.com/index.php/Libromayor/".$id,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_POSTFIELDS => "nombre=Jheyfer%20Arevalo%20Cavanillas&correo=jheyferarevalo@upeu.edu.pe&zip=22202&telefono1=922237532&telefono2=957655541&pais=Peru&direccion=Psj.Las%20Sombrillas%20Mz.A%20Lt-6",
		  CURLOPT_HTTPHEADER => array(
		    "Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VUU2hUQnZPZ2R2SHI5UG5DdExGbXlUZy53Lmc1Y01pOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlY2ZpLi90RmxTRFhPOS9NOTlFNGxWS0xNOGdodzhOeQ==",
		    "Content-Type: application/x-www-form-urlencoded"
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		$data = json_decode($response, true);
		return $data;


	}

	public function total_debe_haber42(){
		$cuenta=42;
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://drymatch.informaticapp.com/index.php/Libromayor/total_debe_haber/".$cuenta,
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
		//var_dump($data);die;
		return $data;
	}

	public function api_listar_libro_mayor45(){

		$id=45;
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://drymatch.informaticapp.com/index.php/Libromayor/".$id,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_POSTFIELDS => "nombre=Jheyfer%20Arevalo%20Cavanillas&correo=jheyferarevalo@upeu.edu.pe&zip=22202&telefono1=922237532&telefono2=957655541&pais=Peru&direccion=Psj.Las%20Sombrillas%20Mz.A%20Lt-6",
		  CURLOPT_HTTPHEADER => array(
		    "Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VUU2hUQnZPZ2R2SHI5UG5DdExGbXlUZy53Lmc1Y01pOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlY2ZpLi90RmxTRFhPOS9NOTlFNGxWS0xNOGdodzhOeQ==",
		    "Content-Type: application/x-www-form-urlencoded"
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		$data = json_decode($response, true);
		return $data;


	}

	public function total_debe_haber45(){
		$cuenta=45;
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://drymatch.informaticapp.com/index.php/Libromayor/total_debe_haber/".$cuenta,
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
		//var_dump($data);die;
		return $data;
	}

	public function api_listar_libro_mayor46(){

		$id=46;
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://drymatch.informaticapp.com/index.php/Libromayor/".$id,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_POSTFIELDS => "nombre=Jheyfer%20Arevalo%20Cavanillas&correo=jheyferarevalo@upeu.edu.pe&zip=22202&telefono1=922237532&telefono2=957655541&pais=Peru&direccion=Psj.Las%20Sombrillas%20Mz.A%20Lt-6",
		  CURLOPT_HTTPHEADER => array(
		    "Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VUU2hUQnZPZ2R2SHI5UG5DdExGbXlUZy53Lmc1Y01pOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlY2ZpLi90RmxTRFhPOS9NOTlFNGxWS0xNOGdodzhOeQ==",
		    "Content-Type: application/x-www-form-urlencoded"
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		$data = json_decode($response, true);
		return $data;


	}

	public function total_debe_haber46(){
		$cuenta=46;
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://drymatch.informaticapp.com/index.php/Libromayor/total_debe_haber/".$cuenta,
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
		//var_dump($data);die;
		return $data;
	}

	public function api_listar_libro_mayor50(){

		$id=50;
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://drymatch.informaticapp.com/index.php/Libromayor/".$id,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_POSTFIELDS => "nombre=Jheyfer%20Arevalo%20Cavanillas&correo=jheyferarevalo@upeu.edu.pe&zip=22202&telefono1=922237532&telefono2=957655541&pais=Peru&direccion=Psj.Las%20Sombrillas%20Mz.A%20Lt-6",
		  CURLOPT_HTTPHEADER => array(
		    "Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VUU2hUQnZPZ2R2SHI5UG5DdExGbXlUZy53Lmc1Y01pOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlY2ZpLi90RmxTRFhPOS9NOTlFNGxWS0xNOGdodzhOeQ==",
		    "Content-Type: application/x-www-form-urlencoded"
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		$data = json_decode($response, true);
		return $data;


	}

	public function total_debe_haber50(){
		$cuenta=50;
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://drymatch.informaticapp.com/index.php/Libromayor/total_debe_haber/".$cuenta,
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
		//var_dump($data);die;
		return $data;
	}

	public function api_listar_libro_mayor59(){

		$id=59;
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://drymatch.informaticapp.com/index.php/Libromayor/".$id,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_POSTFIELDS => "nombre=Jheyfer%20Arevalo%20Cavanillas&correo=jheyferarevalo@upeu.edu.pe&zip=22202&telefono1=922237532&telefono2=957655541&pais=Peru&direccion=Psj.Las%20Sombrillas%20Mz.A%20Lt-6",
		  CURLOPT_HTTPHEADER => array(
		    "Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VUU2hUQnZPZ2R2SHI5UG5DdExGbXlUZy53Lmc1Y01pOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlY2ZpLi90RmxTRFhPOS9NOTlFNGxWS0xNOGdodzhOeQ==",
		    "Content-Type: application/x-www-form-urlencoded"
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		$data = json_decode($response, true);
		return $data;


	}

	public function total_debe_haber59(){
		$cuenta=59;
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://drymatch.informaticapp.com/index.php/Libromayor/total_debe_haber/".$cuenta,
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
		//var_dump($data);die;
		return $data;
	}

	public function api_listar_libro_mayor60(){

		$id=60;
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://drymatch.informaticapp.com/index.php/Libromayor/".$id,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_POSTFIELDS => "nombre=Jheyfer%20Arevalo%20Cavanillas&correo=jheyferarevalo@upeu.edu.pe&zip=22202&telefono1=922237532&telefono2=957655541&pais=Peru&direccion=Psj.Las%20Sombrillas%20Mz.A%20Lt-6",
		  CURLOPT_HTTPHEADER => array(
		    "Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VUU2hUQnZPZ2R2SHI5UG5DdExGbXlUZy53Lmc1Y01pOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlY2ZpLi90RmxTRFhPOS9NOTlFNGxWS0xNOGdodzhOeQ==",
		    "Content-Type: application/x-www-form-urlencoded"
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		$data = json_decode($response, true);
		return $data;


	}

	public function total_debe_haber60(){
		$cuenta=60;
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://drymatch.informaticapp.com/index.php/Libromayor/total_debe_haber/".$cuenta,
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
		//var_dump($data);die;
		return $data;
	}

	public function api_listar_libro_mayor61(){

		$id=61;
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://drymatch.informaticapp.com/index.php/Libromayor/".$id,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_POSTFIELDS => "nombre=Jheyfer%20Arevalo%20Cavanillas&correo=jheyferarevalo@upeu.edu.pe&zip=22202&telefono1=922237532&telefono2=957655541&pais=Peru&direccion=Psj.Las%20Sombrillas%20Mz.A%20Lt-6",
		  CURLOPT_HTTPHEADER => array(
		    "Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VUU2hUQnZPZ2R2SHI5UG5DdExGbXlUZy53Lmc1Y01pOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlY2ZpLi90RmxTRFhPOS9NOTlFNGxWS0xNOGdodzhOeQ==",
		    "Content-Type: application/x-www-form-urlencoded"
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		$data = json_decode($response, true);
		return $data;


	}

	public function total_debe_haber61(){
		$cuenta=61;
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://drymatch.informaticapp.com/index.php/Libromayor/total_debe_haber/".$cuenta,
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
		//var_dump($data);die;
		return $data;
	}

	public function api_listar_libro_mayor62(){

		$id=62;
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://drymatch.informaticapp.com/index.php/Libromayor/".$id,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_POSTFIELDS => "nombre=Jheyfer%20Arevalo%20Cavanillas&correo=jheyferarevalo@upeu.edu.pe&zip=22202&telefono1=922237532&telefono2=957655541&pais=Peru&direccion=Psj.Las%20Sombrillas%20Mz.A%20Lt-6",
		  CURLOPT_HTTPHEADER => array(
		    "Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VUU2hUQnZPZ2R2SHI5UG5DdExGbXlUZy53Lmc1Y01pOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlY2ZpLi90RmxTRFhPOS9NOTlFNGxWS0xNOGdodzhOeQ==",
		    "Content-Type: application/x-www-form-urlencoded"
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		$data = json_decode($response, true);
		return $data;


	}

	public function total_debe_haber62(){
		$cuenta=62;
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://drymatch.informaticapp.com/index.php/Libromayor/total_debe_haber/".$cuenta,
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
		//var_dump($data);die;
		return $data;
	}

	public function api_listar_libro_mayor63(){

		$id=63;
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://drymatch.informaticapp.com/index.php/Libromayor/".$id,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_POSTFIELDS => "nombre=Jheyfer%20Arevalo%20Cavanillas&correo=jheyferarevalo@upeu.edu.pe&zip=22202&telefono1=922237532&telefono2=957655541&pais=Peru&direccion=Psj.Las%20Sombrillas%20Mz.A%20Lt-6",
		  CURLOPT_HTTPHEADER => array(
		    "Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VUU2hUQnZPZ2R2SHI5UG5DdExGbXlUZy53Lmc1Y01pOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlY2ZpLi90RmxTRFhPOS9NOTlFNGxWS0xNOGdodzhOeQ==",
		    "Content-Type: application/x-www-form-urlencoded"
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		$data = json_decode($response, true);
		return $data;


	}

	public function total_debe_haber63(){
		$cuenta=63;
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://drymatch.informaticapp.com/index.php/Libromayor/total_debe_haber/".$cuenta,
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
		//var_dump($data);die;
		return $data;
	}

	public function api_listar_libro_mayor69(){

		$id=69;
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://drymatch.informaticapp.com/index.php/Libromayor/".$id,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_POSTFIELDS => "nombre=Jheyfer%20Arevalo%20Cavanillas&correo=jheyferarevalo@upeu.edu.pe&zip=22202&telefono1=922237532&telefono2=957655541&pais=Peru&direccion=Psj.Las%20Sombrillas%20Mz.A%20Lt-6",
		  CURLOPT_HTTPHEADER => array(
		    "Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VUU2hUQnZPZ2R2SHI5UG5DdExGbXlUZy53Lmc1Y01pOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlY2ZpLi90RmxTRFhPOS9NOTlFNGxWS0xNOGdodzhOeQ==",
		    "Content-Type: application/x-www-form-urlencoded"
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		$data = json_decode($response, true);
		return $data;


	}

	public function total_debe_haber69(){
		$cuenta=69;
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://drymatch.informaticapp.com/index.php/Libromayor/total_debe_haber/".$cuenta,
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
		//var_dump($data);die;
		return $data;
	}

	public function api_listar_libro_mayor70(){

		$id=70;
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://drymatch.informaticapp.com/index.php/Libromayor/".$id,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_POSTFIELDS => "nombre=Jheyfer%20Arevalo%20Cavanillas&correo=jheyferarevalo@upeu.edu.pe&zip=22202&telefono1=922237532&telefono2=957655541&pais=Peru&direccion=Psj.Las%20Sombrillas%20Mz.A%20Lt-6",
		  CURLOPT_HTTPHEADER => array(
		    "Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VUU2hUQnZPZ2R2SHI5UG5DdExGbXlUZy53Lmc1Y01pOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlY2ZpLi90RmxTRFhPOS9NOTlFNGxWS0xNOGdodzhOeQ==",
		    "Content-Type: application/x-www-form-urlencoded"
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		$data = json_decode($response, true);
		return $data;


	}

	public function total_debe_haber70(){
		$cuenta=70;
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://drymatch.informaticapp.com/index.php/Libromayor/total_debe_haber/".$cuenta,
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
		//var_dump($data);die;
		return $data;
	}

	public function api_listar_libro_mayor79(){

		$id=79;
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://drymatch.informaticapp.com/index.php/Libromayor/".$id,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_POSTFIELDS => "nombre=Jheyfer%20Arevalo%20Cavanillas&correo=jheyferarevalo@upeu.edu.pe&zip=22202&telefono1=922237532&telefono2=957655541&pais=Peru&direccion=Psj.Las%20Sombrillas%20Mz.A%20Lt-6",
		  CURLOPT_HTTPHEADER => array(
		    "Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VUU2hUQnZPZ2R2SHI5UG5DdExGbXlUZy53Lmc1Y01pOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlY2ZpLi90RmxTRFhPOS9NOTlFNGxWS0xNOGdodzhOeQ==",
		    "Content-Type: application/x-www-form-urlencoded"
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		$data = json_decode($response, true);
		return $data;


	}

	public function total_debe_haber79(){
		$cuenta=79;
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://drymatch.informaticapp.com/index.php/Libromayor/total_debe_haber/".$cuenta,
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
		//var_dump($data);die;
		return $data;
	}

	public function api_listar_libro_mayor94(){

		$id=94;
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://drymatch.informaticapp.com/index.php/Libromayor/".$id,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_POSTFIELDS => "nombre=Jheyfer%20Arevalo%20Cavanillas&correo=jheyferarevalo@upeu.edu.pe&zip=22202&telefono1=922237532&telefono2=957655541&pais=Peru&direccion=Psj.Las%20Sombrillas%20Mz.A%20Lt-6",
		  CURLOPT_HTTPHEADER => array(
		    "Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VUU2hUQnZPZ2R2SHI5UG5DdExGbXlUZy53Lmc1Y01pOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlY2ZpLi90RmxTRFhPOS9NOTlFNGxWS0xNOGdodzhOeQ==",
		    "Content-Type: application/x-www-form-urlencoded"
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		$data = json_decode($response, true);
		return $data;


	}

	public function total_debe_haber94(){
		$cuenta=94;
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://drymatch.informaticapp.com/index.php/Libromayor/total_debe_haber/".$cuenta,
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
		//var_dump($data);die;
		return $data;
	}

	public function api_listar_libro_mayor95(){

		$id=95;
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://drymatch.informaticapp.com/index.php/Libromayor/".$id,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_POSTFIELDS => "nombre=Jheyfer%20Arevalo%20Cavanillas&correo=jheyferarevalo@upeu.edu.pe&zip=22202&telefono1=922237532&telefono2=957655541&pais=Peru&direccion=Psj.Las%20Sombrillas%20Mz.A%20Lt-6",
		  CURLOPT_HTTPHEADER => array(
		    "Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VUU2hUQnZPZ2R2SHI5UG5DdExGbXlUZy53Lmc1Y01pOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlY2ZpLi90RmxTRFhPOS9NOTlFNGxWS0xNOGdodzhOeQ==",
		    "Content-Type: application/x-www-form-urlencoded"
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		$data = json_decode($response, true);
		return $data;


	}

	public function total_debe_haber95(){
		$cuenta=95;
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://drymatch.informaticapp.com/index.php/Libromayor/total_debe_haber/".$cuenta,
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
		//var_dump($data);die;
		return $data;
	}

}

?>