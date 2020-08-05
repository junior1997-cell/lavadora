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
                      <h1 class="box-title"><b>FORMATO 6.1: "ESTADO DE RESULTADOS INTEGRALES "</b> 
                      </h1>
                        
                      <div class="box-tools pull-right">
                      </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- cuenta 10 -->
                    <center>
                    <div class="panel-body table-responsive" id="listadoregistros10">
                        <table border="0" width=10 style=" width: 50%; text-align:center;" > 
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
                              <th colspan="3" class="st" style="text-align: center;"><h3><b>ESTADO DE RESULTADOS INTEGRALES</b></h3></th>
                          </tr> 

                          <tr> 
                              <th class="st">CUENTA</th> 
                              <th class="st">DENOMINACION</th> 
                              <th class="st">TOTAL</th> 
                          </tr>
                          </thead>

                          <tbody>
                            <tr>
                              <td>70</td> 
                              <td>Ventas</td> 
                              <td id="ganancia70"></td>
                            </tr> 

                            <tr>
                              <td>69</td> 
                              <td>(-) Costo de Ventas</td> 
                              <td id="perdida69"></td>
                            </tr> 

                            <tr>
                              <th style="text-align: left; background: yellow">UTILIDAD BRUTA</th> 
                              <td style="background: yellow"></td> 
                              <th style="text-align: center; background: yellow" id="totalUB"></th>
                            </tr>

                            <tr>
                              <td>|</td> 
                              <td></td> 
                              <td></td>
                            </tr>

                            <tr>
                              <td>94</td> 
                              <td>(-) Gastos Administrativos</td> 
                              <td id="perdida94"></td>
                            </tr>

                            <tr>
                              <td>95</td> 
                              <td>(-) Gastos de Ventas</td> 
                              <td id="perdida95"></td>
                            </tr>

                            <tr>
                              <td>67</td> 
                              <td>(-) Gastos Financieros </td> 
                              <td>S/ - </td>
                            </tr> 

                            <tr>
                              <th style="text-align: left; background: yellow">UTILIDAD OPERATIVA</th> 
                              <td style="background: yellow"></td> 
                              <th style="text-align: center; background: yellow" id="totalUO"></th>
                            </tr>

                          </tbody>
                      </table>
                    </div>
                    </center>

                <style type="text/css">
                  .debe>thead>tr>th, .debe>tbody>tr>th, .debe>tfoot>tr>th, .debe>thead>tr>td, .debe>tbody>tr>td, .debe>tfoot>tr>td 
                  {border: 1px solid #a73838;font-size: 10pt}
                </style>
 
                    <!--Fin centro -->
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
<script type="text/javascript" src="scripts/estado_resultado.js"></script>
<?php 
}
ob_end_flush();
?>


