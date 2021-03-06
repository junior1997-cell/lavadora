<?php
//Activamos el almacenamiento en el buffer
ob_start();
session_start();

if (!isset($_SESSION["nombre"])) {
    header("Location: login.html");
} else {
    require 'header.php';

    if ($_SESSION['compras'] == 1) {
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
                                <h1 class="box-title">Libro diario <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button> <a href="../reportes/rptingresos.php" target="_blank"><button class="btn btn-info"><i class="fa fa-clipboard"></i> Reporte</button></a></h1>
                                <div class="box-tools pull-right">
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <!-- centro -->
                            <div class="panel-body table-responsive" id="listadoregistros">
                                <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover" sty>
                                    <thead>
                                    <th>Opciones</th>
                                    <th>N°</th>
                                    <th>Fecha</th>
                                    <th>Glosa</th>
                                    <th>Cuenta</th>
                                    <th>Denominación</th>
                                    <th>Debe</th>
                                    <th>Haber</th>
                                    </thead>
                                    <tbody>                            
                                    </tbody>
                                    <tfoot>
                                    <th>Opciones</th>
                                    <th>N°</th>
                                    <th>Fecha</th>
                                    <th>Glosa</th>
                                    <th>Cuenta</th>
                                    <th>Denominación</th>
                                    <th>Debe</th>
                                    <th>Haber</th>
                                    </tfoot>
                                </table>
                            </div>
                            <style type="text/css">
                                .debe>thead>tr>th, .debe>tbody>tr>th, .debe>tfoot>tr>th, .debe>thead>tr>td, .debe>tbody>tr>td, .debe>tfoot>tr>td 
                                {border: 1px solid #a73838;font-size: 10pt}
                            </style>
                            <div class="panel-body" style="height:absolute;" id="formularioregistros">
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

                                            <tbody>

                                            </tbody>
                                            <tfoot>
                                            <th>TOTAL</th>
                                            <th></th>
                                            <th></th>                            
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th>
                                                <h4 id="totaldebe">S/. 00.00</h4>
                                                <input type="hidden" name="totaldebe_val" id="totaldebe_val">
                                            </th>
                                            <th>
                                                <h4 id="totalhaber">S/. 00.00</h4>
                                                <input type="hidden" name="totalhaber_val" id="totalhaber_val">
                                            </th>
                                            </tfoot>
                                        </table>

                                    </div>

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
    } else {
        require 'noacceso.php';
    }

    require 'footer.php';
    ?>
    <script type="text/javascript" src="scripts/librodiario.js"></script>
    <?php
}
ob_end_flush();
?>


