var tabla;
 var delivey;

//Función que se ejecuta al inicio
function init(){
	// hora_fecha();	
	mostrarform(false);
	listar();
	 
	//ESTO ES PARA GUARDAR LA VENTA
	$("#formulario").on("submit",function(e)
	{
		guardaryeditar(e);	
	});
	 
	//ESTO ES PARA PAGAR EL PEDIDO
	$("#formpago").on("submit",function(e){
		$('#myModalPagar').modal('hide');
		  guardaryeditarpago(e);
	});

		//Cargamos los items al select delivery
	$.post("../ajax/venta.php?op=listardelivey", function(r){
        $("#delivery").html(r);
        $('#delivery').selectpicker('refresh');
	});
			//Cargamos los items al select delivery
	$.post("../ajax/venta.php?op=listartipolavado", function(r){
        $("#id_tipo_servicio").html(r);
        $('#id_tipo_servicio').selectpicker('refresh');
	});
		//Cargamos los items al select tipo pedido
	$.post("../ajax/venta.php?op=listartipopedido", function(r){
        $("#id_tipo_pedido").html(r);
        $('#id_tipo_pedido').selectpicker('refresh');
	});
	//Cargamos los items al select clientes
	$.post("../ajax/venta.php?op=listar_clientes", function(r){
        $("#id_cliente").html(r);
        $('#id_cliente').selectpicker('refresh');
	});
	//Cargamos los comprobantes de pago
	$.post("../ajax/venta.php?op=listar_tiposcomprobante", function(r){
        $("#id_comprobante").html(r);
        $('#id_comprobante').selectpicker('refresh');
	});

	$('#pago_deudor_modal_id').addClass("col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12");
	$('#mVentas').addClass("treeview active");
    $('#lVentas').addClass("active");
    $("#fecha_antiguo").show();
	$("#fecha_nuevo").hide();
	$("#fecha_nuevo").hide();
	 
    
}

//Función limpiar
function limpiar()
{
	$("#id_tipo_pedido").val("");
	$("#id_tipo_pedido").selectpicker('refresh');
	$("#id_cliente").val("");
	$("#id_cliente").selectpicker('refresh');
	$("#id_comprobante").val("");
	$("#id_comprobante").selectpicker('refresh');
	$("#delivery").val("");
	$("#delivery").selectpicker('refresh');
	$("#id_tipo_servicio").val("");
	$("#id_tipo_servicio").selectpicker('refresh');
	$("#pago").html("NO SELECT");
	$("#tipo_pago").html("NO SELECT");
	$("#serie_comprobante").val("");
	$("#numero_comprobante").val("");
	$("#impuesto").val("0");
	$("#impuesto").val("0");
	$("#total_delivery").html("S/. 0.00");
	$("#costo_delivery").val("");
	$("#total").html("S/. 0.00");
	$("#total_venta").val("");
	$(".filas").remove();
	

	//Obtenemos la fecha actual
	var now = new Date();
	var day = ("0" + now.getDate()).slice(-2);
	var month = ("0" + (now.getMonth() + 1)).slice(-2);
	var today = now.getFullYear()+"-"+(month)+"-"+(day);
    $('#fecha_hora').val(today);
    //oconsole.log(today);
   // -----------------


//alert(today);
    //Marcamos el primer tipo_documento
    $("#id_comprobante").val("");
	$("#id_comprobante").selectpicker('refresh');
}




function mostrarform(flag)
{
	hora_fecha();	
	//limpiar();
	if (flag)
	{
		$("#listadoregistros").hide();
		$("#formularioregistros").show();
		//$("#btnGuardar").prop("disabled",false);
		$("#btnagregar").hide();
		listarArticulos();

		$("#btnGuardar").hide();
		$("#btnCancelar").show();
		$("#btnAgregarArt").show();
		$("#btnAgregarArt").prop("disabled",true);
		$("#btnAgregartipolav").show();
		//OCULTAMOS EL IMPUESTO
		$("#impuesto_id").hide();
		$("#impuesto_id").prop("disabled",true);
		//OCULTAMOS EL TIPO DE PAGO
		$("#tipo_pago_id").hide();
		$("#tipo_pago").prop("disabled",true);
		//OCULTAMOS FEHCA
		$("#fecha_antiguo").show();
		$("#fecha_nuevo").hide();
		$("#fecha_nuevo").hide();
		detalles=0;
	}
	else
	{
		$("#listadoregistros").show();
		$("#formularioregistros").hide();
		$("#btnagregar").show();
	}
}

