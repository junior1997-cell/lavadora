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
if ($_SESSION['compras']==1)
{

require_once "../modelos/Librodiario.php";

$Librodiario=new Librodiario();

$idingreso=isset($_POST["idingreso"])? limpiarCadena($_POST["idingreso"]):"";
$idproveedor=isset($_POST["idproveedor"])? limpiarCadena($_POST["idproveedor"]):"";
$idusuario=$_SESSION["id"];
$tipo_comprobante=isset($_POST["tipo_comprobante"])? limpiarCadena($_POST["tipo_comprobante"]):"";
$serie_comprobante=isset($_POST["serie_comprobante"])? limpiarCadena($_POST["serie_comprobante"]):"";
$num_comprobante=isset($_POST["num_comprobante"])? limpiarCadena($_POST["num_comprobante"]):"";
$fecha_hora=isset($_POST["fecha_hora"])? limpiarCadena($_POST["fecha_hora"]):"";
$impuesto=isset($_POST["impuesto"])? limpiarCadena($_POST["impuesto"]):"";
$total_compra=isset($_POST["total_compra"])? limpiarCadena($_POST["total_compra"]):"";

switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($idingreso)){
			$rspta=$Librodiario->insertar($idproveedor,$idusuario,$tipo_comprobante,$serie_comprobante,$num_comprobante,$fecha_hora,$impuesto,$total_compra,$_POST["idarticulo"],$_POST["cantidad"],$_POST["precio_compra"],$_POST["precio_venta"]);
			echo $rspta ? "Ingreso registrado" : "No se pudieron registrar todos los datos del ingreso";
		}
		else {
		}
	break;

	case 'anular':
		$rspta=$Librodiario->anular($idingreso);
 		echo $rspta ? "Ingreso anulado" : "Ingreso no se puede anular";
	break;

	case 'mostrar':
		$rspta=$Librodiario->mostrar($idingreso);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'listarDetalle':
		//Recibimos el idingreso
		$id=$_GET['id'];

		$rspta = $Librodiario->listarDetalle($id);
		$total=0;
		echo '<thead style="background-color:#A9D0F5">
                                    <th>Opciones</th>
                                    <th>Artículo</th>
                                    <th>Cantidad</th>
                                    <th>Precio Compra</th>
                                    <th>Precio Venta</th>
                                    <th>Subtotal</th>
                                </thead>';

		while ($reg = $rspta->fetch_object())
				{
					echo '<tr class="filas"><td></td><td>'.$reg->nombre.'</td><td>'.$reg->cantidad.'</td><td>'.$reg->precio_compra.'</td><td>'.$reg->precio_venta.'</td><td>'.$reg->precio_compra*$reg->cantidad.'</td></tr>';
					$total=$total+($reg->precio_compra*$reg->cantidad);
				}
		echo '<tfoot>
                                    <th>TOTAL</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th><h4 id="total">S/.'.$total.'</h4><input type="hidden" name="total_compra" id="total_compra"></th> 
                                </tfoot>';
	break;

	case 'listar':
		$rspta=$Librodiario->api_listar_libro_diario();
 		//Vamos a declarar un array
 		$data= Array();
        //var_dump($rspta);die;
 		foreach($rspta["Detalle"] as $reg ){
 			$data[]=array(
 				"0"=>($reg['estado'])?'<button class="btn btn-warning" onclick="mostrar('.$reg['idlibrodiario'].')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-danger" onclick="desactivar('.$reg['idlibrodiario'].')" disabled><i class="fa fa-trash" ></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg['idlibrodiario'].')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-primary" onclick="activar('.$reg['idlibrodiario'].')"><i class="fa fa-check"></i></button>',
 				"1"=>$reg['n_operacion'],
 				"2"=>$reg['fecha'],
 				"3"=>$reg['glosa'],
 				"4"=>$reg['codigo_plan_contable'],
 				"5"=>$reg['descripcion_plan_contable'],
 				"6"=>$reg['debe'],
 				"7"=>$reg['haber']
 				
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);
	break;

	case 'selectProveedor':
		require_once "../modelos/Persona.php";
		$persona = new Persona();

		$rspta = $persona->listarP();

		while ($reg = $rspta->fetch_object())
				{
				echo '<option value=' . $reg->idpersona . '>' . $reg->nombre . '</option>';
				}
	break;

	case 'SelecLibroContable':

		$rspta = $Librodiario->listar_libro_diario();

		foreach($rspta["Detalle"] as $reg ){
				echo '<option value=' . $reg['idlibrocontable'] . '>' . $reg['codigoCont'].' '.$reg['nombrelibroCont']. '</option>';
				}
	break;

	case 'listarPedido_venta':

		$rspta=$Librodiario->api_listar_pedidop_ld();
 		//Vamos a declarar un array
 		$data= Array();
        //var_dump($rspta);die;

 		foreach($rspta["Detalle"] as $reg ){
 			$data[]=array(
 				"0"=>'<button class="btn btn-warning" onclick="agregarDatellepedido('.$reg['idpedido_prenda'].',\''.$reg['numero_comprobante'].'\',\''.$reg['total_pedido'].'\')"><span class="fa fa-plus"></span></button> <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModall" onclick="Listar_detalle_unico_reg('.$reg['idpedido_prenda'].')"><span class="fa fa-eye"></span></button> ',
 				"1"=>$reg['numero_pedido'],
 				"2"=>$reg['nombre_tipo_comprobante'],
 				"3"=>$reg['serie_comprobante'],
 				"4"=>$reg['numero_comprobante'],
 				"4"=>$reg['total_pedido'],
 				"5"=>$reg['fecha_pedido_prenda']
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);
	break;

	case 'total_pedido_ld':
		$total=$_POST["total"];

		$rspta = $Librodiario->total_api_pedido_prenda($total);
		echo json_encode($rspta);
	break;


	case 'listarDetalleuniq':

		$iddetalle = $_POST['iddetalle'];


		$rspta=$Librodiario->listar_detalle_unico_enmodal($iddetalle);
 		//Vamos a declarar un array
 		$data= Array();
 		$count = 1;
        //var_dump($rspta);die;
        echo '<table class="table">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">cantidad</th>
				      <th scope="col">prenda</th>
				    </tr>
				  </thead>';

 		foreach($rspta["Detalle"] as $reg ){

 			echo '
				  <tbody>
				    <tr>
				      <th scope="row">'.$count.'</th>
				      <td>'.$reg['cantidad'].'</td>
				      <td>'.$reg['prenda'].'</td>
				    </tr>
				  </tbody>
				';
				$count=$count+1;
				
 		}
 		echo '</table>';

 		
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