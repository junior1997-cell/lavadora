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
                          <h1 class="box-title">Usuario 

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
                            <th>Nombre</th>
                            <th>Sexo</th>
                            <th>Documento</th>
                            <th>Email</th>                           
                            <th>celular</th>
                            <th>cargo</th>
                            <th>distrito</th>
                            <th>Foto</th>
                            <th>Estado</th>
                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                            <th>Opciones</th>
                            <th>Nombre</th>
                            <th>Sexo</th>
                            <th>Documento</th>
                            <th>Email</th>                          
                            <th>celular</th>
                            <th>cargo</th>
                            <th>distrito</th>
                            <th>Foto</th>
                            <th>Estado</th>
                          </tfoot>
                        </table>
                    </div>
                    <div class="panel-body" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                            
                          <!-- TIPO PERSONA -->
                          <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-2 col-xl-2">
                            <label id="antiguo_tipo_doc">Tipo Documento (*):</label>
                            <label id="nuevo_tipo_doc">Nuevo Tipo Doc</label>
                            <select  class="form-control selectpicker" data-live-search="true" name="tipo_documento" id="tipo_documento"  onclick="tipo_doc_select_ruc_dni()" required  >

                              
                            </select>
                              
                          </div>

                          <!-- DNI -->
                          <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-3 col-xl-3" style=" margin  :0px 0px !important;">                           
                            <div class="form-group col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-9" style=" padding:0px 0px !important;">
                              <label id="nuevo_mos_no_select">Num. Documento</label>
                              <label id="mos_no_select">No select Tipo Doc</label>
                              <label id="mos_dni">DNI(*):</label> 
                              <div id="ape"> </div>  
                              <label id="mos_ruc">RUC(*):</label> 
                              <label id="mos_carnet">CARNET DE EXTRANJERIA(*):</label>  
                              <label id="mos_pasaporte">PASAPORTE(*):</label>                                            
                              <input type="number" class="form-control " name="dni" id="dni"  min="10000000" max="99999999999" placeholder="Num Doc."  style=" padding:0px 0px !important;" required>
                            </div>

                            <div class="form-group col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                              <label id="label_oculto"></label> 
                              <input type="button" class="btn btn-success" value="validar d"  id="btnareniec" onclick="mostrar_datos_reniec2()">

                              <input type="button" class="btn btn-success" value="validar r"  id="btnsunat" onclick="mostrar_datos_sunat2()">
                            </div>                        
                          </div>

                          <!-- NOMBRE -->
                          <input type="hidden" name="id" id="id">
                          <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-3 col-xl-3" 
                          id="ocultar_div_nombre">
                            <label>nombre(*):</label>
                            
                            <input type="text" class="form-control" name="nombres" id="nombres" maxlength="25" placeholder="Nombre" required>
                          </div>

                          <!-- APELLIDOS -->
                          <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-4" 
                          id="ocultar_div_apellidos">
                            <label>Apellidos(*):</label>                      
                            <input type="text" class="form-control" name="apellidos" id="apellidoMatPat" maxlength="100" placeholder="Apellidos" >
                          </div>

                          <!-- RAZON SOCIAL -->
                          <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-7 col-xl-7" 
                          id="habilitar_razon_social">
                            <label>Razon Social(*):</label>                            
                            <input type="text" class="form-control" name="razonsocial" id="razonsocial" maxlength="100" placeholder="Razon Social" required  >
                          </div>

                            <!-- APELLIDOS -->
                          <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-3 col-xl-3" id="div_sexo" >
                            <label>Sexo:</label>
                            <select class="form-control select-picker" name="sexo" id="sexo" > 
                            </select>
                          </div>
                          <!-- CORREO USUARIO -->
                          <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                            <label>Usuario (*):</label>
                            <input type="text" class="form-control" name="login" id="login" maxlength="20" placeholder="Login"
                            maxlength="15" minlength="3" >
                          </div>
                          <!-- CLAVE -->
                          <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                            <label id="antigua_clave">Clave (*):</label>
                             <label id="nueva_clave">Nueva Clave (*):</label>
                             <input type="hidden" name="clave_actual" id="clave_actual">
                            <input type="password" class="form-control" name="clave" id="clave" maxlength="64" placeholder="Clave" >
                          </div>
                          <!-- CELULAR -->
                          <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                            <label>Celular:</label>
                            <input type="number" class="form-control" name="celular" id="celular" max="999999999" min="9999999" placeholder="celular" required>
                          </div>
                          <!-- CARGO -->
                          <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                            <label id="antiguo_cargo">Cargo(*):</label> 
                            <label id="nuevo_cargo">Nuevo Cargo(*):</label>                                                  
                            <select id="id_cargo" name="id_cargo" class="form-control selectpicker" data-live-search="true" required ></select>  
                            
                          </div>
                          <!-- DISTRITO -->
                          <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                            <label id="antiguo_distrito">Distrito(*):</label>                        
                            <label id="nuevo_distrito">Nuevo Distrito(*):</label> 
                            <select id="id_distrito" name="id_distrito" class="form-control selectpicker" data-live-search="true" ></select>                             
                          </div>
                          <!-- DIRECCION -->
                          <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                            <label>Dirección:</label>
                            <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Dirección" maxlength="70" required>
                          </div>
                          
                         <!--  <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                            <label>Email:</label>
                            <input type="email" class="form-control" name="email" id="email" maxlength="50" placeholder="Email">
                          </div> -->
                           

                          
                          <!-- PERMISOS -->
                         <!--  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Permisos:</label>
                            <ul style="list-style: none;" id="permisos">
                              
                            </ul>
                          </div> -->
                          <!-- IMAGEN -->
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Imagen:</label>
                            <input type="file" class="form-control" name="imagen" id="imagen" accept="image/*">
                            <input type="hidden" name="imagenactual" id="imagenactual">
                            <img src="" width="150px" height="120px" id="imagenmuestra">
                          </div>

                          <!-- Tablita -->
                          <!-- <div  id="tablita">
                           
                            
                          </div> -->
                          
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

<script type="text/javascript" src="scripts/cliente.js"></script>
<?php 
}
ob_end_flush();
?>