function hora_fecha(){
	// HORA Y FECHA
    var todayDate = new Date();
	var getTodayDate = todayDate.getDate();
	var getTodayMonth =  todayDate.getMonth()+1;
	var getTodayFullYear = todayDate.getFullYear();
	var getCurrentHours = todayDate.getHours();
	var getCurrentMinutes = todayDate.getMinutes();
	var getCurrentSeconds=todayDate.getSeconds();
	var getCurrentAmPm = getCurrentHours >= 12 ? 'PM' : 'AM';
	getCurrentHours = getCurrentHours % 12;
	getCurrentHours = getCurrentHours ? getCurrentHours : 12; 
	getCurrentMinutes = getCurrentMinutes < 10 ? '0'+getCurrentMinutes : getCurrentMinutes;
	var getCurrentDateTime = getTodayDate + '/' + getTodayMonth + '/' + getTodayFullYear + ' ' + getCurrentHours + ':' + getCurrentMinutes + ':' +getCurrentSeconds+ ' ' + getCurrentAmPm;
	$("#hora_recojo").val(getCurrentDateTime);

	var n_pedido=getTodayDate+''+getTodayMonth+''+getTodayFullYear+''+getCurrentHours+''+getCurrentMinutes+''+getCurrentSeconds;
	// console.log(n_pedido);
	$("#numero_pedido").val(n_pedido);

// console.log(getCurrentHours,getCurrentMinutes)
// console.log(getCurrentHours)
// console.log(getCurrentDateTime);
}

