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
require_once "../modelos/Planilla.php";

$planilla=new Planilla();

$codigo=isset($_POST["codigo"])? limpiarCadena($_POST["codigo"]):"";
$apellidos_nombres=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$cargo=isset($_POST["cargo"])? limpiarCadena($_POST["cargo"]):"";
$asignacion_familiar=isset($_POST["id_asignacion"])? limpiarCadena($_POST["id_asignacion"]):"";
$sueldo_basico=isset($_POST["sueldo_basico"])? limpiarCadena($_POST["sueldo_basico"]):"";
$asignacion_monto=isset($_POST["monto_asignacion"])? limpiarCadena($_POST["monto_asignacion"]):"";
$otros=isset($_POST["otros"])? limpiarCadena($_POST["otros"]):"";
$total_remuneracion_bruta=isset($_POST["total_remuneracion"])? limpiarCadena($_POST["total_remuneracion"]):"";
$snp_onp=isset($_POST["snp_onp"])? limpiarCadena($_POST["snp_onp"]):"";
$snp_onp=isset($_POST["onp"])? limpiarCadena($_POST["onp"]):"";
$id_afp=isset($_POST["id_afp"])? limpiarCadena($_POST["id_afp"]):"";
$aporte_obligatario=isset($_POST["aporte_obligatario"])? limpiarCadena($_POST["aporte_obligatario"]):"";
$comision_ra=isset($_POST["comision_ra"])? limpiarCadena($_POST["comision_ra"]):"";
$prima_seguro=isset($_POST["prima_seguro"])? limpiarCadena($_POST["prima_seguro"]):"";
$total_descuento=isset($_POST["total_descuento"])? limpiarCadena($_POST["total_descuento"]):"";
$remuneracion_neta=isset($_POST["remuneracion_neta"])? limpiarCadena($_POST["remuneracion_neta"]):"";
$salud=isset($_POST["salud"])? limpiarCadena($_POST["salud"]):"";
$sctr=isset($_POST["sctr"])? limpiarCadena($_POST["sctr"]):"";
$total_aportes=isset($_POST["total_aportes"])? limpiarCadena($_POST["total_aportes"]):"";


