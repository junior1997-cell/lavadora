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
$pdf->fact_dev( "$regv->tipo_comprobante ", "$regv->serie_comprobante-$regv->num_comprobante" );
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
foreach ($rsptad['Detalle'] as $regd) {
  // var_dump($regd);die;
  $subtotala=($regd['cantidad_detalle_pedido_prenda']*$regd['precio_prenda']-$regd['descuento_detalle_pedido_prenda']);
  $line = array( "CODIGO"=> "a",
                "DESCRIPCION"=> utf8_decode("a"),
                "CANTIDAD"=> "a",
                "P.U."=> "a",
                "DSCTO" => "a",
                "SUBTOTAL"=> "a");
  // var_dump($line);die;
            $size = $pdf->addLine( $y, $line );
            $y   += $size + 2;
}

//Convertimos el total en letras
require_once "Letras.php";
$V=new EnLetras(); 
$con_letra=strtoupper($V->ValorEnLetras($regv->total_venta,"SOLES"));
$pdf->addCadreTVAs("---".$con_letra);

//Mostramos el impuesto
$pdf->addTVAs( $regv->impuesto, $regv->total_venta,"S/ ");
$pdf->addCadreEurosFrancs("IGV"." $regv->impuesto %");
$pdf->Output('Reporte de Venta','I');


}
else
{
  echo 'No tiene permiso para visualizar el reporte';
}

}
ob_end_flush();
?>