//Función cancelarform
function cancelarform()
{
	// hora_fecha();	
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
					url: '../ajax/venta.php?op=listar',
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
	tabla=$('#tblPrendas').dataTable(
	{
		"aProcessing": true,//Activamos el procesamiento del datatables
	    "aServerSide": true,//Paginación y filtrado realizados por el servidor
	    dom: 'Bfrtip',//Definimos los elementos del control de tabla
	    buttons: [		          
		            
		        ],
		"ajax":
				{
					url: '../ajax/venta.php?op=listarprendaslavado',
					type : "get",
					dataType : "json",						
					error: function(e){
						console.log(e.responseText);	
					}
				},
		"bDestroy": true,
		"iDisplayLength": 4,//Paginación
	    "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
	}).DataTable();
}
//Función Listartipopedido
function listartipopedido()
{
	tabla=$('#tblPidopedido').dataTable(
	{
		"aProcessing": true,//Activamos el procesamiento del datatables
	    "aServerSide": true,//Paginación y filtrado realizados por el servidor
	    dom: 'Bfrtip',//Definimos los elementos del control de tabla
	    buttons: [		          
		            
		        ],
		"ajax":
				{
					url: '../ajax/venta.php?op=listartipolavado',
					type : "get",
					dataType : "json",						
					error: function(e){
						console.log(e.responseText);	
					}
				},
		"bDestroy": true,
		"iDisplayLength": 4,//Paginación
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
		url: "../ajax/venta.php?op=guardaryeditar",
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

function mostrar(idventa)
{
	mostrarform(true);
	$("#numero_pedido").val("");
	$("#hora_recojo").val("");

	$.post("../ajax/venta.php?op=mostrar",{idventa : idventa}, function(data, status)
	{
		data = JSON.parse(data);		
		console.log(data);

		$("#id_tipo_pedido").val(data['Detalle'][0]['id_tipo_pedido']);
		$("#id_tipo_pedido").selectpicker('refresh');
		$("#id_cliente").val(data['Detalle'][0]['id_cliente']);
		$("#id_cliente").selectpicker('refresh');
		$("#id_comprobante").val(data['Detalle'][0]['id_tipo_comprobante']);
		$("#id_comprobante").selectpicker('refresh');
		$("#delivery").val(data['Detalle'][0]['id_delivery']);
		$("#delivery").selectpicker('refresh');
		$("#serie_comprobante").val(data['Detalle'][0]['serie_comprobante']);
		$("#numero_comprobante").val(data['Detalle'][0]['numero_comprobante']);
		$("#hora_recojo").val(data['Detalle'][0]['fecha_pedido_prenda']);
		$("#fecha_hora_entregaa").val(data['Detalle'][0]['fecha_entrega']);
		$("#idventa").val(data['Detalle'][0]['numero_comprobante']);
		$("#numero_pedido").val(data['Detalle'][0]['numero_pedido']);
		if(data['Detalle'][0]['momento_pago']=="1"){
			$("#pago").html('PAGAR AHORA');
			$("#tipo_pago_id").show();
			$("#tipo_pago").html("EFECTIVO");
		}else{
			$("#pago").html('PAGAR AL RECOJER EL PEDIDO'); 
			$("#tipo_pago_id").hide();
		}
		$("#id_tipo_servicio").val(data['Detalle'][0]['id_tipo_lavado']);
		$("#id_tipo_servicio").selectpicker('refresh');
		//Ocultar y mostrar los botones
		$("#btnGuardar").hide();
		$("#btnCancelar").show();
		$("#btnAgregarArt").hide();
		$("#btnAgregartipolav").hide();
		 $("#fecha_antiguo").hide();
		 $("#fecha_nuevo").show();
 	});

 	$.post("../ajax/venta.php?op=listarDetalle&id="+idventa,function(r){
	        $("#detalles").html(r);
	});	
}

//Función para anular registros
function anularboleta(idventa)
{
	bootbox.confirm("¿Está Seguro de anular la botela o factura?. ESTA ACCIÓSN ES IRREVERSIBLE", function(result){
		if(result)
        {
        	$.post("../ajax/venta.php?op=anular", {idventa : idventa}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}
//Función para enviar el pedido al cliente
function enviarpedido(idventa)
{
	var pagito=' <select  name="pago_deudor" id="pago_deudor" class="form-control  " required="">'+

                  '<option value="">NO SELECT</option>'+

                  '<option value="1">PAGAR</option>'+

                  '<option value="0">QUITAR PAGADO</option>'+   
                '</select>';
    // document.write(pagito);
	bootbox.confirm("¿Está Seguro de enviar el pedido?", function(result){
		if(result)
        {
        	$.post("../ajax/venta.php?op=enviar_pedido", {idventa : idventa}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

//Función para recuperar el pedido
function recuperarpedido(idventa)
{
	bootbox.confirm("¿Está Seguro de recuperar el envio?", function(result){
		if(result)
        {
        	$.post("../ajax/venta.php?op=recuperar_pedido", {idventa : idventa}, function(e){
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

function marcarImpuesto(){
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

// $('select[name=id_comprobante]').selectpicker().on('changed.bs.select', function (e) {
//     	var selected = e.target.value;
//     	console.log(selected);

//     	// NO SELECT
//     if(selected == "1"){

//     	$("#delivery").hide();
//     	 delivey=0;
//        $("#deliv").val("deliv"); 
//        modificarSubototales();
//        calcularTotales();
//     }
//     if(selected == "2"){
//     	 delivey=0.15;
    	
//     	 $("#deliv").val("deliv"); 
//     	 modificarSubototales();
//     	 calcularTotales();
//     }
//     if(selected == "3"){
//     	 delivey=0.15;
//     	$("#deliv").val("deliv"); 
//     	modificarSubototales();
//     	calcularTotales();
//     }
//      if(selected == "4"){
//     	 delivey=0.15;
//     	$("#deliv").val("deliv");
//     	modificarSubototales();
//     	calcularTotales(); 
//     }

// });
$('select[name=id_comprobante]').selectpicker().on('changed.bs.select', function (e) {
    var selected = e.target.value;
    console.log(selected);

    	// NO SELECT
    if(selected == "1"){

    	$("#impuesto_id").hide();
    	$("#impuesto_id").prop("disabled",true);    	 
    }

    if(selected == "2"){
    	$("#impuesto_id").hide();
    	$("#impuesto_id").prop("disabled",true);
    	
    }

    if(selected == "3"){
    	$("#impuesto_id").show();
    	$("#impuesto_id").prop("disabled",false);   	

    }
     
});



function select_pago(){
	var zone = document.getElementById("pagoo");
	console.log(zone.value);
	if(zone.value=="1"){
		$("#tipo_pago_id").show();
		$("#tipo_pagoo").prop("disabled",false);
	}
	if(zone.value=="0"){
		$("#tipo_pagoo").prop("disabled",true);
		$("#tipo_pago_id").hide();
	}
}

function modalrealizarpago(pagaras){
  	// $('#myModalPagar').modal('show');
  	bootbox.confirm("¿Está Seguro de PAGAR este pedido?", function(result){
		if(result)
        {
        	$.post("../ajax/venta.php?op=realizar_pago", {pagaras : pagaras}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})

}

function modalrecuperarpago(pagaras){
  	// $('#myModalPagar').modal('show');
  	bootbox.confirm("¿Está Seguro de RECUPERAR el pago de este pedido?", function(result){
		if(result)
        {
        	$.post("../ajax/venta.php?op=recuperar_pago", {pagaras : pagaras}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})

}

function guardaryeditarpago(e)
{
	e.preventDefault(); //No se activará la acción predeterminada del evento
	//$("#btnGuardar").prop("disabled",true);
	var formData = new FormData($("#formpago")[0]);

	$.ajax({
		url: "../ajax/venta.php?op=guardaryeditarpago",
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

function select_pago_modal(pag_mdl){
	console.log(pag_mdl);
	if(!pag_mdl || 0 === pag_mdl.length){

	}else{
		var pend=pag_mdl;
		$('#id_oculto').val(pend);
	}
	
	
	$('#myModalPagar').modal('show');
	
	var zone = document.getElementById("pago_deudor_modal");
	console.log(zone.value);
	if(zone.value==""){
		
		$("#tipo_pago_deudor_modal").prop("disabled",true);
		// $('#id_oculto').val(pag_mdl);
	}
	if(zone.value=="1"){
		 // $('#id_oculto').val(pag_mdl);
		$("#tipo_pago_deudor_modal").prop("disabled",false);
		// $('#pago_deudor_modal_id').addClass("col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6");		 
	}
	if(zone.value=="0"){
		// $('#id_oculto').val(pag_mdl);
		// $('#pago_deudor_modal_id').addClass("col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12");
		$("#tipo_pago_deudor_modal").prop("disabled",true);		
	}
	
	
}


function agregarDetalle(idarticulo,articulo,precio_venta){
  	var cantidad=1;
    var descuento=0;
   

    if (idarticulo!="")
    {
    	var subtotal=cantidad*precio_venta;
    	//var porcentaje=subtotal*0.15;
    	var fila='<tr class="filas" id="fila'+cont+'">'+
    	'<td><button type="button" class="btn btn-danger" onclick="eliminarDetalle('+cont+')">X</button></td>'+
    	'<td><input type="hidden" name="idarticulo[]" value="'+idarticulo+'">'+articulo+'</td>'+
    	'<td> <select name="id_color[]" class="form-control " >'+
    			'<option value="100" id="id_color[]">NO SELECT</option>'+
    			'<option value="101"> ROJO</option>'+
    			'<option value="102"> AZUL</option>'+
    			'<option value="103"> AMARILLO</option>'+
    			'<option value="104"> VERDE</option>'+
    			'<option value="105"> MORADO</option>'+
    			'<option value="106"> ANARANJADO</option>'+
    			'<option value="107"> MARRON</option>'+
    			'<option value="108"> NEGRO</option>'+
    			'<option value="109"> CELESTE</option>'+
    			'<option value="110"> ROSADO</option>'+
    			'<option value="111"> PLOMO</option>'+
    			'<option value="112"> GRIS</option>'+
    			'<option value="113"> BLANCO</option>'+
    		 '</select>'+
    	'</td>'+
    	'<td><input type="number"  min="0" name="cantidad[]" id="cantidad[]" value="'+cantidad+'"></td>'+
    	'<td><input type="number" readonly min="0" name="precio_venta[]" id="precio_venta[]" value="'+precio_venta+'"></td>'+
    	'<td><input type="number"  min="0" name="descuento[]" value="'+descuento+'"></td>'+
    	
    	'<td><span name="subtotal" id="subtotal'+cont+'">'+subtotal+'</span></td>'+
    	'<td><button type="button" onclick="modificarSubototales()" class="btn btn-info"><i class="fa fa-refresh"></i></button></td>'+
    	'</tr>';
    	cont++;
    	detalles=detalles+1;
    	$('#detalles').append(fila);
    	modificarSubototales();
    	evaluar();
    }
    else
    {
    	alert("Error al ingresar el detalle, revisar los datos del artículo");
    }
}

function modificarSubototales()
{
	var cant = document.getElementsByName("cantidad[]");
	var prec = document.getElementsByName("precio_venta[]");
	var desc = document.getElementsByName("descuento[]");
	var sub = document.getElementsByName("subtotal");

	for (var i = 0; i <cant.length; i++) {
		var inpC=cant[i];
		var inpP=prec[i];
		var inpD=desc[i];
		var inpS=sub[i];

		inpS.value=(inpC.value * inpP.value)-inpD.value;
		document.getElementsByName("subtotal")[i].innerHTML = inpS.value;
	}
	calcularTotales(); 
}

function roundNumberventa(num, scale) {
  if(!("" + num).includes("e")) {
    return +(Math.round(num + "e+" + scale)  + "e-" + scale);
  } else {
    var arr = ("" + num).split("e");
    var sig = ""
    if(+arr[1] + scale > 0) {
      sig = "+";
    }
    return +(Math.round(+arr[0] + "e" + sig + (+arr[1] + scale)) + "e-" + scale);
  }
}  
 	
 	

function calcularTotales(){
	$("#btnAgregarArt").prop("disabled",false);
    // porcen_deli=0; 
  	$('select[name=delivery]').selectpicker().on('changed.bs.select', function (e) {
    	var select_d = e.target.value;
    	 console.log(select_d);
    	
    	 if(select_d == ""){
	    	 
	    	$("#btnAgregarArt").prop("disabled",true);
	    	 
	    }
	    if(select_d == "1"){
	    	porcen_deli=0;
	    	console.log(porcen_deli);calcularTotales();
	    	$("#btnAgregarArt").prop("disabled",false);
	    	 
	    } 
	    if(select_d == "2"){
	    	porcen_deli=0.15;console.log(porcen_deli);calcularTotales();
	    	 $("#btnAgregarArt").prop("disabled",false);
	   	}
	   	if(select_d == "3"){
			 porcen_deli=0.15;console.log(porcen_deli);calcularTotales();
			  $("#btnAgregarArt").prop("disabled",false);  	
		}
		if(select_d == "4"){
	    	porcen_deli=0.15;console.log(porcen_deli);calcularTotales();
	    	$("#btnAgregarArt").prop("disabled",false);
	    }
	      
	});

  	// console.log(porcen_deli);
	
	var sub = document.getElementsByName("subtotal");
  	var total = 0.0;
  	
  	// var porcentaje=0.15;
  	for (var i = 0; i <sub.length; i++) {
		total += document.getElementsByName("subtotal")[i].value;
	}
	tot=total*porcen_deli;
	tot_redon=roundNumberventa(tot,1);
	all=tot_redon+total;
	$("#total").html("S/. " + all);
    $("#total_venta").val(all);

	$("#total_delivery").html("S/."+tot_redon);
	$("#costo_delivery").val(tot_redon);
}

function evaluar(){
  	if (detalles>0)
    {
      $("#btnGuardar").show();
    }
    else
    {
      $("#btnGuardar").hide(); 
      cont=0;
    }
}

function eliminarDetalle(indice){
  	$("#fila" + indice).remove();
  	calcularTotales();
  	detalles=detalles-1;
  	evaluar()
}

 

init();