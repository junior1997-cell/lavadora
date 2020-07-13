<?php 
ob_start();
if (strlen(session_id()) < 1){
	session_start();//Validamos si existe o no la sesión
}
if (!isset($_SESSION["nombre"]))
{
  header("Location: ../vistas/login.html");//Validamos el acceso solo a los usuarios logueados al sistema.
}
else
{
//Validamos el acceso solo al usuario logueado y autorizado.
if ($_SESSION['almacen']==1)
{	
//require_once "../modelos/Articulo.php";
require_once "../modelos/Insumos.php";

//$articulo=new Articulo();
$insumos=new Insumos();

$id=isset($_POST["id"])? limpiarCadena($_POST["id"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$stock=isset($_POST["stock"])? limpiarCadena($_POST["stock"]):"";
$descripcion=isset($_POST["descripcion"])? limpiarCadena($_POST["descripcion"]):"";
$imagen=isset($_POST["imagen"])? limpiarCadena($_POST["imagen"]):"";

switch ($_GET["op"]){
	case 'guardaryeditar':

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
				move_uploaded_file($_FILES["imagen"]["tmp_name"], "../files/insumos/".$imagen);
			}
		}
		if (empty($id)){
			$rspta=$insumos->crear_insumos_api($nombre,$stock,$imagen,$descripcion);
			echo $rspta ? "Insumo registrado" : "insumo no se pudo registrar";
		}
		else {
			$rspta=$insumos->editar_api_insumos($id,$nombre,$stock,$imagen,$descripcion);
			echo $rspta ? "Artículo actualizado" : "Artículo no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$insumos->Dasactivar_uniq_insumo($id);
 		echo $rspta ? "Insumo Desactivado" : "Insumo no se puede desactivar";
	break;

	case 'activar':
		$rspta=$insumos->Activar_uniq_insumo($id);
 		echo $rspta ? "Insumo activado" : "Insumo no se puede activar";
	break;

	case 'mostrar':
		$rspta=$insumos->mostrar_uniq_api_insumos($id);
 		//Codificar el resultado utilizando json
 		//var_dump($rspta); die;
 		//var_dump($rspta);
 		echo json_encode($rspta);
 		
	break;

	case 'listar':
		$rspta=$insumos->listar_api_insumos();
 		//Vamos a declarar un array
 		$data= Array();
        //var_dump($rspta);die;
 		foreach($rspta["Detalle"] as $reg ){
 			$data[]=array(
 				"0"=>($reg['estado'])?'<button class="btn btn-warning" onclick="mostrar('.$reg['id'].')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-danger" onclick="desactivar('.$reg['id'].')"><i class="fa fa-trash"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg['id'].')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-primary" onclick="activar('.$reg['id'].')"><i class="fa fa-check"></i></button>',
 				"1"=>$reg['nombre'],
 				"2"=>$reg['stock'],
 				"3"=>$reg['descripcion'],
 				"4"=>"<img src='../files/insumos/".$reg['imagen']."' height='40px' width='40px' >",
 				"5"=>($reg['estado'])?'<span class="label bg-green">Activado</span>':
 				'<span class="label bg-red">Desactivado</span>'
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

	break;

}
//Fin de las validaciones de acceso
}
else
{
  require 'noacceso.php';
}
}
ob_end_flush();
?>