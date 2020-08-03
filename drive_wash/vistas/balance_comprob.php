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
                    <div class="panel-body table-responsive" id="listadoregistros">
                      <table border="1" width=10 style=" width: 100%; text-align:center;" > 
                        <style type="text/css"> 
                          .st{
                             text-align: center;
                             background-color: #ACB3B8;

                          }
                          .td{
                             text-align: initial;
                             font-weight: bold;
                             font-weight: 900;

                          }
                        </style>
                        <thead>
                          <tr> 
                              <th rowspan="2" class="st" >CUENTA</th> 
                              <th rowspan="2" class="st" >DETALLE</th> 
                              <th colspan="2" class="st">SUMAS</th> 
                              <th colspan="2" class="st">SALDOS</th> 
                              <th colspan="2" class="st">EST.SIT.FIN</th> 
                              <th colspan="2" class="st">ESTADO DE RESULTADOS INT</th> 

                          </tr> 
                          <tr> 
                              <td class="st">DEBE</td> 
                              <td class="st">HABER</td> 
                              <td class="st">DUEDOR</td> 
                              <td class="st">ACREEDOR</td> 
                              <td class="st">ACTIVO</td> 
                              <td class="st">PAS Y PAT</td> 
                              <td class="st">PERDIDA</td> 
                              <td class="st">GANANCIA</td> 
                          </tr>
                          </thead>
                          <tbody id="filas" class="td">
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
<script type="text/javascript" src="scripts/balance.js"></script>
<?php 
}
ob_end_flush();
?>