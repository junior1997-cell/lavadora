var tabla;

//Función que se ejecuta al inicio
function init(){
	mostrarform(false);
	listar();
	listardatos();
	recibir();

	
	document.getElementById('monto_asignacion').readOnly = true;
	document.getElementById('total_remuneracion').readOnly = true;
	document.getElementById('onp').readOnly = true;		
	document.getElementById('id_afp').readOnly = true;	
	document.getElementById('aporte_obligatario').readOnly = true;
	document.getElementById('comision_ra').readOnly = true;
	document.getElementById('prima_seguro').readOnly = true;
	document.getElementById('total_descuento').readOnly = true;
	document.getElementById('remuneracion_neta').readOnly = true;
	document.getElementById('total_aportes').readOnly = true;			
	//ShowSelected();
	//total_r_bruta()

	$("#formulario").on("submit",function(e)
	{
		guardaryeditar(e);	
	});
	//Cargamos los items al select proveedor
	$.post("../ajax/ingreso.php?op=selectProveedor", function(r){
	            $("#idproveedor").html(r);
	            $('#idproveedor').selectpicker('refresh');
	});
	$.post("../ajax/planilla.php?op=listar_usuarios_select", function(r){
        $("#apellidos_nombres").html(r);
        $('#apellidos_nombres').selectpicker('refresh');
	});
	$.post("../ajax/planilla.php?op=afp_select", function(r){
        $("#id_afp").html(r);
        $('#id_afp').selectpicker('refresh');
	});
	$.post("../ajax/planilla.php?op=cargo_select", function(r){
        $("#cargo").html(r);
        $('#cargo').selectpicker('refresh');
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
	$("#codigo").val("");
	$("#apellidos_nombres").val("");
	$("#apellidos_nombres").selectpicker('refresh');
	$("#cargo").val("");
	$("#cargo").selectpicker('refresh');
	$("#id_asignacion").val("");
	$("#id_asignacion").selectpicker('refresh');
	$("#sueldo_basico").val("");
	$("#monto_asignacion").val("");
	$("#otros").val("");
	$("#total_remuneracion").val("");
	$("#snp_onp").val("");
	$("#snp_onp").selectpicker('refresh');
	$("#onp").val("");
	$("#id_afp").Val("");
	$("#id_afp").selectpicker('refresh');
	$("#aporte_obligatario").val("");
	$("#comision_ra").val("");
	$("#prima_seguro").val("");
	$("#total_descuento").val("NO SELECT");
	$("#remuneracion_neta").val("NO SELECT");
	$("#salud").val("");
	$("#sctr").val("");
	$("#total_aportes").val("");
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
		//ShowSelected();
		//total_r_bruta();

		$("#btnGuardar").show();
		$("#btnCancelar").show();
		
		$("#btnAgregarArt").show();
		$("#btnAgregarfila").show();
	}
	else
	{
		$("#listadoregistros").show();
		$("#listadoafp").show();
		$("#formularioregistros").hide();
		$("#btnagregar").show();
		//&("#btnCancelar").show();
	}

}

//Función cancelarform
function cancelarform()
{
	//limpiar();
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

function marcarImpuesto(){
  	var asignacionf=$("#id_asignacion option:selected").text();
  	alert(asignacionf);
  	console.log(asignacionf);
  	if (tipo_comprobante=='Factura')
    {
        $("#impuesto").val(impuesto); 
    }
    else
    {
        $("#impuesto").val("0"); 
    }
}
function ShowSelected(){
	/* Para obtener el valor */
	var cod = document.getElementById("id_asignacion").value;
	//console.log('hola: ',cod);


	if (cod ==='SI') {
		document.getElementById('monto_asignacion').readOnly = false;
		sumar();
		
	}else{
		document.getElementById('monto_asignacion').readOnly = true;
		$("#monto_asignacion").val("");
		sumar();
	}
	 
}
//funcion para sumar automatico sin dar click en otro lado
function sumar() {
//ShowSelected();
  var total = 0;

  $(".monto").each(function() {

    if (isNaN(parseFloat($(this).val()))) {

      total += 0;

    } else {

      total += parseFloat($(this).val());
      //console.log(total);

    }

  });
  //	 $("#total_remuneracion").val(total);
  //var y=total*0.18;

 	$("#total_remuneracion").val(total);
 recibir(); 

}




function recibir(){
	var cod = document.getElementById("snp_onp").value;
	var code = document.getElementById("id_afp").value;
	//console.log('holaaaaaaaaa: ',cod);
// Obtenemos el valor por el id
    var port=document.getElementById("total_remuneracion").value;
    var otros=document.getElementById("otros").value;
    //document.getElementById('id_afp').disabled = true;

     t=(port-otros)*0.13;
     //console.log(t);
     if (cod ==='SI') {
		document.getElementById('onp').readOnly = true;
		var y = $("#onp").val(t);

		$("#total_descuento").val(t);
		//var str = port;

		var total=parseFloat(port, 10);
		var totalDes=parseFloat(t, 10);

		//console.log(total);
		//console.log(totalDes);
		var totalcononp=total+totalDes;
		//console.log(totalcononp);

		$("#remuneracion_neta",).val(totalcononp);

		document.getElementById('id_afp').disabled = true;

	}else{
		document.getElementById('onp').readOnly = true;
		$("#onp").val("");
		var y = $("#onp").val(0);
		$("#total_descuento").val(0);
		$("#remuneracion_neta",).val(0);

		
		document.getElementById('id_afp').disabled = false;	
		

		$('select[name=id_afp]').selectpicker().on('changed.bs.select', function (e) {
   		 var selected = e.target.value;
    

    	// NO SELECT
		    if(selected == "2"){

		    	$("#id_afp").prop("disabled",false);
		    	a=(port-otros)*0.10;
		    	var deci =roundNumber(a,2);
				$("#aporte_obligatario").val(deci);
				b=((port-otros)*1.55)/100;
				var deci = roundNumber(b,2);
				$("#comision_ra").val(deci);
				c=((port-otros)*1.35)/100;
				var deci = roundNumber(c,2);
				$("#prima_seguro").val(deci);
								
				var f=a+b+c; 
				var deci =roundNumber(f,2);					
				$("#total_descuento").val(deci);


				var total=parseFloat(port);
				var totalHori=total+deci;
				$("#remuneracion_neta",).val(totalHori);

		    }else{
		    	//$("#id_afp").hide();
		    	$("#id_afp").prop("disabled",false);
		    	
				$("#aporte_obligatario").val(0);
				
				$("#comision_ra").val(0);
				
				$("#prima_seguro").val(0);						
									
				$("#total_descuento").val(0);	
				$("#remuneracion_neta",).val(0);  

		    }

		    if(selected == "3"){
		    	$("#id_afp").prop("disabled",false);
		    	
		    	a=(port-otros)*0.10;
		    	var deci =roundNumber(a,2);
		    	var y = $("#aporte_obligatario").val(deci);
				b=((port-otros)*1.5)/100;
				var deci = roundNumber(b,2);
				var R = $("#comision_ra").val(deci);
				c=((port-otros)*1.35)/100;
				var deci = roundNumber(c,2);	
				var S = $("#prima_seguro").val(deci);
								
				var f=a+b+c;
				var deci =roundNumber(f,2);				
				$("#total_descuento").val(deci); 

				var total=parseFloat(port);
				var totalHori=total+deci;
				$("#remuneracion_neta",).val(totalHori);
		    	
		    }

		    if(selected == "4"){
		    	
		    	$("#id_afp").prop("disabled",false); 

		    	a=(port-otros)*0.10;
		    	var deci =roundNumber(a,2);
		    	var y = $("#aporte_obligatario").val(deci);
				b=((port-otros)*1.69)/100;
				var deci = roundNumber(b,2);
				var R = $("#comision_ra").val(deci);
				c=((port-otros)*1.35)/100;
				var deci = roundNumber(c,2);
				var S = $("#prima_seguro").val(deci);
								
				var f=a+b+c;	
				var deci =roundNumber(f,2);				
				$("#total_descuento").val(deci);

				var total=parseFloat(port);
				var totalHori=total+deci;
				$("#remuneracion_neta",).val(totalHori);   	

		    }

		    if(selected == "5"){
		    	$("#id_afp").prop("disabled",false); 

		    	a=(port-otros)*0.10;
		    	var deci =roundNumber(a,2);
		    	var y = $("#aporte_obligatario").val(deci);
				b=((port-otros)*1.6)/100;
				var deci = roundNumber(b,2);
				var R = $("#comision_ra").val(deci);
				c=((port-otros)*1.35)/100;
				var deci = roundNumber(c,2);
				var S = $("#prima_seguro").val(deci);
								
				var f=a+b+c;
				var deci =roundNumber(f,2);					
				$("#total_descuento").val(deci); 

				var total=parseFloat(port);
				var totalHori=total+deci;
				$("#remuneracion_neta",).val(totalHori);   
		    }
     
});

	}


} 

function aportes() {
	var aporte = 0;

  $(".f").each(function() {

    if (isNaN(parseFloat($(this).val()))) {

      aporte += 0;

    } else {

      aporte += parseFloat($(this).val());
      //console.log(total);

    }

  });
  //	 $("#total_remuneracion").val(total);
  //var y=total*0.18;
  
 	$("#total_aportes").val(aporte); 

}

function roundNumber(num, scale) {
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
init();
 
//funcion para sumar automatico dando click en otro lado
//function total_r_bruta(valor){
	//console.log('v: ', valor)
    //var total = 0;	
    //valor = parseInt(valor); // Convertir el valor a un entero (número).
	
    //total = document.getElementById('total_remuneracion').innerHTML;
	
    // Aquí valido si hay un valor previo, si no hay datos, le pongo un cero "0".
    //total = (total == null || total == undefined || total == "") ? 0 : total;
	
    /* Esta es la suma. */
   // total = (parseInt(total) + parseInt(valor));
	
    // Colocar el resultado de la suma en el control "span".
    //document.getElementById('total_remuneracion').innerHTML = total;
    //$("#total_remuneracion").val(total);
//}

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

