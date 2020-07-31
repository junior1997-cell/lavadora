var tabla;

//Función que se ejecuta al inicio
function init(){
	mostrarform(false);
	listar();
	listardatos();

	$("#formulario").on("submit",function(e)
	{
		guardaryeditar(e);	
	});
	//Cargamos los items al select proveedor
	$.post("../ajax/ingreso.php?op=selectProveedor", function(r){
	            $("#idproveedor").html(r);
	            $('#idproveedor').selectpicker('refresh');
	});

	$.post("../ajax/librodiario.php?op=SelecLibroContable", function(r){
	            $("#id_libroC").html(r);
	            //$('#id_libroC').selectpicker('refresh');
	});

	$('#mCompras').addClass("treeview active");
    $('#lIngresos').addClass("active");	
}
//Función para listar detalles del registro en el modal 
function Listar_detalle_unico_reg(iddetalle){
	
	$.post("../ajax/librodiario.php?op=listarDetalleuniq", {iddetalle : iddetalle}, function(r){
		$("#iddetalle").html(r);
	});	
}

function hora_fecha(){
	// HORA Y FECHA
    var todayDate = new Date();
	var getTodayDate = todayDate.getDate();
	var getTodayMonth =  todayDate.getMonth()+1;
	var getTodayFullYear = todayDate.getFullYear();
	//var getCurrentHours = todayDate.getHours();
	//var getCurrentMinutes = todayDate.getMinutes();
	//var getCurrentSeconds=todayDate.getSeconds();
	//var getCurrentAmPm = getCurrentHours >= 12 ? 'PM' : 'AM';
	//getCurrentHours = getCurrentHours % 12;
	//getCurrentHours = getCurrentHours ? getCurrentHours : 12; 
	//getCurrentMinutes = getCurrentMinutes < 10 ? '0'+getCurrentMinutes : getCurrentMinutes;
	var getCurrentDateTime = getTodayDate + '/' + getTodayMonth + '/' + getTodayFullYear;
	$("#fechald").val(getCurrentDateTime);

	//var n_pedido=getTodayDate+''+getTodayMonth+''+getTodayFullYear+''+getCurrentHours+''+getCurrentMinutes+''+getCurrentSeconds;
	//console.log(n_pedido);
	//$("#numero_pedido").val(n_pedido);

	//console.log(getCurrentHours,getCurrentMinutes)
	//console.log(getCurrentHours)
	console.log(getCurrentDateTime);
}

//Función limpiar
function limpiar()
{
	$("#idproveedor").val("");
	$("#proveedor").val("");
	$("#serie_comprobante").val("");
	$("#num_comprobante").val("");
	$("#impuesto").val("0");

	$("#total_compra").val("");
	$(".filas").remove();
	$("#total").html("0");
	
	//Obtenemos la fecha actual
	var now = new Date();
	var day = ("0" + now.getDate()).slice(-2);
	var month = ("0" + (now.getMonth() + 1)).slice(-2);
	var today = now.getFullYear()+"-"+(month)+"-"+(day) ;
    $('#fecha_hora').val(today);

    //Marcamos el primer tipo_documento
    $("#tipo_comprobante").val("Boleta");
	$("#tipo_comprobante").selectpicker('refresh');
}

//Función mostrar formulario
function mostrarform(flag)
{
	//limpiar();
	if (flag)
	{
		$("#listadoregistros").hide();
		$("#listadoafp").hide();
		$("#formularioregistros").show();
		//$("#btnGuardar").prop("disabled",false);
		$("#btnagregar").hide();
		listarArticulos();

		$("#btnGuardar").show();
		$("#btnCancelar").show();
		detalles=0;
		$("#btnAgregarArt").show();
		$("#btnAgregarfila").show();
	}
	else
	{
		$("#listadoregistros").show();
		$("#listadoafp").show();
		$("#formularioregistros").hide();
		$("#btnagregar").show();
	}

}

//Función cancelarform
function cancelarform()
{
	limpiar();
	mostrarform(false);
}

//Función Listar
function listar()
{
	tabla=$('#tbllistado').dataTable(
	{
		"lengthMenu": [ 5, 10, 25, 75, 100],//mostramos el menú de registros a revisar
		"aProcessing": true,//Activamos el procesamiento del datatables
	    "aServerSide": true,//Paginación y filtrado realizados por el servidor
	    dom: '<Bl<f>rtip>',//Definimos los elementos del control de tabla
	    buttons: [		          
		            'copyHtml5',
		            'excelHtml5',
		            'csvHtml5',
		            'pdf'
		        ],
		"ajax":
				{
					url: '../ajax/planilla.php?op=listar',
					type : "get",
					dataType : "json",						
					error: function(e){
						console.log(e.responseText);	
					}
				},
		"language": {
            "lengthMenu": "Mostrar : _MENU_ registros",
            "buttons": {
            "copyTitle": "Tabla Copiada",
            "copySuccess": {
                    _: '%d líneas copiadas',
                    1: '1 línea copiada'
                }
            }
        },
		"bDestroy": true,
		"iDisplayLength": 5,//Paginación
	    "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
	}).DataTable();
}

