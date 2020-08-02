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
if ($_SESSION['almacen']==1)
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
                          <h1> BALANCE DE COMPROBACIÓN </h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Opciones</th>
                            <th>Nombre</th>
                            <th>Categoría</th>
                            <th>Código</th>
                            <th>Stock</th>
                            <th>Imagen</th>
                            <th>Estado</th>
                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                            <th>Opciones</th>
                            <th>Nombre</th>
                            <th>Categoría</th>
                            <th>Código</th>
                            <th>Stock</th>
                            <th>Imagen</th>
                            <th>Estado</th>
                          </tfoot>
                        </table>
                    </div>

                    <div>
                      <table border="1" width=10 style=" width: 100%; text-align:center;" > 
                        <style type="text/css"> 
                          .st{
                             text-align: center;
                          }
                        </style>
                        <thead>
                          <tr> 
                              <th rowspan="2" class="st" >CUENTA</th> 
                              <th rowspan="2" class="st">DETALLE</th> 
                              <th colspan="2" class="st">SUMAS</th> 
                              <th colspan="2" class="st">SALDOS</th> 
                              <th colspan="2" class="st">EST.SIT.FIN</th> 
                              <th colspan="2" class="st">ESTADO DE RESULTADOS INT</th> 

                          </tr> 
                          <tr> 
                              <td>DEBE</td> 
                              <td>HABER</td> 
                              <td>DUEDOR</td> 
                              <td>ACREEDOR</td> 
                              <td>ACTIVO</td> 
                              <td>PAS Y PAT</td> 
                              <td>PERDIDA</td> 
                              <td>GANANCIA</td> 
                          </tr>
                          </thead>
                          <tbody id="filas" onclick="tdfilas()" >
                          </tbody>
                      </table> 
                      </center>
                    </div>
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->
<?php
}
else
{
  require 'noacceso.php';
}
require 'footer.php';
?>
<script type="text/javascript" src="../public/js/JsBarcode.all.min.js"></script>
<script type="text/javascript" src="../public/js/jquery.PrintArea.js"></script>
<script type="text/javascript" src="scripts/balance.js"></script>
<script type="text/javascript" src="scripts/articulo.js"></script>
<?php 
}
ob_end_flush();
?>