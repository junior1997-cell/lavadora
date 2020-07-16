<?php
ob_start();
if (strlen(session_id()) < 1){
	session_start();//Validamos si existe o no la sesión
}
require_once "../modelos/Usuario.php";

$usuario=new Usuario();

// id ES UNA VARIABLE ENVIADA DESDE LA VISTA USUARIOS PARA EDITAR
$id=isset($_POST["id"])? limpiarCadena($_POST["id"]):"";
$tipo_doc=isset($_POST["tipo_documento"])? limpiarCadena($_POST["tipo_documento"]):"";
// DNI ES UNA VARIABLE ENVIADA DESDE LA VISTA USUARIOS
$dni=isset($_POST["dni"])? limpiarCadena($_POST["dni"]):"";
$nombres=isset($_POST["nombres"])? limpiarCadena($_POST["nombres"]):"";
$apellidos=isset($_POST["apellidos"])? limpiarCadena($_POST["apellidos"]):"";
$razonsocial=isset($_POST["razonsocial"])? limpiarCadena($_POST["razonsocial"]):"";
$sexo=isset($_POST["sexo"])? limpiarCadena($_POST["sexo"]):"";
$login=isset($_POST["login"])? limpiarCadena($_POST["login"]):"";
$clave=isset($_POST["clave"])? limpiarCadena($_POST["clave"]):"";
$celular=isset($_POST["celular"])? limpiarCadena($_POST["celular"]):"";
$id_cargo=isset($_POST["id_cargo"])? limpiarCadena($_POST["id_cargo"]):"";
$id_distrito=isset($_POST["id_distrito"])? limpiarCadena($_POST["id_distrito"]):"";
$direccion=isset($_POST["direccion"])? limpiarCadena($_POST["direccion"]):"";
$imagen=isset($_POST["imagen"])? limpiarCadena($_POST["imagen"]):"";



