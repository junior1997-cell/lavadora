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

require_once "../modelos/Libromayor.php";

$Libromayor=new Libromayor();

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
			$rspta=$Libromayor->insertar($idproveedor,$idusuario,$tipo_comprobante,$serie_comprobante,$num_comprobante,$fecha_hora,$impuesto,$total_compra,$_POST["idarticulo"],$_POST["cantidad"],$_POST["precio_compra"],$_POST["precio_venta"]);
			echo $rspta ? "Ingreso registrado" : "No se pudieron registrar todos los datos del ingreso";
		}
		else {
		}
	break;

	case 'anular':
		$rspta=$Libromayor->anular($idingreso);
 		echo $rspta ? "Ingreso anulado" : "Ingreso no se puede anular";
	break;

	case 'mostrar':
		$rspta=$Libromayor->mostrar($idingreso);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'listarDetalle':
		//Recibimos el idingreso
		$id=$_GET['id'];

		$rspta = $Libromayor->listarDetalle($id);
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

	case 'listar10':
		$rspta=$Libromayor->api_listar_libro_mayor10();
 		//Vamos a declarar un array
 		$data= Array();
        //var_dump($rspta);die;
 		foreach($rspta["Detalle"] as $reg ){
 			$data[]=array(
 				"0"=>$reg['codigo_plan_contable'],
 				"1"=>$reg['descripcion_plan_contable'],
 				"2"=>$reg['n_operacion'],
 				"3"=>$reg['fecha'],
 				"4"=>$reg['glosa'],
 				"5"=>$reg['debe'],
 				"6"=>$reg['haber'] 				
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);
	break;

	case 'total_debe_haber_c10':
		$rspta = $Libromayor->total_debe_haber10();
		//var_dump($rspta);die;
		echo json_encode($rspta);
	break;


	case 'listar12':
		$rspta=$Libromayor->api_listar_libro_mayor12();
 		//Vamos a declarar un array
 		$data= Array();
        //var_dump($rspta);die;
 		foreach($rspta["Detalle"] as $reg ){
 			$data[]=array(
 				"0"=>$reg['codigo_plan_contable'],
 				"1"=>$reg['descripcion_plan_contable'],
 				"2"=>$reg['n_operacion'],
 				"3"=>$reg['fecha'],
 				"4"=>$reg['glosa'],
 				"5"=>$reg['debe'],
 				"6"=>$reg['haber'] 				
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);
	break;

	case 'total_debe_haber_c12':
		$rspta = $Libromayor->total_debe_haber12();
		//var_dump($rspta);die;
		echo json_encode($rspta);
	break;


	case 'listar14':
		$rspta=$Libromayor->api_listar_libro_mayor14();
 		//Vamos a declarar un array
 		$data= Array();
        //var_dump($rspta);die;
 		foreach($rspta["Detalle"] as $reg ){
 			$data[]=array(
 				"0"=>$reg['codigo_plan_contable'],
 				"1"=>$reg['descripcion_plan_contable'],
 				"2"=>$reg['n_operacion'],
 				"3"=>$reg['fecha'],
 				"4"=>$reg['glosa'],
 				"5"=>$reg['debe'],
 				"6"=>$reg['haber'] 				
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);
	break;

	case 'total_debe_haber_c14':
		$rspta = $Libromayor->total_debe_haber14();
		//var_dump($rspta);die;
		echo json_encode($rspta);
	break;

	case 'listar20':
		$rspta=$Libromayor->api_listar_libro_mayor20();
 		//Vamos a declarar un array
 		$data= Array();
        //var_dump($rspta);die;
 		foreach($rspta["Detalle"] as $reg ){
 			$data[]=array(
 				"0"=>$reg['codigo_plan_contable'],
 				"1"=>$reg['descripcion_plan_contable'],
 				"2"=>$reg['n_operacion'],
 				"3"=>$reg['fecha'],
 				"4"=>$reg['glosa'],
 				"5"=>$reg['debe'],
 				"6"=>$reg['haber'] 				
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);
	break;

	case 'total_debe_haber_c20':
		$rspta = $Libromayor->total_debe_haber20();
		//var_dump($rspta);die;
		echo json_encode($rspta);
	break;

	case 'listar33':
		$rspta=$Libromayor->api_listar_libro_mayor33();
 		//Vamos a declarar un array
 		$data= Array();
        //var_dump($rspta);die;
 		foreach($rspta["Detalle"] as $reg ){
 			$data[]=array(
 				"0"=>$reg['codigo_plan_contable'],
 				"1"=>$reg['descripcion_plan_contable'],
 				"2"=>$reg['n_operacion'],
 				"3"=>$reg['fecha'],
 				"4"=>$reg['glosa'],
 				"5"=>$reg['debe'],
 				"6"=>$reg['haber'] 				
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);
	break;

	case 'total_debe_haber_c33':
		$rspta = $Libromayor->total_debe_haber33();
		//var_dump($rspta);die;
		echo json_encode($rspta);
	break;

	case 'listar40':
		$rspta=$Libromayor->api_listar_libro_mayor40();
 		//Vamos a declarar un array
 		$data= Array();
        //var_dump($rspta);die;
 		foreach($rspta["Detalle"] as $reg ){
 			$data[]=array(
 				"0"=>$reg['codigo_plan_contable'],
 				"1"=>$reg['descripcion_plan_contable'],
 				"2"=>$reg['n_operacion'],
 				"3"=>$reg['fecha'],
 				"4"=>$reg['glosa'],
 				"5"=>$reg['debe'],
 				"6"=>$reg['haber'] 				
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);
	break;

	case 'total_debe_haber_c40':
		$rspta = $Libromayor->total_debe_haber40();
		//var_dump($rspta);die;
		echo json_encode($rspta);
	break;

	case 'listar41':
		$rspta=$Libromayor->api_listar_libro_mayor41();
 		//Vamos a declarar un array
 		$data= Array();
        //var_dump($rspta);die;
 		foreach($rspta["Detalle"] as $reg ){
 			$data[]=array(
 				"0"=>$reg['codigo_plan_contable'],
 				"1"=>$reg['descripcion_plan_contable'],
 				"2"=>$reg['n_operacion'],
 				"3"=>$reg['fecha'],
 				"4"=>$reg['glosa'],
 				"5"=>$reg['debe'],
 				"6"=>$reg['haber'] 				
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);
	break;

	case 'total_debe_haber_c41':
		$rspta = $Libromayor->total_debe_haber41();
		//var_dump($rspta);die;
		echo json_encode($rspta);
	break;

	case 'listar42':
		$rspta=$Libromayor->api_listar_libro_mayor42();
 		//Vamos a declarar un array
 		$data= Array();
        //var_dump($rspta);die;
 		foreach($rspta["Detalle"] as $reg ){
 			$data[]=array(
 				"0"=>$reg['codigo_plan_contable'],
 				"1"=>$reg['descripcion_plan_contable'],
 				"2"=>$reg['n_operacion'],
 				"3"=>$reg['fecha'],
 				"4"=>$reg['glosa'],
 				"5"=>$reg['debe'],
 				"6"=>$reg['haber'] 				
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);
	break;

	case 'total_debe_haber_c42':
		$rspta = $Libromayor->total_debe_haber42();
		//var_dump($rspta);die;
		echo json_encode($rspta);
	break;

	case 'listar45':
		$rspta=$Libromayor->api_listar_libro_mayor45();
 		//Vamos a declarar un array
 		$data= Array();
        //var_dump($rspta);die;
 		foreach($rspta["Detalle"] as $reg ){
 			$data[]=array(
 				"0"=>$reg['codigo_plan_contable'],
 				"1"=>$reg['descripcion_plan_contable'],
 				"2"=>$reg['n_operacion'],
 				"3"=>$reg['fecha'],
 				"4"=>$reg['glosa'],
 				"5"=>$reg['debe'],
 				"6"=>$reg['haber'] 				
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);
	break;

	case 'total_debe_haber_c45':
		$rspta = $Libromayor->total_debe_haber45();
		//var_dump($rspta);die;
		echo json_encode($rspta);
	break;

	case 'listar46':
		$rspta=$Libromayor->api_listar_libro_mayor46();
 		//Vamos a declarar un array
 		$data= Array();
        //var_dump($rspta);die;
 		foreach($rspta["Detalle"] as $reg ){
 			$data[]=array(
 				"0"=>$reg['codigo_plan_contable'],
 				"1"=>$reg['descripcion_plan_contable'],
 				"2"=>$reg['n_operacion'],
 				"3"=>$reg['fecha'],
 				"4"=>$reg['glosa'],
 				"5"=>$reg['debe'],
 				"6"=>$reg['haber'] 				
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);
	break;

	case 'total_debe_haber_c46':
		$rspta = $Libromayor->total_debe_haber46();
		//var_dump($rspta);die;
		echo json_encode($rspta);
	break;

	case 'listar50':
		$rspta=$Libromayor->api_listar_libro_mayor50();
 		//Vamos a declarar un array
 		$data= Array();
        //var_dump($rspta);die;
 		foreach($rspta["Detalle"] as $reg ){
 			$data[]=array(
 				"0"=>$reg['codigo_plan_contable'],
 				"1"=>$reg['descripcion_plan_contable'],
 				"2"=>$reg['n_operacion'],
 				"3"=>$reg['fecha'],
 				"4"=>$reg['glosa'],
 				"5"=>$reg['debe'],
 				"6"=>$reg['haber'] 				
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);
	break;

	case 'total_debe_haber_c50':
		$rspta = $Libromayor->total_debe_haber50();
		//var_dump($rspta);die;
		echo json_encode($rspta);
	break;

	case 'listar59':
		$rspta=$Libromayor->api_listar_libro_mayor59();
 		//Vamos a declarar un array
 		$data= Array();
        //var_dump($rspta);die;
 		foreach($rspta["Detalle"] as $reg ){
 			$data[]=array(
 				"0"=>$reg['codigo_plan_contable'],
 				"1"=>$reg['descripcion_plan_contable'],
 				"2"=>$reg['n_operacion'],
 				"3"=>$reg['fecha'],
 				"4"=>$reg['glosa'],
 				"5"=>$reg['debe'],
 				"6"=>$reg['haber'] 				
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);
	break;

	case 'total_debe_haber_c59':
		$rspta = $Libromayor->total_debe_haber59();
		//var_dump($rspta);die;
		echo json_encode($rspta);
	break;

	case 'listar60':
		$rspta=$Libromayor->api_listar_libro_mayor60();
 		//Vamos a declarar un array
 		$data= Array();
        //var_dump($rspta);die;
 		foreach($rspta["Detalle"] as $reg ){
 			$data[]=array(
 				"0"=>$reg['codigo_plan_contable'],
 				"1"=>$reg['descripcion_plan_contable'],
 				"2"=>$reg['n_operacion'],
 				"3"=>$reg['fecha'],
 				"4"=>$reg['glosa'],
 				"5"=>$reg['debe'],
 				"6"=>$reg['haber'] 				
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);
	break;

	case 'total_debe_haber_c60':
		$rspta = $Libromayor->total_debe_haber60();
		//var_dump($rspta);die;
		echo json_encode($rspta);
	break;

	case 'listar61':
		$rspta=$Libromayor->api_listar_libro_mayor61();
 		//Vamos a declarar un array
 		$data= Array();
        //var_dump($rspta);die;
 		foreach($rspta["Detalle"] as $reg ){
 			$data[]=array(
 				"0"=>$reg['codigo_plan_contable'],
 				"1"=>$reg['descripcion_plan_contable'],
 				"2"=>$reg['n_operacion'],
 				"3"=>$reg['fecha'],
 				"4"=>$reg['glosa'],
 				"5"=>$reg['debe'],
 				"6"=>$reg['haber'] 				
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);
	break;

	case 'total_debe_haber_c61':
		$rspta = $Libromayor->total_debe_haber61();
		//var_dump($rspta);die;
		echo json_encode($rspta);
	break;

	case 'listar62':
		$rspta=$Libromayor->api_listar_libro_mayor62();
 		//Vamos a declarar un array
 		$data= Array();
        //var_dump($rspta);die;
 		foreach($rspta["Detalle"] as $reg ){
 			$data[]=array(
 				"0"=>$reg['codigo_plan_contable'],
 				"1"=>$reg['descripcion_plan_contable'],
 				"2"=>$reg['n_operacion'],
 				"3"=>$reg['fecha'],
 				"4"=>$reg['glosa'],
 				"5"=>$reg['debe'],
 				"6"=>$reg['haber'] 				
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);
	break;

	case 'total_debe_haber_c62':
		$rspta = $Libromayor->total_debe_haber62();
		//var_dump($rspta);die;
		echo json_encode($rspta);
	break;

	case 'listar63':
		$rspta=$Libromayor->api_listar_libro_mayor63();
 		//Vamos a declarar un array
 		$data= Array();
        //var_dump($rspta);die;
 		foreach($rspta["Detalle"] as $reg ){
 			$data[]=array(
 				"0"=>$reg['codigo_plan_contable'],
 				"1"=>$reg['descripcion_plan_contable'],
 				"2"=>$reg['n_operacion'],
 				"3"=>$reg['fecha'],
 				"4"=>$reg['glosa'],
 				"5"=>$reg['debe'],
 				"6"=>$reg['haber'] 				
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);
	break;

	case 'total_debe_haber_c63':
		$rspta = $Libromayor->total_debe_haber63();
		//var_dump($rspta);die;
		echo json_encode($rspta);
	break;

	case 'listar69':
		$rspta=$Libromayor->api_listar_libro_mayor69();
 		//Vamos a declarar un array
 		$data= Array();
        //var_dump($rspta);die;
 		foreach($rspta["Detalle"] as $reg ){
 			$data[]=array(
 				"0"=>$reg['codigo_plan_contable'],
 				"1"=>$reg['descripcion_plan_contable'],
 				"2"=>$reg['n_operacion'],
 				"3"=>$reg['fecha'],
 				"4"=>$reg['glosa'],
 				"5"=>$reg['debe'],
 				"6"=>$reg['haber'] 				
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);
	break;

	case 'total_debe_haber_c69':
		$rspta = $Libromayor->total_debe_haber69();
		//var_dump($rspta);die;
		echo json_encode($rspta);
	break;

	case 'listar70':
		$rspta=$Libromayor->api_listar_libro_mayor70();
 		//Vamos a declarar un array
 		$data= Array();
        //var_dump($rspta);die;
 		foreach($rspta["Detalle"] as $reg ){
 			$data[]=array(
 				"0"=>$reg['codigo_plan_contable'],
 				"1"=>$reg['descripcion_plan_contable'],
 				"2"=>$reg['n_operacion'],
 				"3"=>$reg['fecha'],
 				"4"=>$reg['glosa'],
 				"5"=>$reg['debe'],
 				"6"=>$reg['haber'] 				
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);
	break;

	case 'total_debe_haber_c70':
		$rspta = $Libromayor->total_debe_haber70();
		//var_dump($rspta);die;
		echo json_encode($rspta);
	break;

	case 'listar79':
		$rspta=$Libromayor->api_listar_libro_mayor79();
 		//Vamos a declarar un array
 		$data= Array();
        //var_dump($rspta);die;
 		foreach($rspta["Detalle"] as $reg ){
 			$data[]=array(
 				"0"=>$reg['codigo_plan_contable'],
 				"1"=>$reg['descripcion_plan_contable'],
 				"2"=>$reg['n_operacion'],
 				"3"=>$reg['fecha'],
 				"4"=>$reg['glosa'],
 				"5"=>$reg['debe'],
 				"6"=>$reg['haber'] 				
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);
	break;

	case 'total_debe_haber_c79':
		$rspta = $Libromayor->total_debe_haber79();
		//var_dump($rspta);die;
		echo json_encode($rspta);
	break;

	case 'listar94':
		$rspta=$Libromayor->api_listar_libro_mayor94();
 		//Vamos a declarar un array
 		$data= Array();
        //var_dump($rspta);die;
 		foreach($rspta["Detalle"] as $reg ){
 			$data[]=array(
 				"0"=>$reg['codigo_plan_contable'],
 				"1"=>$reg['descripcion_plan_contable'],
 				"2"=>$reg['n_operacion'],
 				"3"=>$reg['fecha'],
 				"4"=>$reg['glosa'],
 				"5"=>$reg['debe'],
 				"6"=>$reg['haber'] 				
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);
	break;

	case 'total_debe_haber_c94':
		$rspta = $Libromayor->total_debe_haber94();
		//var_dump($rspta);die;
		echo json_encode($rspta);
	break;

	case 'listar95':
		$rspta=$Libromayor->api_listar_libro_mayor95();
 		//Vamos a declarar un array
 		$data= Array();
        //var_dump($rspta);die;
 		foreach($rspta["Detalle"] as $reg ){
 			$data[]=array(
 				"0"=>$reg['codigo_plan_contable'],
 				"1"=>$reg['descripcion_plan_contable'],
 				"2"=>$reg['n_operacion'],
 				"3"=>$reg['fecha'],
 				"4"=>$reg['glosa'],
 				"5"=>$reg['debe'],
 				"6"=>$reg['haber'] 				
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);
	break;

	case 'total_debe_haber_c95':
		$rspta = $Libromayor->total_debe_haber95();
		//var_dump($rspta);die;
		echo json_encode($rspta);
	break;


	/*
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

		$rspta = $Libromayor->listar_libro_diario();

		foreach($rspta["Detalle"] as $reg ){
				echo '<option value=' . $reg['idlibrocontable'] . '>' . $reg['codigoCont'].' '.$reg['nombrelibroCont']. '</option>';
				}
	break;

	case 'listarPedido_venta':

		$rspta=$Libromayor->api_listar_pedidop_ld();
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

		$rspta = $Libromayor->total_api_pedido_prenda($total);
		echo json_encode($rspta);
	break;


	case 'listarDetalleuniq':

		$iddetalle = $_POST['iddetalle'];


		$rspta=$Libromayor->listar_detalle_unico_enmodal($iddetalle);
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
				      <td>'.$reg['cantidad_detalle_pedido_prenda'].'</td>
				      <td>'.$reg['Prenda'].'</td>
				    </tr>
				  </tbody>
				';
				$count=$count+1;
				
 		}
 		echo '</table>';

	break;
	*/
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