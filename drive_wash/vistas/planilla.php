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
if ($_SESSION['acceso']==1)
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
                          <h1 class="box-title"><b>PLANILLA DE 
                          REMUNERACIONES</b> 

                            <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)">
                              <i class="fa fa-plus-circle">                          
                              </i> Agregar
                            </button> 

                            <a href="../reportes/rptusuarios.php" target="_blank">
                              <button class="btn btn-info">
                                <i class="fa fa-clipboard">
                                </i> Reporte
                              </button>
                            </a>
                          </h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Opciones</th>
                            <th>Código</th>
                            <th>Apellidos y Nombres</th>
                            <th>Cargo u Ocupación</th>
                            <th>Asignación Familiar</th>
                            <th>Sueldo Basico</th>
                            <th>Asignación Familiar</th>
                            <th>Total Remuneración Bruta</th>
                            <th>SNP / ONP</th>
                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                            <th>Opciones</th>
                           <th>Código</th>
                            <th>Apellidos y Nombres</th>
                            <th>Cargo u Ocupación</th>
                            <th>Asignación Familiar</th>
                            <th>Sueldo Basico</th>
                            <th>Asignación Familiar</th>
                            <th>Total Remuneración Bruta</th>
                            <th>SNP / ONP</th>
                          </tfoot>
                        </table>
                    </div>
                    <div class="panel-body" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">                           
                          
                          <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                            <label>CODIGO / DNI:</label>
                            <input type="text" class="form-control" name="codigo" id="codigo" maxlength="20" placeholder="DNI" maxlength="15" minlength="3" >
                          </div>
                          <!-- CLAVE -->
                          <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-3 col-xl-3">                  
                            <label>APELLIDOS Y NOMBRES(*):</label>
                            <input type="hidden" name="idventa" id="idventa">
                            <select id="apellidos_nombres" name="apellidos_nombres" class="form-control selectpicker" data-live-search="true" required>
                              
                            </select>
                          </div>
                          <!-- CELULAR -->
                           <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-3 col-xl-3">                  
                            <label>CARGO U OCUPACIÓN:</label>
                            <input type="hidden" name="idventa" id="idventa">
                            <select id="cargo" name="cargo" class="form-control selectpicker" data-live-search="true" required>
                              
                            </select>
                          </div>

                          <!-- CARGO -->
                          <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                            <label id="antiguo_cargo">ASIGNACIÓN FAMILIAR:</label>         <select id="id_asignacion" name="id_asignacion" onchange="ShowSelected();" class="form-control selectpicker" data-live-search="true"  >
                              <option>SELECT</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                            </select>                            
                          </div>

                          <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                            <label>SUELDO BÁSICO:</label>
                            <input type="number" class="form-control monto" name="sueldo_basico" id="sueldo_basico" placeholder="Sueldo Básico"  onkeyup="sumar();"  required>
                          </div>

                           <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-2 col-xl-2">
                            <label>ASIGNACIÓN FAMILIAR:</label>
                            <input type="number" class="form-control monto" name="monto_asignacion" id="monto_asignacion"   placeholder="Ingresa Monto"  onkeyup="sumar();" required>
                          </div>

                          <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-2 col-xl-2">
                            <label>OTROS :</label>
                            <input type="number" class="form-control monto" name="otros" id="otros"  placeholder="Otros"   onkeyup="sumar();" >
                          </div>

                          <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                            <label>TOTAL REMUNERACIÓN BRUTA :</label>
                            <input type="text" class="form-control" name="total_remuneracion" id="total_remuneracion" placeholder="total remuneracion"  required>

                          </div>

                          <!-- DISTRITO -->
                          <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-2 col-xl-2">
                            <label id="antiguo_distrito">SNP-ONP:</label>                 
                            <select id="snp_onp" name="snp_onp" class="form-control selectpicker" onchange="recibir();" data-live-search="true" >
                              <option>SELECT</option>
                              <option>SI</option>
                              <option>NO</option>
                            </select>                             
                          </div>

                          <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-2 col-xl-2">
                            <label>SNP-ONP:</label>
                            <input type="number" class="form-control"  name="onp" id="onp"  placeholder="Ingresa Monto"  required>
                          </div>

                          <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-2 col-xl-2">
                            <label id="antiguo_distrito">AFP:</label>                 
                            <select id="id_afp" name="id_afp" class="form-control selectpicker" onchange="recibir();" data-live-search="true" ></select>                             
                          </div>

                          <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-2 col-xl-2">
                            <label>APORTE OBLIGATORIO:</label>
                            <input type="number" class="form-control" name="aporte_obligatario" id="aporte_obligatario"  placeholder="Aporte Obligatorio" required>
                          </div>

                          <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-2 col-xl-2">
                            <label>COMISIÓN % SOBRE R.A.:</label>
                            <input type="number" class="form-control" name="comision_ra" id="comision_ra"  placeholder="Comisión" required>
                          </div>

                          <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-2 col-xl-2">
                            <label>PRIMA DE SEGURO.:</label>
                            <input type="number" class="form-control" name="prima_seguro" id="prima_seguro" placeholder="Aporte Prima" required>
                          </div>

                          <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-2 col-xl-2">
                            <label>TOTAL DE DESCUENTO:</label>
                            <input type="text" class="form-control" name="total_descuento" id="total_descuento"  placeholder="Total Descuento" required>
                          </div>

                          <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                            <label>REMUNERACIÓN NETA:</label>
                            <input type="number" class="form-control" name="remuneracion_neta" id="remuneracion_neta" placeholder="Remuneración Total" onkeyup="recibir();" required>
                          </div>

                           <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                            <label>SALUD:</label>
                            <input type="number" class="form-control f"  name="salud" id="salud"  onkeyup="aportes();" placeholder="Comisión Salud" required>
                          </div>

                           <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                            <label>SCTR:</label>
                            <input type="number" class="form-control f"  name="sctr" id="sctr" onkeyup="aportes();" placeholder="Comisión SCTR" required>
                          </div>

                           <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                            <label>TOTAL APORTES:</label>
                            <input type="number" class="form-control" name="total_aportes" id="total_aportes"  placeholder="Total de Aportes" required>
                          </div>                                                   
                          <!-- BTN -->
                         <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"  ></i> Guardar</button>

                            <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
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
<?php
}
else
{
  require 'noacceso.php';
}
require 'footer.php';
?>

<script type="text/javascript" src="scripts/planilla.js"></script>

<?php 
}
ob_end_flush();
?>