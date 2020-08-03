<?php
//Activamos el almacenamiento en el buffer
ob_start();
session_start();

if (!isset($_SESSION["nombre"]))
{
  header("Location: login.html");
}
else
{
require 'header.php';

if ($_SESSION['compras']==1)
{
?>
<!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">        
        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <div class="box-header with-border">
                      <h1 class="box-title"><b>FORMATO 6.1: "ESTADO DE SITUCIÓN FINANCIERA "</b> 
                      </h1>
                        
                      <div class="box-tools pull-right">
                      </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- cuenta 10 -->

                    <div class="panel-body table-responsive" id="listadoregistros10">
                      <h2 style="text-align: center;"><b>ESTADO DE SITUACION FINANCIERA<br>Al 01 De Mayo Del 2020</b></h2>
                        <table border="0" width=10 style=" width: 100%; text-align:center;" > 
                        <style type="text/css"> 
                          .st{
                             text-align: center;
                             background-color: #80C5F5;

                          }
                          .td{
                             text-align: initial;
                             font-weight: bold;
                             font-weight: 900;

                          }
                        </style>
                        <thead>
                          <tr> 
                              <th colspan="3" class="st" >ESF</th>
                              <th style="text-align: center;">-----</th> 
                              <th colspan="3" class="st" >ESF</th>

                              <!--<th rowspan="2" class="st" >DETALLE</th> 
                              <th colspan="2" class="st">SUMAS</th> 
                              <th colspan="2" class="st">SALDOS</th> 
                              <th colspan="2" class="st">EST.SIT.FIN</th> 
                              <th colspan="2" class="st">ESTADO DE RESULTADOS INT</th>--> 

                          </tr> 
                          <tr> 
                              <th class="st">CUENTA</th> 
                              <th class="st">DENOMINACION</th> 
                              <th class="st">TOTAL</th> 
                              <td></td>
                              <th class="st">CUENTA</th> 
                              <th class="st">DENOMINACION</th> 
                              <th class="st">TOTAL</th>

                              <!--<td class="st">ACREEDOR</td> 
                              <td class="st">ACTIVO</td> 
                              <td class="st">PAS Y PAT</td> 
                              <td class="st">PERDIDA</td> 
                              <td class="st">GANANCIA</td>-->
                          </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <th style="text-align: left; background: #F983F5">ACTIVO</th> 
                              <td style="background: #F983F5"></td> 
                              <td style="background: #F983F5"></td>

                              <td></td>

                              <th style="text-align: left; background: #F983F5">PASIVO</th> 
                              <td style="background: #F983F5"></td> 
                              <td style="background: #F983F5"></td>
                            </tr> 

                            <tr>
                              <th style="text-align: center;">ACTIVO CORRIENTE</th> 
                              <td></td> 
                              <td></td>

                              <td></td>

                              <th style="text-align: center;">PASIVO CORRIENTE</th> 
                              <td></td> 
                              <td></td>
                            </tr> 

                            <tr>
                              <td>10</td> 
                              <td>EFECTIVO Y EQUIVALENTES DE EFECTIVO</td> 
                              <td>S/ 631.70</td>

                              <td></td>

                              <td>40</td> 
                              <td>TRIBUTOS, CONTRAPRESTACIONES Y APORTES AL ...</td> 
                              <td>S/ 7,742.71</td>
                            </tr>

                            <tr>
                              <td>12</td> 
                              <td>CUENTAS POR COBRAR COMERCIALES – TERCEROS</td> 
                              <td>S/ 20,270.00</td>

                              <td></td>

                              <td>41</td> 
                              <td>REMUNERACIONES Y PARTICIPACIONES POR PAGAR</td> 
                              <td>-S/ 30.00</td>
                            </tr>

                            <tr>
                              <td>14</td> 
                              <td>CUENTAS POR COBRAR AL PERSONAL, ...</td> 
                              <td>S/ 11,000.00</td>

                              <td></td>

                              <td>42</td> 
                              <td>CUENTAS POR PAGAR COMERCIALES TERCEROS</td> 
                              <td>S/ 8,900.00</td>
                            </tr>

                            <tr>
                              <td>20</td> 
                              <td>MERCADERÍAS</td> 
                              <td>S/ 8,600.00</td>

                              <td></td>

                              <th style="text-align: center;">Total Pasivo Corriente</th> 
                              <td></td> 
                              <td>S/ 16,642.71</td>
                            </tr>

                            <tr>
                              <td></td> 
                              <td></td> 
                              <td></td>

                              <td></td>

                              <th style="text-align: left; background: #F580B0">PASIVO NO CORRIENTE</th> 
                              <td style="background: #F580B0"></td> 
                              <td style="background: #F580B0"></td>
                            </tr> 

                            <tr>
                              <td></td> 
                              <td></td> 
                              <td></td>

                              <td></td>

                              <td>45</td> 
                              <td>OBLIGACIONES FINANCIERAS</td> 
                              <td>S/ 45,000.00</td>
                            </tr>

                            <tr>
                              <th style="text-align: center;">Total Activo Corriente</th> 
                              <td></td> 
                              <th style="text-align: center;">S/ 40,501.70</th>

                              <td></td>

                              <th style="text-align: center;">Total Pasivo No Corriente</th> 
                              <td></td> 
                              <th style="text-align: center;">S/ 45,000.00</th>
                            </tr> 

                            <tr>
                              <th style="text-align: left; background: #4CCCD0" >ACTIVO NO CORRIENTE</th> 
                              <td style="background: #4CCCD0"></td> 
                              <td style="background: #4CCCD0"></td>

                              <td></td>

                              <th style="text-align: left; background: #4CCCD0">PATRIMONIO</th> 
                              <td style="background: #4CCCD0"></td> 
                              <td style="background: #4CCCD0"></td>
                            </tr> 

                            <tr>
                              <td>33</td> 
                              <td>PROPIEDAD, PLANTA Y EQUIPO</td> 
                              <td>S/ 55,900.00</td>

                              <td></td>

                              <td>50</td> 
                              <td>CAPITAL</td> 
                              <td>S/ 25,000.00</td>
                            </tr>

                            <tr>
                              <td></td> 
                              <td></td> 
                              <td></td>

                              <td></td>

                              <td>59</td> 
                              <td>RESULTADOS ACUMULADOS</td> 
                              <td>S/ 9,788.99</td>
                            </tr>

                            <tr>
                              <th style="text-align: center;">Total Activo No Corriente</th> 
                              <td></td> 
                              <th>S/ 55,900.00</th>

                              <td></td>

                              <td></td> 
                              <td></td> 
                              <td></td>
                            </tr>

                            <tr>
                              <th style="text-align: left; background: #E6F328">TOTAL ACTIVO</th> 
                              <td style="background: #E6F328"></td> 
                              <th style="background: #E6F328">S/ 96,401.70</th>

                              <td></td>

                              <th style="text-align: left; background: #E6F328">TOTAL PAS Y PAT</th> 
                              <td style="background: #E6F328"></td> 
                              <th style="background: #E6F328">S/ 96,401.70</th>
                            </tr>
                          </tbody>
                      </table>
                    </div>

                    <!--<div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped debe  table-sm " style="border:black 1px solid">
                         <thead style="font-weight: 40;">
                            <tr >
                              <th rowspan="2" style="text-align: center">Cuenta</th>
                              <th rowspan="2" style="text-align: center">Denominacion</th> 
                              <th rowspan="2" style="text-align: center">N°</th>
                              <th rowspan="2" style="text-align: center">Fecha de la Operación</th>
                              <th rowspan="2" style="text-align: center">Detalle</th>
                              <th colspan="2" style="text-align: center">Saldos Y</th>
                            </tr>
                            <tr style="padding: 2.6px;">
                              <th style="text-align: center">Debe</th>
                              <th style="text-align: center">Haber</th>
                            </tr>
                          </thead>
                                                       
                                <tbody id="filas">
                                  
                                </tbody>
                            </table>
                    </div>-->


                <style type="text/css">
                  .debe>thead>tr>th, .debe>tbody>tr>th, .debe>tfoot>tr>th, .debe>thead>tr>td, .debe>tbody>tr>td, .debe>tfoot>tr>td 
                  {border: 1px solid #a73838;font-size: 10pt}
                </style>
                    <!--<div class="panel-body" style="height: 400px;" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                          <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a data-toggle="modal" href="#myModal">           
                              <button id="btnAgregarArt" type="button" class="btn btn-primary"> <span class="fa fa-plus"></span> Agregar venta</button>
                            </a>
                            <button id="btnAgregarfila" type="button" class="btn btn-primary" 
                              onclick="agregarfila()"> <span class="fa fa-plus"></span></button>
                          </div>
                          <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                            <table id="detalles" class="table table-striped debe  table-sm " style="border:red 1px solid">
                         <thead style="font-weight: 40;">
                            <tr >
                              <th rowspan="2">Opciones</th>
                              <th rowspan="2">N°</th>
                              <th rowspan="2">FECHA</th> 
                              <th rowspan="2">GLOSA</th>
                              <th colspan="3" style="text-align: center">DETALLE DE OPERACION</th>
                              <th colspan="2" style="text-align: center">CUENTA CONTABLE ASOCIADA A LA OPERACION</th>
                              <th rowspan="2">DEBE</th>
                              <th rowspan="2">HABER</th>
                            </tr>
                            <tr style="padding: 2.6px;">
                              <th>COD.LIBRO</th>
                              <th>N°</th>
                              <th>N° DOC SUST</th>

                              <th style="text-align: center">CUENTA</th>
                              <th >DENOMINACION</th>
                            </tr>
                          </thead>
                                                       
                                <tbody id="filas">
                                  
                                </tbody>
                            </table>
                          </div>

                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>

                            <button id="btnCancelar" class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                          </div>
                        </form>
                    </div>-->
                    <!--Fin centro -->
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->

  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Seleccione un registro</h4>
        </div>
        <div class="modal-body">
          <table id="tblarticulos" class="table table-striped table-bordered table-condensed table-hover">
            <thead>
                <th>OPCIONES</th>
                <th>NUN PEDIDO</th>
                <th>TIPO COMPR.</th>
                <th>N° COMPR.</th>
                <th>TOTAL</th>
                <th>FECHA</th>
            </thead>
            <tbody>
              
            </tbody>
            <tfoot>
              <th>OPCIONES</th>
                <th>NUN PEDIDO</th>
                <th>TIPO COMPR.</th>
                <th>N° COMPR.</th>
                <th>TOTAL</th>
                <th>FECHA</th>
            </tfoot>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>        
      </div>
    </div>
  </div>  
  <!-- Fin modal -->

  <!-- Modal detalle -->
  <div class="modal fade" id="myModall" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Detalle del registro</h4>
        </div>
        <div class="modal-body">
          <div id="iddetalle">
            
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

<?php
}
else
{
  require 'noacceso.php';
}

require 'footer.php';
?>
<script type="text/javascript" src="scripts/libromayor.js"></script>
<?php 
}
ob_end_flush();
?>


