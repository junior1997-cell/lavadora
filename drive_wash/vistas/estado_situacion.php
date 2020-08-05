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
                          </tr>

                          <tr> 
                              <th class="st">CUENTA</th> 
                              <th class="st">DENOMINACION</th> 
                              <th class="st">TOTAL</th> 
                              <td></td>
                              <th class="st">CUENTA</th> 
                              <th class="st">DENOMINACION</th> 
                              <th class="st">TOTAL</th>
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
                              <td id="activo10"></td>

                              <td></td>

                              <td>40</td> 
                              <td>TRIBUTOS, CONTRAPRESTACIONES Y APORTES AL ...</td> 
                              <td id="paspat40"></td>
                            </tr>

                            <tr>
                              <td>12</td> 
                              <td>CUENTAS POR COBRAR COMERCIALES – TERCEROS</td> 
                              <td id="activo12"></td>

                              <td></td>

                              <td>41</td> 
                              <td>REMUNERACIONES Y PARTICIPACIONES POR PAGAR</td> 
                              <td id="paspat41"></td>
                            </tr>

                            <tr>
                              <td>14</td> 
                              <td>CUENTAS POR COBRAR AL PERSONAL, ...</td> 
                              <td id="activo14"></td>

                              <td></td>

                              <td>42</td> 
                              <td>CUENTAS POR PAGAR COMERCIALES TERCEROS</td> 
                              <td id="paspat42"></td>
                            </tr>

                            <tr>
                              <td>20</td> 
                              <td>MERCADERÍAS</td> 
                              <td id="activo20"></td>

                              <td></td>

                              <th style="text-align: center;">Total Pasivo Corriente</th> 
                              <td></td> 
                              <th id="totalPC"></th>
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
                              <td id="paspat45"></td>
                            </tr>

                            <tr>
                              <th style="text-align: center;">Total Activo Corriente</th> 
                              <td></td> 
                              <th style="text-align: center;" id="totalAC"></th>

                              <td></td>

                              <th style="text-align: center;">Total Pasivo No Corriente</th> 
                              <td></td> 
                              <th style="text-align: center;" id="totalPNC"></th>
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
                              <td id="activo33"></td>

                              <td></td>

                              <td>50</td> 
                              <td>CAPITAL</td> 
                              <td id="paspat50"></td>
                            </tr>

                            <tr>
                              <td></td> 
                              <td></td> 
                              <td></td>

                              <td></td>

                              <td>59</td> 
                              <td>RESULTADOS ACUMULADOS</td> 
                              <td id="paspat59"></td>
                            </tr>

                            <tr>
                              <th style="text-align: center;">Total Activo No Corriente</th> 
                              <td></td> 
                              <th id="totalANC"></th>

                              <td></td>

                              <td></td> 
                              <td></td> 
                              <td></td>
                            </tr>

                            <tr>
                              <th style="text-align: left; background: #E6F328">TOTAL ACTIVO</th> 
                              <td style="background: #E6F328"></td> 
                              <th style="background: #E6F328" id="totalA"></th>

                              <td></td>

                              <th style="text-align: left; background: #E6F328">TOTAL PAS Y PAT</th> 
                              <td style="background: #E6F328"></td> 
                              <th style="background: #E6F328" id="totalPSPT"></th>
                            </tr>
                          </tbody>
                      </table>
                    </div>

                <style type="text/css">
                  .debe>thead>tr>th, .debe>tbody>tr>th, .debe>tfoot>tr>th, .debe>thead>tr>td, .debe>tbody>tr>td, .debe>tfoot>tr>td 
                  {border: 1px solid #a73838;font-size: 10pt}
                </style>
                    
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
<script type="text/javascript" src="scripts/estado_situacion.js"></script>
<?php 
}
ob_end_flush();
?>


