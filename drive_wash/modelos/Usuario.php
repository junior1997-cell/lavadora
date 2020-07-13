<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Usuario
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($nombre,$tipo_documento,$num_documento,$direccion,$telefono,$email,$cargo,$login,$clave,$imagen,$permisos)
	{
		$sql="INSERT INTO usuario (nombre,tipo_documento,num_documento,direccion,telefono,email,cargo,login,clave,imagen,condicion)
		VALUES ('$nombre','$tipo_documento','$num_documento','$direccion','$telefono','$email','$cargo','$login','$clave','$imagen','1')";
		//return ejecutarConsulta($sql);
		$idusuarionew=ejecutarConsulta_retornarID($sql);

		$num_elementos=0;
		$sw=true;

		while ($num_elementos < count($permisos))
		{
			$sql_detalle = "INSERT INTO usuario_permiso(idusuario, idpermiso) VALUES('$idusuarionew', '$permisos[$num_elementos]')";
			ejecutarConsulta($sql_detalle) or $sw = false;
			$num_elementos=$num_elementos + 1;
		}

		return $sw;
	}

	//Implementamos un método para editar registros
	public function editar($idusuario,$nombre,$tipo_documento,$num_documento,$direccion,$telefono,$email,$cargo,$login,$clave,$imagen,$permisos)
	{
		$sql="UPDATE usuario SET nombre='$nombre',tipo_documento='$tipo_documento',num_documento='$num_documento',direccion='$direccion',telefono='$telefono',email='$email',cargo='$cargo',login='$login',clave='$clave',imagen='$imagen' WHERE idusuario='$idusuario'";
		ejecutarConsulta($sql);

		//Eliminamos todos los permisos asignados para volverlos a registrar
		$sqldel="DELETE FROM usuario_permiso WHERE idusuario='$idusuario'";
		ejecutarConsulta($sqldel);

		$num_elementos=0;
		$sw=true;

		while ($num_elementos < count($permisos))
		{
			$sql_detalle = "INSERT INTO usuario_permiso(idusuario, idpermiso) VALUES('$idusuario', '$permisos[$num_elementos]')";
			ejecutarConsulta($sql_detalle) or $sw = false;
			$num_elementos=$num_elementos + 1;
		}

		return $sw;

	}

	//Implementamos un método para desactivar categorías
	public function desactivar($idusuario)
	{
		$sql="UPDATE usuario SET condicion='0' WHERE idusuario='$idusuario'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($idusuario)
	{
		$sql="UPDATE persona SET estado='1' WHERE id='$idusuario'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idusuario)
	{
		$sql="SELECT * FROM persona WHERE id='$idusuario'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM persona";
		return ejecutarConsulta($sql);		
	}
	//Implementar un método para listar los permisos marcados
	public function listarmarcados($idusuario)
	{
		$sql="SELECT * FROM usuario_permiso WHERE id_usuario='$idusuario'";
		return ejecutarConsulta($sql);
	}

	//Función para verificar el acceso al sistema
	public function verificar($login,$clave)
    {
    	$sql="SELECT *
    	 FROM persona 
    	 WHERE email='$login' AND password='$clave' AND estado=1 "; 
    	return ejecutarConsulta($sql);  
    }

    public function listar_persona()
    {
    	$sql="SELECT pe.id,pe.nombre,pe.apellidos,pe.num_doc,pe.email,pe.estado,pe.password AS contra,pe.celular,pe.direccion,pe.imagen,td.nombre AS tipo_doc,s.nombre AS sexo,c.nombre AS cargo,tp.nombre AS tipopersona,d.nombre AS distrito,prov.nombre AS provincia,dep.nombre AS departamento FROM persona AS pe INNER JOIN sexo AS s ON pe.id_sexo=s.id INNER JOIN tipo_doc AS td ON pe.id_tipo_doc=td.id INNER JOIN cargo AS c ON pe.id_cargo=c.id INNER JOIN tipo_persona AS tp ON pe.id_tipo_persona=tp.id INNER JOIN distrito AS d ON pe.id_distrito=d.id INNER JOIN provincia AS prov ON d.id_provincia=prov.id INNER JOIN departamento AS dep ON prov.id_departamento=dep.id"; 

    	return ejecutarConsulta($sql);  
    }

    //LISTAR DESDE POSTMAN
	public function listar_postman()
	{
		 
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://drymatch.informaticapp.com/index.php/clientes",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
		    "Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VSOGNXMzBQVU9NQ3hWWjZpWHViRTgzaS9xUkNuSDBxOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlNTkyVVNjaHc0RW9TVjRuTHk1Y1UudmJNeGhnVXpvdQ=="
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		
		$data= json_decode( $response,true);

		return $data;	

	//var_dump ($data); die;	
	}

	public function listar_api_insumos()
	{
		 
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://drymatch.informaticapp.com/index.php/insumos",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
		    "Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VSOGNXMzBQVU9NQ3hWWjZpWHViRTgzaS9xUkNuSDBxOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlNTkyVVNjaHc0RW9TVjRuTHk1Y1UudmJNeGhnVXpvdQ=="
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		
		$data= json_decode( $response,true);

		return $data;	

	//var_dump ($data); die;	
	}

	//CAPTURAR PERSONA VALIDAD DE RENIEC
	public function captura_reniec()
    {
    	$dni="74535601";
    	 $url = "https://dniruc.apisperu.com/api/v1/dni/".$dni."?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6Imp1bmlvcmNlcmNhZG9AdXBldS5lZHUucGUifQ.bzpY1fZ7YvpHU5T83b9PoDxHPaoDYxPuuqMqvCwYqsM";
    //  Iniciamos curl
      $curl = curl_init();
      // Desactivamos verificación SSL
      curl_setopt( $curl, CURLOPT_SSL_VERIFYPEER, 0 );
      // Devuelve respuesta aunque sea falsa
      curl_setopt( $curl, CURLOPT_RETURNTRANSFER, 1 );
      // Especificamo los MIME-Type que son aceptables para la respuesta.
      curl_setopt( $curl, CURLOPT_HTTPHEADER, [ 'Accept: application/json' ] );
      // Establecemos la URL
      curl_setopt( $curl, CURLOPT_URL, $url );
      // Ejecutmos curl
      $json = curl_exec( $curl );
      // Cerramos curl
      curl_close( $curl );
      $respuestas = json_decode( $json, true );
      return $respuestas;	
    }

    // TRAER DATOS ESPECIFICOS DEL API
    public function listar_una_persona_api($ide)
    {
    	 

		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://drymatch.informaticapp.com/index.php/clientes".$ide,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
		    "Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VSOGNXMzBQVU9NQ3hWWjZpWHViRTgzaS9xUkNuSDBxOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlNTkyVVNjaHc0RW9TVjRuTHk1Y1UudmJNeGhnVXpvdQ=="
		  ),
		));


		$response = curl_exec($curl);

		curl_close($curl);
		$data= json_decode($response, true);
		//var_dump ($data); die;	
		return $data;

    }
}

?>