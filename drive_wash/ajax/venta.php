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
if ($_SESSION['ventas']==1)
{
require_once "../modelos/Venta.php";

$venta=new Venta();

 $idventa=isset($_POST["idventa"])? limpiarCadena($_POST["idventa"]):"";
// $idcliente=isset($_POST["idcliente"])? limpiarCadena($_POST["idcliente"]):"";
// $id=$_SESSION["id"];
// $tipo_comprobante=isset($_POST["tipo_comprobante"])? limpiarCadena($_POST["tipo_comprobante"]):"";
// $serie_comprobante=isset($_POST["serie_comprobante"])? limpiarCadena($_POST["serie_comprobante"]):"";
// $num_comprobante=isset($_POST["num_comprobante"])? limpiarCadena($_POST["num_comprobante"]):"";
// $fecha_hora=isset($_POST["fecha_hora"])? limpiarCadena($_POST["fecha_hora"]):"";
// $impuesto=isset($_POST["impuesto"])? limpiarCadena($_POST["impuesto"]):"";
// $total_venta=isset($_POST["total_venta"])? limpiarCadena($_POST["total_venta"]):"";

switch ($_GET["op"]){
	case 'guardaryeditar':
		// $precio_venta=$_POST["precio_venta"];
		$numero_pedido=$_POST["numero_pedido"];
		$id_tipo_pedido=$_POST["id_tipo_pedido"];
		$id_usuario=$_SESSION["id"];
		$id_cliente=$_POST["id_cliente"];
		$id_comprobante=$_POST["id_comprobante"];
		$serie_comprobante=$_POST["serie_comprobante"];
		$numero_comprobante=$_POST["numero_comprobante"];
		$impuesto=$_POST["impuesto"];
		$pago=$_POST["pago"];
		// $tipo_pago=$_POST["tipo_pago"];
		$id_tipo_servicio=$_POST["id_tipo_servicio"];
		$hora_recojo=$_POST["hora_recojo"];
		$fecha_hora_entrega=$_POST["fecha_hora_entrega"];
		
		$costo_delivery=$_POST["costo_delivery"];
		$total_venta=$_POST["total_venta"];

		$idarticulo=json_encode($_POST["idarticulo"],true);
		$id_color=json_encode($_POST["id_color"],true);
		$cantidad=json_encode($_POST["cantidad"],true);
		$precio_venta=json_encode( $_POST["precio_venta"],true);
		$descuento=json_encode($_POST["descuento"],true);
		 // var_dump($id_color); die;

		 // var_dump($numero_pedido,$id_tipo_pedido,$id_usuario,$id_cliente,$id_comprobante,$serie_comprobante,$impuesto,$pago,$tipo_pago,$id_tipo_servicio,$hora_recojo,$fecha_hora_entrega,$delivery,$costo_delivery,$idarticulo,$cantidad,$precio_venta,$descuento); die;
		if(empty($_POST["delivery"])){
		 	$delivery="1";
		}else{
		 	$delivery=$_POST["delivery"];
		} //var_dump($delivery); die;
		 
		if (empty($idventa)){
			$rspta=$venta->crear_pedido($numero_pedido,$id_tipo_pedido,$id_usuario,$id_cliente,$id_comprobante,$serie_comprobante,$numero_comprobante,$impuesto,$pago,$id_tipo_servicio,$fecha_hora_entrega,$delivery,$costo_delivery,$total_venta,$idarticulo,$id_color,$cantidad,$descuento);
			echo $rspta ? "Venta registrada" : "No se pudieron registrar todos los datos de la venta";
		}
		else {
		}
	break;

	case 'anular':
		$rspta=$venta->anular_boleta($idventa);
 		echo $rspta ? "PEDIDO ENVIADO" : "Pedido no se puede enviar";
	break;

	case 'enviar_pedido':
		$rspta=$venta->enviar_pedido($idventa);
 		echo $rspta ? "PEDIDO ENVIADO" : "Pedido no se puede enviar";
	break;

	case 'recuperar_pedido':
		$rspta=$venta->recuperar_pedido($idventa);
 		echo $rspta ? "PEDIDO RECUPERADO" : "Pedido no se puede recuperar";
	break;

	case 'mostrar':
		$rspta=$venta->mostrar($idventa);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'listarDetalle':
		//Recibimos el idingreso
		$id=$_GET['id'];

		$rspta = $venta->listarDetalle($id);
		$total=0;
		echo '<thead style="background-color:#A9D0F5">
                                    <th>Opciones</th>
                                    <th>Artículo</th>
                                    <th>Cantidad</th>
                                    <th>Precio Venta</th>
                                    <th>Descuento</th>
                                    <th>Subtotal</th>
                                </thead>';

		while ($reg = $rspta->fetch_object())
				{
					echo '<tr class="filas"><td></td><td>'.$reg->nombre.'</td><td>'.$reg->cantidad.'</td><td>'.$reg->precio_venta.'</td><td>'.$reg->descuento.'</td><td>'.$reg->subtotal.'</td></tr>';
					$total=$total+($reg->precio_venta*$reg->cantidad-$reg->descuento);
				}
		echo '<tfoot>
                                    <th>TOTAL</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th><h4 id="total">S/.'.$total.'</h4><input type="hidden" name="total_venta" id="total_venta"></th> 
                                </tfoot>';
	break;
	//LISTAR TODOS LO PEDIDOS DE PRENDA
	case 'listar':
		$rspta=$venta->lista_all_ventas();
		// var_dump($rspta); die;
 		//Vamos a declarar un array
 		$data= Array();

 		foreach ( $rspta['Detalle'] as $reg){
 			if($rspta['Detalle'][0]['id_tipo_comprobante']==1){
 			 	$url='../reportes/exTicket.php?id=';
 			}
 			 else{
 				$url='../reportes/exFactura.php?id=';
 			}

 			$data[]=array(
 				"0"=>(($reg['estado_boleta'])?
 					'<button class="btn btn-warning" title="Mostrar detalle de pedido" onclick="mostrar('.$reg['idpedido_prenda'].')">
 						<i class="fa fa-eye"></i>
 					</button>'.
 					' <button class="btn btn-danger" title="Anular Boleta o Factura" onclick="anularboleta('.$reg['idpedido_prenda'].')">
 						<i class="fa fa-close"></i>
 					</button>':
 					'<button class="btn btn-warning" title="Mostrar detalle de pedido" onclick="mostrar('.$reg['idpedido_prenda'].')">
 						<i class="fa fa-eye"></i>
 					</button>').
 					' <br><a target="_blank" href="'.$url.$reg['idpedido_prenda'].'"> 
	 					<button class="btn btn-info" title="Mostrar boleta o factura" style="margin:2px 0px 0px 0px !important;">
	 						<i class="fa fa-file"></i>
	 					</button>
 					</a>'.(($reg['estado_pedido_prenda'])?
 					'<button style="margin:2px 0px 0px 0px !important;" class="btn btn-danger" title="Enviar prenda" onclick="enviarpedido('.$reg['idpedido_prenda'].')">
 						<i class="fa fa-paper-plane"></i>
 					</button>':
 					'<button style="margin:2px 0px 0px 0px !important;" class="btn btn-success" title="Recuperar prenda" onclick="recuperarpedido('.$reg['idpedido_prenda'].')">
 						<i class="fa fa-reply"></i>
 					</button>'),
 				"1"=>($reg['momento_pago'])?
 					'<button class="label bg-green" onclick="modalpagar()">Pagado</button>':
 					'<button class="label bg-red" onclick="modalpagar()">Deudor</button>',
 				"2"=>$reg['fecha_pedido_prenda'],
 				"3"=>$reg['nombre_clientes'].' '.$reg['apellidos_clientes'],
 				"4"=>$reg['nombre_persona'].' '.$reg['apellidos_persona'],
 				"5"=>$reg['nombre_tipo_comprobante'].
 					(($reg['estado_boleta'])?
 						'<br><span class="label bg-green">Aceptado</span>':
 						'<br><span class="label bg-red">Anulado</span>'),
 				// "6"=>$reg['serie_comprobante'].'-'.$reg['numero_comprobante'],
 				"6"=>$reg['total_pedido'],
 				// "7"=>($reg['estado_boleta'])?'<span class="label bg-green">Aceptado</span>':
 				// 	'<span class="label bg-red">Anulado</span>',
 				"7"=>(($reg['estado_pedido_prenda'])?'<span class="label bg-red">No Entregado</span>':
 					'<span class="label bg-green">Entregado</span>')
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

	break;

	
	//lista las prendas disponibles
	case 'listarprendaslavado':
		require_once "../modelos/Prendas.php";
		$prendas=new Prendas();

		$rspta=$prendas->listar_api_prendas();
 		//Vamos a declarar un array
 		$data= Array();
 		//var_dump($rspta);die;
 		foreach ($rspta['Detalle'] as $reg) {
 			$data[]=array(
 				"0"=>'<button class="btn btn-warning" onclick="agregarDetalle('.$reg['idprenda'].',\''.$reg['nombre_prenda'].'\',\''.$reg['precio_prenda'].'\')"><span class="fa fa-plus"></span></button>',
 				"1"=>$reg['nombre_prenda'],
 				"2"=>$reg['precio_prenda'],
 				"3"=>"<img src='../files/prendas/".$reg['imagen_prenda']."' height='50px' width='50px' >"
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);
	break;

	/*case 'listartipolavado':
		require_once "../modelos/Tipo_lavado.php";
		$tipo=new TipoLavado();

		$rspta=$tipo->listar_api_tipolavado_enventa();
 		//Vamos a declarar un array
 		$data= Array();
 		//var_dump($rspta);die;
 		foreach ($rspta['Detalle'] as $reg) {
 			$data[]=array(
 				"0"=>'<button class="btn btn-warning" onclick="agregarDetalle('.$reg['id'].',\''.$reg['nombre'].'\',\''.$reg['precio'].'\')"><span class="fa fa-plus"></span></button>',
 				"1"=>$reg['nombre'],
 				"2"=>$reg['precio']
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);
	break;*/
	//LISTA LOS TIPO DE DELIVERIS
	case 'listardelivey':
		require_once "../modelos/Venta.php";
		 

		$rspta=$venta->select_api_delivey();
			//Vamos a declarar un array
		// if($rspta['Detalle'][0]['iddelivery']==7){
		// 	echo '<option value="1">hola</option>';
		// }
		 foreach ($rspta['Detalle'] as $reg){

			echo '<option value=' . $reg['iddelivery'] . '>' . $reg['nombre_delivery'] . '</option>';
		 }
	break;
	//LISTA EL TIPO DE SERVICIO DE LAVADO
	case 'listartipolavado':
		 
		$rspta=$venta->listar_all_tipo_sevicio_lavado();
			//Vamos a declarar un array
		echo '<option value="">NO SELECT</option>';
		foreach($rspta['Detalle'] as $reg){

			echo '<option value=' . $reg['idtipo_lavado'] . '>' . $reg['nombre_tipo_lavado'] . '</option>';
		}
	break;
	//LISTA LOS TIPOS DE PEDIDDOS PERSONAL, LLAMDA, WEB
	case 'listartipopedido':
		require_once "../modelos/Venta.php";
		$select=new Venta();

		$rspta=$select->selct_api_tipoPedido();
			//Vamos a declarar un array
		echo '<option value="">NO SELECT</option>';
		foreach ($rspta['Detalle'] as $reg){

			echo '<option value=' . $reg['idtipo_pedido'] . '>' . $reg['nombre_tipo_pedido'] . '</option>';
		}
	break;

	//LISTA ATODOS LOS CLIENTES PRA HACER UNA VENTA
	case 'listar_clientes':
		require_once "../modelos/Venta.php";
		$select=new Venta();

		$rspta=$select->listar_all_clientes();
			//Vamos a declarar un array
		echo '<option value="">NO SELECT</option>';
		foreach ($rspta['Detalle'] as $reg){

			echo '<option value=' . $reg['idclientes'] . '>' . $reg['nombre_clientes'] ." ".$reg['apellidos_clientes']. '</option>';
		}
	break;
	//LISTA TOOS LOS COMPROVANTES
	case 'listar_tiposcomprobante':
		require_once "../modelos/Venta.php";
		 
		$rspta=$venta->listar_all_tipocomprobante();
			//Vamos a declarar un array
		echo '<option value="">NO SELECT</option>';
		foreach ($rspta['Detalle'] as $reg){

			echo '<option value=' . $reg['idtipo_comprobante'] . '>' . $reg['nombre_tipo_comprobante'].'</option>';
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