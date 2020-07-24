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
require_once "../modelos/Tipo_lavado.php";

//$articulo=new Articulo();
$tipoLavado=new TipoLavado();

$id=isset($_POST["id"])? limpiarCadena($_POST["id"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$precio=isset($_POST["precio"])? limpiarCadena($_POST["precio"]):"";

switch ($_GET["op"]){
	case 'guardaryeditar':

		if (empty($id)){
			//var_dump($nombre,$precio,$imagen);die;
			$rspta=$tipoLavado->crear_tipo_lavado_api($nombre,$precio);
			//var_dump()
			echo $rspta ? "Insumo registrado" : "insumo no se pudo registrar";
		}
		else {
			$rspta=$tipoLavado->editar_api_tipo_lavado($id,$nombre,$precio);
			echo $rspta ? "Artículo actualizado" : "Artículo no se pudo actualizar";
		}
	break;

	case 'desactivar':

		$rspta=$tipoLavado->Dasactivar_uniq_tipo_lavado($id);
 		echo $rspta ? "Insumo Desactivado" : "Insumo no se puede desactivar";
	break;

	case 'activar':
		$rspta=$tipoLavado->Activar_uniq_tipo_prendas($id);
 		echo $rspta ? "Insumo activado" : "Insumo no se puede activar";
	break;

	case 'mostrar':
	//var_dump($id);
		$rspta=$tipoLavado->mostrar_uniq_api_tipo_lavado($id);
 		//Codificar el resultado utilizando json
 		//var_dump($rspta);die;
 		//var_dump($rspta);
 		echo json_encode($rspta);
 		
	break;

	case 'listar':
		$rspta=$tipoLavado->listar_api_tipo_lavado();
 		//Vamos a declarar un array
 		$data= Array();
        //var_dump($rspta);die;
 		foreach($rspta["Detalle"] as $reg ){
 			$data[]=array(
 				"0"=>($reg['estado_tipo_lavado'])?'<button class="btn btn-warning" onclick="mostrar('.$reg['idtipo_lavado'].')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-danger" onclick="desactivar('.$reg['idtipo_lavado'].')"><i class="fa fa-trash"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg['idtipo_lavado'].')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-primary" onclick="activar('.$reg['idtipo_lavado'].')"><i class="fa fa-check"></i></button>',
 				"1"=>$reg['nombre_tipo_lavado'],
 				"2"=>$reg['precio_tipo_lavado'],
 				"3"=>($reg['estado_tipo_lavado'])?'<span class="label bg-green">Activado</span>':
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