function listardatos()
{
	tabla=$('#tbllista').dataTable(
	{
		"lengthMenu": [ 5, 10, 25, 75, 100],//mostramos el menú de registros a revisar
		"aProcessing": true,//Activamos el procesamiento del datatables
	    "aServerSide": true,//Paginación y filtrado realizados por el servidor
	    dom: '<Bl<f>rtip>',//Definimos los elementos del control de tabla
	    buttons: [		          
		            'copyHtml5',
		            'excelHtml5',
		            'csvHtml5',
		            'pdf'
		        ],
		"ajax":
				{
					url: '../ajax/planilla.php?op=listar_porcentaje',
					type : "get",
					dataType : "json",						
					error: function(e){
						console.log(e.responseText);	
					}
				},
		"language": {
            "lengthMenu": "Mostrar : _MENU_ registros",
            "buttons": {
            "copyTitle": "Tabla Copiada",
            "copySuccess": {
                    _: '%d líneas copiadas',
                    1: '1 línea copiada'
                }
            }
        },
		"bDestroy": true,
		"iDisplayLength": 5,//Paginación
	    "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
	}).DataTable();
}


//Función ListarArticulos
function listarArticulos()
{
	tabla=$('#tblarticulos').dataTable(
	{
		"aProcessing": true,//Activamos el procesamiento del datatables
	    "aServerSide": true,//Paginación y filtrado realizados por el servidor
	    dom: 'Bfrtip',//Definimos los elementos del control de tabla
	    buttons: [		          
		            
		        ],
		"ajax":
				{
					url: '../ajax/librodiario.php?op=listarPedido_venta',
					type : "get",
					dataType : "json",						
					error: function(e){
						console.log(e.responseText);	
					}
				},
		"bDestroy": true,
		"iDisplayLength": 5,//Paginación
	    "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
	}).DataTable();
}
//Función ListarArticulos
function listarDetalleuniq(){
		tabla=$('#detallesuniq').dataTable(
		{
			"aProcessing": true,//Activamos el procesamiento del datatables
		    "aServerSide": true,//Paginación y filtrado realizados por el servidor
		    dom: 'Bfrtip',//Definimos los elementos del control de tabla
		    buttons: [		          
			            
			        ],
			"ajax":
					{
						url: '../ajax/librodiario.php?op=listarDetalleuniq',
						type : "get",
						dataType : "json",						
						error: function(e){
							console.log(e.responseText);	
						}
					},
			"bDestroy": true,
			"iDisplayLength": 5,//Paginación
		    "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
		}).DataTable();
}
//Función para guardar o editar

function guardaryeditar(e)
{
	e.preventDefault(); //No se activará la acción predeterminada del evento
	//$("#btnGuardar").prop("disabled",true);
	var formData = new FormData($("#formulario")[0]);

	$.ajax({
		url: "../ajax/planilla.php?op=guardaryeditar",
	    type: "POST",
	    data: formData,
	    contentType: false,
	    processData: false,

	    success: function(datos)
	    {                    
	          bootbox.alert(datos);	          
	          mostrarform(false);
	          listar();
	    }

	});
	limpiar();
}

function mostrar(idingreso)
{
	$.post("../ajax/ingreso.php?op=mostrar",{idingreso : idingreso}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);

		$("#idproveedor").val(data.idproveedor);
		$("#idproveedor").selectpicker('refresh');
		$("#tipo_comprobante").val(data.tipo_comprobante);
		$("#tipo_comprobante").selectpicker('refresh');
		$("#serie_comprobante").val(data.serie_comprobante);
		$("#num_comprobante").val(data.num_comprobante);
		$("#fecha_hora").val(data.fecha);
		$("#impuesto").val(data.impuesto);
		$("#idingreso").val(data.idingreso);

		//Ocultar y mostrar los botones
		$("#btnGuardar").hide();
		$("#btnCancelar").show();
		$("#btnAgregarArt").hide();
		$("#btnAgregarfila").show();
 	});

 	$.post("../ajax/ingreso.php?op=listarDetalle&id="+idingreso,function(r){
	        $("#detalles").html(r);
	});
}