switch ($_GET["op"]){
	case 'guardaryeditar':

		$codigo_planilla=$_POST["codigo"];
		$nombres_planilla=$_POST["apellidos_nombres"];
		$id_cargo_ocupacion=$_POST["cargo"];
		$asig_familiar_planilla=$_POST["id_asignacion"];
		$sueldo_basico_planilla=$_POST["sueldo_basico"];
		$monto_asig_familiar_planilla=$_POST["monto_asignacion"];
		$otros_planilla=$_POST["otros"];
		$total_remunera_bruta_planilla=$_POST["total_remuneracion"];
		$snp_onp_planilla=$_POST["snp_onp"];
		$monto_onp=$_POST["onp"];
		$id_afp=$_POST["id_afp"];
		$aporte_obligatorio_planilla=$_POST["aporte_obligatario"];
		$comision_sobre_ra_planilla=$_POST["comision_ra"];
		$prima_seguro_planilla=$_POST["prima_seguro"];
		$total_descuento_planilla=$_POST["total_descuento"];
		$remuneracion_neta_planilla=$_POST["remuneracion_neta"];
		$aporte_salud_planilla=$_POST["salud"];
		$aporte_sctr_planilla=$_POST["sctr"];
		$aporte_total_planilla=$_POST["total_aportes"];

		/*var_dump($nombres_planilla,$id_cargo_ocupacion,$asig_familiar_planilla,$sueldo_basico_planilla,$monto_asig_familiar_planilla,$otros_planilla,$total_remunera_bruta_planilla,$snp_onp_planilla,$monto_onp,$id_afp,$aporte_obligatorio_planilla,$comision_sobre_ra_planilla,$prima_seguro_planilla,$total_descuento_planilla,$remuneracion_neta_planilla,$aporte_salud_planilla,$aporte_sctr_planilla,$aporte_total_planilla);*/

		if (empty($idplanilla)){
			$rspta=$planilla->api_crear_planilla($codigo_planilla,$nombres_planilla,$id_cargo_ocupacion,$asig_familiar_planilla,$sueldo_basico_planilla,$monto_asig_familiar_planilla,$otros_planilla,$total_remunera_bruta_planilla,$snp_onp_planilla,$monto_onp,$id_afp,$aporte_obligatorio_planilla,$comision_sobre_ra_planilla,$prima_seguro_planilla,$total_descuento_planilla,$remuneracion_neta_planilla,$aporte_salud_planilla,$aporte_sctr_planilla,$aporte_total_planilla);
			echo $rspta ? "Planilla Registrada" : "No se pudo registrar planilla";
		}
		else {
			$rspta=$planilla->editar($idplanilla,$codigo,$apellidos_nombres,$cargo,$asignacion_familiar,$sueldo_basico,$asignacion_monto,$otros,$total_remuneracion_bruta,$snp_onp,$id_afp,$aporte_obligatario,$comision_ra,$prima_seguro,$total_descuento,$remuneracion_neta,$salud,$sctr,$total_aportes);
			echo $rspta ? "Planilla actualizado" : "La planilla no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$planilla->desactivar($idplanilla);
 		echo $rspta ? "Artículo Desactivado" : "Artículo no se puede desactivar";
	break;

	case 'activar':
		$rspta=$planilla->activar($idplanilla);
 		echo $rspta ? "Artículo activado" : "Artículo no se puede activar";
	break;

	case 'mostrar':
		$rspta=$planilla->mostrar($idplanilla);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'listar':
		$rspta=$planilla->listarPlanillas();
 		//Vamos a declarar un array
 		//var_dump($rspta); die;
 		$data= Array();		

 		foreach ($rspta["Detalle"] as $reg){
 			$data[]=array(
 				"0"=>($reg['idplanilla'])?'<button class="btn btn-warning" disabled onclick="mostrar('.$reg['idplanilla'].')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-danger" disabled onclick="desactivar('.$reg['idplanilla'].')"><i class="fa fa-close"></i></button>':
 					'<button class="btn btn-warning" disabled onclick="mostrar('.$reg['idplanilla'].')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-primary" disabled onclick="activar('.$reg['idplanilla'].')"><i class="fa fa-check"></i></button>',
 				"1"=>$reg['codigo_planilla'],
 				"2"=>$reg['nombre_persona'],
 				"3"=>$reg['nombre_cargo'],
 				"4"=>$reg['asig_familiar_planilla'],
 				"5"=>$reg['sueldo_basico_planilla'],
 				"6"=>$reg['monto_asig_familiar_planilla'],
 				"7"=>$reg['total_remunera_bruta_planilla'],
 				"8"=>$reg['snp_onp_planilla'],
 				"9"=>$reg['monto_onp'],
 				"10"=>$reg['nombre_afp'], 				
 				"11"=>$reg['aporte_obligatorio_planilla'],
 				"12"=>$reg['comision_sobre_ra_planilla'], 
 				"13"=>$reg['prima_seguro_planilla'], 
 				"14"=>$reg['total_descuento_planilla'], 
 				"15"=>$reg['remuneracion_neta_planilla'], 
 				"16"=>$reg['aporte_salud_planilla'], 
 				"17"=>$reg['aporte_sctr_planilla'], 
 				"18"=>$reg['aporte_total_planilla'] 
 				//"6"=>($reg['estado'])?'<span class="label bg-green">Activado</span>':
 				//'<span class="label bg-red">Desactivado</span>'*/
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

	break;

	case 'listar_porcentaje':
		$rspta=$planilla->listar_porcentajes_Descuento();
 		//Vamos a declarar un array
 		var_dump($rspta); die;
 		$data= Array();		

 		foreach ($rspta["Detalle"][0] as $reg){
 			$data[]=array(
 				"0"=>($reg['idporcentajes_de_pago'])?'<button class="btn btn-warning" onclick="mostrar('.$reg['idporcentajes_de_pago'].')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-danger" onclick="desactivar('.$reg['idporcentajes_de_pago'].')"><i class="fa fa-close"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg['idporcentajes_de_pago'].')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-primary" onclick="activar('.$reg['idporcentajes_de_pago'].')"><i class="fa fa-check"></i></button>',
 				"1"=>$reg['nombre_porcentajes_de_pago'],
 				"2"=>$reg['porcentaje_porcentajes_de_pago'],
 				"3"=>$reg['aporte_obligatorio'],
 				"4"=>$reg['comision_sobre_ra'],
 				"5"=>$reg['prima_seguro'] 							
 				//"6"=>($reg['estado'])?'<span class="label bg-green">Activado</span>':
 				//'<span class="label bg-red">Desactivado</span>'
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

	break;

	case "selectCategoria":
		require_once "../modelos/Categoria.php";
		$categoria = new Categoria();

		$rspta = $categoria->select();

		while ($reg = $rspta->fetch_object())
				{
					echo '<option value=' . $reg->idcategoria . '>' . $reg->nombre . '</option>';
				}
	break;

		//LISTA ATODOS LOS CLIENTES PRA HACER UNA VENTA
	case 'listar_usuarios_select':

		$rspta=$planilla->api_select_usuario();
			//Vamos a declarar un array
		echo '<option value="">NO SELECT</option>';
		foreach ($rspta['Detalle'] as $reg){

			echo '<option value=' . $reg['idpersona'] . '>' . $reg['nombre_persona'] ." ".$reg['apellidos_persona']. '</option>';
		}
	break;

	case 'afp_select':

		$rspta=$planilla->api_select_afp();
			//Vamos a declarar un array
		echo '<option value="">NO SELECT</option>';
		foreach ($rspta['Detalle'] as $reg){

			echo '<option value=' . $reg['idafp'] . '>' . $reg['nombre_afp']. '</option>';
		}
	break;

	case 'cargo_select':

		$rspta=$planilla->api_select_cargo();
			//Vamos a declarar un array
		echo '<option value="">NO SELECT</option>';
		foreach ($rspta['Detalle'] as $reg){

			echo '<option value=' . $reg['idcargo'] . '>' . $reg['nombre_cargo']. '</option>';
		}
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