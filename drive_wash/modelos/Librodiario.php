<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Librodiario
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($idpedidoprenda,$n_operacion,$fecha,$glosa,$id_libro_contable,$doc_sustet,$id_plan_contable,$debe,$haber){

		$num_elementos=0;
		$sw=true;

		while ($num_elementos < count($idpedidoprenda))
		{
			$sql_detalle = "INSERT INTO libro_diario(n_operacion, fecha, glosa, id_libro_contable, doc_sustet, id_plan_contable, debe, haber,estado) VALUES ('$n_operacion[$num_elementos]', '$fecha[$num_elementos]', '$glosa[$num_elementos]', '$id_libro_contable[$num_elementos]', '$doc_sustet[$num_elementos]', '$id_plan_contable[$num_elementos]', '$debe[$num_elementos]', '$haber[$num_elementos]')";
			ejecutarConsulta($sql_detalle) or $sw = false;
			$num_elementos=$num_elementos + 1;
		}


		return $sw;
		var_dump($sw);die;
	}

	
	//Implementamos un método para anular categorías
	public function anular($idingreso)
	{
		$sql="UPDATE ingreso SET estado='Anulado' WHERE idingreso='$idingreso'";
		return ejecutarConsulta($sql);
	}


	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idingreso)
	{
		$sql="SELECT i.idingreso,DATE(i.fecha_hora) as fecha,i.idproveedor,p.nombre as proveedor,u.idusuario,u.nombre as usuario,i.tipo_comprobante,i.serie_comprobante,i.num_comprobante,i.total_compra,i.impuesto,i.estado FROM ingreso i INNER JOIN persona p ON i.idproveedor=p.idpersona INNER JOIN usuario u ON i.idusuario=u.idusuario WHERE i.idingreso='$idingreso'";
		return ejecutarConsultaSimpleFila($sql);
	}

	public function listarDetalle($idingreso)
	{
		$sql="SELECT di.idingreso,di.idarticulo,a.nombre,di.cantidad,di.precio_compra,di.precio_venta FROM detalle_ingreso di inner join articulo a on di.idarticulo=a.idarticulo where di.idingreso='$idingreso'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT ld.id,ld.n_operacion,ld.fecha,pc.codigo as cuenta,pc.descripcion,ld.debe,ld.haber,ld.estado
			from libro_diario as ld INNER JOIN plan_contable pc on ld.id_plan_contable=pc.id";
		return ejecutarConsulta($sql);	
			//$data = ejecutarConsulta($sql);
		//var_dump($data);
	}
	
	public function ingresocabecera($idingreso){
		$sql="SELECT i.idingreso,i.idproveedor,p.nombre as proveedor,p.direccion,p.tipo_documento,p.num_documento,p.email,p.telefono,i.idusuario,u.nombre as usuario,i.tipo_comprobante,i.serie_comprobante,i.num_comprobante,date(i.fecha_hora) as fecha,i.impuesto,i.total_compra FROM ingreso i INNER JOIN persona p ON i.idproveedor=p.idpersona INNER JOIN usuario u ON i.idusuario=u.idusuario WHERE i.idingreso='$idingreso'";
		return ejecutarConsulta($sql);
	}

	public function ingresodetalle($idingreso){
		$sql="SELECT a.nombre as articulo,a.codigo,d.cantidad,d.precio_compra,d.precio_venta,(d.cantidad*d.precio_compra) as subtotal FROM detalle_ingreso d INNER JOIN articulo a ON d.idarticulo=a.idarticulo WHERE d.idingreso='$idingreso'";
		return ejecutarConsulta($sql);
	}
	
	public function api_crear_libro_diario($n_operacion,$fecha,$glosa,$id_libro_contable,$doc_sustet,$id_plan_contable,$debe,$haber){

	$curl = curl_init();

	curl_setopt_array($curl, array(
	  CURLOPT_URL => "http://localhost/git/lavadora/drive_restfull/index.php/Librodiario/create",
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 0,
	  CURLOPT_FOLLOWLOCATION => true,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "POST",
	  CURLOPT_POSTFIELDS => array(
	  	'n_operacion'=>$n_operacion,
	  	'fecha'=>$fecha,
	  	'glosa'=>$glosa,
	  	'id_libro_contable'=>$id_libro_contable,
	  	'doc_sustet' =>$doc_sustet,
	  	'id_plan_contable'=>$id_plan_contable,
	  	'debe'=>$debe,
	  	'haber'=>$haber,
	  ),
	  CURLOPT_HTTPHEADER => array(
	    "Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VUU2hUQnZPZ2R2SHI5UG5DdExGbXlUZy53Lmc1Y01pOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlY2ZpLi90RmxTRFhPOS9NOTlFNGxWS0xNOGdodzhOeQ=="
	  ),
	));

	$response = curl_exec($curl);

	curl_close($curl);
	$data= json_decode($response,true);
	//return $data;
	var_dump($data);die;
	}
//listamos todos los registros
	public function api_listar_libro_diario(){

		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://drymatch.informaticapp.com/index.php/librodiario",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
		    "Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VUU2hUQnZPZ2R2SHI5UG5DdExGbXlUZy53Lmc1Y01pOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlY2ZpLi90RmxTRFhPOS9NOTlFNGxWS0xNOGdodzhOeQ=="
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		$data = json_decode($response, true);
		return $data;

	}
   //listar ventas
	public function api_listar_pedidop_ld(){
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://drymatch.informaticapp.com/index.php/Librodiario/listarvent",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_HTTPHEADER => array(
		    "Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VUU2hUQnZPZ2R2SHI5UG5DdExGbXlUZy53Lmc1Y01pOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlY2ZpLi90RmxTRFhPOS9NOTlFNGxWS0xNOGdodzhOeQ=="
		  ),

		));

		$response = curl_exec($curl);

		curl_close($curl);
		$data = json_decode($response, true);
		return $data;

	}
	// listar todos los libros contables
	public function listar_libro_diario(){
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://localhost/git/lavadora/drive_restfull/index.php/Librodiario/librocontable",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_HTTPHEADER => array(
		    "Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VUU2hUQnZPZ2R2SHI5UG5DdExGbXlUZy53Lmc1Y01pOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlY2ZpLi90RmxTRFhPOS9NOTlFNGxWS0xNOGdodzhOeQ=="
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		$data = json_decode($response,true);
		return $data;
	}

	// listamos el detalle de cada registro en un modal
	public function listar_detalle_unico_enmodal($iddetalle){

		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://localhost/git/lavadora/drive_restfull/index.php/Librodiario/detallespedido/".$iddetalle,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_HTTPHEADER => array(
		    "Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VUU2hUQnZPZ2R2SHI5UG5DdExGbXlUZy53Lmc1Y01pOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlY2ZpLi90RmxTRFhPOS9NOTlFNGxWS0xNOGdodzhOeQ=="
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);

		$data = json_decode($response, true);

		return $data;
	}

	//funcion para el totol del pedido
    public function total_api_pedido_prenda($total){
    	$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://localhost/git/lavadora/drive_restfull/index.php/Librodiario/total_pedido/".$total,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_HTTPHEADER => array(
		    "Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VUU2hUQnZPZ2R2SHI5UG5DdExGbXlUZy53Lmc1Y01pOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlY2ZpLi90RmxTRFhPOS9NOTlFNGxWS0xNOGdodzhOeQ=="
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		$data =json_decode($response, true);
		return $data;
    }

}

?>