//Función para anular registros
function anular(idingreso)
{
	bootbox.confirm("¿Está Seguro de anular el ingreso?", function(result){
		if(result)
        {
        	$.post("../ajax/ingreso.php?op=anular", {idingreso : idingreso}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

//Declaración de variables necesarias para trabajar con las compras y
//sus detalles
var impuesto=18;
var cont=0;
var detalles=0;
//$("#guardar").hide();
$("#btnGuardar").hide();
$("#tipo_comprobante").change(marcarImpuesto);

function marcarImpuesto()
  {
  	var tipo_comprobante=$("#tipo_comprobante option:selected").text();
  	if (tipo_comprobante=='Factura')
    {
        $("#impuesto").val(impuesto); 
    }
    else
    {
        $("#impuesto").val("0"); 
    }
  }
/*function total_pedido_ld(total){
	console.log(total)
	var totalll;

	$.post("../ajax/librodiario.php?op=total_pedido_ld",{total : total}, function(data, status)
	{
		data = JSON.parse(data);		
		//console.log(data);
		totalll= data['Detalle'][0]['total_pedido'];
		console.log(totalll);
 	});
}*/
function agregarfila(){
	//total_pedido_ld(idarticulo);
  	var cantidad=1;
    var precio_compra=1;
    var precio_venta=1;
    var denominacion='Denominación';
  	//var totall=totalll;

	var subtotal=cantidad*precio_compra;
	var fila='<tr class="filas" id="fila'+cont+'">'+
	'<td><button type="button" class="btn btn-danger" onclick="eliminarDetalle('+cont+')">X</button></td>'+
	'<td><input type="text" style="width: 50px" name="n_operacion[]" id="n_operacion[]" value="'+cantidad+'"></td>'+
	'<td><input type="Date" style="width: 118px" name="fecha[]" id="fecha[]" value="" required></td>'+
	'<td><textarea type="text" cols="15" rows="2" style="resize: both;" name="glosa[]" id="glosa[]" value="" placeholder="Escribe la glosa de la operacion"></textarea></td>'+
	'<td><select id="id_libroC[]" name="id_libroC[]" style="width: 90px" class="form-control" required>'+
    	'<option value="33">select</option>'+
    	'<option value="1"> 1 Libro Caja y Bancos</option>'+
		'<option value="2"> 2 Libro Ingresos y Gastos</option>'+
		'<option value="3"> 3 Libro de Inventarios y Balances</option>'+
		'<option value="4"> 4 Libro de Retenciones Incisos E) y F) del Articulo</option>'+
		'<option value="5"> 5 Libro Diario</option>'+
		'<option value="6"> 5-A Libro Diario de Formato Simplificado</option>'+
		'<option value="7"> 6 Libro Mayor</option>'+
		'<option value="8"> 7 Registro de Activos Fijos</option>'+
		'<option value="9"> 8 Registro de Compras</option>'+
		'<option value="10">9 Registro de Consignaciones</option>'+
		'<option value="11">10 Registro de Costos</option>'+
		'<option value="12">11 Registro de Huéspedes</option>'+
		'<option value="13">12 Registro de Inventario Permanente Unidades Físicas</option>'+
		'<option value="14">13 Registro de Inventario Permanente Valorizado</option>'+
		'<option value="15">14 Registro de Ventas e Ingresos</option>'+
		'<option value="16">15 Registro de Ventas e Ingresos-Artículo 23° Res. de Superintendencia N° 266-2004/SUNAT</option>'+
	  	'<option value="17">16 Registro del Régimen de Percepciones</option>'+
	 	'<option value="18">17 Registro del Régimen de Retenciones</option>'+
	  	'<option value="19">18 Registro IVAP</option>'+
	  	'<option value="20">19 Registro(s) Auxiliar(es) de Adquisiciones-Articulo 8° Resolución de Superintendencia N° 022-98/SUNAT</option>'+
	  	'<option value="21">20 Registro(s) Auxiliar(es) de Adquisiciones-Insiso A) Primer Párrafo Artículo 5° Res. de Superintendencia N° 021-99/SUNAT</option>'+
	  	'<option value="22">21 Registro(s) Auxiliar(es) de Adquisiciones-Insiso A) Primer Párrafo Artículo 5° Res. de Superintendencia N° 142-2001/SUNAT</option>'+
	  	'<option value="23">22 Registro(s) Auxiliar(s) de Adquisiciones-Insiso A) Primer Párrafo Artículo 5° Resolución de Superintendencia N° 256-2004/SUNAT</option>'+
	  	'<option value="24">23 Registro(s) Auxiliar(s) de Adquisiciones-Insiso A) Primer Párrafo Artículo 5° Res. de Superintendencia N° 257-2004/SUNAT</option>'+
	  	'<option value="25">24 Registro(s) Auxiliar(s) de Adquisiciones-Insiso A) Primer Párrafo Artículo 5° Res. de Superintendencia N° 258-2004/SUNAT</option>'+
	  	'<option value="26">25 Registro(s) Auxiliar(s) de Adquisiciones-Insiso A) Primer Párrafo Artículo 5° Res. de Superintendencia N° 259-2004/SUNAT</option>'+
	  	'<option value="27">26 Registro de Retenciones Artículo 77-A de la Ley de Impuesto a la Renta</option>'+
	  	'<option value="28">27 Libro de Actas de la Empresa Individual de Responsabilidad Limitada</option>'+
	  	'<option value="29">28 Libro de Actas de la Junta General de Accionistas</option>'+
	  	'<option value="30">29 Libro de Actas del Directorio</option>'+
	  	'<option value="31">30 Libro de Matrícula de Acciones</option>'+
	  	'<option value="32">31 Libro de Planillas</option>'+'</select>'+'</td>'+
	'<td><input type="text" style="width: 40px" name="idarticulo[]" value="">'+'</td>'+
	'<td><input type="text" readonly style="width: 70px" name="idarticulo[]" value="">'+'</td>'+
	'<td><input type="number"  style="width: 70px" name="idarticulo[]" min="10" value="">'+'</td>'+
	'<td><input type="text" name="precio_compra[]" id="precio_compra[]" value=""></td>'+
	'<td><input type="number" style="width: 70px" name="precio_compra[]" id="total_ld[]" value=""></td>'+
	'<td><input type="number" style="width: 70px" name="precio_compra[]"  value=""></td>'+
	'<td><button type="button" onclick="modificarSubototales()" class="btn btn-info"><i class="fa fa-refresh"></i></button></td>'+
	'</tr>';
	cont++;
	detalles=detalles+1;
	$('#detalles').append(fila);
	//$('#fila').append(fila);
	modificarSubototales();
}

function agregarDatellepedido(idarticulo,articulo,totall){
	//total_pedido_ld(idarticulo);
  	var cantidad=1;
    var precio_compra=1;
    var precio_venta=1;
    var denominacion='Denominación';
  	//var totall=totalll;

    if (idarticulo!="")
    {
    	var subtotal=cantidad*precio_compra;
    	var fila='<tr class="filas" id="fila'+cont+'">'+
    	'<td><button type="button" class="btn btn-danger" onclick="eliminarDetalle('+cont+')">X</button></td>'+
    	'<td><input type="text" style="width: 50px" name="n_operacion[]" id="n_operacion[]" value="'+cantidad+'"></td>'+
    	'<td><input type="Date" style="width: 118px" name="fecha[]" id="fecha[]" value="" required></td>'+
    	'<td><textarea type="text" cols="15" rows="2" style="resize: both;" name="glosa[]" id="glosa[]" value="" placeholder="Escribe la glosa de la operacion"></textarea></td>'+
    	'<td><select id="id_libroC[]" name="id_libroC[]" style="width: 90px" class="form-control" required>'+
    	'<option value="33">select</option>'+
    	'<option value="1"> 1 Libro Caja y Bancos</option>'+
		'<option value="2"> 2 Libro Ingresos y Gastos</option>'+
		'<option value="3"> 3 Libro de Inventarios y Balances</option>'+
		'<option value="4"> 4 Libro de Retenciones Incisos E) y F) del Articulo</option>'+
		'<option value="5"> 5 Libro Diario</option>'+
		'<option value="6"> 5-A Libro Diario de Formato Simplificado</option>'+
		'<option value="7"> 6 Libro Mayor</option>'+
		'<option value="8"> 7 Registro de Activos Fijos</option>'+
		'<option value="9"> 8 Registro de Compras</option>'+
		'<option value="10">9 Registro de Consignaciones</option>'+
		'<option value="11">10 Registro de Costos</option>'+
		'<option value="12">11 Registro de Huéspedes</option>'+
		'<option value="13">12 Registro de Inventario Permanente Unidades Físicas</option>'+
		'<option value="14">13 Registro de Inventario Permanente Valorizado</option>'+
		'<option value="15">14 Registro de Ventas e Ingresos</option>'+
		'<option value="16">15 Registro de Ventas e Ingresos-Artículo 23° Res. de Superintendencia N° 266-2004/SUNAT</option>'+
	  	'<option value="17">16 Registro del Régimen de Percepciones</option>'+
	 	'<option value="18">17 Registro del Régimen de Retenciones</option>'+
	  	'<option value="19">18 Registro IVAP</option>'+
	  	'<option value="20">19 Registro(s) Auxiliar(es) de Adquisiciones-Articulo 8° Resolución de Superintendencia N° 022-98/SUNAT</option>'+
	  	'<option value="21">20 Registro(s) Auxiliar(es) de Adquisiciones-Insiso A) Primer Párrafo Artículo 5° Res. de Superintendencia N° 021-99/SUNAT</option>'+
	  	'<option value="22">21 Registro(s) Auxiliar(es) de Adquisiciones-Insiso A) Primer Párrafo Artículo 5° Res. de Superintendencia N° 142-2001/SUNAT</option>'+
	  	'<option value="23">22 Registro(s) Auxiliar(s) de Adquisiciones-Insiso A) Primer Párrafo Artículo 5° Resolución de Superintendencia N° 256-2004/SUNAT</option>'+
	  	'<option value="24">23 Registro(s) Auxiliar(s) de Adquisiciones-Insiso A) Primer Párrafo Artículo 5° Res. de Superintendencia N° 257-2004/SUNAT</option>'+
	  	'<option value="25">24 Registro(s) Auxiliar(s) de Adquisiciones-Insiso A) Primer Párrafo Artículo 5° Res. de Superintendencia N° 258-2004/SUNAT</option>'+
	  	'<option value="26">25 Registro(s) Auxiliar(s) de Adquisiciones-Insiso A) Primer Párrafo Artículo 5° Res. de Superintendencia N° 259-2004/SUNAT</option>'+
	  	'<option value="27">26 Registro de Retenciones Artículo 77-A de la Ley de Impuesto a la Renta</option>'+
	  	'<option value="28">27 Libro de Actas de la Empresa Individual de Responsabilidad Limitada</option>'+
	  	'<option value="29">28 Libro de Actas de la Junta General de Accionistas</option>'+
	  	'<option value="30">29 Libro de Actas del Directorio</option>'+
	  	'<option value="31">30 Libro de Matrícula de Acciones</option>'+
	  	'<option value="32">31 Libro de Planillas</option>'+'</select>'+'</td>'+
    	'<td><input type="text" style="width: 40px" name="idarticulo[]" value="">'+'</td>'+
    	'<td><input type="text" readonly style="width: 70px" name="idarticulo[]" value="'+articulo+'">'+'</td>'+
    	'<td><input type="number"  style="width: 70px" name="idarticulo[]" min="10" value="'+idarticulo+'">'+'</td>'+
    	'<td><input type="text" name="precio_compra[]" id="precio_compra[]" value="'+denominacion+'"></td>'+
    	'<td><input type="number" style="width: 70px" name="precio_compra[]" id="total_ld[]" value="'+totall+'"></td>'+
    	'<td><input type="number" style="width: 70px" name="precio_compra[]"  value="'+totall+'"></td>'+
    	'<td><button type="button" onclick="modificarSubototales()" class="btn btn-info"><i class="fa fa-refresh"></i></button></td>'+
    	'</tr>';
    	cont++;
    	detalles=detalles+1;
    	$('#detalles').append(fila);
    	//$('#fila').append(fila);
    	modificarSubototales();
    }
    else
    {
    	alert("Error al ingresar el detalle, revisar los datos del artículo");
    }
}


function modificarSubototales(){
  	var cant = document.getElementsByName("cantidad[]");
    var prec = document.getElementsByName("precio_compra[]");
    var sub = document.getElementsByName("subtotal");

    for (var i = 0; i <cant.length; i++) {
    	var inpC=cant[i];
    	var inpP=prec[i];
    	var inpS=sub[i];

    	inpS.value=inpC.value * inpP.value;
    	document.getElementsByName("subtotal")[i].innerHTML = inpS.value;
    }
    calcularTotales();

}
function calcularTotales(){
  	var sub = document.getElementsByName("subtotal");
  	var total = 0.0;

  	for (var i = 0; i <sub.length; i++) {
		total += document.getElementsByName("subtotal")[i].value;
	}
	$("#total").html("S/. " + total);
    $("#total_compra").val(total);
    evaluar();
}

function evaluar(){
  	if (detalles>0)
    {
     // $("#btnGuardar").show();
    }
    else
    {
     // $("#btnGuardar").hide(); 
      cont=0;
    }
}

function eliminarDetalle(indice){
  	$("#fila" + indice).remove();
  	calcularTotales();
  	detalles=detalles-1;
  	evaluar();
  }

init();