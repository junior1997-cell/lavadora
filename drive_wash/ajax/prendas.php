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
require_once "../modelos/Prendas.php";

//$articulo=new Articulo();
$prendas=new Prendas();

$id=isset($_POST["id"])? limpiarCadena($_POST["id"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$precio=isset($_POST["precio"])? limpiarCadena($_POST["precio"]):"";
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
				move_uploaded_file($_FILES["imagen"]["tmp_name"], "../files/prendas/".$imagen);
			}
		}
		if (empty($id)){
			//var_dump($nombre,$precio,$imagen);die;
			$rspta=$prendas->crear_Prendas_api($nombre,$precio,$imagen);
			//var_dump()
			echo $rspta ? "Insumo registrado" : "insumo no se pudo registrar";
		}
		else {
			$rspta=$prendas->editar_api_prendas($id,$nombre,$precio,$imagen);
			echo $rspta ? "Artículo actualizado" : "Artículo no se pudo actualizar";
		}
	break;

	case 'desactivar':

		$rspta=$prendas->Dasactivar_uniq_prenda($id);
 		echo $rspta ? "Insumo Desactivado" : "Insumo no se puede desactivar";
	break;

	case 'activar':
		$rspta=$prendas->Activar_uniq_prendas($id);
 		echo $rspta ? "Insumo activado" : "Insumo no se puede activar";
	break;

	case 'mostrar':
		$idprenda=isset($_POST["idprenda"])? limpiarCadena($_POST["idprenda"]):"";
	//var_dump($id);
		$rspta=$prendas->mostrar_uniq_api_prendas($idprenda);
 		//Codificar el resultado utilizando json
 		//var_dump($rspta);die;
 		//var_dump($rspta);
 		echo json_encode($rspta);
 		
	break;

	case 'listar':
		$rspta=$prendas->listar_api_prendas();
 		//Vamos a declarar un array
 		$data= Array();
        //var_dump($rspta);die;
 		foreach($rspta["Detalle"] as $reg ){
 			$data[]=array(
 				"0"=>($reg['estado_prenda'])?'<button class="btn btn-warning" onclick="mostrar('.$reg['idprenda'].')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-danger" onclick="desactivar('.$reg['idprenda'].')"><i class="fa fa-trash"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg['idprenda'].')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-primary" onclick="activar('.$reg['idprenda'].')"><i class="fa fa-check"></i></button>',
 				"1"=>$reg['nombre_prenda'],
 				"2"=>$reg['precio_prenda'],
 				"3"=>"<img src='../files/prendas/".$reg['imagen_prenda']."' height='40px' width='40px' >",
 				"4"=>($reg['estado_prenda'])?'<span class="label bg-green">Activado</span>':
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