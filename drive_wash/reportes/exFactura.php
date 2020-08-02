<?php
//Activamos el almacenamiento en el buffer
ob_start();
if (strlen(session_id()) < 1) 
  session_start();

if (!isset($_SESSION["nombre"]))
{
  echo 'Debe ingresar al sistema correctamente para visualizar el reporte';
}
else
{
if ($_SESSION['ventas']==1)
{
//Incluímos el archivo Factura.php
require('Factura.php');

//Establecemos los datos de la empresa
$logo = "drive.jpg";
$ext_logo = "jpg";
$empresa = "Drive Wash";
$documento = "20477157772";
$direccion = "Tarapoto, José Gálvez 1368";
$telefono = "931742904";
$email = "drive_wash@gmail.com";

//Obtenemos los datos de la cabecera de la venta actual
require_once "../modelos/Venta.php";
$venta= new Venta();
$rsptav = $venta->listar_one_detalle_pedido($_GET["id"]);
//Recorremos todos los valores obtenidos
// var_dump($rsptav);die;
$regv = $rsptav["Detalle"][0];
// var_dump($regv);die;
//Establecemos la configuración de la factura
$pdf = new PDF_Invoice( 'P', 'mm', 'A4' );
$pdf->AddPage();

//Enviamos los datos de la empresa al método addSociete de la clase Factura
$pdf->addSociete(utf8_decode($empresa),
                  $documento."\n" .
                  utf8_decode("Dirección: ").utf8_decode($direccion)."\n".
                  utf8_decode("Teléfono: ").$telefono."\n" .
                  "Email : ".$email,$logo,$ext_logo);
$ser=" ".$regv['serie_comprobante']." - ".$regv['numero_comprobante'];
$pdf->fact_dev( $regv['nombre_tipo_comprobante'], $ser);
$pdf->temporaire( "" );
$pdf->addDate( $regv['fecha_pedido_prenda']);

//Enviamos los datos del cliente al método addClientAdresse de la clase Factura
$pdf->addClientAdresse(utf8_decode($regv['nombre_clientes'].' '.$regv['apellidos_clientes']),"Domicilio: ".
  utf8_decode($regv['direccion_clientes'].' - '.$regv['nombre_distrito'].' - '.$regv['nombre_provincia'].' - '.$regv['nombre_departamento']),
  $regv['nombre_tipo_doc'].": ".$regv['num_doc_clientes'],"Email: ".$regv->email,"Telefono: ".$regv['celular_clientes']);

//Establecemos las columnas que va a tener la sección donde mostramos los detalles de la venta
$cols=array( "CODIGO"=>23,
             "DESCRIPCION"=>78,
             "CANTIDAD"=>22,
             "P.U."=>25,
             "DSCTO"=>20,
             "SUBTOTAL"=>22);
$pdf->addCols( $cols);
$cols=array( "CODIGO"=>"L",
             "DESCRIPCION"=>"L",
             "CANTIDAD"=>"C",
             "P.U."=>"R",
             "DSCTO" =>"R",
             "SUBTOTAL"=>"C");
$pdf->addLineFormat( $cols);
$pdf->addLineFormat($cols);
//Actualizamos el valor de la coordenada "y", que será la ubicación desde donde empezaremos a mostrar los datos
$y= 89;

//Obtenemos todos los detalles de la venta actual
$rsptad = $venta->listar_one_detalle_pedido($_GET["id"]);
// var_dump($rsptad);die;
//COMPARAMOS SI EXISTE EL DELIVERY
if($rsptad['Detalle'][0]['id_delivery']=="1"){
  $delivery=0;
}else{
  $delivery=0.15;
}
//CREAMOS EL ONTADOR PARA SACAR LA SUMA DE USB TOTALES
$cont_del=0;
foreach ($rsptad['Detalle'] as $regd) {
  // var_dump($regd);die;
  $subtotala=($regd['cantidad_detalle_pedido_prenda']*$regd['precio_prenda']-$regd['descuento_detalle_pedido_prenda']);
  $line = array( "CODIGO"=> $regd['codigo_prenda'],
                "DESCRIPCION"=> utf8_decode($regd['nombre_prenda']),
                "CANTIDAD"=> $regd['cantidad_detalle_pedido_prenda'],
                "P.U."=> $regd['precio_prenda'],
                "DSCTO" => $regd['descuento_detalle_pedido_prenda'],
                "SUBTOTAL"=> $subtotala);
  // var_dump($line);die;
            $size = $pdf->addLine( $y, $line );
            $y   += $size + 2;
  $cont_del=$cont_del+$subtotala;
}
//REDONDEAMOS EL VALOR DEL DELIVERY
$delivery=round($delivery*$cont_del, 1);
//MOSTRAMOS EN LA BOLETA
 $line = array( "CODIGO"=> "-",
                "DESCRIPCION"=> utf8_decode("Delivery"),
                "CANTIDAD"=> "-",
                "P.U."=> "-",
                "DSCTO" => "-",
                "SUBTOTAL"=> $delivery);
  // var_dump($line);die;
            $size = $pdf->addLine( $y, $line );
            $y   += $size + 2;
$total_de_total=$delivery+$cont_del;
//Convertimos el total en letras
require_once "Letras.php";
$V=new EnLetras(); 
$con_letra=strtoupper($V->ValorEnLetras($total_de_total,"SOLES"));
$pdf->addCadreTVAs("---".$con_letra);

//Mostramos el impuesto
$pdf->addTVAs( $rsptad['Detalle'][0]['impuesto'], $total_de_total,"S/ ");
$pdf->addCadreEurosFrancs("IGV ".$rsptad['Detalle'][0]['impuesto']." %");
$pdf->Output('Reporte de Venta','I');


}
else
{
  echo 'No tiene permiso para visualizar el reporte';
}

}
ob_end_flush();
?>