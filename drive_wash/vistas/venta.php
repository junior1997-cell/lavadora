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

if ($_SESSION['ventas']==1)
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
                          <h1 class="box-title">Pedido <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button> <a href="../reportes/rptventas.php" target="_blank"><button class="btn btn-info"><i class="fa fa-clipboard"></i> Reporte</button></a></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Opciones</th>
                            <th>Fecha</th>
                            <th>Cliente</th>
                            <th>Usuario</th>
                            <th>Documento</th>
                            <th>Número</th>
                            <th>Total Venta</th>
                            <th>Estado</th>
                            <th>Estado Prenda</th>
                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                            <th>Opciones</th>
                            <th>Fecha</th>
                            <th>Proveedor</th>
                            <th>Usuario</th>
                            <th>Documento</th>
                            <th>Número</th>
                            <th>Total Venta</th>
                            <th>Estado</th>
                            <th>Estado Prenda</th>
                          </tfoot>
                        </table>
                    </div>
                    <div class="panel-body" style="height: absolute;" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                          <!-- ETIQUETA -->
                          <div class="form-group col-lg-2 col-md-2 col-sm-6 col-xs-6">
                            <label>Etiqueta(*):</label>
                            <input type="text" class="form-control" name="numero_pedido" id="numero_pedido" maxlength="10" placeholder="Etiqueta" required="">
                          </div>
                          <!-- TIPO PEDIDO -->
                          <div class="form-group col-lg-2 col-md-2 col-sm-6 col-xs-6">
                            <label>tipo pedido(*):</label>
                            <select id="id_tipo_pedido" name="id_tipo_pedido" class=" form-control selectpicker" data-live-search="true"  required>
                            </select>
                          </div>
                          <!-- CLIENTE -->
                          <div class="form-group col-lg-6 col-md-8 col-sm-8 col-xs-12">
                            <label>Cliente(*):</label>
                            <input type="hidden" name="idventa" id="idventa">
                            <select id="id_cliente" name="id_cliente" class="form-control selectpicker" data-live-search="true" required>
                              
                            </select>
                          </div>
                          <!-- TIPO DE COMPROBANTE -->
                          <div class="form-group col-lg-2 col-md-2 col-sm-6 col-xs-12">
                            <label>Tipo Comprobante(*):</label>
                            <select name="id_comprobante" id="id_comprobante" class="form-control selectpicker" required="">
                               
                            </select>
                          </div>
                          <!-- SERIO DE BOLETA O FATURA -->
                          <div class="form-group col-lg-2 col-md-2 col-sm-6 col-xs-12">
                            <label>Serie:</label>
                            <input type="text" class="form-control" name="serie_comprobante" id="serie_comprobante" maxlength="7" placeholder="Serie">
                          </div>
                          <!-- NUMERO DE BOLETA O FACTURA -->
                          <div class="form-group col-lg-2 col-md-2 col-sm-6 col-xs-12">
                            <label>Número:</label>
                            <input type="text" class="form-control" name="numero_comprobante" id="numero_comprobante" maxlength="10" placeholder="Número" required="">
                          </div>
                          <!-- IMPUESTO -->
                          <div class="form-group col-lg-2 col-md-2 col-sm-6 col-xs-12">
                            <label>Impuesto:</label>
                            <input type="text" class="form-control" name="impuesto" id="impuesto" required="">
                          </div>
                          <!-- SELECIONAR PAGO -->
                          <div class="form-group col-lg-2 col-md-2 col-sm-6 col-xs-12">
                            <label>Seleccionar pago (*):</label>
                            <select name="pago" id="pago" class="form-control  " required="">
                              <option value="">NO SELECT</option>
                               <option value="0" >Al realizar el pedido</option>
                               <option value="1">Al recoger el pedido</option>

                            </select>
                          </div>
                          <!-- SELECIONAR tipo de PAGO -->
                          <div class="form-group col-lg-2 col-md-2 col-sm-6 col-xs-12">
                            <label>Seleccionar tipo de pago (*):</label>
                            <select name="tpo_pago" id="tipo_pago" class="form-control  " required="">
                              <option value="">NO SELECT</option>
                               <option value="0" title="Habilitado">Al contado</option>
                               <option value="1" disabled  title="Deshabilitado">Con tarjeta</option>
                               <option value="1" disabled  title="Deshabilitados">Con Paypal</option>

                            </select>
                          </div>
                          <!-- SERVICIO DE LAVADO -->
                          <div class="form-group col-lg-2 col-md-6 col-sm-6 col-xs-12">
                            <label>servicio de lavado (*):</label>
                            <select name="id_tipo_servicio" id="id_tipo_servicio" class="form-control selectpicker" class="form-control selectpicker" data-live-search="true" required="">
                            </select>
                          </div>
                          <!-- FECHA DE RECOJO DEL LA PRENDA -->
                          <div class="form-group col-lg-2 col-md-4 col-sm-4 col-xs-12">
                            <label>Fecha recojo(*):</label>
                            <input type="text" class="form-control" name="hora_recojo" id="hora_recojo" required="" value="" disabled="true">
                          </div>
                          <!-- FECHA DE ENTREGA APROXIMADA DE LA PRENDA -->
                          <div class="form-group col-lg-3 col-md-4 col-sm-4 col-xs-12">
                            <label>Fecha Entrega(*):</label>
                            <input type="datetime-local" class="form-control" name="fecha_hora" id="fecha_hora" required=""> 
                          </div>
                          <!-- DELIVERY -->
                          <div class="form-group col-lg-3 col-md-4 col-sm-4 col-xs-12">
                            <label>Delivery (*):</label>
                            <select name="delivery" id="delivery" class="form-control selectpicker"data-live-search="true" required onchange="ShowSelected();">

                            </select>
                          </div>
                          <!-- BOTON AGREGAR PRENDA -->
                          <div class="form-group col-lg-12 col-md-3 col-sm-6 col-xs-12">
                            <!-- BOTON AGREGAR PRENDA -->
                            <a data-toggle="modal" href="#myModal">    
                              <button id="btnAgregarArt" type="button" class="btn btn-primary"> 
                                <span class="fa fa-plus">
                                  
                                </span> Agregar Prenda
                              </button>
                            </a>

                            <!-- <a data-toggle="modal" href="#myModalt">           
                              <button id="btnAgregartipolav" type="button" class="btn btn-primary">
                               <span class="fa fa-plus">
                                 
                               </span> tipo lavado
                             </button>
                            </a> -->
                          </div>
                            <!-- TABLA EN MODAL DEL AGREGAR ARTICULO -->
                          <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                            <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                              <thead style="background-color:#A9D0F5">
                                    <th>Opciones</th>
                                    <th>Prendas</th>
                                    <th>Cantidad</th>
                                    <th>Precio Venta</th>
                                    <th>Descuento</th>
                                    <th>Delivery</th>
                                    <th>Subtotal</th>
                                </thead>
                                <tbody>
                                  
                                </tbody>
                                <tfoot>
                                    <th>TOTAL</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                     <th></th>
                                    <th></th>
                                     <th><h4 id="total">S/. 0.00</h4><input type="hidden" name="total_venta" id="total_venta"></th> 
                                </tfoot>
                            </table>
                          </div>
                          <!-- BOTONES CANCELAR O GUARDAR -->
                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>

                            <button id="btnCancelar" class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                          </div>
                        </form>
                    </div>
                    <!--Fin centro -->
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->

  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Seleccione una prenda</h4>
        </div>
        <div class="modal-body">
          <table id="tblPrendas" class="table table-striped table-bordered table-condensed table-hover" style="width: 100% !important;">
            <thead>
                <th>Opciones</th>
                <th>Nombre</th>
                <th>Precio Venta</th>
                <th>Imagen</th>
            </thead>
            <tbody>
              
            </tbody>
            <tfoot>
                <th>Opciones</th>
                <th>Nombre</th>
                <th>Precio Venta</th>
                <th>Imagen</th>
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

    <!-- Modal de tipo lavado -->
  <div class="modal fade" id="myModalt" tabindex="-1" role="dialog" aria-labelledby="myModaltLabel" aria-hidden="true" >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Seleccione tipo de lavado</h4>
        </div>
        <div class="modal-body">
            <table id="tblPidopedido" class="table table-striped table-bordered table-condensed table-hover" style="width: 100% !important;">
            <thead>
                <th>Opciones</th>
                <th>Nombre</th>
                <th>Precio</th>
            </thead>
            <tbody>
              
            </tbody>
            <tfoot>
                <th>Opciones</th>
                <th>Nombre</th>
                <th>Precio</th>
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
<?php
}
else
{
  require 'noacceso.php';
}

require 'footer.php';
?>
<script type="text/javascript" src="scripts/venta.js"></script>
<?php 
}
ob_end_flush();
?>


