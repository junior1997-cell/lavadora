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
                      <h1 class="box-title"><b>FORMATO 6.1: "LIBRO MAYOR "</b> 
                      </h1>
                        
                      <div class="box-tools pull-right">
                      </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- cuenta 10 -->
                    <div class="panel-body table-responsive" id="listadoregistros10">
                      <h5><b>PERÍODO:</b></h5>
                      <h5><b>RUC:</b></h5>
                      <h5><b>DENOMINACIÓN O RAZÓN SOCIAL:</b></h5>
                        <table id="tbllistado10" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Cuenta</th>
                            <th>Denominación</th>
                            <th>N°</th>
                            <th>Fecha de la Operación</th>
                            <th>Detalle</th>
                            <th>Debe</th>
                            <th>Haber</th>

                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                            <tr>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th>Totales</th>
                              <th><input id="debe" readonly style="width: 100px; border: 0;"></th>
                              <th><input id="haber" readonly style="width: 100px; border: 0;"></th>
                            </tr>
                            <tr>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th>Saldo proximo  mes</th>
                              <th><input id="saldo_debe" readonly style="width: 100px; border: 0;"></th>
                              <th><input id="saldo_haber" readonly style="width: 100px; border: 0;"></th>
                            </tr>
                          </tfoot>
                        </table>
                    </div><br>

                    <h1 style=" color: red;">-----------------------------------------------------------------------------------------------------------------</h1><br>

                    <div class="panel-body table-responsive" id="listadoregistros12">
                        <table id="tbllistado12" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Cuenta</th>
                            <th>Denominación</th>
                            <th>N°</th>
                            <th>Fecha de la Operación</th>
                            <th>Detalle</th>
                            <th>Debe</th>
                            <th>Haber</th>

                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                            <tr>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th>Totales</th>
                              <th><input id="debe12" readonly style="width: 100px; border: 0;"></th>
                              <th><input id="haber12" readonly style="width: 100px; border: 0;"></th>
                            </tr>
                            <tr>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th>Saldo proximo  mes</th>
                              <th><input id="saldo_debe12" readonly style="width: 100px; border: 0;"></th>
                              <th><input id="saldo_haber12" readonly style="width: 100px; border: 0;"></th>
                            </tr>
                          </tfoot>
                        </table>
                    </div><br>

                    <h1 style=" color: red;">-----------------------------------------------------------------------------------------------------------------</h1><br>

                    <div class="panel-body table-responsive" id="listadoregistros14">
                        <table id="tbllistado14" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Cuenta</th>
                            <th>Denominación</th>
                            <th>N°</th>
                            <th>Fecha de la Operación</th>
                            <th>Detalle</th>
                            <th>Debe</th>
                            <th>Haber</th>

                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                            <tr>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th>Totales</th>
                              <th><input id="debe14" readonly style="width: 100px; border: 0;"></th>
                              <th><input id="haber14" readonly style="width: 100px; border: 0;"></th>
                            </tr>
                            <tr>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th>Saldo proximo  mes</th>
                              <th><input id="saldo_debe14" readonly style="width: 100px; border: 0;"></th>
                              <th><input id="saldo_haber14" readonly style="width: 100px; border: 0;"></th>
                            </tr>
                          </tfoot>
                        </table>
                    </div><br>

                    <h1 style=" color: red;">-----------------------------------------------------------------------------------------------------------------</h1><br>
                    
                    <div class="panel-body table-responsive" id="listadoregistros20">
                        <table id="tbllistado20" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Cuenta</th>
                            <th>Denominación</th>
                            <th>N°</th>
                            <th>Fecha de la Operación</th>
                            <th>Detalle</th>
                            <th>Debe</th>
                            <th>Haber</th>

                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                            <tr>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th>Totales</th>
                              <th><input id="debe20" readonly style="width: 100px; border: 0;"></th>
                              <th><input id="haber20" readonly style="width: 100px; border: 0;"></th>
                            </tr>
                            <tr>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th>Saldo proximo  mes</th>
                              <th><input id="saldo_debe20" readonly style="width: 100px; border: 0;"></th>
                              <th><input id="saldo_haber20" readonly style="width: 100px; border: 0;"></th>
                            </tr>
                          </tfoot>
                        </table>
                    </div><br>

                    <h1 style=" color: red;">-----------------------------------------------------------------------------------------------------------------</h1><br>

                    <div class="panel-body table-responsive" id="listadoregistros33">
                        <table id="tbllistado33" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Cuenta</th>
                            <th>Denominación</th>
                            <th>N°</th>
                            <th>Fecha de la Operación</th>
                            <th>Detalle</th>
                            <th>Debe</th>
                            <th>Haber</th>

                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                            <tr>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th>Totales</th>
                              <th><input id="debe33" readonly style="width: 100px; border: 0;"></th>
                              <th><input id="haber33" readonly style="width: 100px; border: 0;"></th>
                            </tr>
                            <tr>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th>Saldo proximo  mes</th>
                              <th><input id="saldo_debe33" readonly style="width: 100px; border: 0;"></th>
                              <th><input id="saldo_haber33" readonly style="width: 100px; border: 0;"></th>
                            </tr>
                          </tfoot>
                        </table>
                    </div><br>

                    <h1 style=" color: red;">-----------------------------------------------------------------------------------------------------------------</h1><br>

                    <div class="panel-body table-responsive" id="listadoregistros40">
                        <table id="tbllistado40" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Cuenta</th>
                            <th>Denominación</th>
                            <th>N°</th>
                            <th>Fecha de la Operación</th>
                            <th>Detalle</th>
                            <th>Debe</th>
                            <th>Haber</th>

                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                            <tr>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th>Totales</th>
                              <th><input id="debe40" readonly style="width: 100px; border: 0;"></th>
                              <th><input id="haber40" readonly style="width: 100px; border: 0;"></th>
                            </tr>
                            <tr>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th>Saldo proximo  mes</th>
                              <th><input id="saldo_debe40" readonly style="width: 100px; border: 0;"></th>
                              <th><input id="saldo_haber40" readonly style="width: 100px; border: 0;"></th>
                            </tr>
                          </tfoot>
                        </table>
                    </div><br>

                    <h1 style=" color: red;">-----------------------------------------------------------------------------------------------------------------</h1><br>

                    <div class="panel-body table-responsive" id="listadoregistros41">
                        <table id="tbllistado41" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Cuenta</th>
                            <th>Denominación</th>
                            <th>N°</th>
                            <th>Fecha de la Operación</th>
                            <th>Detalle</th>
                            <th>Debe</th>
                            <th>Haber</th>

                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                            <tr>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th>Totales</th>
                              <th><input id="debe41" readonly style="width: 100px; border: 0;"></th>
                              <th><input id="haber41" readonly style="width: 100px; border: 0;"></th>
                            </tr>
                            <tr>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th>Saldo proximo  mes</th>
                              <th><input id="saldo_debe41" readonly style="width: 100px; border: 0;"></th>
                              <th><input id="saldo_haber41" readonly style="width: 100px; border: 0;"></th>
                            </tr>
                          </tfoot>
                        </table>
                    </div><br>

                    <h1 style=" color: red;">-----------------------------------------------------------------------------------------------------------------</h1><br>

                    <div class="panel-body table-responsive" id="listadoregistros42">
                        <table id="tbllistado42" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Cuenta</th>
                            <th>Denominación</th>
                            <th>N°</th>
                            <th>Fecha de la Operación</th>
                            <th>Detalle</th>
                            <th>Debe</th>
                            <th>Haber</th>

                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                            <tr>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th>Totales</th>
                              <th><input id="debe42" readonly style="width: 100px; border: 0;"></th>
                              <th><input id="haber42" readonly style="width: 100px; border: 0;"></th>
                            </tr>
                            <tr>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th>Saldo proximo  mes</th>
                              <th><input id="saldo_debe42" readonly style="width: 100px; border: 0;"></th>
                              <th><input id="saldo_haber42" readonly style="width: 100px; border: 0;"></th>
                            </tr>
                          </tfoot>
                        </table>
                    </div><br>

                    <h1 style=" color: red;">-----------------------------------------------------------------------------------------------------------------</h1><br>

                    <div class="panel-body table-responsive" id="listadoregistros45">
                        <table id="tbllistado45" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Cuenta</th>
                            <th>Denominación</th>
                            <th>N°</th>
                            <th>Fecha de la Operación</th>
                            <th>Detalle</th>
                            <th>Debe</th>
                            <th>Haber</th>

                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                            <tr>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th>Totales</th>
                              <th><input id="debe45" readonly style="width: 100px; border: 0;"></th>
                              <th><input id="haber45" readonly style="width: 100px; border: 0;"></th>
                            </tr>
                            <tr>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th>Saldo proximo  mes</th>
                              <th><input id="saldo_debe45" readonly style="width: 100px; border: 0;"></th>
                              <th><input id="saldo_haber45" readonly style="width: 100px; border: 0;"></th>
                            </tr>
                          </tfoot>
                        </table>
                    </div><br>

                    <h1 style=" color: red;">-----------------------------------------------------------------------------------------------------------------</h1><br>

                    <div class="panel-body table-responsive" id="listadoregistros46">
                        <table id="tbllistado46" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Cuenta</th>
                            <th>Denominación</th>
                            <th>N°</th>
                            <th>Fecha de la Operación</th>
                            <th>Detalle</th>
                            <th>Debe</th>
                            <th>Haber</th>

                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                            <tr>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th>Totales</th>
                              <th><input id="debe46" readonly style="width: 100px; border: 0;"></th>
                              <th><input id="haber46" readonly style="width: 100px; border: 0;"></th>
                            </tr>
                            <tr>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th>Saldo proximo  mes</th>
                              <th><input id="saldo_debe46" readonly style="width: 100px; border: 0;"></th>
                              <th><input id="saldo_haber46" readonly style="width: 100px; border: 0;"></th>
                            </tr>
                          </tfoot>
                        </table>
                    </div><br>

                    <h1 style=" color: red;">-----------------------------------------------------------------------------------------------------------------</h1><br>

                    <div class="panel-body table-responsive" id="listadoregistros50">
                        <table id="tbllistado50" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Cuenta</th>
                            <th>Denominación</th>
                            <th>N°</th>
                            <th>Fecha de la Operación</th>
                            <th>Detalle</th>
                            <th>Debe</th>
                            <th>Haber</th>

                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                            <tr>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th>Totales</th>
                              <th><input id="debe50" readonly style="width: 100px; border: 0;"></th>
                              <th><input id="haber50" readonly style="width: 100px; border: 0;"></th>
                            </tr>
                            <tr>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th>Saldo proximo  mes</th>
                              <th><input id="saldo_debe50" readonly style="width: 100px; border: 0;"></th>
                              <th><input id="saldo_haber50" readonly style="width: 100px; border: 0;"></th>
                            </tr>
                          </tfoot>
                        </table>
                    </div><br>

                    <h1 style=" color: red;">-----------------------------------------------------------------------------------------------------------------</h1><br>

                    <div class="panel-body table-responsive" id="listadoregistros59">
                        <table id="tbllistado59" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Cuenta</th>
                            <th>Denominación</th>
                            <th>N°</th>
                            <th>Fecha de la Operación</th>
                            <th>Detalle</th>
                            <th>Debe</th>
                            <th>Haber</th>

                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                            <tr>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th>Totales</th>
                              <th><input id="debe59" readonly style="width: 100px; border: 0;"></th>
                              <th><input id="haber59" readonly style="width: 100px; border: 0;"></th>
                            </tr>
                            <tr>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th>Saldo proximo  mes</th>
                              <th><input id="saldo_debe59" readonly style="width: 100px; border: 0;"></th>
                              <th><input id="saldo_haber59" readonly style="width: 100px; border: 0;"></th>
                            </tr>
                          </tfoot>
                        </table>
                    </div><br>

                    <h1 style=" color: red;">-----------------------------------------------------------------------------------------------------------------</h1><br>

                    <div class="panel-body table-responsive" id="listadoregistros60">
                        <table id="tbllistado60" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Cuenta</th>
                            <th>Denominación</th>
                            <th>N°</th>
                            <th>Fecha de la Operación</th>
                            <th>Detalle</th>
                            <th>Debe</th>
                            <th>Haber</th>

                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                            <tr>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th>Totales</th>
                              <th><input id="debe60" readonly style="width: 100px; border: 0;"></th>
                              <th><input id="haber60" readonly style="width: 100px; border: 0;"></th>
                            </tr>
                            <tr>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th>Saldo proximo  mes</th>
                              <th><input id="saldo_debe60" readonly style="width: 100px; border: 0;"></th>
                              <th><input id="saldo_haber60" readonly style="width: 100px; border: 0;"></th>
                            </tr>
                          </tfoot>
                        </table>
                    </div><br>

                    <h1 style=" color: red;">-----------------------------------------------------------------------------------------------------------------</h1><br>

                    <div class="panel-body table-responsive" id="listadoregistros61">
                        <table id="tbllistado61" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Cuenta</th>
                            <th>Denominación</th>
                            <th>N°</th>
                            <th>Fecha de la Operación</th>
                            <th>Detalle</th>
                            <th>Debe</th>
                            <th>Haber</th>

                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                            <tr>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th>Totales</th>
                              <th><input id="debe61" readonly style="width: 100px; border: 0;"></th>
                              <th><input id="haber61" readonly style="width: 100px; border: 0;"></th>
                            </tr>
                            <tr>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th>Saldo proximo  mes</th>
                              <th><input id="saldo_debe61" readonly style="width: 100px; border: 0;"></th>
                              <th><input id="saldo_haber61" readonly style="width: 100px; border: 0;"></th>
                            </tr>
                          </tfoot>
                        </table>
                    </div><br>

                    <h1 style=" color: red;">-----------------------------------------------------------------------------------------------------------------</h1><br>

                    <div class="panel-body table-responsive" id="listadoregistros62">
                        <table id="tbllistado62" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Cuenta</th>
                            <th>Denominación</th>
                            <th>N°</th>
                            <th>Fecha de la Operación</th>
                            <th>Detalle</th>
                            <th>Debe</th>
                            <th>Haber</th>

                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                            <tr>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th>Totales</th>
                              <th><input id="debe62" readonly style="width: 100px; border: 0;"></th>
                              <th><input id="haber62" readonly style="width: 100px; border: 0;"></th>
                            </tr>
                            <tr>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th>Saldo proximo  mes</th>
                              <th><input id="saldo_debe62" readonly style="width: 100px; border: 0;"></th>
                              <th><input id="saldo_haber62" readonly style="width: 100px; border: 0;"></th>
                            </tr>
                          </tfoot>
                        </table>
                    </div><br>

                    <h1 style=" color: red;">-----------------------------------------------------------------------------------------------------------------</h1><br>

                    <div class="panel-body table-responsive" id="listadoregistros63">
                        <table id="tbllistado63" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Cuenta</th>
                            <th>Denominación</th>
                            <th>N°</th>
                            <th>Fecha de la Operación</th>
                            <th>Detalle</th>
                            <th>Debe</th>
                            <th>Haber</th>

                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                            <tr>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th>Totales</th>
                              <th><input id="debe63" readonly style="width: 100px; border: 0;"></th>
                              <th><input id="haber63" readonly style="width: 100px; border: 0;"></th>
                            </tr>
                            <tr>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th>Saldo proximo  mes</th>
                              <th><input id="saldo_debe63" readonly style="width: 100px; border: 0;"></th>
                              <th><input id="saldo_haber63" readonly style="width: 100px; border: 0;"></th>
                            </tr>
                          </tfoot>
                        </table>
                    </div><br>

                    <h1 style=" color: red;">-----------------------------------------------------------------------------------------------------------------</h1><br>

                     <div class="panel-body table-responsive" id="listadoregistros69">
                        <table id="tbllistado69" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Cuenta</th>
                            <th>Denominación</th>
                            <th>N°</th>
                            <th>Fecha de la Operación</th>
                            <th>Detalle</th>
                            <th>Debe</th>
                            <th>Haber</th>

                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                            <tr>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th>Totales</th>
                              <th><input id="debe69" readonly style="width: 100px; border: 0;"></th>
                              <th><input id="haber69" readonly style="width: 100px; border: 0;"></th>
                            </tr>
                            <tr>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th>Saldo proximo  mes</th>
                              <th><input id="saldo_debe69" readonly style="width: 100px; border: 0;"></th>
                              <th><input id="saldo_haber69" readonly style="width: 100px; border: 0;"></th>
                            </tr>
                          </tfoot>
                        </table>
                    </div><br>

                    <h1 style=" color: red;">-----------------------------------------------------------------------------------------------------------------</h1><br>

                    <div class="panel-body table-responsive" id="listadoregistros70">
                      <table id="tbllistado70" class="table table-striped table-bordered table-condensed table-hover">
                        <thead>
                          <th>Cuenta</th>
                          <th>Denominación</th>
                          <th>N°</th>
                          <th>Fecha de la Operación</th>
                          <th>Detalle</th>
                          <th>Debe</th>
                          <th>Haber</th>

                        </thead>
                        <tbody>                            
                        </tbody>
                        <tfoot>
                          <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>Totales</th>
                            <th><input id="debe70" readonly style="width: 100px; border: 0;"></th>
                            <th><input id="haber70" readonly style="width: 100px; border: 0;"></th>
                          </tr>
                          <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>Saldo proximo  mes</th>
                            <th><input id="saldo_debe70" readonly style="width: 100px; border: 0;"></th>
                            <th><input id="saldo_haber70" readonly style="width: 100px; border: 0;"></th>
                          </tr>
                        </tfoot>
                      </table>
                    </div><br>

                    <h1 style=" color: red;">-----------------------------------------------------------------------------------------------------------------</h1><br>

                    <div class="panel-body table-responsive" id="listadoregistros79">
                      <table id="tbllistado79" class="table table-striped table-bordered table-condensed table-hover">
                        <thead>
                          <th>Cuenta</th>
                          <th>Denominación</th>
                          <th>N°</th>
                          <th>Fecha de la Operación</th>
                          <th>Detalle</th>
                          <th>Debe</th>
                          <th>Haber</th>

                        </thead>
                        <tbody>                            
                        </tbody>
                        <tfoot>
                          <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>Totales</th>
                            <th><input id="debe79" readonly style="width: 100px; border: 0;"></th>
                            <th><input id="haber79" readonly style="width: 100px; border: 0;"></th>
                          </tr>
                          <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>Saldo proximo  mes</th>
                            <th><input id="saldo_debe79" readonly style="width: 100px; border: 0;"></th>
                            <th><input id="saldo_haber79" readonly style="width: 100px; border: 0;"></th>
                          </tr>
                        </tfoot>
                      </table>
                    </div><br>

                    <h1 style=" color: red;">-----------------------------------------------------------------------------------------------------------------</h1><br>

                    <div class="panel-body table-responsive" id="listadoregistros94">
                        <table id="tbllistado94" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Cuenta</th>
                            <th>Denominación</th>
                            <th>N°</th>
                            <th>Fecha de la Operación</th>
                            <th>Detalle</th>
                            <th>Debe</th>
                            <th>Haber</th>

                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                            <tr>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th>Totales</th>
                              <th><input id="debe94" readonly style="width: 100px; border: 0;"></th>
                              <th><input id="haber94" readonly style="width: 100px; border: 0;"></th>
                            </tr>
                            <tr>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th>Saldo proximo  mes</th>
                              <th><input id="saldo_debe94" readonly style="width: 100px; border: 0;"></th>
                              <th><input id="saldo_haber94" readonly style="width: 100px; border: 0;"></th>
                            </tr>
                          </tfoot>
                        </table>
                    </div><br>

                    <h1 style=" color: red;">-----------------------------------------------------------------------------------------------------------------</h1><br>

                     <div class="panel-body table-responsive" id="listadoregistros95">
                        <table id="tbllistado95" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Cuenta</th>
                            <th>Denominación</th>
                            <th>N°</th>
                            <th>Fecha de la Operación</th>
                            <th>Detalle</th>
                            <th>Debe</th>
                            <th>Haber</th>

                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                            <tr>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th>Totales</th>
                              <th><input id="debe95" readonly style="width: 100px; border: 0;"></th>
                              <th><input id="haber95" readonly style="width: 100px; border: 0;"></th>
                            </tr>
                            <tr>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th>Saldo proximo  mes</th>
                              <th><input id="saldo_debe95" readonly style="width: 100px; border: 0;"></th>
                              <th><input id="saldo_haber95" readonly style="width: 100px; border: 0;"></th>
                            </tr>
                          </tfoot>
                        </table>
                    </div><br><br>

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