switch ($_GET["op"]){
	case 'guardaryeditar':
		if (!isset($_SESSION["nombre"]))
		{
		  header("Location: ../vistas/login.html");//Validamos el acceso solo a los usuarios logueados al sistema.
		}
		else
		{
			//Validamos el acceso solo al usuario logueado y autorizado.
			if ($_SESSION['almacen']==1)
			{

			

				if (!file_exists($_FILES['imagen']['tmp_name']) || !is_uploaded_file($_FILES['imagen']['tmp_name']))
				{
					$imagen=$_POST["imagenactual"];
				}
				else 
				{
					$ext = explode(".", $_FILES["imagen"]["name"]);
					if ($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" || $_FILES['imagen']['type'] == "image/png")
					{
						$imagen = round(microtime(true)) . '.' . end($ext);
						move_uploaded_file($_FILES["imagen"]["tmp_name"], "../files/usuarios/" . $imagen);
					}
				}
				

				// validamos "razonsocial" SI ESTA VACIA O TIENE DATOS
				if(empty($razonsocial)){
					$nomb=$nombres;
				}else{
					$nomb=$razonsocial;
				}

				// validamos "clave_actual" SI ESTA VACIA O TIENE DATOS
				if(empty($clave)){
					$clavehash=$_POST["clave_actual"];
				}else{

					//Hash SHA256 en la contraseña, para encriptar.
					$clavehash=hash("SHA256",$clave);
				}
				// validamos "sexo" SI ESTA VACIA O TIENE DATOS
				if(empty($sexo)){
					$sex=$_POST["sexo_actual"];
				}else{
					$sex=$sexo;
				}


				// Validamos "id" SI ESTA VACIA O TIENE DATOS para "guardar" o "editar"
				if (empty($id)){
					$rspta=$usuario->guardar_api_usuario($tipo_doc,$dni,$nomb,$apellidos,$sex,$login,
						$clavehash,$celular,$id_cargo,$id_distrito,$direccion,$imagen);

						// $_POST['permiso']
					echo $rspta ? "Usuario registrado" : "No se pudieron registrar todos los datos del usuario";
				}
				else {
					$rspta=$usuario->editar_api_usuario($id,$tipo_doc,$dni,$nomb,$apellidos,$sex,$login,$clavehash,$celular,$id_cargo,$id_distrito,$direccion,$imagen);

						// $_POST['permiso']
					echo $rspta ? "Usuario actualizado" : "Usuario no se pudo actualizar";
				}
			//Fin de las validaciones de acceso
			}
			else
			{
		  	require 'noacceso.php';
			}
		}		
	break;

	case 'desactivar':
		if (!isset($_SESSION["nombre"]))
		{
		  header("Location: ../vistas/login.html");//Validamos el acceso solo a los usuarios logueados al sistema.
		}
		else
		{
			//Validamos el acceso solo al usuario logueado y autorizado.
			if ($_SESSION['almacen']==1)
			{
				$rspta=$usuario->borrar_api_usuario($id);
 				echo $rspta ? "Usuario Desactivado" : "Usuario no se puede desactivar";
			//Fin de las validaciones de acceso
			}
			else
			{
		  	require 'noacceso.php';
			}
		}		
	break;

	case 'activar':
		if (!isset($_SESSION["nombre"]))
		{
		  header("Location: ../vistas/login.html");//Validamos el acceso solo a los usuarios logueados al sistema.
		}
		else
		{
			//Validamos el acceso solo al usuario logueado y autorizado.
			if ($_SESSION['almacen']==1)
			{
				$rspta=$usuario->recuperar_api_usuario($id);
 				echo $rspta ? "Usuario activado" : "Usuario no se puede activar";
			//Fin de las validaciones de acceso
			}
			else
			{
		  	require 'noacceso.php';
			}
		}		
	break;

	case 'mostrar':
		if (!isset($_SESSION["nombre"]))
		{
		  header("Location: ../vistas/login.html");//Validamos el acceso solo a los usuarios logueados al sistema.
		}
		else
		{
			//Validamos el acceso solo al usuario logueado y autorizado.
			if ($_SESSION['almacen']==1)
			{
				
				//var_dump($dni); die;
				$rspta=$usuario->listar_one_api_persona_local($id);				
			 		//Vamos a declarar un srray	 		
			 	echo json_encode($rspta);
		
				//Fin de las validaciones de acceso
			}else{

		  		require 'noacceso.php';
			}
		}		
	break;

	case 'listar':
		if (!isset($_SESSION["nombre"]))
		{
		  header("Location: ../vistas/login.html");//Validamos el acceso solo a los usuarios logueados al sistema.
		}
		else
		{
			//Validamos el acceso solo al usuario logueado y autorizado.
			if ($_SESSION['almacen']==1)
			{
				$rspta=$usuario->listar_all_api_persona_local();				
		 		//Vamos a declarar un array
		 		//var_dump($rspta); die;
		 		$a="Admi";
		 		$data =array();
		 		foreach($rspta["Detalle"] as $reg ){
		 			$data[]=array(
		 				"0"=>($reg['estado'])?'<button class="btn btn-warning" onclick="mostrar('.$reg['id'].')">
			 				<i class="fa fa-pencil">
			 				</i>
			 				</button>'.
			 				'<button class="btn btn-danger" onclick="desactivar('.$reg['id'].')"><i class="fa fa-trash"></i>
			 				</button>':'<button class="btn btn-warning" onclick="mostrar('.$reg['id'].')"><i class="fa fa-pencil"></i>
			 				</button>'.
			 				'<button class="btn btn-primary" onclick="activar('.$reg['id'].')">
			 				<i class="fa fa-check"></i>
			 				</button>',	
		 				"1"=>$reg['nombre']." ".$reg['apellidos'],
		 				"2"=>$reg['id_sexo'],	 				
		 				"3"=>$reg['id_tipo_doc'].": ".$reg['num_doc'],
		 				"4"=>$reg['email'],		 				
		 				"5"=>$reg['celular'],
		 				if($reg['id_cargo']==4){
		 					"6"=>$a,
		 				}
		 				"6"=>$reg['id_cargo'],
		 				"7"=>$reg['id_distrito'],
		 				"8"=>"<img src='../files/usuarios/".$reg['imagen']."' height='40px' width='40px' >",
		 				"9"=>($reg['estado'])?'<span class="label bg-green">Activado</span>':
		 				'<span class="label bg-red">Desactivado</span>'
		 			);
		 		}

				//var_dump ($data); die;
		 		$results = array(
		 			"sEcho"=>1, //Información para el datatables
		 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
		 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
		 			"aaData"=>$data);
		 		echo json_encode($results);
			//Fin de las validaciones de acceso
			}
			else
			{
		  	require 'noacceso.php';
			}
		}
	break;

	case 'permisos':
		//Obtenemos todos los permisos de la tabla permisos
		require_once "../modelos/Permiso.php";
		$permiso = new Permiso();
		$rspta = $permiso->listar_all_api_permiso();

		//Obtener los permisos asignados al usuario
		 $id=$_GET['id'];
		$marcados = $usuario->listar_api_permiso_marcado_local($id);
		// //Declaramos el array para almacenar todos los permisos marcados
		// $valores=array();

		// //Almacenar los permisos asignados al usuario en el array
		// foreach($marcados->fetch_object()as $per )
		// 	{
		// 		array_push($valores, $per->idpermiso);
		// 	}

		//Mostramos la lista de permisos en la vista y si están o no marcados
		foreach($rspta['Detalle']as $reg)
				{
					$sw=in_array($reg->idpermiso,$valores)?'checked':'';

					echo '<li>SASS <input type="checkbox" '.$sw.'  name="'.$reg['nombre'].'" value="'.$reg['id'].'">'.$reg['nombre'].'</li>';
				}
	break;

	case 'verificar':
		$logina=$_POST['logina'];
	    $clavea=$_POST['clavea'];

	    //Hash SHA256 en la contraseña
		 $clavehash=hash("SHA256",$clavea);

		$rspta=$usuario->verificar($logina, $clavehash);

		$fetch=$rspta->fetch_object(); 

		if (isset($fetch))
	    {
	        //Declaramos las variables de sesión
 

	        $_SESSION['id']=$fetch->id;
	        $_SESSION['nombre']=$fetch->nombre;
	        $_SESSION['apellidos']=$fetch->apellidos;
	        $_SESSION['id_sexo']=$fetch->id_sexo;
	        $_SESSION['id_tipo_doc']=$fetch->id_tipo_doc;
	        $_SESSION['email']=$fetch->email;
	        $_SESSION['password'] =$fetch->password;
	        $_SESSION['celular']=$fetch->celular;
	        $_SESSION['id_cargo'] =$fetch->id_cargo;
	        $_SESSION['id_tipo_persona'] =$fetch->id_tipo_persona;
	        $_SESSION['id_distrito'] =$fetch->id_distrito;
	        $_SESSION['direccion']=$fetch->direccion;
	       	$_SESSION['imagen'] =$fetch->imagen;
	        $_SESSION['fecha'] =$fetch->fecha;
	        $_SESSION['ultimo_login'] =$fetch->ultimo_login;
	        $_SESSION['estado'] =$fetch->estado;
	        $_SESSION['cargo'] =$fetch->cargo;
	        


	        //Obtenemos los permisos del usuario
	    	$marcados = $usuario->listarmarcados($fetch->id);

	    	//Declaramos el array para almacenar todos los permisos marcados
			$valores=array();

			//Almacenamos los permisos marcados en el array
			while ($per = $marcados->fetch_object())
				{
					array_push($valores, $per->id_permiso);
				}

			//Determinamos los accesos del usuario
			in_array(1,$valores)?$_SESSION['escritorio']=1:$_SESSION['escritorio']=0;
			in_array(2,$valores)?$_SESSION['almacen']=1:$_SESSION['almacen']=0;
			in_array(3,$valores)?$_SESSION['compras']=1:$_SESSION['compras']=0;
			in_array(4,$valores)?$_SESSION['ventas']=1:$_SESSION['ventas']=0;
			in_array(5,$valores)?$_SESSION['acceso']=1:$_SESSION['acceso']=0;
			in_array(6,$valores)?$_SESSION['consultac']=1:$_SESSION['consultac']=0;
			in_array(7,$valores)?$_SESSION['consultav']=1:$_SESSION['consultav']=0;

	    }
	    echo json_encode($fetch);
	break;

	case 'sunat':
		if (!isset($_SESSION["nombre"]))
		{
		  header("Location: ../vistas/login.html");//Validamos el acceso solo a los usuarios logueados al sistema.
		}
		else
		{
			//Validamos el acceso solo al usuario logueado y autorizado.
			if ($_SESSION['almacen']==1)
			{			
				//var_dump($dni); die;
				$rspta=$usuario->captura_unic_sunat($dni);
		 		//Codificar el resultado utilizando json
		 		//var_dump($rspta); die;
		 		$data =array();

		 		 	$data[]=array(
		 				"0"=>$rspta['ruc'],	
		 				"1"=>$rspta['razonSocial'],
		 				"2"=>$rspta['direccion']." - ".$rspta['distrito']." - ".$rspta['provincia']." - ".$rspta['departamento'],
		 				"3"=>"DNI(*):"
		 				 
		 				);
		 			echo json_encode($data);	
			//Fin de las validaciones de acceso
			}
			else
			{
		  	require 'noacceso.php';
			}
		}		
	break;
	case 'reniec':
		if (!isset($_SESSION["nombre"]))
		{
		  header("Location: ../vistas/login.html");//Validamos el acceso solo a los usuarios logueados al sistema.
		}
		else
		{
			//Validamos el acceso solo al usuario logueado y autorizado.
			if ($_SESSION['almacen']==1)
			{			
				// var_dump($dni);
				$rspta=$usuario->captura_unic_reniec($dni);
		 		//Codificar el resultado utilizando json
		 		// var_dump($rspta); die;
		 		$data =array();

		 		 		$data[]=array(
		 				"0"=>$rspta['dni'],	
		 				"1"=>$rspta['nombres'],
		 				"2"=>$rspta['apellidoPaterno']." ".$rspta['apellidoMaterno'],
		 				"3"=>"DNI(*):"
		 				 
		 				);
		 			echo json_encode($data);	
			//Fin de las validaciones de acceso
			}
			else
			{
		  	require 'noacceso.php';
			}
		}		
	break;

	case 'select_distrito':
		if (!isset($_SESSION["nombre"]))
		{
		  header("Location: ../vistas/login.html");//Validamos el acceso solo a los usuarios logueados al sistema.
		}
		else
		{
			//Validamos el acceso solo al usuario logueado y autorizado.
			if ($_SESSION['almacen']==1)
			{			
				//var_dump($dni); die;
				$rspta=$usuario->listar_all_api_distrito();
		 		//Codificar el resultado utilizando json
		 		//var_dump($rspta); die;		 		 
		 			foreach($rspta["Detalle"] as $reg ){	
		 		 		 
		 				echo '<option value=' . $reg['id'] . '>' . $reg['nombre'] . '</option>';		 				 		 
		 		 	}
		 			 
			//Fin de las validaciones de acceso
			}
			else
			{
		  	require 'noacceso.php';
			}
		}		
	break;
	case 'select_cargo':
		if (!isset($_SESSION["nombre"]))
		{
		  header("Location: ../vistas/login.html");//Validamos el acceso solo a los usuarios logueados al sistema.
		}
		else
		{
			//Validamos el acceso solo al usuario logueado y autorizado.
			if ($_SESSION['almacen']==1)
			{			
				//var_dump($dni); die;
				$rspta=$usuario->listar_all_api_cargo();
		 		//Codificar el resultado utilizando json
		 		//var_dump($rspta); die;		 		 
		 			foreach($rspta["Detalle"] as $reg ){	
		 		 		 
		 				echo '<option value=' . $reg['id'] . '>' . $reg['nombre'] . '</option>';		 				 		 
		 		 	}
		 			 
			//Fin de las validaciones de acceso
			}
			else
			{
		  	require 'noacceso.php';
			}
		}		
	break;

	case 'select_tipo_doc':
		if (!isset($_SESSION["nombre"]))
		{
		  header("Location: ../vistas/login.html");//Validamos el acceso solo a los usuarios logueados al sistema.
		}
		else
		{
			//Validamos el acceso solo al usuario logueado y autorizado.
			if ($_SESSION['almacen']==1)
			{			
				//var_dump($dni); die;
				$rspta=$usuario->listar_all_api_tipo_doc();
		 		//Codificar el resultado utilizando json
		 		//var_dump($rspta); die;		 		 
		 			foreach($rspta["Detalle"] as $reg ){	
		 		 		 
		 				echo '<option value="' . $reg['id'] . '">' . $reg['nombre'] . '</option>';		 				 		 
		 		 	}
		 			 
			//Fin de las validaciones de acceso
			}
			else
			{
		  	require 'noacceso.php';
			}
		}		
	break;

	case 'select_sexo':
		if (!isset($_SESSION["nombre"]))
		{
		  header("Location: ../vistas/login.html");//Validamos el acceso solo a los usuarios logueados al sistema.
		}
		else
		{
			//Validamos el acceso solo al usuario logueado y autorizado.
			if ($_SESSION['almacen']==1)
			{			
				//var_dump($dni); die;
				$rspta=$usuario->listar_all_api_sexo();
		 		//Codificar el resultado utilizando json
		 		//var_dump($rspta); die;		 		 
		 			foreach($rspta["Detalle"] as $reg ){	
		 		 		 
		 				echo '<option value="' . $reg['id'] . '">' . $reg['nombre'] . '</option>';		 				 		 
		 		 	}
		 			 
			//Fin de las validaciones de acceso
			}
			else
			{
		  	require 'noacceso.php';
			}
		}		
	break;


	case 'salir':
		//Limpiamos las variables de sesión   
        session_unset();
        //Destruìmos la sesión
        session_destroy();
        //Redireccionamos al login
        header("Location: ../index.php");

	break;
}
ob_end_flush();
?>