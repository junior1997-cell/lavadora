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

	 public function guardar_api_usuario($tipo_doc,$dni,$nomb,$apellidos,$sex,$login,$clavehash,
		$celular,$id_cargo,$id_distrito,$direccion,$imagen)
	{
		 
		 // var_dump($tipo_doc,$dni,$nomb,$apellidos,$sex,$login,$clavehash,$celular,$id_cargo,$id_distrito,$direccion,$imagen); die;

		$curl = curl_init();
		//$estado = 1;
		//var_dump($estado);
		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://localhost/git/lavadora/drive_restfull/index.php/clientes/create",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => 
		  "id_tipo_doc=".$tipo_doc. 
		  "&num_doc=".$dni.
		  "&nombre=".$nomb.
		  "&apellidos=".$apellidos.
		  "&id_sexo=".$sex.
		  "&email=".$login.
		  "&password=".$clavehash.
		  "&celular=".$celular.
		  "&id_cargo=".$id_cargo.
		  "&id_distrito=".$id_distrito.
		  "&direccion=".$direccion.
		  "&imagen=".$imagen,	  
		  CURLOPT_HTTPHEADER => array(
		    "Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VKS0VTTGNTY1hyUkNxQVJseFNSanFuaFA0NkRxeE9TOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlRG1TQ0lmMW5JSkRZMG1uQzJwMHFzNGxmNGRnUGRGUw=="
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		$data = json_decode($response,true);
		// return $data;
		 var_dump($data); die;	
	}


	//------------------------------------------------------------------------------
	// EDITAR USUARIO PASANDOLE UN "ID"
	public function editar_api_usuario($id,$tipo_doc,$dni,$nomb,$apellidos,$sex,$login,
		$clavehash,$celular,$id_cargo,$id_distrito,$direccion,$imagen)
	{
		 
		 // var_dump($id,$tipo_doc,$dni,$nomb,$apellidos,$sex,$login,$clavehash,$celular,$id_cargo,$id_distrito,$direccion,$imagen); die;

		$curl = curl_init();
		//$estado = 1;
		//var_dump($estado);
		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://localhost/git/lavadora/drive_restfull/index.php/clientes/".$id,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "PUT",
		  CURLOPT_POSTFIELDS => 
		  "id_tipo_doc=".$tipo_doc. 
		  "&num_doc=".$dni.
		  "&nombre=".$nomb.
		  "&apellidos=".$apellidos.
		  "&id_sexo=".$sex.
		  "&email=".$login.
		  "&password=".$clavehash.
		  "&celular=".$celular.
		  "&id_cargo=".$id_cargo.
		  "&id_distrito=".$id_distrito.
		  "&direccion=".$direccion.
		  "&imagen=".$imagen,	  
		  CURLOPT_HTTPHEADER => array(
		    "Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VKS0VTTGNTY1hyUkNxQVJseFNSanFuaFA0NkRxeE9TOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlRG1TQ0lmMW5JSkRZMG1uQzJwMHFzNGxmNGRnUGRGUw=="
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		$data = json_decode($response,true);
		// return $data;
		 var_dump($data); die;

	//var_dump ($data); die;	
	}

	//------------------------------------------------------------------------------
	// borrar USUARIO PASANDOLE UN "ID"
	public function borrar_api_usuario($id)
	{
		 
		 // var_dump($id); die;

		$curl = curl_init();
		//$estado = 1;
		//var_dump($estado);
		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://localhost/git/lavadora/drive_restfull/index.php/clientes/delete/".$id,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_HTTPHEADER => array(
		    "Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VKS0VTTGNTY1hyUkNxQVJseFNSanFuaFA0NkRxeE9TOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlRG1TQ0lmMW5JSkRZMG1uQzJwMHFzNGxmNGRnUGRGUw=="
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		$data = json_decode($response,true);
		// return $data;
		 var_dump($data); die;

	//var_dump ($data); die;	
	}

	//------------------------------------------------------------------------------
	// recuperar USUARIO PASANDOLE UN "ID"
	public function recuperar_api_usuario($id)
	{
		 
		 // var_dump($id); die;

		$curl = curl_init();
		//$estado = 1;
		//var_dump($estado);
		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://localhost/git/lavadora/drive_restfull/index.php/clientes/recuperar/".$id,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_HTTPHEADER => array(
		    "Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VKS0VTTGNTY1hyUkNxQVJseFNSanFuaFA0NkRxeE9TOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlRG1TQ0lmMW5JSkRZMG1uQzJwMHFzNGxmNGRnUGRGUw=="
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		$data = json_decode($response,true);
		// return $data;
		 var_dump($data); die;

	//var_dump ($data); die;	
	}

	// LISTA TODAS LA PERSONAS DE LA TABLA PERSONAS
	public function listar_all_api_persona_local()
	{
		 
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://localhost/git/lavadora/drive_restfull/index.php/clientes",
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

	// LISTA UNA PERSONA PARA EDITAR
	public function listar_one_api_persona_local($id)
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://localhost/git/lavadora/drive_restfull/index.php/clientes/".$id,
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

	// LISTA TODO LOS DISTRITOS
	public function listar_all_api_distrito()
	{
		 
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://localhost/git/lavadora/drive_restfull/index.php/distrito",
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

	// LISTA CARGO
	public function listar_all_api_cargo()
	{
		 
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://localhost/git/lavadora/drive_restfull/index.php/cargo",
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

	// LISTA TIPO DE DOCUMENTOS 
	public function listar_all_api_tipo_doc()
	{
		 
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://localhost/git/lavadora/drive_restfull/index.php/tipodoc",
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
	// LISTAR SEXO USANDO API
	public function listar_all_api_sexo()
	{
		 
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://localhost/git/lavadora/drive_restfull/index.php/sexo",
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


	//CAPTURAR PERSONA  DE RENIEC
	public function captura_unic_reniec($dni)
    {
     //var_dump ($dni); die;	   	 
     // $newo=settype($dni, 'string');
     $newo=74535601;
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
      //var_dump ($json); die;	
      // if($json !==null){
      	$respuestas = json_decode( $json, true );
      return $respuestas;
      // }else{
      // 	$respuestas = null;
      // return $respuestas;
      // }
      	
    }

    //CAPTURAR PERSONA DE SUNAT
	public function captura_unic_sunat($ruc)
    {
     
	  $url = "https://dniruc.apisperu.com/api/v1/ruc/".$ruc."?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6Imp1bmlvcmNlcmNhZG9AdXBldS5lZHUucGUifQ.bzpY1fZ7YvpHU5T83b9PoDxHPaoDYxPuuqMqvCwYqsM";
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
	 
    
}

?>